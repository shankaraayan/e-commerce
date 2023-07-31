<?php $__env->startSection("content"); ?>
<style>
    .ps-product--detail .ps-product__price {
        font-size: 18px;
        font-weight: 700;
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

    .ps-product__variations_sec .select_var_row {
        background: transparent!important;
        border: 2px solid #e1e1e1;
    }

    .ps-product__variations_sec .accordion .card:not(:first-of-type):not(:last-of-type) {
        border-radius: 10px !important;
        border: 1px solid #f0f2f5;
    }
    .ps-section__content h3.ps-section__title {
        margin-bottom: 0px;
    }
    .form-check .form-check-label::before {
        display: none;
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
        border-radius: 15px;
    }

    .ps-product__variations_sec .select_var_row {
        border-radius: 15px;
    }

    .ps-desc{
         border-radius: 15px;
     }

    .ps-product__variations_sec input[type=radio] {
        display: none;
    }

    /* Stuff after this is only to make things more pretty */
    .ps-product__variations_sec input[type=radio]+label>figure>img {
        transition: 500ms all;
    }
    .ps-product--detail .ps-product__title {
        font-size: 22px !important;
    }
    .select_var_row:hover {
    cursor: pointer;
    }
    .related_product_view .ps-product__title {
        font-size: 16px;
        line-height: 26px;
        margin-bottom: 13px;
        color: var(--blue-color);
        font-weight: 700;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 50px;
    }
    .font-weight-400{
        font-weight:400 !important;
        font-family:sans-serif
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>



<div class="ps-page--product4 mt-5">
    <div class="container">
        <!--<ul class="ps-breadcrumb">-->
        <!--    <li class="ps-breadcrumb__item"><a href="index.html">Home</a></li>-->
        <!--    <li class="ps-breadcrumb__item"><a href="category-grid-dark.html">Higiene</a></li>-->
        <!--    <li class="ps-breadcrumb__item active" aria-current="page">Face masks</li>-->
        <!--</ul>-->
        <div class="ps-page__content">
            <div class="ps-product--detail ps-product--full">
                <div class="row">
                    <div class="col-12 col-xl-5 col-lg-5 col-md-6">

                        <!-- Kartik -->
                        <div class="ps-section__carousel related_product_view">
                            <div class="main-image owl-carousel owl-loaded owl-drag" data-owl-loop="true" data-owl-auto="false" data-owl-nav="false" data-owl-dots="false">
                                <div class="item">
                                    <img src="<?php echo e(asset('root/public/uploads/' . $product->thumb_image)); ?>" alt="alt" />
                                </div>
                                <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item">
                                    <img src="<?php echo e(asset('root/public/uploads/' . $image->images)); ?>" alt="alt" />
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="gallery owl-carousel owl-loaded owl-drag" data-owl-loop="true" data-owl-auto="false" data-owl-nav="true" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="2" data-owl-item-sm="3" data-owl-item-md="4" data-owl-item-lg="4" data-owl-item-xl="4">
                                <div class="item" style="padding:10px;">
                                    <img src="<?php echo e(asset('root/public/uploads/' . $product->thumb_image)); ?>" alt="alt" data-index="0" />
                                </div>
                                <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item" style="padding:10px;">

                                    <img src="<?php echo e(asset('root/public/uploads/' . $image->images)); ?>" alt="alt" data-index="<?php echo e($loop->index+1); ?>" />

                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                            <!-- Kartik -->

                        <div class="ps-product--gallery">
                            <!-- <div class="ps-product__thumbnail">
                                <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="slide"><img src="<?php echo e(asset('root/public/uploads/' . $image->images)); ?>" alt="alt" /></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div> -->
                            <!-- <div class="ps-gallery--image">
                                <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="slide">
                                    <div class="ps-gallery__item"><img src="<?php echo e(asset('root/public/uploads/' . $image->images)); ?>" alt="alt" /></div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-12 col-xl-7 col-lg-7 col-md-6">
                        <div class="ps-product__info">

                            <div class="ps-product__branch"><a href="#"><?php if(isset($product->categories->name)): ?> <?php echo e($product->categories->name); ?> <?php endif; ?></a></div>
                            <div class="ps-product__title"><?php echo e($product->product_name); ?></div>

                            
                            
                            <div  class="ps-product__meta"><span class="ps-product__price sale"  id="totalPrice"><?php if($product->type == 'variable'): ?> Please Select Attributes for best price <?php else: ?> <?php echo e(formatPrice($product->sale_price)); ?> <?php endif; ?></span><span class="ps-product__del"><?php if($product->type == 'variable'): ?> <?php else: ?><?php echo e(formatPrice($product->price)); ?> <?php endif; ?></span>
                            </div>
                            <h5 class="mb-4 text-dark" id="nameDiv" style="display: none;"></h5>
                            <div id="priceDiv" style="display: none;"></div>

                            <div class="ps-product__variations_sec">
                                 <div class="accordion" id="accordionExample">
                                    <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <div class="card py-3">
                                            <div class="card-header p-0" id="heading_Var<?php echo e($key); ?>" data-toggle="collapse" data-target="#collapse_var_<?php echo e($key); ?>" aria-expanded="true" aria-controls="collapse_var_<?php echo e($key); ?>">
                                                    <div class="card_header_inner pr-5" style="display:inline-block">
                                                            <a href="javascript:void(0)">
                                                                <h3 class="ps-section__title"><?php echo e($data->attribute_name); ?>

                                                                </h3>
                                                            </a>
                                                        </div>
                                                <span class="float-right text-secondary fs-4">Change</span>
                                            </div>

                                            <div id="collapse_var_<?php echo e($key); ?>" class="collapse<?php echo e($key == 0 ? ' show' : ''); ?>" aria-labelledby="heading_Var<?php echo e($key); ?>" data-parent="#accordionExample">
                                                <div class="card-body">
                                                     <p class="ps-checkout__checkbox row p-4 ps-desc bg-light"><?php echo e($data->attribute_description); ?></p>
                                                    <div class="ps-checkout__checkbox row p-3">
                                                        <?php $__currentLoopData = $data->attributeTerms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyss => $vales): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                        <?php if($key == 0 && $data->attribute_type == 'panel'): ?>
                                                        <div class="form-check col-12 mb-3">
                                                            <input class="form-check-input"
                                                                type="radio"
                                                                name="var_radios<?php echo e($key); ?>"
                                                                id="var_radios<?php echo e($key); ?>_<?php echo e($keyss); ?>"
                                                                value="option<?php echo e($keyss); ?>"
                                                                data-atr-name="<?php echo e($vales->attribute_term_name); ?>"
                                                                data-atr-price="<?php echo e($vales->price); ?>"
                                                                data-value="<?php echo e($vales->attribute_term_name); ?>,<?php echo e($vales->price); ?>,<?php echo e($vales->id); ?>"
                                                                onclick="getData(<?php echo e($vales->id); ?>,<?php echo e($product->id); ?>,<?php echo e($key+1); ?>); saveValue(this, '<?php echo e($data->id); ?>','Panel','heading_Var<?php echo e($key); ?>')">

                                                            <label class="form-check-label mx-2" for="var_radios<?php echo e($key); ?>_<?php echo e($keyss); ?>">
                                                                <div class="row select_var_row p-3">
                                                                    <?php if(@$vales->image): ?>

                                                                        <div class="ps-section__thumbnail col-3">
                                                                            <img src="<?php echo e(asset('root/public/uploads/'.$vales->image)); ?>" alt="" width="100px">
                                                                        </div>
                                                                    <?php endif; ?>
                                                                    <div class="col-9 align-middle">
                                                                        <h3 class="ps-section__title py-2"><?php echo e($vales->attribute_term_name); ?></h3>
                                                                        <p class="ps-desc"><?php echo e($vales->attribute_term_description); ?></p>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <?php elseif($key == 1 && $data->attribute_type == 'inverter'): ?>
                                                        <div class="form-check p-0 col-12 mb-3" id="test">

                                                        </div>
                                                        <?php else: ?>
                                                        <div class="form-check col-12 mb-3">
                                                            <input class="form-check-input" type="radio" name="var_radios<?php echo e($key); ?>" id="var_radios<?php echo e($key); ?>_<?php echo e($keyss); ?>" value="option<?php echo e($keyss); ?>" data-atr-price="<?php echo e($vales->price); ?>" data-atr-name="<?php echo e($vales->attribute_term_name); ?>"  data-value="<?php echo e($vales->attribute_term_name); ?>,<?php echo e($vales->price); ?>,<?php echo e($vales->id); ?>"
                                                            onclick="saveValue(this, '<?php echo e($data->id); ?>','','heading_Var<?php echo e($key); ?>')">
                                                            <label class="form-check-label mx-2" for="var_radios<?php echo e($key); ?>_<?php echo e($keyss); ?>">
                                                                <div class="row select_var_row p-3">
                                                                     <?php if(@$vales->image): ?>
                                                                        <div class="ps-section__thumbnail col-3">
                                                                            <img src="<?php echo e(asset('root/public/uploads/'.$vales->image)); ?>" alt="" width="100px">
                                                                        </div>
                                                                    <?php endif; ?>
                                                                    <div class="col-9 align-middle">
                                                                        <h3 class="ps-section__title py-2"><?php echo e($vales->attribute_term_name); ?></h3>
                                                                        <p class="ps-desc"><?php echo e($vales->attribute_term_description); ?></p>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>


                                                        <?php endif; ?>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>


                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </div>
                            </div>


                            <div class="ps-product__quantity">
                                <?php if($product['type'] != 'variable'): ?>
                                <h6>Quantity</h6>
                                <div class="d-flex align-items-center">
                                    <div class="def-number-input number-input safari_only">
                                        <button class="minus" id="minus-btn"><i class="icon-minus"></i></button>
                                        <input class="quantity" min="1" id="quantity" name="quantity" value="1" type="number" />
                                        <button class="plus" id="plus-btn"><i class="icon-plus"></i></button>

                                    </div>
                                     <script>
                                        // get the input element and the +/- buttons
                                        const input = document.getElementById("quantity");
                                        const plusBtn = document.getElementById("plus-btn");
                                        const minusBtn = document.getElementById("minus-btn");

                                        // add event listeners to the buttons
                                        plusBtn.addEventListener("click", function() {
                                            // increase the quantity value by 1
                                            input.value = parseInt(input.value) + 1;
                                        });

                                        minusBtn.addEventListener("click", function() {
                                            // decrease the quantity value by 1
                                            if (parseInt(input.value) > 1) {
                                                input.value = parseInt(input.value) - 1;
                                            }
                                        });
                                    </script>

                                                <?php endif; ?>

                                                    <?php
                                                        $countAttribites = count($attributes);
                                                    ?>

                                            <a class="ps-btn ps-btn--warning ml-3"
                                                    onclick="checkSessionCount('<?php echo e($product->id); ?>', '<?php echo e($countAttribites); ?>')"
                                                    href="javascript:void(0)">ADD TO CART</a>
                                </div>
                            </div>

                                <div class="align-items-center mt-5 mb-4">
                                    <label class="for-label">Lieferort auswählen</label>
                                    <select class="form-control" name="shipping_class" id="shipping_class">

                                        <?php
                                            $result = shippingCountry()->where('shipping_id',$product->shipping_class)->where('status',1);
                                        ?>
                                        <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($country->country); ?>" > <?php echo e(country()->where('id',$country->country)->pluck('country')->first()); ?> </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                        </div>
                    </div>
                </div>
                <div class="ps-product__content">
                    <ul class="nav nav-tabs ps-tab-list" id="productContentTabs" role="tablist">
                        <li class="nav-item" role="presentation"><a class="nav-link active" id="description-tab" data-toggle="tab" href="#description-content" role="tab" aria-controls="description-content" aria-selected="true">Description</a></li>
                        <!--<li class="nav-item" role="presentation"><a class="nav-link" id="specification-tab" data-toggle="tab" href="#specification-content" role="tab" aria-controls="specification-content" aria-selected="false">Specification</a></li>-->
                        <!--<li class="nav-item" role="presentation"><a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews-content" role="tab" aria-controls="reviews-content" aria-selected="false">Reviews (5)</a></li>-->
                    </ul>
                    <div class="tab-content" id="productContent">
                        <div class="tab-pane fade show active" id="description-content" role="tabpanel" aria-labelledby="description-tab">
                            <p class="ps-desc"></p>
                            <?php echo $product->product_description  ?>
                        </div>
                        <div class="tab-pane fade" id="specification-content" role="tabpanel" aria-labelledby="specification-tab">
                            <table class="table ps-table ps-table--oriented">
                                <tbody>
                                    <tr>
                                        <th class="ps-table__th">Higher memory bandwidth</th>
                                        <td>1,544 MHz</td>
                                    </tr>
                                    <tr>
                                        <th class="ps-table__th">Higher pixel rate</th>
                                        <td>74.1 GPixel/s</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="reviews-content" role="tabpanel" aria-labelledby="reviews-tab">
                            <div class="ps-form--review">
                                <div class="ps-form__title">Write a review</div>
                                <div class="ps-form__desc">Your email address will not be published. Required fields are marked *</div>
                                <form action="do_action" method="post">
                                    <div class="row">
                                        <div class="col-12 col-lg-4">
                                            <label class="ps-form__label">Your rating *</label>
                                            <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating--form" data-value="0" style="display: none;">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select><div class="br-widget"><a href="#" data-rating-value="1" data-rating-text="1"></a><a href="#" data-rating-value="2" data-rating-text="2"></a><a href="#" data-rating-value="3" data-rating-text="3"></a><a href="#" data-rating-value="4" data-rating-text="4"></a><a href="#" data-rating-value="5" data-rating-text="5"></a><div class="br-current-rating"></div></div></div>
                                        </div>
                                        <div class="col-6 col-lg-4">
                                            <label class="ps-form__label">Name *</label>
                                            <input class="form-control ps-form__input">
                                        </div>
                                        <div class="col-6 col-lg-4">
                                            <label class="ps-form__label">Email *</label>
                                            <input class="form-control ps-form__input">
                                        </div>
                                        <div class="col-12">
                                            <div class="ps-form__block">
                                                <label class="ps-form__label">Your review *</label>
                                                <textarea class="form-control ps-form__textarea"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 text-center">
                                            <button class="btn ps-btn ps-btn--warning">Add Review</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="ps-product__tabreview">
                                <div class="ps-review--product">
                                    <div class="ps-review__row">
                                        <div class="ps-review__avatar"><img src="img/avatar-review.jpg" alt="alt"></div>
                                        <div class="ps-review__info">
                                            <div class="ps-review__name">Mark J.</div>
                                            <div class="ps-review__date">Oct 30, 2021</div>
                                        </div>
                                        <div class="ps-review__rating">
                                            <div class="br-wrapper br-theme-fontawesome-stars">
                                        <div class="ps-review__desc">
                                            <p>Everything is perfect. I would recommend!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="ps-section--deals py-5">
                <div class="ps-section__header">
                    <h3 class="ps-section__title font-weight-400">Die besten Deals der Woche!</h3>
                </div>
                <div class="ps-section__carousel related_product_view">
                    <div class="owl-carousel owl-loaded owl-drag" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000"
                    data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="5" data-owl-item-xs="1" data-owl-item-sm="2"
                    data-owl-item-md="3" data-owl-item-lg="5" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">


                    <div class="owl-stage-outer shadow-sm">
                                    <div class="owl-stage" style="transform: translate3d(-1974px, 0px, 0px); transition: all 0s ease 0s; width: 7651px;">
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="owl-item cloned" style="width: 246.8px;">
                                            <div class="ps-section__product">
                                                <div class="ps-product ps-product--standard">
                                                    <div class="ps-product__thumbnail"><a class="ps-product__image" href="<?php echo e(route('product.detail',$value->slug)); ?>">
                                                            <figure>
                                                                <img src="<?php echo e(asset('root/public/uploads/'.$value->thumb_image)); ?>" alt="alt">
                                                                <img src="<?php echo e(asset('root/public/uploads/'.$value->thumb_image)); ?>" alt="alt">
                                                            </figure>
                                                        </a>

                                                        <div class="ps-product__badge">
                                                        </div>
                                                        <div class="ps-product__percent ps-badge ps-badge--hot">-61%</div>
                                                    </div>
                                                    <div class="ps-product__content">
                                                        <p class="ps-product__title"><a href="<?php echo e(route('product.detail',$value->slug)); ?>"><?php echo e($value->product_name); ?></a></p>
                                                        <div class="ps-product__meta"><span class="ps-product__price sale"><?php echo e($value->sale_price); ?></span><span class="ps-product__del"><?php echo e($value->price); ?></span>
                                                        </div>

                                                            <?php if($value->type !='variable'): ?>
                                                                 <div class="add_to_cart_box"><a class="btn cart_btn d-block" href="javascript:void(0)" onclick="add_to_cart('<?php echo e($value->id); ?>')">Add to cart</a>
                                                                 </div>
                                                             <?php else: ?>
                                                                 <div class="add_to_cart_box">
                                                                     <a class="btn cart_btn d-block" href="<?php echo e(route('product.detail',$value->slug)); ?>">View</a>
                                                                 </div>
                                                             <?php endif; ?>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><i class="fa fa-chevron-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="fa fa-chevron-right"></i></button></div>
                                <div class="owl-dots disabled"><button role="button" class="owl-dot active"><span></span></button></div>
                                <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i class="fa fa-chevron-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="fa fa-chevron-right"></i></button></div>
                                <div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot"><span></span></button></div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<!-- kartik -->

<script>
    $(document).ready(function() {
        // Initialize Owl Carousel for the main image
        var mainCarousel = $('.main-image').owlCarousel({
            items: 1,
            nav: true,
            dots: false,
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000
        });

        // Initialize Owl Carousel for the gallery
        var galleryCarousel = $('.gallery').owlCarousel({
            nav: true,
            dots: false,
            responsive: {
                0: { items: 2 },
                576: { items: 3 },
                768: { items: 4 },
                992: { items: 4 },
                1200: { items: 4 }
            }
        });

        // Function to handle main image change on gallery click
        $('.gallery').on('click', '.item img', function() {
            var index = $(this).data('index');
            mainCarousel.trigger('to.owl.carousel', index);
        });
    });
</script>
<!-- kartik -->


<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        loop: true,
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,

    });
    var swiper2 = new Swiper(".mySwiper2", {
        loop: true,
        spaceBetween: 10,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        thumbs: {
            swiper: swiper,
        },
    });
