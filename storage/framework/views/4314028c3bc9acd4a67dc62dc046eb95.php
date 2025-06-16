<?php $translation = $row->translateOrOrigin(app()->getLocale()); ?>
<div class="map-box">
    <div class="map-listing-item">
        <div class="inner-box">
            <div class="infoBox-close"><i class="fa fa-times"></i></div>
            <div class="image-box">
                <figure class="image"><img src="<?php echo e(get_file_url($row->user->avatar_id) ?? asset('images/avatar.png')); ?>" alt="avatar"></figure>
            </div>
            <div class="content">
                <h3><a href="<?php echo e($row->getDetailUrl()); ?>"><?php echo e($row->user->getDisplayName()); ?></a></h3>
                <ul class="job-info">
                    <li><span class="icon flaticon-briefcase"></span> <?php echo e($translation->title); ?></li>
                    <?php if($row->city): ?>
                        <li><span class="icon flaticon-map-locator"></span> <?php echo e($row->city); ?></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\jobsning\modules/Candidate/Views/frontend/layouts/details/candidate-marker-infobox.blade.php ENDPATH**/ ?>