<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['label', 'name', 'checked' => false]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['label', 'name', 'checked' => false]); ?>
<?php foreach (array_filter((['label', 'name', 'checked' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php ($id = uniqid()); ?>

<div class="form-check mb-3">
    <input class="form-check-input cursor-pointer" type="checkbox" value="" name="<?php echo e($name); ?>"
        id="<?php echo e($id); ?>" <?php if($checked): echo 'checked'; endif; ?>>
    <label class="form-check-label" for="<?php echo e($id); ?>">
        <?php echo app('translator')->get($label); ?>
    </label>
</div>
<?php /**PATH /Users/sayemh/Downloads/Alla_Auto_Parts/www/resources/views/components/checkbox.blade.php ENDPATH**/ ?>