<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dmitryvolkov.me/demo/flixtv/admin/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Jul 2021 08:30:43 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/admin/css/bootstrap-reboot.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/admin/css/bootstrap-grid.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/admin/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/admin/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/admin/css/admin.css') }}">

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{ URL::asset('assets/img/brand/favicon.ico')}}" sizes="32x32">
    <link rel="apple-touch-icon" href="{{ URL::asset('assets/img/brand/favicon.ico')}}">

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Dmitry Volkov">
    <title>Admin Dashboard</title>

</head>

<body>
    <!-- sign in -->
    <div class="sign section--bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sign__content">

                        <!-- authorization form -->
                        <form action="{{ url('adminlogin') }}" method="post" class="sign__form">
                            {{ csrf_field() }}
                            <a href="{{ url('home') }}" class="sign__logo">
                                <img src="{{ URL::asset('assets/logoblack.png') }}" alt="" style="width: 170px">
                            </a>

                            @if (Session::has('loginerror'))
                                <div class="alert alert-danger">
                                    {{ session::get('loginerror') }}
                                    <i class="material-icons closeicon" data-dismiss="alert">close</i>
                                </div>
                            @endif

                            <div class="sign__group">
                                <input type="text" class="sign__input" name="adminname" placeholder="UserName">
                            </div>

                            <div class="sign__group">
                                <input type="password" class="sign__input" name="password" placeholder="Password">
                            </div>

                            <button class="sign__btn" type="submit">Sign in</button>
                            {{-- <span class="sign__text"><a href="forgot.html">Forgot password?</a></span> --}}
                        </form>
                        <!-- end authorization form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end sign in -->

    <!-- JS -->
    <script src="{{ URL::asset('assets/admin/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/js/smooth-scrollbar.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/js/select2.min.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/js/admin.js') }}"></script>
</body>
<!-- Mirrored from dmitryvolkov.me/demo/flixtv/admin/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Jul 2021 08:30:44 GMT -->

</html>
