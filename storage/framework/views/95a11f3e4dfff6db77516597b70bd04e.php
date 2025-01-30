<!DOCTYPE html>
<html lang="<?php echo e($settings->lang); ?>" dir="<?php echo e($settings->dir); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="theme-color" content="#000000"/>
    <title><?php echo $__env->yieldContent('title', config('app.name')); ?></title>
    <link rel="preload" href="<?php echo e($cssUrl); ?>" as="style" />
    <link rel="stylesheet" href="<?php echo e($cssUrl); ?>">
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('WMKTech.ico')); ?>">
    <link rel="manifest" href="/manifest.json">
    <?php echo $__env->make('layouts.lang-tag', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldPushContent('style'); ?>
    <?php echo $__env->yieldPushContent('head'); ?>
</head>

<body class="x-body">
    <div class="h-100" id="app">
        <?php if(auth()->guard()->check()): ?>
            <div class="x-sidebar border-end bg-white">
                <?php echo $__env->make('layouts.sidebar-items', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="x-container">
                <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="x-container-secondary p-3">
                    <?php echo $__env->make('layouts.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
        <?php else: ?>
            <?php echo $__env->yieldContent('content'); ?>
        <?php endif; ?>
    </div>
</body>

</html>
<script src="<?php echo e(mix('js/app.js')); ?>"></script>
<script src="<?php echo e(mix('js/vfs_fonts.js')); ?>"></script>
<script type="text/javascript">
    // Initialize the service worker
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/serviceworker.js', {
            scope: '.'
        }).then(function (registration) {
            // Registration was successful
            console.log('Laravel PWA: ServiceWorker registration successful with scope: ', registration.scope);
        }, function (err) {
            // registration failed :(
            console.log('Laravel PWA: ServiceWorker registration failed: ', err);
        });
    }
</script>
<?php echo $__env->yieldPushContent('script'); ?>
<?php /**PATH D:\2miniw\www\resources\views/layouts/app.blade.php ENDPATH**/ ?>