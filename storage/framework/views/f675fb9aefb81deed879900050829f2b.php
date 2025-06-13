<div class="profile-summary mb-2">
    <div class="profile-avatar">
        <?php if($avatar = $user->getAvatarUrl()): ?>
            <div class="avatar-img avatar-cover" style="background-image: url('<?php echo e($user->getAvatarUrl()); ?>')">
            </div>
        <?php else: ?>
            <span class="avatar-text"><?php echo e($user->getDisplayName()[0]); ?></span>
        <?php endif; ?>
    </div>

    <h3 class="display-name"><?php echo e($user->getDisplayName()); ?></h3>
    <p class="profile-since mt-1"><i class="flaticon-map-locator"></i> <?php echo e(__("From :from",["from"=> $user->country ])); ?></p>

    <p class="profile-since"><?php echo e(__("Member Since :time",["time"=> date("M Y",strtotime($user->created_at))])); ?></p>

    <button class="btn btn-success w-100 mt-2 d-none"><?php echo e(__("Contact Me")); ?></button>
    <hr>

    <div class="meta-info">

        <div class="desc">
            <div class="title"> <?php echo e(__("Description")); ?></div>
            <div class="text">
                <?php echo e($user->bio); ?>

            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\User\Views\frontend\profile\sidebar.blade.php ENDPATH**/ ?>