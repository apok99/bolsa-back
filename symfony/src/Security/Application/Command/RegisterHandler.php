<?php

declare(strict_types=1);

namespace App\Security\Application\Command;

use App\Security\Domain\Service\PasswordEncoderInterface;
use App\CQRS\Application\Command\CommandHandler;
use App\User\Domain\Model\User;
use App\User\Domain\Model\UserRepository;
use Ramsey\Uuid\UuidInterface;

class RegisterHandler implements CommandHandler
{
    private UserRepository $userRepository;
    private PasswordEncoderInterface $passwordEncoder;

    public function __construct(
        UserRepository $userRepository,
        PasswordEncoderInterface $passwordEncoder
    )
    {
        $this->userRepository = $userRepository;
        $this->passwordEncoder = $passwordEncoder;
    }

    public function __invoke(Register $command): UuidInterface
    {
        $user = new User(
            $command->username(),
            $command->email(),
            $this->passwordEncoder->hash($command->password())
        );

        $this->userRepository->save($user);

        return $user->uuid();
    }
}
