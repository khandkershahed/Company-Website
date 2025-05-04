<x-admin-app-layout :title="'Job Post Edit'">
    <div class="card card-flash">
        <div class="card-header mt-6">
            <div class="card-title"></div>
            <div class="card-toolbar">
                <a href="{{ route('admin.job-post.index') }}" class="btn btn-light-info">
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

            <form class="form" action="{{ route('admin.job-post.update',$job->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-6 mb-7">
                        <x-metronic.label for="name"
                            class="col-form-label fw-bold fs-6 required">{{ __('Job Title') }}
                        </x-metronic.label>
                        <x-metronic.input id="name" type="text" name="name" :value="old('name',$job->name)"
                            placeholder="Enter the Job Title" required></x-metronic.input>
                    </div>
                    <div class="col-lg-6 mb-7">
                        <x-metronic.label for="link"
                            class="col-form-label fw-bold fs-6 required">{{ __('Job Link') }}
                        </x-metronic.label>
                        <x-metronic.input id="link" type="text" name="link" :value="old('link',$job->link)"
                            placeholder="Job Link" required></x-metronic.input>
                    </div>
                    <div class="col-lg-4 mb-7">
                        <x-metronic.label for="company_name"
                            class="col-form-label fw-bold fs-6 required">{{ __('Company Name') }}
                        </x-metronic.label>
                        <x-metronic.input id="company_name" type="text" name="company_name" :value="old('company_name',$job->company_name)"
                            placeholder="Enter the Company Name" required></x-metronic.input>
                    </div>
                    <div class="col-lg-4 mb-7">
                        <x-metronic.label for="category"
                            class="col-form-label fw-bold fs-6 required">{{ __('Job Category') }}
                        </x-metronic.label>
                        <x-metronic.input id="category" type="text" name="category" :value="old('category',$job->category)"
                            placeholder="Enter the Job Category" required></x-metronic.input>
                    </div>

                    <div class="col-lg-4 mb-7">
                        <x-metronic.label for="experience"
                            class="col-form-label fw-bold fs-6 required">{{ __('Experience') }}
                        </x-metronic.label>
                        <x-metronic.input id="experience" type="text" name="experience" :value="old('experience',$job->experience)"
                            placeholder="Enter the Experience" required></x-metronic.input>
                    </div>
                    <div class="col-lg-4 mb-7">
                        <x-metronic.label for="vacancy"
                            class="col-form-label fw-bold fs-6 required">{{ __('Number of Vacancies') }}
                        </x-metronic.label>
                        <x-metronic.input id="vacancy" type="text" name="vacancy" :value="old('vacancy',$job->vacancy)"
                            placeholder="Number of Vacancies" required></x-metronic.input>
                    </div>
                    <div class="col-lg-4 mb-7">
                        <x-metronic.label for="deadline"
                            class="col-form-label fw-bold fs-6 required">{{ __('Dead Line') }}
                        </x-metronic.label>
                        <x-metronic.input id="deadline" type="date" name="deadline" :value="old('deadline',$job->deadline)"
                            placeholder="Dead Line" required></x-metronic.input>
                    </div>

                    <div class="col-lg-12 mb-7">
                        <x-metronic.label for="description"
                            class="col-form-label fw-bold fs-6 required">{{ __('Job Description') }}
                        </x-metronic.label>
                        <textarea name="description" id="tinymce-editor" rows="8" class="mb-2 form-control" placeholder="Description">{{ old('description', $job->description) }}
                        </textarea>
                    </div>
                </div>
                <div class="text-center pt-15">
                    <x-metronic.button type="submit" class="primary">
                        {{ __('Submit') }}
                    </x-metronic.button>
                </div>

            </form>

        </div>
    </div>
</x-admin-app-layout>
