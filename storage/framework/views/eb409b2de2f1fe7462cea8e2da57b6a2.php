
<?php $__env->startSection('title','Resume'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar"><?php echo e(__("Build Your Resume")); ?></h1>
            <!-- <div class="title-actions"> -->
                <!-- <a href="<?php echo e(route('user.admin.create', ['candidate_create' => 1])); ?>" class="btn btn-primary"><?php echo e(__("Upload Resume")); ?></a> -->
            <!-- </div> -->
        </div>


        <div class="row">
            <div class="col-md-12">

                <form method="post" action="<?php echo e(route('candidate.admin.resume.create')); ?>">
                    <?php echo csrf_field(); ?>

<!-- personal info section start -->
 
                <div class="panel">
                    <div class="panel-title">
                        <strong>Personal Information</strong>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(__("First Name")); ?></label>
                                    <input <input type="text" value="<?php echo e(old('first_name', $user->first_name ?? '')); ?>" name="first_name" placeholder="<?php echo e(__('First Name')); ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(__("Last Name")); ?></label>
                                    <input type="text" value="<?php echo e(old('last_name',$user->last_name ?? '')); ?>" name="last_name" placeholder="<?php echo e(__("Last Name")); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('profile_picture'); ?>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><?php echo e(__("Profile Title")); ?></label>
                                    <input type="text" value="<?php echo e(old('title',$candidate->title ?? '')); ?>" name="profile_title" placeholder="<?php echo e(__("Profile Title")); ?>" class="form-control">
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
            
 
 <!-- personal info section end -->

 <!-- contact detail section start -->

                <div class="panel">
                    <div class="panel-title">
                        <strong>Contact Information</strong>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?php echo e(__("Email")); ?></label>
                                    <input type="email"name="email" placeholder="<?php echo e(__("Email")); ?>" value="<?php echo e(old('email',$user->email ?? '')); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?php echo e(__("Phone Number")); ?></label>
                                    <input type="tel" name="phone" placeholder="<?php echo e(__("Phone Number")); ?>" value="<?php echo e(old('phone',$user->phone ?? '')); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?php echo e(__("LinkedIn")); ?></label>
                                    <input type="app_url" name="linkedin" placeholder="<?php echo e(__("Linkedin url")); ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?php echo e(__("Github")); ?></label>
                                    <input type="app_url" name="github" placeholder="<?php echo e(__("Github url")); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?php echo e(__("Twitter")); ?></label>
                                    <input type="app_url" name="twitter" placeholder="<?php echo e(__("Twitter url")); ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?php echo e(__("Website")); ?></label>
                                    <input type="app_url" name="website" placeholder="<?php echo e(__("Website url")); ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           
 
  <!-- contact detail section end -->


  <!-- education detail section start -->

                <div class="panel">
                    <div class="panel-title">
                        <strong>Education Information</strong>
                    </div>
                    <div class="panel-body">
                        <!-- <div id="education-container">
                            <div class="education-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><?php echo e(__("Degree")); ?></label>
                                            <input type="text" name="degree[]" placeholder="<?php echo e(__("Degree")); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><?php echo e(__("Institute Name")); ?></label>
                                            <input type="text" name="institute[]" placeholder="<?php echo e(__("Institute")); ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo e(__("Start Date")); ?></label>
                                            <input type="date" name="start_date[]" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo e(__("End Date")); ?></label>
                                            <input type="date" name="end_date[]" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><?php echo e(__("CGPA/Percentage")); ?></label>
                                            <div class="input-group">
                                                <input type="text" name="cgpa/percentage[]" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <button type="button" class="btn btn-danger remove-education-group" style="display:none;">Remove</button>
                                </div>
                            </div>
                        </div> -->

                         <div id="education-container">
                                <?php $__empty_1 = true; $__currentLoopData = $education_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $edu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <div class="education-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label><?php echo e(__("Degree")); ?></label>
                                                    <input type="text" name="degree[]" class="form-control" value="<?php echo e($edu['reward'] ?? ''); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label><?php echo e(__("Institue Name")); ?></label>
                                                    <input type="text" name="institute[]" class="form-control" value="<?php echo e($edu['location'] ?? ''); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label><?php echo e(__("Start Date")); ?></label>
                                                    <input type="text" name="start_date[]" class="form-control" value="<?php echo e($edu['from'] ?? ''); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label><?php echo e(__("End Date")); ?></label>
                                                    <input type="text" name="end_date[]" class="form-control" value="<?php echo e($edu['to'] ?? ''); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label><?php echo e(__("CGPA/Percentage")); ?></label>
                                                    <input type="text" name="cgpa_percentage[]" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-right">
                                                <button type="button" class="btn btn-danger remove-education-group" style="<?php echo e($loop->first ? 'display:none;' : ''); ?>">Remove</button>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    
                                    <div class="education-group">
                                        <div class="row">
                                            <!-- Same structure as above but empty -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label><?php echo e(__("Degree")); ?></label>
                                                    <input type="text" name="degree[]" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label><?php echo e(__("Institute Name")); ?></label>
                                                    <input type="text" name="institute[]" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label><?php echo e(__("Start Date")); ?></label>
                                                    <input type="text" name="job_start_date[]" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label><?php echo e(__("End Date")); ?></label>
                                                    <input type="text" name="job_end_date[]" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label><?php echo e(__("CGPA/Percentage")); ?></label>
                                                    <input type="text" name="cgpa_percentage[]" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-right">
                                                <button type="button" class="btn btn-danger remove-education-group" style="display:none;">Remove</button>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                <?php endif; ?>
                            </div>

                         <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" id="add-education" class="btn btn-primary pull-right">Add More</button>
                            </div>
                        </div>

                    </div>
                </div>

  <!-- education detail section end -->

  <!-- experience section start -->

                <div class="panel">
                    <div class="panel-title">
                        <strong>Experience</strong>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label><?php echo e(__("Fresher")); ?></label>
                                <input type="radio" name="experience_type" value="fresher">
                            </div>
                            <div class="col-md-6">
                                <label><?php echo e(__("Experienced")); ?></label>
                                <input type="radio" name="experience_type" value="experienced">
                            </div>
                        </div>

                        <!-- Section to show only if "Experienced" is selected -->
                       <!--  <div class="experience-fields" style="display: none;">
                            <div id="experience-container">
                                <div class="experience-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label><?php echo e(__("Job Title")); ?></label>
                                                <input type="text" name="job_title[]" placeholder="<?php echo e(__("Job Title")); ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label><?php echo e(__("Organization")); ?></label>
                                                <input type="text" name="organization[]" placeholder="<?php echo e(__("Organization Name")); ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><?php echo e(__("Start Date")); ?></label>
                                                <input type="date" name="job_start_date[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><?php echo e(__("End Date")); ?></label>
                                                <input type="date" name="job_end_date[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label><?php echo e(__("Job Description")); ?></label>
                                                <input type="text" name="job_desc[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-right">
                                            <button type="button" class="btn btn-danger remove-experience-group" style="display:none;">Remove</button>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" id="add-experience" class="btn btn-primary pull-right">Add More</button>
                                </div>
                            </div>
                        </div> -->

                        <div class="experience-fields" style="display: none;">
                            <div id="experience-container">
                                <?php $__empty_1 = true; $__currentLoopData = $experience_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $exp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <div class="experience-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label><?php echo e(__("Job Title")); ?></label>
                                                    <input type="text" name="job_title[]" class="form-control" value="<?php echo e($exp['position'] ?? ''); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label><?php echo e(__("Organization")); ?></label>
                                                    <input type="text" name="organization[]" class="form-control" value="<?php echo e($exp['location'] ?? ''); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label><?php echo e(__("Start Date")); ?></label>
                                                    <input type="text" name="job_start_date[]" class="form-control" value="<?php echo e($exp['from'] ?? ''); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label><?php echo e(__("End Date")); ?></label>
                                                    <input type="text" name="job_end_date[]" class="form-control" value="<?php echo e($exp['to'] ?? ''); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label><?php echo e(__("Job Description")); ?></label>
                                                    <input type="text" name="job_desc[]" class="form-control" value="<?php echo e(strip_tags($exp['information'] ?? '')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-right">
                                                <button type="button" class="btn btn-danger remove-experience-group" style="<?php echo e($loop->first ? 'display:none;' : ''); ?>">Remove</button>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    
                                    <div class="experience-group">
                                        <div class="row">
                                            <!-- Same structure as above but empty -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label><?php echo e(__("Job Title")); ?></label>
                                                    <input type="text" name="job_title[]" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label><?php echo e(__("Organization")); ?></label>
                                                    <input type="text" name="organization[]" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label><?php echo e(__("Start Date")); ?></label>
                                                    <input type="text" name="job_start_date[]" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label><?php echo e(__("End Date")); ?></label>
                                                    <input type="text" name="job_end_date[]" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label><?php echo e(__("Job Description")); ?></label>
                                                    <input type="text" name="job_desc[]" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-right">
                                                <button type="button" class="btn btn-danger remove-experience-group" style="display:none;">Remove</button>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" id="add-experience" class="btn btn-primary pull-right">Add More</button>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>

  <!-- experience section end -->

  <!-- project section start -->

                <div class="panel">
                    <div class="panel-title">
                        <strong>Projects</strong>
                    </div>
                    <div class="panel-body">
                       <div id="project-container">
                                <div class="project-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label><?php echo e(__("Project Title")); ?></label>
                                                <input type="text" name="project_title[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label><?php echo e(__("Project Description")); ?></label>
                                                <textarea type="text" name="project_desc[]" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12 text-right">
                                            <button type="button" class="btn btn-danger remove-project-group" style="display:none;">Remove</button>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" id="add-project" class="btn btn-primary pull-right">Add More</button>
                                </div>
                            </div>
                        </div>
                </div>

  <!-- project section end -->

  <!-- skills section start -->

                <div class="panel">
                    <div class="panel-title">
                        <strong>Skills & Proficiency</strong>
                    </div>
                    <div class="panel-body">
                       <div id="skill-container">
                         <?php $__empty_1 = true; $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="skill-group">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label><?php echo e(__("Add Skill")); ?></label>
                                                <input type="text" name="skill[]" value="<?php echo e($skill['name'] ?? ''); ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label><?php echo e(__("Percentage")); ?></label>
                                                <input type="number" name="percentage[]" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12 text-right">
                                            <button type="button" class="btn btn-danger remove-skill-group" style="{ $loop->first ? 'display:none;' : '' }}">Remove</button>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="skill-group">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label><?php echo e(__("Add Skill")); ?></label>
                                                <input type="text" name="skill[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label><?php echo e(__("Percentage")); ?></label>
                                                <input type="number" name="percentage[]" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12 text-right">
                                            <button type="button" class="btn btn-danger remove-skill-group" style="display:none;">Remove</button>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            <?php endif; ?>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" id="add-skill" class="btn btn-primary pull-right">Add More</button>
                                </div>
                            </div>
                        </div>
                </div>

  <!-- skill section end -->

  <!-- language section start -->

                <div class="panel">
                    <div class="panel-title">
                        <strong>Languages</strong>
                    </div>
                    <div class="panel-body">
                       <div id="language-container">
                                <div class="language-group">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label><?php echo e(__("Add Language")); ?></label>
                                                <input type="text" name="language[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label><?php echo e(__("Level")); ?></label>
                                                <select class="form-control" id="language_level" name="language_level[]">
                                                <option value=""><?php echo e(__("Select Level")); ?></option>
                                                <option value="native"><?php echo e(__("Native")); ?></option>
                                                <option value="fluent"><?php echo e(__("Fluent")); ?></option>
                                            </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12 text-right">
                                            <button type="button" class="btn btn-danger remove-lang-group" style="display:none;">Remove</button>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" id="add-language" class="btn btn-primary pull-right">Add More</button>
                                </div>
                            </div>
                        </div>
                </div>

  <!-- language section end -->
 <!-- save button section -->

                <div class="panel">
                    <div class="panel-title">                   
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
    <!-- save button section end  -->

                </form>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {

                // hide and show experience form 
                const radios = document.querySelectorAll('input[name=experience_type]');
                const experienceFields = document.querySelector('.experience-fields');

                radios.forEach(radio => {
                    radio.addEventListener('change', function () {
                        if(this.value === 'experienced') {
                            experienceFields.style.display = 'block';
                        } else {
                            experienceFields.style.display = 'none';
                        }
                    });
                });


                // add more and remove for experience form

                const add_experience = document.getElementById('add-experience');
                const exp_container = document.getElementById('experience-container');

                add_experience.addEventListener('click', function () {
                    const firstExpGroup = exp_container.querySelector('.experience-group');
                    const newExpGroup = firstExpGroup.cloneNode(true);

                    newExpGroup.querySelectorAll('input').forEach(input => input.value = '');

                    newExpGroup.querySelector('.remove-experience-group').style.display = 'inline-block';

                    exp_container.appendChild(newExpGroup);
                });

                exp_container.addEventListener('click', function(e) {
                    if(e.target.classList.contains('remove-experience-group')) {
                        e.target.closest('.experience-group').remove();
                    }
                });

                // add more and remove for education section

                const add_education = document.getElementById('add-education');
                const edu_container = document.getElementById('education-container');

                add_education.addEventListener('click', function () {
                    const firstEduGroup = edu_container.querySelector('.education-group');
                    const newEduGroup = firstEduGroup.cloneNode(true);

                    newEduGroup.querySelectorAll('input').forEach(input => input.value = '');

                    newEduGroup.querySelector('.remove-education-group').style.display = 'inline-block';

                    edu_container.appendChild(newEduGroup);
                });

                edu_container.addEventListener('click', function(e) {
                    if(e.target.classList.contains('remove-education-group')) {
                        e.target.closest('.education-group').remove();
                    }
                });

                // add more and remove for projects section

                const add_project = document.getElementById('add-project');
                const proj_container = document.getElementById('project-container');

                add_project.addEventListener('click', function () {
                    const firstProjGroup = proj_container.querySelector('.project-group');
                    const newProjGroup = firstProjGroup.cloneNode(true);

                    newProjGroup.querySelectorAll('input').forEach(input => input.value = '');
                    newProjGroup.querySelectorAll('textarea').forEach(textarea => textarea.value = '');

                    newProjGroup.querySelector('.remove-project-group').style.display = 'inline-block';

                    proj_container.appendChild(newProjGroup);
                });

                proj_container.addEventListener('click', function(e) {
                    if(e.target.classList.contains('remove-project-group')) {
                        e.target.closest('.project-group').remove();
                    }
                });

                const add_skill = document.getElementById('add-skill');
                const skill_container = document.getElementById('skill-container');

                add_skill.addEventListener('click', function () {
                    const firstSkillGroup = skill_container.querySelector('.skill-group');
                    const newSkillGroup = firstSkillGroup.cloneNode(true);

                    newSkillGroup.querySelectorAll('input').forEach(input => input.value = '');

                    newSkillGroup.querySelector('.remove-skill-group').style.display = 'inline-block';

                    skill_container.appendChild(newSkillGroup);
                });

                skill_container.addEventListener('click', function(e) {
                    if(e.target.classList.contains('remove-skill-group')) {
                        e.target.closest('.skill-group').remove();
                    };
                });

                const add_language = document.getElementById('add-language');
                const lang_container = document.getElementById('language-container');

                add_language.addEventListener('click', function () {
                    const firstLangGroup = lang_container.querySelector('.language-group');                 
                    const newLangGroup = firstLangGroup.cloneNode(true);

                    newLangGroup.querySelectorAll('input').forEach(input => input.value = '');

                    newLangGroup.querySelector('.remove-lang-group').style.display = 'inline-block';

                    lang_container.appendChild(newLangGroup);
                });

                lang_container.addEventListener('click', function(e) {
                    if(e.target.classList.contains('remove-lang-group')) {
                        e.target.closest('.language-group').remove();
                    }
                });

            });

            </script>

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jobsning\modules\Candidate\Views\admin\resume\form.blade.php ENDPATH**/ ?>