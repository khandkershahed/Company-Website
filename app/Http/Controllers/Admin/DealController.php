<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DealController extends Controller
{
    public function quickDealCreate()
    {
        return view('metronic.pages.deal.quick_create');
    }
}
