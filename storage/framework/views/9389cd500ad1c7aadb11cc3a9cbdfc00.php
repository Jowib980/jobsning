
<?php $__env->startSection('title','Candidate'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar"><?php echo e(__("All Resume")); ?></h1>
            <div class="title-actions">
                <a href="<?php echo e(route('candidate.admin.resume.form')); ?>" class="btn btn-primary"><?php echo e(__("Create new Resume")); ?></a>
            </div>
        </div>
        <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="filter-div d-flex justify-content-between ">
            <div class="col-left">
                <?php if(!empty($data)): ?>
                    <form method="post" action="<?php echo e(route('candidate.admin.resume.bulkEdit')); ?>"
                          class="filter-form filter-form-left d-flex justify-content-start">
                        <?php echo e(csrf_field()); ?>

                        <select name="action" class="form-control">
                            <option value=""><?php echo e(__(" Bulk Actions ")); ?></option>
                            <option value="delete"><?php echo e(__(" Delete ")); ?></option>
                        </select>
                        <button data-confirm="<?php echo e(__("Do you want to delete?")); ?>" class="btn-info btn btn-icon dungdt-apply-form-btn" type="button"><?php echo e(__('Apply')); ?></button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
        <div class="text-right">
            <p><i><?php echo e(__('Found :total items',['total'=>$data->total()])); ?></i></p>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <form action="" class="bravo-form-item">
                            <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th width="60px"><input type="checkbox" class="check-all"></th>
                                    <th class="title"> <?php echo e(__('Profile Title')); ?></th>
                                    <th class="title"> <?php echo e(__('Name')); ?></th>
                                    <th class="title"> <?php echo e(__('Date Created')); ?></th>
                                    <th class="title"> <?php echo e(__('Last Updated')); ?></th>
                                    <th width="100px" colspan="2"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if($data->total() > 0): ?>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="check-item" name="ids[]" value="<?php echo e($row->id); ?>">
                                            </td>
                                            <td class="title"><?php echo e($row->profile_title ?? ''); ?></td>
                                            <td class="title"><?php echo e($row->first_name ?? ''); ?> <?php echo e($row->last_name ?? ''); ?></td>
                                            <td> <?php echo e($row->created_at); ?></td>
                                            <td> <?php echo e($row->updated_at); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('candidate.admin.resume.edit', $row->id)); ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> <?php echo e(__('Edit')); ?></a>
                                                <a href="<?php echo e(route('candidate.admin.resume.index', $row->id)); ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> <?php echo e(__('View')); ?></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6"><?php echo e(__("No data")); ?></td>
                                    </tr>
                                <?php endif; ?>
                                </tbody>
                            </table>
                            </div>
                        </form>
                        <?php echo e($data->appends(request()->query())->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jobsning\modules/Candidate/Views/admin/resume/list.blade.php ENDPATH**/ ?>