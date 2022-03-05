<?php

namespace App\Security\Application\Service;

use App\Security\Domain\Exception\MissconfiguredUrlSignerException;
use App\Security\Domain\Model\SignedUrl;
use App\Security\Domain\Model\SignedUrlRepository;
use App\Security\Domain\Service\AuthSessionServiceInterface;
use App\Security\Domain\Service\UrlSignerInterface;
use App\User\Domain\Model\User;
use Carbon\CarbonImmutable;
use DateInterval;

class UrlSigner implements UrlSignerInterface
{
    private ?string $url = null;
    private ?DateInterval $duration = null;
    private ?string $userIdentifier = null;
    private ?int $uses = null;
    private SignedUrlRepository $signedUrlRepository;

    public function __construct(SignedUrlRepository $signedUrlRepository)
    {
        $this->signedUrlRepository = $signedUrlRepository;
    }

    public function setUrl(string $url): UrlSignerInterface
    {
        $this->url = $url;

        return $this;
    }

    public function setDuration(DateInterval $interval): UrlSignerInterface
    {
        $this->duration = $interval;

        return $this;
    }

    public function addDays(int $days): UrlSignerInterface
    {
        if (null !== $this->duration)
        {
            $this->duration->d += $days;

            return $this;
        }

        $this->duration = new DateInterval("P{$days}D");

        return $this;
    }

    public function addHours(int $hours): UrlSignerInterface
    {
        if (null !== $this->duration)
        {
            $this->duration->h += $hours;

            return $this;
        }

        $this->duration = new DateInterval("PT{$hours}H");

        return $this;
    }

    public function addMinutes(int $minutes): UrlSignerInterface
    {
        if (null !== $this->duration)
        {
            $this->duration->m += $minutes;

            return $this;
        }

        $this->duration = new DateInterval("PT{$minutes}M");

        return $this;
    }

    public function addSeconds(int $seconds): UrlSignerInterface
    {
        if (null !== $this->duration)
        {
            $this->duration->s += $seconds;

            return $this;
        }

        $this->duration = new DateInterval("PT{$seconds}S");

        return $this;
    }

    public function setUserIdentifier(string $userIdentifier): UrlSignerInterface
    {
        $this->userIdentifier = $userIdentifier;

        return $this;
    }

    public function setUses(int $uses): UrlSignerInterface
    {
        $this->uses = $uses;

        return $this;
    }

    public function getSignedUrl(): string
    {
        if (null === $this->url)
        {
            throw new MissconfiguredUrlSignerException();
        }

        $token = bin2hex(random_bytes(32));

        if (null !== $this->duration)
        {
            $expiresAt = CarbonImmutable::now()->utc()->add($this->duration);
        }

        $signedUrl = new SignedUrl(
            $token,
            $this->url,
            $this->userIdentifier,
            $expiresAt ?? null,
            $this->uses
        );

        $this->signedUrlRepository->save($signedUrl);

        return $this->buildUrl($token);
    }

    public function verify(string $url): bool
    {
        $extracted = $this->extractUrlAndToken($url);

        if (null === $extracted)
        {
            return false;
        }

        [$url, $token] = $extracted;

        $signedUrl = $this->signedUrlRepository->byToken($token);

        if (null === $signedUrl)
        {
            return false;
        }

        $urlIsUnmodified = $this->verifyUrl($signedUrl->url(), $url);
        $isNotExpired = $this->verifyExpiration($signedUrl->expiresAt());
        $hasRemainingUses = $this->hasRemainingUses($signedUrl->uses());

        if (!$urlIsUnmodified || !$isNotExpired || !$hasRemainingUses)
        {
            return false;
        }

        $this->decreaseUses($signedUrl);

        return true;
    }

    private function buildUrl(string $token): string
    {
        // TODO: As of now SignedUrls aren't compatible with url params,
        //   Consider if we might need them to
        return $this->url . '?token=' . $token;
    }

    private function verifyExpiration(?CarbonImmutable $expiration): bool
    {
        if (null === $expiration)
        {
            return true;
        }

        return CarbonImmutable::now()->utc()->isBefore($expiration);
    }

    private function hasRemainingUses(?int $uses): bool
    {
        if (null === $uses)
        {
            return true;
        }

        return $uses > 0;
    }

    private function verifyUrl(string $originalUrl, string $url): bool
    {
        return $originalUrl === $url;
    }

    private function extractUrlAndToken(string $url): ?array
    {
        $explodedUrl = explode('?', $url);

        if (count($explodedUrl) !== 2)
        {
            return null;
        }

        parse_str($explodedUrl[1], $params);

        return $params['token'] ? [$explodedUrl[0], $params['token']] : null;
    }

    private function decreaseUses(SignedUrl $signedUrl): void
    {
        if (null === $signedUrl->uses())
        {
            return;
        }

        $signedUrl->decreaseUses();

        if ($signedUrl->uses() === 0)
        {
            $this->signedUrlRepository->delete($signedUrl);
            return;
        }

        $this->signedUrlRepository->save($signedUrl);
    }
}
