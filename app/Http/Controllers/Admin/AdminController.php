<?php

namespace App\Http\Controllers\Admin;


use App\Models\User;
use Illuminate\Http\Request;
// use App\Http\Middleware\Role;
use App\Models\Admin\Country;
use App\Notifications\AdminAdd;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Mail\EmployeeAdd as MailEmployeeAdd;
use App\Models\Admin\Product;
use App\Models\Client\ClientSupport;
use App\Models\Client\Project;
use App\Models\Client\SupportCase;
use App\Notifications\EmployeeAdd;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use Rats\Zkteco\Lib\ZKTeco;

class AdminController extends Controller
{

    public function markNotification(Request $request)
    {
        auth()->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();
        // $notification->update([
        //     'read_at' => Carbon::now(),

        // ]);
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


    public function index()
    {
        $id = Auth::guard('admin')->user()->employee_id;
        // Connect to the ZKtecho device
        $deviceip = $this->device_ip();
        $zk = new ZKTeco($deviceip, 4370);
        $zk->connect();
        $zk->enableDevice();

        // Retrieve attendances and user data from the device
        $attendances_all = $zk->getEmployeeAttendance(2, $id);
        $users = $zk->getUser();
        $user = null;

        foreach ($users as $userData) {
            if ($userData['userid'] === $id) {
                $user = $userData;
                break; // Exit the loop once a match is found
            }
        }

        // Initialize arrays to store user's attendance data for today, last week, and last month
        $attendanceToday = [];
        $attendanceThisMonth = [];
        $attendanceLastMonth = [];

        if ($user) {
            $user_name = $user['name'];

            // Get the current date
            $todayDate = date('Y-m-d');

            // Filter attendances for today
            $todayAttendances = array_filter($attendances_all, function ($attendance) use ($id, $todayDate) {
                $attendanceDate = date('Y-m-d', strtotime($attendance['timestamp']));
                return ($attendanceDate === $todayDate) && ($attendance['id'] === $id);
            });

            // Initialize variables to store earliest check-in and latest check-out times
            $earliestCheckIn = null;
            $latestCheckOut = null;

            // Loop through the filtered attendances for today
            foreach ($todayAttendances as $attendance) {
                $checkTime = date('H:i:s', strtotime($attendance['timestamp']));

                // Update earliest check-in time
                if ($earliestCheckIn === null || strtotime($checkTime) < strtotime($earliestCheckIn)) {
                    $earliestCheckIn = $checkTime;
                }

                // Update latest check-out time
                if ($latestCheckOut === null || strtotime($checkTime) > strtotime($latestCheckOut)) {
                    $latestCheckOut = $checkTime;
                }
            }

            // Add the overall attendance data for today
            if ($earliestCheckIn !== null && $latestCheckOut !== null) {
                $attendanceToday[] = [
                    'user_id' => $id,
                    'user_name' => $user_name,
                    'date' => $todayDate,
                    'check_in' => $earliestCheckIn,
                    'check_out' => $latestCheckOut,
                ];
            }
            $attendanceToday = count($attendanceToday) > 0 ? $attendanceToday[0] : null;

            $startDate = date('Y-m-01', strtotime('this month'));
            $endDate = date('Y-m-d');

            // Filter attendances for for this month
            $thisMonthAttendances = array_filter($attendances_all, function ($attendance) use ($id, $startDate, $endDate) {
                $attendanceDate = date('Y-m-d', strtotime($attendance['timestamp']));
                return ($attendanceDate >= $startDate) && ($attendanceDate <= $endDate) && ($attendance['id'] === $id);
            });

            // Initialize variables to store earliest check-in and latest check-out times for each day
            $earliestCheckInThisMonth = [];
            $latestCheckOutThisMonth = [];

            // Loop through the filtered attendances for for this month
            foreach ($thisMonthAttendances as $attendance) {
                $attendanceDate = date('Y-m-d', strtotime($attendance['timestamp']));
                $checkTime = date('H:i:s', strtotime($attendance['timestamp']));

                // Update earliest check-in time
                if (!isset($earliestCheckInThisMonth[$attendanceDate]) || strtotime($checkTime) < strtotime($earliestCheckInThisMonth[$attendanceDate])) {
                    $earliestCheckInThisMonth[$attendanceDate] = $checkTime;
                }

                // Update latest check-out time
                if (!isset($latestCheckOutThisMonth[$attendanceDate]) || strtotime($checkTime) > strtotime($latestCheckOutThisMonth[$attendanceDate])) {
                    $latestCheckOutThisMonth[$attendanceDate] = $checkTime;
                }
            }

            // Create entries for each day with the earliest check-in and latest check-out times
            foreach ($earliestCheckInThisMonth as $date => $checkIn) {
                $attendanceThisMonth[] = [
                    'user_id' => $id,
                    'user_name' => $user_name,
                    'date' => $date,
                    'check_in' => $checkIn,
                    'check_out' => $latestCheckOutThisMonth[$date],
                ];
            }

            // Now $attendanceThisMonth contains the attendance data for this month

            // For Last Month

            // Get the first day and last day of the previous month
            $firstDayLastMonth = date('Y-m-01', strtotime('last month'));
            $lastDayLastMonth = date('Y-m-t', strtotime('last month'));

            // Filter attendances for the last month
            $lastMonthAttendances = array_filter($attendances_all, function ($attendance) use ($id, $firstDayLastMonth, $lastDayLastMonth) {
                $attendanceDate = date('Y-m-d', strtotime($attendance['timestamp']));
                return ($attendanceDate >= $firstDayLastMonth) && ($attendanceDate <= $lastDayLastMonth) && ($attendance['id'] === $id);
            });

            // Initialize variables to store earliest check-in and latest check-out times
            $earliestCheckInLastMonth = [];
            $latestCheckOutLastMonth = [];

            // Loop through the filtered attendances for the last month
            foreach ($lastMonthAttendances as $attendance) {
                $attendanceDate = date('Y-m-d', strtotime($attendance['timestamp']));
                $checkTime = date('H:i:s', strtotime($attendance['timestamp']));

                // Update earliest check-in time
                if (!isset($earliestCheckInLastMonth[$attendanceDate]) || strtotime($checkTime) < strtotime($earliestCheckInLastMonth[$attendanceDate])) {
                    $earliestCheckInLastMonth[$attendanceDate] = $checkTime;
                }

                // Update latest check-out time
                if (!isset($latestCheckOutLastMonth[$attendanceDate]) || strtotime($checkTime) > strtotime($latestCheckOutLastMonth[$attendanceDate])) {
                    $latestCheckOutLastMonth[$attendanceDate] = $checkTime;
                }
            }

            // Create entries for each day with the earliest check-in and latest check-out times for the last month
            foreach ($earliestCheckInLastMonth as $date => $checkIn) {
                $attendanceLastMonth[] = [
                    'user_id' => $id,
                    'user_name' => $user_name,
                    'date' => $date,
                    'check_in' => $checkIn,
                    'check_out' => $latestCheckOutLastMonth[$date],
                ];
            }
        }

        $lateCounts = array_filter($attendanceThisMonth, function ($attendance) {
            return Carbon::parse($attendance['check_in']) > Carbon::parse('09:05:00');
        });

        return view('admin.pages.dashboard.index', [
            'attendanceToday'      => isset($attendanceToday) ? $attendanceToday : null,
            'attendanceThisMonths' => isset($attendanceThisMonth) ? $attendanceThisMonth : null,
            'lateCounts'           => isset($lateCounts) ? $lateCounts : null,
            'attendanceLastMonths' => isset($attendanceLastMonth) ? $attendanceLastMonth : null,
            'deviceip'             => isset($deviceip) ? $deviceip : null,
        ]);
    }

    public function AdminDashboard()
    {
        $resulNotify = [];
        $presentDate = date('Y-m-d');
        $notification_days = Product::whereNotNull('notification_days')->whereNotNull('create_date')->get(['id', 'notification_days', 'create_date']);
        foreach ($notification_days as $createDateNotificationDay) {
            $value = date('Y-m-d', strtotime($createDateNotificationDay->create_date . ' + ' . $createDateNotificationDay->notification_days . ' days'));
            if ($value <= $presentDate) {
                $notification = 1;
            } else {
                $notification = 0;
            }
            $resulNotify[] = $notification;
        }
        $filteredNotify = array_filter($resulNotify, function ($value) {
            return $value == 1;
        });

        $data['notification_count'] = count($filteredNotify);

        $data['notifications'] = auth()->user()->unreadNotifications;
        if (auth()->check() && in_array('support', json_decode(auth()->user()->department, true))) {
            $data['projects'] = Project::with('client')->orderBy('id', 'DESC')->get();
            $data['supports'] = ClientSupport::with('client', 'project')->where('status' , '!=' , 'closed')->orderBy('id', 'DESC')->get();
            $data['cases'] = SupportCase::latest('id')->get();
            $data['latest_case'] = SupportCase::where('status', '!=', 'closed')->latest('id')->first();
            // dd($data['latest_case']);
            return view('admin.pages.project.dashboard', $data);
        } else {
            return view('admin.pages.dashboard.index', $data);
        }
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
