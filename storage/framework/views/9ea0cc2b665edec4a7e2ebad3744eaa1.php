<div class="sidebar-widget widget_bloglist recent-post">
    <div class="sidebar-title">
        <h4><?php echo e($item->title); ?></h4>
    </div>
    <div class="widget-content thumb-list">
        <?php $list_blog = $model_news->with(['getCategory','translations'])->orderBy('id','desc')->paginate(5) ?>
        <?php if($list_blog): ?>
            <?php $__currentLoopData = $list_blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $translation = $blog->translateOrOrigin(app()->getLocale()) ?>
                <article class="post">
                    <?php if($image_url = get_file_url($blog->image_id, 'thumb')): ?>
                        <div class="post-thumb">
                            <a href="<?php echo e($blog->getDetailUrl(app()->getLocale())); ?>"><?php echo get_image_tag($blog->image_id,'thumb',['class'=>'','alt'=>$blog->title]); ?></a>
                        </div>
                    <?php endif; ?>
                    <h6>
                        <a href="<?php echo e($blog->getDetailUrl(app()->getLocale())); ?>"><?php echo e($translation->title); ?></a>
                    </h6>
                    <div class="post-info">
                        <?php echo e(display_date($blog->updated_at)); ?>

                    </div>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\News\Views\frontend\layouts\sidebars\recent_news.blade.php ENDPATH**/ ?>