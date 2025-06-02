
<?php $__env->startSection('head'); ?>
    <link href="<?php echo e(asset('module/user/css/user.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <h3 class="title py-4">
        <?php echo e(__("Change Password")); ?>

    </h3>
    <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <form action="<?php echo e(route("user.change_password.update")); ?>" method="post" class="default-form pb-4">
        <?php echo csrf_field(); ?>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-title"><strong><?php echo e(__('Change Password')); ?></strong></div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label><?php echo e(__("Current Password")); ?></label>
                            <input type="password" name="current-password" placeholder="<?php echo e(__("Current Password")); ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label><?php echo e(__("New Password")); ?></label>
                            <input type="password" name="new-password" placeholder="<?php echo e(__("New Password")); ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label><?php echo e(__("New Password Again")); ?></label>
                            <input type="password" name="new-password_confirmation" placeholder="<?php echo e(__("New Password Again")); ?>" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <hr>
                <input type="submit" class="btn btn-primary" value="<?php echo e(__("Change Password")); ?>">
                <a href="<?php echo e(route("user.profile.index")); ?>" class="btn btn-default"><?php echo e(__("Cancel")); ?></a>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/prolydnj/jobsning.com/modules/User/Views/frontend/changePassword.blade.php ENDPATH**/ ?>