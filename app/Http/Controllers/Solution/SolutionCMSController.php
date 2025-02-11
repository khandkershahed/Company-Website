<?php

namespace App\Http\Controllers\Solution;

use Illuminate\Http\Request;
use App\Models\Admin\Industry;
use App\Http\Controllers\Controller;
use App\Models\Admin\SolutionDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SolutionCMSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $solutions = SolutionDetail::orderBy('id', 'DESC')->get();
        return view('metronic.pages.solution.index', [
            'solutions' => SolutionDetail::orderBy('id', 'DESC')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('metronic.pages.solution.create', [
            'industries' => Industry::select('industries.id', 'industries.title')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // dd(json_encode($request->industry_id));
        $validator = Validator::make($request->all(), [
            'name'              => 'required|string|unique:solution_details,name',
            'industry_id'       => 'required',
            'solution_template' => 'required',
        ], [
            'unique'    => 'This Solution Name has already been taken.',
            'required'  => 'The :attribute field is required.',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            foreach ($errors as $error) {
                Session::flash('error', $error, 'Failed', ['timeOut' => 30000]);
            }
            return redirect()->back()->withInput();
        }

        $solution = SolutionDetail::create([
            'name'              => $request->name,
            'industry_id'       => json_encode($request->industry_id),
            'solution_template' => $request->solution_template,
            'added_by'          => Auth::user()->name,
            'status'            => 'draft',
            'created_at'        => now(),
        ]);
        // Session::flash('success', 'You have subscribed successfully in our website!');
        return redirect()->route('admin.solution-cms.edit',$solution->id);
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
        $solution = SolutionDetail::find($id);
        return view('metronic.pages.solution.edit', ['solution' => $solution]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function templateStore(Request $request)
    {

        $card_id = $request->card_id;
        $nfc_card = NfcCard::findOrFail($card_id);

        $nfc_card->update([
            'nfc_template'   => $request->nfc_template,
        ]);

        $data = [
            'nfc_card' => NfcCard::with(
                'nfcData',
                'nfcCompany',
                'nfcGallery',
                'nfcProduct',
                'nfcService',
                'nfcTestimonial',
                'nfcMessages',
                'nfcScan',
                'virtualCard',
                'nfcBanner',
                'nfcSeo',
                'shippingDetails'
            )->where('id', $card_id)->first(),
        ];

        $template_view = view('nfc.form_partials.vcard_template', $data)->render();

        // return response()->json(['template_view' => $template_view]);
        return response()->json([
            'status' => true,
            'template_view' => $template_view,
        ]);
    }



}
