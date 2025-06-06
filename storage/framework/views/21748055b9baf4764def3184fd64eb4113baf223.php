
<div class="map-box">
    <div class="map-listing-item">
        <div class="inner-box">
            <div class="infoBox-close"><i class="fa fa-times"></i></div>
            <?php if($row->company && $company_logo = $row->getThumbnailUrl()): ?>
                <div class="image-box">
                    <a class="image" href="<?php echo e($row->company->getDetailUrl()); ?>"><img src="<?php echo e($company_logo); ?>" alt="<?php echo e($row->company ? $row->company->name : 'company'); ?>"></a>
                </div>
            <?php endif; ?>
            <div class="content">
                <h3><a href="<?php echo e($row->getDetailUrl()); ?>"><?php echo e($row->title); ?></a></h3>
                <ul class="job-info">
                    <li><span class="icon flaticon-briefcase"></span> <?php echo e($row->name); ?></li>
                   <li><span class="icon flaticon-map-locator"></span> <?php echo e($row->name); ?></li>
                    
                </ul>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp7\htdocs\jobsning\modules/Job/Views/frontend/layouts/elements/map-infobox.blade.php ENDPATH**/ ?>