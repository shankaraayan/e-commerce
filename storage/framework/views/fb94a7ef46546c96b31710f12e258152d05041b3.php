<!--------------- Dashboard Start ------------------------->
<?php $__env->startSection('content'); ?>
<section class="pt-70 pb-70 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-12 col-12">
                       <?php echo $__env->make("user.sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-12 col-xs-12">
                <div class="dashboard_right_details bg-white p-5 shadow border">
                    <div class="tab-content" id="CG_Dashboard_UI">
                        <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel"
                            aria-labelledby="v-pills-dashboard-tab">
                            <?php echo $__env->yieldContent('dasboard_content'); ?>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<!--------------- Dashboard End ------------------------->
<?php echo $__env->make('Layout.Layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customstegpearl/public_html/root/resources/views/user/layout.blade.php ENDPATH**/ ?>