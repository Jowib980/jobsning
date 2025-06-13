
<?php $__env->startSection('content'); ?>
    <div class="b-container">
        <div class="b-panel">
            <h1><?php echo e(__("Hello")); ?> <?php echo e($author->display_name); ?>

            </h1>

            <p><?php echo e(__('Here is the order information: ')); ?></p>
            <p><strong><?php echo e(__("Order ID:")); ?></strong> #<?php echo e($order->id); ?></p>
            <p><strong><?php echo e(__("Order Date:")); ?></strong> <?php echo e(display_datetime($gig_order->created_at)); ?></p>
            <br>
            <br>
            <table class="b-table" border="1px" cellpadding="0" cellspacing="0">
                <thead>
                <tr style="border-bottom: 1px solid #EAEEF3" class="carttable_row">
                    <th style="padding: 10px" class="cartm_title"><?php echo e(__('Product')); ?></th>
                    <th style="padding: 10px" class="cartm_title"><?php echo e(__('Price')); ?></th>
                    <th style="padding: 10px" class="cartm_title"><?php echo e(__('Actions')); ?></th>
                </tr>
                </thead>
                <tbody class="table_body">
                    <tr style="border-bottom: 1px solid #EAEEF3">
                        <td style="border-bottom: 1px solid #EAEEF3;padding: 10px" scope="row">
                            <a href="<?php echo e($gig->getDetailUrl()); ?>"><?php echo e($gig->title); ?></a>
                            <?php if(!empty($gig_order->package)): ?>
                                <div><?php echo e(__("Package: ")); ?> <?php echo e(package_key_to_name($gig_order->package)); ?></div>
                            <?php endif; ?>
                        </td>
                        <td style="border-bottom: 1px solid #EAEEF3;padding: 10px"><?php echo e(format_money($gig_order->total)); ?></td>
                        <td style="border-bottom: 1px solid #EAEEF3;padding: 10px">
                            <a href="<?php echo e(route('seller.order',['id'=>$gig_order->id])); ?>"><?php echo e(__("View Order")); ?></a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br>
            <br>
            <h4><?php echo e(__("Customer Details")); ?></h4>
            <?php $customer = $order->customer;?>
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

<?php echo $__env->make('Email::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jobsning\modules\Gig\Views\emails\order_author.blade.php ENDPATH**/ ?>