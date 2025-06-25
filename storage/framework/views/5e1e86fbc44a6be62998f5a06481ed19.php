<style>
.currency-toggle {
    display: flex;
    gap: 6px;
}
.currency-toggle label {
    border: 1px solid #ccc;
    border-radius: 6px;
    padding: 10px 12px;
    cursor: pointer;
    text-align: center;
    flex: 1;
    user-select: none;
}
.currency-toggle input[type="radio"] {
    display: none;
}

.currency-option.selected {
    background-color: #e7e7e7 !important;
    color: white;
    border-color: #007bff;
}
.price-value {
    color: black;
}
label.btn.btn-outline-primary.currency-option:hover {
    background-color: #e2e2e2;
}

</style>


<div class="sec-title text-center">
    <h2><?php echo e(setting_item_with_lang('user_plans_page_title', app()->getLocale()) ?? __("Pricing Packages")); ?></h2>
    <div class="text"><?php echo e(setting_item_with_lang('user_plans_page_sub_title', app()->getLocale()) ?? __("Choose your pricing plan")); ?></div>
</div>
<div class="pricing-tabs tabs-box">
    <div class="tab-buttons">
        <h4><?php echo e(setting_item_with_lang('user_plans_sale_text', app()->getLocale()) ?? __('Save up to 10%')); ?></h4>
        <ul class="tab-btns">
            <li data-tab="#monthly" class="tab-btn active-btn"><?php echo e(__('Monthly')); ?></li>
            <li data-tab="#annual" class="tab-btn"><?php echo e(__('Annual')); ?></li>
        </ul>
    </div>
    <div class="tabs-content">
        <div class="tab active-tab" id="monthly">
            <div class="content">
                <div class="row">
                    <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php 
                            $currency = request('currency') ?? 'inr';
                            $price = $plan->getCurrencyPrice($currency, false);
                            $annualPrice = $plan->getCurrencyPrice($currency, true); // Annual
                            $currencySymbol = [
                                'inr' => '₹',
                                'usd' => '$',
                                'eur' => '€'
                            ][$currency] ?? '$';
                        ?>
                        <?php
                            $translate = $plan->translateOrOrigin(app()->getLocale());
                        ?>
                        <div class="pricing-table col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <?php if($plan->is_recommended): ?>
                                    <span class="tag"><?php echo e(__('Recommended')); ?></span>
                                <?php endif; ?>
                                <div class="title"><?php echo e($translate->title); ?></div>

                                <div class="btn-group currency-toggle" role="group" aria-label="Currency selector">
                                    <?php
                                        $dur = $plan->duration . ' ' . $plan->duration_type_text;
                                        $prices = [
                                            'inr' => ['symbol' => '₹', 'value' => $plan->price_inr],
                                            'usd' => ['symbol' => '$', 'value' => $plan->price_usd],
                                            'eur' => ['symbol' => '€', 'value' => $plan->price_eur],
                                        ];
                                    ?>

                                    <?php $__currentLoopData = $prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <label class="btn btn-outline-primary currency-option">
                                            <input type="radio" name="currency_<?php echo e($plan->id); ?>" value="<?php echo e($key); ?>" autocomplete="off" <?php echo e($loop->first ? 'checked' : ''); ?>>
                                            <span class="price-value">
                                                <?php echo e($data['symbol']); ?> <?php echo e(number_format($data['value'], 2)); ?><br>
                                                <small>/ <?php echo e($dur); ?></small>
                                            </span>
                                        </label>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                                <form id="currency-form-<?php echo e($plan->id); ?>" method="GET" action="<?php echo e(route('user.plan.buy', ['id' => $plan->id])); ?>">
                                    <input type="hidden" name="currency" id="selected-currency-<?php echo e($plan->id); ?>" value="inr">
                                </form>
