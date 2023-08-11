<?php $__env->startSection('content'); ?>
    <!--------------- Cart Page HTML Start ------------------------->
    <div class="ps-shopping">
        <div class="container">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.filtter','data' => ['value' => __('DisabledShortBy'),'filterIcon' => __('d-none')]]); ?>
<?php $component->withName('filtter'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('DisabledShortBy')),'filterIcon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('d-none'))]); ?>Einkaufskorb <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <ul class="ps-breadcrumb">
          
            </ul>
            <div class="container" id="cart_data">
                <?php echo $__env->make('elements.cart_data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
    <script>
        function update_to_cart(id) {
            var qty = $("#qty" + id).val();
            $.ajax({
                url: "update_cart_value",
                method: 'post',
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "id": id,
                    "quantity": qty
                },
                dataType: 'html',
                success: function(text) {
                    $('#cart_data').html(text);
                }
            })
        }

        function remove_to_cart(id) {
            var check = confirm("Are you sure you want to remove to cart ?");
            if (check == false) {
                return false;
            }
            $.ajax({
                url: "remove_to_cart",
                method: 'post',
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "id": id,
                },
                dataType: 'html',
                success: function(text) {
                    $('#cart_data').html(text);
                }
            })
        }

        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }

        function QtyUpdate(id, type) {
            var qty = $("#qty" + id).val();
            qty = parseInt(qty);
            if (type == 1) {
                $("#qty" + id).val(qty + 1);
            } else {
                if (qty > 1)
                    $("#qty" + id).val(qty - 1);
            }
            update_to_cart(id);
        }
    </script>
    <!--------------- Cart Page HTML End ------------------------->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('../Layout.Layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customstegpearl/public_html/root/resources/views/pages/cart.blade.php ENDPATH**/ ?>