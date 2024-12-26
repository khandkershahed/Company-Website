@extends('frontend.master')
@section('content')
    <section>
        <div class="container login-container">
            <div class="row justify-content-center align-items-center client-login-form">
                <form action="{{ route('forget.password.post') }}" method="POST">
                    @csrf
                    <div class="col-lg-10 offset-lg-1 mx-auto">
                        <div class="row card-container align-items-center">
                            <div class="col-lg-6 sign-in-form h-100 py-5 my-auto">
                                <div class="text-center">
                                    <h1 class="main-title">Forgot Password</h1>
                                </div>
                                <div class="px-5 pt-5 py-5">
                                    <div class="pt-4">
                                        <label for="" class="form-label">Email Address</label>
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text border-0" id="addon-wrapping"
                                                style="cursor: pointer; background-color: #ae0a46;"><i
                                                    class="fa-solid fa-envelope text-white"></i></span>
                                            <input type="email" class="form-control rounded-1 client-login-field"
                                                name="email" class="loginEmailInput" placeholder="your-email@mail.com"
                                                aria-label="your-email@mail.com" aria-describedby="addon-wrapping">
                                            <span class="email-login-message"></span>
                                        </div>
                                    </div>
                                    <div class="mt-5">
                                        <button type="submit" class="btn-color w-100">
                                            Reset Password
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 sign-in-area h-100 shadow-sm py-5 my-auto">
                                <div class="text-start ps-3 pe-2">
                                    <h1 class="main-title text-center">User Access Guide!</h1>
                                    <ul>
                                        <li class="pb-3 pt-3">
                                            <strong class="main_color">New User:</strong>
                                            Complete the form with the registered email & password to enter into client
                                            dashboard.
                                        </li>
                                        <li class="pb-3">
                                            <strong class="main_color">Forgot Password:</strong>
                                            Recover your password by following the instructions sent to your registered
                                            email
                                            address.
                                        </li>
                                        <li class="pb-3">
                                            <strong class="main_color">Already Registered:</strong>
                                            Registered user. If you are facing issues or have questions, please contact our
                                            support team.
                                        </li>
                                        <li class="pb-3">
                                            <strong class="main_color">Are Your Partner ?</strong>
                                            <a href="{{ route('partner.login') }}" class="text-primary">Click</a> To Login.
                                        </li>
                                    </ul>
                                    <div class="d-flex justify-content-center">
                                        <img height="350px" class="" src="{{ asset('images/userguide.png') }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
