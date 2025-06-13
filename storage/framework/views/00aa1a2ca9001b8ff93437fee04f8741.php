<section class="ls-section map-layout">
    <div class="filters-backdrop"></div>

    <div class="ls-cotainer">
        <!-- Filters Column -->
        <div class="filters-column hide-left">
            <div class="inner-column">
                <div class="filters-outer">
                    <button type="button" class="theme-btn close-filters">X</button>
                    <?php echo $__env->make("Candidate::frontend.layouts.sidebars.category-sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>

        <!-- Map Column -->
        <div class="map-column width-50">
            <div id="bravo_results_map" class="results_map_inner" style="height: 100%"></div>
        </div>

        <!-- Content Column -->
        <div class="content-column width-50">
            <div class="ls-outer">
                <?php if(!empty($rows) && count($rows) > 0): ?>
                    <div class="ls-switcher">
                        <div class="showing-result show-filters">
                            <button type="button" class="theme-btn toggle-filters"><span class="icon icon-filter"></span> <?php echo e(__('Filter')); ?></button>
                        </div>
                        <form class="bc-form-order" method="get">
                            <div class="sort-by">
                                <input type="hidden" name="_layout" value="<?php echo e($layout); ?>" />
                                <select class="chosen-select" name="orderby" onchange="this.form.submit()">
                                    <option value=""><?php echo e(__('Sort by (Default)')); ?></option>
                                    <option value="new" <?php if(request()->get('orderby') == 'new'): ?> selected <?php endif; ?>><?php echo e(__('Newest')); ?></option>
                                    <option value="old" <?php if(request()->get('orderby') == 'old'): ?> selected <?php endif; ?>><?php echo e(__('Oldest')); ?></option>
                                    <option value="name_high" <?php if(request()->get('orderby') == 'name_high'): ?> selected <?php endif; ?>><?php echo e(__('Name [a->z]')); ?></option>
                                    <option value="name_low" <?php if(request()->get('orderby') == 'name_low'): ?> selected <?php endif; ?>><?php echo e(__('Name [z->a]')); ?></option>
                                </select>

                                <select class="chosen-select" name="limit" onchange="this.form.submit()">
                                    <option value="10" <?php if(request()->get('limit') == 10): ?> selected <?php endif; ?> ><?php echo e(__("Show 10")); ?></option>
                                    <option value="20" <?php if(request()->get('limit') == 20): ?> selected <?php endif; ?> ><?php echo e(__("Show 20")); ?></option>
                                    <option value="30" <?php if(request()->get('limit') == 30): ?> selected <?php endif; ?> ><?php echo e(__("Show 30")); ?></option>
                                    <option value="40" <?php if(request()->get('limit') == 40): ?> selected <?php endif; ?> ><?php echo e(__("Show 40")); ?></option>
                                    <option value="50" <?php if(request()->get('limit') == 50): ?> selected <?php endif; ?> ><?php echo e(__("Show 50")); ?></option>
                                    <option value="60" <?php if(request()->get('limit') == 60): ?> selected <?php endif; ?> ><?php echo e(__("Show 60")); ?></option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="candidate-block-three">
                            <?php echo $__env->make("Candidate::frontend.layouts.loop.item-v1",['hide_profile' => 1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <div class="ls-pagination">
                        <?php echo e($rows->appends(request()->query())->links()); ?>

                    </div>
                <?php else: ?>
                    <div class="candidate-results-not-found">
                        <h3><?php echo e(__("No candidate results found")); ?></h3>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php $__env->startSection('footer'); ?>
    <?php echo App\Helpers\MapEngine::scripts(); ?>

    <script>
        var bravo_map_data = {
            markers:<?php echo json_encode($markers); ?>,
            center: [<?php echo e(!empty($markers[0]['lat']) ? $markers[0]['lat'] : 40.80); ?>, <?php echo e(!empty($markers[0]['lng']) ? $markers[0]['lng'] : -73.70); ?>]
        };
    </script>
    <script type="text/javascript" src="<?php echo e(asset('module/candidate/js/candidate-map.js?_ver='.config('app.asset_version'))); ?>"></script>
    <script>
        jQuery(".view-more").on("click", function () {
            jQuery(this).closest('ul').find('li.tg').toggleClass("d-none");
            jQuery(this).find('.tg-text').toggleClass('d-none');
        });
    </script>
<?php $__env->stopSection(); ?>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Candidate\Views\frontend\layouts\search\candidate-list-v5.blade.php ENDPATH**/ ?>