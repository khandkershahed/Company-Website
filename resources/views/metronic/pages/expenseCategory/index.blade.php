<x-admin-app-layout :title="'All Expense Categories'">
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-info text-center"> List</h3>
                <div class="card-toolbar">
                    <a href="{{ route('admin.expense-categories.create') }}"
                        class="btn btn-outline btn-outline-info btn-active-light-info">Add </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table dataTable table-rounded table-striped table-hover border gy-7 gs-7">
                        <thead>
                            <tr>
                                <th width="5%">Id</th>
                                <th width="15%">Name</th>
                                <th width="10%">Status</th>
                                <th width="30%">Notes</th>
                                <th width="10%" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($expenseCategories)
                                @foreach ($expenseCategories as $key => $expenseCategorie)
                                    <tr>
                                        <td class="text-center">{{ ++$key }}</td>
                                        <td>{{ $expenseCategorie->name }}</td>
                                        <td>{{ $expenseCategorie->status }}</td>
                                        {{-- <td>No Comments</td> --}}
                                        <td class="text-center"><span
                                                class=" text-success">{{ $expenseCategorie->notes }}</span>
                                        </td>
                                        {{-- <td>To Day</td> --}}
                                        <td>
                                            <a class="text-primary" data-bs-toggle="modal"
                                                data-bs-target="#expenceCategory_{{ $expenseCategorie->id }}">
                                                <i class="fa-solid fa-pen-to-square me-2 p-1 rounded-circle text-white"
                                                    style="color: #247297 !important;"></i>
                                                {{-- Edit Expense Modal --}}
                                                <div id="expenceCategory_{{ $expenseCategorie->id }}" class="modal fade"
                                                    tabindex="-1">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h6 class="modal-title text-white">Edit Expense Category
                                                                </h6>
                                                                <a type="button" data-bs-dismiss="modal">
                                                                    <i class="ph ph-x text-white"
                                                                        style="font-weight: 800;font-size: 10px;"></i>
                                                                </a>
                                                            </div>
                                                            <div class="modal-body p-0 px-2">
                                                                <form
                                                                    action="{{ route('admin.expense-categories.update', $expenseCategorie->id) }}"
                                                                    method="post"
                                                                    class="from-prevent-multiple-submits pt-2">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="row">
                                                                        <div class="col-lg-12 d-flex pt-1">
                                                                            <label
                                                                                class="col-form-label col-lg-2 p-0 text-start text-black">Name</label>
                                                                            <div class="input-group">
                                                                                <input name="name"
                                                                                    value="{{ $expenseCategorie->name }}"
                                                                                    maxlength="50" type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    placeholder="Enter Your Name"
                                                                                    required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12 d-flex pt-1">
                                                                            <label
                                                                                class="col-form-label col-lg-2 p-0 text-start text-black">Status</label>
                                                                            <select name="status"
                                                                                class="form-control form-select-sm select"
                                                                                data-container-css-class="select-sm"
                                                                                data-minimum-results-for-search="Infinity"
                                                                                data-placeholder="Chose status"
                                                                                required>
                                                                                <option></option>
                                                                                <option @selected($expenseCategorie->status == 'active')
                                                                                    value="active">Active</option>
                                                                                <option @selected($expenseCategorie->status == 'in_active')
                                                                                    value="in_active">In Active</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-lg-12 d-flex pt-1">
                                                                            <label
                                                                                class="col-form-label col-lg-2 p-0 text-start text-black">Notes</label>
                                                                            <input name="notes"
                                                                                value="{{ $expenseCategorie->notes }}"
                                                                                type="text" maxlength="50"
                                                                                class="form-control form-control-sm"
                                                                                placeholder="Enter Your Notes" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer border-0 pt-3 pb-0 pe-0">
                                                                        <button type="button" class="submit_close_btn "
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="submit_btn from-prevent-multiple-submits"
                                                                            style="padding: 10px;">Submit</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Edit Tax Modal End --}}
                                            </a>
                                            <a href="{{ route('admin.expense-categories.destroy', $expenseCategorie->id) }}"
                                                class="text-danger delete">
                                                <i class="fa-solid fa-trash p-1 rounded-circle text-white"
                                                    style="color: #247297 !important;"></i>
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
