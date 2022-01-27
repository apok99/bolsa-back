<?php

namespace App\CoreContext\User\Application\Command;

use App\CoreContext\User\Domain\Entity\UserRepository;

class PaidBankLoadHandle
{
    public UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function handle(PaidBankLoad $paidBankLoad)
    {
        $loans = $this->userRepository->findDailyLoans($paidBankLoad->now());
        foreach ($loans as $loan) {

            $user = $loan->user;
            $user->money = ((float)$user->money - $loan->loan->daily_pay);
            $this->userRepository->save($user);


            if ($loan->places_until_finish == 1) {
                $this->userRepository->deleteLoan($loan->id);
            }else{
                $loan->places_until_finish = (int) $loan->places_until_finish - 1;
                $loan->next_payment_date = (new \DateTime('+1 day', new \DateTimeZone('Europe/Madrid')))->format('Y-m-d 23:55:00');

                $this->userRepository->updateLoan($loan);
            }

        }

        return true;

    }
}
