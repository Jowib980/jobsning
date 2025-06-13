<!--Page Title-->
<section class="page-title">
    <div class="auto-container">
        <!-- Job Search Form -->
        <form method="GET" action="<?php echo e(route('companies.index')); ?>">
            <?php if(Request::query('_layout')): ?>
                <input type="hidden" name="_layout" value="<?php echo e(Request::query('_layout')); ?>">
            <?php endif; ?>
            <div class="company-search-form">
                <div class="row">
                    <!-- Form Group -->
                <?php echo $__env->make("Company::frontend.layouts.sidebars.fields.style-3.keyword", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- Form Group -->
                <?php echo $__env->make("Company::frontend.layouts.sidebars.fields.style-3.location", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- Form Group -->
                <?php echo $__env->make("Company::frontend.layouts.sidebars.fields.style-3.category", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- Form Group -->
                    <div class="form-group col-lg-2 col-md-12 col-sm-12 text-right">
                        <button type="submit" class="theme-btn btn-style-one"><?php echo e(__("Find Employers")); ?></button>
                    </div>
                </div>
            </div>
            <!-- Job Search Form -->
            <div class="top-filters">
                <?php echo $__env->make("Company::frontend.layouts.sidebars.fields.style-3.team_size", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make("Company::frontend.layouts.sidebars.fields.style-3.founded_date", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </form>
    </div>
</section>
<!--End Page Title-->
<!-- Listing Section -->
<section class="ls-section">
    <div class="auto-container">
        <div class="filters-backdrop"></div>
        <div class="row">
            <!-- Content Column -->
            <div class="content-column col-lg-12 col-md-12 col-sm-12">
                <div class="ls-outer">
                    <button type="button" class="theme-btn btn-style-two toggle-filters"><?php echo e(__("Show Filters")); ?></button>
                    <!-- ls Switcher -->
                    <div class="ls-switcher">
                        <div class="showing-result">
                            <div class="text"><?php echo e(__("Showing :from - :to of :total",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()])); ?></div>
                        </div>
                        <?php echo $__env->make('Company::frontend.layouts.search.company-sort', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <!-- Block Block -->
                    <?php if($rows->count() > 0): ?>
                        <div class="row">
                            <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $__env->make('Company::frontend.layouts.loop.company-item-3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-danger">
                            <?php echo e(__("Sorry, but nothing matched your search terms. Please try again with some different keywords.")); ?>

                        </div>
                    <?php endif; ?>
                    <div class="bravo-pagination">
                        <?php echo e($rows->appends(request()->query())->links()); ?>

                        <?php if($rows->total() > 0): ?>
                            <span class="count-string"><?php echo e(__("Showing :from - :to of :total",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()])); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Listing Page Section -->
<?php $__env->startSection('footer'); ?>
    <script>
        <?php if(!empty(Request::query('from_date')) && !empty(Request::query('to_date'))): ?>
        $(document).on('ready', function () {
            var range_from = '<?php echo e(Request::query('from_date')); ?>';
            var range_to = '<?php echo e(Request::query('to_date')); ?>';
            $(".range-slider-one .range-slider").slider('values',0,range_from);
            $(".range-slider-one .range-slider").slider('values',1,range_to);
            $( ".range-slider-one .count" ).text( range_from + " - " + range_to );
        });
        <?php endif; ?>
    </script>
<?php $__env->stopSection(); ?>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Company\Views\frontend\layouts\search\company-list-v3.blade.php ENDPATH**/ ?>