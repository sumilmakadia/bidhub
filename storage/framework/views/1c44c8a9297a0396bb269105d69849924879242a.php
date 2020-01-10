<div class="row form-row">
    <input type="hidden" name="postal_code" id="postal_code" value="<?php if(isset($request)): ?><?php echo e($request->postal_code); ?><?php endif; ?>">
	<input type="hidden" name="city" id="city" value="<?php if(isset($request)): ?><?php echo e($request->city); ?><?php endif; ?>">
	<input type="hidden" name="state_id" id="state_id" value="<?php if(isset($request)): ?><?php echo e($request->state_id); ?><?php endif; ?>">
	<input type="hidden" name="state" id="state" value="<?php if(isset($request)): ?><?php echo e($request->state); ?><?php endif; ?>">
	<input type="hidden" name="latitude" id="latitude" value="<?php if(isset($request)): ?><?php echo e($request->latitude); ?><?php endif; ?>">
	<input type="hidden" name="longitude" id="longitude" value="<?php if(isset($request)): ?><?php echo e($request->longitude); ?><?php endif; ?>">
    <div class="col-12 required-key">
	    <label class="required-label">* - Required</label>
	</div>
	<div class="col-12">
		<div class="form-group <?php echo e($errors->has('company_name') ? 'has-error' : ''); ?>">
		    <label for="company_name" class="required" aria-required="true">Company Name</label>
			<input required class="form-control no_label" name="company_name" type="text" id="company_name" value="<?php echo e(old('company_name', optional($directories)->businessName)); ?>" maxlength="255" placeholder="Company Name">
			<?php echo $errors->first('company_name', '<p class="help-block">:message</p>'); ?>

		</div>
	</div>

	<!--<div class="col-12">-->
	<!--	<div class="form-group <?php echo e($errors->has('company_description') ? 'has-error' : ''); ?>">-->
	<!--		<label for="company_description" class="control-label">Description</label>-->
	<!--		<div class="">-->
	<!--			<textarea class="form-control no_label" name="company_description" cols="50" rows="10" id="company_description" placeholder="Description"><?php echo e(old('company_description', optional($directories)->company_description)); ?></textarea>-->
	<!--			<?php echo $errors->first('company_description', '<p class="help-block">:message</p>'); ?>-->
	<!--		</div>-->
	<!--	</div>-->
	<!--</div>-->
	<div class="col-6">
		<div class="form-group <?php echo e($errors->has('company_contact') ? 'has-error' : ''); ?>">
			<label for="contact_name" class="required" aria-required="true">Contact Name</label>
			<input required class="form-control no_label" name="company_contact" type="text" id="company_contact" value="<?php echo e(old('company_contact', optional($directories)->contactName)); ?>" maxlength="255" placeholder="Contact Name">
			<?php echo $errors->first('company_contact', '<p class="help-block">:message</p>'); ?>

		</div>
	</div>

	<div class="col-6">
		<div class="form-group <?php echo e($errors->has('company_phone') ? 'has-error' : ''); ?>">
			<label for="company_phone" class="" aria-required="true">Contact Phone</label>
			<input class="form-control no_label" name="company_phone" type="text" id="company_phone" value="<?php echo e(old('company_phone', optional($directories)->phoneNumber)); ?>" maxlength="255" placeholder="Contact Number">
			<?php echo $errors->first('company_phone', '<p class="help-block">:message</p>'); ?>

		</div>
	</div>




	<div class="col-6">
		<div class="form-group <?php echo e($errors->has('company_email') ? 'has-error' : ''); ?>">
			<label for="company_email" class="required" aria-required="true">Contact Email</label>
			<input required class="form-control" name="company_email" type="text" id="company_email" value="<?php echo e(old('company_email', optional($directories)->email)); ?>" maxlength="255" placeholder="Email Address">
			<?php echo $errors->first('company_email', '<p class="help-block">:message</p>'); ?>

		</div>
	</div>
	<div class="col-6">
		<div class="form-group <?php echo e($errors->has('company_website') ? 'has-error' : ''); ?>">
				<label for="company_website" class="" aria-required="true">Website</label>
			<input class="form-control" name="company_website" type="text" id="company_website" value="<?php echo e(old('company_website', optional($directories)->webSite)); ?>" maxlength="255" placeholder="Website">
			<?php echo $errors->first('company_website', '<p class="help-block">:message</p>'); ?>

		</div>
	</div>
	<!--<div class="col-12">-->
	<!--	<div class="form-group <?php echo e($errors->has('company_image') ? 'has-error' : ''); ?>">-->
	<!--		<label for="company_image" class="control-label"><?php echo e(trans('directories.company_image')); ?></label>-->
	<!--		<div class="file-upload">-->
	<!--			Company Image <input type="file" name="company_image" id="company_image" class="hidden no_label">-->
	<!--		</div>-->
	<!--	</div>-->
	<!--</div>-->
	<div class="col-6">
	                <label for="trade" class="required" aria-required="true">Trades</label>
                    <div class="form-group <?php echo e($errors->has('trade') ? 'has-error' : ''); ?>">
                              <label for="trade" class="col-12 control-label"><?php echo e(trans('$directories.trade')); ?></label>
                              <div id="trade-input">
                                        <select class="form-control" name="trade[]" id="trade" multiple>
                                                  <?php
                                                  if(isset($directories->category)) {
                                                  if(!is_array($directories->category) && isset($directories->category)) {
                                                  ?>
                                                        <!--<option value="<?php echo e($directories->category); ?>" selected><?php echo e($directories->category); ?></option>-->
                                                  <?php      
                                                    }
                                                    $trades_arr = explode(',', $directories->category);
                                                    } else {
                                                         $trades_arr = array();
                                                    }
                                                  
                                                  $trades = DB::table('categories_directories')->orderBy('title', 'ASC')->get(); 
                                                  
                                                  ?>
                                                  <?php $__currentLoopData = $trades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($trade->title); ?>" <?php if(in_array($trade->title, $trades_arr)): ?> selected <?php endif; ?>><?php echo e($trade->title); ?></option>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                           
                                        </select>
                              </div>
                    </div>
          </div>

	<div class="col-6">
		<div class="form-group">
			<label for="location" class="required" aria-required="true">Location</label>
		    <?php if(isset($upload->location)): ?>
			<input class="form-control" name="location" type="text" id="location" value="<?php echo e(old('location', optional($directories)->location)); ?>" maxlength="255" placeholder="Enter Location">
			<?php else: ?>
			<input class="form-control" name="location" type="text" id="location" value="<?php if(isset($directories)): ?><?php echo e($directories->street); ?><?php if(isset($directories->street)): ?>,<?php endif; ?> <?php echo e($directories->city); ?><?php if(isset($directories->city)): ?>,<?php endif; ?> <?php echo e($directories->state); ?><?php if(isset($directories->state)): ?>,<?php endif; ?> <?php echo e($directories->postal); ?><?php endif; ?>" maxlength="255" placeholder="Enter Location">
            <?php endif; ?>
		</div>
	</div>
</div>




<?php /**PATH /home/bidhub/bidhub/resources/views/directory/form.blade.php ENDPATH**/ ?>