<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	@include('admin.partials.head')
</head>

<body>

	<!-- Main navbar -->
    @include('admin.partials.header')
	<!-- /main navbar -->
    @yield('content')

        <!-- Page content -->
        
        <!-- /page content -->


        @php
            $notifications = auth()->user()->unreadNotifications;
            //dd($notifications);
            $old_notifications = auth()->user()->readNotifications;
        @endphp

            <!-- Notifications -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="notifications">
            <div class="py-0 offcanvas-header">
                <h5 class="py-3 offcanvas-title">Activity</h5>
                <button type="button" class="border-transparent btn btn-light btn-sm btn-icon rounded-pill"
                    data-bs-dismiss="offcanvas">
                    <i class="text-white fas fa-xmark"></i>
                </button>
            </div>

            <div class="p-0 offcanvas-body">
                <div class="px-3 py-2 bg-light fw-medium">New notifications</div>


                <div class="p-3">
                    @if (auth()->user()->role)
                    @forelse($notifications as $notification)
                    {{-- @dd($notification) --}}
                    <div class="mb-3 d-flex align-items-start">
                        <a href="javascript:void(0);" class="status-indicator-container me-3">
                            <i class="icon-envelope w-40px h-40px rounded-pill"></i>
                            <span class="status-indicator bg-success"></span>
                        </a>
                        <div class="flex-fill">
                            {{-- <a href="{{ route('rfq.edit'),$notification->data['link'] }}" class="fw-semibold">{{ $notification->data['name'] }}</a> {{ $notification->data['message'] }} --}}
                            <a href="javascript:void(0);"  class="text-black">
                                @if ($notification->data['link'])
                                {{ $notification->data['name'] }} {{ $notification->data['message1'] }}
                                <a href="{{ $notification->data['link'] }}" data-id="{{ $notification->id }}" class="fw-semibold mark-as-read">
                                    {{ $notification->data['message2'] }}
                                </a>
                                @else
                                    <a href="" class="fw-semibold">
                                        {{ $notification->data['name'] }}</a> {{ $notification->data['message1'] }}
                                    </a>
                                @endif
                            </a>



                            <div class="mt-1 fs-sm text-muted">{{ Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</div>
                        </div>
                        @if ($notification->link)
                        <a href="{{ $notification->data['link'] }}" class="float-right px-3 mark-as-read" data-id="{{ $notification->id }}">
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

                <div class="px-3 py-2 bg-light fw-medium">Older notifications</div>

                <div class="p-3">
                    @if (auth()->user()->role)
                    @forelse($old_notifications as $old_notification)
                    <div class="mb-3 d-flex align-items-start">
                        <a href="javascript:void(0);" class="status-indicator-container me-3">
                            <i class="ph-envelope-open w-40px h-40px rounded-pill"></i>
                            <span class="status-indicator bg-warning"></span>
                        </a>
                        <div class="flex-fill">
                            <a href="javascript:void(0);" data-id="{{ $old_notification->id }}" class="text-black mark-as-read">
                                @if (!empty($old_notification->data['message1']))
                                    @if ($old_notification->data['link'])
                                        {{ $old_notification->data['name'] }} {{ $old_notification->data['message1'] }}
                                        <a href="{{ $old_notification->data['link'] }}" class="fw-semibold">
                                            {{ $old_notification->data['message2'] }}
                                        </a>

                                    @else
                                        <a href="" class="fw-semibold">
                                            {{ $old_notification->data['name'] }}</a> {{ $old_notification->data['message1'] }}
                                        </a>
                                    @endif
                                @endif
                            </a>


                            <div class="mt-1 fs-sm text-muted">{{ Carbon\Carbon::parse($old_notification->created_at)->diffForHumans() }}</div>
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
		<div class="visible position-absolute top-50 end-100">

		</div>

		<div class="py-0 offcanvas-header border-bottom">
			<h5 class="py-3 offcanvas-title">Change Style</h5>
			<button type="button" class="border-transparent btn btn-light btn-sm btn-icon rounded-pill" data-bs-dismiss="offcanvas">
				<i class="ph-x"></i>
			</button>
		</div>

		<div class="offcanvas-body">
			<div class="mb-2 fw-semibold">Color mode</div>
			<div class="mb-3 list-group">
				<label class="mb-2 rounded list-group-item list-group-item-action form-check border-width-1">
					<div class="my-1 d-flex flex-fill">
						<div class="form-check-label d-flex me-2">
							<i class="ph-sun ph-lg me-3"></i>
							<div>
								<span class="fw-bold">Light theme</span>
								<div class="fs-sm text-muted">Set light theme or reset to default</div>
							</div>
						</div>
						<input type="radio" class="cursor-pointer form-check-input ms-auto" name="main-theme" value="light" checked>
					</div>
				</label>

				<label class="mb-2 rounded list-group-item list-group-item-action form-check border-width-1">
					<div class="my-1 d-flex flex-fill">
						<div class="form-check-label d-flex me-2">
							<i class="ph-moon ph-lg me-3"></i>
							<div>
								<span class="fw-bold">Dark theme</span>
								<div class="fs-sm text-muted">Switch to dark theme</div>
							</div>
						</div>
						<input type="radio" class="cursor-pointer form-check-input ms-auto" name="main-theme" value="dark">
					</div>
				</label>

				<label class="mb-0 rounded list-group-item list-group-item-action form-check border-width-1">
					<div class="my-1 d-flex flex-fill">
						<div class="form-check-label d-flex me-2">
							<i class="ph-translate ph-lg me-3"></i>
							<div>
								<span class="fw-bold">Auto theme</span>
								<div class="fs-sm text-muted">Set theme based on system mode</div>
							</div>
						</div>
						<input type="radio" class="cursor-pointer form-check-input ms-auto" name="main-theme" value="auto">
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
