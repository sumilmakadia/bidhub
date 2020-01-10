
<!--<div class="form-group <?php echo e($errors->has('product_id') ? 'has-error' : ''); ?>">-->
<!--    <label for="product_id" class="col-md-2 control-label"><?php echo e(trans('ybr_membership2_plans.product_id')); ?></label>-->
<!--    <div class="col-md-10">-->
<!--        <select class="form-control" id="product_id" name="product_id" required="true">-->
<!--        	    <option value="" style="display: none;" <?php echo e(old('product_id', optional($ybrMembership2Plan)->product_id ?: '') == '' ? 'selected' : ''); ?> disabled selected><?php echo e(trans('ybr_membership2_plans.product_id__placeholder')); ?></option>-->
<!--        	<?php $__currentLoopData = $YbrMembership1Products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $YbrMembership1Product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
<!--			    <option value="<?php echo e($key); ?>" <?php echo e(old('product_id', optional($ybrMembership2Plan)->product_id) == $key ? 'selected' : ''); ?>>-->
<!--			    	<?php echo e($YbrMembership1Product); ?>-->
<!--			    </option>-->
<!--			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
<!--        </select>-->
        
<!--        <?php echo $errors->first('product_id', '<p class="help-block">:message</p>'); ?>-->
<!--    </div>-->
<!--</div>-->

<div class="form-group <?php echo e($errors->has('plan_name') ? 'has-error' : ''); ?>">
    <label for="plan_name" class="col-md-2 control-label"><?php echo e(trans('ybr_membership2_plans.plan_name')); ?></label>
    <div class="col-md-12">
        <input class="form-control" name="plan_name" type="text" id="plan_name" value="<?php echo e(old('plan_name', optional($ybrMembership2Plan)->plan_name)); ?>" maxlength="255" placeholder="<?php echo e(trans('ybr_membership2_plans.plan_name__placeholder')); ?>">
        <?php echo $errors->first('plan_name', '<p class="help-block">:message</p>'); ?>

    </div>
</div>

<div class="form-group <?php echo e($errors->has('plan_description') ? 'has-error' : ''); ?>">
    <label for="plan_description" class="col-md-2 control-label"><?php echo e(trans('ybr_membership2_plans.plan_description')); ?></label>
    <div class="col-md-12">
        <textarea class="form-control" name="plan_description" cols="50" rows="10" id="plan_description" placeholder="Comma Seperated Features"><?php echo e(old('plan_description', optional($ybrMembership2Plan)->plan_description)); ?></textarea>
        <?php echo $errors->first('plan_description', '<p class="help-block">:message</p>'); ?>

    </div>
</div>

<div class="form-group <?php echo e($errors->has('plan_amount') ? 'has-error' : ''); ?>">
    <label for="plan_amount" class="col-md-2 control-label"><?php echo e(trans('ybr_membership2_plans.plan_amount')); ?></label>
    <div class="col-md-12">
        <input class="form-control" name="plan_amount" type="number" id="plan_amount" value="<?php echo e(old('plan_amount', optional($ybrMembership2Plan)->plan_amount)); ?>" min="-99999999" max="99999999" placeholder="<?php echo e(trans('ybr_membership2_plans.plan_amount__placeholder')); ?>" step="any">
        <?php echo $errors->first('plan_amount', '<p class="help-block">:message</p>'); ?>

    </div>
</div>

<!--<div class="form-group <?php echo e($errors->has('plan_object') ? 'has-error' : ''); ?>">-->
<!--    <label for="plan_object" class="col-md-2 control-label"><?php echo e(trans('ybr_membership2_plans.plan_object')); ?></label>-->
<!--    <div class="col-md-12">-->
<!--        <textarea class="form-control" name="plan_object" cols="50" rows="10" id="plan_object" placeholder="Comma Seperated Features"><?php echo e(old('plan_object', optional($ybrMembership2Plan)->plan_object)); ?></textarea>-->
<!--        <?php echo $errors->first('plan_object', '<p class="help-block">:message</p>'); ?>-->
<!--    </div>-->
<!--</div>-->

<!--<div class="form-group <?php echo e($errors->has('plan_billing_scheme') ? 'has-error' : ''); ?>">-->
<!--    <label for="plan_billing_scheme" class="col-md-2 control-label"><?php echo e(trans('ybr_membership2_plans.plan_billing_scheme')); ?></label>-->
<!--    <div class="col-md-10">-->
<!--        <input class="form-control" name="plan_billing_scheme" type="text" id="plan_billing_scheme" value="<?php echo e(old('plan_billing_scheme', optional($ybrMembership2Plan)->plan_billing_scheme)); ?>" maxlength="100" placeholder="<?php echo e(trans('ybr_membership2_plans.plan_billing_scheme__placeholder')); ?>">-->
<!--        <?php echo $errors->first('plan_billing_scheme', '<p class="help-block">:message</p>'); ?>-->
<!--    </div>-->
<!--</div>-->

