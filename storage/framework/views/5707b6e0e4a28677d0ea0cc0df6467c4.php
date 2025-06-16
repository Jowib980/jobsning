
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="d-flex justify-content-between mb-3">
        <h1 class="title-bar"><?php echo e(__("Jobs Overview")); ?></h1>
    </div>

    <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Toggle Buttons -->
    <div class="d-flex justify-content-center mb-4">
        <a href="?tab=internship" class="btn btn-outline-primary mx-2 <?php echo e(request()->get('tab', 'internship') === 'internship' ? 'active' : ''); ?>">
            Internships
        </a>
        <a href="?tab=job" class="btn btn-outline-primary mx-2 <?php echo e(request()->get('tab') === 'job' ? 'active' : ''); ?>">
            Jobs
        </a>
    </div>

    <!-- Internship Table -->
    <?php if(request()->get('tab', 'internship') === 'internship'): ?>
        <div class="card shadow-sm p-3 mb-5 bg-white rounded">
            <h3 class="text-center">Internships</h3>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th><?php echo e(__('Internship Title')); ?></th>
                        <th><?php echo e(__('Status')); ?></th>
                        <th><?php echo e(__('Views')); ?></th>
                        <th><?php echo e(__('Applicants')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $internships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $internship): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($internship->title); ?></td>
                                <td>
                                    <?php
                                        $badgeClass = 'badge-';
                                        $customStyle = '';
                                        if ($internship->status === 'pause') {
                                            $customStyle = 'background-color: #f3af33; color: white;';
                                        } elseif ($internship->status === 'closed') {
                                            $customStyle = 'background-color: #f13434; color: white;';
                                        } else {
                                            $badgeClass .= $internship->status;
                                        }
                                    ?>
                                    <span class="badge <?php echo e($badgeClass); ?>" style="<?php echo e($customStyle); ?>">
                                        <?php echo e($internship->status); ?>

                                    </span>
                                </td>
                                <td><button class="btn btn-success" style="cursor: not-allowed !important;">Views (<?php echo e($internship->views_count); ?>)</button></td>
                                <td>
                                    <a href="<?php echo e(route('job.admin.allApplicants', ['job_id' => $internship->id])); ?>" class="btn btn-info text-white">
                                        Applicants (<?php echo e($internship->applications_count); ?>)
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                <?php echo e($internships->appends(request()->query())->links()); ?>

            </div>
        </div>
    <?php endif; ?>

    <!-- Job Table -->
    <?php if(request()->get('tab') === 'job'): ?>
        <div class="card shadow-sm p-3 mb-5 bg-white rounded">
            <h3 class="text-center">Jobs</h3>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th><?php echo e(__('Job Title')); ?></th>
                        <th><?php echo e(__('Status')); ?></th>
                        <th><?php echo e(__('Views')); ?></th>
                        <th><?php echo e(__('Applicants')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($job->title); ?></td>
                                <td>
                                    <?php
                                        $badgeClass = 'badge-';
                                        $customStyle = '';
                                        if ($job->status === 'pause') {
                                            $customStyle = 'background-color: #f3af33; color: white;';
                                        } elseif ($job->status === 'closed') {
                                            $customStyle = 'background-color: #f13434; color: white;';
                                        } else {
                                            $badgeClass .= $job->status;
                                        }
                                    ?>
                                    <span class="badge <?php echo e($badgeClass); ?>" style="<?php echo e($customStyle); ?>">
                                        <?php echo e($job->status); ?>

                                    </span>
                                </td>
                                <td><button class="btn btn-success" style="cursor: not-allowed !important;">Views (<?php echo e($job->views_count); ?>)</button></td>
                                <td>
                                    <a href="<?php echo e(route('job.admin.allApplicants', ['job_id' => $job->id])); ?>" class="btn btn-info text-white">
                                        Applicants (<?php echo e($job->applications_count); ?>)
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                <?php echo e($jobs->appends(request()->query())->links()); ?>

            </div>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jobsning\modules/Job/Views/admin/job/overview.blade.php ENDPATH**/ ?>