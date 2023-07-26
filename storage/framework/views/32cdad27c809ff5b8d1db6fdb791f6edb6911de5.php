<div class="dashboard_left_sidebar pe-3 border-end customer_dashboard">
    <div class="d-flex align-items-start">
        <div class="nav flex-column nav-pills w-100 btn" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a href="<?php echo e(route('user.dashboard')); ?>" class="nav-link rounded-0 align-items-center ps-block__title text-left fs-3 <?php echo e((Route::currentRouteName()=='user.dashboard')? 'active':''); ?>">
                <i class="bi bi-layout-text-sidebar-reverse fs-4 me-3"></i> Dashboard
            </a>
            <a href="<?php echo e(route('user.orders')); ?>" class="nav-link rounded-0 align-items-center ps-block__title text-left fs-3 <?php echo e((Route::currentRouteName()=='user.orders')? 'active':''); ?>" id="orders"  type="button" role="tab" aria-controls="v-pills-orders" aria-selected="false">
                <i class="bi bi-boxes fs-4 me-3"></i>Orders
            </a>
            <!-- <a href="<?php echo e(route('user.dashboard')); ?>" class="d-none nav-link rounded-0 align-items-center ps-block__title text-left fs-3" id="downloads"  type="button" role="tab" aria-controls="v-pills-downloads" aria-selected="false">
                <i class="bi bi-cloud-download fs-4 me-3"></i>Downloads
            </a> -->
            <!-- <a href="<?php echo e(route('user.dashboard')); ?>" class="nav-link rounded-0 align-items-center ps-block__title text-left fs-3" id="payment_mthd" data-bs-toggle="pill" data-bs-target="#v-pills-payments" type="button" role="tab" aria-controls="v-pills-payments" aria-selected="false">
                <i class="bi bi-wallet2 fs-4 me-3"></i>Payment Methods
            </a> -->
            <a href="<?php echo e(route('user.address')); ?>" class="nav-link rounded-0 align-items-center ps-block__title text-left fs-3 <?php echo e((Route::currentRouteName()=='user.address')? 'active':''); ?>" >
                <i class="bi bi-geo-alt fs-4 me-3"></i>Addresses
            </a>
            <a href="<?php echo e(route('user.account')); ?>" class="nav-link rounded-0 align-items-center ps-block__title text-left fs-3 <?php echo e((Route::currentRouteName()=='user.account')? 'active':''); ?>">
                <i class="bi bi-person-vcard fs-4 me-3"></i>Account Details
            </a>

            <a href="<?php echo e(route('user.wishlist')); ?>" class="nav-link rounded-0 align-items-center ps-block__title text-left fs-3 <?php echo e((Route::currentRouteName()=='user.wishlist')? 'active':''); ?>">
                <i class="bi bi-heart fs-4 me-3"></i>Wishlist
            </a>
            <a href="<?php echo e(route('logout')); ?>" class="nav-link rounded-0 align-items-center ps-block__title text-left fs-3">
                <i class="bi bi-box-arrow-left fs-4 me-3"></i>Logout
            </a>
        </div>
    </div>
</div>
<?php /**PATH /home/customstegpearl/public_html/root/resources/views/user/sidebar.blade.php ENDPATH**/ ?>