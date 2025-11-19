 <x-admin-app-layout :title="'Leave Application List'">
     <div class="container-xl">
         <div class="card">
             <div class="card-header">
                 <h3 class="card-title text-info text-center">Leave Application List</h3>
                 <div class="card-toolbar">
                     <a href="{{ route('admin.hrDashboard.index') }}"
                         class="btn btn-outline btn-outline-info btn-active-light-info">
                         HR Dashboard
                         <i class="fas fa-arrow-right ms-3"></i>
                     </a>
                 </div>
             </div>
             <div class="card-body">
                 <div class="table-responsive">
                     <table class="table dataTable table-rounded table-striped table-hover border gy-7 gs-7">
                         <thead >
                             <tr>
                                 <th width="8%" class="text-center">Sl:</th>
                                 <th width="25%">Applicant name</th>
                                 <th width="20%">Type Of Leave</th>
                                 <th width="15%">Designation</th>
                                 <th width="15%">Status</th>
                                 <th width="15%" class="text-center">Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             @if ($leaveApplications)
                                 @foreach ($leaveApplications as $leaveApplication)
                                     <tr>
                                         <td class="text-center">{{ $loop->iteration }}</td>
                                         <td>{{ $leaveApplication->name }}</td>
                                         <td>{{ $leaveApplication->type_of_leave }}</td>
                                         <td>{{ $leaveApplication->designation }}</td>
                                         <td>
                                             <span
                                                 class="badge bg-{{ optional($leaveApplication)->application_status == 'approved' ? 'success' : (optional($leaveApplication)->application_status == 'rejected' ? 'danger' : 'warning') }}">
                                                 {{ optional($leaveApplication)->application_status == 'approved' ? 'Approved' : (optional($leaveApplication)->application_status == 'rejected' ? 'Rejected' : ( Str::title(str_replace('_', ' ', $leaveApplication->application_status)))) }}
                                             </span>
                                         </td>
                                         <td class="text-center">
                                             <a href="{{ route('leave-application.edit', $leaveApplication->id) }}"
                                                 class="text-primary me-7">
                                                 <i class="fa-solid fa-pen-to-square dash-icons text-primary"></i>
                                             </a>
                                             <a href="{{ route('leave-application.destroy', $leaveApplication->id) }}"
                                                 class="text-danger delete">
                                                 <i class="fa-solid fa-trash dash-icons text-danger"></i>
                                             </a>
                                         </td>
                                     </tr>
                                 @endforeach
                             @endif
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>
 </x-admin-app-layout>
