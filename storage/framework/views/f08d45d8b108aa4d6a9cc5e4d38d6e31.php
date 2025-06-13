<?php
    $translation = $row->translateOrOrigin(app()->getLocale());
?>
<div class="company-block-four col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <div class="inner-box">
        <button class="bookmark-btn <?php if($row->wishlist): ?> active <?php endif; ?> service-wishlist" data-id="<?php echo e($row->id); ?>" data-type="<?php echo e($row->type); ?>"><span class="flaticon-bookmark"></span></button>
        <?php if($row->is_featured): ?>
            <span class="featured">Featured</span>
        <?php endif; ?>
        <span class="company-logo">
            <?php if($image_tag = get_image_tag($row->avatar_id,'full',['alt'=>$translation->title, 'class'=>'img-fluid mb-4 rounded-xs w-100'])): ?>
                <?php echo $image_tag; ?>

            <?php endif; ?>
        </span>
        <h4><a href="<?php echo e($row->getDetailUrl()); ?>"><?php echo clean($translation->name); ?></a></h4>
        <ul class="job-info">
            <?php if($row->location): ?>
                <?php $location_translation = $row->location->translateOrOrigin(app()->getLocale()); ?>
                <li><span class="icon flaticon-map-locator"></span> <?php echo e($location_translation->name); ?></li>
            <?php endif; ?>
            <?php $category = $row->category; ?>
            <?php if(!empty($category)): ?>
                <?php $t = $category->translateOrOrigin(app()->getLocale()); ?>
                <li><span class="icon flaticon-briefcase"></span> <?php echo e($t->name ?? ''); ?></li>
            <?php endif; ?>

        </ul>
        <div class="job-type"><?php echo e(__("Open Jobs – :count",["count"=> number_format($row->job_count)])); ?></div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Company\Views\frontend\layouts\loop\company-item-2.blade.php ENDPATH**/ ?>