<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e($page_title ?? 'Dashboard'); ?> - <?php echo e(setting_item('site_title') ?? 'Superio'); ?></title>

    <?php
        $favicon = setting_item('site_favicon');
    ?>
    <?php if($favicon): ?>
        <?php
            $file = (new \Modules\Media\Models\MediaFile())->findById($favicon);
        ?>
        <?php if(!empty($file)): ?>
            <link rel="icon" type="<?php echo e($file['file_type']); ?>" href="<?php echo e(asset('uploads/'.$file['file_path'])); ?>" />
        <?php else: ?>:
        <link rel="icon" type="image/png" href="<?php echo e(url('images/favicon.png')); ?>" />
        <?php endif; ?>
    <?php endif; ?>

    <meta name="robots" content="noindex, nofollow" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="<?php echo e(asset('libs/select2/css/select2.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('libs/flags/css/flag-icon.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(url('libs/daterange/daterangepicker.css')); ?>"/>
    <link href="<?php echo e(asset('dist/admin/css/vendors.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('dist/admin/css/app.css')); ?>" rel="stylesheet">

    <?php echo \App\Helpers\Assets::css(); ?>

    <?php echo \App\Helpers\Assets::js(); ?>

    <script>
        var superio  = {
            url:'<?php echo e(url('/')); ?>',
            map_provider:'<?php echo e(setting_item('map_provider')); ?>',
            map_gmap_key:'<?php echo e(setting_item('map_gmap_key')); ?>',
            csrf:'<?php echo e(csrf_token()); ?>',
            date_format:'<?php echo e(get_moment_date_format()); ?>',
            markAsRead:'<?php echo e(route('core.admin.notification.markAsRead')); ?>',
            markAllAsRead:'<?php echo e(route('core.admin.notification.markAllAsRead')); ?>',
            loadNotify : '<?php echo e(route('core.admin.notification.loadNotify')); ?>',
            pusher_api_key : '<?php echo e(setting_item("pusher_api_key")); ?>',
            pusher_cluster : '<?php echo e(setting_item("pusher_cluster")); ?>',
            isAdmin : <?php echo e(is_admin() ? 1 : 0); ?>,
            currentUser: <?php echo e((int)Auth::id()); ?>,
            media:{
                groups:<?php echo json_encode(config('bc.media.groups')); ?>

            }
        };
        var i18n = {
            warning:"<?php echo e(__("Warning")); ?>",
            success:"<?php echo e(__("Success")); ?>",
            confirm_delete:"<?php echo e(__("Do you want to delete?")); ?>",
            confirm_recovery:"<?php echo e(__("Do you want to restore?")); ?>",
            confirm:"<?php echo e(__("Confirm")); ?>",
            cancel:"<?php echo e(__("Cancel")); ?>",
        };
        var daterangepickerLocale = {
            "applyLabel": "<?php echo e(__('Apply')); ?>",
            "cancelLabel": "<?php echo e(__('Cancel')); ?>",
            "fromLabel": "<?php echo e(__('From')); ?>",
            "toLabel": "<?php echo e(__('To')); ?>",
            "customRangeLabel": "<?php echo e(__('Custom')); ?>",
            "weekLabel": "<?php echo e(__('W')); ?>",
            "first_day_of_week": <?php echo e(setting_item("site_first_day_of_the_weekin_calendar","1")); ?>,
            "daysOfWeek": [
                "<?php echo e(__('Su')); ?>",
                "<?php echo e(__('Mo')); ?>",
                "<?php echo e(__('Tu')); ?>",
                "<?php echo e(__('We')); ?>",
                "<?php echo e(__('Th')); ?>",
                "<?php echo e(__('Fr')); ?>",
                "<?php echo e(__('Sa')); ?>"
            ],
            "monthNames": [
                "<?php echo e(__('January')); ?>",
                "<?php echo e(__('February')); ?>",
                "<?php echo e(__('March')); ?>",
                "<?php echo e(__('April')); ?>",
                "<?php echo e(__('May')); ?>",
                "<?php echo e(__('June')); ?>",
                "<?php echo e(__('July')); ?>",
                "<?php echo e(__('August')); ?>",
                "<?php echo e(__('September')); ?>",
                "<?php echo e(__('October')); ?>",
                "<?php echo e(__('November')); ?>",
                "<?php echo e(__('December')); ?>"
            ],
        };
    </script>
    <script src="<?php echo e(asset('libs/tinymce/js/tinymce/tinymce.min.js')); ?>" ></script>
    <?php echo $__env->yieldContent('script.head'); ?>

</head>
<body class="<?php echo e(($enable_multi_lang ?? '') ? 'enable_multi_lang' : ''); ?> <?php if(setting_item('site_enable_multi_lang')): ?> site_enable_multi_lang <?php endif; ?>">
<div id="app" style="overflow: hidden !important;">
    <div class="main-header d-flex">
        <?php echo $__env->make('Layout::admin.parts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="main-sidebar">
        <?php echo $__env->make('Layout::admin.parts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="main-content">
        <?php echo $__env->make('Layout::admin.parts.bc', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
        <footer class="main-footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 copy-right" >
                        <?php echo e(date('Y')); ?> &copy; <?php echo e(__('Superio by')); ?> <a href="<?php echo e(__('https://www.superio.bookingcore.org')); ?>" target="_blank"><?php echo e(__('Superio Team')); ?></a>
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-right footer-links d-none d-sm-block">
                            <a href="<?php echo e(__('https://www.facebook.com/bookingcore')); ?>" target="_blank"><?php echo e(__('About Us')); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <div class="backdrop-sidebar-mobile"></div>
</div>

<?php echo $__env->make('Media::browser', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Scripts -->
<?php echo \App\Helpers\Assets::css(true); ?>

<script src="<?php echo e(asset('libs/pusher.min.js')); ?>"></script>
<script src="<?php echo e(asset('dist/admin/js/manifest.js?_ver='.config('app.version'))); ?>" ></script>
<script src="<?php echo e(asset('dist/admin/js/vendor.js?_ver='.config('app.version'))); ?>" ></script>

<script src="<?php echo e(asset('dist/admin/js/app.js?_ver='.config('app.version'))); ?>" ></script>
<script src="<?php echo e(asset('libs/vue/vue'.(!env('APP_DEBUG') ? '.min':'').'.js')); ?>"></script>

<script src="<?php echo e(asset('libs/select2/js/select2.min.js')); ?>" ></script>
<script src="<?php echo e(asset('libs/bootbox/bootbox.min.js')); ?>"></script>

<script src="<?php echo e(url('libs/daterange/moment.min.js')); ?>"></script>
<script src="<?php echo e(url('libs/daterange/daterangepicker.min.js?_ver='.config('app.version'))); ?>"></script>

<?php echo \App\Helpers\Assets::js(true); ?>


<?php echo $__env->yieldContent('script.body'); ?>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\jobsning\modules/Layout/admin/app.blade.php ENDPATH**/ ?>