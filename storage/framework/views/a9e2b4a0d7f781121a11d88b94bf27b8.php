<?php if($category->children): ?>
    <div class="category-children">
        <div class="row ">
            <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $cat_translation = $cate->translateOrOrigin(app()->getLocale()); ?>
                <div class="category-block-three col-lg-2 col-md-3 col-sm-6">
                    <div class="inner-box h-100">
                        <a href="<?php echo e($cate->getDetailUrl()); ?>">
                            <div class="content">
                                <?php if($cate->image_id): ?>
                                    <div class="icon bg-cover div-70s" style="background-image: url('<?php echo e(get_file_url($cate->image_id,'full')); ?>')"></div>
                                <?php endif; ?>
                                <h4><?php echo e($cat_translation->name); ?></h4>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Gig\Views\frontend\search\children.blade.php ENDPATH**/ ?>