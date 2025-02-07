<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Login
    </title>
    <!--     Fonts and icons     -->
    <link href="{{ asset('fonts/css.css') }}" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('argon-dashboard-master/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('argon-dashboard-master/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="{{ asset('fonts/font.js') }}" crossorigin="anonymous"></script>
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('argon-dashboard-master/assets/css/argon-dashboard.css') }}" rel="stylesheet" />
</head>

<body class="">
    <main class="main-content  mt-0">
        <section>
            @yield('content')
        </section>
    </main>
    <!--   Core JS Files   -->
    <script src="{{ asset('argon-dashboard-master/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('argon-dashboard-master/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('argon-dashboard-master/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('argon-dashboard-master/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>
