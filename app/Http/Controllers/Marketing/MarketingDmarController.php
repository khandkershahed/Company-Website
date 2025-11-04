<?php

namespace App\Http\Controllers\Marketing;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin\MarketingDmar;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MarketingDmarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = MarketingDmar::query();

        $sector_values = [];
        if (Auth::user()->role !== 'admin') {

            $query->where('user_id', Auth::id());
        }

        $dmars = $query->get();

        $data = [
            'dmars' => $dmars,
            'sector_values' => $sector_values,
        ];
        return view('metronic.pages.marketingDmar.index', $data);
    }

    public function filter(Request $request)
    {
        $query = MarketingDmar::query();

        if (Auth::user()->role !== 'admin') {
            $query->where('user_id', Auth::id());
        }

        if ($request->filled('date')) {
            $query->whereDate('date', $request->date);
        }

        if ($request->filled('month')) {
            $query->where('month', $request->month);
        }

        if ($request->filled('status')) {
            $query->where('current_status', $request->status);
        }

        $dmars = $query->get();

        // Return JSON response with HTML partial for table rows
        $html = view('metronic.pages.marketingDmar.partials.dmar_table_rows', compact('dmars'))->render();

        return response()->json(['html' => $html]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['users'] = User::where('role', 'sales')->select('id', 'name')->get();
        // return view('admin.pages.MarketingDmar.add', $data);
        return view('metronic.pages.marketingDmar.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate($this->validationRules());
            MarketingDmar::create($data);

            Session::flash('success', 'Marketing DMAR created successfully.');
            return redirect()->route('admin.marketing-dmar.index');
        } catch (Exception $e) {
            return redirect()->back()->withInput()
                ->with('error', 'Failed to create Marketing DMAR: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['marketingDmar'] = MarketingDmar::find($id);
        return view('metronic.pages.marketingDmar.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MarketingDmar $marketing_dmar)
    {
        try {
            $data = $request->validate($this->validationRules());
            $marketing_dmar->update($data);
            Session::flash('success', 'Marketing DMAR updated successfully.');
            return redirect()->route('admin.marketing-dmar.index');
        } catch (Exception $e) {
            Session::flash('error', 'Failed to update Marketing DMAR: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MarketingDmar::find($id)->delete();
    }

    private function validationRules()
    {
        return [
            'user_id' => 'nullable|exists:users,id',
            'year' => 'nullable|digits:4',
            'date' => 'nullable|date',
            'month' => 'nullable|string|max:10',
            'activity' => 'nullable|string|max:50',
            'company' => 'nullable|string|max:100',
            'service' => 'nullable|string|max:50',
            'products' => 'nullable|string|max:100',
            'tentative' => 'nullable|numeric',
            'comments' => 'nullable|string',
            'action_on_fail' => 'nullable|string|max:100',
            'current_status' => 'nullable|string|max:50',
            'client_type' => 'nullable|string|max:50',
            'sector' => 'nullable|string',
            'sub_sector' => 'nullable|string',
            'area' => 'nullable|string',
            'contact_name' => 'nullable|string|max:100',
            'contact_number' => 'nullable|string|max:50',
            'contact_email' => 'nullable|email|max:100',
            'contact_address' => 'nullable|string',
            'contact_website' => 'nullable|string|max:255',
            'contact_social' => 'nullable|string',
        ];
    }

    public function multiDelete(Request $request)
    {
        $ids = $request->input('ids');
        if ($ids && is_array($ids)) {
            MarketingDmar::whereIn('id', $ids)->delete();
            return redirect()->back()->with('success', 'Selected entries deleted successfully.');
        }

        return redirect()->back()->with('warning', 'No entries selected.');
    }
}
