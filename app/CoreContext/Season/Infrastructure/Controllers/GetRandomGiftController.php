<?php

namespace App\CoreContext\Season\Infrastructure\Controllers;

use App\CoreContext\Companies\Application\Querys\FindAllCompanies;
use App\CoreContext\Companies\Application\Querys\FindAllCompaniesHandler;
use App\CoreContext\Companies\Application\Querys\FindPriceBySymbol;
use App\CoreContext\Companies\Application\Querys\FindPriceBySymbolHandler;
use App\CoreContext\Season\Applicaction\Command\GetRandomGiftCommand;
use App\CoreContext\Season\Applicaction\Command\GetRandomGiftCommandHandler;
use App\CoreContext\Users\Application\Commands\UpdateWalletHandler;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetRandomGiftController extends Controller
{

    public function __invoke(Request $request)
    {
        $this->user = auth()->user();

        $companies = $this->handle(FindAllCompanies::class, FindAllCompaniesHandler::class, []);
        $randomCompanies = [$companies[rand(0, sizeof($companies))], $companies[rand(0, sizeof($companies))]];

        foreach ($randomCompanies as $company)
        {
            $this->handle(UpdateWallet::class, UpdateWalletHandler::class, [
                ''
            ]);
        }

        $this->handle(GetRandomGiftCommand::class, GetRandomGiftCommandHandler::class, [
            'companies' => $companies,
            'user' => $this->user,
            ''
        ]);

    }

}
