<div class="row g-3">

    {{-- Tender Code (auto-generated, readonly) --}}

    {{-- Title --}}
    <div class="col-md-8">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', $tender->title ?? '') }}"
            required>
    </div>

    {{-- Tender Type --}}
    <div class="col-md-4">
        <label class="form-label">Tender Type</label>
        <select name="tender_type" class="form-select">
            @foreach (['EOI', 'RFQ', 'Consultant', 'eGP', 'Enlistment', 'RFP'] as $type)
                <option value="{{ $type }}"
                    {{ old('tender_type', $tender->tender_type ?? '') == $type ? 'selected' : '' }}>
                    {{ $type }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Responsible Person --}}
    <div class="col-md-4">
        <label class="form-label">Responsible Person</label>
        <select name="responsible_person_id" class="form-select">
            <option value="">-- Select --</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}"
                    {{ old('responsible_person_id', $tender->responsible_person_id ?? '') == $user->id ? 'selected' : '' }}>
                    {{ $user->display_name }}
                </option>
            @endforeach
        </select>
    </div>


    {{-- Last Date of Submission --}}
    <div class="col-md-4">
        <label class="form-label">Last Date of Submission</label>
        <input type="date" name="last_date_of_submission" class="form-control"
            value="{{ old('last_date_of_submission', $tender->last_date_of_submission ?? '') }}">
    </div>

    {{-- Submission Day --}}
    <div class="col-md-4">
        <label class="form-label">Submission Day</label>
        <select name="submission_day" class="form-select">
            @foreach (['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] as $day)
                <option value="{{ $day }}"
                    {{ old('submission_day', $tender->submission_day ?? '') == $day ? 'selected' : '' }}>
                    {{ $day }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Action --}}
    <div class="col-md-8">
        <label class="form-label">Action</label>
        <select name="action" class="form-select">
            @foreach (['Talk Today', 'Talk in this Week', 'Talk Urgently', 'Talk with Partner', 'Email Marketing', 'Start Relation', 'Important Client', 'Meet This Week', 'Meet Next Week', 'Attend Pre Bid Meet', 'Meet Tomorrow', 'Purchase Schedule', 'Get More Details', 'Get ToR / SoW', 'NO'] as $action)
                <option value="{{ $action }}"
                    {{ old('action', $tender->action ?? '') == $action ? 'selected' : '' }}>
                    {{ $action }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Participation --}}
    <div class="col-md-3">
        <label class="form-label">Participate</label>
        <select name="participate" class="form-select">
            @foreach (['Yes', 'No', 'May Be', 'Need Discussion'] as $opt)
                <option value="{{ $opt }}"
                    {{ old('participate', $tender->participate ?? '') == $opt ? 'selected' : '' }}>
                    {{ $opt }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Submitted --}}
    <div class="col-md-3">
        <label class="form-label">Submitted</label>
        <select name="submitted" class="form-select">
            @foreach (['Yes', 'No'] as $opt)
                <option value="{{ $opt }}"
                    {{ old('submitted', $tender->submitted ?? '') == $opt ? 'selected' : '' }}>
                    {{ $opt }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Tender Status --}}
    <div class="col-md-3">
        <label class="form-label">Tender Status</label>
        <select name="tender_status" class="form-select">
            @foreach (['Live', 'Fail', 'Re Tender', 'Time Over', 'Technical Eval', 'Lost', 'Not Lowest', 'Probability', 'Won', 'Submitted', 'Participating'] as $status)
                <option value="{{ $status }}"
                    {{ old('tender_status', $tender->tender_status ?? '') == $status ? 'selected' : '' }}>
                    {{ $status }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Purchase --}}
    <div class="col-md-3">
        <label class="form-label">Purchase</label>
        <select name="purchase" class="form-select">
            @foreach (['Yes', 'No', 'May Be'] as $opt)
                <option value="{{ $opt }}"
                    {{ old('purchase', $tender->purchase ?? '') == $opt ? 'selected' : '' }}>
                    {{ $opt }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Tenderer --}}
    <div class="col-md-6">
        <label class="form-label">Tenderer</label>
        <input type="text" name="tenderer" class="form-control"
            value="{{ old('tenderer', $tender->tenderer ?? '') }}">
    </div>

    {{-- Tender Reference --}}
    <div class="col-md-6">
        <label class="form-label">Tender Reference</label>
        <input type="text" name="tender_reference" class="form-control"
            value="{{ old('tender_reference', $tender->tender_reference ?? '') }}">
    </div>

    {{-- Mode of Submission --}}
    <div class="col-md-4">
        <label class="form-label">Mode of Submission</label>
        <select name="mode_of_submission" class="form-select">
            @foreach (['Hardcopy', 'Email', 'Online'] as $opt)
                <option value="{{ $opt }}"
                    {{ old('mode_of_submission', $tender->mode_of_submission ?? '') == $opt ? 'selected' : '' }}>
                    {{ $opt }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Submission Medium --}}
    <div class="col-md-4">
        <label class="form-label">Hardcopy Reference Id</label>
        <input type="text" name="hardcopy_reference_id" class="form-control"
            value="{{ old('hardcopy_reference_id', $tender->hardcopy_reference_id ?? '') }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">Email / Online</label>
        <input type="text" name="online_reference" class="form-control"
            value="{{ old('online_reference', $tender->online_reference ?? '') }}">
    </div>

    {{-- eGP ID --}}
    <div class="col-md-4">
        <label class="form-label">eGP ID</label>
        <input type="text" name="egp_id" class="form-control" value="{{ old('egp_id', $tender->egp_id ?? '') }}">
    </div>

    {{-- Pre-Bid Meeting --}}
    <div class="col-md-4">
        <label class="form-label">Pre-Bid Meeting</label>
        <input type="text" name="pre_bid_meeting" class="form-control"
            value="{{ old('pre_bid_meeting', $tender->pre_bid_meeting ?? '') }}">
    </div>

    {{-- Schedule Value --}}
    <div class="col-md-4">
        <label class="form-label">Schedule Value (Tk)</label>
        <input type="number" step="0.01" name="schedule_value_tk" class="form-control"
            value="{{ old('schedule_value_tk', $tender->schedule_value_tk ?? '') }}">
    </div>

    {{-- Security --}}
    <div class="col-md-4">
        <label class="form-label">Security (Tk)</label>
        <input type="number" step="0.01" name="security" class="form-control"
            value="{{ old('security', $tender->security ?? '') }}">
    </div>

    {{-- Time Over --}}
    <div class="col-md-4">
        <div class="form-check mt-4">
            <input class="form-check-input" type="checkbox" name="time_over" value="1"
                {{ old('time_over', $tender->time_over ?? false) ? 'checked' : '' }}>
            <label class="form-check-label">Time Over</label>
        </div>
    </div>

    {{-- Client Info --}}
    <div class="col-12 mt-4">
        <h5 class="border-bottom pb-2">Client Details</h5>
    </div>

    <div class="col-md-4">
        <label class="form-label">Client Name</label>
        <input type="text" name="client_name" class="form-control"
            value="{{ old('client_name', $tender->client_name ?? '') }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">Contact Name</label>
        <input type="text" name="contact_name" class="form-control"
            value="{{ old('contact_name', $tender->contact_name ?? '') }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">Contact Number</label>
        <input type="text" name="contact_number" class="form-control"
            value="{{ old('contact_number', $tender->contact_number ?? '') }}">
    </div>

    <div class="col-md-6">
        <label class="form-label">Contact Email</label>
        <input type="email" name="contact_email" class="form-control"
            value="{{ old('contact_email', $tender->contact_email ?? '') }}">
    </div>
    <div class="col-md-6">
        <label class="form-label">Client Website</label>
        <input type="url" name="client_website" class="form-control"
            value="{{ old('client_website', $tender->client_website ?? '') }}">
    </div>

    <div class="col-12">
        <label class="form-label">Contact Address</label>
        <textarea name="contact_address" class="form-control" rows="2">{{ old('contact_address', $tender->contact_address ?? '') }}</textarea>
    </div>

    {{-- Comments --}}
    <div class="col-12 mt-4">
        <h5 class="border-bottom pb-2">Comments</h5>
    </div>

    <div class="col-12">
        <label class="form-label">Comments by Manager</label>
        <textarea name="comments_by_manager" class="form-control" rows="2">{{ old('comments_by_manager', $tender->comments_by_manager ?? '') }}</textarea>
    </div>

    <div class="col-12">
        <label class="form-label">Comments by MD</label>
        <textarea name="comments_by_md" class="form-control" rows="2">{{ old('comments_by_md', $tender->comments_by_md ?? '') }}</textarea>
    </div>

    <div class="col-12">
        <label class="form-label">General Comments</label>
        <textarea name="general_comments" class="form-control" rows="2">{{ old('general_comments', $tender->general_comments ?? '') }}</textarea>
    </div>

</div>
