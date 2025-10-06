 <x-admin-app-layout :title="'Add Tender Information'">
     <div class="card card-flash">
         <div class="mt-6 card-header">
             <div class="card-title">
                 <h4 class="mb-0 text-gray-800">
                     Add Tender Information
                 </h4>
             </div>

             <div class="card-toolbar">
                 <a href="{{ route('admin.tender.index') }}" class="btn btn-light-info">
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
                     Back to Tenders list
                 </a>
             </div>
         </div>
         <div class="pt-0 card-body">
             <form action="{{ route('admin.tender.store') }}" method="POST">
                 @csrf
                 @include('metronic.pages.tender.partials.form', ['users' => $users])
                 <div class="mt-3 text-end">
                     <button class="btn btn-primary">Create Tender</button>
                 </div>
             </form>
         </div>
     </div>
 </x-admin-app-layout>