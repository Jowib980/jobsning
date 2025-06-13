<div class="form-group-item row mt-3">
    <div class="col-md-12">
        <div class="g-items-header">
            <div class="row">
                <div class="col-md-11"><?php echo e(__("Add Question")); ?></div>
                <div class="col-md-1"></div>
            </div>
        </div>
        <div class="g-items">
            <?php $old = old('requirements',$row->requirements ?? []);
            if(empty($old)) $old = [];
            ?>
            <?php if(!empty($old)): ?>
                <?php $__currentLoopData = $old; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$rq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item" data-number="<?php echo e($key); ?>">
                        <div class="row">
                            <div class="col-md-9">
                                <textarea name="requirements[<?php echo e($key); ?>][content]" class="form-control" placeholder="<?php echo e(__('Request necessary details such as dimensions, brand guidelines, and more.')); ?>"><?php echo e($rq['content'] ?? ''); ?></textarea>
                            </div>
                            <div class="col-md-2">
                                <label ><input type="checkbox" <?php if($rq['required'] ?? ''): ?> checked <?php endif; ?> name="requirements[<?php echo e($key); ?>][required]"  value="1" > <?php echo e(__("Required")); ?></label>
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
            <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> <?php echo e(__('Add question')); ?></span>
        </div>
        <div class="g-more hide">
            <div class="item" data-number="__number__">
                <div class="row">
                    <div class="col-md-9">
                        <textarea __name__="requirements[__number__][content]" class="form-control" placeholder="<?php echo e(__('Request necessary details such as dimensions, brand guidelines, and more.')); ?>"></textarea>
                    </div>
                    <div class="col-md-2">
                        <label ><input type="checkbox" __name__="requirements[__number__][required]"  value="1" > <?php echo e(__("Required")); ?></label>
                    </div>
                    <div class="col-md-1">
                        <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Gig\Views\admin\gig\requirements.blade.php ENDPATH**/ ?>