<?php if($activity->file_ids && count($activity->files()) > 0): ?>
    <div class="activity-attachments">
        <h4 class="a-title"><?php echo e(__("ATTACHMENTS")); ?></h4>
        <div class="list-files">
            <?php $__currentLoopData = $activity->files(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="attach-item">
                    <a href="<?php echo e(get_file_url($file->id, 'full')); ?>" title="<?php echo e($file->file_name); ?>.<?php echo e($file->file_extension); ?>" target="_blank" >
                        <div class="thumb">
                            <img src="<?php echo e($file->getThumbIcon()); ?>" alt="<?php echo e($file->file_name); ?>" />
                        </div>
                        <div class="caption">
                            <span class="f-name"><?php echo e($file->file_name); ?></span>.<?php echo e($file->file_extension); ?>

                            <span class="f-size">(<?php echo e(convert_file_size($file->file_size)); ?>)</span>
                            <span class="down-icon"><i class="la la-download"></i></span>
                        </div>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Gig\Views\frontend\elements\attachments.blade.php ENDPATH**/ ?>