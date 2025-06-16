<?php
    $country = Nnjeim\World\Models\Country::find($row->country_id);
    $city = Nnjeim\World\Models\City::find($row->location_id);
?>

<div class="content">
    <?php if(empty($hide_avatar) && $company_logo = $row->getThumbnailUrl()): ?>
        <span class="company-logo">
            <img src="<?php echo e($company_logo); ?>" alt="<?php echo e($row->company ? $row->company->name : 'company'); ?>">
        </span>
    <?php endif; ?>
    <h4><?php echo e($translation->title); ?></h4>
    <ul class="job-info">
        <?php if($row->category): ?>
            <?php $cat_translation = $row->category->translateOrOrigin(app()->getLocale()) ?>
            <li><span class="icon flaticon-briefcase"></span> <?php echo e($cat_translation->name); ?></li>
        <?php endif; ?>
        <?php if($country || $city): ?>
            <li><span class="icon flaticon-map-locator"></span><?php echo e($country->name ?? ''); ?>, <?php echo e($city->name ?? ''); ?></li>
       <?php endif; ?>
        
        <?php if($row->created_at): ?>
            <li><span class="icon flaticon-clock-3"></span> <?php echo e($row->timeAgo()); ?></li>
        <?php endif; ?>
        <?php if($row->salary_min): ?>
            <li><span class="icon flaticon-money"></span> <?php echo e($row->getSalary()); ?></li>
        <?php endif; ?>
    </ul>
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
</div>


<?php /**PATH C:\xampp\htdocs\jobsning\modules/Job/Views/frontend/layouts/details/upper-box.blade.php ENDPATH**/ ?>