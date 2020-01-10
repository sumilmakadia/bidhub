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
          <div class="col-md-3">
                <div class="form-group">
                    <style>
                    .fileuploader-items {
                        padding-top:10px;
                    }
                    #avatar-img-error {
                        position: absolute;
                        top: -25px;
                        left: 33px;
                    }
                    .help-block, .cl-red{
                            color: #ff0202;
                    }
                    .input-placeholder {
                      position: relative;
                    }
                    .input-placeholder input {
                      
                    }
                    .input-placeholder input:valid + .placeholder {
                      display: none;
                    }
                    
                    .placeholder {
                      position: absolute;
                      pointer-events: none;
                      top: 5px;
                      bottom: 0;
                      height: 25px;
                      font-size: .875rem;
                      left: 28px;
                      margin: auto;
                      color: #7a8288;
                    }
                    .lower-placeholder {
                        top: -15px;
                        left: 32px;
                    }
                    .placeholder span {
                      color: red;
                    }
                    #bio-placeholder {
                        top: -185px;
                        left: 25px;
                    }
                    .panel {
                        background-color: #f9f9f9!important;
                        padding: 0!important;
                    }
                    </style>
                      <label for="file" class="col-8 control-label" style="display:inline-block;text-align: center;">Profile Image</label>
                      <div class="col-12" >
                            <?php
                            $no_image = '';
                            $has_image = 'display:none;';
                            if(!isset($profile->avatar)){
                                $no_image = 'display:none;';
                                $has_image = '';
                            }
                            ?>
                            <div id="profile-upload" style="<?php echo e($has_image); ?>">    
                                <input id="avatar-img" class="form-control" name="file" type="file" value="">
                            </div>
                            <div id="profile-wrap" style="<?php echo e($no_image); ?>">
                                <a id="hide-image" class="cfileuploader-action cfileuploader-action-remove" title="Remove"><i></i></a>
                                <img class="profile-icon" id="profile-image" src="<?php if(isset($profile->avatar)): ?><?php echo e($profile->avatar); ?><?php endif; ?>">
                            </div>    
                      </div>
                </div>
                    
          </div>
          
       
          <div class="col-md-9">
                              <div class="col-12">
                    <div class="form-group <?php echo e($errors->has('role') ? 'has-error' : ''); ?>">
                              <label for="role" class="col-12 required">Select User Type </label>
                                        <select class="form-control input-placeholder" name="role" id="role" onchange="progress()" required>
                                                  <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if(Auth::user()->role_id == 1 || Auth::user()->role_id == 5): ?>
                                                                <?php if($role->name == 'user'): ?>
                                                                    <option value="" <?php if(isset($profile->type)): ?>) <?php if($profile->type == $role->display_name): ?> selected <?php endif; ?> <?php endif; ?>>Select User Type</option>
                                                                <?php else: ?>
                                                                    <option value="<?php echo e($role->display_name); ?>" <?php if(isset($profile->type)): ?>) <?php if($profile->type == $role->display_name): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e($role->display_name); ?></option>
                                                                <?php endif; ?>
                                                            <?php else: ?>
                                                            <?php if($role->name != 'admin' && $role->name != 'super_admin'): ?>
                                                                    <?php if($role->name == 'user'): ?>
                                                                        <option value="" <?php if(isset($profile->type)): ?>) <?php if($profile->type == $role->display_name): ?> selected <?php endif; ?> <?php endif; ?>>Select User Type</option>
                                                                    <?php else: ?>
                                                                        <option value="<?php echo e($role->display_name); ?>" <?php if(isset($profile->type)): ?>) <?php if($profile->type == $role->display_name): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e($role->display_name); ?></option>
                                                                    <?php endif; ?>  
                                                            <?php endif; ?>
                                                            <?php endif; ?>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                              </div>
                    </div>    
                    <div class="form-group <?php echo e($errors->has('first_name') ? 'has-error' : ''); ?>">
                              <label for="first_name" class="col-12 required">First Name </label>
                              <div class="col-md-12 input-placeholder">
                                        <input class="form-control" name="first_name" type="text" id="first_name" onchange="progress()" value="<?php echo e(old('first_name', optional($profile)->first_name)); ?>" minlength="1" maxlength="100" required="true" placeholder="First Name">
                                        <?php echo $errors->first('first_name', '<p class="help-block">:message</p>'); ?>

                              </div>
                    </div>
                    <div class="form-group <?php echo e($errors->has('last_name') ? 'has-error' : ''); ?>">
                              <label for="last_name" class="col-12 input-placeholder required">Last Name </label>
                              <div class="col-md-12">
                                        <input class="form-control" name="last_name" type="text" id="last_name" onchange="progress()" value="<?php echo e(old('last_name', optional($profile)->last_name)); ?>" maxlength="100" required="true" placeholder="Last Name">
                                        <?php echo $errors->first('last_name', '<p class="help-block">:message</p>'); ?>

                              </div>
                    </div>
          </div>
         
