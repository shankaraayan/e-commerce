<section class="ps-section--deals py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="ps-section__header">
                    <h3 class="ps-section__title font-weight-400">Die besten Deals der Woche!</h3>
                </div>
                <div class=" related_product_view">
                  <div class="owl-carousel owl-loaded owl-drag" data-owl-auto="false" data-owl-loop="true" data-owl-speed="13000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="4" data-owl-duration="1000" data-owl-mousedrag="on">
        
                    
                    <div class="owl-stage-outer">
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
        </div>
    </div>
</section><?php /**PATH /home/customstegpearl/public_html/root/resources/views/elements/owl-carousel.blade.php ENDPATH**/ ?>