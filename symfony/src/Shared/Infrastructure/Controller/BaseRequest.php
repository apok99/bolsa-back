<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class BaseRequest
{
    private Request $request;

    public function __construct(RequestStack $requestStack)
    {
        $this->request = $requestStack->getCurrentRequest();
    }

    public function content(): array
    {
        $content = $this->request->getContent() ?: $this->request->request->all();

        if (null === $content)
        {
            return [];
        }

        return is_array($content) ? $content : json_decode($content, true, 512, JSON_THROW_ON_ERROR);
    }
}
