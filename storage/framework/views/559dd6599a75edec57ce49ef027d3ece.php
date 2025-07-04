
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar"><?php echo e(__('Menu Management')); ?></h1>
            <div class="title-actions">
                <a href="<?php echo e(url('admin/module/core/menu/create')); ?>" class="btn btn-primary"><?php echo e(__("Add new")); ?></a>
            </div>
        </div>
        <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="filter-div d-flex justify-content-between ">
            <div class="col-left">
                <?php if(!empty($rows)): ?>
                    <form method="post" action="<?php echo e(url('admin/module/core/menu/bulkEdit')); ?>" class="filter-form filter-form-left d-flex justify-content-start">
                        <?php echo e(csrf_field()); ?>

                        <select name="action" class="form-control">
                            <option value=""><?php echo e(__(" Bulk Actions ")); ?></option>
                            <option value="delete"><?php echo e(__(" Delete ")); ?></option>
                        </select>
                        <button data-confirm="<?php echo e(__("Do you want to delete?")); ?>" class="btn-info btn btn-icon dungdt-apply-form-btn" type="button"><?php echo e(__('Apply')); ?></button>
                    </form>
                <?php endif; ?>
            </div>
            <div class="col-left">

            </div>
        </div>
        <div class="panel">
            <div class="panel-title"><?php echo e(__('All Menus')); ?></div>
            <div class="panel-body">
                <form action="" class="bravo-form-item">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th width="60px"><input type="checkbox" class="check-all"></th>
                            <th><?php echo e(__('Title')); ?></th>
                            <th><?php echo e(__("Use for")); ?></th>
                            <th><?php echo e(__('Date')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><input type="checkbox" name="ids[]" class="check-item" value="<?php echo e($row->id); ?>">
                                </td>
                                <td>
                                    <a href="<?php echo e(url('admin/module/core/menu/edit/'.$row->id)); ?>"><?php echo e($row->name); ?></a>
                                </td>
                                <td>
                                    <?php $__currentLoopData = $menu_locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l=>$menu_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($menu_id == $row->id and isset($locations[$l])): ?>
                                            <?php echo e($locations[$l]); ?><br>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td><?php echo e($row->updated_at); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo e($rows->links()); ?>

                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jobsning\modules\Core\Views\admin\menu\index.blade.php ENDPATH**/ ?>