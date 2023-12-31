   <!-- BEGIN: Sidebar -->
   <style>
  .sidebar-menu > li.active > a  {
    background-color: black;
    color:white;
    /* Set your desired background color for the active state */
    /* Add any other desired styles for the active state */
  }
  .black_logo{
    background-color:#065092;
    padding:12px 64px;
  }
  .logo-segment{
    padding: 0;
  }
  .icon-arrow{
      color:white;
  }
</style>
   <div class="sidebar-wrapper group">
      <div id="bodyOverlay" class="w-screen h-screen fixed top-0 bg-slate-900 bg-opacity-50 backdrop-blur-sm z-10 hidden"></div>
      <div class="logo-segment">
        <a class="flex items-center" href="<?php echo e(route('admin')); ?>">
          <img src="https://eppsolar.de/assets/img/stegpearl/epp-green-white.png" class="black_logo" alt="logo">
          <!--<img src="https://stegback.com/root/storage/uploads/white-logo.png" class="white_logo" alt="logo">-->
          <!--<span class="ltr:ml-3 rtl:mr-3 text-xl font-Inter font-bold text-slate-900 dark:text-white">StegBack</span>-->
        </a>
        <!-- Sidebar Type Button -->
        <div id="sidebar_type" class="cursor-pointer text-slate-900 dark:text-white text-lg">
          <span class="sidebarDotIcon extend-icon cursor-pointer text-slate-900 dark:text-white text-2xl">
        <!--<div class="h-4 w-4 border-[1.5px] border-slate-900 dark:border-slate-700 rounded-full transition-all duration-150 ring-2 ring-inset ring-offset-4 ring-black-900 dark:ring-slate-400 bg-slate-900 dark:bg-slate-400 dark:ring-offset-slate-700"></div>-->
      </span>
          <span class="sidebarDotIcon collapsed-icon cursor-pointer text-slate-900 dark:text-white text-2xl">
        <div class="h-4 w-4 border-[1.5px] border-slate-900 dark:border-slate-700 rounded-full transition-all duration-150"></div>
      </span>
        </div>
        <button class="sidebarCloseIcon text-2xl">
          <iconify-icon class="text-slate-900 dark:text-slate-200" icon="clarity:window-close-line"></iconify-icon>
        </button>
      </div>
      <div id="nav_shadow" class="nav_shadow h-[60px] absolute top-[80px] nav-shadow z-[1] w-full transition-all duration-200 pointer-events-none
      opacity-0"></div>
      <div style="margin-top:16px;" class="sidebar-menus bg-white dark:bg-slate-800 py-2 px-4 h-[calc(100%-80px)] overflow-y-auto z-50" id="sidebar_menus">
        <ul class="sidebar-menu">
          <li class="<?php echo e(Request::is('admin') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('admin')); ?>" class="navItem">
                <span class="flex items-center">
                <iconify-icon class=" nav-icon" icon="clarity:dashboard-solid"></iconify-icon>
                <span>Dashboard</span>
                </span>
            </a>

          </li>
          <!-- Apps Area -->


          <!-- Pages Area -->
<!-- Category -->
              <li class="<?php echo e(Request::is('admin/category/*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('admin.category.list')); ?>" class="navItem">
                    <span class="flex items-center">
                    <iconify-icon class=" nav-icon" icon="carbon:category"></iconify-icon>
                    <span>Category</span>
                    </span>
                </a>
              </li>
              
          <!-- Authentication -->
         <li class="<?php echo e(Request::is('admin/product/attribute/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/product/attribute_terms/*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/product/*') ? 'active' : ''); ?>">

            <a href="javascript:void(0)" class="navItem">
              <span class="flex items-center">
            <iconify-icon class=" nav-icon" icon="fluent-mdl2:product-variant"></iconify-icon>
            <span>Product Manager</span>
              </span>
              <iconify-icon class="icon-arrow" style="color:white;" icon="heroicons-outline:chevron-right"></iconify-icon>
            </a>
            <ul class="sidebar-submenu">
              <li>
                <a href="<?php echo e(route('admin.product.attribute.list')); ?>">Attributes</a>
              </li>

              <li>
                <a href="<?php echo e(route('admin.product.list')); ?>">Products</a>
              </li>

            </ul>
          </li>

            <!-- Shipping -->
            <li class="<?php echo e(Request::is('admin/shipping/*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('admin.shipping.list')); ?>" class="navItem">
                    <span class="flex items-center">
                    <iconify-icon class=" nav-icon" icon="fa-solid:shipping-fast"></iconify-icon>
                    <span>Shipping</span>
                    </span>
                </a>
            </li>

            <li class="<?php echo e(Request::is('admin/coupon/*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('admin.coupon.list')); ?>" class="navItem">
                    <span class="flex items-center">
                    <iconify-icon class=" nav-icon" icon="heroicons-outline:cash"></iconify-icon>
                    <span>Coupons</span>
                    </span>
                </a>
            </li>

            <li class="<?php echo e(Request::is('admin/taxation/*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('admin.taxation.list')); ?>" class="navItem">
                    <span class="flex items-center">
                    <iconify-icon class=" nav-icon" icon="heroicons-outline:receipt-tax"></iconify-icon>
                    <span>Taxation</span>
                    </span>
                </a>
            </li>

            <li class="<?php echo e(Request::is('admin/orders/*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('admin.orders.list')); ?>" class="navItem">
                    <span class="flex items-center">
                    <iconify-icon class=" nav-icon" icon="mdi:order-bool-descending-variant"></iconify-icon>
                    <span>Order</span>
                    </span>
                </a>
            </li>

          <!-- settings -->
          <li class="<?php echo e(Request::is('admin/settings/slider/*') ? 'active' : ''); ?>">
            <a href="javascript:void(0)" class="navItem">
              <span class="flex items-center">
            <iconify-icon class=" nav-icon" icon="heroicons:cog-8-tooth"></iconify-icon>
            <span>Settings</span>
              </span>
              <iconify-icon class="icon-arrow" style="color:white;" icon="heroicons-outline:chevron-right"></iconify-icon>
            </a>
            <ul class="sidebar-submenu">
              <li>
                <a href="<?php echo e(route('admin.settings.slider.list')); ?>">Sliders</a>
              </li>
              <li>
                <a href="<?php echo e(route('admin.settings.payment-gatway.list')); ?>">Manage Payment Gatways</a>
              </li>

            </ul>
          </li>
          

          <li class="<?php echo e(Request::is('admin/users/*') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('admin.users.list')); ?>" class="navItem">
              <span class="flex items-center">
            <iconify-icon class=" nav-icon" icon="heroicons:user"></iconify-icon>
            <span>Users</span>
              </span>
              
            </a>
          </li>
      </div>
    </div>
    <!-- End: Sidebar -->

<?php /**PATH /home/customstegpearl/public_html/root/resources/views/admin/layout/sidebar.blade.php ENDPATH**/ ?>