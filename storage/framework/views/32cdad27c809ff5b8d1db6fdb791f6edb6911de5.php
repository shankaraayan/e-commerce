<div id="accordion">
    <div class="card shadow">
      <div class="card-header bg-white py-4" id="headingOne">
          <a class="btn btn-link d-flex align-items-center justify-content-between fs-3 fw-600 text-uppercase mainkonto_btn" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Main Konto<i class="icon-chevron-down arrow_icon fw-700"></i></a>
      </div>
  
      <div id="collapseOne" class="collapse show user_dashboard" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body p-1 pt-2">
            <div class="nav flex-column nav-pills w-100" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a href="<?php echo e(route('user.dashboard')); ?>" class="d-flex nav-link rounded-0 align-items-center justify-content-between ps-block__title text-left fs-3 py-3 <?php echo e((Route::currentRouteName()=='user.dashboard')? 'active':''); ?>">
                     Dashboard <i class="icon-grid fs-3 fw-700"></i>
                </a>
                <a href="<?php echo e(route('user.orders')); ?>" class="d-flex nav-link rounded-0 align-items-center justify-content-between ps-block__title text-left fs-3 py-3 <?php echo e((Route::currentRouteName()=='user.orders')? 'active':''); ?>" id="orders"  type="button" role="tab" aria-controls="v-pills-orders" aria-selected="false">
                    Orders <i class="icon-outbox fs-3 fw-700"></i>
                </a>
                <a href="<?php echo e(route('user.address')); ?>" class="d-flex nav-link rounded-0 align-items-center justify-content-between ps-block__title text-left fs-3 py-3 <?php echo e((Route::currentRouteName()=='user.address')? 'active':''); ?>" >
                    Addresses <i class="icon-map2 fs-3 fw-700"></i>
                </a>
                <a href="<?php echo e(route('user.account')); ?>" class="d-flex nav-link rounded-0 align-items-center justify-content-between ps-block__title text-left fs-3 py-3 <?php echo e((Route::currentRouteName()=='user.account')? 'active':''); ?>">
                    Account Details <i class="icon-user fs-3 fw-700"></i>
                </a>
                <a href="<?php echo e(route('user.wishlist')); ?>" class="d-flex nav-link rounded-0 align-items-center justify-content-between ps-block__title text-left fs-3  py-3<?php echo e((Route::currentRouteName()=='user.wishlist')? 'active':''); ?>">
                    Wishlist <i class="icon-heart fs-3 fw-700"></i>
                </a>
                <a href="<?php echo e(route('logout')); ?>" class="d-flex nav-link rounded-0 align-items-center justify-content-between ps-block__title text-left fs-3 py-3">
                    Logout<i class="fa fa-sign-in fs-3 fw-700"></i>
                </a>
            </div>
        </div>
      </div>
    </div>
     
  </div>

  <script>
    jQuery(document).ready(function()
    {
    jQuery('.mainkonto_btn').click(function()
    {
     if(jQuery(".arrow_icon").hasClass('icon-chevron-down')) {
        jQuery(".arrow_icon").removeClass('icon-chevron-down');
        jQuery(".arrow_icon").addClass('icon-chevron-up');
     }else {
       jQuery(".arrow_icon").addClass('icon-chevron-down');
       jQuery(".arrow_icon").removeClass('icon-chevron-up');
     }
    }
    );
    }
    );
  </script><?php /**PATH /home/customstegpearl/public_html/root/resources/views/user/sidebar.blade.php ENDPATH**/ ?>