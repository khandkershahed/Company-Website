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
use App\Models\Admin\StaffMeeting;
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



    public function AdminDashboard(Request $request)
    {
        $userId = Auth::id();

        // Step 1: Get month and year input
        $monthInput = $request->input('month', now()->format('F')); // e.g., "October" or "10"
        $year = $request->input('year', now()->year); // default to current year

        // Step 2: Convert month input to numeric
        if (is_numeric($monthInput)) {
            $month = intval($monthInput);
            if ($month < 1 || $month > 12) {
                abort(400, 'Invalid month number.');
            }
        } else {
            $timestamp = strtotime("1 " . $monthInput);
            if ($timestamp === false) {
                abort(400, 'Invalid month name.');
            }
            $month = intval(date('m', $timestamp));
        }

        // Step 3: Fetch attendance records and key them by date
        $rawAttendances = Attendance::where('user_id', $userId)
            ->whereMonth('date', $month)
            ->whereYear('date', $year)
            ->get()
            ->keyBy(function ($item) {
                return Carbon::parse($item->date)->toDateString();
            });

        // Step 4: Build full attendance list (include all days of the month)
        $startOfMonth = Carbon::create($year, $month, 1)->startOfMonth();
        $endOfMonth = $startOfMonth->copy()->endOfMonth();
        $attendances = []; // <- this is your original variable

        for ($date = $startOfMonth->copy(); $date->lte($endOfMonth); $date->addDay()) {
            $dateString = $date->toDateString();
            $dayOfWeek = $date->format('l');

            if ($dayOfWeek === 'Friday') {
                $attendances[] = [
                    'date' => $dateString,
                    'check_in' => null,
                    'check_out' => null,
                    'status' => 'Friday',
                ];
            } elseif ($rawAttendances->has($dateString)) {
                $record = $rawAttendances[$dateString];
                $attendances[] = [
                    'date' => $dateString,
                    'check_in' => $record->check_in,
                    'check_out' => $record->check_out,
                    'status' => $record->status ?? 'Present',
                ];
            } else {
                $attendances[] = [
                    'date' => $dateString,
                    'check_in' => null,
                    'check_out' => null,
                    'status' => 'Absent',
                ];
            }
        }
        $attendances = collect($attendances);

        // Today's Attendance
        $todayAttendance = Attendance::where('user_id', $userId)
            ->whereDate('date', Carbon::today())
            ->first();




        $performances = [];
        // Late check-in records for this month (after 09:06)
        $lateCounts = Attendance::where('user_id', $userId)
            ->whereMonth('date', Carbon::now()->month)
            ->whereYear('date', Carbon::now()->year)
            ->whereTime('check_in', '>', '09:06:00')
            ->orderBy('date', 'ASC')
            ->get();
        $selectedMonth = $monthInput;

        $today = Carbon::today();
        $startOfWeek = $today->copy()->startOfWeek(Carbon::FRIDAY); // Start week on Friday
        $endOfWeek = $startOfWeek->copy()->addDays(6); // End 6 days later (Thursday)

        // Generate a list of dates for the week
        $dateRange = collect();
        $currentDate = $startOfWeek->copy();

        while ($currentDate->lte($endOfWeek)) {
            $dateRange->push([
                'date_key' => $currentDate->format('Y-m-d'), // Use this for grouping and DB query
                'carbon_date' => $currentDate->copy(),
                'day_short' => $currentDate->format('D'), // Fr, Sa, Su...
                'day_num' => $currentDate->format('d'), // 20, 21, 22...
                'is_active' => $currentDate->isSameDay($today) ? 'active' : '',
            ]);
            $currentDate->addDay();
        }

        // 2. Fetch all relevant meetings using the 'date' column
        $allMeetings = StaffMeeting::with('leader') // Eager load the leader to get the name
            ->whereBetween('date', [$startOfWeek, $endOfWeek])
            ->orderBy('date')
            ->orderBy('start_time')
            ->get();

        // 3. Group meetings by the 'date' column for the day tabs
        $meetingsByDate = $allMeetings->groupBy(function ($meeting) {
            return $meeting->date->format('Y-m-d');
        });

        // 4. Organize meetings for the main tabs
        $meetingsForTabs = [
            'all-meeting' => $meetingsByDate,
            // Filter by 'type' and then group by date for the In Office tab
            'in_office' => $allMeetings->filter(fn($m) => $m->type === 'office')
                ->groupBy(fn($m) => $m->date->format('Y-m-d')),
            // Filter by 'type' and then group by date for the Out Of Office tab
            'out_office' => $allMeetings->filter(fn($m) => $m->type === 'out_of_office')
                ->groupBy(fn($m) => $m->date->format('Y-m-d')),
        ];
        $allWeeklyMeetings = $allMeetings;
        // 5. Calculate pending meetings (where the full end_time is in the future)
        $pendingMeetings = $allMeetings->where('end_time', '>', Carbon::now())->count();
        $activeDayDateKey = $today->format('Y-m-d');
        $users = User::get();
        $notices = Notice::latest('id')->get();

        return view('metronic.pages.dashboard.main_dashboard', compact(
            'notices',
            'selectedMonth',
            'attendances',
            'todayAttendance',
            'lateCounts',
            'dateRange',
            'meetingsForTabs',
            'pendingMeetings',
            'activeDayDateKey',
            'users',
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
        // $documents = $user->staffDocuments;
        $monthInput = $request->input('month', now()->format('F')); // e.g. “October” or “10”
        $year = $request->input('year', now()->year); // default to current year

        // Step 2: Convert month input to numeric
        if (is_numeric($monthInput)) {
            $month = intval($monthInput);
            if ($month < 1 || $month > 12) {
                abort(400, 'Invalid month number.');
            }
        } else {
            $timestamp = strtotime("1 " . $monthInput);
            if ($timestamp === false) {
                abort(400, 'Invalid month name.');
            }
            $month = intval(date('m', $timestamp));
        }

        // Step 3: Fetch attendance records and key them by date
        $rawAttendances = Attendance::where('user_id', $user->id)
            ->whereMonth('date', $month)
            ->whereYear('date', $year)
            ->get()
            ->keyBy(function ($item) {
                return Carbon::parse($item->date)->toDateString();
            });

        // Step 4: Build full attendance list (include all days of the month)
        $startOfMonth = Carbon::create($year, $month, 1)->startOfMonth();
        $endOfMonth = $startOfMonth->copy()->endOfMonth();
        $attendances = []; // <- this is your original variable

        for ($date = $startOfMonth->copy(); $date->lte($endOfMonth); $date->addDay()) {
            $dateString = $date->toDateString();
            $dayOfWeek = $date->format('l');

            if ($dayOfWeek === 'Friday') {
                $attendances[] = [
                    'date' => $dateString,
                    'check_in' => null,
                    'check_out' => null,
                    'status' => 'Friday',
                ];
            } elseif ($rawAttendances->has($dateString)) {
                $record = $rawAttendances[$dateString];
                $attendances[] = [
                    'date' => $dateString,
                    'check_in' => $record->check_in,
                    'check_out' => $record->check_out,
                    'status' => $record->status ?? 'Present',
                ];
            } else {
                $attendances[] = [
                    'date' => $dateString,
                    'check_in' => null,
                    'check_out' => null,
                    'status' => 'Absent',
                ];
            }
        }
        $attendances = collect($attendances);
        $leaveApplications = LeaveApplication::where('employee_id', $user->id)->get();
        $sicks = $leaveApplications->where('type_of_leave', 'sick');
        $earneds = $leaveApplications->where('type_of_leave', 'earned');
        $casuals = $leaveApplications->where('type_of_leave', 'casual');
        $pendings = $leaveApplications->where('status', 'pending');

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
