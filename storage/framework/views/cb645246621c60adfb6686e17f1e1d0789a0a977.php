<div class="ps-product__thumbnail mb-1"><a class="ps-product__image" onclick="addSimiliarProductId(<?php echo e($product->id); ?>)" href="<?php echo e(route('product.detail',[$category,$product->slug] )); ?>">
        <figure class="card-image-container">
            <img src="<?php echo e(asset('root/public/uploads/'.$product->thumb_image)); ?>" alt="<?php echo e(@$product->product_name); ?>" class="img-fluid" />
            <img src="<?php echo e(asset('root/public/uploads/'.$product->thumb_image)); ?>" alt="<?php echo e(@$product->product_name); ?>" class="img-fluid" />
        </figure>
    </a>
    <div class="ps-product__badge">
        <div class="ps-badge ps-badge--hot">
            <?php
            if($product->type == 'single'){
                if(isset($product->sale_price)){
                    if($product->sale_price < $product->price){
                        $dicount = (($product->price - $product->sale_price) / $product->price ) * 100 ;
                        $dicount = round($dicount)."%";
                    }else{
                        $dicount = '';
                    }
                }
            }else {
                $dicount = 'Best Seller';
            }
            ?>
            <?php echo e(($dicount)); ?>

        </div>
    </div>
</div>
<div class="ps-product__content text-center mt-2">
    
    <a onclick="addSimiliarProductId(<?php echo e($product->id); ?>)"  href="<?php echo e(route('product.detail',[$category,$product->slug])); ?>">
        <h5 class="ps-product__title mb-1"><?php echo e($product->product_name); ?></h5>
    </a>
    
    <div class="ps-product__meta mb-1 text-center">
       
        <?php if($product->type==='variable'): ?>
            <?php $upto = min_max_price($product->id); ?>
            <span class="ps-product__price text-green">bis zu - <?php echo e(formatPrice($upto)); ?></span>
        <?php else: ?>
            <span class="ps-product__del text-muted"><?php echo e(formatPrice($product->price)); ?></span>
            <span class="ps-product__price text-green"><?php echo e(formatPrice($product->sale_price)); ?></span>
        <?php endif; ?>
    </div>

    <div class="ps-product__actions ps-product__group-mobile d-block">
        <div class="ps-product__cart d-block">
            <?php if($product->type !='variable'): ?>
            <div class="add_to_cart_box"><a class="btn cart_btn d-block" href="javascript:void(0)" onclick="add_to_cart('<?php echo e($product->id); ?>')">In den Warenkorb</a>
            </div>
        <?php else: ?>
        <div class="add_to_cart_box">
                <a onclick="addSimiliarProductId(<?php echo e($product->id); ?>)" class="btn cart_btn d-block" href="<?php echo e(route('product.detail',[$category,$product->slug] )); ?>">Variationen auswählen</a>
            </div>
        <?php endif; ?>
        </div>
    </div>
</div><?php /**PATH /home/customstegpearl/public_html/root/resources/views/components/card-design.blade.php ENDPATH**/ ?>