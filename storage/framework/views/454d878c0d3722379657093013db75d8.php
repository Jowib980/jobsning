

<?php $__env->startSection('title', __('Service Unavailable')); ?>
<?php $__env->startSection('code', '503'); ?>
<?php $__env->startSection('message', __($exception->getMessage() ?: 'Service Unavailable')); ?>
<?php $__env->startSection('image',asset('images/404.svg')); ?>
<?php echo $__env->make('errors::minimal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jobsning\resources\views\errors\503.blade.php ENDPATH**/ ?>