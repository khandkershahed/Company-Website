<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ngen It | Log In</title>

    <!-- Global stylesheets -->
    <link href="{{ asset('backend/assets/fonts/inter/inter.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets/icons/phosphor/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets/css/ltr/all.min.css') }}" id="stylesheet" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{ asset('backend/assets/demo/demo_configurator.js') }}"></script>
    <script src="{{ asset('backend/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{ asset('backend/assets/js/app.js') }}"></script>
    <script src="{{ asset('backend/assets/demo/pages/form_validation_styles.js') }}"></script>
    <!-- /theme JS files -->

    <!-- Custom CSS styles -->
    <style>
        .back_img img {
            object-fit: contain;
            width: 100%;
            height: 100%;
        }

        .admin-login-form {
            padding: 30px 60px;
            border: none;
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        }

        .form-check-input:checked {
            background-color: #ae0a46;
            border-color: var(--form-check-input-checked-border-color);
        }

        @media screen and (max-width: 767px) {
            .back_img {
                display: none;
            }

            .admin-login-form {
                padding: 30px 60px;
                border: none;
                box-shadow: none;
            }
        }
    </style>
</head>

<body>
    <!-- Page content -->
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <!-- Left Column with Background Image -->
                <div class="col-lg-5 col-sm-12 p-0" style="border-right: 1px solid #eee">
                    <div class="back_img">
                        <img class="img-fluid"
                            src="https://images.unsplash.com/photo-1526666424717-ee515eb594e4?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="">
                    </div>
                </div>

                <!-- Right Column with Login Form -->
                <div class="col-lg-7 col-sm-12 p-0">
                    <div class="d-flex justify-content-center align-items-center"
                        style="background-color: white; height: 100vh;">
                        <div class="d-flex justify-content-center align-items-center">
                            <form class="login-form needs-validation" method="POST" action="{{ route('login') }}"
                                style="width: 30rem;" novalidate>
                                @csrf

                                <!-- Display Alert Message -->
                                @if (Session::has('alert'))
                                    <div class="alert bg-danger text-white alert-dismissible fade show">
                                        <span class="fw-semibold">{{ Session::get('alert') }} . Login
                                            First</span>
                                        <button type="button" class="btn-close btn-close-white"
                                            data-bs-dismiss="alert"></button>
                                    </div>
                                @endif

                                <div class="card mb-0 admin-login-form">
                                    <div class="card-body">
                                        <div class="text-center mb-3">
                                            <!-- Brand Logo -->
                                            <div class="d-inline-flex align-items-center justify-content-center mb-4">
                                                {{-- <img src="{{ !empty($setting->logo) && file_exists(public_path('storage/' . $setting->logo)) ? asset('storage/' . $setting->logo) : asset('frontend/images/brandPage-logo-no-img(217-55).jpg') }}"
                                                    class="h-48px" alt=""> --}}
                                                <img class="img-fluid" width="130px"
                                                    src="https://www.ngenitltd.com/storage/RZlRwzfUA8get0PcCzQphbeIJu6OhSL7ltNc4xiZ.png"
                                                    alt="">
                                            </div>
                                            <h1 class="m-0">Welcome Back !</h1>
                                            <p class="mb-0 text-muted">Please Login To Continue Your Account.</p>
                                        </div>

                                        <!-- Email Input -->
                                        <div class="mb-3 text-left">
                                            <label class="form-label">Email</label>
                                            <div class="form-control-feedback form-control-feedback-start">
                                                <input type="text" name="email" class="form-control"
                                                    style="border-radius: 0px; border: 0px; background-color:#eee;"
                                                    placeholder="john@doe.com" required>
                                                <div class="invalid-feedback">Enter your Email</div>
                                                <div class="form-control-feedback-icon">
                                                    <i class="ph-user-circle text-muted"></i>
                                                </div>
                                            </div>
                                            @error('email')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <!-- Password Input -->
                                        <div class="mb-3 text-left">
                                            <label class="form-label">Password</label>
                                            <div class="form-control-feedback form-control-feedback-start">
                                                <input type="password" name="password" class="form-control"
                                                    style="border-radius: 0px; border: 0px; background-color:#eee;"
                                                    placeholder="•••••••••••" required>
                                                <div class="invalid-feedback">Enter your Password</div>
                                                <div class="form-control-feedback-icon">
                                                    <i class="ph-lock text-muted"></i>
                                                </div>
                                            </div>
                                            @error('password')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <div class="invalid-feedback">Enter your password</div>
                                        </div>

                                        <!-- Remember Me Checkbox and Forgot Password Link -->
                                        <div class="d-flex align-items-center mb-3">
                                            <label class="form-check">
                                                <input type="checkbox" name="remember" class="form-check-input" checked>
                                                <span class="form-check-label">Remember</span>
                                            </label>
                                        </div>

                                        <!-- Sign In Button -->
                                        <div class="text-center mb-3 pt-3">
                                            <a href="login_password_recover.html" class="mt-3 mb-3 pb-3"><span
                                                    class="text-primary">Forgot Password?</span> <br> <span
                                                    class="text-muted">Recover Your Password Now.</span></a>
                                            <button type="submit" class="btn w-md-100 w-100 mt-3"
                                                style="background:#ae0a46;border-radius: 0px;color: white;border: none;">Sign
                                                In</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
</body>

</html>
