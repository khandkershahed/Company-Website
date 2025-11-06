<x-admin-app-layout :title="'Edit Your Marketing DMAR'">
    <div class="card card-flash">
        <div class="py-4 card-header">
            <div class="card-title">
                <h1 class="mb-0 text-gray-800">
                    Edit Your Marketing DMAR
                </h1>
            </div>

            <div class="card-toolbar">
                <a href="{{ route('admin.marketing-dmar.index') }}" class="btn btn-light-info">
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
                    Back to DMAR list
                </a>
            </div>
        </div>
        <div class="pt-0 card-body">
            <form action="{{ route('admin.marketing-dmar.update', $marketingDmar->id) }}" method="POST">
                @csrf
                @method('PUT')
                @include('metronic.pages.marketingDmar.partials.form',['marketingDmar' => $marketingDmar])
                <div class="mt-3 text-end">
                    <button class="btn btn-primary">Update DMAR</button>
                </div>
            </form>
        </div>
    </div>
</x-admin-app-layout>
