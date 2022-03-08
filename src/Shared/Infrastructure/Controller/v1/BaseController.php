<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Controller\v1;

use App\CQRS\Application\Bus\CommandBus;
use App\CQRS\Application\Bus\QueryBus;
use App\Shared\Infrastructure\Controller\BaseRequest;
use App\Api\Infrastructure\JsonApiResponseFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BaseController extends AbstractController
{
    public BaseRequest $request;
    public CommandBus $commandBus;
    public QueryBus $queryBus;
    public JsonApiResponseFactory $jsonApiResponseFactory;

    public function __construct(
        BaseRequest $request,
        CommandBus $commandBus,
        QueryBus $queryBus,
        JsonApiResponseFactory $jsonApiResponseFactory
    )
    {
        $this->request = $request;
        $this->commandBus = $commandBus;
        $this->queryBus = $queryBus;
        $this->jsonApiResponseFactory = $jsonApiResponseFactory;
    }
}
