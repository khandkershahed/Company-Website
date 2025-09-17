@extends('frontend.master')
@section('content')
    <div class="container">

        <div class="card my-5">
            <div class="card-header">
                <h2 class="card-title">Send Test Email</h2>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="POST" action="{{ route('email.send') }}">
                            @csrf
                            <div class="mb-5">
                                <label for="email" class="form-label">Recipient Email Address <span
                                        class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-5">
                                <label for="message" class="form-label">Message <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="message" id="message" rows="10" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-info border-0">Send Test Email</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
