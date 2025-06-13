<div class="bravo-companies job-detail-section">
    <div class="job-detail-outer">
        <div class="auto-container">
            <div class="row">
                <div class="content-column col-lg-8 col-md-12 col-sm-12">
                    <div class="job-detail">
                        <h4><?php echo e(__("About Company")); ?></h4>
                        <?php echo $translation->about; ?>

                    </div>
                    <!-- Related Jobs -->
                    <div class="related-jobs">
                        <?php if($row->job_count > 0): ?>
                            <div class="title-box">
                                <h3><?php echo e(__(":count jobs at :title",["count"=>$row->job_count, "title"=> $translation->name])); ?></h3>
                            </div>
                        <?php endif; ?>
                        <?php if($jobs->count() > 0): ?>
                            <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="job-block">
                                    <?php echo $__env->make('Job::frontend.layouts.loop.job-item-1', ['row' => $job], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <div class="ls-pagination">
                            <?php echo e($jobs->appends(request()->query())->links()); ?>

                            <?php if($jobs->total() > 0): ?>
                                <span class="count-string"><?php echo e(__("Showing :from - :to of :total",["from"=>$jobs->firstItem(),"to"=>$jobs->lastItem(),"total"=>$jobs->total()])); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
                    <aside class="sidebar">
                    <div class="btn-box">
                        <a href="#" class="theme-btn btn-style-one btn-send-message">Send Message</a>
                        <button class="bookmark-btn <?php if($row->wishlist): ?> active <?php endif; ?> service-wishlist" data-id="<?php echo e($row->id); ?>" data-type="<?php echo e($row->type); ?>"><i class="flaticon-bookmark"></i></button>
                    </div>
                    <?php echo $__env->make('Company::frontend.layouts.details.companies-sidebar-v3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('Job::frontend.layouts.details.contact',['origin_id'=>$row->id,'job_id'=>false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Company\Views\frontend\layouts\details\ver\company-single-v3.blade.php ENDPATH**/ ?>