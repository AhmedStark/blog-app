<?php $__env->startSection("content"); ?>





<post-page id="<?php echo e($post->id); ?>" :comments="<?php echo e(json_encode($comments)); ?>" title="<?php echo e($post->title); ?>" content="<?php echo e($post->content); ?>"

<?php if(Sentinel::getUser() !== null): ?>
    checklogin
    <?php if(Sentinel::getUser()->inRole("admin")): ?>
        admin
    <?php endif; ?>
<?php endif; ?>




<?php if(session('snackbar')!==null): ?>
    snackbar-passed-content="<?php echo e(session('snackbar')); ?>"
    snackbar-status
<?php endif; ?>
></post-page>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("apptemplate", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ahmed/Desktop/blog-app/resources/views/post-page.blade.php ENDPATH**/ ?>