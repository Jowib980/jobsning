<?php if(!empty($categories)): ?>
<div class="form-group col-lg-3 col-md-12 col-sm-12 location">
    <span class="icon flaticon-briefcase"></span>
    <select class="chosen-select" name="category">
        <option value=""><?php echo e(__("All Categories")); ?></option>
        <?php
            $cat_id = request()->get('category');
            $traverse = function ($categories, $prefix = '') use (&$traverse, $cat_id) {
                foreach ($categories as $category) {
                    $selected = '';
                    if ($cat_id == $category->id)
                        $selected = 'selected';

                    $translate = $category->translateOrOrigin(app()->getLocale());
                    printf("<option value='%s' %s>%s</option>", $category->id, $selected, $prefix . ' ' . $translate->name);
                    $traverse($category->children, $prefix . '-');
                }
            };
            $traverse($categories);
        ?>
    </select>
</div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Company\Views\frontend\layouts\sidebars\fields\style-4\category.blade.php ENDPATH**/ ?>