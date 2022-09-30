<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from laravel.spruko.com/dashlead/Horizontal-Dark/signin by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Jul 2021 06:32:59 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!-- /Added by HTTrack -->

<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="description" content="Dashlead -  Admin Panel HTML Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="sales dashboard, admin dashboard, bootstrap 4 admin template, html admin template, admin panel design, admin panel design, bootstrap 4 dashboard, admin panel template, html dashboard template, bootstrap admin panel, sales dashboard design, best sales dashboards, sales performance dashboard, html5 template, dashboard template">
    <link rel="icon" href="{{ URL::asset('assets/img/brand/favicon.ico')}}" type="image/x-icon" />
    <title>User Adsure</title>
    <link href="{{ URL::asset('assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/typicons.font/typicons.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/feather/feather.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/custom-style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/skins.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/dark-style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/custom-dark-style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/multipleselect/multiple-select.css') }}">
    <link href="{{ URL::asset('assets/plugins/jquery.mCustomScrollbar/jquery.mCustomScrollbar.css') }}"
        rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/sidebar/sidebar.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/switcher/css/switcher.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/switcher/demo.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>

<body class="main-body dark-theme">
    <!-- Loader -->
    <div id="global-loader">
        <img src="{{ URL::asset('assets/img/loader.svg') }}" class="loader-img" alt="Loader">
    </div>

    <!-- End Loader -->


    <!-- Page -->
    <div class="page main-signin-wrapper">

        <!-- Row -->
        <div class="row text-center pl-0 pr-0 ml-0 mr-0">
            <div class="col-lg-3 d-block mx-auto">
                <div class="text-center mb-2">
                    <img src="{{ URL::asset('assets/logo1.png') }}" class="header-brand-img" alt="logo">
                    <img src="{{ URL::asset('assets/logo1.png') }}" class="header-brand-img theme-logos" alt="logo">
                </div>
                <div class="card custom-card">
                    <div class="card-body">
                        @if (Session::has('loginerror'))
                            <div class="alert alert-danger">
                                {{ session::get('loginerror') }}
                                <i class="material-icons closeicon" data-dismiss="alert">close</i>
                            </div>
                        @endif
                        <h4 class="text-center">Signin to Your Account</h4>
                        <br>
                        <form action="{{ url('userlogin') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group text-left">
                                <label>UserName</label>
                                <input class="form-control" name="username" placeholder="Enter your username"
                                    type="text">
                            </div>
                            <div class="form-group text-left">
                                <label>Password</label>
                                <input class="form-control" name="password" placeholder="Enter your password"
                                    type="password">
                            </div>
                            <button type="submit" class="btn ripple btn-main-primary btn-block">Sign In</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->

    </div>
    <!-- End Page -->


    <!-- End Page -->
    <!-- Jquery js-->
    <script src="{{ URL::asset('assets/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="{{ URL::asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Ionicons js-->
    <script src="{{ URL::asset('assets/plugins/ionicons/ionicons.js') }}"></script>

    <!-- Perfect-scrollbar js-->
    <script src="{{ URL::asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

    <!-- Rating js-->
    <script src="{{ URL::asset('assets/plugins/rating/jquery.rating-stars.js') }}"></script>


    <!-- Custom js-->
    <script src="{{ URL::asset('assets/js/custom.js') }}"></script>






</body>

<!-- Mirrored from laravel.spruko.com/dashlead/Horizontal-Dark/signin by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Jul 2021 06:32:59 GMT -->

</html>
