

<?php $__env->startSection('content'); ?>
    <div class="blog-single">
        <div class="auto-container">
            <div class="row">
                <div class="col-md-4">
                    <?php echo $__env->make('Gig::frontend.seller.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-md-8">
                    <?php echo $__env->make('Gig::frontend.seller.order', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jobsning\modules\Job\Views\frontend\seller\dashboard.blade.php ENDPATH**/ ?>