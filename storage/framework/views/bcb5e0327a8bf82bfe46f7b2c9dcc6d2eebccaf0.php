<?php $__env->startSection('content'); ?>
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
                Settings
                <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
              </li>
              <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                Slider</li>
            </ul>
          </div>
          <!-- END: BreadCrumb -->


          <div class=" space-y-5">

            <div class="card">
              <header class=" card-header noborder">
                <h4 class="card-title">Slider List
                </h4>
                <a href="<?php echo e(route('admin.settings.slider.add')); ?>"> <button type="button" class="btn bg-slate-800 text-white" style="float:right;"> Add Slider </button></a>
              </header>
              <div class="card-body px-6 pb-6">
                <div class="overflow-x-auto -mx-6 dashcode-data-table">
                  <span class=" col-span-8  hidden"></span>
                  <span class="  col-span-4 hidden"></span>
                  <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden ">
                      <table id="shorting-table" class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table">
                        <thead class=" bg-slate-200 dark:bg-slate-700">
                          <tr>

                            <th scope="col" class=" table-th ">
                              Id
                            </th>
                            <th scope="col" class=" table-th ">
                              Serial
                            </th>

                            <th scope="col" class=" table-th ">
                              Image
                            </th>
                            <th scope="col" class=" table-th ">
                              Location
                            </th>

                            <th scope="col" class=" table-th ">
                              Url
                            </th>
                             <th scope="col" class=" table-th ">
                              Status
                            </th>
                            <th scope="col" class=" table-th ">
                                Action
                              </th>
                          </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                              <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                              <tr data-id="<?php echo e($slider->id); ?>" id="row_1"  data-name="sliders" >
                            <td class="table-td"><?php echo e(++$key); ?></td>
                            <td class="table-td ">
                             <?php echo e($slider->serial); ?>

                          </td>
                            
                            <td class="table-td ">

                                    <img width="150" src="<?php echo e(asset('root/public/uploads/sliders/phone/'.$slider->phone)); ?>" />
                               

                            </td>
                            <td class="table-td">
                            <?php if(@$slider->global_banner == '0'): ?>
                               Slider
                            <?php else: ?>
                                Global Banner
                            <?php endif; ?>
                            </td>
                            <td class="table-td ">
                              <a target="_blank" href="<?php echo e(asset('root/public/uploads/sliders/phone/' . $slider->phone)); ?>">
                                <?php echo e(asset('root/public/uploads/sliders/phone/' . $slider->phone)); ?>

                              </a>
                            </td>
                           <td class="table-td">
                                <?php if(@$slider->status): ?>
                                <span class="badge bg-success-500 text-success-500 bg-opacity-30 capitalize">Active</span>
                                <?php else: ?>
                                    <span class="badge bg-danger-500 text-danger-500 bg-opacity-30 capitalize">in active</span>
                                <?php endif; ?>

                           </td>
                            <td class="table-td ">
                              <div class="flex space-x-3 rtl:space-x-reverse">
                              <!-- <a href="#">
                                  <button class="action-btn" type="button">
                                    <iconify-icon icon="heroicons:eye"></iconify-icon>
                                  </button>
                              </a> -->
                              <a href="<?php echo e(route('admin.settings.slider.edit_slider',$slider->id)); ?>">
                                  <button class="action-btn" type="button">
                                    <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                  </button>
                              </a>

                                <a  onclick="return confirm('Are you sure. you want to delete?')" href="<?php echo e(route('admin.settings.slider.delete',$slider->id)); ?>">
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

<?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customstegpearl/public_html/root/resources/views/admin/settings/sliders.blade.php ENDPATH**/ ?>