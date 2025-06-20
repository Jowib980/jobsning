<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__("User Plans Options")); ?></h3>
        <p class="form-group-desc"><?php echo e(__('Config user plans page')); ?></p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label><?php echo e(__("Page Title")); ?></label>
                    <div class="form-controls">
                        <input type="text" name="user_plans_page_title" class="form-control"  value="<?php echo e(setting_item_with_lang('user_plans_page_title',request()->query('lang')) ?? ''); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label><?php echo e(__("Page Sub Title")); ?></label>
                    <div class="form-controls">
                        <input type="text" name="user_plans_page_sub_title" class="form-control"  value="<?php echo e(setting_item_with_lang('user_plans_page_sub_title',request()->query('lang')) ?? ''); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label><?php echo e(__("Sale Of Text")); ?></label>
                    <div class="form-controls">
                        <input type="text" name="user_plans_sale_text" class="form-control"  value="<?php echo e(setting_item_with_lang('user_plans_sale_text',request()->query('lang')) ?? ''); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label><?php echo e(__("Enable Multi User Plans")); ?></label>
                    <div class="form-controls">
                        <label><input type="checkbox" name="user_plans_multiple_buy" value="1" <?php if(!empty($settings['enable_multi_user_plans'])): ?> checked <?php endif; ?> /> <?php echo e(__("On")); ?> </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\User\Views\admin\settings\plan.blade.php ENDPATH**/ ?>