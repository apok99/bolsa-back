<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Serializer;

use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;

class UuidNormalizer implements ContextAwareNormalizerInterface
{
    public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
    {
        return $data instanceof UuidInterface;
    }

    /** @var UuidInterface $object */
    public function normalize(mixed $object, string $format = null, array $context = [])
    {
        return $object->toString();
    }
}
