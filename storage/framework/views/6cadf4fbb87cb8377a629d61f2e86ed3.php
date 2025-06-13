<?php if(is_default_lang()): ?>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__('Guest Checkout')); ?></h3>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label class="" ><?php echo e(__("Enable guest checkout")); ?></label>
                    <div class="form-controls">
                        <label><input type="checkbox" name="booking_guest_checkout" value="1" <?php if(!empty($settings['booking_guest_checkout'])): ?> checked <?php endif; ?> /> <?php echo e(__("Yes, please")); ?> </label>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__('Checkout Page')); ?></h3>
        <p class="form-group-desc"><?php echo e(__('Change your checkout page options')); ?></p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label class="" ><?php echo e(__("Enable reCapcha Booking Form")); ?></label>
                    <div class="form-controls">
                        <label><input type="checkbox" name="booking_enable_recaptcha" value="1" <?php if(!empty($settings['booking_enable_recaptcha'])): ?> checked <?php endif; ?> /> <?php echo e(__("On ReCapcha")); ?> </label>
                        <br>
                        <small class="form-text text-muted"><?php echo e(__("Turn on the mode for booking form")); ?></small>
                    </div>
                </div>
                <div class="form-group">
                    <label ><?php echo e(__("Terms & Conditions page")); ?></label>
                    <div class="form-controls">
                        <?php
                            $template = !empty($settings['booking_term_conditions']) ? \Modules\Page\Models\Page::find($settings['booking_term_conditions'] ) : false;
                            \App\Helpers\AdminForm::select2('booking_term_conditions',[
                            'configs'=>[
                                    'ajax'=>[
                                        'url'=>url('/admin/module/page/getForSelect2'),
                                        'dataType'=>'json'
                                    ]
                                ]
                            ],
                            !empty($template->id) ? [$template->id,$template->title] :false
                            )
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<?php endif; ?>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__('Invoice Page')); ?></h3>
        <p class="form-group-desc"><?php echo e(__('Change your invoice page options')); ?></p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <?php if(is_default_lang()): ?>
                    <div class="form-group">
                        <label><?php echo e(__("Invoice Logo")); ?></label>
                        <div class="form-controls form-group-image">
                            <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('logo_invoice_id',$settings['logo_invoice_id'] ?? ''); ?>

                        </div>
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <label class=""><?php echo e(__("Invoice Company Info")); ?></label>
                    <div class="form-controls">
                        <textarea name="invoice_company_info" class="d-none has-ckeditor" cols="30" rows="10"><?php echo e(setting_item_with_lang('invoice_company_info',request()->query('lang'))); ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__('Other Settings')); ?></h3>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label class="" ><?php echo e(__("Why Book With Us?")); ?></label>
                </div>
                <div class="form-group">
                    <div class="form-group-item">
                        <div class="form-group-item">
                            <div class="g-items-header">
                                <div class="row">
                                    <div class="col-md-3"><?php echo e(__("Title")); ?></div>
                                    <div class="col-md-8"><?php echo e(__('Class icon')); ?></div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                            <div class="g-items">
                                <?php $booking_why_book_with_us = setting_item_array('booking_why_book_with_us',[]); ?>
                                <?php $__currentLoopData = $booking_why_book_with_us; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="item" data-number="<?php echo e($key); ?>">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <label><?php echo e(__("Title")); ?></label>
                                                <div>
                                                    <input type="text" name="booking_why_book_with_us[<?php echo e($key); ?>][title]" placeholder="<?php echo e(__("Customer care available 24/7")); ?>" class="form-control" value="<?php echo e($item['title'] ?? ""); ?>">
                                                    <input type="text" name="booking_why_book_with_us[<?php echo e($key); ?>][link]" placeholder="<?php echo e(__("#")); ?>" class="form-control" value="<?php echo e($item['link'] ?? ""); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label><?php echo e(__("Icon")); ?></label>
                                                <div>
                                                    <input type="text" name="booking_why_book_with_us[<?php echo e($key); ?>][icon]"placeholder="fa fa-phone" class="form-control" value="<?php echo e($item['icon'] ?? ""); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="text-right">
                                <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> <?php echo e(__('Add item')); ?></span>
                            </div>
                            <div class="g-more hide">
                                <div class="item" data-number="__number__">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <label><?php echo e(__("Title - Link info")); ?></label>
                                            <div>
                                                <input type="text" __name__="booking_why_book_with_us[__number__][title]" placeholder="<?php echo e(__("Customer care available 24/7")); ?>" class="form-control" value="">
                                                <input type="text" __name__="booking_why_book_with_us[__number__][link]" placeholder="<?php echo e(__("#")); ?>" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label><?php echo e(__("Icon")); ?></label>
                                            <div>
                                                <input type="text" __name__="booking_why_book_with_us[__number__][icon]"placeholder="fa fa-phone" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php /**PATH C:\xampp\htdocs\jobsning\modules\Booking\Views\admin\settings\booking.blade.php ENDPATH**/ ?>