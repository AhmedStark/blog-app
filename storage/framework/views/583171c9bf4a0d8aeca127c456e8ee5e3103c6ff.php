<?php $__env->startSection("content"); ?>

<?php if(session('response')!==null): ?>

    <login-form response="<?php echo e(session('response')); ?>"></login-form>
<?php else: ?>

    <login-form ></login-form>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("apptemplate", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ahmed/Desktop/blog-app/resources/views/login.blade.php ENDPATH**/ ?>