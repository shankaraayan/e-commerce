<div class="ps-search">
        <div class="ps-search__content ps-search--mobile"><a class="ps-search__close" href="#" id="close-search"><i
                    class="icon-cross"></i></a>
            <h3>Search</h3>
            <form action="do_action" method="post">
                <div class="ps-search-table">
                    <div class="input-group">
                        <input class="form-control ps-input" type="text" placeholder="Producten zoeken" id="mobile-keyword">
                        <div class="input-group-append"><a href="#"><i class="fa fa-search"></i></a></div>
                    </div>
                </div>
            </form>
            <div class="ps-search__result">
                <div class="ps-search__item" id="search-results-mobile">

                </div>
                <div class="ps-result__viewall"><a class="text-center" href="<?php echo e(route('catalog')); ?>">View all results</a>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-navigation--footer">
        <div class="ps-nav__item"><a href="#" id="open-menu"><i class="icon-menu"></i></a><a href="<?php echo e(route('homepage')); ?>" id="close-menu"><i
                    class="icon-cross"></i></a></div>
        <div class="ps-nav__item"><a href="<?php echo e(route('homepage')); ?>"><i class="icon-home2"></i></a></div>
        <div class="ps-nav__item">
        <?php if(auth()->guard()->check()): ?>
            <a class="ps-header__item" href="<?php echo e(route('user.dashboard')); ?>"><i class="icon-user"></i></a>
        <?php else: ?>
            <a class="ps-header__item" href="<?php echo e(route('login.register')); ?>"><i class="icon-user"></i></a>
        <?php endif; ?>

            </div>
        <!--<div class="ps-nav__item"><a href="wishlist.html"><i class="fa fa-heart-o"></i><span class="badge">3</span></a>-->
        <!--</div>-->
        <div class="ps-nav__item">
            <a href="<?php echo e(url('cart')); ?>"> <i class="icon-cart-empty"></i><span
                 class="badge my_cart_count"><?php echo e(count((array) session('cart'))); ?></span>
            </a>
        </div>
    </div>
    <div class="ps-menu--slidebar">
        <div class="ps-menu__content">
            <ul class="menu--mobile">
                <li><a href="<?php echo e(route('homepage')); ?>">Home</a></li>
                <li class="menu-item-has-children"><a href="<?php echo e(route('catalog')); ?>">Shop</a></li>
               <?php $__currentLoopData = headerCategories(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="has-mega-menu"><a href="<?php echo e(route('shop',$cat->slug)); ?>"><?php echo e($cat->name); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
    <button class="btn scroll-top"><i class="fa fa-angle-double-up"></i></button>
    
    <div class="modal fade" id="popupQuickview" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered ps-quickview">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="wrap-modal-slider container-fluid ps-quickview__body">
                        <button class="close ps-quickview__close" type="button" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div class="ps-product--detail">
                            <div class="row">
                                <div class="col-12 col-xl-6">
                                    <div class="ps-product--gallery">
                                        <div class="ps-product__thumbnail">
                                            <div class="slide"><img src="<?php echo e(asset('assets/img/products/001.jpg')); ?>"
                                                    alt="alt" /></div>
                                            <div class="slide"><img src="<?php echo e(asset('assets/img/products/047.jpg')); ?>"
                                                    alt="alt" /></div>
                                            <div class="slide"><img src="<?php echo e(asset('assets/img/products/047.jpg')); ?>"
                                                    alt="alt" /></div>
                                            <div class="slide"><img src="<?php echo e(asset('assets/img/products/008.jpg')); ?>"
                                                    alt="alt" /></div>
                                            <div class="slide"><img src="<?php echo e(asset('assets/img/products/034.jpg')); ?>"
                                                    alt="alt" /></div>
                                        </div>
                                        <div class="ps-gallery--image">
                                            <div class="slide">
                                                <div class="ps-gallery__item"><img
                                                        src="<?php echo e(asset('assets/img/products/001.jpg')); ?>" alt="alt" />
                                                </div>
                                            </div>
                                            <div class="slide">
                                                <div class="ps-gallery__item"><img
                                                        src="<?php echo e(asset('assets/img/products/047.jpg')); ?>" alt="alt" />
                                                </div>
                                            </div>
                                            <div class="slide">
                                                <div class="ps-gallery__item"><img
                                                        src="<?php echo e(asset('assets/img/products/047.jpg')); ?>" alt="alt" />
                                                </div>
                                            </div>
                                            <div class="slide">
                                                <div class="ps-gallery__item"><img
                                                        src="<?php echo e(asset('assets/img/products/008.jpg')); ?>" alt="alt" />
                                                </div>
                                            </div>
                                            <div class="slide">
                                                <div class="ps-gallery__item"><img
                                                        src="<?php echo e(asset('assets/img/products/034.jpg')); ?>" alt="alt" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-6">
                                    <div class="ps-product__info">
                                        <div class="ps-product__badge"><span class="ps-badge ps-badge--instock"> IN
                                                STOCK</span>
                                        </div>
                                        <div class="ps-product__branch"><a href="#">HeartRate</a></div>
                                        <div class="ps-product__title"><a href="#">Blood Pressure Monitor</a></div>
                                        <div class="ps-product__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4" selected="selected">4</option>
                                                <option value="5">5</option>
                                            </select><span class="ps-product__review">(5 Reviews)</span>
                                        </div>
                                        <div class="ps-product__desc">
                                            <ul class="ps-product__list">
                                                <li>Study history up to 30 days</li>
                                                <li>Up to 5 users simultaneously</li>
                                                <li>Has HEALTH certificate</li>
                                            </ul>
                                        </div>
                                        <div class="ps-product__meta"><span class="ps-product__price">$77.65</span>
                                        </div>
                                        <div class="ps-product__quantity">
                                            <h6>Quantity</h6>
                                            <div class="d-md-flex align-items-center">
                                                <div class="def-number-input number-input safari_only">
                                                    <button class="minus"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i
                                                            class="icon-minus"></i></button>
                                                    <input class="quantity" min="0" name="quantity" value="1"
                                                        type="number" />
                                                    <button class="plus"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i
                                                            class="icon-plus"></i></button>
                                                </div><a class="ps-btn ps-btn--warning" href="#" data-toggle="modal"
                                                    data-target="#popupAddcartV2">Add to cart</a>
                                            </div>
                                        </div>
                                        <div class="ps-product__type">
                                            <ul class="ps-product__list">
                                                <li> <span class="ps-list__title">Tags: </span><a class="ps-list__text"
                                                        href="#">Health</a><a class="ps-list__text"
                                                        href="#">Thermometer</a>
                                                </li>
                                                <li> <span class="ps-list__title">SKU: </span><a class="ps-list__text"
                                                        href="#">SF-006</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="popupCompare" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered ps-compare--popup">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="wrap-modal-slider ps-compare__body">
                        <button class="close ps-compare__close" type="button" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div class="ps-compare--product">
                            <div class="ps-compare__header">
                                <div class="container">
                                    <h2>Compare Products</h2>
                                </div>
                            </div>
                            <div class="ps-compare__content">
                                <div class="ps-compare__table">
                                    <table class="table ps-table">
                                        <tbody>
                                            <tr>
                                                <th></th>
                                                <td>
                                                    <div class="ps-product__remove"><a href="#"><i
                                                                class="fa fa-times"></i></a></div>
                                                    <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                            href="product1.html">
                                                            <figure><img src="<?php echo e(asset('assets/img/products/001.jpg')); ?>"
                                                                    alt></figure>
                                                        </a></div>
                                                    <div class="ps-product__content">
                                                        <h5 class="ps-product__title"><a href="product1.html">Blood
                                                                Pressure Monitor</a></h5>
                                                        <div class="ps-product__meta"><span
                                                                class="ps-product__price">$77.65</span>
                                                        </div>
                                                        <button class="ps-btn ps-btn--warning">Add to cart</button>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="ps-product__remove"><a href="#"><i
                                                                class="fa fa-times"></i></a></div>
                                                    <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                            href="product1.html">
                                                            <figure><img src="<?php echo e(asset('assets/img/products/034.jpg')); ?>"
                                                                    alt></figure>
                                                        </a></div>
                                                    <div class="ps-product__content">
                                                        <h5 class="ps-product__title"><a href="product1.html">Blood
                                                                Pressure Monitor Upper Arm</a></h5>
                                                        <div class="ps-product__meta"><span
                                                                class="ps-product__del">$64.65</span><span
                                                                class="ps-product__price sale">$86.67</span>
                                                        </div>
                                                        <button class="ps-btn ps-btn--warning">Add to cart</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Description</th>
                                                <td>
                                                    <ul class="ps-product__list">
                                                        <li class="ps-check-line">5 cleaning programs</li>
                                                        <li class="ps-check-line">Digital display</li>
                                                        <li class="ps-check-line">Memory for 3 user</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul class="ps-product__list">
                                                        <li class="ps-check-line">5 cleaning programs</li>
                                                        <li class="ps-check-line">Digital display</li>
                                                        <li class="ps-check-line">Memory for 3 user</li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Availability</th>
                                                <td>
                                                    <p class="ps-product__text ps-check-line">in stock</p>
                                                </td>
                                                <td>
                                                    <p class="ps-product__text ps-check-line">in stock</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Weight</th>
                                                <td>
                                                    <p class="ps-product__text">10 kg</p>
                                                </td>
                                                <td>
                                                    <p class="ps-product__text">10 kg</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Dimensions</th>
                                                <td>
                                                    <p class="ps-product__text">10 × 10 × 10 cm</p>
                                                </td>
                                                <td>
                                                    <p class="ps-product__text">10 × 10 × 10 cm</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Color</th>
                                                <td>
                                                    <p class="ps-product__text">Red, Navy</p>
                                                </td>
                                                <td>
                                                    <p class="ps-product__text">Green</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Sku</th>
                                                <td>
                                                    <p class="ps-product__text">SF-006</p>
                                                </td>
                                                <td>
                                                    <p class="ps-product__text">BE-001</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Price</th>
                                                <td><span class="ps-product__price">$77.65</span>
                                                </td>
                                                <td><span class="ps-product__del">$64.65</span><span
                                                        class="ps-product__price sale">$86.67</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="popupLanguage" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ps-popup--select">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="wrap-modal-slider container-fluid">
                        <button class="close ps-popup__close" type="button" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div class="ps-popup__body">
                            <h2 class="ps-popup__title">Select language</h2>
                            <ul class="ps-popup__list">
                                <li class="language-item"> <a class="active btn" href="javascript:void(0);"
                                        data-value="English">English</a></li>
                                <li class="language-item"> <a class="btn" href="javascript:void(0);"
                                        data-value="Deutsch">Deutsch</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   


    <script>
$(document).ready(function() {
    $('#mobile-keyword').keyup(function() {
        var keyword = $(this).val();

        if (keyword.length >= 2) {
            $.ajax({
                url: '<?php echo e(route('search')); ?>',
                method: 'GET',
                data: { keyword: keyword },
                success: function(response) {
                    var dropdown = $('#search-results-mobile');

                    dropdown.empty();

                    if (response.length > 0) {
                        response.slice(0, 4).map(function(item) {
                            let url = "<?php echo e(route('product.detail')); ?>/" + item.slug;

                            let imageUrl = "<?php echo e(asset('root/public/uploads/')); ?>/" + item.thumb_image;
                            console.log(url);
                            dropdown.append('<div class="ps-product ps-product--horizontal">' +
                                '<div class="ps-product__thumbnail"><a class="ps-product__image" href="' + url + '">' +
                                '<figure><img src="' + imageUrl + '" alt="alt" /></figure>' +
                                '</a></div>' +
                                '<div class="ps-product__content">' +
                                '<h5 class="ps-product__title"><a>'+ item.product_name +'</a></h5>' +
                                '<p class="ps-product__desc">Study history up to 30 days Up to 5 users simultaneously Has HEALTH certificate</p>' +
                                '<div class="ps-product__meta"><span class="ps-product__price">'+'€'+item.price+'</span></div>' +
                                '</div></div>');
                        });
                        $(".ps-result__viewall").removeClass('d-none');
                    } else {
                        dropdown.html('<a class="dropdown-item" href="#">No results found</a>');
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
<?php /**PATH /home/customstegpearl/public_html/root/resources/views/includes/include.blade.php ENDPATH**/ ?>