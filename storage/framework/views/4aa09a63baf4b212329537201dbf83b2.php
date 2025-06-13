<!-- Filter Block -->
<?php if(!empty($min_max_price[1])): ?>
    <div class="filter-block">
        <h4><?php echo e($val['title']); ?></h4>

        <div class="range-slider-one salary-range">
            <input type="hidden" name="amount_from" value="<?php echo e(request()->get('amount_from') ?? $min_max_price[0]); ?>">
            <input type="hidden" name="amount_to" value="<?php echo e(request()->get('amount_from') ?? $min_max_price[1]); ?>">
            <div class="candidate-salary-range-slider"></div>
            <div class="input-outer">
                <div class="amount-outer">
                    <span class="amount candidate-salary-amount">
                        <span class="min">0</span>
                        <span class="max">0</span>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <?php $__env->startSection('footer'); ?>
        <script>
            //Salary Range Slider
            $( ".candidate-salary-range-slider" ).slider({
                range: true,
                min: <?php echo e($min_max_price[0]); ?>,
                max: <?php echo e($min_max_price[1]); ?>,
                values: [ <?php echo e(request()->get('amount_from') ?? 0); ?>, <?php echo e(request()->get('amount_to') ?? $min_max_price[1]); ?> ],
                slide: function( event, ui ) {
                    $( ".candidate-salary-amount .min" ).text( bc_format_money(ui.values[0]));
                    $( ".candidate-salary-amount .max" ).text( bc_format_money(ui.values[1]));
                    $( "input[name=amount_from]").val(ui.values[0]);
                    $( "input[name=amount_to]").val(ui.values[1]);
                }
            });

            $( ".candidate-salary-amount .min" ).text( bc_format_money($( ".candidate-salary-range-slider" ).slider( "values", 0 )));
            $( ".candidate-salary-amount .max" ).text( bc_format_money($( ".candidate-salary-range-slider" ).slider( "values", 1 )));
        </script>
    <?php $__env->stopSection(); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Candidate\Views\frontend\layouts\sidebars\fields\salary.blade.php ENDPATH**/ ?>