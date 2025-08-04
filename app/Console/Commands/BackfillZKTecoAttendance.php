<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;
use Rats\Zkteco\Lib\ZKTeco;
use App\Models\KPI\Attendance;
use Illuminate\Support\Facades\Log;

class BackfillZKTecoAttendance extends Command
{
    protected $signature = 'zk:backfill-attendance';
    protected $description = 'Backfill attendance logs for last 3 months from ZKTeco device';

    public function handle()
    {
        $this->info('🔄 Starting backfill of last 9 months attendance...');

        $zk = new ZKTeco($this->getDeviceIp(), 4370);

        try {
            $zk->connect();
            $zk->enableDevice();

            // Fetch logs for last 3 months
            $logs = $zk->getAttendance(9); // Assuming this fetches last 3 months logs

            if (empty($logs)) {
                $this->info('No logs found for last 3 months.');
                return;
            }

            $grouped = [];

            foreach ($logs as $log) {
                $deviceId = $log['id'];
                $timestamp = Carbon::parse($log['timestamp']);
                $date = $timestamp->toDateString();
                $time = $timestamp->toTimeString();

                $key = $deviceId . '|' . $date;
                $grouped[$key]['device_id'] = $deviceId;
                $grouped[$key]['date'] = $date;
                $grouped[$key]['times'][] = $time;
            }

            $processedCount = 0;

            foreach ($grouped as $data) {
                $user = User::select('id')->where('employee_id', $data['device_id'])->first();

                if (!$user) {
                    $this->warn("User with device ID {$data['device_id']} not found, skipping...");
                    continue;
                }

                $checkIn = collect($data['times'])->min();
                $checkOut = collect($data['times'])->max();

                // Attendance status logic (basic: Present)
                $status = 'Present';

                Attendance::updateOrCreate(
                    [
                        'user_id' => $user->id,
                        // 'device_id' => $data['device_id'],
                        'date'    => $data['date'],
                    ],
                    [
                        'check_in'    => $checkIn,
                        'check_out'   => $checkOut,
                        'status'      => $status,
                        'absent_note' => null,
                    ]
                );

                $processedCount++;
            }

            $this->info("✅ Backfill complete. $processedCount records processed.");

        } catch (\Exception $e) {
             Log::error("❌ ZKTeco Sync failed: " . $e->getMessage());
        } finally {
            $zk->disconnect();
        }
    }

    private function getDeviceIp()
    {
        return '203.17.65.230'; // Change to your device IP or config variable
    }
}
