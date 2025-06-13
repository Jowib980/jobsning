<!-- Filter Block -->
<?php
    $selected = (array) Request::query('terms');
?>
<?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $attribute_trans = $attribute->translateOrOrigin(app()->getLocale()); ?>
    <div class="form-group">
        <select class="chosen-select" name="terms[]" onchange="this.form.submit()">
            <option value=""><?php echo e($attribute_trans->name); ?></option>
            <?php $__currentLoopData = $attribute->terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $translate = $term->translateOrOrigin(app()->getLocale()); ?>
                <option value="<?php echo e($term->id); ?>" <?php if(in_array($term->id,$selected)): ?> selected <?php endif; ?>  ><?php echo e($translate->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Company\Views\frontend\layouts\sidebars\fields\style-4\att.blade.php ENDPATH**/ ?>