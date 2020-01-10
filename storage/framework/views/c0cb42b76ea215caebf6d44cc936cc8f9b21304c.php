<div class="card search-row">
	<form method="post" id="location-search" action="<?php echo e(route('projects.project.search')); ?>">
		<?php echo e(csrf_field()); ?>

		<div class="row">
			
			<div class="col-md-3 m-mgn-btn">
				<input type="text" name="title" class="form-control" <?php if(isset($request)): ?> value="<?php echo e($request->title); ?>" <?php endif; ?> placeholder="Company name">
			</div>
			<div class="col-md-2 m-mgn-btn" id="trade-input">
			                      <?php
			                      $trade = '';
                                  if (!is_array($trade) && !empty($trade)) {
							           $request->trade = explode("|",$trade);
							      }
                                  ?>
				<select name="trade[]" id="trade" class="form-control" onchange="progress()" multiple data-placeholder="Trades">
				    <option value="All" <?php if(isset($request)): ?> <?php if(is_array ($request->trade)): ?> <?php if(in_array('All', $request->trade)): ?> selected <?php endif; ?> <?php endif; ?> <?php endif; ?>>All Trades</option>
					<?php 
                        $trades = DB::table('categories_projects')->orderBy('title', 'ASC')->get(); 
                        $trades_arr = explode(',', $trades);
                        ?>
                        <?php $__currentLoopData = $trades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($trade->title); ?>" <?php if(isset($request)): ?> <?php if(is_array ($request->trade)): ?> <?php if(in_array($trade->title, $request->trade)): ?> selected <?php endif; ?> <?php endif; ?> <?php endif; ?>><?php echo e($trade->title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>
			</div>
			<div class="col-md-2 m-mgn-btn" id="type-input">
			     <?php 
			        $type = '';
                    if (!is_array($type) && !empty($type)) {
						    $request->type = explode("|",$type);
						}
                 ?>
				<select name="type[]" id="type" class="form-control" onchange="progress()" multiple data-placeholder="Job Type">
					<option value="Addition" <?php if(isset($request)): ?> <?php if(is_array ($request->type)): ?> <?php if(in_array('Addition', $request->type)): ?> selected <?php endif; ?> <?php endif; ?> <?php endif; ?>>Addition</option>
					<option value="Commercial" <?php if(isset($request)): ?> <?php if(is_array ($request->type)): ?> <?php if(in_array('Commercial', $request->type)): ?> selected <?php endif; ?> <?php endif; ?> <?php endif; ?>>Commercial</option>
					<option value="Multifamily" <?php if(isset($request)): ?> <?php if(is_array ($request->type)): ?> <?php if(in_array('Multifamily', $request->type)): ?> selected <?php endif; ?> <?php endif; ?> <?php endif; ?>>Multifamily</option>
					<option value="Remodel/Gut" <?php if(isset($request)): ?> <?php if(is_array ($request->type)): ?> <?php if(in_array('Remodel/Gut', $request->type)): ?> selected <?php endif; ?> <?php endif; ?> <?php endif; ?>>Remodel/Gut</option>
					<option value="Retrofit" <?php if(isset($request)): ?> <?php if(is_array ($request->type)): ?> <?php if(in_array('Retrofit', $request->type)): ?> selected <?php endif; ?> <?php endif; ?> <?php endif; ?>>Retrofit</option>
					<option value="Single Family" <?php if(isset($request)): ?> <?php if(is_array ($request->type)): ?> <?php if(in_array('Single Family', $request->type)): ?> selected <?php endif; ?> <?php endif; ?> <?php endif; ?>>Single Family</option>
					<option value="Townhouse" <?php if(isset($request)): ?> <?php if(is_array ($request->type)): ?> <?php if(in_array('Townhouse', $request->type)): ?> selected <?php endif; ?> <?php endif; ?> <?php endif; ?>>Townhouse</option>
				</select>
			</div>
			<div class="col m-mgn-btn">
			    <!--<button type="button" class="current-location-search"><i class="fas fa-location-arrow"></i></button>-->
				<input id="location" name="location" type="text" <?php if(isset($request)): ?> value="<?php echo e($request->location); ?>" <?php endif; ?> class="form-control" placeholder="Enter Location">
				<input type="hidden" name="postal_code" id="postal_code" value="<?php if(isset($request)): ?><?php echo e($request->postal_code); ?><?php endif; ?>">
        		<input type="hidden" name="city" id="city" value="<?php if(isset($request)): ?><?php echo e($request->city); ?><?php endif; ?>">
        		<input type="hidden" name="state_id" id="state_id" value="<?php if(isset($request)): ?><?php echo e($request->state_id); ?><?php endif; ?>">
        		<input type="hidden" name="state" id="state" value="<?php if(isset($request)): ?><?php echo e($request->state); ?><?php endif; ?>">
        		<input type="hidden" name="latitude" id="latitude" value="<?php if(isset($request)): ?><?php echo e($request->latitude); ?><?php endif; ?>">
        		<input type="hidden" name="longitude" id="longitude" value="<?php if(isset($request)): ?><?php echo e($request->longitude); ?><?php endif; ?>">
			</div>
			<div class="col-md-2">
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





        </div>
        <div class="row sort-row" style="margin-top: 20px;">
            <div class="col-md-3 m-mgn-btn" style="padding: 5px 10px;">
                <select name="sort_by" id="sort_by" class="form-control">
                    <option value="">Sort By</option>
					<option value="ASC" <?php if(isset($request)): ?> <?php if($request->sort_by == 'ASC'): ?> selected <?php endif; ?> <?php endif; ?>>Most Recent</option>
					<option value="DESC" <?php if(isset($request)): ?> <?php if($request->sort_by == 'DESC'): ?> selected <?php endif; ?> <?php endif; ?>>Furthest Bid Due Date</option>
				</select>
            </div>
            <div class="col-md-3 col-sm-1 col-lg-3">
            </div>    
            <div class="col-md-2 m-mgn-btn">
				<button style="width: 100%;" type="submit" class="btn btn-primary" >Search</button>
            </div>
			<div class="col-sm-3 col-md-2 col-lg-2 m-mgn-btn">
				<a href="/project-room" class="btn btn-primary btn-red" style="width: 100%;">Clear</a>
			</div>
			<div class="col-sm-3 col-md-2 col-lg-2">
				<a href="<?php echo e(route('projects.project.map')); ?>" style="width:100%;" class="btn btn-primary btn-green">Map View</a>
			</div>
		</div>
	</form>
</div>
<?php /**PATH /home/bidhub/bidhub/resources/views/project-room/search.blade.php ENDPATH**/ ?>