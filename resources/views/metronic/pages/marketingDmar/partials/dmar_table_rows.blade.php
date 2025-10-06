@foreach ($dmars as $dmar)
    <tr>
        <td class="ps-3 text-center">
            <input type="checkbox" class="rowCheckbox form-check-input ps-3" name="ids[]" value="{{ $dmar->id }}">
        </td>
        <td class="ps-3">{{ \Carbon\Carbon::parse($dmar->date)->format('j M y') }}</td>
        <td>{{ $dmar->month }}</td>
        <td>{{ strtoupper($dmar->activity) }}</td>
        <td class="text-center">{{ $dmar->company }}</td>
        <td>{{ $dmar->service }}</td>
        <td class="text-center">{{ $dmar->products }}</td>
        <td>${{ number_format($dmar->tentative, 2) }}</td>
        <td>{{ $dmar->comments }}</td>
        <td>{{ $dmar->action_on_fail }}</td>
        <td>{{ $dmar->current_status }}</td>
        <td>{{ ucfirst($dmar->client_type) }}</td>
        <td>{{ $dmar->sector }}</td>
        <td>{{ $dmar->sub_sector }}</td>
        <td class="text-end pe-5">{{ $dmar->area }}</td>
    </tr>
@endforeach

@if ($dmars->isEmpty())
    <tr>
        <td colspan="15" class="text-center">No records found.</td>
    </tr>
@endif
