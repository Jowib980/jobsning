<?php
    $translation = $row->translateOrOrigin(app()->getLocale());
?>
<div class="company-block-three col-xl-6 col-lg-12 col-md-12 col-sm-12">
    <div class="inner-box">
        <div class="content">
            <div class="content-inner">
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
            </div>
            <ul class="job-other-info">
                <?php if($row->job_count > 0): ?>
                    <li class="time"><?php echo e(__("Open Jobs – :count",["count"=> number_format($row->job_count)])); ?></li>
                <?php endif; ?>
            </ul>
        </div>
        <button class="bookmark-btn <?php if($row->wishlist): ?> active <?php endif; ?> service-wishlist" data-id="<?php echo e($row->id); ?>" data-type="<?php echo e($row->type); ?>"><span class="flaticon-bookmark"></span></button>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Company\Views\frontend\layouts\loop\company-item-4.blade.php ENDPATH**/ ?>