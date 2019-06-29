<?php $__env->startSection("content"); ?>
<?php if(session('snackbar')===null): ?>
    <feed-page :posts="<?php echo e(json_encode($posts)); ?>"></feed-page>
<?php else: ?>
    <feed-page snackbar-passed-content="<?php echo e(session('snackbar')); ?>" snackbar-status :posts="<?php echo e(json_encode($posts)); ?>"></feed-page>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("apptemplate", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ahmed/Desktop/blog-app/resources/views/main.blade.php ENDPATH**/ ?>