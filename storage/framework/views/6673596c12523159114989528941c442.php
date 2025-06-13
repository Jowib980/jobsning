<div class="cart_page_form">
    <form action="#">
        <div class=" table-responsive">
        <table class="table">
              <thead>
                <tr class="carttable_row">
                    <th class="cartm_title"><?php echo e(__('Product')); ?></th>
                    <th class="cartm_title"><?php echo e(__('Price')); ?></th>
                    <th class="cartm_title"><?php echo e(__('Quantity')); ?></th>
                    <th class="cartm_title"><?php echo e(__('Total')); ?></th>
                    <?php if(empty($is_checkout)): ?>
                    <th class="cartm_title"><?php echo e(__('Actions')); ?></th>
                    <?php endif; ?>
                </tr>
              </thead>
              <tbody class="table_body">

                <?php $__currentLoopData = \Modules\Order\Helpers\CartManager::items(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row">
                        <?php if($cartItem->model): ?>
                            <ul class="cart_list d-flex align-center list-unstyled">
                                <?php if($cartItem->model->image_id): ?>
                                <li class="list-inline-item pr20">
                                    <?php echo get_image_tag($cartItem->model->image_id ?? '','thumb',['class'=>'float-left img-120 mw-80']); ?>

                                </li>
                                <?php endif; ?>
                                <li class="list-inline-item"><a class="cart_title" href="<?php echo e($cartItem->getDetailUrl()); ?>"><?php echo e($cartItem->name); ?></a></li>
                            </ul>
                        <?php else: ?>
                            <ul class="cart_list d-flex align-center list-unstyled">
                                <li class="list-inline-item pr20">
                                </li>
                                <li class="list-inline-item"><a class="cart_title" ><?php echo e($cartItem->name); ?></a></li>
                            </ul>
                        <?php endif; ?>
                    </th>
                    <td><?php echo e(format_money($cartItem->price)); ?></td>
                    <td><?php echo e($cartItem->qty); ?></td>
                    <td class="cart_total"><?php echo e(format_money($cartItem->subtotal)); ?></td>
                    <?php if(empty($is_checkout)): ?>
                    <td>
                        <a href="#" class="bravo_delete_cart_item text-danger" data-id="<?php echo e($cartItem->id); ?>"><i class="icon_trash_alt"></i></a>
                    </td>
                    <?php endif; ?>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
        </table>
        </div>
    </form>
</div>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Order\Views\frontend\cart\form.blade.php ENDPATH**/ ?>