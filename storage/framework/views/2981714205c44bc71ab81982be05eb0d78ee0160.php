<?php $__env->startSection("content"); ?>
<?php if(session('response')!==null): ?>
    <create-post-form response="<?php echo e(session('response')); ?>">
        <div slot="content">

            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
            <?php endif; ?>

        </div>
    </create-post-form>
<?php else: ?>
    <create-post-form >
    <div slot="content">

            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
            <?php endif; ?>

        </div>
    </create-post-form>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("apptemplate", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ahmed/Desktop/blog-app/resources/views/create-post.blade.php ENDPATH**/ ?>