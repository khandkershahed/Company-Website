<?php

namespace App\Console;

use App\Jobs\SyncZKAttendance;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('zk:sync-attendance')->dailyAt('12:15');
        $schedule->command('zk:sync-attendance')
             ->hourly()
             ->between('8.09', '22:09');
    }


    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {

        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
    protected $commands = [
        \App\Console\Commands\SyncZKTecoAttendance::class,
    ];


}
