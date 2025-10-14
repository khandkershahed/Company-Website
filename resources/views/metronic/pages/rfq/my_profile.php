<x-admin-app-layout :title="'RFQ Dashboard'">
  <div class="px-0 container-fluid">
    <!-- Profile Header End -->
    <!-- Profile Details Start -->
    <div class="mb-5 shadow-sm card mb-xl-10">
      <div class="pb-0 card-body pt-9">
        <div class="flex-wrap d-flex flex-sm-nowrap">
          <div class="mb-4 me-7">
            <div class="symbol symbol-200px symbol-fixed position-relative">
              <img src="https://ngenitback.netlify.app/hr-admin/assets/media/avatars/300-1.jpg" alt="image">
              <div class="bottom-0 mb-6 border-4 position-absolute translate-middle start-100 bg-success rounded-circle border-body h-20px w-20px"></div>
            </div>
          </div>

          <div class="flex-grow-1">
            <div class="flex-wrap mb-2 d-flex justify-content-between align-items-start">
              <div class="d-flex flex-column">
                <div class="mb-2 d-flex align-items-center">
                  <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">Sazeduzzaman Saju</a>
                  <a href="#"><i class="ki-duotone ki-verify fs-1 text-primary"><span class="path1"></span><span class="path2"></span></i></a>
                </div>

                <div class="mb-4 fw-semibold fs-6 pe-2">
                  <a href="#" class="mb-2 text-gray-500 d-flex align-items-center text-hover-primary me-5">
                    <i class="fas fa-user fs-4 me-1" aria-hidden="true"></i>
                    Frontend Developer
                  </a>
                  <div>
                    <a href="#" class="mb-2 text-gray-500 d-flex align-items-center text-hover-primary me-5">
                      <i class="fas fa-location-dot fs-4 me-1" aria-hidden="true"></i>
                      Khilkhet, Dhaka, Bangladesh
                    </a>
                  </div>
                  <div>
                    <a href="mailto:szamansaju@gmail.com" class="mb-2 text-gray-500 d-flex align-items-center text-hover-primary">
                      <i class="fas fa-envelope fs-4 pe-2" aria-hidden="true"></i>
                      szamansaju@gmail.com
                    </a>
                  </div>
                  <div class="px-4 py-3 mt-5 mb-3 border border-gray-300 border-dashed rounded min-w-125px me-6">
                    <div class="d-flex align-items-center">
                      <i class="ki-duotone ki-arrow-up fs-3 text-success me-2"><span class="path1"></span><span class="path2"></span></i>
                      <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="4500" data-kt-countup-prefix="$" data-kt-initialized="1">
                        $4,500
                      </div>
                    </div>

                    <div class="text-gray-500 fw-semibold fs-6">
                      Earnings
                    </div>
                  </div>
                </div>
              </div>

              <div class="d-flex w-75">
                <div class="border-transparent card w-100" data-bs-theme="light" style="background-color: #1C325E;">
                  <!--begin::Body-->
                  <div class="card-body d-flex ps-xl-15">
                    <!--begin::Wrapper-->
                    <div class="m-0">
                      <!--begin::Title-->
                      <div class="text-white position-relative fs-2x z-index-2 fw-bold mb-7">
                        <span class="me-2">
                          You have got
                          <span class="position-relative d-inline-block text-danger">
                            <a href="https://preview.keenthemes.com/metronic8/demo1/pages/user-profile/overview.html" class="text-danger opacity-75-hover">2300 bonus</a>

                            <!--begin::Separator-->
                            <span class="bottom-0 border-4 opacity-50 position-absolute start-0 border-danger border-bottom w-100"></span>
                            <!--end::Separator-->
                          </span>
                        </span>
                        points.<br>
                        Feel free to use them in your lessons
                      </div>
                      <!--end::Title-->

                      <!--begin::Action-->
                      <div class="mb-3">
                        <a href="#" class="btn btn-danger fw-semibold me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">
                          Get Reward
                        </a>

                        <a href="https://preview.keenthemes.com/metronic8/demo1/apps/support-center/overview.html" class="bg-white btn btn-color-white bg-opacity-15 bg-hover-opacity-25 fw-semibold">
                          How to
                        </a>
                      </div>
                      <!--begin::Action-->
                    </div>
                    <!--begin::Wrapper-->

                    <!--begin::Illustration-->
                    <img src="https://preview.keenthemes.com/metronic8/demo1/assets/media/illustrations/sigma-1/17-dark.png" class="bottom-0 position-absolute me-3 end-0 h-200px" alt="">
                    <!--end::Illustration-->
                  </div>
                  <!--end::Body-->
                </div>
              </div>
            </div>
          </div>
        </div>

        <ul class="border-transparent nav nav-stretch nav-line-tabs nav-line-tabs-2x fs-5 fw-bold">
          <li class="mt-2 nav-item">
            <a class="py-5 nav-link text-active-primary ms-0 me-10 active" href="/hr-admin/single-profile">
              Overview
            </a>
          </li>

          <li class="mt-2 nav-item">
            <a class="py-5 nav-link text-active-primary ms-0 me-10" href="all-documents.html">
              Documents
            </a>
          </li>

          <li class="mt-2 nav-item">
            <a class="py-5 nav-link text-active-primary ms-0 me-10" href="javascript:void(0)">
              Security
            </a>
          </li>
          <li class="mt-2 nav-item">
            <a class="py-5 nav-link text-active-primary ms-0 me-10" href="/hr-admin/single-attendance">
              Attendace
            </a>
          </li>
          <li class="mt-2 nav-item">
            <a class="py-5 nav-link text-active-primary ms-0 me-10" href="/hr-admin/single-leave">
              Leaves
            </a>
          </li>
        </ul>
      </div>
    </div>
    <!-- Profile Details End -->
    <!-- Profile Content End -->
    <div class="mb-5 shadow-sm card mb-xl-10" id="kt_profile_details_view">
      <div class="cursor-pointer card-header">
        <div class="m-0 card-title">
          <h3 class="m-0 fw-bold">Profile Details</h3>
        </div>

        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#profileedit" class="btn btn-sm btn-primary align-self-center">Edit Profile</a>
        <!-- Modal -->
        <div class="modal fade" id="profileedit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="profileeditLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="profileeditLabel">
                  Profile Details
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-5 card mb-xl-0">
                  <div id="kt_account_settings_profile_details" class="collapse show">
                    <form id="kt_account_profile_details_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                      <div class="card-body border-top p-9">
                        <div class="mb-6 row">
                          <label class="col-lg-4 col-form-label fw-semibold fs-6">Avatar</label>

                          <div class="col-lg-8">
                            <div class="image-input image-input-outline" data-kt-image-input="true" style="
                                              background-image: url('/metronic8/demo1/assets/media/svg/avatars/blank.svg');
                                            ">
                              <div class="image-input-wrapper w-125px h-125px" style="
                                                background-image: url(assets/media/avatars/300-1.jpg);
                                              "></div>

                              <label class="shadow btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar" data-bs-original-title="Change avatar" data-kt-initialized="1">
                                <i class="fa-solid fa-pencil fs-7" aria-hidden="true"></i>

                                <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
                                <input type="hidden" name="avatar_remove">
                              </label>

                              <span class="shadow btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar" data-bs-original-title="Cancel avatar" data-kt-initialized="1">
                                <i class="fa-solid fa--cross fs-2" aria-hidden="true"></i>
                              </span>

                              <span class="shadow btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body" data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove avatar" data-bs-original-title="Remove avatar" data-kt-initialized="1">
                                <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>
                              </span>
                            </div>

                            <div class="form-text">
                              Allowed file types: png, jpg, jpeg.
                            </div>
                          </div>
                        </div>

                        <div class="mb-6 row">
                          <label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>

                          <div class="col-lg-8">
                            <div class="row">
                              <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="text" name="fname" class="mb-3 form-control form-control-lg form-control-solid mb-lg-0" placeholder="First name" value="Max">
                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                              </div>

                              <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="text" name="lname" class="form-control form-control-lg form-control-solid" placeholder="Last name" value="Smith">
                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="mb-6 row">
                          <label class="col-lg-4 col-form-label required fw-semibold fs-6">Company</label>

                          <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Company name" value="Keenthemes">
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                          </div>
                        </div>

                        <div class="mb-6 row">
                          <label class="col-lg-4 col-form-label fw-semibold fs-6">
                            <span class="required">Contact Phone</span>

                            <span class="ms-1" data-bs-toggle="tooltip" aria-label="Phone number must be active" data-bs-original-title="Phone number must be active" data-kt-initialized="1">
                              <i class="text-gray-500 ki-duotone ki-information-5 fs-6"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></span>
                          </label>

                          <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <input type="tel" name="phone" class="form-control form-control-lg form-control-solid" placeholder="Phone number" value="044 3276 454 935">
                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                          </div>
                        </div>

                        <div class="mb-6 row">
                          <label class="col-lg-4 col-form-label fw-semibold fs-6">Company Site</label>

                          <div class="col-lg-8 fv-row">
                            <input type="text" name="website" class="form-control form-control-lg form-control-solid" placeholder="Company website" value="keenthemes.com">
                          </div>
                        </div>

                        <div class="mb-6 row">
                          <label class="col-lg-4 col-form-label required fw-semibold fs-6">Communication</label>

                          <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <div class="mt-3 d-flex align-items-center">
                              <label class="form-check form-check-custom form-check-inline form-check-solid me-5">
                                <input class="form-check-input" name="communication[]" type="checkbox" value="1">
                                <span class="fw-semibold ps-2 fs-6">
                                  Email
                                </span>
                              </label>

                              <label class="form-check form-check-custom form-check-inline form-check-solid">
                                <input class="form-check-input" name="communication[]" type="checkbox" value="2">
                                <span class="fw-semibold ps-2 fs-6">
                                  Phone
                                </span>
                              </label>
                            </div>

                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                          </div>
                        </div>

                        <div class="mb-0 row">
                          <label class="col-lg-4 col-form-label fw-semibold fs-6">Allow Marketing</label>

                          <div class="col-lg-8 d-flex align-items-center">
                            <div class="form-check form-check-solid form-switch form-check-custom fv-row">
                              <input class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing" checked="">
                              <label class="form-check-label" for="allowmarketing"></label>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="py-6 pb-0 card-footer d-flex justify-content-end px-9">
                        <button type="reset" class="btn btn-light btn-active-light-primary me-2">
                          Discard
                        </button>
                        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">
                          Save Changes
                        </button>
                      </div>

                      <input type="hidden">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="card-body p-9">
        <div class="row mb-7">
          <!-- Column 1 -->
          <div class="mb-4 col-lg-2 col-md-4">
            <label class="fw-semibold text-muted d-block">Full Name</label>
            <span class="text-gray-800 fw-bold fs-6 d-block">Max Smith</span>

            <label class="mt-3 fw-semibold text-muted d-block">Company</label>
            <span class="text-gray-800 fw-semibold fs-6 d-block">Keenthemes</span>
          </div>

          <!-- Column 2 -->
          <div class="mb-4 col-lg-2 col-md-4">
            <label class="fw-semibold text-muted d-block">Contact Phone</label>
            <div class="d-flex align-items-center">
              <span class="text-gray-800 fw-bold fs-6 me-2">044 3276 454 935</span>
              <span class="badge badge-success">Verified</span>
            </div>

            <label class="mt-3 fw-semibold text-muted d-block">Company Site</label>
            <a href="#" class="text-gray-800 fw-semibold fs-6 text-hover-primary d-block">keenthemes.com</a>
          </div>

          <!-- Column 3 -->
          <div class="mb-4 col-lg-2 col-md-4">
            <label class="fw-semibold text-muted d-block">Country</label>
            <span class="text-gray-800 fw-bold fs-6 d-block">Germany</span>

            <label class="mt-3 fw-semibold text-muted d-block">Communication</label>
            <span class="text-gray-800 fw-bold fs-6 d-block">Email, Phone</span>
          </div>

          <!-- Column 4 -->
          <div class="mb-4 col-lg-2 col-md-4">
            <label class="fw-semibold text-muted d-block">Allow Changes</label>
            <span class="text-gray-800 fw-semibold fs-6 d-block">Yes</span>

            <label class="mt-3 fw-semibold text-muted d-block">Status</label>
            <span class="text-gray-800 fw-semibold fs-6 d-block">Active</span>
          </div>

          <!-- Column 5 -->
          <div class="mb-4 col-lg-2 col-md-4">
            <label class="fw-semibold text-muted d-block">Member Since</label>
            <span class="text-gray-800 fw-semibold fs-6 d-block">2023</span>

            <label class="mt-3 fw-semibold text-muted d-block">User Type</label>
            <span class="text-gray-800 fw-semibold fs-6 d-block">Admin</span>
          </div>
        </div>

      </div>
    </div>
    <!-- Profile Content End -->
    <!-- Profile Content End -->
    <div class="row gy-5 g-xl-10">
      <div class="col-xl-8 mb-xl-0">
        <div class="shadow-sm card card-flush h-lg-100">
          <div class="pt-5 card-header flex-nowrap">
            <h3 class="card-title align-items-start flex-column">
              <span class="text-gray-900 card-label fw-bold">Task Complete Categories</span>

              <span class="pt-2 text-gray-500 fw-semibold fs-6">14 Oct 2025</span>
            </h3>

            <div class="card-toolbar">
              <button class="btn btn-icon btn-color-gray-500 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                <i class="text-gray-500 ki-duotone ki-dots-square fs-1 me-n1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
              </button>

              <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                <div class="px-3 menu-item">
                  <div class="px-3 py-4 text-gray-900 menu-content fs-6 fw-bold">
                    Quick Actions
                  </div>
                </div>

                <div class="mb-3 opacity-75 separator"></div>

                <div class="px-3 menu-item">
                  <a href="#" class="px-3 menu-link">
                    New Ticket
                  </a>
                </div>

                <div class="px-3 menu-item">
                  <a href="#" class="px-3 menu-link">
                    New Customer
                  </a>
                </div>

                <div class="px-3 menu-item" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                  <a href="#" class="px-3 menu-link">
                    <span class="menu-title">New Group</span>
                    <span class="menu-arrow"></span>
                  </a>

                  <div class="py-4 menu-sub menu-sub-dropdown w-175px">
                    <div class="px-3 menu-item">
                      <a href="#" class="px-3 menu-link">
                        Admin Group
                      </a>
                    </div>

                    <div class="px-3 menu-item">
                      <a href="#" class="px-3 menu-link">
                        Staff Group
                      </a>
                    </div>

                    <div class="px-3 menu-item">
                      <a href="#" class="px-3 menu-link">
                        Member Group
                      </a>
                    </div>
                  </div>
                </div>

                <div class="px-3 menu-item">
                  <a href="#" class="px-3 menu-link">
                    New Contact
                  </a>
                </div>

                <div class="mt-3 opacity-75 separator"></div>

                <div class="px-3 menu-item">
                  <div class="px-3 py-3 menu-content">
                    <a class="px-4 btn btn-primary btn-sm" href="#">
                      Generate Reports
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="pt-5 card-body ps-6">
            <div id="kt_charts_widget_5" class="min-h-auto">
              <div id="apexchartsgzvw207r" class="apexcharts-canvas apexchartsgzvw207r apexcharts-theme-light" style="width: 937px; ">
                <div class="apexcharts-legend" style="max-height: 175px;"></div>
                <!-- <div class="apexcharts-tooltip apexcharts-theme-light" style="left: 754.111px; top: 0px;">
                  <div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">Phones</div>
                  <div class="apexcharts-tooltip-series-group apexcharts-active" style="order: 1; display: flex;"><span class="apexcharts-tooltip-marker" style="background-color: rgba(62, 151, 255, 0.85);"></span>
                    <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                      <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">series-1: </span><span class="apexcharts-tooltip-text-y-value">15</span></div>
                      <div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div>
                      <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                    </div>
                  </div>
                </div>
                <div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                  <div class="apexcharts-yaxistooltip-text"></div>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="mb-5 col-xl-4 mb-xl-0">
        <div class="shadow-sm card h-md-100" dir="ltr">
          <div class="card-body d-flex flex-column flex-center">
            <div class="mb-2">
              <h1 class="text-center text-gray-800 fw-semibold lh-lg">
                Have you tried <br>
                new
                <span class="fw-bolder">
                  Mobile Application ?</span>
              </h1>

              <div class="py-10 text-center">
                <img src="https://ngenitback.netlify.app/hr-admin/assets/media/svg/illustrations/easy/1.svg" class="theme-light-show w-200px" alt="">
              </div>
            </div>

            <div class="mb-1 text-center">
              <a class="btn btn-sm btn-primary me-2" data-bs-target="#kt_modal_create_app" data-bs-toggle="modal">
                Try now
              </a>

              <a class="btn btn-sm btn-light" href="/metronic8/demo1/apps/invoices/view/invoice-1.html">
                Learn more
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Profile Content End -->
  </div>
  @push('scripts')

  @endpush
</x-admin-app-layout>
<!-- RFQ Dashboard End -->