</script>



<script>

function formatPrice(price) {
  var formattedPrice = parseFloat(price).toFixed(2);
  formattedPrice = formattedPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
  return '€' + formattedPrice;
}

// PRice Formater


var isFirstIteration = true;
var savedValues = {};

function saveValue(element, attributeId, name = null,pids) {

var atr_name = element.getAttribute('data-atr-name');
var atr_price = element.getAttribute('data-atr-price');
atr_price = formatPrice(atr_price);


$("#" + pids).find("small").remove();
$("#" + pids).append(`<small>${atr_name}</small> <small class="text-danger mr-5 font-weight-bold pl-2">${atr_price}</small>`);

// console.log('col');
    // alert('ok');
var id = element.getAttribute('id');
var value = element.getAttribute('data-value');
//console.log(id,value);
var values = value.split(',');

// console.log(value);

var attributeTermName = values[0];
var attributeTermPrice = parseFloat(values[1]); // Parse price as a float
var attributeTermID = parseFloat(values[2]); // Parse price as a float


var nameDiv = document.getElementById('nameDiv');
var priceDiv = document.getElementById('priceDiv');
var totalPriceDiv = document.getElementById('totalPrice');


if (name === 'Panel') {
savedValues = {}; // Clear saved values when "panel" attribute is selected
}

if (attributeId in savedValues) {
// Replace existing values
savedValues[attributeId].name = attributeTermName;
savedValues[attributeId].price = attributeTermPrice;
savedValues[attributeId].price = attributeTermPrice;
savedValues[attributeId].termid = attributeTermID;


} else {
// Add new values
savedValues[attributeId] = {
  name: attributeTermName,
  price: attributeTermPrice,
  termid:attributeTermID

};
}

var attributeIds = Object.keys(savedValues);
var count = attributeIds.length;


// Update nameDiv
var names = Object.values(savedValues).map(function(item) {
return item.name;
});
nameDiv.textContent = names.join(' + ');

var names = Object.values(savedValues).map(function(item) {
return item.name;
});
nameDiv.textContent = names.join(' + ');

var termIds = Object.values(savedValues).map(function(item) {
return item.termid;
});


// Update priceDiv
var prices = Object.values(savedValues).map(function(item) {
return item.price;
});
priceDiv.textContent = prices.reduce(function(sum, price) {
return sum + price;
}, 0).toFixed(2);

// Update totalPriceDiv
totalPriceDiv.textContent = '€' + priceDiv.textContent;

// Save values in session
var totalPrice = parseFloat(priceDiv.textContent);
var sessionData = {
product_id: <?php echo e($product->id); ?>,

termIds: termIds.join(','),

};

// Check if termsID is an array and add it to sessionData

sessionStorage.setItem('sessionData', JSON.stringify(sessionData));

// toggleAccordion(header)

}

