

<?php $__env->startSection('content'); ?>
    <div class="page-profile-content page-template-content">
        <?php echo $__env->make('Layout::parts.bc', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="container">
            <div class="">
                <div class="row">
                    <div class="col-md-4">
                        <?php echo $__env->make('User::frontend.profile.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-md-8">

                        <?php
                        $reviews = \Modules\Review\Models\Review::query()->where([
                            'vendor_id'=>$user->id,
                            'status'=>'approved'
                        ])
                            ->orderBy('id','desc')
                            ->with('author')
                            ->paginate(10);
                        ?>
                        <?php if($reviews->total()): ?>
                            <div class="bravo-reviews">
                                <h3><?php echo e(__('Reviews from guests')); ?></h3>
                                <div class="review-pag-text">
                                    <?php echo e(__("Showing :from - :to of :total total",["from"=>$reviews->firstItem(),"to"=>$reviews->lastItem(),"total"=>$reviews->total()])); ?>

                                </div>
                                <div class="mt-3">
                                    <?php if($reviews): ?>
                                        <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $userInfo = $item->author;
                                                 if(!$userInfo){
                                                    continue;
                                                 }
                                            ?>
                                            <div class="media flex-column flex-md-row align-items-center align-items-md-start mb-4">
                                                <div class="mr-md-3">
                                                    <a class="d-block" href="#">
                                                        <?php if($avatar_url = $userInfo->getAvatarUrl()): ?>
                                                            <img class="img-fluid mb-3 mb-md-0 rounded-circle avatar-img" src="<?php echo e($avatar_url); ?>" alt="<?php echo e($userInfo->getDisplayName()); ?>">
                                                        <?php endif; ?>
                                                    </a>
                                                </div>
                                                <div class="media-body text-center text-md-left">
                                                    <div class="mb-4">
                                                        <h6 class="font-weight-bold text-gray-3">
                                                            <a href="#"><?php echo e($userInfo->getDisplayName()); ?></a>
                                                        </h6>
                                                        <div class="font-weight-normal font-size-14 text-gray-9 mb-2"><?php echo e(display_datetime($item->created_at)); ?></div>
                                                        <div class="d-flex align-items-center flex-column flex-md-row mb-2">
                                                            <?php if($item->rate_number): ?>
                                                                <button type="button" class="btn btn-xs btn-primary rounded-xs font-size-14 py-1 px-2 mr-2 mb-2 mb-md-0"><?php echo e($item->rate_number); ?> /5 </button>
                                                            <?php endif; ?>
                                                            <span class="font-weight-bold font-italic text-gray-3"><?php echo e($item->title); ?></span>
                                                        </div>
                                                        <p class="text-lh-1dot6 mb-0 pr-lg-5"><?php echo e($item->content); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                                <div class="review-pag-wrapper">
                                    <div class="review-pag-text mb-1">
                                        <?php echo e(__("Showing :from - :to of :total total",["from"=>$reviews->firstItem(),"to"=>$reviews->lastItem(),"total"=>$reviews->total()])); ?>

                                    </div>
                                    <div class="bravo-pagination">
                                        <?php echo e($reviews->appends(request()->query())->links()); ?>

                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="review-pag-text"><?php echo e(__("No Review")); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jobsning\modules\User\Views\frontend\profile\all-reviews.blade.php ENDPATH**/ ?>