 <x-admin-app-layout :title="'Real Products (Approved )'">
     <div class="card card-flash">

         <div class="card-header">
             <div class="card-title">Real Products (Approved )</div>
             <div class="card-toolbar">

                 <a href="{{ route('product-sourcing.index') }}" class="btn btn-light-info">

                     <span class="svg-icon svg-icon-3">
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none">
                             <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5"
                                 fill="currentColor" />
                             <rect x="10.8891" y="17.8033" width="12" height="2" rx="1"
                                 transform="rotate(-90 10.8891 17.8033)" fill="currentColor" />
                             <rect x="6.01041" y="10.9247" width="12" height="2" rx="1"
                                 fill="currentColor" />
                         </svg>
                     </span>

                     Back to the list
                 </a>
             </div>
         </div>
         <div class="card-body pt-0">
             <div class="table-responsive">
                 <table id="productDt" class="table table-bordered table-striped text-center">
                     <thead>
                         <tr class="bg-secondary border-secondary text-white">
                             <th style="width: 3% !important;">SL</th>
                             <th style="width: 7% !important;">Image</th>
                             <th style="width: 45% !important;">Name</th>
                             <th style="width: 13% !important;">Added By</th>
                             <th style="width: 10% !important;">Price</th>
                             <th style="width: 10% !important;">Status</th>
                             <th style="width: 12% !important;">Actions</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($real_products as $product)
                             <tr>
                                 <td>{{ $loop->iteration }}</td>
                                 <td>
                                     <span>
                                         <img src="{{ !file_exists($product->thumbnail) ? url('upload/no_image.jpg') : asset($product->thumbnail) }}"
                                             width="40px" height="40px" style="border-radius: 50%;">
                                     </span>
                                 </td>
                                 <td class="text-start">{{ $product->name }}</td>
                                 <td>{{ $product->added_by }}</td>
                                 <td>
                                     @if ($product->price_status === 'rfq')
                                         <span
                                             class="text-black"><span>{{ ucfirst($product->price_status) }}</span></span>
                                     @else
                                         {{ ucfirst($product->price_status) }}
                                     @endif
                                 </td>
                                 <td>
                                     @if ($product->action_status === 'listed')
                                         <span class="text-success">{{ ucfirst($product->action_status) }}</span>
                                     @elseif ($product->action_status === 'rejected')
                                         <span class="text-danger">{{ ucfirst($product->action_status) }}</span>
                                     @else
                                         {{ ucfirst($product->action_status) }}
                                     @endif
                                 </td>
                                 <td>
                                     <a href="{{ route('product-sourcing.edit', $product->id) }}" class="text-primary me-4">
                                         <i class="fa-solid fa-pen-to-square dash-icons"></i>
                                     </a>
                                     <a href="{{ route('product-sourcing.destroy', [$product->id]) }}"
                                         class="text-danger delete">
                                         <i class="fa-solid fa-trash dash-icons text-danger"></i>
                                     </a>
                                 </td>
                             </tr>
                         @endforeach
                     </tbody>
                 </table>
             </div>
         </div>
     </div>

     @production
         @push('scripts')
             <script>
                 $(document).ready(function() {
                     $('#productDt').DataTable({
                         destroy: true, // <- This allows reinitialization safely
                         fixedHeader: {
                             header: true,
                             headerOffset: 5
                         },
                         language: {
                             lengthMenu: "Show _MENU_",
                         },
                         dom: "<'row mb-2'" +
                             "<'col-sm-6 d-flex align-items-center justify-content-start dt-toolbar'l>" +
                             "<'col-sm-6 d-flex align-items-center justify-content-end dt-toolbar'f>" +
                             ">" +
                             "<'table-responsive'tr>" +
                             "<'row'" +
                             "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                             "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                             ">",
                         iDisplayLength: 10,
                         lengthMenu: [10, 26, 30, 50],
                         columnDefs: [{
                             orderable: false,
                             targets: [1, 2, 3, 4, 5],
                         }, ],
                     });
                 });
             </script>
         @endpush
     @endonce

 </x-admin-app-layout>
