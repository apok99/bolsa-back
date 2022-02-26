<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Serializer;

use App\Shared\Infrastructure\Normalizer\CarbonNormalizer;
use App\Shared\Infrastructure\Normalizer\EmailNormalizer;
use App\Shared\Infrastructure\Normalizer\UuidNormalizer;
use Symfony\Component\Serializer\Normalizer\PropertyNormalizer;
use Symfony\Component\Serializer\Serializer;

class SerializerService
{
    public function normalize($data): array
    {
        $serializer = new Serializer([
            new UuidNormalizer(),
            new CarbonNormalizer(),
            new EmailNormalizer(),
            new PropertyNormalizer()
        ]);

        return $serializer->normalize($data);
    }
}
