<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Admin\Rfq;
use App\Models\Admin\Region;
use Illuminate\Http\Request;
use App\Models\Admin\RfqProduct;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SalesForecastController extends Controller
{
    // public function salesForecast(Request $request)
    // {
    //     $baseQuery = Rfq::with('rfqQuotation')->where('rfq_type', 'rfq');

    //     // Filter by status if provided
    //     if ($request->filled('status')) {
    //         $baseQuery->where('status', $request->status);
    //     }

    //     $rfqs = (clone $baseQuery)->latest()->get();

    //     $countryWiseRfqs = (clone $baseQuery)
    //         ->whereNotNull('country')
    //         ->selectRaw('country, COUNT(*) as total')
    //         ->groupBy('country')
    //         ->orderBy('total', 'DESC')
    //         ->get();

    //     $pendings   = $rfqs->where('status', 'rfq_created');
    //     $quoteds    = $rfqs->where('status', 'quoted');
    //     $losts      = $rfqs->where('status', 'lost');
    //     $closeds    = $rfqs->where('status', 'closed');
    //     $deals      = $rfqs->where('status', 'deal');

    //     // Sum total_final_total_price from quotations for quoted RFQs
    //     $quoted_amount = $quoteds->flatMap(function ($rfq) {
    //         return $rfq->rfqQuotation->pluck('total_final_total_price');
    //     })->map(function ($price) {
    //         return floatval(preg_replace('/[^\d.]/', '', $price)); // Sanitize in case it's stored as string with currency symbols
    //     })->sum();

    //     return view('metronic.pages.sales.sales_forecast', [
    //         'quoteds'         => $quoteds,
    //         'pendings'        => $pendings,
    //         'losts'           => $losts,
    //         'closeds'         => $closeds,
    //         'deals'           => $deals,
    //         // 'rfq_count'       => $rfq_count,
    //         'countryWiseRfqs' => $countryWiseRfqs,
    //         // 'companies'       => $companies,
    //         'rfqs'            => $rfqs,
    //         'request'         => $request,
    //         'quoted_amount'   => $quoted_amount,
    //     ]);
    // }

    // public function filterForecast(Request $request)
    // {
    //     $baseQuery = Rfq::with('rfqQuotation')->where('rfq_type', 'rfq');

    //     if ($request->filled('country')) {
    //         $baseQuery->where('country', $request->country);
    //     }

    //     if ($request->filled('status')) {
    //         $baseQuery->where('status', $request->status);
    //     }

    //     $rfqs = $baseQuery->latest()->get();

    //     $pendings = $rfqs->where('status', 'rfq_created');
    //     $quoteds  = $rfqs->where('status', 'quoted');
    //     $losts    = $rfqs->where('status', 'lost');
    //     $closeds  = $rfqs->where('status', 'closed');
    //     $deals    = $rfqs->where('status', 'deal');

    //     return view('metronic.pages.sales.partials.forecastFiltered', [
    //         'quoteds'  => $quoteds,
    //         'pendings' => $pendings,
    //         'losts'    => $losts,
    //         'closeds'  => $closeds,
    //         'deals'    => $deals,
    //     ]);
    // }


    public function salesForecast(Request $request)
    {
        // FIX: Do NOT add ->latest() here. It causes the Group By error.
        $baseQuery = Rfq::with('rfqQuotation');

        // Filter by status if provided
        if ($request->filled('status')) {
            $baseQuery->where('status', $request->status);
        }

        // 1. Get Main List (Apply latest() ONLY here)
        $rfqs = (clone $baseQuery)->latest()->get();

        // 2. Categorize RFQs (Using Collection methods to avoid DB queries)
        $pendings = $rfqs->where('status', 'rfq_created');
        $quoteds  = $rfqs->where('status', 'quoted');
        $losts    = $rfqs->where('status', 'lost');
        $closeds  = $rfqs->where('status', 'closed');
        $deals    = $rfqs->whereIn('status', ['deal', 'won', 'order']);

        // 3. Calculate Values
        // Quoted Amount
        $quoted_amount = $quoteds->sum('quoted_price');
        if ($quoted_amount == 0) {
            $quoted_amount = $quoteds->flatMap(function ($rfq) {
                return $rfq->rfqQuotation->pluck('total_final_total_price');
            })->sum();
        }

        // Closed Deal Amount
        $closed_amount = $deals->sum('total_price');

        // Weighted Forecast Logic
        $total_opportunities = $deals->count() + $losts->count();
        $weighted_forecast_percent = $total_opportunities > 0 ? round(($deals->count() / $total_opportunities) * 100, 1) : 0;

        // 4. Contribution (Top Products)
        $contributionData = RfqProduct::select('brand_name', DB::raw('sum(total_price) as total'))
            ->whereHas('rfq', function ($q) {
                $q->where('create_date', '>=', Carbon::now()->subDays(30));
            })
            ->groupBy('brand_name')
            ->orderByDesc('total')
            ->take(5)
            ->get();

        // 5. Chart Data (Forecast vs Actual vs Target)
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $forecastData = [];
        $actualData = [];
        $targetData = [];

        foreach (range(1, 12) as $m) {
            // Actual Sales per Month
            $actual = $rfqs->whereIn('status', ['deal'])->filter(function ($item) use ($m) {
                return $item->sale_date && Carbon::parse($item->sale_date)->month == $m;
            })->sum('total_price');

            $actualData[] = $actual;
            $forecastData[] = $actual * 1.2; // Dummy forecast logic
            $targetData[] = 10000; // Dummy target
        }

        // 6. Country Wise Data
        // FIX: We clone $baseQuery (which has NO ordering) so Group By works
        $countryWiseRfqs = (clone $baseQuery)
            ->whereNotNull('country')
            ->select('country', DB::raw('count(*) as total'), DB::raw('sum(total_price) as value'))
            ->groupBy('country')
            ->orderByDesc('total')
            ->get();

        return view('metronic.pages.sales.sales_forecast', compact(
            'quoteds',
            'pendings',
            'losts',
            'closeds',
            'deals',
            'rfqs',
            'quoted_amount',
            'closed_amount',
            'weighted_forecast_percent',
            'contributionData',
            'countryWiseRfqs',
            'months',
            'forecastData',
            'actualData',
            'targetData'
        ));
    }

    public function filterForecast(Request $request)
    {
        $baseQuery = Rfq::with('rfqQuotation');

        if ($request->filled('country')) {
            $baseQuery->where('country', $request->country);
        }

        $rfqs = $baseQuery->latest()->get();

        $quoteds  = $rfqs->where('status', 'quoted');
        $deals    = $rfqs->whereIn('status', ['deal']);
        $losts    = $rfqs->where('status', 'lost');

        return view('metronic.pages.sales.partials.forecastFiltered', compact('quoteds', 'deals', 'losts'));
    }


    public function salesReport(Request $request)
    {
        $data = [
            'sales' => Rfq::where('rfq_type', 'sales')->latest('id')->get(),
        ];
        return view('metronic.pages.sales.sales_report', $data);
    }
    public function salesTarget(Request $request)
    {
        $data = [
            'sales' => Rfq::where('rfq_type', 'sales')->latest('id')->get(),
        ];
        return view('metronic.pages.sales.sales_target', $data);
    }
}
