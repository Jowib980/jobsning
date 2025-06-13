<section class="features-section">
    <div class="auto-container">
        <div class="sec-title-outer">
            <div class="sec-title">
                <h2><?php echo e($title); ?></h2>
                <div class="text"><?php echo e($sub_title); ?></div>
            </div>
            <?php if(!empty($load_more_url)): ?>
            <a href="<?php echo e($load_more_url); ?>" class="link"><?php echo e($load_more_name); ?><span class="fa fa-angle-right"></span></a>
            <?php endif; ?>
        </div>

        <div class="row wow fadeInUp">
            <?php if(!empty($list_item2)): ?>
            <?php $__currentLoopData = $list_item2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="column col-lg-4 col-md-6 col-sm-12">
                    <!-- Feature Block -->
                    <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_v2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="feature-block">
                            <div class="inner-box">
                                <figure class="image"><img src="<?php echo e(get_file_url($item_v2['image_id'],'full')); ?>" alt=""></figure>
                                <div class="overlay-box">
                                    <div class="content">
                                        <h5><?php echo e($item_v2['title']); ?></h5>
                                        <span class="total-jobs"><?php echo e($item_v2['sub_title']); ?></span>
                                        <a href="<?php echo e($item_v2['url_item']); ?>" class="overlay-link"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Template\Views\frontend\blocks\gallery\style_2.blade.php ENDPATH**/ ?>