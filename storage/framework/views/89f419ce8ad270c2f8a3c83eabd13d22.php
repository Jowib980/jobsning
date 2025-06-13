
<?php $__env->startSection('content'); ?>
    <div class="breadcrumb_area_three">
        <div class="container">
            <div class="breadcrumb_text min-w-80">
                <h2 class="fs-40 lh-normal"><?php echo e(__("Cart")); ?></h2>
            </div>
        </div>
    </div>
    <section class="page_breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__("Home")); ?></a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('product.index')); ?>"><?php echo e(__("All Products")); ?></a></li>
                            <li class="breadcrumb-item active"><?php echo e(__("Cart")); ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <div class="container pt-5 pb-5">
    <?php if(\Modules\Order\Helpers\CartManager::count()): ?>
        <div class="row">
            <div class="col-md-12 col-lg-8 col-xl-8">
                <div class="booking-form">
                    <?php echo $__env->make('Order::frontend.cart.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <div class="col-lg-4 col-xl-4">
                <div class="booking-detail">
                    <h3>Total: <?php echo e(format_money(\Modules\Order\Helpers\CartManager::subtotal())); ?></h3>
                    <div class="ui_kit_button payment_widget_btn">
                        <a href="<?php echo e(route('checkout')); ?>" class="btn btn-primary btn-block"><?php echo e(__('Proceed To Checkout')); ?></a>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-warning"><?php echo e(__("Your cart is empty!")); ?></div>
    <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <script>
        $(document).on('click', '.bravo_delete_cart_item', function(e) {
            e.preventDefault();
            var c = confirm('<?php echo e(__('Do you want to delete?')); ?>');
            if (!c)
                return;
            var me = $(this);
            var id = $(this).data('id');
            $.ajax({
                url: '<?php echo e(route('cart.remove_cart_item')); ?>',
                data: {
                    id: id
                },
                type: 'post',
                dataType: 'json',
                success: function(json) {
                    if (json.fragments) {
                        for (var k in json.fragments) {
                            $(k).html(json.fragments[k]);
                        }
                    }
                    if (json.url) {
                        window.location.href = json.url;
                    }
                    if (json.reload) {
                        window.location.reload();
                    }
                    if (json.message) {
                        bookingCoreApp.showAjaxMessage(json);
                    }
                },
                error: function(err) {
                    bravo_handle_error_response(err);
                    console.log(err)
                }
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("Layout::app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jobsning\modules\Order\Views\frontend\cart\index.blade.php ENDPATH**/ ?>