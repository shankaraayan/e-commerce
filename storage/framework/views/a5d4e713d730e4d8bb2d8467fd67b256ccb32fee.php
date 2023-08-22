<?php $__env->startSection('dasboard_content'); ?>
    <div class="wishlist_section g-0 px-0">
        <div class="dash_title text-uppercase border-bottom pb-3 mb-4 fs-3 fw-600">Your Products Wishlist</div>
        <div class="container">
            <div class="row row-cols-2 row-cols-xl-3 row-cols-lg-3 row-cols-md-3 g-3">
               <?php $__currentLoopData = wishlist()->where('user_id',auth()->user()->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wishlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?php $wishlist = json_decode($wishlist,true);    
               ?>
               <?php $__currentLoopData = $wishlist['product_id']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               
                <div class="col-md-4">
                    <div id="" class="p-2 border position-relative rounded">
                        <div class="product_thumb position-relative">
                            <div class="remove_wrapper text-end d-flex justify-content-end">
                                <a href="#"><i class="bi bi-trash3 shadow"></i></a>
                            </div>
                            <div class="product_thumb_info">
                                <a href="#" class="product_thumb_img">
                                    <div class="overflow-hidden">
                                        <img class="img-fluid" src="https://custom.stegpearl.in/root/public/uploads/<?php echo e($item['image']); ?>" />
                                    </div>
                                </a>
                                <div class="product_info_box text-center py-2 mt-1">
                                    <div class="product_title">
                                        <h5 class="ps-product__title"><?php echo e($item['product_name']); ?></h5>
                                    </div>
                                    <div class="px-2 text-center d-flex align-items-center justify-content-center">
                                        <span class="net_price text-green ms-2"><?php echo e(formatPrice($item['price'])); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customstegpearl/public_html/root/resources/views/user/wishlist/wishlist.blade.php ENDPATH**/ ?>