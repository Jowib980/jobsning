<!--Page Title-->
<section class="page-title style-two">
    <div class="auto-container">
        <!-- Job Search Form -->
        <div class="job-search-form">
            <?php echo $__env->make("Job::frontend.layouts.form-search.form-banner-1", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <!-- Job Search Form -->
    </div>
</section>
<!--End Page Title-->

<!-- Listing Section -->
<section class="ls-section">
    <div class="auto-container">
        <div class="filters-backdrop"></div>

        <div class="row">

            <!-- Filters Column -->
            <div class="filters-column col-lg-4 col-md-12 col-sm-12">
                <div class="inner-column">
                    <div class="filters-outer">
                        <button type="button" class="theme-btn close-filters">X</button>
                        <?php echo $__env->make("Job::frontend.layouts.form-search.form-style-1", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php
                    $job_sidebar_cta = setting_item_with_lang('job_sidebar_cta',request()->query('lang'), $settings['job_sidebar_cta'] ?? false);
                    if(!empty($job_sidebar_cta)) $job_sidebar_cta = json_decode($job_sidebar_cta);
                ?>
                <?php if(!empty($job_sidebar_cta->title)): ?>
                    <!-- Call To Action -->
                        <div class="call-to-action-four">
                            <h5><?php echo e($job_sidebar_cta->title ?? ''); ?></h5>
                            <p><?php echo e($job_sidebar_cta->desc ?? ''); ?></p>
                            <?php if(!empty($job_sidebar_cta->button->url)): ?>
                                <a href="<?php echo e(($job_sidebar_cta->button->url)); ?>" target="<?php echo e($job_sidebar_cta->button->target ?? "_self"); ?>" class="theme-btn btn-style-one bg-blue">
                                    <span class="btn-title"><?php echo e($job_sidebar_cta->button->name ?? __("Start Recruiting Now")); ?></span>
                                </a>
                            <?php endif; ?>
                            <div class="image" style="background-image: url(<?php echo e(!empty($job_sidebar_cta->image) ? \Modules\Media\Helpers\FileHelper::url($job_sidebar_cta->image, 'full') : ''); ?>);"></div>
                        </div>
                        <!-- End Call To Action -->
                    <?php endif; ?>
                </div>
            </div>

            <!-- Content Column -->
            <div class="content-column col-lg-8 col-md-12 col-sm-12">
                <div class="ls-outer">
                    <button type="button" class="theme-btn btn-style-two toggle-filters"><?php echo e(__("Show Filters")); ?></button>

                <?php if(!empty($rows) && count($rows) > 0): ?>
                    <!-- ls Switcher -->
                        <div class="ls-switcher">
                            <div class="showing-result">
                                <div class="text"><?php echo e(__("Showing")); ?> <strong><?php echo e($rows->firstItem()); ?>-<?php echo e($rows->lastItem()); ?></strong> <?php echo e(__("of")); ?> <strong><?php echo e($rows->total()); ?></strong> <?php echo e(__("jobs")); ?></div>
                            </div>
                            <div class="sort-by">
                                <form class="bc-form-order" method="get" action="<?php echo e(route('job.search')); ?>" >
                                    <?php echo $__env->make("Job::frontend.layouts.search.order-sort", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </form>
                            </div>
                        </div>

                        <div class="row">
                            <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="job-block-four col-lg-6 col-md-6 col-sm-12">
                                    <?php echo $__env->make("Job::frontend.layouts.loop.job-item-4", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                    <!-- Pagination -->
                        <nav class="ls-pagination">
                            <?php echo e($rows->appends(request()->query())->links()); ?>

                        </nav>

                    <?php else: ?>
                        <div class="job-results-not-found">
                            <h3><?php echo e(__("No job results found")); ?></h3>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Listing Page Section -->
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Job\Views\frontend\layouts\search\job-list-v6.blade.php ENDPATH**/ ?>