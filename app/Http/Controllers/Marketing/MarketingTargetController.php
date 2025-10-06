<?php

namespace App\Http\Controllers\Marketing;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin\Country;
use App\Models\Admin\Product;
use App\Models\Client\Client;
use App\Models\Admin\Industry;
use App\Http\Controllers\Controller;
use App\Models\Admin\SolutionDetail;

class MarketingTargetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['users'] = User::where('role', 'sales')->select('users.id', 'users.name')->get();
        $data['countrys'] = Country::select('countries.id', 'countries.country_name')->get();
        $data['products'] = Product::select('products.id', 'products.name')->get();
        $data['clients'] = Client::select('clients.id', 'clients.name')->get();
        $data['industries'] = Industry::select('industries.id', 'industries.title')->get();
        $data['solutionDetails'] = SolutionDetail::select('solution_details.id', 'solution_details.name')->get();
        return view('metronic.pages.marketingTarget.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
