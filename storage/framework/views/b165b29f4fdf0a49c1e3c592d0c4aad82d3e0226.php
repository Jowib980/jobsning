<section class="ls-section style-two">
    <div class="filters-backdrop"></div>

    <div class="row no-gutters">
        <!-- Filters Column -->
        <div class="filters-column col-xl-3 col-lg-4 col-md-12 col-sm-12">
            <div class="inner-column">
                <div class="filters-outer">
                    <button type="button" class="theme-btn close-filters">X</button>

                    <?php echo $__env->make("Job::frontend.layouts.form-search.form-style-1", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                </div>
            </div>
        </div>

        <!-- Content Column -->
        <div class="content-column col-xl-9 col-lg-8 col-md-12 col-sm-12">
            <div class="ls-outer">
                <button type="button" class="theme-btn btn-style-two toggle-filters"><?php echo e(__("Show Filters")); ?></button>

                <?php if(!empty($rows) && count($rows) > 0): ?>
                    <!-- ls Switcher -->
                    <div class="ls-switcher">
                        <div class="showing-result">
                            <div class="text"><?php echo e(__("Showing")); ?> <strong><?php echo e($rows->firstItem()); ?>-<?php echo e($rows->lastItem()); ?></strong> <?php echo e(__("of")); ?> <strong><?php echo e($rows->total()); ?></strong> <?php echo e(__("jobs")); ?></div>
                        </div>
                        <div class="sort-by">
                            <form class="bc-form-order" method="get" action="<?php echo e(route('job.search')); ?>">
                                <?php echo $__env->make("Job::frontend.layouts.search.order-sort", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </form>
                        </div>
                    </div>

                    <div class="row">
                        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="job-block col-lg-6 col-md-12 col-sm-12">
                                <?php echo $__env->make("Job::frontend.layouts.loop.job-item-1", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <!-- Listing pagination -->
                    <div class="ls-pagination">
                        <?php echo e($rows->appends(request()->query())->links()); ?>

                    </div>
                <?php else: ?>
                    <div class="job-results-not-found">
                        <h3><?php echo e(__("No job results found")); ?></h3>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/prolydnj/jobsning.com/modules/Job/Views/frontend/layouts/search/job-list-v4.blade.php ENDPATH**/ ?>