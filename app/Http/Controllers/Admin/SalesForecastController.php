<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Admin\Rfq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Region;

class SalesForecastController extends Controller
{
    public function salesForecast(Request $request)
    {
        $baseQuery = Rfq::with('rfqQuotation')->where('rfq_type', 'rfq');

        // Filter by status if provided
        if ($request->filled('status')) {
            $baseQuery->where('status', $request->status);
        }

        $rfqs = (clone $baseQuery)->latest()->get();

        $rfq_count = $rfqs->count();

        $companies = (clone $baseQuery)->whereNotNull('company_name')->pluck('company_name')->unique();
        $countryWiseRfqs = (clone $baseQuery)
            ->whereNotNull('country')
            ->selectRaw('country, COUNT(*) as total')
            ->groupBy('country')
            ->orderBy('total', 'DESC')
            ->get();
        $regions = Region::orderBy('region_name', 'ASC')->get();

        $pendings   = $rfqs->where('status', 'rfq_created');
        $quoteds    = $rfqs->where('status', 'quoted');
        $losts      = $rfqs->where('status', 'lost');
        $closeds    = $rfqs->where('status', 'closed');
        $deals      = $rfqs->where('status', 'deal');

        // Sum total_final_total_price from quotations for quoted RFQs
        $quoted_amount = $quoteds->flatMap(function ($rfq) {
            return $rfq->rfqQuotation->pluck('total_final_total_price');
        })->map(function ($price) {
            return floatval(preg_replace('/[^\d.]/', '', $price)); // Sanitize in case it's stored as string with currency symbols
        })->sum();

        return view('metronic.pages.sales.sales_forecast', [
            'quoteds'         => $quoteds,
            'pendings'        => $pendings,
            'losts'           => $losts,
            'closeds'         => $closeds,
            'deals'           => $deals,
            'rfq_count'       => $rfq_count,
            'countryWiseRfqs' => $countryWiseRfqs,
            'companies'       => $companies,
            'rfqs'            => $rfqs,
            'request'         => $request,
            'quoted_amount'   => $quoted_amount,
            'regions'         => $regions,
        ]);
    }

    public function filterForecast(Request $request)
    {
        $baseQuery = Rfq::with('rfqQuotation')->where('rfq_type', 'rfq');

        if ($request->filled('country')) {
            $baseQuery->where('country', $request->country);
        }

        if ($request->filled('status')) {
            $baseQuery->where('status', $request->status);
        }

        $rfqs = $baseQuery->latest()->get();

        $pendings = $rfqs->where('status', 'rfq_created');
        $quoteds  = $rfqs->where('status', 'quoted');
        $losts    = $rfqs->where('status', 'lost');
        $closeds  = $rfqs->where('status', 'closed');
        $deals    = $rfqs->where('status', 'deal');

        return view('metronic.pages.sales.partials.forecastFiltered', [
            'quoteds'  => $quoteds,
            'pendings' => $pendings,
            'losts'    => $losts,
            'closeds'  => $closeds,
            'deals'    => $deals,
        ]);
    }


    public function salesReport(Request $request)
    {
        return view('metronic.pages.sales.sales_report');
    }
}
