<div id="app" data-session="<?php echo e(env("SESSION_SECRET_KEY")); ?>"></div>
<header class="ps-header ps-header--1">
    <div class="ps-noti py-2">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-4 col-md-4 d-flex align-items-center topleft_socialicons">
                    <ul class="list-inline text-white">
                        <li class="list-inline-item"><a class="ps-social__link facebook" target="_blank" href="https://www.facebook.com/EPP-SOLAR-105342695473034/#"><i
                                    class="fa fa-facebook fs-3"></i></a></li>
                        <li class="list-inline-item"><a class="ps-social__link twitter" href="https://twitter.com/eppsolar" target="_blank"><i
                                    class="fa fa-twitter fs-3"></i></a></li>
                        <li class="list-inline-item"><a class="ps-social__link youtube" target="_blank" href="https://www.youtube.com/channel/UC3O8XlirDTittHT2xV6yBHg"><i
                                    class="fa fa-youtube fs-3"></i></a></li>
                        <li class="list-inline-item"><a class="ps-social__link instagram" target="_blank" href="https://www.instagram.com/epp_solar_/"><i
                                    class="fa fa-instagram fs-3"></i></a></li>
                        <li class="list-inline-item"><a class="ps-social__link linkedin" target="_blank" href="https://www.linkedin.com/company/eppsolar"><i
                                    class="fa fa-linkedin fs-3"></i></a></li>
                    </ul>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-3 d-xl-flex d-none">
                    <div class="topheader_runningtxt text-white fw-600">
                        
                        Hotline: <a href="tel:+49 541 96251000"> +49 541 96251000</a> <span class="fs-6 ml-2">(Montag Bis Freitag : 10:00 - 12:30 & 14:00 - 17:00)</span>
                    </div>
                </div>
                <div
                    class="col-xl-4 col-lg-8 col-md-8 d-flex align-items-center justify-content-end topright_userlogin">
                    <ul class="list-inline text-white d-flex align-items-center">
                        <!-- <li class="list-inline-item"><a href="#" class="font-weight-light">Über uns</a></li> -->
                        <!--<li class="list-inline-item">-->
                        <li class="list-inline-item"><a href="<?php echo e(route('login')); ?>"
                                class="">Mein Konto</a></li>
                        <li class="list-inline-item"><a href="/about-us"
                                    class="">Über uns</a></li>
                        <li class="list-inline-item"><a href="<?php echo e(route('cart')); ?>"
                                class="">Warenkorb</a></li>
                        <!--<li class="list-inline-item"><a href="#" class="font-weight-light">Kontakt</a></li>-->

                        <?php if(auth()->guard()->check()): ?>
                        <li class="dropdown user_dropdown">
                            <a href="<?php echo e(route('user.dashboard')); ?>"  class="dropdown-toggle shadow-none mr-0" type="button" id="loginuser_dropdown" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><?php echo e(Auth::user()->name); ?></a>
                            <div class="dropdown-menu dropdown-menu-right p-2" aria-labelledby="loginuser_dropdown">
                                <a class="dropdown-item user_link d-flex align-items-center justify-content-between" href="<?php echo e(route('user.dashboard')); ?>">Dashboard <i class="icon-grid fw-700"></i></a>
                                <a class="dropdown-item user_link d-flex align-items-center justify-content-between" href="<?php echo e(route('user.account')); ?>">Profile <i class="icon-user fw-700"></i></a>
                                <a class="dropdown-item user_link d-flex align-items-center justify-content-between" href="<?php echo e(route('user.orders')); ?>">Orders <i class="icon-outbox fw-700"></i></a>
                                <a class="dropdown-item user_link d-flex align-items-center justify-content-between" href="<?php echo e(route('user.address')); ?>">Address <i class="icon-map2 fw-700"></i></a>
                                <a href="<?php echo e(route('logout')); ?>" class="user_link d-flex align-items-center justify-content-between mr-0"><span>Logout</span><i class="fa fa-sign-in mr-1"></i></a>
                            </div>
                        </li>
                        <?php else: ?>
                            <a href="<?php echo e(route('login')); ?>" class="user_link">
                                <i class="fa fa-sign-in mr-1"></i>
                                <span>Login</span>
                            </a>
                        <?php endif; ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-header__top d-none">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="ps-header__text"><strong><a class="d-flex align-items-center justify-content-center"
                                href="tel:4904042308603"><i class="icon-telephone fs-2 font-weight-bold mr-2"></i> : 49
                                (0) 40 4230 8603</a></strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-header__middle">
        <div class="container">
            <div class="ps-logo"><a href="/"><img class="<?php echo e(asset('assets/sticky-logo')); ?>"
                        src="<?php echo e(asset('assets/img/stegpearl/epp-green-white.png')); ?>" alt="epp.solar"></a></div><a class="ps-menu--sticky"
                href="#"><i class="fa fa-bars"></i></a>
            <div class="ps-header__right">
                <ul class="ps-header__icons">
                    <li class="ps-header__item"><a href="<?php echo e(route('catalog')); ?>"><i class="icon-bag2"></i></a></li>
                    <li class="ps-header__item">
                        <?php if(auth()->guard()->check()): ?>
                            <a href="<?php echo e(route('user.dashboard')); ?>"><i class="icon-user"></i></a>
                        <?php else: ?>
                            <a href="<?php echo e(route('login')); ?>"><i
                                    class="icon-user"></i></a>
                        <?php endif; ?>
                        <div class="ps-login--modal">
                            <form id="loginForm">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label>E-Mail Adresse</label>
                                    <input class="form-control" id="email" name="email" type="email"
                                        value="<?php echo e(old('email')); ?>">
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group">
                                    <label>Passwort</label>
                                    <input class="form-control" type="password" name="password"
                                        value="<?php echo e(old('password')); ?>"  />
                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group form-check">
                                    <input class="form-check-input" name="remember-me"
                                        <?php echo e(old('remember-me') ? 'checked' : ''); ?> type="checkbox" />
                                    <label>Remember Me</label>
                                </div>
                                <button class="ps-btn ps-btn--warning" type="submit">Log In</button>
                            </form>
                        </div>
                    </li>
                    
                    <li class="ps-header__item">
                        <a href="<?php echo e(url('cart')); ?>" id="cart-mini"><i
                        class="icon-cart-empty"></i><span
                        class="badge my_cart_count"><?php echo e(count((array) session('cart'))); ?></span></a>
                    </li>
                </ul>
                <!-- <div class="ps-language-currency"><a class="ps-dropdown-value" href="javascript:void(0);" data-toggle="modal" data-target="#popupLanguage">English</a><a class="ps-dropdown-value" href="javascript:void(0);" data-toggle="modal" data-target="#popupCurrency">USD</a></div> -->
                <div class="ps-header__search">
                    <form >
                    
                        <div class="ps-search-table">
                            <div class="input-group">
                                <input class="form-control ps-input" type="text" placeholder="Producten zoeken"
                                    id="keyword" name="keyword">
                                <div class="input-group-append bg-light"><a href="javascript:void(0);"><i
                                            class="fa fa-search"></i></a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="ps-search--result">
                        <div class="ps-result__content">
                            <div class="row m-0" id="search-results-dropdown">
                            </div>
                            <div class="ps-result__viewall"><a href="<?php echo e(route('catalog')); ?>">Alle Ergebnisse anzeigen</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-navigation">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex align-items-center">
                    <div class="sticky_logo d-none">
                        <a href="/"><img class="mr-5" style="width: calc(500px - 400px);"
                            src="<?php echo e(asset('assets/img/stegpearl/epp-green-white.png')); ?>" alt="epp.solar"></a>
                    </div>
                    <div class="ps-navigation__left">
                        <nav class="ps-main-menu">
                            <ul class="menu" id="main_menu">
                                <li class="has-mega-menu <?php echo e(Request::is('/') ? 'activeNav' : ''); ?>"><a class="menuName " href="/">Home</a></li>
                                <li class="has-mega-menu <?php echo e(Request::is('catalog') ? 'activeNav' : ''); ?> "><a class="menuName" href="<?php echo e(route('catalog')); ?>">Shop</a></li>
                                <?php $__currentLoopData = headerCategories(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="has-mega-menu <?php echo e(Request::is('shop/'.$cat->slug) ? 'activeNav' : ''); ?>"><a class="menuName" href="<?php echo e(route('shop', $cat->slug)); ?>"><?php echo e($cat->name); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="ps-navigation__right d-none"><strong><a class="d-flex align-items-center justify-content-end"
                        href="tel:+49 541 96251000"><i class="icon-telephone fs-2 font-weight-bold mr-2"></i> : +49 541 96251000</a></strong>
            </div>
        </div>
    </div>
</header>
<header class="ps-header ps-header--1 ps-header--mobile">
    <div class="ps-noti">
        <div class="container">
            <p class="m-0 text-white py-3"><strong><a class="d-flex align-items-center justify-content-center"
                        href="tel:+49 541 96251000"><i class="icon-telephone fs-2 font-weight-bold mr-2"></i> : +49 541 96251000</a></strong>
            </p>
        </div> </a>
    </div>
    <div class="ps-header__middle">
        <div class="container">
            <div class="ps-logo py-2"><a href="<?php echo e(route('homepage')); ?>"> <img
                        src="<?php echo e(asset('assets/img/stegpearl/epp-green-white.png')); ?>" alt="epp.solar"></a></div>
            <div class="ps-header__right">
                <ul class="ps-header__icons">
                    <li><a class="ps-header__item open-search" href="javascript: void(0)"><i
                                class="fa fa-search"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</header>

 
<script>
    // Add active class to the current button (highlight it)
    var header = document.getElementById("main_menu");
    var btns = header.getElementsByClassName("menuName");
    for (var i = 0; i < btns.length; i++) {
      btns[i].addEventListener("click", function() {
      var current = document.getElementsByClassName("active");
      if (current.length > 0) { 
        current[0].className = current[0].className.replace(" active", "");
      }
      this.className += " active";
      });
    }
</script>

<script>
    $(document).ready(function() {
       
        $('#keyword').keyup(function() {
            var keyword = $(this).val();
                $('form').on('submit', function(event) {
                    event.preventDefault();
                });
            if (keyword.length >= 2) {
                $.ajax({
                    url: '<?php echo e(route('search')); ?>',
                    method: 'GET',
                    data: {
                        keyword: keyword
                    },
                    success: function(response) {
                        var dropdown = $('#search-results-dropdown');
                        dropdown.empty();

                        if (response.length > 0) {
                            response.slice(0, 4).map(function(item) {
                                let categoryIds = item.categories.split(',')[0];

                                let url = "<?php echo e(route('product.detail')); ?>/"+categoryIds+"/"+ item
                                    .slug;
                                let imageUrl =
                                    "<?php echo e(asset('root/public/uploads/')); ?>/" + item
                                    .thumb_image;
                                // console.log(item);
                                dropdown.append('<div class="col-12 col-lg-6">' +
                                    '<div class="ps-product ps-product--horizontal">' +
                                    '<div class="ps-product__thumbnail"><a class="ps-product__image" href="' +
                                    url + '">' +
                                    '<figure><img src="' + imageUrl +
                                    '" alt="Epp Solar" /></figure>' +
                                    '</a></div>' +
                                    '<div class="ps-product__content">' +
                                    '<h5 class="ps-product__title"><a href="/product-detail/'+categoryIds+'/'+ item.slug+'">' + item
                                    .product_name + '</a></h5>' +
                                    '<p class="ps-product__desc">Study history up to 30 days Up to 5 users simultaneously Has HEALTH certificate</p>' +
                                    '<div class="ps-product__meta"><span class="ps-product__price">' +
                                    '€' + item.sale_price + '</span></div>' +
                                    '</div></div></div>');
                                $(".ps-result__viewall").removeClass('d-none');
                            });
                        } else {
                            dropdown.append(
                                '<a class="dropdown-item" href="#">No results found</a>'
                            );
                            $(".ps-result__viewall").addClass('d-none');
                        }

                        dropdown.show();
                    }
                });
            } else {
                $('#search-results-dropdown').empty().hide();
            }
        });
    });
    
</script>

<?php /**PATH /home/customstegpearl/public_html/root/resources/views/Layout/header.blade.php ENDPATH**/ ?>