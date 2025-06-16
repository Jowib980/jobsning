

<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar"><?php echo e(__('Saved Jobs')); ?></h1>
        </div>
        <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="filter-div d-flex justify-content-between ">
            <div class="col-left">
                <?php if(!empty($wishlists)): ?>
                    <form method="post" action="<?php echo e(route('candidate.admin.savedjobs.delete')); ?>" class="filter-form filter-form-left d-flex justify-content-start">
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
            <p><i><?php echo e(__('Found :total items',['total'=>$wishlists->total()])); ?></i></p>
        </div>
        <div class="panel">
            <div class="panel-body">
                <form action="" class="bravo-form-item">
                    <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th width="60px"><input type="checkbox" class="check-all"></th>
                            <th><?php echo e(__('Job Title')); ?></th>
                            <th><?php echo e(__('Expiration Date')); ?></th>
                            <th><?php echo e(__('Location')); ?></th>
                            <th><?php echo e(__('Wage Agreement')); ?></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $wishlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wishlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $job = $jobs[$wishlist->object_id] ?? null;
                                $country = $job ? Nnjeim\World\Models\Country::find($job->country_id) : null;
                                $city = $job ? Nnjeim\World\Models\City::find($job->location_id) : null;
                            ?>

                            <?php if($job): ?>
                                <tr>
                                    
                                    <td><input type="checkbox" name="ids[]" value="<?php echo e($wishlist->id); ?>" class="check-item"></td>
                                    <td class="title">
                                        <a href="<?php echo e(url('admin/module/user/edit/' . $job->slug)); ?>"><?php echo e($job->title ?? ''); ?></a>
                                    </td>
                                    <td><?php echo e(display_date($job->expiration_date ?? '')); ?></td>
                                    <td><?php echo e($country->name ?? ''); ?>, <?php echo e($city->name ?? ''); ?></td>
                                    <td class="<?php echo e($job->wage_agreement == 1 ? 'badge badge-success' : 'badge badge-secondary'); ?>">
                                        <?php echo e($job->wage_agreement == 1 ? 'Yes' : 'No'); ?>

                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                    </div>
                </form>
                <?php echo e($wishlists->appends(request()->query())->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jobsning\modules/Candidate/Views/admin/savedjobs/index.blade.php ENDPATH**/ ?>