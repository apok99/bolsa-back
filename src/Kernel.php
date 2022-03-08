<?php

namespace App;

use App\Shared\Infrastructure\Validator\ValidatorService;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    private static Kernel $instance;

    public function __construct(string $environment, bool $debug)
    {
        parent::__construct($environment, $debug);
        self::$instance = $this;
    }

    public static function instance(): Kernel
    {
        return self::$instance;
    }

    public static function validator(): ValidatorService
    {
        // TODO: Manage to get rid of the warning
        return self::instance()->getContainer()->get(ValidatorService::class);
    }
}
