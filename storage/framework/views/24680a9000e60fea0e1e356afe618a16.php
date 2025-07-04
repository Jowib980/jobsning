
<?php $__env->startSection('content'); ?>
    <?php
        $user = \Illuminate\Support\Facades\Auth::user();
    ?>
    <form action="<?php echo e(route('company.admin.store',['id'=>($row->id) ? $row->id : '-1','lang'=>request()->query('lang')])); ?>" method="post" class="dungdt-form">
        <div class="container-fluid">
            <div class="d-flex justify-content-between mb20">
                <div class="">
                    <h1 class="title-bar"><?php echo e($row->id ? __('Edit Company :name',['name'=>$translation->name]) : __('Add new Company')); ?></h1>
                    <?php if($row->slug): ?>
                        <p class="item-url-demo"><?php echo e(__("Permalink")); ?>: <?php echo e(url( (request()->query('lang') ? request()->query('lang').'/' : '').config('companies.companies_route_prefix'))); ?>/<a href="#" class="open-edit-input" data-name="slug"><?php echo e($row->slug); ?></a>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="">
                    <?php if($row->slug): ?>
                        <a class="btn btn-primary btn-sm" href="<?php echo e($row->getDetailUrl(request()->query('lang'))); ?>" target="_blank"><?php echo e(__("View Company")); ?></a>
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
                            <div class="panel-title"><strong><?php echo e(__('Company content')); ?></strong></div>
                            <div class="panel-body">
                                <?php echo csrf_field(); ?>
                                <?php echo $__env->make('Company::admin/company/form',['row'=> $row], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                        <?php if(is_default_lang()): ?>
                        <div class="panel">
                            <div class="panel-title"><strong><?php echo e(__("Company Location")); ?></strong></div>
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
                                                            if ($row->location_id == $location->id){
                                                                $location_name = $translate->name;
                                                            }
                                                            $list_json[] = [
                                                                'id' => $location->id,
                                                                'title' => $prefix . ' ' . $translate->name,
                                                            ];
                                                            $traverse($location->children, $prefix . '-');
                                                        }
                                                    };
                                                    $traverse($company_location);
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
                                                    <select id="country_select" name="country" class="form-control">
                                                        <option value=""><?php echo e(__("Select Country")); ?></option>
                                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($country->id); ?>" <?php echo e(old('country', $selectedCountry) == $country->id ? 'selected' : ''); ?>>
                                                                <?php echo e($country->name); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>

                                                 <div class="form-group col-lg-4">
                                                    <select id="state_select" name="state" class="form-control">
                                                        <option value=""><?php echo e(__("Select State")); ?></option>
                                                        
                                                        <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($state->id); ?>" <?php echo e(old('state', $selectedState) == $state->id ? 'selected' : ''); ?>>
                                                                <?php echo e($state->name); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>

                                                <div class="form-group col-lg-4">
                                                    <select id="city_select" name="city" class="form-control">
                                                        <option value=""><?php echo e(__("Select City")); ?></option>
                                                        
                                                         <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($city->id); ?>" <?php echo e(old('city', $selectedCity) == $city->id ? 'selected' : ''); ?>>
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
                                                    <input type="text" name="map_lat" class="form-control" value="<?php echo e($row->map_lat); ?>" onkeydown="return event.key !== 'Enter';">
                                                </div>
                                                <div class="form-group">
                                                    <label><?php echo e(__("Map Longitude")); ?>:</label>
                                                    <input type="text" name="map_lng" class="form-control" value="<?php echo e($row->map_lng); ?>" onkeydown="return event.key !== 'Enter';">
                                                </div>
                                                <div class="form-group">
                                                    <label><?php echo e(__("Map Zoom")); ?>:</label>
                                                    <input type="text" name="map_zoom" class="form-control" value="<?php echo e($row->map_zoom ?? "8"); ?>" onkeydown="return event.key !== 'Enter';">
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
                                        <label><input <?php if($row->status=='publish'): ?> checked <?php endif; ?> type="radio" name="status" value="publish"> <?php echo e(__("Publish")); ?>

                                        </label></div>
                                    <div>
                                        <label><input <?php if($row->status=='draft'): ?> checked <?php endif; ?> type="radio" name="status" value="draft"> <?php echo e(__("Draft")); ?>

                                        </label></div>
                                <?php endif; ?>
                                <div class="text-right">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> <?php echo e(__('Save Changes')); ?></button>
                                </div>
                            </div>
                        </div>

                        <?php if(is_default_lang()): ?>
                            <div class="panel">
                                <div class="panel-title"><strong><?php echo e(__('Categories')); ?></strong></div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <select id="cat_id" class="form-control" name="category_id">
                                            <?php
                                            $selectedIds = !empty($row->category_id) ? explode(',', $row->category_id) : [];
                                            $traverse = function ($categories, $prefix = '') use (&$traverse, $selectedIds) {
                                                foreach ($categories as $category) {
                                                    $selected = '';
                                                    if (in_array($category->id, $selectedIds))
                                                        $selected = 'selected';
                                                    printf("<option value='%s' %s>%s</option>", $category->id, $selected, $prefix . ' ' . $category->name);
                                                    $traverse($category->children, $prefix . '-');
                                                }
                                            };
                                            $traverse($categories);
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if(is_admin() && is_default_lang()): ?>
                            <div class="panel">
                                <div class="panel-title"><strong><?php echo e(__('Featured')); ?></strong></div>
                                <div class="panel-body">
                                    <div>
                                        <label><input <?php if($row->is_featured): ?> checked <?php endif; ?> type="checkbox" name="is_featured" value="1"> <?php echo e(__("is Featured")); ?>

                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-title"><strong><?php echo e(__("Employer")); ?></strong></div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <?php
                                        $user = !empty($row->create_user) ? App\User::find($row->owner_id) : false;
                                        \App\Helpers\AdminForm::select2('owner_id', [
                                            'configs' => [
                                                'ajax'        => [
                                                    'url' => url('/admin/module/user/getForSelect2'),
                                                    'dataType' => 'json'
                                                ],
                                                'allowClear'  => true,
                                                'placeholder' => __('-- Select Employer --')
                                            ]
                                        ], !empty($user->id) ? [
                                            $user->id,
                                            $user->getDisplayName() . ' (#' . $user->id . ')'
                                        ] : false)
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if(is_default_lang()): ?>
                            <?php echo $__env->make('Company::admin.company.attributes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="panel">
                                <div class="panel-body">
                                    <h3 class="panel-body-title"> <?php echo e(__('Logo')); ?> (<?php echo e(__('Recommended size image:330x300px')); ?>)</h3>
                                    <div class="form-group">
                                        <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('avatar_id',$row->avatar_id); ?>

                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="panel">
                            <div class="panel-title"><strong><?php echo e(__('Social Media')); ?></strong></div>
                            <div class="panel-body">
                                <?php $socialMediaData = $row->social_media; ?>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="social-skype"><i class="fa fa-skype"></i></span>
                                    </div>
                                    <input type="text" class="form-control" autocomplete="off" name="social_media[skype]" value="<?php echo e($socialMediaData['skype'] ?? ''); ?>" placeholder="<?php echo e(__('Skype')); ?>" aria-label="<?php echo e(__('Skype')); ?>" aria-describedby="social-skype">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="social-facebook"><i class="fa fa-facebook"></i></span>
                                    </div>
                                    <input type="text" class="form-control" autocomplete="off"  name="social_media[facebook]" value="<?php echo e($socialMediaData['facebook'] ?? ''); ?>" placeholder="<?php echo e(__('Facebook')); ?>" aria-label="<?php echo e(__('Facebook')); ?>" aria-describedby="social-facebook">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="social-twitter"><i class="fa fa-twitter"></i></span>
                                    </div>
                                    <input type="text" class="form-control"autocomplete="off" name="social_media[twitter]" value="<?php echo e($socialMediaData['twitter'] ?? ''); ?>" placeholder="<?php echo e(__('Twitter')); ?>" aria-label="<?php echo e(__('Twitter')); ?>" aria-describedby="social-twitter">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="social-instagram"><i class="fa fa-instagram"></i></span>
                                    </div>
                                    <input type="text" class="form-control" autocomplete="off" name="social_media[instagram]" value="<?php echo e($socialMediaData['instagram'] ?? ''); ?>" placeholder="<?php echo e(__('Instagram')); ?>" aria-label="<?php echo e(__('Instagram')); ?>" aria-describedby="social-instagram">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="social-linkedin"><i class="fa fa-linkedin"></i></span>
                                    </div>
                                    <input type="text" class="form-control" autocomplete="off" name="social_media[linkedin]" value="<?php echo e($socialMediaData['linkedin'] ?? ''); ?>" placeholder="<?php echo e(__('Linkedin')); ?>" aria-label="<?php echo e(__('Linkedin')); ?>" aria-describedby="social-linkedin">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="social-google"><i class="fa fa-google"></i></span>
                                    </div>
                                    <input type="text" class="form-control" autocomplete="off" name="social_media[google]" value="<?php echo e(@$socialMediaData['google'] ?? ''); ?>" placeholder="<?php echo e(__('Google')); ?>" aria-label="<?php echo e(__('Google')); ?>" aria-describedby="social-google">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script.body'); ?>
    <?php echo App\Helpers\MapEngine::scripts(); ?>

    <script>

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


        $(document).ready(function() {
            $('#category_id').select2();
        });
        jQuery(function ($) {
            new BravoMapEngine('map_content', {
                disableScripts: true,
                fitBounds: true,
                center: [<?php echo e($row->map_lat ?? "51.505"); ?>, <?php echo e($row->map_lng ?? "-0.09"); ?>],
                zoom:<?php echo e($row->map_zoom ?? "8"); ?>,
                ready: function (engineMap) {
                    <?php if($row->map_lat && $row->map_lng): ?>
                    engineMap.addMarker([<?php echo e($row->map_lat); ?>, <?php echo e($row->map_lng); ?>], {
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
        });



    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jobsning\modules/Company/Views/admin/company/detail.blade.php ENDPATH**/ ?>