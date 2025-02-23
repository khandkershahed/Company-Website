<?php

namespace App\Http\Controllers\Admin;

use App\Rules\Recaptcha;
use Illuminate\Http\Request;
use App\Models\Admin\Contact;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['contacts'] = Contact::where('type', '=', 'contact')->orderBy('id', 'DESC')->get();
        return view('metronic.pages.contact.index', $data);
        // return view('admin.pages.contact.all', $data);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'                 => 'required|string|max:150',
            'email'                => 'required|email|max:150',
            'phone'                => 'nullable|string|max:20',
            'subject'              => 'nullable|string',
            'message'              => 'nullable|string',
            'ip_address'           => 'nullable|ip|max:100',
            'g-recaptcha-response' => ['required', new Recaptcha],
        ], [
            'name.required'     => 'The name field is required.',
            'name.string'       => 'The name must be a string.',
            'name.max'          => 'The name may not be greater than :max characters.',
            'email.required'    => 'The email field is required.',
            'email.email'       => 'Please enter a valid email address.',
            'email.max'         => 'The email may not be greater than :max characters.',
            'phone.string'      => 'The phone must be a string.',
            'phone.max'         => 'The phone may not be greater than :max characters.',
            'phone.regex'       => 'The phone field must contain only numeric characters and must be proper number.',
            'subject.string'    => 'The subject must be a string.',
            'message.string'    => 'The message must be a string.',
            'ip_address.ip'     => 'Please enter a valid IP address.',
            'ip_address.max'    => 'The IP address may not be greater than :max characters.',
            'g-recaptcha-response.required' => 'The reCAPTCHA field is required.',
        ]);

        if ($request->filled('phone')) {
            $validator->sometimes('phone', 'regex:/^[0-9]+$/i', function ($input) {
                return $input->phone;
            });
        }

        if ($validator->fails()) {
            foreach ($validator->messages()->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 3000]);
            }
            return redirect()->back()->withInput();
        }

        $typePrefix = ($request->type == 'contact') ? 'MSG' : 'SPRT';
        $today = date('dmy');
        $lastCode = Contact::where('code', 'like', $typePrefix . '-' . $today . '%')
            ->where('type', $request->type)
            ->orderBy('id', 'desc')
            ->first();

        $newNumber = $lastCode ? (int) explode('-', $lastCode->code)[2] + 1 : 1;
        $code = $typePrefix . '-' . $today . '-' . $newNumber;

        Contact::create([
            'code'       => $code,
            'name'       => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'company'    => $request->company,
            'address'    => $request->address,
            'message'    => $request->message,
            'ip_address' => request()->ip(),
            'msg_type'   => $request->msg_type,
            'country'    => $request->country,
            'status'     => 'pending',
            'type'       => $request->type,
        ]);

        Toastr::success('Thank You. We have received your message. We will contact with you very soon.');
        return redirect()->back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['contact'] = Contact::find($id);
        return view('metronic.pages.contact.edit', $data);
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
                'name'  => 'required|max: 70',
                'phone' => 'required|max: 70',
                'email' => 'required|max: 70',
            ],
        );

        if ($validator->passes()) {
            Contact::find($id)->update([
                'name'       => $request->name,
                'email'      => $request->email,
                'phone'      => $request->phone,
                'company'    => $request->company,
                'address'    => $request->address,
                'message'    => $request->message,
                'ip_address' => request()->ip(),
                'msg_type'   => $request->msg_type,
                'country'    => $request->country,
                'status'     => 'pending',
                'type'       => $request->type,
            ]);
            Toastr::success('Data Update Successfully');
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
        Contact::find($id)->delete();
    }

    // public function Support()
    // {
    //     $data['contacts'] = Contact::where('type', '=', 'support')->orderBy('id', 'DESC')->get();
    //     return view('admin.pages.contact.support', $data);
    // }
}
