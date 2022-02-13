<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Listener\Kernel;

use App\Shared\Domain\Exception\ValidationException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

class KernelExceptionListener
{
    public function onKernelException(ExceptionEvent $event): void
    {
        $throwable = $event->getThrowable();

        if ($throwable instanceof ValidationException)
        {
            $event->setResponse(
                new JsonResponse($throwable->errors())
            );
        }
    }
}
