<?php


namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\SyncZKAttendance;


class RunZKAttendanceSync extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:attendance';
    protected $description = 'Sync attendance data from ZKTeco device';

    /**
     * The console command description.
     *
     * @var string
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        dispatch(new SyncZKAttendance());
        $this->info('Attendance sync job dispatched.');
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    // public function handle()
    // {
    //     return Command::SUCCESS;
    // }
}
