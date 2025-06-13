<?php $translation = $row->translateOrOrigin(app()->getLocale()); ?>
<div class="mb-4">
    <?php if($image_tag = get_image_tag($row->image_id,'full',['alt'=>$translation->title,'class'=>'img-fluid mb-4 rounded-xs w-100'])): ?>
        <a class="d-block" href="<?php echo e($row->getDetailUrl()); ?>">
            <?php echo $image_tag; ?>

        </a>
    <?php endif; ?>
    <h5 class="font-weight-bold font-size-21 text-gray-3">
        <a href="<?php echo e($row->getDetailUrl()); ?>"><?php echo e($translation->title); ?></a>
    </h5>
    <div class="mb-3">
        <a class="mr-3 pr-1" href="#">
            <span class="font-weight-normal text-gray-3"><?php echo e(display_date($row->updated_at)); ?></span>
        </a>
        <?php $category = $row->getCategory(); ?>
    </div>
    <p class="mb-0 text-lh-lg">
        <?php echo get_exceprt($translation->content,300,'...'); ?>

    </p>
</div>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Candidate\Views\frontend\layouts\details\candidate-loop.blade.php ENDPATH**/ ?>