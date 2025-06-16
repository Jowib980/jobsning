<!-- Filter Block -->
<?php if($list_skills): ?>
    <div class="filter-block">
        <h4><?php echo e($val['title']); ?></h4>
        <div class="form-group">

            <select class="chosen-select" name="skill">
                <option value=""><?php echo e(__("Choose a skill")); ?></option>
                <?php $__currentLoopData = $list_skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $translate = $skill->translateOrOrigin(app()->getLocale());
                    ?>
                    <option value="<?php echo e($skill->id); ?>" <?php if($skill->id == request()->get('skill')): ?> selected <?php endif; ?>  ><?php echo e($translate->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <span class="icon flaticon-pencil"></span>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\jobsning\modules/Candidate/Views/frontend/layouts/sidebars/fields/skill.blade.php ENDPATH**/ ?>