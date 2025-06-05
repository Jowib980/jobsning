
<?php $__env->startSection('title','Resume'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar"><?php echo e(__("Build Your Resume")); ?></h1>
            <div class="title-actions">
                <a href="<?php echo e(route('user.admin.create', ['candidate_create' => 1])); ?>" class="btn btn-primary"><?php echo e(__("Upload Resume")); ?></a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-title">
                        <strong>Personal Information</strong>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(__("First Name")); ?></label>
                                    <input type="text" value="<?php echo e(old('first_name',@$candidate->first_name)); ?>" name="first_name" placeholder="<?php echo e(__("First Name")); ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(__("Last Name")); ?></label>
                                    <input type="text" value="<?php echo e(old('last_name',@$candidate->last_name)); ?>" name="last_name" placeholder="<?php echo e(__("Last Name")); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="file" class="form-control" name="profile_picture" style="border-radius:50%; width:50%;">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><?php echo e(__("Profile Title")); ?></label>
                                    <input type="text" value="<?php echo e(old('profile',@$candidate->profile)); ?>" name="profile" placeholder="<?php echo e(__("Profile Title")); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><?php echo e(__("About")); ?></label>
                                    <div class="input-group">
                                        <textarea name="about" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7\htdocs\jobsning\modules/Candidate/Views/admin/resume/index.blade.php ENDPATH**/ ?>