<!DOCTYPE html>
<html lang="<?php echo e($settings->lang); ?>" dir="<?php echo e($settings->dir); ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e($order->number); ?></title>
    <link rel="preload" href="<?php echo e($cssUrl); ?>" as="style" />
    <link rel="stylesheet" href="<?php echo e($cssUrl); ?>">
    <?php echo $__env->make('layouts.lang-tag', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <style>
        html,
        body {
            height: 100vh;
        }
    </style>
</head>

<body>
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-md-12">
                <div id="pos-edit" data-order="<?php echo e($order); ?>" data-settings="<?php echo e(json_encode($settings)); ?>"></div>
            </div>
        </div>
    </div>
</body>

</html>
<script defer src="<?php echo e(mix('js/app.js')); ?>"></script>
<?php /**PATH /Users/sayemh/Downloads/Alla_Auto_Parts/www/resources/views/orders/edit.blade.php ENDPATH**/ ?>