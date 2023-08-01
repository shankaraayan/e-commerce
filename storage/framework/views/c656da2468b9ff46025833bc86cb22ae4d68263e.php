<?php $__env->startSection("title"); ?>
Register
<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>
<div class="ps-account mt-70">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <form action="<?php echo e(route('login')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="ps-form--review">
                                <h2 class="ps-form__title">Einloggen</h2>
                                <div class="ps-form__group">
                                    <label class="ps-form__label">Benutzername oder E-Mail Adresse *</label>
                                    <input class="form-control ps-form__input" type="email" name="email" value="<?php echo e(old('email')); ?>">
                                    <?php if(session()->has('login_error')): ?>
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
                                     <?php endif; ?>
                                </div>
                                <div class="ps-form__group">
                                    <label class="ps-form__label">Passwort *</label>
                                    <div class="input-group">
                                        <input class="form-control ps-form__input" type="password" name="password" value="<?php echo e(old('password')); ?>">
                                        <div class="input-group-append"><a class="fa fa-eye-slash toogle-password" href="javascript: void(0);"></a></div>
                                    </div>
                                    <?php if(session()->has('login_error')): ?>
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
                                     <?php endif; ?>
                                </div>
                                <div class="ps-form__submit">
                                    <button class="ps-btn ps-btn--warning">Einloggen</button>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember">
                                        <label class="form-check-label" for="remember">Erinnern Sie sich an mich</label>
                                    </div>
                                </div><a class="ps-account__link" href="<?php echo e(route('forget-password')); ?>">Haben Sie Ihr Passwort vergessen?</a>
                            </div>
                        </form>
                    </div>
                    <div class="col-12 col-md-6">
                        <form action="<?php echo e(route('register')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="ps-form--review">
                                <h2 class="ps-form__title">Register</h2>
                                <div class="ps-form__group">
                                    <label class="ps-form__label">E-Mail Adresse *</label>
                                    <input class="form-control ps-form__input" type="email" name="email" value="<?php echo e(old('email')); ?>">

                                    <?php if(session()->has('signup_error')): ?>
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
                                     <?php endif; ?>
                                </div>
                                <div class="ps-form__group">
                                    <label class="ps-form__label">Passwort *</label>
                                    <div class="input-group">
                                        <input class="form-control ps-form__input" type="password" name="password" value="<?php echo e(old('password')); ?>">
                                        <div class="input-group-append"><a class="fa fa-eye-slash toogle-password" href="javascript: void(0);"></a></div>
                                    </div>
                                    <?php if(session()->has('signup_error')): ?>
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
                                     <?php endif; ?>

                                    <p class="ps-form__text">Hinweis: Das Passwort sollte mindestens 8 Zeichen lang sein. Um es sicherer zu machen, verwenden Sie Groß- und Kleinbuchstaben, Zahlen und Symbole wie ! " ? $ % ^ & ).</p>
                                </div>
                                <div class="ps-form__submit">
                                    <button class="ps-btn ps-btn--warning">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('Layout.Layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customstegpearl/public_html/root/resources/views/pages/login-register.blade.php ENDPATH**/ ?>