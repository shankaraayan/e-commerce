<div class="ps-widget__block">
    <h4 class="ps-widget__title">Ähnliche Produkte</h4><a class="ps-block-control" href="#"><i class="fa fa-angle-down"></i></a>
    <div class="ps-widget__content" id="similarProductCon">
       
        <?php if(!empty(@$value)): ?>
            <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
                <?php if($key == 5): ?>
                    <?php break; ?>
                <?php endif; ?>
                
                    <div class="ps-widget__item">
                        <div class="row no-gutters">
                            <div class="col-3">
                                <div class="product_pics">
                                    <img src="<?php echo e(asset('root/public/uploads/'.$product->thumb_image)); ?>" class="img-fluid" alt="Epp Solar">
                                </div>
                            </div>
                            <div class="col-9 pl-3">
                            <div class="product_info_rel">
                                <p class="product_info_name ps-product__title"><?php echo e($product->product_name); ?></p>
                                <?php
                                    $attributeIDs = ($product->attributes_id);
                                    $result = explode(',', $attributeIDs);
                                    $prices = minmaxPrice($result);
                                ?>
                                <?php if($product->type==='variable'): ?>
                                    <span class="ps-product__price text-green">aus  - <?php echo e(formatPrice($prices['sum_of_max_prices'])); ?></span>
                                <?php else: ?>
                                    <span class="ps-product__price text-green"><?php echo e(formatPrice($product->price)); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        </div>
                    </div>
                
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
</div>
</div><?php /**PATH /home/customstegpearl/public_html/root/resources/views/elements/similar-product.blade.php ENDPATH**/ ?>