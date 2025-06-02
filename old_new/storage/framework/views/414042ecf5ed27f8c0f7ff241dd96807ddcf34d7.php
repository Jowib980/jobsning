<!-- Job Block -->
<?php
    $translation = $row->translateOrOrigin(app()->getLocale());
    $view_profile = (!empty($hide_profile)) ? 0 : 1;
?>
<div class="inner-box">
    <div class="content">

        <figure class="image"><img src="<?php echo e($row->user->getAvatarUrl()); ?>" alt="<?php echo e($row->user->getDisplayName()); ?>"></figure>

        <h4 class="name"><a href="<?php echo e($row->getDetailUrl()); ?>"><?php echo e($row->user->getDisplayName()); ?></a></h4>
        <ul class="candidate-info">
            <?php if($row->title): ?>
                <li class="designation"><?php echo e($row->title); ?></li>
            <?php endif; ?>
            <?php if($row->city): ?>
                <li><span class="icon flaticon-map-locator"></span> <?php echo e($row->city); ?></li>
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
    </div>

    <?php if($view_profile): ?>
        <div class="btn-box">
            <button class="bookmark-btn service-wishlist <?php if($row->wishlist): ?> active <?php endif; ?>" data-id="<?php echo e($row->id); ?>" data-type="<?php echo e($row->type); ?>"><span class="flaticon-bookmark"></span></button>
            <a href="<?php echo e($row->getDetailUrl()); ?>" class="theme-btn btn-style-three"><span class="btn-title"><?php echo e(__('View Profile')); ?></span></a>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH /home/prolydnj/jobsning.com/modules/Candidate/Views/frontend/layouts/loop/item-v1.blade.php ENDPATH**/ ?>