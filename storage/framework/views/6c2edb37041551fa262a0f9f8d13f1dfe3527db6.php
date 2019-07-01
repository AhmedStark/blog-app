<?php $__env->startSection("content"); ?>
<br>

<?php if(session('response')!==null): ?>

    <create-user-form response="<?php echo e(session('response')); ?>"></create-user-form>
<?php else: ?>
    <create-user-form></create-user-form>

<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("apptemplate", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ahmed/Desktop/blog-app/resources/views/create-user.blade.php ENDPATH**/ ?>