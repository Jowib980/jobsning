<?php if($paginator->hasPages()): ?>
    <nav aria-label="<?php echo e(__('Page navigation')); ?>">
        <ul class="list-pagination-1 pagination border border-color-4 rounded-sm overflow-auto overflow-xl-visible justify-content-md-center align-items-center py-2 mb-0">
            <?php if($paginator->onFirstPage()): ?>
                <li class="page-item disabled">
                    <a class="page-link border-right rounded-0 text-gray-5" href="javascript:void(0)" aria-label="<?php echo e(__("Previous")); ?>">
                        <i class="flaticon-left-direction-arrow font-size-10 font-weight-bold"></i>
                        <span class="sr-only"><?php echo e(__("Previous")); ?></span>
                    </a>
                </li>
            <?php else: ?>
                <li class="page-item">
                    <a class="page-link border-right rounded-0 text-gray-5" href="<?php echo e($paginator->previousPageUrl()); ?>" aria-label="<?php echo e(__("Previous")); ?>">
                        <i class="flaticon-left-direction-arrow font-size-10 font-weight-bold"></i>
                        <span class="sr-only"><?php echo e(__("Previous")); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(is_string($element)): ?>
                    <li class="page-item disabled" aria-disabled="true"><span><?php echo e($element); ?></span></li>
                <?php endif; ?>

                <?php if(is_array($element)): ?>
                    <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($page == $paginator->currentPage()): ?>
                            <li class="page-item active" aria-current="page"><span class="page-link font-size-14"><?php echo e($page); ?></span></li>
                        <?php else: ?>
                            <li class="page-item"><a class="page-link font-size-14" href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if($paginator->hasMorePages()): ?>
                <li class="page-item">
                    <a class="page-link border-left rounded-0 text-gray-5" href="<?php echo e($paginator->nextPageUrl()); ?>" aria-label="<?php echo e(__("Next")); ?>">
                        <i class="flaticon-right-thin-chevron font-size-10 font-weight-bold"></i>
                        <span class="sr-only"><?php echo e(__("Next")); ?></span>
                    </a>
                </li>
            <?php else: ?>
                <li class="page-item disabled">
                    <a class="page-link border-left rounded-0 text-gray-5" href="javascript:void(0)" aria-label="<?php echo e(__("Next")); ?>">
                        <i class="flaticon-right-thin-chevron font-size-10 font-weight-bold"></i>
                        <span class="sr-only"><?php echo e(__("Next")); ?></span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>

<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Layout\parts\paging.blade.php ENDPATH**/ ?>