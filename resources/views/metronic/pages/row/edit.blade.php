 <x-admin-app-layout :title="'Row Create'">
     <style>
         .nav-item .active {
             background: rgb(119, 5, 129);
             color: rgb(255, 255, 255) !important;
         }
     </style>
     <div class="row">
         <div class="col-lg-12">
             <div class="mt-4 border-0 shadow-sm card rounded-3">

                 {{-- ===== Header Section ===== --}}
                 <div class="p-8 border-0 card-header d-flex justify-content-between align-items-center bg-light">
                     <div>
                         <h4 class="mb-0 fw-bold text-dark">Edit Row</h4>
                     </div>

                     <a href="{{ route('admin.row.index') }}"
                         class="d-flex align-items-center btn btn-light-info fw-semibold">
                         <i class="fa-solid fa-arrow-left me-2"></i> Back to List
                     </a>
                 </div>

                 {{-- ===== Form Section ===== --}}


                 <div class="card-body">
                     @if (!empty($row->list_title))
                         <div>
                             <form id="myform2" method="post" action="{{ route('admin.row.update', $row->id) }}"
                                 enctype="multipart/form-data">
                                 @csrf
                                 @method('PUT')
                                 <!--Banner Section-->
                                 <div class="container">
                                     <div class="row rounded-0 mx-1 mb-7">
                                         <div class="col p-1">
                                             <div class="d-flex align-items-center pt-1">
                                                 <label
                                                     class="col-form-label col-lg-2 p-0 text-start text-black">Badge</label>
                                                 <div class="input-group">
                                                     <input name="badge" type="text" maxlength="250"
                                                         class="form-control form-control-sm" placeholder="Enter Badge"
                                                         value="{{ $row->badge }}">
                                                 </div>
                                             </div>
                                             {{--  --}}
                                         </div>
                                         <div class="col p-1">
                                             <div class="d-flex align-items-center pt-1">
                                                 <label
                                                     class="col-form-label col-lg-2 p-0 text-start text-black">Title</label>
                                                 <div class="input-group">
                                                     <input name="title" type="text"
                                                         class="form-control form-control-sm"
                                                         placeholder="Enter Image With Row Title"
                                                         value="{{ $row->title }}">
                                                 </div>
                                             </div>
                                             {{--  --}}
                                         </div>
                                     </div>
                                     <div class="row g-2 pb-1">
                                         <div class="col p-2">

                                             <div class="px-2 py-2 rounded-0 bg-light">
                                                 {{--  --}}
                                                 <div class="form-group pb-3">
                                                     <label class="form-label">List
                                                         Description</label>
                                                     <textarea class="form-control ckeditor" name="short_des" rows="30" id="common"
                                                         style=" font-size: 12px; font-weight: 500;">{!! $row->short_des !!}</textarea>

                                                 </div>
                                             </div>
                                         </div>
                                         <div class="col p-2">
                                             <span class="mt-1 fw-bold text-info">Row List Description
                                                 Area</span>
                                             <div class="px-2 py-2 rounded-0 bg-light">

                                                 <div class="d-flex align-items-center pt-1">
                                                     <label
                                                         class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">List
                                                         Title</label>
                                                     <div class="input-group">
                                                         <input name="list_title" type="text" maxlength="250"
                                                             class="form-control form-control-sm"
                                                             placeholder="Enter List Title"
                                                             value="{{ $row->list_title }}">
                                                     </div>
                                                 </div>
                                                 {{--  --}}
                                                 <div class="d-flex align-items-center pt-1">
                                                     <label
                                                         class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">List
                                                         Title One</label>
                                                     <div class="input-group">
                                                         <input name="list_one" type="text" maxlength="250"
                                                             class="form-control form-control-sm"
                                                             placeholder="Enter List Title One"
                                                             value="{{ $row->list_one }}">
                                                     </div>
                                                 </div>
                                                 {{--  --}}
                                                 <div class="d-flex align-items-center pt-1">
                                                     <label
                                                         class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">List
                                                         Title Two</label>
                                                     <div class="input-group">
                                                         <input name="list_two" type="text" maxlength="250"
                                                             class="form-control form-control-sm"
                                                             placeholder="Enter List Title Two"
                                                             value="{{ $row->list_two }}">
                                                     </div>
                                                 </div>
                                                 {{--  --}}
                                                 <div class="d-flex align-items-center pt-1">
                                                     <label
                                                         class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">List
                                                         Title Three</label>
                                                     <div class="input-group">
                                                         <input name="list_three" type="text" maxlength="250"
                                                             class="form-control form-control-sm"
                                                             placeholder="Enter List Title Three"
                                                             value="{{ $row->list_three }}">
                                                     </div>
                                                 </div>
                                                 {{--  --}}
                                                 <div class="d-flex align-items-center pt-1">
                                                     <label
                                                         class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">List
                                                         Title Four</label>
                                                     <div class="input-group">
                                                         <input name="list_four" type="text" maxlength="250"
                                                             class="form-control form-control-sm"
                                                             placeholder="Enter List Title Four"
                                                             value="{{ $row->list_four }}">
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="border-0 pb-0 pe-0">
                                     <button type="submit" class="btn btn-primary from-prevent-multiple-submits"
                                         style="padding: 6px 9px;" id="submitbtn">Submit</button>
                                 </div>
                             </form>
                         </div>
                     @else
                         <div>
                             <form id="myform1" method="post" action="{{ route('admin.row.update', $row->id) }}"
                                 enctype="multipart/form-data">
                                 @csrf
                                 @method('PUT')
                                 <div class="card pb-1">
                                     <!--Banner Section-->
                                     <div class="container">
                                         <div class="mt-2">
                                             <span class="fw-bold text-info ms-1"></span>
                                         </div>
                                         <div class="row rounded-0 mx-1">
                                             <div class="col-lg-4 p-1">
                                                 <div class="d-flex align-items-center">
                                                     <label
                                                         class="col-form-label col-lg-2 p-0 text-start text-black ">Badge</label>
                                                     <div class="input-group">
                                                         <input name="badge" type="text" maxlength="250"
                                                             class="form-control form-control-sm"
                                                             placeholder="Enter Badge" value="{{ $row->badge }}">
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="col-lg-8 p-1">
                                                 <div class="d-flex align-items-center">
                                                     <label
                                                         class="col-form-label col-lg-2 p-0 text-start text-black">Title</label>
                                                     <div class="input-group">
                                                         <input name="title" type="text"
                                                             class="form-control form-control-sm"
                                                             placeholder="Enter Image With Row Title"
                                                             value="{{ $row->title }}">
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>

                                         <div class="row gx-2 pb-1 ">
                                             <div class="col-lg-7 p-2">
                                                 <span class="mt-1 fw-bold text-info">Image Info Area</span>
                                                 <div class="px-2 py-2 rounded-0 bg-light">
                                                     <div class="pt-1">
                                                         <label
                                                             class="col-form-label label_style col-lg-2 p-0 text-start text-black w-100">Description</label>
                                                         <textarea class="form-control ckeditor form-control-sm" name="description" id="long_desc"
                                                             style=" font-size: 12px; font-weight: 500;" rows="2" cols="60">{!! $row->description !!}</textarea>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="col-lg-5 p-2">
                                                 <span class="mt-1 fw-bold text-info">Image Area</span>
                                                 <div class="px-2 py-2 rounded-0 bg-light">
                                                     <div class="d-flex align-items-center pt-1">
                                                         <label
                                                             class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                                             Image</label>
                                                         <div class="input-group">
                                                             <input name="image" id="image" accept="image/*"
                                                                 type="file"
                                                                 class="form-control w-100 form-control-sm"
                                                                 placeholder="Enter Row Image">
                                                             <div class="form-text">Accepts only png, jpg, jpeg images
                                                             </div>
                                                             <img id="showImage" height="100px" width="100px"
                                                                 src="{{ asset('storage/' . $row->image) }}"
                                                                 alt="">
                                                         </div>
                                                     </div>
                                                     {{--  --}}
                                                     <div class="d-flex align-items-center pt-1">
                                                         <label
                                                             class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                                             Button Name</label>
                                                         <div class="input-group">
                                                             <input name="btn_name" type="text" maxlength="250"
                                                                 class="form-control form-control-sm"
                                                                 placeholder="Enter Row Button Name"
                                                                 value="{{ $row->btn_name }}">
                                                         </div>
                                                     </div>
                                                     {{--  --}}
                                                     <div class="d-flex align-items-center pt-1">
                                                         <label
                                                             class="col-form-label label_style col-lg-2 p-0 text-start text-black label_style">Row
                                                             Button Link</label>
                                                         <div class="input-group">
                                                             <input name="link" type="url" maxlength="250"
                                                                 class="form-control form-control-sm"
                                                                 placeholder="Enter Row Button Link"
                                                                 value="{{ $row->link }}">
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="modal-footer border-0 pb-0 pe-0">

                                     <button type="submit" class="btn btn-primary from-prevent-multiple-submits"
                                         style="padding: 6px 9px;" id="submitbtn">Submit</button>
                                 </div>
                             </form>
                         </div>
                     @endif
                 </div>
             </div>
         </div>
     </div>
 </x-admin-app-layout>
