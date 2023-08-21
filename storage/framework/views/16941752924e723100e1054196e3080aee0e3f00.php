<?php $__env->startSection('content'); ?>


<style>
  .gaps-6 {
    gap: 6.5rem;
  }

  .text-danger {
    color: red;
  }

  .image-container {
    display: flex;
}

.image-container img {
    margin-right: 10px;
}

</style>

<div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]" id="content_wrapper">
  <div class="page-content">
    <div class="transition-all duration-150 container-fluid" id="page_layout">
      <div id="content_layout">

        <!-- BEGIN: Breadcrumb -->
        <div class="mb-5">
          <ul class="m-0 p-0 list-none">
            <li class="inline-block relative top-[3px] text-base text-primary-500 font-Inter ">
              <a href="index.html">
                <iconify-icon icon="heroicons-outline:home"></iconify-icon>
                <iconify-icon icon="heroicons-outline:chevron-right" class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
              </a>
            </li>
            <li class="inline-block relative text-sm text-primary-500 font-Inter ">
              Forms
              <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
            </li>
            <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
              Attribute</li>
          </ul>
        </div>
        <!-- END: BreadCrumb -->

        <div class="grid xl:grid-cols-2 flex gap-6">
       
          <!-- Basic Inputs -->
          <div class="w-3/5">
            <div class="card">
                <div class="card-body flex flex-col p-6">
                  <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                    <div class="flex-1">
                      <div class="card-title text-slate-900 dark:text-white">Basic Attribute</div>
                    </div>
                  </header>
                    <form action="<?php echo e(route('admin.product.update')); ?>" method="post" enctype="multipart/form-data" id="multipleValidation">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="card-text h-full space-y-4">
                        <div class="grid xl:grid-cols-2 grid-cols-1 gap-6">
                            
                            
                            <div class="input-area">
                                <label for="name" class="form-label">Is Solar Product</label>
                                <input type="radio" value="1" name="solar_product" <?php if($editData->solar_product == 1): ?> checked <?php endif; ?>> Yes
                                <input type="radio" value="0" name="solar_product"> No
                                <?php if($errors->has('solar_product')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('solar_product')); ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="input-area">
                                <label for="name" class="form-label">Product Type*</label>
                                <select class="form-control" name="type" onchange="showOptions(this.value)" required="required">
                                    <option>Select Product Type</option>
                                    <option <?php if($editData->type == 'single'): ?> selected <?php endif; ?> value="single">Single Product</option>
        
                                    <option <?php if($editData->type == 'variable'): ?> selected <?php endif; ?> value="variable">Variable Product</option>
        
                                </select>
                                <?php if($errors->has('type')): ?>
                                <span class="text-danger"><?php echo e($errors->first('type')); ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="input-area">
                                <label for="name" class="form-label"> Product Category*</label>
                                <select class="form-control" name="categories" id="category" required="required" >
                                    <option>Select Product Category</option>
                                    <?php $__currentLoopData = categories(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($cat->id); ?>" <?php echo e($cat->id == $editData->categories ? 'selected' : ''); ?>>
                                    <?php echo e($cat->name); ?>

                                    </option>

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
                                    <?php $__currentLoopData = categories()->where('parent_id',$editData->categories); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($cat->id); ?>" <?php echo e($subCat->id == $editData->subcategory_id ? 'selected' : ''); ?>>
                                        <?php echo e($subCat->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('subcategory')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('subcategory')); ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="input-area">
                            <label for="name" class="form-label">Product Name*</label>
                            <input id="product_name" name="product_name" type="text" value="<?php echo e($editData->product_name); ?>" class="form-control" placeholder="Product Name" required="required">
                            <?php if($errors->has('product_name')): ?>
                            <span class="text-danger"><?php echo e($errors->first('product_name')); ?></span>
                            <?php endif; ?>
                            </div>


                            <input type="hidden" value="<?php echo e($editData->id); ?>" name="productId">
                            <div class="input-area">
                            <label for="name" class="form-label">SKU*</label>
                            <input type="text" class="form-control" value="<?php echo e($editData->sku); ?>" name="sku" required="required">

                            <?php if($errors->has('sku')): ?>
                            <span class="text-danger"><?php echo e($errors->first('sku')); ?></span>
                            <?php endif; ?>
                            </div>

                             <div class="input-area">
                                <label for="name" class="form-label">Product Quantity*</label>
                                <input value="<?php echo e($editData->quantity); ?>"  type="number" class="form-control required" name="quantity">
                                <?php if($errors->has('quantity')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('quantity')); ?></span>
                                <?php endif; ?>
                            </div>


                        </div>
                        <div class="input-area">
                            <label for="description" class="form-label">Product Description*</label>
                            <textarea id="product_description" name="product_description" rows="5" class="form-control" placeholder="Type Here" required="required"><?php echo e($editData->product_description); ?></textarea>
                            <?php if($errors->has('product_description')): ?>
                            <span class="text-danger"><?php echo e($errors->first('product_description')); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="grid xl:grid-cols-2 grid-cols-1 gap-6">
                            <div class="input-area">
                            <label for="name" class="form-label">Product Price(Regular)*</label>
                            <input id="price" name="price" type="text" value="<?php echo e($editData->price); ?>" class="form-control" placeholder="Price" required="required">
                            <?php if($errors->has('price')): ?>
                            <span class="text-danger"><?php echo e($errors->first('price')); ?></span>
                            <?php endif; ?>
                            </div>

                            <div class="input-area">
                            <label for="name" class="form-label">Sale Price(sale)*</label>
                            <input id="price" name="sale_price" type="text" value="<?php echo e($editData->sale_price); ?>" class="form-control" placeholder="Price" required="required">
                            <?php if($errors->has('sale_price')): ?>
                            <span class="text-danger"><?php echo e($errors->first('sale_price')); ?></span>
                            <?php endif; ?>
                            </div>

                        </div>


                        <div class="grid xl:grid-cols-2 grid-cols-1 gap-6">
                            <div class="input-area">
                            <label for="name" class="form-label">Product thumbnail Image*</label>
                            <label>
                                <input type="file" name="thumb_image">
                                <?php if($errors->has('thumb_image')): ?>
                                <span class="text-danger"><?php echo e($errors->first('thumb_image')); ?></span>
                                <?php endif; ?>
                            </label>
                            <img src="<?php echo e(asset('root/public/uploads/'.$editData->thumb_image)); ?>" style="width:100px;height:100px;">
                            </div>

                            <div class="input-area">
                                <label for="name" class="form-label">Product Image*</label>
                                <label>
                                    <input type="file" name="images[]" multiple >
                                    <?php if($errors->has('images')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('images')); ?></span>
                                    <?php endif; ?>
                                </label>
                                <div class="image-container">
                                    <?php $__currentLoopData = $productImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $images): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div>
                                        <img src="<?php echo e(asset('root/public/uploads/'.$images->images)); ?>" style="width:100px;height:100px;">
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>

                        </div>
                        <div class="grid xl:grid-cols-2 grid-cols-1 gap-6">
                            <div class="input-area mb-5">
                            <label for="select" class="form-label">Status</label>
                            <select id="select" name="status" class="form-control">
                                <option <?php echo e(($editData->status ==1)? 'selected': ''); ?> value="1" class="dark:bg-slate-700">Active</option>
                                <option <?php echo e(($editData->status ==0)? 'selected': ''); ?> value="0" class="dark:bg-slate-700">InActive</option>
                            </select>
                            </div>
                            <div class="input-area">
                                <label for="estimate_deliver_date" class="form-label">Estimate Delivery Date*</label>
                                <input id="estimate_deliver_date" name="estimate_deliver_date" type="date" class="form-control"
                                       value="<?php echo e(date('Y-m-d', strtotime($editData->estimate_deliver_date))); ?>" required>
                                <?php if($errors->has('estimate_deliver_date')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('estimate_deliver_date')); ?></span>
                                <?php endif; ?>
                            </div>
                            

                            <div class="input-area mb-5">
                                <label for="select" class="form-label">Product Shipping Class*</label>
                                <select name="shipping" class="form-control" required="required">
                                <option>Select Here...</option>
                                <?php
                                    $shippingClass = shippingClass();
                                    ?>
                                <?php $__currentLoopData = $shippingClass; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipping): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               
                                    <option value="<?php echo e($shipping->id); ?>" <?php echo e(($editData->shipping_class == $shipping->id) ? 'selected' : ''); ?>><?php echo e($shipping->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                        </div>
                        <div class="input-area">
                            <button class="btn inline-flex justify-center btn-dark" style="float:right; margin-top:15px;">Submit</button>
                        </div>
                        </div>


                    </div>
                </div>
          </div>
          <div class="w-3/5">
            <div class="card ">


                <div class="card-body flex flex-col" style="min-height: 100vh;">
                    
                    <!-- Add this hidden input field in your form -->
                    <input type="hidden" id="selectedOptionsInput" name="selectedOptions"
                    value="">
                    <div class=" p-6" id="variableOptions" style="overflow-y: auto; <?php echo e($editData->type == 'variable'? 'display:block':'display:none'); ?>">
                    
                        <div class="input-area">
                            <label for="options" class="form-label">Variable Options*</label>

                            <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="mb-2">
                                <input type="checkbox"
                                class="myElement"
                                name="options[]"
                                value="<?php echo e($values->id); ?>"
                                data-type="<?php echo e($values->attribute_type); ?>"
                                onclick="handleCheckboxClick(this)"
                                <?php
                                $attributes_id = explode(',', $editData->attributes_id);
                                if(in_array($values->id, $attributes_id))
                                echo 'checked';
                                ?>>
                                <label for="option1"><?php echo e($values->attribute_name); ?></label>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <div id="out" >
                                <?php $__currentLoopData = $attributes_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $attribute = $attributes->firstWhere('id', $attribute_id);
                                ?>
                                <?php if($attribute): ?>

                                    <div class="dropdown-container mb-4">
                                        <label for="" class="dropdown-label"><?php echo e($attribute->attribute_name); ?></label>
                                        <select id="dropdown-<?php echo e($attribute->id); ?>" name="dropdowns[]" class="select2 dropdown-select" multiple>
                                            <option value="">
                                            <b>Select an option</b></option>
                                            <?php $__currentLoopData = $attributesTerms->where('attributes_id',$attribute_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subAttributes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($subAttributes->id); ?>"
                                            <?php
                                                $terms = explode(',', $editData->attributesTerms_id);
                                                if(in_array($subAttributes->id, $terms))
                                                echo 'selected';
                                            ?>
                                            ><b><?php echo e($subAttributes->attribute_term_name); ?></b></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                            <?php if($errors->has('variableOption')): ?>
                            <span class="text-danger"><?php echo e($errors->first('variableOption')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

          </div>
          </form>

          <!-- Formatter Support -->
          <div class="card xl:col-span-2 rounded-md bg-white dark:bg-slate-800 lg:h-full shadow-base">

          </div>
        </div>

      </div>
    </div>
  </div>
</div>

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
	const selectedOptions = {};

	function handleCheckboxClick(checkbox) {
	const dropdownContainer = document.getElementById('out');

	if (checkbox.checked) {
		const dropdownId = `dropdown-${checkbox.value}`;

		const attribute_name = checkbox.nextElementSibling.innerHTML;

		if (!selectedOptions[checkbox.value]) {
		    selectedOptions[checkbox.value] = [];
		}
		const dropdownHTML = `
		    <div class="dropdown-container">
                <label for="${dropdownId}" class="dropdown-label">${attribute_name}*</label>
                <select required id="${dropdownId}" name="dropdowns[]" class="select2 dropdown-select" multiple onchange="updateSelectedOptions(this)">
                    <option value="" selected disabled><b>Select an option</b></option>
                    <!-- Add your other options here -->
                </select>
            </div>

		`;

		dropdownContainer.insertAdjacentHTML('beforeend', dropdownHTML);
		fetchDropdownOptions(checkbox, dropdownId);

	} else {
            const dropdownId = `dropdown-${checkbox.value}`;
            console.log(dropdownId);
            const dropdownElement = document.getElementById(dropdownId);
            // console.log(dropdownElement);
            // return false;
            dropdownElement.parentElement.remove(); // Remove the dropdown when checkbox is unchecked
            delete selectedOptions[checkbox.value]; // Remove the selected options for the checkbox value
            updateHiddenInput(); // Update the hidden input value
	    }
        $('.select2').select2();
	}

	function fetchDropdownOptions(checkbox, dropdownId) {
	const attributeId = checkbox.value;
	const dropdownElement = document.getElementById(dropdownId);

	const url = `/product-terms-admin/${attributeId}`;
	fetch(url)
		.then(response => response.json())
		.then(data => {

		data.forEach(option => {
			const optionElement = document.createElement('option');
			optionElement.value = option.id;
			optionElement.textContent = option.attribute_term_name;
			dropdownElement.appendChild(optionElement);
		});

		selectedOptions[attributeId].forEach(selectedOption => {
			const optionElement = dropdownElement.querySelector(`option[value="${selectedOption}"]`);
			if (optionElement) {
			optionElement.selected = true;
			}
		});
		})
		.catch(error => {
		console.error('Error fetching dropdown options:', error);
		});
	}

	// function updateSelectedOptions(select) {
	// const attributeId = select.id.split('-')[1];
	// selectedOptions[attributeId] = Array.from(select.selectedOptions, option => option.value);
	// updateHiddenInput(); // Update the hidden input value
	// }

	function updateHiddenInput() {
	const hiddenInput = document.getElementById('selectedOptionsInput');
	hiddenInput.value = JSON.stringify(selectedOptions);
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
                    data: {category_id: categoryId},
                    success: function(data) {
                        console.log(data);
                        $('#subcategory').empty().append('<option value="">Select Sub Category</option>');
                        $.each(data, function(key, value) {
                            $('#subcategory').append('<option value="' + value.id + '">' + value.name + '</option>');
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customstegpearl/public_html/root/resources/views/admin/product/edit.blade.php ENDPATH**/ ?>