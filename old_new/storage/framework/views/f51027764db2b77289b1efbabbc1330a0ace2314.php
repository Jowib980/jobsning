<?php
    $translation = $row->translateOrOrigin(app()->getLocale());
?>
<div class="inner-box">
    <ul class="job-other-info">
        <?php if($row->jobType): ?>
            <?php $jobType_translation = $row->jobType->translateOrOrigin(app()->getLocale()) ?>
            <li class="time"><?php echo e($jobType_translation->name); ?></li>
        <?php endif; ?>
        <?php if($row->is_featured): ?>
            <li class="privacy"><?php echo e(__("Featured")); ?></li>
        <?php endif; ?>
        <?php if($row->is_urgent): ?>
            <li class="required"><?php echo e(__("Urgent")); ?></li>
        <?php endif; ?>
    </ul>
    <?php if($row->company && $company_logo = $row->getThumbnailUrl()): ?>
        <span class="company-logo">
            <a href="<?php echo e($row->company->getDetailUrl()); ?>"><img src="<?php echo e($company_logo); ?>" alt="<?php echo e($row->company ? $row->company->name : 'company'); ?>" class="full-width object-cover"></a>
        </span>
    <?php endif; ?>
    <?php if($row->category): ?>
        <?php $cat_translation = $row->category->translateOrOrigin(app()->getLocale()) ?>
        <span class="company-name"><?php echo e($cat_translation->name); ?></span>
    <?php endif; ?>
    <h4><a href="<?php echo e($row->getDetailUrl()); ?>"><?php echo e($translation->title); ?></a></h4>
    <?php if($row->location): ?>
        <?php $location_translation = $row->location->translateOrOrigin(app()->getLocale()) ?>
        <div class="location"><span class="icon flaticon-map-locator"></span> <?php echo e($location_translation->name); ?></div>
    <?php endif; ?>
</div>
<?php /**PATH /home/prolydnj/jobsning.com/modules/Job/Views/frontend/layouts/loop/job-item-4.blade.php ENDPATH**/ ?>