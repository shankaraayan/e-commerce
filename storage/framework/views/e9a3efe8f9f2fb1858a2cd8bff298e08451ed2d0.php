<?php $__env->startSection('style'); ?>
<style>
  tr {
      cursor: auto!important;
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
                  <iconify-icon icon="heroicons-outline:chevron-right" class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
                </a>
              </li>
               <a href="<?php echo e(route('admin')); ?>">
              <li class="inline-block relative text-sm text-primary-500 font-Inter ">
                Dashboard
                <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
              </li></a>
              <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                Users</li>
            </ul>
          </div>
          <!-- END: BreadCrumb -->


          <div class=" space-y-5">

            <div class="card">
              <header class=" card-header noborder">
                <h4 class="card-title">User List
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
                              #
                            </th>

                            <th scope="col" class=" table-th ">
                              Name
                            </th>

                            <th scope="col" class=" table-th ">
                              Email
                            </th>
                            <th scope="col" class=" table-th ">
                              Status
                            </th>
                            <th scope="col" class=" table-th ">
                              Register
                            </th>
                            <th scope="col" class=" table-th ">
                                Action
                            </th>


                          </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="table-td"><?php echo e($key+1); ?></td>
                                <td class="table-td"><?php echo e($user->name); ?></td>
                                <td class="table-td "><?php echo e($user->email); ?></td>
                                <td class="table-td">
                                <?php if($user->email_verified_at): ?>
                                    <span class="badge bg-success-500 text-success-500 bg-opacity-30 capitalize">Active</span>
                                <?php else: ?> 
                                    <span class="badge bg-success-500 text-danger-500 bg-opacity-30 capitalize">In active</span>
                                <?php endif; ?>
                                </td>
                                <td class="table-td "><?php echo e(date('d-M-Y',strtotime($user->created_at))); ?></td>

                                <td class="table-td ">
                                <div class="flex space-x-3 rtl:space-x-reverse">
                                    <a href="view/<?php echo e($user->id); ?>">
                                        <button class="action-btn" type="button">
                                            <iconify-icon icon="heroicons:eye"></iconify-icon>
                                        </button>
                                    </a>
                                   
                                    <a href=""> 
                                        <button class="bg-blue-500 text-white px-2 py-1 rounded-md text-sm">
                                            Total Order
                                            <span class=" top-0 right-0 bg-red-500 text-white px-1 py-1 rounded-full text-xs"><?php echo e($user->orders_count); ?></span>
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

<?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customstegpearl/public_html/root/resources/views/admin/users/view.blade.php ENDPATH**/ ?>