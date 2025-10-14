<x-admin-app-layout :title="'RFQ Dashboard'">
  <!-- Main Content Start -->
  <div class="row gx-8">
    <div class="col-xl-4">
      <div class="shadow-sm card card-flush h-xl-100 mb-lg-10">
        <div class="py-2 card-header align-items-center bg-light">
          <div
            class="card-title d-flex justify-content-between align-items-center w-100">
            <span class="pt-1 text-black fw-semibold fs-6">Attendance Status</span>
            <span
              class="mt-3 text-5xl bg-primary me-2 badge">Excelent</span>
          </div>
        </div>
        <div
          class="pt-0 bg-white card-body d-flex align-items-end">
          <div
            class="d-flex align-items-center w-100 jusitfy-content-between">
            <div
              class="d-flex flex-column content-justify-center flex-grow-1">
              <div
                class="d-flex fs-6 fw-semibold align-items-center">
                <div
                  class="bullet w-8px h-6px rounded-2 bg-success me-3"></div>
                <div
                  class="flex-shrink-0 text-gray-500 fs-6 fw-semibold">
                  Present
                </div>
                <div
                  class="mx-2 separator separator-dashed min-w-10px flex-grow-1"></div>
                <div
                  class="ms-auto fw-bolder text-end text-primary">
                  10
                  <i
                    class="fa-solid fa-arrow-trend-up text-primary"></i>
                </div>
              </div>
              <div
                class="pt-5 my-1 d-flex fs-6 fw-semibold align-items-center">
                <div
                  class="bullet w-8px h-6px rounded-2 bg-primary me-3"></div>
                <div
                  class="flex-shrink-0 text-gray-500 fs-6 fw-semibold">
                  Total Present
                </div>
                <div
                  class="mx-2 separator separator-dashed min-w-10px flex-grow-1"></div>
                <div
                  class="ms-auto fw-bolder text-primary text-end">
                  27/28
                  <i
                    class="fa-solid fa-arrow-trend-down text-danger"></i>
                </div>
              </div>
              <div
                class="pt-5 d-flex fs-6 fw-semibold align-items-center">
                <div
                  class="bullet w-8px h-6px rounded-2 me-3"
                  style="background-color: #e4e6ef"></div>
                <div
                  class="flex-shrink-0 text-gray-500 fs-6 fw-semibold">
                  Total Absent
                </div>
                <div
                  class="mx-2 separator separator-dashed min-w-10px flex-grow-1"></div>
                <div
                  class="ms-auto fw-bolder text-primary text-end">
                  01/28
                  <i
                    class="fa-solid fa-arrow-trend-up text-primary"></i>
                </div>
              </div>
            </div>
            <!-- Info Cards -->
            <div
              class="d-flex flex-column content-justify-center flex-grow-1 ps-10">
              <div
                class="p-2 shadow-md d-flex fs-6 fw-semibold align-items-center rounded-2 box-dahsed"
                title="Single Late">
                <div
                  class="flex-shrink-0 fs-6 fw-semibold text-primary fw-bold">
                  Late
                </div>
                <div
                  class="mx-2 separator separator-dashed min-w-10px flex-grow-1"></div>
                <div
                  class="ms-auto fw-bolder text-end text-primary">
                  2
                  <i
                    class="fa-solid fa-arrow-trend-up text-warning"></i>
                </div>
              </div>
              <div
                class="p-2 mt-2 shadow-md d-flex fs-6 fw-semibold align-items-center rounded-2 box-dahsed"
                title="Dubble Late">
                <div
                  class="flex-shrink-0 fs-6 fw-semibold text-primary fw-bold">
                  Dubble Late
                </div>
                <div
                  class="mx-2 separator separator-dashed min-w-10px flex-grow-1"></div>
                <div
                  class="ms-auto fw-bolder text-end text-primary">
                  2
                  <i
                    class="fa-solid fa-arrow-trend-down text-danger"></i>
                </div>
              </div>
              <div
                class="p-2 mt-2 shadow-md d-flex fs-6 fw-semibold align-items-center rounded-2 box-dahsed"
                title="In Time">
                <div
                  class="flex-shrink-0 fs-6 fw-semibold text-primary fw-bold">
                  In Time
                </div>
                <div
                  class="mx-2 separator separator-dashed min-w-10px flex-grow-1"></div>
                <div
                  class="ms-auto fw-bolder text-end text-primary">
                  2
                  <i
                    class="fa-solid fa-arrow-trend-up text-warning"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4">
      <div class="shadow-sm card card-flush h-xl-100 mb-lg-10">
        <div class="py-2 card-header align-items-center bg-light">
          <div
            class="card-title d-flex justify-content-between align-items-center w-100">
            <span class="pt-1 text-black fw-semibold fs-6">Leave Status</span>
            <span
              class="mt-3 text-5xl bg-primary me-2 badge">Need Improve</span>
          </div>
        </div>
        <div
          class="pt-0 bg-white card-body d-flex align-items-end">
          <div
            class="d-flex align-items-center w-100 justify-content-between">
            <div
              class="d-flex flex-column content-justify-center flex-grow-1">
              <div
                class="d-flex fs-6 fw-semibold align-items-center">
                <div
                  class="bullet w-8px h-6px rounded-2 bg-success me-3"></div>
                <div
                  class="flex-shrink-0 text-gray-500 fs-6 fw-semibold">
                  Leave Due
                </div>
                <div
                  class="mx-2 separator separator-dashed min-w-10px flex-grow-1"></div>
                <div
                  class="ms-auto fw-bolder text-end text-primary">
                  01
                  <i
                    class="fa-solid fa-arrow-trend-up text-primary"></i>
                </div>
              </div>
              <div
                class="pt-5 my-1 d-flex fs-6 fw-semibold align-items-center">
                <div
                  class="bullet w-8px h-6px rounded-2 bg-primary me-3"></div>
                <div
                  class="flex-shrink-0 text-gray-500 fs-6 fw-semibold">
                  Total Leave
                </div>
                <div
                  class="mx-2 separator separator-dashed min-w-10px flex-grow-1"></div>
                <div
                  class="ms-auto fw-bolder text-primary text-end">
                  05
                  <i
                    class="fa-solid fa-arrow-trend-up text-primary"></i>
                </div>
              </div>
            </div>
            <!-- Info Cards -->
            <div
              class="d-flex flex-column content-justify-center flex-grow-1 ps-10">
              <div class="d-flex justify-content-end">
                <div
                  id="kt_card_widget_9_chart"
                  class="min-h-auto"
                  style="height: 100px; width: 180px"
                  data-kt-size="78"
                  data-kt-line="11"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4">
      <div class="shadow-sm card card-flush h-xl-100 mb-lg-10">
        <div class="py-2 card-header align-items-center bg-light">
          <div
            class="card-title d-flex justify-content-between align-items-center w-100">
            <span class="pt-1 text-black fw-semibold fs-6">Movement Status</span>
            <span
              class="mt-3 text-5xl bg-primary me-2 badge">Not Bad</span>
          </div>
        </div>
        <div
          class="pt-0 bg-white card-body d-flex align-items-end">
          <div
            class="d-flex align-items-center w-100 jusitfy-content-between">
            <div
              id="kt_card_widget_6_chart"
              class="min-h-auto"
              style="height: 100px; width: 180px"
              data-kt-size="78"
              data-kt-line="11"></div>

            <div
              class="d-flex flex-column content-justify-center flex-grow-1">
              <div
                class="d-flex fs-6 fw-semibold align-items-center">
                <div
                  class="bullet w-8px h-6px rounded-2 bg-success me-3"></div>
                <div
                  class="flex-shrink-0 text-gray-500 fs-6 fw-semibold">
                  Today Movement
                </div>
                <div
                  class="mx-2 separator separator-dashed min-w-10px flex-grow-1"></div>
                <div class="ms-auto fw-bolder text-end">
                  <i
                    class="fa-solid fa-arrow-trend-up text-primary"></i>
                </div>
              </div>
              <div
                class="my-1 d-flex fs-6 fw-semibold align-items-center">
                <div
                  class="bullet w-8px h-6px rounded-2 bg-primary me-3"></div>
                <div
                  class="flex-shrink-0 text-gray-500 fs-6 fw-semibold">
                  This Month Movement
                </div>
                <div
                  class="mx-2 separator separator-dashed min-w-10px flex-grow-1"></div>
                <div
                  class="text-gray-700 ms-auto fw-bolder text-end">
                  27/28
                  <i
                    class="fa-solid fa-arrow-trend-up text-primary"></i>
                </div>
              </div>
              <div
                class="d-flex fs-6 fw-semibold align-items-center">
                <div
                  class="bullet w-8px h-6px rounded-2 me-3"
                  style="background-color: #e4e6ef"></div>
                <div
                  class="flex-shrink-0 text-gray-500 fs-6 fw-semibold">
                  This Year Movement
                </div>
                <div
                  class="mx-2 separator separator-dashed min-w-10px flex-grow-1"></div>
                <div
                  class="text-gray-700 ms-auto fw-bolder text-end">
                  01/28
                  <i
                    class="fa-solid fa-arrow-trend-up text-primary"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="mt-8 row gx-8">
    <div class="col-xl-5">
      <div class="shadow-sm card">
        <div
          class="border-0 card-header align-items-center bg-light">
          <h1 class="card-title">Attendance Details</h1>
          <div>
            <ul class="nav nav-tabs nav-line-tabs fs-6">
              <li class="nav-item">
                <a
                  class="nav-link active"
                  data-bs-toggle="tab"
                  href="#officialAll">This Month</a>
              </li>
              <li class="nav-item">
                <a
                  class="nav-link"
                  data-bs-toggle="tab"
                  href="#officialRead">Last Month</a>
              </li>
            </ul>
          </div>
        </div>
        <div
          class="p-0 card-body hover-scroll-overlay-y"
          style="height: 450px">
          <div class="tab-content" id="myTabContent">
            <div
              class="tab-pane fade show active"
              id="officialAll"
              role="tabpanel">
              <div class="table-responsive">
                <table
                  class="table border data_table table-striped table-row-bordered gy-5 gs-7 rounded-3">
                  <thead
                    class="text-gray-500 fs-7">
                    <tr class="text-gray-800 fw-bold fs-6 px-7">
                      <th width="">Date</th>
                      <th width="">Check In</th>
                      <th width="">Check Out</th>
                      <th width="">Status</th>
                      <th width="">Substitute</th>
                    </tr>
                  </thead>
                  <tbody class="fs-6">
                    <tr>
                      <td>08 Aug 2024</td>
                      <td>06:02 PM</td>
                      <td>06:02 AM</td>
                      <td>
                        <span class="text-white badge bg-info">L</span>
                      </td>
                      <td>Khandaker Shahed</td>
                    </tr>
                    <tr>
                      <td>08 Aug 2024</td>
                      <td>06:02 PM</td>
                      <td>06:02 AM</td>
                      <td>
                        <span class="text-white badge bg-danger">LL</span>
                      </td>
                      <td>Khandaker Shahed</td>
                    </tr>
                    <tr>
                      <td>08 Aug 2024</td>
                      <td>06:02 PM</td>
                      <td>06:02 AM</td>
                      <td>
                        <span class="text-white badge bg-success">In Time</span>
                      </td>
                      <td>Khandaker Shahed</td>
                    </tr>
                    <tr>
                      <td>08 Aug 2024</td>
                      <td>06:02 PM</td>
                      <td>06:02 AM</td>
                      <td>
                        <span class="text-white badge bg-dark">Not Attend</span>
                      </td>
                      <td>Khandaker Shahed</td>
                    </tr>
                    <tr>
                      <td>08 Aug 2024</td>
                      <td>06:02 PM</td>
                      <td>06:02 AM</td>
                      <td>
                        <span class="text-white badge bg-dark">Not Attend</span>
                      </td>
                      <td>Khandaker Shahed</td>
                    </tr>
                    <tr>
                      <td>08 Aug 2024</td>
                      <td>06:02 PM</td>
                      <td>06:02 AM</td>
                      <td>
                        <span class="text-white badge bg-dark">Not Attend</span>
                      </td>
                      <td>Khandaker Shahed</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div
              class="tab-pane fade"
              id="officialRead"
              role="tabpanel">
              <div class="table-responsive">
                <table
                  class="table border data_table table-striped table-row-bordered gy-5 gs-7 rounded-3">
                  <thead
                    class="text-gray-500 fs-7">
                    <tr class="text-gray-800 fw-bold fs-6 px-7">
                      <th width="">Date</th>
                      <th width="">Check In</th>
                      <th width="">Check Out</th>
                      <th width="">Status</th>
                      <th width="">Substitute</th>
                    </tr>
                  </thead>
                  <tbody class="fs-6">
                    <tr>
                      <td>08 Aug 2024</td>
                      <td>06:02 PM</td>
                      <td>06:02 AM</td>
                      <td>
                        <span class="text-white badge bg-info">L</span>
                      </td>
                      <td>Khandaker Shahed</td>
                    </tr>
                    <tr>
                      <td>08 Aug 2024</td>
                      <td>06:02 PM</td>
                      <td>06:02 AM</td>
                      <td>
                        <span class="text-white badge bg-danger">LL</span>
                      </td>
                      <td>Khandaker Shahed</td>
                    </tr>
                    <tr>
                      <td>08 Aug 2024</td>
                      <td>06:02 PM</td>
                      <td>06:02 AM</td>
                      <td>
                        <span class="text-white badge bg-success">In Time</span>
                      </td>
                      <td>Khandaker Shahed</td>
                    </tr>
                    <tr>
                      <td>08 Aug 2024</td>
                      <td>06:02 PM</td>
                      <td>06:02 AM</td>
                      <td>
                        <span class="text-white badge bg-dark">Not Attend</span>
                      </td>
                      <td>Khandaker Shahed</td>
                    </tr>
                    <tr>
                      <td>08 Aug 2024</td>
                      <td>06:02 PM</td>
                      <td>06:02 AM</td>
                      <td>
                        <span class="text-white badge bg-dark">Not Attend</span>
                      </td>
                      <td>Khandaker Shahed</td>
                    </tr>
                    <tr>
                      <td>08 Aug 2024</td>
                      <td>06:02 PM</td>
                      <td>06:02 AM</td>
                      <td>
                        <span class="text-white badge bg-dark">Not Attend</span>
                      </td>
                      <td>Khandaker Shahed</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-7">
      <div class="shadow-sm card">
        <div
          class="border-0 card-header align-items-center bg-light">
          <h1 class="card-title">Leave Application History</h1>
          <div>
            <ul class="nav nav-tabs nav-line-tabs fs-6">
              <li class="nav-item">
                <a
                  class="nav-link active"
                  data-bs-toggle="tab"
                  href="#sickLeave">Sick</a>
              </li>
              <li class="nav-item">
                <a
                  class="nav-link"
                  data-bs-toggle="tab"
                  href="#earnedLeave">Earned</a>
              </li>
              <li class="nav-item">
                <a
                  class="nav-link"
                  data-bs-toggle="tab"
                  href="#casualLeave">Casual</a>
              </li>
              <li class="nav-item">
                <a
                  class="nav-link"
                  data-bs-toggle="tab"
                  href="#pendingLeave">Pending</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="p-0 card-body">
          <div class="tab-content" id="myTabContent">
            <div
              class="tab-pane fade show active"
              id="sickLeave"
              role="tabpanel">
              <div class="card">
                <div
                  class="p-0 card-body hover-scroll-overlay-y"
                  style="height: 450px">
                  <table
                    class="table border data_table table-striped table-row-bordered gy-5 gs-7 rounded-3">
                    <thead>
                      <tr class="text-gray-800 fw-bold fs-6 px-7">
                        <th width="">Type</th>
                        <th width="">Off Day</th>
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
                        <td>Sick</td>
                        <td>
                          <span class="text-info">5 AUG 24</span>
                          To
                          <span class="text-info">5 AUG 24</span>
                        </td>
                        <td>
                          <span class="text-white badge bg-info">Parmanent</span>
                        </td>
                        <td>
                          <span class="badge bg-primary">Approved</span>
                        </td>
                        <td>Khandaker Shahed</td>
                        <td class="text-center">
                          <a
                            href="javascript:void(0)"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#showLeaveApplication">
                            <i
                              class="text-white fa-solid fa-eye fs-6"
                              title="Show Application"></i>
                          </a>
                          <a
                            href="javascript:void(0);"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary printBtn">
                            <i
                              class="text-white fa-solid fa-print fs-6"
                              title="Print Application"></i>
                          </a>
                          <a
                            href="#"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary">
                            <i
                              class="text-white fa-solid fa-pen fs-6"
                              title="Edit Application"></i>
                          </a>
                         
                        </td>
                      </tr>
                      <tr>
                        <td>Earned</td>
                        <td>
                          <span class="text-info">5 AUG 24</span>
                          To
                          <span class="text-info">5 AUG 24</span>
                        </td>
                        <td>
                          <span class="text-white badge bg-info">Parmanent</span>
                        </td>
                        <td>
                          <span class="badge bg-primary">Approved</span>
                        </td>
                        <td>Khandaker Shahed</td>
                        <td class="text-center">
                          <a
                            href="javascript:void(0)"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#showLeaveApplication">
                            <i
                              class="text-white fa-solid fa-eye fs-6"
                              title="Show Application"></i>
                          </a>
                          <a
                            href="javascript:void(0);"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary printBtn">
                            <i
                              class="text-white fa-solid fa-print fs-6"
                              title="Print Application"></i>
                          </a>
                          <a
                            href="#"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary">
                            <i
                              class="text-white fa-solid fa-pen fs-6"
                              title="Edit Application"></i>
                          </a>
                         
                        </td>
                      </tr>
                      <tr>
                        <td>Casual</td>
                        <td>
                          <span class="text-info">5 AUG 24</span>
                          To
                          <span class="text-info">5 AUG 24</span>
                        </td>
                        <td>
                          <span class="text-white badge bg-info">Parmanent</span>
                        </td>
                        <td>
                          <span class="badge bg-primary">Approved</span>
                        </td>
                        <td>Khandaker Shahed</td>
                        <td class="text-center">
                          <a
                            href="javascript:void(0)"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#showLeaveApplication">
                            <i
                              class="text-white fa-solid fa-eye fs-6"
                              title="Show Application"></i>
                          </a>
                          <a
                            href="javascript:void(0);"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary printBtn">
                            <i
                              class="text-white fa-solid fa-print fs-6"
                              title="Print Application"></i>
                          </a>
                          <a
                            href="#"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary">
                            <i
                              class="text-white fa-solid fa-pen fs-6"
                              title="Edit Application"></i>
                          </a>
                         
                        </td>
                      </tr>
                      <tr>
                        <td>Sick</td>
                        <td>
                          <span class="text-info">5 AUG 24</span>
                          To
                          <span class="text-info">5 AUG 24</span>
                        </td>
                        <td>
                          <span class="text-white badge bg-info">Parmanent</span>
                        </td>
                        <td>
                          <span class="badge bg-primary">Approved</span>
                        </td>
                        <td>Khandaker Shahed</td>
                        <td class="text-center">
                          <a
                            href="javascript:void(0)"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#showLeaveApplication">
                            <i
                              class="text-white fa-solid fa-eye fs-6"
                              title="Show Application"></i>
                          </a>
                          <a
                            href="javascript:void(0);"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary printBtn">
                            <i
                              class="text-white fa-solid fa-print fs-6"
                              title="Print Application"></i>
                          </a>
                          <a
                            href="#"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary">
                            <i
                              class="text-white fa-solid fa-pen fs-6"
                              title="Edit Application"></i>
                          </a>
                         
                        </td>
                      </tr>
                      <tr>
                        <td>Sick</td>
                        <td>
                          <span class="text-info">5 AUG 24</span>
                          To
                          <span class="text-info">5 AUG 24</span>
                        </td>
                        <td>
                          <span class="text-white badge bg-info">Parmanent</span>
                        </td>
                        <td>
                          <span class="badge bg-primary">Approved</span>
                        </td>
                        <td>Khandaker Shahed</td>
                        <td class="text-center">
                          <a
                            href="javascript:void(0)"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#showLeaveApplication">
                            <i
                              class="text-white fa-solid fa-eye fs-6"
                              title="Show Application"></i>
                          </a>
                          <a
                            href="javascript:void(0);"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary printBtn">
                            <i
                              class="text-white fa-solid fa-print fs-6"
                              title="Print Application"></i>
                          </a>
                          <a
                            href="#"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary">
                            <i
                              class="text-white fa-solid fa-pen fs-6"
                              title="Edit Application"></i>
                          </a>
                         
                        </td>
                      </tr>
                      <tr>
                        <td>Sick</td>
                        <td>
                          <span class="text-info">5 AUG 24</span>
                          To
                          <span class="text-info">5 AUG 24</span>
                        </td>
                        <td>
                          <span class="text-white badge bg-info">Parmanent</span>
                        </td>
                        <td>
                          <span class="badge bg-primary">Approved</span>
                        </td>
                        <td>Khandaker Shahed</td>
                        <td class="text-center">
                          <a
                            href="javascript:void(0)"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#showLeaveApplication">
                            <i
                              class="text-white fa-solid fa-eye fs-6"
                              title="Show Application"></i>
                          </a>
                          <a
                            href="javascript:void(0);"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary printBtn">
                            <i
                              class="text-white fa-solid fa-print fs-6"
                              title="Print Application"></i>
                          </a>
                          <a
                            href="#"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary">
                            <i
                              class="text-white fa-solid fa-pen fs-6"
                              title="Edit Application"></i>
                          </a>
                         
                        </td>
                      </tr>
                      <tr>
                        <td>Sick</td>
                        <td>
                          <span class="text-info">5 AUG 24</span>
                          To
                          <span class="text-info">5 AUG 24</span>
                        </td>
                        <td>
                          <span class="text-white badge bg-info">Parmanent</span>
                        </td>
                        <td>
                          <span class="badge bg-primary">Approved</span>
                        </td>
                        <td>Khandaker Shahed</td>
                        <td class="text-center">
                          <a
                            href="javascript:void(0)"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#showLeaveApplication">
                            <i
                              class="text-white fa-solid fa-eye fs-6"
                              title="Show Application"></i>
                          </a>
                          <a
                            href="javascript:void(0);"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary printBtn">
                            <i
                              class="text-white fa-solid fa-print fs-6"
                              title="Print Application"></i>
                          </a>
                          <a
                            href="#"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary">
                            <i
                              class="text-white fa-solid fa-pen fs-6"
                              title="Edit Application"></i>
                          </a>
                         
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div
              class="tab-pane fade"
              id="earnedLeave"
              role="tabpanel">
              <div class="card">
                <div
                  class="p-0 card-body hover-scroll-overlay-y"
                  style="height: 450px">
                  <table
                    class="table border data_table table-striped table-row-bordered gy-5 gs-7 rounded-3">
                    <thead>
                      <tr class="text-gray-800 fw-bold fs-6 px-7">
                        <th width="">Type</th>
                        <th width="">Off Day</th>
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
                        <td>Sick</td>
                        <td>
                          <span class="text-info">5 AUG 24</span>
                          To
                          <span class="text-info">5 AUG 24</span>
                        </td>
                        <td>
                          <span class="text-white badge bg-info">Parmanent</span>
                        </td>
                        <td>
                          <span class="badge bg-primary">Approved</span>
                        </td>
                        <td>Khandaker Shahed</td>
                        <td class="text-center">
                          <a
                            href="javascript:void(0)"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#showLeaveApplication">
                            <i
                              class="text-white fa-solid fa-eye fs-6"
                              title="Show Application"></i>
                          </a>
                          <a
                            href="javascript:void(0);"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary printBtn">
                            <i
                              class="text-white fa-solid fa-print fs-6"
                              title="Print Application"></i>
                          </a>
                          <a
                            href="#"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary">
                            <i
                              class="text-white fa-solid fa-pen fs-6"
                              title="Edit Application"></i>
                          </a>
                         
                        </td>
                      </tr>
                      <tr>
                        <td>Earned</td>
                        <td>
                          <span class="text-info">5 AUG 24</span>
                          To
                          <span class="text-info">5 AUG 24</span>
                        </td>
                        <td>
                          <span class="text-white badge bg-info">Parmanent</span>
                        </td>
                        <td>
                          <span class="badge bg-primary">Approved</span>
                        </td>
                        <td>Khandaker Shahed</td>
                        <td class="text-center">
                          <a
                            href="javascript:void(0)"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#showLeaveApplication">
                            <i
                              class="text-white fa-solid fa-eye fs-6"
                              title="Show Application"></i>
                          </a>
                          <a
                            href="javascript:void(0);"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary printBtn">
                            <i
                              class="text-white fa-solid fa-print fs-6"
                              title="Print Application"></i>
                          </a>
                          <a
                            href="#"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary">
                            <i
                              class="text-white fa-solid fa-pen fs-6"
                              title="Edit Application"></i>
                          </a>
                         
                        </td>
                      </tr>
                      <tr>
                        <td>Casual</td>
                        <td>
                          <span class="text-info">5 AUG 24</span>
                          To
                          <span class="text-info">5 AUG 24</span>
                        </td>
                        <td>
                          <span class="text-white badge bg-info">Parmanent</span>
                        </td>
                        <td>
                          <span class="badge bg-primary">Approved</span>
                        </td>
                        <td>Khandaker Shahed</td>
                        <td class="text-center">
                          <a
                            href="javascript:void(0)"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#showLeaveApplication">
                            <i
                              class="text-white fa-solid fa-eye fs-6"
                              title="Show Application"></i>
                          </a>
                          <a
                            href="javascript:void(0);"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary printBtn">
                            <i
                              class="text-white fa-solid fa-print fs-6"
                              title="Print Application"></i>
                          </a>
                          <a
                            href="#"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary">
                            <i
                              class="text-white fa-solid fa-pen fs-6"
                              title="Edit Application"></i>
                          </a>
                         
                        </td>
                      </tr>
                      <tr>
                        <td>Sick</td>
                        <td>
                          <span class="text-info">5 AUG 24</span>
                          To
                          <span class="text-info">5 AUG 24</span>
                        </td>
                        <td>
                          <span class="text-white badge bg-info">Parmanent</span>
                        </td>
                        <td>
                          <span class="badge bg-primary">Approved</span>
                        </td>
                        <td>Khandaker Shahed</td>
                        <td class="text-center">
                          <a
                            href="javascript:void(0)"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#showLeaveApplication">
                            <i
                              class="text-white fa-solid fa-eye fs-6"
                              title="Show Application"></i>
                          </a>
                          <a
                            href="javascript:void(0);"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary printBtn">
                            <i
                              class="text-white fa-solid fa-print fs-6"
                              title="Print Application"></i>
                          </a>
                          <a
                            href="#"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary">
                            <i
                              class="text-white fa-solid fa-pen fs-6"
                              title="Edit Application"></i>
                          </a>
                         
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div
              class="tab-pane fade"
              id="casualLeave"
              role="tabpanel">
              <div class="card">
                <div
                  class="p-0 card-body hover-scroll-overlay-y"
                  style="height: 450px">
                  <table
                    class="table border data_table table-striped table-row-bordered gy-5 gs-7 rounded-3">
                    <thead>
                      <tr class="text-gray-800 fw-bold fs-6 px-7">
                        <th width="">Type</th>
                        <th width="">Off Day</th>
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
                        <td>Sick</td>
                        <td>
                          <span class="text-info">5 AUG 24</span>
                          To
                          <span class="text-info">5 AUG 24</span>
                        </td>
                        <td>
                          <span class="text-white badge bg-info">Parmanent</span>
                        </td>
                        <td>
                          <span class="badge bg-primary">Approved</span>
                        </td>
                        <td>Khandaker Shahed</td>
                        <td class="text-center">
                          <a
                            href="javascript:void(0)"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#showLeaveApplication">
                            <i
                              class="text-white fa-solid fa-eye fs-6"
                              title="Show Application"></i>
                          </a>
                          <a
                            href="javascript:void(0);"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary printBtn">
                            <i
                              class="text-white fa-solid fa-print fs-6"
                              title="Print Application"></i>
                          </a>
                          <a
                            href="#"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary">
                            <i
                              class="text-white fa-solid fa-pen fs-6"
                              title="Edit Application"></i>
                          </a>
                         
                        </td>
                      </tr>
                      <tr>
                        <td>Earned</td>
                        <td>
                          <span class="text-info">5 AUG 24</span>
                          To
                          <span class="text-info">5 AUG 24</span>
                        </td>
                        <td>
                          <span class="text-white badge bg-info">Parmanent</span>
                        </td>
                        <td>
                          <span class="badge bg-primary">Approved</span>
                        </td>
                        <td>Khandaker Shahed</td>
                        <td class="text-center">
                          <a
                            href="javascript:void(0)"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#showLeaveApplication">
                            <i
                              class="text-white fa-solid fa-eye fs-6"
                              title="Show Application"></i>
                          </a>
                          <a
                            href="javascript:void(0);"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary printBtn">
                            <i
                              class="text-white fa-solid fa-print fs-6"
                              title="Print Application"></i>
                          </a>
                          <a
                            href="#"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary">
                            <i
                              class="text-white fa-solid fa-pen fs-6"
                              title="Edit Application"></i>
                          </a>
                         
                        </td>
                      </tr>
                      <tr>
                        <td>Casual</td>
                        <td>
                          <span class="text-info">5 AUG 24</span>
                          To
                          <span class="text-info">5 AUG 24</span>
                        </td>
                        <td>
                          <span class="text-white badge bg-info">Parmanent</span>
                        </td>
                        <td>
                          <span class="badge bg-primary">Approved</span>
                        </td>
                        <td>Khandaker Shahed</td>
                        <td class="text-center">
                          <a
                            href="javascript:void(0)"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#showLeaveApplication">
                            <i
                              class="text-white fa-solid fa-eye fs-6"
                              title="Show Application"></i>
                          </a>
                          <a
                            href="javascript:void(0);"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary printBtn">
                            <i
                              class="text-white fa-solid fa-print fs-6"
                              title="Print Application"></i>
                          </a>
                          <a
                            href="#"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary">
                            <i
                              class="text-white fa-solid fa-pen fs-6"
                              title="Edit Application"></i>
                          </a>
                         
                        </td>
                      </tr>
                      <tr>
                        <td>Sick</td>
                        <td>
                          <span class="text-info">5 AUG 24</span>
                          To
                          <span class="text-info">5 AUG 24</span>
                        </td>
                        <td>
                          <span class="text-white badge bg-info">Parmanent</span>
                        </td>
                        <td>
                          <span class="badge bg-primary">Approved</span>
                        </td>
                        <td>Khandaker Shahed</td>
                        <td class="text-center">
                          <a
                            href="javascript:void(0)"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#showLeaveApplication">
                            <i
                              class="text-white fa-solid fa-eye fs-6"
                              title="Show Application"></i>
                          </a>
                          <a
                            href="javascript:void(0);"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary printBtn">
                            <i
                              class="text-white fa-solid fa-print fs-6"
                              title="Print Application"></i>
                          </a>
                          <a
                            href="#"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary">
                            <i
                              class="text-white fa-solid fa-pen fs-6"
                              title="Edit Application"></i>
                          </a>
                         
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div
              class="tab-pane fade"
              id="pendingLeave"
              role="tabpanel">
              <div class="card">
                <div
                  class="p-0 card-body hover-scroll-overlay-y"
                  style="height: 450px">
                  <table
                    class="table border data_table table-striped table-row-bordered gy-5 gs-7 rounded-3">
                    <thead>
                      <tr class="text-gray-800 fw-bold fs-6 px-7">
                        <th width="">Type</th>
                        <th width="">Off Day</th>
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
                        <td>Sick</td>
                        <td>
                          <span class="text-info">5 AUG 24</span>
                          To
                          <span class="text-info">5 AUG 24</span>
                        </td>
                        <td>
                          <span class="text-white badge bg-info">Parmanent</span>
                        </td>
                        <td>
                          <span class="badge bg-primary">Approved</span>
                        </td>
                        <td>Khandaker Shahed</td>
                        <td class="text-center">
                          <a
                            href="javascript:void(0)"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#showLeaveApplication">
                            <i
                              class="text-white fa-solid fa-eye fs-6"
                              title="Show Application"></i>
                          </a>
                          <a
                            href="javascript:void(0);"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary printBtn">
                            <i
                              class="text-white fa-solid fa-print fs-6"
                              title="Print Application"></i>
                          </a>
                          <a
                            href="#"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary">
                            <i
                              class="text-white fa-solid fa-pen fs-6"
                              title="Edit Application"></i>
                          </a>
                         
                        </td>
                      </tr>
                      <tr>
                        <td>Earned</td>
                        <td>
                          <span class="text-info">5 AUG 24</span>
                          To
                          <span class="text-info">5 AUG 24</span>
                        </td>
                        <td>
                          <span class="text-white badge bg-info">Parmanent</span>
                        </td>
                        <td>
                          <span class="badge bg-primary">Approved</span>
                        </td>
                        <td>Khandaker Shahed</td>
                        <td class="text-center">
                          <a
                            href="javascript:void(0)"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#showLeaveApplication">
                            <i
                              class="text-white fa-solid fa-eye fs-6"
                              title="Show Application"></i>
                          </a>
                          <a
                            href="javascript:void(0);"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary printBtn">
                            <i
                              class="text-white fa-solid fa-print fs-6"
                              title="Print Application"></i>
                          </a>
                          <a
                            href="#"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary">
                            <i
                              class="text-white fa-solid fa-pen fs-6"
                              title="Edit Application"></i>
                          </a>
                         
                        </td>
                      </tr>
                      <tr>
                        <td>Casual</td>
                        <td>
                          <span class="text-info">5 AUG 24</span>
                          To
                          <span class="text-info">5 AUG 24</span>
                        </td>
                        <td>
                          <span class="text-white badge bg-info">Parmanent</span>
                        </td>
                        <td>
                          <span class="badge bg-primary">Approved</span>
                        </td>
                        <td>Khandaker Shahed</td>
                        <td class="text-center">
                          <a
                            href="javascript:void(0)"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#showLeaveApplication">
                            <i
                              class="text-white fa-solid fa-eye fs-6"
                              title="Show Application"></i>
                          </a>
                          <a
                            href="javascript:void(0);"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary printBtn">
                            <i
                              class="text-white fa-solid fa-print fs-6"
                              title="Print Application"></i>
                          </a>
                          <a
                            href="#"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary">
                            <i
                              class="text-white fa-solid fa-pen fs-6"
                              title="Edit Application"></i>
                          </a>
                         
                        </td>
                      </tr>
                      <tr>
                        <td>Sick</td>
                        <td>
                          <span class="text-info">5 AUG 24</span>
                          To
                          <span class="text-info">5 AUG 24</span>
                        </td>
                        <td>
                          <span class="text-white badge bg-info">Parmanent</span>
                        </td>
                        <td>
                          <span class="badge bg-primary">Approved</span>
                        </td>
                        <td>Khandaker Shahed</td>
                        <td class="text-center">
                          <a
                            href="javascript:void(0)"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#showLeaveApplication">
                            <i
                              class="text-white fa-solid fa-eye fs-6"
                              title="Show Application"></i>
                          </a>
                          <a
                            href="javascript:void(0);"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary printBtn">
                            <i
                              class="text-white fa-solid fa-print fs-6"
                              title="Print Application"></i>
                          </a>
                          <a
                            href="#"
                            class="btn btn-sm btn-icon btn-primary btn-active-color-primary">
                            <i
                              class="text-white fa-solid fa-pen fs-6"
                              title="Edit Application"></i>
                          </a>
                         
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
  <!-- Main Content End -->

   <div
      class="modal fade"
      id="showLeaveApplication"
      tabindex="-1"
      aria-hidden="true"
    >
      <div class="modal-dialog-centered modal-dialog modal-lg">
        <div class="modal-content">
          <div class="py-3 border-0 modal-header bg-primary rounded-0">
            <h3 class="text-white modal-title">Leave Application</h3>
            <div
              class="btn btn-sm btn-icon btn-active-color-primary btn-white"
              data-bs-dismiss="modal"
            >
              <span class="svg-icon svg-icon-1">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                >
                  <rect
                    opacity="0.5"
                    x="6"
                    y="17.3137"
                    width="16"
                    height="2"
                    rx="1"
                    transform="rotate(-45 6 17.3137)"
                    fill="currentColor"
                  />
                  <rect
                    x="7.41422"
                    y="6"
                    width="16"
                    height="2"
                    rx="1"
                    transform="rotate(45 7.41422 6)"
                    fill="currentColor"
                  />
                </svg>
              </span>
            </div>
          </div>
          <div class="p-20 pt-0 modal-body scroll-y px-15">
            <div class="printContent">
              <div class="mt-5 row">
                <div class="col-md-12">
                  <div
                    class="logo-container"
                    style="position: relative; right: 40px"
                  >
                    <img
                      alt="Logo"
                      src="https://i.ibb.co/yddR5JX/minimal-letters-professional-ngen-logo-260nw-2016934238-removebg-preview.png"
                      class="company-logo"
                      style="width: 200px; height: 80px"
                    />
                  </div>
                  <div>
                    <p class="py-5 my-5">Date: August 20, 2024</p>
                    <p class="mb-0 fw-bold">Managing Director</p>
                    <p class="mb-0 fw-bold">NGent It</p>
                    <p class="mb-0 fw-bold">Ring Road, Dhaka-1207</p>
                    <p class="mb-0 fw-bold">Phone: +8801714243446</p>
                  </div>
                  <div class="py-5">
                    <p class="mb-0 fw-bold">
                      Substitute: Khandaker Shahed (Team Leader)
                    </p>
                  </div>
                  <div class="pt-5 my-5">
                    <h5>
                      Subject:
                      <span>Leave Request For Sick/Earn/Casual</span>
                    </h5>
                  </div>

                  <div class="letter-content" style="text-align: justify">
                    <p class="pt-5">Dear <span class="fw-bold">Sir</span>,</p>
                    <p>
                      I am writing to inform you that I need to take leave from
                      work for 3 days. The leave will start on
                      <span class="fw-bold">August 21, 2024</span>, and I will
                      resume work on
                      <span class="fw-bold">August 24, 2024</span>. Applying for
                      <span class="fw-bold">Sick Leave</span>.
                    </p>

                    <p>
                      The reason for my leave is a scheduled medical
                      appointment. I have ensured that my current tasks are
                      either completed or handed over to a colleague, and I will
                      be available via email should any urgent matters arise.
                    </p>

                    <p>
                      I appreciate your understanding and approval of this leave
                      request.
                    </p>
                  </div>

                  <div class="pt-5 signature-section">
                    <p class="fw-bold">Thank you.</p>
                    <p class="mb-0 fw-bold">Sincerely,</p>
                    <p class="mb-0">Sazeduzzaman Saju</p>
                    <p class="mb-0">Frontend Developer</p>
                    <p class="mb-0">NGEN IT Ltd.</p>
                  </div>
                  <div class="pt-5 mt-5">
                    <!-- Substitute Signature -->
                    <div class="row">
                      <div class="col-lg-4">
                        <p class="mb-0 text-gray">Substitute Signature</p>
                        <div class="divider"></div>
                        <div>
                          <p class="fw-bold">Khandaker Shahed</p>
                          <img
                            class="img-fluid"
                            width="100px"
                            src="https://i.ibb.co/ng6R5L1/george-walker-bush-signature.png"
                            alt=""
                          />
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <p class="mb-0 text-gray">Supervisor Signature</p>
                        <div class="divider"></div>
                        <div>
                          <p class="fw-bold">Khandaker Shahed</p>
                          <img
                            class="img-fluid"
                            width="100px"
                            src="https://i.ibb.co/ng6R5L1/george-walker-bush-signature.png"
                            alt=""
                          />
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <p class="mb-0 text-gray">HR & Admin Signature</p>
                        <div class="divider"></div>
                        <div>
                          <p class="fw-bold">Minhaj Hossain</p>
                          <img
                            class="img-fluid"
                            width="100px"
                            src="https://i.ibb.co/ng6R5L1/george-walker-bush-signature.png"
                            alt=""
                          />
                        </div>
                      </div>
                    </div>
                    <!-- Substitute Signature -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div
            class="px-10 py-5 d-flex justify-content-between align-items-center"
            style="border-top: 1px solid #eee"
          >
            <div class="d-flex align-items-center">
              <label class="status-switch">
                <input
                  type="checkbox"
                  id="statusSwitch"
                  class="form-control-sm form-control"
                />
                <span class="status-switch-slider"></span>
              </label>
              <p id="statusText" class="mb-0 text-danger ps-5">Not Approved</p>
            </div>
            <div>
              <button class="btn btn-primary" data-bs-dismiss="modal">
                Close
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  @push('scripts')

  @endpush
</x-admin-app-layout>
<!-- RFQ Dashboard End -->