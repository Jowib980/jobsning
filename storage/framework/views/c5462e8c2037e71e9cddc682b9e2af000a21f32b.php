
<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="tnc-section">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2><?php echo e(__("My Bookmarks")); ?></h2>
            </div>
            <div class="blog-content">
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-content">
                            <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php if($rows->total() > 0): ?>
                                <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(!$row->service) continue; ?>
                                    <?php switch($row->object_model):
                                        case ('candidate'): ?>
                                            <div class="candidate-block-three p-0">
                                            <?php echo $__env->make('Candidate::frontend.layouts.loop.item-v1',['row'=>$row->service], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </div>
                                        <?php break; ?>
                                        <?php case ('job'): ?>
                                            <div class="job-block">
                                            <?php echo $__env->make('Job::frontend.layouts.loop.job-item-1',['row'=>$row->service], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </div>
                                        <?php break; ?>
                                        <?php case ('company'): ?>
                                            <?php echo $__env->make('Company::frontend.layouts.search.companies-loop',['row'=>$row->service], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php break; ?>
                                    <?php endswitch; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <div class="bravo-pagination d-flex justify-content-between">
                                    <span class="count-string"><?php echo e(__("Showing :from - :to of :total",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()])); ?></span>
                                    <?php echo e($rows->appends(request()->query())->links()); ?>

                                </div>
                            <?php else: ?>
                                <?php echo e(__("No Items")); ?>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/prolydnj/jobsning.com/modules/User/Views/frontend/wishList/index.blade.php ENDPATH**/ ?>