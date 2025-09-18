<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Admin\Rfq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalesForecastController extends Controller
{
    public function salesForecast(Request $request)
    {
        $baseQuery = Rfq::where('rfq_type', 'rfq');

        // Count total RFQs

        $companies = (clone $baseQuery)->whereNotNull('company_name')->distinct('company_name')->pluck('company_name');
        $countries = (clone $baseQuery)->whereNotNull('country')->distinct('country')->pluck('country');
        // Get new customers where 'confirmation' is null
        $new_customers = (clone $baseQuery)->whereNull('confirmation')->where('created_at', '>=', Carbon::now()->subMonths(1))->latest()->get();

        // Apply filters dynamically
        if ($request->filled('year')) {
            $baseQuery->whereYear('created_at', $request->year);
        } elseif (!$request->filled('month')) {
            $baseQuery->where('created_at', '>=', '2025-01-01');
        }

        if ($request->filled('month')) {
            $monthNumber = date('m', strtotime($request->month));
            $baseQuery->whereMonth('created_at', $monthNumber);
            if (!$request->filled('year')) {
                $baseQuery->where('created_at', '>=', '2025-08-17');
            }
        }

        if ($request->filled('status')) {
            $baseQuery->where('status', $request->status);
        }

        // Fetch filtered RFQs
        $rfq_count = (clone $baseQuery)->count();
        $rfqs = $baseQuery->latest()->get();
        // Separate RFQs by status
        $pendings = $rfqs->where('status', 'rfq_created');
        $quoteds  = $rfqs->where('status', 'quoted');
        $losts    = $rfqs->where('status', 'lost');
        $data = [];
        return view('metronic.pages.rfq.sales_forecast', $data);
    }
}