<!-- 
                                <div class="price"><?php echo e($plan->price ? format_money($plan->price) : __('Free')); ?>

                                    <?php if($plan->price): ?>
                                    <span class="duration">/ <?php echo e($plan->duration > 1 ? $plan->duration : ''); ?> <?php echo e($plan->duration_type_text); ?></span>
                                    <?php endif; ?>
                                </div> -->
                                <div class="table-content">
                                    <?php echo clean($translate->content); ?>

                                </div>
                                <div class="table-footer">
                                    <?php if($user and $user_plan = $user->user_plan and $user_plan->plan_id == $plan->id): ?>
                                        <?php if($user_plan->is_valid): ?>
                                            <div class="d-flex text-center">
                                                <a href="<?php echo e(route('user.plan')); ?>" class="theme-btn btn-style-one mr-2"><?php echo e(__("Current Plan")); ?></a>
                                                <?php if(setting_item_with_lang('enable_multi_user_plans')): ?>
                                                    <a href="<?php echo e(route('user.plan.buy',['id'=>$plan->id])); ?>" class="theme-btn btn-style-two"><?php echo e(__('Repurchase')); ?></a>
                                                <?php endif; ?>
                                            </div>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('user.plan.buy',['id'=>$plan->id])); ?>" class="theme-btn btn-style-two"><?php echo e(__('Repurchase')); ?></a>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <a href="#" onclick="event.preventDefault(); submitCurrency(<?php echo e($plan->id); ?>);" class="theme-btn btn-style-three">
                                            <?php echo e(__('Select')); ?>

                                        </a>

                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <div class="tab" id="annual">
            <div class="content">
                <div class="row">
                    <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(!$plan->annual_price) continue;?>
                        <div class="pricing-table col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <?php if($plan->is_recommended): ?>
                                    <span class="tag"><?php echo e(__('Recommended')); ?></span>
                                <?php endif; ?>
                                <div class="title"><?php echo e($plan->title); ?></div>
                                <div class="price"><?php echo e(format_money($plan->annual_price)); ?> <span class="duration">/ <?php echo e(__("year")); ?></span></div>
                                <div class="table-content">
                                    <?php echo clean($plan->content); ?>

                                </div>
                                <div class="table-footer">
                                    <?php if($user and $user_plan = $user->user_plan and $user_plan->plan_id == $plan->id): ?>
                                        <?php if($user_plan->is_valid): ?>
                                            <div class="d-flex text-center">
                                                <a href="<?php echo e(route('user.plan')); ?>" class="theme-btn btn-style-one mr-2"><?php echo e(__("Current Plan")); ?></a>
                                                <?php if(setting_item_with_lang('enable_multi_user_plans')): ?>
                                                    <a href="<?php echo e(route('user.plan.buy',['id'=>$plan->id])); ?>" class="theme-btn btn-style-two"><?php echo e(__('Repurchase')); ?></a>
                                                <?php endif; ?>
                                            </div>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('user.plan.buy',['id'=>$plan->id,'annual'=>1])); ?>" class="theme-btn btn-style-two"><?php echo e(__('Repurchase')); ?></a>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('user.plan.buy',['id'=>$plan->id,'annual'=>1])); ?>" class="theme-btn btn-style-three"><?php echo e(__('Select')); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
function submitCurrency(planId) {
    const selectedCurrency = document.querySelector('input[name="currency_' + planId + '"]:checked');
    if (selectedCurrency) {
        document.getElementById('selected-currency-' + planId).value = selectedCurrency.value;
        document.getElementById('currency-form-' + planId).submit();
    }
}

// Highlight selected currency visually
document.querySelectorAll('.currency-toggle input[type="radio"]').forEach(radio => {
    radio.addEventListener('change', function () {
        const all = this.closest('.currency-toggle').querySelectorAll('.currency-option');
        all.forEach(label => label.classList.remove('selected'));
        this.closest('label').classList.add('selected');
    });

    // Initialize default selection
    if (radio.checked) {
        radio.closest('label').classList.add('selected');
    }
});
</script>
<?php /**PATH C:\xampp\htdocs\jobsning\modules/User/Views/frontend/plan/list.blade.php ENDPATH**/ ?>