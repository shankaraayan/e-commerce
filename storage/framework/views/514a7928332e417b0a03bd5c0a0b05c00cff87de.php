<div class="ps-product__quantity">       
    <div class="d-flex align-items-center">
        <span class="d-block fs-4 font-weight-normal mr-3"><?php echo e($slot); ?></span> 
    <div class="def-number-input number-input safari_only mb-0">
        <button class="minus" id="minus-btn"><i class="icon-minus"></i></button>
        <input class="quantity" min="1" id="quantity" name="quantity" value="1" readonly type="number" />
        <button class="plus" id="plus-btn"><i class="icon-plus"></i></button>

    </div>
    <script>
        // get the input element and the +/- buttons
        const input = document.getElementById("quantity");
        const plusBtn = document.getElementById("plus-btn");
        const minusBtn = document.getElementById("minus-btn");

        // add event listeners to the buttons
        plusBtn.addEventListener("click", function () {
        if (parseInt(input.value) < 250) {
            input.value = parseInt(input.value) + 1;
        }
        });

        minusBtn.addEventListener("click", function () {
        // decrease the quantity value by 1
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
        }
        });
    </script>
 
   
    </div>
</div><?php /**PATH /home/customstegpearl/public_html/root/resources/views/components/quantity.blade.php ENDPATH**/ ?>