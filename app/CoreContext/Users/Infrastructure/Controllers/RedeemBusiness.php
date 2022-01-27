<?php

namespace App\CoreContext\Users\Infrastructure\Controllers;

use App\CoreContext\Users\Application\Commands\UpdateUserBusinessBenefit;
use App\CoreContext\Users\Application\Commands\UpdateUserBusinessBenefitHandler;
use App\CoreContext\Users\Application\Querys\FindAllUsersWithBusiness;
use App\CoreContext\Users\Application\Querys\FindAllUsersWithBusinessHandler;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RedeemBusiness extends Controller
{
    public function __invoke(Request $request)
    {
        $user = auth()->user();

        $business = $this->handle(FindAllUsersWithBusiness::class, FindAllUsersWithBusinessHandler::class, [
            'now' => (new \DateTime('now', new \DateTimeZone('Europe/Madrid')))->format('Y-m-d H:i:s'),
            'business' => $request->business,
            'user' => $user
        ]);

        if (!$business)
        {
            return throw new \Exception("You don't have business to redeem today.");
        }

        $this->handle(UpdateUserBusinessBenefit::class, UpdateUserBusinessBenefitHandler::class, [
            'user'  => $user,
            'business' => $business
        ]);
    }
}
