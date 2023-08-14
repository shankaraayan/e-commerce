<?php $__env->startSection('content'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
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
                Taxation
                <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
              </li>
              <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                list</li>
            </ul>
          </div>
          <!-- END: BreadCrumb -->


          <div class=" space-y-5">

            <div class="card">
              <header class=" card-header noborder">
                <h4 class="card-title">Tax Country List
                </h4>
                <p class="text-green-900" id="copy-message"></p>
                <a href="<?php echo e(route('admin.taxation.add')); ?>"> <button type="button" class="btn bg-slate-800 text-white" style="float:right;"> New Country </button></a>
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
                              Country
                            </th>
                            <th scope="col" class=" table-th ">
                              Country Code
                            </th>
                            <th scope="col" class=" table-th ">
                              Tax
                            </th>


                            <th scope="col" class=" table-th ">
                                Action
                              </th>

                          </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                            <?php
                                $x = 1;
                            ?>
                            <?php $__currentLoopData = $taxList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>

                                <td scope="col" class=" table-td ">
                                    <?php echo e($x); ?>

                                </td>

                                <td scope="col" class=" table-td ">
                                    <?php echo e($tax->country); ?>

                                </td>
                                <td scope="col" class=" table-td ">
                                    <?php echo e($tax->short_code); ?>

                                </td>
                                <td scope="col" class=" table-td ">
                                    <?php echo e($tax->vat_tax); ?>

                                </td>


                                <td scope="col" class=" table-td flex">
                                    <a href="<?php echo e(route('admin.taxation.edit',[$tax->id])); ?>">  <button class="action-btn" type="button">
                                        <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                    </button></a>

                                    <a href="<?php echo e(route('admin.taxation.delete',[$tax->id])); ?>">
                                        <button class="action-btn ml-3" >
                                            <iconify-icon icon="heroicons:trash"></iconify-icon>
                                        </button>
                                    </a>
                                </td>

                            </tr>
                            <?php
                                $x++;
                            ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <?php echo e($taxList->links()); ?>

              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>



  <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customstegpearl/public_html/root/resources/views/admin/tax/view.blade.php ENDPATH**/ ?>