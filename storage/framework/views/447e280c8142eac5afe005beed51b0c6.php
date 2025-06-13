<div class="form-group">
    <label class="control-label"><?php echo e(__("Feature Image")); ?></label>
    <?php echo \Modules\Media\Helpers\FileHelper::fieldUpload('image_id',$row->image_id); ?>

</div>
<div class="form-group">
    <label class="control-label"><?php echo e(__("Gallery")); ?></label>
    <?php echo \Modules\Media\Helpers\FileHelper::fieldGalleryUpload('gallery',$row->gallery); ?>

</div>
<div class="form-group">
    <label class="control-label"><?php echo e(__("Youtube Video")); ?></label>
    <input type="text" name="video_url" class="form-control" value="<?php echo e(old('video_url',$row->video_url)); ?>" placeholder="<?php echo e(__("Youtube link video")); ?>">
</div>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Gig\Views\admin\gig\gallery.blade.php ENDPATH**/ ?>