function show_name(){
    $('.select_var_row').each(function(){
        $(this).click(function(){
            console.log(this);
            let title = this.querySelector('.ps-section__title');
            let parent = this.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement;
            let child = parent.children[0];
            // console.log(parent);
            let span = child.querySelector('h3.ps-section__title small');
            // console.log(child);
            $(span).html($(title).html());
        })
    })
}

function getData(id,idpro,sid) {

// console.log(id,idpro);
// Send an AJAX request to the backend
$.ajax({
    url: '<?php echo e(route("product.attributeTerms")); ?>',
    method: 'GET',
    data: { id: id, productid:idpro }, // Pass the ID as a parameter
    success: function(response) {
    var users = response;
    var tableBody = $('#test');
    tableBody.empty();

    for (var i = 0; i < users.length; i++) {
        var user = users[i];
        let imageUrl = "<?php echo e(asset('root/public/uploads/')); ?>/" + user.image;

        tableBody.append(`
            <div class="row select_var_row mx-0 p-2" onclick="highlightDiv(this);saveValue(this, '${user.attribute_id}','','heading_Var${sid}');" data-atr-name="${user.attribute_term_name}" data-atr-price="${user.price}" data-value="${user.attribute_term_name},${user.price},${user.id}">
                ${user.image !== null ? `<div class="ps-section__thumbnail col-3">
                    <img src="${imageUrl}" alt="" width="100px">
                </div>` : ""}
                <div class="col-9">
                    <div class="mb-3">
                        <h3 class="ps-section__title py-2">
                            ${user.attribute_term_name}
                            </h3>
                        <p class="ps-desc">${user.attribute_term_description}</p>
                    </div>
                </div>
            </div>`
        );

        show_name();
}

    },
    error: function(xhr, status, error) {

    }
});
}

