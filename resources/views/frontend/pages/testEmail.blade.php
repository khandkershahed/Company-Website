@extends('frontend.master')
@section('content')
    <div class="container">

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Send Test Email</h2>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('email.send') }}">
                    @csrf
                    <div class="mb-5">
                        <label for="email" class="form-label">Recipient Email Address <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-5">
                        <label for="message" class="form-label">Message <span class="text-danger">*</span></label>
                        <input type="message" name="message" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Send Test Email</button>
                </form>
            </div>
        </div>
    </div>
@endsection
