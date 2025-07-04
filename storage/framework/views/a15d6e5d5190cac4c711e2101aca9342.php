<div class="form-group">
    <label><?php echo e(__("Name")); ?></label>
    <input type="text" value="<?php echo e($translation->name); ?>" placeholder="<?php echo e(__("Attribute name")); ?>" name="name" class="form-control">
</div>
<?php if(is_default_lang()): ?>
    <div class="form-group">
        <label><?php echo e(__("Position Order")); ?></label>
        <input type="number" min="0" value="<?php echo e($row->position); ?>" placeholder="<?php echo e(__("Ex: 1")); ?>" name="position" class="form-control">
        <small>
            <?php echo e(__("The position will be used to order in the Filter page search. The greater number is priority")); ?>

        </small>
    </div>
    <div class="form-group">
        <label><?php echo e(__("Display Type in detail service")); ?></label>
        <select name="display_type" class="form-control">
            <option  <?php if($row->display_type == "icon_left"): ?> selected <?php endif; ?> value="icon_left"><?php echo e(__("Display Left Icon")); ?></option>
            <option  <?php if($row->display_type == "icon_center"): ?> selected <?php endif; ?> value="icon_center"><?php echo e(__("Display Center Icon")); ?></option>
        </select>
    </div>
    <div class="form-grou">
        <label><?php echo e(__('Hide in detail service')); ?></label>
        <br>
        <label>
            <input type="checkbox" name="hide_in_single" <?php if($row->hide_in_single): ?> checked <?php endif; ?> value="1"> <?php echo e(__("Enable hide")); ?>

        </label>
    </div>
    <div class="form-group">
        <label><?php echo e(__('Hide in filter search')); ?></label>
        <br>
        <label>
            <input type="checkbox" name="hide_in_filter_search" <?php if($row->hide_in_filter_search): ?> checked <?php endif; ?> value="1"> <?php echo e(__("Enable hide")); ?>

        </label>
    </div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\jobsning\modules\Gig\Views\admin\attribute\form.blade.php ENDPATH**/ ?>