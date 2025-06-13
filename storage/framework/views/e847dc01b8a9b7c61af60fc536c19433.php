<!-- Job Block -->
<?php
    $translation = $row->translateOrOrigin(app()->getLocale());
?>

<div class="inner-box">
    <span class="thumb"><img src="<?php echo e($row->user->getAvatarUrl()); ?>" alt="<?php echo e($row->user->getDisplayName()); ?>"></span>
    <h3 class="name"><a href="<?php echo e($row->getDetailUrl()); ?>"><?php echo e($row->user->getDisplayName()); ?></a></h3>
    <span class="cat"><?php echo e($row->title); ?></span>
    <ul class="job-info">
        <?php if($row->city || $row->country): ?>
            <li><span class="icon flaticon-map-locator"></span> <?php echo e($row->city); ?>, <?php echo e($row->country); ?></li>
        <?php endif; ?>
        <?php if($row->expected_salary): ?>
            <li><span class="icon flaticon-money"></span> <?php echo e($row->expected_salary); ?> <?php echo e(currency_symbol()); ?>  / <?php echo e($row->salary_type); ?></li>
        <?php endif; ?>
    </ul>
    <ul class="post-tags">
        <?php if(!empty($row->categories)): ?>
            <?php $__currentLoopData = $row->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oneCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $t = $oneCategory->translateOrOrigin(app()->getLocale()); ?>
                <li><a href="<?php echo e(route('candidate.index', ['category' => $oneCategory->id])); ?>"><?php echo e($t->name); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </ul>
    <a href="<?php echo e($row->getDetailUrl()); ?>" class="theme-btn btn-style-three"><span class="btn-title"><?php echo e(__('View Profile')); ?></span></a>
</div>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Candidate\Views\frontend\layouts\loop\item-v2.blade.php ENDPATH**/ ?>