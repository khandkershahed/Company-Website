<?php

namespace App\Http\Controllers\Marketing;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Marketing\MarketingDmar;
use Illuminate\Support\Facades\Validator;

class MarketingDmarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data['MarketingDmars'] = MarketingDmar::get();
        // return view('metronic.pages.marketingDmar.index', $data);
        return view('metronic.pages.marketingDmar.index');
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
        return view('metronic.pages.MarketingDmar.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'marketing_manager_id' => 'nullable',
                'status'               => 'nullable',
                'area'                 => 'nullable',
                'quarter'              => 'nullable',
                'month'                => 'nullable',
                'week'                 => 'nullable',
                'date'                 => 'nullable',
                'client_type'          => 'nullable',
                'sector'               => 'nullable',
                'company_name'         => 'nullable',
                'activity'             => 'nullable',
                'current_status'       => 'nullable',
                'solution'             => 'nullable',
                'product'              => 'nullable',
                'phone'                => 'nullable',
                'contact'              => 'nullable',
                'comments_by_sales'    => 'nullable',
                'comments_by_ceo'      => 'nullable',
                'action_on_fail'       => 'nullable',
            ],
        );

        if ($validator->passes()) {
            MarketingDmar::create([
                'marketing_manager_id' => $request->marketing_manager_id,
                'status'               => $request->status,
                'area'                 => $request->area,
                'quarter'              => $request->quarter,
                'month'                => $request->month,
                'week'                 => $request->week,
                'date'                 => $request->date,
                'client_type'          => $request->client_type,
                'sector'               => $request->sector,
                'company_name'         => $request->company_name,
                'activity'             => $request->activity,
                'current_status'       => $request->current_status,
                'solution'             => $request->solution,
                'product'              => $request->product,
                'phone'                => $request->phone,
                'contact'              => $request->contact,
                'comments_by_sales'    => $request->comments_by_sales,
                'comments_by_ceo'      => $request->comments_by_ceo,
                'action_on_fail'       => $request->action_on_fail,
            ]);
            Toastr::success('Data Insert Successfully.');
        } else {
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
            }
        }
        return redirect()->back();
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
        $data['MarketingDmar'] = MarketingDmar::find($id);
        $data['users'] = User::where('role', 'sales')->select('users.id', 'users.name')->get();
        return view('admin.pages.MarketingDmar.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'marketing_manager_id' => 'nullable',
                'status'               => 'nullable',
                'area'                 => 'nullable',
                'quarter'              => 'nullable',
                'month'                => 'nullable',
                'week'                 => 'nullable',
                'date'                 => 'nullable',
                'client_type'          => 'nullable',
                'sector'               => 'nullable',
                'company_name'         => 'nullable',
                'activity'             => 'nullable',
                'current_status'       => 'nullable',
                'solution'             => 'nullable',
                'product'              => 'nullable',
                'phone'                => 'nullable',
                'contact'              => 'nullable',
                'comments_by_sales'    => 'nullable',
                'comments_by_ceo'      => 'nullable',
                'action_on_fail'       => 'nullable',
            ],
        );

        if ($validator->passes()) {
            MarketingDmar::find($id)->update([
                'marketing_manager_id' => $request->marketing_manager_id,
                'status'               => $request->status,
                'area'                 => $request->area,
                'quarter'              => $request->quarter,
                'month'                => $request->month,
                'week'                 => $request->week,
                'date'                 => $request->date,
                'client_type'          => $request->client_type,
                'sector'               => $request->sector,
                'company_name'         => $request->company_name,
                'activity'             => $request->activity,
                'current_status'       => $request->current_status,
                'solution'             => $request->solution,
                'product'              => $request->product,
                'phone'                => $request->phone,
                'contact'              => $request->contact,
                'comments_by_sales'    => $request->comments_by_sales,
                'comments_by_ceo'      => $request->comments_by_ceo,
                'action_on_fail'       => $request->action_on_fail,
            ]);
            Toastr::success('Data Updated Successfully.');
        } else {
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
            }
        }
        return redirect()->back();
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
}
