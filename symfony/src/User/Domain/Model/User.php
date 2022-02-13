<?php
declare(strict_types=1);

namespace App\User\Domain\Model;

use App\Shared\Domain\ValueObject\Email;
use Carbon\CarbonImmutable;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class User
{
    private UuidInterface $id;
    private string $username;
    private Email $email;
    private string $password;
    private array $roles;
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
        $this->id = Uuid::uuid4();
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->roles = $roles;

        $this->createdAt = $this->updatedAt = CarbonImmutable::now()->utc();
    }

    public function id(): UuidInterface
    {
        return $this->id;
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

    public function setPassword(string $password): void
    {
        $this->password = $password;
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
}
