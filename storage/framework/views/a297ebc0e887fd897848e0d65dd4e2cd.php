<?php  $languages = \Modules\Language\Models\Language::getActive();
$packages = old('packages',$translation->packages);
?>
<div class="form-group-item row" >
    <label class="control-label col-md-3 text-right col-form-label"><?php echo e(__('Packages')); ?></label>
    <div class="col-md-9">
        <div class="g-items-header">
            <div class="row">
                <div class="col-md-3">&nbsp;</div>
                <div class="col-md-3"><?php echo e(__("Basic")); ?></div>
                <div class="col-md-3"><?php echo e(__("Standard")); ?></div>
                <div class="col-md-3"><?php echo e(__("Premium")); ?></div>
            </div>
        </div>
        <div class="g-items">
            <div class="item">
                <div class="row">
                    <div class="col-md-3 text-center">
                        <strong><?php echo e(__(" Name")); ?> <span class="text-danger">*</span></strong>
                    </div>
                    <div class="col-md-3">
                        <input type="text" required name="packages[0][name]" class="form-control" value="<?php echo e($packages[0]['name'] ?? 'Basic'); ?>" placeholder="<?php echo e(__('Name your package')); ?>">
                        <input type="hidden" name="packages[0][key]" value="basic">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="packages[1][name]" class="form-control" value="<?php echo e($packages[1]['name'] ?? 'Standard'); ?>" placeholder="<?php echo e(__('Name your package')); ?>">
                        <input type="hidden" name="packages[1][key]" value="standard">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="packages[2][name]" class="form-control" value="<?php echo e($packages[2]['name'] ?? 'Premium'); ?>" placeholder="<?php echo e(__('Name your package')); ?>">
                        <input type="hidden" name="packages[2][key]" value="premium">
                    </div>
                </div>
            </div>
            <?php if(is_default_lang()): ?>
                <div class="item">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <strong><?php echo e(__("Price")); ?> <span class="text-danger">*</span></strong>
                        </div>
                        <div class="col-md-3">
                            <input type="number" step="any" name="basic_price" min="5" class="form-control" required value="<?php echo e($row->basic_price); ?>" placeholder="<?php echo e(__('Package Price')); ?>">
                        </div>
                        <div class="col-md-3">
                            <input type="number" step="any" name="standard_price" class="form-control" value="<?php echo e($row->standard_price); ?>" placeholder="<?php echo e(__('Package Price')); ?>">
                        </div>
                        <div class="col-md-3">
                            <input type="number" step="any" name="premium_price" class="form-control" value="<?php echo e($row->premium_price); ?>" placeholder="<?php echo e(__('Package Price')); ?>">
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="item">
                <div class="row">
                    <div class="col-md-3 text-center">
                        <strong><?php echo e(__("Desc")); ?> <span class="text-danger">*</span></strong>
                    </div>
                    <div class="col-md-3">
                        <textarea name="packages[0][desc]" class="form-control" required placeholder="<?php echo e(__('Describe the details of your offering')); ?>" cols="30" rows="6"><?php echo e($packages[0]['desc'] ?? ''); ?></textarea>
                    </div>
                    <div class="col-md-3">
                        <textarea name="packages[1][desc]" class="form-control" placeholder="<?php echo e(__('Describe the details of your offering')); ?>" cols="30" rows="6"><?php echo e($packages[1]['desc'] ?? ''); ?></textarea>
                    </div>
                    <div class="col-md-3">
                        <textarea name="packages[2][desc]" class="form-control" placeholder="<?php echo e(__('Describe the details of your offering')); ?>" cols="30" rows="6"><?php echo e($packages[2]['desc'] ?? ''); ?></textarea>
                    </div>
                </div>
            </div>
            <?php if(is_default_lang()): ?>
                <div class="item">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <strong><?php echo e(__("Delivery Time")); ?> <span class="text-danger">*</span></strong>
                        </div>
                        <div class="col-md-3">
                            <select name="packages[0][delivery_time]" required class="form-control">
                                <option value=""><?php echo e(__("-- Please Select --")); ?></option>
                                <?php for($i = 1; $i <= 10; $i++): ?>
                                    <option <?php if(($packages[0]['delivery_time'] ?? '') == $i): ?> selected <?php endif; ?> value="<?php echo e($i); ?>"><?php echo e(__(":count Day(s)",['count'=>$i])); ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="packages[1][delivery_time]" class="form-control">
                                <option value=""><?php echo e(__("-- Please Select --")); ?></option>
                                <?php for($i = 1; $i <= 10; $i++): ?>
                                    <option <?php if(($packages[1]['delivery_time'] ?? '') == $i): ?> selected <?php endif; ?> value="<?php echo e($i); ?>"><?php echo e(__(":count Day(s)",['count'=>$i])); ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="packages[2][delivery_time]" class="form-control">
                                <option value=""><?php echo e(__("-- Please Select --")); ?></option>
                                <?php for($i = 1; $i <= 10; $i++): ?>
                                    <option <?php if(($packages[2]['delivery_time'] ?? '') == $i): ?> selected <?php endif; ?> value="<?php echo e($i); ?>"><?php echo e(__(":count Day(s)",['count'=>$i])); ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <strong><?php echo e(__("Revisions")); ?> <span class="text-danger">*</span></strong>
                        </div>
                        <div class="col-md-3">
                            <select name="packages[0][revision]" required class="form-control">
                                <option value=""><?php echo e(__("-- Please Select --")); ?></option>
                                <?php for($i = 1; $i <= 10; $i++): ?>
                                    <option <?php if(($packages[0]['revision'] ?? '') == $i): ?> selected <?php endif; ?> value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                <?php endfor; ?>
                                <option value="-1"><?php echo e(__("Unlimited")); ?></option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="packages[1][revision]" class="form-control">
                                <option value=""><?php echo e(__("-- Please Select --")); ?></option>
                                <?php for($i = 1; $i <= 10; $i++): ?>
                                    <option <?php if(($packages[1]['revision'] ?? '') == $i): ?> selected <?php endif; ?> value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                <?php endfor; ?>
                                <option value="-1"><?php echo e(__("Unlimited")); ?></option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="packages[2][revision]" class="form-control">
                                <option value=""><?php echo e(__("-- Please Select --")); ?></option>
                                <?php for($i = 1; $i <= 10; $i++): ?>
                                    <option <?php if(($packages[2]['revision'] ?? '') == $i): ?> selected <?php endif; ?> value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                <?php endfor; ?>
                                <option value="-1"><?php echo e(__("Unlimited")); ?></option>
                            </select>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="form-group-item row">
    <label class="control-label col-md-3 text-right col-form-label"><?php echo e(__('Package Compare')); ?></label>
    <div class="col-md-9">
        <div class="g-items-header">
            <div class="row">
                <div class="col-md-5"><?php echo e(__("Name")); ?></div>
                <div class="col-md-2"><?php echo e(__('Basic')); ?></div>
                <div class="col-md-2"><?php echo e(__('Standard')); ?></div>
                <div class="col-md-2"><?php echo e(__('Premium')); ?></div>
                <div class="col-md-1"></div>
            </div>
        </div>
        <div class="g-items">
            <?php $old = old('package_compare',$translation->package_compare ?? []);
            if(empty($old)) $old = [[]];
            ?>
            <?php if(!empty($old)): ?>
                <?php $__currentLoopData = $old; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$extra_price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item" data-number="<?php echo e($key); ?>">
                        <div class="row">
                            <div class="col-md-5">
                                <?php if(!empty($languages) && setting_item('site_enable_multi_lang') && setting_item('site_locale')): ?>
                                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $key_lang = setting_item('site_locale') != $language->locale ? "_".$language->locale : ""   ?>
                                        <div class="g-lang">
                                            <div class="title-lang"><?php echo e($language->name); ?></div>
                                            <input type="text" name="package_compare[<?php echo e($key); ?>][name<?php echo e($key_lang); ?>]" class="form-control" value="<?php echo e($extra_price['name'.$key_lang] ?? ''); ?>" placeholder="<?php echo e(__('Attribute Name')); ?>">
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <input type="text" name="package_compare[<?php echo e($key); ?>][name]" class="form-control" value="<?php echo e($extra_price['name'] ?? ''); ?>" placeholder="<?php echo e(__('Attribute Name')); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="col-md-2">
                                <input type="text"  name="package_compare[<?php echo e($key); ?>][content]" class="form-control" value="<?php echo e($extra_price['content'] ?? ''); ?>">
                            </div>
                            <div class="col-md-2">
                                <input type="text"  name="package_compare[<?php echo e($key); ?>][content1]" class="form-control" value="<?php echo e($extra_price['content1'] ?? ''); ?>">
                            </div>
                            <div class="col-md-2">
                                <input type="text"  name="package_compare[<?php echo e($key); ?>][content2]" class="form-control" value="<?php echo e($extra_price['content2'] ?? ''); ?>">
                            </div>
                            <div class="col-md-1">
                                <?php if(is_default_lang()): ?>
                                    <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
        <div class="text-right">
            <?php if(is_default_lang()): ?>
                <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> <?php echo e(__('Add item')); ?></span>
            <?php endif; ?>
        </div>
        <div class="g-more hide">
            <div class="item" data-number="__number__">
                <div class="row">
                    <div class="col-md-5">
                        <?php if(!empty($languages) && setting_item('site_enable_multi_lang') && setting_item('site_locale')): ?>
                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $key = setting_item('site_locale') != $language->locale ? "_".$language->locale : ""   ?>
                                <div class="g-lang">
                                    <div class="title-lang"><?php echo e($language->name); ?></div>
                                    <input type="text" __name__="package_compare[__number__][name<?php echo e($key); ?>]" class="form-control" value="" placeholder="<?php echo e(__('Attribute name')); ?>">
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <input type="text" __name__="package_compare[__number__][name]" class="form-control" value="" placeholder="<?php echo e(__('Attribute Name')); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="col-md-2">
                        <input type="text" __name__="package_compare[__number__][content]" class="form-control" value="">
                    </div>
                    <div class="col-md-2">
                        <input type="text" __name__="package_compare[__number__][content1]" class="form-control" value="">
                    </div>
                    <div class="col-md-2">
                        <input type="text" __name__="package_compare[__number__][content2]" class="form-control" value="">
                    </div>
                    <div class="col-md-1">
                        <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group-item row mt-3">
    <label class="control-label col-md-3 text-right col-form-label"><?php echo e(__('Add Extra Services')); ?></label>
    <div class="col-md-9">
        <div class="g-items-header">
            <div class="row">
                <div class="col-md-5"><?php echo e(__("Name")); ?></div>
                <div class="col-md-3"><?php echo e(__('Price')); ?></div>
                <div class="col-md-1"></div>
            </div>
        </div>
        <div class="g-items">
            <?php $old = old('extra_price',$row->extra_price ?? []);
            if(empty($old)) $old = [[]];
            ?>
            <?php if(!empty($old)): ?>
                <?php $__currentLoopData = $old; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$extra_price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item" data-number="<?php echo e($key); ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <?php if(!empty($languages) && setting_item('site_enable_multi_lang') && setting_item('site_locale')): ?>
                                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $key_lang = setting_item('site_locale') != $language->locale ? "_".$language->locale : ""   ?>
                                        <div class="g-lang">
                                            <div class="title-lang"><?php echo e($language->name); ?></div>
                                            <input type="text" name="extra_price[<?php echo e($key); ?>][name<?php echo e($key_lang); ?>]" class="form-control" value="<?php echo e($extra_price['name'.$key_lang] ?? ''); ?>" placeholder="<?php echo e(__('Extra price name')); ?>">
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <input type="text" name="extra_price[<?php echo e($key); ?>][name]" class="form-control" value="<?php echo e($extra_price['name'] ?? ''); ?>" placeholder="<?php echo e(__('Extra price name')); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="col-md-5">
                                <input type="number" <?php if(!is_default_lang()): ?> disabled <?php endif; ?> min="0" name="extra_price[<?php echo e($key); ?>][price]" class="form-control" value="<?php echo e($extra_price['price'] ?? ''); ?>">
                            </div>
                            <div class="col-md-1">
                                <?php if(is_default_lang()): ?>
                                    <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
        <div class="text-right">
            <?php if(is_default_lang()): ?>
                <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> <?php echo e(__('Add item')); ?></span>
            <?php endif; ?>
        </div>
        <div class="g-more hide">
            <div class="item" data-number="__number__">
                <div class="row">
                    <div class="col-md-6">
                        <?php if(!empty($languages) && setting_item('site_enable_multi_lang') && setting_item('site_locale')): ?>
                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $key = setting_item('site_locale') != $language->locale ? "_".$language->locale : ""   ?>
                                <div class="g-lang">
                                    <div class="title-lang"><?php echo e($language->name); ?></div>
                                    <input type="text" __name__="extra_price[__number__][name<?php echo e($key); ?>]" class="form-control" value="" placeholder="<?php echo e(__('Extra price name')); ?>">
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <input type="text" __name__="extra_price[__number__][name]" class="form-control" value="" placeholder="<?php echo e(__('Extra price name')); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="col-md-5">
                        <input type="number" min="0" __name__="extra_price[__number__][price]" class="form-control" value="">
                    </div>
                    <div class="col-md-1">
                        <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Gig\Views\admin\gig\pricing.blade.php ENDPATH**/ ?>