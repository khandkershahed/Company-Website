<?php

namespace App\Http\Controllers\Admin;

use Helper;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin\Brand;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\Industry;
use App\Models\Admin\Solution;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\Admin\SolutionDetail;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SolutionController extends Controller
{
    public function index()
    {
        $solutions = SolutionDetail::orderBy('id', 'DESC')->select('name', 'id', 'slug', 'solution_template', 'status')->get();
        return view('metronic.pages.solution.index', compact('solutions'));
    }

    public function create()
    {
        $data['industries'] = Industry::select('industries.id', 'industries.title')->get();
        $data['brands']  = Brand::select('brands.id', 'brands.title')->get();
        $data['categories'] = Category::select('categories.id', 'categories.title')->get();
        return view('admin.pages.solutions.create', $data);
    }

    //Show Edit Form
    public function edit($id)
    {
        dd($id);
        $solution = SolutionDetail::find($id);
        return view('metronic.pages.solution.edit', ['solution' => $solution]);
    }


    //Store  Data
    public function store(Request $request)
    {
        Helper::imageDirectory();
        $validator = Validator::make(
            $request->all(),
            [
                'industry_id'      => 'required',
                'name'             => 'required',
                'header'           => 'required',
                'row_two_title'    => 'required',
                'row_two_header'   => 'required',
                'row_three_title'  => 'required',
                'row_three_header' => 'required',
                'row_five_title'   => 'required',
                'row_five_header'  => 'required',
                'banner_image'     => 'required|image|mimes:png,jpg,jpeg|max:10000',
            ],
            [
                'required' => 'The :attribute is required',
                'mimes' => 'The :attribute must be a file of type: PNG - JPEG - JPG'
            ],

        );
        $validator = Validator::make($request->all(), [
            'category_id'    => 'nullable|exists:faq_categories,id',
            'question'       => 'required|string|max:255',
            'answer'         => 'required|string',
            'tag'            => 'nullable|string|max:255',
            'order'          => 'integer|min:0|unique:faqs,order',
            'status'         => 'required|in:active,inactive',
            'views'          => 'integer|min:0',
            'related_faqs'   => 'nullable|json',
            'is_featured'    => 'boolean',
            'additional_info' => 'nullable|string',
        ], [
            'category_id.exists'        => 'The selected category does not exist.',
            'question.required'         => 'The question field is required.',
            'question.string'           => 'The question must be a string.',
            'question.max'              => 'The question may not be greater than :max characters.',
            'answer.required'           => 'The answer field is required.',
            'answer.string'             => 'The answer must be a string.',
            'tag.string'                => 'The tag must be a string.',
            'tag.max'                   => 'The tag may not be greater than :max characters.',
            'order.integer'             => 'The order must be an integer.',
            'order.min'                 => 'The order must be at least :min.',
            'order.unique'              => 'The order value has already been taken.',
            'status.required'           => 'The status field is required.',
            'status.in'                 => 'The status must be one of: active, inactive.',
            'views.integer'             => 'The views must be an integer.',
            'views.min'                 => 'The views must be at least :min.',
            'related_faqs.json'         => 'The related FAQs must be a valid JSON string.',
            'is_featured.boolean'       => 'The is featured field must be true or false.',
            'additional_info.string'    => 'The additional info must be a string.',
        ]);

        if ($validator->fails()) {
            foreach ($validator->messages()->all() as $message) {
                Session::flash('error', $message);
            }
            return redirect()->back()->withInput();
        }


        if ($validator->passes()) {
            $mainFile = $request->file('banner_image');
            $imgPath = storage_path('app/public/');
            $globalFunImg =  Helper::singleImageUpload($mainFile, $imgPath, 1800, 625);
            SolutionDetail::create([
                'row_one_id'             => $request->row_one_id,
                'row_four_id'            => $request->row_four_id,
                'solution_card_one_id'   => $request->solution_card_one_id,
                'solution_card_two_id'   => $request->solution_card_two_id,
                'solution_card_three_id' => $request->solution_card_three_id,
                'solution_card_four_id'  => $request->solution_card_four_id,
                'solution_card_five_id'  => $request->solution_card_five_id,
                'solution_card_six_id'   => $request->solution_card_six_id,
                'solution_card_seven_id' => $request->solution_card_seven_id,
                'solution_card_eight_id' => $request->solution_card_eight_id,
                'industry_id'            => $request->industry_id,
                'name'                   => $request->name,
                // 'slug'                   => $data['slug'],
                'added_by'               => Auth::user()->name,
                'header'                 => $request->header,
                'row_two_title'          => $request->row_two_title,
                'row_two_header'         => $request->row_two_header,
                'row_three_title'        => $request->row_three_title,
                'row_three_header'       => $request->row_three_header,
                'row_five_title'         => $request->row_five_title,
                'row_five_header'        => $request->row_five_header,
                'banner_image'           => $globalFunImg['status'] == 1 ?? $globalFunImg['file_name'],
            ]);


            Toastr::success('Data Inserted Successfully');
            $name = Auth::user()->name;
            $user_emails = User::where('role', 'admin')->whereIn('department', ['admin', 'site'])->pluck('email')->toArray();
            //dd($user_emails);

            //Notification::send($users, new EmployeeAdd($name , $employee_name));
            $data = [

                'emails'   => $user_emails,
                'added_by' => $name,
                'name'     => $request->name,
                'title'    => $request->header,
                'time'     => Carbon::now()->toDayDateTimeString(),
                'image'    => $globalFunImg['file_name'],


            ];
            return view('mail.solution_mail', $data);

            // $mail = Mail::to($user_emails);
            // if ($mail) {
            //     $mail->send(new SolutionPageMail($data));
            // } else {
            // }
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
            }
        }
        return redirect()->back();
    }

    //Update Data
    public function update(Request $request, $id)
    {

        Solution::find($id)->update([
            'title' => $request->title,
        ]);
        return redirect()->route('all.solution');
    }


    public function destroy($id)
    {
        $solution = Solution::find($id);

        if (File::exists(public_path('storage/') . $solution->image)) {
            File::delete(public_path('storage/') . $solution->image);
        }
        if (File::exists(public_path('storage/') . $solution->image)) {
            File::delete(public_path('storage/') . $solution->image);
        }
        if (File::exists(public_path('storage/thumb/') . $solution->image)) {
            File::delete(public_path('storage/thumb/') . $solution->image);
        }
        $solution->delete();
    }
}
