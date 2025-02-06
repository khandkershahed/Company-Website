<x-admin-app-layout :title="'Your Dashboard'">
    <div class="row pt-3">
        <div class="col-lg-4">
            {{-- Profile Card --}}
            <div class="card user-dash-bg">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="m-0 p-0">Welcome Back</h4>
                        <h1 class="m-0 p-0 user-name">{{ Auth::user()->name }}</h1>
                        <p class="m-0 p-0">{{ Auth::user()->designation }}</p>
                    </div>
                    <div>
                        <img class="rounded-1" width="250px" src="{{ asset('images/woman-man-with-laptop.png') }}"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            {{-- Attendance Info --}}
            <div class="card user-dash-bg">
                <div class="card-header p-2">
                    <h5 class="text-start">
                        Attendance
                    </h5>
                    <a href=""class="text-end">
                        <i class="fa-solid fa-arrow-up-right-from-square main_color go-icon"></i>
                    </a>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="card w-50 me-2" style="height: 7rem;">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                {{-- Icons Info --}}
                                <div>
                                    <i class="fa-solid fa-clock user-dash-icons text-center"></i>
                                    <p class="para-text m-0 ps-0">Check In</p>
                                </div>
                                <div>
                                    <h1 class="user-counter mb-0">
                                        {{-- @dd($check_in) --}}
                                        {{ !empty($check_in) ? $check_in : 'Absent' }}
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="card w-50" style="height: 7rem;">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                {{-- Icons Info --}}
                                <div>
                                    <i class="fa-solid fa-clock user-dash-icons"></i>
                                    <p class="para-text m-0 ps-0">Check Out</p>
                                </div>
                                <div>
                                    <h1 class="user-counter mb-0">
                                        {{ !empty($check_out) ? $check_out : 'Absent' }}
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="card w-50 me-2" style="height: 7rem;">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                {{-- Icons Info --}}
                                <div>
                                    <i class="fa-solid fa-building-circle-arrow-right user-dash-icons"></i>
                                    <p class="para-text m-0 ps-0">Movement</p>
                                </div>
                                <div>
                                    <h1 class="user-counter mb-0">None</h1>
                                </div>
                            </div>
                        </div>
                        {{-- @php
                            $absentCountA = collect($attendanceThisMonths)
                                ->where(function ($item) {
                                    return $item['check_in'] === 'N/A' &&
                                        isset($item['absent_note']) &&
                                        $item['absent_note'] !== 'Friday';
                                })
                                ->count();
                            // Filter late counts for 'Late (L)'
                            $lateCountL = collect($lateCounts)
                                ->where(function ($item) {
                                    return Carbon\Carbon::parse($item['check_in']) > Carbon\Carbon::parse('09:06:00') &&
                                        Carbon\Carbon::parse($item['check_in']) < Carbon\Carbon::parse('10:01:00');
                                })
                                ->count();

                            // Filter late counts for 'Half Day (LL)'
                            $lateCountLL = collect($lateCounts)
                                ->where(function ($item) {
                                    return Carbon\Carbon::parse($item['check_in']) > Carbon\Carbon::parse('10:01:00');
                                })
                                ->count();
                        @endphp
                        <div class="card me-2" style="width: 30%; height: 7rem;">
                            <div class="card-body pt-2">
                                <div class="d-flex justify-content-between align-items-center pt-1 px-2">
                                    <h5 class="user-counter mb-0">A</h5>
                                    <h5 class="user-counter mb-0">L</h5>
                                    <h5 class="user-counter mb-0">LL</h5>
                                </div>
                                <div class="d-flex justify-content-between align-items-center pt-2">
                                    <h5 class="user-counter amout-count mb-0">{{ $absentCountA }}</h5>
                                    <h5 class="user-counter amout-count mb-0">{{ $lateCountL }}</h5>
                                    <h5 class="user-counter amout-count mb-0">{{ $lateCountLL }}</h5>
                                </div>
                            </div>
                        </div> --}}
                        <div class="card" style="" id="myTab" role="tablist">
                            <div class="card-body d-flex justify-content-between align-items-center ps-1">
                                {{-- Icons Info --}}
                                <a href="javascript:void();" id="show-attendance">
                                    <div class="ps-1">
                                        <h4 class="user-counter mb-0 text-muted" style="line-height: 1">Monthly
                                            Attendance</h4>
                                        <img width="50px"src="{{ asset('images/attendance-arrow.png') }}"
                                            alt="">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            {{-- Achivement Info --}}
            <div class="card user-dash-bg">
                <div class="card-header py-0 px-2">
                    <p class="text-end pt-2 mb-0">
                        <a href="">
                            <i class="fa-solid fa-arrow-up-right-from-square main_color go-icon"></i>
                        </a>
                    </p>
                </div>
                <div class="card-body pt-0">
                    <h3>Access</h3>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="card me-2 user-inner-card" style="height: 12rem; width: 40%">
                            <div class="card-body align-items-center">
                                <p class="para-text m-0">Achieve</p>
                                <div class="d-flex justify-content-between align-items-center pt-3">
                                    <div>
                                        <i class="fa-solid fa-star text-yellow"></i>
                                        <i class="fa-solid fa-star text-yellow"></i>
                                        <i class="fa-solid fa-star text-yellow"></i>
                                        <i class="fa-regular fa-star-half-stroke text-yellow"></i>
                                        <i class="fa-regular fa-star"></i>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center pt-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p><i class="fa-solid fa-face-tired text-yellow" title="Unusual"
                                                style="font-size: 30px;"></i></p>
                                        <p>--</p>
                                        <p><i class="fa-regular fa-face-smile text-yellow" title="Unusual"
                                                style="font-size: 30px;"></i></p>
                                        <p>--</p>
                                        <p><i class="fa-regular fa-face-smile-beam text-yellow" title="Proud"
                                                style="font-size: 30px;"></i></p>
                                        <p>--</p>
                                        <p><i class="fa-regular fa-face-laugh-squint text-yellow" title="excellent"
                                                style="font-size: 30px;"></i></p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="mb-0" style="font-size: 10px">Worst</p>
                                    <p class="mb-0" style="font-size: 10px">-</p>
                                    <p class="mb-0" style="font-size: 10px">Unusual</p>
                                    <p class="mb-0" style="font-size: 10px">-</p>
                                    <p class="mb-0" style="font-size: 10px">Proude</p>
                                    <p class="mb-0" style="font-size: 10px">-</p>
                                    <p class="mb-0" style="font-size: 10px">Excellent</p>
                                </div>
                            </div>
                        </div>
                        <div class="card me-2" style="height: 12rem; width: 60%">
                            <div class="card-body user-inner-card pt-1">
                                <p class="para-text m-0">Your Access</p>
                                <div class="">
                                    <button class="btn navigation_btn w-100 mb-1">HR & ADMIN</button>
                                    <button class="btn navigation_btn w-100 mb-1">SITE SETTING</button>
                                    <button class="btn navigation_btn w-100 mb-1">SUPPLY CHAIN</button>
                                    <button class="btn navigation_btn w-100 mb-1">CRM</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>
