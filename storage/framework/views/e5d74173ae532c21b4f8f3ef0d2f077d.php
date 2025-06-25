<div class="order-box">
    <h3><?php echo e(__('Your Order')); ?></h3>
    <table>
        <thead>
        <tr>
            <th><strong><?php echo e(__('Product')); ?></strong></th>
            <th width="20%"><strong><?php echo e(__('Subtotal')); ?></strong></th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $currency = $cartItem->meta['currency'] ?? 'inr';
                $currencySymbols = ['inr' => '₹', 'usd' => '$', 'eur' => '€'];
                $symbol = $currencySymbols[$currency] ?? '₹';
            ?>
        <tr class="cart-item">
            <td class="product-name">
                <?php echo e($cartItem->name); ?>

                x <?php echo e($cartItem->qty); ?>

                <?php if(!empty($cartItem->meta['package'])): ?>
                    <div class="mt-3"><?php echo e(__('Package: ')); ?> <?php echo e(package_key_to_name($cartItem->meta['package'])); ?> (<?php echo e($symbol); ?>)<?php echo e(number_format($cartItem->price, 2)); ?></div>
                <?php endif; ?>
                <?php if(!empty($cartItem->meta['extra_prices'])): ?>
                    <div class="mt-3"><strong><?php echo e(__("Extra Prices:")); ?></strong></div>
                    <ul class="list-unstyled mt-2">
                        <?php $__currentLoopData = $cartItem->meta['extra_prices']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extra_price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($extra_price['name'] ?? '0'); ?> : <?php echo e($symbol); ?><?php echo e(number_format(['extra_prices'] ?? 0)); ?>)</li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>
            </td>
            <td class="product-total"><?php echo e($symbol); ?><?php echo e(number_format($cartItem->subtotal, 2)); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <tfoot>
        <tr class="order-total">
            <td><?php echo e(__('Total')); ?></td>

            <td>
                <span class="amount"><?php echo e($symbol); ?> <?php echo e(number_format(\Modules\Order\Helpers\CartManager::total(), 2)); ?></span>
            </td>
        </tr>
        </tfoot>
    </table>
</div>
<?php /**PATH C:\xampp\htdocs\jobsning\modules/Order/Views/frontend/checkout/review.blade.php ENDPATH**/ ?>