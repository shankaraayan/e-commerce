<?php $__env->startSection('style'); ?>
    
    <style>
        .text-danger {
            color: red;
        }
    </style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]" id="content_wrapper">
        <div class="page-content">
            <div class="transition-all duration-150 container-fluid" id="page_layout">
                <div id="content_layout">

                    <!-- BEGIN: Breadcrumb -->
                    <div class="mb-5">
                        <ul class="m-0 p-0 list-none">
                            <li class="inline-block relative top-[3px] text-base text-primary-500 font-Inter ">
                                <a href="<?php echo e(route('admin')); ?>">
                                    <iconify-icon icon="heroicons-outline:home"></iconify-icon>
                                    <iconify-icon icon="heroicons-outline:chevron-right"
                                    class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
                                </a>
                            </li>
                            <a href="<?php echo e(route('admin.product.list')); ?>">
                                <li class="inline-block relative text-sm text-primary-500 font-Inter ">
                                    Products
                                    <iconify-icon icon="heroicons-outline:chevron-right"
                                        class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
                                </li>
                            </a>
                            <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                                Add Product</li>
                        </ul>
                    </div>
                    <!-- END: BreadCrumb -->

                    <form id="productData" action="<?php echo e(route('admin.product.store')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="grid xl:grid-cols-2 flex gap-6">
                            <div class="w-3/5">
                                <div class="card ">
                                    <div class="card-body flex flex-col p-6">
                                        <header
                                            class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                                            <div class="flex-1">
                                                <div class="card-title text-slate-900 dark:text-white">Add Product</div>
                                            </div>
                                        </header>

                                        <div class="card-text h-full space-y-4">
                                            <div class="grid xl:grid-cols-2 grid-cols-1 gap-6">

                                                <div class="input-area">
                                                    <label for="name" class="form-label">Is Solar Product</label>
                                                    <input type="radio" value="1" name="solar_product"> Yes
                                                    <input type="radio" value="0" name="solar_product"> No
                                                    <?php if($errors->has('solar_product')): ?>
                                                        <span class="text-danger"><?php echo e($errors->first('solar_product')); ?></span>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="input-area" id="option_containrer">
                                                    <label for="name" class="form-label">Product Type*</label>
                                                    <select class="form-control required" name="type" required
                                                        onchange="showOptions(this.value)">
                                                        <option value="">Select Product Type</option>
                                                        <option value="single">Single Product</option>
                                                        <option value="variable">Variable Product</option>
                                                    </select>
                                                    <?php if($errors->has('type')): ?>
                                                        <span class="text-danger"><?php echo e($errors->first('type')); ?></span>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="input-area">
                                                    <label for="name" class="form-label">Product
                                                        Category*</label>
                                                    <select class="form-control required" name="categories" id="category">
                                                        <option value="">Select Product Category</option>
                                                        <?php $__currentLoopData = categories(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                    </select>
                                                    <?php if($errors->has('categories')): ?>
                                                        <span class="text-danger"><?php echo e($errors->first('categories')); ?></span>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="input-area">
                                                    <label for="name" class="form-label"> Sub Category</label>
                                                    <select class="form-control" name="subcategory" id="subcategory">
                                                        <option value="">Select Sub Category</option>
                                                    </select>
                                                    <?php if($errors->has('subcategory')): ?>
                                                        <span class="text-danger"><?php echo e($errors->first('subcategory')); ?></span>
                                                    <?php endif; ?>
                                                </div>


                                                <div class="input-area">
                                                    <label for="name" class="form-label">Product Name*</label>
                                                    <input id="product_name" name="product_name" type="text"
                                                        class="form-control required" placeholder="Product Name">
                                                    <?php if($errors->has('product_name')): ?>
                                                        <span
                                                            class="text-danger"><?php echo e($errors->first('product_name')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="input-area">
                                                    <label for="name" class="form-label">SKU*</label>
                                                    <input type="text" class="form-control required" name="sku">

                                                    <?php if($errors->has('sku')): ?>
                                                        <span class="text-danger"><?php echo e($errors->first('sku')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                                  <div class="input-area">
                                                    <label for="name" class="form-label">Product Quantity*</label>
                                                    <input type="number" class="form-control required" name="quantity">
                                                    <?php if($errors->has('quantity')): ?>
                                                        <span class="text-danger"><?php echo e($errors->first('quantity')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="input-area">
                                                <label for="description" class="form-label">Product Description*</label>
                                                <textarea id="product_description" name="product_description" rows="5" class="form-control"
                                                    placeholder="Type Here"></textarea>
                                                <?php if($errors->has('product_description')): ?>
                                                    <span
                                                        class="text-danger"><?php echo e($errors->first('product_description')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="grid xl:grid-cols-2 grid-cols-1 gap-6">
                                                <div class="input-area">
                                                    <label for="name" class="form-label">Product Price(Regular)*</label>
                                                    <input id="price" name="price" type="text" class="form-control required"
                                                        placeholder="Price">
                                                    <?php if($errors->has('price')): ?>
                                                        <span class="text-danger"><?php echo e($errors->first('price')); ?></span>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="input-area">
                                                    <label for="name" class="form-label">Sale Price(sale)*</label>
                                                    <input id="price" name="sale_price" type="text"
                                                        class="form-control required" placeholder="Price">
                                                    <?php if($errors->has('sale_price')): ?>
                                                        <span class="text-danger"><?php echo e($errors->first('sale_price')); ?></span>
                                                    <?php endif; ?>
                                                </div>

                                            </div>



                                            <div class="grid xl:grid-cols-2 grid-cols-1 gap-6">
                                                <div class="input-area">
                                                    <label for="name" class="form-label">Product thumbnail
                                                        Image</label>
                                                    <label>
                                                        <input type="file" name="thumb_image" class="required">
                                                        <?php if($errors->has('thumb_image')): ?>
                                                            <span
                                                                class="text-danger"><?php echo e($errors->first('thumb_image')); ?></span>
                                                        <?php endif; ?>
                                                    </label>
                                                </div>

                                                <div class="input-area">
                                                    <label for="name" class="form-label">Product Image</label>
                                                    <label>
                                                        <input type="file" name="images[]" multiple class="required">
                                                        <?php if($errors->has('images')): ?>
                                                            <span
                                                                class="text-danger"><?php echo e($errors->first('images')); ?></span>
                                                        <?php endif; ?>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="grid xl:grid-cols-2 grid-cols-1 gap-6">
                                                <div class="input-area mb-5">
                                                    <label for="select" class="form-label">Status</label>
                                                    <select id="select" name="status" class="form-control">
                                                        <option value="1" class="dark:bg-slate-700">Active</option>
                                                        <option value="0" class="dark:bg-slate-700">InActive</option>
                                                    </select>
                                                </div>
                                                <div class="input-area">
                                                    <label for="name" class="form-label">Estimate Delivery Date*</label>
                                                    <input id="estimate_deliver_date" name="estimate_deliver_date" type="date" class="form-control required"
                                                        placeholder="estimate_deliver_date">
                                                    <?php if($errors->has('estimate_deliver_date')): ?>
                                                        <span class="text-danger"><?php echo e($errors->first('estimate_deliver_date')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                                

                                                <div class="input-area mb-5">
                                                    <label for="select" class="form-label">Product Shipping Class
                                                        *</label>
                                                    <select name="shipping" class="form-control required" >
                                                        <option value="">Select Here...</option>
                                                        <?php
                                                            $shippingClass = shippingClass();

                                                        ?>

                                                        <?php $__currentLoopData = $shippingClass; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipping): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($shipping->status): ?>
                                                            <option value="<?php echo e($shipping->id); ?>"><?php echo e($shipping->name); ?>

                                                            </option>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="input-area">
                                                <button type="button" id="submitBtn" class="btn inline-flex justify-center btn-dark"
                                                    style="float:right; margin-top:15px;">Submit</button>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>

                            

                            <div class="w-2/5">
                                <div class="card ">
                                    <div class="card-body flex flex-col " style="min-height: 100vh">
                        
                                        <div id="variableOptions" class="p-6 h-full"
                                            style="display: none; ; overflow-y: auto;">
                                            <div class="input-area">
                                                <label for="options" class="form-label">Variable Options*</label>
                                                <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="mb-2">

                                                        <?php if($values->attribute_status==1): ?>
                                                            <input type="checkbox" class="myElement" name="options[]"
                                                            value="<?php echo e($values->id); ?>"
                                                            data-type="<?php echo e($values->attribute_type); ?>"
                                                            onclick="handleCheckboxClick(this)">
                                                            <label for="option1"><?php echo e($values->attribute_name); ?></label>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                                <?php if($errors->has('variableOption')): ?>
                                                    <span
                                                        class="text-danger"><?php echo e($errors->first('variableOption')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <!-- Add this hidden input field in your form -->
                                        <input  type="hidden" id="selectedOptionsInput" name="selectedOptions"
                                            value="">

                                        <div id="variableOptionsTerms"
                                            style="display: none; max-height: 200px; overflow-y: auto;">
                                            <div class="input-area">
                                                <label for="options" class="form-label">Panel Options*</label>
                                                <?php $__currentLoopData = $attributesTerms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div>

                                                        <input type="checkbox" id="myElement" name="optionTerms[]"
                                                            value="<?php echo e($values->id); ?>">
                                                        <label for="option1"><?php echo e($values->attribute_term_name); ?></label>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                <?php if($errors->has('variableOption')): ?>
                                                    <span
                                                        class="text-danger"><?php echo e($errors->first('variableOption')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="input-area out p-6 pt-0 mt-0" style="display:none" id="out"></div>

                                        <?php if($errors->has('variableOption')): ?>
                                            <span class="text-danger"><?php echo e($errors->first('variableOption')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="flash-message-container fixed flex-col top-0 right-0 flex gap-4 py-4">

    </div>

    <script>

        document.getElementById("submitBtn").addEventListener("click", function(event) {
            event.preventDefault();
            const formData = new FormData(document.getElementById("productData"));
            const required = document.getElementById("productData").getElementsByClassName('required');
            const total = document.getElementById("productData").getElementsByClassName("required").length;
            // clear input
            $(required).each(function(){
                $(this).next().remove();
                $(this).removeClass('border border-danger');
            })
            $(required).each(function(){
                $(this).on('focus',function(){
                    $(this).next().remove();
                    $(this).removeClass('border border-danger');
                })
            })

            // require filed validation
            // const total  = form.getElementsByClassName("required").length;

            let empty_length = 0;

            $(required).each(function() {
                if($(this).val() ===""){
                    $(this).after('<p class="text-danger">This filed is required !</p>')
                    $(this).addClass('border border-danger');
                }
                else{
                    empty_length++;
                }
            })

            if(empty_length == total){
                document.getElementById("submitBtn").innerHTML = "PLEASE WAIT...";
                 fetch("<?php echo e(route('admin.product.store')); ?>", {
                    method: "POST",
                    body: formData
                })
                .then(response => response.json())
                .then(data => {

                if (data.status == false) {
                    const errorMessages = data.errors ? Object.values(data.errors).map(error => `<li>${error}</li>`).join('') : '';
                    for(key in data.input_errors){
                        $(".flash-message-container").append(`<div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>${data.input_errors[key]}</strong>
                            </div>`
                        );
                    }


                // $(".flash-message-container").html(errorMessageEl);
                } else {
                    const flashMessage = `
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>${data.message}</strong>
                    </div>
                    `;
                    document.querySelector(".flash-message-container").innerHTML = flashMessage;
                    $(formData).trigger('reset');
                    window.location.href = '/admin/product/list';

                }
                document.getElementById("submitBtn").innerHTML = "SUBMIT";
                $('.close').each(function(){
                        $(this).click(function(){
                            $(this.parentElement).fadeOut();
                        })
                    })

            })
          .catch(error => {
            console.error(error);
          });
            }
            else{
                return false;
            }


        });
      </script>

    <script>
        function showOptions(value) {
            var variableOptions = document.getElementById('variableOptions');
            var variableOptionsTermsOut = document.getElementById('out');
            if (value === 'variable') {
                variableOptions.style.display = 'block';
                variableOptionsTermsOut.style.display = 'block';
            } else {
                variableOptions.style.display = 'none';
                variableOptionsTermsOut.style.display = 'none';
            }
        }
    </script>

    <script>
        function functionShow() {
            var element = document.getElementById('myElement');
            var dataTypeValue = element.getAttribute('data-type');
            console.log(dataTypeValue);

            var variableOptions = document.getElementById('variableOptionsTerms');

            if (dataTypeValue === 'panel') {
                variableOptions.style.display = 'block';
            } else {
                variableOptions.style.display = 'none';
            }
        }

        // Add an event listener to the checkboxes
        var checkboxes = document.querySelectorAll('input[name="options[]"]');


        var dataTypeValue = document.getElementById('myElement').getAttribute('data-type');

        if (this.checked && dataTypeValue === 'panel') {
            functionShow();
        } else if (dataTypeValue === 'panel') {
            var variableOptions = document.getElementById('variableOptionsTerms');
            variableOptions.style.display = 'none';
        }
    </script>

    <script>

        $(document).ready(function() {
            // When the category dropdown value changes
            $('#category').change(function() {
                var categoryId = $(this).val();
                if (categoryId) {
                    // Make an AJAX request to fetch sub-categories based on the selected category
                    $.ajax({
                        url: "<?php echo e(route('getSubcategories')); ?>", // Replace with your route URL
                        type: "GET",
                        data: {
                            category_id: categoryId
                        },
                        success: function(data) {
                            console.log(data);
                            $('#subcategory').empty().append(
                                '<option value="">Select Sub Category</option>');
                            $.each(data, function(key, value) {
                                $('#subcategory').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    // If no category is selected, reset sub-category dropdown
                    $('#subcategory').empty().append('<option value="">Select Sub Category</option>');
                }
            });
        });
    </script>

    <script>
        const selectedOptions = {};

        function handleCheckboxClick(checkbox) {
            const dropdownContainer = document.getElementById('out');
            console.log(dropdownContainer);
            if (checkbox.checked) {
                $('.out').css('display', 'block');
                const dropdownId = `dropdown-${checkbox.value}`;
                const attribute_name = checkbox.nextElementSibling.innerHTML;
                console.log(attribute_name);
                if (!selectedOptions[checkbox.value]) {
                    selectedOptions[checkbox.value] = []; // Initialize selected options array for the checkbox value
                    //   console.log('empty');
                }
                const dropdownHTML = `
                                    <div class="mb-2">
                                    <label for="${dropdownId}" class="dropdown-label">${attribute_name}*</label>
                                    <select id="${dropdownId}" name="optionTerms[]" class="select2 dropdown-select" multiple>
                                            <option value=""><b>Select an option</b></option>
                                    </select>
                                    </div>`;
                //   onchange="updateSelectedOptions(this)"

                dropdownContainer.insertAdjacentHTML('beforeend', dropdownHTML);
                fetchDropdownOptions(checkbox, dropdownId); // Fetch options for the dropdown
            } else {

                const dropdownId = `dropdown-${checkbox.value}`;
                const dropdownElement = document.getElementById(dropdownId);
                dropdownElement.parentElement.remove(); // Remove the dropdown when checkbox is unchecked
                delete selectedOptions[checkbox.value]; // Remove the selected options for the checkbox value
                updateHiddenInput(); // Update the hidden input value
            }

            $('.select2').select2();
        }

        function fetchDropdownOptions(checkbox, dropdownId) {
            const attributeId = checkbox.value;
            const dropdownElement = document.getElementById(dropdownId);

            // Make an AJAX request to fetch dropdown options
            // Replace the URL below with your actual endpoint
            const url = `/product-terms-admin/${attributeId}`;
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    // Add new options
                    data.forEach(option => {
                        const optionElement = document.createElement('option');
                        optionElement.value = option.id;
                        optionElement.textContent = option.attribute_term_name;
                        dropdownElement.appendChild(optionElement);
                    });

                    // Pre-select the previously selected options
                    selectedOptions[attributeId].forEach(selectedOption => {
                        const optionElement = dropdownElement.querySelector(
                            `option[value="${selectedOption}"]`);
                        if (optionElement) {
                            optionElement.selected = true;
                        }
                    });
                })
                .catch(error => {
                    console.error('Error fetching dropdown options:', error);
                });
        }

        function updateSelectedOptions(select) {
            const attributeId = select.id.split('-')[1];
            selectedOptions[attributeId] = Array.from(select.selectedOptions, option => option.value);
            updateHiddenInput(); // Update the hidden input value
        }

        function updateHiddenInput() {
            const hiddenInput = document.getElementById('selectedOptionsInput');
            hiddenInput.value = JSON.stringify(selectedOptions);
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customstegpearl/public_html/root/resources/views/admin/product/add.blade.php ENDPATH**/ ?>