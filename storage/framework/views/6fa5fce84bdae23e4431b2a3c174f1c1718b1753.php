<!-- Job Detail Section -->
<section class="job-detail-section style-two">
    <div class="job-detail-outer">
        <div class="auto-container">
            <div class="row">
                <div class="content-column col-lg-8 col-md-12 col-sm-12">
                    <div class="job-block-outer">
                        <!-- Job Block -->
                        <div class="job-block-seven style-two">
                            <div class="inner-box">
                                <?php echo $__env->make("Job::frontend.layouts.details.upper-box", ['hide_avatar' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </div>


                    <div class="job-detail">
                        <?php echo @clean($translation->content); ?>

                    </div>

                    <?php echo $__env->make("Job::frontend.layouts.details.gallery", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php echo $__env->make("Job::frontend.layouts.details.video", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php echo $__env->make("Job::frontend.layouts.details.social-share", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php echo $__env->make("Job::frontend.layouts.details.related", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                </div>

                <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
                    <aside class="sidebar">
                        <?php echo $__env->make("Job::frontend.layouts.details.apply-button", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <div class="sidebar-widget">
                            <!-- Job Overview -->
                            <?php echo $__env->make("Job::frontend.layouts.details.overview", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <!-- Map Widget -->
                            <?php if($row->map_lat && $row->map_lng): ?>
                                <h4 class="widget-title"><?php echo e(__("Job Location")); ?></h4>
                                <div class="widget-content">
                                    <?php echo $__env->make("Job::frontend.layouts.details.location", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            <?php endif; ?>

                            <!-- Job Skills -->
                            <?php echo $__env->make("Job::frontend.layouts.details.skills", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                        <?php echo $__env->make("Job::frontend.layouts.details.company", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php if(!empty($row->company->id)): ?>
                            <?php echo $__env->make("Job::frontend.layouts.details.contact", ['origin_id' => $row->company->id, 'job_id' => $row->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>

                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Job Detail Section -->
<?php /**PATH /home/prolydnj/jobsning.com/modules/Job/Views/frontend/layouts/detail-ver/job-single-v4.blade.php ENDPATH**/ ?>