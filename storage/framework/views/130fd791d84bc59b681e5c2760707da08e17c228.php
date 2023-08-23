<?php $__env->startSection("style"); ?>

<style>
    .support_ticket {
        height: 800px;
    }
    
 </style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>
     <!-- //Design here -->
     <div class="container mt-5">
        <img src="https://i0.wp.com/epp.solar/wp-content/uploads/2023/01/support-ticket-01-scaled.jpg?fit=2560%2C533&ssl=1"
            alt="">
        <div class="row pb-30 pt-30">
          <div class="col-md-12">
            <iframe loading="lazy" class="support_ticket entered lazyloaded"
            src="https://stegback.com/api/ticket_generate/2/0" data-rocket-lazyload="fitvidscompatible"
            data-lazy-src="https://stegback.com/api/ticket_generate/2/0" data-ll-status="loaded"></iframe>
          </div>
       
          
        </div>
    </div>
</div>
<!-- //Design here -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout.Layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customstegpearl/public_html/root/resources/views/pages/support-ticket.blade.php ENDPATH**/ ?>