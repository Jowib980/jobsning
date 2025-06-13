
<?php $__env->startSection("head"); ?>
    <link href="<?php echo e(asset('dist/frontend/module/gig/css/gig.css?_ver='.config('app.version'))); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('libs/flip/flip.min.css')); ?>" rel="stylesheet">
    <style>
        body.mm-wrapper{
            overflow-x: visible;
        }
        .bravo_wrap.page-wrapper{
            overflow: visible;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="order-status-wrap">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="order-details">
                    <?php echo e(__("Order")); ?>: #<?php echo e($order->id); ?>

                </div>
            </div>
            <div class="col-6 text-right">
                <div class="order-status">
                    <?php echo e(__("Status")); ?>: <span class="status-<?php echo e($order->status); ?>"><?php echo e($order->status_text); ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bc-gig-order-details">
    <div class="container">
        <?php echo $__env->make("admin.message", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="order-flex">
            <div class="col-order-left">
                <div class="default-tabs style-two tabs-box">
                    <ul class="tab-buttons clearfix">
                        <li class="<?php if($tab == 'activity'): ?> active-btn <?php endif; ?>"><a href="<?php echo e(route("buyer.order.activity", [ 'id' => $order->id ])); ?>"><?php echo e(__("Activity")); ?></a></li>
                        <?php if(!empty($order->gig->requirements) || !empty($order->requirements)): ?>
                            <li class="<?php if($tab == 'requirements'): ?> active-btn <?php endif; ?>"><a href="<?php echo e(route("buyer.order.requirements", [ 'id' => $order->id ])); ?>"><?php echo e(__("Requirements")); ?></a></li>
                        <?php endif; ?>
                        <?php if($order->delivery && count($order->delivery) > 0): ?>
                            <li class="<?php if($tab == 'delivery'): ?> active-btn <?php endif; ?>"><a href="<?php echo e(route("buyer.order.delivery", [ 'id' => $order->id ])); ?>"><?php echo e(__("Delivery")); ?></a></li>
                        <?php endif; ?>
                        <?php if($order->status != 'completed' && $order->status != 'cancelled' && false): ?>
                            <li class="<?php if($tab == 'resolution'): ?> active-btn <?php endif; ?>"><a href="<?php echo e(route("buyer.order.resolution", [ 'id' => $order->id ])); ?>"><?php echo e(__("Resolution Center")); ?></a></li>
                        <?php endif; ?>
                    </ul>
                </div>

                <?php if ($__env->exists("Gig::frontend.buyer.order.tab." . $tab)) echo $__env->make("Gig::frontend.buyer.order.tab." . $tab, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>
            <?php if($order->gig): ?>
                <?php
                $disableCountdown = false;
                    if($order->status == \Modules\Gig\Models\GigOrder::COMPLETED || $order->status == \Modules\Gig\Models\GigOrder::CANCELLED || $order->status == \Modules\Gig\Models\GigOrder::INCOMPLETE){
                        $disableCountdown = true;
                    }
                ?>
                <div class="col-order-right <?php echo e(!$disableCountdown ? 'has-countdown' : ''); ?>">
                    <div class="sticky-order-right">

                        <?php echo $__env->renderWhen(!$disableCountdown,"Gig::frontend.elements.order-countdown", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

                        <?php echo $__env->make("Gig::frontend.elements.order-overview", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                </div>
            <?php endif; ?>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script type="text/javascript" src="<?php echo e(asset('module/gig/js/gig-order.js?_ver='.config('app.version'))); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('libs/flip/flip.min.js')); ?>"></script>
    <script>
        function handleTickInit(tick) {
            // Uncomment to set labels to different language ( in this case Dutch )
            var locale = {
                DAY_PLURAL: '<?php echo __("Days") ?>',
                DAY_SINGULAR: '<?php echo __("Day") ?>',
                HOUR_PLURAL: '<?php echo __("Hours") ?>',
                HOUR_SINGULAR: '<?php echo __("Hour") ?>',
                MINUTE_PLURAL: '<?php echo __("Minutes") ?>',
                MINUTE_SINGULAR: '<?php echo __("Minutes") ?>',
                SECOND_PLURAL: '<?php echo __("Seconds") ?>',
                SECOND_SINGULAR: '<?php echo __("Second") ?>'
            };

            for (var key in locale) {
                if (!locale.hasOwnProperty(key)) { continue; }
                tick.setConstant(key, locale[key]);
            }
            var delivery_date = '<?php echo date('c', strtotime($order->delivery_date)) ?>';
            // var delivery_date = '1970-01-01 00:00:00';
            Tick.count.down(delivery_date).onupdate = function(value) {
                tick.value = value;
            };
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jobsning\modules\Gig\Views\frontend\buyer\order\detail.blade.php ENDPATH**/ ?>