<style>
    .loader {
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background: #fff;
        z-index: 10000;
        opacity: 0.5;
    }
    .loader i {
        position: relative;
        top : 20%;
        left : 50%;
        font-size: 60px;
    }
</style>

<?php $__env->startSection('content'); ?>

    <?php
        if(session('cart')){
        $cart = session('cart');
        // dd($cart);
        $lastCartItem = end($cart);
        $session_country = @$lastCartItem['shipping_country'];
        if($session_country == 0){
            $session_country ='';
        }
        $session_shipping_class = (int)@$lastCartItem['shipping_class'];
        $shippingCountry =  shippingCountry()->where('shipping_id',$session_shipping_class);
        }else {
            return redirect()->back();
        }


    ?>

    <div class="ps-checkout">
        <div class="container">
            <ul class="ps-breadcrumb">
                <li class="ps-breadcrumb__item"><a href="index.html">Home</a></li>
                <li class="ps-breadcrumb__item" aria-current="page">Cart</li>
                <li class="ps-breadcrumb__item active" aria-current="page">Checkout</li>
            </ul>
            
            
            <div class="ps-checkout__content">
                <div class="ps-checkout__wapper">
                    <p class="ps-checkout__text m-4">Sie haben noch kein Konto? <a href="<?php echo e(route('login.register')); ?>">Zum Anmelden hier klicken</a></p>

                        <div class="ps-shopping__coupon row mb-4">
                            <div class="col-md-8">
                                 <p class="ps-checkout__text m-4">Haben Sie einen Gutschein? <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"> Klicken Sie hier, um Ihren Code einzugeben</a></p>
                                 
                                <div class="collapse" id="collapseExample">
                                      <div class="card card-body shadow-sm">
                                       <div class="row px-4">
                                            <div class="col-md-7 mb-md-0 mb-4">
                                                <input class="form-control ps-input" type="text" id="couponCode" name="couponCode" placeholder="Kupon-Code"  value="<?php echo e(old('couponCode') ?? @$lastCartItem['discount']['code'] ?? ''); ?>" >
                                            </div>
                                            <div class="col-md-1"></div>
                                            <div class="col-md-4 mb-md-0 mb-4">
                                                <button onclick="couponApply()" id="couponButton" class="ps-btn ps-btn--primary m-0" type="button" >Coupon anwenden</button>
                                            </div>
                                        </div>
                                      </div>
                                </div>
                                

                            </div>

                        </div>

                </div>

                <form  method="post">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <div class="ps-checkout__form">
                                <h3 class="ps-checkout__heading">Angaben zur Rechnungsstellung</h3>
                                <div class="row">
                                    
                                    <div class="col-12">
                                            <div class="ps-checkout__group">
                                                <label for="fullname" class="ps-checkout__label">Vollständiger Name <span class="text-danger">*</span></label>
                                                <input class="ps-input" type="text" name="fullname"
                                                    value="<?php echo e(old('fullname')); ?>">
                                                <?php $__errorArgs = ['fullname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="text-danger"><?php echo e($message); ?></span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label">Country <span class="text-danger">*</span></label>
                                            <select value="<?php echo e(old('country')); ?>" class="ps-input country_shipping"  name="country" id="country"
                                                data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                <option value="" >Wählen Sie ein Land / eine Region…</option>

                                                <?php $__currentLoopData = $shippingCountry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php if($session_country == $country->country): ?> selected <?php endif; ?> value="<?php echo e(country()->where('id',$country->country)->pluck('id')->first()); ?>"><?php echo e(country()->where('id',$country->country)->pluck('country')->first()); ?> / <?php echo e(formatPrice($country->price)); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>

                                            <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <script>
                                        if(sessionStorage.getItem('selected')){
                                            $("#country").val(sessionStorage.getItem('selected'));
                                        }

                                    </script>

                                    
                                    <div class="col-12">
                                        <div class="ps-checkout__group">
                                            <label for="email" class="ps-checkout__label">E-Mail Adresse<span
                                                    class="text-danger">*</span></label>
                                            <input class="ps-input" type="email" name="email"
                                                value="<?php echo e(old('email') ?? auth()->user()->email ?? ''); ?>">
                                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <div class="col-12">

                                        <div class="ps-checkout__group">
                                            <label for="company_name" class="ps-checkout__label">Firmenname (optional)</label>
                                            <input class="ps-input" type="text" name="company_name"
                                                value="<?php echo e(old('company_name')); ?>">
                                            <?php $__errorArgs = ['company_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label" for="billing_address1">Straße und Hausnummer
                                                <span class="text-danger">*</span></label>
                                            <input class="ps-input mb-3" type="text"
                                                placeholder="Hausnummer und Straßenname" name="billing_address1"
                                                value="<?php echo e(old('billing_address1')); ?>">
                                            <?php $__errorArgs = ['billing_address1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            <input class="ps-input" type="text"
                                                placeholder="Wohnung, Appartement, Einheit usw. (fakultativ)"
                                                name="billing_address2" value="<?php echo e(old('billing_address2')); ?>">
                                            <?php $__errorArgs = ['billing_address2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                        </div>


                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label" for="city">Stadt / Ortschaft <span
                                                    class="text-danger">*</span></label>
                                            <input class="ps-input" type="text" id="city" name="city"
                                                value="<?php echo e(old('city')); ?>">
                                            <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label">Postleitzahl <span
                                                    class="text-danger">*</span></label>
                                            <input class="ps-input"  type="number" id="postal_code"
                                                name="postal_code" value="<?php echo e(old('postal_code')); ?>">
                                            <?php $__errorArgs = ['postal_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label">Telefon <span
                                                    class="text-danger">*</span></label>
                                            <input class="ps-input" type="number" id="phone_number" name="phone_number"
                                                value="<?php echo e(old('phone_number')); ?>">
                                            <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="ps-checkout__group">
                                            <div class="form-check">
                                                <input class="form-check-input shipping_check" type="checkbox" name="ship-address"
                                                    id="ship-address">
                                                <label class="form-check-label" for="ship-address">Versand an eine andereAdresse?</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="ps-checkout__group">
                                            <label for="fullname" class="ps-checkout__label">Vollständiger Name <span class="text-danger">*</span></label>
                                            <input class="ps-input" type="text" name="shipping_fullname" value="<?php echo e(old('shipping_fullname')); ?>">
                                            <?php $__errorArgs = ['shipping_fullname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                   <div class="col-12 ps-hidden" data-for="ship-address">
                                            <div class="row">
                                                <div class="col-12">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label">Country  <span class="text-danger">*</span></label>
                                            <select value="<?php echo e(old('shipping_country')); ?>" class="ps-input" id="shipping_conuntry" name="shipping_country" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                <option>Wählen Sie ein Land / eine Region…</option>
                                                <?php $__currentLoopData = $shippingCountry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php if($session_country == $country->country): ?> selected <?php endif; ?> value="<?php echo e(country()->where('id', $country->country)->pluck('id')->first()); ?>">
                                                        <?php echo e(country()->where('id', $country->country)->pluck('country')->first()); ?> / <?php echo e(formatPrice($country->price)); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php $__errorArgs = ['district'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                     </div>


                                            <div class="col-12">
                                                <div class="ps-checkout__group">
                                                    <label for="email" class="ps-checkout__label">E-Mail Adresse<span class="text-danger">*</span></label>
                                                    <input class="ps-input" type="email" name="shipping_email" value="<?php echo e(old('shipping_email')); ?>">
                                                    <?php $__errorArgs = ['shipping_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="text-danger"><?php echo e($message); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="ps-checkout__group">
                                                    <label for="company_name" class="ps-checkout__label">Firmenname (optional)<span class="text-danger">*</span></label>
                                                    <input class="ps-input" type="text" name="shipping_company_name" value="<?php echo e(old('shipping_company_name')); ?>">
                                                    <?php $__errorArgs = ['shipping_company_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="text-danger"><?php echo e($message); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="ps-checkout__group">
                                                    <label class="ps-checkout__label" for="billing_address1">Straße und Hausnummer <span class="text-danger">*</span></label>
                                                    <input class="ps-input mb-3" type="text" placeholder="Hausnummer und Straßenname" name="shipping_billing_address1" value="<?php echo e(old('shipping_billing_address1')); ?>">
                                                    <?php $__errorArgs = ['shipping_billing_address1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="text-danger"><?php echo e($message); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    <input class="ps-input" type="text" placeholder="Wohnung, Appartement, Einheit usw. (fakultativ)" name="shipping_billing_address2" value="<?php echo e(old('shipping_billing_address2')); ?>">
                                                    <?php $__errorArgs = ['shipping_billing_address2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="text-danger"><?php echo e($message); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <div class="ps-checkout__group">
                                                    <label class="ps-checkout__label" for="shipping_city">Stadt / Ortschaft <span class="text-danger">*</span></label>
                                                    <input class="ps-input" type="text" id="shipping_city" name="shipping_city" value="<?php echo e(old('shipping_city')); ?>">
                                                    <?php $__errorArgs = ['shipping_city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="text-danger"><?php echo e($message); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <div class="ps-checkout__group">
                                                    <label class="ps-checkout__label">Postleitzahl <span class="text-danger">*</span></label>
                                                    <input class="ps-input" type="number" id="shipping_postal_code" name="shipping_postal_code" value="<?php echo e(old('shipping_postal_code')); ?>">
                                                    <?php $__errorArgs = ['shipping_postal_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="text-danger"><?php echo e($message); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>

        <div class="col-12">
            <div class="ps-checkout__group">
                <label class="ps-checkout__label">Telefon <span class="text-danger">*</span></label>
                <input class="ps-input" type="number" id="shipping_phone_number" name="shipping_phone_number" value="<?php echo e(old('shipping_phone_number')); ?>">
                <?php $__errorArgs = ['shipping_phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-danger"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
    </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="ps-checkout__group">
                                            <label class="ps-checkout__label" for="message">Bestellhinweise
                                                (optional)</label>
                                            <textarea class="ps-textarea" rows="7"
                                                placeholder="Anmerkungen zu Ihrer Bestellung, z. B. besondere Hinweise zur Lieferung." for="message"
                                                name="comment"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 position-relative">
                            <div class="ps-checkout__order">
                                <h3 class="ps-checkout__heading">Ihre Bestellung</h3>
                                <div class="ps-checkout__row">
                                    <div class="ps-title">Produkt</div>
                                    <div class="ps-title">Zwischensumme</div>
                                </div>
                                <div id="dynmicElChekout">
                                <?php $total = 0 ?>
                                <?php if(session('cart')): ?>
                                
                                    <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <?php
                                            $tax = getTaxCountry((int)$details['shipping_country']);
                                            // @dd($details);
                                            $total+=($details['price']*$details['quantity'] + (@$details['price'] * $tax['vat_tax'] /100 * @$details['quantity']) ) ;
                                        ?>

                                        <!-- Product with variations -->
                                        <?php if($details['type'] == 'variable'): ?>

                                            <div class="ps-checkout__row ps-product">
                                                <div class="ps-product__name"><?php echo e(@$details['name']); ?></span><br>
                                                    <?php if(!empty(@$details['details'])): ?>
                                                        <?php $__currentLoopData = @$details['details']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <span><?php echo e($val); ?></span><br>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                    <span>x</span><span><?php echo e($details['quantity']); ?></span>
                                                </div>
                                                <div class="ps-product__price">
                                                    <?php echo e(formatPrice(@$details['price'] * $details['quantity'] + (@$details['price'] * $tax['vat_tax'] /100 * @$details['quantity']))); ?></div>
                                            </div>
                                        <?php else: ?>
                                            <div class="ps-checkout__row ps-product">
                                                <div class="ps-product__name">
                                                    <?php echo e(@$details['name']); ?><span>x</span><span><?php echo e($details['quantity']); ?></span>
                                                </div>
                                                <div class="ps-product__price">
                                                    <?php echo e(formatPrice(@$details['price'] * $details['quantity'] + (@$details['price'] * $tax['vat_tax'] /100 * @$details['quantity']) )); ?></div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                                <div class="ps-checkout__row">
                                    <div class="ps-title">Zwischensumme</div>
                                    <div class="ps-product__price"><?php echo e(formatPrice(@$total)); ?></div>
                                </div>


                                    <?php
                                        $cartDiscount =  session('cart');
                                        $cartDiscount = end($cartDiscount);

                                        $discountValue = @$cartDiscount['discount']['discount_value'] ?? 0;
                                        $discountType = @$cartDiscount['discount']['type'] ?? '';
                                        $discountCode = @$cartDiscount['discount']['code'] ?? 'Not Applied';

                                        if($discountType == 'flat'){
                                            $discountPrice = formatPrice($discountValue);
                                        }
                                        else{
                                            $discountPrice = $discountValue.'%';
                                        }
                                    ?>

                                    <?php if(!empty(@$cartDiscount['discount']['code'])): ?>
                                    <div class="ps-checkout__row">
                                        <div class="ps-title">Discount (<?php echo e($discountCode ?? 'Not Applied'); ?>)

                                            <div class="ps-title" style="font-size:12px"><a class="text-danger" href="javascript:void(0);" onclick="remove_coupon()">Remove Coupon</a></div>
                                        </div>

                                        <div class="ps-product__price">
                                            <?php echo e($discountPrice); ?>

                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <div class="ps-checkout__row">
                                        <div class="ps-title">Versand</div>
                                        <div class="ps-checkout__checkbox">
                                            <div class="form-check">
                                                
                                                <label for="free-ship" id="shipping_price">

                                                    <?php
                                                    // dd($details);
                                                    $shipping_country = $details['shipping_country'];

                                                    // dd($shipping_country);
                                                    ?>
                                                    <?php echo e(formatPrice($shipping_price = shippingCountry()->where('country',$shipping_country)->pluck('price')->first())); ?>

                                                    
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="ps-checkout__row">
                                        <div class="ps-title">Total</div>
                                        <div class="ps-product__price">
                                            <?php
                                                if($discountType == 'flat'){
                                                    $afterDiscount = $total-$discountValue;
                                                }
                                                else{
                                                    $dis =  $total * ($discountValue)/100;
                                                    $afterDiscount = $total - $dis;
                                                }
                                            ?>
                                            
                                            <?php echo e(formatPrice(@$afterDiscount +  $shipping_price)); ?>

                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-checkout__payment">
                                    <div class="direct-bank-method mb-15">
                                        <div class="form-check">
                                            <input class="form-check-input" name="payment_method"
                                                type="checkbox" id="bank" value="Direkte Banküberweisung">
                                            <label class="form-check-label" for="bank"> Direkte Banküberweisung

                                            <?php $__errorArgs = ['payment_method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="text-danger"><?php echo e($message); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="check-faq">
                                        <div class="form-check">
                                            <input class="form-check-input" required type="checkbox" id="agree-faq" checked />
                                            <label class="form-check-label" for="agree-faq">Ich habe die Allgemeinen
                                                Geschäftsbedingungen für die Website gelesen und stimme ihnen zu <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    <?php if(count((array) session('cart')) > 0): ?>
                                    <button class="ps-btn ps-btn--warning" type="submit">Bestellung aufgeben</button>
                                    <?php else: ?>
                                    <button class="ps-btn ps-btn--warning" type="disabled" disabled>Bestellung aufgeben</button>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="loader position-absolute d-none">
                                <i class="fa fa-spinner fa-spin" style="font-size:24px"></i>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>

        var country = document.getElementById('country').value;
        function couponApply() {
           var couponCode = document.getElementById('couponCode').value;

           var dynmicElChekout = document.querySelector("#dynmicElChekout");

           $.ajax({
                url: "/coupon/apply",
                method: 'post',
                data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        "code": couponCode,
                        "country": country,
                    },
                    beforeSend : function(){
                        $(".loader").removeClass("d-none");
                    },
                    success: function(response) {
                        $(".loader").addClass("d-none");
                        console.log(response);

                        const {message,status,data} = JSON.parse(response);

                        if(status === "success"){

                            let product = data.cart.map((item, index) => {
                            return `
                            ${item.type === "variable" ? `
                            <div class="ps-checkout__row ps-product">
                                <div class="ps-product__name">${item.name}<span>x</span><span>${item.quantity}</span><br>
                                    ${item.details ? item.details.map((val) => (
                                    `<span>${val}</span><br>`
                                    )).join('') : ''}
                                </div>
                                <div class="ps-product__price">
                                    ${item.price_with_tax}
                                </div>
                            </div> `: `<div class="ps-checkout__row ps-product">
                                <div class="ps-product__name">
                                    ${item.name}<span>x</span><span>${item.quantity}</span>
                                </div>
                                <div class="ps-product__price">
                                    ${item.price_with_tax}
                                </div>
                            </div> `}`;

                        });
                            $(dynmicElChekout).html(`
                                    ${product}
                                    <div class="ps-checkout__row">
                                        <div class="ps-title">Zwischensumme</div>
                                        <div class="ps-product__price">${data.subtotal}</div>
                                    </div>
                                    <div class="ps-checkout__row">
                                        <div class="ps-title">Discount

                                            <div class="ps-title" style="font-size:12px"><a class="text-danger" onclick="remove_coupon()" href="javascript:void(0);">Remove Coupon</a></div>
                                            </div>

                                            <div class="ps-product__price">
                                            ${data.discount_value}
                                            </div>
                                        </div>

                                <div class="ps-checkout__row">
                                    <div class="ps-title">Versand</div>
                                    <div class="ps-checkout__checkbox">
                                        <div class="form-check">
                                            <label for="free-ship" id="shipping_price">
                                                ${data.shipping_price}
                                            </label>
                                        </div>

                                    </div>
                                </div>
                                <div class="ps-checkout__row">
                                    <div class="ps-title">Total</div>
                                    <div class="ps-product__price">
                                    ${data.total}
                                    </div>
                                </div>
                            `);
                            toastr.success(message);
                        }else{

                            toastr.error(message);
                        }
                    },
                    error : function(err){
                        console.log(err);
                    }
            });
       }



    </script>

    <script>


      $(document).ready(function () {
        const country_el = document.querySelectorAll('.country_shipping');
        // country shipping
        var dynmicElChekout = document.querySelector("#dynmicElChekout");
        $("#country").on('change', function(){
            const id = $(this).val();
            sessionStorage.setItem("selected", id);
            // $("#shipping_conuntry").val($(this).val());
            shipping_update(id, dynmicElChekout);

        });

         if(sessionStorage.getItem("checkded")){
             $('.shipping_check').prop("checked", true);
             $(".ps-hidden").css('display',"block");
             $("#shipping_conuntry").on('change', function () {
                var id = $(this).val();

                shipping_update(id, dynmicElChekout);
            });
        }

        $(".shipping_check").on('click', function () {

            if ($(this).prop("checked")) {
                var id =  $("#shipping_conuntry").val();
                shipping_update(id, dynmicElChekout);

                sessionStorage.setItem("checkded","shipping" );
                $("#shipping_conuntry").on('change', function () {
                var id = $(this).val();

                shipping_update(id, dynmicElChekout);
                });
            }else{
                sessionStorage.removeItem("checkded");
               let id =  $("#country").val();
               shipping_update(id, dynmicElChekout);
            }
        });
      });

    function shipping_update(id, dynmicElChekout) {
    $.ajax({
        url: "/admin/shipping/country/shipping_country_update",
        method: 'post',
        data: {
        "_token": "<?php echo e(csrf_token()); ?>",
        "shipping_country": id,
        },
        beforeSend : function(){
            $(".loader").removeClass("d-none");
        },
        success: function (response) {
            $(".loader").addClass("d-none");
            const {cart} = response;
        console.log(response.cart);

        let product = cart.map((item, index) => {
                return `
                ${item.type === "variable" ? `
                   <div class="ps-checkout__row ps-product">
                    <div class="ps-product__name">${item.name}<span>x</span><span>${item.quantity}</span><br>
                        ${item.details ? item.details.map((val) => (
                        `<span>${val}</span><br>`
                        )).join('') : ''}
                    </div>
                    <div class="ps-product__price">
                        ${item.price_with_tax}
                    </div>
                </div> `: `<div class="ps-checkout__row ps-product">
                    <div class="ps-product__name">
                        ${item.name}<span>x</span><span>${item.quantity}</span>
                    </div>
                    <div class="ps-product__price">
                        ${item.price_with_tax}
                    </div>
                </div> `}`;

        });


        $(dynmicElChekout).html(`
            ${product}
            <div class="ps-checkout__row">
                <div class="ps-title">Zwischensumme</div>
                <div class="ps-product__price">${response.subtotal}</div>
            </div>
            ${response.coupon ?
            `<div class="ps-checkout__row">
                <div class="ps-title">Discount
                <div class="ps-title" style="font-size:12px">
                    <a class="text-danger" href="javascript:void(0);" onclick="remove_coupon()">Remove Coupon</a>
                </div>
                </div>
                <div class="ps-product__price">
                ${response.discount_value} <span>${response.type !== 'flat' ? '%' : ''}</span>
                </div>
            </div>`
            : ''}
            <div class="ps-checkout__row">
            <div class="ps-title">Versand</div>
            <div class="ps-checkout__checkbox">
                <div class="form-check">
                <label for="free-ship" id="shipping_price">
                    ${response.shipping_price}
                </label>
                </div>
            </div>
            </div>
            <div class="ps-checkout__row">
            <div class="ps-title">Total</div>
            <div class="ps-product__price">
                ${response.total}
            </div>
            </div>
        `);
        },
        error: function (err) {
        console.log(err);
        }
    });
    };

    function remove_coupon() {
    $.ajax({
        url: "coupon/remove",
        method: 'get',
        data: {
        "_token": "<?php echo e(csrf_token()); ?>",
        },
        beforeSend : function(){
            $(".loader").removeClass("d-none");
        },
        success: function (response) {
            $(".loader").addClass("d-none");
            // console.log(response);
            // return false;
        var res = JSON.parse(response);
        const { data } = res;
        console.log(data);
        let product = data.cart.map((item, index) => {
                return `
                ${item.type === "variable" ? `
                   <div class="ps-checkout__row ps-product">
                    <div class="ps-product__name">${item.name}<span>x</span><span>${item.quantity}</span><br>
                        ${item.details ? item.details.map((val) => (
                        `<span>${val}</span><br>`
                        )).join('') : ''}
                    </div>
                    <div class="ps-product__price">
                        ${item.price_with_tax}
                    </div>
                </div> `: `<div class="ps-checkout__row ps-product">
                    <div class="ps-product__name">
                        ${item.name}<span>x</span><span>${item.quantity}</span>
                    </div>
                    <div class="ps-product__price">
                        ${item.price_with_tax}
                    </div>
                </div> `}`;

        });


        if (res.status === "success") {
            $(dynmicElChekout).html(`
            ${product}
            <div class="ps-checkout__row">
                <div class="ps-title">Zwischensumme</div>
                <div class="ps-product__price">${data.subtotal}</div>
            </div>
            <div class="ps-checkout__row">
                <div class="ps-title">Versand</div>
                <div class="ps-checkout__checkbox">
                <div class="form-check">
                    <label for="free-ship" id="shipping_price">
                    ${data.shipping_price}
                    </label>
                </div>
                </div>
            </div>
            <div class="ps-checkout__row">
                <div class="ps-title">Total</div>
                <div class="ps-product__price">
                ${data.total}
                </div>
            </div>
            `);
            toastr.success(res.message);
        } else {
            toastr.error(message);
        }
        },
        error: function (err) {
        console.log(err);
        }
    });
}

  </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('../Layout.Layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customstegpearl/public_html/root/resources/views/pages/checkout.blade.php ENDPATH**/ ?>