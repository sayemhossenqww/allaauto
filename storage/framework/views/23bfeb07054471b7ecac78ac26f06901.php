<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['value', 'for']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['value', 'for']); ?>
<?php foreach (array_filter((['value', 'for']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<label for="<?php echo e($for); ?>" class="form-label"><?php echo app('translator')->get($value ?? ''); ?></label>
<?php /**PATH /Users/sayemh/Downloads/Alla_Auto_Parts/www/resources/views/components/label.blade.php ENDPATH**/ ?>