 <div class="container px-0 py-4">
     <div class="row gx-10">
         <!-- Left Side Tabs -->
         <div class="p-5 mb-4 col-md-2 mb-md-0 bg-light-info rounded-2">
             <ul class="nav nav-pills flex-column" id="dmarTab" role="tablist">
                 <li class="mb-4 border nav-item w-100">
                     <button class="nav-link active w-100 text-start" id="basic-tab" data-bs-toggle="pill"
                         data-bs-target="#basic" type="button" role="tab">Basic Info</button>
                 </li>
                 <li class="mb-4 border nav-item w-100">
                     <button class="nav-link w-100 text-start" id="company-tab" data-bs-toggle="pill"
                         data-bs-target="#company" type="button" role="tab">Company & Service</button>
                 </li>
                 <li class="mb-4 border nav-item w-100">
                     <button class="nav-link w-100 text-start" id="status-tab" data-bs-toggle="pill"
                         data-bs-target="#status" type="button" role="tab">Action & Status</button>
                 </li>
                 <li class="mb-4 border nav-item w-100">
                     <button class="nav-link w-100 text-start" id="client-tab" data-bs-toggle="pill"
                         data-bs-target="#client" type="button" role="tab">Client Info</button>
                 </li>
                 <li class="border nav-item w-100">
                     <button class="nav-link w-100 text-start" id="comments-tab" data-bs-toggle="pill"
                         data-bs-target="#comments" type="button" role="tab">Comments</button>
                 </li>
             </ul>
         </div>

         <!-- Right Side Tab Content -->
         <div class="col-md-10">
             <div class="tab-content" id="dmarTabContent">

                 <!-- Basic Info -->
                 <div class="tab-pane fade show active" id="basic" role="tabpanel" aria-labelledby="basic-tab">
                     <div class="row g-3">
                        <input type="hidden" name="user_id" value="{{ old('user_id', $marketingDmar->user_id ?? Auth::user()->id) }}">
                         {{-- <div class="col-md-4">
                             <label class="form-label fw-semibold">User</label>
                             <select name="user_id" class="form-select">
                                 <option value="">-- Select --</option>
                                 @foreach ($users as $user)
                                     <option value="{{ $user->id }}"
                                         {{ old('user_id', $marketingDmar->user_id ?? '') == $user->id ? 'selected' : '' }}>
                                         {{ $user->name }}</option>
                                 @endforeach
                             </select>
                         </div> --}}
                         <div class="col-md-4">
                             <label class="form-label fw-semibold">Date</label>
                             <input type="date" name="date" class="form-control"
                                 value="{{ old('date', $marketingDmar->date ?? now()->toDateString()) }}">
                         </div>


                         <div class="col-md-4">
                             <label class="form-label fw-semibold">Month</label>
                             <select class="form-select" data-control="select2" data-placeholder="Month" name="month"
                                 id="filterMonth">
                                 @foreach ($months as $month)
                                     <option value="{{ $month }}" @selected(old('month', $marketingDmar->month ?? now()->format('F')) == $month)>
                                         {{ $month }}</option>
                                 @endforeach
                             </select>
                         </div>
                         <div class="col-md-4">
                             <label class="form-label fw-semibold">Year</label>
                             <select name="year" class="form-select">
                                 @php
                                     $currentYear = now()->year;
                                     $startYear = $currentYear - 3;
                                     $endYear = $currentYear + 3;
                                     $selectedYear = old('year', $marketingDmar->year ?? $currentYear);
                                 @endphp

                                 @for ($year = $startYear; $year <= $endYear; $year++)
                                     <option value="{{ $year }}" {{ $selectedYear == $year ? 'selected' : '' }}>
                                         {{ $year }}
                                     </option>
                                 @endfor
                             </select>
                         </div>
                         <div class="col-md-4">
                             <label class="form-label fw-semibold">Activity</label>
                             <select name="activity" class="form-select">
                                 @foreach (['Meeting', 'Presentation', 'Visit', 'Followup', 'Workshop'] as $activity)
                                     <option value="{{ $activity }}"
                                         {{ old('activity', $marketingDmar->activity ?? '') == $activity ? 'selected' : '' }}>
                                         {{ $activity }}</option>
                                 @endforeach
                             </select>
                         </div>
                     </div>
                 </div>

                 <!-- Company & Service -->
                 <div class="tab-pane fade" id="company" role="tabpanel" aria-labelledby="company-tab">
                     <div class="row g-3">
                         <div class="col-md-4">
                             <label class="form-label fw-semibold">Company</label>
                             <input type="text" name="company" class="form-control"
                                 value="{{ old('company', $marketingDmar->company ?? '') }}">
                         </div>
                         <div class="col-md-4">
                             <label class="form-label fw-semibold">Service</label>
                             <input type="text" name="service" class="form-control"
                                 value="{{ old('service', $marketingDmar->service ?? '') }}">
                         </div>
                         <div class="col-md-4">
                             <label class="form-label fw-semibold">Tentative Value</label>
                             <input type="number" step="0.01" name="tentative" class="form-control"
                                 value="{{ old('tentative', $marketingDmar->tentative ?? '') }}">
                         </div>
                         <div class="col-md-12">
                             <label class="form-label fw-semibold">Products</label>
                             <input type="text" name="products" class="form-control"
                                 value="{{ old('products', $marketingDmar->products ?? '') }}">
                         </div>

                     </div>
                 </div>

                 <!-- Action & Status -->
                 <div class="tab-pane fade" id="status" role="tabpanel" aria-labelledby="status-tab">
                     <div class="row g-3">
                         <div class="col-md-4">
                             <label class="form-label fw-semibold">Action on Fail</label>
                             <select name="action_on_fail" class="form-select">
                                 @foreach (['Followup', 'Resubmit', 'Technical Clarification', 'Provide Demo', 'Prepare Proposal'] as $action)
                                     <option value="{{ $action }}"
                                         {{ old('action_on_fail', $marketingDmar->action_on_fail ?? '') == $action ? 'selected' : '' }}>
                                         {{ $action }}</option>
                                 @endforeach
                             </select>
                         </div>
                         <div class="col-md-4">
                             <label class="form-label fw-semibold">Current Status</label>
                             <select name="current_status" class="form-select">
                                 @foreach (['Ongoing', 'Pending', 'In Progress', 'Prospect'] as $status)
                                     <option value="{{ $status }}"
                                         {{ old('current_status', $marketingDmar->current_status ?? '') == $status ? 'selected' : '' }}>
                                         {{ $status }}</option>
                                 @endforeach
                             </select>
                         </div>
                         <div class="col-md-2">
                             <label class="form-label fw-semibold">Client Type</label>
                             <select name="client_type" class="form-select">
                                 @foreach (['Existing', 'New', 'Old'] as $type)
                                     <option value="{{ $type }}"
                                         {{ old('client_type', $marketingDmar->client_type ?? '') == $type ? 'selected' : '' }}>
                                         {{ $type }}</option>
                                 @endforeach
                             </select>
                         </div>
                         <div class="col-md-3">
                             <label class="form-label fw-semibold">Sector</label>
                             <input type="text" name="sector" class="form-control"
                                 value="{{ old('sector', $marketingDmar->sector ?? '') }}">
                         </div>
                         <div class="col-md-3">
                             <label class="form-label fw-semibold">Sub-Sector</label>
                             <input type="text" name="sub_sector" class="form-control"
                                 value="{{ old('sub_sector', $marketingDmar->sub_sector ?? '') }}">
                         </div>
                         <div class="col-md-6">
                             <label class="form-label fw-semibold">Area</label>
                             <textarea name="area" class="form-control" rows="2">{{ old('area', $marketingDmar->area ?? '') }}</textarea>
                         </div>
                     </div>
                 </div>

                 <!-- Client Info -->
                 <div class="tab-pane fade" id="client" role="tabpanel" aria-labelledby="client-tab">
                     <div class="row g-3">
                         <div class="col-md-4">
                             <label class="form-label fw-semibold">Contact Name</label>
                             <input type="text" name="contact_name" class="form-control"
                                 value="{{ old('contact_name', $marketingDmar->contact_name ?? '') }}">
                         </div>
                         <div class="col-md-4">
                             <label class="form-label fw-semibold">Contact Number</label>
                             <input type="text" name="contact_number" class="form-control"
                                 value="{{ old('contact_number', $marketingDmar->contact_number ?? '') }}">
                         </div>
                         <div class="col-md-4">
                             <label class="form-label fw-semibold">Contact Email</label>
                             <input type="email" name="contact_email" class="form-control"
                                 value="{{ old('contact_email', $marketingDmar->contact_email ?? '') }}">
                         </div>
                         <div class="col-md-6">
                             <label class="form-label fw-semibold">Website</label>
                             <input type="url" name="contact_website" class="form-control"
                                 value="{{ old('contact_website', $marketingDmar->contact_website ?? '') }}">
                         </div>
                         <div class="col-md-6">
                             <label class="form-label fw-semibold">Social</label>
                             <input type="text" name="contact_social" class="form-control"
                                 value="{{ old('contact_social', $marketingDmar->contact_social ?? '') }}">
                         </div>
                         <div class="col-12">
                             <label class="form-label fw-semibold">Address</label>
                             <textarea name="contact_address" class="form-control" rows="2">{{ old('contact_address', $marketingDmar->contact_address ?? '') }}</textarea>
                         </div>
                     </div>
                 </div>

                 <!-- Comments -->
                 <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="comments-tab">
                     <div class="row g-3">
                         <div class="col-12">
                             <label class="form-label fw-semibold">Comments</label>
                             <textarea name="comments" class="form-control" rows="3">{{ old('comments', $marketingDmar->comments ?? '') }}</textarea>
                         </div>
                     </div>
                 </div>

             </div>
         </div>
     </div>
 </div>
