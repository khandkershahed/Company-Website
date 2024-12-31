<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NGen IT Back-Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap');

        body,
        html {
            margin: 0;
            height: 100%;
            overflow: hidden;
            font-family: "Jost", sans-serif;
        }

        .back_img {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .back_img img {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }

        .login-form-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-card {
            width: 500px;
            max-width: 100%;
            border: 0;
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        }

        .form-control-feedback-icon {
            left: 0;
            border-right: 1px solid #ae0a46;
            background-color: #ae0a46;
            color: white;
            padding: 10px;
        }

        .invalid-feedback {
            --form-validation-color: #EF4444;
            display: none;
            width: 100%;
            margin-top: .25rem;
            font-size: var(--body-font-size-sm);
            color: #ef4444;
        }

        .custom-input-btn {
            color: #ae0a46;
            cursor: pointer;
        }

        .form-check-input:checked {
            background-color: #ae0a46;
            border-color: #ae0a46;
        }

        @media only screen and (max-width: 600px) {
            .mobile-none{
                display: none;
            }
            .login-card{
                width: 100%;
                box-shadow: none;
            }
        }
    </style>
</head>

<body>
    <main>
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 px-0 mobile-none">
                        <div class="back_img">
                            <img class="img-fluid" src="{{ asset('images/login.avif') }}"
                                alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 px-0 login-form-container">
                        <form class="login-form needs-validation" method="POST" action="{{ route('admin.login') }}"
                            novalidate>
                            @csrf
                            <div class="card login-card py-5 rounded-0">
                                <div class="card-body">
                                    <div class="text-center mb-5">
                                        <div class="d-inline-flex align-items-center justify-content-center mb-4">
                                            <img class="img-fluid" width="130px"
                                                src="{{ asset('images/login.avif') }}"
                                                alt="">
                                        </div>
                                        <h1 class="m-0" style="color: #6B7280;">Welcome Back!</h1>
                                        <p class="mb-0 text-muted">Login to continue your admin account.</p>
                                    </div>
                                    <div class="px-5">
                                        <div class="mb-3">
                                            <div class="input-group">
                                                <span class="input-group-text rounded-0 custom-input-btn"
                                                    id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                                                <input type="text" name="email"
                                                    class="form-control rounded-0" placeholder="Username"
                                                    aria-label="Username" value="{{ old('email') }}"
                                                    aria-describedby="basic-addon1" required>
                                                @error('email')
                                                    <div class="text-danger col-lg-12 col-12">
                                                        {{ $message }}
                                                    </div>
                                                    <div class="invalid-feedback">Enter your email</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="input-group">
                                                <span
                                                    class="input-group-text rounded-0 custom-input-btn toggle-password"
                                                    id="togglePassword"><i class="fa-solid fa-lock"></i></span>
                                                <input type="password" name="password"
                                                    class="form-control rounded-0" placeholder="Password"
                                                    aria-label="Password" value="{{ old('password') }}"
                                                    aria-describedby="togglePassword" required>
                                                @error('password')
                                                    <div class="text-danger col-lg-12 col-12">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="invalid-feedback">Enter your password</div>
                                            </div>
                                        </div>

                                        <div class="form-check mb-3 pt-3">
                                            <input class="form-check-input" type="checkbox" checked name="remember"
                                                id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Remember my login credentials
                                            </label>
                                        </div>
                                        <div class="text-center mb-3 pt-5">
                                            <span>Forgot Password? <a href="{{ route('admin.password.request') }}"
                                                    style="color: #ae0a46;">Click
                                                    here!</a></span>
                                        </div>
                                        <div class="d-grid">
                                            <button class="btn btn-primary py-3 fw-bold" type="submit"
                                                style="background:#ae0a46;border-radius: 0px;color: white;border: none;">Sign
                                                In <i class="fa-solid fa-arrow-right-long ps-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.querySelector('.toggle-password');
            const passwordInput = document.querySelector('input[name="password"]');

            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                // Toggle icon and color
                const icon = togglePassword.querySelector('i');
                if (type === 'password') {
                    icon.classList.remove('text-success');
                    icon.classList.add('text-dark');
                    icon.classList.add('fa-lock');
                    icon.classList.remove('fa-unlock');
                } else {
                    icon.classList.remove('text-dark');
                    icon.classList.add('text-success');
                    icon.classList.remove('fa-lock');
                    icon.classList.add('fa-unlock');
                }
            });
        });
    </script>
</body>

</html>
