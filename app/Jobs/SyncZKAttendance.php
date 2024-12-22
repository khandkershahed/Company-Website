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
use Rats\Zkteco\Lib\Helper\Attendance as ZKAttendance;

class SyncZKAttendance implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $month; // Number of months to fetch data
    protected $deviceIp;
    protected $isFirstRun;

    public function __construct($month = 2)
    {
        $this->month = $month;
        $this->deviceIp = env('ZK_DEVICE_IP', '203.17.65.230');
        $this->isFirstRun = $this->checkIfFirstRun(); // Check if it's the first run
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

                    // Fetch attendance logs
                    $attendanceLogs = $this->isFirstRun
                        ? $zk->getEmployeeAttendance($this->month, $user->employee_id) // Get all data for first run
                        : $zk->getEmployeeAttendanceForToday($user->employee_id); // Get only today's data for subsequent runs

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

                        // Check if attendance record already exists for the current date
                        $attendanceForDate = Attendance::where('user_id', $user->id)
                            ->whereDate('date', $logDate)
                            ->first();

                        // If data for this date already exists, skip inserting duplicate data
                        if ($attendanceForDate) {
                            Log::info("Attendance for user {$user->id} on {$logDate} already exists. Skipping insert.");
                            continue;
                        }

                        // Initialize check_in, check_out, and absent_note
                        $earliestCheckIn = 'N/A';
                        $latestCheckOut = 'N/A';
                        $absentNote = null;

                        // If attendance data exists, get earliest check-in and latest check-out
                        if (isset($log['timestamp'])) {
                            $earliestCheckIn = $log['timestamp'];
                            $latestCheckOut = $log['timestamp'];  // As we only have one entry for this example, we'll assume check-in == check-out initially
                        }

                        if ($attendanceForDate->count() === 0) {
                            $absentNote = 'Absent';
                        }

                        // Save attendance record for the current day
                        Attendance::create([
                            'user_id' => $user->id,
                            'date' => $logDate,
                            'check_in' => $earliestCheckIn === 'N/A' ? null : (new \DateTime($earliestCheckIn))->format('H:i:s'),
                            'check_out' => $latestCheckOut === 'N/A' ? null : (new \DateTime($latestCheckOut))->format('H:i:s'),
                            'status' => $log['state'],
                            'absent_note' => $absentNote,
                        ]);
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

    // Function to check if it's the first run based on the database or some other method
    protected function checkIfFirstRun()
    {
        // Example: Check if attendance data exists for the first day of the month for any user
        $firstDayOfMonth = now()->startOfMonth()->format('Y-m-d');
        return Attendance::whereDate('date', $firstDayOfMonth)->doesntExist();
    }
}
