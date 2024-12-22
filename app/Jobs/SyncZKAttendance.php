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
            $deviceip = $this->deviceIp;
            $zk = new ZKTeco($deviceip, 4370);
            $zk->connect();
            $zk->enableDevice();

            // Iterate through all users to sync attendance
            $users = User::all();

            foreach ($users as $user) {
                if (!empty($user->employee_id)) {
                    Log::info('Syncing attendance for user: ' . $user->id);
                    Log::info('Month: ' . $this->month);
                    Log::info('Employee ID: ' . $user->employee_id);

                    // Fetch attendance logs for the current user and month
                    $attendanceLogs = $zk->getEmployeeAttendance($this->month, $user->employee_id);

                    // Log the fetched data for debugging
                    Log::info('Fetched Attendance Logs:', ['attendanceLogs' => $attendanceLogs]);

                    // Ensure $attendanceLogs is an array, even if empty
                    if (is_null($attendanceLogs)) {
                        Log::warning("No attendance logs found for user ID: {$user->id} (Employee ID: {$user->employee_id}) - Received null");
                        continue;
                    }

                    if (!is_array($attendanceLogs)) {
                        Log::warning("Invalid data format for user ID: {$user->id} (Employee ID: {$user->employee_id}) - Expected array, got " . gettype($attendanceLogs));
                        continue;
                    }

                    // Process each attendance log
                    foreach ($attendanceLogs as $log) {
                        // Check if log data is valid
                        if (!isset($log['timestamp']) || !isset($log['state'])) {
                            Log::warning("Invalid attendance log data for user ID: {$user->id} (Employee ID: {$user->employee_id})");
                            continue;
                        }

                        // Extract date from timestamp
                        $logDate = (new \DateTime($log['timestamp']))->format('Y-m-d');

                        // Fetch existing attendance records for the current date
                        $attendanceForDate = Attendance::where('user_id', $user->id)
                            ->whereDate('timestamp', $logDate)
                            ->get();

                        // Initialize check_in, check_out, and absent_note
                        $earliestCheckIn = 'N/A';
                        $latestCheckOut = 'N/A';
                        $absentNote = null;

                        if ($attendanceForDate->count() > 0) {
                            // Get the earliest check-in and latest check-out from existing records
                            $earliestCheckIn = $attendanceForDate->min('timestamp');
                            $latestCheckOut = $attendanceForDate->max('timestamp');
                        } else {
                            // Set absent note if no records exist for the day
                            $absentNote = 'Absent';
                        }

                        // Create or update attendance record for the current day
                        Attendance::updateOrCreate(
                            [
                                'user_id' => $user->id,
                                'check_in' => $earliestCheckIn === 'N/A' ? null : (new \DateTime($earliestCheckIn))->format('H:i:s'),
                                'check_out' => $latestCheckOut === 'N/A' ? null : (new \DateTime($latestCheckOut))->format('H:i:s'),
                                'status' => $log['state'], // Use state for status
                                'absent_note' => $absentNote,
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
}
