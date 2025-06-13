<!-- Filter Block -->
<?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="form-group v3_conpany_size">
        <select class="chosen-select">
            <option><?php echo e(__("Company Size")); ?></option>
            <?php $__currentLoopData = $attribute->terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option <?php if($term->id == Request::query('team_size')): ?> selected <?php endif; ?> value="<?php echo e($term->id); ?>"><?php echo e($term->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Company\Views\frontend\layouts\sidebars\fields\style-4\team_size.blade.php ENDPATH**/ ?>