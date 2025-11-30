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
        // Base Query
        $baseQuery = Rfq::with('rfqQuotation')->latest();

        // Filter by status if provided
        if ($request->filled('status')) {
            $baseQuery->where('status', $request->status);
        }

        $rfqs = (clone $baseQuery)->get();

        // 1. Categorize RFQs
        $pendings = $rfqs->where('status', 'rfq_created');
        $quoteds  = $rfqs->where('status', 'quoted');
        $losts    = $rfqs->where('status', 'lost');
        $closeds  = $rfqs->where('status', 'closed'); // Or 'won'
        $deals    = $rfqs->whereIn('status', ['deal', 'won', 'order']);

        // 2. Calculate Values
        // Quoted Amount (Pipeline)
        $quoted_amount = $quoteds->sum('quoted_price'); // Assuming 'quoted_price' column exists and is populated
        if ($quoted_amount == 0) {
            // Fallback if column is empty, sum from relation
            $quoted_amount = $quoteds->flatMap(function ($rfq) {
                return $rfq->rfqQuotation->pluck('total_final_total_price');
            })->sum();
        }

        // Closed Deal Amount (Revenue)
        $closed_amount = $deals->sum('total_price');

        // 3. Weighted Forecast Logic (Example)
        // Probability: Quoted (50%), Negotiating (80%), Won (100%)
        // For now, let's just use the ratio of Won / (Won + Lost)
        $total_opportunities = $deals->count() + $losts->count();
        $weighted_forecast_percent = $total_opportunities > 0 ? round(($deals->count() / $total_opportunities) * 100, 1) : 0;


        // 4. Contribution (Top Products/Categories) for the Widget
        // We need data for the chart and list
        $contributionData = RfqProduct::select('brand_name', DB::raw('sum(total_price) as total'))
            ->whereHas('rfq', function ($q) {
                // Filter for relevant RFQs (e.g., deals only or all pipeline)
                $q->where('create_date', '>=', Carbon::now()->subDays(30));
            })
            ->groupBy('brand_name')
            ->orderByDesc('total')
            ->take(5)
            ->get();

        // 5. Chart Data (Forecast vs Actual vs Target) - Monthly
        // This feeds the main bar chart
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $forecastData = []; // Placeholder logic
        $actualData = [];
        $targetData = [];

        foreach (range(1, 12) as $m) {
            // Example Logic: Actual = Deals closed in month M
            $actual = $rfqs->where('status', 'deal')->filter(function ($item) use ($m) {
                return $item->sale_date && Carbon::parse($item->sale_date)->month == $m;
            })->sum('total_price');

            $actualData[] = $actual;
            $forecastData[] = $actual * 1.2; // Dummy forecast logic
            $targetData[] = 10000; // Dummy target
        }


        // 6. Country Wise Data (For Map/List)
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

    // Filter Method (AJAX)
    public function filterForecast(Request $request)
    {
        // This handles the AJAX reload for the main table tabs
        $baseQuery = Rfq::with('rfqQuotation');

        if ($request->filled('country')) {
            $baseQuery->where('country', $request->country);
        }
        // Add other filters if needed

        $rfqs = $baseQuery->latest()->get();

        $quoteds  = $rfqs->where('status', 'quoted');
        $deals    = $rfqs->whereIn('status', ['deal', 'won', 'order']);
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
