<!-- Filter Block -->
<div class="filter-block form-group v4_conpany_founded_date text-center">
    <h4><?php echo e(__("Founded Date")); ?></h4>
    <div class="range-slider-tyle-4">
        <div class="range-slider"></div>
        <div class="input-outer">
            <div class="amount-outer"><span class="count"></span></div>
        </div>
        <input type="hidden" class="range_from" name="from_date" value="<?php echo e(Request::query('from_date')); ?>">
        <input type="hidden" class="range_to" name="to_date" value="<?php echo e(Request::query('to_date')); ?>">
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Company\Views\frontend\layouts\sidebars\fields\style-4\founded_date.blade.php ENDPATH**/ ?>