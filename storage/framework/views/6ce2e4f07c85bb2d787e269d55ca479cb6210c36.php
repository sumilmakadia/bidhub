<div class="card search-row">
	<form id="location-search" method="post" action="<?php echo e(route('equipment-for-sale.property.search')); ?>">
		<?php echo e(csrf_field()); ?>

		<div class="row">
			<div class="col-md-3 m-mgn-btn">
				<input type="text" name="equipment_title" class="form-control" <?php if(isset($request)): ?> value="<?php echo e($request->equipment_title); ?>" <?php endif; ?> placeholder="Search">
			</div>
			<div class="col-md-3 m-mgn-btn">
				<input id="location" name="location" type="text" <?php if(isset($request)): ?> value="<?php echo e($request->location); ?>" <?php endif; ?> class="form-control" placeholder="Enter Location">
			</div>
			
			
				<div class="col-md-3  m-mgn-btn">
                    
                              
                             
                                      <select class="form-control" name="category" id="category"  data-placeholder="Categories">
                                                	<option value="">Category</option>
					<option  value="Insulation Blowing Machines" <?php if(isset($request)): ?> <?php if($request->category == 'Insulation Blowing Machines'): ?> selected <?php endif; ?> <?php endif; ?>>Insulation Blowing Machines
</option>
					<option  value="Earth Moving Equipment" <?php if(isset($request)): ?> <?php if($request->category == 'Earth Moving Equipment'): ?> selected <?php endif; ?> <?php endif; ?>>Earth Moving Equipment</option>
					<option value="Generators" <?php if(isset($request)): ?> <?php if($request->category == 'Generators'): ?> selected <?php endif; ?> <?php endif; ?>>Generators</option>
					<option  value="Compressors" <?php if(isset($request)): ?> <?php if($request->category == 'Compressors'): ?> selected <?php endif; ?> <?php endif; ?>> Compressors</option>
					<option  value="Trucks" <?php if(isset($request)): ?> <?php if($request->category == 'Trucks'): ?> selected <?php endif; ?> <?php endif; ?>> Trucks</option>
					
						<option  value="Forklifts" <?php if(isset($request)): ?> <?php if($request->category == 'Forklifts'): ?> selected <?php endif; ?> <?php endif; ?>> Forklifts</option>
					<option  value="Heaters" <?php if(isset($request)): ?> <?php if($request->category == 'Heaters'): ?> selected <?php endif; ?> <?php endif; ?>> Heaters</option>
					<option  value="Lifts" <?php if(isset($request)): ?> <?php if($request->category == 'Lifts'): ?> selected <?php endif; ?> <?php endif; ?>> Lifts</option>
					<option  value="Drills" <?php if(isset($request)): ?> <?php if($request->category == 'Drills'): ?> selected <?php endif; ?> <?php endif; ?>> Drills</option>
					<option  value="Grinders" <?php if(isset($request)): ?> <?php if($request->category == 'Grinders'): ?> selected <?php endif; ?> <?php endif; ?>> Grinders</option>
					<option  value="Hand Tools" <?php if(isset($request)): ?> <?php if($request->category == 'Hand Tools'): ?> selected <?php endif; ?> <?php endif; ?>> Hand Tools</option>
					<option  value="Power tools" <?php if(isset($request)): ?> <?php if($request->category == 'Power tools'): ?> selected <?php endif; ?> <?php endif; ?>> Power tools</option>
					<option  value="Implements" <?php if(isset($request)): ?> <?php if($request->category == 'Implements'): ?> selected <?php endif; ?> <?php endif; ?>> Implements</option>
					<option  value="Specialty tools" <?php if(isset($request)): ?> <?php if($request->category == 'Specialty tools'): ?> selected <?php endif; ?> <?php endif; ?>> Specialty tools</option>
					<option  value="Welders" <?php if(isset($request)): ?> <?php if($request->category == 'Welders'): ?> selected <?php endif; ?> <?php endif; ?>> Welders </option>
					<option  value="Welding equipment" <?php if(isset($request)): ?> <?php if($request->category == 'Welding equipment'): ?> selected <?php endif; ?> <?php endif; ?>>Welding equipment</option>
					<option  value="Miscellaneous equipment" <?php if(isset($request)): ?> <?php if($request->category == 'Miscellaneous equipment'): ?> selected <?php endif; ?> <?php endif; ?>>Miscellaneous equipment</option>
					<option value="Miscellaneous tools" <?php if(isset($request)): ?> <?php if($request->category == 'Miscellaneous tools'): ?> selected <?php endif; ?> <?php endif; ?>>Miscellaneous tools</option>
                                        </select>
                         
                    
          </div>
        <input type="hidden" name="postal_code" id="postal_code" value="<?php if(isset($request)): ?><?php echo e($request->postal_code); ?><?php endif; ?>">
		<input type="hidden" name="city" id="city" value="<?php if(isset($request)): ?><?php echo e($request->city); ?><?php endif; ?>">
		<input type="hidden" name="state_id" id="state_id" value="<?php if(isset($request)): ?><?php echo e($request->state_id); ?><?php endif; ?>">
		<input type="hidden" name="state" id="state" value="<?php if(isset($request)): ?><?php echo e($request->state); ?><?php endif; ?>">
		<input type="hidden" name="latitude" id="latitude" value="<?php if(isset($request)): ?><?php echo e($request->latitude); ?><?php endif; ?>">
		<input type="hidden" name="longitude" id="longitude" value="<?php if(isset($request)): ?><?php echo e($request->longitude); ?><?php endif; ?>">
		<!--<div class="col-md-2 m-mgn-btn">-->
		<!--	<select name="distance" id="distance" class="form-control">-->
		<!--		<option value="">Distance</option>-->
		<!--		<option value="25" <?php if(isset($request)): ?> <?php if($request->distance == 25): ?> selected <?php endif; ?> <?php endif; ?>>Within 25 Miles</option>-->
		<!--		<option value="50" <?php if(isset($request)): ?> <?php if($request->distance == 50): ?> selected <?php endif; ?> <?php endif; ?>>Within 50 Miles</option>-->
		<!--		<option value="75" <?php if(isset($request)): ?> <?php if($request->distance == 75): ?> selected <?php endif; ?> <?php endif; ?>>Within 75 Miles</option>-->
		<!--		<option value="100" <?php if(isset($request)): ?> <?php if($request->distance == 100 || ($request->location && !$request->distance)): ?> selected <?php endif; ?> <?php endif; ?>>Within 100 Miles</option>-->
		<!--		<option value="150" <?php if(isset($request)): ?> <?php if($request->distance == 150): ?> selected <?php endif; ?> <?php endif; ?>>Within 150 Miles</option>-->
		<!--		<option value="200" <?php if(isset($request)): ?> <?php if($request->distance == 200): ?> selected <?php endif; ?> <?php endif; ?>>Within 200 Miles</option>-->
		<!--		<option value="250" <?php if(isset($request)): ?> <?php if($request->distance == 250): ?> selected <?php endif; ?> <?php endif; ?>>Within 250 Miles</option>-->
		<!--	</select>-->
		<!--</div>-->
		<!--	<div class="col-md-2 m-mgn-btn">-->
		<!--		<select name="sort_by" id="sort-by" class="form-control">-->
		<!--			<option value="default">Sort By</option>-->
		<!--			<option value="acres_high" <?php if(isset($request)): ?> <?php if($request->sort_by == 'acres_high'): ?> selected <?php endif; ?> <?php endif; ?>>Acres High</option>-->
		<!--			<option value="acres_low" <?php if(isset($request)): ?> <?php if($request->sort_by == 'acres_low'): ?> selected <?php endif; ?> <?php endif; ?>>Acres Low</option>-->
		<!--			<option value="price_high" <?php if(isset($request)): ?> <?php if($request->sort_by == 'price_high'): ?> selected <?php endif; ?> <?php endif; ?>>Price High</option>-->
		<!--			<option value="price_low" <?php if(isset($request)): ?> <?php if($request->sort_by == 'price_low'): ?> selected <?php endif; ?> <?php endif; ?>>Price Low</option>-->
		<!--			<option value="newest" <?php if(isset($request)): ?> <?php if($request->sort_by == 'newest'): ?> selected <?php endif; ?> <?php endif; ?>>Newest</option>-->
		<!--			<option value="oldest" <?php if(isset($request)): ?> <?php if($request->sort_by == 'oldest'): ?> selected <?php endif; ?> <?php endif; ?>>Oldest</option>-->
		<!--		</select>-->
		<!--	</div>-->
			<div class="col-md-2 m-mgn-btn">
				<button class="btn btn-primary" type="submit">Search</button>
				<a href="/equipment-for-sale" class="btn btn-primary btn-red">Clear</a>
			</div>
			
		</div>
	</form>
</div>
<?php /**PATH /home/bidhub/bidhub/resources/views/equipment-for-sale/search.blade.php ENDPATH**/ ?>