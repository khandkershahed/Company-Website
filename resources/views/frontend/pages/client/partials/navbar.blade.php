<div class="row align-items-center">
    <div class="col-lg-12">
        <div class="my-3">
            <div class="profile_title pb-3">
                <h3>Good Day, <strong class="main_color">{{ Auth::guard('client')->user()->name }}</strong></h3>
            </div>
            <div class="menu-items d-flex justify-content-between" style="border-bottom: 1px solid #c0c0c0">
                <ul class="d-flex profile-menu mb-0">
                    <li class="">
                        <a href="{{ route('client.project.overview') }}"
                            class="pt-1 {{ Route::current()->getName() == 'client.project.overview' ? 'menu-active' : '' }}">
                            Overview
                        </a>
                    </li>
                    <li class="mx-3 pb-2">
                        <a href="{{ route('client.project') }}"
                            class="pt-1 {{ Route::current()->getName() == 'client.project' ? 'menu-active' : '' }} {{ Route::current()->getName() == 'client.project.details' ? 'menu-active' : '' }}">
                            Projects
                        </a>
                    </li>
                    <li class="mx-3 pb-2">
                        <a href="{{ route('client.support') }}"
                            class="pt-1 {{ Route::current()->getName() == 'client.support' ? 'menu-active' : '' }} {{ Route::current()->getName() == 'client.support.details' ? 'menu-active' : '' }}">
                            Support
                        </a>
                    </li>
                    <li class="mx-3 pb-2">
                        <a href="{{ route('client.case') }}"
                            class="pt-1 {{ Route::current()->getName() == 'client.case' ? 'menu-active' : '' }} {{ Route::current()->getName() == 'client.case.details' ? 'menu-active' : '' }}">
                            Support Cases
                        </a>
                    </li>

                </ul>
                <ul class="d-flex profile-menu mb-0">
                    <li class="mx-3 pb-2 text-end text-black">
                        <a href="javascript:void(0);" title="Create Support Case"
                            data-bs-toggle="modal" data-bs-target="#casecommonmodal"><strong>+ Create Cases</strong>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="row gx-2">
            <div class="col-lg-4" onclick="window.location='{{ route('client.project') }}'" style="cursor: pointer;">
                <div class="card m-0 mb-3 rounded-0"
                    style="box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;">
                    <div class="card-body">
                        {{-- first Card --}}
                        <div>
                            <ul class="pt-2  mt-2 p-2 pb-2 mb-2 profile-card_menu" style="height: 68px;">

                                {{-- @php
                                    $latest_case = $cases->where('status', '!=', 'closed')->latest('id')->first();
                                @endphp --}}
                                @if ($latest_case)
                                    <li class="ms-3">
                                        <a href="{{ route('client.case.details', $latest_case->code) }}">
                                            <strong>{{ $latest_case->subject }}</strong>
                                        </a>
                                    </li>
                                @else
                                <li class="ms-2">
                                    There Is No Case Available
                                </li>
                                @endif
                            </ul>
                            <h6 class="ms-3 main_color fw-bold mb-3"> Recent Cases
                                ({{ count($cases->where('status', '!=', 'closed')) }})</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row gx-0">
                    <div class="card m-0 mb-3 rounded-0"
                        style="box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;">
                        <div class="card-body">
                            {{-- first Card --}}
                            <div class="row">
                                <div class="col-lg-4" onclick="window.location='{{ route('client.project') }}'"
                                    style="cursor: pointer;">

                                    <div class="border-right-column">
                                        <ul class="pt-2  mt-2 p-2 pb-2 mb-2 profile-card_menu">
                                            {{-- <li>
                                                <a href="">Pending : 5</a>
                                            </li> --}}
                                            <li>
                                                <a href="">Ongoing :
                                                    {{ count($projects->where('status', 'on_going')) }}</a>
                                            </li>
                                            <li>
                                                <a href="">Closed :
                                                    {{ count($projects->where('status', 'completed')) }}</a>
                                            </li>
                                        </ul>
                                        <h6 class="ps-2 p-0 m-0 main_color fw-bold"> Total Projects
                                            ({{ count($projects) }})</h6>
                                    </div>

                                </div>
                                <div class="col-lg-4" onclick="window.location='{{ route('client.support') }}'"
                                    style="cursor: pointer;">
                                    <div class="border-right-column">
                                        <ul class="pt-2  mt-2 p-2 pb-2 mb-2 profile-card_menu">
                                            {{-- <li>
                                                <a href="">Pending : 5</a>
                                            </li> --}}
                                            <li>
                                                <a href="">Ongoing :
                                                    {{ count($supports->where('status', 'on_going')) }}</a>
                                            </li>
                                            <li>
                                                <a href="">Closed :
                                                    {{ count($supports->where('status', 'closed')) }}</a>
                                            </li>
                                        </ul>
                                        <a href="{{ route('client.support') }}">
                                            <h6 class="ps-2 p-0 m-0 main_color fw-bold">Total Supports
                                                ({{ count($supports) }})</h6>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-4" onclick="window.location='{{ route('client.case') }}'"
                                    style="cursor: pointer;">
                                    <div class="">
                                        <ul class="pt-2  mt-2 p-2 pb-2 mb-2 profile-card_menu">
                                            {{-- <li>
                                                <a href="">Pending : 5</a>
                                            </li> --}}
                                            <li>
                                                <a href="">Ongoing :
                                                    {{ count($cases->where('status', '!=', 'closed')) }}</a>
                                            </li>
                                            <li>
                                                <a href="">Closed :
                                                    {{ count($cases->where('status', 'closed')) }}</a>
                                            </li>
                                        </ul>
                                        <a href="{{ route('client.case') }}">
                                            <h6 class="ps-2 p-0 m-0 main_color fw-bold">Total Support Cases
                                                ({{ count($cases) }})</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('frontend.pages.client.partials.case_modal')
