<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="{{ asset('assets/img/favicon.png') }}" rel="apple-touch-icon-precomposed">
    <link href="{{ asset('assets/img/favicon.png') }}" rel="shortcut icon" type="image/png">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Kaufen Sie Balkonkraftwerke &amp; Solaranlagen online | Stegpearl</title>
    <link rel="stylesheet" href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/Linearicons/Font/demo-files/demo.css') }}">
    <link rel="preconnect" href="{{ asset('assets/https://fonts.gstatic.com') }}">
    <!-- <link href="https://db.onlinewebfonts.com/c/72c37e84edf1d13a13a5d774056621b5?family=Riona+Sans+W01+Bold" rel="stylesheet"> -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700&display=swap" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    {{-- <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&display=swap" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap4/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/owl-carousel/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/slick/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/lightGallery/dist/css/lightgallery.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/lightGallery/dist/css/lightgallery.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/noUiSlider/nouislider.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/home-1.css') }}">
    <script src="{{ asset('assets/plugins/jquery.min.js') }}"></script>


    @yield('style')
</head>

<body>

    @include('Layout.header')
    <div class="ps-page">
        @yield('content')
    </div>
    @include('Layout.footer')

    @include('includes.include')
    <script src="{{ asset('assets/plugins/jquery.min.js') }}"></script>
    <!--<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>-->
    <script src="{{ asset('assets/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap4/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-bar-rating/dist/jquery.barrating.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/lightGallery/dist/js/lightgallery-all.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/slick/slick/slick.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/noUiSlider/nouislider.min.js') }}"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@flasher/flasher@1.1.1/dist/flasher.min.js"></script>
    <!-- custom code-->
   
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script type="module" src="{{ asset('assets/js/custom.js')}}" async></script>
</body>



</html>
