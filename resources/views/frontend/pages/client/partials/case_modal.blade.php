<!-- Modal -->
@if ($supports)
@foreach ($supports as $key => $support)
<div id="supportModal{{ $support->id }}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <!-- Modal content-->
        <div class="modal-content rounded-0">
            <form class="needs-validation" method="POST" action="{{ route('client.case.store') }}"
                enctype="multipart/form-data" novalidate>
                @csrf
                <div class="modal-header py-1 border-bottom shadow-sm pe-4">
                    <h5 class="modal-title text-center">Create Support Case</h5>
                    <button type="button" class="btn border-0 bg-transparent p-0" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark main_color fs-3"></i>
                    </button>
                </div>
                <div class="modal-body px-5">
                    <div class="row mb-2 gx-1">
                        <div class="col-lg-6">
                            <label for="validationCustom02" class="form-label">
                                Support Title:
                            </label>
                            <p class="support_title_triger fw-bold" style="font-size: 12px !important;">
                                {{ $support->support_title }}
                            </p>

                            <input type="hidden" name="client_id"
                                value="{{ Auth::guard('client')->user()->id }}">
                            <input type="hidden" name="support_id" value="{{ $support->id }}">
                            {{-- <input type="hidden" name="country" value="{{ $project->country->country_name }}"> --}}
                            <input type="hidden" name="name"
                                value="{{ Auth::guard('client')->user()->name }}">
                            <input type="hidden" name="email"
                                value="{{ Auth::guard('client')->user()->email }}">
                            <input type="hidden" name="phone"
                                value="{{ Auth::guard('client')->user()->phone }}">
                            <input type="hidden" name="company"
                                value="{{ Auth::guard('client')->user()->company_name }}">
                        </div>
                        <div class="col-lg-3">
                            <label for="validationCustom01" class="form-label">
                                Support Category
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-select form-select-sm border" id="validationCustom01"
                                name="msg_category" data-placeholder="Select Support Category"
                                data-allow-clear="true" required>
                                <option></option>
                                <option value="web">Web</option>
                                <option value="apps">Apps</option>
                                <option value="domain">Domain</option>
                                <option value="hosting">Hosting</option>
                            </select>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please provide a valid Category.
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <label for="validationCustom02" class="form-label">
                                Problem Type <span class="text-danger">*</span>
                            </label>
                            <select class="form-select form-select-sm border" id="validationCustom02"
                                data-placeholder="Select Problem Type" data-allow-clear="true"
                                name="msg_type" required>
                                <option></option>
                                <option value="bug_fixing">Bug Fixing</option>
                                <option value="design_issue">Design Issue</option>
                                <option value="additional_development">Additional Development</option>
                            </select>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please provide a valid Problem Type.
                            </div>
                        </div>

                        <div class="col-lg-1 my-2">
                            <label for="validationCustom02" class="form-label mt-3">
                                Sub <span class="text-danger">*</span>
                            </label>
                        </div>
                        <div class="col-lg-5 my-2 pt-2">
                            <input type="text" class="form-control form-control-sm border-0"
                                style="border-bottom: 1px solid #999898 !important;" placeholder="Case Subject"
                                id="validationCustom03" name="subject" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please provide a Subject.
                            </div>
                        </div>
                        <div class="col-lg-6 my-2">
                            <div class="d-flex align-items-center ms-2"
                                style="border-bottom: 1px solid #999898 !important; margin-top: 16px;">
                                <p class="p-0 m-0">CC :</p>
                                @php
                                $teams = App\Models\Client\ClientTeam::where('client_id', Auth::guard('client')->user()->id)->get();
                                @endphp
                                <div class="d-flex">
                                    @foreach ($teams as $team)
                                    <div class="form-check form-check-inline mx-2 my-2">
                                        <input class="form-check-input" type="checkbox"
                                            style="left: 30px; top:5px;" name="mail_cc[]"
                                            id="inlineCheckbox{{ $team->id }}"
                                            value="{{ $team->email }}">
                                        <label class="form-check-label"
                                            for="inlineCheckbox{{ $team->id }}">{{ $team->name }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row align-items-center mb-3">
                        <div class="col-lg-12">
                            <label for="validationCustom04">Message <span class="text-danger">*</span></label>
                            <br>
                            <textarea name="message" class="form-control border-0" id="" rows="3" id="validationCustom04"
                                required style="border-bottom: 1px solid #999898 !important;"></textarea>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please provide a Message.
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3 gx-1">
                        <div class="col-lg-2">
                            <label for="validationCustom05" class="form-label">
                                Attachment
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <input type="file" class="form-control" id="validationCustom05"
                                multiple="multiple" name="attachment[]">
                        </div>
                        <div class="col-lg-6">
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn-color">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endforeach
@endif


<div id="casecommonmodal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <!-- Modal content-->
        <div class="modal-content rounded-0">
            <form class="needs-validation" method="POST" action="{{ route('client.case.store') }}"
                enctype="multipart/form-data" novalidate>
                @csrf
                <div class="modal-header py-1 border-bottom shadow-sm pe-4">
                    <h5 class="modal-title text-center">Create Support Case</h5>
                    <button type="button" class="close" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark main_color fs-3"></i>
                    </button>
                </div>
                <div class="modal-body px-5">
                    <div class="row align-items-center mb-3 gx-3">

                        <input type="hidden" name="client_id" value="{{ Auth::guard('client')->user()->id }}">
                        {{-- <input type="hidden" name="country" value="{{ $project->country->country_name }}"> --}}
                        <input type="hidden" name="name" value="{{ Auth::guard('client')->user()->name }}">
                        <input type="hidden" name="email" value="{{ Auth::guard('client')->user()->email }}">
                        <input type="hidden" name="phone" value="{{ Auth::guard('client')->user()->phone }}">
                        <input type="hidden" name="company"
                            value="{{ Auth::guard('client')->user()->company_name }}">

                        <div class="col-lg-4">
                            <label for="validationCustom01" class="form-label">
                                Select Support
                                {{-- <br> or <a href="">create support</a> --}}
                                <span class="text-danger">*</span>
                            </label>

                            <select class="form-select form-select-sm border" id="supportID" name="support_id"
                                data-placeholder="Select Support" data-allow-clear="true" required>
                                <option></option>
                                @foreach ($supports as $support)
                                <option value="{{ $support->id }}">
                                    {{ $support->support_title }}
                                </option>
                                @endforeach
                            </select>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please provide a valid Category.
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label for="validationCustom01" class="form-label">
                                Support Category
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-select form-select-sm border" id="validationCustom01"
                                name="msg_category" data-placeholder="Select Support Category"
                                data-allow-clear="true" required>
                                <option></option>
                                <option value="web">Web</option>
                                <option value="apps">Apps</option>
                                <option value="domain">Domain</option>
                                <option value="hosting">Hosting</option>
                            </select>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please provide a valid Category.
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <label for="validationCustom02" class="form-label">
                                Problem Type <span class="text-danger">*</span>
                            </label>
                            <select class="form-select form-select-sm border" id="validationCustom02"
                                data-placeholder="Select Problem Type" data-allow-clear="true"
                                name="msg_type" required>
                                <option></option>
                                <option value="bug_fixing">Bug Fixing</option>
                                <option value="design_issue">Design Issue</option>
                                <option value="additional_development">Additional Development</option>
                            </select>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please provide a valid Problem Type.
                            </div>
                        </div>

                        <div class="col-lg-1 my-2">
                            <label for="validationCustom02" class="form-label mt-3">
                                Sub <span class="text-danger">*</span>
                            </label>
                        </div>
                        <div class="col-lg-5 my-2 pt-2">
                            <input type="text" class="form-control form-control-sm border-0"
                                style="border-bottom: 1px solid #999898 !important;" placeholder="Case Subject"
                                id="validationCustom03" name="subject" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please provide a Subject.
                            </div>
                        </div>
                        <div class="col-lg-6 my-2">
                            <div class="d-flex align-items-center ms-2"
                                style="border-bottom: 1px solid #999898 !important; margin-top: 16px;">
                                <p class="p-0 m-0">CC :</p>
                                @php
                                $teams = App\Models\Client\ClientTeam::where('client_id', Auth::guard('client')->user()->id)->get();
                                @endphp
                                <div class="d-flex">
                                    @foreach ($teams as $team)
                                    <div class="form-check form-check-inline mx-2 my-2">
                                        <input class="form-check-input" type="checkbox" name="mail_cc[]"
                                            style="left: 30px; top:5px;" id="inlineCheckbox{{ $team->id }}"
                                            value="{{ $team->email }}">
                                        <label class="form-check-label"
                                            for="inlineCheckbox{{ $team->id }}">{{ $team->name }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row align-items-center mb-3">
                        <div class="col-lg-12">
                            <label for="validationCustom04">Message <span class="text-danger">*</span></label>
                            <br>
                            <textarea name="message" class="form-control border-0" id="" rows="3" id="validationCustom04"
                                required style="border-bottom: 1px solid #999898 !important;"></textarea>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please provide a Message.
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-3 gx-1">
                        <div class="col-lg-2">
                            <label for="validationCustom05" class="form-label">
                                Attachment
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <input type="file" class="form-control" id="validationCustom05" multiple="multiple"
                                name="attachment[]">
                        </div>
                        <div class="col-lg-6">
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn-color">Submit</button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>