<?php

declare(strict_types=1);

namespace App\Api\Infrastructure;

use App\Api\Domain\ValueObject\ApiResponse;
use App\Shared\Infrastructure\Serializer\SerializerService;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class JsonApiResponseFactory
{
    private SerializerService $serializer;

    public function __construct(SerializerService $serializer)
    {
        $this->serializer = $serializer;
    }

    public function empty(array $headers = []): JsonResponse
    {
        return new JsonResponse(
            [
                'data' => null
            ],
            200,
            $headers
        );
    }

    public function fromApiResponse(ApiResponse $apiResponse, array $headers = []): JsonResponse
    {
        return new JsonResponse(
            $this->serializer->normalize($apiResponse),
            200,
            $headers
        );
    }

    public function fromErrorsArray(array $errors, array $headers = []): JsonResponse
    {
        $apiResponse = new ApiResponse(
            ['errors' => $errors]
        );

        return new JsonResponse(
            $this->serializer->normalize($apiResponse),
            422,
            $headers
        );
    }

    public function withCreatedId(UuidInterface $id): JsonResponse
    {
        return $this->empty([
            'X-Created-Id' => $id->toString()
        ]);
    }
}
