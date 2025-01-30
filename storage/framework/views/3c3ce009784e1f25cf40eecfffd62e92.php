<form action="<?php echo e(route('settings.exchange-rate.update')); ?>" method="POST" role="form" class="py-3">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="form-check mb-3 user-select-none">
        <input class="form-check-input cursor-pointer" type="checkbox" value="" id="enableExchangeRateForItemsCheck"
            name="enableExchangeRateForItems" <?php if($enableExchangeRateForItems): echo 'checked'; endif; ?>>
        <label class="form-check-label" for="enableExchangeRateForItemsCheck">
            <?php echo app('translator')->get('Enable exchange rate for items'); ?>
        </label>
    </div>

    <div class="mb-3">
        <label for="exchange_rate_currency_symbol" class="form-label"><?php echo app('translator')->get('Currency'); ?></label>
        <input type="text" name="exchange_rate_currency_symbol"
            class="form-control <?php $__errorArgs = ['exchange_rate_currency_symbol'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
            id="exchange_rate_currency_symbol"
            value="<?php echo e(old('exchange_rate_currency_symbol', $exchangeRateCurrencySymbol)); ?>">
        <?php $__errorArgs = ['exchange_rate_currency_symbol'];
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
        <label for="exchange_rate_value" class="form-label"><?php echo app('translator')->get('Exchange Rate'); ?></label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">1 <?php echo e($currencySymbol); ?> = </span>
            <input type="text" name="exchange_rate_value"
            class="form-control input-number <?php $__errorArgs = ['exchange_rate_value'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <?php if($settings->dir == 'rtl'): ?> text-start <?php endif; ?>"
            dir="ltr" id="exchange_rate_value" value="<?php echo e(old('exchange_rate_value', $exchangeRateValue)); ?>">
        </div>
        <?php $__errorArgs = ['exchange_rate_value'];
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
    <div class="form-check mb-3 user-select-none">
        <input class="form-check-input cursor-pointer" type="checkbox" value=""
            id="showExchangeRateOnReceiptCheck" name="showExchangeRateOnReceipt" <?php if($showExchangeRateOnReceipt): echo 'checked'; endif; ?>>
        <label class="form-check-label" for="showExchangeRateOnReceiptCheck">
            <?php echo app('translator')->get('Show Exchange Rate On Receipt'); ?>
        </label>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary px-4">
            <?php echo app('translator')->get('Save Settings'); ?>
        </button>
    </div>
</form>
<?php /**PATH /Users/mohammadmahbub/Downloads/Alla_Auto_Parts/www/resources/views/settings/partials/exchange-rate-form.blade.php ENDPATH**/ ?>