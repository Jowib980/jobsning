<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__("General Style")); ?></h3>
        <p class="form-group-desc"><?php echo e(__('Change main color, typo ...')); ?></p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-title"><strong><?php echo e(__('General Options')); ?></strong></div>
            <div class="panel-body">
                <?php if(is_default_lang()): ?>
                    <div class="form-group">
                        <label><?php echo e(__("Enable Preloader")); ?></label>
                        <div class="form-controls">
                            <label><input type="checkbox" <?php if(setting_item('enable_preloader') ?? '' == 1): ?> checked <?php endif; ?> name="enable_preloader" value="1"><?php echo e(__('Enable')); ?></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label><?php echo e(__("Main color")); ?></label>
                        <div class="form-controls">
                            <input type="text" name="style_main_color" value="<?php echo e($settings['style_main_color'] ?? '#5191FA'); ?>" class="has-colorpicker d-none">
                        </div>
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <label><strong><?php echo e(__("Typography")); ?></strong></label>
                    <div class="form-controls">
                        <?php
                            $typo = json_decode(setting_item_with_lang('style_typo',request()->query('lang')),true) ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo e(__("Font Family")); ?></label>
                                    <input type="text" name="style_typo[font_family]" class="form-control"  value="<?php echo e($typo['font_family'] ?? ''); ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo e(__("Color")); ?></label>
                                    <div class="form-controls">
                                        <input type="text" name="style_typo[color]" class="has-colorpicker"  value="<?php echo e($typo['color'] ?? ''); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo e(__("Font Size")); ?></label>
                                    <input type="text" name="style_typo[font_size]" class="form-control" min="0" max="60" value="<?php echo e($typo['font_size'] ?? ''); ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo e(__("Line Height")); ?></label>
                                    <input type="text" name="style_typo[line_height]" class="form-control" min="0" max="60" value="<?php echo e($typo['line_height'] ?? ''); ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><?php echo e(__("Font Weight")); ?></label>
                                    <input type="text" placeholder="<?php echo e(__('bold or 400')); ?>" name="style_typo[font_weight]" class="form-control"  value="<?php echo e($typo['font_weight'] ?? ''); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if(is_default_lang()): ?>
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <h3 class="form-group-title"><?php echo e(__("Custom CSS for all languages")); ?></h3>
            <p class="form-group-desc"><?php echo e(__('Write your own custom css code')); ?></p>
        </div>
        <div class="col-sm-8">
            <div class="panel">
                <div class="panel-title"><strong><?php echo e(__('Custom CSS')); ?></strong></div>
                <div class="panel-body">
                    <div class="form-group">
                        <label><?php echo e(__("Custom CSS")); ?></label>
                        <div class="form-controls">
                            <div id="custom_css_editor" class="ace-editor" style="height: 400px" data-theme="monokai" data-mod="css"><?php echo e(setting_item('style_custom_css')); ?></div>
                            <textarea class="d-none" name="style_custom_css" > <?php echo e(setting_item('style_custom_css')); ?> </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <hr>
    <div class="row">
        <div class="col-sm-4">
            <h3 class="form-group-title"><?php echo e(__("Custom CSS for :name",['name'=>request('lang')])); ?></h3>
            <p class="form-group-desc"><?php echo e(__('Write your own custom css code')); ?></p>
        </div>
        <div class="col-sm-8">
            <div class="panel">
                <div class="panel-title"><strong><?php echo e(__('Custom CSS')); ?></strong></div>
                <div class="panel-body">
                    <div class="form-group">
                        <label><?php echo e(__("Custom CSS")); ?></label>
                        <div class="form-controls">
                            <div id="custom_css_editor" class="ace-editor" style="height: 400px" data-theme="monokai" data-mod="css"><?php echo e(setting_item_with_lang('style_custom_css',request()->query('lang'))); ?></div>
                            <textarea class="d-none" name="style_custom_css" > <?php echo e(setting_item_with_lang_raw('style_custom_css',request()->query('lang'))); ?> </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php $__env->startSection('script.body'); ?>
    <script src="<?php echo e(asset('libs/ace/src-min-noconflict/ace.js')); ?>" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo e(asset('libs/spectrum/spectrum.js')); ?>" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" href="<?php echo e(asset('libs/spectrum/spectrum.css')); ?>">
    <script>
        (function ($) {
            $('.ace-editor').each(function () {

                var editor = ace.edit($(this).attr('id'));
                editor.setTheme("ace/theme/"+$(this).data('theme'));
                editor.session.setMode("ace/mode/"+$(this).data('mod'));
                var me = $(this);

                editor.session.on('change', function(delta) {
                    // delta.start, delta.end, delta.lines, delta.action
                    me.next('textarea').val(editor.getValue());
                });
            });

            $('.has-colorpicker').spectrum({
                togglePaletteMoreText: 'more',
                togglePaletteLessText: 'less',
                showAlpha: true,
                showPalette: true,
                palette: [
                    ["#000","#444","#666","#999","#ccc","#eee","#f3f3f3","#fff"],
                    ["#f00","#f90","#ff0","#0f0","#0ff","#00f","#90f","#f0f"],
                    ["#f4cccc","#fce5cd","#fff2cc","#d9ead3","#d0e0e3","#cfe2f3","#d9d2e9","#ead1dc"],
                    ["#ea9999","#f9cb9c","#ffe599","#b6d7a8","#a2c4c9","#9fc5e8","#b4a7d6","#d5a6bd"],
                    ["#e06666","#f6b26b","#ffd966","#93c47d","#76a5af","#6fa8dc","#8e7cc3","#c27ba0"],
                    ["#c00","#e69138","#f1c232","#6aa84f","#45818e","#3d85c6","#674ea7","#a64d79"],
                    ["#900","#b45f06","#bf9000","#38761d","#134f5c","#0b5394","#351c75","#741b47"],
                    ["#600","#783f04","#7f6000","#274e13","#0c343d","#073763","#20124d","#4c1130"]
                ],
                showInput: true,
                allowEmpty:true,
                showInitial: true,
                preferredFormat: "hex",
            });
        })(jQuery)
    </script>
<?php $__env->stopSection(); ?>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Core\Views\admin\settings\groups\style.blade.php ENDPATH**/ ?>