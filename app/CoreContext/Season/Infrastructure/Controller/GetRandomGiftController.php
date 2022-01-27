<?php

namespace App\CoreContext\Season\Infrastructure\Controller;

use App\CoreContext\Company\Application\Query\FindAllCompanies;
use App\CoreContext\Company\Application\Query\FindAllCompaniesHandler;
use App\CoreContext\Season\Application\Command\GetRandomGiftCommand;
use App\CoreContext\Season\Application\Command\GetRandomGiftCommandHandler;
use App\CoreContext\User\Application\Command\UpdateWallet;
use App\CoreContext\User\Application\Command\UpdateWalletHandler;
use App\CoreContext\User\Domain\Entity\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetRandomGiftController extends Controller
{

    public function __invoke(Request $request)
    {
        $user = auth()->user();

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
            'user' => $user,
            ''
        ]);

    }

}
