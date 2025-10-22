<x-admin-app-layout :title="'Supply Chain Dashboard'">
    <div class="row gx-xl-5">
        <div class="mb-5 col-xl-12">
            <div class="row g-lg-5 g-xl-5">
                <!-- Middle Left Area -->
                <div class="col-md-3">
                    <div class="card h-100" style="background-image: linear-gradient(to right, #ffff, #FFFBF2);">
                        <div class="text-center card-body">
                            <div class="p-3 text-black fw-bold rounded-2 fs-1">
                                SUPPLY CHAIN
                            </div>
                            <div class="p-3 mx-auto text-black w-50 fw-semibold rounded-2 fs-1">
                                FY {{ date('Y') }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xl-3">
                    <div class="card card-flush" style="background-image: linear-gradient(to right, #ffff, #F2FFF8);">
                        <div class="pt-5 card-header">
                            <div class="card-title d-flex justify-content-between w-100">
                                <span class="pt-1 text-black fw-semibold fs-2">
                                    <a class="d-flex align-items-center" href="javascript:void(0);"
                                        data-bs-toggle="modal" data-bs-target="#agentModal">New
                                        Agent <i class="ms-3 fas fa-plus-circle fs-2"></i></a>
                                </span>
                                <span class="text-gray-900 fs-2hx fw-bold me-2 lh-1 ls-n2">00</span>
                            </div>
                        </div>
                        <!-- Agent Modal -->
                        <div class="modal fade" id="agentModal" tabindex="-1" aria-labelledby="agentModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title" id="agentModalLabel">Create New Agent</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <form>
                                            <!-- Agent Type -->
                                            <div class="mb-3">
                                                <label for="agentType" class="form-label">Agent Type</label>
                                                <select class="form-select" data-control="select2" id="agentType" required>
                                                    <option selected disabled>Choose an agent type</option>
                                                    <option>C&amp;F Agent</option>
                                                    <option>Logistics Agent</option>
                                                    <option>Procurement Agent</option>
                                                    <option>Third-Party Logistics (3PL) Agent</option>
                                                    <option>Trade Agent</option>
                                                    <option>Shipping Agent</option>
                                                </select>
                                            </div>

                                            <!-- Country -->
                                            <div class="mb-3">
                                                <label for="country" class="form-label">Country</label>
                                                <select class="form-select" data-control="select2" id="country" required>
                                                    <option selected disabled>Select country</option>
                                                    <option>Bangladesh</option>
                                                    <option>Singapore</option>
                                                    <option>UAE</option>
                                                    <option>Portugal</option>
                                                    <!-- Add more countries as needed -->
                                                </select>
                                            </div>

                                            <!-- Email (Locked) -->
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" id="email"
                                                        placeholder="******@domain.com" disabled>
                                                    <span class="input-group-text" id="emailToggle"
                                                        style="cursor:pointer;">
                                                        <i class="bi bi-eye-slash"></i>
                                                    </span>
                                                </div>
                                            </div>

                                            <!-- Contact Number (Locked) -->
                                            <div class="mb-3">
                                                <label for="contact" class="form-label">Contact Number</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" id="contact"
                                                        placeholder="***********" disabled>
                                                    <span class="input-group-text" id="contactToggle"
                                                        style="cursor:pointer;">
                                                        <i class="bi bi-eye-slash"></i>
                                                    </span>
                                                </div>
                                            </div>

                                            <!-- Details -->
                                            <div class="mb-3">
                                                <label for="details" class="form-label">Details</label>
                                                <textarea class="form-control" id="details" rows="3" placeholder="Enter agent details..."></textarea>
                                            </div>

                                            <!-- Placeholder: Super Admin Control -->
                                            <div class="mb-3">
                                                <label for="viewPermission" class="form-label">Salesperson (who can view
                                                    email & contact)</label>
                                                <select class="form-select" data-control="select2" id="viewPermission">
                                                    <option selected disabled>Select Salesperson</option>
                                                    <!-- Populate dynamically based on admin role -->
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </form>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Create Agent</button>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="pt-15 card-body d-flex flex-column justify-content-end pe-0">
                            <span class="mb-2 text-gray-800 fs-6 fw-bolder d-block">Top Agent</span>

                            <div class="symbol-group symbol-hover flex-nowrap">

                                {{-- <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                    aria-label="Michael Eberon" data-bs-original-title="Michael Eberon"
                                    data-kt-initialized="1">
                                    <img alt="Pic"
                                        src="https://preview.keenthemes.com/metronic8/demo1/assets/media/avatars/300-11.jpg">
                                </div>
                                <a href="#" class="symbol symbol-35px symbol-circle" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_view_users">
                                    <span class="text-gray-400 symbol-label bg-light fs-8 fw-bold">+42</span>
                                </a> --}}
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Middle Middle Area -->
                <div class="col-md-3">
                    <div class="card h-100" style="background-image: linear-gradient(to right, #ffff, #FFFBF2);">
                        <div class="text-center border-0 card-header fw-bold aligh-items-center">
                            <div class="pt-2 fs-1 ">
                                Supply Status
                            </div>
                        </div>
                        <div class="p-0 card-body">
                            <table class="table mb-0 text-center align-middle ">
                                <tbody>
                                    <tr class="border">
                                        <td class="fw-semibold text-dark text-start ps-10">Current Work Orders</td>
                                        <td class="pe-5">0</td>
                                    </tr>
                                    <tr class="border">
                                        <td class="fw-semibold text-dark text-start ps-10">Current Purchase Order</td>
                                        <td class="pe-5">0</td>
                                    </tr>
                                    <tr class="border">
                                        <td class="fw-semibold text-dark text-start ps-10">On Shipments</td>
                                        <td class="pe-5">0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Middle Right Area -->
                <div class="col-md-3">
                    <div class="card h-100" style="background-image: linear-gradient(to right, #ffff, #F2FFF8);">
                        <div class="text-center border-0 card-header fw-bold aligh-items-center">
                            <div class="pt-2 text-black fs-1">
                                Delivery Status
                            </div>
                        </div>
                        <div class="p-0 card-body">
                            <table class="table mb-0 text-center align-middle">
                                <tbody>
                                    <!-- <tr class="border">
                                        <td class="fw-semibold text-dark text-start ps-10">Payment Processing</td>
                                        <td>$500</td>
                                    </tr> -->
                                    <tr class="border">
                                        <td class="fw-semibold text-dark text-start ps-10">Freight On Board</td>
                                        <td>0</td>
                                    </tr>
                                    <tr class="border">
                                        <td class="fw-semibold text-dark text-start ps-10">Delivered</td>
                                        <td>0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-5 row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div class="">
                        <a href="#" class="btn btn-danger fw-semibold me-2" data-bs-toggle="modal"
                            data-bs-target="#kt_modal_upgrade_plan">
                            + Add WO
                        </a>

                        <a href="javascript:void(0);" class="bg-black btn btn-color-white fw-semibold">
                            + Add PO
                        </a>
                        <a href="javascript:void(0);" class="bg-black btn btn-color-white fw-semibold">
                            + Add Agent
                        </a>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class=" me-3">
                            <div class=" input-group input-group-sm me-3">
                                <span class="border-0 input-group-text form-control-solid" id="inputGroup-sizing-sm">
                                    <i class="fab fa-sistrix"></i>
                                </span>
                                <input type="text" class="py-4 form-control form-control-solid"
                                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"
                                    placeholder="Search" style="border-left: 0px;" />
                            </div>
                        </div>
                        <div class="me-3">
                            <div>
                                <input type="date" class="form-control form-control-solid w-100"
                                    placeholder="Pick date rage" id="kt_daterangepicker_2" />
                            </div>
                        </div>
                        <div>
                            <select class="py-4 form-select form-select-solid form-select-sm" data-control="select2"
                                data-hide-search="true" placeholder="Select">
                                <option value="1">Bangladesh</option>
                                <option value="2" selected="selected">United States</option>
                                <option value="3">United Kingdom</option>
                                <option value="4">Canada</option>
                                <option value="5">Australia</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row gx-xl-5">
        <div class="col-lg-12">
            <div class="card card-flush">
                <div class="pt-10 card-header">
                    <div class="d-flex justify-content-between w-100 align-items-center">
                        <div>
                            <span class="mb-0 card-title">
                                All Order List
                            </span>
                            <small>
                                Check the list to get order information
                            </small>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table border rounded data_table table-striped table-row-bordered gy-5 gs-7">
                        <thead>
                            <tr class="text-gray-800 fw-bold fs-6 px-7">
                                <th>Sl</th>
                                <th>Order ID</th>
                                <th>Client Name</th>
                                <th>Product</th>
                                <th>FoB</th>
                                <th>Order Processing</th>
                                <th>Principal Payment</th>
                                <th>Client Payment</th>
                                <th>C&F Agent</th>
                                <th>Logistics Agent</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $order->rfq_code }}</td>
                                    <td>{{ $order->company_name }}</td>
                                    <td class="text-start">
                                        @foreach ($order->rfqProducts as $product)
                                            <span
                                                class="my-1">{{ $loop->iteration . ' . ' . $product->product_name }}</span>
                                            <br>
                                        @endforeach
                                    </td>
                                    <td>--</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                    <td>$5,000</td>
                                    <td>$6,500</td>
                                    <td>--</td>
                                    <td>--</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            document.getElementById("emailToggle").addEventListener("click", function() {
                let emailInput = document.getElementById("email");
                let icon = this.querySelector("i");
                if (emailInput.type === "password") {
                    emailInput.type = "text";
                    icon.classList.remove("bi-eye-slash");
                    icon.classList.add("bi-eye");
                } else {
                    emailInput.type = "password";
                    icon.classList.remove("bi-eye");
                    icon.classList.add("bi-eye-slash");
                }
            });

            document.getElementById("contactToggle").addEventListener("click", function() {
                let contactInput = document.getElementById("contact");
                let icon = this.querySelector("i");
                if (contactInput.type === "password") {
                    contactInput.type = "text";
                    icon.classList.remove("bi-eye-slash");
                    icon.classList.add("bi-eye");
                } else {
                    contactInput.type = "password";
                    icon.classList.remove("bi-eye");
                    icon.classList.add("bi-eye-slash");
                }
            });
        </script>
    @endpush
</x-admin-app-layout>
<!-- RFQ Dashboard End -->
