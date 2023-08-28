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
               
               
                
                
                <?php if(!empty($sliders)): ?>
                    <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <!-- Image for desktop -->
                            <a href="<?php echo e($values->slider_url); ?>">
                            <div class="ps-banner">
                                <picture>
                                    <source media="(min-width: 768px)" srcset="<?php echo e(asset('root/public/uploads/sliders/desktop/' . $values['desktop'])); ?>" class="img-fluid">
                                    <img src="<?php echo e(asset('root/public/uploads/sliders/phone/' . $values['phone'])); ?>" alt="Stegpearl" class="img-fluid">
                                </picture>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
 

            </div>
        </section>

        <div class="ps-home__content">
            <div class="container">
                <div class="ps-promo my-5 ps-section--category ps-section--latest ps-category--image mt-5">
                    <h2 class="ps-section__title">Beliebte Kategorien</h2>
                    <div class="row justify-content-center">
                        <?php $__currentLoopData = categories()->where('parent_id','0'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 mb-lg-0 mb-4 px-3">
                                <div class="homepage_category rounded border p-1">
                                    <div class="ps-promo__item">
                                        <a class="ps-category__image ps-promo__banner" href="<?php echo e(route('shop',$cat->slug)); ?>">
                                            <img class="ps-promo__banner" src="<?php echo e(asset('root/public/uploads/category/'.$cat->image)); ?>" alt="<?php echo e(@$cat->image); ?>">
                                        </a>
                                    </div>
                                    <div class="text-center fs-3 fw-600 text-blue my-3">
                                        <?php echo e($cat->name); ?>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            </div>

            
                <section class="ps-section--deals pb-5 bg-light-blue">
                    <div class="container">
                    <div class="ps-section__header mb-0">
                        <h2 class="ps-section__title">Bestseller-Produkte</h2>
                    </div>
                    <div class="ps-section__carousel border-0">
                          <div class="owl-carousel owl-loaded owl-drag" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000" data-owl-gap="20" data-owl-nav="true" data-owl-dots="true" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="4" data-owl-item-xl="4" data-owl-duration="1000" data-owl-mousedrag="on">
                
                            
                            <div class="owl-stage-outer py-md-5 py-2">
                              <div class="owl-stage" style="transform: translate3d(-2228px, 0px, 0px); transition: all 1s ease 0s; width: 4706px;">
                               
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.product-small-card','data' => ['productData' => $bestSellingProducts]]); ?>
<?php $component->withName('product-small-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['productData' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($bestSellingProducts)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    
                              </div>
                            </div>
                
                            <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><i
                                    class="fa fa-chevron-left"></i></button><button type="button" role="presentation"
                                class="owl-next"><i class="fa fa-chevron-right"></i></button></div>
                            <div class="owl-dots disabled"><button role="button" class="owl-dot active"><span></span></button></div>
                            <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i
                                    class="fa fa-chevron-left"></i></button><button type="button" role="presentation"
                                class="owl-next"><i class="fa fa-chevron-right"></i></button></div>
                            <div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button
                                role="button" class="owl-dot"><span></span></button><button role="button"
                                class="owl-dot"><span></span></button></div>
                            </div>
                        </div>
                    </div>
                </section>
            

            <div class="container">
                <div class="ps-promo mt-5 mb-3 pt-5">
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

            <section class="ps-section--deals pb-5 bg-light-blue">
                <div class="container">
                <div class="ps-section__header mb-0">
                    <h2 class="ps-section__title">Die besten Deals der Woche!</h2>
                </div>
                <div class="ps-section__carousel border-0">
                      <div class="owl-carousel owl-loaded owl-drag" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000" data-owl-gap="20" data-owl-nav="true" data-owl-dots="true" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="4" data-owl-item-xl="4" data-owl-duration="1000" data-owl-mousedrag="on">
            
                        
                        <div class="owl-stage-outer py-md-5 py-2">
                          <div class="owl-stage" style="transform: translate3d(-2228px, 0px, 0px); transition: all 1s ease 0s; width: 4706px;">
                           
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.product-small-card','data' => ['productData' => $featuredProducts]]); ?>
<?php $component->withName('product-small-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['productData' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($featuredProducts)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                          </div>
                        </div>
            
                        <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><i
                                class="fa fa-chevron-left"></i></button><button type="button" role="presentation"
                            class="owl-next"><i class="fa fa-chevron-right"></i></button></div>
                        <div class="owl-dots disabled"><button role="button" class="owl-dot active"><span></span></button></div>
                        <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i
                                class="fa fa-chevron-left"></i></button><button type="button" role="presentation"
                            class="owl-next"><i class="fa fa-chevron-right"></i></button></div>
                        <div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button
                            role="button" class="owl-dot"><span></span></button><button role="button"
                            class="owl-dot"><span></span></button></div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="container">
                
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
                <h2 class="ps-section__title"> Unsere Marktplätze</h2>
                <div class="ps-section__content pt-5">
                    <div class="owl-carousel container text-center mx-auto" data-owl-auto="true" data-owl-loop="true"
                        data-owl-speed="5000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="false"
                        data-owl-item="4" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3"
                        data-owl-item-lg="3" data-owl-item-xl="4" data-owl-duration="1000" data-owl-mousedrag="on">
                        <a href="javascript:void(0)">
                            <div class="ps-review">
                                <div class="ps-review__text">
                                    <img src="<?php echo e(asset('assets/img/stegpearl/kaufland.webp')); ?>" class="img-fluid"
                                        alt="kaufland">
                                </div>
                            </div>
                        </a>
                        <a href="javascript:void(0)">
                            <div class="ps-review">
                                <div class="ps-review__text">
                                    <img src="<?php echo e(asset('assets/img/stegpearl/amazon.webp')); ?>" class="img-fluid"
                                        alt="amazon">
                                </div>
                            </div>
                        </a>
                        <a href="javascript:void(0)">
                            <div class="ps-review">
                                <div class="ps-review__text">
                                    <img src="<?php echo e(asset('assets/img/stegpearl/otto.webp')); ?>" class="img-fluid"
                                        alt="otto">
                                </div>
                            </div>
                        </a>
                        <a href="javascript:void(0)">
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