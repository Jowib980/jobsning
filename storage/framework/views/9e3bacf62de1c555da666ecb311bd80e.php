<?php if(!empty($services) and $services->total()): ?>
    <div class="bravo-profile-list-services">

        <div class="row">
            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4">
                    <?php echo $__env->make('Gig::frontend.search.loop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="container">
            <?php if(!empty($view_all)): ?>
                <div class="review-pag-wrapper">
                    <div class="bravo-pagination">
                        <?php echo e($services->appends(request()->query())->links()); ?>

                    </div>
                    <div class="review-pag-text text-center">
                        <?php echo e(__("Showing :from - :to of :total total",["from"=>$services->firstItem(),"to"=>$services->lastItem(),"total"=>$services->total()])); ?>

                    </div>
                </div>
            <?php else: ?>
                <div class="text-center mt30"><a class="btn btn-success" href="<?php echo e(route('user.profile.services',['id'=>$user->user_name ?? $user->id,'type'=>'gig'])); ?>"><?php echo e(__('View all (:total)',['total'=>$services->total()])); ?></a></div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Gig\Views\frontend\profile\service.blade.php ENDPATH**/ ?>