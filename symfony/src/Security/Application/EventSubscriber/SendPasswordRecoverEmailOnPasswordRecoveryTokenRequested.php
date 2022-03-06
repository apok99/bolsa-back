<?php

declare(strict_types=1);

namespace App\Security\Application\EventSubscriber;

use App\Security\Domain\Event\PasswordRecoveryToken\PasswordRecoveryTokenRequested;
use App\Security\Domain\Model\PasswordRecoveryToken;
use App\Security\Domain\Model\PasswordRecoveryTokenRepository;
use App\Security\Domain\Service\AuthSessionServiceInterface;
use App\Security\Infrastructure\Service\AuthSessionService;
use App\Shared\Application\Event\EventSubscriber;

class SendPasswordRecoverEmailOnPasswordRecoveryTokenRequested implements EventSubscriber
{
    public function __construct(
        private PasswordRecoveryTokenRepository $passwordRecoveryTokenRepository
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
    }
}
