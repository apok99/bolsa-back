<?php

namespace App\Console;

use App\CoreContext\Users\Infrastructure\Controllers\UserGetWorthPatrimony;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function scheduleTimezone()
    {
        return 'Europe/Madrid';
    }

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call('App\CoreContext\Users\Infrastructure\Controllers\UserTotalWorthDaily@__invoke')
            ->timezone('Europe/Madrid')
            ->dailyAt('23:55')
            ->runInBackground();


        $schedule->call('App\CoreContext\Users\Infrastructure\Controllers\BankLoadDaily@__invoke')
            ->timezone('Europe/Madrid')
            ->dailyAt('23:55')
            ->runInBackground();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
