@extends('frontend.master')
@section('content')
    <style>
        body {
            margin: 0;
        }

        .error-area {
            position: relative;
            background: url('https://i.ibb.co/dgHnp1b/The-Different-Types-of-Technology-GIF.gif') no-repeat center center fixed;
            background-size: cover;
            height: 70vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-align: center;
        }

        .error-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #161515a4;
            content: '';
        }

        .error-content {
            position: relative; /* Add this line */
            z-index: 2;
        }

        h1 {
            font-size: 6rem;
            margin-bottom: 20px;
        }

        h4 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }
    </style>
    <section>
        <div class="container-fluid error-area">
            <div class="error-overlay"></div> <!-- Add overlay here -->
            <div class="error-content row justify-content-center align-items-center g-2">
                <div class="col">
                    <div class="text-center p-5 mb-5">
                        <div class="pb-5">
                            <h1 style="font-size: 7rem">Oops !</h1>
                            <h4>Page Not Found.</h4>
                            <p>The Requested URL Not Found On This Server.</p>
                        </div>
                        <a href="{{ route('homepage') }}" class="btn-color">Go Home Page</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

