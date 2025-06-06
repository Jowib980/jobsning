<?php
    $country_search_style = setting_item('job_country_search_style');
    $country_id = request()->get('country');
    $city_id = request()->get('location');
?>

<?php if($countries): ?>
    <!-- Country Filter -->
    <div class="filter-block">
        <h4>Country</h4>

        <?php if($country_search_style == 'autocomplete' && $country_id != null): ?>
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

            <div class="form-group smart-search">
                <input type="text"
                       class="smart-search-country parent_text form-control"
                       placeholder="<?php echo e(__('Choose a country')); ?>"
                       value="<?php echo e($country_name); ?>"
                       data-onLoad="<?php echo e(__('Loading...')); ?>"
                       data-default="<?php echo e(json_encode($list_json)); ?>"
                       id="countrySearchInput">
                <input type="hidden" class="child_id" name="country" value="<?php echo e($country_id); ?>" id="countryInput">
                <span class="icon flaticon-map-locator"></span>
            </div>
        <?php elseif($country_search_style == 'autocomplete' && $country_id == null): ?>
            <div class="form-group bc-select-has-delete">
                <select class="chosen-select" name="country" id="countrySelect">
                    <option value=""><?php echo e(__('Choose a country')); ?></option>
                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($country->id); ?>" <?php echo e($country_id == $country->id ? 'selected' : ''); ?>>
                            <?php echo e($country->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <span class="icon flaticon-map-locator"></span>
            </div>
        <?php endif; ?>
    </div>

    <!-- City Filter -->
    <div class="filter-block">
        <h4>City</h4>

        <div class="form-group bc-select-has-delete">
            <select class="chosen-container chosen-container-single chosen-container-single-nosearch" name="location" id="citySelect">
                <option value=""><?php echo e(__('Choose a city')); ?></option>
                
            </select>
            <span class="icon flaticon-map-locator"></span>
        </div>
    </div>
<?php endif; ?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selectedCountry = '<?php echo e($country_id); ?>';
        const selectedCity = '<?php echo e($city_id); ?>';

        const countrySelect = document.getElementById('countrySelect') || document.getElementById('countryInput');
        const citySelect = document.getElementById('citySelect');

        function __(text) {
            return text; // Fallback if Blade translation not rendered
        }

        function loadCities(countryId, preselectedCityId = null) {
            if (!countryId || !citySelect) return;

            fetch(`/get-cities/${countryId}`)
                .then(response => response.json())
                .then(data => {
                    citySelect.innerHTML = `<option value="">${('Select City')}</option>`;

                    data.forEach(city => {
                        const option = document.createElement('option');
                        option.value = city.id;
                        option.textContent = city.name;
                        if (city.id == preselectedCityId) {
                            option.selected = true;
                        }
                        citySelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error fetching cities:', error);
                });
        }

        // Load cities on page load
        if (selectedCountry) {
            loadCities(selectedCountry, selectedCity);
        }

        // Watch for changes in country select dropdown (for select dropdown mode)
        if (countrySelect) {
            countrySelect.addEventListener('change', function () {
                const newCountryId = this.value;
                loadCities(newCountryId);
            });
        }
    });
</script>
<?php /**PATH C:\xampp7\htdocs\jobsning\modules/Job/Views/frontend/layouts/form-search/fields/form-style-1/country.blade.php ENDPATH**/ ?>