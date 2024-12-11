<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shared/style.css') }}"> <!-- Sửa lỗi style.cssc -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo_1/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
</head>

<body>
    <div class="container-scroller">
        <!-- Include Navbar -->
        @include('admin.inc.navbar')

        <div class="container-fluid page-body-wrapper">
            <!-- Include Sidebar -->
            @include('admin.inc.sidebar')

            <!-- Main Panel -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <!-- Flash Messages -->
                    @if (Session::has('ok'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('ok') }}
                        </div>
                    @endif

                    <!-- Page Content -->
                    @yield('content')
                </div>

                <!-- Footer -->
                <footer class="footer">
                    <div class="container-fluid clearfix">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">
                            Copyright © bootstrapdash.com 2020
                        </span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
                            Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a>
                        </span>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assets/js/demo_1/dashboard.js') }}"></script>
</body>

</html>
