<?php

namespace App\Http\Controllers\Attendance;

use Rats\Zkteco\Lib\ZKTeco;
use Illuminate\Http\Request;
use App\Models\Admin\Attendance;
use App\Http\Controllers\Controller;
use App\Models\Admin\Event;
use App\Models\User;
use DateTime;
use DateTimeZone;
use DatePeriod;
use DateInterval;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

class BioMetricController extends Controller
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

    public function device_setip(Request $request)
    {

        session()->put('dip', $request->deviceip);
        Toastr::success('IP has been set.');
        return redirect()->back();
    }

    // public function index()
    // {
    //     $deviceip = $this->device_ip();
    //     $zk = new ZKTeco($deviceip, 4370);
    //     $zk->connect();
    //     $zk->enableDevice();

    //     $attendances = $zk->getAttendance();
    //     $users = $zk->getUser(); // Retrieve user data from the device

    //     // Filter attendances for the current month
    //     $currentMonthAttendances = array_filter($attendances, function ($attendance) {
    //         return date('Y-m-d', strtotime($attendance['timestamp'])) === date('Y-m-d');
    //     });

    //     // Organize attendance data by date and user
    //     $attendanceData = [];
    //     foreach ($currentMonthAttendances as $attendance) {
    //         $date = date('Y-m-d', strtotime($attendance['timestamp']));
    //         $userId = $attendance['id'];
    //         $checkTime = date('H:i:s', strtotime($attendance['timestamp']));

    //         // Find the user's name from the $users array
    //         $userName = '';
    //         foreach ($users as $user) {
    //             if ($user['userid'] == $userId) {
    //                 $userName = $user['name'];
    //                 break;
    //             }
    //         }

    //         if (!isset($attendanceData[$date][$userId])) {
    //             $attendanceData[$date][$userId] = [
    //                 'user_id' => $userId,
    //                 'user_name' => $userName,
    //                 'check_in' => $checkTime,
    //                 'check_out' => $checkTime,
    //             ];
    //         } else {
    //             // Update check-out time if a later time is encountered
    //             if (strtotime($checkTime) > strtotime($attendanceData[$date][$userId]['check_out'])) {
    //                 $attendanceData[$date][$userId]['check_out'] = $checkTime;
    //             }
    //         }
    //     }
    //     $deviceip = $this->device_ip();
    //     $users = User::get();
    //     dd($attendanceData);
    //     return view('admin.pages.attendance.device', [
    //         'attendanceData' => $attendanceData,
    //         'users'          => $users,
    //         'deviceip'       => $deviceip,

    //     ]);
    // }
    public function index()
    {
        $deviceip = $this->device_ip();
        $zk = new ZKTeco($deviceip, 4370);
        $zk->connect();
        $zk->enableDevice();

        $attendances = $zk->getAttendance(1);
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
        // $users = User::get();
        // dd(($attendanceData));

        // dd(count($attendanceData));

        return view('admin.pages.attendance.device', [
            'attendanceData' => $attendanceData,
            'users' => $users,
            'deviceip' => $deviceip,
        ]);
    }



    public function device_user_data()
    {
        $deviceip = $this->device_ip();
        $zk = new ZKTeco($deviceip, 4370);

        $zk->connect();
        // $zk->disableDevice();
        $zk->enableDevice();


        $users = $zk->getUser();
        // dd($users);

        return view('admin.pages.attendance.device-user-data', ['users' => $users]);
    }


    // public function device_attendance_data()
    // {
    //     $deviceip = $this->device_ip();
    //     $zk       = new ZKTeco($deviceip, 4370);
    //     $zk->connect();
    //     $zk->disableDevice();

    //     $attendances = $zk->getAttendance();


    //     // Filter attendances for the current month
    //     $currentMonthAttendances = array_filter($attendances, function ($attendance) {
    //         return date('Y-m', strtotime($attendance['timestamp'])) === date('Y-m');
    //     });

    //     // Filter and process attendance data to keep only one entry per user within 24 hours
    //     $processedAttendances = [];
    //     $usersWithin24Hours   = [];

    //     foreach ($currentMonthAttendances as $attendance) {
    //         $empId    = $attendance['id'];
    //         $timestamp = strtotime($attendance['timestamp']);

    //         // Check if the user's entry is within 24 hours of the last entry H: 86400
    //         if (!isset($usersWithin24Hours[$empId]) || ($timestamp - $usersWithin24Hours[$empId]) >= 86400) {
    //             $processedAttendances[]     = $attendance;
    //             $usersWithin24Hours[$empId] = $timestamp;
    //         }
    //     }

    //     return view('admin.pages.attendance.device-attendance-data', ['attendances' => $processedAttendances]);
    // }

    // public function device_attendance_data()
    // {
    //     $deviceip = $this->device_ip();
    //     $zk       = new ZKTeco($deviceip, 4370);
    //     $zk->connect();
    //     // $zk->disableDevice();
    //     $zk->enableDevice();


    //     $attendances = $zk->getAttendance();

    //     $attendances = $zk->getAttendance();

    //     // Filter attendances for the current month
    //     $currentMonthAttendances = array_filter($attendances, function ($attendance) {
    //         return date('Y-m', strtotime($attendance['timestamp'])) === date('Y-m');
    //     });

    //     // Process attendance data to keep only one entry per user within 24 hours
    //     $processedAttendances = [];
    //     $usersLastCheckIn = [];
    //     $usersLastCheckOut = [];

    //     foreach ($currentMonthAttendances as $attendance) {
    //         $empId = $attendance['id'];
    //         $timestamp = strtotime($attendance['timestamp']);
    //         $date = date('Y-m-d', $timestamp);

    //         if (!isset($usersLastCheckIn[$empId]) && !isset($usersLastCheckOut[$empId])) {
    //             // First attendance record of the day
    //             $usersLastCheckIn[$empId] = $timestamp;
    //             $usersLastCheckOut[$empId] = $timestamp;
    //         } elseif ($date === date('Y-m-d', $usersLastCheckIn[$empId])) {
    //             // Check if it's the same day, and update the last check-out time
    //             $usersLastCheckOut[$empId] = $timestamp;
    //         } else {
    //             // New day, save the last check-in and check-out
    //             $processedAttendances[] = [
    //                 'user_id' => $empId,
    //                 'check_in' => date('Y-m-d H:i:s', $usersLastCheckIn[$empId]),
    //                 'check_out' => date('Y-m-d H:i:s', $usersLastCheckOut[$empId]),
    //             ];

    //             // Reset for the new day
    //             $usersLastCheckIn[$empId] = $timestamp;
    //             $usersLastCheckOut[$empId] = $timestamp;
    //         }
    //     }

    //     // Save the last attendance records of the month
    //     foreach ($usersLastCheckIn as $empId => $timestamp) {
    //         $processedAttendances[] = [
    //             'user_id' => $empId,
    //             'check_in' => date('Y-m-d H:i:s', $timestamp),
    //             'check_out' => date('Y-m-d H:i:s', $usersLastCheckOut[$empId]),
    //         ];
    //     }

    //     // Save the processed attendance records in the database
    //     foreach ($processedAttendances as $attendanceData) {
    //         Attendance::create($attendanceData);
    //     }

    //     // Retrieve and display the processed attendance data in the view
    //     $attendances = Attendance::orderBy('check_in', 'desc')->paginate(10);

    //     return view('admin.pages.attendance.device-attendance-data', ['attendances' => $attendances]);
    // }

    // public function device_attendance_data()
    // {
    //     $deviceip = $this->device_ip();
    //     $zk = new ZKTeco($deviceip, 4370);
    //     $zk->connect();
    //     $zk->enableDevice();

    //     $attendances = $zk->getAttendance();
    //     // Filter attendances for the current month
    //     $currentMonthAttendances = array_filter($attendances, function ($attendance) {
    //         return date('Y-m', strtotime($attendance['timestamp'])) === date('Y-m');
    //     });

    //     // Organize attendance data by date and user
    //     $attendanceData = [];
    //     foreach ($currentMonthAttendances as $attendance) {
    //         $date = date('Y-m-d', strtotime($attendance['timestamp']));
    //         $userId = $attendance['id'];
    //         $checkTime = date('H:i:s', strtotime($attendance['timestamp']));

    //         if (!isset($attendanceData[$date][$userId])) {
    //             $attendanceData[$date][$userId] = [
    //                 'check_in' => $checkTime,
    //                 'check_out' => $checkTime,
    //             ];
    //         } else {
    //             // Update check-out time if a later time is encountered
    //             if (strtotime($checkTime) > strtotime($attendanceData[$date][$userId]['check_out'])) {
    //                 $attendanceData[$date][$userId]['check_out'] = $checkTime;
    //             }
    //         }
    //     }

    //     // Save attendance data to the 'Attendance' table
    //     // foreach ($attendanceData as $date => $userData) {
    //     //     foreach ($userData as $userId => $times) {
    //     //         Attendance::create([
    //     //             'user_id' => $userId,
    //     //             'check_in' => $date . ' ' . $times['check_in'],
    //     //             'check_out' => $date . ' ' . $times['check_out'],
    //     //         ]);
    //     //     }
    //     // }

    //     // Return the organized attendance data to the view
    //     return view('admin.pages.attendance.device-attendance-data', ['attendanceData' => $attendanceData]);
    // }


    public function device_attendance_data()
    {
        $deviceip = $this->device_ip();
        $zk = new ZKTeco($deviceip, 4370);
        $zk->connect();
        $zk->enableDevice();

        $attendances = $zk->getAttendance(1);
        $currentDate = date('Y-m-d');

        // Filter attendance data for today
        $todaysAttendance = array_filter($attendances, function ($record) use ($currentDate) {
            // Assuming the date format in the attendance data is 'Y-m-d H:i:s'
            return substr($record['timestamp'], 0, 10) === $currentDate && $record['id'] == 106;
        });

        // Sort the filtered data by timestamp
        usort($todaysAttendance, function ($a, $b) {
            return strtotime($a['timestamp']) - strtotime($b['timestamp']);
        });

        // Get the earliest (check-in) and latest (check-out) attendance
        $checkIn = isset($todaysAttendance[0]) ? $todaysAttendance[0] : null;  // First record (earliest timestamp)
        $checkOut = isset($todaysAttendance[count($todaysAttendance) - 1]) ? $todaysAttendance[count($todaysAttendance) - 1] : null; // Last record (latest timestamp)

        // $attendances = $attendances->where();
        dd($checkIn, $checkOut);
        dd($todaysAttendance);
        // $users = $zk->getUser(); // Retrieve user data from the device

        // // Filter attendances for the current month
        // $currentMonthAttendances = array_filter($attendances, function ($attendance) {
        //     return date('Y-m', strtotime($attendance['timestamp'])) === date('Y-m');
        // });

        // // Organize attendance data by date and user
        // $attendanceData = [];
        // foreach ($currentMonthAttendances as $attendance) {
        //     $date = date('Y-m-d', strtotime($attendance['timestamp']));
        //     $userId = $attendance['id'];
        //     $checkTime = date('H:i:s', strtotime($attendance['timestamp']));

        //     // Find the user's name from the $users array
        //     $userName = '';
        //     foreach ($users as $user) {
        //         if ($user['userid'] == $userId) {
        //             $userName = $user['name'];
        //             break;
        //         }
        //     }

        //     if (!isset($attendanceData[$date][$userId])) {
        //         $attendanceData[$date][$userId] = [
        //             'user_id' => $userId,
        //             'user_name' => $userName,
        //             'check_in' => $checkTime,
        //             'check_out' => $checkTime,
        //         ];
        //     } else {
        //         // Update check-out time if a later time is encountered
        //         if (strtotime($checkTime) > strtotime($attendanceData[$date][$userId]['check_out'])) {
        //             $attendanceData[$date][$userId]['check_out'] = $checkTime;
        //         }
        //     }
        // }

        // Save attendance data to the 'Attendance' table
        // foreach ($attendanceData as $date => $userData) {
        //     foreach ($userData as $data) {
        //         Attendance::create([
        //             'user_id' => $data['user_id'],
        //             'user_name' => $data['user_name'],
        //             'check_in' => $date . ' ' . $data['check_in'],
        //             'check_out' => $date . ' ' . $data['check_out'],
        //         ]);
        //     }
        // }
        dd($attendances);

        // Return the organized attendance data to the view
        return view('admin.pages.attendance.device-attendance-data', ['attendances' => $attendances]);
    }


    // public function attendanceDataSingle($id)
    // {
    //     // Connect to the ZKtecho device
    //     $deviceip = $this->device_ip();
    //     $zk = new ZKTeco($deviceip, 4370);
    //     $zk->connect();
    //     $zk->enableDevice();

    //     // Retrieve attendances and user data from the device
    //     $attendances_all = $zk->getAttendance(2);
    //     $users = $zk->getUser();
    //     $user = null;

    //     foreach ($users as $userData) {
    //         if ($userData['userid'] === $id) {
    //             $user = $userData;
    //             break; // Exit the loop once a match is found
    //         }
    //     }

    //     // Initialize an array to store the user's attendance data
    //     $attendanceData = [];

    //     if ($user) {
    //         $user_name = $user['name'];

    //         // Get the first day and last day of the previous month
    //         $firstDayLastMonth = date('Y-m-01', strtotime('last month'));
    //         $lastDayLastMonth = date('Y-m-t', strtotime('last month'));

    //         // Filter attendances for the previous month
    //         $lastMonthAttendances = array_filter($attendances_all, function ($attendance) use ($id, $firstDayLastMonth, $lastDayLastMonth) {
    //             $attendanceDate = date('Y-m-d', strtotime($attendance['timestamp']));
    //             return ($attendanceDate >= $firstDayLastMonth) && ($attendanceDate <= $lastDayLastMonth) && ($attendance['id'] === $id);
    //         });

    //         // Loop through the filtered attendances
    //         foreach ($lastMonthAttendances as $attendance) {
    //             $attendanceDate = date('Y-m-d', strtotime($attendance['timestamp']));
    //             $checkTime = date('H:i:s', strtotime($attendance['timestamp']));

    //             // Create a unique key for each day
    //             $key = $attendanceDate;

    //             if (!isset($attendanceData[$key])) {
    //                 $attendanceData[$key] = [
    //                     'user_id' => $id,
    //                     'user_name' => $user_name,
    //                     'date' => $attendanceDate,
    //                     'check_in' => $checkTime,
    //                     'check_out' => $checkTime,
    //                 ];
    //             } else {
    //                 if (strtotime($checkTime) > strtotime($attendanceData[$key]['check_out'])) {
    //                     $attendanceData[$key]['check_out'] = $checkTime;
    //                 }
    //             }
    //         }
    //     }

    //     return view('admin.pages.attendance.attendance-single', ['attendanceData' => $attendanceData, 'user_name' => $user_name]);
    // }

    public function attendanceDataCurrentMonth($id)
    {
        // Connect to the ZKtecho device
        $deviceip = $this->device_ip();
        $zk = new ZKTeco($deviceip, 4370);
        $zk->connect();
        $zk->enableDevice();

        // $startDate = new DateTime('first day of this month');
        // $endDate = new DateTime('today +1 day');

        $attendances_all = $zk->getAttendance(2);
        $users = $zk->getUser();
        $user = null;

        foreach ($users as $userData) {
            if ($userData['userid'] === $id) {
                $user = $userData;
                break; // Exit the loop once a match is found
            }
        }

        // Initialize an array to store the user's attendance data
        $attendanceThisMonth = [];

        if ($user) {
            $user_name = $user['name'];

            $startDate = new DateTime('first day of this month');

            // Get today's date
            $endDate = new DateTime('today +1 day');

            // Initialize the array to store attendance data for this month
            $attendanceThisMonth = [];

            // Iterate from the first day of the month to today
            foreach (new DatePeriod($startDate, new DateInterval('P1D'), $endDate) as $date) {
                $currentDate = $date->format('Y-m-d');

                // Check if there is attendance data for the current date
                $attendanceForDate = array_filter($attendances_all, function ($attendance) use ($id, $currentDate) {
                    return (new DateTime($attendance['timestamp']))->format('Y-m-d') === $currentDate && $attendance['id'] === $id;
                });

                // If attendance data is found for the current date
                if (count($attendanceForDate) > 0) {
                    $earliestCheckIn = min(array_column($attendanceForDate, 'timestamp'));
                    $latestCheckOut = max(array_column($attendanceForDate, 'timestamp'));
                    $absentNote = null; // Reset the absent note
                } else {
                    // If there is no attendance data for the current date, set default values
                    $earliestCheckIn = 'N/A';
                    $latestCheckOut = 'N/A';
                    // Check if it's a Friday, mark it accordingly
                    $absentNote = $date->format('N') === '5' ? 'Friday' : 'Absent';
                }

                // Format check-in and check-out times if they are not 'N/A'
                $formattedCheckIn = $earliestCheckIn === 'N/A' ? 'N/A' : (new DateTime($earliestCheckIn))->format('H:i:s');
                $formattedCheckOut = $latestCheckOut === 'N/A' ? 'N/A' : (new DateTime($latestCheckOut))->format('H:i:s');

                // Add attendance data for the current date to the array
                $attendanceThisMonth[] = [
                    'user_id' => $id,
                    'user_name' => $user_name,
                    'date' => $currentDate,
                    'check_in' => $formattedCheckIn,
                    'check_out' => $formattedCheckOut,
                    'absent_note' => $absentNote,
                ];
            }
        }

        return view('admin.pages.attendance.attendanceCurrentMonth', ['attendanceData' => $attendanceThisMonth, 'user_name' => $user_name]);
    }
    public function attendanceDataSingle($id)
    {
        // Connect to the ZKtecho device
        $deviceip = $this->device_ip();
        $zk = new ZKTeco($deviceip, 4370);
        $zk->connect();
        $zk->enableDevice();

        $attendances_all = $zk->getAttendance(2);
        $users = $zk->getUser();
        $user = null;

        foreach ($users as $userData) {
            if ($userData['userid'] === $id) {
                $user = $userData;
                break; // Exit the loop once a match is found
            }
        }

        // Initialize an array to store the user's attendance data
        $attendanceLastMonth = [];

        if ($user) {
            $user_name = $user['name'];

            // Calculate the start date as the first day of April
            $firstDayLastMonth = date('Y-m-01', strtotime('last month'));
            $lastDayLastMonth = date('Y-m-t', strtotime('last month'));
            // $startDate = new DateTime('first day of April');

            // // Calculate the end date as the last moment of April 30th
            // $endDate = new DateTime('last day of April');
            $startDate = new DateTime($firstDayLastMonth);
            $endDate = new DateTime($lastDayLastMonth);
            $endDate->setTime(23, 59, 59);

            // Iterate from the first day of April to the last day of April
            foreach (new DatePeriod($startDate, new DateInterval('P1D'), $endDate) as $date) {
                $currentDate = $date->format('Y-m-d');

                // Check if there is attendance data for the current date
                $attendanceForDate = array_filter($attendances_all, function ($attendance) use ($id, $currentDate) {
                    return (new DateTime($attendance['timestamp']))->format('Y-m-d') === $currentDate && $attendance['id'] === $id;
                });

                // If attendance data is found for the current date
                if (count($attendanceForDate) > 0) {
                    $earliestCheckIn = min(array_column($attendanceForDate, 'timestamp'));
                    $latestCheckOut = max(array_column($attendanceForDate, 'timestamp'));
                    $absentNote = null; // Reset the absent note
                } else {
                    // If there is no attendance data for the current date, set default values
                    $earliestCheckIn = 'N/A';
                    $latestCheckOut = 'N/A';
                    // Check if it's a Friday, mark it accordingly
                    $absentNote = $date->format('N') === '5' ? 'Friday' : 'Absent';
                }

                // Format check-in and check-out times if they are not 'N/A'
                $formattedCheckIn = $earliestCheckIn === 'N/A' ? 'N/A' : (new DateTime($earliestCheckIn))->format('H:i:s');
                $formattedCheckOut = $latestCheckOut === 'N/A' ? 'N/A' : (new DateTime($latestCheckOut))->format('H:i:s');

                // Add attendance data for the current date to the array
                $attendanceLastMonth[] = [
                    'user_id' => $id,
                    'user_name' => $user_name,
                    'date' => $currentDate,
                    'check_in' => $formattedCheckIn,
                    'check_out' => $formattedCheckOut,
                    'absent_note' => $absentNote,
                ];
            }
        }

        return view('admin.pages.attendance.attendance-single', ['attendanceData' => $attendanceLastMonth, 'user_name' => $user_name]);
    }

    // public function attendanceDataCurrentMonth($id)
    // {
    //     // Connect to the ZKtecho device
    //     $deviceip = $this->device_ip();
    //     $zk = new ZKTeco($deviceip, 4370);
    //     $zk->connect();
    //     $zk->enableDevice();

    //     $startDate = new DateTime('first day of this month');
    //     $endDate = new DateTime('today +1 day');

    //     $attendances_all = $zk->getAttendance(2);
    //     $users = $zk->getUser();
    //     $user = null;

    //     foreach ($users as $userData) {
    //         if ($userData['userid'] === $id) {
    //             $user = $userData;
    //             break; // Exit the loop once a match is found
    //         }
    //     }

    //     // Initialize an array to store the user's attendance data
    //     $attendanceThisMonth = [];

    //     if ($user) {
    //         $user_name = $user['name'];

    //         // Iterate from the first day of the month to today
    //         foreach (new DatePeriod($startDate, new DateInterval('P1D'), $endDate) as $date) {
    //             $currentDate = $date->format('Y-m-d');

    //             // Filter attendances for the current date
    //             $dailyAttendances = array_filter($attendances_all, function ($attendance) use ($id, $currentDate) {
    //                 $attendanceDate = date('Y-m-d', strtotime($attendance['timestamp']));
    //                 return ($attendanceDate === $currentDate) && ($attendance['id'] === $id);
    //             });

    //             // Initialize the attendance data for the current date
    //             $attendanceData = [
    //                 'user_id'     => $id,
    //                 'user_name'   => $user_name,
    //                 'date'        => $currentDate,
    //                 'check_in'    => null,
    //                 'check_out'   => null,
    //                 'absent_note' => null,
    //             ];

    //             // If there are attendances for the current date, update attendance data
    //             if (!empty($dailyAttendances)) {
    //                 foreach ($dailyAttendances as $attendance) {
    //                     $checkTime = date('H:i:s', strtotime($attendance['timestamp']));

    //                     if (!$attendanceData['check_in'] || strtotime($checkTime) < strtotime($attendanceData['check_in'])) {
    //                         $attendanceData['check_in'] = $checkTime;
    //                     };

    //                     if (!$attendanceData['check_out'] || strtotime($checkTime) > strtotime($attendanceData['check_out'])) {
    //                         $attendanceData['check_out'] = $checkTime;
    //                     };
    //                     if ($attendanceData['check_in'] === null) {

    //                         if ($date->format('N') == 5) {
    //                             echo "It's Friday!" . PHP_EOL;
    //                             $attendanceData['absent_note'] = 'Friday';
    //                         } else {
    //                             echo "It's not Friday!" . PHP_EOL;
    //                             $attendanceData['absent_note'] = 'Absent';
    //                         }
    //                     } else {
    //                         $attendanceData['absent_note'] = null;
    //                     }

    //                 }
    //             }

    //             // Add attendance data for the current date to the array
    //             $attendanceThisMonth[] = $attendanceData;
    //         }
    //     }

    //     return view('admin.pages.attendance.attendanceCurrentMonth', ['attendanceData' => $attendanceThisMonth, 'user_name' => $user_name]);
    // }


    public function device_information()
    {
        $deviceip = $this->device_ip();
        $zk = new ZKTeco($deviceip, 4370);

        $zk->connect();
        // $zk->disableDevice();

        $data = [
            'deviceip'           => $deviceip,
            'deviceVersion'      => $zk->version(),
            'deviceOSVersion'    => $zk->osVersion(),
            'devicePlatform'     => $zk->platform(),
            'devicefmVersion'    => $zk->fmVersion(),
            'deviceworkCode'     => $zk->workCode(),
            'devicessr'          => $zk->ssr(),
            'devicepinWidth'     => $zk->pinWidth(),
            'deviceserialNumber' => $zk->serialNumber(),
            'devicedeviceName'   => $zk->deviceName(),
            'devicegetTime'      => $zk->getTime()
        ];

        return view('admin.pages.attendance.device-information', $data);
    }


    public function device_adduser()
    {
        $deviceip = $this->device_ip();
        return view('admin.pages.attendance.device-adduser', compact('deviceip'));
    }

    public function device_setuser(Request $request)
    {
        $deviceip = $this->device_ip();
        $uid      = $request->uid;
        $userid   = $request->userid;
        $name     = $request->name;
        $role     = (int)$request->role;
        $password = $request->password;
        $cardno   = $request->cardno;
        $zk       = new ZKTeco($deviceip, 4370);
        $zk->connect();
        $zk->disableDevice();
        $zk->setUser($uid, $userid, $name, $role, $password, $cardno);

        Toastr::success('User added to device successfully.');
        return redirect()->back();
    }

    public function device_removeuser_single($uid)
    {
        $deviceip = $this->device_ip();
        $zk = new ZKTeco($deviceip, 4370);
        $zk->connect();
        $zk->disableDevice();
        $zk->removeUser($uid);

        Toastr::success('User removed from device successfully.');
        return redirect()->back();
    }

    public function device_viewuser_single(Request $request)
    {
        $deviceip = $this->device_ip();
        $zk = new ZKTeco($deviceip, 4370);

        $zk->connect();
        $userfingerprints = $zk->getFingerprint($request->uid);

        $data = [
            'deviceip'         => $deviceip,
            'uid'              => $request->uid,
            'userid'           => $request->userid,
            'name'             => $request->name,
            'role'             => (int)$request->role,
            'password'         => $request->password,
            'cardno'           => $request->cardno,
            'userfingerprints' => $userfingerprints
        ];

        return view('admin.pages.attendance.device-information-user', $data);
    }


    public function device_data_clear_attendance()
    {
        $deviceip = $this->device_ip();

        $zk = new ZKTeco($deviceip, 4370);
        $zk->connect();
        $zk->disableDevice();
        $zk->clearAttendance();

        Toastr::success('Attendance cleared successfully.');
        return redirect()->back();
    }

    public function device_restart()
    {
        $deviceip = $this->device_ip();

        $zk = new ZKTeco($deviceip, 4370);
        $zk->connect();
        $zk->disableDevice();
        $zk->restart();

        Toastr::success('Device restart successfully.');
        return redirect()->back();
    }

    public function device_shutdown()
    {
        $deviceip = $this->device_ip();

        $zk = new ZKTeco($deviceip, 4370);
        $zk->connect();
        $zk->disableDevice();
        $zk->shutdown();

        return redirect()->back();
    }
}
