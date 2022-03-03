<?php

namespace App\Security\Application\Service;

use App\Security\Domain\Exception\MissconfiguredUrlSignerException;
use App\Security\Domain\Service\AuthSessionServiceInterface;
use App\Security\Domain\Service\UrlSignerInterface;
use App\User\Domain\Model\User;
use Carbon\CarbonImmutable;
use DateInterval;

class UrlSigner implements UrlSignerInterface
{
    private const ALGO = 'aes-128-ctr';

    private ?string $url = null;
    private ?DateInterval $duration = null;
    private ?User $user = null;
    private string $key;
    private AuthSessionServiceInterface $authSessionService;

    public function __construct(
        string $key,
        AuthSessionServiceInterface $authSessionService
    )
    {
        $this->key = $key;
        $this->authSessionService = $authSessionService;
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

    public function setUser(User $user): UrlSignerInterface
    {
        $this->user = $user;

        return $this;
    }

    public function getSignedUrl(): string
    {
        $options = [
            'user' => $this->user?->uuid()->toString(),
            'expiresAt' => $this->duration ? CarbonImmutable::now()->utc()->add($this->duration)->toDateTimeString() : null,
            'url' => $this->url
        ];

        $encoded = json_encode($options, JSON_THROW_ON_ERROR);

        $iv = bin2hex(random_bytes(8));

        $encrypted =  openssl_encrypt(
            $encoded,
            self::ALGO,
            $this->key,
            0,
            $iv
        );

        $base64 = base64_encode($encrypted);

        return $this->buildUrl($base64, $iv);
    }

    public function verify(string $url): bool
    {
        $explodedUrl = explode('?', $url);

        if (count($explodedUrl) !== 2)
        {
            return false;
        }

        parse_str($explodedUrl[1], $params);

        if (!isset($params['token'], $params['iv']))
        {
            return false;
        }

        $token = base64_decode($params['token']);

        $encoded = openssl_decrypt(
            $token,
            self::ALGO,
            $this->key,
            0,
            $params['iv']
        );

        $options = json_decode($encoded, true, 512, JSON_THROW_ON_ERROR);

        $userIsValid = $this->verifyUser($options['user']);
        $isNotExpired = $this->verifyExpiration($options['expiresAt']);
        $urlIsNotModified = $this->verifyUrl($explodedUrl[0], $options['url']);

        return $userIsValid && $isNotExpired && $urlIsNotModified;
    }

    private function buildUrl(string $encrypted, string $iv): string
    {
        return "$this->url?token=$encrypted&iv=$iv";
    }

    private function verifyUser(?string $userId): bool
    {
        if (null !== $userId)
        {
            return true;
        }

        return $this->authSessionService->user()->uuid()->toString() === $userId;
    }

    private function verifyExpiration(?string $expiration): bool
    {
        if (null === $expiration)
        {
            return true;
        }

        return CarbonImmutable::now()->utc()->isBefore(CarbonImmutable::parse($expiration));
    }

    private function verifyUrl(string $originalUrl, string $url): bool
    {
        return $originalUrl === $url;
    }
}
