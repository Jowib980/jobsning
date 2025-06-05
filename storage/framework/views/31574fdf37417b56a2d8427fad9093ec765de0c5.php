<!-- Checkboxes Ouer -->
<div class="checkbox-outer">
    <h4><?php echo e($val['title']); ?></h4>
    <ul class="checkboxes square">
        <li>
            <input id="check-edu0" type="checkbox" name="education_level[]" value="certificate" <?php if(!empty($experience = request()->get('education_level')) && in_array('certificate', $experience)): ?> checked <?php endif; ?>>
            <label for="check-edu0"><?php echo e(__("Certificate")); ?></label>
        </li>
        <li>
            <input id="check-edu1" type="checkbox" name="education_level[]" value="diploma" <?php if(!empty($experience = request()->get('education_level')) && in_array('diploma', $experience)): ?> checked <?php endif; ?>>
            <label for="check-edu1"><?php echo e(__("Diploma")); ?></label>
        </li>
        <li>
            <input id="check-edu2" type="checkbox" name="education_level[]" value="associate" <?php if(!empty($experience = request()->get('education_level')) && in_array('associate', $experience)): ?> checked <?php endif; ?>>
            <label for="check-edu2"><?php echo e(__("Associate Degree")); ?></label>
        </li>
        <li>
            <input id="check-edu3" type="checkbox" name="education_level[]" value="bachelor" <?php if(!empty($experience = request()->get('education_level')) && in_array('bachelor', $experience)): ?> checked <?php endif; ?>>
            <label for="check-edu3"><?php echo e(__("Bachelor Degree")); ?></label>
        </li>
        <li>
            <input id="check-edu4" type="checkbox" name="education_level[]" value="master" <?php if(!empty($experience = request()->get('education_level')) && in_array('master', $experience)): ?> checked <?php endif; ?>>
            <label for="check-edu4"><?php echo e(__("Master’s Degree")); ?></label>
        </li>
        <li class="tg d-none">
            <input id="check-edu5" type="checkbox" name="education_level[]" value="professional" <?php if(!empty($experience = request()->get('education_level')) && in_array('professional', $experience)): ?> checked <?php endif; ?>>
            <label for="check-edu5"><?php echo e(__("Professional’s Degree")); ?></label>
        </li>
        <li>
            <button class="view-more" type="button"><span class="icon flaticon-plus"></span>
                <span class="tg-text"><?php echo e(__("View More")); ?></span>
                <span class="tg-text d-none"><?php echo e(__("Show Less")); ?></span>
            </button>
        </li>
    </ul>
</div>
<?php /**PATH C:\xampp7\htdocs\jobsning\modules/Candidate/Views/frontend/layouts/sidebars/fields/education.blade.php ENDPATH**/ ?>