<?php $attributes = $attributes->exceptProps(['value']); ?>
<?php foreach (array_filter((['value']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php
    $banner = globalBanner()->toArray();
    shuffle($banner);
    $banner = end($banner);
?>
<div class="ps-categogy__main">
    <?php if(isset($banner)): ?>
        <img src="https://custom.stegpearl.in/root/public/uploads/sliders/desktop/<?php echo e($banner['desktop']); ?>" class="img-fluid w-100 rounded">
    <?php else: ?>
        <img src="https://campergold.net/wp-content/uploads/2023/05/campergold-2.jpg" class="img-fluid w-100 rounded">
    <?php endif; ?>
</div><?php /**PATH /home/customstegpearl/public_html/root/resources/views/components/bottom-banner.blade.php ENDPATH**/ ?>