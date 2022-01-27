<?php

namespace App\CoreContext\User\Infrastructure\Controller;

use App\CoreContext\User\Application\Command\PaidBankLoad;
use App\CoreContext\User\Application\Command\PaidBankLoadHandle;
use App\Http\Controllers\Controller;

class BankLoadDaily extends Controller
{

    public function __invoke()
    {
        $this->handle(PaidBankLoad::class, PaidBankLoadHandle::class, ['now' => (new \DateTime('now', new \DateTimeZone('Europe/Madrid')))->format('Y-m-d 23:55:00')]);

        return response()->json(true);
    }

}
