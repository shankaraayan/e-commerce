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
                  <div class="card-title text-slate-900 dark:text-white"><?php echo e($attributeName->attribute_name); ?> Attribute Terms</div>
                </div>
              </header>
              <form action="<?php echo e(route('admin.product.attribute_terms.store')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
              <div class="card-text h-full space-y-4">
                <div class="grid xl:grid-cols-2 grid-cols-1 gap-6">
                <div class="input-area">
                  <label for="name" class="form-label">Attribute Terms Name*</label>
                  <input id="attribute_term_name" name="attribute_term_name" type="text" class="form-control" placeholder="Attribute Term Name">
                  <?php if($errors->has('attribute_term_name')): ?>
                    <span class="text-danger"><?php echo e($errors->first('attribute_term_name')); ?></span>
                  <?php endif; ?>
                </div>
                <?php if($attributeName->attribute_type=='panel'): ?>
                <div class="input-area">
                  <label for="name" class="form-label">kWh*</label>
                  <input id="attribute_term_kWh_name" name="attribute_term_kWh_name" type="text" class="form-control" placeholder="kWh" required>
                  <?php if($errors->has('attribute_term_kWh_name')): ?>
                    <span class="text-danger"><?php echo e($errors->first('attribute_term_kWh_name')); ?></span>
                  <?php endif; ?>
                </div>
                <?php endif; ?>
                <?php if($attributeName->attribute_type=='inverter'): ?>
                <div class="input-area">
                  <label for="name" class="form-label">Supported Wh</label>

                  <?php $__currentLoopData = $attributesTermsWh; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if(isset($value->attribute_term_kWh_name)): ?>
                  <label>
                    <input type="checkbox" name="supported_wh[]" value="<?php echo e($value->attribute_term_kWh_name); ?>">
                    <?php echo e($value->attribute_term_kWh_name); ?>

                  </label>
                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php if($errors->has('attribute_term_kWh_name')): ?>
                    <span class="text-danger"><?php echo e($errors->first('attribute_term_kWh_name')); ?></span>
                  <?php endif; ?>
                </div>
                  <?php endif; ?>

                </div>

                <input type="hidden" name="attributes_id" value="<?php echo e($attributeName->id); ?>"/>
                <div class="grid xl:grid-cols-2 grid-cols-1 gap-6">
                <div class="input-area">
                  <label for="name" class="form-label">Price*</label>
                  <input id="price" name="price" type="text" class="form-control" placeholder="price">
                  <?php if($errors->has('price')): ?>
                    <span class="text-danger"><?php echo e($errors->first('price')); ?></span>
                  <?php endif; ?>
                </div>
                </div>
                <div class="input-area">
                  <label for="description" class="form-label">Attribute Term Description*</label>
                  <textarea id="description" name="attribute_term_description" rows="5" class="form-control" placeholder="Type Here"></textarea>
                  <?php if($errors->has('attribute_term_description')): ?>
                  <span class="text-danger"><?php echo e($errors->first('attribute_term_description')); ?></span>
                <?php endif; ?>
                </div>
                <div class="input-area mb-5">
                  <label for="select" class="form-label">Image</label>
                  <input type="file" name="image">
                </div>
                <div class="input-area mb-5">
                  <label for="select" class="form-label">Status</label>
                  <div class="flex items-center mr-2 sm:mr-4 mt-2 space-x-2">
                    <label class="relative inline-flex h-6 w-[46px] items-center rounded-full transition-all duration-150 cursor-pointer">
                    <input onclick="this.checked ? this.value=1 : this.value=0" name="status"  type="checkbox"  class="sr-only peer">

                    <div class="w-14 h-6 bg-gray-200 peer-focus:outline-none ring-0 rounded-full peer dark:bg-gray-900 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:z-10 after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary-500">

                    </div>
                    </label>

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

<div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]" id="content_wrapper">
  <div class="page-content">
    <div class="transition-all duration-150 container-fluid" id="page_layout">
      <div id="content_layout">
        <div class=" space-y-5">
                  <div class="card">
                    <header class=" card-header noborder">
                      <h4 class="card-title">Attributes Term List
                      </h4>
                     
                    </header>
                    <div class="card-body px-6 pb-6">
                      <div class="overflow-x-auto -mx-6 dashcode-data-table">
                        <span class=" col-span-8  hidden"></span>
                        <span class="  col-span-4 hidden"></span>
                        <div class="inline-block min-w-full align-middle">
                          <div class="overflow-hidden ">
                            <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table">
                              <thead class=" bg-slate-200 dark:bg-slate-700">
                                <tr>

                                  <th scope="col" class=" table-th ">
                                    Id
                                  </th>

                                  <th scope="col" class=" table-th ">
                                    Attribute Term Name
                                  </th>

                                  <th scope="col" class=" table-th ">
                                    WH
                                  </th>
                                  <th scope="col" class=" table-th ">
                                    Price
                                  </th>

                                  
                                  <th scope="col" class=" table-th ">
                                      Action
                                    </th>
                                </tr>
                              </thead>
                              <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                <?php $__currentLoopData = $attributesTerms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                  <td class="table-td"><?php echo e(++$key); ?></td>
                                  <td class="table-td "><?php echo e($values->attribute_term_name); ?></td>
                                  <td class="table-td "><?php echo e($values->attribute_term_kWh_name); ?></td>

                                  <td class="table-td "><?php echo e($values->price); ?></td>

                                  
                                  <td class="table-td ">
                                    <div class="flex space-x-3 rtl:space-x-reverse">
                                     
                                      <a href="<?php echo e(route('admin.product.attribute_terms.edit', [$values->id])); ?>">

                                        <button class="action-btn" type="button">
                                            <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                        </button>
                                    </a>
                                        <a href="<?php echo e(route('admin.product.attribute_terms.delete',$values->id)); ?>">
                                            <button class="action-btn" type="button">
                                                <iconify-icon icon="heroicons:trash"></iconify-icon>
                                            </button>
                                        </a>
                                    </div>
                                  </td>

                                </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
  <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customstegpearl/public_html/root/resources/views/admin/attributeTerms/add.blade.php ENDPATH**/ ?>