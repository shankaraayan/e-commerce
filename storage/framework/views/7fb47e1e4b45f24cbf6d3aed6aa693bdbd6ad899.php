<?php $__env->startSection('style'); ?>
<style>
    :root {
  --blue-color: #33507f;
  --green-color: #4b9f64;
    }
    :root {
    --space-unit: 1em;
    --space-xxxxs: calc(0.09 * var(--space-unit));
    --space-xxxs: calc(0.146 * var(--space-unit));
    --space-xxs: calc(0.236 * var(--space-unit));
    --space-xs: calc(0.382 * var(--space-unit));
    --space-sm: calc(0.618 * var(--space-unit));
    --space-md: calc(1 * var(--space-unit));
    --space-lg: calc(1.618 * var(--space-unit));
    --space-xl: calc(2.618 * var(--space-unit));
    --space-xxl: calc(4.236 * var(--space-unit));
    --space-xxxl: calc(6.854 * var(--space-unit));
    --space-xxxxl: calc(11.08 * var(--space-unit));
    --component-padding: var(--space-xxxl);
    }
     
     
     
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!--------------- Cart Page HTML Start ------------------------->

    <div class="thankyou-page-section pt-70 pb-70 bg-light">
      <div class="container">
        <div class="bg-white p-xl-5 p-lg-5 p-md-3 p-2 shadow">
            <div class="row mb-50 justify-content-center border-bottom pb-20">
                <div class="col-md-10 col-12">
                    <div class="order_thankyou d-flex align-items-center justify-content-center">
                        <div class="order_details_msg text-center">
                            <h4 class="font-weight-normal mb-4"><i class="icon-checkmark-circle text-green mr-1" style="font-size: 24px;"></i>Vielen Dank,<span class="thanyou_customer_name ml-1 text-green">
                                <?php
                                    $name = \App\Models\User::whereId($order->user_id)->pluck('name')->first();
                                    $billing = json_decode($order['billing_details'], true);
                                ?>
                                <?php echo e($name); ?> !</span> </h4>
                            <h5 class="mb-4 font-weight-normal">Your order <a class="d-inline-block" href="javascript:(void);"><span class="order_ID font-weight-bold d-inline-block text-green mx-1 fs-3">#<?php echo e($order->order_id); ?></span></a> has been placed.</h5> 
                            <p class="fs-4" style="line-height: 1.6em;">Your order confirmation and receipt have been included in an email dispatched to <span class="text-blue font-weight-bold"><?php echo e($billing['email']); ?></span>. If this email doesn't materialize in your inbox within a span of two minutes, we recommend perusing your spam folder to verify if it was channeled there.</p> 
                            <p class="order_date text-green d-flex align-items-center justify-content-center"><i class="icon-calendar-full text-green mr-2 font-weight-bold" style="font-size: 2rem;"></i><?php echo e(date('d-M-Y',strtotime($order['created_at']))); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row order_details_tbl mb-50 justify-content-center d-none">
                <div class="col-6 border-bottom border-right p-5">
                    <div class="order_number text-center">
                        <h6 class="font-weight-normal">Bestellnr:</h6>
                        <p class="order_no text-green"># <a class="font-weight-bold" href="javascript:void(0);"><?php echo e($order->order_id); ?></a></p>
                    </div>
                </div>
                <div class="col-6 border-bottom p-5">
                    <div class="order_number text-center">
                        <h6 class="font-weight-normal">Datum</h6>
                        <p class="order_date font-weight-bold text-green"><?php echo e(date('d-M-Y',strtotime($order['created_at']))); ?></p>
                    </div>
                </div>
                <div class="col-6 border-right p-5">
                    <div class="order_number text-center">
                        <h6 class="font-weight-normal">Gesamt</h6>
                        <?php
                            $data = json_decode($order['product_details'], true);
                        
                            $subtotal = 0;
                            $totalPrice = 0;
                            $shipping_data = (end($data));

                            foreach ($data as $product) {
                                
                                $tax = getTaxCountry((int)$product['shipping_country']);
                                
                                if(empty($tax)){
                                    $tax['vat_tax'] = 0;
                                }

                                if(isset($product['solar_product']) && $product['solar_product'] === 'yes'){
                                    if($tax['short_code'] == 'DE'){
                                        $tax['vat_tax'] = 0;
                                    }
                                }
                                $taxAmount  = (@$product['price'] * $tax['vat_tax'] /100 * @$product['quantity']);
                                $subtotal += $product['price'] * $product['quantity'];
                                $totalPrice += ($product['price']*$product['quantity'] + (@$product['price'] * $tax['vat_tax'] /100 * @$product['quantity']) ) ;
                            }

                            $discount = (end($data));

                            if(isset($discount['discount']) && $discount['discount']['type'] == 'flat'){
                                    $discountPrice = $discount['discount']['discount_value'] . " ".$discount['discount']['type'] . " OFF";
                            }
                            elseif(isset($discount['discount']) && $discount['discount']['type'] == 'Percentage'){
                                    $discountPrice = $discount['discount']['discount_value'] . " ". " %OFF";
                            }
                            else{
                                    $discountPrice = '0';
                            }
                        ?>
                        <p class="order_total font-weight-bold text-green"><?php echo e(formatPrice($totalPrice + $shipping_data['shipping_price'])); ?></p>
                    </div>
                </div>
                <div class="col-6 p-5">
                    <div class="order_number text-center">
                        <h6 class="font-weight-normal">Zahlungsmethode</h6>
                        <p class="order_pay_method font-weight-bold text-green"><?php echo e($order->payment_method); ?></p>
                    </div>
                </div>
            </div>

            
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12 col-12">
                    <div class="border-bottom pb-10">
                        <h6>Order List</h6>
                    </div>
                    <div class="product_list pt-30">
                        <?php
                        $products = json_decode($order['product_details'], true);
                        
                    ?>

                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php dd($products); ?>;
                        <?php
                            $ProducttotalPrice = $product['price'] * $product['quantity'];
                            $product['total_price'] += $ProducttotalPrice;
                        ?>
                        <div class="row product_list_row">
                            <div class="col-md-2 col-3">
                                <figure>
                                    <img src="<?php echo e(asset('root/public/uploads/' . @$product['thumb_image'])); ?>" class="img-fluid border p-1" alt="">
                                </figure>
                            </div>
                            <div class="col-md-8 col-9">
                                <h6 class="ordered_product font-weight-normal"><?php echo e($product['product_name']); ?></h6>
                                <div class="d-flex">
                                    <span class="text-muted small pr-2 border-right">Artikelnummer - <?php echo e(@$product['sku']); ?></span>
                                    <span class="text-muted small pl-2">Qty. - <?php echo e($product['quantity']); ?></span>
                                </div>
                            </div>
                            <div class="col-md-2 col-12">
                                <div class="ordered_product_price text-green font-weight-bold"><?php echo e(formatPrice($product['price'])); ?></div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12 col-12 mt-xl-0 mt-lg-0 mt-md-5 mt-5">
                    <div class="border p-4 order_summary">
                        <div class="border-bottom pb-3">
                            <h6>Order Summary</h6>
                        </div>
                        <div class="border-bottom py-4">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="fs-4 order_summary_title">Subtotal(Including taxes) :</span><span class="order_summary_finale"><?php echo e(formatPrice($subtotal)); ?></span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="fs-4 order_summary_title">Versand :</span><span class="order_summary_finale"><?php echo e(formatPrice($product['shipping_price'] ?? 0)); ?></span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="fs-4 order_summary_title">Rabatt :</span><span class="order_summary_finale"><?php echo e(formatPrice($discountPrice)); ?></span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="fs-4 order_summary_title">Zahlungsmethode :</span><span class="text-right order_summary_finale"><?php echo e($order->payment_method); ?></span>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between pt-5 pb-4 px-3">
                            <span class="fs-2 font-weight-bold">Total</span>
                            <span class="fs-2 font-weight-bold text-green"><?php echo e(formatPrice($totalPrice+$product['shipping_price'] ?? 0)); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    <!--------------- Cart Page HTML End ------------------------->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('../Layout.Layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customstegpearl/public_html/root/resources/views/pages/order_confirmation.blade.php ENDPATH**/ ?>