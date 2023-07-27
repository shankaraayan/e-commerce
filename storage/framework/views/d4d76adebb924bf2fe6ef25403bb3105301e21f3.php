<?php $__env->startSection('content'); ?>
    <style>
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
                                </li>
                            </a>
                            <a href="<?php echo e(route('admin.category.list')); ?>">
                                <li class="inline-block relative text-sm text-primary-500 font-Inter">
                                    Taxation
                                    <iconify-icon icon="heroicons-outline:chevron-right"
                                        class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
                                </li>
                            </a>
                            <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                                Add Country</li>
                        </ul>
                    </div>
                    <!-- END: BreadCrumb -->
                    <form action="<?php echo e(route('admin.taxation.store')); ?>" method="post" enctype="multipart/form-data"
                        id="multipleValidation">
                        <?php echo csrf_field(); ?>
                        <div class="grid xl:grid-cols-2 flex gap-6">
                            <!-- Basic Inputs -->
                            <div class="w-3/5">
                                <div class="card">
                                    <div class="card-body flex flex-col p-6">
                                        <header
                                            class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                                            <div class="flex-1">
                                                <div class="card-title text-slate-900 dark:text-white">New Country</div>
                                            </div>
                                        </header>
                                        <div class="card-text h-full space-y-4">

                                            <div>


                                                <div class="input-area mb-4">
                                                    <label for="price" class="form-label">Tax (%)</label>
                                                    <input name="vat_tax" type="number" class="form-control"
                                                        placeholder="e.g. 10" value=<?php echo e(old('vat_tax')); ?> required>
                                                    <?php if(session()->has('country_error')): ?>
                                                        <?php $__errorArgs = ['vat_tax'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="text-danger"><?php echo e($message); ?></span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="input-area mb-4">
                                                    <label for="price" class="form-label">Country</label>
                                                    <input name="country" type="text" class="form-control"
                                                        placeholder="Germany" value="<?php echo e(old('country')); ?>" required ="required">
                                                    <?php if(session()->has('country_error')): ?>
                                                        <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="text-danger"><?php echo e($message); ?></span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="input-area mb-4">
                                                    <label for="price" class="form-label">Country Short Code</label>
                                                    <input name="short_code" type="text" class="form-control"
                                                        placeholder="DE" value="<?php echo e(old('short_code')); ?>" required ="required">
                                                    <?php if(session()->has('country_error')): ?>
                                                        <?php $__errorArgs = ['short_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="text-danger"><?php echo e($message); ?></span>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="input-area mb-4">
                                                    <button type="submit" class="btn text-white bg-slate-800">Create</button>
                                                </div>


                                                
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customstegpearl/public_html/root/resources/views/admin/tax/add.blade.php ENDPATH**/ ?>