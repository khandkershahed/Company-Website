<?php

namespace App\Http\Controllers\Admin;

// use Image;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Client\Client;
use App\Models\Admin\Industry;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Mail\ClientApprovalMail;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Notifications\ClientRegister;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;

class ClientDatabaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['clientDatabases'] = Client::latest()->get();
        // return view('admin.pages.clientDatabase.all', $data);
        return view('metronic.pages.clientDatabase.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['industrys'] = Industry::select('industries.id', 'industries.title')->get();
        return view('admin.pages.clientDatabase.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::where('role', 'admin')->get();
        $validator = Validator::make(
            $request->all(),
            [
                'name'     => 'required',
                'email'    => 'required|unique:clients',
                'password' => 'required',
            ],
            [
                'unique' => 'This Email ID has already been taken.',
            ],

        );
        if (!empty($request->photo)) {
            $destination = 'upload/Profile/user/' . $request->photo;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $image = $request->file('photo');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $path = public_path('upload/Profile/user/' . $name_gen);
            Image::make($image)->resize(176, 176)->save($path);
            $data['photo'] = $name_gen;
        } else {
            $data['photo'] = $request->photo;
        }
        if ($validator->passes()) {
            $client = Client::create([
                'name'                     => $request->name,
                'username'                 => $request->username,
                'email'                    => $request->email,
                'client_id'                => $request->client_id,
                'about'                    => $request->about,
                'photo'                    => $request->photo,
                'support_tier'             => $request->support_tier,
                'support_tier_description' => $request->support_tier_description,
                'phone'                    => $request->phone,
                'address'                  => $request->address,
                'city'                     => $request->city,
                'country'                  => $request->country,
                'postal'                   => $request->postal,
                'last_seen'                => $request->last_seen,
                'company_name'             => $request->company_name,
                'status'                   => (!empty($request->status) ? $request->status : 'inactive'),
                'password'                 => Hash::make($request->password),
            ]);


            Notification::send($user, new ClientRegister($request->name));
            Toastr::success('Client have registered Successfully');
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
        $data['clientDatabase'] = Client::find($id);
        $data['industrys'] = Industry::select('industries.id', 'industries.title')->get();
        return view('admin.pages.clientDatabase.edit', $data);
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
                'client_type'    => 'nullable',
                'sector'         => 'nullable',
                'sub_sector'     => 'nullable',
                'area'           => 'nullable',
                'contact_person' => 'nullable',
                'designation'    => 'nullable',
                'department'     => 'nullable',
                'official_phone' => 'nullable',
                'client_status'  => 'nullable',
                'tier'           => 'nullable',
                'comments'       => 'nullable',
            ],
        );

        if ($validator->passes()) {
            Client::find($id)->update([
                'client_type'    => 'corporate',
                'sector'         => $request->sector,
                'sub_sector'     => $request->sub_sector,
                'company_name'   => $request->company_name,
                'address'        => $request->address,
                'area'           => $request->area,
                'contact_person' => $request->contact_person,
                'designation'    => $request->designation,
                'department'     => $request->department,
                'official_phone' => $request->official_phone,
                'phone'          => $request->phone,
                'email'          => $request->email,
                'client_status'  => $request->client_status,
                'tier'           => $request->tier,
                'comments'       => $request->comments,

            ]);
            Toastr::success('Data Update Successfully.');
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
        Client::find($id)->delete();
    }

    public function clientStatus(Request $request)
    {
        $client = Client::where('id', $request->id)->first();
        $result = '';

        if ($request->mode == 'true') {
            $client->update(['status' => 'inactive']);
            $result = 'inactive';
        } else {
            $client->update(['status' => 'active']);
            $result = 'active';
        }
        $data = [
            'name'            => $client->title,
            'email'           => $client->email,
            'phone'           => $client->phone,
            'user_type'       => $client->user_type,
            'password'        => $client->password,
        ];
        Mail::to($client->email)->send(new ClientApprovalMail($data));

        return response()->json(['msg' => 'Successfully Updated Status', 'status' => true, 'client_status' => $result]);
    }

}
