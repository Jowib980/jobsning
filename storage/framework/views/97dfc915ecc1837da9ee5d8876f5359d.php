
<?php $__env->startSection('title','All Applicants'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb-4">
            <h1 class="title-bar"><?php echo e(__("All Applicants")); ?></h1>
        </div>
        <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="filter-div d-flex justify-content-between ">
            <div class="col-left">
                <?php if(!empty($rows)): ?>
                    <form method="post" action="<?php echo e(route('job.admin.applicants.bulkEdit')); ?>" class="filter-form filter-form-left d-flex justify-content-start">
                        <?php echo e(csrf_field()); ?>

                        <select name="action" class="form-control">
                            <option value=""><?php echo e(__(" Bulk Actions ")); ?></option>
                            <option value="approved"><?php echo e(__("Approved")); ?></option>
                            <option value="rejected"><?php echo e(__("Rejected")); ?></option>
                        </select>
                        <button data-confirm="<?php echo e(__("Do you want to delete?")); ?>" class="btn-info btn btn-icon dungdt-apply-form-btn" type="button"><?php echo e(__('Apply')); ?></button>
                        <a class="btn btn-warning btn-icon" href="<?php echo e(route('job.admin.applicants.export')); ?>"
                           target="_blank" title="<?php echo e(__("Export to excel")); ?>"><i class="icon ion-md-cloud-download"></i>&nbsp;<?php echo e(__("Export")); ?>

                        </a>
                    </form>
                <?php endif; ?>
            </div>
            <div class="col-left">
                <form method="get" action="<?php echo e(route("job.admin.allApplicants")); ?> " class="filter-form filter-form-right d-flex justify-content-end flex-column flex-sm-row" role="search">
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
                        ] : false);

                        $candidate = \App\User::find(Request()->input('candidate_id'));
                        \App\Helpers\AdminForm::select2('candidate_id', [
                            'configs' => [
                                'ajax'        => [
                                    'url' => route('candidate.admin.getForSelect2'),
                                    'dataType' => 'json'
                                ],
                                'allowClear'  => true,
                                'placeholder' => __('-- Select Candidate --')
                            ]
                        ], !empty($candidate->id) ? [
                            $candidate->id,
                            $candidate->getDisplayName() . ' (#' . $candidate->id . ')'
                        ] : false)
                        ?>
                    <?php endif; ?>
                    <?php
                        $job = \Modules\Job\Models\Job::find(Request()->input('job_id'));
                        \App\Helpers\AdminForm::select2('job_id', [
                            'configs' => [
                                'ajax'        => [
                                    'url' => route('job.admin.getForSelect2'),
                                    'dataType' => 'json'
                                ],
                                'allowClear'  => true,
                                'placeholder' => __('-- Select Job --')
                            ]
                        ], !empty($job->id) ? [
                            $job->id,
                            $job->title . ' (#' . $job->id . ')'
                        ] : false);
                    ?>

                    <button class="btn-info btn btn-icon btn_search" type="submit"><?php echo e(__('Search')); ?></button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <form action="" class="bravo-form-item">
                            <div class="table-responsive">
                                <table class="table table-hover table-vertical-middle">
                                    <thead>
                                    <tr>
                                        <th width="60px"><input type="checkbox" class="check-all"></th>
                                        <th class="title"> <?php echo e(__('Candidate')); ?></th>
                                        <th> <?php echo e(__('Job Title')); ?></th>
                                        <th width="150px"> <?php echo e(__('CV')); ?></th>
                                        <th width="150px"> <?php echo e(__('Date Applied')); ?></th>
                                        <th width="100px"> <?php echo e(__('Status')); ?></th>
                                        <th width="100px"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if($rows->total() > 0): ?>
                                        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="<?php echo e($row->status); ?>">
                                                <td><input type="checkbox" name="ids[]" class="check-item" value="<?php echo e($row->id); ?>">
                                                </td>
                                                <td>
                                                    <?php if(!empty($row->candidateInfo->getAuthor->getDisplayName())): ?>
                                                        <a href="<?php echo e($row->candidateInfo->getDetailUrl()); ?>" target="_blank">
                                                            <img src="<?php echo e($row->candidateInfo->getAuthor->getAvatarUrl()); ?>" style="border-radius: 50%" class="company-logo" />
                                                            <?php echo e($row->candidateInfo->getAuthor->getDisplayName() ?? ''); ?>

                                                        </a>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="title">
                                                    <a href="<?php echo e($row->jobInfo->getDetailUrl()); ?>" target="_blank"><?php echo e($row->jobInfo->title); ?></a>
                                                </td>
                                                <td>
                                                    <?php if(!empty($row->cvInfo->file_id)): ?>
                                                        <?php $file = (new \Modules\Media\Models\MediaFile())->findById($row->cvInfo->file_id) ?>
                                                        <a href="<?php echo e(\Modules\Media\Helpers\FileHelper::url($row->cvInfo->file_id)); ?>" target="_blank" download>
                                                            <?php echo e($file->file_name.'.'.$file->file_extension); ?>

                                                        </a>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e(display_date($row->created_at)); ?></td>
                                                <!-- <td><span class="badge badge-<?php echo e($row->status); ?>"><?php echo e($row->status); ?></span></td> -->
                                                <td>
                                                    <?php
                                                        $badgeClass = 'badge-';
                                                        $customStyle = '';

                                                        if ($row->status === 'hired') {
                                                            $customStyle = 'background-color: #28a745; color: white;';
                                                        } elseif ($row->status === 'interview scheduled') {
                                                            $customStyle = 'background-color: #f49c2d; color: white;';
                                                        } else {
                                                            $badgeClass .= $row->status; // fallback to default class
                                                        }
                                                    ?>

                                                    <span class="badge <?php echo e($badgeClass); ?>" style="<?php echo e($customStyle); ?>">
                                                        <?php echo e($row->status); ?>

                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <?php echo e(__("Actions")); ?>

                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-applied-<?php echo e($row->id); ?>"><?php echo e(__("Detail")); ?></a>
                                                            <a class="dropdown-item" href="<?php echo e(route('job.admin.applicants.changeStatus', ['status' => 'approved', 'id' => $row->id])); ?>"><?php echo e(__("Approved")); ?></a>
                                                            <a class="dropdown-item" href="<?php echo e(route('job.admin.applicants.changeStatus', ['status' => 'rejected', 'id' => $row->id])); ?>"><?php echo e(__("Rejected")); ?></a>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade" id="modal-applied-<?php echo e($row->id); ?>">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                                            <div class="modal-content">

                                                                <div class="modal-header">
                                                                    <h4 class="modal-title"><?php echo e(__("Applied Detail")); ?></h4>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <div class="info-form">
                                                                        <div class="applied-list">
                                                                            <div class="applied-item">
                                                                                <div class="label"><?php echo e(__("Candidate:")); ?></div>
                                                                                <div class="val">
                                                                                    <?php if(!empty($row->candidateInfo->getAuthor->getDisplayName())): ?>
                                                                                        <a href="<?php echo e($row->candidateInfo->getDetailUrl()); ?>" target="_blank">
                                                                                            <img src="<?php echo e($row->candidateInfo->getAuthor->getAvatarUrl()); ?>" style="border-radius: 50%" class="company-logo" />
                                                                                            <?php echo e($row->candidateInfo->getAuthor->getDisplayName() ?? ''); ?>

                                                                                        </a>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="applied-item">
                                                                                <div class="label"><?php echo e(__('Job Title:')); ?></div>
                                                                                <div class="val">
                                                                                    <a href="<?php echo e($row->jobInfo->getDetailUrl()); ?>" target="_blank"><?php echo e($row->jobInfo->title); ?></a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="applied-item">
                                                                                <div class="label"><?php echo e(__("CV:")); ?></div>
                                                                                <div class="val">
                                                                                    <?php if(!empty($row->cvInfo->file_id)): ?>
                                                                                        <?php $file = (new \Modules\Media\Models\MediaFile())->findById($row->cvInfo->file_id) ?>
                                                                                        <a href="<?php echo e(\Modules\Media\Helpers\FileHelper::url($row->cvInfo->file_id)); ?>" target="_blank" download>
                                                                                            <?php echo e($file->file_name.'.'.$file->file_extension); ?>

                                                                                        </a>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="applied-item">
                                                                                <div class="label"><?php echo e(__("Message:")); ?></div>
                                                                                <div class="val"><?php echo e($row->message); ?></div>
                                                                            </div>
                                                                            <div class="applied-item">
                                                                                <div class="label"><?php echo e(__("Date Applied:")); ?></div>
                                                                                <div class="val"><?php echo e(display_date($row->created_at)); ?></div>
                                                                            </div>
                                                                            <div class="applied-item">
                                                                                <div class="label"><?php echo e(__("Status:")); ?></div>
                                                                                <div class="val"><span class="badge badge-<?php echo e($row->status); ?>"><?php echo e($row->status); ?></span></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <span class="btn btn-secondary" data-dismiss="modal"><?php echo e(__("Close")); ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                    <button class="btn btn-link btn-sm p-0 m-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            &#8942; 
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#"><?php echo e(__("Message")); ?></a>
                                                            <a class="dropdown-item" href="<?php echo e(route('job.admin.applicants.changeStatus', ['status' => 'approved', 'id' => $row->id])); ?>"><?php echo e(__("Call")); ?></a>
                                                            <?php if( $row->status == 'hired'): ?>
                                                            <p class="dropdown-item" style="color:grey; background-color: lightgray;"><?php echo e(__("Setup Interview")); ?></p>
                                                           <?php elseif($row->status === 'interview scheduled' && $row->interview_date): ?>
                                                                <span class="dropdown-item">
                                                                    <?php echo e(__("Scheduled:")); ?> <?php echo e(\Carbon\Carbon::parse($row->interview_date)->format('M d, Y')); ?>

                                                                    <?php echo e(\Carbon\Carbon::parse($row->interview_time)->format('h:i A')); ?>

                                                                </span>
                                                            <?php else: ?>
                                                             <a class="dropdown-item" href="#" data-toggle="modal" data-target="#interview-modal-<?php echo e($row->id); ?>"><?php echo e(__("Setup Interview")); ?></a>
                                                            <?php endif; ?>
                                                        <form method="POST" action="<?php echo e(route('job.admin.removeApplicant', $row->id)); ?>">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('DELETE'); ?>
                                                            <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Are you sure you want to delete this applicant?')">Delete
                                                            </button>
                                                        </form>
                                                           <?php if($row->status == 'hired'): ?>
                                                           <p class="dropdown-item" style="color: grey; background-color:lightgray;"><?php echo e(__("Mark as Hired")); ?></p>
                                                           <?php else: ?>
                                                            <a class="dropdown-item" href="<?php echo e(route('job.admin.applicants.changeStatus', ['status' => 'hired', 'id' => $row->id])); ?>"><?php echo e(__("Mark as Hired")); ?></a>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <!-- Interview Modal -->
                                                    <div class="modal fade" id="interview-modal-<?php echo e($row->id); ?>" tabindex="-1" role="dialog" aria-labelledby="interviewModalLabel<?php echo e($row->id); ?>" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                            <div class="modal-content">

                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="interviewModalLabel<?php echo e($row->id); ?>"><?php echo e(__("Setup Interview")); ?></h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>

                                                                <form action="<?php echo e(route('job.admin.interviewSetup', $row->id)); ?>" method="post">
                                                                    <?php echo csrf_field(); ?>
                                                                    <div class="modal-body">
                                                                        <div class="info-form">
                                                                            <div class="applied-list">
                                                                                <div class="applied-item">
                                                                                    <div class="label"><?php echo e(__("Candidate:")); ?></div>
                                                                                    <div class="val">
                                                                                        <?php if(!empty($row->candidateInfo->getAuthor->getDisplayName())): ?>
                                                                                            <a href="<?php echo e($row->candidateInfo->getDetailUrl()); ?>" target="_blank">
                                                                                                <img src="<?php echo e($row->candidateInfo->getAuthor->getAvatarUrl()); ?>" style="border-radius: 50%" class="company-logo" />
                                                                                                <?php echo e($row->candidateInfo->getAuthor->getDisplayName() ?? ''); ?>

                                                                                            </a>
                                                                                        <?php endif; ?>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="applied-item">
                                                                                    <div class="label"><?php echo e(__('Interview Date:')); ?></div>
                                                                                    <div class="val">
                                                                                        <input type="date" name="interview_date" class="form-control" required>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="applied-item">
                                                                                    <div class="label"><?php echo e(__("Scheduled Time:")); ?></div>
                                                                                    <div class="val">
                                                                                        <input type="time" name="interview_time" class="form-control" required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary"><?php echo e(__("Save")); ?></button>
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__("Close")); ?></button>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>
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
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jobsning\modules\Job\Views\admin\job\all-applicants.blade.php ENDPATH**/ ?>