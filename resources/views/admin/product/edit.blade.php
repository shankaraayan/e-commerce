@extends('admin.layout.header')

@section('content')


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
                    <form action="{{route('admin.product.update')}}" method="post" enctype="multipart/form-data" id="multipleValidation">
                        @csrf
                        @method('PUT')
                        <div class="card-text h-full space-y-4">
                        <div class="grid xl:grid-cols-2 grid-cols-1 gap-6">
                            
                            
                            <div class="input-area">
                                <label for="name" class="form-label">Is Solar Product</label>
                                <input type="radio" value="1" name="solar_product" @if($editData->solar_product == 1) checked @endif> Yes
                                <input type="radio" value="0" name="solar_product"> No
                                @if ($errors->has('solar_product'))
                                    <span class="text-danger">{{ $errors->first('solar_product') }}</span>
                                @endif
                            </div>

                            <div class="input-area">
                                <label for="name" class="form-label">Product Type*</label>
                                <select class="form-control" name="type" onchange="showOptions(this.value)" required="required">
                                    <option>Select Product Type</option>
                                    <option @if($editData->type == 'single') selected @endif value="single">Single Product</option>
        
                                    <option @if($editData->type == 'variable') selected @endif value="variable">Variable Product</option>
        
                                </select>
                                @if ($errors->has('type'))
                                <span class="text-danger">{{ $errors->first('type') }}</span>
                                @endif
                            </div>

                            <div class="input-area">
                                <label for="name" class="form-label"> Product Category*</label>
                                <select class="form-control" name="categories" id="category" required="required" >
                                    <option>Select Product Category</option>
                                    @foreach(categories() as $cat)
                                    <option value="{{ $cat->id }}" {{ $cat->id == $editData->categories ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                    </option>

                                @endforeach

                                </select>
                                @if ($errors->has('categories'))
                                <span class="text-danger">{{ $errors->first('categories') }}</span>
                                @endif
                            </div>

                            <div class="input-area">
                                <label for="name" class="form-label"> Sub Category</label>
                                <select class="form-control" name="subcategory" id="subcategory">
                                    <option value="">Select Sub Category</option>
                                    @foreach(categories()->where('parent_id',$editData->categories) as $subCat)
                                        <option value="{{ $cat->id }}" {{ $subCat->id == $editData->subcategory_id ? 'selected' : '' }}>
                                        {{ $subCat->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('subcategory'))
                                    <span class="text-danger">{{ $errors->first('subcategory') }}</span>
                                @endif
                            </div>

                            <div class="input-area">
                            <label for="name" class="form-label">Product Name*</label>
                            <input id="product_name" name="product_name" type="text" value="{{$editData->product_name}}" class="form-control" placeholder="Product Name" required="required">
                            @if ($errors->has('product_name'))
                            <span class="text-danger">{{ $errors->first('product_name') }}</span>
                            @endif
                            </div>


                            <input type="hidden" value="{{$editData->id}}" name="productId">
                            <div class="input-area">
                            <label for="name" class="form-label">SKU*</label>
                            <input type="text" class="form-control" value="{{$editData->sku}}" name="sku" required="required">

                            @if ($errors->has('sku'))
                            <span class="text-danger">{{ $errors->first('sku') }}</span>
                            @endif
                            </div>

                             <div class="input-area">
                                <label for="name" class="form-label">Product Quantity*</label>
                                <input value="{{$editData->quantity}}"  type="number" class="form-control required" name="quantity">
                                @if ($errors->has('quantity'))
                                    <span class="text-danger">{{ $errors->first('quantity') }}</span>
                                @endif
                            </div>


                        </div>
                        <div class="input-area">
                            <label for="description" class="form-label">Product Description*</label>
                            <textarea id="product_description" name="product_description" rows="5" class="form-control" placeholder="Type Here" required="required">{{$editData->product_description}}</textarea>
                            @if ($errors->has('product_description'))
                            <span class="text-danger">{{ $errors->first('product_description') }}</span>
                            @endif
                        </div>
                        <div class="grid xl:grid-cols-2 grid-cols-1 gap-6">
                            <div class="input-area">
                            <label for="name" class="form-label">Product Price(Regular)*</label>
                            <input id="price" name="price" type="text" value="{{$editData->price}}" class="form-control" placeholder="Price" required="required">
                            @if ($errors->has('price'))
                            <span class="text-danger">{{ $errors->first('price') }}</span>
                            @endif
                            </div>

                            <div class="input-area">
                            <label for="name" class="form-label">Sale Price(sale)*</label>
                            <input id="price" name="sale_price" type="text" value="{{$editData->sale_price}}" class="form-control" placeholder="Price" required="required">
                            @if ($errors->has('sale_price'))
                            <span class="text-danger">{{ $errors->first('sale_price') }}</span>
                            @endif
                            </div>

                        </div>


                        <div class="grid xl:grid-cols-2 grid-cols-1 gap-6">
                            <div class="input-area">
                            <label for="name" class="form-label">Product thumbnail Image*</label>
                            <label>
                                <input type="file" name="thumb_image">
                                @if ($errors->has('thumb_image'))
                                <span class="text-danger">{{ $errors->first('thumb_image') }}</span>
                                @endif
                            </label>
                            <img src="{{asset('root/public/uploads/'.$editData->thumb_image)}}" style="width:100px;height:100px;">
                            </div>

                            <div class="input-area">
                                <label for="name" class="form-label">Product Image*</label>
                                <label>
                                    <input type="file" name="images[]" multiple >
                                    @if ($errors->has('images'))
                                    <span class="text-danger">{{ $errors->first('images') }}</span>
                                    @endif
                                </label>
                                <div class="image-container">
                                    @foreach($productImages as $images)
                                    <div>
                                        <img src="{{ asset('root/public/uploads/'.$images->images) }}" style="width:100px;height:100px;">
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                        <div class="grid xl:grid-cols-2 grid-cols-1 gap-6">
                            <div class="input-area mb-5">
                            <label for="select" class="form-label">Status</label>
                            <select id="select" name="status" class="form-control">
                                <option {{($editData->status ==1)? 'selected': '' }} value="1" class="dark:bg-slate-700">Active</option>
                                <option {{($editData->status ==0)? 'selected': '' }} value="0" class="dark:bg-slate-700">InActive</option>
                            </select>
                            </div>
                            <div class="input-area">
                                <label for="estimate_deliver_date" class="form-label">Estimate Delivery Date*</label>
                                <input id="estimate_deliver_date" name="estimate_deliver_date" type="date" class="form-control"
                                       value="{{ date('Y-m-d', strtotime($editData->estimate_deliver_date)) }}" required>
                                @if ($errors->has('estimate_deliver_date'))
                                    <span class="text-danger">{{ $errors->first('estimate_deliver_date') }}</span>
                                @endif
                            </div>
                            

                            <div class="input-area mb-5">
                                <label for="select" class="form-label">Product Shipping Class*</label>
                                <select name="shipping" class="form-control" required="required">
                                <option>Select Here...</option>
                                @php
                                    $shippingClass = shippingClass();
                                    @endphp
                                @foreach ($shippingClass as $shipping)
                               
                                    <option value="{{$shipping->id}}" {{ ($editData->shipping_class == $shipping->id) ? 'selected' : ''}}>{{$shipping->name}}</option>
                                @endforeach
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
                    <div class=" p-6" id="variableOptions" style="overflow-y: auto; {{$editData->type == 'variable'? 'display:block':'display:none'}}">
                    
                        <div class="input-area">
                            <label for="options" class="form-label">Variable Options*</label>

                            @foreach($attributes as $values)

                            <div class="mb-2">
                                <input type="checkbox"
                                class="myElement"
                                name="options[]"
                                value="{{$values->id}}"
                                data-type="{{$values->attribute_type}}"
                                onclick="handleCheckboxClick(this)"
                                @php
                                $attributes_id = explode(',', $editData->attributes_id);
                                if(in_array($values->id, $attributes_id))
                                echo 'checked';
                                @endphp>
                                <label for="option1">{{$values->attribute_name}}</label>
                            </div>
                            @endforeach

                            <div id="out" >
                                @foreach ($attributes_id as $attribute_id)
                                @php
                                    $attribute = $attributes->firstWhere('id', $attribute_id);
                                @endphp
                                @if($attribute)

                                    <div class="dropdown-container mb-4">
                                        <label for="" class="dropdown-label">{{$attribute->attribute_name}}</label>
                                        <select id="dropdown-{{$attribute->id}}" name="dropdowns[]" class="select2 dropdown-select" multiple>
                                            <option value="">
                                            <b>Select an option</b></option>
                                            @foreach($attributesTerms->where('attributes_id',$attribute_id) as $subAttributes)
                                            <option value="{{$subAttributes->id}}"
                                            @php
                                                $terms = explode(',', $editData->attributesTerms_id);
                                                if(in_array($subAttributes->id, $terms))
                                                echo 'selected';
                                            @endphp
                                            ><b>{{$subAttributes->attribute_term_name}}</b></option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @endif
                                @endforeach
                            </div>

                            @if ($errors->has('variableOption'))
                            <span class="text-danger">{{ $errors->first('variableOption') }}</span>
                            @endif
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
                    url: "{{ route('getSubcategories') }}", // Replace with your route URL
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
@endsection
