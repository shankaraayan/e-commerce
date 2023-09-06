
<?php $attributes = $attributes->exceptProps(['prdoductCategories']); ?>
<?php foreach (array_filter((['prdoductCategories']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?> 

<?php
    $categoryArray = explode(',',$prdoductCategories);
    $category = []; // Initialize the category array

    foreach ($categoryArray as $categoryId) {
        $categoryInstance = categories()->where('id', $categoryId)->first();

        if ($categoryInstance) {
            // Only access properties if the category instance exists
            $category[$categoryInstance->slug] = $categoryInstance->name;
        }
    }
?>

<?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<a href="<?php echo e(route('shop', [$key])); ?>">
    <?php echo e($category); ?>,
</a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/customstegpearl/public_html/root/resources/views/components/category-list.blade.php ENDPATH**/ ?>