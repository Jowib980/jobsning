
<?php $__env->startSection('content'); ?>
    <section class="page-title">
        <div class="auto-container">
            <div class="title-outer">
                <h1><?php echo e(__('My Orders')); ?></h1>
                <ul class="page-breadcrumb">
                    <li><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                    <li><?php echo e(__('My Orders')); ?></li>
                </ul>
            </div>
        </div>
    </section>
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-md-12 ">
                <div class="booking-form">
                    <div class="cart_page_form">
                        <form action="#">
                            <div class=" table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr class="carttable_row">
                                        <th class="cartm_title"><?php echo e(__('No')); ?></th>
                                        <th class="cartm_title"><?php echo e(__('Product')); ?></th>
                                        <th class="cartm_title"><?php echo e(__('Price')); ?></th>
                                        <th class="cartm_title"><?php echo e(__('Order Date')); ?></th>
                                        <th class="cartm_title"><?php echo e(__('Gateway')); ?></th>
                                        <th class="cartm_title"><?php echo e(__('Status')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody class="table_body">

                                    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $model = $row->model();
                                        ?>
                                        <tr>
                                            <th><?php echo e($rows ->perPage() * ($rows->currentPage()-1) + $k + 1); ?></th>
                                            <th scope="row">
                                                <?php if($model): ?>
                                                    <?php $url = $model->getDetailUrl()?>
                                                    <ul class="cart_list d-flex align-center list-unstyled">
                                                        <?php if($model->image_id): ?>
                                                            <li class="list-inline-item pr20">
                                                                <?php echo get_image_tag($model->image_id ?? '','thumb',['class'=>'float-left img-120 mw-80']); ?>

                                                            </li>
                                                        <?php endif; ?>
                                                        <li class="list-inline-item"><a class="cart_title" href="<?php echo e($url ? $url : '#'); ?>"><?php echo e($model->title); ?></a></li>
                                                    </ul>
                                                <?php else: ?>
                                                    <ul class="cart_list d-flex align-center list-unstyled">
                                                        <li class="list-inline-item pr20">
                                                        </li>
                                                        <li class="list-inline-item"><a class="cart_title" ><?php echo e($row->name); ?></a></li>
                                                    </ul>
                                                <?php endif; ?>
                                            </th>
                                            <td><?php echo e(format_money($row->price)); ?></td>
                                            <td><?php echo e(display_datetime($row->created_at)); ?></td>
                                            <td><?php echo e($row->order->gateway ?? ''); ?></td>
                                            <td><?php echo e($row->status_name); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <?php echo e($rows->links()); ?>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("Layout::app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/prolydnj/jobsning.com/modules/Order/Views/frontend/user/history.blade.php ENDPATH**/ ?>