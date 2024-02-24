@extends('frontend.master')

@section('styles')
    <link rel="stylesheet" href="{{ asset('path/to/your/external/style.css') }}">
    <style>
        .sign-in-form {
            background-color: #ffff;
        }

        .sign-in-area {
            background-color: #f2f2f2;
        }

        .subtitle {
            font-size: 17px;
        }

        .main-title {
            font-size: 32px;
            font-weight: bold;
        }

        label {
            font-size: 17px;
        }

        .main-container {}

        .client-login-field {
            background-color: white !important;
            border: 1px solid #eee !important;
        }

        .card-container {
            box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
        }

        .client-login-form {
            height: 90vh;
        }
    </style>
@endsection

@section('content')
    <div class="container login-container">
        <div class="row justify-content-center align-items-center client-login-form">
            <form action="{{ route('client.loginstore') }}" method="POST">
                @csrf
                <div class="col-lg-10 offset-lg-1 mx-auto">
                    <div class="row card-container">
                        <div class="col-lg-6 sign-in-form shadow-sm py-5">
                            <div class="text-center">
                                <h1 class="main-title">Sign In</h1>
                                <h3 class="text-center py-3">Welcome Back !</h3>
                                <p class="subtitle pt-2">Use Your <span class="main_color">NGen It </span>Registered <br>
                                    Email
                                    and Password</p>
                            </div>
                            <div class="px-5 pt-5">
                                <div class="pt-4">
                                    <label for="" class="form-label">Email Address</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text border-0" id="addon-wrapping"
                                            style="cursor: pointer; background-color: #ae0a46;"><i
                                                class="fa-solid fa-envelope text-white"></i></span>
                                        <input type="email" class="form-control rounded-1 client-login-field"
                                            name="email" placeholder="your-email@mail.com"
                                            aria-label="your-email@mail.com" aria-describedby="addon-wrapping">
                                    </div>
                                </div>
                                <div class="pt-4">
                                    <label for="" class="form-label">Password</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text border-0 toggle-password" toggle="#password"
                                            id="addon-wrapping" style="cursor: pointer; background-color: #ae0a46;"><i
                                                class="fa-solid fa-eye-slash text-white"></i></span>
                                        <input type="password" id="password" name="password"
                                            class="form-control rounded-1 client-login-field"
                                            placeholder="*******************" aria-label="Password"
                                            aria-describedby="addon-wrapping">
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <button type="submit" class="btn-color w-100">
                                        Login
                                    </button>
                                </div>
                                <div class="text-center pt-5">
                                    <p class="subtitle m-0">Forgot Your Password? <a href="" class="main_color">
                                            Recover It!</a></p>
                                    <p class="subtitle m-0 show-register">New Here? Then<a href="javascript:void()"
                                            class="main_color"> Register
                                            Now!</a>
                                    </p>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6 sign-in-area shadow-sm py-5">
                            <div class="text-start ps-3 pe-2">
                                <h1 class="main-title text-center">User Board</h1>
                                <ul>
                                    <li class="pb-3 pt-3">
                                        <strong class="main_color">New User:</strong>
                                        Complete the form with the registered email & password to enter into client
                                        dashboard.
                                    </li>
                                    <li class="pb-3">
                                        <strong class="main_color">Forgot Password:</strong>
                                        Recover your password by following the instructions sent to your registered email
                                        address.
                                    </li>
                                    <li class="pb-3">
                                        <strong class="main_color">Already Registered:</strong>
                                        Registered user. If you are facing issues or have questions, please contact our
                                        support
                                        team.
                                    </li>
                                    <li class="pb-3">
                                        <strong class="main_color">Are Your Partner ?:</strong>
                                        <a href="" class="text-primary">Click</a> To Partner Login
                                    </li>
                                </ul>

                                <div>
                                    <img class="img-fluid" src="https://i.ibb.co/Tgd1zfd/Client-Login.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="container register-container" style="display: none;">
        <div class="row justify-content-center align-items-center client-login-form">
            <form action="" method="get">
                <div class="col-lg-10 offset-lg-1 mx-auto">
                    <div class="row card-container">
                        <div class="col-lg-6 sign-in-form shadow-sm py-3">
                            <div class="text-center">
                                <h1 class="main-title">Register</h1>
                            </div>
                            <div class="px-5 pt-2">
                                <div class="pt-2">
                                    <label for="" class="form-label">Name</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text border-0" id="addon-wrapping"
                                            style="cursor: pointer; background-color: #ae0a46;"><i
                                                class="fa-solid fa-envelope text-white"></i></span>
                                        <input type="email" class="form-control rounded-1 client-login-field"
                                            placeholder="your-email@mail.com" aria-label="your-email@mail.com"
                                            aria-describedby="addon-wrapping">
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <label for="" class="form-label">Email</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text border-0" id="addon-wrapping"
                                            style="cursor: pointer; background-color: #ae0a46;"><i
                                                class="fa-solid fa-envelope text-white"></i></span>
                                        <input type="email" class="form-control rounded-1 client-login-field"
                                            placeholder="your-email@mail.com" aria-label="your-email@mail.com"
                                            aria-describedby="addon-wrapping">
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <label for="" class="form-label">Phone</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text border-0" id="addon-wrapping"
                                            style="cursor: pointer; background-color: #ae0a46;"><i
                                                class="fa-solid fa-envelope text-white"></i></span>
                                        <input type="email" class="form-control rounded-1 client-login-field"
                                            placeholder="your-email@mail.com" aria-label="your-email@mail.com"
                                            aria-describedby="addon-wrapping">
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <label for="" class="form-label">Password</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text border-0 toggle-password" toggle="#password"
                                            id="addon-wrapping" style="cursor: pointer; background-color: #ae0a46;"><i
                                                class="fa-solid fa-eye-slash text-white"></i></span>
                                        <input type="password" id="password"
                                            class="form-control rounded-1 client-login-field"
                                            placeholder="*******************" aria-label="Password"
                                            aria-describedby="addon-wrapping">
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <label for="" class="form-label">Confirm Password</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text border-0 toggle-password" toggle="#password"
                                            id="addon-wrapping" style="cursor: pointer; background-color: #ae0a46;"><i
                                                class="fa-solid fa-eye-slash text-white"></i></span>
                                        <input type="password" id="password"
                                            class="form-control rounded-1 client-login-field"
                                            placeholder="*******************" aria-label="Password"
                                            aria-describedby="addon-wrapping">
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <button type="submit" class="btn-color w-100">
                                        Login
                                    </button>
                                </div>
                                <div class="text-center pt-4">
                                    <p class="subtitle m-0 show-login">Already Have and Account? <br> Then<a
                                            href="javascript:void()" class="main_color"> Login
                                            Now!</a>
                                    </p>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6 sign-in-area shadow-sm py-5">
                            <div class="text-start ps-3 pe-2">
                                <h1 class="main-title text-center">User Board</h1>
                                <ul>
                                    <li class="pb-3 pt-3">
                                        <strong class="main_color">New User:</strong>
                                        Complete the form with the registered email & password to enter into client
                                        dashboard.
                                    </li>
                                    <li class="pb-3">
                                        <strong class="main_color">Forgot Password:</strong>
                                        Recover your password by following the instructions sent to your registered email
                                        address.
                                    </li>
                                    <li class="pb-3">
                                        <strong class="main_color">Already Registered:</strong>
                                        Registered user. If you are facing issues or have questions, please contact our
                                        support
                                        team.
                                    </li>
                                    <li class="pb-3">
                                        <strong class="main_color">Are Your Partner ?:</strong>
                                        <a href="" class="text-primary">Click Here !</a> To Partner Login
                                    </li>
                                </ul>

                                <div>
                                    <img class="img-fluid" src="https://i.ibb.co/Tgd1zfd/Client-Login.png"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Function to toggle password visibility
            $('.toggle-password').click(function() {
                var input = $($(this).attr('toggle'));
                var icon = $(this).find('i');

                // Toggle password visibility
                input.attr('type', input.attr('type') === 'password' ? 'text' : 'password');

                // Toggle eye icon based on password visibility
                if (input.attr('type') === 'password') {
                    icon.removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    icon.removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Show register container on click
            $(".show-register").click(function() {
                $(".login-container").hide();
                $(".register-container").show();
            });

            // Show login container on click
            $(".show-login").click(function() {
                $(".register-container").hide();
                $(".login-container").show();
            });
        });
    </script>
@endsection
