<?php

namespace App\Http\Controllers\Marketing;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client\Client;
use App\Models\Admin\Country;
use App\Models\Admin\Industry;
use App\Models\Admin\Product;
use App\Models\Admin\SolutionDetail;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;
use App\Models\Marketing\MarketingTeamTarget;

class MarketingTeamTargetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['marketingTeamTargets'] = MarketingTeamTarget::get();
        return view('admin.pages.marketingTeamTarget.all', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['users'] = User::where('role', 'sales')->select('users.id', 'users.name')->get();
        $data['countrys'] = Country::select('countries.id', 'countries.country_name')->get();
        $data['products'] = Product::select('products.id', 'products.name')->get();
        $data['clients'] = Client::select('clients.id', 'clients.name')->get();
        $data['industries'] = Industry::select('industries.id', 'industries.title')->get();
        $data['solutionDetails'] = SolutionDetail::select('solution_details.id', 'solution_details.name')->get();
        return view('admin.pages.marketingTeamTarget.add', $data);
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
                'country_id'           => 'nullable',
                'month'                => 'nullable',
                'year'                 => 'nullable',
                'product_id'           => 'nullable',
                'client_id'            => 'nullable',
                'industry_id'          => 'nullable',
                'solution_id'          => 'nullable',
                'email'                => 'nullable',
                'social'               => 'nullable',
                'call'                 => 'nullable',
                'press'                => 'nullable',
                'presentaion'          => 'nullable',
                'boost'                => 'nullable',
                'meet'                 => 'nullable',
                'blog'                 => 'nullable',
                'follow_up_meet'       => 'nullable',
                'negotiation'          => 'nullable',
                'deal_closeing'        => 'nullable',
                'work_order'           => 'nullable',
            ],
            [
                'required' => 'the :attribute must be present.'
            ]
        );

        if ($validator->passes()) {
            MarketingTeamTarget::create([
                'marketing_manager_id' => $request->marketing_manager_id,
                'country_id'           => $request->country_id,
                'month'                => $request->month,
                'year'                 => $request->year,
                'product_id'           => json_encode($request->product_id),
                'client_id'            => json_encode($request->client_id),
                'industry_id'          => json_encode($request->industry_id),
                'solution_id'          => json_encode($request->solution_id),
                'email'                => $request->email,
                'social'               => $request->social,
                'call'                 => $request->call,
                'press'                => $request->press,
                'presentaion'          => $request->presentaion,
                'boost'                => $request->boost,
                'meet'                 => $request->meet,
                'blog'                 => $request->blog,
                'follow_up_meet'       => $request->follow_up_meet,
                'negotiation'          => $request->negotiation,
                'deal_closeing'        => $request->deal_closeing,
                'work_order'           => $request->work_order,
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
        return view('admin.pages.marketingTeamTarget.edit')->with([
            'users' => User::where('role', 'sales')->select('users.id', 'users.name')->get(),
            'countrys' => Country::select('countries.id', 'countries.country_name')->get(),
            'marketingTeamTarget' => MarketingTeamTarget::find($id),
            'products' => Product::pluck('name', 'id'),
            'clients' => Client::pluck('name', 'id'),
            'industries' => Industry::pluck('title', 'id'),
            'solutionDetails' => SolutionDetail::pluck('name', 'id'),
        ]);
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
                'country_id'           => 'nullable',
                'month'                => 'nullable',
                'year'                 => 'nullable',
                'product_id'           => 'nullable',
                'client_id'            => 'nullable',
                'industry_id'          => 'nullable',
                'solution_id'          => 'nullable',
                'email'                => 'nullable',
                'social'               => 'nullable',
                'call'                 => 'nullable',
                'press'                => 'nullable',
                'presentaion'          => 'nullable',
                'boost'                => 'nullable',
                'meet'                 => 'nullable',
                'blog'                 => 'nullable',
                'follow_up_meet'       => 'nullable',
                'negotiation'          => 'nullable',
                'deal_closeing'        => 'nullable',
                'work_order'           => 'nullable',
            ],
            [
                'required' => 'the :attribute must be present.'
            ]
        );

        if ($validator->passes()) {
            MarketingTeamTarget::find($id)->update([
                'marketing_manager_id' => $request->marketing_manager_id,
                'country_id'           => $request->country_id,
                'month'                => $request->month,
                'year'                 => $request->year,
                'product_id'           => json_encode($request->product_id),
                'client_id'            => json_encode($request->client_id),
                'industry_id'          => json_encode($request->industry_id),
                'solution_id'          => json_encode($request->solution_id),
                'email'                => $request->email,
                'social'               => $request->social,
                'call'                 => $request->call,
                'press'                => $request->press,
                'presentaion'          => $request->presentaion,
                'boost'                => $request->boost,
                'meet'                 => $request->meet,
                'blog'                 => $request->blog,
                'follow_up_meet'       => $request->follow_up_meet,
                'negotiation'          => $request->negotiation,
                'deal_closeing'        => $request->deal_closeing,
                'work_order'           => $request->work_order,
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
        MarketingTeamTarget::find($id)->delete();
    }
}
