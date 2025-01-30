
<?php $__env->startSection('title', __('Drawer')); ?>

<?php $__env->startSection('content'); ?>

    <div class="d-flex align-items-center mb-3">
        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.page-title','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('page-title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><?php echo app('translator')->get('Drawer'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
        <div class="h4 mb-0 ms-auto"> <?php echo e($date); ?></div>
    </div>

    <div class="card w-100 mb-3">
        <div class="card-body">
            <div id="starting-cash-input" data-value="<?php echo e($startingCash); ?>" data-direction="<?php echo e($settings->dir); ?>"
                data-currency="<?php echo e($currency); ?>"></div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <td><?php echo app('translator')->get('Total Invoices'); ?></td>
                        <td> <?php echo e($count); ?></td>
                    </tr>
                    
                    <tr>
                        <td><?php echo app('translator')->get('Total Cash Sales'); ?></td>
                        <td> <?php echo e(currency_format($amount)); ?></td>
                    </tr>
                </table>
            </div>
            <form action="<?php echo e(route('drawer.close')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label for="in_drawer_cash" class="form-label"><?php echo app('translator')->get('In drawer cash'); ?> (<?php echo e($currency); ?>)</label>
                    <input type="text" name="in_drawer_cash"
                        class="form-control form-control-lg input-number <?php $__errorArgs = ['in_drawer_cash'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <?php if($settings->dir == 'rtl'): ?> text-start <?php endif; ?>"
                        dir="ltr" id="in_drawer_cash" value="<?php echo e(old('in_drawer_cash')); ?>">
                    <?php $__errorArgs = ['in_drawer_cash'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback">
                            <?php echo e($message); ?>

                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary btn-lg px-4" type="submit">
                        <?php echo app('translator')->get('End Of Day'); ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="card w-100">
        <div class="card-body">
            <h5 class="card-title"><?php echo app('translator')->get('Archive'); ?></h5>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->get('Date'); ?></th>
                            <th><?php echo app('translator')->get('Starting cash'); ?></th>
                            <th><?php echo app('translator')->get('Cash Sales'); ?></th>
                            <th><?php echo app('translator')->get('Payouts'); ?></th>
                            <th><?php echo app('translator')->get('Amount expected in drawer'); ?></th>
                            <th><?php echo app('translator')->get('Actual amount in drawer'); ?></th>
                            <th><?php echo app('translator')->get('Difference'); ?></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $drawerHistories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $drawerHistory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <div><?php echo e($drawerHistory->start_date); ?></div>
                                    <div><?php echo e($drawerHistory->end_date); ?></div>
                                </td>
                                <td class="align-middle"><?php echo e(currency_format($drawerHistory->starting_cash)); ?></td>
                                <td class="align-middle"><?php echo e(currency_format($drawerHistory->cash_sales)); ?></td>
                                <td class="align-middle"><?php echo e(currency_format($drawerHistory->paid_out)); ?></td>
                                <td class="align-middle"><?php echo e(currency_format($drawerHistory->expected)); ?></td>
                                <td class="align-middle"><?php echo e(currency_format($drawerHistory->actual)); ?></td>
                                <td class="<?php if($drawerHistory->difference > 0): ?> text-danger <?php endif; ?> <?php if($settings->dir == 'rtl'): ?> text-start <?php endif; ?> align-middle"
                                    dir="ltr"><?php echo e($drawerHistory->difference_view); ?></td>
                                <td>
                                    <a href="<?php echo e(route('drawer.print', $drawerHistory)); ?>" class="btn btn-link"
                                        target="_blank">
                                        <?php echo app('translator')->get('Print'); ?>
                                    </a>
                                </td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php if($drawerHistories->isEmpty()): ?>
                    <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.no-data','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('no-data'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                <?php endif; ?>
            </div>
            <div>
                <?php echo e($drawerHistories->withQueryString()->links()); ?>

            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\2miniw\www\resources\views/drawer/show.blade.php ENDPATH**/ ?>