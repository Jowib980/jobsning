<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Resume</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            display: flex;
            flex-direction: row;
        }
        .left {
            width: 35%;
            background-color: #000;
            color: #fff;
            padding: 20px;
            min-height: 100vh;
        }
        .right {
            width: 65%;
            padding: 20px;
        }
        .left img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 10px;
        }
        h2, h3 {
            margin-top: 10px;
        }
        h3 {
            color: #000;
        }
        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            color: white;
        }
        .section {
            margin-bottom: 20px;
        }
        .progress-container {
            background-color: #ddd;
            border-radius: 5px;
            height: 15px;
            margin-bottom: 10px;
        }
        .progress-bar {
            height: 15px;
            background-color: #007bff;
            border-radius: 5px;
            text-align: right;
            padding-right: 5px;
            color: #fff;
            font-size: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Left -->
        <div class="left">
            <img src="<?php echo e(public_path('uploads/' . $data->profile_picture_filename)); ?>" alt="Profile">
            <h2><?php echo e($data->first_name); ?> <?php echo e($data->last_name); ?></h2>
            <p><?php echo e($data->profile_title); ?></p>
            <ul>
                <li><?php echo e($data->email); ?></li>
                <li><?php echo e($data->phone); ?></li>
                <li><?php echo e($data->website); ?></li>
                <li><?php echo e($data->linkedin); ?></li>
                <li><?php echo e($data->github); ?></li>
                <li><?php echo e($data->twitter); ?></li>
            </ul>

            <div class="section">
                <h3 style="color: white;">EDUCATION</h3>
                <?php $__currentLoopData = $education; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $edu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p>
                        <strong><?php echo e($edu['position'] ?? ''); ?></strong><br>
                        <?php echo e($edu['location'] ?? ''); ?><br>
                        <?php echo e($edu['from'] ?? ''); ?> – <?php echo e($edu['to'] ?? ''); ?>

                    </p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="section">
                <h3 style="color: white;">LANGUAGES</h3>
                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p><?php echo e($lang['language'] ?? ''); ?> (<?php echo e($lang['level'] ?? ''); ?>)</p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <!-- Right -->
        <div class="right">
            <div class="section">
                <h3>EXPERIENCES</h3>
                <?php $__currentLoopData = $experiences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p>
                        <strong><?php echo e($exp['position'] ?? ''); ?> at <?php echo e($exp['location'] ?? ''); ?></strong><br>
                        <?php echo e($exp['from'] ?? ''); ?> – <?php echo e($exp['to'] ?? ''); ?>

                    </p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="section">
                <h3>PROJECTS</h3>
                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p>
                        <strong><?php echo e($project['title'] ?? ''); ?></strong> - <?php echo e($project['description'] ?? ''); ?>

                    </p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="section">
                <h3>SKILLS & PROFICIENCY</h3>
                <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p><?php echo e($skill['name'] ?? ''); ?></p>
                    <div class="progress-container">
                        <div class="progress-bar" style="width: <?php echo e($skill['level'] ?? 0); ?>%;">
                            <?php echo e($skill['level'] ?? 0); ?>%
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\jobsning\modules\Candidate\Views\admin\resume\pdf.blade.php ENDPATH**/ ?>