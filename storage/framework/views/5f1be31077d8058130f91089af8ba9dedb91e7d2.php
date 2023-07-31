<style>
    .ps-shopping .ps-shopping__footer .ps-btn {
        display: inline-block;
        width: auto;
        text-transform: initial;
        /* height: 44px; */
        padding: 5px 10px;
        font-size: 16px;
        font-weight: 500;
    }
</style>
<h3 class="ps-shopping__title">
    Einkaufskorb<sup><?php echo e(count((array) session('cart'))); ?></sup></h3>
<div class="ps-shopping__content">
    <div class="row">
        <div class="col-12 col-md-7 col-lg-9">
            <ul class="ps-shopping__list">

                <?php $total = 0 ?>
                <?php if(session('cart')): ?>
                    <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $tax = getTaxCountry($details['shipping_country']);

                            @$shipping_country = (@$details['shipping_country']);

                            $total+=(@$details['price']*@$details['quantity']);
                        ?>

                        <?php if(@$details['type'] == 'variable'): ?>
                            <li class="variable">
                                <div class="ps-product ps-product--wishlist">
                                    <div class="ps-product__remove"><a href="javascript::void(0)"
                                            onclick="remove_to_cart(<?= $id ?>)"><i
                                                class="icon-trash2 text-danger"></i></a></div>
                                    <div class="ps-product__thumbnail"><a class="ps-product__image"
                                            href="<?php echo e(route('product.detail', $details['slug'])); ?>">
                                            <figure><img src="<?php echo e(asset('root/public/uploads/' . @$details['images'])); ?>"
                                                    alt="alt">
                                            </figure>
                                        </a></div>
                                    <div class="ps-product__content">
                                        <h5 class="ps-product__title d-block text-left">
                                            <a href="<?php echo e(route('product.detail', $details['slug'])); ?>"><span><?php echo e(@$details['name']); ?></span><br>
                                                <?php if(!empty(@$details['details'])): ?>
                                                    <?php $__currentLoopData = @$details['details']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <span><?php echo e($val); ?></span><br>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </a>
                                        </h5>
                                        <div class="ps-product__row">
                                            <div class="ps-product__label">Price:</div>
                                            <div class="ps-product__value"><span
                                                    class="ps-product__price"><?php echo e(formatPrice(@$details['price'])); ?></span>
                                            </div>
                                        </div>
                                        <div class="ps-product__row ps-product__stock">
                                            <div class="ps-product__label">Stock:</div>
                                            <div class="ps-product__value"><span class="ps-product__in-stock">In
                                                    Stock</span>
                                            </div>
                                        </div>
                                        <div class="ps-product__cart">
                                            <button class="ps-btn">Add to cart</button>
                                        </div>
                                        <div class="ps-product__row ps-product__quantity">
                                            <div class="ps-product__label">Quantity:</div>
                                            <div class="ps-product__value" style="width:60%">
                                                <div class="def-number-input number-input safari_only">
                                                    <button class="minus" onclick="QtyUpdate(<?= $id ?>,0)"><i
                                                            class="icon-minus"></i></button>
                                                    <input class="quantity" step="1" min="1"
                                                        id="qty<?= $id ?>" name="quantity" type="number"
                                                        onchange="update_to_cart(<?= $id ?>)" name="qty[]"
                                                        value="<?php echo e($details['quantity']); ?>"
                                                        onkeypress="return isNumber(event)" size="4"
                                                        placeholder="" inputmode="numeric">
                                                    <button class="plus" onclick="QtyUpdate(<?= $id ?>,1)"><i
                                                            class="icon-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ps-product__row ps-product__subtotal">
                                            <div class="ps-product__label">Subtotal:</div>
                                            <div class="ps-product__value">
                                                <?php echo e(formatPrice(@$details['price'] * $details['quantity'] + (@$details['price'] * $tax['vat_tax'] /100 * @$details['quantity']) )); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php else: ?>
                            <li>
                                <div class="ps-product ps-product--wishlist">

                                    <div class="ps-product__remove"><a href="javascript::void(0)"
                                            onclick="remove_to_cart(<?= $id ?>)"><i
                                                class="icon-trash2 text-danger"></i></a></div>
                                    <div class="ps-product__thumbnail"><a class="ps-product__image"
                                            href="<?php echo e(route('product.detail', @$details['slug'])); ?>">
                                            <figure><img
                                                    src="<?php echo e(asset('root/public/uploads/' . @$details['images'])); ?>"
                                                    alt="alt">
                                            </figure>
                                        </a></div>
                                    <div class="ps-product__content">
                                        <h5 class="ps-product__title d-block text-left">
                                            <a
                                                href="<?php echo e(route('product.detail', @$details['slug'])); ?>"><span><?php echo e(@$details['name']); ?></span></a>
                                        </h5>
                                        <div class="ps-product__row">
                                            <div class="ps-product__label">Price:</div>
                                            <div class="ps-product__value"><span
                                                    class="ps-product__price"><?php echo e(formatPrice(@$details['price'])); ?></span>
                                            </div>
                                        </div>
                                        <div class="ps-product__row ps-product__stock">
                                            <div class="ps-product__label">Stock:</div>
                                            <div class="ps-product__value"><span class="ps-product__in-stock">In
                                                    Stock</span>
                                            </div>
                                        </div>
                                        <div class="ps-product__cart">
                                            <button class="ps-btn">Add to cart</button>
                                        </div>
                                        <div class="ps-product__row ps-product__quantity">

                                            <div class="ps-product__label">Quantity:</div>
                                            <div class="ps-product__value" style="width:60%">
                                                <div class="def-number-input number-input safari_only">
                                                    <button class="minus" onclick="QtyUpdate(<?= $id ?>,0)"><i
                                                            class="icon-minus"></i></button>
                                                    <input class="quantity" step="1" min="1"
                                                        id="qty<?= $id ?>" name="quantity" type="number"
                                                        onchange="update_to_cart(<?= $id ?>)" name="qty[]"
                                                        value="<?php echo e(@$details['quantity']); ?>"
                                                        onkeypress="return isNumber(event)" size="4"
                                                        placeholder="" inputmode="numeric">
                                                    <button class="plus" onclick="QtyUpdate(<?= $id ?>,1)"><i
                                                            class="icon-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ps-product__row ps-product__subtotal">
                                            <div class="ps-product__label">Subtotal:</div>
                                            <div class="ps-product__value">
                                                <?php echo e(formatPrice(@$details['price'] * @$details['quantity'] + (@$details['price'] * @$tax['vat_tax'] ?? 0 /100 * @$details['quantity']) )); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </ul>
            <div class="ps-shopping__table table-responsive">
                <table class="table ps-table ps-table--product">
                    <thead>
                        <tr>
                            <th class="ps-product__remove"></th>
                            <th class="ps-product__thumbnail"></th>
                            <th class="ps-product__name">Name des Produkts</th>
                            <th class="ps-product__meta">Preis pro Einheit</th>
                            <th class="ps-product__quantity">Menge</th>
                            <th class="ps-product__subtotal">Zwischensumme</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0 ?>
                        <?php if(session('cart')): ?>
                            <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $tax = getTaxCountry($details['shipping_country']);
                                    $total += @$details['price'] * @$details['quantity'] + (@$details['price'] * $tax['vat_tax'] /100 * @$details['quantity']);
                                ?>

                                <?php @$shipping_country = (@$details['shipping_country']) ?>

                                <?php if($details['type'] == 'variable'): ?>
                                    <tr class="variable_table">
                                        <td class="ps-product__remove"> <a href="javascript::void(0)"
                                                onclick="remove_to_cart(<?= $id ?>)"><i
                                                    class="icon-trash2 text-danger"></i></a></td>
                                        <td class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="<?php echo e(route('product.detail', @$details['slug'])); ?>">
                                                <figure><img
                                                        src="<?php echo e(asset('root/public/uploads/' . $details['images'])); ?>"
                                                        alt=""></figure>
                                            </a></td>
                                        <td class="ps-product__name">
                                            <div class="cart_product_name">
                                                <a href="<?php echo e(route('product.detail', $details['slug'])); ?>"><span><?php echo e(@$details['name']); ?></span><br>
                                                    <?php if(!empty(@$details['details'])): ?>
                                                        <?php $__currentLoopData = @$details['details']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <span><?php echo e($val); ?></span><br>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                            <div class="cart_product_shipping">
                                                <span class="text-muted fs-5">Voraussichtliches Versanddatum Juli 14,
                                                    2023</span>
                                            </div>
                                        </td>
                                        <td class="ps-product__meta"> <span
                                                class="ps-product__price"><?php echo e(formatPrice(@$details['price'])); ?></span>
                                        </td>
                                        <td class="ps-product__quantity">

                                            <div class="def-number-input number-input safari_only">
                                                <button class="minus" onclick="QtyUpdate(<?= $id ?>,0)"><i
                                                        class="icon-minus"></i></button>
                                                <input class="quantity" step="1" min="1"
                                                    id="qty<?= $id ?>" name="quantity" type="number"
                                                    onchange="update_to_cart(<?= $id ?>)" name="qty[]"
                                                    value="<?php echo e($details['quantity']); ?>"
                                                    onkeypress="return isNumber(event)" size="4" placeholder=""
                                                    inputmode="numeric">
                                                <button class="plus" onclick="QtyUpdate(<?= $id ?>,1)"><i
                                                        class="icon-plus"></i></button>
                                            </div>
                                        </td>
                                        <td class="ps-product__subtotal">
                                            <?php echo e(formatPrice(@$details['price'] * $details['quantity'] + (@$details['price'] * $tax['vat_tax'] /100 * @$details['quantity']))); ?>

                                            <?php if($tax['vat_tax']): ?> <br><small style="font-size:10px;color:red;">(Tax Inclusive)</small> <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <tr>
                                        <td class="ps-product__remove"> <a href="javascript::void(0)"
                                                onclick="remove_to_cart(<?= $id ?>)"><i
                                                    class="icon-trash2 text-danger"></i></a></td>
                                        <td class="ps-product__thumbnail"><a class="ps-product__image"
                                                href="<?php echo e(route('product.detail', @$details['slug'])); ?>">
                                                <figure><img
                                                        src="<?php echo e(asset('root/public/uploads/' . @$details['images'])); ?>"
                                                        alt=""></figure>
                                            </a></td>
                                        <td class="ps-product__name">
                                            <div class="cart_product_name">
                                                <a
                                                    href="<?php echo e(route('product.detail', @$details['slug'])); ?>"><?php echo e(@$details['name']); ?></a>
                                            </div>
                                            <div class="cart_product_shipping">
                                                <span class="text-muted fs-5">Voraussichtliches Versanddatum Juli 14,
                                                    2023</span>
                                            </div>
                                        </td>
                                        <td class="ps-product__meta"> <span
                                                class="ps-product__price sale"><?php echo e(formatPrice(@$details['price'])); ?></span>
                                            
                                        </td>
                                        <td class="ps-product__quantity">
                                            <div class="def-number-input number-input safari_only">
                                                <button class="minus" onclick="QtyUpdate(<?= $id ?>,0)"><i
                                                        class="icon-minus"></i></button>
                                                <input class="quantity" step="1" min="1"
                                                    id="qty<?= $id ?>" name="quantity" type="number"
                                                    onchange="update_to_cart(<?= $id ?>)" name="qty[]"
                                                    value="<?php echo e(@$details['quantity']); ?>"
                                                    onkeypress="return isNumber(event)" inputmode="numeric">
                                                <button class="plus" onclick="QtyUpdate(<?= $id ?>,1)"><i
                                                        class="icon-plus"></i></button>
                                            </div>
                                        </td>
                                        <td class="ps-product__subtotal">
                                            <?php echo e(formatPrice(@$details['price'] * @$details['quantity'] + (@$details['price'] * $tax['vat_tax'] /100 * @$details['quantity']) )); ?>

                                            <?php if($tax['vat_tax']): ?> <br><small style="font-size:10px;color:red;">(Tax Inclusive)</small> <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="ps-shopping__footer">
                <div class="row">

                </div>
            </div>
        </div>
        <div class="col-12 col-md-5 col-lg-3">
            <div class="ps-shopping__label">Warenkorb-Summen</div>
            <div class="ps-shopping__box">
                <div class="ps-shopping__row">
                    <div class="ps-shopping__label">Zwischensumme
                    </div>
                    <div class="ps-shopping__price"><?php echo e(formatPrice(@$total)); ?></div>
                </div>

                <div class="ps-shopping__row">
                    <div class="ps-shopping__label">Versand</div>
                    <div class="ps-shopping__price">
                        <?php echo e(formatPrice($shipping_price = shippingCountry()->where('country', @$shipping_country)->pluck('price')->first())); ?>

                    </div>
                </div>



                <div class="ps-shopping__row">
                    <div class="ps-shopping__label">Insgesamt

                    </div>
                    <div class="ps-shopping__price"><?php echo e(formatPrice(@$total + $shipping_price)); ?></div>
                </div>
                <div class="ps-shopping__checkout">
                    <?php if(count((array) session('cart')) > 0): ?>
                        <a class="ps-btn ps-btn--warning" href="<?php echo e(url('checkout')); ?>">Zur
                            Kasse gehen</a>
                    <?php else: ?>
                        <a class="ps-btn ps-btn--disabled" href="javascript::void(0)">Zur
                            Kasse gehen</a>
                    <?php endif; ?>
                    <a class="ps-shopping__link" href="<?php echo e(url('/')); ?>">Weiter zum Einkaufen</a>
                </div>
            </div>
        </div>
    </div>

</div>
<?php /**PATH /home/customstegpearl/public_html/root/resources/views/elements/cart_data.blade.php ENDPATH**/ ?>