<!-- Listing Section -->
<section class="ls-section map-layout">
    <div class="filters-backdrop"></div>

    <div class="ls-cotainer">
        <!-- Filters Column -->
        <div class="filters-column hide-left">
            <div class="inner-column">
                <div class="filters-outer">
                    <button type="button" class="theme-btn close-filters">X</button>

                    <?php echo $__env->make("Job::frontend.layouts.form-search.form-style-1", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                </div>
            </div>
        </div>

        <!-- Map Column -->
        <div class="map-column width-50">
            <div id="bc_results_map" class="bc-map">
                <!-- map goes here -->
            </div>
        </div>


        <!-- Content Column -->
        <div class="content-column width-50">
            <div class="ls-outer">
                <?php if(!empty($rows) && count($rows) > 0): ?>
                    <!-- ls Switcher -->
                    <div class="ls-switcher">
                        <div class="showing-result show-filters">
                            <button type="button" class="theme-btn toggle-filters"><span class="icon icon-filter"></span> <?php echo e(__("Filter")); ?></button>
                        </div>
                        <div class="sort-by">
                            <?php echo $__env->make("Job::frontend.layouts.search.order-sort", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>

                    <div class="row">
                        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="job-block col-lg-12 col-md-12 col-sm-12">
                                <?php echo $__env->make("Job::frontend.layouts.loop.job-item-1", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <!-- Listing pagination -->
                    <div class="ls-pagination">
                        <?php echo e($rows->appends(request()->query())->links()); ?>

                    </div>
                <?php else: ?>
                    <div class="ls-switcher">
                        <div class="showing-result show-filters">
                            <button type="button" class="theme-btn toggle-filters"><span class="icon icon-filter"></span> <?php echo e(__("Filter")); ?></button>
                        </div>
                    </div>
                    <div class="job-results-not-found">
                        <h3><?php echo e(__("No job results found")); ?></h3>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>
<!--End Listing Page Section -->
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Job\Views\frontend\layouts\search\job-list-v9.blade.php ENDPATH**/ ?>