<div class="bravo-candidates">
<?php
    $title_page = (!empty($custom_title_page)) ? $custom_title_page : setting_item_with_lang("candidate_page_list_title");
    $translation = $row->translateOrOrigin(app()->getLocale());
?>
    <section class="candidate-detail-section style-two">
        <div class="candidate-detail-outer">
            <div class="auto-container">
                <div class="row">
                    <div class="content-column col-lg-8 col-md-12 col-sm-12">
                        <div class="candidate-block-five">
                            <div class="inner-box">
                                <?php echo $__env->make('Candidate::frontend.layouts.details.candidate-block', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                        <?php echo $__env->make('Candidate::frontend.layouts.details.candidate-detail', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
                        <div class="sidebar">
                            <?php echo $__env->make('Candidate::frontend.layouts.details.candidate-btn-box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('Candidate::frontend.layouts.details.candidate-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
</div>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Candidate\Views\frontend\layouts\detail-ver\candidate-single-v2.blade.php ENDPATH**/ ?>