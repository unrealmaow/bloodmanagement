<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sash – Bootstrap 5  Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon"
        href="{{ url('/sash') }}/assets/images/brand/favicon.ico">

    <!-- TITLE -->
    <title>{{ env('APP_NAME') }}</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ url('/sash') }}/assets/plugins/bootstrap/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- STYLE CSS -->
    <link href="{{ url('/sash') }}/assets/css/style.css" rel="stylesheet">

    <!-- Plugins CSS -->
    <link href="{{ url('/sash') }}/assets/css/plugins.css" rel="stylesheet">

    <!--- FONT-ICONS CSS -->
    <link href="{{ url('/sash') }}/assets/css/icons.css" rel="stylesheet">

    <!-- INTERNAL Switcher css -->
    <link href="{{ url('/sash') }}/assets/switcher/css/switcher.css" rel="stylesheet">
    <link href="{{ url('/sash') }}/assets/switcher/demo.css" rel="stylesheet">
    <!-- JQUERY JS -->
    <script src="{{ url('/sash') }}/assets/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</head>

<body class="app sidebar-mini ltr light-mode">


    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="{{ url('/sash') }}/assets/images/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            {{-- including header --}}
            @include('partials.header')

            <!--APP-SIDEBAR-->
            <div class="sticky">
                <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                <div class="app-sidebar">
                    <div class="side-header">
                        <a class="header-brand1" href="{{ url('/admin/dashboard') }}">
                            <img src="{{ url('/sash') }}/assets/images/brand/logo-white.png"
                                class="header-brand-img desktop-logo" alt="logo">
                            <img src="{{ url('/sash') }}/assets/images/brand/icon-white.png"
                                class="header-brand-img toggle-logo" alt="logo">
                            <img src="{{ url('/sash') }}/assets/images/brand/icon-dark.png"
                                class="header-brand-img light-logo" alt="logo">
                            <img src="{{ url('/sash') }}/assets/images/brand/logo-dark.png"
                                class="header-brand-img light-logo1" alt="logo">
                        </a>
                        <!-- LOGO -->
                    </div>
                    <div class="main-sidemenu">
                        <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg"
                                fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                            </svg></div>

                            {{-- including admin sidebar from partials --}}
                            @include('partials.sidebar')
                        
                        <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                                width="24" height="24" viewBox="0 0 24 24">
                                <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                            </svg></div>
                    </div>
                </div>
            </div>
            <!--/APP-SIDEBAR-->

            <!--app-content open-->
            <div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    @yield('content')
                    <!-- CONTAINER END -->
                </div>
            </div>
            <!--app-content close-->

        </div>



        <!-- FOOTER -->
        <footer class="footer">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-md-12 col-sm-12 text-center">
                        Copyright © <span id="year"></span> <a href="javascript:void(0)">Sash</a>. Designed with <span
                            class="fa fa-heart text-danger"></span> by <a href="javascript:void(0)"> Spruko </a> All
                        rights reserved.
                    </div>
                </div>
            </div>
        </footer>
        <!-- FOOTER END -->

        <!-- Include inputmask plugin -->

        <!-- BACK-TO-TOP -->
        <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>



        @include('partials.scripts')

        <script>
            function logoutFunction(event) {
                event.preventDefault();
                $('#logout_form').submit();
            }

        </script>

        <script>

            $(document).ready(function() {
                $('.confirm_a').click(function(e) {
                    e.preventDefault();
                    let url = $(this).attr('href');

                    swal({
                        title: 'Are you sure?',
                        icon: 'warning',
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location.href = url;
                        } else {
                            swal('Hmm, Changed Your Mind? ;-)');
                        }
                    });
                });
            });
            
           

        </script>

        <?php echo $__env->yieldPushContent('scripts'); ?>

        @if(Session::has('success'))
            <script>
                swal({
                    title: "Success.",
                    text: "{{ Session::get('success') }}",
                    icon: "success"
                });

            </script>
        @endif

</body>

</html>