</div>



<div class="form-group <?php echo e($errors->has('bio') ? 'has-error' : ''); ?>">
          <label for="bio" class="col-12">Bio</span></label>
          <div class="col-12">
                    <textarea class="form-control" name="bio" cols="50" rows="10" id="bio" onchange="progress()" placeholder="Bio"><?php echo e(old('bio', optional($profile)->bio)); ?></textarea>
                    <?php echo $errors->first('bio', '<p class="help-block">:message</p>'); ?>

          </div>
          
</div>




<div class="row">
    
            <div class="col-md-6">
                    <div class="form-group">
                              <label for="location" class="col-md-12">City</label>
                              <div class="col-12">
                                        <input class="form-control" name="location" type="text" id="location" onchange="progress()" value="<?php echo e(old('location', optional($profile)->location)); ?>" maxlength="255" placeholder="Enter Location">
                              </div>
                    </div></div>
         

          <!--<div class="col-6">-->

          <!--          <div class="form-group <?php echo e($errors->has('age') ? 'has-error' : ''); ?>">-->
          <!--                    <label for="age" class="col-12 control-label"><?php echo e(trans('profiles.age')); ?></label>-->
          <!--                    <div class="col-12">-->
          <!--                              <input class="form-control" name="age" type="number" id="age" onchange="progress()" value="<?php echo e(old('age', optional($profile)->age)); ?>" min="0" max="100" placeholder="<?php echo e(trans('profiles.age__placeholder')); ?>" required="true">-->
          <!--                              <?php echo $errors->first('age', '<p class="help-block">:message</p>'); ?>-->
          <!--                    </div>-->
          <!--          </div></div>-->
          
          <div class="col-6">

                    <div class="form-group">
                              <label for="company" class="col-md-12">Company</label>
                              <div class="col-12">
                                        <input class="form-control" name="company" type="text" id="company" onchange="progress()" value="<?php echo e(old('company', optional($profile)->company)); ?>" maxlength="255" placeholder="Company">
                              </div>
                    </div></div>
          <div class="col-md-6">

                    <div class="form-group <?php echo e($errors->has('license_number') ? 'has-error' : ''); ?>">
                              <label for="license_number" class="col-12">License Number</label>
                              <div class="col-12">
                                    <textarea class="form-control" name="license_number" id="license_number" onkeyup="textAreaAdjust(this)" onchange="progress()" placeholder="License Number"><?php echo e(old('license_number', optional($profile)->license_number)); ?></textarea>
                                    <!--<input class="form-control" name="license_number" type="text" id="license_number" onchange="progress()" value="<?php echo e(old('license_number', optional($profile)->license_number)); ?>" placeholder="License Number">-->
                                    <?php echo $errors->first('license_number', '<p class="help-block">:message</p>'); ?>

                              </div>
                    </div></div>
          <div class="col-md-6">
                    <div class="form-group">
                              <label for="trade" class="col-12">Trades</label>
                              <div class="col-12" id="trade-input">
                                        <select class="form-control" name="trade[]" id="trade" onchange="progress()" multiple data-placeholder="Trades">
                                                  <?php 
                                                  $trades = DB::table('categories_directories')->orderBy('title', 'ASC')->get(); 
                                                  $trades_arr = explode(',', $profile->trade);
                                                  ?>
                                                  <?php $__currentLoopData = $trades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($trade->title); ?>" <?php echo e(in_array($trade->title, $trades_arr) ? 'selected' : ''); ?>><?php echo e($trade->title); ?></option>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                              </div>
                    </div>
          </div>          
          <div class="col-md-6">

                    <div class="form-group">
                              <label for="phone" class="col-md-12 required">Phone</label>
                              <div class="col-12 input-placeholder">
                                        <input class="form-control input-placeholder" name="phone" type="text" id="phone" onchange="progress()" value="<?php echo e(old('phone', optional($profile)->phone)); ?>" maxlength="255" required="true" placeholder="Phone">
                              </div>
                    </div></div>
          <div class="col-md-6">

                    <div class="form-group <?php echo e($errors->has('mobile') ? 'has-error' : ''); ?>">
                              <label for="mobile" class="col-12">Mobile</label>
                              <div class="col-12">
                                        <input class="form-control" name="mobile" type="text" id="mobile" onchange="progress()" value="<?php echo e(old('mobile', optional($profile)->mobile)); ?>" placeholder="Mobile" >
                                        <?php echo $errors->first('mobile', '<p class="help-block">:message</p>'); ?>

                              </div>
                    </div></div>

          <div class="col-md-6">
                    <div class="form-group <?php echo e($errors->has('website') ? 'has-error' : ''); ?>">
                              <label for="website" class="col-12">Website</label>
                              <div class="col-12">
                                        <input class="form-control" name="website" type="text" id="website" onchange="progress()" value="<?php echo e(old('website', optional($profile)->website)); ?>" placeholder="Website" >
                                        <?php echo $errors->first('website', '<p class="help-block">:message</p>'); ?>

                              </div>
                    </div>
          </div>

          
          <div class="col-md-6">
                <div class="col-12" style="padding: 10px;"><span style="margin-right:10px;">Do you want to be listed in our directory? </span>
                    <?php
                    $checked = '';
                    $no = 'checked';
                    $dis_image = 'display:none;'; 
                    if($profile->directory_listing == 1){
                        $checked = 'checked';
                        $no = '';
                        $dis_image = '';
                    } 
                    ?>
                    <input id="dir-yes" type="radio" name="directory_listing" value="1" <?php echo e($checked); ?> onchange="progress()"> <span style="margin-right:10px;">Yes</span>
                    <input id="dir-no" type="radio" name="directory_listing" value="0" <?php echo e($no); ?> onchange="progress()"> No
                </div>
          </div>
          <div class="col-md-6">
          </div>
          <!--<?php if(Auth::user()->role_id != 2): ?>-->
          <div id="add-image" class="col-6" style="margin-bottom:30px;padding:20px;<?php if(isset($profile->directory->paid)): ?><?php if($profile->directory->paid != 'one'): ?><?php echo e($dis_image); ?><?php endif; ?> <?php endif; ?>">
                <?php
                            $no_image = '';
                            $has_image = 'display:none;';
                            if(!isset($profile->directory->company_image)){
                                $no_image = 'display:none;';
                                $has_image = '';
                            }
                            ?>
                            <label for="ad">Input Directory Ad Here:</label>
                            <div id="ad-upload" style="<?php echo e($has_image); ?>">    
                                <input id="ad" class="form-control" name="ad" type="file" value="" >
                            </div>
                            <div id="ad-wrap" style="<?php echo e($no_image); ?>">
                                <a id="hide-ad" class="cfileuploader-action cfileuploader-action-remove" title="Remove"><i></i></a>
                                <img class="profile-icon" id="ad-image" src="<?php if(isset($profile->directory->company_image)): ?><?php echo e(asset('public/storage'). '/' . $profile->directory->company_image); ?><?php else: ?> <?php echo e(asset('public/storage/users/default.png')); ?> <?php endif; ?>">
                            </div>
          </div>
          <!--<?php endif; ?>-->
          
          
          <div class="col-12">
            <div class="form-group <?php echo e($errors->has('files') ? 'has-error' : ''); ?>">
              <label for="files" style="margin-bottom:15px;">Photos: <small>(Limit upto 5)</small></label>
              <input id="portfolio-files" type="file" name="files[]" id="project_files" class="form-control" multiple>
              <?php echo $errors->first('files', '<p class="help-block">:message</p>'); ?>

            </div>
          </div>
          
     
          <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          
        
									<div id="<?php echo e($file->id); ?>" class="col-lg-2 col-md-4 col-sm-4 m-t-20" style="margin-top:10px;float: left;">
										<div class="row">
										    
										    <?php
										    if($file->file_type == 'pdf'){
										        $src = '/app/public/storage/company/images/PDF-icon-small-231x300.png';
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
          
</div> <?php /**PATH /home/bidhub/bidhub/resources/views/profiles/form.blade.php ENDPATH**/ ?>