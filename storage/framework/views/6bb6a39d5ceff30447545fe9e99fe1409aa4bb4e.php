<?php $__env->startSection('dasboard_content'); ?>
<style>
    .dashboard_content .dashboard_box {
        min-height: 150px;
        display: flex;
    }
    .dashboard_content .dashboard_box i {
        font-size: 5rem;
        color: #b5b5b5;
        font-weight: lighter;
    }
    .dashboard_content .dashboard_box:hover i, .dashboard_content .dashboard_box:hover h6 {
        color: var(--green-color);
    }
</style>
<div class="dashboard_content">
    <a href="/logout"> </a>
    <p>Hello <a class="text-green" href="<?php echo e(route('user.dashboard')); ?>"> <b><?php echo e(Auth::user()->name); ?></b> </a> <span class="small">(nicht <?php echo e(Auth::user()->name); ?> ? <a class="text-danger" href="<?php echo e(route('logout')); ?>">logout</a>)</span></p>
    <p class="mb-5 fs-4" style="line-height: 1.5;">In your account overview you can view your <a class="text-blue border-bottom" href="<?php echo e(route('user.orders')); ?>">recent orders</a> , manage your <a class="text-blue border-bottom" href="<?php echo e(route('user.address')); ?>">shipping and billing addresses</a> , and <a class="text-blue border-bottom" href="<?php echo e(route('user.account')); ?>">edit your password and account details</a>.</p>
    <div class="container">
        <div class="row">
            <a href="<?php echo e(route('user.dashboard')); ?>" class="col-md-4 col-sm-6 col-6 px-2 px-sm-3 mb-4">
                <div class="dashboard_box text-center shadow-sm border align-items-center justify-content-center">
                    <div class="dash_box">
                        
                        <i class="icon-grid"></i>
                        <h6 class="ps-section__title fw-400 pt-4 mb-0">Dashboard</h6>
                    </div>
                </div>
            </a>
            <a href="<?php echo e(route('user.orders')); ?>" class="col-md-4 col-sm-6 col-6 px-2 px-sm-3 mb-4">
                <div class="dashboard_box text-center shadow-sm border align-items-center justify-content-center">
                    <div class="order_box">
                        
                        <i class="icon-outbox"></i>
                        <h6 class="ps-section__title fw-400 pt-4 mb-0">Orders</h6>
                    </div>
                </div>
            </a>
            <a href="<?php echo e(route('user.address')); ?>" class="col-md-4 col-sm-6 col-6 px-2 px-sm-3 mb-4">
                <div class="dashboard_box text-center shadow-sm border align-items-center justify-content-center">
                    <div class="address_box">
                        
                        <i class="icon-map2"></i>
                        <h6 class="ps-section__title fw-400 pt-4 mb-0">Address</h6>
                    </div>
                </div>
            </a>
            <a href="<?php echo e(route('user.account')); ?>" class="col-md-4 col-sm-6 col-6 px-2 px-sm-3 mb-4">
                <div class="dashboard_box text-center shadow-sm border align-items-center justify-content-center">
                    <div class="account_info_box">
                        
                        <i class="icon-user"></i>
                        <h6 class="ps-section__title fw-400 pt-4 mb-0">Account Details</h6>
                    </div>
                </div>
            </a>
            
            
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customstegpearl/public_html/root/resources/views/user/dashboard.blade.php ENDPATH**/ ?>