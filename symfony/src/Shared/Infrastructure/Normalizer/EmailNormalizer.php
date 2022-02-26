<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Normalizer;

use App\Shared\Domain\ValueObject\Email;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;

class EmailNormalizer implements ContextAwareNormalizerInterface
{
    public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
    {
        return $data instanceof Email;
    }

    /** @var Email $object */
    public function normalize(mixed $object, string $format = null, array $context = [])
    {
        return $object->value();
    }
}
