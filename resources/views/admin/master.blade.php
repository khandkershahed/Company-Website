<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    @include('admin.partials.head')
</head>

<body>
    <div class="preloader" style="background: black;">
        {{-- <img src="{{ asset('frontend/images/backend_loader.gif') }}" alt="Loading..." class="preloader-spinner"> --}}
        <img src="{{ asset('frontend/images/backend_loader.gif') }}" alt="Loading..." class="preloader-spinner" width="665px">
    </div>
    <!-- Main navbar -->
    @include('admin.partials.header')
    <!-- /main navbar -->


    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        @include('admin.partials.sidebar')
        <!-- /main sidebar -->
        <div class="content-wrapper">
            @include('admin.partials.toastr')
            <div class="content-inner">
                <!-- Main content -->
                @yield('content')
                <!-- /main content -->
                <!-- Footer -->
                @include('admin.partials.footer')
                <!-- /footer -->
            </div>
        </div>
    </div>
    <!-- /page content -->

    <!-- Notifications -->
    {{-- <div class="offcanvas offcanvas-end" tabindex="-1" id="notifications">
		<div class="offcanvas-header py-0">
			<h5 class="offcanvas-title py-3">Activity</h5>
			<button type="button" class="btn btn-light btn-sm btn-icon border-transparent rounded-pill" data-bs-dismiss="offcanvas">
				<i class="ph-x"></i>
			</button>
		</div>

		<div class="offcanvas-body p-0">
			<div class="bg-light fw-medium py-2 px-3">New notifications</div>
			<div class="p-3">

                @php
                $user = Auth::user();
                @endphp
				@forelse ($user->notifications as $notification)
                    <div class="d-flex align-items-start mb-3">
                        <div class="me-3">
                            <div class="bg-warning bg-opacity-10 text-warning rounded-pill">
                                <i class="ph-email p-2"></i>
                            </div>
                        </div>
                        <div class="flex-1">
                            {{ $notification->data['message'] }}
                            <div class="fs-sm text-muted mt-1">{{ Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</div>
                        </div>
                    </div>
                @empty

                @endforelse
			</div>

			<div class="bg-light fw-medium py-2 px-3">Older notifications</div>
			<div class="p-3">
				<div class="d-flex align-items-start mb-3">
					<a href="#" class="status-indicator-container me-3">
						<img src="{{ asset('/') }}backend/assets/images/demo/users/face25.jpg" class="w-40px h-40px rounded-pill" alt="">
						<span class="status-indicator bg-success"></span>
					</a>
					<div class="flex-fill">
						<a href="#" class="fw-semibold">Nick</a> requested your feedback and approval in support request <a href="#">#458</a>

						<div class="my-2">
							<a href="#" class="btn btn-success btn-sm me-1">
								<i class="ph-checks ph-sm me-1"></i>
								Approve
							</a>
							<a href="#" class="btn btn-light btn-sm">
								Review
							</a>
						</div>

						<div class="fs-sm text-muted mt-1">3 days ago</div>
					</div>
				</div>

				<div class="d-flex align-items-start mb-3">
					<a href="#" class="status-indicator-container me-3">
						<img src="{{ asset('/') }}backend/assets/images/demo/users/face24.jpg" class="w-40px h-40px rounded-pill" alt="">
						<span class="status-indicator bg-grey"></span>
					</a>
					<div class="flex-fill">
						<a href="#" class="fw-semibold">Mike</a> added 1 new file(s) to <a href="#">Product management</a> project

						<div class="bg-light rounded p-2 my-2">
							<div class="d-flex align-items-center">
								<div class="me-2">
									<img src="{{ asset('/') }}backend/assets/images/icons/pdf.svg" width="34" height="34" alt="">
								</div>
								<div class="flex-fill">
									new_contract.pdf
									<div class="fs-sm text-muted">112KB</div>
								</div>
								<div class="ms-2">
									<button type="button" class="btn btn-flat-dark text-body btn-icon btn-sm border-transparent rounded-pill">
										<i class="ph-arrow-down"></i>
									</button>
								</div>
							</div>
						</div>

						<div class="fs-sm text-muted mt-1">1 day ago</div>
					</div>
				</div>

				<div class="d-flex align-items-start mb-3">
					<div class="me-3">
						<div class="bg-success bg-opacity-10 text-success rounded-pill">
							<i class="ph-calendar-plus p-2"></i>
						</div>
					</div>
					<div class="flex-fill">
						All hands meeting will take place coming Thursday at 13:45.

						<div class="my-2">
							<a href="#" class="btn btn-primary btn-sm">
								<i class="ph-calendar-plus ph-sm me-1"></i>
								Add to calendar
							</a>
						</div>

						<div class="fs-sm text-muted mt-1">2 days ago</div>
					</div>
				</div>

				<div class="d-flex align-items-start mb-3">
					<a href="#" class="status-indicator-container me-3">
						<img src="{{ asset('/') }}backend/assets/images/demo/users/face4.jpg" class="w-40px h-40px rounded-pill" alt="">
						<span class="status-indicator bg-danger"></span>
					</a>
					<div class="flex-fill">
						<a href="#" class="fw-semibold">Christine</a> commented on your community <a href="#">post</a> from 10.12.2021

						<div class="fs-sm text-muted mt-1">2 days ago</div>
					</div>
				</div>

				<div class="d-flex align-items-start mb-3">
					<div class="me-3">
						<div class="bg-primary bg-opacity-10 text-primary rounded-pill">
							<i class="ph-users-four p-2"></i>
						</div>
					</div>
					<div class="flex-fill">
						<span class="fw-semibold">HR department</span> requested you to complete internal survey by Friday

						<div class="fs-sm text-muted mt-1">3 days ago</div>
					</div>
				</div>

				<div class="text-center">
					<div class="spinner-border" role="status">
						<span class="visually-hidden">Loading...</span>
					</div>
				</div>
			</div>
		</div>
	</div> --}}
    <!-- /notifications -->
    @php
        $notifications = Auth::user()->unreadNotifications->take(25);
        $old_notifications = Auth::user()->readNotifications->take(25);
    @endphp

    <!-- Notifications -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="notifications">
        <div class="offcanvas-header py-0">
            <h5 class="offcanvas-title py-3">Activity</h5>
            <button type="button" class="btn btn-light btn-sm btn-icon border-transparent rounded-pill"
                data-bs-dismiss="offcanvas">
                <i class="ph-x"></i>
            </button>
        </div>

        <div class="offcanvas-body p-0">
            <div class="bg-light fw-medium py-2 px-3">New notifications</div>


            <div class="p-3">
                @if (auth()->user()->role)
                    @forelse($notifications as $notification)
                        {{-- @dd($notification) --}}
                        <div class="d-flex align-items-start mb-3">
                            <a href="javascript:void(0);" class="status-indicator-container me-3">
                                <i class="icon-envelope w-40px h-40px rounded-pill"></i>
                                <span class="status-indicator bg-success"></span>
                            </a>
                            <div class="flex-fill">
                                {{-- <a href="{{ route('rfq.edit'),$notification->data['link'] }}" class="fw-semibold">{{ $notification->data['name'] }}</a> {{ $notification->data['message'] }} --}}
                                <a href="javascript:void(0);" class="text-black">
                                    @if ($notification->data['link'])
                                        {{ $notification->data['name'] }} {{ $notification->data['message1'] }}
                                        <a href="{{ $notification->data['link'] }}" data-id="{{ $notification->id }}"
                                            class="fw-semibold mark-as-read">
                                            {{ $notification->data['message2'] }}
                                        </a>
                                    @else
                                        <a href="" class="fw-semibold">
                                            {{ $notification->data['name'] }}</a> {{ $notification->data['message1'] }}
                                </a>
                    @endif
                    </a>

                    <div class="fs-sm text-muted mt-1">
                        {{ Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</div>
            </div>
            @if ($notification->link)
                <a href="{{ $notification->data['link'] }}" class="float-right mark-as-read px-3"
                    data-id="{{ $notification->id }}">
                    Go To Link
                </a>
            @else
            @endif
        </div>
        @if ($loop->last)
            <a href="#" id="mark-all">
                Mark all as read
            </a>
        @endif
    @empty
        There are no new notifications
        @endforelse
        @endif

    </div>

    <div class="bg-light fw-medium py-2 px-3">Older notifications</div>

    <div class="p-3">
        @if (auth()->user()->role)
            @forelse($old_notifications as $old_notification)
                <div class="d-flex align-items-start mb-3">
                    <a href="javascript:void(0);" class="status-indicator-container me-3">
                        <i class="ph-envelope-open w-40px h-40px rounded-pill"></i>
                        <span class="status-indicator bg-warning"></span>
                    </a>
                    <div class="flex-fill">
                        <a href="javascript:void(0);" data-id="{{ $old_notification->id }}"
                            class="text-black mark-as-read">
                            @if (!empty($old_notification->data['message1']))
                                @if ($old_notification->data['link'])
                                    {{ $old_notification->data['name'] }} {{ $old_notification->data['message1'] }}
                                    <a href="{{ $old_notification->data['link'] }}" class="fw-semibold">
                                        {{ $old_notification->data['message2'] }}
                                    </a>
                                @else
                                    <a href="" class="fw-semibold">
                                        {{ $old_notification->data['name'] }}</a>
                                    {{ $old_notification->data['message1'] }}
                        </a>
            @endif
        @endif
        </a>


        <div class="fs-sm text-muted mt-1">{{ Carbon\Carbon::parse($old_notification->created_at)->diffForHumans() }}
        </div>
    </div>

    </div>

@empty
    There are no Old notifications
    @endforelse
    @endif

    </div>

    </div>
    </div>
    <!-- /notifications -->





    <!-- Demo config -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="demo_config">
        <div class="position-absolute top-50 end-100 visible">

        </div>

        <div class="offcanvas-header border-bottom py-0">
            <h5 class="offcanvas-title py-3">Change Style</h5>
            <button type="button" class="btn btn-light btn-sm btn-icon border-transparent rounded-pill"
                data-bs-dismiss="offcanvas">
                <i class="ph-x"></i>
            </button>
        </div>

        <div class="offcanvas-body">
            <div class="fw-semibold mb-2">Color mode</div>
            <div class="list-group mb-3">
                <label class="list-group-item list-group-item-action form-check border-width-1 rounded mb-2">
                    <div class="d-flex flex-fill my-1">
                        <div class="form-check-label d-flex me-2">
                            <i class="ph-sun ph-lg me-3"></i>
                            <div>
                                <span class="fw-bold">Light theme</span>
                                <div class="fs-sm text-muted">Set light theme or reset to default</div>
                            </div>
                        </div>
                        <input type="radio" class="form-check-input cursor-pointer ms-auto" name="main-theme"
                            value="light" checked>
                    </div>
                </label>

                <label class="list-group-item list-group-item-action form-check border-width-1 rounded mb-2">
                    <div class="d-flex flex-fill my-1">
                        <div class="form-check-label d-flex me-2">
                            <i class="ph-moon ph-lg me-3"></i>
                            <div>
                                <span class="fw-bold">Dark theme</span>
                                <div class="fs-sm text-muted">Switch to dark theme</div>
                            </div>
                        </div>
                        <input type="radio" class="form-check-input cursor-pointer ms-auto" name="main-theme"
                            value="dark">
                    </div>
                </label>

                <label class="list-group-item list-group-item-action form-check border-width-1 rounded mb-0">
                    <div class="d-flex flex-fill my-1">
                        <div class="form-check-label d-flex me-2">
                            <i class="ph-translate ph-lg me-3"></i>
                            <div>
                                <span class="fw-bold">Auto theme</span>
                                <div class="fs-sm text-muted">Set theme based on system mode</div>
                            </div>
                        </div>
                        <input type="radio" class="form-check-input cursor-pointer ms-auto" name="main-theme"
                            value="auto">
                    </div>
                </label>
            </div>
        </div>
    </div>
    <!-- /demo config -->
    @include('admin.partials.script')

    @if (auth()->user()->role)
        <script>
            function sendMarkRequest(id = null) {
                return $.ajax("{{ route('markNotification') }}", {
                    method: 'POST',

                    data: {
                        _token: '{{ csrf_token() }}',
                        id
                    }
                });
            }
            $(function() {
                $('.mark-as-read').click(function() {
                    let request = sendMarkRequest($(this).data('id'));
                    location.reload();
                });
                $('#mark-all').click(function() {
                    let request = sendMarkRequest();
                    location.reload();
                });
            });
        </script>
    @endif

</body>

</html>
