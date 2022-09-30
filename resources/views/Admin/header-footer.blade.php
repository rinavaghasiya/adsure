<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dmitryvolkov.me/demo/flixtv/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Jul 2021 08:30:17 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/admin/css/bootstrap-reboot.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/admin/css/bootstrap-grid.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/admin/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/admin/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/admin/css/admin.css') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{ URL::asset('assets/img/brand/favicon.ico')}}" sizes="32x32">
    <link rel="apple-touch-icon" href="{{ URL::asset('assets/img/brand/favicon.ico')}}">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2802955898649130"
     crossorigin="anonymous"></script>

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Dmitry Volkov">
    <title>Admin Adsure</title>

</head>

<body>
    <!-- header -->
    <header class="header">
        <div class="header__content">

            <a href="{{ url('home') }}" class="header__logo">
                <img src="{{ URL::asset('assets/logo1.png') }}" alt="">
            </a>
        </div>
    </header>

    <div class="sidebar">
        <a href="{{ url('home') }}" class="sidebar__logo">
            <img src="{{ URL::asset('assets/logo1.png') }}" alt="" style="width: 150px">
        </a>

        <div class="sidebar__user">
            <div class="sidebar__user-img">
                <img src="{{ URL::asset('assets/admin/img/user.svg') }}" alt="">
            </div>

            <div class="sidebar__user-title">
                <span>Admin</span>
                <p style="text-transform: capitalize;">{{ Session::get('name') }}</p>
            </div>

            <button class="sidebar__user-btn" type="button">
                <a href="{{ url('logout') }}" class="header__user">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M4,12a1,1,0,0,0,1,1h7.59l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l4-4a1,1,0,0,0,.21-.33,1,1,0,0,0,0-.76,1,1,0,0,0-.21-.33l-4-4a1,1,0,1,0-1.42,1.42L12.59,11H5A1,1,0,0,0,4,12ZM17,2H7A3,3,0,0,0,4,5V8A1,1,0,0,0,6,8V5A1,1,0,0,1,7,4H17a1,1,0,0,1,1,1V19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V16a1,1,0,0,0-2,0v3a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V5A3,3,0,0,0,17,2Z" />
                    </svg>
                </a>
            </button>

        </div>

        <ul class="sidebar__nav">
            <li class="sidebar__nav-item">
                <a href="{{ url('home') }}" class="sidebar__nav-link sidebar__nav-link--active"><svg
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M20,8h0L14,2.74a3,3,0,0,0-4,0L4,8a3,3,0,0,0-1,2.26V19a3,3,0,0,0,3,3H18a3,3,0,0,0,3-3V10.25A3,3,0,0,0,20,8ZM14,20H10V15a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H16V15a3,3,0,0,0-3-3H11a3,3,0,0,0-3,3v5H6a1,1,0,0,1-1-1V10.25a1,1,0,0,1,.34-.75l6-5.25a1,1,0,0,1,1.32,0l6,5.25a1,1,0,0,1,.34.75Z" />
                    </svg> <span>Dashboard</span></a>
            </li>

            <li class="sidebar__nav-item">
                <a href="{{ url('usercard') }}" class="sidebar__nav-link"><svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <path
                            d="M12.3,12.22A4.92,4.92,0,0,0,14,8.5a5,5,0,0,0-10,0,4.92,4.92,0,0,0,1.7,3.72A8,8,0,0,0,1,19.5a1,1,0,0,0,2,0,6,6,0,0,1,12,0,1,1,0,0,0,2,0A8,8,0,0,0,12.3,12.22ZM9,11.5a3,3,0,1,1,3-3A3,3,0,0,1,9,11.5Zm9.74.32A5,5,0,0,0,15,3.5a1,1,0,0,0,0,2,3,3,0,0,1,3,3,3,3,0,0,1-1.5,2.59,1,1,0,0,0-.5.84,1,1,0,0,0,.45.86l.39.26.13.07a7,7,0,0,1,4,6.38,1,1,0,0,0,2,0A9,9,0,0,0,18.74,11.82Z" />
                    </svg> <span>UserCard</span></a>
            </li>
            <li class="sidebar__nav-item">
                <a href="{{ url('createpackage') }}" class="sidebar__nav-link sidebar__nav-link--active"><svg
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M20,8h0L14,2.74a3,3,0,0,0-4,0L4,8a3,3,0,0,0-1,2.26V19a3,3,0,0,0,3,3H18a3,3,0,0,0,3-3V10.25A3,3,0,0,0,20,8ZM14,20H10V15a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H16V15a3,3,0,0,0-3-3H11a3,3,0,0,0-3,3v5H6a1,1,0,0,1-1-1V10.25a1,1,0,0,1,.34-.75l6-5.25a1,1,0,0,1,1.32,0l6,5.25a1,1,0,0,1,.34.75Z" />
                    </svg> <span>Create Package</span></a>
            </li>
        </ul>

        <div class="sidebar__copyright" style=""> Copyright © 2021 <a href="#">Adsure</a>. <br>Create by <a
                href="http://www.adsure.in" target="_blank">Adsure
            </a></div>
    </div>



    @yield('contenct')

    <script src="{{ URL::asset('assets/admin/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/js/smooth-scrollbar.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/js/select2.min.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/js/admin.js') }}"></script>
</body>

</html>
