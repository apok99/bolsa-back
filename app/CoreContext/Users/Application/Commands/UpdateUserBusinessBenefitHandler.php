<?php

namespace App\CoreContext\Users\Application\Commands;


use App\CoreContext\Users\Domain\Entities\User;
use App\CoreContext\Users\Domain\Entities\UserRepository;
use mysql_xdevapi\Exception;

class UpdateUserBusinessBenefitHandler
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(UpdateUserBusinessBenefit $updateUserBusinessBenefit)
    {

        $user = $updateUserBusinessBenefit->user();
        $businessUser = $updateUserBusinessBenefit->business();
        $business = $businessUser->business;

        $hability = json_decode($business->hability);
        $model = $hability->model;
        $method = ($hability->method);

        try {
            if($hability->whereVar === "user"){
                $model::where($hability->user, $user->id)
                    ->$method($hability->column, $hability->add);
            }else{
                $model::where($hability->where, $hability->whereVar)
                    ->where($hability->user, $user->id)
                    ->$method($hability->column, $hability->add);
            }
        }
        catch (\Exception $e)
        {
            return throw new \Exception("Something went wrong. Please contact our support");
        }

        $this->userRepository->updateUserBusiness($businessUser->id, $business->cooldown);

        return true;

    }

}
