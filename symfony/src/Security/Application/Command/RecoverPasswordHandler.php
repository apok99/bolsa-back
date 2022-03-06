<?php

declare(strict_types=1);

namespace App\Security\Application\Command;

use App\Security\Application\AsyncCommand\SendPasswordRecoverEmail;
use App\Shared\Application\Bus\CommandBus;
use App\Shared\Application\Command\CommandHandler;
use App\User\Domain\Model\UserRepository;

class RecoverPasswordHandler implements CommandHandler
{
    public function __construct(
        private UserRepository $userRepository,
        private CommandBus $commandBus
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

        $this->commandBus->dispatch(
            new SendPasswordRecoverEmail(
                $user->uuid()
            )
        );
    }
}
