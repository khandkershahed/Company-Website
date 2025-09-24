<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use Rats\Zkteco\Lib\ZKTeco;
use App\Models\KPI\Attendance;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SyncZKTecoAttendance extends Command
{
    protected $signature = 'zk:sync-attendance';
    protected $description = 'Sync attendance logs from ZKTeco device into the local attendance table';

    // public function handle()
    // {
    //     $this->info('🔄 Syncing attendance...');

    //     $zk = new ZKTeco($this->getDeviceIp(), 4370);

    //     try {
    //         $zk->connect();
    //         $zk->enableDevice();

    //         $logs = $zk->getAttendance(2);

    //         if (empty($logs)) {
    //             $this->info('No logs found.');
    //             return;
    //         }

    //         $grouped = [];

    //         foreach ($logs as $log) {
    //             $deviceId = $log['id'];
    //             $timestamp = Carbon::parse($log['timestamp']);
    //             $date = $timestamp->toDateString();
    //             $time = $timestamp->toTimeString();

    //             $key = $deviceId . '|' . $date;
    //             $grouped[$key]['device_id'] = $deviceId;
    //             $grouped[$key]['date'] = $date;
    //             $grouped[$key]['times'][] = $time;
    //         }

    //         $synced = 0;

    //         foreach ($grouped as $data) {
    //             $user = User::where('device_user_id', $data['device_id'])->first();
    //             if (!$user) continue;

    //             $checkIn = collect($data['times'])->min();
    //             $checkOut = collect($data['times'])->max();

    //             // Rules
    //             $lateThreshold = '09:06:00';
    //             $earlyThreshold = '17:45:00';

    //             $status = 'Present';
    //             if ($checkIn > $lateThreshold) {
    //                 $status = 'Late';
    //             }
    //             if ($checkOut < $earlyThreshold) {
    //                 $status = $status === 'Late' ? 'Late, Early Leave' : 'Early Leave';
    //             }

    //             Attendance::updateOrCreate(
    //                 [
    //                     'user_id' => $user->id,
    //                     'date' => $data['date'],
    //                 ],
    //                 [
    //                     'check_in' => $checkIn,
    //                     'check_out' => $checkOut,
    //                     'status' => $status,
    //                     'absent_note' => null,
    //                 ]
    //             );

    //             $synced++;
    //         }

    //         $this->info("✅ Sync complete. $synced records updated.");
    //     } catch (\Exception $e) {
    //         // Log::
    //         $this->error("❌ Sync failed: " . $e->getMessage());
    //     } finally {
    //         $zk->disconnect();
    //     }
    // }
    public function handle()
    {
        $this->info('🔄 Syncing today\'s attendance...');

        $zk = new ZKTeco($this->getDeviceIp(), 4370);

        try {
            $zk->connect();
            $zk->enableDevice();

            // Fetch last 2 months logs from device
            $logs = $zk->getAttendance(1);

            if (empty($logs)) {
                $this->info('No logs found.');
                return;
            }

            $today = now()->toDateString();

            // Filter logs only for today
            $logsToday = collect($logs)->filter(function ($log) use ($today) {
                return \Carbon\Carbon::parse($log['timestamp'])->toDateString() === $today;
            });

            if ($logsToday->isEmpty()) {
                $this->info('No attendance logs for today.');
                return;
            }

            $grouped = [];

            foreach ($logsToday as $log) {
                $deviceId = $log['id'];
                $timestamp = Carbon::parse($log['timestamp']);
                $date = $timestamp->toDateString();
                $time = $timestamp->toTimeString();

                $key = $deviceId . '|' . $date;
                $grouped[$key]['device_id'] = $deviceId;
                $grouped[$key]['date'] = $date;
                $grouped[$key]['times'][] = $time;
            }

            $synced = 0;

            foreach ($grouped as $data) {
                $user = User::select('id')->where('employee_id', $data['device_id'])->first();
                if (!$user) continue;

                $checkIn = collect($data['times'])->min();
                $checkOut = collect($data['times'])->max();

                // Your late/early logic here (optional)
                $status = $this->determineAttendanceStatus($checkIn, $checkOut);

                Attendance::updateOrCreate(
                    [
                        'user_id' => $user->id,
                        // 'device_id' => $data['device_id'],
                        // 'name'         => $user->name,
                        // 'employee_id'  => $user->employee_id,
                        'date' => $data['date'],
                    ],
                    [
                        'check_in'    => $checkIn,
                        'check_out'   => $checkOut,
                        'status'      => $status, // Or your custom logic
                        'absent_note' => null,
                    ]
                );

                $synced++;
            }

            $this->info("✅ Sync complete. $synced records updated.");
        } catch (\Exception $e) {
            // Log::error("❌ ZKTeco Sync failed: " . $e->getMessage());
            // $this->error("❌ Sync failed: " . $e->getMessage());
        } finally {
            $zk->disconnect();
        }
    }


    private function getDeviceIp()
    {
        // You can also move this to config or .env
        return '203.17.65.230';
    }

    private function determineAttendanceStatus(string $checkIn, string $checkOut): string
    {
        $checkInTime = Carbon::parse($checkIn);
        $checkOutTime = Carbon::parse($checkOut);

        $status = [];

        if ($checkInTime->gt(Carbon::createFromTime(9, 6))) {
            $status[] = 'L'; // Late
        }

        if ($checkInTime->gt(Carbon::createFromTime(10, 0))) {
            // Remove 'L' if already marked and add 'LL' for Half Day
            $status = array_diff($status, ['L']);
            $status[] = 'LL';
        }

        if ($checkOutTime->lt(Carbon::createFromTime(17, 45))) {
            $status[] = 'Early Leave';
        }

        return empty($status) ? 'Present' : implode(' + ', $status);
    }
}
