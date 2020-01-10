<div class="card search-row">
	<form id="location-search" action="<?php echo e(route('directory.directories.search')); ?>" method="post">
	<?php echo e(csrf_field()); ?>

	<div class="row">
		<div class="col-md-2 pad-5 m-mgn-btn">
			<input type="text" name="company_name" class="form-control" <?php if(isset($request)): ?> value="<?php echo e($request->company_name); ?>" <?php endif; ?> placeholder="Search">
		</div>
		<div class="col-md-3 pad-5 mrg-btm-7">
                    
                              <label for="trade" class="col-12 control-label"><?php echo e(trans('profiles.trade')); ?></label>
                              <div class="" id="trade-input">
                                  <?php 
                                  if (!is_array($trade) && !empty($trade)) {
							           $request->trade = explode("|",$trade);
							      }
                                  ?>
                                  
                                   <?php 
                                                  $trades = DB::table('categories_directories')->orderBy('title', 'ASC')->get(); 
                                                  ?>

                                                    
                                        <select class="form-control" name="trade[]" id="trade" multiple data-placeholder="Trade">
                                                  <?php 
                                                  $trades = DB::table('categories_directories')->orderBy('title', 'ASC')->get(); 
                                                  ?>
                                                  <?php $__currentLoopData = $trades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($trade->title); ?>" <?php if(isset($request)): ?> <?php if(is_array ($request->trade)): ?> <?php if(in_array(trim($trade->title), $request->trade)): ?> selected <?php endif; ?> <?php endif; ?> <?php endif; ?>><?php echo e($trade->title); ?></option>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                              </div>
                    
          </div>
        <div id="account-input" class="col-md-2 pad-5 m-mgn-btn">
                                  <?php 
                                  if (!is_array($type) && !empty($type)) {
							           $request->account_type = explode("|",$type);
							      }
                                  ?>
			<select name="account_type[]" id="type" data-placeholder="Account Type" multiple class="chosen-select">
				<option value="Subcontractor" <?php if(isset($request)): ?> <?php if(is_array ($request->account_type)): ?> <?php if(in_array('Subcontractor', $request->account_type)): ?> selected <?php endif; ?> <?php endif; ?> <?php endif; ?>>Subcontractor</option>
				<option value="General Contractor" <?php if(isset($request)): ?> <?php if(is_array ($request->account_type)): ?> <?php if(in_array('General Contractor', $request->account_type)): ?> selected <?php endif; ?> <?php endif; ?> <?php endif; ?>>General Contractor</option>
				<option value="Homeowner" <?php if(isset($request)): ?> <?php if(is_array ($request->account_type)): ?> <?php if(in_array('Homeowner', $request->account_type)): ?> selected <?php endif; ?> <?php endif; ?> <?php endif; ?>>Homeowner</option>
				<option value="Advertiser" <?php if(isset($request)): ?> <?php if(is_array ($request->account_type)): ?> <?php if(in_array('Advertiser', $request->account_type)): ?> selected <?php endif; ?> <?php endif; ?> <?php endif; ?>>Advertiser</option>
			</select>
		</div>  
		<div class="col-md-2 pad-5 m-mgn-btn">
			<input id="location" name="location" type="text" <?php if(isset($request)): ?> value="<?php echo e($request->location); ?>" <?php endif; ?> class="form-control" placeholder="Enter Location">
		</div>
		<input type="hidden" name="postal_code" id="postal_code" value="<?php if(isset($request)): ?><?php echo e($request->postal_code); ?><?php endif; ?>">
		<input type="hidden" name="city" id="city" value="<?php if(isset($request)): ?><?php echo e($request->city); ?><?php endif; ?>">
		<input type="hidden" name="state_id" id="state_id" value="<?php if(isset($request)): ?><?php echo e($request->state_id); ?><?php endif; ?>">
		<input type="hidden" name="state" id="state" value="<?php if(isset($request)): ?><?php echo e($request->state); ?><?php endif; ?>">
		<input type="hidden" name="latitude" id="latitude" value="<?php if(isset($request)): ?><?php echo e($request->latitude); ?><?php endif; ?>">
		<input type="hidden" name="longitude" id="longitude" value="<?php if(isset($request)): ?><?php echo e($request->longitude); ?><?php endif; ?>">
		<div class="col pad-5">
			<select name="distance" id="distance" class="form-control">
				<option value="">Distance</option>
				<option value="25" <?php if(isset($request)): ?> <?php if($request->distance == 25): ?> selected <?php endif; ?> <?php endif; ?>>Within 25 Miles</option>
				<option value="50" <?php if(isset($request)): ?> <?php if($request->distance == 50): ?> selected <?php endif; ?> <?php endif; ?>>Within 50 Miles</option>
				<option value="75" <?php if(isset($request)): ?> <?php if($request->distance == 75): ?> selected <?php endif; ?> <?php endif; ?>>Within 75 Miles</option>
				<option value="100" <?php if(isset($request)): ?> <?php if($request->distance == 100 || ($request->location && !$request->distance)): ?> selected <?php endif; ?> <?php endif; ?>>Within 100 Miles</option>
				<option value="150" <?php if(isset($request)): ?> <?php if($request->distance == 150): ?> selected <?php endif; ?> <?php endif; ?>>Within 150 Miles</option>
				<option value="200" <?php if(isset($request)): ?> <?php if($request->distance == 200): ?> selected <?php endif; ?> <?php endif; ?>>Within 200 Miles</option>
				<option value="250" <?php if(isset($request)): ?> <?php if($request->distance == 250): ?> selected <?php endif; ?> <?php endif; ?>>Within 250 Miles</option>
			</select>
		</div>






		<div class="pad-5">
			<button class="btn btn-primary" type="submit">Search</button>
		</div>
		<div class="pad-5">
			<a href="/directory" style="color:#fff;" class="btn btn-danger">Clear</a>
		</div>
		<!--<div class="col">-->
		<!--	<a href="/directory/map" class="btn btn-primary" type="button">Map View</a>-->
		<!--</div>-->
	</div>
	</form>
</div>
<?php /**PATH /home/bidhub/bidhub/resources/views/directory/search.blade.php ENDPATH**/ ?>