<?php
    $services = Modules\Gig\Models\Gig::getVendorServicesQuery($user->id)->orderBy('id','desc')->paginate(6);
?>
<?php if(!empty($services) and $services->count() > 0): ?>
    <div class="profile-service-tabs mb-4">
        <h3 class="profile-name"><?php echo e(__(":name Gigs",['name'=>$user->getDisplayName()])); ?></h3>
        <div class="list-service mt-4">
            <?php echo $__env->make('Gig::frontend.profile.service',['services'=>$services], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\User\Views\frontend\profile\services.blade.php ENDPATH**/ ?>