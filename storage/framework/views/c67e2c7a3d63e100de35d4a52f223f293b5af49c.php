<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>


  <div class="ps-page--product4 ps-categogy--separate">
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.filtter','data' => ['value' => __('DisabledShortBy'),'filterIcon' => __('d-none'),'productName' => __($product->product_name)]]); ?>
<?php $component->withName('filtter'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('DisabledShortBy')),'filterIcon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('d-none')),'productName' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__($product->product_name))]); ?><a href="<?php echo e(route('shop',[$category])); ?>"><?php echo e($category); ?></a> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
     
    <input type="hidden" id="product_id" value="$<?php echo e(@$product->id); ?>">
      <div class="ps-page__content pt-2">
        <div class="ps-product--detail ps-product--full pt-40 pb-40 bg-light">
          
          <div class="container">
            <div class="row product-container">
                <div class="col-12 col-xl-5 col-md-5 product-image">
                    <div class="ps-section__carousel related_product_view">
                    <div class="main-image owl-carousel owl-loaded owl-drag" data-owl-loop="true" data-owl-auto="false" data-owl-nav="false" data-owl-dots="false">
                        <div class="item">
                          <img src="<?php echo e(asset('root/public/uploads/' . $product->thumb_image)); ?>" alt="alt" />
                        </div>
                        <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item">
                          <img src="<?php echo e(asset('root/public/uploads/' . $image->images)); ?>" alt="alt" />
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                  
                        <div class="gallery owl-carousel owl-loaded owl-drag mt-4" data-owl-auto="false" data-owl-loop="false" data-owl-speed="13000" data-owl-gap="10" data-owl-nav="true" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="4" data-owl-item-sm="4" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="4" data-owl-duration="1000" data-owl-mousedrag="on">
                        <div class="item">
                        <img src="<?php echo e(asset('root/public/uploads/' . $product->thumb_image)); ?>" alt="alt" data-index="0" />
                        </div>
                        <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item">
                        <img src="<?php echo e(asset('root/public/uploads/' . $image->images)); ?>" alt="alt"
                            data-index="<?php echo e($loop->index+1); ?>" />
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-xl-7 col-md-7 bg-white">
                    <div class="ps-product__info mb-3 pt-md-0 pt-3">
                     <div class="sku_wrapper ean_wrapper text-secondary text-capitalize d-inline-block fs-5 fw-500 mb-2"><a href="/shop/<?php echo e($category); ?>"><?php echo e($category); ?></a></div>
                    <div class="ps-product__title"><?php echo e($product->product_name); ?></div>
                    <div class="ps-product__meta pt-2 mt-2 mb-3">
                      <span class="<?php echo e($product->type == 'variable'? '':'ps-product__del'); ?> fs-3 text-muted"><?php if($product->type == 'variable'): ?> <?php else: ?><?php echo e(formatPrice($product->price)); ?> <?php endif; ?></span>
                      <span class="ps-product__price sale fs-3" id="totalPrice">
                        <?php if($product->type == 'variable'): ?>Die Beschreibung wird verfügbar sein, sobald Sie Komponenten ausgewählt haben.
                        <?php else: ?> <?php echo e(formatPrice($product->sale_price)); ?> 
                        <?php endif; ?>
                      </span>

                      
                    </div>
                    <h5 class="mb-4 text-dark" id="nameDiv" style="display: none;"></h5>
                    <div id="priceDiv" style="display: none;"></div>
                    <?php if($product->type == 'variable'): ?>
                    <div class="ps-product__variations_sec mb-5">
                        <div class="accordion" id="accordionExample">

                        <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="attribute_box">
                            <div class="card-header p-0" id="heading_Var<?php echo e($key); ?>" data-toggle="collapse"
                            data-target="#collapse_var_<?php echo e($key); ?>" aria-expanded="true" aria-controls="collapse_var_<?php echo e($key); ?>">
                            <div class="card_header_inner pr-3" style="display:inline-block">
                                <a href="javascript:void(0)">
                                <h3 class="attribute_title mb-0"><?php echo e($data->attribute_name); ?></h3>
                                </a>
                            </div>
                            <span class="float-right text-secondary fs-4">Ändern</span>
                            </div>

                            <div id="collapse_var_<?php echo e($key); ?>" class="collapse<?php echo e($key == 0 ? ' show' : ''); ?>"
                            aria-labelledby="heading_Var<?php echo e($key); ?>" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="row attr_desc py-2 px-4 bg-light-blue mb-20 shadow-sm">
                                  <p class="ps-desc mb-0">
                                    <?php echo e($data->attribute_description); ?></p>
                                </div>
                                <div class="ps-checkout__checkbox row" <?php if(@$data->attribute_type == 'inverter'): ?> id="test" <?php endif; ?>>

                                    <?php $__currentLoopData = $data->attributeTerms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyss => $vales): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php if($key == 0 && $data->attribute_type == 'panel'): ?>
                                    <div class="form-check col-12 mb-4">
                                        <input class="form-check-input" type="radio" name="var_radios<?php echo e($key); ?>"
                                        id="var_radios<?php echo e($key); ?>_<?php echo e($keyss); ?>" value="option<?php echo e($keyss); ?>"
                                        data-atr-name="<?php echo e($vales->attribute_term_name); ?>" data-atr-price="<?php echo e($vales->price); ?>"
                                        data-value="<?php echo e($vales->attribute_term_name); ?>,<?php echo e($vales->price); ?>,<?php echo e($vales->id); ?>,<?php echo e($data->attribute_name); ?>"
                                        onclick="getData(<?php echo e($vales->id); ?>,<?php echo e($product->id); ?>,<?php echo e($key+1); ?>); saveValue(this, '<?php echo e($data->id); ?>','Panel','heading_Var<?php echo e($key); ?>',<?php echo e($vales->id); ?>,'<?php echo e($data->attribute_name); ?>')">

                                        <label class="form-check-label mx-2" for="var_radios<?php echo e($key); ?>_<?php echo e($keyss); ?>">
                                          <div class="row align-items-center select_var_row p-2 term-select-<?php echo e($vales->id); ?>">
                                              <?php if(@$vales->image): ?>

                                              <div class="ps-section__thumbnail col-md-2 col-3">
                                              <img src="<?php echo e(asset('root/public/uploads/'.$vales->image)); ?>" alt="" class="img-fluid">
                                              </div>
                                              <?php endif; ?>
                                              <div class="align-middle <?php echo e(@$vales->image ? 'col-md-7 col-9' : 'col-9'); ?>">
                                              <h3 class="attribute_title_name py-2 d-flex justify-content-between"><?php echo e($vales->attribute_term_name); ?></h3>
                                              <p class="ps-desc"><?php echo e($vales->attribute_term_description); ?></p>
                                              </div>
                                              <div class="<?php echo e(@$vales->image ? 'col-12 col-md-3' : 'col-3'); ?>  text-right mt-md-0 mt-2">
                                                
                                              
                                                    <small class="attribute_price">
                                                        <?php if($vales->price > 0): ?>
                                                            <?php echo e(formatPrice($vales->price)); ?>

                                                        <?php endif; ?>
                                                    </small>
                                              </div>
                                          </div>
                                        </label>
                                    </div>
                                    
                                    <?php elseif($key == 1 && $data->attribute_type == 'inverter'): ?>

                                        <div class="form-check col-12 mb-4">
                                                <input class="form-check-input" type="radio" name="var_radios<?php echo e($key); ?>"
                                                id="var_radios<?php echo e($key); ?>_<?php echo e($keyss); ?>" value="option<?php echo e($keyss); ?>"
                                                data-atr-price="<?php echo e($vales->price); ?>" data-atr-name="<?php echo e($vales->attribute_term_name); ?>"
                                                data-value="<?php echo e($vales->attribute_term_name); ?>,<?php echo e($vales->price); ?>,<?php echo e($vales->id); ?>,<?php echo e($data->attribute_name); ?>"
                                                onclick="saveValue(this, '<?php echo e($data->id); ?>','','heading_Var<?php echo e($key); ?>',<?php echo e($vales->id); ?>,'<?php echo e($data->attribute_name); ?>')">
                                              
                                              <label class="form-check-label mx-2" for="var_radios<?php echo e($key); ?>_<?php echo e($keyss); ?>">
                                                <div class="row align-items-center select_var_row p-2 term-select-<?php echo e($vales->id); ?>" onclick="highlightDiv(this)">
                                                    <?php if(@$vales->image): ?>
                                                    <div class="ps-section__thumbnail col-md-2 col-3">
                                                    <img src="<?php echo e(asset('root/public/uploads/'.$vales->image)); ?>" alt="" class="img-fluid">
                                                    </div>
                                                    <?php endif; ?>
                                                    <div class="align-middle <?php echo e(@$vales->image ? 'col-9 col-md-7' : 'col-9'); ?>">
                                                    <h3 class="attribute_title_name py-2 d-flex justify-content-between">
                                                        <?php echo e($vales->attribute_term_name); ?> 
                                                    </h3>
                                                    <p class="ps-desc"><?php echo e($vales->attribute_term_description); ?></p>
                                                    </div>
                                                    <div class="<?php echo e(@$vales->image ? 'col-12 col-md-3' : 'col-3'); ?>  text-right mt-md-0 mt-2">
                                                      
                                                      <small class="attribute_price">
                                                          <?php if($vales->price > 0): ?>
                                                              <?php echo e(formatPrice($vales->price)); ?>

                                                          <?php endif; ?>
                                                      </small>
                                                    </div>
                                                </div>
                                              </label>
                                        </div>
                                    <?php else: ?>
                                        
                                    <div class="form-check col-12 mb-4">
                                        <input class="form-check-input" type="radio" name="var_radios<?php echo e($key); ?>"
                                        id="var_radios<?php echo e($key); ?>_<?php echo e($keyss); ?>" value="option<?php echo e($keyss); ?>"
                                        data-atr-price="<?php echo e($vales->price); ?>" data-atr-name="<?php echo e($vales->attribute_term_name); ?>"
                                        data-value="<?php echo e($vales->attribute_term_name); ?>,<?php echo e($vales->price); ?>,<?php echo e($vales->id); ?>,<?php echo e($data->attribute_name); ?>"
                                        onclick="saveValue(this, '<?php echo e($data->id); ?>','','heading_Var<?php echo e($key); ?>',<?php echo e($vales->id); ?>,'<?php echo e($data->attribute_name); ?>')">
                                        <label class="form-check-label mx-2" for="var_radios<?php echo e($key); ?>_<?php echo e($keyss); ?>">
                                          <div class="row align-items-center select_var_row p-2 term-select-<?php echo e($vales->id); ?>">
                                              <?php if(@$vales->image): ?>
                                              <div class="ps-section__thumbnail col-md-2 col-3">
                                              <img src="<?php echo e(asset('root/public/uploads/'.$vales->image)); ?>" alt="" class="img-fluid">
                                              </div>
                                              <?php endif; ?>
                                              <div class="align-middle  <?php echo e(@$vales->image ? 'col-9 col-md-7' : 'col-9'); ?>">
                                              <h3 class="attribute_title_name py-2 d-flex justify-content-between">
                                                  <?php echo e($vales->attribute_term_name); ?> 
                                              </h3>
                                              <p class="ps-desc"><?php echo e($vales->attribute_term_description); ?></p>
                                              </div>
                                              <div class="  <?php echo e(@$vales->image ? 'col-12 col-md-3' : 'col-3'); ?>  text-right mt-md-0 mt-2">
                                                
                                                <small class="attribute_price">
                                                  <?php if($vales->price > 0): ?>
                                                      <?php echo e(formatPrice($vales->price)); ?>

                                                  <?php endif; ?>
                                              </small>
                                              </div>
                                          </div>
                                        </label>
                                    </div>

                                    <?php endif; ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                            </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <div class="d-flex align-items-center">
                      <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.quantity','data' => []]); ?>
