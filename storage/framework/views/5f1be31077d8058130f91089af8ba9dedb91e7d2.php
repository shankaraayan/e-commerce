
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
    .empty_cart_area .carticon {
        font-size: 10vw;
        color: #818181c4;
        transform: rotate(350deg);
        position: relative;
        filter: drop-shadow(6px 7px 5px #dfdfdfc4);
    }
    .empty_cart_area .empty_cartIcon {
        background: #f6f6f6;
        border-radius: 50%;
        padding: 4rem;
        box-shadow: 10px 10px 15px 0px #f8f8f8;
    }
    
</style>

<div class="ps-shopping__content bg-light pt-40 pb-40">
    <div class="container">
        <div class="row">
            <?php if(!empty(session('cart'))): ?>
                
                <div class="col-12 col-md-7 col-lg-9">
                    
                    <ul class="ps-shopping__list shadow bg-white p-2">
                        <?php $total = 0 ?>
                        <?php if(session('cart')): ?>
                            <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $productCat = App\Models\admin\Product::where('id',$details['product_id'])->pluck('categories')->first();
                                $cat = explode(',',$productCat);
                                shuffle($cat);
                                $categoryName = categories()->where('id',$cat[0])->pluck('slug')->first();
                                $category = $categoryName;
                            ?>
                            
                                <?php
                                    $tax = getTaxCountry($details['shipping_country']);
                                            if(empty($tax)){
                                                $tax['vat_tax'] = 0;
                                            }
        
                                            if(isset($details['solar_product']) && $details['solar_product'] === 'yes'){
                                                if($tax['short_code'] == 'DE'){
                                                    $tax['vat_tax'] = 0;
                                                }
                                            }
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
                                                    href="<?php echo e(route('product.detail', [$category,$details['slug']])); ?>">
                                                    <figure><img src="<?php echo e(asset('root/public/uploads/' . @$details['images'])); ?>"
                                                            alt="alt">
                                                    </figure>
                                                </a></div>
                                            <div class="ps-product__content">
                                                <h5 class="ps-product__title d-block text-left">
                                                    <a href="<?php echo e(route('product.detail', [$category,$details['slug']])); ?>"><span class="mb-2 d-block cart_producttitle"><?php echo e(@$details['name']); ?></span></a>
                                                    
                                                    <span class="fs-5 font-weight-bold border-bottom text-muted">Components</span>
                                                        <?php if(!empty(@$details['details'])): ?>
                                                        <div class="card card-body border-0 p-1 mt-1">
                                                            <ul class="list-inline">
                                                                <?php
                                                                    $detailsCount = count(@$details['details']);
                                                                ?>
                                                                <?php $__currentLoopData = $details['details']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if($index < 2): ?>
                                                                        <li class="text-muted mb-1">- <?php echo e($val); ?></li>
                                                                    <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </ul>
                                                            <?php if($detailsCount > 2): ?>
                                                                <div class="collapse" id="attribute_values<?php echo e($id); ?>">
                                                                    <ul class="list-inline">
                                                                        <?php $__currentLoopData = $details['details']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php if($index >= 2): ?>
                                                                                <li class="text-muted mb-1">- <?php echo e($val); ?></li>
                                                                            <?php endif; ?>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </ul>
                                                                </div>
                                                                <a class="btn shadow-none fs-5 font-weight-bold pl-0 text-left" data-toggle="collapse" href="#attribute_values<?php echo e($id); ?>" role="button" aria-expanded="false" aria-controls="attribute_values">View more</a>
                                                            <?php endif; ?>
                                                        </div>
                                                        <?php endif; ?>
                                                    
                                                        
                                                    
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
                                                    <div class="ps-product__value" style="width:40%">
                                                        <div class="def-number-input number-input safari_only">
                                                            <button class="minus" onclick="QtyUpdate(<?= $id ?>,0)"><i
                                                                    class="icon-minus"></i></button>
                                                            <input class="quantity" step="1" max="25" min="1"
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
                                                        class="icon-trash2 text-danger"></i></a>
                                            </div>
                                            <div class="ps-product__thumbnail"><a class="ps-product__image"
                                                    href="<?php echo e(route('product.detail', [$category,@$details['slug']])); ?>">
                                                    <figure><img
                                                            src="<?php echo e(asset('root/public/uploads/' . @$details['images'])); ?>"
                                                            alt="alt">
                                                    </figure>
                                                </a></div>
                                            <div class="ps-product__content">
                                                <h5 class="ps-product__title d-block text-left">
                                                    <a href="<?php echo e(route('product.detail',[$category, @$details['slug']])); ?>"><span class="cart_producttitle"><?php echo e(@$details['name']); ?></span></a>
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
                                                    <div class="ps-product__value" style="width:40%">
                                                        <div class="def-number-input number-input safari_only">
                                                            <button class="minus" onclick="QtyUpdate(<?= $id ?>,0)"><i
                                                                    class="icon-minus"></i></button>
                                                            <input class="quantity" step="1" min="1" max="25"
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

                    
                    

                    <div class="ps-shopping__table table-responsive shadow bg-white p-3">
                        <div class="ps-table ps-table--product">
                            
                            <div class="container">
                                <?php $total = 0 ?>
                                <?php if(session('cart')): ?>
                                    <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $tax = getTaxCountry($details['shipping_country']);
                                            if(empty($tax)){
                                                $tax['vat_tax'] = 0;
                                            }
        
                                            if(isset($details['solar_product']) && $details['solar_product'] === 'yes'){
                                                if($tax['short_code'] == 'DE'){
                                                    $tax['vat_tax'] = 0;
                                                }
                                            }
                                            $total += @$details['price'] * @$details['quantity'] + (@$details['price'] * $tax['vat_tax'] /100 * @$details['quantity']);
                                        ?>
        
                                        <?php @$shipping_country = (@$details['shipping_country']) ?>
                                
                                        <?php if($details['type'] == 'variable'): ?>
                                            <div class="row variable_table mb-3 border-bottom p-3">
                                            <div class="col-md-2">
                                                <div class="cartproduct__thumbnail"><a class="cartproduct__image"
                                                    
                                                    href="<?php echo e(url($details['cart_product_url'])); ?>">
                                                    <figure><img src="<?php echo e(asset('root/public/uploads/' . $details['images'])); ?>"
                                                            alt="<?php echo e(@$details['name']); ?>" class="rounded border p-1"></figure>
                                                        </a>
                                                </div>
                                            </div>   
                                            
                                            <div class="col-md-9">
                                                <div class="ps-product__name">
                                                    <div class="cart_product_name">
                                                        <a href="<?php echo e(url($details['cart_product_url'])); ?>"><span class="mb-0 d-block cart_producttitle ps-product__title"><?php echo e(@$details['name']); ?></span></a>
                                                    </div>
                                                    <div class="attribute_vals">
                                                        <span class="fs-5 font-weight-bold border-bottom text-muted">Components</span>
                                                        <?php if(!empty(@$details['details'])): ?>
                                                        <div class="card card-body border-0 p-1 mt-1">
                                                            <ul class="list-inline">
                                                                <?php
                                                                    $detailsCount = count(@$details['details']);
                                                                ?>
                                                                <?php $__currentLoopData = $details['details']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if($index < 2): ?>
                                                                        <li class="text-muted small mb-1">- <?php echo e($val); ?></li>
                                                                    <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </ul>
                                                            <?php if($detailsCount > 2): ?>
                                                                <div class="collapse" id="attribute_values<?php echo e($id); ?>">
                                                                    <ul class="list-inline">
                                                                        <?php $__currentLoopData = $details['details']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php if($index >= 2): ?>
                                                                                <li class="text-muted small mb-1">- <?php echo e($val); ?></li>
                                                                            <?php endif; ?>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </ul>
                                                                </div>
                                                                <a class="btn shadow-none fs-5 font-weight-bold pl-0 cartcomponent_btn text-left" data-toggle="collapse" href="#attribute_values<?php echo e($id); ?>" role="button" aria-expanded="false" aria-controls="attribute_values">View more</a>
                                                            <?php endif; ?>
                                                        </div>
                                                        <?php endif; ?>
                                                    
                                                    </div>
                                                    <div class="cart_product_shipping">
                                                        <span class="text-muted fs-5"> 
                                                            Estimate Shipping date 
                                                            
                                                            
                                                            <?php echo e(working_days(@$details['product_availability'] ?? 10 )); ?>

                                                        </span>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-1 d-flex align-items-center justify-content-center">
                                                <div class="ps-product__remove"><a href="javascript::void(0)" onclick="remove_to_cart(<?= $id ?>)"><i class="icon-trash2 text-danger"></i></a>
                                                </div>
                                            </div>
                                                
                                            <div class="col-md-3 mt-4 d-flex align-items-center justify-content-center">
                                                <div class="ps-product__meta mb-0"> 
                                                    <span class="fs-4 font-weight-normal mr-1">Preis:</span>
                                                    <span class="ps-product__price text-blue"><?php echo e(formatPrice(@$details['price'])); ?></span>
                                                </div>
                                                </div> 
                                                
                                                <div class="col-md-3 mt-4 d-flex justify-content-start align-items-center">
                                                    <span class="fs-4 font-weight-normal mr-1">Menge:</span>
                                                    <div class="ps-product__quantity mx-auto">
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
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-4 text-center d-flex justify-content-start align-items-center">
                                                    <span class="fs-4 font-weight-normal mr-3">Zwischensumme:</span>
                                                    <div class="ps-product__subtotal text-green">
                                                        <span><?php echo e(formatPrice(@$details['price'] * $details['quantity'] + (@$details['price'] * $tax['vat_tax'] /100 * @$details['quantity']))); ?>

                                                            <?php if($tax['vat_tax']): ?></span><sup style="font-size:10px;color:red;">(Tax Inclusive)</sup> <?php endif; ?>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        <?php else: ?>
                                            <div class="row single_product mb-3 border-bottom p-3 justify-content-start ">
                                                <div class="col-md-2">
                                                <div class="cartproduct__thumbnail"><a class="cartproduct__image" href="<?php echo e(route('product.detail',[$category, @$details['slug']])); ?>">
                                                    <figure><img src="<?php echo e(asset('root/public/uploads/' . $details['images'])); ?>" alt="<?php echo e(@$details['name']); ?>" class="rounded border p-1"></figure></a>
                                                </div>
                                                </div> 
                                                
                                                <div class="col-md-9">
                                                    <div class="ps-product__name">
                                                        <div class="cart_product_name">
                                                            <a class="cart_producttitle" href="<?php echo e(route('product.detail',[$category, @$details['slug']])); ?>"><span class="mb-2 d-block cart_producttitle ps-product__title"><?php echo e(@$details['name']); ?></span></a>
                                                        </div>
                                                        
                                                        <div class="cart_product_shipping">
                                                            <span class="text-muted fs-5">Estimate Shipping date 
                                                                
                                                                <?php echo e(working_days(@$details['product_availability'] ?? 10  )); ?></span>
                                                        </div>
                                                    </div>
                                                </div>   

                                                <div class="col-md-1 d-flex align-items-center justify-content-center">
                                                    <div class="ps-product__remove"> <a href="javascript::void(0)" onclick="remove_to_cart(<?= $id ?>)"><i class="icon-trash2 text-danger"></i></a></div>
                                                </div>

                                                <div class="col-md-3 mt-4 d-flex align-items-center justify-content-center">
                                                    <div class="ps-product__meta mb-0"> 
                                                        <span class="fs-4 font-weight-normal mr-1">Preis:</span>
                                                        <span class="ps-product__price text-blue"><?php echo e(formatPrice(@$details['price'])); ?></span>
                                                    </div>
                                                </div>

                                                    <div class="col-md-3 mt-4 d-flex justify-content-start align-items-center">
                                                        <span class="fs-4 font-weight-normal mr-1">Menge:</span>
                                                        <div class="ps-product__quantity mx-auto">
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
                                                        </div>
                                                    </div>
                                               
                                                <div class="col-md-6 mt-4 d-flex justify-content-start align-items-center">
                                                    <span class="d-block fs-4 font-weight-normal mr-3">Zwischensumme:</span>
                                                    <div class="ps-product__subtotal text-green">
                                                        <span><?php echo e(formatPrice(@$details['price'] * @$details['quantity'] + (@$details['price'] * $tax['vat_tax'] /100 * @$details['quantity']) )); ?>

                                                            <?php if($tax['vat_tax']): ?></span> <sup style="font-size:10px;color:red;">(Tax Inclusive)</sup> <?php endif; ?>
                                                    </div>
                                                </div>                                 
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="ps-shopping__footer">
                        <div class="row">
        
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5 col-lg-3">
                    <div class="shadow bg-white pt-20 p-3">
                        <div class="h3 py-3 font-weight-bold text-blue px-2">Warenkorb-Summen</div>
                    <div class="ps-shopping__box">
                        <div class="ps-shopping__row">
                            <div class="ps-shopping__label">Zwischensumme
                            </div>
                            <div class="ps-shopping__price text-green"><?php echo e(formatPrice(@$total)); ?></div>
                        </div>
        
                        <div class="ps-shopping__row">
                            <div class="ps-shopping__label">Versand</div>
                            <div class="ps-shopping__price text-green">
                                <?php echo e(formatPrice($shipping_price = shippingCountry()->where('country', @$shipping_country)->pluck('price')->first())); ?>

                            </div>
                        </div>
        
        
        
                        <div class="ps-shopping__row">
                            <div class="ps-shopping__label">Insgesamt
        
                            </div>
                            <div class="ps-shopping__price text-green"><?php echo e(formatPrice(@$total + $shipping_price)); ?></div>
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
            <?php else: ?>
                
            <div class="col-12">
                <div class="empty_cart_area d-flex align-items-center justify-content-center bg-white pt-100 pb-100 shadow">
                    <div class="empty_cart text-center p-4">
                        <div class="empty_cartIcon mb-50 d-inline-flex">
                            <i class="icon-cart-empty carticon"></i>
                        </div>
                        <div class="empty_cartmsg">
                            <h2 class="text-dark mb-3">Dein Warenkorb ist leider leer.</h2>
                            <p class="text-muted mb-4">Stöbere in unserem Sortiment, füge etwas hinzu und erlebe mehr.</p>
                        </div>
                        <div class="empty_cartbtn">
                            <a class="ps-btn ps-btn--warning" href="<?php echo e(route('catalog')); ?>">Zurück zum Einkaufen</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
           


            

        </div>    
    <div>

</div>
<?php /**PATH /home/customstegpearl/public_html/root/resources/views/elements/cart_data.blade.php ENDPATH**/ ?>