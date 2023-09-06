<!DOCTYPE html>
<html lang="de-DE">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="<?php echo e(asset('assets/img/favicon.png')); ?>" rel="apple-touch-icon-precomposed">
    <link href="<?php echo e(asset('assets/img/favicon.png')); ?>" rel="shortcut icon" type="image/png">
    <link rel="canonical" href="https://eppsolar.de/" />
    <meta name="author" content="">

    <meta property="og:title" content="Balkonkraftwerke, Solarmodule, Wechselrichter, Zubehör" />
    <meta property="og:description" content="Ihre Marke für persönliche und geschäftliche Solarbedürfnisse – Module, Balkonkraftwerke, Wechselrichter und Zubehör." />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://eppsolar.de/root/public/uploads/sliders/phone/64e6d11622a53.webp" />
    <meta property="og:url" content="https://eppsolar.de/" />
    <meta property="article:published_time" content="" />
    <meta property="og:locale" content="de-DE" />
    <meta property="og:site_name" content="epp shop" />
    <meta name="keywords" content="Balkonkraftwerk, WLAN Wechselrichter, Solarmodule, Zubehör">
    <meta name="description" content="Ihre Marke für persönliche und geschäftliche Solarbedürfnisse – Module, Balkonkraftwerke, Wechselrichter und Zubehör.">
    <title>Balkonkraftwerke, Solarmodule, Wechselrichter, Zubehör</title>
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/font-awesome/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/Linearicons/Font/demo-files/demo.css')); ?>">
    <link rel="preconnect" href="<?php echo e(asset('assets/https://fonts.gstatic.com')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.js"></script>
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/bootstrap4/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/owl-carousel/assets/owl.carousel.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/slick/slick/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/lightGallery/dist/css/lightgallery.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/select2/dist/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/lightGallery/dist/css/lightgallery.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/noUiSlider/nouislider.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/customhtml.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/home-1.css')); ?>">
    <script src="<?php echo e(asset('assets/plugins/jquery.min.js')); ?>"></script>
    <?php echo $__env->yieldContent('style'); ?>
</head>

<body>

    <?php echo $__env->make('Layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="ps-page">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <?php echo $__env->make('Layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('includes.include', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="<?php echo e(asset('assets/plugins/jquery.min.js')); ?>"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@flasher/flasher@1.2.4/dist/flasher.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    <script src="<?php echo e(asset('assets/plugins/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/bootstrap4/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/select2/dist/js/select2.full.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/owl-carousel/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/jquery-bar-rating/dist/jquery.barrating.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/lightGallery/dist/js/lightgallery-all.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/slick/slick/slick.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/noUiSlider/nouislider.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>
    <script>
        // *************** price format ******************************
        function price_euro_to_normal(number){
          var ht = number;
          var aaa = ht.replace('.','');
          var bbb = aaa.replace(',','.');
          return bbb;
        }
        
        function price_normal_to_euro(number){
            var locale = 'de';
            var options = { currency: 'eur', minimumFractionDigits: 2, maximumFractionDigits: 2};
            var formatter = new Intl.NumberFormat(locale, options);
            return formatter.format(number);
        }
        
        // *************** end price format ******************************
        </script>
</body>
</html>
<?php /**PATH /home/customstegpearl/public_html/root/resources/views/Layout/Layout.blade.php ENDPATH**/ ?>