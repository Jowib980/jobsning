<!-- Filter Block -->
<?php $city_search_style = setting_item('job_city_search_style') ?>
<?php if($countries): ?>
    <div class="filter-block">
        <h4><?php echo e($val['title']); ?></h4>
        <?php if($city_search_style == 'autocomplete'): ?>
                <?php
                    $country_name = "";
                    $list_json = [];
                    $country_id = request()->get('country');
                    foreach ($countries as $country) {
                        if ($country_id == $country->id) {
                            $country_name = $country->name;
                        }
                        $list_json[] = [
                            'id'    => $country->id,
                            'title' => $country->name,
                        ];
                    }
                ?>

                <div class="form-group smart-search">
                    <input type="text"
                           class="smart-search-country parent_text form-control"
                           id="city_select"
                           placeholder="<?php echo e(__('Choose a city')); ?>"
                           value="<?php echo e($country_name); ?>"
                           data-onLoad="<?php echo e(__('Loading...')); ?>"
                           data-default="<?php echo e(json_encode($list_json)); ?>">
                    <input type="hidden" class="child_id" name="country" value="<?php echo e($country_id); ?>">
                    <span class="icon flaticon-map-locator"></span>
                </div>
            <?php else: ?>
            <div class="form-group bc-select-has-delete">
                <select class="chosen-select" name="city">
                    <option value=""><?php echo e(__('Choose a city')); ?></option>
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
<?php endif; ?>


<script>
    $(document).ready(function() {
        let selectedCountry = '<?php echo e($country_id ?? ''); ?>';
        let selectedCity = '<?php echo e(request("location")); ?>';

        if (selectedCountry) {

            // Delay fetch to wait for DOM
            $.ajax({
                url: '/get-cities/' + selectedCountry,
                method: 'GET',
                success: function (data) {
                    $('#citySelect').empty().append('<option value=""><?php echo e(__("Choose a city")); ?></option>');
                    $.each(data, function (key, city) {
                        let selected = city.id == selectedCity ? 'selected' : '';
                        $('#citySelect').append('<option value="' + city.id + '" ' + selected + '>' + city.name + '</option>');
                    });
                }
            });
        }
    });
</script>

<?php /**PATH C:\xampp7\htdocs\jobsning\modules/Job/Views/frontend/layouts/form-search/fields/form-style-1/city.blade.php ENDPATH**/ ?>