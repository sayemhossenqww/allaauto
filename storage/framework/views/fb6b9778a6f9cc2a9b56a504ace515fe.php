


<?php $__env->startSection('title', __('About')); ?>

<?php $__env->startSection('content'); ?>
    <div class="row align-items-center justify-content-center">
        <div class="col-md-4">
            <div class="text-center mb-3">
                <div class="fs-1 text-primary fw-bolder mb-3">
                    <img src="<?php echo e(asset('/images/newlogo.jpeg')); ?>" alt="Alla auto parts" height="54">
                </div>
                <div>Application ID 7BS31237-H222C-B30C-0B481246D1-05FF</div>
                <div>Phone Number: +96181203933</div>
                <div>Version 1.0.6</div>
                <div class="small text-muted">
                    v<?php echo e(Illuminate\Foundation\Application::VERSION); ?> (v<?php echo e(PHP_VERSION); ?>)
                </div>
                <div>
                   WMKTECH © <?php echo e(date('Y')); ?> Copyright
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mohammadmahbub/Downloads/Alla_Auto_Parts/www/resources/views/about/show.blade.php ENDPATH**/ ?>