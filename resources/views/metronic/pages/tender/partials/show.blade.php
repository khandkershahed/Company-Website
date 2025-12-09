<div class="container">

    <!-- BASIC INFO -->
    <h5 class="fw-bold mb-3">Basic Information</h5>
    <div class="row g-3">
        @include('metronic.pages.tender.partials.field', [
            'label' => 'Code',
            'value' => $tender->tender_code,
        ])
        @include('metronic.pages.tender.partials.field', [
            'label' => 'Title',
            'value' => $tender->title,
        ])
        @include('metronic.pages.tender.partials.field', [
            'label' => 'Type',
            'value' => $tender->tender_type,
        ])

        @include('metronic.pages.tender.partials.field', [
            'label' => 'Responsible',
            'value' => $tender->responsiblePerson->name ?? '-',
        ])
        @include('metronic.pages.tender.partials.field', [
            'label' => 'Last Date',
            'value' => $tender->last_date_of_submission,
        ])
        @include('metronic.pages.tender.partials.field', [
            'label' => 'Submission Day',
            'value' => $tender->submission_day,
        ])

        @include('metronic.pages.tender.partials.field', [
            'label' => 'Action',
            'value' => $tender->action,
        ])
        @include('metronic.pages.tender.partials.field', [
            'label' => 'Participate',
            'value' => $tender->participate,
        ])
        @include('metronic.pages.tender.partials.field', [
            'label' => 'Submitted',
            'value' => $tender->submitted,
        ])

        @include('metronic.pages.tender.partials.field', [
            'label' => 'Status',
            'value' => $tender->status,
        ])
        @include('metronic.pages.tender.partials.field', [
            'label' => 'Tender Status',
            'value' => $tender->tender_status,
        ])
        @include('metronic.pages.tender.partials.field', [
            'label' => 'Purchase',
            'value' => $tender->purchase,
        ])
    </div>


    <!-- ADDITIONAL INFO -->
    <h5 class="fw-bold mt-5 mb-3">Additional Information</h5>
    <div class="row g-3">
        @include('metronic.pages.tender.partials.field', [
            'label' => 'Tenderer',
            'value' => $tender->tenderer,
        ])
        @include('metronic.pages.tender.partials.field', [
            'label' => 'Reference',
            'value' => $tender->tender_reference,
        ])
        @include('metronic.pages.tender.partials.field', [
            'label' => 'Submission Mode',
            'value' => $tender->mode_of_submission,
        ])

        @include('metronic.pages.tender.partials.field', [
            'label' => 'Hardcopy Ref',
            'value' => $tender->hardcopy_reference_id,
        ])
        @include('metronic.pages.tender.partials.field', [
            'label' => 'Online Ref',
            'value' => $tender->online_reference,
        ])
        @include('metronic.pages.tender.partials.field', [
            'label' => 'eGP ID',
            'value' => $tender->egp_id,
        ])

        @include('metronic.pages.tender.partials.field', [
            'label' => 'Pre Bid Meeting',
            'value' => $tender->pre_bid_meeting,
        ])
    </div>


    <!-- FINANCIAL -->
    <h5 class="fw-bold mt-5 mb-3">Financial</h5>
    <div class="row g-3">
        @include('metronic.pages.tender.partials.field', [
            'label' => 'Schedule Value (Tk)',
            'value' => number_format($tender->schedule_value_tk, 2),
        ])
        @include('metronic.pages.tender.partials.field', [
            'label' => 'Security',
            'value' => number_format($tender->security, 2),
        ])
        @include('metronic.pages.tender.partials.field', [
            'label' => 'Time Over',
            'value' => $tender->time_over ? 'Yes' : 'No',
        ])
    </div>


    <!-- CLIENT DETAILS -->
    <h5 class="fw-bold mt-5 mb-3">Client Details</h5>
    <div class="row g-3">
        @include('metronic.pages.tender.partials.field', [
            'label' => 'Client Name',
            'value' => $tender->client_name,
        ])
        @include('metronic.pages.tender.partials.field', [
            'label' => 'Contact Name',
            'value' => $tender->contact_name,
        ])
        @include('metronic.pages.tender.partials.field', [
            'label' => 'Contact Number',
            'value' => $tender->contact_number,
        ])

        @include('metronic.pages.tender.partials.field', [
            'label' => 'Email',
            'value' => $tender->contact_email,
        ])
        @include('metronic.pages.tender.partials.field_long', [
            'label' => 'Address',
            'value' => $tender->contact_address,
        ])
        @include('metronic.pages.tender.partials.field_long', [
            'label' => 'Website',
            'value' => $tender->client_website,
        ])
    </div>


    <!-- COMMENTS -->
    <h5 class="fw-bold mt-5 mb-3">Comments</h5>
    <div class="row g-3">
        @include('metronic.pages.tender.partials.field_long', [
            'label' => 'Manager Comments',
            'value' => $tender->comments_by_manager,
        ])
        @include('metronic.pages.tender.partials.field_long', [
            'label' => 'MD Comments',
            'value' => $tender->comments_by_md,
        ])
        @include('metronic.pages.tender.partials.field_long', [
            'label' => 'General Comments',
            'value' => $tender->general_comments,
        ])
    </div>

</div>
