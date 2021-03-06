<div class="row form-row">
    <div class="col-12 required-key">
	    <label class="required-label">* - Required</label>
	</div>
    <input type="hidden" name="postal_code" id="postal_code" value="<?php if(isset($request)): ?><?php echo e($request->postal_code); ?><?php endif; ?>">
	<input type="hidden" name="city" id="city" value="<?php if(isset($request)): ?><?php echo e($request->city); ?><?php endif; ?>">
	<input type="hidden" name="state_id" id="state_id" value="<?php if(isset($request)): ?><?php echo e($request->state_id); ?><?php endif; ?>">
	<input type="hidden" name="state" id="state" value="<?php if(isset($request)): ?><?php echo e($request->state); ?><?php endif; ?>">
	<input type="hidden" name="latitude" id="latitude" value="<?php if(isset($request)): ?><?php echo e($request->latitude); ?><?php endif; ?>">
	<input type="hidden" name="longitude" id="longitude" value="<?php if(isset($request)): ?><?php echo e($request->longitude); ?><?php endif; ?>">
	<div class="col-12">
		<div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
			<label for="title" class="required">Help Wanted Ad Name </label>
			<div class="">
				<input class="form-control" name="title" type="text" id="title" value="<?php echo e(old('title', optional($help)->title)); ?>" maxlength="200" placeholder="<?php echo e(trans('helps.title__placeholder')); ?>" required>
				<?php echo $errors->first('title', '<p class="help-block">:message</p>'); ?>

			</div>
		</div>
	</div>
	<div class="col-12">

		<div class="form-group <?php echo e($errors->has('description') ? 'has-error' : ''); ?>">
			<label for="description" class="required">Help Wanted Ad Description </label>
			<div class="">
				<textarea class="form-control" name="description" cols="50" rows="10" id="description" required><?php echo e(old('description', optional($help)->description)); ?></textarea>
				<?php echo $errors->first('description', '<p class="help-block">:message</p>'); ?>

			</div>
		</div>
	</div>
	
	<div class="col-12">
		<div class="form-group">
			<label for="preferred-contact" class="required">Preferred Method of Contact</label>
			<?php
			    $preferred_contacts = unserialize(old('preferred_contact', optional($help)->preferred_contact));
			    if($preferred_contacts !== false) {
    			    $phone = in_array('Phone',$preferred_contacts);
    			    $email = in_array('Email',$preferred_contacts);
    			    $message = in_array('Message',$preferred_contacts);
			    }
			    
			?>
			<div class="row">
			    <div class="col-md-12">
        			<input type="checkbox" class="contact-options" name="preferred_contact[]" value="Phone" <?php echo e(isset($phone) && $phone !== false ? 'checked' : ''); ?> required>
			        <label for="contact-phone">Phone</label>
        		</div>
        	</div>
        	<div class="row">
			    <div class="col-md-12">
        			<input type="checkbox" class="contact-options" name="preferred_contact[]" value="Email" <?php echo e(isset($email) && $email !== false ? 'checked' : ''); ?> required>
        			<label for="contact-email">Email</label>
        		</div>
        	</div>
        	<div class="row">
			    <div class="col-md-12">
        			<input type="checkbox" class="contact-options" name="preferred_contact[]" value="Message" <?php echo e(isset($message) && $message !== false ? 'checked' : ''); ?> required>
        			<label for="contact-message">Message</label>
        		</div>
        	</div>
        	<div class="row">
			    <div class="col-md-12">
        			<span class="alert" style="display:none; float:left; color:red; padding-left:0!important; padding-bottom:0!important; margin-bottom:0!important;">You must select at least one preference.</span>
        		</div>
        	</div>
		</div>
	</div>
    <div class="col-md-6">
		<div class="form-group">
			<label for="phone" class="">Phone Number</label>
			<input class="form-control" name="phone" type="tel" value="<?php echo e(old('phone', optional($help)->phone)); ?>">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="phone" class="required">Email</label>
			<input required class="form-control" name="email" type="email" value="<?php echo e(old('email', optional($help)->email)); ?>">
		</div>
	</div>
	
	<div class="col-md-6">
		<div class="form-group">
			<label for="date_job_start" class="required">Job Start Date </label>
			<div class="">
				<input class="form-control" name="date_job_start" type="date" id="date_job_start" value="<?php echo e(old('date_job_start', optional($help)->date_job_start)); ?>" required>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group <?php echo e($errors->has('date_need_resume') ? 'has-error' : ''); ?>">
			<label for="date_need_resume" class="mb-20 required">Need Resumes By What Date?</label>
			<div class="">
				<input class="form-control" name="date_need_resume" type="date" id="date_need_resume" value="<?php echo e(old('date_need_resume', optional($help)->date_need_resume)); ?>" placeholder="Need Resume By" required>
				<?php echo $errors->first('date_need_resume', '<p class="help-block">:message</p>'); ?>

			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group <?php echo e($errors->has('level_of_experience') ? 'has-error' : ''); ?>">
			<label for="level_of_experience" class="mb-20 required required">What Level of Experience</label>
			<div class="">
				<select class="form-control" id="level_of_experience" name="level_of_experience" required>
					<option value="">Experience</option>
					<option <?php echo e(isset($help->level_of_experience) && $help->level_of_experience == 'Willing To Train' ? 'selected' : ''); ?> value="Willing To Train">Willing To Train</option>
					<option <?php echo e(isset($help->level_of_experience) && $help->level_of_experience == '1-2 years' ? 'selected' : ''); ?> value="1-2 years">1-2 years</option>
					<option <?php echo e(isset($help->level_of_experience) && $help->level_of_experience == '3-5 years' ? 'selected' : ''); ?> value="3-5 years">3-5 years</option>
					<option <?php echo e(isset($help->level_of_experience) && $help->level_of_experience == '6-10 years' ? 'selected' : ''); ?> value="6-10 years"> 6-10 years</option>
					<option <?php echo e(isset($help->level_of_experience) && $help->level_of_experience == '10+ years' ? 'selected' : ''); ?> value="10+ years"> 10+ years</option>
				</select>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group <?php echo e($errors->has('trade') ? 'has-error' : ''); ?>">
			<label for="trade" class="required">Trade</label>
			<div class="">
				<select name="trade[]" id="trade" class="form-control" multiple>
					<?php 
                 $trades = DB::table('categories_helps')->get();
                 if($help != null) {
                 if(!isset($help->trade)){ 
                 $trades_arr = explode(',', $trades->trade);
                 } else {
                 $trades_arr = explode(',', $help->trade);
                 }
                 } else {
                    $trades_arr = array();
                    }
                 ?>
					<?php $__currentLoopData = $trades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($trade->title); ?>" <?php if(in_array($trade->title, $trades_arr)): ?> selected <?php endif; ?>><?php echo e($trade->title); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="location" class="required">Post in Location</label>
			<input class="form-control" name="location" type="text" id="location" value="<?php echo e(old('location', optional($help)->location)); ?>" maxlength="255" placeholder="Enter Location">
		</div>
	</div>
    <div class="col-12">
		<div class="form-group <?php echo e($errors->has('files') ? 'has-error' : ''); ?>">
			<label for="files" style="margin-bottom:15px;">Additional Files:</label>
			<input id="project-files" type="file" name="files[]" id="project_files" class="form-control" multiple>
			<?php echo $errors->first('files', '<p class="help-block">:message</p>'); ?>

		</div>
	</div>
	                    <?php if(!empty($files) && $files != '[]' && $files && isset($files)): ?>
	                        <div class="col-12">
	                        <label class="">Remove Project Files:</label>
	                        </div>
	                     <?php endif; ?>
	                     
								<?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div id="<?php echo e($file->id); ?>" class="col-lg-2 col-md-4 col-sm-4 m-t-20" style="margin-top:10px;">
										<div class="row">
										    
										    <?php
										    if($file->file_type == 'pdf'){
										        $src = '/public/storage/company/images/PDF-icon-small-231x300.png';
										    } else {
										        $src = $file->file_path;
										    }
										    ?>
										    <div style="width:100%;padding:10px;"><img width="100%" src="<?php echo e($src); ?>"></div>
										    
											<div style="width:100%;padding:10px;"><?php echo e($file->file_name); ?></div>
											<div style="text-align: center;width: 100%;margin-top: 10px;"><a style="color:#fff;" data-id="<?php echo e($file->id); ?>" class="btn btn-red delete-file" href="">Remove</a></div>
										
										</div>
									</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>













<?php /**PATH /home/bidhub/bidhub/resources/views/help-wanted/form.blade.php ENDPATH**/ ?>