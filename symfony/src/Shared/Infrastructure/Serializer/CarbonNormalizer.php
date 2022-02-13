<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Serializer;

use Carbon\CarbonInterface;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;

class CarbonNormalizer implements ContextAwareNormalizerInterface
{
    public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
    {
        return $data instanceof CarbonInterface;
    }

    /** @var CarbonInterface $object */
    public function normalize(mixed $object, string $format = null, array $context = [])
    {
        return $object->format('Y-m-d H:i:s');
    }
}
