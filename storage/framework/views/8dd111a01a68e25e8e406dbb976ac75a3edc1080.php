<?php $__env->startSection('dasboard_content'); ?>
<div class="accountInfo_section g-0 px-0">
              <div class="dash_title text-uppercase border-bottom pb-3 mb-4 fs-3 fw-600">Konto Details</div>
              <form method="post" action="<?php echo e(route('update_profile',Auth::user()->id)); ?>">
                <?php echo csrf_field(); ?>
                <div class="row">
                  <div class="col">
                    <div class="form-floating mb-3">
                      <label class="text-muted p" for="floatingInput">Name <sup class="text-danger">*</sup></label>

                      <input name="name" type="text" value="<?php echo e(Auth::user()->name); ?>" class="form-control input shadow-none" id="floatingInput" placeholder="name" />
                       <?php $__errorArgs = ['name'];
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
                  </div>
                  <div class="col">
                    <div class="form-floating mb-3">
                      <label class="text-muted p" for="floatingInput">Telefon <sup class="text-danger">*</sup></label>
                      <input name="phone" type="text" value="<?php echo e(Auth::user()->phone); ?>" class="form-control input shadow-none" id="floatingInput" placeholder="phone" />
                       <?php $__errorArgs = ['phone'];
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
                  </div>
                </div>
                <div class="row">
                 
                  <div class="col-12">
                    <div class="form-floating mb-3">
                      <input name="email" disabled type="email" value="<?php echo e(Auth::user()->email); ?>" class="form-control input shadow-none" id="floatingInput" placeholder="name@example.com" />
                      <label class="text-muted p" for="floatingInput">E-Mail Adresse <sup class="text-danger">*</sup>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <button type="submit" id="update_profile" class="ps-btn ps-btn--warning mt-3">Update</button>
                  </div>
                  <div id="profile_notice"></div>
                </div>
              </form>
              <div class="dash_change_pass mt-4 border mx-xl-3 mx-lg-3 mx-md-3 mx-1 p-4">
                <div class="dash_title text-uppercase border-bottom pb-3 mb-4 h6"> Passwort ändern </div>
                <form method="post" action="<?php echo e(route('change_password',Auth::user()->id)); ?>"> <?php echo csrf_field(); ?> <div class="row">
                    <div class="col-12">
                        <div class="form-floating mb-3">
                            <label class="text-muted p" for="floatingInput">Current password (Leave blank for no changes)</label>
                            <input name="current_password" type="password" class="form-control shadow-none" id="current_password" placeholder="Current password" />
                        </div>
                        <?php $__errorArgs = ['current_password'];
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
                    <div class="col-12">
                      <div class="form-floating mb-3">
                      <label class="text-muted p" for="new_password">Neues Passwort (leer lassen, wenn keine Änderungen vorgenommen werden)</label>
                        <input name="new_password" type="password" class="form-control input shadow-none" id="new_password" placeholder="New password" />
                        <?php $__errorArgs = ['new_password'];
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
                    </div>
                    <div class="col-12">
                      <div class="form-floating">
                      <label class="text-muted p" for="floatingPassword">Neues Passwort bestätigen</label> <?php $__errorArgs = ['new_password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <input type="password" class="form-control input shadow-none" name="new_password_confirmation" placeholder="Confirm New password" />
                      </div>
                    </div>
                  </div>
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <button id="change_password" type="submit" class="ps-btn ps-btn--warning mt-3">Passwort ändern</button>
                    </div>
                    <div id="notice"></div>
                  </div>
                </form>
              </div>
            </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customstegpearl/public_html/root/resources/views/user/profile/account.blade.php ENDPATH**/ ?>