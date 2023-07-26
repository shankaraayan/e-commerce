<?php $__env->startComponent('mail::message'); ?>
# Password Reset
Hello <?php echo e($user->name); ?>,
We received a request to reset the password for your account. If you made this request, please click on the following link to reset your password:

<?php $__env->startComponent('mail::button', ['url' => $resetPasswordLink]); ?>

Reset
<?php echo $__env->renderComponent(); ?>

If you did not request a password reset, no further action is required. The password for your account remains unchanged..

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/customstegpearl/public_html/root/resources/views/emails/password-reset.blade.php ENDPATH**/ ?>