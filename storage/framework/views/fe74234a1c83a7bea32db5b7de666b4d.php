
<div class="list-group list-group-flush border-top">
    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(!$item['disabled']): ?>
            <a class="list-group-item list-group-item-action sidebar-item align-items-center d-flex py-3 px-0 ps-4 border-0 
             border-start border-4 font-medium small
            <?php if($item['active']): ?> text-primary bg-body border-primary <?php else: ?> border-white text-black <?php endif; ?>  
            <?php if($item['disabled']): ?> cursor-not-allowed <?php endif; ?>"
                href="<?php echo e($item['route']); ?>" <?php if($item['is_blank']): ?> target="_blank" <?php endif; ?>>
                <?php echo $item['icon']; ?><?php echo e($item['name']); ?>

            </a>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH D:\2miniw\www\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>