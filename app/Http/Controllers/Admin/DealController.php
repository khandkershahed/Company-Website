<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Rfq;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client\Client;
use App\Models\Partner\Partner;

class DealController extends Controller
{

    public function index()
    {
        $data['deals'] = Rfq::where('rfq_type', 'deal')->latest('id')->get();
        return view('metronic.pages.deal.index', $data);
    }

    public function create()
    {
        $data['users'] = User::whereJsonContains('department', 'business')->orderBy('id', 'DESC')->get(['id', 'name']);
        return view('metronic.pages.deal.create', $data);
    }

    public function quickDealCreate(Request $request)
    {
        return view('metronic.pages.deal.quick_create');
    }
}
