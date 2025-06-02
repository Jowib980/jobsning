<?php if(!empty($row->company)): ?>
    <?php $company_translation = $row->company->translateOrOrigin(app()->getLocale()); ?>
    <div class="sidebar-widget company-widget company-v2">
        <div class="widget-content">
            <div class="company-title">
                <?php if(!empty($row->company->avatar_id)): ?>
                    <div class="company-logo">
                        <a href="<?php echo e($row->company->getDetailUrl()); ?>"><img src="<?php echo e(\Modules\Media\Helpers\FileHelper::url($row->company->avatar_id)); ?>" alt="<?php echo e($company_translation->name); ?>"></a>
                    </div>
                <?php endif; ?>
                <h5 class="company-name"><a style="color:inherit" href="<?php echo e($row->company->getDetailUrl()); ?>"><?php echo e($company_translation->name); ?></a></h5>
                <a href="<?php echo e($row->company->getDetailUrl()); ?>" class="profile-link"><?php echo e(__("View company profile")); ?></a>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /home/prolydnj/jobsning.com/modules/Job/Views/frontend/layouts/details/company-2.blade.php ENDPATH**/ ?>