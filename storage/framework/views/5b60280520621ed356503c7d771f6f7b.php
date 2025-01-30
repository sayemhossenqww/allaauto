
<?php $__env->startSection('title', __('Purchases')); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="h4 mb-0 flex-grow-1"><?php echo app('translator')->get('Purchases'); ?></div>
        <div>
            <button type="button" class="btn btn-primary px-4" data-bs-toggle="modal"
                data-bs-target="#filterModal">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="hero-icon-sm me-1">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" />
                </svg>
                <?php echo app('translator')->get('Filter'); ?>
            </button>
        </div>
        <a href="<?php echo e(route('purchases.create')); ?>" class="btn btn-primary px-4 m-2">
            <?php echo app('translator')->get('Create'); ?>
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->get('Date'); ?></th>
                            <th><?php echo app('translator')->get('Number'); ?></th>
                            <th><?php echo app('translator')->get('Ref. №'); ?></th>
                            <th><?php echo app('translator')->get('Supplier'); ?></th>
                            <th><?php echo app('translator')->get('Average Cost'); ?></th>
                            <th><?php echo app('translator')->get('Last Cost'); ?></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($purchase->supplier): ?>
                            <tr>
                                <td class="align-middle"><?php echo e($purchase->date_view); ?></td>
                                <td class="align-middle fw-bold"><?php echo e($purchase->number); ?></td>
                                <td class="align-middle"><?php echo e($purchase->reference_number); ?></td>
                                <td class="align-middle"><?php echo e($purchase->supplier ? $purchase->supplier->name : '-'); ?></td>
                                <td class="align-middle">$ <?php echo e($purchase->average_cost); ?></td>
                                <td class="align-middle">$ <?php echo e($purchase->last_cost); ?></td>
                                <td class="align-middle">
                                    <div class="dropdown d-flex">
                                        <button class="btn btn-link me-auto text-black p-0" type="button"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('heroicon-o-ellipsis-horizontal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'hero-icon']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end animate slideIn shadow-sm"
                                            aria-labelledby="dropdownMenuButton1">
                                            <li>
                                                <a class="dropdown-item" href="<?php echo e(route('purchases.show', $purchase)); ?>">
                                                    <?php echo app('translator')->get('Show'); ?>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="<?php echo e(route('purchases.print', $purchase)); ?>"
                                                    target="_blank">
                                                    <?php echo app('translator')->get('Print'); ?>
                                                </a>
                                            </li>
                                            <?php if (\Illuminate\Support\Facades\Blade::check('can_edit')): ?>
                                            <li>
                                                <a class="dropdown-item" href="<?php echo e(route('purchases.edit', $purchase)); ?>">
                                                    <?php echo app('translator')->get('Edit'); ?>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <form action="<?php echo e(route('purchases.destroy', $purchase)); ?>"
                                                        method="POST" id="form-<?php echo e($purchase->id); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="button"
                                                            class="btn btn-link p-0 m-0 w-100 text-start text-decoration-none text-danger"
                                                            onclick="submitDeleteForm('<?php echo e($purchase->id); ?>')">
                                                            <?php echo app('translator')->get('Delete'); ?>
                                                        </button>
                                                    </form>
                                                </a>
                                            </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>

                                </td>

                            </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php if($purchases->isEmpty()): ?>
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
            <div class="">
                <?php echo e($purchases->withQueryString()->links()); ?>

            </div>
        </div>
    </div>
    <div class="modal" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="filterModalLabel"><?php echo app('translator')->get('Purchase Filter'); ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo e(route('purchases.index')); ?>" method="GET" role="form">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="date" class="form-label"><?php echo app('translator')->get('Date'); ?></label>
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                        <div class="mb-3">
                            <label for="supplier_name" class="form-label"><?php echo app('translator')->get('Supplier Name'); ?></label>
                            <input type="text" name="supplier_name" class="form-control" id="supplier_name">
                        </div>
                        <div class="mb-3">
                            <label for="purchase_number" class="form-label"><?php echo app('translator')->get('Purchase Nunmber'); ?></label>
                            <input type="text" name="purchase_number" class="form-control" id="purchase_number">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary w-100"><?php echo app('translator')->get('Use Filter'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        function submitDeleteForm(id) {
            const form = document.querySelector(`#form-${id}`);
            Swal.fire(swalConfig()).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                } else {
                    topbar.hide();
                }
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\2miniw\www\resources\views/purchases/index.blade.php ENDPATH**/ ?>