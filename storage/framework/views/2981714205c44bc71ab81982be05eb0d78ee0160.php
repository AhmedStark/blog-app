<?php $__env->startSection("content"); ?>
<?php if(session('response')!==null): ?>
    <create-post-form response="<?php echo e(session('response')); ?>"></create-post-form>
<?php else: ?>
    <create-post-form ></create-post-form>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("apptemplate", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ahmed/Desktop/blog-app/resources/views/create-post.blade.php ENDPATH**/ ?>