<?php
    $country_search_style = setting_item('job_country_search_style');
    $country_id = request()->get('country');
    $state_id = request()->get('state');
    $city_id = request()->get('city');
?>

<?php if($countries): ?>
    <!-- Country Filter -->
<div class="filter-block">
    <h4>Country</h4>
    <?php
        $country_name = "";
        $list_json = [];
        foreach ($countries as $country) {
            if ($country_id == $country->id) {
                $country_name = $country->name;
            }
            $list_json[] = [
                'id' => $country->id,
                'title' => $country->name,
            ];
        }
    ?>

    <div class="form-group">
         <select class="form-control" name="country" id="countrySelect">
            <option value=""><?php echo e(__('Choose a country')); ?></option>
            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($country->id); ?>" <?php echo e($country_id == $country->id ? 'selected' : ''); ?>>
                    <?php echo e($country->name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <span class="icon flaticon-map-locator"></span>
       <!--  <input type="text"
               class="smart-search-country parent_text form-control"
               placeholder="<?php echo e(__('Choose a country')); ?>"
               value="<?php echo e($country_name); ?>"
               data-onLoad="<?php echo e(__('Loading...')); ?>"
               data-default="<?php echo e(json_encode($list_json)); ?>"
               id="countrySearchInput">
        <input type="hidden" class="child_id" name="country" value="<?php echo e($country_id); ?>" id="countryInput">
        <span class="icon flaticon-map-locator"></span> -->
    </div>
</div>

<!-- State Filter -->
<div class="filter-block">
    <h4>State</h4>
    <div class="form-group bc-select-has-delete">
        <select class="form-control" name="state" id="stateSelect">
            <option value=""><?php echo e(__('Choose a state')); ?></option>
            
        </select>
        <span class="icon flaticon-map-locator"></span>
    </div>
</div>

<!-- City Filter -->
<div class="filter-block">
    <h4>City</h4>
    <div class="form-group bc-select-has-delete">
        <select class="form-control" name="city" id="citySelect">
            <option value=""><?php echo e(__('Choose a city')); ?></option>
            
        </select>
        <span class="icon flaticon-map-locator"></span>
    </div>
</div>

<?php endif; ?>


<script>
document.addEventListener('DOMContentLoaded', function () {
    const countrySelect = document.getElementById('countrySelect');
    const stateSelect = document.getElementById('stateSelect');
    const citySelect = document.getElementById('citySelect');

    const selectedState = '<?php echo e($state_id); ?>';
    const selectedCity = '<?php echo e($city_id); ?>';

    function loadStates(countryId, callback) {
        fetch(`/get-states/${countryId}`)
            .then(res => res.json())
            .then(states => {
                stateSelect.innerHTML = '<option value="">Choose a state</option>';
                states.forEach(state => {
                    const option = document.createElement('option');
                    option.value = state.id;
                    option.text = state.name;
                    if (parseInt(selectedState) === parseInt(state.id)) {
                        option.selected = true;
                    }
                    stateSelect.appendChild(option);
                });
                if (typeof callback === 'function') callback();
            });
    }

    function loadCities(stateId) {
        fetch(`/get-cities/${stateId}`)
            .then(res => res.json())
            .then(cities => {
                citySelect.innerHTML = '<option value="">Choose a city</option>';
                cities.forEach(city => {
                    const option = document.createElement('option');
                    option.value = city.id;
                    option.text = city.name;
                    if (parseInt(selectedCity) === parseInt(city.id)) {
                        option.selected = true;
                    }
                    citySelect.appendChild(option);
                });
            });
    }

    // On page load, if country is selected
    if (countrySelect.value) {
        loadStates(countrySelect.value, function () {
            if (selectedState) {
                loadCities(selectedState);
            }
        });
    }

    countrySelect.addEventListener('change', function () {
        const countryId = this.value;
        stateSelect.innerHTML = '<option value="">Choose a state</option>';
        citySelect.innerHTML = '<option value="">Choose a city</option>';
        if (countryId) {
            loadStates(countryId);
        }
    });

    stateSelect.addEventListener('change', function () {
        const stateId = this.value;
        citySelect.innerHTML = '<option value="">Choose a city</option>';
        if (stateId) {
            loadCities(stateId);
        }
    });
});
</script>
<?php /**PATH C:\xampp7\htdocs\jobsning\modules/Job/Views/frontend/layouts/form-search/fields/form-style-1/country.blade.php ENDPATH**/ ?>