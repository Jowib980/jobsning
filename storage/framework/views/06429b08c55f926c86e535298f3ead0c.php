
<?php $__env->startSection('content'); ?>
    <div class="b-container">
        <div class="b-panel">
            <h1><?php echo e(__("Hello")); ?>

                <?php if($email_to == 'customer'): ?>
                    <?php echo e($row->customer->display_name ?? ''); ?>

                <?php else: ?>
                    <?php echo e(__("Administrator")); ?>

                <?php endif; ?>
            </h1>

            <p><?php echo e(__('Here is the order information: ')); ?></p>
            <p><strong><?php echo e(__("Order ID:")); ?></strong> #<?php echo e($row->id); ?></p>
            <p><strong><?php echo e(__("Order Date:")); ?></strong> <?php echo e(display_datetime($row->created_at)); ?></p>
            <p><strong><?php echo e(__("Gateway:")); ?></strong> <?php echo e($row->gateway_obj->getDisplayName()); ?></p>
            <p><strong><?php echo e(__("Status:")); ?></strong> <?php echo e($row->status_name); ?></p>
            <br>
            <br>
            <table class="b-table" border="1px" cellpadding="0" cellspacing="0">
                <thead>
                <tr style="border-bottom: 1px solid #EAEEF3" class="carttable_row">
                    <th style="padding: 10px" class="cartm_title"><?php echo e(__('Product')); ?></th>
                    <th style="padding: 10px" class="cartm_title"><?php echo e(__('Quantity')); ?></th>
                    <th style="padding: 10px" class="cartm_title"><?php echo e(__('Price')); ?></th>
                </tr>
                </thead>
                <tbody class="table_body">

                <?php $__currentLoopData = $row->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $model = $orderItem->model(); ?>
                    <tr style="border-bottom: 1px solid #EAEEF3">
                        <td style="border-bottom: 1px solid #EAEEF3;padding: 10px" scope="row">
                            <?php if($model): ?>
                                <?php echo e($model->title); ?>

                            <?php else: ?>
                                <?php echo e($orderItem->name); ?>

                            <?php endif; ?>

                            <?php if(!empty($orderItem->meta['package'])): ?>
                                <div class="mt-3"><?php echo e(__('Package: ')); ?> <?php echo e(package_key_to_name($orderItem->meta['package'])); ?> (<?php echo e(format_money($orderItem->price)); ?>)</div>
                            <?php endif; ?>
                            <?php if(!empty($orderItem->meta['extra_prices'])): ?>
                                <div><strong><?php echo e(__("Extra Prices:")); ?></strong></div>
                                <ul class="list-unstyled">
                                    <?php $__currentLoopData = $orderItem->meta['extra_prices']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extra_price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($extra_price['name'] ?? ''); ?> : <?php echo e(format_money($extra_price['price'] ?? 0)); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            <?php endif; ?>
                        </td>
                        <td style="border-bottom: 1px solid #EAEEF3;padding: 10px"><?php echo e($orderItem->qty); ?></td>
                        <td style="border-bottom: 1px solid #EAEEF3;padding: 10px"><?php echo e(format_money($orderItem->subtotal)); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td colspan="2"><strong><?php echo e(__('Total')); ?></strong></td>
                        <td><?php echo e(format_money($row->total)); ?></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <br>
            <h4><?php echo e(__("Billing Details")); ?></h4>
            <?php $customer = $row->customer;?>
            <?php if($customer): ?>
            <ul>
                <li><strong><?php echo e(__("First name:")); ?></strong> <?php echo e($customer->billing_first_name); ?></li>
                <li><strong><?php echo e(__("Last name:")); ?></strong> <?php echo e($customer->billing_last_name); ?></li>
                <li><strong><?php echo e(__("Email:")); ?></strong> <?php echo e($customer->email); ?></li>
                <li><strong><?php echo e(__("Phone:")); ?></strong> <?php echo e($customer->phone); ?></li>
                <li><strong><?php echo e(__("Country:")); ?></strong> <?php echo e(get_country_name($customer->country)); ?></li>
                <li><strong><?php echo e(__("State:")); ?></strong> <?php echo e($customer->state); ?></li>
                <li><strong><?php echo e(__("City:")); ?></strong> <?php echo e($customer->city); ?></li>
                <li><strong><?php echo e(__("Zip Code:")); ?></strong> <?php echo e($customer->zip_code); ?></li>
                <li><strong><?php echo e(__("Address:")); ?></strong> <?php echo e($customer->address); ?></li>
                <li><strong><?php echo e(__("Address 2:")); ?></strong> <?php echo e($customer->address2); ?></li>
            </ul>
            <?php endif; ?>
            <br>
            <p><?php echo e(__('Regards')); ?>,<br><?php echo e(setting_item('site_title')); ?></p>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Email::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jobsning\modules\Order\Views\emails\order.blade.php ENDPATH**/ ?>