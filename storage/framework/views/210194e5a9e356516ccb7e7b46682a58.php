<div class="bravo-candidates">
<?php
    $title_page = setting_item_with_lang("candidate_page_list_title");
    if(!empty($custom_title_page)){
        $title_page = $custom_title_page;
    }
    $translation = $row->translateOrOrigin(app()->getLocale());
?>

<!-- Candidate Detail Section -->
    <section class="candidate-detail-section style-three">
        <div class="upper-box">
            <div class="auto-container">
                <!-- Candidate block Six -->
                <div class="candidate-block-six">
                    <div class="inner-box">
                        <figure class="image"><img src="<?php echo e($row->user->getAvatarUrl()); ?>" alt=""></figure>
                        <h4 class="name"><a href="#"><?php echo e($row->user->getDisplayName()); ?></a></h4>
                        <span class="designation"><?php echo e($row->title); ?></span>
                        <div class="content">
                            <?php
                                $categories = $row->getCategory();
                            ?>
                            <ul class="post-tags">
                                <?php if(!empty($row->categories)): ?>
                                    <?php $__currentLoopData = $row->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oneCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a target="_blank" href="<?php echo e(route('candidate.index', ['category' => $oneCategory->id])); ?>"><?php echo e($oneCategory->name); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </ul>

                            <ul class="candidate-info">
                                <?php if($row->city || $row->country): ?>
                                    <li><span class="icon flaticon-map-locator"></span> <?php echo e($row->city); ?>, <?php echo e($row->country); ?></li>
                                <?php endif; ?>
                                <?php if($row->expected_salary): ?>
                                    <li><span class="icon flaticon-money"></span> <?php echo e($row->expected_salary); ?> <?php echo e(currency_symbol()); ?>  / <?php echo e($row->salary_type); ?></li>
                                <?php endif; ?>
                                <li><span class="icon flaticon-clock"></span> <?php echo e(__('Member Since')); ?> <?php echo e(date('M d, Y', strtotime($row->user->created_at))); ?></li>
                            </ul>

                            <div class="btn-box">
                                <?php
                                    $url = '';
                                    if(!empty($cv)){
                                        $file = (new \Modules\Media\Models\MediaFile())->findById($cv->file_id);
                                        $url  = asset('uploads/'.$file['file_path']);
                                    }
                                ?>
                                <?php if($url): ?>
                                    <?php if(setting_item('candidate_download_cv_required_login') && !auth()->check()): ?>
                                        <a href="#" class="theme-btn btn-style-one bc-call-modal login"><?php echo e(__('Download CV')); ?></a>
                                    <?php else: ?>
                                        <a href="<?php echo e($url); ?>" class="theme-btn btn-style-one" target="_blank" download><?php echo e(__('Download CV')); ?></a>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <button class="bookmark-btn <?php if($row->wishlist): ?> active <?php endif; ?> service-wishlist" data-id="<?php echo e($row->id); ?>" data-type="<?php echo e($row->type); ?>"><span class="flaticon-bookmark"></span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="candidate-detail-outer">
            <div class="auto-container">
                <div class="row">
                    <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
                        <?php echo $__env->make('Candidate::frontend.layouts.details.candidate-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="content-column col-lg-8 col-md-12 col-sm-12 order-2">
                        <?php echo $__env->make('Candidate::frontend.layouts.details.candidate-detail', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End candidate Detail Section -->
</div>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Candidate\Views\frontend\layouts\detail-ver\candidate-single-v3.blade.php ENDPATH**/ ?>