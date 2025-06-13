    <?php
        $candidate = $row->candidate;
        $selectedCountry = $selectedCountry ?? old('country_id');
        $selectedState = $selectedState ?? old('state_id');
        $selectedCity = $selectedCity ?? old('location_id');
        $states = $states ?? collect();
        $cities = $cities ?? collect();
    ?>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class=""><?php echo e(__("Country")); ?></label>
                <!-- <select name="country" class="form-control" id="country-sms-testing">
                    <option value=""><?php echo e(__('-- Select --')); ?></option>
                    <?php $__currentLoopData = get_country_lists(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if(@$candidate->country==$id): ?> selected <?php endif; ?> value="<?php echo e($id); ?>"><?php echo e($name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>-->  
                <select id="country_select" name="country" class="form-control">
                    <option value=""><?php echo e(__("Select Country")); ?></option>
                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($country->id); ?>" <?php echo e(old('country', $selectedCountry) == $country->id ? 'selected' : ''); ?>>
                                <?php echo e($country->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>          
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label><?php echo e(__("State")); ?></label>
                <!-- <input type="text" value="<?php echo e(old('city',@$candidate->city)); ?>" name="city" placeholder="<?php echo e(__("City")); ?>" class="form-control"> -->
                <select id="state_select" name="city" class="form-control">
                    <option value=""><?php echo e(__("Select State")); ?></option>
                        
                        <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($state->id); ?>" <?php echo e(old('city', $selectedState) == $state->id ? 'selected' : ''); ?>>
                               <?php echo e($state->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
         <div class="col-md-4">
            <div class="form-group">
                <label><?php echo e(__("City")); ?></label>
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
        <div class="col-md-12">
            <div class="form-group">
                <label><?php echo e(__('Address Line')); ?></label>
                <input type="text" value="<?php echo e(old('address',@$candidate->address)); ?>" placeholder="<?php echo e(__('Address')); ?>" name="address" class="form-control">
            </div>
        </div>
    </div>
   
    <div class="form-group">
        <label class="control-label"><?php echo e(__("The geographic coordinate")); ?></label>
        <div class="control-map-group">
            <div id="map_content"></div>
            <input type="text" placeholder="<?php echo e(__("Search by name...")); ?>" class="bravo_searchbox form-control" autocomplete="off" onkeydown="return event.key !== 'Enter';">
            <div class="g-control">
                <div class="form-group">
                    <label><?php echo e(__("Map Latitude")); ?>:</label>
                    <input type="text" name="map_lat" class="form-control" value="<?php echo e(@$candidate->map_lat ?? "51.505"); ?>" onkeydown="return event.key !== 'Enter';">
                </div>
                <div class="form-group">
                    <label><?php echo e(__("Map Longitude")); ?>:</label>
                    <input type="text" name="map_lng" class="form-control" value="<?php echo e(@$candidate->map_lng ?? "-0.09"); ?>" onkeydown="return event.key !== 'Enter';">
                </div>
                <div class="form-group">
                    <label><?php echo e(__("Map Zoom")); ?>:</label>
                    <input type="text" name="map_zoom" class="form-control" value="<?php echo e(@$candidate->map_zoom ?? "8"); ?>" onkeydown="return event.key !== 'Enter';">
                </div>
            </div>
        </div>
    </div>


<script type="text/javascript">
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
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Candidate\Views\admin\candidate\location.blade.php ENDPATH**/ ?>