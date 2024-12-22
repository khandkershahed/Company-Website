<?php

namespace App\Jobs;

use App\Models\User;
use Rats\Zkteco\Lib\ZKTeco;
use Illuminate\Bus\Queueable;
use App\Models\KPI\Attendance;
use Illuminate\Support\Facades\Log;
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
                if (empty($user->employee_id)) {
                    Log::warning("Employee ID is missing for user ID: {$user->id}");
                    continue; // Skip this user
                }

                Log::info('Syncing attendance for user: ' . $user->id);
                Log::info('Month: ' . $this->month);
                Log::info('Employee ID: ' . $user->employee_id);

                // Get attendance logs from ZKTeco device
                $attendanceLogs = ZKAttendance::getCustom($zk, $this->month, $user->employee_id);
                Log::info('Test Attendance Logs:', ['attendanceLogs' => $attendanceLogs]);
                if (empty($attendanceLogs)) {
                    Log::warning("No attendance logs found for user ID: {$user->id} (Employee ID: {$user->employee_id})");
                    continue; // Skip to the next user if no logs are found
                }

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

            $zk->disconnect();
        } catch (\Exception $e) {
            Log::error('ZKTeco Sync Error: ' . $e->getMessage(), ['exception' => $e]);
        }
    }
}
