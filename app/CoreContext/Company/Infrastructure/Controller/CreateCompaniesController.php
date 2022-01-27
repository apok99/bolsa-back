<?php

namespace App\CoreContext\Company\Infrastructure\Controller;

use App\CoreContext\Company\Application\Command\CreateCompaniesCommand;
use App\CoreContext\Company\Application\Command\CreateCompaniesCommandHandler;
use App\CoreContext\User\Infrastructure\Helper\ApiHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateCompaniesController extends Controller
{
    public function __invoke(Request $request)
    {
        $this->user = auth()->user();

        if ($request->password !== "123uefhjddsvgy23ugedfisufhiiu23oir he qwuqwh rhquirqew urh qdf_S:D_:D:dSdpfopsfoweprwkrewo")
        {
            return response()->json(['bad' => 'bad permission'], 405);
        }

        $command = [
            'companies' => ApiHelper::get('https://financialmodelingprep.com/api/v3/sp500_constituent'),
        ];

        $this->handle(CreateCompaniesCommand::class,CreateCompaniesCommandHandler::class, $command);
    }
}
