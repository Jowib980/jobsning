

<?php $__env->startSection('content'); ?>

    <div class="page-profile-content page-template-content page-all-services">
        <?php echo $__env->make('Layout::parts.bc', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="container">
            <div class="">
                <div class="row">
                    <div class="col-md-4">
                        <?php echo $__env->make('User::frontend.profile.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-md-8">
                        <?php if(view()->exists(ucfirst($type).'::frontend.profile.service')): ?>
                            <?php echo $__env->make(ucfirst($type).'::frontend.profile.service',['view_all'=>1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jobsning\modules\User\Views\frontend\profile\all-services.blade.php ENDPATH**/ ?>