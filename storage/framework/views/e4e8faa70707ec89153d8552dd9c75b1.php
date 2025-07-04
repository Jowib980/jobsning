

<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(route('job.admin.store',['id'=>($row->id) ? $row->id : '-1','lang'=>request()->query('lang')])); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="container-fluid">
            <div class="d-flex justify-content-between mb20">
                <div class="">
                    <h1 class="title-bar"><?php echo e($row->id ? __('Edit: ').$row->title : __('Add new job')); ?></h1>
                    <?php if($row->slug): ?>
                        <p class="item-url-demo"><?php echo e(__("Permalink")); ?>: <?php echo e(url(config('job.job_route_prefix') )); ?>/<a href="#" class="open-edit-input" data-name="slug"><?php echo e($row->slug); ?></a>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="">
                    <?php if($row->slug): ?>
                        <a class="btn btn-default btn-sm" href="<?php echo e($row->getDetailUrl()); ?>" target="_blank"><i class="fa fa-eye"></i> <?php echo e(__("View Job")); ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php if($row->id): ?>
                <?php echo $__env->make('Language::admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <div class="lang-content-box">
                <div class="row">
                    <div class="col-md-9">

                        <div class="panel">
                            <div class="panel-title"><strong><?php echo e(__("Job Content")); ?></strong></div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label><?php echo e(__("Title")); ?></label>
                                    <input type="text" value="<?php echo e(old('title', $translation->title)); ?>" placeholder="<?php echo e(__("Title")); ?>" name="title" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="control-label"><?php echo e(__("Content")); ?></label>
                                    <div class="">
                                        <textarea name="content" class="d-none has-ckeditor" cols="30" rows="10"><?php echo e(old('content', $translation->content)); ?></textarea>
                                    </div>
                                </div>
                                <?php if(is_default_lang()): ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><?php echo e(__("Expiration Date")); ?></label>
                                                <input type="text" readonly value="<?php echo e(old( 'expiration_date', $row->expiration_date ? date('Y/m/d', strtotime($row->expiration_date)) : '')); ?>" placeholder="YYYY/MM/DD" name="expiration_date" autocomplete="false" class="form-control has-datepicker bg-white">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><?php echo e(__("Hours")); ?></label>
                                                <div class="input-group">
                                                    <input type="text" value="<?php echo e(old('hours', $row->hours)); ?>" placeholder="<?php echo e(__("hours")); ?>" name="hours" class="form-control">
                                                    <div class="input-group-append">
                                                        <select class="form-control" name="hours_type">
                                                            <option value="" <?php if(old('hours_type', $row->hours_type) == ''): ?> selected <?php endif; ?> > -- </option>
                                                            <option value="day" <?php if(old('hours_type', $row->hours_type) == 'day'): ?> selected <?php endif; ?> ><?php echo e(__("/day")); ?></option>
                                                            <option value="week" <?php if(old('hours_type', $row->hours_type) == 'week'): ?> selected <?php endif; ?> ><?php echo e(__("/week")); ?></option>
                                                            <option value="month" <?php if(old('hours_type', $row->hours_type) == 'month'): ?> selected <?php endif; ?> ><?php echo e(__("/month")); ?></option>
                                                            <option value="year" <?php if(old('hours_type', $row->hours_type) == 'year'): ?> selected <?php endif; ?> ><?php echo e(__("/year")); ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="gender"><?php echo e(__("Gender")); ?></label>
                                                <select class="form-control" id="gender" name="gender">
                                                    <option value="Both" <?php if(old('gender', $row->gender) == 'Both'): ?> selected <?php endif; ?> ><?php echo e(__("Both")); ?></option>
                                                    <option value="Male" <?php if(old('gender', $row->gender) == 'Male'): ?> selected <?php endif; ?> ><?php echo e(__("Male")); ?></option>
                                                    <option value="Female" <?php if(old('gender', $row->gender) == 'Female'): ?> selected <?php endif; ?> ><?php echo e(__("Female")); ?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><?php echo e(__("Salary")); ?></label>
                                                <div class="input-group">
                                                    <input type="text" value="<?php echo e(old('salary_min', $row->salary_min)); ?>" placeholder="<?php echo e(__("Min")); ?>" name="salary_min" class="form-control">
                                                    <input type="text" value="<?php echo e(old('salary_max', $row->salary_max)); ?>" placeholder="<?php echo e(__("Max")); ?>" name="salary_max" class="form-control">
                                                    <div class="input-group-append">
                                                        <select class="form-control" name="salary_type">
                                                            <option value="hourly" <?php if(old('salary_type', $row->salary_type) == 'hourly'): ?> selected <?php endif; ?> > <?php echo e(__("/hourly")); ?> </option>
                                                            <option value="daily" <?php if(old('salary_type', $row->salary_type) == 'daily'): ?> selected <?php endif; ?> ><?php echo e(__("/daily")); ?></option>
                                                            <option value="weekly" <?php if(old('salary_type', $row->salary_type) == 'weekly'): ?> selected <?php endif; ?> ><?php echo e(__("/weekly")); ?></option>
                                                            <option value="monthly" <?php if(old('salary_type', $row->salary_type) == 'monthly'): ?> selected <?php endif; ?> ><?php echo e(__("/monthly")); ?></option>
                                                            <option value="yearly" <?php if(old('salary_type', $row->salary_type) == 'yearly'): ?> selected <?php endif; ?> ><?php echo e(__("/yearly")); ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <label class="mt-2">
                                                    <input type="checkbox" name="wage_agreement" <?php if(old('wage_agreement', $row->wage_agreement)): ?> checked <?php endif; ?> value="1" /> <?php echo e(__("Wage Agreement")); ?>

                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><?php echo e(__("Experience")); ?></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="<?php echo e(__("Experience")); ?>" name="experience" value="<?php echo e(old('experience',$row->experience)); ?>">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" style="font-size: 14px;"><?php echo e(__("year(s)")); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"><?php echo e(__("Video Url")); ?></label>
                                                <input type="text" name="video" class="form-control" value="<?php echo e(old('video',$row->video)); ?>" placeholder="<?php echo e(__("Youtube link video")); ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label><?php echo e(__("Video Cover Image")); ?></label>
                                                <div class="form-group">
                                                    <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('video_cover_id',$row->video_cover_id); ?>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label"><?php echo e(__("Gallery")); ?> (<?php echo e(__('Recommended size image:1080 x 1920px')); ?>)</label>
                                                <?php
                                                    $gallery_id = $row->gallery ?? old('gallery');
                                                ?>
                                                <?php echo \Modules\Media\Helpers\FileHelper::fieldGalleryUpload('gallery', $gallery_id); ?>

                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if(is_default_lang()): ?>
                            <div class="panel">
                                <div class="panel-title"><strong><?php echo e(__("Job Location")); ?></strong></div>
                                <div class="panel-body">

                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(__("Location")); ?></label>
                                        <?php if(!empty($is_smart_search)): ?>
                                            <div class="form-group-smart-search">
                                                <div class="form-content">
                                                    <?php
                                                    $location_name = "";
                                                    $list_json = [];
                                                    $traverse = function ($locations, $prefix = '') use (&$traverse, &$list_json , &$location_name,$row) {
                                                        foreach ($locations as $location) {
                                                            $translate = $location->translateOrOrigin(app()->getLocale());
                                                            if (old('location_id', $row->location_id) == $location->id){
                                                                $location_name = $translate->name;
                                                            }
                                                            $list_json[] = [
                                                                'id' => $location->id,
                                                                'title' => $prefix . ' ' . $translate->name,
                                                            ];
                                                            $traverse($location->children, $prefix . '-');
                                                        }
                                                    };
                                                    $traverse($job_location);
                                                    ?>
                                                    <div class="smart-search">
                                                        <input type="text" class="smart-search-location parent_text form-control" placeholder="<?php echo e(__("-- Please Select --")); ?>" value="<?php echo e($location_name); ?>" data-onLoad="<?php echo e(__("Loading...")); ?>"
                                                               data-default="<?php echo e(json_encode($list_json)); ?>">
                                                        <input type="hidden" class="child_id" name="location_id" value="<?php echo e($row->location_id ?? Request::query('location_id')); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                        <?php
                                            $selectedCountry = $selectedCountry ?? old('country_id');
                                            $selectedState = $selectedState ?? old('state_id');
                                            $selectedCity = $selectedCity ?? old('location_id');
                                            $states = $states ?? collect();
                                            $cities = $cities ?? collect();
                                        ?>

                                            <div class="row form-group col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group col-lg-4">
                                                    <select id="country_select" name="country_id" class="form-control">
                                                        <option value=""><?php echo e(__("Select Country")); ?></option>
                                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($country->id); ?>" <?php echo e(old('country_id', $selectedCountry) == $country->id ? 'selected' : ''); ?>>
                                                                <?php echo e($country->name); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>

                                                 <div class="form-group col-lg-4">
                                                    <select id="state_select" name="state_id" class="form-control">
                                                        <option value=""><?php echo e(__("Select State")); ?></option>
                                                        
                                                        <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($state->id); ?>" <?php echo e(old('state_id', $selectedState) == $state->id ? 'selected' : ''); ?>>
                                                                <?php echo e($state->name); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>

                                                <div class="form-group col-lg-4">
                                                    <select id="city_select" name="location_id" class="form-control">
                                                        <option value=""><?php echo e(__("Select City")); ?></option>
                                                        
                                                         <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($city->id); ?>" <?php echo e(old('location_id', $selectedCity) == $city->id ? 'selected' : ''); ?>>
                                                                <?php echo e($city->name); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                                
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label"><?php echo e(__("The geographic coordinate")); ?></label>
                                        <div class="control-map-group">
                                            <div id="map_content"></div>
                                            <input type="text" placeholder="<?php echo e(__("Search by name...")); ?>" class="bravo_searchbox form-control" autocomplete="off" onkeydown="return event.key !== 'Enter';">
                                            <div class="g-control">
                                                <div class="form-group">
                                                    <label><?php echo e(__("Map Latitude")); ?>:</label>
                                                    <input type="text" name="map_lat" class="form-control" value="<?php echo e(old('map_lat', $row->map_lat)); ?>" onkeydown="return event.key !== 'Enter';">
                                                </div>
                                                <div class="form-group">
                                                    <label><?php echo e(__("Map Longitude")); ?>:</label>
                                                    <input type="text" name="map_lng" class="form-control" value="<?php echo e(old('map_lng', $row->map_lng)); ?>" onkeydown="return event.key !== 'Enter';">
                                                </div>
                                                <div class="form-group">
                                                    <label><?php echo e(__("Map Zoom")); ?>:</label>
                                                    <input type="text" name="map_zoom" class="form-control" value="<?php echo e(old('map_zoom', $row->map_zoom ?? "8")); ?>" onkeydown="return event.key !== 'Enter';">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- <?php echo $__env->make('Core::admin/seo-meta/seo-meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> -->
                    </div>
                    <div class="col-md-3">
                        <div class="panel">
                            <div class="panel-title"><strong><?php echo e(__('Publish')); ?></strong></div>
                            <div class="panel-body">
                                <?php if(is_default_lang()): ?>
                                    <div>
                                        <label><input <?php if(old('status', $row->status) =='publish'): ?> checked <?php endif; ?> type="radio" name="status" value="publish"> <?php echo e(__("Publish")); ?></label>
                                    </div>
                                    <div>
                                        <label><input <?php if(old('status', $row->status)=='draft'): ?> checked <?php endif; ?> type="radio" name="status" value="draft"> <?php echo e(__("Draft")); ?></label>
                                    </div>
                                <?php endif; ?>
                                <div class="text-right">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> <?php echo e(__('Save Changes')); ?></button>
                                </div>
                            </div>
                        </div>
                        <?php if(is_default_lang()): ?>
                            <div class="panel">
                                <div class="panel-title"><strong><?php echo e(__('Job Apply')); ?></strong></div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label><?php echo e(__('Apply Type')); ?></label>
                                        <select name="apply_type" class="form-control">
                                            <option value=""><?php echo e(__("Default")); ?></option>
                                            <option value="email" <?php if(old('apply_type', $row->apply_type) == 'email'): ?> selected <?php endif; ?> ><?php echo e(__("Send Email")); ?></option>
                                            <option value="external" <?php if(old('apply_type', $row->apply_type) == 'external'): ?> selected <?php endif; ?> ><?php echo e(__("External")); ?></option>
                                        </select>
                                    </div>
                                    <div class="form-group" data-condition="apply_type:is(external)">
                                        <label><?php echo e(__("Apply Link")); ?></label>
                                        <input type="text" name="apply_link" class="form-control" value="<?php echo e(old('apply_link',$row->apply_link)); ?>" />
                                    </div>
                                    <div class="form-group" data-condition="apply_type:is(email)">
                                        <label><?php echo e(__("Apply Email")); ?></label>
                                        <input type="text" name="apply_email" class="form-control" value="<?php echo e(old('apply_email',$row->apply_email)); ?>" />
                                        <small><i><?php echo e(__("If is empty, it will be sent to the company's email")); ?></i></small>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-title"><strong><?php echo e(__("Availability")); ?></strong></div>
                                <div class="panel-body">
                                    <?php if(is_admin()): ?>
                                        <div class="form-group">
                                            <label><?php echo e(__('Job Featured')); ?></label>
                                            <br>
                                            <label>
                                                <input type="checkbox" name="is_featured" <?php if(old('is_featured', $row->is_featured)): ?> checked <?php endif; ?> value="1"> <?php echo e(__("Enable featured")); ?>

                                            </label>
                                        </div>
                                    <?php endif; ?>
                                    <div class="form-group">
                                        <label><?php echo e(__('Job Urgent')); ?></label>
                                        <br>
                                        <label>
                                            <input type="checkbox" name="is_urgent" <?php if(old('is_urgent',$row->is_urgent)): ?> checked <?php endif; ?> value="1"> <?php echo e(__("Enable Urgent")); ?>

                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="panel">
                                <div class="panel-title"><strong><?php echo e(__("Category")); ?></strong></div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="">
                                            <select name="category_id" class="form-control">
                                                <option value=""><?php echo e(__("-- Please Select --")); ?></option>
                                                <?php
                                                $traverse = function ($categories, $prefix = '') use (&$traverse, $row) {
                                                    foreach ($categories as $category) {
                                                        $selected = '';
                                                        if (old('category_id', $row->category_id) == $category->id)
                                                            $selected = 'selected';

                                                        $translate = $category->translateOrOrigin(app()->getLocale());
                                                        printf("<option value='%s' %s>%s</option>", $category->id, $selected, $prefix . ' ' . $translate->name);
                                                        $traverse($category->children, $prefix . '-');
                                                    }
                                                };
                                                $traverse($categories);
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel">
                                <div class="panel-title"><strong><?php echo e(__("Job Type")); ?></strong></div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="">
                                            <select name="job_type_id" class="form-control">
                                                <option value=""><?php echo e(__("-- Please Select --")); ?></option>
                                                <?php
                                                    foreach ($job_types as $job_type) {
                                                        $selected = '';
                                                        if (old('job_type_id', $row->job_type_id) == $job_type->id)
                                                            $selected = 'selected';
                                                        printf("<option value='%s' %s>%s</option>", $job_type->id, $selected, $job_type->name);
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-title"><strong><?php echo e(__("Job Skills")); ?></strong></div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="">
                                            <select id="job_type_id" name="job_skills[]" class="form-control" multiple="multiple">
                                                <option value=""><?php echo e(__("-- Please Select --")); ?></option>
                                                <?php
                                                foreach ($job_skills as $job_skill) {
                                                    $selected = '';
                                                    if ($row->skills){
                                                        foreach ($row->skills as $skill){
                                                            if($job_skill->id == $skill->id){
                                                                $selected = 'selected';
                                                            }
                                                        }
                                                    }
                                                    printf("<option value='%s' %s>%s</option>", $job_skill->id, $selected, $job_skill->name);
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php if(is_admin()): ?>
                                <div class="panel">
                                    <div class="panel-title"><strong><?php echo e(__("Company")); ?></strong></div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <?php
                                            $company = !empty($row->company_id) ? \Modules\Company\Models\Company::find($row->company_id) : false;
                                            \App\Helpers\AdminForm::select2('company_id', [
                                                'configs' => [
                                                    'ajax'        => [
                                                        'url' => route('company.admin.getForSelect2'),
                                                        'dataType' => 'json'
                                                    ],
                                                    'allowClear'  => true,
                                                    'placeholder' => __('-- Select Company --')
                                                ]
                                            ], !empty($company->id) ? [
                                                $company->id,
                                                $company->name . ' (#' . $company->id . ')'
                                            ] : false)
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if(is_default_lang()): ?>
                            <div class="panel">
                                <div class="panel-title"><strong><?php echo e(__('Feature Image')); ?></strong></div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('thumbnail_id',old('thumbnail_id', $row->thumbnail_id)); ?>

                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php  ?>
<?php $__env->startSection('script.body'); ?>
    <?php echo App\Helpers\MapEngine::scripts(); ?>

    <script>
        jQuery(function ($) {
            new BravoMapEngine('map_content', {
                disableScripts: true,
                fitBounds: true,
                center: [<?php echo e(old('map_lat', $row->map_lat) ?? "51.505"); ?>, <?php echo e(old('map_lng', $row->map_lng) ?? "-0.09"); ?>],
                zoom:<?php echo e(old('map_zoom', $row->map_zoom) ?? "8"); ?>,
                ready: function (engineMap) {
                    <?php if(old('map_lat', $row->map_lat) && old('map_lng', $row->map_lng)): ?>
                    engineMap.addMarker([<?php echo e(old('map_lat', $row->map_lat)); ?>, <?php echo e(old('map_lng', $row->map_lng)); ?>], {
                        icon_options: {}
                    });
                    <?php endif; ?>
                    engineMap.on('click', function (dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {}
                        });
                        $("input[name=map_lat]").attr("value", dataLatLng[0]);
                        $("input[name=map_lng]").attr("value", dataLatLng[1]);
                    });
                    engineMap.on('zoom_changed', function (zoom) {
                        $("input[name=map_zoom]").attr("value", zoom);
                    });
                    engineMap.searchBox($('#customPlaceAddress'),function (dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {}
                        });
                        $("input[name=map_lat]").attr("value", dataLatLng[0]);
                        $("input[name=map_lng]").attr("value", dataLatLng[1]);
                    });
                    engineMap.searchBox($('.bravo_searchbox'),function (dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {}
                        });
                        $("input[name=map_lat]").attr("value", dataLatLng[0]);
                        $("input[name=map_lng]").attr("value", dataLatLng[1]);
                    });
                }
            });

            $('#job_type_id').select2();
        })


