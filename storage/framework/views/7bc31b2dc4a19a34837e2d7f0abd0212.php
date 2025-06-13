<div class="listing-maps">
    <div id="bravo_results_map" class="results_map_inner" style="min-height: 500px"></div>
</div>

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
                        <?php echo $__env->make("Candidate::frontend.layouts.sidebars.category-sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                <?php
                    $candidate_sidebar_cta = setting_item_with_lang('candidate_sidebar_cta',request()->query('lang'), $settings['candidate_sidebar_cta'] ?? false);
                    if(!empty($candidate_sidebar_cta)) $candidate_sidebar_cta = json_decode($candidate_sidebar_cta);

                ?>
                <?php if(!empty($candidate_sidebar_cta->title)): ?>
                    <!-- Call To Action -->
                        <div class="call-to-action-four">
                            <h5><?php echo e($candidate_sidebar_cta->title ?? ''); ?></h5>
                            <p><?php echo e($candidate_sidebar_cta->desc ?? ''); ?></p>
                            <?php if(!empty($candidate_sidebar_cta->button->url)): ?>
                                <a href="<?php echo e(($candidate_sidebar_cta->button->url)); ?>" target="_<?php echo e($candidate_sidebar_cta->button->target ?? "self"); ?>" class="theme-btn btn-style-one bg-blue">
                                    <span class="btn-title"><?php echo e($candidate_sidebar_cta->button->name ?? __("Start Recruiting Now")); ?></span>
                                </a>
                            <?php endif; ?>
                            <div class="image" style="background-image: url(<?php echo e(!empty($candidate_sidebar_cta->image) ? \Modules\Media\Helpers\FileHelper::url($candidate_sidebar_cta->image, 'full') : ''); ?>);"></div>
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
                                <div class="text"><?php echo e(__("Showing")); ?> <strong><?php echo e($rows->firstItem()); ?>-<?php echo e($rows->lastItem()); ?></strong> <?php echo e(__("of")); ?> <strong><?php echo e($rows->total()); ?></strong> <?php echo e(__("candidates")); ?></div>
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
                                <?php echo $__env->make("Candidate::frontend.layouts.loop.item-v1", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <!-- Listing pagination -->
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
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Candidate\Views\frontend\layouts\search\candidate-list-v4.blade.php ENDPATH**/ ?>