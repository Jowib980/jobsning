<div class="profile-summary mb-2">
    <div class="seller-data">
        <div class="profile-avatar">
            <?php if($avatar_url = $auth->getAvatarUrl()): ?>
                <img class="avatar" src="<?php echo e($avatar_url); ?>" alt="<?php echo e($auth->getDisplayName()); ?>">
            <?php else: ?>
                <span class="avatar s-avatar-text"><?php echo e(ucfirst($auth->getDisplayName()[0])); ?></span>
            <?php endif; ?>
        </div>
        <h3 class="display-name"><?php echo e($auth->name); ?></h3>
        <?php if($auth->address): ?>
            <p class="profile-since mt-1"><i class="flaticon-map-locator"></i> <?php echo e($auth->address); ?></p>
        <?php endif; ?>

    </div>
    <div class="seller-info">
        <div class="meta-info">
            <div class="desc">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fa fa-user pr-2" aria-hidden="true"></i><?php echo e(__("Member Since")); ?></span>
                        <span class="badge-pill"><?php echo e(date_format($auth->created_at , 'M Y')); ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fa fa-gift pr-2" aria-hidden="true"></i><?php echo e(__("Gig")); ?></span>
                        <span class="badge-pill"><?php echo e(number_format($count_gig)); ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fa fa-shopping-cart pr-2" aria-hidden="true"></i><?php echo e(__("Order")); ?></span>
                        <span class="badge-pill"><?php echo e(number_format($rows->total())); ?></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>
<?php /**PATH /home/prolydnj/jobsning.com/modules/Gig/Views/frontend/seller/dashboard/profile.blade.php ENDPATH**/ ?>