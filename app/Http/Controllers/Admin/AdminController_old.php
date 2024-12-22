<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\KPI\Attendance;
use Carbon\Carbon;
use DateTime;
use DatePeriod;
use DateInterval;
use Rats\Zkteco\Lib\ZKTeco;
use Illuminate\Support\Facades\Log;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SyncZKAttendance implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $deviceIp;

    public function __construct()
    {
        $this->deviceIp = env('ZK_DEVICE_IP', '203.17.65.230');  // Set device IP
    }

    public function handle()
    {
        try {
            // Connect to ZKteco device
            $zk = new ZKTeco($this->deviceIp, 4370);
            $zk->connect();
            $zk->enableDevice();

            // Fetch all users from the device
            $users = $zk->getUser();

            foreach ($users as $userData) {
                $id = $userData['userid'];
                $user_name = $userData['name'];

                // Retrieve the attendance data for this employee (for current and last month)
                $attendances_all = $zk->getEmployeeAttendance(2, $id);  // Fetch all attendance data

                // Get the current date for processing today’s attendance
                $todayDate = date('Y-m-d');
                $attendanceForToday = $this->getAttendanceForDate($attendances_all, $id, $todayDate);
                $attendanceToday = $this->processAttendance($attendanceForToday, $id, $user_name, $todayDate);

                // Get this month's attendance data
                $attendanceThisMonth = $this->getAttendanceForThisMonth($attendances_all, $id, $user_name);

                // Get last month's attendance data
                $attendanceLastMonth = $this->getAttendanceForLastMonth($attendances_all, $id, $user_name);

                // Save the attendance data to the database
                $this->saveAttendance($attendanceToday);
                $this->saveAttendance($attendanceThisMonth);
                $this->saveAttendance($attendanceLastMonth);
            }

            // Disconnect the device
            $zk->disconnect();
        } catch (\Exception $e) {
            Log::error('ZKTeco Sync Error: ' . $e->getMessage());
        }
    }

    // Helper function to get attendance data for a specific date
    private function getAttendanceForDate($attendances, $id, $date)
    {
        return array_filter($attendances, function ($attendance) use ($id, $date) {
            $attendanceDate = date('Y-m-d', strtotime($attendance['timestamp']));
            return $attendanceDate === $date && $attendance['id'] === $id;
        });
    }

    // Helper function to process and format attendance data
    private function processAttendance($attendances, $id, $user_name, $date)
    {
        $earliestCheckIn = null;
        $latestCheckOut = null;

        // Process the filtered attendance data for the specific day
        foreach ($attendances as $attendance) {
            $checkTime = date('H:i:s', strtotime($attendance['timestamp']));

            // Update earliest check-in time
            if ($earliestCheckIn === null || strtotime($checkTime) < strtotime($earliestCheckIn)) {
                $earliestCheckIn = $checkTime;
            }

            // Update latest check-out time
            if ($latestCheckOut === null || strtotime($checkTime) > strtotime($latestCheckOut)) {
                $latestCheckOut = $checkTime;
            }
        }

        // Prepare the attendance data for this day
        return [
            'user_id' => $id,
            'user_name' => $user_name,
            'date' => $date,
            'check_in' => $earliestCheckIn,
            'check_out' => $latestCheckOut,
        ];
    }

    // Helper function to get this month's attendance data
    private function getAttendanceForThisMonth($attendances, $id, $user_name)
    {
        $startDate = new DateTime('first day of this month');
        $endDate = new DateTime('today +1 day');
        $attendanceThisMonth = [];

        foreach (new DatePeriod($startDate, new DateInterval('P1D'), $endDate) as $date) {
            $currentDate = $date->format('Y-m-d');
            $attendanceForDate = $this->getAttendanceForDate($attendances, $id, $currentDate);

            if (count($attendanceForDate) > 0) {
                $earliestCheckIn = min(array_column($attendanceForDate, 'timestamp'));
                $latestCheckOut = max(array_column($attendanceForDate, 'timestamp'));
            } else {
                $earliestCheckIn = 'N/A';
                $latestCheckOut = 'N/A';
            }

            // Add attendance data for this date
            $attendanceThisMonth[] = [
                'user_id' => $id,
                'user_name' => $user_name,
                'date' => $currentDate,
                'check_in' => $earliestCheckIn === 'N/A' ? null : (new DateTime($earliestCheckIn))->format('H:i:s'),
                'check_out' => $latestCheckOut === 'N/A' ? null : (new DateTime($latestCheckOut))->format('H:i:s'),
                'absent_note' => $earliestCheckIn === 'N/A' ? 'Absent' : null,
            ];
        }

        return $attendanceThisMonth;
    }

    // Helper function to get last month's attendance data
    private function getAttendanceForLastMonth($attendances, $id, $user_name)
    {
        $firstDayLastMonth = date('Y-m-01', strtotime('last month'));
        $lastDayLastMonth = date('Y-m-t', strtotime('last month'));
        $attendanceLastMonth = [];

        $lastMonthAttendances = array_filter($attendances, function ($attendance) use ($id, $firstDayLastMonth, $lastDayLastMonth) {
            $attendanceDate = date('Y-m-d', strtotime($attendance['timestamp']));
            return ($attendanceDate >= $firstDayLastMonth && $attendanceDate <= $lastDayLastMonth) && ($attendance['id'] === $id);
        });

        // Process the filtered attendance data for the last month
        foreach ($lastMonthAttendances as $attendance) {
            $attendanceDate = date('Y-m-d', strtotime($attendance['timestamp']));
            $checkTime = date('H:i:s', strtotime($attendance['timestamp']));

            // Update earliest check-in time
            if (!isset($earliestCheckInLastMonth[$attendanceDate]) || strtotime($checkTime) < strtotime($earliestCheckInLastMonth[$attendanceDate])) {
                $earliestCheckInLastMonth[$attendanceDate] = $checkTime;
            }

            // Update latest check-out time
            if (!isset($latestCheckOutLastMonth[$attendanceDate]) || strtotime($checkTime) > strtotime($latestCheckOutLastMonth[$attendanceDate])) {
                $latestCheckOutLastMonth[$attendanceDate] = $checkTime;
            }
        }

        // Create entries for each day with the earliest check-in and latest check-out times for last month
        foreach ($earliestCheckInLastMonth as $date => $checkIn) {
            $attendanceLastMonth[] = [
                'user_id' => $id,
                'user_name' => $user_name,
                'date' => $date,
                'check_in' => $checkIn,
                'check_out' => $latestCheckOutLastMonth[$date],
            ];
        }

        return $attendanceLastMonth;
    }

    // Save the attendance data to the database
    private function saveAttendance($attendanceData)
    {
        foreach ($attendanceData as $attendance) {
            $attendanceExists = Attendance::where('user_id', $attendance['user_id'])
                ->whereDate('date', $attendance['date'])
                ->exists();

            // Avoid duplication if attendance already exists for this date
            if (!$attendanceExists) {
                Attendance::create([
                    'user_id' => $attendance['user_id'],
                    'date' => $attendance['date'],
                    'check_in' => $attendance['check_in'],
                    'check_out' => $attendance['check_out'],
                    'absent_note' => $attendance['absent_note'] ?? null,
                ]);
            }
        }
    }
}
