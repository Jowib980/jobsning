<?php $__env->startSection('content'); ?>
    <div class="pt-5 pb-5">
        <div class="auto-container">
            <h3 class="mb-4">Flaticon</h3>
            <?php
                $icons = [
                    'flaticon-notebook',
                    'flaticon-edit',
                    'flaticon-placeholder',
                    'flaticon-paper-plane',
                    'flaticon-user',
                    'flaticon-unlink',
                    'flaticon-search',
                    'flaticon-drop',
                    'flaticon-christmas-tree',
                    'flaticon-plus',
                    'flaticon-battery',
                    'flaticon-target',
                    'flaticon-first-aid-kit',
                    'flaticon-tablet',
                    'flaticon-dustbin',
                    'flaticon-telegram-logo',
                    'flaticon-4-square-shapes',
                    'flaticon-speech-bubble-and-three-dots',
                    'flaticon-man',
                    'flaticon-tree-of-love',
                    'flaticon-play-button',
                    'flaticon-royal-crown-of-elegant-vintage-design',
                    'flaticon-desktop-computer-with-magnifying-lens-focusing-on-data',
                    'flaticon-test-tube-flask-and-drop-of-blood',
                    'flaticon-stocks-graphic-on-laptop-monitor',
                    'flaticon-attachment',
                    'flaticon-transport',
                    'flaticon-recycle-triangle-of-three-arrows-outlines',
                    'flaticon-arrows',
                    'flaticon-snowflake',
                    'flaticon-clock',
                    'flaticon-find-in-folder',
                    'flaticon-smartphone',
                    'flaticon-arrow-pointing-to-right',
                    'flaticon-gas-pump',
                    'flaticon-house-silhouette',
                    'flaticon-arrows-1',
                    'flaticon-floor',
                    'flaticon-exercise',
                    'flaticon-love-planet',
                    'flaticon-workers',
                    'flaticon-open-magazine',
                    'flaticon-confirm-schedule',
                    'flaticon-star',
                    'flaticon-order',
                    'flaticon-key',
                    'flaticon-medical',
                    'flaticon-smartphone-1',
                    'flaticon-plug',
                    'flaticon-arrows-2',
                    'flaticon-arrows-3',
                    'flaticon-money-bag',
                    'flaticon-next',
                    'flaticon-back',
                    'flaticon-reload',
                    'flaticon-headphones',
                    'flaticon-signs',
                    'flaticon-diamond',
                    'flaticon-chat',
                    'flaticon-phone',
                    'flaticon-down-chevron',
                    'flaticon-up-chevron',
                    'flaticon-stairs',
                    'flaticon-music-player',
                    'flaticon-play-button-1',
                    'flaticon-speaker',
                    'flaticon-menu',
                    'flaticon-share',
                    'flaticon-map',
                    'flaticon-hourglass',
                    'flaticon-layers',
                    'flaticon-home',
                    'flaticon-handshake',
                    'flaticon-time',
                    'flaticon-worldwide',
                    'flaticon-board',
                    'flaticon-twitter',
                    'flaticon-smartphone-2',
                    'flaticon-mobile',
                    'flaticon-maps-and-flags',
                    'flaticon-add',
                    'flaticon-substract',
                    'flaticon-phone-call',
                    'flaticon-monitor',
                    'flaticon-menu-1',
                    'flaticon-cancel',
                    'flaticon-24-hours',
                    'flaticon-t-shirt-outline',
                    'flaticon-folder-outline',
                    'flaticon-quote',
                    'flaticon-play-button-2',
                    'flaticon-right-quotation-sign',
                    'flaticon-up-arrow',
                    'flaticon-open-mail-interface-symbol',
                    'flaticon-menu-button',
                    'flaticon-smartphone-3',
                    'flaticon-add-1',
                    'flaticon-play-button-3',
                    'flaticon-play-button-4',
                    'flaticon-support',
                    'flaticon-close',
                    'flaticon-heart-1',
                    'flaticon-renewable',
                    'flaticon-bar-chart',
                    'flaticon-profit',
                    'flaticon-settings',
                    'flaticon-confirm',
                    'flaticon-edit-1',
                    'flaticon-share-1',
                    'flaticon-decreasing',
                    'flaticon-graph',
                    'flaticon-multi-tab',
                    'flaticon-graph-1',
                    'flaticon-graph-2',
                    'flaticon-tick',
                    'flaticon-pin',
                    'flaticon-alarm-clock',
                    'flaticon-close-1',
                    'flaticon-settings-1',
                    'flaticon-telephone',
                    'flaticon-home-1',
                    'flaticon-search-1',
                    'flaticon-notification',
                    'flaticon-attachment-1',
                    'flaticon-down-arrow',
                    'flaticon-tv',
                    'flaticon-phone-receiver',
                    'flaticon-next-1',
                    'flaticon-back-1',
                    'flaticon-clock-1',
                    'flaticon-email',
                    'flaticon-email-1',
                    'flaticon-engineer',
                    'flaticon-cog',
                    'flaticon-cog-1',
                    'flaticon-call',
                    'flaticon-call-1',
                    'flaticon-email-2',
                    'flaticon-shopping-bag',
                    'flaticon-clock-2',
                    'flaticon-custom',
                    'flaticon-settings-2',
                    'flaticon-monitor-1',
                    'flaticon-stats',
                    'flaticon-monitor-2',
                    'flaticon-bars',
                    'flaticon-bar-chart-1',
                    'flaticon-bars-1',
                    'flaticon-camera',
                    'flaticon-camera-1',
                    'flaticon-camera-2',
                    'flaticon-dslr-camera',
                    'flaticon-tower',
                    'flaticon-technical-support',
                    'flaticon-maintenance',
                    'flaticon-production',
                    'flaticon-3d-printer',
                    'flaticon-gift',
                    'flaticon-winner',
                    'flaticon-diploma',
                    'flaticon-diploma-1',
                    'flaticon-medal',
                    'flaticon-title',
                    'flaticon-certificate',
                    'flaticon-meeting-point',
                    'flaticon-pin-1',
                    'flaticon-email-3',
                    'flaticon-call-2',
                    'flaticon-telephone-1',
                    'flaticon-teacher',
                    'flaticon-support-2',
                    'flaticon-design-tool',
                    'flaticon-success',
                    'flaticon-startup',
                    'flaticon-creativity',
                    'flaticon-creativity-1',
                    'flaticon-puzzle',
                    'flaticon-vector-1',
                    'flaticon-brainstorm',
                    'flaticon-pencil',
                    'flaticon-typography',
                    'flaticon-lightbulb',
                    'flaticon-cancel-1',
                    'flaticon-dislike',
                    'flaticon-paper-plane-1',
                    'flaticon-mail',
                    'flaticon-call-3',
                    'flaticon-shopping-cart',
                    'flaticon-shopping-cart-1',
                    'flaticon-heart',
                    'flaticon-compare',
                    'flaticon-user-1',
                    'flaticon-loupe',
                    'flaticon-paper-clip',
                    'flaticon-shield',
                    'flaticon-diamond-2',
                    'flaticon-checked',
                    'flaticon-right',
                    'flaticon-left',
                    'flaticon-padlock',
                    'flaticon-starred',
                    'flaticon-star-1',
                    'flaticon-grid',
                    'flaticon-option',
                    'flaticon-sort',
                    'flaticon-delete',
                    'flaticon-envelope',
                    'flaticon-quote-1',
                    'flaticon-briefcase',
                    'flaticon-file',
                    'flaticon-money-1',
                    'flaticon-promotion',
                    'flaticon-megaphone',
                    'flaticon-vector',
                    'flaticon-web-programming',
                    'flaticon-rocket-ship',
                    'flaticon-headhunting',
                    'flaticon-approved',
                    'flaticon-support-1',
                    'flaticon-first-aid-kit-1',
                    'flaticon-car',
                    'flaticon-compact',
                    'flaticon-map-locator',
                    'flaticon-clock-3',
                    'flaticon-money',
                    'flaticon-money-2',
                    'flaticon-bookmark',
                    'flaticon-search-2',
                    'flaticon-search-3'
                ];
            $i = 1;
            ?>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                    <?php $__currentLoopData = $icons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $icon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td class="col-lg-2 col-md-3 col-sm-4 text-center mb-4">
                            <div class="icon">
                                <i class="<?php echo e($icon); ?>" style="font-size: 24px"></i>
                            </div>
                            <div class="mt-1"><?php echo e($icon); ?></div>
                        </td>
                        <?php if(($key+1)%5 == 0): ?>
                        </tr>
                        <tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jobsning\resources\views\icons.blade.php ENDPATH**/ ?>