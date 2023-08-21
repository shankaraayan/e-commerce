<?php $attributes = $attributes->exceptProps(['productData']); ?>
<?php foreach (array_filter((['productData']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php $__currentLoopData = $productData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="owl-item">
    <div class="ps-section__product">
        <div class="ps-product ps-product--standard">
            <div class="ps-product__thumbnail">
                <a class="ps-product__image" href="<?php echo e(route('product.detail',$value->slug)); ?>">
                    <figure>
                        <img src="<?php echo e(asset('root/public/uploads/'.$value->thumb_image)); ?>" alt="alt">
                        <img src="<?php echo e(asset('root/public/uploads/'.$value->thumb_image)); ?>" alt="alt">
                    </figure>
                </a>
                <div class="ps-product__badge"></div>
                <div class="ps-product__percent ps-badge ps-badge--hot" style="font-size:14px">
                <?php
                if(isset($value->sale_price)){
                    $dicount = (($value->price - $value->sale_price) / $value->price ) * 100 ;
                }
                ?>
                -<?php echo e(round($dicount)); ?>%
                </div>
            </div>
            <div class="ps-product__content">
                <p class="ps-product__title"><a href="<?php echo e(route('product.detail',$value->slug)); ?>"><?php echo e($value->product_name); ?></a></p>
                <div class="ps-product__meta text-center">
                    <span class="ps-product__del text-muted"><?php echo e(formatPrice($value->price)); ?></span>
                    <span class="ps-product__price sale"><?php echo e(formatPrice($value->sale_price)); ?></span>
                </div>
                    <?php if($value->type !='variable'): ?>
                        <div class="add_to_cart_box">
                            <a class="btn cart_btn d-block" href="javascript:void(0)" onclick="add_to_cart('<?php echo e($value->id); ?>')">Add to cart</a>
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
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/customstegpearl/public_html/root/resources/views/components/product-small-card.blade.php ENDPATH**/ ?>