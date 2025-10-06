@php
    // Define tab-wise datasets
    $tabTenders = [
        'all_tenders' => $tenders,
        'live' => $live_tenders,
        'participating' => $participating_tenders,
        'submitted' => $submitted_tenders,
        'won_tenders' => $won_tenders,
        'lost_tenders' => $lost_tenders,
    ];
@endphp

<div class="px-0 tab-content">
    @foreach ($tabTenders as $tabId => $tabData)
        <div class="tab-pane fade {{ $loop->first ? 'active show' : '' }}" id="{{ $tabId }}" role="tabpanel">
            <div class="table-responsive" style="">
                <table class="table border rounded table-row-bordered dataTable" style="min-width: 120%;">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-3" width="3%">Sl</th>
                            <th width="14%">Title</th>
                            <th width="6%">Type</th>
                            <th width="8%">Responsible</th>
                            <th width="7%">Last Date</th>
                            <th width="5%">Day</th>
                            <th width="8%">Action</th>
                            <th width="7%">Participate</th>
                            <th width="7%">Value</th>
                            <th width="6%">Security</th>
                            <th width="7%">Purchased</th>
                            <th width="8%">Tenderer</th>
                            <th width="8%">Reference</th>
                            <th width="10%" colspan="3" class="text-center">Submission</th>
                        </tr>
                        <tr class="bg-white">
                            <th colspan="13"></th>
                            <th title="Hardcopy Reference Number">Hardcopy</th>
                            <th title="Submission via Email or Online">E/O</th>
                            <th title="e-Government Procurement ID" class="pe-3">eGP</th>
                        </tr>
                    </thead>
                    <tbody style="color: #7B7B7B;">
                        @forelse ($tabData as $index => $tender)
                            <tr>
                                <td class="ps-3">{{ $index + 1 }}</td>
                                <td>
                                    <div class="dropdown"
                                        style="width: 150px; white-space: normal; word-break: break-word;">
                                        <a href="#" class="text-primary dropdown-toggle d-block text-truncate"
                                            style="white-space: normal; word-break: break-word;"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            {{ $tender->title ?? '-' }}
                                        </a>
                                        <ul class="dropdown-menu text-center">
                                            <li class="pb-2" style="border-bottom: 1px dashed #E4E6EF;">
                                                <a class="dropdown-item text-center fs-3 text-gray-900"
                                                    href="{{ route('admin.tender.edit', $tender->id) }}">Edit</a>
                                            </li>
                                            <li class="pt-2">
                                                <a class="dropdown-item text-center delete"
                                                    href="{{ route('admin.tender.destroy', $tender->id) }}">
                                                    <i class="fas fa-trash text-danger fs-3"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>

                                <td>{{ $tender->tender_type ?? '-' }}</td>
                                <td>{{ $tender->responsiblePerson->name ?? '-' }}</td>
                                <td>{{ $tender->last_date_of_submission ? \Carbon\Carbon::parse($tender->last_date_of_submission)->format('d.m.y') : '-' }}
                                </td>
                                <td>{{ $tender->submission_day ?? '-' }}</td>
                                <td>{{ $tender->action ?? '-' }}</td>
                                <td>{{ $tender->participate ?? '-' }}</td>
                                <td>{{ $tender->schedule_value_tk ? number_format($tender->schedule_value_tk, 2) : '-' }}
                                </td>
                                <td>{{ $tender->security ?? '-' }}</td>
                                <td>{{ $tender->purchase ?? '-' }}</td>
                                <td>{{ $tender->tenderer ?? '-' }}</td>
                                <td>
                                    @php
                                        $reference = $tender->tender_reference;
                                        $url = $reference
                                            ? (Str::startsWith($reference, ['http://', 'https://'])
                                                ? $reference
                                                : 'https://' . $reference)
                                            : null;
                                    @endphp
                                    @if ($reference)
                                        <a href="{{ $url }}" target="_blank">
                                            {{ Str::limit($reference, 20) }}
                                        </a>
                                    @else
                                        -
                                    @endif

                                </td>
                                <td>{{ $tender->mode_of_submission ?? '-' }}</td>
                                <td>{{ $tender->submission_medium ?? '-' }}</td>
                                <td>{{ $tender->egp_id ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="16" class="text-center text-muted py-5">No tenders found for this
                                    category.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
</div>
