<?php $__env->startSection('dasboard_content'); ?>
<?php
    $data = json_decode($orders['product_details'], true);

    $totalPrice = 0;

    foreach ($data as $product) {
        $tax = getTaxCountry((int)$product['shipping_country']);
																
        if(empty($tax)){
            $tax['vat_tax'] = 0;
        }

        if(isset($product['solar_product']) && $product['solar_product'] === 'yes'){
            if(@$tax['short_code'] == 'DE'){
                $tax['vat_tax'] = 0;
            }
        }
        $totalPrice+=($product['price']*$product['quantity'] + (@$product['price'] * $tax['vat_tax'] /100 * @$product['quantity']) );
    }
?>
<div class="container-fluid">
    <div class="row mb-10">
        <div class="col-6">
            <h4 class="mb-2 text-uppercase"><b>Details zur Bestellung</b></h4>
            <p class="mb-3 ">Order Id #<?php echo e($orders['order_id']); ?></p>
        </div>
        <div class="col-6">
            <p class="mb-3 text-right">Order Date <?php echo e(date('d-M-Y',strtotime($orders['created_at']))); ?></p>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row mb-20">
        <div class="col-12 col-md-12">
            <div class="order_details_info">
                <div class="table-responsive">
                    <table class="table single_order_details">
                        <thead>
                            <tr>
                                <th class="text-uppercase font-weight-bold border-top-0">Produkte</th>
                                <th class="text-uppercase font-weight-bold border-top-0 text-right">Insgesamt</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $products = json_decode($orders['product_details'], true);
                            $shipping_data = (end($products))
                        ?>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $ProducttotalPrice = $product['price'] * $product['quantity'];
                                $product['total_price'] += $ProducttotalPrice;
                            ?>
                            <tr>
                                <td class="order_name"><?php echo e($product['product_name']); ?> x <span class="order_qty"><?php echo e($product['quantity']); ?></span></td>
                                <td class="text-right"><?php echo e(formatPrice($product['price'])); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e('Zwischensumme(including tax):'); ?></td>
                                <td class="text-right"><?php echo e(formatPrice($totalPrice)); ?></td>
                            </tr>
                            <tr>
                                <td>Versand :</td>
                                <td class="text-right">
                                    <?php echo e(formatPrice($shipping_data['shipping_price'])); ?>

                                </td>
                            </tr>
                            <tr>
                                <td>Zahlungsmethode :</td>
                                <td class="text-right"><?php echo e($orders->payment_method); ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold fs-2">Insgesamt</td>
                                <td class="font-weight-bold text-right fs-2"><?php echo e(formatPrice($totalPrice + $shipping_data['shipping_price'])); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-50 border p-2">
        <div class="col-md-6">

            <?php
                $shipping = json_decode($orders['shipping_address'], true);
                if($shipping['shipping_fullname'] == null || $shipping['shipping_billing_address1']){
                    $shipping = json_decode($orders['billing_details'], true);
                }
                $shipping = implode(', ', $shipping);
                $shipping = str_replace(', ,',', ', $shipping);
            ?>
            <p>
                <b>Shipping Address - </b>
                <?php echo e($shipping); ?>

            </p>
        </div>
        <div class="col-md-6">

            <?php
                $billing = json_decode($orders['billing_details'], true);
                $billing = implode(', ', $billing);
                $billing = str_replace(', ,',', ', $billing);
            ?>
            <p>
            <b>Billing Address - </b>
                <?php echo e($billing); ?>

            </p>
        </div>
    </div>

</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customstegpearl/public_html/root/resources/views/user/orders/order-details.blade.php ENDPATH**/ ?>