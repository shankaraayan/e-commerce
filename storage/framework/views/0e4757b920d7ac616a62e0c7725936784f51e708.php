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
                    <a href="<?php echo e(route('admin.category.list')); ?>">
                    <li class="inline-block relative text-sm text-primary-500 font-Inter">
                      Categories
                      <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
                      </li></a>
                      <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                      Edit Category</li>
                  </ul>
                </div>
                <!-- END: BreadCrumb -->
                <div class="grid xl:grid-cols-1 grid-cols-1 gap-6">
                  <!-- Basic Inputs -->
                  <div class="card">
                    <div class="card-body flex flex-col p-6">
                      <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                          <div class="card-title text-slate-900 dark:text-white">Edit Category</div>
                        </div>
                      </header>
                      <div class="card-text h-full space-y-4">
                        <form action="<?php echo e(route('admin.category.update',$category->id)); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="input-area mb-4">
                            <label for="name" class="form-label">Name</label>
                            <input value="<?php echo e($category->name); ?>" id="name" name="name" type="text" class="form-control" placeholder="Category Name">
                        </div>

                        <div class="input-area mb-4">
                            <label for="name" class="form-label">Parent Category</label>
                            <?php
                                use \App\Models\admin\Category;
                                $result = Category::where('id','!=',$category->id)->get();
                            ?>

                            <select name="parent_cat" class="form-control">
                                <option value="0">Select</option>
                                <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($cat->id); ?>" 
                                        <?php
                                            $selectedID = $category->where('id',$category->parent_id)->pluck('id')->first();
                                            if($cat->id == $selectedID) echo "selected";
                                        ?>
                                        ><?php echo e($cat->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="input-area mb-4">
                                <label for="slug" class="form-label">Slug</label>
                                <input name="slug" type="text" class="form-control" placeholder="slug" value="<?php echo e($category->slug); ?>">
                            </div>
                            <div class="input-area mb-4">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="description" rows="5" class="form-control" placeholder="Description"><?php echo e($category->description); ?>

                                </textarea>
                            </div>
                            <div class="input-area mb-4">
                                  <label for="description" class="form-label">Category Image</label>
                                  <input type="file" name="category_image">
                            </div>
                            <div class="input-area mb-4">
                                <img width="100" src="<?php echo e(asset('root/public/uploads/category/'.$category->image)); ?>" />
                            </div>
                            <div class="input-area mb-4">
                                  <label for="description" class="form-label">Banner Image</label>
                                  <input type="file" name="banner">
                            </div>
                            <div class="input-area mb-4">
                                <img width="100" src="<?php echo e(asset('root/public/uploads/category/'.$category->banner)); ?>" />
                            </div>
                            <div class="input-area mb-4">
                                <label for="description" class="form-label">Show on Header Menu ?</label>
                                <input type="checkbox" name="heading" value="1" <?php echo e($category->header ? 'checked' : ''); ?>>
                            </div>
                            <div class="input-area mb-4">
                                <label for="description" class="form-label">Show on Catalog Page ?</label>
                                <input type="checkbox" name="on_catalog" value="1" <?php echo e($category->on_catalog ? 'checked' : ''); ?>>
                            </div>
                            <div class="input-area mb-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>


                      </div>
                    </div>
                  </div>

                </div>

              </div>
            </div>
          </div>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customstegpearl/public_html/root/resources/views/admin/category/edit.blade.php ENDPATH**/ ?>