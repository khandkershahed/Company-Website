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



    // public function AdminDashboard()
    // {
    //     $data['notices'] = Notice::latest()->get();
    //     $data['employee_leave_due'] = EmployeeLeave::where('employee_id', Auth::user()->id)->first();
    //     $resulNotify = [];
    //     $presentDate = date('Y-m-d');
    //     $notification_days = Product::whereNotNull('notification_days')->whereNotNull('create_date')->get(['id', 'notification_days', 'create_date']);
    //     foreach ($notification_days as $createDateNotificationDay) {
    //         $value = date('Y-m-d', strtotime($createDateNotificationDay->create_date . ' + ' . $createDateNotificationDay->notification_days . ' days'));
    //         if ($value <= $presentDate) {
    //             $notification = 1;
    //         } else {
    //             $notification = 0;
    //         }
    //         $resulNotify[] = $notification;
    //     }
    //     $filteredNotify = array_filter($resulNotify, function ($value) {
    //         return $value == 1;
    //     });

    //     $data['notification_count'] = count($filteredNotify);
    //     $data['notifications'] = auth()->user()->unreadNotifications;

    //     if (auth()->check() && in_array('support', json_decode(auth()->user()->department, true))) {
    //         $data['projects'] = Project::with('client')->orderBy('id', 'DESC')->get();
    //         $data['supports'] = ClientSupport::with('client', 'project')->where('status', '!=', 'closed')->orderBy('id', 'DESC')->get();
    //         $data['cases'] = SupportCase::latest('id')->get();
    //         $data['latest_case'] = SupportCase::where('status', '!=', 'closed')->latest('id')->first();

    //         return view('admin.pages.project.dashboard', $data);
    //     } else {
    //         $id = Auth::user()->employee_id;
    //         // Connect to the ZKtecho device
    //         $deviceip = $this->device_ip();
    //         $zk = new ZKTeco($deviceip, 4370);
    //         $zk->connect();
    //         $zk->enableDevice();

    //         // Retrieve attendances and user data from the device
    //         $attendances_all = $zk->getEmployeeAttendance(2, $id);
    //         $users = $zk->getUser();
    //         $user = null;

    //         foreach ($users as $userData) {
    //             if ($userData['userid'] === $id) {
    //                 $user = $userData;
    //                 break; // Exit the loop once a match is found
    //             }
    //         }

    //         // Initialize arrays to store user's attendance data
    //         $attendanceToday = [];
    //         $attendanceThisMonth = [];
    //         $attendanceLastMonth = [];

    //         if ($user) {
    //             $user_name = $user['name'];
    //             $todayDate = date('Y-m-d');

    //             // Filter attendance for Today
    //             $todayAttendances = array_filter($attendances_all, function ($attendance) use ($id, $todayDate) {
    //                 $attendanceDate = date('Y-m-d', strtotime($attendance['timestamp']));
    //                 return ($attendanceDate === $todayDate) && ($attendance['id'] === $id);
    //             });

    //             // Initialize variables for today's check-in and check-out
    //             $earliestCheckIn = null;
    //             $latestCheckOut = null;

    //             // Loop through today's attendance data
    //             foreach ($todayAttendances as $attendance) {
    //                 $checkTime = date('H:i:s', strtotime($attendance['timestamp']));
    //                 if ($earliestCheckIn === null || strtotime($checkTime) < strtotime($earliestCheckIn)) {
    //                     $earliestCheckIn = $checkTime;
    //                 }
    //                 if ($latestCheckOut === null || strtotime($checkTime) > strtotime($latestCheckOut)) {
    //                     $latestCheckOut = $checkTime;
    //                 }
    //             }

    //             // Add attendance data for today
    //             if ($earliestCheckIn !== null && $latestCheckOut !== null) {
    //                 $attendanceToday[] = [
    //                     'user_id' => $id,
    //                     'user_name' => $user_name,
    //                     'date' => $todayDate,
    //                     'check_in' => $earliestCheckIn,
    //                     'check_out' => $latestCheckOut,
    //                 ];
    //             }
    //             $attendanceToday = count($attendanceToday) > 0 ? $attendanceToday[0] : null;

    //             // Filter attendance for this month (current month)
    //             $startDate = new DateTime('first day of this month');
    //             $endDate = new DateTime('today +1 day');
    //             $attendanceThisMonth = [];

    //             // Iterate through dates from the first day of the month to today
    //             foreach (new DatePeriod($startDate, new DateInterval('P1D'), $endDate) as $date) {
    //                 $currentDate = $date->format('Y-m-d');
    //                 $attendanceForDate = array_filter($attendances_all, function ($attendance) use ($id, $currentDate) {
    //                     return (new DateTime($attendance['timestamp']))->format('Y-m-d') === $currentDate && $attendance['id'] === $id;
    //                 });

    //                 if (count($attendanceForDate) > 0) {
    //                     $earliestCheckIn = min(array_column($attendanceForDate, 'timestamp'));
    //                     $latestCheckOut = max(array_column($attendanceForDate, 'timestamp'));
    //                 } else {
    //                     $earliestCheckIn = 'N/A';
    //                     $latestCheckOut = 'N/A';
    //                 }

    //                 $attendanceThisMonth[] = [
    //                     'user_id' => $id,
    //                     'user_name' => $user_name,
    //                     'date' => $currentDate,
    //                     'check_in' => $earliestCheckIn === 'N/A' ? 'N/A' : (new DateTime($earliestCheckIn))->format('H:i:s'),
    //                     'check_out' => $latestCheckOut === 'N/A' ? 'N/A' : (new DateTime($latestCheckOut))->format('H:i:s'),
    //                     'absent_note' => $earliestCheckIn === 'N/A' ? ($date->format('N') == 5 ? 'Friday' : 'Absent') : null,
    //                 ];
    //             }

    //             // Filter attendance for last month
    //             $firstDayLastMonth = date('Y-m-01', strtotime('last month'));
    //             $lastDayLastMonth = date('Y-m-t', strtotime('last month'));
    //             $lastMonthAttendances = array_filter($attendances_all, function ($attendance) use ($id, $firstDayLastMonth, $lastDayLastMonth) {
    //                 $attendanceDate = date('Y-m-d', strtotime($attendance['timestamp']));
    //                 return ($attendanceDate >= $firstDayLastMonth) && ($attendanceDate <= $lastDayLastMonth) && ($attendance['id'] === $id);
    //             });


    //         }

    //         // Filter late attendance counts for this month
    //         $lateCounts = array_filter($attendanceThisMonth, function ($attendance) {
    //             if ($attendance['check_in'] === 'N/A' || !isset($attendance['check_in'])) {
    //                 return false;
    //             }

    //             return Carbon::parse($attendance['check_in']) > Carbon::parse('09:06:00');
    //         });

    //         $data['attendanceToday'] = $attendanceToday ?? null;
    //         $data['attendanceThisMonths'] = $attendanceThisMonth ?? null;
    //         $data['lateCounts'] = $lateCounts ?? null;
    //         $data['attendanceLastMonths'] = $attendanceLastMonth ?? null;
    //         $data['deviceip'] = $deviceip ?? null;

    //         return view('admin.pages.dashboard.index', $data);
    //     }
    // }

    // public function AdminDashboard()
    // {
    //     $data['notices'] = Notice::latest()->get();
    //     $data['employee_leave_due'] = EmployeeLeave::where('employee_id', Auth::user()->id)->first();
    //     $resulNotify = [];
    //     $presentDate = date('Y-m-d');
    //     $notification_days = Product::whereNotNull('notification_days')->whereNotNull('create_date')->get(['id', 'notification_days', 'create_date']);
    //     foreach ($notification_days as $createDateNotificationDay) {
    //         $value = date('Y-m-d', strtotime($createDateNotificationDay->create_date . ' + ' . $createDateNotificationDay->notification_days . ' days'));
    //         if ($value <= $presentDate) {
    //             $notification = 1;
    //         } else {
    //             $notification = 0;
    //         }
    //         $resulNotify[] = $notification;
    //     }
    //     $filteredNotify = array_filter($resulNotify, function ($value) {
    //         return $value == 1;
    //     });

    //     $data['notification_count'] = count($filteredNotify);
    //     $data['notifications'] = auth()->user()->unreadNotifications;

    //     if (auth()->check() && in_array('support', json_decode(auth()->user()->department, true))) {
    //         $data['projects'] = Project::with('client')->orderBy('id', 'DESC')->get();
    //         $data['supports'] = ClientSupport::with('client', 'project')->where('status', '!=', 'closed')->orderBy('id', 'DESC')->get();
    //         $data['cases'] = SupportCase::latest('id')->get();
    //         $data['latest_case'] = SupportCase::where('status', '!=', 'closed')->latest('id')->first();

    //         return view('admin.pages.project.dashboard', $data);
    //     } else {
    //         $id = Auth::user()->employee_id;
    //         // Connect to the ZKtecho device
    //         $deviceip = $this->device_ip();
    //         $zk = new ZKTeco($deviceip, 4370);
    //         $zk->connect();
    //         $zk->enableDevice();

    //         // Retrieve attendances and user data from the device
    //         $attendances_all = $zk->getEmployeeAttendance(2, $id);
    //         $users = $zk->getUser();
    //         $user = null;

    //         foreach ($users as $userData) {
    //             if ($userData['userid'] === $id) {
    //                 $user = $userData;
    //                 break;
    //             }
    //         }

    //         // Initialize arrays to store user's attendance data
    //         $attendanceToday = [];
    //         // $attendanceThisMonth = [];
    //         // $attendanceLastMonth = [];

    //         if ($user) {
    //             $user_name = $user['name'];
    //             $todayDate = date('Y-m-d');

    //             // Filter attendance for Today
    //             $todayAttendances = array_filter($attendances_all, function ($attendance) use ($id, $todayDate) {
    //                 $attendanceDate = date('Y-m-d', strtotime($attendance['timestamp']));
    //                 return ($attendanceDate === $todayDate) && ($attendance['id'] === $id);
    //             });

    //             // Initialize variables for today's check-in and check-out
    //             $earliestCheckIn = null;
    //             $latestCheckOut = null;

    //             // Loop through today's attendance data
    //             foreach ($todayAttendances as $attendance) {
    //                 $checkTime = date('H:i:s', strtotime($attendance['timestamp']));
    //                 if ($earliestCheckIn === null || strtotime($checkTime) < strtotime($earliestCheckIn)) {
    //                     $earliestCheckIn = $checkTime;
    //                 }
    //                 if ($latestCheckOut === null || strtotime($checkTime) > strtotime($latestCheckOut)) {
    //                     $latestCheckOut = $checkTime;
    //                 }
    //             }

    //             // Add attendance data for today
    //             if ($earliestCheckIn !== null && $latestCheckOut !== null) {
    //                 $attendanceToday[] = [
    //                     'user_id' => $id,
    //                     'user_name' => $user_name,
    //                     'date' => $todayDate,
    //                     'check_in' => $earliestCheckIn,
    //                     'check_out' => $latestCheckOut,
    //                 ];
    //             }
    //             $attendanceToday = count($attendanceToday) > 0 ? $attendanceToday[0] : null;

    //             //     // Filter attendance for this month (current month)
    //             //     $startDate = new DateTime('first day of this month');
    //             //     $endDate = new DateTime('today +1 day');
    //             //     $attendanceThisMonth = [];

    //             //     // Iterate through dates from the first day of the month to today
    //             //     foreach (new DatePeriod($startDate, new DateInterval('P1D'), $endDate) as $date) {
    //             //         $currentDate = $date->format('Y-m-d');
    //             //         $attendanceForDate = array_filter($attendances_all, function ($attendance) use ($id, $currentDate) {
    //             //             return (new DateTime($attendance['timestamp']))->format('Y-m-d') === $currentDate && $attendance['id'] === $id;
    //             //         });

    //             //         if (count($attendanceForDate) > 0) {
    //             //             $earliestCheckIn = min(array_column($attendanceForDate, 'timestamp'));
    //             //             $latestCheckOut = max(array_column($attendanceForDate, 'timestamp'));
    //             //         } else {
    //             //             $earliestCheckIn = 'N/A';
    //             //             $latestCheckOut = 'N/A';
    //             //         }

    //             //         $attendanceThisMonth[] = [
    //             //             'user_id' => $id,
    //             //             'user_name' => $user_name,
    //             //             'date' => $currentDate,
    //             //             'check_in' => $earliestCheckIn === 'N/A' ? 'N/A' : (new DateTime($earliestCheckIn))->format('H:i:s'),
    //             //             'check_out' => $latestCheckOut === 'N/A' ? 'N/A' : (new DateTime($latestCheckOut))->format('H:i:s'),
    //             //             'absent_note' => $earliestCheckIn === 'N/A' ? ($date->format('N') == 5 ? 'Friday' : 'Absent') : null,
    //             //         ];
    //             //     }

    //             //     // Filter attendance for last month
    //             //     $firstDayLastMonth = date('Y-m-01', strtotime('last month'));
    //             //     $lastDayLastMonth = date('Y-m-t', strtotime('last month'));
    //             //     $lastMonthAttendances = array_filter($attendances_all, function ($attendance) use ($id, $firstDayLastMonth, $lastDayLastMonth) {
    //             //         $attendanceDate = date('Y-m-d', strtotime($attendance['timestamp']));
    //             //         return ($attendanceDate >= $firstDayLastMonth) && ($attendanceDate <= $lastDayLastMonth) && ($attendance['id'] === $id);
    //             //     });
    //             // }

    //             // // Filter late attendance counts for this month
    //             // $lateCounts = array_filter($attendanceThisMonth, function ($attendance) {
    //             //     if ($attendance['check_in'] === 'N/A' || !isset($attendance['check_in'])) {
    //             //         return false;
    //             //     }

    //             //     return Carbon::parse($attendance['check_in']) > Carbon::parse('09:06:00');
    //             // });

    //             $data['attendanceToday'] = $attendanceToday ?? null;
    //             $data['attendanceThisMonths'] = $attendanceThisMonth ?? null;
    //             $data['lateCounts'] = $lateCounts ?? null;
    //             $data['attendanceLastMonths'] = $attendanceLastMonth ?? null;
    //             $data['deviceip'] = $deviceip ?? null;

    //             return view('admin.pages.dashboard.index', $data);
    //         }
    //     }
    // }
    // public function AdminDashboard()
    // {
    //     ini_set('max_execution_time', 3600);
    //     // $id = 108;
    //     $id = Auth::user()->employee_id;

    //     $cacheKey = "attendance_this_month_{$id}";

    //     $attendanceThisMonth = Cache::remember($cacheKey, now()->addMinutes(60), function () use ($id) {
    //         // Connect to the ZKtecho device
    //         $deviceip = $this->device_ip();
    //         $zk = new ZKTeco($deviceip, 4370);
    //         $zk->connect();
    //         $zk->enableDevice();
    //         return $zk->getThisMonthAttendance($id);
    //     });

    //     $attendances = $attendanceThisMonth;

    //     // Filter current day's attendance records
    //     $currentMonthAttendances = array_filter($attendances, function ($attendance) {
    //         // Loop through each date's attendance records and check if the timestamp exists in check_in or check_out
    //         foreach (['check_in', 'check_out'] as $type) {
    //             if (isset($attendance[$type]['timestamp']) && date('Y-m-d', strtotime($attendance[$type]['timestamp'])) === date('Y-m-d')) {
    //                 return true;
    //             }
    //         }
    //         return false;
    //     });

    //     // Group attendance records by employee id
    //     $groupedAttendances = [];
    //     foreach ($currentMonthAttendances as $date => $attendance) {
    //         foreach (['check_in', 'check_out'] as $type) {
    //             if (isset($attendance[$type]['timestamp'])) {
    //                 $groupedAttendances[$attendance[$type]['id']][] = $attendance[$type];
    //             }
    //         }
    //     }

    //     // Loop through each group of records and select the earliest and latest timestamps
    //     $filteredAttendances = [];
    //     foreach ($groupedAttendances as $employeeId => $records) {
    //         usort($records, function ($a, $b) {
    //             return strtotime($a['timestamp']) - strtotime($b['timestamp']);
    //         });

    //         $firstRecord = reset($records); // Earliest record
    //         $lastRecord = end($records);    // Latest record

    //         // Add the first and last records to the filtered attendances
    //         $filteredAttendances[] = $firstRecord;
    //         $filteredAttendances[] = $lastRecord;
    //     }


    //     $lateCounts = [];
    //     $data['check_in'] = null;
    //     $data['check_out'] = null;
    //     $today = date('Y-m-d');
    //     foreach ($attendanceThisMonth as $date => $attendance) {
    //         if (isset($attendance['check_in']) && isset($attendance['check_in']['timestamp'])) {
    //             $lateCounts[] = $attendance['check_in'];
    //         }
    //         if ($date === $today) {
    //             $data['check_in'] = Carbon::parse($attendance['check_in']['timestamp'])->format('H:i:s');
    //             $data['check_out'] = Carbon::parse($attendance['check_out']['timestamp'])->format('H:i:s');
    //         }
    //     }

    //     // Count Late (L) based on check_in time
    //     $lateCountL = collect($lateCounts)
    //         ->filter(function ($item) {
    //             // Ensure check_in exists and timestamp is valid
    //             return isset($item['timestamp']) && Carbon::parse($item['timestamp'])->gt(Carbon::parse('09:06:00')) &&
    //                 Carbon::parse($item['timestamp'])->lt(Carbon::parse('10:01:00'));
    //         })
    //         ->count();

    //     // Count Half Day (LL) based on check_in time
    //     $lateCountLL = collect($lateCounts)
    //         ->filter(function ($item) {
    //             // Ensure check_in exists and timestamp is valid
    //             return isset($item['timestamp']) && Carbon::parse($item['timestamp'])->gt(Carbon::parse('10:01:00'));
    //         })
    //         ->count();

    //     $data['attendanceThisMonths'] = $attendanceThisMonth ?? null;
    //     $data['lateCounts'] = $lateCounts ?? null;
    //     $data['lateCountL'] = $lateCountL ?? null;
    //     $data['lateCountLL'] = $lateCountLL ?? null;

    //     // Ensure that check_in and check_out timestamps exist before formatting them
    //     // $today = date('Y-m-d');
    //     // $todaysattendances = array_filter($attendances, function ($attendance, $date) use ($today) {
    //     //     return $date === $today;
    //     // }, ARRAY_FILTER_USE_BOTH);
    //     // dd($todaysattendances);

    //     // dd($data);
    //     return view('metronic.pages.dashboard', $data);
    // }

    public function AdminDashboard()
    {
        $deviceip = $this->device_ip();
        $zk = new ZKTeco($deviceip, 4370);
        $zk->connect();
        $zk->enableDevice();
        $id = Auth::user()->id;
        dd($zk->getThisMonthAttendance($id));
        // dd($zk->getThisMonthAttendance($id));
        //         // Retrieve attendances and user data from the device
        //         $attendances_all = $zk->getEmployeeAttendance(2, $id);
        return view('metronic.pages.dashboard.main_dashboard');
    }

    // public function getTodayAttendance($id)
    // {
    //     return Helper::getTodayCheckInCheckOut($this, $id);
    // }



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

    public function AdminProfile()
    {

        $id = Auth::user()->id;
        $data = User::find($id);
        return view('admin.pages.profile.index', compact('data'));
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
