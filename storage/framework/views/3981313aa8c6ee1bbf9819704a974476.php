<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__("Page List")); ?></h3>
        <p class="form-group-desc"><?php echo e(__('Config page list news of your website')); ?></p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label class="" ><?php echo e(__("Title Page")); ?></label>
                    <div class="form-controls">
                        <input type="text" name="news_page_list_title" value="<?php echo e(setting_item_with_lang('news_page_list_title',request()->query('lang'),$settings['news_page_list_title'] ?? '')); ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="" ><?php echo e(__("Sub Title Page")); ?></label>
                    <div class="form-controls">
                        <input type="text" name="news_page_list_sub_title" value="<?php echo e(setting_item_with_lang('news_page_list_sub_title',request()->query('lang'),$settings['news_page_list_sub_title'] ?? '')); ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="" ><?php echo e(__("SEO Options")); ?></label>
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#seo_1"><?php echo e(__("General Options")); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#seo_2"><?php echo e(__("Share Facebook")); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#seo_3"><?php echo e(__("Share Twitter")); ?></a>
                        </li>
                    </ul>
                    <div class="tab-content" >
                        <div class="tab-pane active" id="seo_1">
                            <div class="form-group" >
                                <label class="control-label"><?php echo e(__("Seo Title")); ?></label>
                                <input type="text" name="news_page_list_seo_title" class="form-control" placeholder="<?php echo e(__("Enter title...")); ?>" value="<?php echo e(setting_item_with_lang('news_page_list_seo_title',request()->query('lang'),$settings['news_page_list_seo_title'] ?? "")); ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label"><?php echo e(__("Seo Description")); ?></label>
                                <input type="text" name="news_page_list_seo_desc" class="form-control" placeholder="<?php echo e(__("Enter description...")); ?>" value="<?php echo e(setting_item_with_lang('news_page_list_seo_desc',request()->query('lang'),$settings['news_page_list_seo_desc'] ?? "")); ?>">
                            </div>
                            <?php if(is_default_lang()): ?>
                            <div class="form-group form-group-image">
                                <label class="control-label"><?php echo e(__("Featured Image")); ?></label>
                                <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('news_page_list_seo_image', $settings['news_page_list_seo_image'] ?? "" ); ?>

                            </div>
                            <?php endif; ?>
                        </div>
                        <?php $seo_share = !empty($settings['news_page_list_seo_share']) ? json_decode($settings['news_page_list_seo_share'],true): false;
                        $seo_share = setting_item_with_lang('news_page_list_seo_share',request()->query('lang'),$seo_share)
                        ?>
                        <div class="tab-pane" id="seo_2">
                            <div class="form-group">
                                <label class="control-label"><?php echo e(__("Facebook Title")); ?></label>
                                <input type="text" name="news_page_list_seo_share[facebook][title]" class="form-control" placeholder="<?php echo e(__("Enter title...")); ?>" value="<?php echo e($seo_share['facebook']['title'] ?? ""); ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label"><?php echo e(__("Facebook Description")); ?></label>
                                <input type="text" name="news_page_list_seo_share[facebook][desc]" class="form-control" placeholder="<?php echo e(__("Enter description...")); ?>" value="<?php echo e($seo_share['facebook']['desc'] ?? ""); ?>">
                            </div>
                            <?php if(is_default_lang()): ?>
                            <div class="form-group form-group-image">
                                <label class="control-label"><?php echo e(__("Facebook Image")); ?></label>
                                <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('news_page_list_seo_share[facebook][image]',$seo_share['facebook']['image'] ?? "" ); ?>

                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="tab-pane" id="seo_3">
                            <div class="form-group">
                                <label class="control-label"><?php echo e(__("Twitter Title")); ?></label>
                                <input type="text" name="news_page_list_seo_share[twitter][title]" class="form-control" placeholder="<?php echo e(__("Enter title...")); ?>" value="<?php echo e($seo_share['twitter']['title'] ?? ""); ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label"><?php echo e(__("Twitter Description")); ?></label>
                                <input type="text" name="news_page_list_seo_share[twitter][desc]" class="form-control" placeholder="<?php echo e(__("Enter description...")); ?>" value="<?php echo e($seo_share['twitter']['title'] ?? ""); ?>">
                            </div>
                            <?php if(is_default_lang()): ?>
                            <div class="form-group form-group-image">
                                <label class="control-label"><?php echo e(__("Twitter Image")); ?></label>
                                <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('news_page_list_seo_share[twitter][image]', $seo_share['twitter']['image'] ?? "" ); ?>

                            </div>
                            <?php endif; ?>
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
            <h3 class="form-group-title"><?php echo e(__("Review Options")); ?></h3>
            <p class="form-group-desc"><?php echo e(__('Config review for news')); ?></p>
        </div>
        <div class="col-sm-8">
            <div class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="" ><?php echo e(__("Enable review system for news?")); ?></label>
                        <div class="form-controls">
                            <label><input type="checkbox" name="news_enable_review" value="1" <?php if(!empty($settings['news_enable_review'])): ?> checked <?php endif; ?> /> <?php echo e(__("Yes, please enable it")); ?> </label>
                            <br>
                            <small class="form-text text-muted"><?php echo e(__("Turn on the mode for reviewing news")); ?></small>
                        </div>
                    </div>
                    <div class="form-group" data-condition="news_enable_review:is(1)">
                        <label class="" ><?php echo e(__("Review must be approval by admin")); ?></label>
                        <div class="form-controls">
                            <label><input type="checkbox" name="news_review_approved" value="1"  <?php if(!empty($settings['news_review_approved'])): ?> checked <?php endif; ?> /> <?php echo e(__("Yes please")); ?> </label>
                            <br>
                            <small class="form-text text-muted"><?php echo e(__("ON: Review must be approved by admin - OFF: Review is automatically approved")); ?></small>
                        </div>
                    </div>
                    <div class="form-group" data-condition="news_enable_review:is(1)">
                        <label class="" ><?php echo e(__("Review number per page")); ?></label>
                        <div class="form-controls">
                            <input type="number" class="form-control" name="news_review_number_per_page" value="<?php echo e($settings['news_review_number_per_page'] ?? 5); ?>" />
                            <small class="form-text text-muted"><?php echo e(__("Break comments into pages")); ?></small>
                        </div>
                    </div>
                    <div class="form-group d-none" data-condition="news_enable_review:is(1)">
                        <label class="" ><?php echo e(__("Review criteria")); ?></label>
                        <div class="form-controls">
                            <div class="form-group-item">
                                <div class="g-items-header">
                                    <div class="row">
                                        <div class="col-md-5"><?php echo e(__("Title")); ?></div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>
                                <div class="g-items">
                                    <?php
                                    if(!empty($settings['news_review_stats'])){
                                    $news_review_stats = json_decode($settings['news_review_stats']);
                                    ?>
                                    <?php $__currentLoopData = $news_review_stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="item" data-number="<?php echo e($key); ?>">
                                            <div class="row">
                                                <div class="col-md-11">
                                                    <input type="text" name="news_review_stats[<?php echo e($key); ?>][title]" class="form-control" value="<?php echo e($item->title); ?>" placeholder="<?php echo e(__('Eg: Service')); ?>">
                                                </div>
                                                <div class="col-md-1">
                                                    <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php } ?>
                                </div>
                                <div class="text-right">
                                    <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> <?php echo e(__('Add item')); ?></span>
                                </div>
                                <div class="g-more hide">
                                    <div class="item" data-number="__number__">
                                        <div class="row">
                                            <div class="col-md-11">
                                                <input type="text" __name__="news_review_stats[__number__][title]" class="form-control" value="" placeholder="<?php echo e(__('Eg: Service')); ?>">
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
<?php endif; ?>
<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__("Sidebar Options")); ?></h3>
        <p class="form-group-desc"><?php echo e(__('Config sidebar for news')); ?></p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <div class="form-controls">
                        <div class="form-group-item">
                            <div class="g-items-header">
                                <div class="row">
                                    <div class="col-md-8"><?php echo e(__("Title")); ?></div>
                                    <div class="col-md-3"><?php echo e(__('Type')); ?></div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                            <div class="g-items">
                                <?php
                                $social_share = [];
                                if(!empty($settings['news_sidebar'])){
                                $social_share  = $settings['news_sidebar'];

                                $social_share = json_decode(setting_item_with_lang('news_sidebar',request()->query('lang'),$settings['news_sidebar'] ?? "[]"));
                                ?>
                                <?php $__currentLoopData = $social_share; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="item" data-number="<?php echo e($key); ?>">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <input type="text" name="news_sidebar[<?php echo e($key); ?>][title]" class="form-control" placeholder="<?php echo e(__('Title: About Us')); ?>" value="<?php echo e($item->title); ?>">
                                                <textarea name="news_sidebar[<?php echo e($key); ?>][content]" rows="2" class="form-control" placeholder="<?php echo e(__("Content")); ?>"><?php echo e($item->content); ?></textarea>
                                            </div>
                                            <div class="col-md-3">
                                                <select class="form-control" name="news_sidebar[<?php echo e($key); ?>][type]">
                                                    <option <?php if(!empty($item->type) && $item->type=='search_form'): ?> selected <?php endif; ?> value="search_form"><?php echo e(__("Search Form")); ?></option>
                                                    <option <?php if(!empty($item->type) && $item->type=='recent_news'): ?> selected <?php endif; ?> value="recent_news"><?php echo e(__("Recent News")); ?></option>
                                                    <option <?php if(!empty($item->type) && $item->type=='category'): ?> selected <?php endif; ?> value="category"><?php echo e(__("Category")); ?></option>
                                                    <option <?php if(!empty($item->type) && $item->type=='tag'): ?> selected <?php endif; ?> value="tag"><?php echo e(__("Tags")); ?></option>
                                                    <option <?php if(!empty($item->type) && $item->type=='content_text'): ?> selected <?php endif; ?> value="content_text"><?php echo e(__("Content Text")); ?></option>
                                                </select>
                                            </div>
                                            <div class="col-md-1">
                                                <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php } ?>
                            </div>
                            <div class="text-right">
                                <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> <?php echo e(__('Add item')); ?></span>
                            </div>
                            <div class="g-more hide">
                                <div class="item" data-number="__number__">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input type="text" __name__="news_sidebar[__number__][title]" class="form-control" placeholder="<?php echo e(__('Title: About Us')); ?>">
                                            <textarea __name__="news_sidebar[__number__][content]" rows="3" class="form-control" placeholder="<?php echo e(__("Content")); ?>"></textarea>
                                        </div>
                                        <div class="col-md-3">
                                            <select class="form-control" __name__="news_sidebar[__number__][type]">
                                                <option value="search_form"><?php echo e(__("Search Form")); ?></option>
                                                <option value="recent_news"><?php echo e(__("Recent News")); ?></option>
                                                <option value="category"><?php echo e(__("Category")); ?></option>
                                                <option value="tag"><?php echo e(__("Tags")); ?></option>
                                                <option value="content_text"><?php echo e(__("Content Text")); ?></option>
                                            </select>
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
<?php /**PATH C:\xampp\htdocs\jobsning\modules\News\Views\admin\settings\news.blade.php ENDPATH**/ ?>