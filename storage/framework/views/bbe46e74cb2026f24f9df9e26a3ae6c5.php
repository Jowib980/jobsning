
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar"><?php echo e(__("Shortlisted Candidates")); ?></h1>
        </div>
        <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="filter-div d-flex justify-content-between ">
            <div class="col-left">
                <?php if(!empty($rows)): ?>
                    <form method="post" action="<?php echo e(url('admin/module/job/bulkEdit')); ?>" class="filter-form filter-form-left d-flex justify-content-start">
                        <?php echo e(csrf_field()); ?>

                        <select name="action" class="form-control">
                            <option value=""><?php echo e(__(" Bulk Actions ")); ?></option>
                            <option value="publish"><?php echo e(__(" Publish ")); ?></option>
                            <option value="draft"><?php echo e(__(" Move to Draft ")); ?></option>
                            <option value="delete"><?php echo e(__(" Delete ")); ?></option>
                        </select>
                        <button data-confirm="<?php echo e(__("Do you want to delete?")); ?>" class="btn-default btn btn-icon dungdt-apply-form-btn" type="button"><?php echo e(__('Apply')); ?></button>
                    </form>
                <?php endif; ?>
            </div>
            
        </div>
        <div class="text-right">
            <p><i><?php echo e(__('Found :total items',['total'=>$rows->total()])); ?></i></p>
        </div>
                <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="container mb-4">
                        <div class="card shadow p-4">
                            <div class="d-flex justify-content-between align-items-start">
                              <div>
                                <h5><strong><?php echo e($row->candidateInfo->getAuthor->getDisplayName() ?? ''); ?></strong> <?php if($row->candidateInfo->title): ?>(<span class="text-muted"><?php echo e($row->candidateInfo->title ?? ''); ?></span>) <?php endif; ?></h5>
                                <p class="mb-1"><?php echo e($row->candidateInfo->location ?? ''); ?> </p>
                                <p class="text-muted">Total work experience: <?php echo e($row->candidateInfo->experience_year); ?></p>
                              </div>
                              <div class="text-end">
                                <p class="text-muted">Applied<br><strong><?php echo e(display_date($row->updated_at)); ?></strong></p>
                              </div>
                            </div>

                            <hr>

                            <?php
                                $experiences = is_array($row->candidateInfo->experience) 
                                    ? $row->candidateInfo->experience 
                                    : json_decode($row->candidateInfo->experience, true);
                                $education = is_array($row->candidateInfo->education) 
                                    ? $row->candidateInfo->education
                                    : json_decode($row->candidateInfo->education, true);
                                $skills = is_array($row->candidateInfo->skills)
                                    ? $row->candidateInfo->skills
                                    : json_decode($row->candidateInfo->skills, true);
                            ?>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h6><strong>EXPERIENCE</strong></h6>
                                    </div>
                                    <div class="col-md-8">
                                        <?php if(!empty($experiences)): ?>
                                            <?php $__currentLoopData = $experiences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <p>
                                                    <strong><?php echo e($exp['position'] ?? ''); ?> at <?php echo e($exp['location'] ?? ''); ?></strong><br>
                                                    <?php echo e($exp['from'] ?? ''); ?> – <?php echo e($exp['to'] ?? ''); ?>

                                                </p>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <p>No experience data available.</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h6><strong>EDUCATION</strong></h6>
                                    </div>
                                    <div class="col-md-8">
                                         <?php if(!empty($education)): ?>
                                            <?php $__currentLoopData = $education; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $edu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <p>
                                                    <strong><?php echo e($edu['reward'] ?? ''); ?></strong><?php echo e($edu['from'] ?? ''); ?> – <?php echo e($edu['to'] ?? ''); ?><br>
                                                    <?php echo $edu['location'] ?? ''; ?>

                                                </p>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <p>No education data available.</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h6><strong>SKILL(S)</strong></h6>
                                    </div>
                                    <div class="col-md-8">
                                        <?php if(!empty($skills)): ?>
                                            <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <span class="px-3 py-1 rounded-pill bg-info bg-opacity-10 fw-semibold" style="color: white;font-weight: bold;"><?php echo e($skill['name'] ?? ''); ?></span>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <p>No skill data available.</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="d-flex justify-content-between align-items-center">
                                <a href="/candidate/<?php echo e($row->candidateInfo->slug); ?>" target="_blank">View Full Application</a>
                              <div>
                                <a href="<?php echo e(route('job.admin.applicants.changeStatus', ['status' => 'rejected', 'id' => $row->id])); ?>"><button class="btn btn-outline-danger btn-action">Not interested</button></a>
                                <a href="<?php echo e(route('job.admin.applicants.changeStatus', ['status' => 'hired', 'id' => $row->id])); ?>"><button class="btn btn-outline-primary btn-action">Hire</button></a>
                            </div>
                          </div>
                    </div>
                </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php echo e($rows->appends(request()->query())->links()); ?>

            
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jobsning\modules\Job\Views\admin\job\shortlisted.blade.php ENDPATH**/ ?>