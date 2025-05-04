@extends('frontend.master')
@section('content')
    <style>
        ul li {
            list-style-type: disc;
        }
        ul{
            margin-left: 3rem;
        }
        .job_details {
            border: 1px solid #eee;
            background-color: #f7f7f7;
            padding: 10px 2rem;
        }
    </style>
    <!--========// Single blog content //=======-->
    <section class="container">
        <div class="row pt-4">
            <div class="col-lg-10 col-sm-12 offset-1 job_details">
                <!--==// Job Details //==-->
                <div class="job_details_content_wrapper p-5">
                    <!--==// Title //==-->
                    {{-- <div class="d-flex justify-content-lg-end justify-content-sm-center">
                    </div> --}}
                    <div class="d-flex  justify-content-between">
                        <h3 class="text-success">{{ $job->name }}</h3>
                        <p class="pt-2"><strong>Category: </strong>{{ $job->category }}</p>

                    </div>
                    <div class="d-flex justify-content-lg-start justify-content-sm-center">
                        <h5>{{ $job->company_name }}</h5>
                    </div>
                    <div class="d-flex justify-content-lg-end justify-content-sm-center">
                        <a class="main_color fw-bold" href="{{ route('job.openings') }}">View all jobs of this company</a>
                    </div>
                    <!--==// Content //==-->
                    <div class="job_details_content">
                        <div>
                            <h6>Vacancy</h6>
                            <p>{{ $job->vacancy }}</p>
                        </div>
                        <div>
                            <p>{!! ($job->description) !!}</p>
                        </div>


                        <!--==// Apply Button //==-->
                        <div class="job_apply_button">
                            <p><strong>Want to learn more about job sector? </strong><a href="#">Watch our virtual
                                    roundtable discussion with Groves and hear more details straight from the source.</a>
                            </p>
                            @if (Auth::guard('client')->user())
                                @if (App\Models\Admin\JobRegistration::where('client_id', Auth::guard('client')->user()->id)->count() > 0)
                                    <div class="d-flex justify-content-center mt-4">
                                        <a href="{{ route('job.apply') }}"
                                            class="common_button2 text-white bg-success">Apply</a>
                                    </div>
                                @else
                                    <div class="d-flex justify-content-center mt-4">
                                        <p>You haven't Registered for this job yet. Go to
                                            <a href="{{ route('job.registration') }}"><strong class="main_color">Job
                                                    Registration</strong>
                                            </a>
                                        </p>
                                    </div>
                                @endif
                            @else
                                <div class="d-flex justify-content-center mt-4">
                                    <p>You are not logged in. To Apply for this Job, First <a
                                            href="{{ route('job-applicant.login') }}"><strong class="main_color">Log
                                                In</strong></a></p>
                                </div>
                            @endif
                            <div class="d-flex justify-content-center mt-4">
                                <p>Application Deadline : <strong> {{ $job->deadline }}</strong></p>
                            </div>
                        </div>
                    </div>


                </div>
                <!---==/// Discover more ///===--->

            </div>

    </section><br>
    <!-----End------>
@endsection
