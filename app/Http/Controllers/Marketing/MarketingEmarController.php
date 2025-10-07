<?php

namespace App\Http\Controllers\Marketing;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use App\Models\Client\Client;
use Illuminate\Http\Request;

class MarketingEmarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'emails' => [],
            'clients'  => Client::select('name','email','id','company_name')->where('user_type', 'client')->orWhere('user_type', 'client')->get(),
            'products' => Product::select('name','id')->where('status','active')->where('product_status','product')->get(),
        ];
        return view('metronic.pages.marketingEmar.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
