<?php $__env->startSection("style"); ?>
<style>
    /* Custom CSS to reduce Laravel paginate icon size */
     svg { width: 16px; /* Adjust the font size to your desired value */ }
    .new-li { list-style: none; padding-left: 0;}
    .new-li > li { display: flex; align-items: center; margin-bottom: 10px;}
    .new-li > li > a { color: #555; text-decoration: none; display: flex; align-items: center;}
    .new-li > li > a > .fa { margin-right: 5px; width: 10px; }
  </style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>

    <div class="ps-page">

        <div class="ps-categogy ps-categogy--separate">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.filtter','data' => ['value' => __('DisabledShortBy')]]); ?>
<?php $component->withName('filtter'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('DisabledShortBy'))]); ?>Einkaufen nach Kategorien <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
          
            <div class="ps-categogy__main pb-40">
                <div class="container">
                    <div class="ps-categogy__widget">
                    <a href="javascript:void(0);" id="close-widget-product"><i class="fa fa-times"></i></a>
                        <div class="ps-widget ps-widget--product bg-white shadow pt-xl-5 pt-lg-5 pt-md-5 pt-3">
                            <div class="ps-widget__block">
                                <h4 class="ps-widget__title">Produkt-Kategorien</h4><a class="ps-block-control" href="#"><i class="fa fa-angle-down"></i></a>
                                <div class="ps-widget__content ps-widget__category">
                                    <ul class="menu--mobile">
                                        <?php if(!empty(@$Category)): ?>
                                            <?php $__currentLoopData = $Category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><a href="<?php echo e(route('shop',$cat->slug)); ?>" id="<?php echo e($cat->id); ?>" onclick="categoryProduct(this.id);"><?php echo e($cat->name); ?></a>
                                                <span class="sub-toggle <?php echo e(count($cat->subcategories) > 0 ? 'd-block' : 'd-none'); ?>" ><i class="fa fa-chevron-down"></i></span>
                                                    <?php if(count($cat->subcategories) > 0): ?>
                                                    <ul class="sub-menu" style="display: none;">
                                                        <?php $__currentLoopData = $cat->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li>
                                                                <a href="<?php echo e(route('shop', $subcat->slug)); ?>" id="<?php echo e($subcat->id); ?>" onclick="categoryProduct(this.id);">
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

                         </div>
                    </div>
                    <div class="ps-categogy__product">
                       
                        <div class="row m-0 no-gutters" id="responseContainer">
                            <?php if(!empty(@$catalog)): ?>
                                <?php $__currentLoopData = $catalog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-12 col-lg-4">
                                        <div class="ps-product ps-product--standard">
                                            <div class="ps-product__thumbnail"><a class="ps-product__image" href="<?php echo e(route('shop',$product->slug)); ?>">
                                                    <figure>
                                                        <img src="<?php echo e(asset('root/public/uploads/category/'.$product->image)); ?>" alt="alt" class="img-fluid" />
                                                        <img src="<?php echo e(asset('root/public/uploads/category/'.$product->image)); ?>" class="img-fluid" alt="alt" />
                                                    </figure>
                                                </a>
                                                <div class="ps-product__actions">
                                                </div>
                                                <div class="ps-product__badge">
                                                    <div class="ps-badge ps-badge--hot">Hot</div>
                                                </div>
                                            </div>
                                            <div class="ps-product__content">
                                            <a href="<?php echo e(route('shop',$product->slug)); ?>"><h6 class="ps-category__title text-center mb-4"><?php echo e($product->name); ?></h6></a>
                                                <div class="ps-product__actions ps-product__group-mobile d-block">
                                                    <div class="ps-product__cart d-block">
                                           <div class="add_to_cart_box">
                                                <a class="btn cart_btn d-block" href="<?php echo e(route('shop',$product->slug)); ?>">Kataloge anzeigen</a>
                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <?php endif; ?>

                        </div>

                        <div class="ps-pagination">
                            <?php echo e($catalog->links()); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <button class="btn scroll-top"><i class="fa fa-angle-double-up"></i></button>
   
    <div class="ps-preloader" id="preloader">
        <div class="ps-preloader-section ps-preloader-left"></div>
        <div class="ps-preloader-section ps-preloader-right"></div>
    </div>

  <?php echo $__env->make('elements.add_to_cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('../Layout.Layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customstegpearl/public_html/root/resources/views/pages/catalog.blade.php ENDPATH**/ ?>