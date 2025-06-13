<div class="bc-order-overview">
    <h2 class="title"><?php echo e(__("Order Details")); ?></h2>
    <div class="order-gig-item">
        <div class="thumb">
            <?php if($order->gig->image_id): ?>
                <?php echo get_image_tag($order->gig->image_id,'full',['alt'=>$order->gig->title]); ?>

            <?php endif; ?>
        </div>
        <div class="caption">
            <h3 class="gig-title">
                <a href="<?php echo e($order->gig->getDetailUrl()); ?>" target="_blank"><?php echo e($order->gig->title); ?></a>
            </h3>
            <span class="status-label <?php echo e($order->status); ?>"><?php echo e($order->status_text); ?></span>
        </div>
    </div>
    <ul class="order-list-details">
        <li>
            <span class="lb"><?php echo e(__("Ordered from")); ?></span>
            <span class="val"><a href="#"><?php echo e($order->customer->getDisplayName()); ?></a></span>
        </li>
        <li>
            <span class="lb"><?php echo e(__("Delivery date")); ?></span>
            <span class="val"><?php echo e(date('M d, h:i A', strtotime($order->delivery_date))); ?></span>
        </li>
        <li>
            <span class="lb"><?php echo e(__("Package")); ?></span>
            <span class="val"><?php echo e(package_key_to_name($order->package)); ?></span>
        </li>
        <?php if(!empty($order->extra_prices)): ?>
            <li>
                <span class="lb"><?php echo e(__("Extra Prices:")); ?></span>
            </li>
            <?php $__currentLoopData = $order->extra_prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <span class="lb"><?php echo e($item['name'] ?? ''); ?></span>
                    <span class="val"><?php echo e(format_money($item['price'])); ?></span>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <li>
            <span class="lb"><?php echo e(__("Total price")); ?></span>
            <span class="val"><?php echo e(format_money($order->total)); ?></span>
        </li>
        <li>
            <span class="lb"><?php echo e(__("Order number")); ?></span>
            <span class="val">#<?php echo e($order->id); ?></span>
        </li>
    </ul>
</div>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Gig\Views\frontend\elements\order-overview.blade.php ENDPATH**/ ?>