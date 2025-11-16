<x-admin-app-layout :title="'All Expenses'">
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-info text-center">Expenses List</h3>
                <div class="card-toolbar">
                    <a href="{{ route('admin.expenses.create') }}"
                        class="btn btn-outline btn-outline-info btn-active-light-info">Add Expense</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table dataTable table-rounded table-striped table-hover border gy-7 gs-7">

                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>
