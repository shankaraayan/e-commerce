<?php $__env->startSection("style"); ?>
<style>

svg {
    width: 16px; /* Adjust the font size to your desired value */
}

.menu--mobile>li{
    padding:5px 0px;
}
    .new-li {
        list-style: none;
        padding-left: 0;
    }

    .new-li > li {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .new-li > li > a {
        color: #555;
        text-decoration: none;
        display: flex;
        align-items: center;
    }

    .new-li > li > a > .fa {
        /* Add your styles for the arrow here */
        margin-right: 5px; /* Adjust the margin to control the space between arrow and text */
        width: 10px; /* Adjust the width to make the arrow narrow */
    }
    </style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>



    <div class="ps-page">

        <div class="ps-categogy ps-categogy--separate">
            <div class="container">
                <ul class="ps-breadcrumb">
                    <li class="ps-breadcrumb__item"><a href="<?php echo e(route('homepage')); ?>">Home</a></li>
                    <li class="ps-breadcrumb__item active" aria-current="page">Shop</li>
                </ul>
                <!--<h1 class="ps-categogy__name mt-5">Shop</h1>-->
                <?php
                    
                    $currentUri = $_SERVER['REQUEST_URI'];
                    $segments = explode('/', $currentUri);
                    $lastSegment = end($segments);

                ?>
                
                

                <div class="ps-categogy__content">
                    <div class="ps-categogy__wrapper">
                        <div class="ps-categogy__filter"> <a href="#" id="collapse-filter"><i class="fa fa-filter"></i><i class="fa fa-times"></i>Filter</a></div>
                        <div class="ps-categogy__sort">
                         <div class="dropdown d-inline-block arky_sort_dropdown">
                          <a class="btn dropdown-toggle fs-4 shadow-none" type="button" id="sort_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sort by</a>
                            <div class="dropdown-menu p-2" aria-labelledby="sort_dropdown">
                             <a class="dropdown-item" href="#" data-sort="popularity">Popularity</a>
                             <a class="dropdown-item" href="#" data-sort="low_to_high">Low to High</a>
                             <a class="dropdown-item" href="#" data-sort="high_to_low">High to Low</a>
                            </div>
                         </div> 
                        </div>
                     </div>
                </div>
            </div>
            <div class="ps-categogy__main">
                <div class="container">
                    <div class="ps-categogy__widget"><a href="#" id="close-widget-product"><i class="fa fa-times"></i></a>
                        <div class="ps-widget ps-widget--product">
                            <div class="ps-widget__block">
                                <h4 class="ps-widget__title">Produkt-Kategorien</h4><a class="ps-block-control" href="#"><i class="fa fa-angle-down"></i></a>
                                <div class="ps-widget__content ps-widget__category">
                                    <ul class="menu--mobile">
                                        <?php if(!empty(@$Category)): ?>
                                            <?php $__currentLoopData = $Category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><a href="javascript:void(0);" id="<?php echo e($cat->id); ?>" onclick="categoryProduct(this.id);"><?php echo e($cat->name); ?></a>

                                                    <?php if(count($cat->subcategories) > 0): ?>
                                                    <ul class="menu--mobile new-li">
                                                        <?php $__currentLoopData = $cat->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li>
                                                                <a href="javascript:void(0);" id="<?php echo e($subcat->id); ?>" onclick="categoryProduct(this.id);">
                                                                    <i class="fa fa-arrow-right" ></i>
                                                                    <?php echo e($subcat->name); ?></a>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                <?php endif; ?>

                                                </li>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>

                            <div class="ps-widget__block">
                                <h4 class="ps-widget__title">Ähnliche Produkte</h4><a class="ps-block-control" href="#"><i class="fa fa-angle-down"></i></a>
                                <div class="ps-widget__content">

                                    <?php if(!empty(@$products)): ?>
                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <?php if($key == 5): ?>
                                                <?php break; ?>
                                            <?php endif; ?>
                                            <div class="ps-widget__item">
                                                <div class="row no-gutters">
                                                    <div class="col-4 pr-2">
                                                        <div class="product_pics">
                                                            <img src="<?php echo e(asset('root/public/uploads/'.$product->thumb_image)); ?>" class="img-fluid" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                    <div class="product_info_rel">
                                                        <p class="product_info_name ps-product__title"><?php echo e($product->product_name); ?></p>
                                                        
                                                        <div class="product_info_price">€<?php echo e(formatPrice($product->sale_price)); ?></div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                </div>
                            </div>


                         </div>
                    </div>
                    <div class="ps-categogy__product">
                        <div class="row m-0 " id="responseContainer">
                            <?php if(!empty(@$products)): ?>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-12 col-lg-4 p-0">
                                        <div class="ps-product ps-product--standard">
                                            <div class="ps-product__thumbnail"><a class="ps-product__image" href="<?php echo e(route('product.detail',$product->slug)); ?>">
                                                    <figure>
                                                        <img src="<?php echo e(asset('root/public/uploads/'.$product->thumb_image)); ?>" alt="alt" class="img-fluid" />
                                                        <img src="<?php echo e(asset('root/public/uploads/'.$product->thumb_image)); ?>" class="img-fluid" alt="alt" />
                                                    </figure>
                                                </a>
                                                <div class="ps-product__actions">
                                                    <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="" data-original-title="Wishlist"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                                                    <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick view"><a href="javascript:void(0);" onclick="quicViewProducts( <?php echo e($product->id); ?> );"><i class="fa fa-search"></i></a></div>
                                                </div>
                                                <div class="ps-product__badge">
                                                    <div class="ps-badge ps-badge--hot">Hot</div>
                                                </div>
                                            </div>
                                            <div class="ps-product__content">
                                                <a class="ps-product__branch" href="<?php echo e(route('product.detail',$product->slug)); ?>"><?php echo e(categories()->where('id',$product->categories)->pluck('name')->first()); ?></a>
                                                

                                                <h5 class="ps-product__title" style="font-size:20px;min-height:auto;"><a href="<?php echo e(route('product.detail',$product->slug)); ?>"><?php echo e($product->product_name); ?></a></h5>
                                                <div class="ps-product__meta">
                                                    <span class="ps-product__price"><s><?php echo e(formatPrice($product->price)); ?></s></span>
                                                    <span class="ps-product__price"><?php echo e(formatPrice($product->sale_price)); ?></span>
                                                </div>

                                                
                                                <div class="ps-product__actions ps-product__group-mobile d-block">

                                                    <div class="ps-product__cart d-block">
                                                      <?php if($product->type !='variable'): ?>
                                            <div class="add_to_cart_box"><a class="btn cart_btn d-block" href="javascript:void(0)" onclick="add_to_cart('<?php echo e($product->id); ?>')">Add to cart</a>
                                            </div>
                                        <?php else: ?>
                                           <div class="add_to_cart_box">
                                                <a class="btn cart_btn d-block" href="<?php echo e(route('product.detail',$product->slug)); ?>">View</a>
                                            </div>
                                        <?php endif; ?>
                                                    </div>

                                                    <!-- <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="wishlist.html"><i class="fa fa-heart-o"></i></a></div> -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <?php endif; ?>

                        </div>
                        <div class="ps-pagination">
                            <?php echo e($products->links()); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>



    </div>
    <div class="ps-search">
        <div class="ps-search__content ps-search--mobile"><a class="ps-search__close" href="#" id="close-search"><i class="icon-cross"></i></a>
            <h3>Search</h3>
            <form action="do_action" method="post">
                <div class="ps-search-table">
                    <div class="input-group">
                        <input class="form-control ps-input" type="text" placeholder="Producten zoeken">
                        <div class="input-group-append"><a href="#"><i class="fa fa-search"></i></a></div>
                    </div>
                </div>
            </form>
            <div class="ps-search__result">
                <div class="ps-search__item">
                    <div class="ps-product ps-product--horizontal">
                        <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                                <figure><img src="img/products/052.jpg" alt="alt" /></figure>
                            </a></div>
                        <div class="ps-product__content">
                            <h5 class="ps-product__title"><a>3-layer <span class='hightlight'>mask</span> with an elastic band (1 piece)</a></h5>
                            <p class="ps-product__desc">Study history up to 30 days Up to 5 users simultaneously Has HEALTH certificate</p>
                            <div class="ps-product__meta"><span class="ps-product__price">$38.24</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ps-search__item">
                    <div class="ps-product ps-product--horizontal">
                        <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                                <figure><img src="img/products/033.jpg" alt="alt" /></figure>
                            </a></div>
                        <div class="ps-product__content">
                            <h5 class="ps-product__title"><a>3 Layer Disposable Protective Face <span class='hightlight'>mask</span>s</a></h5>
                            <p class="ps-product__desc">Study history up to 30 days Up to 5 users simultaneously Has HEALTH certificate</p>
                            <div class="ps-product__meta"><span class="ps-product__price sale">$14.52</span><span class="ps-product__del">$17.24</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ps-search__item">
                    <div class="ps-product ps-product--horizontal">
                        <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                                <figure><img src="img/products/051.jpg" alt="alt" /></figure>
                            </a></div>
                        <div class="ps-product__content">
                            <h5 class="ps-product__title"><a>3-Ply Ear-Loop Disposable Blue Face <span class='hightlight'>mask</span></a></h5>
                            <p class="ps-product__desc">Study history up to 30 days Up to 5 users simultaneously Has HEALTH certificate</p>
                            <div class="ps-product__meta"><span class="ps-product__price sale">$14.99</span><span class="ps-product__del">$38.24</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ps-search__item">
                    <div class="ps-product ps-product--horizontal">
                        <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                                <figure><img src="img/products/050.jpg" alt="alt" /></figure>
                            </a></div>
                        <div class="ps-product__content">
                            <h5 class="ps-product__title"><a>Disposable Face <span class='hightlight'>mask</span> for Unisex</a></h5>
                            <p class="ps-product__desc">Study history up to 30 days Up to 5 users simultaneously Has HEALTH certificate</p>
                            <div class="ps-product__meta"><span class="ps-product__price sale">$8.15</span><span class="ps-product__del">$12.24</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button class="btn scroll-top"><i class="fa fa-angle-double-up"></i></button>
    <!-- Quick view modal -->
    <div class="modal fade" id="popupQuickview" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered ps-quickview">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="wrap-modal-slider container-fluid ps-quickview__body">
                        <button class="close ps-quickview__close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <div class="ps-product--detail">
                            <div class="row">
                                <div class="col-12 col-xl-6">
                                    <div class="ps-product--gallery">
                                        <div class="ps-product__thumbnail">
                                            <div class="slide"><img src="img/stegpearl/3d panel.png" alt="alt" /></div>
                                            <div class="slide"><img src="img/stegpearl/800HM-01.png" alt="alt" /></div>
                                            <div class="slide"><img src="img/stegpearl/easy peak power.png" alt="alt" /></div>
                                            <div class="slide"><img src="img/stegpearl/ferlingurum kabel-01.png" alt="alt" /></div>
                                            <div class="slide"><img src="img/stegpearl/montage.png" alt="alt" /></div>
                                        </div>
                                        <div class="ps-gallery--image">
                                            <div class="slide">
                                                <div class="ps-gallery__item"><img src="img/stegpearl/3d panel.png" alt="alt" /></div>
                                            </div>
                                            <div class="slide">
                                                <div class="ps-gallery__item"><img src="img/stegpearl/800HM-01.png" alt="alt" /></div>
                                            </div>
                                            <div class="slide">
                                                <div class="ps-gallery__item"><img src="img/stegpearl/easy peak power.png" alt="alt" /></div>
                                            </div>
                                            <div class="slide">
                                                <div class="ps-gallery__item"><img src="img/stegpearl/ferlingurum kabel-01.png" alt="alt" /></div>
                                            </div>
                                            <div class="slide">
                                                <div class="ps-gallery__item"><img src="img/stegpearl/montage.png" alt="alt" /></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-6">
                                    <div class="ps-product__info">
                                        <div class="ps-product__badge"><span class="ps-badge ps-badge--instock"> IN STOCK</span>
                                        </div>
                                        <div class="ps-product__branch"><a class="ps-product__branch" href="#">Balkonkraftwerk</a><span>,</span> <a class="ps-product__branch" href="#">Easy Peak Power</a></div>
                                        <div class="ps-product__title"><a href="#">Solar-PV Kit 620W Easy Peak Power mit EPP 600W Mikrowechselrichter und 15M Schukostecker</a></div>
                                        <div class="ps-product__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4" selected="selected">4</option>
                                                <option value="5">5</option>
                                            </select><span class="ps-product__review">(5 Reviews)</span>
                                        </div>
                                        <div class="ps-product__desc mb-4">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim sequi numquam vel vitae labore sed qui esse asperiores quibusdam ullam! </p>
                                        </div>
                                        <div class="ps-product__meta"><span class="ps-product__price">€ 770.65</span>
                                        </div>
                                        <div class="ps-product__quantity">
                                            <h6>Quantity</h6>
                                            <div class="d-md-flex align-items-center">
                                                <div class="def-number-input number-input safari_only">
                                                    <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                                    <input class="quantity" min="0" />
                                                    <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                                </div><a class="ps-btn ps-btn--warning" href="#" data-toggle="modal" data-target="#popupAddcartV2">Add to cart</a>
                                            </div>
                                        </div>
                                        <div class="ps-product__type">
                                            <ul class="ps-product__list">
                                                <li> <span class="ps-list__title">Tags: </span><a class="ps-list__text" href="#">Schukostecker</a><a class="ps-list__text" href="#">Ohne WIFI</a>
                                                </li>
                                                <li> <span class="ps-list__title">SKU: </span><a class="ps-list__text" href="#">EPP-310W-AS-QTYx10</a>
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
    <!-- Quick view modal -->
    <div class="ps-preloader" id="preloader">
        <div class="ps-preloader-section ps-preloader-left"></div>
        <div class="ps-preloader-section ps-preloader-right"></div>
    </div>

  <?php echo $__env->make('elements.add_to_cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <script>
    function categoryProduct(id) {
        $.ajax({
            url: '<?php echo e(route('categories-product')); ?>',
            method: 'GET',
            data: { category_id: id },
            success: function(response) {
                var data = response.products;
                $('#responseContainer').empty();
                if (data.length > 0) {
                    data.forEach(function(product) {
                        // console.log(product);
                        var categoryName = JSON.parse('<?php echo json_encode(htmlspecialchars(categories()->where('id', $product->categories)->pluck('name')->first())); ?>');
                        var html = `<div class="col-12 col-lg-4 p-0">
                                        <div class="ps-product ps-product--standard">
                                            <div class="ps-product__thumbnail"><a class="ps-product__image" href="<?php echo e(route('product.detail',$product->slug)); ?>">
                                                    <figure><img src="<?php echo e(asset('root/public/uploads/${product.thumb_image}')); ?>" alt="alt" class="img-fluid" /><img src="img/stegpearl/easy peak power.png" class="img-fluid" alt="alt" />
                                                    </figure>
                                                </a>
                                                <div class="ps-product__actions">
                                                    <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="" data-original-title="Wishlist"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                                                    <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick view"><a href="#" data-toggle="modal" data-target="#popupQuickview"><i class="fa fa-search"></i></a></div>
                                                </div>
                                                <div class="ps-product__badge">
                                                    <div class="ps-badge ps-badge--hot">Hot</div>
                                                </div>
                                            </div>
                                            <div class="ps-product__content">
                                                <a class="ps-product__branch" href="#">${categoryName}</a>
                                                

                                                <h5 class="ps-product__title"><a href="<?php echo e(route('product.detail',$product->slug)); ?>">${ product.product_name }</a></h5>
                                                <div class="ps-product__meta">
                                                    <span class="ps-product__price"><s>€${ product.price }</s></span>
                                                    <span class="ps-product__price">€${ product.sale_price }</span>
                                                </div>

                                                <div class="ps-product__desc mb-4">
                                                    <p>${ product.slug } </p>
                                                </div>
                                                <div class="ps-product__actions ps-product__group-mobile d-block">

                                                    <div class="ps-product__cart d-block">
                                                    <a class="ps-btn ps-btn--warning w-100" href="#" data-toggle="modal" data-target="#popupAddcart">Add to cart</a>
                                                    </div>

                                                    <!-- <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="wishlist.html"><i class="fa fa-heart-o"></i></a></div> -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
                                $('#responseContainer').append(html);

                    });
                }else{
                    var noProductHtml = '<div class="col-12"  style="height:500px">' +
                        '<p>No product found</p>' +
                        '</div>';
                    $('#responseContainer').append(noProductHtml);
                }
            }
        });
    }
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const sortLinks = document.querySelectorAll('a[data-sort]');

    sortLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const sortValue = this.getAttribute('data-sort');
                updateSortQueryParams(sortValue);
            });
        });

    function updateSortQueryParams(sortValue) {
        const urlParams = new URLSearchParams(window.location.search);
        const currentSortValue = urlParams.get('orderBy');
        
        if (currentSortValue !== sortValue) {
            urlParams.set('orderBy', sortValue);
        } else {
            urlParams.delete('orderBy');
        }
        const baseUrl = window.location.origin + window.location.pathname;
        const newUrl = baseUrl + '?' + urlParams.toString();
        window.history.pushState({}, '', newUrl);
        updateDisplayedProducts(sortValue);
    }
    function updateDisplayedProducts(sortValue) {
        var url = "<?php echo e(request()->url()); ?>";
        var segments = url.split('/');
        var lastSegment =  segments[segments.length - 1];
         $.ajax({
                url: '<?php echo e(route('categories-product')); ?>',
                method: 'GET',
                data: { category: lastSegment,shortBy: sortValue},
                success: function(response)
                {
                var data = response.products;
                $('#responseContainer').empty();
                if (data.length > 0) {
                    data.forEach(function(product) {
                        // console.log(product);
                        var categoryName = JSON.parse('<?php echo json_encode(htmlspecialchars(categories()->where('id', $product->categories)->pluck('name')->first())); ?>');
                        var html = `<div class="col-12 col-lg-4 p-0">
                                        <div class="ps-product ps-product--standard">
                                            <div class="ps-product__thumbnail"><a class="ps-product__image" href="<?php echo e(route('product.detail',$product->slug)); ?>">
                                                    <figure><img src="<?php echo e(asset('root/public/uploads/${product.thumb_image}')); ?>" alt="alt" class="img-fluid" /><img src="img/stegpearl/easy peak power.png" class="img-fluid" alt="alt" />
                                                    </figure>
                                                </a>
                                                <div class="ps-product__actions">
                                                    <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="" data-original-title="Wishlist"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                                                    <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick view"><a href="#" data-toggle="modal" data-target="#popupQuickview"><i class="fa fa-search"></i></a></div>
                                                </div>
                                                <div class="ps-product__badge">
                                                    <div class="ps-badge ps-badge--hot">Hot</div>
                                                </div>
                                            </div>
                                            <div class="ps-product__content">
                                                <a class="ps-product__branch" href="#">${categoryName}</a>
                                                

                                                <h5 class="ps-product__title"><a href="<?php echo e(route('product.detail',$product->slug)); ?>">${ product.product_name }</a></h5>
                                                <div class="ps-product__meta">
                                                    <span class="ps-product__price"><s>€${ product.price }</s></span>
                                                    <span class="ps-product__price">€${ product.sale_price }</span>
                                                </div>

                                                <div class="ps-product__desc mb-4">
                                                    <p>${ product.slug } </p>
                                                </div>
                                                <div class="ps-product__actions ps-product__group-mobile d-block">

                                                    <div class="ps-product__cart d-block">
                                                    <a class="ps-btn ps-btn--warning w-100" href="#" data-toggle="modal" data-target="#popupAddcart">Add to cart</a>
                                                    </div>

                                                    <!-- <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="wishlist.html"><i class="fa fa-heart-o"></i></a></div> -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
                                $('#responseContainer').append(html);

                    });
                }else{
                    var noProductHtml = '<div class="col-12"  style="height:500px">' +
                        '<p>No product found</p>' +
                        '</div>';
                    $('#responseContainer').append(noProductHtml);
                }
                    
                }
            });
        
    }

});
</script>


    <!-- For Show and hide filter on shop page -->
    <script>
        $(document).ready(function () {
            window.addEventListener('resize', function () {
                var minWidth = 1024;
                var element = document.getElementsByClassName('ps-categogy__main');
                //console.log(window.innerWidth, "slmvnsdakjdjjklafaof");
                if (window.innerWidth >= minWidth) {
                    element[0].classList.add('active');
                } else {
                    element[0].classList.remove('active');
                }
            });
            var minWidth = 1024;
            var element = document.getElementsByClassName('ps-categogy__main');
          //  console.log(window.innerWidth, "slmvnsdakjdjjklafaof");
            if (window.innerWidth >= minWidth) {
                //console.log(element[0]);
                element[0].classList.add('active');
            } else {
                element[0].classList.remove('active');
            }
        });
    </script>
    <!-- For Show and hide filter on shop page -->
    <script>
        function quicViewProducts(id){
            $("#popupQuickview").modal('show');
            $.ajax({
                url: '<?php echo e(route('products')); ?>', // Replace with the actual URL to your server endpoint
                method: 'GET',
                data: { category_id: id },
                success: function(response)
                {
                    console.log(response);
                }
            });
        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('../Layout.Layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customstegpearl/public_html/root/resources/views/pages/shop.blade.php ENDPATH**/ ?>