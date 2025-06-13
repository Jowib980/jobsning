
<?php $__env->startSection('title','Resume'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar"><?php echo e(__("User Profile")); ?></h1>
            <div class="title-actions">
                <a href="<?php echo e(route('candidate.admin.resume.edit', $data->candidate_id)); ?>" class="btn btn-primary"><?php echo e(__("Edit Resume")); ?></a>
                 <a href="<?php echo e(route('candidate.admin.resume.download')); ?>" class="btn btn-primary"><?php echo e(__("Download")); ?></a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <div class="row">
                        <div class="col-md-4 p-4" style="background-color: black; color: white;">
                            <div class="profile-pic" style="padding: 10px;">
                                <img src="<?php echo e($data->getThumbnailUrl() ?? asset('images/avatar.png')); ?>" alt="Profile Picture" style="width: 200px; border-radius: 50%; margin: auto;">
                            </div>
                            <h2><?php echo e($data->first_name); ?> <?php echo e($data->last_name); ?></h2>
                            <p class="title"><?php echo e($data->profile_title); ?></p>
                            <ul class="contact-info">
                                <li><?php echo e($data->email); ?></li>
                                <li><?php echo e($data->phone); ?></li>
                                <li><a href="#" style="color: white"><?php echo e($data->website); ?></a></li>
                                <li><a href="#" style="color: white"><?php echo e($data->linkedin); ?></a></li>
                                <li><a href="#" style="color: white"><?php echo e($data->github); ?></a></li>
                                <li><a href="#" style="color: white"><?php echo e($data->twitter); ?></a></li>
                            </ul>
                            <?php
                                $experiences = is_array($data->experience) 
                                    ? $data->experience 
                                    : json_decode($data->experience, true);
                                $education = is_array($data->education) 
                                    ? $data->education
                                    : json_decode($data->education, true);
                                $skills = is_array($data->skills)
                                    ? $data->skills
                                    : json_decode($data->skills, true);
                                $languages = is_array($data->languages)
                                    ? $data->languages
                                    : json_decode($data->languages, true);
                                $projects = is_array($data->projects)
                                    ? $data->projects
                                    : json_decode($data->projects, true);

                            ?>
                            <section class="education">
                                <h3>EDUCATION</h3>
                                <?php if(!empty($education)): ?>
                                    <?php $__currentLoopData = $education; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $edu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p>
                                            <strong><?php echo e($edu['reward'] ?? ''); ?> at <?php echo e($edu['location'] ?? ''); ?></strong><br>
                                            <?php echo e($edu['from'] ?? ''); ?> – <?php echo e($edu['to'] ?? ''); ?>

                                        </p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <p>No education data available.</p>
                                <?php endif; ?>
                            </section>
                            <section class="languages">
                                <h3>LANGUAGES</h3>
                                <?php if(!empty($languages)): ?>
                                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p>
                                            <?php echo e($lang['language'] ?? ''); ?> <?php echo e($lang['level']); ?>

                                        </p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <p>No Language data available.</p>
                                <?php endif; ?>
                            </section>
                        </div>
                        <div class="col-md-8 p-4">
                            <section>
                                <h3>EXPERIENCES</h3>
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
                            </section>
                            <section>
                                <h3>PROJECTS</h3>
                                    <?php if(!empty($projects)): ?>
                                        <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <p>
                                                <strong><?php echo e($project['title'] ?? ''); ?></strong> - <?php echo e($project['description'] ?? ''); ?>

                                            </p>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <p>No projects data available.</p>
                                    <?php endif; ?>
                            </section>
                            <section>
                                <h3>SKILLS & PROFICIENCY</h3>
                                <?php if(!empty($skills)): ?>
                                    <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <span><?php echo e($skill['name'] ?? ''); ?></span> 
                                        </div>
                                        <div class="col-md-9"> 
                                            <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar" style="width: <?php echo e($skill['level']); ?>%"><?php if(!empty($skill['level'])): ?><?php echo e($skill['level']); ?>%
                                                <?php endif; ?></div>
                                            </div>
                                            <Br>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <p>No skills data available.</p>
                                <?php endif; ?>
                            </section>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jobsning\modules/Candidate/Views/admin/resume/index.blade.php ENDPATH**/ ?>