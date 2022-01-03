<?php

namespace App\Http\Controllers;

use App\CoreContext\Users\Application\Commands\CreateUser;
use App\CoreContext\Users\Application\Commands\CreateUserHandler;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Joselfonseca\LaravelTactician\CommandBusInterface;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private ?CommandBusInterface $bus;

    public function __construct(CommandBusInterface $bus)
    {
        $this->bus = $bus;
    }

    protected function bus(): CommandBusInterface
    {
        return $this->bus;
    }

    public function handle($command,  $handler, array $data){
        $this->bus->addHandler($command, $handler);
        return $this->bus->dispatch($command, $data);
    }
}
