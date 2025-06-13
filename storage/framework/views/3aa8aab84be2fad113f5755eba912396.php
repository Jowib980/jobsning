

<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(route('gig.admin.store',['id'=>($row->id) ? $row->id : '-1','lang'=>request()->query('lang')])); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="container-fluid">
            <div class="d-flex justify-content-between mb20">
                <div class="">
                    <h1 class="title-bar"><?php echo e($row->id ? __('Edit: ').$row->title : __('Add new gig')); ?></h1>
                    <?php if($row->slug): ?>
                        <p class="item-url-demo"><?php echo e(__("Permalink")); ?>: <?php echo e(url('gig' )); ?>/<a href="#" class="open-edit-input" data-name="slug"><?php echo e($row->slug); ?></a>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="">
                    <?php if($row->slug): ?>
                        <a class="btn btn-primary btn-sm" href="<?php echo e($row->getDetailUrl(request()->query('lang'))); ?>" target="_blank"><?php echo e(__("View Gig")); ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php if($row->id): ?>
                <?php echo $__env->make('Language::admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <div class="lang-content-box">
                <div class="row">
                    <div class="col-md-9">
                        <div class="panel">
                            <div class="panel-title"><strong><?php echo e(__("Overview")); ?></strong></div>
                            <div class="panel-body">
                                <?php echo $__env->make('Gig::admin.gig.overview', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-title"><strong><?php echo e(__("Scope & Pricing")); ?></strong></div>
                            <div class="panel-body">
                                <?php echo $__env->make('Gig::admin.gig.pricing', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-title"><strong><?php echo e(__("Description")); ?></strong></div>
                            <div class="panel-body">
                                <?php echo $__env->make('Gig::admin.gig.description', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-title"><strong><?php echo e(__("Requirements")); ?></strong></div>
                            <div class="panel-body">
                                <p><?php echo e(__('Add questions to help buyers provide you with exactly what you need to start working on their order.')); ?></p>
                                <?php echo $__env->make('Gig::admin.gig.requirements', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                        <?php if(is_default_lang()): ?>
                        <div class="panel">
                            <div class="panel-title"><strong><?php echo e(__("Gallery")); ?></strong></div>
                            <div class="panel-body">
                                <p><?php echo e(__('Showcase Your Services In A Gig Gallery')); ?></p>
                                <?php echo $__env->make('Gig::admin.gig.gallery', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php echo $__env->make('Core::admin/seo-meta/seo-meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-md-3">
                        <div class="panel">
                            <div class="panel-title"><strong><?php echo e(__('Publish')); ?></strong></div>
                            <div class="panel-body">
                                <?php if(is_default_lang()): ?>
                                    <div>
                                        <label><input <?php if($row->status=='publish'): ?> checked <?php endif; ?> type="radio" name="status" value="publish"> <?php echo e(__("Publish")); ?>

                                        </label></div>
                                    <div>
                                        <label><input <?php if($row->status=='draft'): ?> checked <?php endif; ?> type="radio" name="status" value="draft"> <?php echo e(__("Draft")); ?>

                                        </label></div>

                                    <?php if(!empty($gig_manage_others)): ?>
                                            <hr>
                                        <div class="form-group">
                                            <label>
                                                <input type="checkbox" name="is_featured" <?php if($row->is_featured): ?> checked <?php endif; ?> value="1"> <?php echo e(__("Enable featured")); ?>

                                            </label>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <div class="text-right">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> <?php echo e(__('Save Changes')); ?></button>
                                </div>
                            </div>
                        </div>


                        <?php if(is_default_lang() and !empty($gig_manage_others)): ?>
                            <div class="panel">
                                <div class="panel-title"><strong><?php echo e(__("Author Setting")); ?></strong></div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <?php
                                        $user_id = old('author_id',$row->author_id);
                                        $user = $user_id ? App\User::find($user_id) : false;
                                        \App\Helpers\AdminForm::select2('author_id', [
                                            'configs' => [
                                                'ajax'        => [
                                                    'url' => url('/admin/module/user/getForSelect2'),
                                                    'dataType' => 'json'
                                                ],
                                                'allowClear'  => true,
                                                'placeholder' => __('-- Select User --')
                                            ]
                                        ], !empty($user->id) ? [
                                            $user->id,
                                            $user->getDisplayName() . ' (#' . $user->id . ')'
                                        ] : false)
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php echo $__env->make('Gig::admin.gig.attributes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script.body'); ?>
    <script>
        jQuery(function ($) {
            "use strict"
            var on_load = true;
            $('[name=cat_id]').on('change',function (){
                $('[name="cat2_id"] option').show().hide();
                $('[name="cat2_id"] [data-parent="'+$(this).val()+'"]').show();
                if(!on_load){
                    $('[name="cat2_id"] option:eq(0)').prop('selected', true);
                    $('[name="cat3_id"] option:eq(0)').prop('selected', true);
                }
                $('[name="cat2_id"]').trigger("change");
                on_load = false;
            }).trigger('change')
            $('[name=cat2_id]').on('change',function (){
                $('[name="cat3_id"] option').show().hide();
                $('[name="cat3_id"] [data-parent="'+$(this).val()+'"]').show();
            }).trigger('change')
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jobsning\modules\Gig\Views\admin\detail.blade.php ENDPATH**/ ?>