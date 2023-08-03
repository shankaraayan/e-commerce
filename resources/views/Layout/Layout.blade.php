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
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap4/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/owl-carousel/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/slick/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/lightGallery/dist/css/lightgallery.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/lightGallery/dist/css/lightgallery.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/noUiSlider/nouislider.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/home-1.css') }}">
    <script src="{{ asset('assets/plugins/jquery.min.js') }}"></script>
    <style>
        .owl-carousel.owl-loaded.owl-drag {
            border: none !important;
            background: transparent !important;
        }
.well{
    margin:16px 0px;
    border-radius: 25px;
    background: rgb(238, 238, 238);
    padding:12px 16px;

}
.well p{
    margin:0;
    padding:0;
}
        .customer_dashboard .nav-pills .nav-link.active,
        .customer_dashboard .nav-pills .show>.nav-link {
            color: #fff;
            background-color: #345080;
        }

        .customer_dashboard .nav-pills .nav-link.active,
        .customer_dashboard .nav-pills .show>.nav-link {
            color: #fff;
            background-color: #4b9f64;
            justify-content: flex-start;
            border-right: solid 7px var(--theme_green);
            box-shadow: 1px 1px 10px 1px #0000001f;
        }

        .ps-product__variations_sec .accordion .card {
            background-color: white;
            color: var(--blue-color);
            font-weight: 600;
            padding: 3px 18px;
            border-radius: 10px !important;
            border: 1px solid #f0f2f5;
            margin-bottom: 10px;
        }

        .ps-product__variations_sec .accordion .card-header {
            background-color: transparent;
            border: none;
        }

        .ps-product__variations_sec .accordion .card:not(:first-of-type):not(:last-of-type) {
            border-radius: 10px !important;
            border: 1px solid #f0f2f5;
        }

        .ps-section__content h3.ps-section__title {
            margin-bottom: 0px;
        }

        .form-check .form-check-label::before {
            /*display: none;*/
        }

        .ps-product__variations_sec .form-check .form-check-label {
            padding: 0;
        }

        /* .ps-product__variations_sec input[type=radio]:checked+label>figure,
    .ps-product__variations_sec input[type=radio]:checked+label {
        border: 2px solid #075095 !important;
        border-radius: 10px;
    } */
        .ps-product__variations_sec .select_var_row {
            background: #f0f2f5;

        }

        .ps-product__variations_sec input[type=radio]:checked+label>.select_var_row {
            border: 2px solid #075095 !important;
            border-radius: 10px;
        }

        .ps-product__variations_sec input[type=radio] {
            display: none;
        }

        / Stuff after this is only to make things more pretty / .ps-product__variations_sec input[type=radio]+label>figure>img {
            transition: 500ms all;
        }


        /* Styles for the disclaimer bar */
        .disclaimer-bar {
            background: #335080;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
             padding: 10px;
            text-align: center;
            display: block;
            z-index: 111;
        }

        .disclaimer-bar p {
            color: #fff;
            font-size: 12px;
        }

        .detail-btn{
            cursor: pointer;
            color: #fff;
         }
        .accept-btn {
            cursor: pointer;
            padding: 5px 20px;
            border-radius: 5px;
            border: 1px solid var(--green-color) !important;
            background-color: var(--green-color) !important;
            color: white !important;
        }
        .accept-btn:hover {
            background-color: white !important;
            color: var(--green-color) !important;
        }

        .close-btn {
            cursor: pointer;
            color: #fff;
            padding: 5px 20px;
            border: 1px solid #fff;
            border-radius: 5px;
        }

        .close-btn:hover {
            background-color: #333;
            color: #fff;
            border: 1px solid #333;
        }
    </style>
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
    <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>
    <script src="{{ asset('assets/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap4/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-bar-rating/dist/jquery.barrating.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/lightGallery/dist/js/lightgallery-all.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/slick/slick/slick.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/noUiSlider/nouislider.min.js') }}"></script>
    <!-- custom code-->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
