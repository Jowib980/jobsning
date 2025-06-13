<?php if($category->faqs and !empty($category->faqs)): ?>
    <?php $cat_translation = $category->translateOrOrigin(app()->getLocale()); ?>
    <div class="category-faqs pb-5 pt-5 bg-fafafa">
        <div class="auto-container pb-5">
            <h2 class="category-page-title text-center mb-4"><?php echo e(__(':name FAQs',['name'=>$cat_translation->name])); ?></h2>
            <div class="category-faqs-accordion" id="accordionExample">
                <?php $__currentLoopData = $cat_translation->faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left d-flex align-items-center justify-content-between collapsed" type="button" data-toggle="collapse" data-target="#collapse<?php echo e($k); ?>" aria-expanded="true" aria-controls="collapseOne">
                                <?php echo e($faq['title'] ?? ''); ?>

                                <i class="las la-angle-up"></i>
                            </button>
                        </h2>
                    </div>

                    <div id="collapse<?php echo e($k); ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <?php echo nl2br(clean($faq['content'] ?? '')); ?>

                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Gig\Views\frontend\search\faqs.blade.php ENDPATH**/ ?>