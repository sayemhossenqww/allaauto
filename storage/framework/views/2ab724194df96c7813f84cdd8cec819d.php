<?php $__env->startSection('title', __('Settings')); ?>

<?php $__env->startSection('content'); ?>

    <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.page-title','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('page-title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><?php echo app('translator')->get('Settings'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.page-subtitle','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('page-subtitle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><?php echo app('translator')->get('Configure the general settings of the application.'); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.card','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="identification-tab" data-bs-toggle="tab"
                    data-bs-target="#identification-tab-pane" type="button" role="tab"
                    aria-controls="identification-tab-pane" aria-selected="true">
                    <?php echo app('translator')->get('Identification'); ?>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pos-tab" data-bs-toggle="tab" data-bs-target="#pos-tab-pane" type="button"
                    role="tab" aria-controls="pos-tab-pane" aria-selected="false"><?php echo app('translator')->get('POS'); ?></button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="currency-tab" data-bs-toggle="tab" data-bs-target="#currency-tab-pane"
                    type="button" role="tab" aria-controls="currency-tab-pane"
                    aria-selected="false"><?php echo app('translator')->get('Currency'); ?></button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="date-tab" data-bs-toggle="tab" data-bs-target="#date-tab-pane" type="button"
                    role="tab" aria-controls="date-tab-pane" aria-selected="false"><?php echo app('translator')->get('Date'); ?></button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="exchange-rate-tab" data-bs-toggle="tab"
                    data-bs-target="#exchange-rate-tab-pane" type="button" role="tab"
                    aria-controls="exchange-rate-tab-pane" aria-selected="false"><?php echo app('translator')->get('Exchange Rate'); ?></button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="backup-tab" data-bs-toggle="tab" data-bs-target="#backup-tab-pane"
                    type="button" role="tab" aria-controls="backup-tab-pane"
                    aria-selected="false"><?php echo app('translator')->get('Backup'); ?></button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="identification-tab-pane" role="tabpanel"
                aria-labelledby="identification-tab" tabindex="0">
                <?php echo $__env->make('settings.partials.identification-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="tab-pane fade" id="pos-tab-pane" role="tabpanel" aria-labelledby="pos-tab" tabindex="0">
                <?php echo $__env->make('settings.partials.pos-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="tab-pane fade" id="currency-tab-pane" role="tabpanel" aria-labelledby="currency-tab" tabindex="0">
                <?php echo $__env->make('settings.partials.currency-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="tab-pane fade" id="date-tab-pane" role="tabpanel" aria-labelledby="date-tab" tabindex="0">
                <?php echo $__env->make('settings.partials.date-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="tab-pane fade" id="exchange-rate-tab-pane" role="tabpanel" aria-labelledby="exchange-rate-tab"
                tabindex="0">
                
                <?php echo $__env->make('settings.partials.exchange-rate-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="tab-pane fade" id="backup-tab-pane" role="tabpanel" aria-labelledby="backup-tab" tabindex="0">
                <div class="card-body">
                    <div class="mb-3">
                        <a href="<?php echo e(route('database.download')); ?>" class="btn btn-primary px-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="hero-icon-sm me-1">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 13.5l3 3m0 0l3-3m-3 3v-6m1.06-4.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                            </svg>
                            <?php echo app('translator')->get('Download Backup'); ?>
                        </a>
                    </div>

                </div>
            </div>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mohammadmahbub/Downloads/Alla_Auto_Parts/www/resources/views/settings/show.blade.php ENDPATH**/ ?>