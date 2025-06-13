<?php
if(empty($category->news_cat_id)) return;
$newsCat = \Modules\News\Models\NewsCategory::find($category->news_cat_id);
if(!$newsCat) return;
$news = \Modules\News\Models\News::search(['cat_id'=>$newsCat->id])->limit(3)->get();
if(!count($news)) return;

$cat_translation = $category->translateOrOrigin(app()->getLocale());

?>
<div class="category-news pt-5 pb-5">
    <div class="d-flex justify-content-between mb-4 align-items-center">
        <h2 class="category-page-title"><?php echo e(__(':name Related Guides',['name'=>$cat_translation->name])); ?></h2>
        <a href="<?php echo e($newsCat->getDetailUrl()); ?>"><?php echo e(__('See more guides')); ?> <i class="las la-angle-right"></i></a>
    </div>
    <div class="blog-grid">
        <div class="row">
            <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="news-block col-md-4">
                    <?php echo $__env->make('News::frontend.layouts.details.news-loop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

</div>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Gig\Views\frontend\search\news.blade.php ENDPATH**/ ?>