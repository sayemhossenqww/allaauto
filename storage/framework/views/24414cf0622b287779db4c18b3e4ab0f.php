<div class="modal" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title" id="filterModalLabel">
                    <i class="bi bi-funnel-fill align-middle fs-5"></i> <?php echo app('translator')->get('Search Filter'); ?>
                </h5>
                <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('orders.filter')); ?>" role="form" method="GET">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="date-from" class="form-label"><?php echo app('translator')->get('Start Date'); ?></label>
                        <input type="date" name="from" class="form-control" id="date-from"
                            value="<?php echo e(Request::get('from')); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="date-to" class="form-label"><?php echo app('translator')->get('End Date'); ?></label>
                        <input type="date" name="to" class="form-control" id="date-to"
                            value="<?php echo e(Request::get('to')); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="customer-name" class="form-label"><?php echo app('translator')->get('Customer Name'); ?> <small
                                class="text-muted fw-normal"><?php echo app('translator')->get('optional'); ?></small></label>
                        <input type="text" name="name" class="form-control" id="customer-name"
                            value="<?php echo e(Request::get('name')); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label"><?php echo app('translator')->get('Author'); ?> <small
                                class="text-muted fw-normal"><?php echo app('translator')->get('optional'); ?></small></label>
                        <select name="author" id="author" class=" form-select">
                            <option value=""></option>
                            <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($author->id); ?>" <?php if(Request::get('author') == $author->id): echo 'selected'; endif; ?>>
                                    <?php echo e($author->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100"><?php echo app('translator')->get('Use Filter'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH D:\2miniw\www\resources\views/orders/search-modal.blade.php ENDPATH**/ ?>