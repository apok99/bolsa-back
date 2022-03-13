<?php

declare(strict_types=1);

namespace App\Security\Application\Command;

use App\Security\Domain\Model\PasswordRecoveryToken;
use App\Security\Domain\Model\PasswordRecoveryTokenRepository;
use App\CQRS\Application\Command\CommandHandler;
use App\User\Domain\Model\UserRepository;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class SendPasswordRecoverEmailHandler implements CommandHandler
{
    public function __construct(
        private UserRepository $userRepository,
        private PasswordRecoveryTokenRepository $passwordRecoveryTokenRepository,
        private MailerInterface $mailer
    )
    {
    }

    public function __invoke(SendPasswordRecoverEmail $command)
    {
        $user = $this->userRepository->byId($command->id());

        // TODO: Can't throw UnrecoverableMessageException in Application, figure out what to do
        //      - Solution: Implement a Messenger middleware that listens to domain exceptions and maps them to symfony exceptions
        // TODO: Create UserNotFound exception
        if (null === $user)
        {
            throw new \Exception();
        }

        $passwordRecoveryToken = new PasswordRecoveryToken($user->id());

        $this->passwordRecoveryTokenRepository->save($passwordRecoveryToken);

        // TODO: Where should the url come from? It's a frontend url
        $passwordRecoveryUrl = "https://asdasd.com/asdasd?token={$passwordRecoveryToken->token()}";
        $email = new Email();

        // TODO: Add default 'from' in Mailer configuration
        $email->addTo($user->email()->value())
            ->addFrom('no-reply@capitale.fun')
            ->subject('Capitale password recovery')
            ->text($passwordRecoveryUrl);

        $this->mailer->send($email);
    }
}
