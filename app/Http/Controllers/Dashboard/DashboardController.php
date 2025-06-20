<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin\Event;
use Rats\Zkteco\Lib\ZKTeco;
use App\Models\Admin\Notice;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\SubCategory;
use App\Models\Admin\EventCategory;
use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use App\Models\Admin\Feature;
use App\Models\Admin\SubSubCategory;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Admin\LeaveApplication;
use App\Models\Admin\Product;
use App\Models\Admin\SolutionDetail;

class DashboardController extends Controller
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
    public function siteContent()
    {
        $data = [
            'categories'             => Category::where('status', 'active')->count(),
            'sub_categories'         => SubCategory::where('status', 'active')->count(),
            'sub_sub_categories'     => SubCategory::where('status', 'active')->count(),
            'sub_sub_sub_categories' => SubSubCategory::where('status', 'active')->count(),
        ];
        return view('admin.pages.site-content.all', $data);
    }
    public function siteDashboard()
    {
        $data = [
            'brands'                 => Brand::where('status', 'active')->count(),
            'brands'                 => Brand::where('status', 'active')->count(),
            'brands'                 => Brand::where('status', 'active')->count(),
            'brands'                 => Brand::where('status', 'active')->count(),
            'solutions'              => SolutionDetail::where('status', 'active')->count(),
            'features'               => Feature::where('status', 'active')->count(),
            'categories'             => Category::where('status', 'active')->count(),
            'sub_categories'         => SubCategory::where('status', 'active')->count(),
            'sub_sub_categories'     => SubCategory::where('status', 'active')->count(),
            'total_products'         => Product::where('status', 'active')->count(),
            'approved_products'      => Product::where('status', 'active')->where('product_status', 'product')->count(),
            'sourced_products'       => Product::where('status', 'active')->where('product_status', 'sourcing')->count(),
        ];
        return view('metronic.pages.dashboard.siteDashboard', $data);
    }

    public function siteSetting()
    {
        return view('admin.pages.siteSetting.all');
    }

    public function hrAdmin()
    {
        set_time_limit(120);
        $deviceip = $this->device_ip();
        $zk = new ZKTeco($deviceip, 4370);
        $zk->connect();
        $zk->enableDevice();
        $attendances = $zk->getAttendance(2);
        $users = $zk->getUser(); // Retrieve user data from the device
        $currentMonthAttendances = array_filter($attendances, function ($attendance) {
            return date('Y-m-d', strtotime($attendance['timestamp'])) === date('Y-m-d');
        });
        $userLookup = [];
        foreach ($users as $user) {
            $userLookup[$user['userid']] = $user['name'];
        }

        $attendanceData = [];

        foreach ($currentMonthAttendances as $attendance) {
            $userId = $attendance['id'];
            $date = date('Y-m-d', strtotime($attendance['timestamp']));
            $checkTime = date('H:i:s', strtotime($attendance['timestamp']));

            $userName = $userLookup[$userId] ?? '';

            if (!isset($attendanceData[$userId])) {
                $attendanceData[$userId] = [
                    'user_id' => $userId,
                    'user_name' => $userName,
                    'check_in' => $checkTime,
                    'check_out' => $checkTime,
                ];
            } else {
                if (strtotime($checkTime) > strtotime($attendanceData[$userId]['check_out'])) {
                    $attendanceData[$userId]['check_out'] = $checkTime;
                }
            }
        }

        $usercount = User::count();
        $notices = Notice::latest('id')->get();
        $data['leave_applications'] = LeaveApplication::latest('id')->get(['name', 'id', 'status']);
        // return view('admin.pages.HrandAdmin.all', $data);
        return view('metronic.pages.dashboard.hrDashboard', [
            'attendanceData'     => $attendanceData,
            'usercount'          => $usercount,
            'deviceip'           => $deviceip,
            'leave_applications' => $data['leave_applications'],
            'notices'            => $notices,
        ]);
    }

    public function accountsFinance()
    {
        return view('admin.pages.accounts.all');
    }

    public function business()
    {
        return view('admin.pages.business.all');
    }
    public function salesDashboard()
    {
        return view('admin.pages.dashboard.sales');
    }
    public function marketingDashboard()
    {
        return view('admin.pages.dashboard.marketing');
    }
}
