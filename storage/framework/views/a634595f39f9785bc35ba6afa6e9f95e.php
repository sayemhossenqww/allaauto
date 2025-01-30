
<?php $__env->startSection('title', __('Inventory')); ?>

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
<?php $component->withAttributes([]); ?><?php echo app('translator')->get('Inventories'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
        <div class="h4 mb-0 ms-auto"> <?php echo e($date); ?></div>
    </div>

    <div class="card w-100 mb-3">
        <div class="card-body">
            
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <td><?php echo app('translator')->get('Total Invoices'); ?></td>
                        <td> <?php echo e($count); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo app('translator')->get('Total Customers'); ?></td>
                        <td> <?php echo e($customer_count); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo app('translator')->get('Total Cash Sales'); ?></td>
                        <td> <?php echo e(currency_format($amount)); ?></td>
                    </tr>
                </table>
            </div>
           <h5 class="card-title"><?php echo app('translator')->get('Invoices'); ?></h5>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->get('Date'); ?></th>
                            <th><?php echo app('translator')->get('Invoice Number'); ?></th>
                            <th><?php echo app('translator')->get('Customer Name'); ?></th>
                            <th><?php echo app('translator')->get('Customer Phone Number'); ?></th>
                            <th><?php echo app('translator')->get('Cash Sales'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $todayInvoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $todayInvoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><div><?php echo e($date); ?></div></td>
                                <td class="align-middle"><?php echo e($todayInvoice->number); ?></td>
                                <td class="align-middle"><?php echo e($todayInvoice->name); ?></td>
                                <td class="align-middle"><?php echo e($todayInvoice->mobile); ?></td>
                                <td class="align-middle"><?php echo e($todayInvoice->amount); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php if($todayInvoices->isEmpty()): ?>
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
            <form action="<?php echo e(route('inventory.close')); ?>" method="POST">
                <?php echo csrf_field(); ?>
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
                            <th><?php echo app('translator')->get('Invoices Count'); ?></th>
                            <th><?php echo app('translator')->get('Customers Count'); ?></th>
                            <th><?php echo app('translator')->get('Cash Sales'); ?></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $inventoryHistories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inventoryHistory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <div><?php echo e($inventoryHistory->start_date); ?></div>
                                    <div><?php echo e($inventoryHistory->end_date); ?></div>
                                </td>
                                <td class="align-middle"><?php echo e($inventoryHistory->invoices); ?></td>
                                <td class="align-middle"><?php echo e($inventoryHistory->customers); ?></td>
                                <td class="align-middle"><?php echo e(currency_format($inventoryHistory->cash_sales)); ?></td>
                               <td>
                                    <a href="<?php echo e(route('inventory.print', $inventoryHistory)); ?>" class="btn btn-link"
                                        target="_blank">
                                        <?php echo app('translator')->get('Print'); ?>
                                    </a>
                                </td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php if($inventoryHistories->isEmpty()): ?>
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
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/sayemh/Downloads/Alla_Auto_Parts/www/resources/views/inventory/show.blade.php ENDPATH**/ ?>