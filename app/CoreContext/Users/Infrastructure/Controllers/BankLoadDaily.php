<?php

namespace App\CoreContext\Users\Infrastructure\Controllers;

use App\CoreContext\Users\Application\Commands\PaidBankLoad;
use App\CoreContext\Users\Application\Commands\PaidBankLoadHandle;
use App\Http\Controllers\Controller;

class BankLoadDaily extends Controller
{

    public function __invoke()
    {
        $this->handle(PaidBankLoad::class, PaidBankLoadHandle::class, ['now' => (new \DateTime('now', new \DateTimeZone('Europe/Madrid')))->format('Y-m-d 23:55:00')]);

        return response()->json(true);
    }

}
