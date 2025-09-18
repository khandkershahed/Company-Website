<x-admin-app-layout :title="'Client Contact Information'">
    <div
        class="px-0 container-fluid">
        <div class="row">
            <div class="col-lg-2">
                <div class="shadow-sm card client-card card-rounded">
                    <div class="text-center card-body d-flex justify-content-between align-items-center">
                        <div class="">
                            <div class="p-5 py-6 bg-white rounded-circle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="24" viewBox="0 0 32 24" fill="none">
                                    <path d="M24.7273 14.875V10.5625H20.3636V7.6875H24.7273V3.375H27.6364V7.6875H32V10.5625H27.6364V14.875H24.7273ZM11.6364 12C10.0364 12 8.66667 11.437 7.52727 10.3109C6.38788 9.1849 5.81818 7.83125 5.81818 6.25C5.81818 4.66875 6.38788 3.3151 7.52727 2.18906C8.66667 1.06302 10.0364 0.5 11.6364 0.5C13.2364 0.5 14.6061 1.06302 15.7455 2.18906C16.8848 3.3151 17.4545 4.66875 17.4545 6.25C17.4545 7.83125 16.8848 9.1849 15.7455 10.3109C14.6061 11.437 13.2364 12 11.6364 12ZM0 23.5V19.475C0 18.6604 0.212121 17.9117 0.636364 17.2289C1.06061 16.5461 1.62424 16.025 2.32727 15.6656C3.8303 14.9229 5.35758 14.3659 6.90909 13.9945C8.46061 13.6232 10.0364 13.4375 11.6364 13.4375C13.2364 13.4375 14.8121 13.6232 16.3636 13.9945C17.9152 14.3659 19.4424 14.9229 20.9455 15.6656C21.6485 16.025 22.2121 16.5461 22.6364 17.2289C23.0606 17.9117 23.2727 18.6604 23.2727 19.475V23.5H0ZM2.90909 20.625H20.3636V19.475C20.3636 19.2115 20.297 18.9719 20.1636 18.7563C20.0303 18.5406 19.8545 18.3729 19.6364 18.2531C18.3273 17.6063 17.0061 17.1211 15.6727 16.7977C14.3394 16.4742 12.9939 16.3125 11.6364 16.3125C10.2788 16.3125 8.93333 16.4742 7.6 16.7977C6.26667 17.1211 4.94545 17.6063 3.63636 18.2531C3.41818 18.3729 3.24242 18.5406 3.10909 18.7563C2.97576 18.9719 2.90909 19.2115 2.90909 19.475V20.625ZM11.6364 9.125C12.4364 9.125 13.1212 8.84349 13.6909 8.28047C14.2606 7.71745 14.5455 7.04063 14.5455 6.25C14.5455 5.45937 14.2606 4.78255 13.6909 4.21953C13.1212 3.65651 12.4364 3.375 11.6364 3.375C10.8364 3.375 10.1515 3.65651 9.58182 4.21953C9.01212 4.78255 8.72727 5.45937 8.72727 6.25C8.72727 7.04063 9.01212 7.71745 9.58182 8.28047C10.1515 8.84349 10.8364 9.125 11.6364 9.125Z" fill="#296088" />
                                </svg>
                            </div>
                            <span class="px-4 py-2 mt-4 badge badge-light-success fs-base">
                                <i class="fa-solid fa-arrow-up fs-5 text-success ms-n1" aria-hidden="true"></i>
                                2.1%
                            </span>
                        </div>
                        <div class="d-flex flex-column my-7">
                            <span class="text-white fw-semibold fs-5x lh-1 ls-n2">53</span>
                            <div class="m-0">
                                <span class="text-white fw-semibold fs-6">
                                    Total Clients
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="shadow-sm card client-card card-rounded" data-bs-theme="light" style="background-color: #B1CDE2">
                    <div class="card-body d-flex ps-xl-15 justify-content-between align-items-center">
                        <div class="m-0">
                            <div class="py-5 text-black position-relative fs-2x z-index-2 fw-normal">
                                <p class="mb-0 me-2">
                                    You have got <span class="fw-bold">2300</span> new client.
                                </p>
                                <p class="mt-2 mb-0">Feel free to contact for your marketing.</p>
                            </div>
                        </div>

                        <div class="">
                            <img class="img-fluid" src="{{ asset('/images/client.svg') }}" class="bottom-0 position-absolute me-3 end-0 h-200px" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="mt-6 bg-transparent shadow-none card">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="p-5 px-0">
                            <p class="mb-0" style="font-size: 22px;">Client Contact Information</p>
                            <p class="pt-2 my-0 text-muted">Sectorwise # of Clients</p>
                        </div>
                        <div class="pe-5">
                            <a href="" class="py-3 text-white btn btn-sm bg-hover-opacity-25 fw-semibold" style="background-color: #296088;">
                                <i class="fa-solid fa-plus" aria-hidden="true"></i> Add Client
                            </a>
                        </div>
                    </div>
                    <div class="p-0 card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="table-responsive rounded-4">
                                    <table class="table mb-0 border table-bordered">
                                        <thead class="" style="background-color: #DFF2FF;">
                                            <tr class="fw-bold fs-5">
                                                <th class="ps-3">Sector</th>
                                                <th class="text-center">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody style="background-color: #fff;">
                                            <tr class="border-bottom">
                                                <td class="ps-3">Banks</td>
                                                <td class="text-center">0</td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td class="ps-3">Enterprises</td>
                                                <td class="text-center">33</td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td class="ps-3">Small &amp; Medium</td>
                                                <td class="text-center">33</td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td class="ps-3">Manufacturers</td>
                                                <td class="text-center">33</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="table-responsive rounded-4">
                                    <table class="table mb-0 border table-bordered">
                                        <thead class="" style="background-color: #DFF2FF;">
                                            <tr class="fw-bold fs-5">
                                                <th class="ps-3">Sector</th>
                                                <th class="text-center">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody style="background-color: #fff;">
                                            <tr class="border-bottom">
                                                <td class="ps-3">Banks</td>
                                                <td class="text-center">0</td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td class="ps-3">Enterprises</td>
                                                <td class="text-center">33</td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td class="ps-3">Small &amp; Medium</td>
                                                <td class="text-center">33</td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td class="ps-3">Manufacturers</td>
                                                <td class="text-center">33</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="table-responsive rounded-4">
                                    <table class="table mb-0 border table-bordered">
                                        <thead class="" style="background-color: #DFF2FF;">
                                            <tr class="fw-bold fs-5">
                                                <th class="ps-3">Sector</th>
                                                <th class="text-center">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody style="background-color: #fff;">
                                            <tr class="border-bottom">
                                                <td class="ps-3">Banks</td>
                                                <td class="text-center">0</td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td class="ps-3">Enterprises</td>
                                                <td class="text-center">33</td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td class="ps-3">Small &amp; Medium</td>
                                                <td class="text-center">33</td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td class="ps-3">Manufacturers</td>
                                                <td class="text-center">33</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="mt-10 shadow-none card card-rounded">
                    <div class="px-0 card-body">
                        <div class="table-responsive">
                            <table id="clientInfo" class="table border rounded table-row-bordered gy-5 gs-7 dataTable no-footer" aria-describedby="clientInfo_info">
                                <thead>
                                    <tr>
                                        <th class="fw-bold">Sl</th>
                                        <th class="fw-bold">Sub Sector</th>
                                        <th class="fw-bold">Company Name</th>
                                        <th class="fw-bold">Address</th>
                                        <th class="fw-bold">Area</th>
                                        <th class="fw-bold">Contact Person</th>
                                        <th class="fw-bold">Designation</th>
                                        <th class="fw-bold">Department</th>
                                        <th class="fw-bold">Official Phone</th>
                                        <th class="fw-bold">Personal Phone</th>
                                        <th class="fw-bold">Email</th>
                                        <th class="fw-bold">Status</th>
                                        <th class="fw-bold">Tier</th>
                                        <th class="fw-bold">Comments</th>
                                    </tr>

                                </thead>
                                <tbody style="background-color: #fff;">
                                    <tr class="odd">
                                        <td class="sorting_1">01</td>
                                        <td>EPG</td>
                                        <td>Heath Care</td>
                                        <td>Al-Noor Eye Hospital</td>
                                        <td>Dhanmondi</td>
                                        <td>Dhanmondi - Kolabagan</td>
                                        <td>Faruk Ahmmad</td>
                                        <td>Head of ICT</td>
                                        <td>Procurement</td>
                                        <td>1321145344</td>
                                        <td>mijanq@gmail.com</td>
                                        <td class="text-center">-</td>
                                        <td class="text-center">-</td>
                                        <td class="text-end pe-10">-</td>
                                    </tr>
                                    <tr class="even">
                                        <td class="sorting_1">01</td>
                                        <td>EPG</td>
                                        <td>Heath Care</td>
                                        <td>Al-Noor Eye Hospital</td>
                                        <td>Dhanmondi</td>
                                        <td>Dhanmondi - Kolabagan</td>
                                        <td>Faruk Ahmmad</td>
                                        <td>Head of ICT</td>
                                        <td>Procurement</td>
                                        <td>1321145344</td>
                                        <td>mijanq@gmail.com</td>
                                        <td class="text-center">-</td>
                                        <td class="text-center">-</td>
                                        <td class="text-end pe-10">-</td>
                                    </tr>
                                    <tr class="odd">
                                        <td class="sorting_1">01</td>
                                        <td>EPG</td>
                                        <td>Heath Care</td>
                                        <td>Al-Noor Eye Hospital</td>
                                        <td>Dhanmondi</td>
                                        <td>Dhanmondi - Kolabagan</td>
                                        <td>Faruk Ahmmad</td>
                                        <td>Head of ICT</td>
                                        <td>Procurement</td>
                                        <td>1321145344</td>
                                        <td>mijanq@gmail.com</td>
                                        <td class="text-center">-</td>
                                        <td class="text-center">-</td>
                                        <td class="text-end pe-10">-</td>
                                    </tr>
                                    <tr class="even">
                                        <td class="sorting_1">01</td>
                                        <td>EPG</td>
                                        <td>Heath Care</td>
                                        <td>Al-Noor Eye Hospital</td>
                                        <td>Dhanmondi</td>
                                        <td>Dhanmondi - Kolabagan</td>
                                        <td>Faruk Ahmmad</td>
                                        <td>Head of ICT</td>
                                        <td>Procurement</td>
                                        <td>1321145344</td>
                                        <td>mijanq@gmail.com</td>
                                        <td class="text-center">-</td>
                                        <td class="text-center">-</td>
                                        <td class="text-end pe-10">-</td>
                                    </tr>
                                    <tr class="odd">
                                        <td class="sorting_1">01</td>
                                        <td>EPG</td>
                                        <td>Heath Care</td>
                                        <td>Al-Noor Eye Hospital</td>
                                        <td>Dhanmondi</td>
                                        <td>Dhanmondi - Kolabagan</td>
                                        <td>Faruk Ahmmad</td>
                                        <td>Head of ICT</td>
                                        <td>Procurement</td>
                                        <td>1321145344</td>
                                        <td>mijanq@gmail.com</td>
                                        <td class="text-center">-</td>
                                        <td class="text-center">-</td>
                                        <td class="text-end pe-10">-</td>
                                    </tr>
                                    <tr class="even">
                                        <td class="sorting_1">01</td>
                                        <td>EPG</td>
                                        <td>Heath Care</td>
                                        <td>Al-Noor Eye Hospital</td>
                                        <td>Dhanmondi</td>
                                        <td>Dhanmondi - Kolabagan</td>
                                        <td>Faruk Ahmmad</td>
                                        <td>Head of ICT</td>
                                        <td>Procurement</td>
                                        <td>1321145344</td>
                                        <td>mijanq@gmail.com</td>
                                        <td class="text-center">-</td>
                                        <td class="text-center">-</td>
                                        <td class="text-end pe-10">-</td>
                                    </tr>
                                    <tr class="odd">
                                        <td class="sorting_1">01</td>
                                        <td>EPG</td>
                                        <td>Heath Care</td>
                                        <td>Al-Noor Eye Hospital</td>
                                        <td>Dhanmondi</td>
                                        <td>Dhanmondi - Kolabagan</td>
                                        <td>Faruk Ahmmad</td>
                                        <td>Head of ICT</td>
                                        <td>Procurement</td>
                                        <td>1321145344</td>
                                        <td>mijanq@gmail.com</td>
                                        <td class="text-center">-</td>
                                        <td class="text-center">-</td>
                                        <td class="text-end pe-10">-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')

    @endpush
</x-admin-app-layout>