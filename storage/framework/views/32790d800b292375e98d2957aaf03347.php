<div class="form-group">
    <label><?php echo e(__("Name")); ?> <span class="text-danger">*</span></label>
    <input type="text" required value="<?php echo e(old('name',$translation->name)); ?>" placeholder="<?php echo e(__("Category name")); ?>" name="name" class="form-control">
</div>
<div class="form-group">
    <label><?php echo e(__("Short description")); ?> </label>
    <input type="text" value="<?php echo e(old('content',$translation->content)); ?>" placeholder="<?php echo e(__("Short description")); ?>" name="content" class="form-control">
</div>
<?php if(is_default_lang()): ?>
<div class="form-group">
    <label class="control-label"><?php echo e(__("Feature Image")); ?></label>
    <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('image_id',$row->image_id); ?>

</div>
<div class="form-group">
    <label class="control-label"><?php echo e(__("Gig Category")); ?></label>
    <select name="cat_id" class="form-control">
        <option value=""><?php echo e(__("-- Please Select --")); ?></option>
        <?php
        $traverse = function ($categories, $prefix = '') use (&$traverse, $row) {
            foreach ($categories as $category) {
                if ($category->id == $row->id) {
                    continue;
                }
                $selected = '';
                if (old('cat_id',$row->cat_id) == $category->id)
                    $selected = 'selected';
                printf("<option value='%s' %s>%s</option>", $category->id, $selected, $prefix . ' ' . $category->name);
                $traverse($category->children, $prefix . '-');
            }
        };
        $traverse(\Modules\Gig\Models\GigCategory::query()->withDepth()->having('depth', '=', 1)->get());
        ?>
    </select>
</div>
<?php endif; ?>
<div class="form-group">
    <label class="control-label"><?php echo e(__("Status")); ?></label>
    <select name="status" class="form-control">
        <option value="publish"><?php echo e(__("Publish")); ?></option>
        <option <?php if(old('status',$row->status) == 'draft'): ?> selected <?php endif; ?> value="draft"><?php echo e(__("Draft")); ?></option>
    </select>
</div>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Gig\Views\admin\category_type\form.blade.php ENDPATH**/ ?>