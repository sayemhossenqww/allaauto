
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['id']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['id']); ?>
<?php foreach (array_filter((['id']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php ($currentId = $id ?? uniqid()); ?>

<div class=" table-responsive">
    <table class="table table-hover table-striped mb-0 align-middle w-100" style="min-width: 100%;"
        id="<?php echo e($currentId); ?>">
        <?php echo e($slot); ?>

    </table>
</div>
<?php /**PATH D:\Alla_Auto_Parts\www\resources\views/components/table.blade.php ENDPATH**/ ?>