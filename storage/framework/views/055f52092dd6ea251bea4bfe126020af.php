<form method="get" action="<?php echo e(request()->fullUrl()); ?>">
    <div class="row">
        <?php
            $job_banner_search_fields = setting_item_array('job_banner_search_fields');
            $job_banner_search_fields = array_values(\Illuminate\Support\Arr::sort($job_banner_search_fields, function ($value) {
                return $value['position'] ?? 0;
            }));
        ?>
        <?php if($job_banner_search_fields): ?>
            <?php $__currentLoopData = $job_banner_search_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make("Job::frontend.layouts.form-search.fields.form-banner-1." . $val['type'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <!-- Form Group -->
        <div class="form-group col-lg-2 col-md-12 col-sm-12 text-right">
            <?php if(isset($_GET['_layout'])): ?>
                <input type="hidden" name="_layout" value="<?php echo e($_GET['_layout']); ?>">
            <?php endif; ?>
            <button type="submit" class="theme-btn btn-style-one"><?php echo e(__("Find Jobs")); ?></button>
        </div>
    </div>
</form>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Job\Views\frontend\layouts\form-search\form-banner-1.blade.php ENDPATH**/ ?>