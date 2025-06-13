<div class="form-group row">
    <div class="col-md-3 col-form-label text-right"><label><?php echo e(__("Title")); ?> <span class="text-danger">*</span></label></div>
    <div class="col-md-9">
        <input type="text" value="<?php echo e(old('title',$translation->title)); ?>" required placeholder="<?php echo e(__("Name of the gig")); ?>" name="title" class="form-control">
    </div>
</div>
<?php if(is_default_lang()): ?>
<div class="form-group row ">
    <label class="control-label col-md-3 col-form-label text-right"><?php echo e(__("Category")); ?> <span class="text-danger">*</span></label>
    <div class="col-md-3">
        <select <?php if(!is_default_lang()): ?> readonly <?php endif; ?> name="cat_id" required class="form-control">
            <option value=""><?php echo e(__("-- Select a Category--")); ?></option>
            <?php
            $items = \Modules\Gig\Models\GigCategory::query()->whereNull('parent_id')->get();
            ?>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option <?php if(old('cat_id',$row->cat_id) == $item->id): ?> selected <?php endif; ?> value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="col-md-3">
        <select <?php if(!is_default_lang()): ?> readonly <?php endif; ?> name="cat2_id" required class="form-control">
            <option value=""><?php echo e(__("-- Select a Subcategory --")); ?></option>
            <?php
            $items = \Modules\Gig\Models\GigCategory::query()->withDepth()->having('depth', '=', 1)->get();
            ?>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option data-parent="<?php echo e($item->parent_id); ?>" <?php if(old('cat2_id',$row->cat2_id) == $item->id): ?> selected <?php endif; ?> value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="col-md-3">
        <select <?php if(!is_default_lang()): ?> readonly <?php endif; ?> name="cat3_id" required class="form-control">
            <option value=""><?php echo e(__("-- Select a Subject--")); ?></option>
            <?php
            $items = \Modules\Gig\Models\GigCategory::query()->withDepth()->having('depth', '=', 2)->get();
            ?>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option data-parent="<?php echo e($item->parent_id); ?>" <?php if(old('cat3_id',$row->cat3_id) == $item->id): ?> selected <?php endif; ?> value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
</div>

<div class="form-group row">
    <label class="control-label col-md-3 col-form-label text-right"><?php echo e(__("Search Tags")); ?></label>
    <div class="col-md-9">
        <div class="">
            <input type="text" data-role="tagsinput" value="<?php echo e($row->tag); ?>" placeholder="<?php echo e(__('Enter tag')); ?>" name="tag" class="form-control tag-input">
            <br>
            <div class="show_tags">
                <?php
                ?>
                <?php if(!empty($tags)): ?>
                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="tag_item"><?php echo e($tag->name); ?><span data-role="remove"></span>
                                                <input type="hidden" name="tag_ids[]" value="<?php echo e($tag->id); ?>">
                                            </span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
        <p class="text-right"><small><?php echo e(__("10 tags maximum")); ?></small></p>
    </div>
</div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Gig\Views\admin\gig\overview.blade.php ENDPATH**/ ?>