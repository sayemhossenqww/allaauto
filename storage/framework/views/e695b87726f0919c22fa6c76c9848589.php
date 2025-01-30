<form action="<?php echo e(route('settings.currency.update')); ?>" method="POST" role="form" class="py-3">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="currency_symbol" class="form-label"><?php echo app('translator')->get('Currency Symbol'); ?></label>
            <input type="text" name="currency_symbol"
                class="form-control <?php $__errorArgs = ['currency_symbol'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="currency_symbol"
                value="<?php echo e(old('currency_symbol', $currencySymbol)); ?>">
            <?php $__errorArgs = ['currency_symbol'];
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

        <div class="col-md-6 mb-3">
            <label for="currency_position" class="form-label"><?php echo app('translator')->get('Currency Position'); ?></label>
            <select name="currency_position" id="currency_position" class=" form-select">
                <option value=""></option>
                <option value="before" <?php if(old('currency_position') == 'before' || $currencyPosition == 'before'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Before the amount'); ?></option>
                <option value="after" <?php if(old('currency_position') == 'after' || $currencyPosition == 'after'): echo 'selected'; endif; ?>><?php echo app('translator')->get('After the amount'); ?></option>
            </select>
            <?php $__errorArgs = ['currency_position'];
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
    </div>


    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="currency_thousand_separator" class="form-label"><?php echo app('translator')->get('Currency Thousand Separator'); ?></label>
            <input type="text" name="currency_thousand_separator"
                class="form-control <?php $__errorArgs = ['currency_thousand_separator'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                id="currency_thousand_separator"
                value="<?php echo e(old('currency_thousand_separator', $currencyThousandSeparator)); ?>">
            <?php $__errorArgs = ['currency_thousand_separator'];
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
        <div class="col-md-6 mb-3">
            <label for="currency_decimal_separator" class="form-label"><?php echo app('translator')->get('Currency Decimal Separator'); ?></label>
            <input type="text" name="currency_decimal_separator"
                class="form-control <?php $__errorArgs = ['currency_decimal_separator'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                id="currency_decimal_separator"
                value="<?php echo e(old('currency_decimal_separator', $currencyDecimalSeparator)); ?>">
            <?php $__errorArgs = ['currency_decimal_separator'];
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
    </div>


    <div class="mb-3">
        <label for="currency_precision" class="form-label"><?php echo app('translator')->get('Currency Precision'); ?></label>
        <select name="currency_precision" id="currency_precision" class=" form-select">
            <option value="0" <?php if(old('currency_precision') == 0 || $currencyPrecision == 0): echo 'selected'; endif; ?>>
                0 <?php echo app('translator')->get('numbers after the decimal'); ?>
            </option>
            <option value="1" <?php if(old('currency_precision') == 1 || $currencyPrecision == 1): echo 'selected'; endif; ?>>
                1 <?php echo app('translator')->get('numbers after the decimal'); ?>
            </option>
            <option value="2" <?php if(old('currency_precision') == 2 || $currencyPrecision == 2): echo 'selected'; endif; ?>>
                2 <?php echo app('translator')->get('numbers after the decimal'); ?>
            </option>
            <option value="3" <?php if(old('currency_precision') == 3 || $currencyPrecision == 3): echo 'selected'; endif; ?>>
                3 <?php echo app('translator')->get('numbers after the decimal'); ?>
            </option>
            <option value="4" <?php if(old('currency_precision') == 4 || $currencyPrecision == 4): echo 'selected'; endif; ?>>
                4 <?php echo app('translator')->get('numbers after the decimal'); ?>
            </option>
            <option value="5" <?php if(old('currency_precision') == 5 || $currencyPrecision == 5): echo 'selected'; endif; ?>>
                5 <?php echo app('translator')->get('numbers after the decimal'); ?>
            </option>
        </select>
    </div>
    <div class="form-check mb-3">
        <input class="form-check-input cursor-pointer" type="checkbox" value="" id="trailingZerosCheck"
            name="trailing_zeros" <?php if($trailing_zeros): echo 'checked'; endif; ?>>
        <label class="form-check-label cursor-pointer" for="trailingZerosCheck">
            <?php echo app('translator')->get('Show trailing zeros'); ?>
        </label>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary px-4">
            <?php echo app('translator')->get('Save Settings'); ?>
        </button>
    </div>
</form>
<?php /**PATH /Users/mohammadmahbub/Downloads/Alla_Auto_Parts/www/resources/views/settings/partials/currency-form.blade.php ENDPATH**/ ?>