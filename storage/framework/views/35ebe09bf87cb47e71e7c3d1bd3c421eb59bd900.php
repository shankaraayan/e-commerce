

<?php $__env->startSection("title"); ?>
Passwort zurücksetzen
<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>
<div class="ps-account">
            <div class="container py-6 py-5">
                <div class="row">
                    <div class="col-12 col-md-6 offset-md-3">
                        <div class="card shadow-sm border-0 px-4">
                            <form action="<?php echo e(route('password-reset')); ?>" method="post">
                            
                                <?php echo csrf_field(); ?>
                                <div class="ps-form--review">
                                <input type="hidden" name="id" value="<?php echo e($user[0]['id']); ?>">
                                    <h2 class="ps-form__title">Passwort zurücksetzen</h2>
                                    <div class="ps-form__group">
                                        <label class="ps-form__label">neues Passwort</label>
                                        <input class="form-control ps-form__input" type="password" name="password" value="<?php echo e(old('password')); ?>">
                                            <?php $__errorArgs = ['password'];
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
                                    <div class="ps-form__group">
                                        <label class="ps-form__label">Passwort bestätigen</label>
                                        <input class="form-control ps-form__input" type="password" name="password_confirmation" value="<?php echo e(old('password_confirmation')); ?>">
                                            <?php $__errorArgs = ['confirm-password'];
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
                                        <button type="submit" class="ps-btn ps-btn--warning">Zurücksetzen</button>
                                    </div>
                                    <a class="ps-account__link" href="<?php echo e(route('login')); ?>">Sie haben bereits ein Konto. Bitte hier anmelden</a>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layout.Layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customstegpearl/public_html/root/resources/views/auth/reset-password.blade.php ENDPATH**/ ?>