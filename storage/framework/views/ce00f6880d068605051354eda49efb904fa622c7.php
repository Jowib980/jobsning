<section class="clients-section-two alternate">
    <div class="auto-container">
        <div class="sec-title text-center">
            <h2><?php echo e($title); ?></h2>
            <div class="text"><?php echo e($sub_title); ?></div>
        </div>
        <div class="sponsors-outer wow fadeInUp">
            <!--Sponsors Carousel-->
            <ul class="sponsors-carousel owl-carousel owl-theme">
                <?php if(!empty($list_item)): ?>
                    <?php $__currentLoopData = $list_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="slide-item">
                            <figure class="image-box">
                                <?php if($item['brand_link']): ?><a href="<?php echo e($item['brand_link']); ?>"><?php endif; ?>
                                    <img src="<?php echo e(get_file_url($item['image_id'],'full')); ?>" alt="<?php echo e($item['title']); ?>">
                                    <?php if($item['brand_link']): ?></a><?php endif; ?>
                            </figure>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</section>
<?php /**PATH /home/prolydnj/jobsning.com/modules/Template/Views/frontend/blocks/brands-list/style_3.blade.php ENDPATH**/ ?>