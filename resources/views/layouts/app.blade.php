<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sash – Bootstrap 5  Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords" content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/sash') }}/assets/images/brand/favicon.ico">

    <!-- TITLE -->
    <title>Sash – Bootstrap 5 Admin & Dashboard Template</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ url('/sash') }}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- STYLE CSS -->
     <link href="{{ url('/sash') }}/assets/css/style.css" rel="stylesheet">

	<!-- Plugins CSS -->
    <link href="{{ url('/sash') }}/assets/css/plugins.css" rel="stylesheet">

    <!--- FONT-ICONS CSS -->
    <link href="{{ url('/sash') }}/assets/css/icons.css" rel="stylesheet">

    <!-- INTERNAL Switcher css -->
    <link href="{{ url('/sash') }}/assets/switcher/css/switcher.css" rel="stylesheet">
    <link href="{{ url('/sash') }}/assets/switcher/demo.css" rel="stylesheet">

</head>

<body class="app sidebar-mini ltr login-img">

    <!-- BACKGROUND-IMAGE -->
    <div class="">

        <!-- GLOABAL LOADER -->
        <div id="global-loader">
            <img src="{{ url('/sash') }}/assets/images/loader.svg" class="loader-img" alt="Loader">
        </div>
        <!-- /GLOABAL LOADER -->

        <!-- PAGE -->
        <div class="page">
            <div class="">
                <!-- Theme-Layout -->

                <!-- CONTAINER OPEN -->
                <div class="col col-login mx-auto mt-7">
                    <div class="text-center">
                        <a href="index.html"><img src="{{ url('/sash') }}/assets/images/brand/logo-white.png" class="header-brand-img" alt=""></a>
                    </div>
                </div>

                @yield('content')
                
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- End PAGE -->

    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->

    <!-- JQUERY JS -->
    <script src="{{ url('/sash') }}/assets/js/jquery.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ url('/sash') }}/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="{{ url('/sash') }}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- SHOW PASSWORD JS -->
    <script src="{{ url('/sash') }}/assets/js/show-password.min.js"></script>

    <!-- GENERATE OTP JS -->
    <script src="{{ url('/sash') }}/assets/js/generate-otp.js"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ url('/sash') }}/assets/plugins/p-scroll/perfect-scrollbar.js"></script>

    <!-- Color Theme js -->
    <script src="{{ url('/sash') }}/assets/js/themeColors.js"></script>

    <!-- CUSTOM JS -->
    <script src="{{ url('/sash') }}/assets/js/custom.js"></script>

    <!-- Custom-switcher -->
    <script src="{{ url('/sash') }}/assets/js/custom-swicher.js"></script>

    <!-- Switcher js -->
    <script src="{{ url('/sash') }}/assets/switcher/js/switcher.js"></script>

</body>

</html>