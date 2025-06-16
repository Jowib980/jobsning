<div class="marker-container">
    <div class="marker-card">
        <div class="front face">
            <div style="background-image: url(<?php echo e(get_file_url($row->user->avatar_id) ?? asset('images/avatar.png')); ?>"></div>
        </div>
        <div class="back face">
            <div style="background-image: url(<?php echo e(get_file_url($row->user->avatar_id) ?? asset('images/avatar.png')); ?>"></div>
        </div>
        <div class="marker-arrow"></div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\jobsning\modules/Candidate/Views/frontend/layouts/details/candidate-marker-avatar.blade.php ENDPATH**/ ?>