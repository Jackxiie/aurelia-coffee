<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AURELIA COFFEE | Delicious Taste</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.png') }}">

    <link rel="stylesheet" href="{{ asset('legacy/css/open-iconic-bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('legacy/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('legacy/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('legacy/css/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('legacy/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('legacy/css/aos.css') }}" />
    <link rel="stylesheet" href="{{ asset('legacy/css/ionicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('legacy/css/bootstrap-datepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('legacy/css/jquery.timepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('legacy/css/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('legacy/css/icomoon.css') }}" />
    <link rel="stylesheet" href="{{ asset('legacy/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        .floating-flash {
            position: fixed;
            top: 90px;
            right: 20px;
            z-index: 9999;
            min-width: 280px;
            max-width: 420px;
        }

        .floating-flash .alert {
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.12);
            margin-bottom: 10px;
        }

        @media (max-width: 991.98px) {
            .floating-flash {
                top: 75px;
                right: 15px;
                left: 15px;
                min-width: auto;
                max-width: none;
            }
        }
    </style>
</head>
<body>

    @include('partials.navbar')

    @if(session('success') || session('error') || $errors->any())
        <div class="floating-flash">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0 pl-3">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
    @endif

    @yield('content')

    @include('partials.footer')

    <script src="{{ asset('legacy/js/jquery.min.js') }}"></script>
    <script src="{{ asset('legacy/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('legacy/js/popper.min.js') }}"></script>
    <script src="{{ asset('legacy/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('legacy/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('legacy/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('legacy/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('legacy/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('legacy/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('legacy/js/aos.js') }}"></script>
    <script src="{{ asset('legacy/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('legacy/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('legacy/js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('legacy/js/scrollax.min.js') }}"></script>
    <script src="{{ asset('legacy/js/main.js') }}"></script>

    <script>
        setTimeout(function () {
            $('.floating-flash .alert').alert('close');
        }, 2500);
    </script>
</body>
</html>