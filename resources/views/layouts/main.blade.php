<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{ url('') }}/assets/img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{ url('') }}/assets/css/bootstrap-5.0.0-beta1.min.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/LineIcons.2.0.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/animate.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/tiny-slider.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/glightbox.min.css">
    <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
    <link rel="stylesheet" href="{{ url('') }}/assets/css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="{{ url('') }}/assets/js/sportky.js"></script>
    <script src="{{ url('') }}/assets/js/login.js"></script>
    <!-- Include jQuery -->

</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- ========================= preloader start ========================= -->
    <div class="preloader">
        <div class="loader">
            <div class="spinner">
                <div class="spinner-container">
                    <div class="spinner-rotator">
                        <div class="spinner-left">
                            <div class="spinner-circle"></div>
                        </div>
                        <div class="spinner-right">
                            <div class="spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- preloader end -->

    <!-- ========================= header start ========================= -->
    <header class="header navbar-area">
        @include('partials.navbar')
    </header>
    <!-- ========================= header end ========================= -->
    <!-- ========================= feature-section start ========================= -->
    <section class="feature-section pt-130">
        <div class="container-fluid p-2">
            @yield('container')
        </div>
    </section>

    <!-- ========================= footer start ========================= -->
    <footer class="footer pt-100">
        @include('partials.footer')
    </footer>
    <!-- ========================= footer end ========================= -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-arrow-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->

    <!-- Include jQuery Popup Overlay -->
    <script src="https://cdn.jsdelivr.net/gh/vast-engineering/jquery-popup-overlay@2/jquery.popupoverlay.min.js"></script>
    <script src="{{ url('') }}/assets/js/bootstrap.bundle-5.0.0-beta1.min.js"></script>
    <script src="{{ url('') }}/assets/js/contact-form.js"></script>
    <script src="{{ url('') }}/assets/js/count-up.min.js"></script>
    <script src="{{ url('') }}/assets/js/tiny-slider.js"></script>
    <script src="{{ url('') }}/assets/js/isotope.min.js"></script>
    <script src="{{ url('') }}/assets/js/glightbox.min.js"></script>
    <script src="{{ url('') }}/assets/js/wow.min.js"></script>
    <script src="{{ url('') }}/assets/js/imagesloaded.min.js"></script>
    <script src="{{ url('') }}/assets/js/main.js"></script>
</body>

</html>
