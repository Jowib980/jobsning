<?php if($category->children): ?>
    <?php
        $cat_translation = $category->translateOrOrigin(app()->getLocale());
    ?>
    <div class="category-types pb-3 pt-2">
        <h2 class="category-page-title mb-4"><?php echo e(__('Most popular in :name',['name'=>$cat_translation->name])); ?></h2>
        <div class="row">
            <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $translation = $cate->translateOrOrigin(app()->getLocale());
                ?>
                <div class="category-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <a href="<?php echo e($cate->getDetailUrl()); ?>">
                        <div class="content">
                            <?php if($cate->image_id): ?>
                                <div class="icon bg-cover div-70s" style="background-image: url('<?php echo e(get_file_url($cate->image_id,'full')); ?>')"></div>
                            <?php endif; ?>
                            <h4><?php echo e($translation->name); ?></h4>
                        </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Gig\Views\frontend\search\popular.blade.php ENDPATH**/ ?>