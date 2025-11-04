<ul class="nav nav-tabs border-0 d-flex align-items-center">
    <!-- RFQ List Tab -->
    <li class="nav-item mb-0 me-1">
        <a class="nav-link {{ Route::current()->getName() == 'admin.rfq.list' ? 'active' : '' }}" href="{{ route('admin.rfq.list') }}">
            Client's RFQ List
        </a>
    </li>

    <!-- Deals List Tab -->
    <li class="nav-item mb-0 me-1">
        <a class="nav-link {{ Route::current()->getName() == 'admin.deal.list' ? 'active' : '' }}" href="{{ route('admin.deal.list') }}">
            Deals List
        </a>
    </li>
</ul>
