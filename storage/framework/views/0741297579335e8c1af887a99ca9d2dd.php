<!--Page Title-->
<section class="page-title style-two">
    <div class="auto-container">
        <!-- Job Search Form -->
        <div class="job-search-form">
            <form method="get" action="">
                <input type="hidden" name="_layout" value="<?php echo e($layout); ?>" />
                <input type="hidden" name="skill" value="<?php echo e(request()->get('skill')); ?>" />
                <input type="hidden" name="date_posted" value="<?php echo e(request()->get('date_posted')); ?>" />
                <input type="hidden" name="experience_year" value="<?php echo e(request()->get('experience_year')); ?>" />
                <input type="hidden" name="education_level" value="<?php echo e(request()->get('education_level')); ?>" />
                <input type="hidden" name="orderby" value="<?php echo e(request()->get('orderby')); ?>" />
                <input type="hidden" name="limit" value="<?php echo e(request()->get('limit')); ?>" />
                <div class="row">
                    <!-- Form Group -->
                    <div class="form-group col-lg-4 col-md-12 col-sm-12">
                        <span class="icon flaticon-search-1"></span>
                        <input type="text" name="s" value="<?php echo e(request()->input('s')); ?>" placeholder="<?php echo e(__("Candidate title...")); ?>">
                    </div>

                    <!-- Form Group -->
                    <?php $location_search_style = setting_item('candidate_location_search_style') ?>
                    <?php if($location_search_style == 'autocomplete'): ?>
                        <?php
                        $location_name = "";
                        $list_json = [];
                        $location_id = request()->get('location');
                        $traverse = function ($locations, $prefix = '') use (&$traverse, &$list_json, &$location_name, $location_id) {
                            foreach ($locations as $location) {
                                $translate = $location->translateOrOrigin(app()->getLocale());
                                if ($location_id == $location->id) {
                                    $location_name = $translate->name;
                                }
                                $list_json[] = [
                                    'id'    => $location->id,
                                    'title' => $prefix.' '.$translate->name,
                                ];
                                $traverse($location->children, $prefix.'-');
                            }
                        };
                        $traverse($list_locations);
                        ?>
                        <div class="form-group col-lg-3 col-md-12 col-sm-12 location smart-search">
                            <input type="text" class="smart-search-location parent_text form-control" placeholder="<?php echo e(__("Choose a location")); ?>" value="<?php echo e($location_name); ?>" data-onLoad="<?php echo e(__("Loading...")); ?>"
                                   data-default="<?php echo e(json_encode($list_json)); ?>">
                            <input type="hidden" class="child_id" name="location" value="<?php echo e($location_id); ?>">
                            <span class="icon flaticon-map-locator"></span>
                        </div>
                    <?php else: ?>
                        <div class="form-group col-lg-3 col-md-12 col-sm-12 location bc-select-has-delete">
                            <span class="icon flaticon-map-locator"></span>
                            <select class="chosen-select" name="location">
                                <option value=""><?php echo e(__("Choose a location")); ?></option>
                                <?php if(!empty($list_locations)): ?>
                                    <?php $__currentLoopData = $list_locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $translate = $location->translateOrOrigin(app()->getLocale());
                                        ?>
                                        <option value="<?php echo e($location->id); ?>" <?php if($location->id == request()->get('location')): ?> selected <?php endif; ?>  ><?php echo e($translate->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    <?php endif; ?>

                    <!-- Form Group -->
                    <div class="form-group col-lg-3 col-md-12 col-sm-12 location">
                        <span class="icon flaticon-briefcase"></span>
                        <select class="chosen-select" name="category">
                            <option value=""><?php echo e(__("Choose a category")); ?></option>
                            <?php if(!empty($list_categories)): ?>
                            <?php $__currentLoopData = $list_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $translate = $cat->translateOrOrigin(app()->getLocale());
                                ?>
                                <option value="<?php echo e($cat->id); ?>" <?php if($cat->id == request()->get('category')): ?> selected <?php endif; ?>  ><?php echo e($translate->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div>

                    <!-- Form Group -->
                    <div class="form-group col-lg-2 col-md-12 col-sm-12 text-right">
                        <button type="submit" class="theme-btn btn-style-one"><?php echo e(__('Find Candidates')); ?></button>
                    </div>
                </div>
            </form>
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
            <!-- Content Column -->
            <div class="content-column col-lg-12">
                <div class="ls-outer">
                    <!-- ls Switcher -->
                    <div class="ls-switcher">
                        <form class="bc-form-order" method="get">
                            <input type="hidden" name="_layout" value="<?php echo e($layout); ?>" />
                            <input type="hidden" name="location" value="<?php echo e(request()->get('location')); ?>" />
                            <input type="hidden" name="category" value="<?php echo e(request()->get('category')); ?>" />
                            <input type="hidden" name="orderby" value="<?php echo e(request()->get('orderby')); ?>" />
                            <input type="hidden" name="limit" value="<?php echo e(request()->get('limit')); ?>" />
                            <div class="showing-result">
                                <div class="top-filters">
                                    <div class="form-group">
                                        <select class="chosen-select" name="skill" onchange="this.form.submit()">
                                            <option value=""><?php echo e(__("Choose a skill")); ?></option>
                                            <?php $__currentLoopData = $list_skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $translate = $skill->translateOrOrigin(app()->getLocale());
                                                ?>
                                                <option value="<?php echo e($skill->id); ?>" <?php if($skill->id == request()->get('skill')): ?> selected <?php endif; ?>  ><?php echo e($translate->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <select class="chosen-select" name="date_posted" onchange="this.form.submit()">
                                            <option <?php if(request()->get('date_posted') == "all"): ?> selected <?php endif; ?> value="all"><?php echo e(__("Date Posted")); ?></option>
                                            <option <?php if(request()->get('date_posted') == "last_hour"): ?> selected <?php endif; ?> value="last_hour"><?php echo e(__("Last Hour")); ?></option>
                                            <option <?php if(request()->get('date_posted') == "last_1"): ?> selected <?php endif; ?> value="last_1"><?php echo e(__("Last 24 Hours")); ?></option>
                                            <option <?php if(request()->get('date_posted') == "last_7"): ?> selected <?php endif; ?> value="last_7"><?php echo e(__("Last 7 Days")); ?></option>
                                            <option <?php if(request()->get('date_posted') == "last_14"): ?> selected <?php endif; ?> value="last_14"><?php echo e(__("Last 14 Days")); ?></option>
                                            <option <?php if(request()->get('date_posted') == "last_30"): ?> selected <?php endif; ?> value="last_30"><?php echo e(__("Last 30 Days")); ?></option>
                                        </select>
                                    </div>

                                    <div class="form-group" >
                                        <select class="chosen-select" name="experience_year" onchange="this.form.submit()">
                                            <option value=""><?php echo e(__("Choose an experience")); ?></option>
                                            <option <?php if(request()->get('experience_year') == "fresh"): ?> selected <?php endif; ?> value="fresh"><?php echo e(__("Fresh")); ?></option>
                                            <option <?php if(request()->get('experience_year') == "1"): ?> selected <?php endif; ?> value="1"><?php echo e(__("1 Year")); ?></option>
                                            <option <?php if(request()->get('experience_year') == "2"): ?> selected <?php endif; ?> value="2"><?php echo e(__("2 Years")); ?></option>
                                            <option <?php if(request()->get('experience_year') == "3"): ?> selected <?php endif; ?> value="3"><?php echo e(__("3 Years")); ?></option>
                                            <option <?php if(request()->get('experience_year') == "4"): ?> selected <?php endif; ?> value="4"><?php echo e(__("4 Years")); ?></option>
                                            <option <?php if(request()->get('experience_year') == "5"): ?> selected <?php endif; ?> value="5"><?php echo e(__("5 Years")); ?></option>
                                        </select>
                                    </div>

                                    <div class="form-group" >
                                        <select class="chosen-select" name="education_level" onchange="this.form.submit()">
                                            <option value=""><?php echo e(__("Choose an education level")); ?></option>
                                            <option <?php if(request()->get('education_level') == "certificate"): ?> selected <?php endif; ?> value="certificate"><?php echo e(__("Certificate")); ?></option>
                                            <option <?php if(request()->get('education_level') == "diploma"): ?> selected <?php endif; ?> value="diploma"><?php echo e(__("Diploma")); ?></option>
                                            <option <?php if(request()->get('education_level') == "associate"): ?> selected <?php endif; ?> value="associate"><?php echo e(__("Associate Degree")); ?></option>
                                            <option <?php if(request()->get('education_level') == "bachelor"): ?> selected <?php endif; ?> value="bachelor"><?php echo e(__("Bachelor Degree")); ?></option>
                                            <option <?php if(request()->get('education_level') == "master"): ?> selected <?php endif; ?> value="master"><?php echo e(__("Master’s Degree")); ?></option>
                                            <option <?php if(request()->get('education_level') == "professional"): ?> selected <?php endif; ?> value="professional"><?php echo e(__("Professional’s Degree")); ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <form class="bc-form-order" method="get">
                            <input type="hidden" name="_layout" value="<?php echo e($layout); ?>" />
                            <input type="hidden" name="location" value="<?php echo e(request()->get('location')); ?>" />
                            <input type="hidden" name="category" value="<?php echo e(request()->get('category')); ?>" />
                            <input type="hidden" name="skill" value="<?php echo e(request()->get('skill')); ?>" />
                            <input type="hidden" name="date_posted" value="<?php echo e(request()->get('date_posted')); ?>" />
                            <input type="hidden" name="experience_year" value="<?php echo e(request()->get('experience_year')); ?>" />
                            <input type="hidden" name="education_level" value="<?php echo e(request()->get('education_level')); ?>" />
                            <div class="sort-by">
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


                    <?php if(!empty($rows) && count($rows) > 0): ?>
                    <div class="row">

                        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="candidate-block-four col-lg-4 col-md-6 col-sm-12">
                                <?php echo $__env->make("Candidate::frontend.layouts.loop.item-v3", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

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
            <div class="filters-column col-lg-12 col-md-12 col-sm-12">
                <div class="inner-column">
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
        </div>
    </div>
</section>
<!--End Listing Page Section -->
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Candidate\Views\frontend\layouts\search\candidate-list-v3.blade.php ENDPATH**/ ?>