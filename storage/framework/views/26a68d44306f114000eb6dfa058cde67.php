<?php $lang_local = app()->getLocale() ?>
<?php
    $service_translation = $service->translateOrOrigin($lang_local);
?>
<div class="shadow-soft bg-white rounded-sm booking-review">
    <div class="pt-5 pb-3 px-4 border-bottom">
        <a href="#" class="d-block mb-3">
            <img class="img-fluid rounded-sm" src="<?php echo e($service->image_url); ?>" alt="<?php echo clean($service_translation->title); ?>">
        </a>
        <a href="<?php echo e($service->getDetailUrl()); ?>" class="text-dark font-weight-bold mb-2 d-block">
            <?php echo clean($service_translation->title); ?>

        </a>
        <?php if($service_translation->address): ?>
            <div class="mb-1 flex-horizontal-center text-gray-1">
                <i class="icon flaticon-pin-1 mr-2 font-size-15"></i> <?php echo e($service_translation->address); ?>

            </div>
        <?php endif; ?>
    </div>
    <div id="basicsAccordionBooking">
        <div class="card rounded-0 border-top-0 border-left-0 border-right-0">
            <div class="card-header card-collapse bg-transparent border-0">
                <h5 class="mb-0">
                    <button type="button" class="btn btn-link border-0 btn-block d-flex justify-content-between card-btn py-3 px-4 font-size-17 font-weight-bold text-dark" data-toggle="collapse" data-target="#basicsCollapseDetail">
                        <?php echo e(__("Booking Detail")); ?>

                        <span class="card-btn-arrow font-size-14 text-dark"><i class="fa fa-chevron-down"></i></span>
                    </button>
                </h5>
            </div>
            <div id="basicsCollapseDetail" class="collapse show" data-parent="#basicsAccordionBooking">
                <div class="card-body px-4 pt-0">
                    <ul class="list-unstyled font-size-1 mb-0 font-size-16">
                        <?php if($booking->start_date): ?>
                            <li class="d-flex justify-content-between py-2">
                                <div class="label"><?php echo e(__('Start date:')); ?></div>
                                <div class="val">
                                    <?php echo e(display_date($booking->start_date)); ?>

                                </div>
                            </li>
                            <?php if($booking->getMeta("booking_type") == "ticket"): ?>
                                <li class="d-flex justify-content-between py-2">
                                    <div class="label"><?php echo e(__('Duration:')); ?></div>
                                    <div class="val">
                                        <?php $duration = $booking->getMeta("duration") ?>
                                        <?php echo e(duration_format($duration)); ?>

                                    </div>
                                </li>
                            <?php endif; ?>
                            <?php if($booking->getMeta("booking_type") == "time_slot"): ?>
                                <li class="d-flex justify-content-between py-2">
                                    <div class="label"><?php echo e(__('Duration:')); ?></div>
                                    <div class="val">
                                        <?php echo e($booking->getMeta("duration")); ?>

                                        <?php echo e($booking->getMeta("duration_unit")); ?>

                                    </div>
                                </li>
                                <li class="flex-wrap">
                                    <div class="label w-100 mb-2"><?php echo e(__('Start Time:')); ?></div>
                                    <div class="val w-100">
                                        <div class="slots-wrapper d-flex justify-content-start flex-wrap">
                                            <?php if(!empty($timeSlots = $booking->time_slots)): ?>
                                                <?php $__currentLoopData = $timeSlots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="btn btn-sm mr-2 mb-2 btn-success">
                                                        <?php echo e(date( "H:i",strtotime($item->start_time))); ?>

                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if($booking->getMeta("booking_type") == "ticket"): ?>
                            <?php $ticket_types = $booking->getJsonMeta('ticket_types')?>
                            <?php if(!empty($ticket_types)): ?>
                                <?php $__currentLoopData = $ticket_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="d-flex justify-content-between py-2">
                                        <div class="label"><?php echo e($type['name_'.$lang_local] ?? $type['name']); ?>:</div>
                                        <div class="val">
                                            <?php echo e($type['number']); ?>

                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card rounded-0 border-top-0 border-left-0 border-right-0">
            <div class="card-header card-collapse bg-transparent border-0" id="basicsHeadingFour">
                <h5 class="mb-0">
                    <button type="button" class="btn btn-link border-0 btn-block d-flex justify-content-between card-btn py-3 px-4 font-size-17 font-weight-bold text-dark" data-toggle="collapse" data-target="#basicsCollapsePayment">
                        <?php echo e(__("Payment")); ?>

                        <span class="card-btn-arrow font-size-14 text-dark"><i class="fa fa-chevron-down"></i></span>
                    </button>
                </h5>
            </div>
            <div id="basicsCollapsePayment" class="collapse show">
                <div class="card-body px-4 pt-0">
                    <ul class="list-unstyled font-size-1 mb-0 font-size-16">
                        <?php if($booking->getMeta("booking_type") == "time_slot"): ?>
                            <li class="d-flex justify-content-between py-2">
                                <div class="label"><?php echo e($booking->total_guests); ?> x <?php echo e(format_money( $booking->getJsonMeta('base_price'))); ?></div>
                                <div class="val">
                                    <?php echo e(format_money( $booking->getJsonMeta('base_price') * $booking->total_guests )); ?>

                                </div>
                            </li>
                        <?php endif; ?>
                        <?php if($booking->getMeta("booking_type") == "ticket"): ?>
                            <?php $ticket_types = $booking->getJsonMeta('ticket_types') ?>
                            <?php if(!empty($ticket_types)): ?>
                                <?php $__currentLoopData = $ticket_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="d-flex justify-content-between py-2">
                                        <div class="label"><?php echo e($type['name_'.$lang_local] ?? $type['name']); ?>: <?php echo e($type['number']); ?> * <?php echo e(format_money($type['price'])); ?></div>
                                        <div class="val">
                                            <?php echo e(format_money($type['price'] * $type['number'])); ?>

                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php $extra_price = $booking->getJsonMeta('extra_price') ?>
                        <?php if(!empty($extra_price)): ?>
                            <li class="d-flex justify-content-between py-2">
                                <div class="font-size-16 font-weight-bold">
                                    <?php echo e(__("Extra Prices:")); ?>

                                </div>
                            </li>
                            <?php $__currentLoopData = $extra_price; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="d-flex justify-content-between py-2">
                                    <div class="label"><?php echo e($type['name_'.$lang_local] ?? __($type['name'])); ?>:</div>
                                    <div class="val">
                                        <?php echo e(format_money($type['total'] ?? 0)); ?>

                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <?php
                            $list_all_fee = [];
                            if(!empty($booking->buyer_fees)){
                                $buyer_fees = json_decode($booking->buyer_fees , true);
                                $list_all_fee = $buyer_fees;
                            }
                            if(!empty($vendor_service_fee = $booking->vendor_service_fee)){
                                $list_all_fee = array_merge($list_all_fee , $vendor_service_fee);
                            }
                        ?>
                        <?php if(!empty($list_all_fee)): ?>
                            <?php $__currentLoopData = $list_all_fee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $fee_price = $item['price'];
                                    if(!empty($item['unit']) and $item['unit'] == "percent"){
                                        $fee_price = ( $booking->total_before_fees / 100 ) * $item['price'];
                                    }
                                ?>
                                <li class="d-flex justify-content-between py-2">
                                    <div class="font-size-16 font-weight-bold">
                                        <?php echo e(__("Fee:")); ?>

                                    </div>
                                </li>
                                <li class="d-flex justify-content-between py-2">
                                    <div class="label">
                                        <?php echo e($item['name_'.$lang_local] ?? $item['name']); ?>

                                        <i class="icofont-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e($item['desc_'.$lang_local] ?? $item['desc']); ?>"></i>
                                        <?php if(!empty($item['per_person']) and $item['per_person'] == "on"): ?>
                                            : <?php echo e($booking->total_guests); ?> * <?php echo e(format_money( $fee_price )); ?>

                                        <?php endif; ?>
                                    </div>
                                    <div class="val">
                                        <?php if(!empty($item['per_person']) and $item['per_person'] == "on"): ?>
                                            <?php echo e(format_money( $fee_price * $booking->total_guests )); ?>

                                        <?php else: ?>
                                            <?php echo e(format_money( $fee_price )); ?>

                                        <?php endif; ?>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <li class="d-flex justify-content-between py-2">
                            <div class="label"><?php echo e(__("Total:")); ?></div>
                            <div class="val"><?php echo e(format_money($booking->total)); ?></div>
                        </li>
                        <?php if($booking->status !='draft'): ?>
                            <li class="d-flex justify-content-between py-2">
                                <div class="label"><?php echo e(__("Paid:")); ?></div>
                                <div class="val"><?php echo e(format_money($booking->paid)); ?></div>
                            </li>
                            <?php if($booking->paid < $booking->total ): ?>
                                <li class="d-flex justify-content-between py-2">
                                    <div class="label"><?php echo e(__("Remain:")); ?></div>
                                    <div class="val"><?php echo e(format_money($booking->total - $booking->paid)); ?></div>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php echo $__env->make('Booking::frontend/booking/checkout-deposit-amount', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\jobsning\modules\Gig\Views\frontend\booking\detail.blade.php ENDPATH**/ ?>