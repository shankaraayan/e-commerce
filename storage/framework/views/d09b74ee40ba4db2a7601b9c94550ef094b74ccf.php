<?php $__env->startSection('dasboard_content'); ?>
<div class="orders_section table-responsive px-0">
        <div class="dash_title text-uppercase border-bottom pb-3 mb-4 fs-3">Order Details</div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php if(!empty($orders)): ?>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php
                     $result = (json_decode($order['product_details'],true));
                     $shipping_data = (end($result));
                    $total = 0;
                     foreach($result as $data){
                        $total += $data['total_price'] ;
                     }
                    $finalPrice = $total + $shipping_data['shipping_price'];
                    ?>

                        <tr style="vertical-align: middle;">
                            <td><a href="#"><?php echo e($order['order_id']); ?></a></td>
                            <td><?php echo e(date('d-m-Y',strtotime($order['created_at']))); ?></td>
                            <td><?php echo e($order['status']); ?></td>
                             <?php
                                $member = json_decode($order['product_details']);
                             ?>

                            <td><span class="ci_green"><?php echo e(formatPrice($finalPrice)); ?></span>
                            
                            </td>
                            <td>
                                <a href="orders/<?php echo e($order['order_id']); ?>" class="btn ps-btn--warning fs-4">To Sue</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <p>No order </p>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customstegpearl/public_html/root/resources/views/user/orders/order.blade.php ENDPATH**/ ?>