function highlightDiv(element) {
    element.style.border = '2px solid #075095';
}


   function add_to_cart(id) {
    var product_details = sessionStorage.getItem('sessionData');

    var shippingClassSelect = document.getElementById('shipping_class');
    var shippingCountry = shippingClassSelect.value;
    // console.log(shippingCountry);

        var qty = $("#quantity").val();
        $.ajax({
            type: 'post',
            url: '<?php echo e(url('/add-to-cart')); ?>',
            data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                "id": id,
                "product_details":product_details,
                "quantity": qty,
                "shipping_country" : shippingCountry,
            },
            success: function(response) {

                response = JSON.parse(response);
                if (response.status == true) {
                    console.log(response);
                    $(".my_cart_count").text(response.data);
                    toastr.success(response.message);
                } else {
                    console.log(response);
                    toastr.warning(response.message);
                }
            }
        });

    }
</script>

<script>



function toggleAccordion(header) {
// Get the parent accordion element
var accordion = header.parentNode;

// Close all other accordions
var accordions = document.getElementsByClassName('accordion');
for (var i = 0; i < accordions.length; i++) {
if (accordions[i] !== accordion) {
  accordions[i].classList.remove('active');
}
}

// Toggle the active class on the clicked accordion
accordion.classList.toggle('active');
}
</script>
<script>
function checkSessionCount(productId, countAttributes) {
        var nameDiv = document.getElementById('nameDiv');
        var values = nameDiv.innerHTML;

        var plusCount = 0;

            for (var i = 0; i < values.length; i++) {
            if (values[i] === '+') {
                plusCount++;
            }
            }
      var sessionData = sessionStorage.getItem('sessionData');

        if (plusCount+1 < countAttributes) {
          toastr.error("Please select all attribute combinations!!");
        } else {
            add_to_cart(productId);
        }

    }


</script>

                <?php $__env->stopSection(); ?>

<?php echo $__env->make('../Layout.Layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customstegpearl/public_html/root/resources/views/pages/product-detail.blade.php ENDPATH**/ ?>