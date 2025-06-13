
<div class="model bc-model modal-normal" id="bc-request-revision-popup">
    <div class="popup-wrapper">
        <div class="apply-job-form default-form">
            <div class="form-inner">
                <h3 class="form-title text-center"><?php echo e(__("Request A Revision")); ?></h3>

                <?php if($order->revision == 0): ?>
                    <p class="no-revision"><?php echo e(__("This order has no revisions.")); ?></p>
                <?php elseif(!empty($order->revisions) && $order->revision <= count($order->revisions)): ?>
                    <p class="no-revision"><?php echo e(__("No revision left")); ?></p>
                <?php else: ?>
                    <form class="send-message-form" action="<?php echo e(route('buyer.send_message')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="order_id" value="<?php echo e($order->id); ?>">
                        <input type="hidden" name="type" value="revision">
                        <div class="form-group">
                            <label id="message"><?php echo e(__("Message")); ?></label>
                            <textarea id="message" required class="form-control" name="content" rows="5" placeholder="<?php echo e(__("Type your message here...")); ?>"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="attach-file">
                                <label> <?php echo e(__("Attach File (optional)")); ?> </label>
                                <input type="file" name="files[]" accept=".zip,image/*" multiple class="form-control-file">
                            </div>
                            <p><i><?php echo e(__("Maximum 4 files, (image or .zip)")); ?></i></p>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="theme-btn btn-style-one bg-blue"><?php echo e(__("Send")); ?></button>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Gig\Views\frontend\elements\revision-popup.blade.php ENDPATH**/ ?>