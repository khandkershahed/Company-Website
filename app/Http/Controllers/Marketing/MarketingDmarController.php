<?php

namespace App\Http\Controllers\Marketing;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin\MarketingDmar;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;
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
        $data['dmars'] = MarketingDmar::get();
        // return view('metronic.pages.marketingDmar.index', $data);
        return view('metronic.pages.marketingDmar.index',$data);
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
         try {
            $data = $request->validate($this->validationRules());
            MarketingDmar::create($data);

            Session::flash('success', 'Marketing DMAR created successfully.');
            return redirect()->route('marketing-dmar.index');
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
}
