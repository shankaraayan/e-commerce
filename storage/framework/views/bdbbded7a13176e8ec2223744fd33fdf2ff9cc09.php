<?php $attributes = $attributes->exceptProps(['value','filterIcon','productName']); ?>
<?php foreach (array_filter((['value','filterIcon','productName']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="ps-categogy__content breadcrumb_block pt-0">
    <div class="container">
        <div class="ps-categogy__wrapper">
            <div class="ps-categogy__filter <?php if(isset($filterIcon)): ?> <?php echo e($filterIcon); ?> <?php endif; ?>">
                <a href="javascript:void(0);" id="collapse-filter" class="d-flex align-items-center justify-content-between"><i class="fa fa-filter"></i><i class="fa fa-times"></i>
                    <sapn class="d-lg-inline-block d-md-inline-block d-none">Filter</span>
                </a>
            </div>
            
            <div class="d-flex align-items-center justify-content-between w-100">
                <ul class="ps-breadcrumb p-0">
                    <li class="ps-breadcrumb__item"><a href="<?php echo e(route('homepage')); ?>">Home</a></li>
                    <li class="ps-breadcrumb__item <?php if(!isset($productName)): ?> active <?php endif; ?>" aria-current="page">
                        <?php echo e($slot); ?>

                    </li>
                    <?php if(isset($productName)): ?>
                    <li class="ps-breadcrumb__item active" aria-current="page"><?php echo e($productName); ?></li>
                    <?php endif; ?>
                 </ul>
                <div class="ps-categogy__sort <?php if(isset($value) && $value=='DisabledShortBy'): ?> d-none <?php endif; ?>">
                    <div class="dropdown d-inline-flex align-items-center arky_sort_dropdown">
                        <span>Sort by</span>
                        <ul class="btn dropdown-toggle shadow-none list-inline d-flex align-items-center mb-0 p-0" type="button" id="sort_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                            <li>
                                <span class="orderby-current active">Popularity</span>
                                <ul class="dropdown-menu sort_menus" aria-labelledby="sort_dropdown">
                                    <li><a class="dropdown-item" href="#" data-sort="popularity">Popularity</a></li>
                                    <li><a class="dropdown-item" href="#" data-sort="low_to_high">Low to High</a></li>
                                    <li><a class="dropdown-item" href="#" data-sort="high_to_low">High to Low</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/customstegpearl/public_html/root/resources/views/components/filtter.blade.php ENDPATH**/ ?>