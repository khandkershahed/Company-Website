<?php

namespace App\Http\Controllers\Admin;


use Helper;
use DateTime;
// use App\Http\Middleware\Role;
use DatePeriod;
use DateInterval;
use Carbon\Carbon;
use App\Models\User;
use Rats\Zkteco\Lib\ZKTeco;
use App\Models\Admin\Notice;
use Illuminate\Http\Request;
use App\Models\Admin\Country;
use App\Models\Admin\Product;
use App\Models\Client\Project;
use App\Models\KPI\Attendance;
use App\Notifications\AdminAdd;
use App\Models\Client\SupportCase;
use App\Notifications\EmployeeAdd;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Models\Admin\EmployeeLeave;
use App\Http\Controllers\Controller;
use App\Models\Client\ClientSupport;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
use App\Models\Admin\EmployeeCategory;
use App\Models\Admin\LeaveApplication;
use Illuminate\Support\Facades\Validator;
use App\Mail\EmployeeAdd as MailEmployeeAdd;
use Illuminate\Support\Facades\Notification;
use MehediJaman\LaravelZkteco\LaravelZkteco;

class AdminController extends Controller
{

    public function device_ip()
    {
        if (session()->exists('dip')) {
            $deviceip = session('dip');
        } else {
            session()->put('dip', '203.17.65.230');
            $deviceip = '203.17.65.230';
        }
        return $deviceip;
    }

    public function markNotification(Request $request)
    {
        auth()->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();

        return response()->noContent();
    }

    public function markAsRead(Request $request, $id)
    {
        $notification = auth()->user()->unreadNotifications->find($id);
        if ($notification) {
            $notification->markAsRead();
            $notification->update([
                'read_at' => Carbon::now(),

            ]);
        }
        return redirect()->back();
    }



    public function AdminDashboard()
    {
        $userId = Auth::id();

        // Today's Attendance
        $todayAttendance = Attendance::where('user_id', $userId)
            ->whereDate('date', Carbon::today())
            ->first();

        /**
         * This Month Attendance
         */
        $attendanceThisMonthsRaw = Attendance::where('user_id', $userId)
            ->whereMonth('date', Carbon::now()->month)
            ->whereYear('date', Carbon::now()->year)
            ->get()
            ->keyBy('date');

        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        $attendanceThisMonths = [];

        for ($date = $startOfMonth->copy(); $date->lte($endOfMonth); $date->addDay()) {
            $dateString = $date->toDateString();
            $dayOfWeek = $date->format('l');

            if ($dayOfWeek === 'Friday') {
                $attendanceThisMonths[$dateString] = [
                    'date' => $dateString,
                    'check_in' => null,
                    'check_out' => null,
                    'status' => 'Friday',
                ];
            } elseif ($attendanceThisMonthsRaw->has($dateString)) {
                $record = $attendanceThisMonthsRaw[$dateString];
                $attendanceThisMonths[$dateString] = [
                    'date' => $dateString,
                    'check_in' => $record->check_in,
                    'check_out' => $record->check_out,
                    'status' => $record->status ?? 'Present',
                ];
            } else {
                $attendanceThisMonths[$dateString] = [
                    'date' => $dateString,
                    'check_in' => null,
                    'check_out' => null,
                    'status' => 'Absent',
                ];
            }
        }

        /**
         * Last Month Attendance
         */
        $lastMonth = Carbon::now()->subMonth();
        $attendanceLastMonthsRaw = Attendance::where('user_id', $userId)
            ->whereMonth('date', $lastMonth->month)
            ->whereYear('date', $lastMonth->year)
            ->get()
            ->keyBy('date');

        $startOfLastMonth = $lastMonth->copy()->startOfMonth();
        $endOfLastMonth = $lastMonth->copy()->endOfMonth();
        $attendanceLastMonths = [];

        for ($date = $startOfLastMonth->copy(); $date->lte($endOfLastMonth); $date->addDay()) {
            $dateString = $date->toDateString();
            $dayOfWeek = $date->format('l');

            if ($dayOfWeek === 'Friday') {
                $attendanceLastMonths[$dateString] = [
                    'date' => $dateString,
                    'check_in' => null,
                    'check_out' => null,
                    'status' => 'Friday',
                ];
            } elseif ($attendanceLastMonthsRaw->has($dateString)) {
                $record = $attendanceLastMonthsRaw[$dateString];
                $attendanceLastMonths[$dateString] = [
                    'date' => $dateString,
                    'check_in' => $record->check_in,
                    'check_out' => $record->check_out,
                    'status' => $record->status ?? 'Present',
                ];
            } else {
                $attendanceLastMonths[$dateString] = [
                    'date' => $dateString,
                    'check_in' => null,
                    'check_out' => null,
                    'status' => 'Absent',
                ];
            }
        }

        // Late check-in records for this month (after 09:06)
        $lateCounts = Attendance::where('user_id', $userId)
            ->whereMonth('date', Carbon::now()->month)
            ->whereYear('date', Carbon::now()->year)
            ->whereTime('check_in', '>', '09:06:00')
            ->orderBy('date', 'ASC')
            ->get();

        return view('metronic.pages.dashboard.main_dashboard', compact(
            'todayAttendance',
            'attendanceThisMonths',
            'attendanceLastMonths',
            'lateCounts'
        ));
    }



