<?php $__env->startSection("content"); ?>




<feed-page

<?php if(Sentinel::getUser() !== null): ?>

    <?php if(Sentinel::getUser()->inRole("admin")): ?>
        admin
    <?php endif; ?>

<?php endif; ?>


<?php if(session('snackbar')!==null): ?>
    snackbar-passed-content="<?php echo e(session('snackbar')); ?>"
    snackbar-status
<?php endif; ?>

:posts="<?php echo e(json_encode($posts)); ?>"
></feed-page>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("apptemplate", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ahmed/Desktop/blog-app/resources/views/main.blade.php ENDPATH**/ ?>