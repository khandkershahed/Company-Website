<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin\Rfq;
use App\Models\Admin\Brand;
use App\Models\Admin\Event;
use Rats\Zkteco\Lib\ZKTeco;
use App\Models\Admin\Notice;
use Illuminate\Http\Request;
use App\Models\Admin\Feature;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\Models\KPI\Attendance;
use App\Models\Admin\RfqProduct;
use App\Models\Admin\SubCategory;
use App\Models\Admin\StaffMeeting;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\EventCategory;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Admin\SolutionDetail;
use App\Models\Admin\SubSubCategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\LeaveApplication;

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

    // public function hrAdmin()
    // {
    //     set_time_limit(120);

    //     $deviceip = $this->device_ip(); // Get device IP

    //     // Initialize empty fallback data
    //     $attendances = [];
    //     $users = [];
    //     $attendanceData = [];

    //     // Try connecting to the ZKTeco device
    //     try {
    //         $zk = new ZKTeco($deviceip, 4370);
    //         if ($zk->connect()) {
    //             $zk->enableDevice();
    //             $attendances = $zk->getAttendance(2);
    //             $users = $zk->getUser();
    //         } else {
    //             Log::warning("ZKTeco device at {$deviceip} could not be connected.");
    //         }
    //     } catch (\Exception $e) {
    //         Log::error("ZKTeco connection failed: " . $e->getMessage());
    //     }

    //     // Filter today's attendance
    //     $currentDay = date('Y-m-d');
    //     $currentDayAttendances = array_filter($attendances, function ($attendance) use ($currentDay) {
    //         return isset($attendance['timestamp']) &&
    //             date('Y-m-d', strtotime($attendance['timestamp'])) === $currentDay;
    //     });

    //     // Create lookup for user names
    //     $userLookup = [];
    //     foreach ($users as $user) {
    //         if (isset($user['userid'], $user['name'])) {
    //             $userLookup[$user['userid']] = $user['name'];
    //         }
    //     }

    //     // Process attendance data
    //     foreach ($currentDayAttendances as $attendance) {
    //         if (!isset($attendance['id'], $attendance['timestamp'])) {
    //             continue; // Skip malformed entries
    //         }

    //         $userId = $attendance['id'];
    //         $checkTime = date('H:i:s', strtotime($attendance['timestamp']));
    //         $userName = $userLookup[$userId] ?? 'Unknown';

    //         if (!isset($attendanceData[$userId])) {
    //             $attendanceData[$userId] = [
    //                 'user_id'   => $userId,
    //                 'user_name' => $userName,
    //                 'check_in'  => $checkTime,
    //                 'check_out' => $checkTime,
    //             ];
    //         } else {
    //             // Update latest checkout time
    //             if (strtotime($checkTime) > strtotime($attendanceData[$userId]['check_out'])) {
    //                 $attendanceData[$userId]['check_out'] = $checkTime;
    //             }
    //         }
    //     }
    //     dd($attendanceData);
    //     // Other dashboard data
    //     $usercount = User::count();
    //     $notices = Notice::latest('id')->get();

    //     // Handle missing or failed queries safely
    //     try {
    //         $leaveApplications = LeaveApplication::latest('id')->get(['name', 'id', 'status']);
    //     } catch (\Exception $e) {
    //         Log::error("Error fetching leave applications: " . $e->getMessage());
    //         $leaveApplications = collect(); // fallback to empty collection
    //     }

    //     // Return view with safe data
    //     return view('metronic.pages.dashboard.hrDashboard', [
    //         'attendanceData'     => $attendanceData,
    //         'usercount'          => $usercount,
    //         'deviceip'           => $deviceip,
    //         'leave_applications' => $leaveApplications,
    //         'notices'            => $notices,
    //     ]);
    // }

    public function hrDashboard(Request $request)
    {
        // $documents = $user->staffDocuments;
        $userId = $request->input('user_id') ? $request->input('user_id') : Auth::user()->id;
        $user_name = User::find($userId)->name;
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
                    'user_name' => $user_name,
                    'status' => 'Friday',
                ];
            } elseif ($rawAttendances->has($dateString)) {
                $record = $rawAttendances[$dateString];
                $attendances[] = [
                    'date' => $dateString,
                    'check_in' => $record->check_in,
                    'check_out' => $record->check_out,
                    'user_name' => $user_name,
                    'status' => $record->status ?? 'Present',
                ];
            } else {
                $attendances[] = [
                    'date' => $dateString,
                    'check_in' => null,
                    'check_out' => null,
                    'user_name' => $user_name,
                    'status' => 'Absent',
                ];
            }
        }
        $attendances = collect($attendances);
        $leaveApplications = LeaveApplication::latest('created_at')->get();
        $sicks = $leaveApplications->where('type_of_leave', 'sick');
        $earneds = $leaveApplications->where('type_of_leave', 'earned');
        $casuals = $leaveApplications->where('type_of_leave', 'casual');
        $pendings = $leaveApplications->where('status', 'pending');

        $startOfWeek = Carbon::now()->startOfWeek(Carbon::SATURDAY);
        $endOfWeek = Carbon::now()->endOfWeek(Carbon::FRIDAY);

        // 2. Create date range for each day of the week
        $dateRange = collect();
        for ($date = $startOfWeek->copy(); $date->lte($endOfWeek); $date->addDay()) {
            $dateRange->push([
                'carbon_date' => $date->copy(),
                'date_key' => $date->format('Y-m-d'),
                'day_short' => $date->format('D'),
                'day_num' => $date->format('d'),
            ]);
        }

        // 3. Fetch all meetings within the week
        $meetings = StaffMeeting::with(['leader', 'staff'])
            ->whereBetween('date', [$startOfWeek->toDateString(), $endOfWeek->toDateString()])
            ->orderBy('start_time')
            ->get();

        // 4. Group meetings by date_key for easy access in the view
        $meetingsForWeek = $meetings->groupBy(function ($meeting) {
            return $meeting->date->format('Y-m-d');
        });

        // 5. Optional: Set today’s date as default active tab
        $activeDayDateKey = Carbon::now()->format('Y-m-d');

        $data = [

            'attendances'       => Attendance::with('user')->whereDate('date', Carbon::today())->get(),
            'total_attendances' => $attendances,
            'selectedUser'      => $userId,
            'selectedMonth'     => $monthInput,
            'users'             => User::get(['id', 'name']),
            'notices'           => Notice::latest('id')->get(),
            'sicks'             => $sicks,
            'earneds'           => $earneds,
            'casuals'           => $casuals,
            'pendings'          => $pendings,
            'dateRange'         => $dateRange,
            'meetingsForWeek'   => $meetingsForWeek,
            'activeDayDateKey'  => $activeDayDateKey,
        ];
        // dd(Carbon::today());
        // dd($data['attendances']);
        return view('metronic.pages.dashboard.hrDashboard', $data);
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
        // 1. Base Sales Query (Deals)
        $salesQuery = Rfq::where('rfq_type', 'sales');

        // 2. Metrics
        $todaySales = (clone $salesQuery)->whereDate('created_at', Carbon::today())->sum('total_price');
        $currentYearSales = (clone $salesQuery)->sum('total_price');

        // 3. Target & Achievement (Example Logic)
        $target = 100000; // You can make this dynamic from a settings table
        $achievementPercent = $target > 0 ? ($currentYearSales / $target) * 100 : 0;

        // 4. Pipeline Counts
        $allRfqs = Rfq::all();
        $pendings = $allRfqs->where('status', 'rfq_created');
        $quoteds = $allRfqs->where('status', 'quoted');

        // 5. Forecast / Pipeline Value
        $quotedValue = Rfq::where('status', 'quoted')->sum('quoted_price');

        // 6. Recent Lists (Tables)
        $currentMonthSalesList = (clone $salesQuery)
            ->whereMonth('sale_date', Carbon::now()->month)
            ->latest('sale_date')
            ->take(5)
            ->get();

        $recentPendingRfqs = Rfq::where('status', 'rfq_created')
            ->latest()
            ->take(5)
            ->get();

        // 7. Charts Data
        // Sales By Country
        $salesByCountry = (clone $salesQuery)
            ->select('country', DB::raw('sum(total_price) as total'))
            ->groupBy('country')
            ->orderByDesc('total')
            ->take(5)
            ->get();

        // Sales By Product (Assuming Brand Name for simplicity in grouping)
        $salesByProduct = RfqProduct::select('brand_name', DB::raw('sum(total_price) as total'))
            ->whereHas('rfq', function ($q) {
                $q->where('status', 'deal');
            })
            ->groupBy('brand_name')
            ->orderByDesc('total')
            ->take(5)
            ->get();

        $data = [
            'todaySales' => $todaySales,
            'currentYearSales' => $currentYearSales,
            'target' => $target,
            'achievementPercent' => $achievementPercent,
            'pendings' => $pendings,
            'quoteds' => $quoteds,
            'quotedValue' => $quotedValue,
            'currentMonthSalesList' => $currentMonthSalesList,
            'recentPendingRfqs' => $recentPendingRfqs,
            'salesByCountry' => $salesByCountry,
            'salesByProduct' => $salesByProduct,
        ];

        return view('metronic.pages.sales.saleDashboard', $data);
    }


    public function marketingDashboard()
    {
        $data = [];
        return view('metronic.pages.marketing.marketingDashboard', $data);
    }
}
