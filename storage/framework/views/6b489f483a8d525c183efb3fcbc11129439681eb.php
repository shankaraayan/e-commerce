<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="<?php echo e(asset('assets/img/favicon.png')); ?>" rel="apple-touch-icon-precomposed">
    <link href="<?php echo e(asset('assets/img/favicon.png')); ?>" rel="shortcut icon" type="image/png">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Kaufen Sie Balkonkraftwerke &amp; Solaranlagen online | Stegpearl</title>
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/font-awesome/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/Linearicons/Font/demo-files/demo.css')); ?>">
    <link rel="preconnect" href="<?php echo e(asset('assets/https://fonts.gstatic.com')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/bootstrap4/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/owl-carousel/assets/owl.carousel.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/slick/slick/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/lightGallery/dist/css/lightgallery.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/select2/dist/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/lightGallery/dist/css/lightgallery.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/noUiSlider/nouislider.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/home-1.css')); ?>">
    <script src="<?php echo e(asset('assets/plugins/jquery.min.js')); ?>"></script>
    <style>
    .owl-carousel.owl-loaded.owl-drag{
        border:none!important;
        background:transparent!important;
    }
        .customer_dashboard .nav-pills .nav-link.active, .customer_dashboard .nav-pills .show>.nav-link {
            color: #fff;
            background-color: #345080;
        }
        .customer_dashboard .nav-pills .nav-link.active, .customer_dashboard .nav-pills .show > .nav-link {
            color: #fff;
            background-color: #4b9f64;
            justify-content: flex-start;
            border-right: solid 7px var(--theme_green);
            box-shadow: 1px 1px 10px 1px #0000001f;
        }
        .ps-product__variations_sec .accordion .card{
        background-color: white;
        color: var(--blue-color);
        font-weight: 600;
        padding: 3px 18px;
        border-radius: 10px !important;
        border: 1px solid #f0f2f5;
        margin-bottom: 10px;
    }
    .ps-product__variations_sec .accordion .card-header{
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
    .ps-product__variations_sec .select_var_row{
        background: #f0f2f5;

    }
    .ps-product__variations_sec input[type=radio]:checked+label>.select_var_row {
        border: 2px solid #075095 !important;
        border-radius: 10px;
    }
    .ps-product__variations_sec input[type=radio] {
        display: none;
    }

    / Stuff after this is only to make things more pretty /
    .ps-product__variations_sec input[type=radio]+label>figure>img {
        transition: 500ms all;
    }
</style>
<?php echo $__env->yieldContent('style'); ?>
</head>

<body>

    <?php echo $__env->make('Layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="ps-page">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <?php echo $__env->make('Layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('includes.include', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>
    <script src="<?php echo e(asset('assets/plugins/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/bootstrap4/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/select2/dist/js/select2.full.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/owl-carousel/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/jquery-bar-rating/dist/jquery.barrating.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/lightGallery/dist/js/lightgallery-all.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/slick/slick/slick.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/noUiSlider/nouislider.min.js')); ?>"></script>
    <!-- custom code-->
    <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>
</body>

</html>
<?php /**PATH /home/customstegpearl/public_html/root/resources/views/Layout/Layout.blade.php ENDPATH**/ ?>