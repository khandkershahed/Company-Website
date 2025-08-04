@extends('frontend.master')
@section('content')
<div style="max-width:700px; margin:40px auto; background:#ffffff; border:1px solid #e1e1e1; box-shadow:0 4px 12px rgba(0,0,0,0.05); border-radius:8px; overflow:hidden; font-family:Segoe UI, Tahoma, Geneva, Verdana, sans-serif; color:#141414;">

    <!-- Header -->
    <div style="background-color:#ae0a46; padding:20px 30px; display:flex; flex-wrap:wrap; justify-content:space-between; align-items:center;">
        <div style="flex:1; min-width:120px;">
            <a href="https://ngenitltd.com" target="_blank">
                <img src="{{ asset('images/NGen-Logo-white.png') }}" alt="Ngen IT" title="Ngen IT" width="60" style="display:block;" />
            </a>
        </div>
        <div style="flex:1; min-width:120px; text-align:right;">
            <p style="font-size:24px; font-weight:600; color:#ffffff; margin:0;">RFQ</p>
        </div>
    </div>

    <!-- Greeting -->
    <div style="padding:20px 30px;">
        <h4 style="font-size:20px; margin:0 0 12px;">Dear {{ $customerName ?? 'Customer' }},</h4>
        <p style="font-size:16px; line-height:1.6; margin:0 0 10px;">
            We have received your query. Thank you for your interest! Our dedicated sales manager/consultant will contact you soon.
        </p>
    </div>

    <!-- Table (Responsive Wrapper) -->
    <div style="padding:0 30px 30px;">
        <div style="overflow-x:auto;">
            <table style="width:100%; border-collapse:collapse; font-size:16px; min-width:400px;">
                <thead>
                    <tr>
                        <th style="padding:12px; background-color:#f6f6f6; border:1px solid #ddd; text-align:left; color:#333;" width="85%">Product Name</th>
                        <th style="padding:12px; background-color:#f6f6f6; border:1px solid #ddd; text-align:left; color:#333;" width="15%">Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($rq_products) && count($rq_products))
                    @foreach ($rq_products as $rq_product)
                    <tr>
                        <td style="padding:12px; border:1px solid #eee;">{{ $rq_product->product_name }}</td>
                        <td style="padding:12px; border:1px solid #eee;">{{ $rq_product->qty }}</td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="2" style="padding:12px; border:1px solid #eee; text-align:center; color:#999;">
                            No products submitted.
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer -->
    <div style="padding:25px 30px; background-image:url('https://img.freepik.com/free-photo/white-painted-wall-texture-background_53876-138197.jpg'); background-size:cover; background-position:center;">
        <div style="display:flex; flex-wrap:wrap; gap:20px; justify-content:space-between;">
            <!-- Left -->
            <div style="flex:1; min-width:200px;">
                <p style="font-size:15px; font-weight:600; margin:0 0 6px; color:#000;">Thank You</p>
                <p style="font-size:15px; margin:0 0 4px; color:#ae0a46;">NGEN IT SALES TEAM</p>
                <p style="font-size:15px; margin:0; color:#ae0a46;">Manager, Business</p>
            </div>
            <!-- Right -->
            <div style="flex:1; min-width:200px; text-align:right;">
                <p style="font-size:15px; margin:0 0 5px; color:#ae0a46;">sales@ngenitltd.com</p>
                <p style="font-size:15px; margin:0 0 5px; color:#ae0a46;">(Skype) +1 917-720-3055</p>
                <p style="font-size:15px; margin:0; color:#ae0a46;">(WhatsApp) +880 1714 243446</p>
            </div>
        </div>
    </div>

</div>
@endsection