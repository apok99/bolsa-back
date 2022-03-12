<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Validator\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\All as SfAll;

class AllConstraint extends SfAll
{
    public static function create(Constraint ...$constraints): SfAll
    {
        return new SfAll([
            'constraints' => $constraints
        ]);
    }
}