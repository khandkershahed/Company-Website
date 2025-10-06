<div class="container px-0 py-4">
    <div class="row gx-10">
        <!-- Left Side Tabs -->
        <div class="p-5 mb-4 col-md-2 mb-md-0 bg-light-info rounded-2">
            <ul class="nav nav-pills flex-column" id="tenderTab" role="tablist">
                <li class="nav-item w-100"><button class="nav-link active w-100 text-start" id="info-tab" data-bs-toggle="pill" data-bs-target="#info" type="button" role="tab">Tender Information</button></li>
                <li class="nav-item w-100"><button class="nav-link w-100 text-start" id="responsible-tab" data-bs-toggle="pill" data-bs-target="#responsible" type="button" role="tab">Responsible / Submission</button></li>
                <li class="nav-item w-100"><button class="nav-link w-100 text-start" id="action-tab" data-bs-toggle="pill" data-bs-target="#action" type="button" role="tab">Action & Status</button></li>
                <li class="nav-item w-100"><button class="nav-link w-100 text-start" id="tenderer-tab" data-bs-toggle="pill" data-bs-target="#tenderer" type="button" role="tab">Tenderer / Reference</button></li>
                <li class="nav-item w-100"><button class="nav-link w-100 text-start" id="submission-tab" data-bs-toggle="pill" data-bs-target="#submission" type="button" role="tab">Submission Details</button></li>
                <li class="nav-item w-100"><button class="nav-link w-100 text-start" id="client-tab" data-bs-toggle="pill" data-bs-target="#client" type="button" role="tab">Client Details</button></li>
                <li class="nav-item w-100"><button class="nav-link w-100 text-start" id="comments-tab" data-bs-toggle="pill" data-bs-target="#comments" type="button" role="tab">Comments</button></li>
            </ul>
        </div>

        <!-- Right Side Tab Content -->
        <div class="col-md-10">
            <div class="tab-content" id="tenderTabContent">

                <!-- Tender Information -->
                <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                    <!-- <h2 class="pb-2 text-primary">Tender Information</h2> -->
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label fw-semibold">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $tender->title ?? '') }}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Tender Type</label>
                            <select name="tender_type" class="form-select" data-control="select2">
                                @foreach (['EOI', 'RFQ', 'Consultant', 'eGP', 'Enlistment', 'RFP'] as $type)
                                <option value="{{ $type }}" {{ old('tender_type', $tender->tender_type ?? '') == $type ? 'selected' : '' }}>{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Responsible / Submission -->
                <div class="tab-pane fade" id="responsible" role="tabpanel" aria-labelledby="responsible-tab">
                    <div class="mt-3 row g-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Responsible Person</label>
                            <select name="responsible_person_id" class="form-select" data-control="select2">
                                <option value="">-- Select --</option>
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ old('responsible_person_id', $tender->responsible_person_id ?? '') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Last Date of Submission</label>
                            <input type="date" name="last_date_of_submission" class="form-control" value="{{ old('last_date_of_submission', $tender->last_date_of_submission ?? '') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Submission Day</label>
                            <select name="submission_day" class="form-select" data-control="select2">
                                @foreach (['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] as $day)
                                <option value="{{ $day }}" {{ old('submission_day', $tender->submission_day ?? '') == $day ? 'selected' : '' }}>{{ $day }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Action & Status -->
                <div class="tab-pane fade" id="action" role="tabpanel" aria-labelledby="action-tab">
                    <div class="mt-3 row g-3">
                        <div class="col-md-8">
                            <label class="form-label fw-semibold">Action</label>
                            <select name="action" class="form-select" data-control="select2">
                                @foreach (['Talk Today', 'Talk in this Week', 'Talk Urgently', 'Talk with Partner', 'Email Marketing', 'Start Relation', 'Important Client', 'Meet This Week', 'Meet Next Week', 'Attend Pre Bid Meet', 'Meet Tomorrow', 'Purchase Schedule', 'Get More Details', 'Get ToR / SoW', 'NO'] as $action)
                                <option value="{{ $action }}" {{ old('action', $tender->action ?? '') == $action ? 'selected' : '' }}>{{ $action }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Participate</label>
                            <select name="participate" class="form-select" data-control="select2">
                                @foreach (['Yes', 'No', 'May Be', 'Need Discussion'] as $opt)
                                <option value="{{ $opt }}" {{ old('participate', $tender->participate ?? '') == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Submitted</label>
                            <select name="submitted" class="form-select" data-control="select2">
                                @foreach (['Yes', 'No'] as $opt)
                                <option value="{{ $opt }}" {{ old('submitted', $tender->submitted ?? '') == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Tender Status</label>
                            <select name="tender_status" class="form-select" data-control="select2">
                                @foreach (['Live', 'Fail', 'Re Tender', 'Time Over', 'Technical Eval', 'Lost', 'Not Lowest', 'Probability', 'Won', 'Submitted', 'Participating'] as $status)
                                <option value="{{ $status }}" {{ old('tender_status', $tender->tender_status ?? '') == $status ? 'selected' : '' }}>{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Purchase</label>
                            <select name="purchase" class="form-select" data-control="select2">
                                @foreach (['Yes', 'No', 'May Be'] as $opt)
                                <option value="{{ $opt }}" {{ old('purchase', $tender->purchase ?? '') == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Tenderer / Reference -->
                <div class="tab-pane fade" id="tenderer" role="tabpanel" aria-labelledby="tenderer-tab">
                    <div class="mt-3 row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Tenderer</label>
                            <input type="text" name="tenderer" class="form-control" value="{{ old('tenderer', $tender->tenderer ?? '') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Tender Reference</label>
                            <input type="text" name="tender_reference" class="form-control" value="{{ old('tender_reference', $tender->tender_reference ?? '') }}">
                        </div>
                    </div>
                </div>

                <!-- Submission Details -->
                <div class="tab-pane fade" id="submission" role="tabpanel" aria-labelledby="submission-tab">
                    <div class="mt-3 row g-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Mode of Submission</label>
                            <select name="mode_of_submission" class="form-select" data-control="select2">
                                @foreach (['Hardcopy', 'Email', 'Online'] as $opt)
                                <option value="{{ $opt }}" {{ old('mode_of_submission', $tender->mode_of_submission ?? '') == $opt ? 'selected' : '' }}>{{ $opt }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Hardcopy Reference Id</label>
                            <input type="text" name="hardcopy_reference_id" class="form-control" value="{{ old('hardcopy_reference_id', $tender->hardcopy_reference_id ?? '') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Email / Online</label>
                            <input type="text" name="online_reference" class="form-control" value="{{ old('online_reference', $tender->online_reference ?? '') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">eGP ID</label>
                            <input type="text" name="egp_id" class="form-control" value="{{ old('egp_id', $tender->egp_id ?? '') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Pre-Bid Meeting</label>
                            <input type="text" name="pre_bid_meeting" class="form-control" value="{{ old('pre_bid_meeting', $tender->pre_bid_meeting ?? '') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Schedule Value (Tk)</label>
                            <input type="number" step="0.01" name="schedule_value_tk" class="form-control" value="{{ old('schedule_value_tk', $tender->schedule_value_tk ?? '') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Security (Tk)</label>
                            <input type="number" step="0.01" name="security" class="form-control" value="{{ old('security', $tender->security ?? '') }}">
                        </div>
                        <div class="mt-3 col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="time_over" value="1" {{ old('time_over', $tender->time_over ?? false) ? 'checked' : '' }}>
                                <label class="form-check-label fw-semibold">Time Over</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Client Details -->
                <div class="tab-pane fade" id="client" role="tabpanel" aria-labelledby="client-tab">
                    <div class="mt-3 row g-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Client Name</label>
                            <input type="text" name="client_name" class="form-control" value="{{ old('client_name', $tender->client_name ?? '') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Contact Name</label>
                            <input type="text" name="contact_name" class="form-control" value="{{ old('contact_name', $tender->contact_name ?? '') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Contact Number</label>
                            <input type="text" name="contact_number" class="form-control" value="{{ old('contact_number', $tender->contact_number ?? '') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Contact Email</label>
                            <input type="email" name="contact_email" class="form-control" value="{{ old('contact_email', $tender->contact_email ?? '') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Client Website</label>
                            <input type="url" name="client_website" class="form-control" value="{{ old('client_website', $tender->client_website ?? '') }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Contact Address</label>
                            <textarea name="contact_address" class="form-control" rows="4">{{ old('contact_address', $tender->contact_address ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Comments -->
                <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="comments-tab">
                    <div class="mt-3 row g-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Comments by Manager</label>
                            <textarea name="comments_by_manager" class="form-control" rows="4">{{ old('comments_by_manager', $tender->comments_by_manager ?? '') }}</textarea>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Comments by MD</label>
                            <textarea name="comments_by_md" class="form-control" rows="4">{{ old('comments_by_md', $tender->comments_by_md ?? '') }}</textarea>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">General Comments</label>
                            <textarea name="general_comments" class="form-control" rows="4">{{ old('general_comments', $tender->general_comments ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>