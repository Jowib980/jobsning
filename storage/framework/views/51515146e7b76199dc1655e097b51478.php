<div class="list-brands <?php if(!empty($style) && $style == 'style_2'): ?> clients-section-two <?php else: ?> clients-section <?php endif; ?>">
    <div class="sponsors-outer">
        <!--Sponsors Carousel-->
        <ul class="sponsors-carousel owl-carousel owl-theme">
            <?php if(!empty($list_item)): ?>
                <?php $__currentLoopData = $list_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="slide-item">
                        <figure class="image-box">
                            <?php if($item['brand_link']): ?><a href="<?php echo e($item['brand_link']); ?>"><?php endif; ?>
                                <img class="img-fluid d-inline-block w-auto" src="<?php echo e(get_file_url($item['image_id'],'full')); ?>" alt="<?php echo e($item['title']); ?>">
                            <?php if($item['brand_link']): ?></a><?php endif; ?>
                        </figure>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </ul>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\jobsning\modules/Template/Views/frontend/blocks/brands-list/style_1.blade.php ENDPATH**/ ?>