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
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('DisabledShortBy')),'filterIcon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('d-none'))]); ?>Support Ticket <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
     <!-- //Design here -->
     <div class="bg-light-blue pt-50 pb-50">
      <div class="container">
        <img src="https://i0.wp.com/epp.solar/wp-content/uploads/2023/01/support-ticket-01-scaled.jpg?fit=2560%2C533&ssl=1"
            alt="">
        <div class="row">
          <div class="col-md-12">
            <iframe loading="lazy" class="support_ticket entered lazyloaded shadow border"
            src="https://stegback.com/api/ticket_generate/2/0" data-rocket-lazyload="fitvidscompatible"
            data-lazy-src="https://stegback.com/api/ticket_generate/2/0" data-ll-status="loaded"></iframe>
          </div>
       
          
        </div>
    </div>
     </div>
</div>
<!-- //Design here -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout.Layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customstegpearl/public_html/root/resources/views/pages/support-ticket.blade.php ENDPATH**/ ?>