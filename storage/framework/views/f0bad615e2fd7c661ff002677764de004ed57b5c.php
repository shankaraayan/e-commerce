<?php $__env->startSection("title"); ?>
Forgot password
<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>
<div class="ps-account">
            <div class="container py-5">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <form action="<?php echo e(route('forget-password')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="ps-form--review">
                                <h2 class="ps-form__title">Forgot Password</h2>
                                <div class="ps-form__group">
                                    <label class="ps-form__label">Email address *</label>
                                    <input class="form-control ps-form__input" type="email" name="email" value="<?php echo e(old('email')); ?>">
                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="ps-form__submit">
                                    <button type="submit" class="ps-btn ps-btn--warning">Forgot</button>
                                </div>
                                <a class="ps-account__link" href="<?php echo e(route('login.register')); ?>">You already have an account. Please login here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('Layout.Layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customstegpearl/public_html/root/resources/views/pages/forgot_password.blade.php ENDPATH**/ ?>