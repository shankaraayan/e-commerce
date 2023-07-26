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
                  <iconify-icon icon="heroicons-outline:chevron-right" class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
                </a>
              </li>
               <a href="<?php echo e(route('admin')); ?>">
              <li class="inline-block relative text-sm text-primary-500 font-Inter ">
                Dashboard
                <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
              </li></a>
              <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                Shipping</li>
            </ul>
          </div>
          <!-- END: BreadCrumb -->


          <div class=" space-y-5">

            <div class="card">
              <header class=" card-header noborder">
                <h4 class="card-title">Shipping List
                </h4>
                <a href="<?php echo e(route('admin.shipping.add')); ?>"> <button type="button" class="btn bg-slate-800 text-white" style="float:right;"> Add Shipping </button></a>
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
                              Shipping Name
                            </th>

                            <th scope="col" class=" table-th ">
                              Status
                            </th>
                            <th scope="col" class=" table-th ">
                              Action
                            </th>
                            <th scope="col" class=" table-th ">

                            </th>


                          </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">

                        <?php $__currentLoopData = $shipping; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                            <td class="table-td"><?php echo e(++$key); ?></td>
                            <td class="table-td "><?php echo e($values->name); ?></td>
                            <td class="table-td">
                              <?php if($values->status == 1): ?>
                                <span class="badge bg-success-500 text-success-500 bg-opacity-30 capitalize">Active</span>
                              <?php else: ?>
                                <span class="badge bg-success-500 text-danger-500 bg-opacity-30 capitalize">In active</span>
                              <?php endif; ?>
                          </td>


                            <td class="table-td ">
                              <div class="flex space-x-3 rtl:space-x-reverse">


                                  <button class="action-btn" data-bs-toggle="modal" data-bs-target="#vertically_center<?php echo e($key); ?>" type="button">
                                    <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                  </button>


                                <a href="<?php echo e(route('admin.shipping.delete',$values->id)); ?>">
                                  <button class="action-btn" onclick="return confirm('Are you sure you want to delete this Shipping?')" type="button">
                                    <iconify-icon icon="heroicons:trash"></iconify-icon>
                                  </button>
                                </a>

                              </div>
                            </td>

                            <td class="table-td "> <a href="<?php echo e(route('admin.shipping.country.list',$values->id)); ?>">
                              <button class="btn inline-flex justify-center bg-slate-700 text-white rounded-[25px]" type="button">
                               View Country Shipping
                              </button>
                          </a> </td>
                          </tr>

                          
                          <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="vertically_center<?php echo e($key); ?>" tabindex="-1" aria-labelledby="vertically_center" aria-hidden="true">
                            <div class="modal-dialog top-1/2 !-translate-y-1/2 relative w-auto pointer-events-none">
                              <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding
                              rounded-md outline-none text-current">
                                <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                                  <!-- Modal header -->
                                  <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
                                    <h3 class="text-xl font-medium text-white dark:text-white capitalize">
                                      <?php echo e($values->name); ?>

                                    </h3>
                                    <button type="button" class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center
                                          dark:hover:bg-slate-600 dark:hover:text-white" data-bs-dismiss="modal">
                                      <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10
                                                  11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                      </svg>
                                      <span class="sr-only">Close modal</span>
                                    </button>
                                  </div>
                                  <!-- Modal body -->
                                  <form action="<?php echo e(route('admin.shipping.update')); ?>" method="post" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                  <div class="p-6 space-y-4">
                                        <div class="input-area mb-4">
                                            <label for="name" class="form-label">Name</label>
                                            <input id="name" name="name" type="text" class="form-control" value="<?php echo e($values->name); ?>" required placeholder="Shipping Name">
                                        </div>
                                        <input type="hidden" name="shipping_id" value="<?php echo e($values->id); ?>">
                                  </div>
                                  <!-- Modal footer -->
                                  <div class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-800">
                                    <button type="submit" data-bs-dismiss="modal" class="btn inline-flex justify-center text-white bg-slate-500">Update</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                          
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

<?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customstegpearl/public_html/root/resources/views/admin/shipping/list.blade.php ENDPATH**/ ?>