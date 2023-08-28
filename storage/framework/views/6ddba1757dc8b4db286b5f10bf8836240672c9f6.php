<?php $attributes = $attributes->exceptProps(['productData']); ?>
<?php foreach (array_filter((['productData']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php $__currentLoopData = $productData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<?php
 

    $cat = explode(',',$product->categories);
    shuffle($cat);
    $categoryName = categories()->where('id',$cat[0])->pluck('slug')->first();
    $category = $categoryName;


?>

<div class="owl-item">
    <div class="ps-section__product">
        <div class="ps-product ps-product--standard m-0">
            <?php echo $__env->make('components.card-design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/customstegpearl/public_html/root/resources/views/components/product-small-card.blade.php ENDPATH**/ ?>