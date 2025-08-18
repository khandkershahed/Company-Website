@extends('frontend.master')

@section('styles')
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

    input::placeholder {
        font-size: 16px;
    }

    .form-control {
        display: block;
        width: 100%;
        padding: 13px 11px 8px !important;
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
                                Email and Password</p>
                        </div>
                        <div class="px-5 pt-5">
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
                            <div class="pt-4">
                                <label for="" class="form-label">Password</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text border-0 toggle-passwordlogin" toggle="#passwordLogin"
                                        id="addon-wrapping" style="cursor: pointer; background-color: #ae0a46;"><i
                                            class="fa-solid fa-eye-slash text-white"></i></span>
                                    <input type="password" name="password" required id="passwordLogin"
                                        class="form-control rounded-1 client-login-field loginPasswordInput"
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
                                <p class="subtitle m-0">Forgot Your Password?
                                    <a href="{{ route('forget.password.get') }}" class="main_color">
                                        Click Here!</a>
                                </p>
                                <p class="subtitle m-0 show-register">New Here? <a href="javascript:void()"
                                        class="main_color"> Register Now!</a>
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6 sign-in-area shadow-sm py-5">
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
                                    Recover your password by following the instructions sent to your registered email
                                    address.
                                </li>
                                <li class="pb-3">
                                    <strong class="main_color">Already Registered:</strong>
                                    Registered user. If you are facing issues or have questions, please contact our
                                    support team.
                                </li>
                                <li class="pb-3">
                                    <strong class="main_color">Partner Register ?</strong>
                                    <a href="{{ route('partner.login') }}" class="text-primary">Click Here.</a>
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
<div class="container register-container" style="display: none;">
    <div class="row justify-content-center align-items-center client-login-form">
        <form action="{{ route('clientRegister.store') }}" method="POST">
            @csrf
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
                                            class="fa-solid fa-user text-white"></i></span>

                                    <input type="hidden" name="user_type" value="client">


                                    <input type="text" name="name" placeholder="Full name"
                                        value="{{ old('name') }}" maxlength="35" minlength="3"
                                        class="form-control rounded-1 client-login-field" required>
                                </div>
                            </div>
                            <div class="pt-2">
                                <label for="" class="form-label">Email</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text border-0" id="addon-wrapping"
                                        style="cursor: pointer; background-color: #ae0a46;"><i
                                            class="fa-solid fa-envelope text-white"></i></span>
                                    <input type="email" class="form-control rounded-1 client-login-field"
                                        placeholder="your-email@mail.com" name="email" value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="pt-2">
                                <label for="phone" class="form-label">Phone</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text border-0" id="addon-wrapping"
                                        style="cursor: pointer; background-color: #ae0a46;">
                                        <i class="fa-solid fa-phone text-white"></i>
                                    </span>
                                    <input type="text"
                                        class="form-control rounded-1 client-login-field phone-number" id="phone"
                                        placeholder="015****" name="phone" value="{{ old('phone') }}" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid phone number.
                                    </div>
                                </div>
                            </div>
                            <div class="pt-2">
                                <label for="" class="form-label">Password</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text border-0 toggle-password" toggle="#password"
                                        id="addon-wrapping" style="cursor: pointer; background-color: #ae0a46;"><i
                                            class="fa-solid fa-eye-slash text-white"></i></span>
                                    <input type="password" id="password" value="{{ old('password') }}"
                                        class="form-control rounded-1 client-login-field" name="password"
                                        placeholder="*******************" aria-label="Password"
                                        aria-describedby="addon-wrapping">
                                </div>
                            </div>
                            <div class="pt-2">
                                <label for="" class="form-label">Confirm Password</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text border-0 toggle-password-2"
                                        toggle="#passwordConfirm" id="addon-wrapping"
                                        style="cursor: pointer; background-color: #ae0a46;"><i
                                            class="fa-solid fa-eye-slash text-white"></i></span>
                                    <input type="password" id="passwordConfirm" name="password_confirmation"
                                        class="form-control rounded-1 client-login-field"
                                        placeholder="*******************" aria-label="Password"
                                        aria-describedby="addon-wrapping">
                                </div>
                            </div>

                            <div class="mt-5">
                                <button type="submit" class="btn-color w-100">
                                    Register
                                </button>
                            </div>
                            <div class="text-center pt-4">
                                <p class="subtitle m-0 show-login">Already Have and Account? <br><a
                                        href="javascript:void()" class="main_color"> Login Now!</a>
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6 sign-in-area shadow-sm py-5">
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
                                    <strong class="main_color">Are You Partner ?</strong>
                                    <a href="{{ route('partner.login') }}" class="text-primary">Click Here To
                                        Login.</a>
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
@endsection

@section('scripts')
{{-- Password Eye --}}
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
{{-- Confirm Password Eye --}}
<script>
    $(document).ready(function() {
        // Function to toggle password visibility
        $('.toggle-password-2').click(function() {
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
{{-- Login Password Eye --}}
<script>
    $(document).ready(function() {
        // Function to toggle password visibility
        $('.toggle-passwordlogin').click(function() {
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
{{-- Validation --}}
@endsection