<!--<div class="form-group <?php echo e($errors->has('plan_currency') ? 'has-error' : ''); ?>">-->
<!--    <label for="plan_currency" class="col-md-2 control-label"><?php echo e(trans('ybr_membership2_plans.plan_currency')); ?></label>-->
<!--    <div class="col-md-10">-->
<!--        <input class="form-control" name="plan_currency" type="text" id="plan_currency" value="<?php echo e(old('plan_currency', optional($ybrMembership2Plan)->plan_currency)); ?>" maxlength="100" placeholder="<?php echo e(trans('ybr_membership2_plans.plan_currency__placeholder')); ?>">-->
<!--        <?php echo $errors->first('plan_currency', '<p class="help-block">:message</p>'); ?>-->
<!--    </div>-->
<!--</div>-->

<!--<div class="form-group <?php echo e($errors->has('plan_interval') ? 'has-error' : ''); ?>">-->
<!--    <label for="plan_interval" class="col-md-2 control-label"><?php echo e(trans('ybr_membership2_plans.plan_interval')); ?></label>-->
<!--    <div class="col-md-12">-->
<!--        <input class="form-control" name="plan_interval" type="text" id="plan_interval" value="<?php echo e(old('plan_interval', optional($ybrMembership2Plan)->plan_interval)); ?>" maxlength="100" placeholder="Plan Interval">-->
<!--        <?php echo $errors->first('plan_interval', '<p class="help-block">:message</p>'); ?>-->
<!--    </div>-->
<!--</div>-->

<!--<div class="form-group <?php echo e($errors->has('plan_interval_count') ? 'has-error' : ''); ?>">-->
<!--    <label for="plan_interval_count" class="col-md-2 control-label"><?php echo e(trans('ybr_membership2_plans.plan_interval_count')); ?></label>-->
<!--    <div class="col-md-10">-->
<!--        <input class="form-control" name="plan_interval_count" type="text" id="plan_interval_count" value="<?php echo e(old('plan_interval_count', optional($ybrMembership2Plan)->plan_interval_count)); ?>" min="0" max="100" placeholder="Plan Interavel (days)">-->
<!--        <?php echo $errors->first('plan_interval_count', '<p class="help-block">:message</p>'); ?>-->
<!--    </div>-->
<!--</div>-->

<div class="form-group <?php echo e($errors->has('plan_livemode') ? 'has-error' : ''); ?> row">
    
    <div class="col-md-4" style="padding: 0 20px;">
        <label for="plan_interval" class="col-md-2 control-label"><?php echo e(trans('ybr_membership2_plans.plan_interval')); ?></label>
        <input class="form-control" name="plan_interval" type="text" id="plan_interval" value="<?php echo e(old('plan_interval', optional($ybrMembership2Plan)->plan_interval)); ?>" maxlength="100" placeholder="Plan Interval">
        <?php echo $errors->first('plan_interval', '<p class="help-block">:message</p>'); ?>

    </div>
    <div class="col-md-4" style="padding: 10px;">
        <?php
        $selected_no = '';
        $selected_yes = 'checked';
        if(isset($ybrMembership2Plan->plan_livemode)) {
        if($ybrMembership2Plan->plan_livemode == 0) {
            $selected_no = 'checked';
            $selected_yes = '';
        } }
        ?>
        <label for="plan_livemode" class="col-md-2" style="float: left;width: 50px;">Live:</label>
        <input class="" name="plan_livemode" type="radio" id="plan_livemode" value="1" maxlength="100" <?php echo e($selected_yes); ?>> Yes
        <input class="" name="plan_livemode" type="radio" id="plan_livemode" value="0" maxlength="100" <?php echo e($selected_no); ?>> No
        <?php echo $errors->first('plan_livemode', '<p class="help-block">:message</p>'); ?>

    </div>
    <div class="col-md-2">
        <label for="trial_period_days" class="col-md-2 control-label"><?php echo e(trans('ybr_membership2_plans.trial_period_days')); ?></label>
        <input class="form-control" name="trial_period_days" type="number" id="trial_period_days" value="<?php echo e(old('trial_period_days', optional($ybrMembership2Plan)->trial_period_days)); ?>" min="-2147483648" max="2147483647" placeholder="<?php echo e(trans('ybr_membership2_plans.trial_period_days__placeholder')); ?>">
        <?php echo $errors->first('trial_period_days', '<p class="help-block">:message</p>'); ?>

    </div>
</div>


<?php /**PATH /home/bidhub/bidhub/resources/views/admin/membership/plans/form.blade.php ENDPATH**/ ?>