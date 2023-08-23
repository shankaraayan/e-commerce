<div class="ps-product__meta mb-1 text-center">
    <?php
        $attributeIDs = ($product->attributes_id);
        $result = explode(',', $attributeIDs);
        $prices = minmaxPrice($result);
    ?>
    <?php if($product->type==='variable'): ?>
        <span class="ps-product__price text-green">bis zu - <?php echo e(formatPrice($prices['sum_of_max_prices'])); ?></span>
    <?php else: ?>
        <span class="ps-product__del text-muted"><?php echo e(formatPrice($product->price)); ?></span>
        <span class="ps-product__price text-green"><?php echo e(formatPrice($product->sale_price)); ?></span>
    <?php endif; ?>
</div><?php /**PATH /home/customstegpearl/public_html/root/resources/views/components/min-max-price.blade.php ENDPATH**/ ?>