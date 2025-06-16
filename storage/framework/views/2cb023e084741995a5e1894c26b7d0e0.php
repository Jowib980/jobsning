<?php
    $country = Nnjeim\World\Models\Country::find($row->country_id);
    $city = Nnjeim\World\Models\City::find($row->location_id);
?>

<!-- Job Block-three -->

<div class="inner-box">
    <div class="content">
        <?php if($row->company && $company_logo = $row->getThumbnailUrl()): ?>
            <span class="company-logo">
                <a href="<?php echo e($row->company->getDetailUrl()); ?>"><img src="<?php echo e($company_logo); ?>" alt="<?php echo e($row->company ? $row->company->name : 'company'); ?>"></a>
            </span>
        <?php endif; ?>
        <h4><a href="<?php echo e($row->getDetailUrl()); ?>"><?php echo e($row->title); ?></a></h4>
        <ul class="job-info">
           <li><span class="icon flaticon-briefcase"></span> <?php echo e($row->name); ?></li>
            <?php if($country || $city): ?>
                <li><span class="icon flaticon-map-locator"></span><?php echo e($country->name ?? ''); ?>, <?php echo e($city->name ?? ''); ?></li>
            <?php endif; ?>
            
        </ul>
    </div>
    <ul class="job-other-info">
        <li class="time"><?php echo e($row->name); ?></li>
        
        <?php if($row->is_featured): ?>
            <li class="privacy"><?php echo e(__("Featured")); ?></li>
        <?php endif; ?>
        <?php if($row->is_urgent): ?>
            <li class="required"><?php echo e(__("Urgent")); ?></li>
        <?php endif; ?>
    </ul>
    <button class="bookmark-btn <?php if($row->wishlist): ?> active <?php endif; ?> service-wishlist" data-id="<?php echo e($row->id); ?>" data-type="<?php echo e($row->type); ?>">
        <img src="<?php echo e(asset('images/loading.gif')); ?>" class="loading-icon" alt="loading" />
        <span class="flaticon-bookmark"></span>
    </button>
</div>
<?php /**PATH C:\xampp\htdocs\jobsning\modules/Job/Views/frontend/layouts/loop/job-item-3.blade.php ENDPATH**/ ?>