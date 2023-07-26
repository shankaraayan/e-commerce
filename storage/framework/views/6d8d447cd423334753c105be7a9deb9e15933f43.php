<header class="ps-header ps-header--1">
    <div class="ps-noti py-2">
        <div class="container">
            <div class="row">
                <div class="col d-flex align-items-center">
                    <!--<ul class="list-inline text-white">-->
                    <!--    <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a></li>-->
                    <!--</ul>-->
                </div>
                <div class="col d-flex align-items-center justify-content-end">
                    <ul class="list-inline text-white">
                        <!--<li class="list-inline-item"><a href="#" class="font-weight-light">Über uns</a></li>-->
                        <!--<li class="list-inline-item">-->
                             <?php if(auth()->guard()->check()): ?>
                                <a href="<?php echo e(route('user.dashboard')); ?>" class="font-weight-light"><?php echo e(Auth::user()->name); ?></a>
                            <?php else: ?>
                                <a href="<?php echo e(route('login.register')); ?>" class="font-weight-light">Mein Konto</a>
                            <?php endif; ?>

                        </li>
                        <li class="list-inline-item"><a href="<?php echo e(route('cart')); ?>" class="font-weight-light">Warenkorb</a></li>
                        <!--<li class="list-inline-item"><a href="#" class="font-weight-light">Kontakt</a></li>-->
                        <li class="list-inline-item">
                            <?php if(auth()->guard()->check()): ?>
                                <a href="<?php echo e(route('logout')); ?>" class="font-weight-light">
                                    <i class="fa fa-sign-in"></i>
                                    <span>Logout</span>
                                </a>
                            <?php else: ?>
                                <a href="<?php echo e(route('login.register')); ?>" class="font-weight-light">
                                    <i class="fa fa-sign-in"></i>
                                    <span>Login</span>
                                </a>
                            <?php endif; ?>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-header__top">
        <div class="container">
            <div class="ps-header__text"><strong><a href="tel:4904042308603"><i
                class="icon-telephone fs-2 font-weight-bold"></i> : 49 (0) 40 4230 8603</a></strong>
            </div>
        </div>
    </div>
    <div class="ps-header__middle">
        <div class="container">
            <div class="ps-logo"><a href="/"><img class="<?php echo e(asset('assets/sticky-logo')); ?>"
                        src="<?php echo e(asset('assets/img/stegpearl/Stegpearl.png')); ?>" alt></a></div><a class="ps-menu--sticky"
                href="#"><i class="fa fa-bars"></i></a>
            <div class="ps-header__right">
                <ul class="ps-header__icons">
                    <li class="ps-header__item"><a href="<?php echo e(route('shop')); ?>"><i class="icon-bag2"></i></a></li>
                    <li>
                        <?php if(auth()->guard()->check()): ?>
                            <a class="ps-header__item" href="<?php echo e(route('user.dashboard')); ?>"><i class="icon-user"></i></a>
                        <?php else: ?>
                            <a class="ps-header__item" href="<?php echo e(route('login.register')); ?>"><i class="icon-user"></i></a>
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
                                    <input class="form-control" id="password" type="password" name="password"
                                        value="<?php echo e(old('password')); ?>">
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
                                        <?php echo e(old('remember-me') ? 'checked' : ''); ?> type="checkbox">
                                    <label>Remember Me</label>
                                </div>
                                <button class="ps-btn ps-btn--warning" type="submit">Log In</button>
                            </form>
                        </div>
                    </li>
                    
                    <li><a class="ps-header__item" href="<?php echo e(url('cart')); ?>" id="cart-mini"><i class="icon-cart-empty"></i><span
                                class="badge my_cart_count"><?php echo e(count((array) session('cart'))); ?></span></a>

                        
                            
                    </li>
                </ul>
                <!-- <div class="ps-language-currency"><a class="ps-dropdown-value" href="javascript:void(0);" data-toggle="modal" data-target="#popupLanguage">English</a><a class="ps-dropdown-value" href="javascript:void(0);" data-toggle="modal" data-target="#popupCurrency">USD</a></div> -->
                <div class="ps-header__search">
                    <form action="do_action" method="post">
                        <div class="ps-search-table">
                            <div class="input-group">
                                <input class="form-control ps-input" type="text" placeholder="Producten zoeken" id="keyword" name="keyword">
                                <div class="input-group-append"><a href="javascript:void(0);"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="ps-search--result" >
                        <div class="ps-result__content">
                            <div class="row m-0" id="search-results-dropdown">


                            </div>
                            <div class="ps-result__viewall"><a href="<?php echo e(route('shop')); ?>">View all results</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-navigation">
        <div class="container">
            <div class="ps-navigation__left">
                <nav class="ps-main-menu">
                    <ul class="menu">
                        <li class="has-mega-menu"><a href="/">Home</a></li>
                        <li class="has-mega-menu">
                            <a href="<?php echo e(route('shop')); ?>">Shop</a>
                        </li>
                       <?php $__currentLoopData = headerCategories(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="has-mega-menu"><a href="<?php echo e(route('shop',$cat->slug)); ?>"><?php echo e($cat->name); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <!--<li class="has-mega-menu"><a href="javascript:void(0);">Blog</a></li>-->
                        <!--<li class="has-mega-menu"><a href="contact-us.html">Contact</a></li>-->
                    </ul>
                </nav>
            </div>
            <div class="ps-navigation__right"><strong><a href="tel:4904042308603"><i
                            class="icon-telephone fs-2 font-weight-bold"></i> : 49 (0) 40 4230 8603</a></strong>
            </div>
        </div>
    </div>
</header>
<header class="ps-header ps-header--1 ps-header--mobile">
    <div class="ps-noti">
        <div class="container">
            <p class="m-0 text-white"><strong><a href="tel:4904042308603"><i
                            class="icon-telephone fs-2 font-weight-bold"></i> : 49 (0) 40 4230 8603</a></strong>
            </p>
        </div> </a>
    </div>
    <div class="ps-header__middle">
        <div class="container">
            <div class="ps-logo"><a href="<?php echo e(route('homepage')); ?>"> <img src="<?php echo e(asset('assets/img/stegpearl/Stegpearl.png')); ?>"
                        alt></a></div>
            <div class="ps-header__right">
                <ul class="ps-header__icons">
                    <li><a class="ps-header__item open-search" href="javascript: void(0)"><i class="fa fa-search"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</header>

<script>
$(document).ready(function() {
    $('#keyword').keyup(function() {
        var keyword = $(this).val();

        if (keyword.length >= 2) {
            $.ajax({
                url: '<?php echo e(route('search')); ?>',
                method: 'GET',
                data: { keyword: keyword },
                success: function(response) {
                    var dropdown = $('#search-results-dropdown');
                    dropdown.empty();

                    if (response.length > 0) {
                        response.slice(0, 4).map(function(item) {
                            let url = "<?php echo e(route('product.detail')); ?>/" + item.slug;

                            let imageUrl = "<?php echo e(asset('root/public/uploads/')); ?>/" + item.thumb_image;
                            console.log(url);
                            dropdown.append('<div class="col-12 col-lg-6">' +
                                '<div class="ps-product ps-product--horizontal">' +
                                '<div class="ps-product__thumbnail"><a class="ps-product__image" href="' + url + '">' +
                                '<figure><img src="' + imageUrl + '" alt="alt" /></figure>' +
                                '</a></div>' +
                                '<div class="ps-product__content">' +
                                '<h5 class="ps-product__title"><a>'+ item.product_name +'</a></h5>' +
                                '<p class="ps-product__desc">Study history up to 30 days Up to 5 users simultaneously Has HEALTH certificate</p>' +
                                '<div class="ps-product__meta"><span class="ps-product__price">'+'€'+item.price+'</span></div>' +
                                '</div></div></div>');
                                $(".ps-result__viewall").removeClass('d-none');
                        });
                    } else {
                        dropdown.append('<a class="dropdown-item" href="#">No results found</a>');
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