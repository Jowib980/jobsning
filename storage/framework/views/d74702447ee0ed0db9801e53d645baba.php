
<div class="bc-order-panel">
    <form class="bc-order-cancel" method="POST" action="">
        <?php echo csrf_field(); ?>
        <h2 class="text-center form-title"><?php echo e(__("Order Cancellation Request")); ?></h2>
        <div class="form-group">
            <label id="message"><?php echo e(__("Message")); ?></label>
            <textarea id="message" class="form-control" name="message" rows="5" placeholder="<?php echo e(__("Please be as detailed as possible...")); ?>"></textarea>
        </div>
        <div class="form-group">
            <label id="reason"><?php echo e(__("Cancellation Request Reason")); ?></label>
            <select class="chosen-select" name="reason" id="reason">
                <option class="hidden" value=""><?php echo e(__("Select Cancellation Reason")); ?> </option>
                <?php $__currentLoopData = cancellation_reason(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>"><?php echo e($val); ?> </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="text-center mt-md-5 mt-4">
            <button type="submit" class="theme-btn btn-style-one bg-blue"><?php echo e(__("Submit Cancellation Request")); ?></button>
        </div>
    </form>
</div>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Gig\Views\frontend\buyer\order\tab\resolution.blade.php ENDPATH**/ ?>