@php
    // $currentUrl = "https://www.ngenitltd.com/admin/single-rfq/" . $rfq->rfq_code . "/quotation";
    $currentUrl = url('admin/single-rfq/' . $rfq->rfq_code . '/quotation');
    $whatsappLink = 'https://wa.me/?text=' . urlencode('Check out this quotation: ' . $currentUrl);
@endphp

<!-- Create a button or link to share via WhatsApp -->
<a href="{{ $whatsappLink }}" target="_blank" class="btn btn-sm fw-bold btn-primary rfqs-btns">
    <i class="fa-regular fa-circle-check pe-2"></i>Share on WhatsApp
</a>
