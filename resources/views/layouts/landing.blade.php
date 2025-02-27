<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="horizontal" data-nav-style="menu-click" data-menu-position="fixed"
    data-theme-mode="light">

<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/images/brand-logos/favicon.ico') }}" type="image/x-icon">

    <!-- Bootstrap Css -->
    <link id="style" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Style Css -->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">

    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">

    <!-- Node Waves Css -->
    <link href="{{ asset('assets/libs/node-waves/waves.min.css') }}" rel="stylesheet">

    <!-- SwiperJS Css -->
    <link rel="stylesheet" href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}">

    <!-- Color Picker Css -->
    <link rel="stylesheet" href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/@simonwep/pickr/themes/nano.min.css') }}">

    <!-- Choices Css -->
    <link rel="stylesheet" href="{{ asset('assets/libs/choices.js/public/assets/styles/choices.min.css') }}">

    <!-- Styles -->
    @livewireStyles

</head>

<body class="landing-body">

    <div class="landing-page-wrapper">

        <!-- app-header -->
        @include('landing.components.header')
        <!-- /app-header -->

        <!-- Start::app-sidebar -->
        @include('landing.components.sidebar')
        <!-- End::app-sidebar -->

        <!-- Start::app-content -->
        <div class="main-content landing-main">

            <!-- Start:: Section-1 -->
            @include('landing.partials.section-1')
            <!-- End:: Section-1 -->

            <!-- Start:: Section-2 -->
            @include('landing.partials.section-2')
            <!-- End:: Section-2 -->

            <!-- Start:: Section-3 -->
            @include('landing.partials.section-3')
            <!-- End:: Section-3 -->

            <!-- Start:: Section-4 -->
            @include('landing.partials.section-4')
            <!-- End:: Section-4 -->

            <!-- Start:: Section-5 -->
            @include('landing.partials.section-5')
            <!-- End:: Section-5 -->

            <!-- Start:: Section-6 -->
            @include('landing.partials.section-6')
            <!-- End:: Section-6 -->

            <!-- Start:: Section-7 -->
            @include('landing.partials.section-7')
            <!-- End:: Section-7 -->

            <!-- Start:: Section-8 -->
            @include('landing.partials.section-8')
            <!-- End:: Section-8 -->

            <!-- Start:: Section-9 -->
            @include('landing.partials.section-9')
            <!-- End:: Section-9 -->

            <!-- Start:: Section-10 -->
            @include('landing.partials.section-10')
            <!-- End:: Section-10 -->

            @include('landing.components.footer')

        </div>
        <!-- End::app-content -->

    </div>

    <div class="scrollToTop">
        <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
    </div>
    <div id="responsive-overlay"></div>

    @livewireScripts

    <!-- Popper JS -->
    <script src="{{ asset('assets/libs/@popperjs/core/umd/popper.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Color Picker JS -->
    <script src="{{ asset('assets/libs/@simonwep/pickr/pickr.es5.min.js') }}"></script>

    <!-- Choices JS -->
    <script src="{{ asset('assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>

    <!-- Swiper JS -->
    <script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Defaultmenu JS -->
    <script src="{{ asset('assets/js/defaultmenu.min.js') }}"></script>

    <!-- Internal Landing JS -->
    <script src="{{ asset('assets/js/landing.js') }}"></script>

    <!-- Node Waves JS-->
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

    <!-- Sticky JS -->
    <script src="{{ asset('assets/js/sticky.js') }}"></script>

</body>

</html>
