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
            $deviceip = $this->deviceIp;
            $zk = new ZKTeco($deviceip, 4370);
            $zk->connect();
            $zk->enableDevice();

            // Retrieve all employees
            $users = User::whereNotNull('employee_id')->get();

            // Ensure the users collection is not empty
            if ($users->isEmpty()) {
                Log::warning('No users found to sync.');
                return;
            }

            // Iterate through all users to sync attendance
            foreach ($users as $user) {
                if (!empty($user->employee_id)) {
                    $employee_id = $user->employee_id;
                    Log::info('Syncing attendance for user: ' . $user->id);
                    Log::info('Month: ' . $this->month);
                    Log::info('Employee ID: ' . $employee_id);

                    // Fetch attendance logs
                    $attendanceLogall = $zk->getEmployeeAttendance($this->month, $employee_id);
                    $attendanceLogs = array_filter($attendanceLogall, function ($attendance) use ($employee_id) {
                        return ($attendance['id'] === $employee_id);
                    });

                    // Log the fetched data for debugging
                    Log::info('Fetched Attendance Logs:', ['attendanceLogs' => $attendanceLogs]);

                    // Ensure $attendanceLogs is an array, even if empty
                    if (is_null($attendanceLogs)) {
                        Log::warning("No attendance logs found for user ID: {$user->id} (Employee ID: {$employee_id}) - Received null");
                        continue;
                    }

                    if (!is_array($attendanceLogs)) {
                        Log::warning("Invalid data format for user ID: {$user->id} (Employee ID: {$employee_id}) - Expected array, got " . gettype($attendanceLogs));
                        continue;
                    }

                    // Group logs by date to avoid duplicates
                    $logsByDate = [];

                    foreach ($attendanceLogs as $log) {
                        $date = date('Y-m-d', strtotime($log['timestamp']));
                        if (!isset($logsByDate[$date])) {
                            $logsByDate[$date] = [
                                'check_in' => $this->getEarliestCheckIn($attendanceLogs, $date),
                                'check_out' => $this->getLatestCheckOut($attendanceLogs, $date),
                                'status' => $log['state'],
                            ];
                        }
                    }

                    // Process each grouped log
                    foreach ($logsByDate as $date => $logData) {
                        // Update or create attendance record in the database
                        Attendance::updateOrCreate(
                            [
                                'user_id' => $employee_id,
                                'date' => $date,
                            ],
                            [
                                'check_in' => $logData['check_in'],
                                'check_out' => $logData['check_out'],
                                'status' => $logData['status'], // Use state for status
                            ]
                        );
                    }
                } else {
                    Log::warning("Employee ID is missing for user ID: {$user->id}");
                }
            }

            $zk->disconnect();
        } catch (\Exception $e) {
            Log::error('ZKTeco Sync Error: ' . $e->getMessage());
        }
    }

    /**
     * Get the earliest check-in time from the attendance logs.
     *
     * @param array $attendanceLogs
     * @param string $date
     * @return string|null
     */
    private function getEarliestCheckIn(array $attendanceLogs, $date)
    {
        $earliestCheckIn = null;

        foreach ($attendanceLogs as $log) {
            $logDate = date('Y-m-d', strtotime($log['timestamp']));
            if ($logDate === $date) {
                $checkInTime = date('H:i:s', strtotime($log['timestamp']));

                if ($earliestCheckIn === null || strtotime($checkInTime) < strtotime($earliestCheckIn)) {
                    $earliestCheckIn = $checkInTime;
                }
            }
        }

        return $earliestCheckIn;
    }

    /**
     * Get the latest check-out time from the attendance logs.
     *
     * @param array $attendanceLogs
     * @param string $date
     * @return string|null
     */
    private function getLatestCheckOut(array $attendanceLogs, $date)
    {
        $latestCheckOut = null;

        foreach ($attendanceLogs as $log) {
            $logDate = date('Y-m-d', strtotime($log['timestamp']));
            if ($logDate === $date) {
                $checkOutTime = date('H:i:s', strtotime($log['timestamp']));

                if ($latestCheckOut === null || strtotime($checkOutTime) > strtotime($latestCheckOut)) {
                    $latestCheckOut = $checkOutTime;
                }
            }
        }

        return $latestCheckOut;
    }
}
