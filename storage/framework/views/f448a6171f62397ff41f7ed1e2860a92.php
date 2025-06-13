<?php
$requirements = $order->gig->requirements;
if(!empty($order->requirements)){
    $requirements = $order->requirements;
}
?>
<div class="bc-order-panel requirements-tab">
    <form class="submit-requirement" action="<?php echo e(route('buyer.submit_requirements')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="order_id" value="<?php echo e($order->id); ?>">
        <div class="bc-list-requirements">
            <?php $__currentLoopData = $requirements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="requirement-item">
                    <span class="index"><?php echo e($key + 1); ?></span>
                    <div class="r-right">
                        <?php if($order->status == \Modules\Gig\Models\GigOrder::INCOMPLETE): ?>
                            <input type="hidden" name="requirements[<?php echo e($key); ?>][content]" value="<?php echo e($val['content'] ?? ''); ?>" >
                        <?php endif; ?>
                        <h4 class="question"><?php echo e($val['content'] ?? ''); ?> <?php if($order->status == \Modules\Gig\Models\GigOrder::INCOMPLETE && !empty($val['required'])): ?> <span class="text-danger">*</span> <?php endif; ?></h4>
                            <?php if($order->status == \Modules\Gig\Models\GigOrder::INCOMPLETE): ?>
                            <div class="answer-field">
                                <textarea name="requirements[<?php echo e($key); ?>][answer]" <?php if(!empty($val['required'])): ?> required <?php endif; ?> class="form-control" rows="3" placeholder="<?php echo e(__("Your answer...")); ?>"></textarea>
                            </div>
                        <?php else: ?>
                            <div class="answer">
                                <?php echo e($val['answer'] ?? ''); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php if($order->status == \Modules\Gig\Models\GigOrder::INCOMPLETE): ?>
            <div class="text-center mt-4">
                <button type="submit" class="theme-btn btn-style-one bg-blue"><?php echo e(__("Submit Requirements")); ?></button>
            </div>
        <?php endif; ?>
    </form>
</div>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Gig\Views\frontend\buyer\order\tab\requirements.blade.php ENDPATH**/ ?>