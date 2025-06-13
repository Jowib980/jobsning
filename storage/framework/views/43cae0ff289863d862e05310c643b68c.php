<div class="form-group row">
    <label class="control-label col-md-3 text-right col-form-label"><?php echo e(__('Briefly Describe Your Gig')); ?></label>
    <div class="col-md-9">
        <textarea name="content" class="d-none has-ckeditor" cols="30" rows="10"><?php echo e($translation->content); ?></textarea>
    </div>
</div>
<div class="form-group-item row mt-3">
    <label class="control-label col-md-3 text-right col-form-label"><?php echo e(__('Frequently Asked Questions')); ?></label>
    <div class="col-md-9">
        <div class="g-items-header">
            <div class="row">
                <div class="col-md-11"><?php echo e(__("Add Questions & Answers for Your Buyers.")); ?></div>
                <div class="col-md-1"></div>
            </div>
        </div>
        <div class="g-items">
            <?php $old = old('faqs',$row->faqs ?? []);
            if(empty($old)) $old = [[]];
            ?>
            <?php if(!empty($old)): ?>
                <?php $__currentLoopData = $old; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item" data-number="<?php echo e($key); ?>">
                        <div class="row">
                            <div class="col-md-11">
                                <input type="text" name="faqs[<?php echo e($key); ?>][title]" class="form-control" value="<?php echo e($faq['title'] ?? ''); ?>" placeholder="<?php echo e(__('Add a Question: i.e. Do you translate to English as well?')); ?>">
                                <textarea name="faqs[<?php echo e($key); ?>][content]" class="form-control" placeholder="<?php echo e(__('Add an Answer: i.e. Yes, I also translate from English to Hebrew.')); ?>"><?php echo e($faq['content'] ?? ''); ?></textarea>
                            </div>
                            <div class="col-md-1">
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
                    <div class="col-md-11">
                        <input type="text" __name__="faqs[__number__][title]" class="form-control" placeholder="<?php echo e(__('Add a Question: i.e. Do you translate to English as well?')); ?>">
                        <textarea __name__="faqs[__number__][content]" class="form-control" placeholder="<?php echo e(__('Add an Answer: i.e. Yes, I also translate from English to Hebrew.')); ?>"></textarea>
                    </div>
                    <div class="col-md-1">
                        <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Gig\Views\admin\gig\description.blade.php ENDPATH**/ ?>