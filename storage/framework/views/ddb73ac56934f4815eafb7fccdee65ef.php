<?php if($paginator->hasPages()): ?>
    <nav class="d-flex justify-items-center justify-content-between mt-3">
        <div class="d-flex justify-content-between flex-fill d-sm-none">
            <ul class="pagination">
                
                <?php if($paginator->onFirstPage()): ?>
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link"><?php echo app('translator')->get('pagination.previous'); ?></span>
                    </li>
                <?php else: ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo e($paginator->previousPageUrl()); ?>"
                            rel="prev"><?php echo app('translator')->get('pagination.previous'); ?></a>
                    </li>
                <?php endif; ?>

                
                <?php if($paginator->hasMorePages()): ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next"><?php echo app('translator')->get('pagination.next'); ?></a>
                    </li>
                <?php else: ?>
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link"><?php echo app('translator')->get('pagination.next'); ?></span>
                    </li>
                <?php endif; ?>
            </ul>
        </div>

        <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
            <div>
                <p class="small text-muted mb-0">
                    <?php echo __('Showing'); ?>

                    <span class="fw-semibold"><?php echo e($paginator->firstItem()); ?></span>
                    <?php echo __('to'); ?>

                    <span class="fw-semibold"><?php echo e($paginator->lastItem()); ?></span>
                    <?php echo __('of'); ?>

                    <span class="fw-semibold"><?php echo e($paginator->total()); ?></span>
                    <?php echo __('results'); ?>

                </p>
            </div>

            <div>
                <ul class="pagination mb-0">
                    
                    <?php if($paginator->onFirstPage()): ?>
                        <li class="page-item d-flex disabled" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>">
                            <span class="page-link d-flex align-items-center" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" style="width: 1rem;height:1rem;">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 19.5L8.25 12l7.5-7.5" />
                                </svg>

                            </span>
                        </li>
                    <?php else: ?>
                        <li class="page-item d-flex">
                            <a class="page-link d-flex align-items-center" href="<?php echo e($paginator->previousPageUrl()); ?>"
                                rel="prev" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" style="width: 1rem;height:1rem;">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 19.5L8.25 12l7.5-7.5" />
                                </svg>
                            </a>
                        </li>
                    <?php endif; ?>

                    
                    <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <?php if(is_string($element)): ?>
                            <li class="page-item disabled" aria-disabled="true"><span
                                    class="page-link"><?php echo e($element); ?></span></li>
                        <?php endif; ?>

                        
                        <?php if(is_array($element)): ?>
                            <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($page == $paginator->currentPage()): ?>
                                    <li class="page-item active" aria-current="page"><span
                                            class="page-link"><?php echo e($page); ?></span></li>
                                <?php else: ?>
                                    <li class="page-item"><a class="page-link"
                                            href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    
                    <?php if($paginator->hasMorePages()): ?>
                        <li class="page-item d-flex">
                            <a class="page-link d-flex align-items-center" href="<?php echo e($paginator->nextPageUrl()); ?>"
                                rel="next" aria-label="<?php echo app('translator')->get('pagination.next'); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" style="width: 1rem;height:1rem;">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                </svg>

                            </a>
                        </li>
                    <?php else: ?>
                        <li class="page-item disabled d-flex" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.next'); ?>">
                            <span class="page-link d-flex align-items-center" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" style="width: 1rem;height:1rem;">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                </svg>
                            </span>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
<?php endif; ?>
<?php /**PATH D:\2miniw\www\resources\views/vendor/pagination/bootstrap-5.blade.php ENDPATH**/ ?>