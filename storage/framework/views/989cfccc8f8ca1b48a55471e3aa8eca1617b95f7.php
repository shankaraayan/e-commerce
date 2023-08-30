<?php $__env->startSection("style"); ?>
<style>
  
 

 
     
    .support_ticket {
        height: 800px;
    }
    
   

</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.filtter','data' => ['value' => __('DisabledShortBy'),'filterIcon' => __('d-none')]]); ?>
<?php $component->withName('filtter'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('DisabledShortBy')),'filterIcon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('d-none'))]); ?>Kontakt <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<div class="bg-light-blue pt-50 pb-50">
    <div class="container">
        <div class="bg-white p-5 shadow">
            <div class="row">
                <div class="col-md-6 col-12 border-right">
                    <div class="contact-left-box">
                        <h1 class="fs-2">In Kontakt kommen</h1>
                        <p>Kontaktieren Sie uns und wir werden uns so schnell wie möglich mit einer Lösung für
                            Ihre Probleme bei Ihnen melden.</p>
                   
                        <div class="d-flex mt-5">
                            <div class="home-icon mr-5">
                                    <i class="fa fa-building bg-blue-theme text-white rounded-circle p-4"></i>
                            </div>
                            <div>
                                <h6>Büro adresse:</h6>
                                <p class="pl-0">EPP Energy Peak Power GmbH <br>
                                    Neuer Wall 50,<br>
                                    20354 Hamburg,<br> Deutschland.</p>
                            </div>
                        </div>

                        <div class="d-flex mt-3">
                            <div class="home-icon mr-5">
                                <i class="fa fa-envelope bg-blue-theme text-white rounded-circle p-4"></i>
                            </div>
                            <div>
                                <h6>E-Mail:</h6>
                                <p class="pb-0"><a href="mailto:contact@epp.solar">contact@epp.solar</a></p>
                            </div>
                        </div>
                        <div class="d-flex mt-3">
                            <div class="home-icon mr-5">
                                <i class="fa fa-phone bg-blue-theme text-white rounded-circle p-4"></i>
                            </div>
                            <div>
                                <h6>Hotline:</h6>
                                <p class="pb-0"><a href="tel:49 541 96251000">49 541 96251000</a></p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-6 col-12 contact-right-box mt-md-0 mt-5">
                    <h1 class="fs-2">Kontaktieren Sie uns</h1>
                    <iframe class="support_ticket" src="https://stegback.com/api/ticket_generate/1/0"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout.Layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customstegpearl/public_html/root/resources/views/pages/contact.blade.php ENDPATH**/ ?>