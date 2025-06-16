<!-- Filter Block -->
<div class="filter-block">
    <h4><?php echo e($val['title']); ?></h4>
    <div class="form-group">
        <input type="text" name="s" value="<?php echo e(request()->input('s')); ?>" placeholder="<?php echo e(__("Candidate title...")); ?>">
        <span class="icon flaticon-search-3"></span>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\jobsning\modules/Candidate/Views/frontend/layouts/sidebars/fields/keyword.blade.php ENDPATH**/ ?>