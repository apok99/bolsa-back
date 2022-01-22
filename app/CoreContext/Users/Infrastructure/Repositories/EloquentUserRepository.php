<?php

namespace App\CoreContext\Users\Infrastructure\Repositories;

use App\CoreContext\Users\Domain\Entities\BankLoan;
use App\CoreContext\Users\Domain\Entities\BankLoanUsers;
use App\CoreContext\Users\Domain\Entities\BusinessUsers;
use App\CoreContext\Users\Domain\Entities\DailyUserWorth;
use App\CoreContext\Users\Domain\Entities\User;
use App\CoreContext\Users\Domain\Entities\UserRepository;
use App\CoreContext\Users\Domain\Entities\UserWallets;

class EloquentUserRepository implements UserRepository
{
    public function save(User $user): User
    {
        $user->save();
        return $user;
    }

    public function byId(int $id): User
    {
        return User::find($id);
    }

    public function addToWallet(int $userId, string $symbol, $amount) : void
    {
        User::leftJoin('user_wallets','user_wallets.user_id','=','users.id')
            ->leftJoin('companies', 'companies.id', '=', 'user_wallets.company_id')
            ->where('user_wallets.user_id', $userId)
            ->where('companies.symbol', $symbol)
            ->update(
                [
                    'wallet' => $amount
                ]
            );

    }

    public function updateWallet(int $userId, string $symbol, $amount): void
    {
        User::leftJoin('user_wallets','user_wallets.user_id','=','users.id')
            ->leftJoin('companies', 'companies.id', '=', 'user_wallets.company_id')
            ->where('user_wallets.user_id', $userId)
            ->where('companies.symbol', $symbol)
            ->update(
                [
                    'wallet' => $amount
                ]
            );
    }

    public function findUserWallet(int $userId, string $symbol)
    {
        return User::leftJoin('user_wallets','user_wallets.user_id','=','users.id')
            ->leftJoin('companies', 'companies.id', '=', 'user_wallets.company_id')
            ->where('user_wallets.user_id', $userId)
            ->where('companies.symbol', $symbol)
            ->select('user_wallets.wallet')
            ->first();
    }

    public function findAllWalletsByUserId(int $userId)
    {
        return UserWallets::with(['company', 'user'])->where('user_id', $userId)->orderBy('wallet', 'desc')->get();
    }

    public function createUserWallets(array $wallets)
    {
        return UserWallets::insert($wallets);
    }


    public function resetSeasonWallets()
    {
        return UserWallets::update(['season_wallet' => 0]);
    }

    public function findByEmailOrUsername($email, $username)
    {
        return User::orWhere('email', $email)->orWhere('username', $username)->first();
    }

    public function findAllWalletsWithCreditByUserId($userId)
    {
        return UserWallets::where('user_id', $userId)->where('wallet', '>', 0)->get();
    }

    public function insertDailyUserWorth($array)
    {
        return DailyUserWorth::insert($array);
    }

    public function findAll()
    {
        return User::with(['wallets', 'wallets.company'])->get();
    }

    public function createDailyWorth($data)
    {
        return DailyUserWorth::insert($data);
    }

    public function findBestWorthDailyUsersyDate($date)
    {
        return DailyUserWorth::with('user')
            ->where('date', $date)
            ->limit(150)
            ->orderBy('worth', 'DESC')
            ->get();
    }

    public function findHistoricalUserWorth($id)
    {
        return DailyUserWorth::where('user_id', $id)
            ->orderBy('date', 'DESC')
            ->get();
    }

    public function hasBankLoan($userId)
    {
        return BankLoanUsers::where('user_id', $userId)->first();
    }

    public function findLoan($loanId)
    {
        return BankLoan::find($loanId);
    }

    public function createUserLoan(array $newLoan)
    {
        return BankLoanUsers::insert($newLoan);
    }

    public function addMoney($id, $money)
    {
        return User::where('id', $id)->update(['money' => $money]);
    }

    public function findLoans()
    {
        return BankLoan::get();
    }

    public function findDailyLoans($now)
    {
        return BankLoanUsers::with(['user', 'loan'])->where('next_payment_date', $now)->get();
    }

    public function deleteLoan($id)
    {
        return BankLoanUsers::where('id', $id)->delete();
    }

    public function updateLoan($loan)
    {
        $loan->save();
        return $loan;
    }

    public function findAllUserBusinessRewardToday($date)
    {
        return BusinessUsers::with(['user', 'business'])->where('reward_date', $date)->get();
    }

    public function findBusinessByIdAndUser(string $business, $user, string $date)
    {
        return BusinessUsers::with(['user', 'business'])
            ->where('user_id', $user->id)
            ->where('business_id', $business)
            ->where('reward_date', $date)
            ->first();
    }

    public function updateUserBusiness($id, $cooldown)
    {
        return BusinessUsers::where('id', $id)->update(
            [
                'reward_date' => (new \Datetime($cooldown.' days', new \DateTimeZone('Europe/Madrid')))->format('Y-m-d 23:55:00')
            ]
        );
    }
}
