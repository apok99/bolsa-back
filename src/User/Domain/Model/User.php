<?php
declare(strict_types=1);

namespace App\User\Domain\Model;

use App\Shared\Domain\ValueObject\Email;
use Carbon\CarbonImmutable;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class User
{
    private UuidInterface $uuid;
    private string $username;
    private Email $email;
    private string $password;
    private array $roles;
    private CarbonImmutable $acceptedAt;
    private CarbonImmutable $createdAt;
    private CarbonImmutable $updatedAt;
    private ?CarbonImmutable $deletedAt;

    public function __construct(
        string $username,
        Email $email,
        string $password,
        array $roles = []
    )
    {
        $this->uuid = Uuid::uuid4();
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->roles = $roles;
        $this->createdAt = $this->updatedAt = $this->acceptedAt = CarbonImmutable::now()->utc();
    }

    public function uuid(): UuidInterface
    {
        return $this->uuid;
    }

    public function username(): string
    {
        return $this->username;
    }

    public function email(): Email
    {
        return $this->email;
    }

    public function password(): string
    {
        return $this->password;
    }

    public function roles(): array
    {
        return array_unique(['ROLE_USER', ...$this->roles]);
    }

    public function acceptedAt(): CarbonImmutable
    {
        return $this->acceptedAt;
    }

    public function createdAt(): CarbonImmutable
    {
        return $this->createdAt;
    }

    public function updatedAt(): CarbonImmutable
    {
        return $this->updatedAt;
    }

    public function deletedAt(): ?CarbonImmutable
    {
        return $this->deletedAt;
    }

    public function delete(): void
    {
        $this->deletedAt = CarbonImmutable::now()->utc();
    }
}
