<?php

declare(strict_types=1);

namespace App\Security\Application\Command;

use App\Security\Domain\Event\PasswordRecoveryToken\PasswordRecoveryTokenRequested;
use App\CQRS\Application\Command\CommandHandler;
use App\Shared\Domain\Event\DomainEventPublisher;
use App\User\Domain\Model\UserRepository;

class RecoverPasswordHandler implements CommandHandler
{
    public function __construct(
        private UserRepository $userRepository
    )
    {
    }

    public function __invoke(RecoverPassword $command)
    {
        $user = $this->userRepository->byEmail($command->email());

        if (null === $user)
        {
            return;
        }

        DomainEventPublisher::publish(
            new PasswordRecoveryTokenRequested(
                $user->uuid()
            )
        );
    }
}
