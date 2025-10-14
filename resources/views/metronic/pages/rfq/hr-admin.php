<x-admin-app-layout :title="'RFQ Dashboard'">
  <div class="px-0 container-fluid">
    <div class="mb-5 row">
      <!-- Attendance -->
      <div class="col-lg-9">
        <div class="row">
          <div class="col-xl-4">
            <div class="border shadow-none card card-flush">
              <div class="p-0 card-body">
                <div class="d-flex flex-stack justify-content-between">
                  <div class="p-8 d-flex align-items-center me-3 rounded-3">
                    <a href="">
                      <span class="p-3 bg-light-primary rounded-3 me-3"><i class="fa-solid text-primary fa-clipboard-user fs-3" aria-hidden="true"></i></span>
                    </a>
                    <div class="flex-grow-1"><a href="">
                      </a><a href="#" class="text-gray-800 fs-5 fw-bold lh-0">Employee
                        <span class="pt-4 text-gray-500 fw-semibold d-block fs-6">03 Aug 2024</span>
                      </a>
                    </div>

                  </div>
                  <div>
                    <div class="d-flex justify-content-between">
                      <span class="pb-2 main_text_color fw-bold">Todays Presents</span>
                      <span class="px-4 text-gray-500 fw-semibold">
                        12
                      </span>
                    </div>
                    <div class="d-flex justify-content-between">
                      <span class="pb-2 main_text_color fw-bold">Todays Absents</span>
                      <span class="px-4 text-gray-500 fw-semibold text-end">
                        03
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4">
            <div class="border shadow-none card card-flush">
              <div class="p-0 card-body">
                <div class="d-flex flex-stack justify-content-between">
                  <div class="p-8 d-flex align-items-center me-3 w-50 rounded-3">
                    <a href="">
                      <span class="p-3 bg-light-primary rounded-3 me-3"><i class="fa-solid text-primary fa-list-check fs-3" aria-hidden="true"></i></span>
                    </a>
                    <div class="flex-grow-1"><a href="">
                      </a><a href="#" class="text-gray-800 fs-5 fw-bold lh-0">My Task
                        <span class="pt-4 text-gray-500 fw-semibold d-block fs-6">Today <span class="text-primary">(5)</span></span>
                      </a>
                    </div>

                  </div>

                  <div class="flex-column d-flex w-50">
                    <div class="d-flex align-items-center justify-content-between pe-3">
                      <span class="text-gray-500 fw-semibold">
                        Critical</span>
                      <span class="px-2 text-white bg-primary fw-semibold ms-3 rounded-2">
                        5+ Task
                      </span>
                    </div>
                    <div class="pt-2 d-flex align-items-center justify-content-between pe-3">
                      <span class="text-gray-500 fw-semibold">
                        Pending</span>
                      <span class="px-2 text-white bg-primary fw-semibold ms-3 rounded-2">
                        5+ Task
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4">
            <div class="border shadow-none card card-flush">
              <div class="p-0 card-body">
                <div class="d-flex flex-stack justify-content-between">
                  <div class="p-8 d-flex align-items-center me-3 w-50 rounded-3">
                    <a href="">
                      <span class="p-3 bg-light-primary rounded-3 me-3"><i class="fa-solid text-primary fa-bell fs-3" aria-hidden="true"></i></span>
                    </a>
                    <div class="flex-grow-1"><a href="">
                      </a><a href="#" class="text-gray-800 fs-5 fw-bold lh-0">Notification
                        <span class="pt-4 text-gray-500 fw-semibold d-block fs-6">Quick Status</span>
                      </a>
                    </div>

                  </div>

                  <div class="flex-column d-flex w-50">
                    <div class="d-flex align-items-center justify-content-between pe-3">
                      <span class="text-gray-500 fw-semibold">
                        Total</span>
                      <span class="px-2 fw-semibold ms-3 text-primary rounded-2">
                        5+
                      </span>
                    </div>
                    <div class="pt-2 d-flex align-items-center justify-content-between pe-3">
                      <span class="text-gray-500 fw-semibold">
                        Unread</span>
                      <span class="px-2 fw-semibold ms-3 text-primary rounded-2">
                        5+
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-12">
            <div class="mt-5 border shadow-none card">
              <div class="bg-white border-0 card-header align-items-center">
                <h1 class="card-title">
                  Attendace &amp; Leave History
                </h1>
                <div>
                  <ul class="nav nav-tabs nav-line-tabs fs-6">
                    <li class="nav-item">
                      <a class="nav-link active" data-bs-toggle="tab" href="#allAttendance">All Attendance</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-bs-toggle="tab" href="#allLeave">Leave</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-bs-toggle="tab" href="#allmovement">Movement</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-0 card-body" style="height: 280px; overflow: auto;">
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="allAttendance" role="tabpanel">
                    <div class="card">
                      <div class="p-0 card-body hover-scroll-overlay-y" style="height: 525px">
                        <table class="table border data_table table-striped table-row-bordered gy-5 gs-7 rounded-3">
                          <thead>
                            <tr class="text-gray-800 fw-bold fs-6 px-7">
                              <th width="">Sl</th>
                              <th width="">Name</th>
                              <th width="">Status</th>
                              <th width="">Job Status</th>
                              <th width="">Checked In</th>
                              <th width="">Checked Out</th>
                              <th width="" class="text-center">
                                Check Full
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>01</td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <div class="me-5 position-relative">
                                    <div class="symbol symbol-35px symbol-circle">
                                      <img alt="Pic" src="https://preview.keenthemes.com/metronic8/demo1/assets/media/avatars/300-9.jpg">
                                    </div>
                                  </div>
                                  <div class="d-flex flex-column justify-content-center">
                                    <a href="" class="text-gray-800 fs-6 text-hover-primary">Sazeduzzaman</a>

                                    <div class="text-gray-500 fw-semibold">
                                      Frontend Developer
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <span class="text-black">In Time</span>
                              </td>
                              <td>
                                <span class="text-white badge bg-info">Parmanent</span>
                              </td>
                              <td>
                                <span class="badge bg-primary">08:52 AM</span>
                              </td>
                              <td class="text-start">
                                <span class="bg-black badge">08:52 PM</span>
                              </td>
                              <td class="text-center">
                                <a class="btn btn-sm btn-icon btn-primary text-hover-primary btn-active-color-primary" href="/super-admin/single-profile" target="_blank">
                                  <i class="text-white fas fa-id-badge fs-3" title="Show Profile" aria-hidden="true"></i><span class="sr-only">Show Profile</span>
                                </a>
                              </td>
                            </tr>
                            <tr>
                              <td>02</td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <div class="me-5 position-relative">
                                    <div class="symbol symbol-35px symbol-circle">
                                      <img alt="Pic" src="https://preview.keenthemes.com/metronic8/demo1/assets/media/avatars/300-9.jpg">
                                    </div>
                                  </div>
                                  <div class="d-flex flex-column justify-content-center">
                                    <a href="" class="text-gray-800 fs-6 text-hover-primary">Nahidul Islam</a>

                                    <div class="text-gray-500 fw-semibold">
                                      UI/UX Developer
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <span class="text-danger">Duble Late</span>
                              </td>
                              <td>
                                <span class="text-white badge bg-info">Parmanent</span>
                              </td>
                              <td>
                                <span class="badge bg-danger">11:43 AM</span>
                              </td>
                              <td class="text-start">
                                <span class="bg-black badge">06:05 PM</span>
                              </td>
                              <td class="text-center">
                                <a class="btn btn-sm btn-icon btn-primary text-hover-primary btn-active-color-primary" href="/super-admin/single-profile" target="_blank">
                                  <i class="text-white fas fa-id-badge fs-3" title="Show Profile" aria-hidden="true"></i><span class="sr-only">Show Profile</span>
                                </a>
                              </td>
                            </tr>
                            <tr>
                              <td>03</td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <div class="me-5 position-relative">
                                    <div class="symbol symbol-35px symbol-circle">
                                      <img alt="Pic" src="https://preview.keenthemes.com/metronic8/demo1/assets/media/avatars/300-9.jpg">
                                    </div>
                                  </div>
                                  <div class="d-flex flex-column justify-content-center">
                                    <a href="" class="text-gray-800 fs-6 text-hover-primary">Asiquzzaman</a>

                                    <div class="text-gray-500 fw-semibold">
                                      Junior Developer
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <span class="text-danger">Late</span>
                              </td>
                              <td>
                                <span class="text-white badge bg-info">Parmanent</span>
                              </td>
                              <td>
                                <span class="badge bg-danger">09:31 AM</span>
                              </td>
                              <td class="text-start">
                                <span class="bg-black badge">06:05 PM</span>
                              </td>
                              <td class="text-center">
                                <a class="btn btn-sm btn-icon btn-primary text-hover-primary btn-active-color-primary" href="/super-admin/single-profile" target="_blank">
                                  <i class="text-white fas fa-id-badge fs-3" title="Show Profile" aria-hidden="true"></i><span class="sr-only">Show Profile</span>
                                </a>
                              </td>
                            </tr>
                            <tr>
                              <td>04</td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <div class="me-5 position-relative">
                                    <div class="symbol symbol-35px symbol-circle">
                                      <img alt="Pic" src="https://preview.keenthemes.com/metronic8/demo1/assets/media/avatars/300-9.jpg">
                                    </div>
                                  </div>
                                  <div class="d-flex flex-column justify-content-center">
                                    <a href="" class="text-gray-800 fs-6 text-hover-primary">Riyajul Islam</a>

                                    <div class="text-gray-500 fw-semibold">
                                      Mern Developer
                                    </div>
                                  </div>
                                </div>
                              </td>

                              <td>
                                <span class="px-3 text-white bg-black rounded-pill">Unauthorized</span>
                              </td>
                              <td>
                                <span class="text-center">--</span>
                              </td>
                              <td>
                                <span class="text-center">--</span>
                              </td>
                              <td class="text-start">
                                <span class="text-center">--</span>
                              </td>
                              <td class="text-center">
                                <a class="btn btn-sm btn-icon btn-primary text-hover-primary btn-active-color-primary" href="/super-admin/single-profile" target="_blank">
                                  <i class="text-white fas fa-id-badge fs-3" title="Show Profile" aria-hidden="true"></i><span class="sr-only">Show Profile</span>
                                </a>
                              </td>
                            </tr>
                            <tr>
                              <td>05</td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <div class="me-5 position-relative">
                                    <div class="symbol symbol-35px symbol-circle">
                                      <img alt="Pic" src="https://preview.keenthemes.com/metronic8/demo1/assets/media/avatars/300-9.jpg">
                                    </div>
                                  </div>
                                  <div class="d-flex flex-column justify-content-center">
                                    <a href="" class="text-gray-800 fs-6 text-hover-primary">Mirza Akash Ryhan</a>

                                    <div class="text-gray-500 fw-semibold">
                                      Content &amp; SQA Teaster
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <span class="px-3 text-black bg-warning rounded-pill">Half Day</span>
                              </td>
                              <td>
                                <span class="text-white badge bg-info">Parmanent</span>
                              </td>
                              <td>
                                <span class="badge bg-primary">08:31 AM</span>
                              </td>
                              <td class="text-start">
                                <span class="bg-black badge">06:05 PM</span>
                              </td>
                              <td class="text-center">
                                <a class="btn btn-sm btn-icon btn-primary text-hover-primary btn-active-color-primary" href="/super-admin/single-profile" target="_blank">
                                  <i class="text-white fas fa-id-badge fs-3" title="Show Profile" aria-hidden="true"></i><span class="sr-only">Show Profile</span>
                                </a>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="allLeave" role="tabpanel">
                    <div class="card">
                      <div class="p-0 card-body hover-scroll-overlay-y" style="height: 525px">
                        <table class="table border data_table table-striped table-row-bordered gy-5 gs-7 rounded-3">
                          <thead>
                            <tr class="text-gray-800 fw-bold fs-6 px-7">
                              <th width="">Sl</th>
                              <th width="">Leave Type</th>
                              <th width="">Name</th>
                              <th width="">Leave Day</th>
                              <th width="">Join Day</th>
                              <th width="">Job Status</th>
                              <th width="">Status</th>
                              <th width="">Substitute</th>
                              <th width="" class="text-center">
                                Action
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>01</td>
                              <td>Sick Leave</td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <div class="me-5 position-relative">
                                    <div class="symbol symbol-35px symbol-circle">
                                      <img alt="Pic" src="https://preview.keenthemes.com/metronic8/demo1/assets/media/avatars/300-9.jpg">
                                    </div>
                                  </div>
                                  <div class="d-flex flex-column justify-content-center">
                                    <a href="" class="text-gray-800 fs-6 text-hover-primary">Sazeduzzaman</a>

                                    <div class="text-gray-500 fw-semibold">
                                      Frontend Developer
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <span class="text-danger">5 AUG 24</span>
                                To
                                <span class="text-info">5 AUG 24</span>
                              </td>
                              <td>
                                <span class="text-primary">6 AUG 24</span>
                              </td>
                              <td>
                                <span class="text-white badge bg-info">Parmanent</span>
                              </td>
                              <td>
                                <span class="badge bg-primary">Applied</span>
                              </td>
                              <td>Khandaker Shahed</td>
                              <td class="text-center">

                                <a href="javascript:void(0);" class="btn btn-sm btn-icon btn-primary printBtn">
                                  <i class="text-white fas fa-file fs-6" title="Print Application" aria-hidden="true"></i><span class="sr-only">Print Application</span>
                                </a>
                              </td>
                            </tr>
                            <tr>
                              <td>02</td>
                              <td>Casual Leave</td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <div class="me-5 position-relative">
                                    <div class="symbol symbol-35px symbol-circle">
                                      <img alt="Pic" src="https://preview.keenthemes.com/metronic8/demo1/assets/media/avatars/300-9.jpg">
                                    </div>
                                  </div>
                                  <div class="d-flex flex-column justify-content-center">
                                    <a href="" class="text-gray-800 fs-6 text-hover-primary">Sazeduzzaman</a>

                                    <div class="text-gray-500 fw-semibold">
                                      Frontend Developer
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <span class="text-danger">5 AUG 24</span>
                                To
                                <span class="text-info">5 AUG 24</span>
                              </td>
                              <td>
                                <span class="text-primary">6 AUG 24</span>
                              </td>
                              <td>
                                <span class="text-white badge bg-info">Parmanent</span>
                              </td>
                              <td>
                                <span class="badge bg-primary">Applied</span>
                              </td>
                              <td>Khandaker Shahed</td>
                              <td class="text-center">

                                <a href="javascript:void(0);" class="btn btn-sm btn-icon btn-primary printBtn">
                                  <i class="text-white fas fa-file fs-6" title="Print Application" aria-hidden="true"></i><span class="sr-only">Print Application</span>
                                </a>
                              </td>
                            </tr>
                            <tr>
                              <td>02</td>
                              <td>Earned Leave</td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <div class="me-5 position-relative">
                                    <div class="symbol symbol-35px symbol-circle">
                                      <img alt="Pic" src="https://preview.keenthemes.com/metronic8/demo1/assets/media/avatars/300-9.jpg">
                                    </div>
                                  </div>
                                  <div class="d-flex flex-column justify-content-center">
                                    <a href="" class="text-gray-800 fs-6 text-hover-primary">Sazeduzzaman</a>

                                    <div class="text-gray-500 fw-semibold">
                                      Frontend Developer
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <span class="text-danger">5 AUG 24</span>
                                To
                                <span class="text-info">5 AUG 24</span>
                              </td>
                              <td>
                                <span class="text-primary">6 AUG 24</span>
                              </td>
                              <td>
                                <span class="text-white badge bg-info">Parmanent</span>
                              </td>
                              <td>
                                <span class="badge bg-primary">Applied</span>
                              </td>
                              <td>Khandaker Shahed</td>
                              <td class="text-center">
                                <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" title="" class="btn btn-sm btn-icon btn-primary printBtn" data-bs-original-title="Tooltip on top">
                                  <i class="text-white fas fa-file fs-6" title="Print Application" aria-hidden="true"></i><span class="sr-only">Print Application</span>
                                </a>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="allmovement" role="tabpanel">
                    <div class="card">
                      <div class="p-0 card-body hover-scroll-overlay-y" style="height: 525px">
                        <table class="table border data_table table-striped table-row-bordered gy-5 gs-7 rounded-3">
                          <thead>
                            <tr class="text-gray-800 fw-bold fs-6 px-7">
                              <th width="">Sl</th>
                              <th width="">Name</th>
                              <th width="">Out Time</th>
                              <th width="">In Time</th>
                              <th width="">Hold Time</th>
                              <th class="text-end">Total Time</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>01</td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <div class="me-5 position-relative">
                                    <div class="symbol symbol-35px symbol-circle">
                                      <img alt="Pic" src="https://preview.keenthemes.com/metronic8/demo1/assets/media/avatars/300-9.jpg">
                                    </div>
                                  </div>
                                  <div class="d-flex flex-column justify-content-center">
                                    <a href="" class="text-gray-800 fs-6 text-hover-primary">Sazeduzzaman</a>

                                    <div class="text-gray-500 fw-semibold">
                                      Frontend Developer
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <span class="text-white badge bg-info">10:00Am</span>
                              </td>
                              <td>
                                <span class="text-white badge bg-info">10:05Am</span>
                              </td>
                              <td>
                                <span class="text-white badge bg-info">5 Miniute</span>
                              </td>
                              <td class="text-end">
                                <span class="badge bg-primary">10 Miniute</span>
                              </td>
                            </tr>
                            <tr>
                              <td>01</td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <div class="me-5 position-relative">
                                    <div class="symbol symbol-35px symbol-circle">
                                      <img alt="Pic" src="https://preview.keenthemes.com/metronic8/demo1/assets/media/avatars/300-9.jpg">
                                    </div>
                                  </div>
                                  <div class="d-flex flex-column justify-content-center">
                                    <a href="" class="text-gray-800 fs-6 text-hover-primary">Sazeduzzaman</a>

                                    <div class="text-gray-500 fw-semibold">
                                      Frontend Developer
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <span class="text-white badge bg-info">10:00Am</span>
                              </td>
                              <td>
                                <span class="text-white badge bg-info">10:05Am</span>
                              </td>
                              <td>
                                <span class="text-white badge bg-info">5 Miniute</span>
                              </td>
                              <td class="text-end">
                                <span class="badge bg-primary">10 Miniute</span>
                              </td>
                            </tr>
                            <tr>
                              <td>01</td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <div class="me-5 position-relative">
                                    <div class="symbol symbol-35px symbol-circle">
                                      <img alt="Pic" src="https://preview.keenthemes.com/metronic8/demo1/assets/media/avatars/300-9.jpg">
                                    </div>
                                  </div>
                                  <div class="d-flex flex-column justify-content-center">
                                    <a href="" class="text-gray-800 fs-6 text-hover-primary">Sazeduzzaman</a>

                                    <div class="text-gray-500 fw-semibold">
                                      Frontend Developer
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <span class="text-white badge bg-info">10:00Am</span>
                              </td>
                              <td>
                                <span class="text-white badge bg-info">10:05Am</span>
                              </td>
                              <td>
                                <span class="text-white badge bg-info">5 Miniute</span>
                              </td>
                              <td class="text-end">
                                <span class="badge bg-primary">10 Miniute</span>
                              </td>
                            </tr>
                            <tr>
                              <td>01</td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <div class="me-5 position-relative">
                                    <div class="symbol symbol-35px symbol-circle">
                                      <img alt="Pic" src="https://preview.keenthemes.com/metronic8/demo1/assets/media/avatars/300-9.jpg">
                                    </div>
                                  </div>
                                  <div class="d-flex flex-column justify-content-center">
                                    <a href="" class="text-gray-800 fs-6 text-hover-primary">Sazeduzzaman</a>

                                    <div class="text-gray-500 fw-semibold">
                                      Frontend Developer
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <span class="text-white badge bg-info">10:00Am</span>
                              </td>
                              <td>
                                <span class="text-white badge bg-info">10:05Am</span>
                              </td>
                              <td>
                                <span class="text-white badge bg-info">5 Miniute</span>
                              </td>
                              <td class="text-end">
                                <span class="badge bg-primary">10 Miniute</span>
                              </td>
                            </tr>
                            <tr>
                              <td>01</td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <div class="me-5 position-relative">
                                    <div class="symbol symbol-35px symbol-circle">
                                      <img alt="Pic" src="https://preview.keenthemes.com/metronic8/demo1/assets/media/avatars/300-9.jpg">
                                    </div>
                                  </div>
                                  <div class="d-flex flex-column justify-content-center">
                                    <a href="" class="text-gray-800 fs-6 text-hover-primary">Sazeduzzaman</a>

                                    <div class="text-gray-500 fw-semibold">
                                      Frontend Developer
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <span class="text-white badge bg-info">10:00Am</span>
                              </td>
                              <td>
                                <span class="text-white badge bg-info">10:05Am</span>
                              </td>
                              <td>
                                <span class="text-white badge bg-info">5 Miniute</span>
                              </td>
                              <td class="text-end">
                                <span class="badge bg-primary">10 Miniute</span>
                              </td>
                            </tr>
                            <tr>
                              <td>01</td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <div class="me-5 position-relative">
                                    <div class="symbol symbol-35px symbol-circle">
                                      <img alt="Pic" src="https://preview.keenthemes.com/metronic8/demo1/assets/media/avatars/300-9.jpg">
                                    </div>
                                  </div>
                                  <div class="d-flex flex-column justify-content-center">
                                    <a href="" class="text-gray-800 fs-6 text-hover-primary">Sazeduzzaman</a>

                                    <div class="text-gray-500 fw-semibold">
                                      Frontend Developer
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <span class="text-white badge bg-info">10:00Am</span>
                              </td>
                              <td>
                                <span class="text-white badge bg-info">10:05Am</span>
                              </td>
                              <td>
                                <span class="text-white badge bg-info">5 Miniute</span>
                              </td>
                              <td class="text-end">
                                <span class="badge bg-primary">10 Miniute</span>
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
          <div class="col-lg-12">
            <div class="mt-5 border shadow-none card h-xl-100">
              <div class="bg-white card-header">
                <h3 class="py-3 card-title align-items-start flex-column">
                  <span class="text-gray-800 card-label fw-bold">Evaluation Shedule</span>
                  <span class="mt-1 text-gray-500 fw-semibold fs-6">Current Month Evaluation Need.</span>
                </h3>
              </div>

              <div class="p-0 pt-4 shadow-none card-body" style="height: 180px; overflow: auto;">
                <div class="table-responsive">
                  <table class="table my-0 align-middle table-striped gs-0 gy-3">
                    <thead>
                      <tr class="text-gray-500 fs-7 fw-bold border-bottom-0">
                        <th class="p-0 pb-3 text-center w-50px">
                          Sl
                        </th>
                        <th class="p-0 pb-3 text-start ps-3">
                          Name
                        </th>
                        <th class="p-0 pb-3 text-start">
                          Office Id
                        </th>
                        <th class="p-0 pb-3 text-start">
                          Prev. Status
                        </th>
                        <th class="p-0 pb-3 text-start">
                          Current Status
                        </th>
                        <th class="p-0 pb-3 text-start">
                          Joining Date
                        </th>
                        <th class="p-0 pb-3 text-start">
                          Evaluation Date
                        </th>
                        <th class="p-0 pb-3 text-center">
                          Performance
                        </th>
                        <th class="p-0 pb-3 text-center">
                          Progress
                        </th>
                        <th class="p-0 pb-3 text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="text-center">01</td>
                        <td>
                          <div class="d-flex align-items-center">
                            <div class="symbol symbol-50px me-3">
                              <img src="https://preview.keenthemes.com/metronic8/demo1/assets/media/avatars/300-9.jpg" class="" alt="">
                            </div>

                            <div class="d-flex justify-content-start flex-column">
                              <a href="#" class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">Nahidul Islam</a>
                              <span class="text-gray-500 fw-semibold d-block fs-7">UI/UX Designer</span>
                            </div>
                          </div>
                        </td>

                        <td class="text-start">
                          <span class="text-gray-600 badge-light-danger fw-bold fs-6">#JR-106</span>
                        </td>
                        <td class="text-start">
                          <span class="text-gray-600 fw-bold fs-6">Probation
                          </span>
                        </td>
                        <td class="text-start">
                          <span class="text-gray-600 fw-bold fs-6">Parmanent</span>
                        </td>

                        <td class="text-start pe-0">
                          <span class="text-gray-600 fw-bold fs-6">02 March 2024</span>
                        </td>

                        <td class="">
                          <span class="text-gray-600 fw-bold d-block fs-6">02 March 2025</span>
                        </td>

                        <td class="text-center pe-0">
                          <span class="text-warning fw-bold fs-6">80%</span>
                        </td>
                        <td class="text-center pe-0">
                          <span class="text-success fw-bold fs-6">Good</span>
                        </td>
                        <td class="text-end pe-3">
                          <a class="btn btn-sm btn-icon btn-primary text-hover-primary btn-active-color-primary" href="/super-admin/single-profile" target="_blank">
                            <i class="text-white fas fa-id-badge fs-3" title="Show Profile" aria-hidden="true"></i><span class="sr-only">Show Profile</span>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-center">01</td>
                        <td>
                          <div class="d-flex align-items-center">
                            <div class="symbol symbol-50px me-3">
                              <img src="https://preview.keenthemes.com/metronic8/demo1/assets/media/avatars/300-9.jpg" class="" alt="">
                            </div>

                            <div class="d-flex justify-content-start flex-column">
                              <a href="#" class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">Nahidul Islam</a>
                              <span class="text-gray-500 fw-semibold d-block fs-7">UI/UX Designer</span>
                            </div>
                          </div>
                        </td>

                        <td class="text-start">
                          <span class="text-gray-600 badge-light-danger fw-bold fs-6">#JR-106</span>
                        </td>
                        <td class="text-start">
                          <span class="text-gray-600 fw-bold fs-6">Probation
                          </span>
                        </td>
                        <td class="text-start">
                          <span class="text-gray-600 fw-bold fs-6">Parmanent</span>
                        </td>

                        <td class="text-start pe-0">
                          <span class="text-gray-600 fw-bold fs-6">02 March 2024</span>
                        </td>

                        <td class="">
                          <span class="text-gray-600 fw-bold d-block fs-6">02 March 2025</span>
                        </td>

                        <td class="text-center pe-0">
                          <span class="text-warning fw-bold fs-6">80%</span>
                        </td>
                        <td class="text-center pe-0">
                          <span class="text-success fw-bold fs-6">Good</span>
                        </td>
                        <td class="text-end pe-3">
                          <a class="btn btn-sm btn-icon btn-primary text-hover-primary btn-active-color-primary" href="/super-admin/single-profile" target="_blank">
                            <i class="text-white fas fa-id-badge fs-3" title="Show Profile" aria-hidden="true"></i><span class="sr-only">Show Profile</span>
                          </a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="mt-10 border shadow-none card h-xl-100">
              <div class="bg-white card-header">
                <h3 class="card-title align-items-start flex-column">
                  <span class="text-gray-800 card-label fw-bold">Task Shedule</span>
                  <span class="mt-1 text-gray-500 fw-semibold fs-6">Current Month Task.</span>
                </h3>
              </div>

              <div class="p-0 pt-4 shadow-none card-body" style="height: 140px; overflow: auto;">
                <p class="ps-5"> All Task Here.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="border shadow-none card">
          <div class="p-2 py-5">
            <h1 class="mb-0">Today's Shedule</h1>
            <p class="mb-0 text-gray-400">
              Check Your Shedule from here
            </p>
          </div>
          <div class="p-0 border card-header" style="min-height: 50px">
            <ul class="nav nav-pills nav-pills-custom" role="tablist">
              <li class="m-0 nav-item" role="presentation">
                <a class="pt-5 pb-2 overflow-hidden nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column rounded-0 h-100 active" id="kt_stats_widget_16_tab_link_4" data-bs-toggle="pill" href="#all-meeting" aria-selected="true" role="tab">
                  <span class="text-gray-800 nav-text fw-bold fs-6 lh-1">
                    Meeting's
                  </span>


                </a>
              </li>
              <li class="m-0 nav-item" role="presentation">
                <a class="pt-5 pb-2 overflow-hidden nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column rounded-0 h-100" id="kt_stats_widget_16_tab_link_1" data-bs-toggle="pill" href="#task-shedule" aria-selected="false" role="tab" tabindex="-1">
                  <span class="text-gray-800 nav-text fw-bold fs-6 lh-1">
                    Notice
                  </span>


                </a>
              </li>
              <li class="m-0 nav-item" role="presentation">
                <a class="pt-5 pb-2 overflow-hidden nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column rounded-0 h-100" id="kt_stats_widget_16_tab_link_4" data-bs-toggle="pill" href="#kpi-details" aria-selected="true" role="tab">
                  <span class="text-gray-800 nav-text fw-bold fs-6 lh-1">
                    Application
                  </span>


                </a>
              </li>
            </ul>
          </div>
          <div class="p-0 pt-4 card-body">
            <div class="tab-content">
              <div class="tab-pane fade active show" id="all-meeting" role="tabpanel" aria-labelledby="kt_stats_widget_16_tab_link_4">
                <div>
                  <ul class="px-3 mb-8 nav nav-stretch nav-pills nav-pills-custom nav-pills-active-custom d-flex justify-content-between" role="tablist">
                    <li class="p-0 nav-item ms-0" role="presentation">
                      <a class="px-3 py-4 nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px btn-active-danger active" data-bs-toggle="tab" href="#kt_timeline_widget_3_tab_content_1" aria-selected="false" tabindex="-1" role="tab">
                        <span class="fs-7 fw-semibold">Fr</span>
                        <span class="fs-6 fw-bold">20</span>
                      </a>
                    </li>
                    <li class="p-0 nav-item ms-0" role="presentation">
                      <a class="px-3 py-4 nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px btn-active-danger" data-bs-toggle="tab" href="#kt_timeline_widget_3_tab_content_2" aria-selected="false" tabindex="-1" role="tab">
                        <span class="fs-7 fw-semibold">Sa</span>
                        <span class="fs-6 fw-bold">21</span>
                      </a>
                    </li>
                    <li class="p-0 nav-item ms-0" role="presentation">
                      <a class="px-3 py-4 nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px btn-active-danger" data-bs-toggle="tab" href="#kt_timeline_widget_3_tab_content_3" aria-selected="false" tabindex="-1" role="tab">
                        <span class="fs-7 fw-semibold">Su</span>
                        <span class="fs-6 fw-bold">22</span>
                      </a>
                    </li>
                    <li class="p-0 nav-item ms-0" role="presentation">
                      <a class="px-3 py-4 nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px btn-active-danger" data-bs-toggle="tab" href="#kt_timeline_widget_3_tab_content_4" aria-selected="true" role="tab">
                        <span class="fs-7 fw-semibold">Tu</span>
                        <span class="fs-6 fw-bold">23</span>
                      </a>
                    </li>
                    <li class="p-0 nav-item ms-0" role="presentation">
                      <a class="px-3 py-4 nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px btn-active-danger" data-bs-toggle="tab" href="#kt_timeline_widget_3_tab_content_5" aria-selected="false" tabindex="-1" role="tab">
                        <span class="fs-7 fw-semibold">Tu</span>
                        <span class="fs-6 fw-bold">24</span>
                      </a>
                    </li>
                    <li class="p-0 nav-item ms-0" role="presentation">
                      <a class="px-3 py-4 nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px btn-active-danger" data-bs-toggle="tab" href="#kt_timeline_widget_3_tab_content_6" aria-selected="false" tabindex="-1" role="tab">
                        <span class="fs-7 fw-semibold">We</span>
                        <span class="fs-6 fw-bold">25</span>
                      </a>
                    </li>
                    <li class="p-0 nav-item ms-0" role="presentation">
                      <a class="px-3 py-4 nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px btn-active-danger" data-bs-toggle="tab" href="#kt_timeline_widget_3_tab_content_7" aria-selected="false" tabindex="-1" role="tab">
                        <span class="fs-7 fw-semibold">Th</span>
                        <span class="fs-6 fw-bold">26</span>
                      </a>
                    </li>
                  </ul>

                  <div class="px-4 mb-2 tab-content">
                    <div style="height: 730px; overflow: auto" class="tab-pane fade show active" id="kt_timeline_widget_3_tab_content_1" role="tabpanel">
                      <div class="mb-6 d-flex align-items-center">
                        <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-success"></span>

                        <div class="flex-grow-1 me-5">
                          <div class="text-gray-800 fw-semibold fs-2">
                            10:20 - 11:00
                            <span class="text-gray-500 fw-semibold fs-7">
                              AM
                            </span>
                          </div>

                          <div class="text-gray-700 fw-semibold fs-6">
                            Trande License
                          </div>

                          <div class="text-gray-500 fw-semibold fs-7">
                            Lead by
                            <a href="#" class="text-primary opacity-75-hover fw-semibold">Minhajul Islam</a>
                          </div>
                        </div>

                        <a class="btn btn-sm btn-light" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#create-meeting">View</a>
                      </div>
                      <div class="mb-6 d-flex align-items-center">
                        <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-warning"></span>

                        <div class="flex-grow-1 me-5">
                          <div class="text-gray-800 fw-semibold fs-2">
                            12:00 - 13:40
                            <span class="text-gray-500 fw-semibold fs-7">
                              AM
                            </span>
                          </div>

                          <div class="text-gray-700 fw-semibold fs-6">
                            Bank Account Releted
                          </div>

                          <div class="text-gray-500 fw-semibold fs-7">
                            Lead by
                            <a href="#" class="text-primary opacity-75-hover fw-semibold">CEO Sir</a>
                          </div>
                        </div>

                        <a class="btn btn-sm btn-light" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#create-meeting">View</a>
                      </div>
                      <div class="mb-6 d-flex align-items-center">
                        <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-info"></span>

                        <div class="flex-grow-1 me-5">
                          <div class="text-gray-800 fw-semibold fs-2">
                            16:30 - 17:00
                            <span class="text-gray-500 fw-semibold fs-7">
                              PM
                            </span>
                          </div>

                          <div class="text-gray-700 fw-semibold fs-6">
                            Operation Meeting
                          </div>

                          <div class="text-gray-500 fw-semibold fs-7">
                            Lead by
                            <a href="#" class="text-primary opacity-75-hover fw-semibold">Faysal Mahmud</a>
                          </div>
                        </div>

                        <a class="btn btn-sm btn-light" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#create-meeting">View</a>
                      </div>
                      <div class="mb-6 d-flex align-items-center">
                        <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-info"></span>

                        <div class="flex-grow-1 me-5">
                          <div class="text-gray-800 fw-semibold fs-2">
                            16:30 - 17:00
                            <span class="text-gray-500 fw-semibold fs-7">
                              PM
                            </span>
                          </div>

                          <div class="text-gray-700 fw-semibold fs-6">
                            Development Meeting
                          </div>

                          <div class="text-gray-500 fw-semibold fs-7">
                            Lead by
                            <a href="#" class="text-primary opacity-75-hover fw-semibold">Khandaker Shahed</a>
                          </div>
                        </div>

                        <a class="btn btn-sm btn-light" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#create-meeting">View</a>
                      </div>
                      <div class="mb-6 d-flex align-items-center">
                        <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-info"></span>

                        <div class="flex-grow-1 me-5">
                          <div class="text-gray-800 fw-semibold fs-2">
                            16:30 - 17:00
                            <span class="text-gray-500 fw-semibold fs-7">
                              PM
                            </span>
                          </div>

                          <div class="text-gray-700 fw-semibold fs-6">
                            Development Meeting
                          </div>

                          <div class="text-gray-500 fw-semibold fs-7">
                            Lead by
                            <a href="#" class="text-primary opacity-75-hover fw-semibold">Khandaker Shahed</a>
                          </div>
                        </div>

                        <a class="btn btn-sm btn-light" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#create-meeting">View</a>
                      </div>
                      <div class="mb-6 d-flex align-items-center">
                        <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-info"></span>

                        <div class="flex-grow-1 me-5">
                          <div class="text-gray-800 fw-semibold fs-2">
                            16:30 - 17:00
                            <span class="text-gray-500 fw-semibold fs-7">
                              PM
                            </span>
                          </div>

                          <div class="text-gray-700 fw-semibold fs-6">
                            Development Meeting
                          </div>

                          <div class="text-gray-500 fw-semibold fs-7">
                            Lead by
                            <a href="#" class="text-primary opacity-75-hover fw-semibold">Khandaker Shahed</a>
                          </div>
                        </div>

                        <a class="btn btn-sm btn-light" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#create-meeting">View</a>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="kt_timeline_widget_3_tab_content_2" role="tabpanel">
                      <div class="mb-6 d-flex align-items-center">
                        <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-warning"></span>

                        <div class="flex-grow-1 me-5">
                          <div class="text-gray-800 fw-semibold fs-2">
                            16:30 - 17:00
                            <span class="text-gray-500 fw-semibold fs-7">
                              PM
                            </span>
                          </div>

                          <div class="text-gray-700 fw-semibold fs-6">
                            Development Meeting
                          </div>

                          <div class="text-gray-500 fw-semibold fs-7">
                            Lead by
                            <a href="#" class="text-primary opacity-75-hover fw-semibold">Khandaker Shahed</a>
                          </div>
                        </div>

                        <a class="btn btn-sm btn-light" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#create-meeting">View</a>
                      </div>

                      <div class="mb-6 d-flex align-items-center">
                        <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-info"></span>

                        <div class="flex-grow-1 me-5">
                          <div class="text-gray-800 fw-semibold fs-2">
                            12:00 - 13:40
                            <span class="text-gray-500 fw-semibold fs-7">
                              AM
                            </span>
                          </div>

                          <div class="text-gray-700 fw-semibold fs-6">
                            Content Meeting
                          </div>

                          <div class="text-gray-500 fw-semibold fs-7">
                            Lead by
                            <a href="#" class="text-primary opacity-75-hover fw-semibold">Akash Mirza With Team</a>
                          </div>
                        </div>

                        <a class="btn btn-sm btn-light" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#create-meeting">View</a>
                      </div>

                      <div class="mb-6 d-flex align-items-center">
                        <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-success"></span>

                        <div class="flex-grow-1 me-5">
                          <div class="text-gray-800 fw-semibold fs-2">
                            10:20 - 11:00
                            <span class="text-gray-500 fw-semibold fs-7">
                              AM
                            </span>
                          </div>

                          <div class="text-gray-700 fw-semibold fs-6">
                            Content Meeting
                          </div>

                          <div class="text-gray-500 fw-semibold fs-7">
                            Lead by
                            <a href="#" class="text-primary opacity-75-hover fw-semibold">Akash Mirza With Team</a>
                          </div>
                        </div>

                        <a class="btn btn-sm btn-light" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#create-meeting">View</a>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="kt_timeline_widget_3_tab_content_3" role="tabpanel">
                      <div class="mb-6 d-flex align-items-center">
                        <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-primary"></span>

                        <div class="flex-grow-1 me-5">
                          <div class="text-gray-800 fw-semibold fs-2">
                            10:20 - 11:00
                            <span class="text-gray-500 fw-semibold fs-7">
                              AM
                            </span>
                          </div>

                          <div class="text-gray-700 fw-semibold fs-6">
                            Content Meeting
                          </div>

                          <div class="text-gray-500 fw-semibold fs-7">
                            Lead by
                            <a href="#" class="text-primary opacity-75-hover fw-semibold">Akash Mirza With Team</a>
                          </div>
                        </div>

                        <a class="btn btn-sm btn-light" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#create-meeting">View</a>
                      </div>

                      <div class="mb-6 d-flex align-items-center">
                        <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-warning"></span>

                        <div class="flex-grow-1 me-5">
                          <div class="text-gray-800 fw-semibold fs-2">
                            12:00 - 13:40
                            <span class="text-gray-500 fw-semibold fs-7">
                              AM
                            </span>
                          </div>

                          <div class="text-gray-700 fw-semibold fs-6">
                            Development Meeting
                          </div>

                          <div class="text-gray-500 fw-semibold fs-7">
                            Lead by
                            <a href="#" class="text-primary opacity-75-hover fw-semibold">Nahidul Islam</a>
                          </div>
                        </div>

                        <a class="btn btn-sm btn-light" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#create-meeting">View</a>
                      </div>

                      <div class="mb-6 d-flex align-items-center">
                        <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-info"></span>

                        <div class="flex-grow-1 me-5">
                          <div class="text-gray-800 fw-semibold fs-2">
                            16:30 - 17:00
                            <span class="text-gray-500 fw-semibold fs-7">
                              PM
                            </span>
                          </div>

                          <div class="text-gray-700 fw-semibold fs-6">
                            Development Meeting
                          </div>

                          <div class="text-gray-500 fw-semibold fs-7">
                            Lead by
                            <a href="#" class="text-primary opacity-75-hover fw-semibold">Khandaker Shahed</a>
                          </div>
                        </div>

                        <a class="btn btn-sm btn-light" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#create-meeting">View</a>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="kt_timeline_widget_3_tab_content_4" role="tabpanel">
                      <div class="mb-6 d-flex align-items-center">
                        <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-info"></span>

                        <div class="flex-grow-1 me-5">
                          <div class="text-gray-800 fw-semibold fs-2">
                            10:20 - 11:00
                            <span class="text-gray-500 fw-semibold fs-7">
                              AM
                            </span>
                          </div>

                          <div class="text-gray-700 fw-semibold fs-6">
                            Content Meeting
                          </div>

                          <div class="text-gray-500 fw-semibold fs-7">
                            Lead by
                            <a href="#" class="text-primary opacity-75-hover fw-semibold">Akash Mirza With Team</a>
                          </div>
                        </div>

                        <a class="btn btn-sm btn-light" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#create-meeting">View</a>
                      </div>

                      <div class="mb-6 d-flex align-items-center">
                        <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-warning"></span>

                        <div class="flex-grow-1 me-5">
                          <div class="text-gray-800 fw-semibold fs-2">
                            16:30 - 17:00
                            <span class="text-gray-500 fw-semibold fs-7">
                              PM
                            </span>
                          </div>

                          <div class="text-gray-700 fw-semibold fs-6">
                            UI/UX Design Meeting
                          </div>

                          <div class="text-gray-500 fw-semibold fs-7">
                            Lead by
                            <a href="#" class="text-primary opacity-75-hover fw-semibold">Nahidul Islam</a>
                          </div>
                        </div>

                        <a class="btn btn-sm btn-light" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#create-meeting">View</a>
                      </div>

                      <div class="mb-6 d-flex align-items-center">
                        <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-success"></span>

                        <div class="flex-grow-1 me-5">
                          <div class="text-gray-800 fw-semibold fs-2">
                            12:00 - 13:40
                            <span class="text-gray-500 fw-semibold fs-7">
                              AM
                            </span>
                          </div>

                          <div class="text-gray-700 fw-semibold fs-6">
                            Development Meeting
                          </div>

                          <div class="text-gray-500 fw-semibold fs-7">
                            Lead by
                            <a href="#" class="text-primary opacity-75-hover fw-semibold">Khandaker Shahed</a>
                          </div>
                        </div>

                        <a class="btn btn-sm btn-light" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#create-meeting">View</a>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="kt_timeline_widget_3_tab_content_5" role="tabpanel">
                      <div class="mb-6 d-flex align-items-center">
                        <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-danger"></span>

                        <div class="flex-grow-1 me-5">
                          <div class="text-gray-800 fw-semibold fs-2">
                            12:00 - 13:40
                            <span class="text-gray-500 fw-semibold fs-7">
                              AM
                            </span>
                          </div>

                          <div class="text-gray-700 fw-semibold fs-6">
                            9 UI/UX Design Meeting
                          </div>

                          <div class="text-gray-500 fw-semibold fs-7">
                            Lead by
                            <a href="#" class="text-primary opacity-75-hover fw-semibold">Nahidul Islam</a>
                          </div>
                        </div>

                        <a class="btn btn-sm btn-light" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#create-meeting">View</a>
                      </div>

                      <div class="mb-6 d-flex align-items-center">
                        <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-warning"></span>

                        <div class="flex-grow-1 me-5">
                          <div class="text-gray-800 fw-semibold fs-2">
                            10:20 - 11:00
                            <span class="text-gray-500 fw-semibold fs-7">
                              AM
                            </span>
                          </div>

                          <div class="text-gray-700 fw-semibold fs-6">
                            Content Meeting
                          </div>

                          <div class="text-gray-500 fw-semibold fs-7">
                            Lead by
                            <a href="#" class="text-primary opacity-75-hover fw-semibold">Khandaker Shahed</a>
                          </div>
                        </div>

                        <a class="btn btn-sm btn-light" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#create-meeting">View</a>
                      </div>

                      <div class="mb-6 d-flex align-items-center">
                        <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-info"></span>

                        <div class="flex-grow-1 me-5">
                          <div class="text-gray-800 fw-semibold fs-2">
                            16:30 - 17:00
                            <span class="text-gray-500 fw-semibold fs-7">
                              PM
                            </span>
                          </div>

                          <div class="text-gray-700 fw-semibold fs-6">
                            Development Meeting
                          </div>

                          <div class="text-gray-500 fw-semibold fs-7">
                            Lead by
                            <a href="#" class="text-primary opacity-75-hover fw-semibold">Akash Mirza With Team</a>
                          </div>
                        </div>

                        <a class="btn btn-sm btn-light" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#create-meeting">View</a>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="kt_timeline_widget_3_tab_content_6" role="tabpanel">
                      <div class="mb-6 d-flex align-items-center">
                        <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-info"></span>

                        <div class="flex-grow-1 me-5">
                          <div class="text-gray-800 fw-semibold fs-2">
                            10:20 - 11:00
                            <span class="text-gray-500 fw-semibold fs-7">
                              AM
                            </span>
                          </div>

                          <div class="text-gray-700 fw-semibold fs-6">
                            Development Meeting
                          </div>

                          <div class="text-gray-500 fw-semibold fs-7">
                            Lead by
                            <a href="#" class="text-primary opacity-75-hover fw-semibold">Khandaker Shahed</a>
                          </div>
                        </div>

                        <a class="btn btn-sm btn-light" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#create-meeting">View</a>
                      </div>

                      <div class="mb-6 d-flex align-items-center">
                        <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-primary"></span>

                        <div class="flex-grow-1 me-5">
                          <div class="text-gray-800 fw-semibold fs-2">
                            16:30 - 17:00
                            <span class="text-gray-500 fw-semibold fs-7">
                              PM
                            </span>
                          </div>

                          <div class="text-gray-700 fw-semibold fs-6">
                            Content Meeting
                          </div>

                          <div class="text-gray-500 fw-semibold fs-7">
                            Lead by
                            <a href="#" class="text-primary opacity-75-hover fw-semibold">Akash Mirza With Team</a>
                          </div>
                        </div>

                        <a class="btn btn-sm btn-light" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#create-meeting">View</a>
                      </div>

                      <div class="mb-6 d-flex align-items-center">
                        <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-warning"></span>

                        <div class="flex-grow-1 me-5">
                          <div class="text-gray-800 fw-semibold fs-2">
                            12:00 - 13:40
                            <span class="text-gray-500 fw-semibold fs-7">
                              AM
                            </span>
                          </div>

                          <div class="text-gray-700 fw-semibold fs-6">
                            9 UI/UX Design Meeting
                          </div>

                          <div class="text-gray-500 fw-semibold fs-7">
                            Lead by
                            <a href="#" class="text-primary opacity-75-hover fw-semibold">Nahidul Islam</a>
                          </div>
                        </div>

                        <a class="btn btn-sm btn-light" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#create-meeting">View</a>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="kt_timeline_widget_3_tab_content_7" role="tabpanel">
                      <div class="mb-6 d-flex align-items-center">
                        <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-warning"></span>

                        <div class="flex-grow-1 me-5">
                          <div class="text-gray-800 fw-semibold fs-2">
                            12:00 - 13:40
                            <span class="text-gray-500 fw-semibold fs-7">
                              AM
                            </span>
                          </div>

                          <div class="text-gray-700 fw-semibold fs-6">
                            Content Meeting
                          </div>

                          <div class="text-gray-500 fw-semibold fs-7">
                            Lead by
                            <a href="#" class="text-primary opacity-75-hover fw-semibold">Nahidul Islam</a>
                          </div>
                        </div>

                        <a class="btn btn-sm btn-light" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#create-meeting">View</a>
                      </div>

                      <div class="mb-6 d-flex align-items-center">
                        <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-danger"></span>

                        <div class="flex-grow-1 me-5">
                          <div class="text-gray-800 fw-semibold fs-2">
                            10:20 - 11:00
                            <span class="text-gray-500 fw-semibold fs-7">
                              AM
                            </span>
                          </div>

                          <div class="text-gray-700 fw-semibold fs-6">
                            9 UI/UX Design Meeting
                          </div>

                          <div class="text-gray-500 fw-semibold fs-7">
                            Lead by
                            <a href="#" class="text-primary opacity-75-hover fw-semibold">Akash Mirza With Team</a>
                          </div>
                        </div>

                        <a class="btn btn-sm btn-light" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#create-meeting">View</a>
                      </div>

                      <div class="mb-6 d-flex align-items-center">
                        <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-success"></span>

                        <div class="flex-grow-1 me-5">
                          <div class="text-gray-800 fw-semibold fs-2">
                            16:30 - 17:00
                            <span class="text-gray-500 fw-semibold fs-7">
                              PM
                            </span>
                          </div>

                          <div class="text-gray-700 fw-semibold fs-6">
                            Development Meeting
                          </div>

                          <div class="text-gray-500 fw-semibold fs-7">
                            Lead by
                            <a href="#" class="text-primary opacity-75-hover fw-semibold">Khandaker Shahed</a>
                          </div>
                        </div>

                        <a class="btn btn-sm btn-light" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#create-meeting">View</a>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="kt_timeline_widget_3_tab_content_8" role="tabpanel">
                      <div class="mb-6 d-flex align-items-center">
                        <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-success"></span>

                        <div class="flex-grow-1 me-5">
                          <div class="text-gray-800 fw-semibold fs-2">
                            16:30 - 17:00
                            <span class="text-gray-500 fw-semibold fs-7">
                              PM
                            </span>
                          </div>

                          <div class="text-gray-700 fw-semibold fs-6">
                            Development Meeting
                          </div>

                          <div class="text-gray-500 fw-semibold fs-7">
                            Lead by
                            <a href="#" class="text-primary opacity-75-hover fw-semibold">Akash Mirza With Team</a>
                          </div>
                        </div>

                        <a class="btn btn-sm btn-light" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#create-meeting">View</a>
                      </div>

                      <div class="mb-6 d-flex align-items-center">
                        <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-info"></span>

                        <div class="flex-grow-1 me-5">
                          <div class="text-gray-800 fw-semibold fs-2">
                            10:20 - 11:00
                            <span class="text-gray-500 fw-semibold fs-7">
                              AM
                            </span>
                          </div>

                          <div class="text-gray-700 fw-semibold fs-6">
                            Content Meeting
                          </div>

                          <div class="text-gray-500 fw-semibold fs-7">
                            Lead by
                            <a href="#" class="text-primary opacity-75-hover fw-semibold">Khandaker Shahed</a>
                          </div>
                        </div>

                        <a class="btn btn-sm btn-light" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#create-meeting">View</a>
                      </div>

                      <div class="mb-6 d-flex align-items-center">
                        <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-danger"></span>

                        <div class="flex-grow-1 me-5">
                          <div class="text-gray-800 fw-semibold fs-2">
                            12:00 - 13:40
                            <span class="text-gray-500 fw-semibold fs-7">
                              AM
                            </span>
                          </div>

                          <div class="text-gray-700 fw-semibold fs-6">
                            9 UI/UX Design Meeting
                          </div>

                          <div class="text-gray-500 fw-semibold fs-7">
                            Lead by
                            <a href="#" class="text-primary opacity-75-hover fw-semibold">Nahidul Islam</a>
                          </div>
                        </div>

                        <a class="btn btn-sm btn-light" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#create-meeting">View</a>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="kt_timeline_widget_3_tab_content_9" role="tabpanel">
                      <div class="mb-6 d-flex align-items-center">
                        <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-info"></span>

                        <div class="flex-grow-1 me-5">
                          <div class="text-gray-800 fw-semibold fs-2">
                            12:00 - 13:40
                            <span class="text-gray-500 fw-semibold fs-7">
                              AM
                            </span>
                          </div>

                          <div class="text-gray-700 fw-semibold fs-6">
                            Content Meeting
                          </div>

                          <div class="text-gray-500 fw-semibold fs-7">
                            Lead by
                            <a href="#" class="text-primary opacity-75-hover fw-semibold">Nahidul Islam</a>
                          </div>
                        </div>

                        <a class="btn btn-sm btn-light" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#create-meeting">View</a>
                      </div>

                      <div class="mb-6 d-flex align-items-center">
                        <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-primary"></span>

                        <div class="flex-grow-1 me-5">
                          <div class="text-gray-800 fw-semibold fs-2">
                            16:30 - 17:00
                            <span class="text-gray-500 fw-semibold fs-7">
                              PM
                            </span>
                          </div>

                          <div class="text-gray-700 fw-semibold fs-6">
                            Development Meeting
                          </div>

                          <div class="text-gray-500 fw-semibold fs-7">
                            Lead by
                            <a href="#" class="text-primary opacity-75-hover fw-semibold">Khandaker Shahed</a>
                          </div>
                        </div>

                        <a class="btn btn-sm btn-light" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#create-meeting">View</a>
                      </div>

                      <div class="mb-6 d-flex align-items-center">
                        <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-success"></span>

                        <div class="flex-grow-1 me-5">
                          <div class="text-gray-800 fw-semibold fs-2">
                            10:20 - 11:00
                            <span class="text-gray-500 fw-semibold fs-7">
                              AM
                            </span>
                          </div>

                          <div class="text-gray-700 fw-semibold fs-6">
                            9 UI/UX Design Meeting
                          </div>

                          <div class="text-gray-500 fw-semibold fs-7">
                            Lead by
                            <a href="#" class="text-primary opacity-75-hover fw-semibold">Akash Mirza With Team</a>
                          </div>
                        </div>

                        <a class="btn btn-sm btn-light" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#create-meeting">View</a>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="kt_timeline_widget_3_tab_content_10" role="tabpanel">
                      <div class="mb-6 d-flex align-items-center">
                        <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-danger"></span>

                        <div class="flex-grow-1 me-5">
                          <div class="text-gray-800 fw-semibold fs-2">
                            12:00 - 13:40
                            <span class="text-gray-500 fw-semibold fs-7">
                              AM
                            </span>
                          </div>

                          <div class="text-gray-700 fw-semibold fs-6">
                            Development Meeting
                          </div>

                          <div class="text-gray-500 fw-semibold fs-7">
                            Lead by
                            <a href="#" class="text-primary opacity-75-hover fw-semibold">Akash Mirza With Team</a>
                          </div>
                        </div>

                        <a class="btn btn-sm btn-light" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#create-meeting">View</a>
                      </div>

                      <div class="mb-6 d-flex align-items-center">
                        <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-warning"></span>

                        <div class="flex-grow-1 me-5">
                          <div class="text-gray-800 fw-semibold fs-2">
                            10:20 - 11:00
                            <span class="text-gray-500 fw-semibold fs-7">
                              AM
                            </span>
                          </div>

                          <div class="text-gray-700 fw-semibold fs-6">
                            9 UI/UX Design Meeting
                          </div>

                          <div class="text-gray-500 fw-semibold fs-7">
                            Lead by
                            <a href="#" class="text-primary opacity-75-hover fw-semibold">Nahidul Islam</a>
                          </div>
                        </div>

                        <a class="btn btn-sm btn-light" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#create-meeting">View</a>
                      </div>

                      <div class="mb-6 d-flex align-items-center">
                        <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-info"></span>

                        <div class="flex-grow-1 me-5">
                          <div class="text-gray-800 fw-semibold fs-2">
                            16:30 - 17:00
                            <span class="text-gray-500 fw-semibold fs-7">
                              PM
                            </span>
                          </div>

                          <div class="text-gray-700 fw-semibold fs-6">
                            Content Meeting
                          </div>

                          <div class="text-gray-500 fw-semibold fs-7">
                            Lead by
                            <a href="#" class="text-primary opacity-75-hover fw-semibold">Khandaker Shahed</a>
                          </div>
                        </div>

                        <a class="btn btn-sm btn-light" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#create-meeting">View</a>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="kt_timeline_widget_3_tab_content_11" role="tabpanel">
                      <div class="mb-6 d-flex align-items-center">
                        <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-info"></span>

                        <div class="flex-grow-1 me-5">
                          <div class="text-gray-800 fw-semibold fs-2">
                            16:30 - 17:00
                            <span class="text-gray-500 fw-semibold fs-7">
                              PM
                            </span>
                          </div>

                          <div class="text-gray-700 fw-semibold fs-6">
                            9 UI/UX Design Meeting
                          </div>

                          <div class="text-gray-500 fw-semibold fs-7">
                            Lead by
                            <a href="#" class="text-primary opacity-75-hover fw-semibold">Khandaker Shahed</a>
                          </div>
                        </div>

                        <a class="btn btn-sm btn-light" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#create-meeting">View</a>
                      </div>

                      <div class="mb-6 d-flex align-items-center">
                        <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-danger"></span>

                        <div class="flex-grow-1 me-5">
                          <div class="text-gray-800 fw-semibold fs-2">
                            10:20 - 11:00
                            <span class="text-gray-500 fw-semibold fs-7">
                              AM
                            </span>
                          </div>

                          <div class="text-gray-700 fw-semibold fs-6">
                            Development Meeting
                          </div>

                          <div class="text-gray-500 fw-semibold fs-7">
                            Lead by
                            <a href="#" class="text-primary opacity-75-hover fw-semibold">Akash Mirza With Team</a>
                          </div>
                        </div>

                        <a class="btn btn-sm btn-light" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#create-meeting">View</a>
                      </div>

                      <div class="mb-6 d-flex align-items-center">
                        <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-primary"></span>

                        <div class="flex-grow-1 me-5">
                          <div class="text-gray-800 fw-semibold fs-2">
                            12:00 - 13:40
                            <span class="text-gray-500 fw-semibold fs-7">
                              AM
                            </span>
                          </div>

                          <div class="text-gray-700 fw-semibold fs-6">
                            Content Meeting
                          </div>

                          <div class="text-gray-500 fw-semibold fs-7">
                            Lead by
                            <a href="#" class="text-primary opacity-75-hover fw-semibold">Nahidul Islam</a>
                          </div>
                        </div>

                        <a class="btn btn-sm btn-light" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#create-meeting">View</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Al Shedule Tabs End -->
              <div class="tab-pane fade" id="kpi-details" role="tabpanel" aria-labelledby="kt_stats_widget_16_tab_link_1">
                <div class="card card-flush h-lg-100">
                  <div class="pt-3 card-body p-9">
                    <div class="d-flex flex-column">
                      <div class="mb-5 d-flex align-items-center">
                        <div class="symbol symbol-30px me-5">
                          <img alt="Icon" src="https://preview.keenthemes.com/metronic8/demo1/assets/media/svg/files/doc.svg">
                        </div>

                        <div class="fw-semibold">
                          <a class="text-gray-900 fs-6 fw-bold text-hover-primary" href="#">Job Application</a>

                          <div class="text-gray-500">
                            Sended <a href="#">Marcus Blake</a>
                          </div>
                        </div>

                        <button type="button" class="btn btn-sm btn-icon btn-icon-primary btn-active-light-primary ms-auto">
                          <i class="fas fa-expand fs-3" aria-hidden="true"></i>
                        </button>
                      </div>
                      <div class="mb-5 d-flex align-items-center">
                        <div class="symbol symbol-30px me-5">
                          <img alt="Icon" src="https://preview.keenthemes.com/metronic8/demo1/assets/media/svg/files/doc.svg">
                        </div>

                        <div class="fw-semibold">
                          <a class="text-gray-900 fs-6 fw-bold text-hover-primary" href="#">Job Application</a>

                          <div class="text-gray-500">
                            Sended <a href="#">Marcus Blake</a>
                          </div>
                        </div>

                        <button type="button" class="btn btn-sm btn-icon btn-icon-primary btn-active-light-primary ms-auto">
                          <i class="fas fa-expand fs-3" aria-hidden="true"></i>
                        </button>
                      </div>
                      <div class="mb-5 d-flex align-items-center">
                        <div class="symbol symbol-30px me-5">
                          <img alt="Icon" src="https://preview.keenthemes.com/metronic8/demo1/assets/media/svg/files/doc.svg">
                        </div>

                        <div class="fw-semibold">
                          <a class="text-gray-900 fs-6 fw-bold text-hover-primary" href="#">Job Application</a>

                          <div class="text-gray-500">
                            Sended <a href="#">Marcus Blake</a>
                          </div>
                        </div>

                        <button type="button" class="btn btn-sm btn-icon btn-icon-primary btn-active-light-primary ms-auto">
                          <i class="fas fa-expand fs-3" aria-hidden="true"></i>
                        </button>
                      </div>
                      <div class="mb-5 d-flex align-items-center">
                        <div class="symbol symbol-30px me-5">
                          <img alt="Icon" src="https://preview.keenthemes.com/metronic8/demo1/assets/media/svg/files/doc.svg">
                        </div>

                        <div class="fw-semibold">
                          <a class="text-gray-900 fs-6 fw-bold text-hover-primary" href="#">Job Application</a>

                          <div class="text-gray-500">
                            Sended <a href="#">Marcus Blake</a>
                          </div>
                        </div>

                        <button type="button" class="btn btn-sm btn-icon btn-icon-primary btn-active-light-primary ms-auto">
                          <i class="fas fa-expand fs-3" aria-hidden="true"></i>
                        </button>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="symbol symbol-30px me-5">
                          <img alt="Icon" src="https://preview.keenthemes.com/metronic8/demo1/assets/media/svg/files/doc.svg">
                        </div>

                        <div class="fw-semibold">
                          <a class="text-gray-900 fs-6 fw-bold text-hover-primary" href="#">Job Application</a>

                          <div class="text-gray-500">
                            Sended <a href="#">Marcus Blake</a>
                          </div>
                        </div>

                        <button type="button" class="btn btn-sm btn-icon btn-icon-primary btn-active-light-primary ms-auto">
                          <i class="fas fa-expand fs-3" aria-hidden="true"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>

              </div>

              <div class="p-3 tab-pane fade" id="task-shedule" role="tabpanel" aria-labelledby="kt_stats_widget_16_tab_link_2">
                <div class="table-responsive">
                  <table class="table my-0 align-middle table-row-dashed gs-0 gy-3">
                    <thead>
                      <tr class="text-gray-500 fs-7 fw-bold border-bottom-0">
                        <th class="p-0 pb-3 text-start">
                          Name
                        </th>
                        <th class="p-0 pb-3 text-center">
                          Create
                        </th>
                        <th class="p-0 pb-3 text-end">
                          Notice
                        </th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <div class="d-flex justify-content-start flex-column">
                              <a href="" class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">Ramadan Office Hour</a>
                            </div>
                          </div>
                        </td>

                        <td class="text-end pe-0">25-02-2025</td>

                        <td class="text-end">
                          <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="fas fa-angle-right fs-4" aria-hidden="true"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <div class="d-flex justify-content-start flex-column">
                              <a href="" class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">Ramadan Office Hour</a>
                            </div>
                          </div>
                        </td>

                        <td class="text-end pe-0">25-02-2025</td>

                        <td class="text-end">
                          <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="fas fa-angle-right fs-4" aria-hidden="true"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <div class="d-flex justify-content-start flex-column">
                              <a href="" class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">Ramadan Office Hour</a>
                            </div>
                          </div>
                        </td>

                        <td class="text-end pe-0">25-02-2025</td>

                        <td class="text-end">
                          <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="fas fa-angle-right fs-4" aria-hidden="true"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <div class="d-flex justify-content-start flex-column">
                              <a href="" class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">Ramadan Office Hour</a>
                            </div>
                          </div>
                        </td>

                        <td class="text-end pe-0">25-02-2025</td>

                        <td class="text-end">
                          <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="fas fa-angle-right fs-4" aria-hidden="true"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <div class="d-flex justify-content-start flex-column">
                              <a href="" class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">Ramadan Office Hour</a>
                            </div>
                          </div>
                        </td>

                        <td class="text-end pe-0">25-02-2025</td>

                        <td class="text-end">
                          <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="fas fa-angle-right fs-4" aria-hidden="true"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <div class="d-flex justify-content-start flex-column">
                              <a href="" class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">Ramadan Office Hour</a>
                            </div>
                          </div>
                        </td>

                        <td class="text-end pe-0">25-02-2025</td>

                        <td class="text-end">
                          <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="fas fa-angle-right fs-4" aria-hidden="true"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <div class="d-flex justify-content-start flex-column">
                              <a href="" class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">Ramadan Office Hour</a>
                            </div>
                          </div>
                        </td>

                        <td class="text-end pe-0">25-02-2025</td>

                        <td class="text-end">
                          <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="fas fa-angle-right fs-4" aria-hidden="true"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <div class="d-flex justify-content-start flex-column">
                              <a href="" class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">Ramadan Office Hour</a>
                            </div>
                          </div>
                        </td>

                        <td class="text-end pe-0">25-02-2025</td>

                        <td class="text-end">
                          <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="fas fa-angle-right fs-4" aria-hidden="true"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <div class="d-flex justify-content-start flex-column">
                              <a href="" class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">Ramadan Office Hour</a>
                            </div>
                          </div>
                        </td>

                        <td class="text-end pe-0">25-02-2025</td>

                        <td class="text-end">
                          <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="fas fa-angle-right fs-4" aria-hidden="true"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <div class="d-flex justify-content-start flex-column">
                              <a href="" class="mb-1 text-gray-800 fw-bold text-hover-primary fs-6">Ramadan Office Hour</a>
                            </div>
                          </div>
                        </td>

                        <td class="text-end pe-0">25-02-2025</td>

                        <td class="text-end">
                          <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="fas fa-angle-right fs-4" aria-hidden="true"></i></a>
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
  @include('metronic.pages.rfq.partials.assign-modal')
  @push('scripts')

  @endpush
</x-admin-app-layout>
<!-- RFQ Dashboard End -->