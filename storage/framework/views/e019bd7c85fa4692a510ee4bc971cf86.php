<?php
if(!$category->children) return;
$translation = $category->translateOrOrigin(app()->getLocale());
?>
    <div class="category-faqs pt-5 pb-5">
        <h2 class="category-page-title text-center mb-5 mt-4"><?php echo e(__('Services Related To :name',['name' => $translation->name])); ?></h2>
        <div class="category-tag-lists mt-3 d-flex justify-content-center" id="accordionExample">
            <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $cat_translation = $cat->translateOrOrigin(app()->getLocale()); ?>
                <a class="cat-faq-item" href="<?php echo e($cat->getDetailUrl()); ?>"><?php echo e($cat_translation->name); ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Gig\Views\frontend\search\related.blade.php ENDPATH**/ ?>