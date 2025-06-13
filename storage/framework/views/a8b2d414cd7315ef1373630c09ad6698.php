<?php
    $item_date = date('M d', strtotime($order->created_at));
    $delivery_count = 0;
?>
<div class="bc-order-panel <?php if($order->status == 'completed' || $order->status == 'cancelled'): ?> bc-order-completed <?php endif; ?>">
    <div class="order-activity-list">
        <div class="activity-date">
            <?php echo e($item_date); ?>

        </div>
        <div class="activity-item placed-order">
            <div class="avatar type-icon">
                <i class="icon la la-file-o"></i>
            </div>
            <div class="item-body">
                <div class="item-title">
                    <?php echo e(__("The buyer placed your order")); ?> <span class="activity-time"><?php echo e(date('M d, h:i A', strtotime($order->created_at))); ?></span>
                </div>
            </div>
        </div>
        <?php if($order->activities): ?>
            <?php $__currentLoopData = $order->activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $item_c_date = date('M d', strtotime($activity->created_at));
                ?>
                <?php if($item_date != $item_c_date): ?>
                    <?php $item_date = $item_c_date ?>
                    <div class="activity-date">
                        <?php echo e($item_date); ?>

                    </div>
                <?php endif; ?>
                <?php switch($activity['type']):
                    case (\Modules\Gig\Models\GigOrderActivity::TYPE_REQUIREMENTS): ?>
                        <div id="activity-<?php echo e($activity->id); ?>" class="activity-item requirements">
                            <div class="avatar type-icon">
                                <i class="icon la la-pencil-alt"></i>
                            </div>
                            <div class="item-body">
                                <div class="item-title">
                                    <?php echo e(__("Buyer submitted the requirements")); ?> <span class="activity-time"><?php echo e(date('M d, h:i A', strtotime($activity->created_at))); ?></span>
                                </div>
                            </div>
                        </div>
                        <?php break; ?>
                    <?php case (\Modules\Gig\Models\GigOrderActivity::TYPE_ORDER_STARTED): ?>
                        <div id="activity-<?php echo e($activity->id); ?>" class="activity-item order-started">
                            <div class="avatar type-icon">
                                <i class="icon la la-rocket"></i>
                            </div>
                            <div class="item-body">
                                <div class="item-title">
                                    <?php echo e(__("Order started")); ?> <span class="activity-time"><?php echo e(date('M d, h:i A', strtotime($activity->created_at))); ?></span>
                                </div>
                            </div>
                        </div>
                        <?php break; ?>
                    <?php case (\Modules\Gig\Models\GigOrderActivity::TYPE_DELIVERY_DATE): ?>
                        <div id="activity-<?php echo e($activity->id); ?>" class="activity-item delivery-date">
                            <div class="avatar type-icon">
                                <i class="icon la la-clock"></i>
                            </div>
                            <div class="item-body">
                                <div class="item-title">
                                    <?php echo e(__("Delivery date was updated to")); ?> <?php echo e(date('M d', strtotime($order->delivery_date))); ?><span class="activity-time"><?php echo e(date('M d, h:i A', strtotime($activity->created_at))); ?></span>
                                </div>
                            </div>
                        </div>
                        <?php break; ?>
                    <?php case (\Modules\Gig\Models\GigOrderActivity::TYPE_DELIVERED): ?>
                        <?php $delivery_count++; ?>
                        <div id="activity-<?php echo e($activity->id); ?>" class="activity-item delivered">
                            <div class="avatar type-icon">
                                <i class="icon la la-luggage-cart"></i>
                            </div>
                            <div class="item-body">
                                <div class="item-title">
                                    <?php echo e(__("You have delivered")); ?>

                                    <span class="activity-time"><?php echo e(date('M d, h:i A', strtotime($activity->created_at))); ?></span>
                                </div>
                                <div class="message-body">
                                    <?php echo $__env->make('Gig::frontend.elements.delivery-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                        </div>
                        <?php break; ?>
                    <?php case (\Modules\Gig\Models\GigOrderActivity::TYPE_REVISION): ?>
                        <div id="activity-<?php echo e($activity->id); ?>" class="activity-item revision">
                            <div class="avatar type-icon">
                                <i class="icon la la-refresh"></i>
                            </div>
                            <div class="item-body">
                                <div class="item-title">
                                     <?php echo e(__("Buyer requested a revision")); ?>

                                    <span class="activity-time"><?php echo e(date('M d, h:i A', strtotime($activity->created_at))); ?></span>
                                </div>
                                <div class="message-body">
                                    <div class="delivery-item">
                                        <div class="delivery-heading">
                                            <?php echo e(__("REVISION REQUEST")); ?>

                                        </div>
                                        <div class="delivery-body">
                                            <div class="activity-item user-message">
                                                <div class="avatar type-text">
                                                    <?php echo $activity->user->getUserAvatar('text'); ?>

                                                </div>
                                                <div class="item-body">
                                                    <div class="item-title">
                                                        <a href="#"><?php echo e($activity->user->getDisplayName()); ?></a>
                                                    </div>
                                                    <div class="message-body">
                                                        <?php echo @clean($activity->content); ?>

                                                        <?php echo $__env->make('Gig::frontend.elements.attachments', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php break; ?>
                    <?php case (\Modules\Gig\Models\GigOrderActivity::TYPE_ORDER_COMPLETED): ?>
                        <div id="activity-<?php echo e($activity->id); ?>" class="activity-item order-completed">
                            <div class="avatar type-icon">
                                <i class="icon la la-file-o"></i>
                            </div>
                            <div class="item-body">
                                <div class="item-title">
                                    <?php echo e(__("You order was completed")); ?> <span class="activity-time"><?php echo e(date('M d, h:i A', strtotime($activity->created_at))); ?></span>
                                </div>
                            </div>
                        </div>
                        <?php break; ?>
                    <?php default: ?>
                        <div id="activity-<?php echo e($activity->id); ?>" class="activity-item user-message">
                            <div class="avatar type-image">
                                <?php echo ($activity->user->getUserAvatar('text')); ?>

                            </div>
                            <div class="item-body">
                                <div class="item-title">
                                    <?php if(auth()->id() == $activity->user_id): ?>
                                        <?php echo e(__("Me")); ?>

                                    <?php else: ?>
                                        <a href="#"><?php echo e($activity->user->getDisplayName()); ?></a>
                                    <?php endif; ?>
                                        <span class="activity-time"><?php echo e(date('M d, h:i A', strtotime($activity->created_at))); ?></span>
                                </div>
                                <div class="message-body">
                                    <?php echo @clean($activity->content); ?>

                                    <?php echo $__env->make('Gig::frontend.elements.attachments', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                        </div>
                        <?php break; ?>
                <?php endswitch; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

    </div>

    <?php if($order->status == \Modules\Gig\Models\GigOrder::COMPLETED || $order->status == \Modules\Gig\Models\GigOrder::CANCELLED): ?>
        <div class="order-bottom-status <?php echo e($order->status); ?>">
            <div class="activity-item user-message">
                <div class="avatar type-text">
                    <?php echo $order->customer->getUserAvatar('text'); ?>

                </div>
                <div class="item-body">
                    <div class="item-title">
                        <?php if($order->status == 'cancelled'): ?>
                            <?php echo e(__("Order is cancel.")); ?>

                        <?php else: ?>
                            <?php echo e(__("Order is complete.")); ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php if(($order->status == \Modules\Gig\Models\GigOrder::IN_PROGRESS || $order->status == \Modules\Gig\Models\GigOrder::IN_REVISION) && !$order->orderExpired()): ?>
    <div class="button-group text-center mt-4">
        <a class="theme-btn btn-style-one bg-blue bc-seller-delivery" href="#"><?php echo e(__("Delivery Order")); ?></a>
        <?php echo $__env->make('Gig::frontend.elements.delivery-popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php endif; ?>

<?php if($order->status != \Modules\Gig\Models\GigOrder::COMPLETED && $order->status != \Modules\Gig\Models\GigOrder::CANCELLED): ?>
    <div class="bc-order-panel">
        <form class="send-message-form" action="<?php echo e(route('seller.send_message')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="order_id" value="<?php echo e($order->id); ?>">
            <div class="form-group">
                <label id="message"><?php echo e(__("Message")); ?></label>
                <textarea id="message" required class="form-control" name="content" rows="5" placeholder="<?php echo e(__("Type your message here...")); ?>"></textarea>
            </div>
            <div class="form-group">
                <div class="attach-file">
                    <label> <?php echo e(__("Attach File (optional)")); ?> </label>
                    <input type="file" name="files[]" accept="image/*" multiple class="form-control-file">
                </div>
                <p><i><?php echo e(__("Maximum 4 files, image only")); ?></i></p>
            </div>
            <div class="text-right">
                <button type="submit" class="theme-btn btn-style-one bg-blue"><?php echo e(__("Send")); ?></button>
            </div>
        </form>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Gig\Views\frontend\seller\order\tab\activity.blade.php ENDPATH**/ ?>