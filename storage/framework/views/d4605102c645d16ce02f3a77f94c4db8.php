<form action="<?php echo e(route('settings.identification.update')); ?>" method="POST" role="form" class="py-3">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <div class="mb-3">
        <label for="store_name" class="form-label"><?php echo app('translator')->get('Store Name'); ?></label>
        <input type="text" name="store_name" class="form-control <?php $__errorArgs = ['store_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
            id="store_name" value="<?php echo e(old('store_name', $storeName)); ?>">
        <?php $__errorArgs = ['store_name'];
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
        <div class="form-text"><?php echo app('translator')->get('This will be shown on the receipt'); ?></div>
    </div>
    <div class="mb-3">
        <label for="store_address" class="form-label"><?php echo app('translator')->get('Store Address'); ?></label>
        <input type="text" name="store_address" class="form-control <?php $__errorArgs = ['store_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
            id="store_address" value="<?php echo e(old('store_address', $storeAddress)); ?>">
        <?php $__errorArgs = ['store_address'];
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
        <div class="form-text"><?php echo app('translator')->get('This will be shown on the receipt'); ?></div>
    </div>

    <div class="mb-3">
        <label for="store_phone" class="form-label"><?php echo app('translator')->get('Store Phone'); ?></label>
        <input type="text" name="store_phone" class="form-control <?php $__errorArgs = ['store_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
            id="store_phone" value="<?php echo e(old('store_phone', $storePhone)); ?>">
        <?php $__errorArgs = ['store_phone'];
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
        <div class="form-text"><?php echo app('translator')->get('This will be shown on the receipt'); ?></div>
    </div>

    <div class="mb-3">
        <label for="store_website" class="form-label"><?php echo app('translator')->get('Store Website'); ?></label>
        <input type="text" name="store_website" class="form-control <?php $__errorArgs = ['store_website'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
            id="store_website" value="<?php echo e(old('store_website', $storeWebsite)); ?>">
        <?php $__errorArgs = ['store_website'];
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
        <div class="form-text"><?php echo app('translator')->get('This will be shown on the receipt'); ?></div>
    </div>

    <div class="mb-3">
        <label for="store_email" class="form-label"><?php echo app('translator')->get('Store Email'); ?></label>
        <input type="text" name="store_email" class="form-control <?php $__errorArgs = ['store_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
            id="store_email" value="<?php echo e(old('store_email', $storeEmail)); ?>">
        <?php $__errorArgs = ['store_email'];
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
        <div class="form-text"><?php echo app('translator')->get('This will be shown on the receipt'); ?></div>
    </div>
    <div class="mb-3">
        <label for="store_additional_info" class="form-label"><?php echo app('translator')->get('Store Additional Info'); ?></label>
        <textarea name="store_additional_info" class="form-control <?php $__errorArgs = ['store_additional_info'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
            id="store_additional_info"><?php echo e(old('store_additional_info', $storeAdditionalInfo)); ?></textarea>
        <?php $__errorArgs = ['store_additional_info'];
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
        <div class="form-text"><?php echo app('translator')->get('This will be shown on the receipt'); ?></div>
    </div>

    <div class="mb-3">
        <label for="logo" class="form-label"><?php echo app('translator')->get('SVG Logo'); ?></label>
        <textarea name="logo" class="form-control <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
            id="logo"><?php echo e(old('logo', $settings->logo)); ?></textarea>
        <?php $__errorArgs = ['logo'];
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
        <div class="form-text"><?php echo app('translator')->get('This will be shown on the receipt'); ?></div>
    </div>

    <div class="mb-3">
        <label for="lang" class="form-label"><?php echo app('translator')->get('Language'); ?></label>
        <select name="lang" id="lang" class="form-select">
            <option value="en" <?php if($language == 'en'): echo 'selected'; endif; ?>>English</option>
            <option value="ar" <?php if($language == 'ar'): echo 'selected'; endif; ?>>العربية</option>
        </select>
        <?php $__errorArgs = ['lang'];
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
    <button type="submit" class="btn btn-primary px-4"><?php echo app('translator')->get('Save Settings'); ?></button>
</form>
<?php /**PATH D:\Alla_Auto_Parts\www\resources\views/settings/partials/identification-form.blade.php ENDPATH**/ ?>