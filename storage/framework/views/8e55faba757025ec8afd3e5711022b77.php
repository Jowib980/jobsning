<?php if($row->gig): ?>
<div class="company-block-three seller-gig-item">
    <div class="inner-box">
        <div class="content">
            <div class="content-inner">
                <span class="company-logo">
                    <?php if($row->gig->image_id): ?>
                        <?php echo get_image_tag($row->gig->image_id,'full',['alt'=>$row->gig->title, 'class'=>'img-fluid mb-4 rounded-xs w-100']); ?>

                    <?php endif; ?>
                </span>
                <h4><a href="<?php echo e(route('seller.order', ['id' => $row->id])); ?>"><?php echo e($row->gig->title); ?></a></h4>
                <ul class="job-info">
                    <li class="view-order"><a href="<?php echo e(route('seller.order', ['id' => $row->id])); ?>" class="seller-link"><?php echo e(__("View Order")); ?></a></li>
                    <li><span class="icon flaticon-money"></span><?php echo e(format_money($row->price)); ?></li>
                </ul>
            </div>
            <ul class="job-other-info">
                <li class="privacy"><?php echo e($row->status_text); ?></li>
            </ul>
        </div>
        <div class="text"><?php echo \Illuminate\Support\Str::words(strip_tags($row->content), 30, '...'); ?></div>
    </div>
</div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Gig\Views\frontend\seller\dashboard\item.blade.php ENDPATH**/ ?>