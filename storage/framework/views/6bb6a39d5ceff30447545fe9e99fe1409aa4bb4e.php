<?php $__env->startSection('dasboard_content'); ?>

<div class="dashboard_content">
    <a href="/logout"> </a>
    <p>
        <a href="<?php echo e(route('user.dashboard')); ?>">Hello <b><?php echo e(Auth::user()->name); ?></b> </a><a href="<?php echo e(route('logout')); ?>">logout</a>
    </p>
    <p>In your account overview you can view your <a href="<?php echo e(route('user.orders')); ?>">recent orders</a> , manage your <a href="<?php echo e(route('user.address')); ?>">shipping and billing addresses</a> , and <a href="<?php echo e(route('user.account')); ?>">edit your password and account details</a>.</p>
    <div class="row row-cols-xl-3 row-cols-lg-3 row-cols-md-3 row-cols-2 g-3">
        <a href="<?php echo e(route('user.dashboard')); ?>" class="col-md-4 col-xs-12 px-1 px-sm-2 mb-3">
            <div class="dashboard_box text-center shadow-sm border align-items-center justify-content-center p-3 pt-5">
                <div class="order_box">
                    <img src="<?php echo e(asset('assets/img/stegpearl/dashboard.png')); ?>" />
                    <h4 class="ps-section__title pt-4">Dashboard</h4>
                </div>
            </div>
        </a>
        <a href="<?php echo e(route('user.orders')); ?>" class="col-md-4 col-xs-12 px-1 px-sm-2 mb-3">
            <div class="dashboard_box text-center shadow-sm border align-items-center justify-content-center p-3 pt-5">
                <div class="order_box">
                    <img src="<?php echo e(asset('assets/img/stegpearl/orders.png')); ?>" />
                    <h4 class="ps-section__title pt-4">Orders</h4>
                </div>
            </div>
        </a>
        <a href="<?php echo e(route('user.address')); ?>" class="col-md-4 col-xs-12 px-1 px-sm-2 mb-3">
            <div class="dashboard_box text-center shadow-sm border align-items-center justify-content-center p-3 pt-5">
                <div class="address_box">
                    <img src="<?php echo e(asset('assets/img/stegpearl/marker.png')); ?>" />
                    <h4 class="ps-section__title pt-4">Address</h4>
                </div>
            </div>
        </a>
        <a href="<?php echo e(route('user.account')); ?>" class="col-md-4 col-xs-12 px-1 px-sm-2 mb-3">
            <div class="dashboard_box text-center shadow-sm border align-items-center justify-content-center p-3 pt-5">
                <div class="account_info_box">
                    <img src="<?php echo e(asset('assets/img/stegpearl/user.png')); ?>" />
                    <h4 class="ps-section__title pt-4">Account Details</h4>
                </div>
            </div>
        </a>
        <a href="<?php echo e(route('user.wishlist')); ?>" class="col-md-4 col-xs-12 px-1 px-sm-2 mb-3">
            <div class="dashboard_box text-center shadow-sm border align-items-center justify-content-center p-3 pt-5">
                <div class="wishlist_box">
                    <img src="<?php echo e(asset('assets/img/stegpearl/wishlist.png')); ?>" />
                    <h4 class="ps-section__title pt-4">Wishlist</h4>
                </div>
            </div>
        </a>
        
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customstegpearl/public_html/root/resources/views/user/dashboard.blade.php ENDPATH**/ ?>