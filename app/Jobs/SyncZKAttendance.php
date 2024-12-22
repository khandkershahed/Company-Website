<?php

namespace App\Jobs;

use App\Models\User;
use Rats\Zkteco\Lib\ZKTeco;
use Illuminate\Bus\Queueable;
use App\Models\KPI\Attendance;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Rats\Zkteco\Lib\Helper\Attendance as ZKAttendance;

class SyncZKAttendance implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $month; // Number of months to fetch data
    protected $deviceIp;

    public function __construct($month = 2)
    {
        $this->month = $month;
        $this->deviceIp = env('ZK_DEVICE_IP', '203.17.65.230');
    }

    public function handle()
    {
        try {
            $zk = new ZKTeco($this->deviceIp, 4370);
            $zk->connect();
            // Iterate through all users to sync attendance
            $users = User::all();

            foreach ($users as $user) {
                if (!empty($user->employee_id)) {
                    $attendanceLogs = ZKAttendance::getCustom($zk, $this->month, $user->employee_id);

                    foreach ($attendanceLogs as $log) {
                        Attendance::updateOrCreate(
                            [
                                'user_id' => $user->id,
                                'timestamp' => $log['timestamp'],
                            ],
                            [
                                'status' => $log['state'], // Use state for status
                            ]
                        );
                    }
                }
            }

            $zk->disconnect();
        } catch (\Exception $e) {
            // \Log::error('ZKTeco Sync Error: ' . $e->getMessage());
        }
    }
}
