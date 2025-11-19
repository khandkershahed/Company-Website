<?php

namespace App\Console\Commands;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin\Rfq;
use App\Mail\RfqReminderMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendRfqReminders extends Command
{
    protected $signature = 'rfq:send-reminders';
    protected $description = 'Send reminder emails for RFQs not responded to within 24h, 48h, and 72h';

    public function handle()
    {
        $this->info('=== Running RFQ Reminder Check ===');
        Log::info('=== Running RFQ Reminder Check ===');

        $reminderHours = [24, 48, 72];

        foreach ($reminderHours as $hours) {
            $this->sendRemindersForInterval($hours);
        }

        $this->info('=== RFQ Reminder Check Complete ===');
        Log::info('=== RFQ Reminder Check Complete ===');
    }

    private function sendRemindersForInterval(int $hours)
    {
        $this->info("🔍 Checking for RFQs pending for {$hours} hours...");
        Log::info("🔍 Checking for RFQs pending for {$hours} hours...");

        $column = "reminder_{$hours}h_sent";

        $rfqs = Rfq::where('status', 'rfq_created')
            ->whereRaw('TIMESTAMPDIFF(HOUR, created_at, NOW()) >= ?', [$hours])
            ->where($column, false)
            ->where('created_at', '>=', '2025-11-15 00:00:00') // Only RFQs from Nov 2025
            ->get();

        if ($rfqs->isEmpty()) {
            $this->info("No RFQs found for {$hours}-hour reminder.");
            Log::info("No RFQs found for {$hours}-hour reminder.");
            return;
        }

        $this->info("Found {$rfqs->count()} RFQs for {$hours}-hour reminder.");
        Log::info("Found {$rfqs->count()} RFQs for {$hours}-hour reminder.");

        foreach ($rfqs as $rfq) {
            try {
                foreach ($this->getAdminEmails() as $recipient) {
                    Mail::to($recipient)->queue(new RfqReminderMail($rfq, $hours));
                }

                $rfq->update([$column => true]);

                $this->info("✅ {$hours}-hour reminder sent for RFQ: {$rfq->rfq_code}");
                Log::info("✅ {$hours}-hour reminder sent for RFQ: {$rfq->rfq_code}");
            } catch (\Exception $e) {
                $this->error("❌ Failed to send {$hours}-hour reminder for RFQ {$rfq->rfq_code}: " . $e->getMessage());
                Log::error("❌ Failed to send {$hours}-hour reminder for RFQ {$rfq->rfq_code}: " . $e->getMessage());
            }
        }
    }

    private function getAdminEmails(): array
    {
        try {
            return User::inDepartments(['sales', 'marketing', 'super_admin'])
                ->whereIn('role', ['admin', 'manager'])
                ->pluck('email')
                ->toArray();
        } catch (Exception $e) {
            Log::error("❌ Failed to load admin emails: " . $e->getMessage());

            return [
                'ngenit@gmail.com',
                'opm@ngenitltd.com',
                'dev1.ngenit@gmail.com',
            ];
        }
    }
}
