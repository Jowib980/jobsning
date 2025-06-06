<form method="get" >
    <input type="hidden" name="_layout" value="<?php echo e($layout); ?>" />
    <?php
        $candidate_sidebar_search_fields = setting_item_array('candidate_sidebar_search_fields');
        $candidate_sidebar_search_fields = array_values(\Illuminate\Support\Arr::sort($candidate_sidebar_search_fields, function ($value) {
            return $value['position'] ?? 0;
        }));
    ?>
    <?php if($candidate_sidebar_search_fields): ?>
        <?php $__currentLoopData = $candidate_sidebar_search_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $val['title'] = $val['title_'.app()->getLocale()] ?? $val['title'] ?? "" ?>
            <?php echo $__env->make("Candidate::frontend.layouts.sidebars.fields." . $val['type'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <div class="wrapper-submit flex-middle col-xs-12 col-md-12">
        <button type="submit" class="theme-btn btn-style-one bg-blue"><?php echo e(__("Find Candidates")); ?></button>
    </div>
</form>
<?php /**PATH C:\xampp7\htdocs\jobsning\modules/Candidate/Views/frontend/layouts/sidebars/category-sidebar.blade.php ENDPATH**/ ?>