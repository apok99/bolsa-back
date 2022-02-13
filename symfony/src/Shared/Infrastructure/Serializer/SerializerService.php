<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Serializer;

use Symfony\Component\Serializer\Normalizer\PropertyNormalizer;
use Symfony\Component\Serializer\Serializer;

class SerializerService
{
    public function normalize($data): array
    {
        $serializer = new Serializer([
            new UuidNormalizer(),
            new CarbonNormalizer(),
            new PropertyNormalizer()
        ]);

        return $serializer->normalize($data);
    }
}
