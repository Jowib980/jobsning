<form method="get" action="<?php echo e((!empty($category) || !empty($location)) ? route('job.search') : request()->fullUrl()); ?>" >
    <?php
    $job_sidebar_search_fields = setting_item_array('job_sidebar_search_fields');
    $job_sidebar_search_fields = array_values(\Illuminate\Support\Arr::sort($job_sidebar_search_fields, function ($value) {
        return $value['position'] ?? 0;
    }));
    ?>
    <?php if($job_sidebar_search_fields): ?>
        <?php $__currentLoopData = $job_sidebar_search_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $val['title'] = $val['title_'.app()->getLocale()] ?? $val['title'] ?? "" ?>
            <?php if(request()->get('_layout') == 'v2' && in_array($val['type'], ['location', 'keyword', 'category', 'country', 'city'])): ?> <?php continue; ?> <?php endif; ?>
            <?php if ($__env->exists("Job::frontend.layouts.form-search.fields.form-style-1." . $val['type'])) echo $__env->make("Job::frontend.layouts.form-search.fields.form-style-1." . $val['type'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <div class="form-group col-lg-3">
                                    <select id="country_select" name="country" class="form-control">
                                        <option value=""><?php echo e(__("Select Country")); ?></option>
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($country->id); ?>"><?php echo e($country->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="form-group col-lg-3">
                                    <select id="city_select" name="location" class="form-control">
                                        <option value=""><?php echo e(__("Select City")); ?></option>
                                        
                                    </select>
                                </div>
    <div class="wrapper-submit flex-middle col-xs-12 col-md-12">
        <?php if(isset($_GET['_layout'])): ?>
            <input type="hidden" name="_layout" value="<?php echo e($_GET['_layout']); ?>">
        <?php endif; ?>
        <button type="submit" class="theme-btn btn-style-one bg-blue"><?php echo e(__("Find Jobs")); ?></button>
    </div>
</form>
<?php /**PATH C:\xampp7\htdocs\jobsning\modules/Job/Views/frontend/layouts/form-search/form-style-1.blade.php ENDPATH**/ ?>