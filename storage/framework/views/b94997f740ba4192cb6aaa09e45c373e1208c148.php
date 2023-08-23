<?php $__env->startSection('content'); ?>

<style>
.gaps-6 {
    gap: 0.5rem;
}
.text-danger{
  color: red;
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
              <a href="<?php echo e(route('admin')); ?>">
                <iconify-icon icon="heroicons-outline:home"></iconify-icon>
                <iconify-icon icon="heroicons-outline:chevron-right" class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
              </a>
            </li>
             <a href="<?php echo e(route('admin')); ?>">
            <li class="inline-block relative text-sm text-primary-500 font-Inter ">
              Dashboard
              <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
            </li>
            </a>
             <a href="<?php echo e(route('admin.product.attribute.list')); ?>">
            <li class="inline-block relative text-sm text-primary-500 font-Inter">
              Attribute
              <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
              </li>
              </a>

            


          </ul>
        </div>
        <!-- END: BreadCrumb -->

        <div class="grid xl:grid-cols-1 grid-cols-1">
          <!-- Basic Inputs -->
          <div class="card">
            <div class="card-body flex flex-col p-6">
              <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                <div class="flex-1">
                  <div class="card-title text-slate-900 dark:text-white"><?php echo e($attributeTerms->attribute_term_name); ?> Attribute Terms</div>
                </div>
              </header>

              <form action="<?php echo e(route('admin.product.attribute_terms.update',[$attributeTerms->id])); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="attributes_id" value="<?php echo e($attributeTerms->attributes_id); ?>">
              <div class="card-text h-full space-y-4">
                <div class="grid xl:grid-cols-2 grid-cols-1 gap-6">
                <div class="input-area">
                  <label for="name" class="form-label">Attribute Terms Name*</label>
                  <input id="attribute_term_name" name="attribute_term_name" type="text" class="form-control" placeholder="Attribute Term Name" value="<?php echo e($attributeTerms->attribute_term_name); ?>" >
                  <?php if($errors->has('attribute_term_name')): ?>
                    <span class="text-danger"><?php echo e($errors->first('attribute_term_name')); ?></span>
                  <?php endif; ?>
                </div>
                
                <div class="input-area">
                  <label for="name" class="form-label">kWh*</label>
                  <input id="attribute_term_kWh_name" name="attribute_term_kWh_name" type="text" class="form-control" placeholder="kWh" value="<?php echo e($attributeTerms->attribute_term_kWh_name); ?>" >
                  <?php if($errors->has('attribute_term_kWh_name')): ?>
                    <span class="text-danger"><?php echo e($errors->first('attribute_term_kWh_name')); ?></span>
                  <?php endif; ?>
                </div>

                </div>

                <input type="hidden" name="id" value="<?php echo e($attributeTerms->id); ?>"/>
                <div class="grid xl:grid-cols-2 grid-cols-1 gap-6">
                <div class="input-area">
                  <label for="name" class="form-label" >Price*</label>
                  <input id="price" name="price" type="text" class="form-control" placeholder="price" value="<?php echo e($attributeTerms->price); ?>" >
                  <?php if($errors->has('price')): ?>
                    <span class="text-danger"><?php echo e($errors->first('price')); ?></span>
                  <?php endif; ?>
                </div>
                
                <div class="input-area">
                  <label for="name" class="form-label">SKU*</label>
                  <input id="sku" name="sku" type="text" class="form-control" placeholder="sku" value="<?php echo e($attributeTerms->sku); ?>" >
                  <?php if($errors->has('sku')): ?>
                    <span class="text-danger"><?php echo e($errors->first('sku')); ?></span>
                  <?php endif; ?>
                </div>

                 <div class="input-area">
                  <label for="name" class="form-label">Quantity*</label>
                  <input value="<?php echo e($attributeTerms->quantity); ?>" id="quantity" name="quantity" type="text" class="form-control" placeholder="quantity" >
                  <?php if($errors->has('quantity')): ?>
                    <span class="text-danger"><?php echo e($errors->first('quantity')); ?></span>
                  <?php endif; ?>
                </div>
                

                <div class="input-area">
                  <label for="product_availability" class="form-label">Product availability days*</label>
                  <input id="product_availability" name="product_availability" type="number" min="1" class="form-control"
                         value="<?php echo e($attributeTerms->product_availability); ?>" required>
                  <?php if($errors->has('product_availability')): ?>
                      <span class="text-danger"><?php echo e($errors->first('product_availability')); ?></span>
                  <?php endif; ?>
              </div>

            </div>

                <div class="input-area">
                  <label for="description" class="form-label">Attribute Term Description*</label>
                  <textarea id="description" name="attribute_term_description" rows="5" class="form-control"  ><?php echo e($attributeTerms->attribute_term_description); ?></textarea>
                  <?php if($errors->has('attribute_term_description')): ?>
                  <span class="text-danger"><?php echo e($errors->first('attribute_term_description')); ?></span>
                <?php endif; ?>
                </div>
                <div class="input-area">
                    <label for="description" class="form-label">Attribute Term Html*</label>
                    <textarea id="description" name="component_description" rows="5" class="form-control" placeholder="Type Here" ><?php echo e(@$attributeTerms->component_description); ?></textarea>
                    <?php if($errors->has('component_description')): ?>
                    <span class="text-danger"><?php echo e($errors->first('component_description')); ?></span>
                  <?php endif; ?>
                  </div>
                  
                <div class="input-area mb-5">
                  <label for="select" class="form-label">Image</label>
                  <input type="file" name="image">
                </div>
                </div>

                <div class="input-area">
                  <button class="btn inline-flex justify-center btn-dark" style="float:right; margin-top:15px;">Submit</button>
                </div>
              </div>

            </form>
            </div>
          </div>

          <!-- Formatter Support -->
          <div class="card xl:col-span-2 rounded-md bg-white dark:bg-slate-800 lg:h-full shadow-base">

          </div>
        </div>

      </div>
    </div>
  </div>
</div>

  <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customstegpearl/public_html/root/resources/views/admin/attributeTerms/edit.blade.php ENDPATH**/ ?>