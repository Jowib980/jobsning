<?php if($category->types): ?>
    <?php
        $cat_translation = $category->translateOrOrigin(app()->getLocale());
    ?>
    <div class="category-types">
        <h2 class="category-page-title mb-4"><?php echo e(__('Explore :name',['name' => $cat_translation->name])); ?></h2>
        <div class="row">
            <?php $__currentLoopData = $category->types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $type_translation = $category_type->translateOrOrigin(app()->getLocale());
                ?>
                <div class="col-md-4 mb-5">
                    <div class="c-type-item h-100">
                        <?php if($category_type->image_id): ?>
                            <div class="bg-cover div-16-9 border-radius-8 mb-3" style="background-image: url('<?php echo e(get_file_url($category_type->image_id,'full')); ?>')"></div>
                        <?php endif; ?>
                        <h3 class="c-type-name fw-500 fs-18 mb-3"><?php echo e($type_translation->name); ?></h3>
                        <ul class="list-unstyled c-type-children">
                            <?php $__currentLoopData = $category_type->children(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $child_cat_translation = $child_cat->translateOrOrigin(app()->getLocale());
                                ?>
                                <li class="mb-2"><a class="d-block c-62646a" href="<?php echo e($child_cat->getDetailUrl()); ?>"><?php echo e($child_cat_translation->name); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Gig\Views\frontend\search\types.blade.php ENDPATH**/ ?>