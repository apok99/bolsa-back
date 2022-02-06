<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Controller\v1;

use App\Shared\Application\Bus\CommandBus;
use App\Shared\Application\Bus\QueryBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class BaseController extends AbstractController
{
    public ?Request $request;
    public CommandBus $commandBus;
    public QueryBus $queryBus;

    public function __construct(
        RequestStack $requestStack,
        CommandBus $commandBus,
        QueryBus $queryBus
    )
    {
        $this->request = $requestStack->getCurrentRequest();
        $this->commandBus = $commandBus;
        $this->queryBus = $queryBus;
    }
}
