<?php

declare(strict_types=1);

namespace App\Security\Application\EventSubscriber;

use App\Security\Domain\Event\PasswordRecoveryToken\PasswordRecoveryTokenRequested;
use App\Security\Domain\Model\PasswordRecoveryToken;
use App\Security\Domain\Model\PasswordRecoveryTokenRepository;
use App\CQRS\Application\Event\EventSubscriber;
use App\User\Domain\Model\UserRepository;

class SendPasswordRecoverEmailOnPasswordRecoveryTokenRequested implements EventSubscriber
{
    public function __construct(
        private PasswordRecoveryTokenRepository $passwordRecoveryTokenRepository,
        private UserRepository $userRepository
    )
    {
    }

    public function __invoke(PasswordRecoveryTokenRequested $event)
    {
        $this->passwordRecoveryTokenRepository->save(
            new PasswordRecoveryToken(
                $event->userUuid()
            )
        );

        // TODO: Send Email
    }
}