document.addEventListener('DOMContentLoaded', function () {
    const selectedState = '<?php echo e($selectedState); ?>';
    const selectedCity = '<?php echo e($selectedCity); ?>';

    const $country = $('#country_select');
    const $state = $('#state_select');
    const $city = $('#city_select');

    function loadStates(countryId, preselect = null) {
        $state.html('<option value=""><?php echo e(__("Select State")); ?></option>');
        $city.html('<option value=""><?php echo e(__("Select City")); ?></option>');

        if (countryId) {
            fetch(`/get-states/${countryId}`)
                .then(res => res.json())
                .then(states => {
                    states.forEach(state => {
                        let selected = preselect == state.id ? 'selected' : '';
                        $state.append(`<option value="${state.id}" ${selected}>${state.name}</option>`);
                    });

                    if (preselect) {
                        loadCities(preselect, selectedCity);
                    }
                });
        }
    }

    function loadCities(stateId, preselect = null) {
        $city.html('<option value=""><?php echo e(__("Select City")); ?></option>');
        if (stateId) {
            fetch(`/get-cities/${stateId}`)
                .then(res => res.json())
                .then(cities => {
                    cities.forEach(city => {
                        let selected = preselect == city.id ? 'selected' : '';
                        $city.append(`<option value="${city.id}" ${selected}>${city.name}</option>`);
                    });
                });
        }
    }

    // On change
    $country.on('change', function () {
        loadStates(this.value);
    });

    $state.on('change', function () {
        loadCities(this.value);
    });

    // On edit page load
    if ($country.val()) {
        loadStates($country.val(), selectedState);
    }
});


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jobsning\modules\Job\Views\admin\job\detail.blade.php ENDPATH**/ ?>