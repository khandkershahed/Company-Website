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
            <div class="table-responsive" style="max-height: 630px; overflow-y: auto;">
                <table class="table border rounded table-row-bordered dataTable" style="min-width: 120%;">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-3" width="3%">Sl</th>
                            <th width="14%">Status</th>
                            <th width="8%">Type</th>
                            <th width="10%">Responsible</th>
                            <th width="8%">Last Date</th>
                            <th width="5%">Day</th>
                            <th width="8%">Action</th>
                            <th width="7%">Participate</th>
                            <th width="8%">Value Tk.</th>
                            <th width="6%">Tender</th>
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
                                    <div class="dropdown">
                                        <a href="#" class="text-primary dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            {{ $tender->tender_status ?? '-' }}
                                        </a>
                                        <ul class="dropdown-menu text-center">
                                            <li>
                                                <a class="dropdown-item text-center fs-3 text-gray-900"
                                                    href="{{ route('admin.tender.edit', $tender->id) }}">Edit</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item text-center delete"
                                                    href="{{ route('admin.tender.destroy', $tender->id) }}"><i class="fas fa-trash text-danger fs-3"></i></a>
                                                {{-- <form action="{{ route('admin.tender.destroy', $tender->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this tender?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="dropdown-item text-danger">Delete</button>
                                                </form> --}}
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
                                <td>{{ $tender->title ?? '-' }}</td>
                                <td>{{ $tender->purchase ?? '-' }}</td>
                                <td>{{ $tender->tenderer ?? '-' }}</td>
                                <td>
                                    @if ($tender->tender_reference)
                                        <a href="#">{{ Str::limit($tender->tender_reference, 20) }}</a>
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
