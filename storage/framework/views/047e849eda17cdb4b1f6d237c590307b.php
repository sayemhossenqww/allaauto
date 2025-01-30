<?php $__env->startSection('title', __('Customers')); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="h4 mb-0 flex-grow-1"><?php echo app('translator')->get('Customers'); ?></div>
        <a href="<?php echo e(route('customers.create')); ?>" class="btn btn-primary"><?php echo app('translator')->get('Create'); ?></a>
    </div>
    <div class="card w-100">
        <div class="card-body">
            <div class="mb-3">
                <form action="<?php echo e(route('customers.index')); ?>" role="form">
                    <input type="search" name="search_query" value="<?php echo e(Request::get('search_query')); ?>"
                        class="form-control w-auto" placeholder="<?php echo app('translator')->get('Search...'); ?>" autocomplete="off">
                </form>
            </div>
            <div class=" table-responsive">
                <table class="table table-hover table-striped table-hover-x">
                    <thead>
                        <tr>
                            <th><?php echo app('translator')->get('Account Number'); ?></th>
                            <th><?php echo app('translator')->get('Name'); ?></th>
                            <th><?php echo app('translator')->get('Email'); ?></th>
                            <th><?php echo app('translator')->get('Mobile'); ?></th>
                            <th class="text-center"><?php echo app('translator')->get('Invoices'); ?></th>
                            <th class="text-center"><?php echo app('translator')->get('Balance'); ?></th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody class="border-top-0">
                        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr onclick="window.location='<?php echo e(route('customers.show', $customer)); ?>';">
                                <td class="align-middle fw-bold py-3"><?php echo e($customer->number); ?> </td>
                                <td class="align-middle fw-bold"><?php echo e($customer->name); ?> </td>
                                <td class="align-middle text-start" dir="auto" lang="en">
                                    <?php echo e($customer->email ?? '-'); ?></td>
                                <td class="align-middle text-start" dir="auto" lang="en">
                                    <?php echo e($customer->mobile ?? '-'); ?>

                                </td>
                                <td class="align-middle text-center"><?php echo e($customer->total_orders); ?></td>
                                <td class="align-middle text-center"><?php echo e($customer->balance); ?></td>
                                <td class=" align-middle">
                                    <?php if($settings->dir == 'ltr'): ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" style="width:1.2rem;height:1.2rem;">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                        </svg>
                                    <?php else: ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" style="width:1.2rem;height:1.2rem;">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 19.5L8.25 12l7.5-7.5" />
                                        </svg>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php if($customers->isEmpty()): ?>
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
                <?php echo e($customers->withQueryString()->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Alla_Auto_Parts\www\resources\views/customers/index.blade.php ENDPATH**/ ?>