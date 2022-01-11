<?php

namespace App\CoreContext\Users\Application\Commands;

use App\CoreContext\Users\Domain\Entities\UserRepository;

class CreateBankLoanUserHandler
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(CreateBankLoanUser $command)
    {
        $hasLoan = $this->userRepository->hasBankLoan($command->user()->id);

        if ($hasLoan) {
            return throw new \Exception('User has other active bank loan.');
        }

        $loan = $this->userRepository->findLoan($command->loanBankId());

        if (!$loan){
            return throw new \Exception('Bank loan not found.');
        }

        $newLoan = [
            'user_id' => $command->user()->id,
            'loan_id' => $command->loanBankId(),
            'places_until_finish' => $loan->days_to_pay,
            'requested_at' => (new \DateTime('now', new \DateTimeZone('Europe/Madrid')))->format('Y-m-d 23:55:00'),
            'first_payment_date' => (new \DateTime('+7 days', new \DateTimeZone('Europe/Madrid')))->format('Y-m-d 23:55:00'),
            'next_payment_date' =>  (new \DateTime('+7 days', new \DateTimeZone('Europe/Madrid')))->format('Y-m-d 23:55:00'),
            'created_at' => (new \DateTime('now', new \DateTimeZone('Europe/Madrid')))->format('Y-m-d H:i:s'),
        ];

        $user = $this->userRepository->byId($command->user()->id);

        $this->userRepository->addMoney($user->id, ($loan->money + $user->money));

        $this->userRepository->createUserLoan($newLoan);
    }
}
