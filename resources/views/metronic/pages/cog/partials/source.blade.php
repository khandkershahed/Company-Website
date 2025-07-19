<div class="border table-responsive">
    <table class="table mb-0">
        <thead class="bg-primary">
            <tr class="text-center text-white fw-bold fs-6">
                <th scope="col">Sl</th>
                <th class="text-start">Item</th>
                <th>Source One</th>
                <th>Source One Price</th>
                <th>One Price Status</th>
                <th>Source Two</th>
                <th>Source Two Price</th>
                <th>Two Price Status</th>
                <!-- New Column -->
            </tr>
        </thead>
        <tbody>
            @foreach ($rfq->quotationProducts as $rfqProduct)
                @php
                    $sproduct = App\Models\Admin\Product::where('name', 'LIKE', '%' . $rfqProduct->product_name . '%')
                        ->where('product_status', 'product')
                        ->first([
                            'id',
                            'name',
                            'source_one_price',
                            'source_two_price',
                            'source_one_name',
                            'source_two_name',
                            'source_one_link',
                            'source_two_link',
                        ]);
                @endphp
                @if (!empty($sproduct))
                    <tr class="text-center tb-b-bottom">
                        <td>1</td>
                        <td class="text-start">
                            <a href="{{ route('product-sourcing.edit', $sproduct->id) }}" target="_blank"
                                rel="noopener noreferrer" title="{{ $sproduct->name }}">
                                {{ $sproduct->name }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ $sproduct->source_one_link }}" target="_blank" rel="noopener noreferrer">
                                {{ $sproduct->source_one_name }}
                            </a>
                        </td>
                        <td>$ {{ $sproduct->source_one_price }}</td>
                        <td>
                            $320
                            <i class="text-danger fas fa-arrow-down-short-wide"></i>
                        </td>
                        <td>
                            <a href="{{ $sproduct->source_two_link }}" target="_blank" rel="noopener noreferrer">
                                {{ $sproduct->source_two_name }}
                            </a>
                        </td>
                        <td>$ {{ $sproduct->source_two_price }}</td>
                        <td>
                            $320
                            <i class="text-success fas fa-arrow-up-short-wide"></i>
                        </td>
                        <!-- Difference -->
                    </tr>
                @else
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $rfqProduct->product_name }}</td>
                        <td colspan="6">
                            <h5 class="text-danger">Product is not in our website</h5>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
