<section class="page-title">
    <div class="auto-container">
        <div class="title-outer">
            <h1><?php echo e(__("My Gig Orders")); ?></h1>
        </div>
    </div>
</section>
<div class="auto-container">
    <div class="mt-3 mb-5">
        <div class="default-tabs style-two tabs-box">
            <ul class="tab-buttons clearfix">

                <li class="<?php if(request()->get('status') == \Modules\Gig\Models\GigOrder::INCOMPLETE): ?> active-btn <?php endif; ?>"><a href="<?php echo e(route('buyer.orders',['status'=>\Modules\Gig\Models\GigOrder::INCOMPLETE])); ?>"><?php echo e(__("Incomplete")); ?></a></li>
                <li class="<?php if(request()->get('status') == \Modules\Gig\Models\GigOrder::IN_PROGRESS): ?> active-btn <?php endif; ?>"><a href="<?php echo e(route('buyer.orders',['status'=>\Modules\Gig\Models\GigOrder::IN_PROGRESS])); ?>"><?php echo e(__("In Progress")); ?></a></li>

                <li class="<?php if(request()->get('status') == \Modules\Gig\Models\GigOrder::DELIVERED): ?> active-btn <?php endif; ?>"><a href="<?php echo e(route('buyer.orders',['status'=>\Modules\Gig\Models\GigOrder::DELIVERED])); ?>"><?php echo e(__("Delivered")); ?></a></li>
                <li class="<?php if(request()->get('status') == \Modules\Gig\Models\GigOrder::IN_REVISION): ?> active-btn <?php endif; ?>"><a href="<?php echo e(route('buyer.orders',['status'=>\Modules\Gig\Models\GigOrder::IN_REVISION])); ?>"><?php echo e(__("In Revision")); ?></a></li>
                <li class="<?php if(request()->get('status') == \Modules\Gig\Models\GigOrder::COMPLETED): ?> active-btn <?php endif; ?>"><a href="<?php echo e(route('buyer.orders',['status'=>\Modules\Gig\Models\GigOrder::COMPLETED])); ?>"><?php echo e(__("Completed")); ?></a></li>
                <li class="<?php if(request()->get('status') == \Modules\Gig\Models\GigOrder::CANCELLED): ?> active-btn <?php endif; ?>"><a href="<?php echo e(route('buyer.orders',['status'=>\Modules\Gig\Models\GigOrder::CANCELLED])); ?>"><?php echo e(__("Cancelled")); ?></a></li>
                <li class="<?php if(request()->get('status') == ''): ?> active-btn <?php endif; ?>"><a href="<?php echo e(route('buyer.orders')); ?>"><?php echo e(__("All")); ?></a></li>
            </ul>
        </div>
    </div>
</div>
<?php /**PATH /home/prolydnj/jobsning.com/modules/Gig/Views/frontend/buyer/head.blade.php ENDPATH**/ ?>