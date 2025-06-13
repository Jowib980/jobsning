<?php if(!empty($row->company)): ?>
    <div class="sidebar-widget company-widget company-v2">
        <div class="widget-content">
            <div class="company-title">
                <?php if(!empty($row->company->avatar_id)): ?>
                    <div class="company-logo">
                        <img src="<?php echo e(\Modules\Media\Helpers\FileHelper::url($row->company->avatar_id)); ?>" alt="<?php echo e($row->company->name); ?>">
                    </div>
                <?php endif; ?>
                <h5 class="company-name"><?php echo e($row->company->name); ?></h5>
                <a href="<?php echo e($row->company->getDetailUrl()); ?>" class="profile-link"><?php echo e(__("View company profile")); ?></a>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Candidate\Views\frontend\layouts\detail-ver\v2\company.blade.php ENDPATH**/ ?>