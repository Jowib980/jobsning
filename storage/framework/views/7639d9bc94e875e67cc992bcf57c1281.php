
<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="pricing-section">
        <div class="auto-container">
            <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php
            if(!$user or !$user_plan = $user->user_plan)
                return;
            ?>
            <div class="sec-title text-center">
                <h2><?php echo e(__("My Current Plan")); ?></h2>
            </div>
            <table class="default-table manage-job-table mb-5">
                <thead>
                <tr>
                    <th><?php echo e(__("Plan ID")); ?></th>
                    <th><?php echo e(__("Plan Name")); ?></th>
                    <th><?php echo e(__("Expiry")); ?></th>
                    <th><?php echo e(__("Used/Total")); ?></th>
                    <th><?php echo e(__("Price")); ?></th>
                    <th><?php echo e(__("Status")); ?></th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>#<?php echo e($user_plan->plan_id); ?></td>
                    <td class="trans-id"><?php echo e($user_plan->plan->title ?? ''); ?></td>
                    <td class="total-jobs"><?php echo e(display_datetime($user_plan->end_date)); ?></td>
                    <td class="used"><?php if(!$user_plan->max_service): ?> <?php echo e(__("Unlimited")); ?> <?php else: ?> <?php echo e($user_plan->used); ?>/<?php echo e($user_plan->max_service); ?> <?php endif; ?></td>
                    <td class="remaining"><?php echo e(format_money($user_plan->price)); ?></td>
                    <td >
                        <?php if($user_plan->is_valid): ?>
                            <span class="text-success"><?php echo e(__('Active')); ?></span>
                        <?php else: ?>
                            <div class="text-danger mb-3"><?php echo e(__('Expired')); ?></div>
                            <div>
                                <a href="<?php echo e(route('plan')); ?>" class="btn btn-warning"><?php echo e(__('Renew')); ?></a>
                            </div>
                        <?php endif; ?>
                    </td>
                </tr>
                </tbody>
            </table>
            <hr>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jobsning\modules/User/Views/frontend/plan/my-plan.blade.php ENDPATH**/ ?>