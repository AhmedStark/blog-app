<?php $__env->startSection("content"); ?>

<?php if(session('snackbar')===null): ?>

    <post-page id="<?php echo e($post->id); ?>" :comments="<?php echo e(json_encode($comments)); ?>" title="<?php echo e($post->title); ?>" content="<?php echo e($post->content); ?>"></post-page>

<?php else: ?>

    <post-page snackbar-passed-content="<?php echo e(session('snackbar')); ?>" snackbar-status id="<?php echo e($post->id); ?>" :comments="<?php echo e(json_encode($comments)); ?>" title="<?php echo e($post->title); ?>" content="<?php echo e($post->content); ?>"></post-page>

<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("apptemplate", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ahmed/Desktop/blog-app/resources/views/post-page.blade.php ENDPATH**/ ?>