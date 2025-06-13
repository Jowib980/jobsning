<?php
    $countCart = \Modules\Order\Helpers\CartManager::count();
    ?>
    <div class="drop_headline">
        <h4>  <?php echo e(__('My Cart')); ?> </h4>
        <?php if(!empty($countCart)): ?>
            <a href="<?php echo e(route('order.checkout')); ?>" class="btn_action hover:bg-gray-100 mr-2 px-2 py-1 rounded-md underline"> <?php echo e(__('Checkout')); ?> </a>
        <?php endif; ?>
    </div>
    <?php if(!empty($countCart)): ?>
    <ul class="dropdown_cart_scrollbar" data-simplebar>
        <?php $__currentLoopData = \Modules\Order\Helpers\CartManager::items(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_item_id => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <?php if($cartItem->model): ?>
                <div class="cart_avatar">
                    <?php echo get_image_tag($cartItem->model->image_id,'thumb',['class'=>'float-left','lazy'=>false]); ?>

                </div>
                <div class="cart_text">
                    <div class=" font-semibold leading-4 mb-1.5 text-base line-clamp-1"><?php echo e($cartItem->model->title); ?></div>
                </div>
                <?php else: ?>
                    <div class="cart_avatar"></div>
                    <div class="cart_text">
                        <div class=" font-semibold leading-4 mb-1.5 text-base line-clamp-1"><?php echo e($cartItem->name); ?></div>
                    </div>
                <?php endif; ?>
                <div class="cart_price">
                    <span> <?php echo e(format_money($cartItem->price)); ?> </span>
                    <button class="type bc_delete_cart_item"  data-id="<?php echo e($cart_item_id); ?>"> <?php echo e(__('Remove')); ?></button>
                </div>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <div class="cart_footer">
        <p> <?php echo e(__('Subtotal')); ?> : <?php echo e(format_money(\Modules\Order\Helpers\CartManager::subtotal())); ?> </p>
        <h1> <?php echo e(__('Total')); ?> :  <strong> <?php echo e(format_money(\Modules\Order\Helpers\CartManager::subtotal())); ?></strong> </h1>
    </div>
    <?php else: ?>
        <div class="cart_body">
            <p><?php echo e(__("Your cart is empty")); ?></p>
        </div>
    <?php endif; ?>

<?php /**PATH C:\xampp\htdocs\jobsning\modules\Order\Views\frontend\cart\mini-cart.blade.php ENDPATH**/ ?>