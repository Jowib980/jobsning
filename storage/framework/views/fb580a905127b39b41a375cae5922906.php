<!-- Job Detail Section -->
<section class="job-detail-section style-three">
    <!-- Upper Box -->
    <div class="upper-box">
        <div class="auto-container">
            <!-- Job Block -->
            <div class="job-block-seven style-three">
                <div class="inner-box">

                    <?php echo $__env->make("Job::frontend.layouts.details.upper-box", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php echo $__env->make("Job::frontend.layouts.details.apply-button", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="job-detail-outer">
        <div class="auto-container">
            <div class="row">
                <div class="content-column col-lg-8 offset-2 col-md-12 col-sm-12">
                    <?php echo $__env->make("Job::frontend.layouts.details.overview-2", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="job-detail">
                        <?php echo @clean($translation->content); ?>

                    </div>

                    <?php echo $__env->make("Job::frontend.layouts.details.gallery", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php echo $__env->make("Job::frontend.layouts.details.video", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <!-- Other Options -->
                    <?php echo $__env->make("Job::frontend.layouts.details.social-share", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php if($row->map_lat && $row->map_lng): ?>
                        <?php echo $__env->make("Job::frontend.layouts.details.location", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>

                    <!-- Related Jobs -->
                    <?php echo $__env->make("Job::frontend.layouts.details.related", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Job Detail Section -->
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Job\Views\frontend\layouts\detail-ver\job-single-v5.blade.php ENDPATH**/ ?>