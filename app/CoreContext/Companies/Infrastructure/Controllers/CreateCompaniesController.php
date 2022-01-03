<?php

namespace App\CoreContext\Companies\Infrastructure\Controllers;

use App\CoreContext\Companies\Application\Command\CreateCompaniesCommand;
use App\CoreContext\Companies\Application\Command\CreateCompaniesCommandHandler;
use App\CoreContext\Users\Infrastructure\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateCompaniesController extends Controller
{
    public function __invoke(Request $request)
    {
        $this->user = auth()->user();

        $command = [
            'companies' => ApiHelper::get('https://financialmodelingprep.com/api/v3/sp500_constituent'),
        ];

        $this->handle(CreateCompaniesCommand::class,CreateCompaniesCommandHandler::class, $command);
    }
}
