<?php $__env->startSection('head'); ?>
    <link href="<?php echo e(asset('dist/frontend/module/gig/css/gig.css?_ver='.config('app.version'))); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css")); ?>"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="gig_category_level1">
        <div class="auto-container pt-5">
            <?php if($category->image_id): ?>
                <div class="category-banner bg-cover border-radius-8 mb-5 " style="background-image: url('<?php echo e(get_file_url($category->image_id,'full')); ?>')">
                    <div class="row h-100">
                        <div class="col-md-3"></div>
                        <div class="col-md-6 d-flex align-items-center flex-column justify-content-center">
                            <h1 class="title c-white mb-3 fw-500"><?php echo e($translation->name); ?></h1>
                            <p class="subtitle c-white mb-0 text-center"><?php echo e($translation->content); ?></p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php echo $__env->make('Gig::frontend.search.popular', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('Gig::frontend.search.types', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('Gig::frontend.search.news', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
            <?php echo $__env->make('Gig::frontend.search.faqs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="auto-container">
            <?php echo $__env->make('Gig::frontend.search.related', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script type="text/javascript" src="<?php echo e(asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js")); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('module/gig/js/gig.js?_ver='.config('app.version'))); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jobsning\modules\Gig\Views\frontend\category_lv1.blade.php ENDPATH**/ ?>