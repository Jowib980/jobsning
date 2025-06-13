<?php
$requirements = $order->requirements;
?>
<div class="bc-order-panel requirements-tab">
    <div class="bc-list-requirements">
        <?php $__currentLoopData = $requirements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="requirement-item">
                <span class="index"><?php echo e($key + 1); ?></span>
                <div class="r-right">
                    <h4 class="question"><?php echo e($val['content'] ?? ''); ?></h4>
                    <div class="answer">
                        <?php echo e($val['answer'] ?? ''); ?>

                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Gig\Views\frontend\seller\order\tab\requirements.blade.php ENDPATH**/ ?>