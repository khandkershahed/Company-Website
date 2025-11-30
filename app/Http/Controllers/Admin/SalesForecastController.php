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
        $salemans = $this->sales_managers;

        // 2. Base Query
        // NOTE: We DO NOT add ->latest() here yet. We add it only when fetching the list.
        $query = Rfq::with(['rfqQuotation', 'rfqProducts']);

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

        // --- Country Wise Data (Aggregation) ---
        // We clone the query BEFORE fetching data.
        // IMPORTANT: We use reorder() to ensure no ORDER BY clause conflicts with GROUP BY.
        $countryWiseRfqs = (clone $query)
            ->reorder() // FIX: Clears any 'order by' (like latest) if it was accidentally applied
            ->whereNotNull('country')
            ->select('country', DB::raw('count(*) as total'), DB::raw('sum(total_price) as value'))
            ->groupBy('country')
            ->orderByDesc('total')
            ->get();

        // --- Main List Data ---
        // Now we apply latest() for the main list
        $rfqs = $query->latest()->get();

        // --- Metrics Calculations ---

        $pendings = $rfqs->where('status', 'rfq_created');
        $quoteds  = $rfqs->where('status', 'quoted');
        $losts    = $rfqs->where('status', 'lost');
        $deals    = $rfqs->whereIn('status', ['deal']);
        $closeds  = $rfqs->where('status', 'closed');

        // Quoted Amount
        $quoted_amount = $quoteds->sum('quoted_price');
        if ($quoted_amount == 0) {
            $quoted_amount = $quoteds->flatMap(fn($q) => $q->rfqQuotation->pluck('total_final_total_price'))->sum();
        }

        $closed_amount = $deals->sum('total_price');

        $total_opps = $deals->count() + $losts->count();
        $weighted_forecast_percent = $total_opps > 0 ? round(($deals->count() / $total_opps) * 100, 1) : 0;

        // Helper for Tabs
        $groupByCountry = function ($collection) {
            return $collection->groupBy('country')->map(function ($row) {
                return [
                    'country' => $row->first()->country,
                    'code' => 'bd', // You can implement actual code mapping here
                    'count' => $row->count(),
                    'value' => $row->sum('total_price')
                ];
            })->sortByDesc('count');
        };

        $countryQuoted = $groupByCountry($quoteds);
        $countryClosed = $groupByCountry($deals);
        $countryLost   = $groupByCountry($losts);

        // Contribution (Top Products)
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
            $targetData[] = 50000; // Example Target
            $forecastData[] = $val * 1.1; // Example Forecast
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
        // 1. Base Query
        $query = Rfq::with(['salesManL1', 'client'])
            ->where('rfq_type', 'sales'); // As per your requirement

        // 2. Filters
        if ($request->filled('country')) {
            $query->where('country', $request->country);
        }
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('rfq_code', 'like', "%$search%")
                    ->orWhere('company_name', 'like', "%$search%")
                    ->orWhere('name', 'like', "%$search%");
            });
        }
        // Date Range Filter (assuming format "MM/DD/YYYY - MM/DD/YYYY")
        if ($request->filled('date_range')) {
            $dates = explode(' - ', $request->date_range);
            if (count($dates) == 2) {
                $query->whereBetween('created_at', [
                    \Carbon\Carbon::parse($dates[0])->startOfDay(),
                    \Carbon\Carbon::parse($dates[1])->endOfDay()
                ]);
            }
        }

        // 3. Fetch Data
        $sales = $query->latest('created_at')->get();

        // 4. KPI Calculations
        $totalCountries = $sales->pluck('country')->unique()->count();

        // Sales Cycle (Days between Create and Sale)
        $avgSalesCycle = $sales->filter(fn($s) => $s->create_date && $s->sale_date)
            ->avg(function ($s) {
                return \Carbon\Carbon::parse($s->create_date)->diffInDays(\Carbon\Carbon::parse($s->sale_date));
            });

        // Performance Stats (Group by Salesman L1)
        $performerStats = $sales->groupBy('sales_man_id_L1')->map(function ($group) {
            return [
                'name' => $group->first()->salesManL1->name ?? 'Unknown',
                'country' => $group->first()->country ?? '-',
                'total_sales' => $group->sum('total_price'),
            ];
        })->sortByDesc('total_sales');

        $topPerformer = $performerStats->first();
        $lowestPerformer = $performerStats->last();

        // Average Achievement (Using Budget as Target for calculation)
        $avgAchievement = $sales->filter(fn($s) => $s->budget > 0)
            ->avg(fn($s) => ($s->total_price / $s->budget) * 100);

        // Dropdown Data
        $countries = Rfq::select('country')->distinct()->orderBy('country')->pluck('country');

        return view('metronic.pages.sales.sales_report', compact(
            'sales',
            'countries',
            'totalCountries',
            'avgSalesCycle',
            'topPerformer',
            'lowestPerformer',
            'avgAchievement'
        ));
    }
    public function salesTarget(Request $request)
    {
        $data = [
            'sales' => Rfq::where('rfq_type', 'sales')->latest('id')->get(),
        ];
        return view('metronic.pages.sales.sales_target', $data);
    }
}
