
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar"><?php echo e(__("All Jobs")); ?></h1>
            <div class="title-actions">
                <a href="<?php echo e(route('job.admin.create')); ?>" class="btn btn-primary"><?php echo e(__("Add new job")); ?></a>
            </div>
        </div>
        <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="filter-div d-flex justify-content-between ">
            <div class="col-left">
                <?php if(!empty($rows)): ?>
                    <form method="post" action="<?php echo e(url('admin/module/job/bulkEdit')); ?>" class="filter-form filter-form-left d-flex justify-content-start">
                        <?php echo e(csrf_field()); ?>

                        <select name="action" class="form-control">
                            <option value=""><?php echo e(__(" Bulk Actions ")); ?></option>
                            <option value="publish"><?php echo e(__(" Publish ")); ?></option>
                            <option value="draft"><?php echo e(__(" Move to Draft ")); ?></option>
                            <option value="delete"><?php echo e(__(" Delete ")); ?></option>
                        </select>
                        <button data-confirm="<?php echo e(__("Do you want to delete?")); ?>" class="btn-default btn btn-icon dungdt-apply-form-btn" type="button"><?php echo e(__('Apply')); ?></button>
                    </form>
                <?php endif; ?>
            </div>
            <div class="col-left">
                <form method="get" action="<?php echo e(route('job.admin.index')); ?>" class="filter-form filter-form-right d-flex justify-content-end flex-column flex-sm-row" role="search">
                    <?php if(is_admin()): ?>
                        <?php
                        $company = \Modules\Company\Models\Company::find(Request()->input('company_id'));
                        \App\Helpers\AdminForm::select2('company_id', [
                            'configs' => [
                                'ajax'        => [
                                    'url' => route('company.admin.getForSelect2'),
                                    'dataType' => 'json'
                                ],
                                'allowClear'  => true,
                                'placeholder' => __('-- Select Company --')
                            ]
                        ], !empty($company->id) ? [
                            $company->id,
                            $company->name . ' (#' . $company->id . ')'
                        ] : false)
                        ?>
                    <?php endif; ?>
                    <input type="text" name="s" value="<?php echo e(Request()->input('s')); ?>" placeholder="<?php echo e(__('Search by name')); ?>" class="form-control">
                    <button class="btn-default btn btn-icon btn_search" type="submit"><?php echo e(__('Search')); ?></button>
                </form>
            </div>
        </div>
        <div class="text-right">
            <p><i><?php echo e(__('Found :total items',['total'=>$rows->total()])); ?></i></p>
        </div>
        <div class="panel">
            <div class="panel-body">
                <form action="" class="bravo-form-item">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th width="60px"><input type="checkbox" class="check-all"></th>
                                <th> <?php echo e(__('Title')); ?></th>
                                <th width="200px"> <?php echo e(__('Location')); ?></th>
                                <th width="150px"> <?php echo e(__('Category')); ?></th>
                                <th width="150px"> <?php echo e(__('Company')); ?></th>
                                <th width="100px"> <?php echo e(__('Status')); ?></th>
                                <th width="100px"> <?php echo e(__('Published Date')); ?></th>
                                <th colspan="2"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if($rows->total() > 0): ?>
                                <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="<?php echo e($row->status); ?>">
                                        <td><input type="checkbox" name="ids[]" class="check-item" value="<?php echo e($row->id); ?>">
                                        </td>
                                        <td class="title">
                                            <a href="<?php echo e($row->getEditUrl()); ?>"><?php echo e($row->title); ?></a>
                                        </td>
                                        <td><?php echo e($row->location->name ?? ''); ?></td>
                                        <td><?php echo e($row->category->name ?? ''); ?></td>
                                        <td><?php echo e($row->company->name ?? ''); ?></td>
                                        <!-- <td><span class="badge badge-<?php echo e($row->status); ?>"><?php echo e($row->status); ?></span></td> -->
                                        <td>
                                            <?php
                                                $badgeClass = 'badge-';
                                                $customStyle = '';

                                                if ($row->status === 'pause') {
                                                    $customStyle = 'background-color: #f3af33; color: white;';
                                                } elseif ($row->status === 'closed') {
                                                    $customStyle = 'background-color: #f13434; color: white;';
                                                } else {
                                                    $badgeClass .= $row->status; // fallback to default class
                                                }
                                            ?>

                                            <span class="badge <?php echo e($badgeClass); ?>" style="<?php echo e($customStyle); ?>">
                                                <?php echo e($row->status); ?>

                                            </span>
                                        </td>

                                        <td><?php echo e(display_date($row->updated_at)); ?></td>
                                        <?php if($row->status != 'closed'): ?>
                                        <td>
                                            <a href="<?php echo e($row->getEditUrl()); ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                        </td>
                                        <?php endif; ?>
                                        <!-- <td>
                                            <form action="<?php echo e(route('job.admin.removeJob', $row->id)); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this applicant?')"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td> -->
                                        <?php if($row->status != 'closed'): ?>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-link btn-sm p-0 m-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    &#8942; 
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="<?php echo e(route('job.admin.job.changeStatus', ['status' => 'pause', 'id' => $row->id])); ?>"><?php echo e(__("Pause")); ?></a>

                                                    <a class="dropdown-item" href="<?php echo e(route('job.admin.job.changeStatus', ['status' => 'publish', 'id' => $row->id])); ?>"><?php echo e(__("Open")); ?></a>

                                                    <a class="dropdown-item" href="<?php echo e(route('job.admin.job.changeStatus', ['status' => 'closed', 'id' => $row->id])); ?>"><?php echo e(__("Close")); ?></a>

                                            </div>
                                        </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7"><?php echo e(__("No data")); ?></td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </form>
                <?php echo e($rows->appends(request()->query())->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jobsning\modules/Job/Views/admin/job/index.blade.php ENDPATH**/ ?>