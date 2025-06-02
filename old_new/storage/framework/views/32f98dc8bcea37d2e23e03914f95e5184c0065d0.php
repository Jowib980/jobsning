<div class="col-9">
    <div class="panel">
        <ul class="dropdown-list-items p-0">
            <?php if(count($rows)> 0): ?>
                <?php echo $__env->make('Core::admin.notification.notification-loop-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>
                <li class="notification"><?php echo e(__("You don't have any notifications")); ?></li>
            <?php endif; ?>
        </ul>

        <div class="d-flex justify-content-end">
            <?php echo e($rows->links()); ?>

        </div>
    </div>
</div>
<?php /**PATH /home/prolydnj/jobsning.com/modules/Core/Views/admin/notification/list.blade.php ENDPATH**/ ?>