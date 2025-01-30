<form action="<?php echo e(route('settings.date.update')); ?>" method="POST" role="form" class="py-3">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="date_format" class="form-label"><?php echo app('translator')->get('Date Format'); ?></label>
            <select name="date_format" id="date_format" class=" form-select">
                <option value="d.m.Y" <?php if($dateFormat == 'd.m.Y'): echo 'selected'; endif; ?>><?php echo e(now()->format('d.m.Y')); ?></option>
                <option value="d/m/Y" <?php if($dateFormat == 'd/m/Y'): echo 'selected'; endif; ?>><?php echo e(now()->format('d/m/Y')); ?></option>
                <option value="d F Y" <?php if($dateFormat == 'd F Y'): echo 'selected'; endif; ?>><?php echo e(now()->format('d F Y')); ?></option>
                <option value="d M Y" <?php if($dateFormat == 'd M Y'): echo 'selected'; endif; ?>><?php echo e(now()->format('d M Y')); ?></option>
                <option value="d-m-Y" <?php if($dateFormat == 'd-m-Y'): echo 'selected'; endif; ?>><?php echo e(now()->format('d-m-Y')); ?></option>
                <option value="m/d/Y" <?php if($dateFormat == 'm/d/Y'): echo 'selected'; endif; ?>><?php echo e(now()->format('m/d/Y')); ?></option>
                <option value="Y-m-d" <?php if($dateFormat == 'Y-m-d'): echo 'selected'; endif; ?>><?php echo e(now()->format('Y-m-d')); ?></option>
                <option value="Y/m/d" <?php if($dateFormat == 'Y/m/d'): echo 'selected'; endif; ?>><?php echo e(now()->format('Y/m/d')); ?></option>
            </select>
            <?php $__errorArgs = ['date_format'];
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
            <label for="time_format" class="form-label"><?php echo app('translator')->get('Time Format'); ?></label>
            <select name="time_format" id="time_format" class=" form-select">
                <option value="H:i" <?php if($timeFormat == 'H:i'): echo 'selected'; endif; ?>><?php echo e(now()->format('H:i')); ?></option>
                <option value="H:i:s" <?php if($timeFormat == 'H:i:s'): echo 'selected'; endif; ?>><?php echo e(now()->format('H:i:s')); ?></option>
                <option value="h:i A" <?php if($timeFormat == 'h:i A'): echo 'selected'; endif; ?>><?php echo e(now()->format('h:i A')); ?></option>
                <option value="h:i:s A" <?php if($timeFormat == 'h:i:s A'): echo 'selected'; endif; ?>><?php echo e(now()->format('h:i:s A')); ?></option>
            </select>
            <?php $__errorArgs = ['time_format'];
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
        <div class="col-md-12 mb-3">
            <label for="timezone" class="form-label"><?php echo app('translator')->get('Timezone'); ?> <?php echo e($timezone); ?></label>
            <select name="timezone" id="timezone" class=" form-select">
                <?php $__currentLoopData = $timezones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>" <?php if($timezone == $key): echo 'selected'; endif; ?>><?php echo e($value); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php $__errorArgs = ['timezone'];
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
        <button type="submit" class="btn btn-primary px-4">
            <?php echo app('translator')->get('Save Settings'); ?>
        </button>
    </div>
</form>
<?php /**PATH /Users/sayemh/Downloads/Alla_Auto_Parts/www/resources/views/settings/partials/date-form.blade.php ENDPATH**/ ?>