<?php $component->withName('quantity'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    
                    <?php
                        $countAttribites = count($attributes);
                    ?>

                    <a class="ps-btn ps-btn--warning"
                        onclick="attributeCount('<?php echo e($product->id); ?>', '<?php echo e($countAttribites); ?>')"
                        href="javascript:void(0)">In den Warenkorb</a>
                    </div>

                    <div class="select_shipping_area align-items-center mt-4 mb-0">
                      <a class="btn ps-btn--primary ps-btn--rounded for-label fs-4 px-4 py-2 shadow-none" data-toggle="collapse" href="#shipping_area" role="button" aria-expanded="false" aria-controls="shipping_area">
                          Lieferort auswählen
                      </a>
                      <div class="collapse mt-2" id="shipping_area">
                        <select class="form-control" name="shipping_class" id="shipping_class">
                            <?php
                            $result = shippingCountry()->where('shipping_id',$product->shipping_class)->where('status',1);
                            ?>
      
                            <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($country->country); ?>">
                                <?php echo e(country()->where('id',$country->country)->pluck('country')->first()); ?> </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                      </div>
                      
                    </div>  
                    <div class="shipping_box"> 
                      <div class="well shippingDate rounded-0 d-inline-block bg-light fs-5 text-blue">
                        
                        Voraussichtliches Lieferdatum <?php echo e(working_days($product->product_availability )); ?>

                      </div>
                    </div>
                    

                    <div class="product_meta">
                        <div class="sku_wrapper ean_wrapper">EAN: <span class="ean">000001000</span></div>
                        <div class="sku_wrapper">Artikelnummer: <span class="sku" id="sku"><?php echo e($product->sku); ?></span></div>
                        <div class="sku_wrapper">Kategorien: <span class="productCat">
                          <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.category-list','data' => ['prdoductCategories' => $product->categories]]); ?>
<?php $component->withName('category-list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['prdoductCategories' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product->categories)]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </span>
                        </div>
                    </div>

                    <?php
                    $banner = categories()->where('id',$product->categories)->pluck('banner')->first();
                    ?>
                    <?php if($banner != null): ?>
                    <img src="<?php echo e(asset('root/public/uploads/category/'.$banner)); ?>" class="img-fluid w-100 rounded">
                    <?php else: ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.bottom-banner','data' => []]); ?>
<?php $component->withName('bottom-banner'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.payment-icon','data' => []]); ?>
<?php $component->withName('payment-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                </div>
            </div>
          </div>
        </div> 
        
        

        <div class="ps-product__content mt-5">
          
         

          <section id="term_short_des_container" class="attribute_appendArea <?php echo e(@$components ? 'd-block' : 'd-none'); ?>">
            <div class="text-center mb-20 text-blue fs-1 fw-600">Lieferumfang</div>
            <div class="container border px-0">
                <div class="attribute_configure" id="short_des_html">
                    <?php if(!empty(@$components) && @$product->type === "variable"): ?>
                        <div class="atta_img_block bg-light-blue pb-10">
                            <?php $__currentLoopData = $components; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $component): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!preg_match('/ohne/', strtolower($component->attribute_term_name))): ?>
                                <div class="vari_imgs">
                                  <img src="<?php echo e(asset('root/public/uploads/' . $component->image)); ?>" class="img-fluid" alt="<?php echo e($component->attribute_term_name); ?>">  
                                </div> 
                                 
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div> <!-- Closing div tag for atta_img_block -->
        
                        <div class="atta_caps_block">
                            <?php $__currentLoopData = $components; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $component): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!preg_match('/ohne/', strtolower($component->attribute_term_name))): ?>
                                <div class="atta_title">
                                  <span><?php echo e($component->attribute_term_name); ?></span>
                                </div>
                                   
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div> <!-- Closing div tag for atta_caps_block -->
                    <?php endif; ?>
                </div>
            </div>
        </section>
        
       
            <?php if(!empty(@$product->product_description) && @$product->type !== "variable" ): ?>
                 
                <div class="ps-product__content bg-light-blue">
                    <div class="container">
                      <div class="row align-items-center">
                          <div class="col-md-12">
                          <div class="productDescription">
                            <?php
                              $product->product_description = preg_replace('/<!--header-->([\s\S]*?)<!--header-->/', '', $product->product_description);
                              $product_description = preg_replace('/<!--footer-->([\s\S]*?)<!--footer-->/', '', $product->product_description);
                            ?>
                            <p><?php echo $product_description; ?></p>
                            </div>
                          </div>
                        
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        
            <div id="html_component" class="mt-5">
              <?php if(!empty(@$components) && @$product->type === "variable"): ?>
                  
                <?php $__currentLoopData = @$components; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $component): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(!preg_match('/ohne/', strtolower($component->attribute_term_name))): ?>
                  <?php echo $component->component_description; ?>

                <?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            </div>

        </div>

        

            <section class="ps-section--deals pb-4 bg-light-blue pt-5">
                <div class="container">
                <div class="ps-section__header mb-0">
                    <h2 class="ps-section__title">Die besten Deals der Woche!</h2>
                </div>
                <div class="ps-section__carousel border-0">
                    <div class="owl-carousel owl-loaded owl-drag" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000" data-owl-gap="20" data-owl-nav="true" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="4" data-owl-duration="1000" data-owl-mousedrag="on">
            
                        
                        <div class="owl-stage-outer py-md-5 py-2">
                        <div class="owl-stage" style="transform: translate3d(-2228px, 0px, 0px); transition: all 1s ease 0s; width: 4706px;">
                        
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.product-small-card','data' => ['productData' => $products]]); ?>
<?php $component->withName('product-small-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['productData' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($products)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                        </div>
                        </div>
            
                        <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><i
                                class="fa fa-chevron-left"></i></button><button type="button" role="presentation"
                            class="owl-next"><i class="fa fa-chevron-right"></i></button></div>
                        <div class="owl-dots disabled"><button role="button" class="owl-dot active"><span></span></button></div>
                        <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i
                                class="fa fa-chevron-left"></i></button><button type="button" role="presentation"
                            class="owl-next"><i class="fa fa-chevron-right"></i></button></div>
                        <div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button
                            role="button" class="owl-dot"><span></span></button><button role="button"
                            class="owl-dot"><span></span></button></div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
      </div>

      
  </div>

<!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>


    <!-- kartik -->

    <script>
      $(document).ready(function () {
// Initialize Owl Carousel for the main image
        var mainCarousel = $('.main-image').owlCarousel({
          items: 1,
          nav: true,
          dots: false,
          loop: true,
          autoplay: true,
          autoplayTimeout: 5000
        });

// Initialize Owl Carousel for the gallery
        var galleryCarousel = $('.gallery').owlCarousel({
          nav: true,
          dots: false,
          responsive: {
            0: { items: 4, margin: 10 },
            576: { items: 4, margin: 10 },
            768: { items: 4, margin: 10 },
            992: { items: 4, margin: 10 },
            1200: { items: 4, margin: 10 }
          }
        });

        
// Function to handle main image change on gallery click
        $('.gallery').on('click', '.item img', function () {
          var index = $(this).data('index');
          mainCarousel.trigger('to.owl.carousel', index);
        });
      });
</script>
    <!-- kartik -->

      

<!-- Initialize Swiper -->
<script>
      var swiper = new Swiper(".mySwiper", {
        loop: true,
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,

      });
      var swiper2 = new Swiper(".mySwiper2", {
        loop: true,
        spaceBetween: 10,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        thumbs: {
          swiper: swiper,
        },
      });
</script>
  
<script>
      var global_obj_sku = {};
      function saveValue(element, attributeId, name = null, pids, term_id, attribute_name) {
          // console.log(element);
          var id = parseInt(pids.split("heading_Var")[1]);
          var collapse_id = "collapse_var_" + id;
          $("#" + collapse_id).collapse('toggle');
          id++;
          $("#" + "collapse_var_" + id).addClass('show');
          var atr_name = element.getAttribute('data-atr-name');
          var atr_price = element.getAttribute('data-atr-price');
          atr_price = price_normal_to_euro(atr_price);
          
          let selectd_attribute = element.parentElement.parentElement.parentElement.parentElement.parentElement;
          // console.log(selectd_attribute);
          $(selectd_attribute).find(".card-header").find("small").remove();
          if (atr_price != '0,00') {
            $(selectd_attribute).find(".card-header").append(`<small class="font-weight-bold">${atr_name}</small> <small class="mr-5 pl-2 selected_price">€${atr_price}</small>`);
          }

          if (name === 'Panel') {
            $('.attribute_box').slice(1).find('.card-header small').remove();
            const url = new URL(window.location.href);

            attribute_name = attribute_name.toLowerCase().split(" ").join("-");
            const params = new URLSearchParams();

            // Append the new parameter with the updated term_id
            params.append(attribute_name, term_id);

            // Update the search parameter of the URL
            url.search = params.toString();

            // Push the updated URL to the browser's history without reloading the page
            window.history.pushState({ path: url.pathname }, '', url.href);
          }
          else{
            const url = new URL(window.location.href);
            const params = new URLSearchParams(url.search);
            if (params.has(attribute_name)) {
              params.delete(attribute_name);
            } 
            params.append(attribute_name, term_id);
            url.search = params.toString();
            window.history.pushState({ path: url.href }, '', url.href);
          }

          $(".attribute_box").each(function(index){
              $(this).removeClass('disabled-attr-box');    
          });
        html_components();
        global_obj_sku[attributeId] = term_id;
        fetch_sku(global_obj_sku);
      
      }


      function getData(id, idpro, sid) {
        // console.log(idpro);
        $.ajax({
          url: '<?php echo e(route("product.attributeTerms")); ?>',
          method: 'GET',
          data: { id: id, productid: idpro }, // Pass the ID as a parameter
          success: function (response) {
            
            $("#test").html('');
            for (var i = 0; i < response.length; i++) {
              var user = response[i];
              // console.log(user);
              let imageUrl = "<?php echo e(asset('root/public/uploads/')); ?>/" + user.image;
              $("#test").append(`
                <div class="form-check col-12 mb-4">
                      <div class="row select_var_row align-items-center mx-0 mb-4 p-2 term-select-${user.id}}" onclick="highlightDiv(this);saveValue(this, '${user.attributes_id}','','heading_Var${1}',${user.id},'${user.attribute_name}');" data-atr-name="${user.attribute_term_name}" data-atr-price="${user.price}" data-value="${user.attribute_term_name},${user.price},${user.id},${user.attribute_name}">
                          <div class="ps-section__thumbnail ${user.image !== null ?'d-block col-md-2 col-3':'d-none'}">
                              <img src="${imageUrl}" alt="" width="100px">
                          </div>
                          <div class="${user.image !== null ?'col-md-7 col-9':'col-9'}">
                              <div class="mb-3">
                                  <h3 class="attribute_title_name py-2 d-flex justify-content-between">
                                      ${user.attribute_term_name}</h3>
                                  <p class="ps-desc">${user.attribute_term_description}</p>
                              </div>
                          </div>
                          <div class="${user.image !== null ?'col-12 col-md-3' : 'col-3'}  text-right mt-md-0 mt-2">
                            <small class="attribute_price">
                                ${user.price > 0 ? `€${ price_normal_to_euro(user.price)}` : ''}
                            </small>
                          </div>
                      </div>
                 
                  </div>
                  `
              );

            }

          },
          error: function (error) {
            console.log(error);
          }
        });
      }

      function highlightDiv(element) {
            const all_selected = element.parentElement.parentElement.parentElement; 
            const selectVarRows = all_selected.querySelectorAll('.select_var_row');
            // console.log(selectVarRows.length);
            selectVarRows.forEach(selectVarRow => {
                selectVarRow.style.border = "";
            });

            element.style.border = '2px solid #075095';
      }

      function add_to_cart(id,url=null,termIds) {
        var product_details = sessionStorage.getItem('sessionData');
        var shippingClassSelect = document.getElementById('shipping_class');
        var shippingCountry = shippingClassSelect.value;

        var qty = $("#quantity").val();
        $.ajax({
          type: 'post',
          url: '<?php echo e(url('/add-to-cart')); ?>',
          data: {
            "_token": "<?php echo e(csrf_token()); ?>",
            "id": id,
            "url" : url,
            "product_details": termIds,
            "quantity": qty,
            "shipping_country": shippingCountry,
          },
          success: function (response) {
            console.log(response);
            response = JSON.parse(response);
            if (response.status == true) {
              $(".my_cart_count").text(response.data);
              
              flasher.success(response.message);
              // iziToast.success({
              //   icon : 'fa fa-check-circle-o',
              //   message: response.message,
              //   position: 'topRight',
              // });
            } 
            else 
            {
              flasher.error(response.message);
              // iziToast.error({
              //       icon : 'fa fa-exclamation-circle',
              //       position: 'topRight',
              //       message: response.message,
              //   });
            }
          },
          error : function(error){
              console.log(error);
          }
        });
      }

      function toggleAccordion(header) {
        var accordion = header.parentNode;
        var accordions = document.getElementsByClassName('accordion');
        for (var i = 0; i < accordions.length; i++) {
          if (accordions[i] !== accordion) {
            accordions[i].classList.remove('active');
          }
        }
        accordion.classList.toggle('active');
      }

      function attributeCount(productId, countAttributes) {
        var nameDiv = document.getElementById('nameDiv');

        let attr_count  = $(".attribute_box");
        const url = new URL(window.location.href);
        const url_data = url.search.split("&");
        var termIds = [];

        url_data.map((item,index)=>{
          termIds.push(item.split("=")[1]);
        })

          if (attr_count.length !== termIds.length) {
          flasher.error("Please select all attribute combinations!!");

        } else { 
          let url = window.location.href;
          add_to_cart(productId,url,termIds);
        }
      }
      function pageLoad(){
          const url = window.location.href;
          const search = new URL(window.location.href);
    
          if (search.search) {
            $("#totalPrice").css('display', "none");
            let paramString = url.split('?')[1];
            paramString = paramString.split("&");
            let firstQueryId = paramString[0].split("=")[1];

            var termIdss = [];
            for (par of paramString) {
              termIdss.push(par.split('=')[1]);
            }
            $.ajax({
                type: 'get',
                url: '<?php echo e(url('/term-html')); ?>',
                data: {
                  "_token": "<?php echo e(csrf_token()); ?>",
                  "ids": termIdss,
                },
                success: function (response) {
                  // console.log(response);
                  let total_price = 0;
                  var obj_sku = {};
  
                  response && response.map((item, index) => {
                      obj_sku[item.attributes_id] = item.id;

                      total_price = total_price + parseFloat(item.price); 
                      $(".term-select-" + item.id).css("border-color", "var(--blue-color)");
                      let el = $(".term-select-" + item.id);
                      if (el[0]) {
                          el = el[0].parentElement.parentElement.parentElement.parentElement.parentElement.parentElement;
                          // console.log(el);
                          let card_header_inner = el.querySelector(".card_header_inner");

                          const ps = card_header_inner.parentElement;
                          if (parseFloat(item.price) !== 0) {
                              $(ps).append(`<small class="font-weight-bold">${item.attribute_term_name}</small> <small class="ml-3 font-weight-bold selected_price">${'€'+price_normal_to_euro(item.price)}</small>`);
                          }
                      }
                    });

                  $("#totalPrice").html('€'+price_normal_to_euro(total_price)); 
                  $("#totalPrice").css('display', 'block');
                  fetch_sku(obj_sku);
                },
                error : function(error){
                  console.log('error');
                }
            })
          }
      }

      function html_components() {
        
        const url = new URL(window.location.href);
        const url_data = url.search.split("&");
        var termIds = [];

        url_data.map((item,index)=>{
            termIds.push(item.split("=")[1]);
        })

        let ids = termIds;
        let short_des_div = document.querySelector("#short_des_html");
        let htmlComponentDiv = $("#html_component");
        $.ajax({
          type: 'get',
          url: '<?php echo e(url('/term-html')); ?>',
          data: {
            "_token": "<?php echo e(csrf_token()); ?>",
            "ids": ids,
          },
          success: function (response) {
            $("#term_short_des_container").removeClass("d-none");
            // console.log(response);
            let short_des_img = '';
            let short_des_text = '';
            let short_des_html = '';
            let htmlComponent = '';
            let total_price = 0;
            if (response) {
                 
                  response.map((item, index) => {
                    total_price = total_price + parseFloat(item.price); 
                      let short_des_im = `
                      ${item.attribute_term_name.toLowerCase().includes('ohne') !==true ? `
                      <div class="vari_imgs">
                          <img src="<?php echo e(asset('root/public/uploads/')); ?>/${item.image}" class="img-fluid" alt="abc">  
                      </div>` : ''}`;

                      let short_des_tx = `${item.attribute_term_name.toLowerCase().includes('ohne') !==true ? `
                      <div class="atta_title">
                      <span>${item.attribute_term_name}</span>
                    </div>
                        
                          ` : ''}
                      `;
                      short_des_img += short_des_im;
                      short_des_text += short_des_tx;

                      if(item.attribute_term_name.toLowerCase().includes('ohne') !==true){
                          htmlComponent += item.component_description;
                      } 
                  });   
              }
               
            let res_img_con = `<div class="atta_img_block bg-light-blue pb-10"> ${short_des_img}</div>`;
            let res_txt_con = `<div class="atta_caps_block">${short_des_text}</div>`;
            $(short_des_div).html(res_img_con+res_txt_con);
            $(htmlComponentDiv).html(htmlComponent);
            // console.log(total_price);
            $("#totalPrice").html('€'+price_normal_to_euro(total_price)); 
            $("#totalPrice").css('display', 'block');
          },
          error: function (err) {
            console.log(err);
          }
        })
      }

       // fetch sku 
       function fetch_sku($sku_data) {

            let productId = $("#product_id").val().replace('$', '');
            let attr_count = $('.attribute_box').length;
            const sku_length = Object.keys($sku_data).length;
            const final_sku = { [productId]: $sku_data };
          
            if(attr_count==sku_length){
              
                  $.ajax({
                  url: '<?php echo e(url('/sku-fetch')); ?>', 
                  method: 'POST',
                  data: {
                    "_token": "<?php echo e(csrf_token()); ?>", 
                    sku: final_sku,
                    url : window.location.href
                  },
                  success: function (response) {
                    console.log(response,'sku');
                    if(response.status==true){
                      $("#sku").html(response.sku);
                    }
                  },
                  error : function(err){
                    console.log(err);
                  }
                });
            }
       
        }
</script>

<script>

      $(document).ready(function () {
          pageLoad(); 
      })
       // disabled attribute box
      $(document).ready(function(){
        const search = new URL(window.location.href);
          $(".attribute_box").each(function(index){
              if (index > 0 && sessionStorage.getItem('savedValues') == null && search.search==="") {
                  $(this).addClass('disabled-attr-box');
              }else{
                  $(this).removeClass('disabled-attr-box');
              }
          });
      });

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('../Layout.Layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customstegpearl/public_html/root/resources/views/pages/product-detail.blade.php ENDPATH**/ ?>