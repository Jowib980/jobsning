<div class="delivery-item user-message">
    <div class="delivery-heading">
        <?php echo e(__("DELIVERY")); ?> #<?php echo e($delivery_count); ?>

    </div>
    <div class="delivery-body">
        <div class="activity-item">
            <div class="avatar type-image">
                <?php echo $activity->user->getUserAvatar('text'); ?>

            </div>
            <div class="item-body">
                <div class="item-title">
                    <?php if(auth()->id() == $activity->user_id): ?>
                        <?php echo e(__("Me")); ?>

                    <?php else: ?>
                        <a href="#"><?php echo e($activity->user->getDisplayName()); ?></a>
                    <?php endif; ?>
                </div>
                <div class="message-body">
                    <?php echo @clean($activity->content); ?>

                    <?php echo $__env->make('Gig::frontend.elements.attachments', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Gig\Views\frontend\elements\delivery-item.blade.php ENDPATH**/ ?>