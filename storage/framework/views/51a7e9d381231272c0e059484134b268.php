<?php
    $delivery_count = 0;
?>
<div class="bc-order-panel delivery-tab">
    <div class="order-activity-list">
        <?php if($order->delivery): ?>
            <?php $__currentLoopData = $order->delivery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $delivery_count++; ?>
                <?php echo $__env->make('Gig::frontend.elements.delivery-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Gig\Views\frontend\buyer\order\tab\delivery.blade.php ENDPATH**/ ?>