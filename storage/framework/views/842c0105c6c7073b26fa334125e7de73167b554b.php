<?php $__env->startSection('content'); ?>

<style>
  .gaps-6 {
    gap: 6.5rem;
  }

  .text-danger {
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
                <iconify-icon icon="heroicons-outline:chevron-right"
                  class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
              </a>
            </li>
           <a href="<?php echo e(route('admin')); ?>">
           <li class="inline-block relative text-sm text-primary-500 font-Inter ">
              Dashboard
              <iconify-icon icon="heroicons-outline:chevron-right"
                class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
            </li></a>
            <a href="<?php echo e(route('admin.product.attribute.list')); ?>">
            <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
              Attributes
              <iconify-icon icon="heroicons-outline:chevron-right"
                class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
              </li>
              </a>
               <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
              Edit Attribute</li>
          </ul>
        </div>
        <!-- END: BreadCrumb -->

        <div class="grid xl:grid-cols-1 grid-cols-1">
          <!-- Basic Inputs -->
          <div class="card">
            <div class="card-body flex flex-col p-6">
              <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                <div class="flex-1">
                  <div class="card-title text-slate-900 dark:text-white">Edit Attribute</div>
                </div>
              </header>
              <form action="<?php echo e(route('admin.product.attribute.update')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="card-text h-full space-y-4">
                  <div class="grid xl:grid-cols-2 grid-cols-1 gap-6">
                  <div class="input-area">
                    <label for="name" class="form-label">Attribute Name*</label>
                    <input id="name" name="attribute_name" type="text" class="form-control" value="<?php echo e($editAttribute->attribute_name); ?>" placeholder="Attribute Name">
                    <?php if($errors->has('attribute_name')): ?>
                    <span class="text-danger"><?php echo e($errors->first('attribute_name')); ?></span>
                    <?php endif; ?>
                  </div>
                  <?php
                        $attrs = \App\Models\admin\AttributeTerm::get();
                  ?>
                  
                  <input type="hidden" value="<?php echo e($editAttribute->id); ?>" name="attribute_id">
                  <div class="input-area">
                    <label for="attributeTerm" class="form-label">Select Attribute Terms*</label>
                    <select name="attributeTerm" id="attributeTerm" class="select2 form-control w-full mt-2 py-2" multiple="multiple">
                        <?php $__currentLoopData = $attributeTerm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <option selected value="<?php echo e($value->attributes_id); ?>" class=" inline-block font-Inter font-normal text-sm text-slate-600"><?php echo e($value->attribute_term_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php $__currentLoopData = $attrs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($attr->id); ?>" class=" inline-block font-Inter font-normal text-sm text-slate-600"><?php echo e($attr->attribute_term_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                </div>

                  <div class="input-area">
                    <label for="description" class="form-label">Select Attribute Type*</label>

                    <select id="select" name="attribute_type" class="form-control">
                      <option class="dark:bg-slate-700">Select</option>

                      <?php $__currentLoopData = $attributeTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <option value="<?php echo e($value->name); ?>" class="dark:bg-slate-700" <?php if($editAttribute->attribute_type == $value->name): ?> selected <?php endif; ?>><?php echo e($value->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </select>
                  </div>

                  </div>

                  <div class="input-area">
                    <label for="description" class="form-label">Attribute Description*</label>
                    <textarea id="description" name="attribute_description" rows="5" class="form-control"
                      placeholder="Type Here"><?php echo e($editAttribute->attribute_description); ?></textarea>
                    <?php if($errors->has('attribute_description')): ?>
                    <span class="text-danger"><?php echo e($errors->first('attribute_description')); ?></span>
                    <?php endif; ?>
                  </div>
                  <div class="input-area mb-5">
                      <div class="flex items-center mr-2 sm:mr-4 mt-2 space-x-2">
                        <label class="relative inline-flex h-6 w-[46px] items-center rounded-full transition-all duration-150 cursor-pointer">
                          <input onclick="this.checked ? this.value=1 : this.value=0" name="status" value="<?php echo e($editAttribute->attribute_status); ?>" type="checkbox" <?php echo e($editAttribute->attribute_status == 1 ? 'checked' : 'unchecked'); ?> class="sr-only peer">

                          <div class="w-14 h-6 bg-gray-200 peer-focus:outline-none ring-0 rounded-full peer dark:bg-gray-900 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:z-10 after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary-500"></div>
                        </label>

                      </div>
                  </div>

                  <div class="input-area">
                    <button class="btn inline-flex justify-center btn-primary"
                      style="float:right; margin-top:15px;">Submit</button>
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

<?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customstegpearl/public_html/root/resources/views/admin/productAttributes/edit.blade.php ENDPATH**/ ?>