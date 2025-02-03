@extends('admin.master')
@section('content')
    <style>

        /* Most Important Need TO Be Here End*/
    </style>
    <div class="content-wrapper">
        <div class="page-header page-header-light shadow">
            <div class="page-header-content d-lg-flex border-top">
                <div class="d-flex">
                    <div class="breadcrumb py-2">
                        <a href="index.html" class="breadcrumb-item"><i class="ph-house"></i></a>
                        <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item">Home</a>
                        <span class="breadcrumb-item active">Device Setup IP</span>
                    </div>

                    <a href="#breadcrumb_elements"
                        class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                        data-bs-toggle="collapse">
                        <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <div>
            {{-- New Contente Start Here --}}
            <div class="container-fluid">
                <div class="col-lg-12">
                    <h4 class="my-3 text-center page_titles">Details Of Employee
                    </h4>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="card rounded-0">
                            <div class="card-header rounded-0 border-0 shadow-lg p-2">
                                <div class="d-flex justify-content-between">
                                    <p class="p-0 m-0 fw-bold main_color">WEB CLOCK</p>
                                    {{-- <p class="p-0 m-0">10:54:43 AM</p> --}}
                                    <p class="p-0 m-0 fw-bold main_color" id="time-display"></p>
                                </div>
                            </div>
                            <div class="card-header rounded-0 border-0 p-1">
                                <div class="d-flex justify-content-between">
                                    <p><i class="fa-solid fa-street-view pe-1 main_color"></i>Presence clocked inToday @
                                        <span class="main_color">10:15 AM</span>
                                    </p>
                                    <p><i class="fa-regular fa-clock pe-1 main_color"></i>Balance <strong
                                            class="main_color click_it" data-bs-toggle="modal"
                                            data-bs-target="#banlanceModal">Click to display</strong></p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row gx-0">
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="me-1">
                                            <a href="#" type="button" style="width: 100%"
                                                class="btn btn-info  btn-lg w-full boxs-button p-3">
                                                <i class="fa-solid fa-right-from-bracket pe-2 text-white"></i> Arrival
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <a href="#" type="button" style="width: 100%"
                                            class="btn btn-info btn-lg w-full boxs-button p-3">
                                            <i class="fa-solid fa-right-from-bracket pe-2 text-white"></i> Departure
                                        </a>
                                    </div>
                                </div>
                                <div class="row gx-0 mt-1 mb-2">
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="me-1">
                                            <a href="#" type="button" style="width: 100%"
                                                class="btn btn-info  btn-lg w-full boxs-button p-3">
                                                <i class="fa-solid fa-bowl-food pe-2 text-white"></i> Lunch
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <a href="#" type="button" style="width: 100%"
                                            class="btn btn-info btn-lg w-full boxs-button p-3">
                                            <i class="fa-solid fa-suitcase pe-2 text-white"></i> Business departure
                                        </a>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 offset-lg-3 mx-auto mt-1">
                                        <a href="#" type="button" style="width: 100%"
                                            class="btn btn-info btn-lg w-full boxs-button p-3">
                                            <i class="fa-solid fa-house pe-2 text-white"></i> Work from home
                                        </a>
                                    </div>
                                    <div class="col-lg-12 mt-1">
                                        <p class="p-0 py-2 m-0"><strong>NB:</strong> ipsum dolor sit amet consectetur
                                            adipisicing elit. Voluptates nulla magnam adipisci hic commodi inventore enim
                                            cumque velit non a.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="card rounded-0">
                            <div class="card-header rounded-0 border-0 shadow-lg p-2">
                                <p class="p-0 m-0 fw-bold main_color">PRESENCE</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-12">
                                        <label for="">All User</label>
                                        <select data-placeholder="Select a state..."
                                            class="form-control select-icons select2-hidden-accessible"
                                            data-select2-id="174" tabindex="-1" aria-hidden="true">
                                            <option value="slack" data-icon="slack-logo" data-select2-id="174">Slack
                                            </option>
                                            <option value="instagram" data-icon="instagram-logo" data-select2-id="313">
                                                Instagram</option>
                                            <option value="telegram" data-icon="telegram-logo" data-select2-id="314">
                                                Telegram</option>
                                            <option value="whatsapp" data-icon="whatsapp-logo" data-select2-id="315">
                                                Whatsapp</option>
                                            <option value="twitter" data-icon="twitter-logo" data-select2-id="316">Twitter
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <label for="">Select User</label>
                                        <select data-placeholder="Select a state..."
                                            class="form-control select-icons select2-hidden-accessible"
                                            data-select2-id="173" tabindex="-1" aria-hidden="true">
                                            <option value="slack" data-icon="slack-logo" data-select2-id="173">Slack
                                            </option>
                                            <option value="instagram" data-icon="instagram-logo" data-select2-id="313">
                                                Instagram</option>
                                            <option value="telegram" data-icon="telegram-logo" data-select2-id="314">
                                                Telegram</option>
                                            <option value="whatsapp" data-icon="whatsapp-logo" data-select2-id="315">
                                                Whatsapp</option>
                                            <option value="twitter" data-icon="twitter-logo" data-select2-id="316">
                                                Twitter</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <label for="">Select Depertment</label>
                                        <select data-placeholder="Select a state..."
                                            class="form-control select-icons select2-hidden-accessible"
                                            data-select2-id="172" tabindex="-1" aria-hidden="true">
                                            <option value="slack" data-icon="slack-logo" data-select2-id="172">Slack
                                            </option>
                                            <option value="instagram" data-icon="instagram-logo" data-select2-id="313">
                                                Instagram</option>
                                            <option value="telegram" data-icon="telegram-logo" data-select2-id="314">
                                                Telegram</option>
                                            <option value="whatsapp" data-icon="whatsapp-logo" data-select2-id="315">
                                                Whatsapp</option>
                                            <option value="twitter" data-icon="twitter-logo" data-select2-id="316">
                                                Twitter</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row my-2">
                                            <div class="col-lg-4 col-sm-12">
                                                <div
                                                    class="d-flex justify-content-between align-items-center content-info mt-3">
                                                    <div class="select-mark-primary"></div>
                                                    <div class="select-titles text-start">Present</div>
                                                    <div class="mark-ammount">10</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-12">
                                                <div
                                                    class="d-flex justify-content-between align-items-center content-info mt-3">
                                                    <div class="select-mark-primary"></div>
                                                    <div class="select-titles text-start">WFH</div>
                                                    <div class="mark-ammount">10</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-12">
                                                <div
                                                    class="d-flex justify-content-between align-items-center content-info mt-3">
                                                    <div class="select-mark-pink"></div>
                                                    <div class="select-titles text-start">On Break</div>
                                                    <div class="mark-ammount">10</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-12">
                                                <div
                                                    class="d-flex justify-content-between align-items-center content-info mt-1">
                                                    <div class="select-mark-green"></div>
                                                    <div class="select-titles text-start">In Field</div>
                                                    <div class="mark-ammount">10</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-12">
                                                <div
                                                    class="d-flex justify-content-between align-items-center content-info mt-1">
                                                    <div class="select-mark-pink"></div>
                                                    <div class="select-titles text-start">Missing</div>
                                                    <div class="mark-ammount">10</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-12">
                                                <div
                                                    class="d-flex justify-content-between align-items-center content-info mt-1">
                                                    <div class="select-mark-danger"></div>
                                                    <div class="select-titles text-start">Absent</div>
                                                    <div class="mark-ammount">10</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <table class="table datatable-scroll-y data_user mt-2 mb-4 border" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>User</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Developer One</td>
                                                    <td>Present</td>
                                                </tr>
                                                <tr>
                                                    <td>Developer Two</td>
                                                    <td>Absent</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            {{-- New Contente End Here --}}

            {{-- style="background-color: #edfbff;" --}}

            <div class="container-fluid pb-5">
                <div class="row ">
                    <div class="col-lg-12">
                        <div>
                            <div>
                                <h4 class="fw-bold titles-hr">Device Set Up</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <!-- Pie chart timeline -->
                        <div class="card summury-card hr-card h-100">
                            <div class="card-header bg-transparent border-0 text-center fw-bold">This Is Ip :
                                <strong class="main_color">{{ $deviceip }}</strong>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('machine.devicesetip') }}" method="post" id="ipForm">
                                    @csrf
                                    <div class="row gx-1 mb-3">
                                        <div class="col-lg-8">
                                            <input type="text" name="deviceip" id="deviceip" class="form-control"
                                                oninput="sanitizeInput()" required />
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <button class="btn btn-success" type="submit" onclick="submitForm()">Set
                                                IP</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="row gx-1">
                                    <div class="col-lg-6 mt-1">
                                        <a href="{{ route('machine.deviceinformation') }}">
                                            <div class="box_details bg-light p-1 rounded-sm">
                                                <div>
                                                    <span class="link_title_admin">Device Information</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-6 mt-1">
                                        <a href="{{ route('machine.deviceuserdata') }}">
                                            <div class="box_details bg-light p-1 rounded-sm">
                                                <div>
                                                    <span class="link_title_admin">User Data</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-6 mt-1">
                                        <a href="{{ route('machine.deviceattendancedata') }}">
                                            <div class="box_details bg-light p-1 rounded-sm">
                                                <div>
                                                    <span class="link_title_admin">Attendance Data</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-6 mt-1">
                                        <a href="{{ route('machine.devicedata.clear.attendance') }}">
                                            <div class="box_details bg-light p-1 rounded-sm">
                                                <div>
                                                    <span class="link_title_admin">Clear Attendance</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-6 mt-1">
                                        <a href="{{ route('machine.devicerestart') }}">
                                            <div class="box_details bg-light p-1 rounded-sm">
                                                <div>
                                                    <span class="link_title_admin">Restart Device</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-6 mt-1">
                                        <a href="{{ route('machine.deviceshutdown') }}">
                                            <div class="box_details bg-light p-1 rounded-sm">
                                                <div>
                                                    <span class="link_title_admin">Shutdown Device</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-6 mt-1">
                                        <a href="{{ route('machine.deviceadduser') }}">
                                            <div class="box_details bg-light p-1 rounded-sm">
                                                <div>
                                                    <span class="link_title_admin">Add User To Device</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /pie chart timeline -->
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="card summury-card hr-card h-100">
                            <div class="card-header bg-transparent border-0 text-center fw-bold">Appointment Schedule</div>
                            <div class="table-content table-basic mt-3">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="thead">
                                            <tr>
                                                <th class="text-left">Title</th>
                                                <th>With</th>
                                                <th>Location</th>
                                                <th>Date Time</th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody" id="appointment_schedule">
                                            <tr class="bg-transparent">
                                                <td valign="top" colspan="4" class="dataTables_empty">
                                                    <div class="no-data-found-wrapper text-center ">
                                                        <img src="https://hrm.codesstation.com/assets/images/empty.png"
                                                            alt="" class="mb-primary empty_table" width="200">
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="card summury-card hr-card h-100">
                            <div class="card-header bg-transparent border-0 text-center fw-bold">Meeting Schedule</div>
                            <div class="table-content table-basic mt-3">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="thead">
                                            <tr>
                                                <th class="text-left">Title</th>
                                                <th>With</th>
                                                <th>Location</th>
                                                <th>Date Time</th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody" id="meeting_schedule">
                                            <tr class="bg-transparent">
                                                <td valign="top" colspan="4" class="dataTables_empty">
                                                    <div class="no-data-found-wrapper text-center ">
                                                        <img src="https://hrm.codesstation.com/assets/images/empty.png"
                                                            alt="" class="mb-primary empty_table" width="200">
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="banlanceModal" tabindex="-1" aria-labelledby="banlanceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                    <h5 class="modal-title" id="banlanceModalLabel">Balance Statement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="text-center main_color mt-2">Your balance if you clock-out now:</h4>
                            <div class="row w-50 mx-auto pb-3">
                                <div class="col-lg-6 col-sm-12">
                                    <p class="p-0 m-0 main_color">+0:00</p>
                                    <p class="p-0 m-0">Daily balance</p>
                                </div>
                                <div class="col-lg-6 col-sm-12 text-end">
                                    <p class="p-0 m-0 main_color">-168:00</p>
                                    <p class="p-0 m-0">running balance</p>
                                </div>
                            </div>
                            <h4 class="text-center main_color">You have fulfilled your daily plan.</h4>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function sanitizeInput() {
            var inputElement = document.getElementById('deviceip');
            inputElement.value = inputElement.value.replace(/[^0-9.]/g, '');
        }

        function submitForm() {
            var inputElement = document.getElementById('deviceip');

            // Check if the input is empty before submitting
            if (inputElement.value.trim() === "") {
                alert("Please enter a valid IP address.");
                return; // Do not submit the form
            }

            document.getElementById('ipForm').submit();
        }
    </script>
    <script>
        $(document).ready(function() {
            updateTime(); // Call the function initially

            // Update time every second
            setInterval(updateTime, 1000);

            function updateTime() {
                var currentTime = new Date();
                var hours = currentTime.getHours();
                var minutes = currentTime.getMinutes();
                var seconds = currentTime.getSeconds();
                var meridiem = hours >= 12 ? "PM" : "AM";

                // Convert to 12-hour format
                hours = hours % 12;
                hours = hours ? hours : 12; // Handle midnight (0 hours)

                // Add leading zeros
                hours = String(hours).padStart(2, '0');
                minutes = String(minutes).padStart(2, '0');
                seconds = String(seconds).padStart(2, '0');

                // Display the formatted time
                var formattedTime = hours + ":" + minutes + ":" + seconds + " " + meridiem;
                $("#time-display").text(formattedTime);
            }
        });
    </script>
    <script>
        $('.data_event').DataTable({
            dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
            "iDisplayLength": 2,
            "lengthMenu": [10, 26, 30, 50],
            columnDefs: [{
                orderable: false,
                targets: [3],
            }, ],
        });
        $('.data_absent').DataTable({
            dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
            "iDisplayLength": 2,
            "lengthMenu": [10, 26, 30, 50],
            columnDefs: [{
                orderable: false,
                targets: [3],
            }, ],
        });
        $('.data_user').DataTable({
            dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
            "iDisplayLength": 2,
            "lengthMenu": [10, 26, 30, 50],
            columnDefs: [{
                orderable: false,
                targets: [1],
            }, ],
        });
    </script>
@endpush
