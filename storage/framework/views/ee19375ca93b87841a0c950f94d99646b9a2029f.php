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
<div class="ps-categogy__main pt-0">
    <?php if(isset($banner)): ?>
    <a href="<?php echo e($banner['slider_url']); ?>">
        <img src="<?php echo e(asset('root/public/uploads/sliders/desktop/' . $banner['desktop'])); ?>" alt="Epp Solar" class="img-fluid w-100 rounded">
    </a>
    <?php else: ?>
        <img src="https://campergold.net/wp-content/uploads/2023/05/campergold-2.jpg" alt="Epp Solar" class="img-fluid w-100 rounded">
    <?php endif; ?>
</div><?php /**PATH /home/customstegpearl/public_html/root/resources/views/components/bottom-banner.blade.php ENDPATH**/ ?>