<?php $__env->startSection('content'); ?>
    <!---------------- Home Page Start --------------------->
    <div class="ps-home ps-home--1">
        <section class="ps-section--banner">
            <div class="ps-section__overlay">
                <div class="ps-section__loading"></div>
            </div>
            <div class="owl-carousel" data-owl-auto="true" data-owl-loop="true" data-owl-speed="8000" data-owl-gap="0"
                data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1"
                data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
                <div class="ps-banner">
                    <picture>
                        <source media="(min-width:768px)" srcset="<?php echo e(asset('assets/img/stegpearl/stegpearl_slide_2.jpg')); ?>" class="img-fluid">
                        <img src="<?php echo e(asset('assets/img/stegpearl/mobile_banner_1.jpg')); ?>" alt="Stegpearl" class="img-fluid">
                    </picture>
                </div>
                <div class="ps-banner">
                    <picture>
                        <source media="(min-width:768px)" srcset="<?php echo e(asset('assets/img/stegpearl/slide_2-min.jpg')); ?>"
                            class="img-fluid">
                        <img src="<?php echo e(asset('assets/img/stegpearl/mobile_banner_2.jpg')); ?>" alt="Stegpearl" class="img-fluid">
                    </picture>
                </div>
                
                <div class="ps-banner">
                    <picture>
                        <source media="(min-width:768px)" srcset="<?php echo e(asset('assets/img/stegpearl/slide_4-min.jpg')); ?>"
                            class="img-fluid">
                        <img src="<?php echo e(asset('assets/img/stegpearl/mobile_banner_3.jpg')); ?>" alt="Stegpearl" class="img-fluid">
                    </picture>
                </div>
            </div>
        </section>

        <div class="ps-home__content">
            <div class="container">
                <div class="ps-promo mt-5 ps-section--category ps-section--latest ps-category--image mt-5">
                    <h3 class="ps-section__title">Beliebte Kategorien</h3>
                    <div class="row">
                        <?php $__currentLoopData = categories(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-6 col-md-3 mb-2 px-1 p-0">
                                <div class="ps-promo__item">
                                    <a class="ps-category__image ps-promo__banner" href="<?php echo e(route('shop',$cat->slug)); ?>">
                                        <img class="ps-promo__banner" src="<?php echo e(asset('root/public/uploads/category/'.$cat->image)); ?>" alt="<?php echo e(@$cat->image); ?>">
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            </div>

            <section class="ps-section--latest mt-5">
                <div class="container">
                    <h3 class="ps-section__title">Bestseller-Produkte</h3>
                    <div class="ps-section__carousel pt-4">
                        <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000"
                            data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="4" data-owl-item-xs="1"
                            data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="4"
                            data-owl-duration="1000" data-owl-mousedrag="on">

                            <?php $__currentLoopData = $bestSellingProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$bproduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="ps-section__product shadow rounded m-2">
                                <div class="ps-product ps-product--standard">
                                    <div class="ps-product__thumbnail"><a class="ps-product__image" href="<?php echo e(route('product.detail',$bproduct->slug)); ?>">
                                            <figure><img src="<?php echo e(asset('root/public/uploads/'.$bproduct->thumb_image)); ?>"
                                                    alt="alt" /><img
                                                    src="<?php echo e(asset('root/public/uploads/'.$bproduct->thumb_image)); ?>"
                                                    alt="alt" /></figure>
                                        </a>
                                        
                                    </div>
                                    <div class="ps-product__content">
                                        <h5 class="ps-product__title"><a href="<?php echo e(route('product.detail',$bproduct->slug)); ?>"><?php echo e($bproduct->product_name); ?></a></h5>
                                        <div class="ps-product__meta"><span
                                                class="ps-product__price sale"><?php echo e(formatPrice($bproduct->sale_price)); ?></span><span
                                                class="ps-product__del"><?php echo e(formatPrice($bproduct->price)); ?></span>
                                        </div>
                                        <!---->
                                        <?php if($bproduct->type !='variable'): ?>
                                            <div class="add_to_cart_box"><a class="btn cart_btn d-block" href="javascript:void(0)" onclick="add_to_cart('<?php echo e($bproduct->id); ?>')">Add to cart</a>
                                            </div>
                                        <?php else: ?>
                                           <div class="add_to_cart_box">
                                                <a class="btn cart_btn d-block" href="<?php echo e(route('product.detail',$bproduct->slug)); ?>">View</a>
                                            </div>
                                        <?php endif; ?>

                                        <!-- Remove Commnet to show whislist
                                                    <div class="mt-4 d-flex align-items-center justify-content-between">
                                                    <div class="add_to_cart_box"><a class="btn cart_btn" >Add to cart</a></div>
                                                 <div class="ps-product__item d-none" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="wishlist.html"><i class="fa fa-heart-o fs-2"></i></a></div>
                                                 </div> -->

                                        

                                    </div>
                                </div>
                            </div>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="ps-promo mt-5">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="ps-promo__item"><img class="ps-promo__banner"
                                        src="<?php echo e(asset('assets/img/stegpearl/hybrid-01.jpg')); ?>" alt="alt" />
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="ps-promo__item">
                                    <img class="ps-promo__banner" src="<?php echo e(asset('assets/img/stegpearl/solar-01.jpg')); ?>" alt="alt" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <div class="container">
                <section class="ps-section--deals">
                    <div class="ps-section__header">
                        <h3 class="ps-section__title">Die besten Deals der Woche!</h3>
                    </div>
                    <div class="ps-section__carousel border-0">
                        <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000"
                            data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="4"
                            data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4"
                            data-owl-item-xl="4" data-owl-duration="1000" data-owl-mousedrag="on">
                            <?php $__currentLoopData = $featuredProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$featureProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <div class="ps-section__product shadow rounded m-2">
                                <div class="ps-product ps-product--standard">
                                    <div class="ps-product__thumbnail"><a class="ps-product__image" href="<?php echo e(route('product.detail',$featureProduct->slug)); ?>">
                                            <figure><img src="<?php echo e(asset('root/public/uploads/'.$featureProduct->thumb_image)); ?>"
                                                    alt="alt" /></figure>
                                        </a>
                                        <div class="ps-product__percent ps-badge ps-badge--hot">-26%</div>
                                    </div>
                                    <div class="ps-product__content">
                                        <h5 class="ps-product__title"><a href="<?php echo e(route('product.detail',$featureProduct->slug)); ?>"><?php echo e($featureProduct->product_name); ?></a></h5>
                                        <div class="ps-product__meta"><span
                                                class="ps-product__price sale"> <?php echo e(formatPrice($featureProduct->sale_price)); ?></span><span
                                                class="ps-product__del"><?php echo e(formatPrice($featureProduct->price)); ?></span>
                                        </div>
                                         
                                         <?php if($featureProduct->type !='variable'): ?>
                                         <div class="add_to_cart_box"><a class="btn cart_btn d-block" href="javascript:void(0)" onclick="add_to_cart('<?php echo e($bproduct->id); ?>')">Add to cart</a>
                                         </div>
                                     <?php else: ?>
                                         <div class="add_to_cart_box">
                                             <a class="btn cart_btn d-block" href="<?php echo e(route('product.detail',$featureProduct->slug)); ?>">View</a>
                                         </div>
                                     <?php endif; ?>

                                        

                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                </section>
                <section class="ps-about--info mt-5 pb-5">
                    <h2 class="ps-about__title">Why Stegpearl ?</h2>
                    <div class="ps-about__extent">
                        <div class="row m-0">
                            <div class="col-12 col-md-4 p-0">
                                <div class="ps-block--about">
                                    <div class="ps-block__icon"><i class="fa fa-mobile"></i></div>
                                    <h4 class="ps-block__title">Profi Beratung</h4>
                                    <div class="ps-block__subtitle">Wir sind telefonisch oder per Mail für Sie
                                        erreichbar: vor, während und nach dem Kauf. Wenn Sie Hilfe benötigen, melden
                                        Sie sich einfach bei uns. Unsere erfahrenen Berater helfen Ihnen gerne.
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 p-0">
                                <div class="ps-block--about">
                                    <div class="ps-block__icon"><i class="fa fa-cubes"></i></div>
                                    <h4 class="ps-block__title">Selber Aufbauen</h4>
                                    <div class="ps-block__subtitle">Alle unsere Produkte sind so ausgewählt, dass
                                        sie mit unseren Montageanleitungen möglichst einfach aufgebaut werden
                                        können. So sparen Sie durch Eigenleistung viel Geld.</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 p-0">
                                <div class="ps-block--about">
                                    <div class="ps-block__icon"><i class="fa fa-truck"></i></div>
                                    <h4 class="ps-block__title">Schneller Versand</h4>
                                    <div class="ps-block__subtitle">Neben günstigen Angeboten, Rabattaktionen und
                                        Mengenrabatten profitieren Sie auch von schnellem Versand innerhalb
                                        Deutschlands.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
            <section class="ps-section--reviews" data-background="<?php echo e(asset('assets/img/stegpearl/roundbg.png')); ?>">
                <h3 class="ps-section__title"> Unsere Marktplätze</h3>
                <div class="ps-section__content pt-5">
                    <div class="owl-carousel container text-center mx-auto" data-owl-auto="true" data-owl-loop="true"
                        data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true"
                        data-owl-item="4" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3"
                        data-owl-item-lg="3" data-owl-item-xl="4" data-owl-duration="1000" data-owl-mousedrag="on">
                        <a href="#">
                            <div class="ps-review">
                                <div class="ps-review__text">
                                    <img src="<?php echo e(asset('assets/img/stegpearl/kaufland.webp')); ?>" class="img-fluid"
                                        alt="kaufland">
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="ps-review">
                                <div class="ps-review__text">
                                    <img src="<?php echo e(asset('assets/img/stegpearl/amazon.webp')); ?>" class="img-fluid"
                                        alt="amazon">
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="ps-review">
                                <div class="ps-review__text">
                                    <img src="<?php echo e(asset('assets/img/stegpearl/otto.webp')); ?>" class="img-fluid"
                                        alt="otto">
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="ps-review">
                                <div class="ps-review__text">
                                    <img src="<?php echo e(asset('assets/img/stegpearl/ebay.webp')); ?>" class="img-fluid"
                                        alt="ebay">
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
            </section>
            <div class="container">

                <section class="ps-section--newsletter" data-background="<?php echo e(asset('assets/img/newsletter-bg.jpg')); ?>">
                    <h3 class="ps-section__title">Abonnieren Sie unseren Newsletter<br> und erhalten Sie die
                        neuesten Produktangebote</h3>
                    <div class="ps-section__content">
                        <form action="do_action" method="post">
                            <div class="ps-form--subscribe">
                                <div class="ps-form__control">
                                    <input class="form-control ps-input" type="email"
                                        placeholder="Enter your email address">
                                    <button class="ps-btn ps-btn--warning">Subscribe</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!--------------- Product Category Section ------------------------->
    <?php echo $__env->make('elements.add_to_cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('../Layout.Layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customstegpearl/public_html/root/resources/views/pages/homepage.blade.php ENDPATH**/ ?>