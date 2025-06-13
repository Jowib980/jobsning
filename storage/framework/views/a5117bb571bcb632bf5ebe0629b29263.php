<style>
    .checkout-button{
        background: <?php echo e(setting_item('style_main_color','#5191fa')); ?>;
        margin: 2rem auto;
        padding: 1rem;
        color: #fff;
        border: 1px solid;
        border-radius: 0.25rem;
        display: flex;
    }
    
</style>

<form class="text-center py-5">
    <script src="https://checkout.flutterwave.com/v3.js"></script>
    <button type="button" class="checkout-button" onClick="makePayment()"><?php echo e(__("Pay Now")); ?></button>
</form>
<script>
    function makePayment() {
        FlutterwaveCheckout({
            public_key: "<?php echo e($data['public_key']); ?>",
            tx_ref: "<?php echo e($data['tx_ref']); ?>",
            amount: <?php echo e($data['amount']); ?>,
            currency: "<?php echo e($data['currency']); ?>",
            // country: "US",
            payment_options: "1",
            customer: {
                email: "<?php echo e($payment->order->customer->email??""); ?>",
                phone_number: "<?php echo e($payment->order->billing['phone']??""); ?>",
                name: "<?php echo e(__(':first_name :last_name',['first_name'=>$payment->order->billing['first_name']??"",'last_name'=>$payment->order->billing['last_name']??""])); ?>",
            },
            redirect_url:'<?php echo e(route('confirmFlutterWaveGateway',['payment_id'=>$payment->id])); ?>',
            onclose: function() {
                window.location.href="<?php echo e($payment->getDetailUrl()); ?>"
            },
            customizations: {
                title: "<?php echo e($data['service_title']); ?>",
                description: "<?php echo e($data['description']); ?>",
                logo: "",
            },
        });
    }
</script>
<?php /**PATH C:\xampp\htdocs\jobsning\plugins\PaymentFlutterWaveCheckout\Views\frontend\checkout.blade.php ENDPATH**/ ?>