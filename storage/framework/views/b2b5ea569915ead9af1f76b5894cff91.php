<form action="<?php echo e(route('settings.pos.update')); ?>" method="POST" role="form" class="py-3">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="form-check mb-3 user-select-none">
        <input class="form-check-input cursor-pointer" type="checkbox" name="enableTakeoutAndDelivery" value=""
            id="enableTakeoutAndDelivery" <?php if($enableTakeoutAndDelivery): echo 'checked'; endif; ?>>
        <label class="form-check-label" for="enableTakeoutAndDelivery">
            <?php echo app('translator')->get('Enable takeout and delivery feature'); ?>
        </label>
    </div>
    <div class="form-check mb-3 user-select-none">
        <input class="form-check-input cursor-pointer" type="checkbox" name="enableCashDrawer" value=""
            id="enableCashDrawer" <?php if($enableCashDrawer): echo 'checked'; endif; ?>>
        <label class="form-check-label" for="enableCashDrawer">
            <?php echo app('translator')->get('Enable cash drawer feature'); ?>
        </label>
    </div>

    

    <div class="mb-3">
        <label for="tax_rate" class="form-label"><?php echo app('translator')->get('Default VAT'); ?> (%)</label>
        <input type="text" name="tax_rate"
            class="form-control input-number <?php $__errorArgs = ['tax_rate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <?php if($settings->dir == 'rtl'): ?> text-start <?php endif; ?>"
            dir="ltr" id="tax_rate" value="<?php echo e(old('tax_rate', $taxRate)); ?>">
        <?php $__errorArgs = ['tax_rate'];
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
        <label for="vat_type" class="form-label"><?php echo app('translator')->get('VAT Type'); ?></label>
        <select name="vat_type" id="vat_type" class="form-select">
            <option value="exclude" <?php if($vatType == 'exclude'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Exclude'); ?></option>
            <option value="add" <?php if($vatType == 'add'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Add'); ?></option>
        </select>
        <?php $__errorArgs = ['vat_type'];
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
        <label for="delivery_charge" class="form-label">
            <?php echo app('translator')->get('Default Delivery Charge Value'); ?> (<?php echo e($currencySymbol); ?>)
        </label>
        <input type="text" name="delivery_charge"
            class="form-control input-number <?php $__errorArgs = ['delivery_charge'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <?php if($settings->dir == 'rtl'): ?> text-start <?php endif; ?>"
            dir="ltr" id="delivery_charge" value="<?php echo e(old('delivery_charge', $deliveryCharge)); ?>">
        <?php $__errorArgs = ['delivery_charge'];
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
        <label for="discount" class="form-label">
            <?php echo app('translator')->get('Default Discount Value'); ?> (<?php echo e($currencySymbol); ?>)
        </label>
        <input type="text" name="discount"
            class="form-control input-number <?php $__errorArgs = ['discount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <?php if($settings->dir == 'rtl'): ?> text-start <?php endif; ?>"
            dir="ltr" id="discount" value="<?php echo e(old('discount', $discount)); ?>">
        <?php $__errorArgs = ['discount'];
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
        <input class="form-check-input cursor-pointer" type="checkbox" name="newItemAudio" value="" id="newItemAudio"
            <?php if($newItemAudio): echo 'checked'; endif; ?>>
        <label class="form-check-label" for="newItemAudio">
            <?php echo app('translator')->get('New Item Audio'); ?>
        </label>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary px-4">
            <?php echo app('translator')->get('Save Settings'); ?>
        </button>
    </div>
</form>
<?php /**PATH /Users/mohammadmahbub/Downloads/Alla_Auto_Parts/www/resources/views/settings/partials/pos-form.blade.php ENDPATH**/ ?>