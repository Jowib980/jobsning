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
        <label><?php echo e(__("Parent")); ?></label>
        <select name="parent_id" class="form-control">
            <option value=""><?php echo e(__("-- Please Select --")); ?></option>
            <?php
            $traverse = function ($categories, $prefix = '') use (&$traverse, $row) {
                foreach ($categories as $category) {
                    if ($category->id == $row->id) {
                        continue;
                    }
                    $selected = '';
                    if (old('parent_id',$row->parent_id) == $category->id)
                        $selected = 'selected';
                    printf("<option value='%s' %s>%s</option>", $category->id, $selected, $prefix . ' ' . $category->name);
                    $traverse($category->children, $prefix . '-');
                }
            };
            $traverse($parents);
            ?>
        </select>
    </div>

<div class="form-group">
    <label class="control-label"><?php echo e(__("Feature Image")); ?></label>
    <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('image_id',$row->image_id); ?>

</div>
<div class="form-group">
    <label class="control-label"><?php echo e(__("Related News Category")); ?></label>
    <select name="news_cat_id" class="form-control">
        <option value=""><?php echo e(__("-- Please Select --")); ?></option>
        <?php
        $traverse = function ($categories, $prefix = '') use (&$traverse, $row) {
            foreach ($categories as $category) {
                if ($category->id == $row->id) {
                    continue;
                }
                $selected = '';
                if (old('news_cat_id',$row->news_cat_id) == $category->id)
                    $selected = 'selected';
                printf("<option value='%s' %s>%s</option>", $category->id, $selected, $prefix . ' ' . $category->name);
                $traverse($category->children, $prefix . '-');
            }
        };
        $traverse(\Modules\News\Models\NewsCategory::query()->get()->toTree());
        ?>
    </select>
</div>
<?php endif; ?>
<div class="form-group-item mt-3">
    <label class="control-label"><?php echo e(__('FAQS')); ?></label>
    <div class="">
        <div class="g-items-header">
            <div class="row">
                <div class="col-md-11"><?php echo e(__("FAQ")); ?></div>
                <div class="col-md-1"></div>
            </div>
        </div>
        <div class="g-items">
            <?php $old = old('faqs',$translation->faqs ?? []);
            ?>
            <?php if(!empty($old)): ?>
                <?php $__currentLoopData = $old; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item" data-number="<?php echo e($key); ?>">
                        <div class="row">
                            <div class="col-md-10">
                                <input type="text" name="faqs[<?php echo e($key); ?>][title]" class="form-control" value="<?php echo e($faq['title'] ?? ''); ?>" placeholder="<?php echo e(__('Add a Question')); ?>">
                                <textarea name="faqs[<?php echo e($key); ?>][content]" class="form-control" placeholder="<?php echo e(__('Add an Answer')); ?>"><?php echo e($faq['content'] ?? ''); ?></textarea>
                            </div>
                            <div class="col-md-2">
                                <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
        <div class="text-right">
            <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> <?php echo e(__('Add FAQ')); ?></span>
        </div>
        <div class="g-more hide">
            <div class="item" data-number="__number__">
                <div class="row">
                    <div class="col-md-10">
                        <input type="text" __name__="faqs[__number__][title]" class="form-control" placeholder="<?php echo e(__('Add a Question:')); ?>">
                        <textarea __name__="faqs[__number__][content]" class="form-control" placeholder="<?php echo e(__('Add an Answer:')); ?>"></textarea>
                    </div>
                    <div class="col-md-2">
                        <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="control-label"><?php echo e(__("Status")); ?></label>
    <select name="status" class="form-control">
        <option value="publish"><?php echo e(__("Publish")); ?></option>
        <option <?php if(old('status',$row->status) == 'draft'): ?> selected <?php endif; ?> value="draft"><?php echo e(__("Draft")); ?></option>
    </select>
</div>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Gig\Views\admin\category\form.blade.php ENDPATH**/ ?>