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
        // 1. Fetch Sales Managers for Dropdown
        $salemans = User::orderBy('name')->get(); // Adjust logic if needed

        // 2. Base Query
        $query = Rfq::with(['rfqQuotation', 'rfqProducts'])->latest();

        // --- Apply Filters to Query Builder ---

        // Filter: Country
        if ($request->filled('country')) {
            $query->where('country', $request->country);
        }

        // Filter: Salesperson
        if ($request->filled('salesperson')) {
            $query->where(function ($q) use ($request) {
                $q->where('sales_man_id_L1', $request->salesperson)
                    ->orWhere('sales_man_id_T1', $request->salesperson)
                    ->orWhere('sales_man_id_T2', $request->salesperson);
            });
        }

        // Filter: Time Period
        if ($request->filled('period')) {
            if ($request->period == 'month') {
                $query->whereMonth('created_at', Carbon::now()->month)
                    ->whereYear('created_at', Carbon::now()->year);
            } elseif ($request->period == 'quarter') {
                $query->whereBetween('created_at', [Carbon::now()->startOfQuarter(), Carbon::now()->endOfQuarter()]);
            } elseif ($request->period == 'year') {
                $query->whereYear('created_at', Carbon::now()->year);
            }
        } else {
            // Default YTD
            $query->whereYear('created_at', Carbon::now()->year);
        }

        // --- Execute Query for Main Data ---
        // Clone query for aggregations BEFORE getting the collection
        $countryQuery = clone $query;

        // Get Main Collection
        $rfqs = $query->get();

        // --- Calculations on Collection ---

        $pendings = $rfqs->where('status', 'rfq_created');
        $quoteds  = $rfqs->where('status', 'quoted');
        $losts    = $rfqs->where('status', 'lost');
        $deals    = $rfqs->whereIn('status', ['deal', 'won', 'order', 'delivery', 'delivery_completed']);

        // Fix for Closeds (variable was undefined in view error)
        $closeds  = $rfqs->where('status', 'closed');

        // Metrics
        $quoted_amount = $quoteds->sum('quoted_price');
        if ($quoted_amount == 0) {
            $quoted_amount = $quoteds->flatMap(fn($q) => $q->rfqQuotation->pluck('total_final_total_price'))->sum();
        }

        $closed_amount = $deals->sum('total_price');

        $total_opps = $deals->count() + $losts->count();
        $weighted_forecast_percent = $total_opps > 0 ? round(($deals->count() / $total_opps) * 100, 1) : 0;

        // --- Country Wise Data (Using Builder, NOT Collection) ---
        // Fixes "selectRaw does not exist" error
        $countryWiseRfqs = $countryQuery
            ->whereNotNull('country')
            ->select('country', DB::raw('count(*) as total'))
            ->groupBy('country')
            ->orderByDesc('total')
            ->get();

        // Helper for Tabs (Collection Grouping)
        $groupByCountry = function ($collection) {
            return $collection->groupBy('country')->map(function ($row) {
                return [
                    'country' => $row->first()->country,
                    'code' => 'bd', // Add logic for codes if needed
                    'count' => $row->count(),
                    'value' => $row->sum('total_price')
                ];
            })->sortByDesc('count');
        };

        $countryQuoted = $groupByCountry($quoteds);
        $countryClosed = $groupByCountry($deals);
        $countryLost   = $groupByCountry($losts);

        // Contribution
        $rfqIds = $rfqs->pluck('id');
        $contributionData = RfqProduct::select('brand_name', DB::raw('sum(total_price) as total'))
            ->whereIn('rfq_id', $rfqIds)
            ->groupBy('brand_name')
            ->orderByDesc('total')
            ->take(5)
            ->get();

        // Chart Data (Monthly)
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $actualData = [];
        $targetData = [];
        $forecastData = [];

        foreach (range(1, 12) as $m) {
            $val = $deals->filter(fn($i) => Carbon::parse($i->created_at)->month == $m)->sum('total_price');
            $actualData[] = $val;
            $targetData[] = 50000;
            $forecastData[] = $val * 1.1;
        }

        $allCountries = Rfq::select('country')->distinct()->orderBy('country')->pluck('country');

        return view('metronic.pages.sales.sales_forecast', compact(
            'rfqs',
            'salemans',
            'allCountries',
            'pendings',
            'quoteds',
            'losts',
            'deals',
            'closeds',
            'quoted_amount',
            'closed_amount',
            'weighted_forecast_percent',
            'countryQuoted',
            'countryClosed',
            'countryLost',
            'countryWiseRfqs',
            'contributionData',
            'months',
            'actualData',
            'targetData',
            'forecastData',
            'request'
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
