<?php
if (!Auth::id() or !Auth::user()->hasPermission('setting_manage'))
    return;
$activeMenu = \Modules\Core\Walkers\MenuWalker::getActiveMenu();
?>
<div class="bravo-admin-bar">
    <div class="container">
        <ul class="adminbar-menu">
            <li><a href="<?php echo e(url('/admin')); ?>"><i class="icon ion-ios-desktop"></i> <?php echo e(__("Dashboard")); ?></a></li>
            <?php if(is_object($activeMenu)): ?>
                <li><a href="<?php echo e($activeMenu->getEditUrl()); ?>"><i class="icon ion-ios-brush"></i> <?php echo e(__("Edit")); ?></a></li>
            <?php endif; ?>
        </ul>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Layout\parts\adminbar.blade.php ENDPATH**/ ?>