    public function AdminLogin()
    {
        return view('admin.auth.login');
    } // End Mehtod

    public function AdminDestroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    } // End Mehtod

    public function AdminProfile(Request $request)
    {

        $user = Auth::user();
        // Accept month input (name or number), default to current month
        $monthInput = $request->input('month', now()->format('F')); // e.g. “October” or “10”
        $year = now()->year;  // default to current year

        // Convert month name/format into numeric month (1–12)
        if (is_numeric($monthInput)) {
            $month = intval($monthInput);
            if ($month < 1 || $month > 12) {
                abort(400, 'Invalid month number.');
            }
        } else {
            // Try parsing month name
            $timestamp = strtotime("1 " . $monthInput);
            if ($timestamp === false) {
                abort(400, 'Invalid month name.');
            }
            $month = intval(date('m', $timestamp));
        }
        $leaveApplications = LeaveApplication::where('employee_id', $user->id)->get();
        $sicks = $leaveApplications->where('type_of_leave', 'sick');
        $earneds = $leaveApplications->where('type_of_leave', 'earned');
        $casuals = $leaveApplications->where('type_of_leave', 'casual');
        $pendings = $leaveApplications->where('status', 'pending');
        $attendances = Attendance::where('user_id', $user->id)
            ->whereMonth('date', $month)
            ->whereYear('date', $year)
            ->get();

        $data = [
            'user' => $user,
            'employees' => User::with('employeeStatus')->get(['id', 'name']),
            'employeeCategories' => EmployeeCategory::with('employee')->get(['id', 'name']),
            'attendances'   => $attendances,
            'selectedMonth' => $monthInput,
            'sicks'         => $sicks,
            'earneds'       => $earneds,
            'casuals'       => $casuals,
            'pendings'      => $pendings,
        ];
        return view('metronic.pages.profile.index', $data);
        // return view('admin.pages.profile.index', compact('data'));
    } // End Mehtod

    public function AdminProfileStore(Request $request)
    {
        // return $data;
        $id = Auth::user()->id;
        $profile = User::find($id);
        $data = $request->all();

        if ($request->photo) {
            $destination = 'upload/Profile/admin/' . $profile->photo;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $image = $request->file('photo');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $path = public_path('upload/Profile/admin/' . $name_gen);
            Image::make($image)->resize(376, 282)->save($path);
            $data['photo'] = $name_gen;
        }
        if ($request->sign) {
            $destination = 'upload/Profile/admin/' . $profile->sign;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $image = $request->file('sign');
            $sign_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $path = public_path('upload/Profile/admin/' . $sign_gen);
            Image::make($image)->resize(376, 282)->save($path);
            $data['sign'] = $sign_gen;
        }

        $status = $profile->fill($data)->save();
        if ($status) {
            Toastr::success('Profile Updated Successfully');
        } else {
            Toastr::error('Something error is happened!! Please try again.');
        }
        return redirect()->back();
    } // End Mehtod

    public function AdminChangePassword()
    {
        return view('admin.pages.profile.change_password');
    } // End Mehtod


    public function AdminUpdatePassword(Request $request)
    {
        // Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        // Match The Old Password
        if (!Hash::check($request->old_password, auth::user()->password)) {
            return back()->with("error", "Old Password Doesn't Match!!");
        }

        // Update The new password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)

        ]);
        return back()->with("status", " Password Changed Successfully");
    } // End Mehtod




    ///////////// Admin All Method //////////////


    public function AllAdmin()
    {
        $data['roles'] = Role::all();
        $data['alladminuser'] = User::where('role', 'admin')->latest()->get();
        return view('admin.pages.admin.all_admin', $data);
    } // End Mehtod


    public function AddAdmin()
    {
        $roles = Role::all();
        return view('admin.pages.admin.add_admin', compact('roles'));
    } // End Mehtod



    public function AdminUserStore(Request $request)
    {

        $user = User::all();
        $salesmanager_name = $request->name;
        $validator = Validator::make(
            $request->all(),
            [
                'name'      => 'required',
                'email'     => 'required|unique:users',
                'image'     => 'image|mimes:png,jpg,jpeg|max:5000',
                'password'  => 'required|confirmed',
            ],
            [
                'image'     => [
                    'mimes' => 'The :attribute must be a file of type: png - jpeg - jpg',
                    'max'   => 'The image field must be smaller than 5 MB.',
                ],
                'image'     => 'The file must be an image.',
                'unique'    => 'The Email has already been taken.',
                'confirmed' => 'The Confirmation Password is incorrect.',
                'mimes'     => 'The :attribute must be a file of type: PNG - JPEG - JPG'
            ]
        );
        if ($request->photo) {
            $destination = 'upload/Profile/Admin/' . $request->photo;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $image = $request->file('photo');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $path = public_path('upload/Profile/Admin/' . $name_gen);
            Image::make($image)->resize(176, 176)->save($path);
            $data['photo'] = $name_gen;
        } else {
            $data['photo'] = "";
        }
        if ($validator->passes()) {
            $salesmanager = User::create([
                'name'        => $request->name,
                'email'       => $request->email,
                'phone'       => $request->phone,
                'designation' => $request->designation,
                'country'     => $request->country,
                'address'     => $request->address,
                'postal'      => $request->postal,
                'status'      => 'inactive',
                // 'role'        => 'admin',
                'photo'       => $data['photo'],
                'password'    => Hash::make($request->password),
            ]);

            // if ($request->roles) {
            //     $user->assignRole($request->roles);
            // }

            $name = Auth::user()->name;

            Notification::send($user, new AdminAdd($name, $salesmanager_name));
            Toastr::success('Admin have registered Successfully');
            return redirect()->route('all.admin');
        } else {
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
            }
            return redirect()->back();
        }
    } // End Mehtod








    public function EditAdminUser($id)
    {

        $data['countries'] = Country::orderBy('country_name', 'ASC')->get();
        $data['user'] = User::findOrFail($id);
        $data['roles'] = Role::all();
        return view('admin.pages.admin.edit_admin', $data);
    } // End Mehtod


    public function AdminUserUpdate(Request $request, $id)
    {

        $user = User::findOrFail($id);
        $data = $request->all();
        //dd($data);
        $status = $user->fill($data)->save();

        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        Toastr::success('Admin User Updated Successfully');


        return redirect()->route('all.admin');
    } // End Mehtod



    public function DeleteAdminRole($id)
    {

        $user = User::findOrFail($id);
        if (!is_null($user)) {
            $user->delete();
        }

        $notification = array(
            'message' => 'Admin User Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Mehtod


    public function AdminStatus(Request $request)
    {

        //dd($request->id);
        if ($request->mode == 'true') {
            DB::table('users')->where('id', $request->id)->update(['status' => 'inactive']);
        } else {


            DB::table('users')->where('id', $request->id)->update(['status' => 'active']);
        }
        return response()->json(['msg' => 'Successfully Updated Status', 'status' => true]);
    }

    public function supplyChain()
    {
        return view('admin.pages.supplyChain.all');
    }
}
