<div class="card search-row">
	<form id="location-search" method="post" action="{{route('equipment-for-sale.property.search')}}">
		{{csrf_field()}}
		<div class="row">
			<div class="col-md-3 m-mgn-btn">
				<input type="text" name="equipment_title" class="form-control" @if(isset($request)) value="{{$request->equipment_title}}" @endif placeholder="Search">
			</div>
			<div class="col-md-3 m-mgn-btn">
				<input id="location" name="location" type="text" @if(isset($request)) value="{{$request->location}}" @endif class="form-control" placeholder="Enter Location">
			</div>
			
			
				<div class="col-md-3  m-mgn-btn">
                    
                              
                             
                                      <select class="form-control" name="category" id="category"  data-placeholder="Categories">
                                                	<option value="">Category</option>
					<option  value="Insulation Blowing Machines" @if(isset($request)) @if($request->category == 'Insulation Blowing Machines') selected @endif @endif>Insulation Blowing Machines
</option>
					<option  value="Earth Moving Equipment" @if(isset($request)) @if($request->category == 'Earth Moving Equipment') selected @endif @endif>Earth Moving Equipment</option>
					<option value="Generators" @if(isset($request)) @if($request->category == 'Generators') selected @endif @endif>Generators</option>
					<option  value="Compressors" @if(isset($request)) @if($request->category == 'Compressors') selected @endif @endif> Compressors</option>
					<option  value="Trucks" @if(isset($request)) @if($request->category == 'Trucks') selected @endif @endif> Trucks</option>
					
						<option  value="Forklifts" @if(isset($request)) @if($request->category == 'Forklifts') selected @endif @endif> Forklifts</option>
					<option  value="Heaters" @if(isset($request)) @if($request->category == 'Heaters') selected @endif @endif> Heaters</option>
					<option  value="Lifts" @if(isset($request)) @if($request->category == 'Lifts') selected @endif @endif> Lifts</option>
					<option  value="Drills" @if(isset($request)) @if($request->category == 'Drills') selected @endif @endif> Drills</option>
					<option  value="Grinders" @if(isset($request)) @if($request->category == 'Grinders') selected @endif @endif> Grinders</option>
					<option  value="Hand Tools" @if(isset($request)) @if($request->category == 'Hand Tools') selected @endif @endif> Hand Tools</option>
					<option  value="Power tools" @if(isset($request)) @if($request->category == 'Power tools') selected @endif @endif> Power tools</option>
					<option  value="Implements" @if(isset($request)) @if($request->category == 'Implements') selected @endif @endif> Implements</option>
					<option  value="Specialty tools" @if(isset($request)) @if($request->category == 'Specialty tools') selected @endif @endif> Specialty tools</option>
					<option  value="Welders" @if(isset($request)) @if($request->category == 'Welders') selected @endif @endif> Welders </option>
					<option  value="Welding equipment" @if(isset($request)) @if($request->category == 'Welding equipment') selected @endif @endif>Welding equipment</option>
					<option  value="Miscellaneous equipment" @if(isset($request)) @if($request->category == 'Miscellaneous equipment') selected @endif @endif>Miscellaneous equipment</option>
					<option value="Miscellaneous tools" @if(isset($request)) @if($request->category == 'Miscellaneous tools') selected @endif @endif>Miscellaneous tools</option>
                                        </select>
                         
                    
          </div>
        <input type="hidden" name="postal_code" id="postal_code" value="@if(isset($request)){{$request->postal_code}}@endif">
		<input type="hidden" name="city" id="city" value="@if(isset($request)){{$request->city}}@endif">
		<input type="hidden" name="state_id" id="state_id" value="@if(isset($request)){{$request->state_id}}@endif">
		<input type="hidden" name="state" id="state" value="@if(isset($request)){{$request->state}}@endif">
		<input type="hidden" name="latitude" id="latitude" value="@if(isset($request)){{$request->latitude}}@endif">
		<input type="hidden" name="longitude" id="longitude" value="@if(isset($request)){{$request->longitude}}@endif">
		<!--<div class="col-md-2 m-mgn-btn">-->
		<!--	<select name="distance" id="distance" class="form-control">-->
		<!--		<option value="">Distance</option>-->
		<!--		<option value="25" @if(isset($request)) @if($request->distance == 25) selected @endif @endif>Within 25 Miles</option>-->
		<!--		<option value="50" @if(isset($request)) @if($request->distance == 50) selected @endif @endif>Within 50 Miles</option>-->
		<!--		<option value="75" @if(isset($request)) @if($request->distance == 75) selected @endif @endif>Within 75 Miles</option>-->
		<!--		<option value="100" @if(isset($request)) @if($request->distance == 100 || ($request->location && !$request->distance)) selected @endif @endif>Within 100 Miles</option>-->
		<!--		<option value="150" @if(isset($request)) @if($request->distance == 150) selected @endif @endif>Within 150 Miles</option>-->
		<!--		<option value="200" @if(isset($request)) @if($request->distance == 200) selected @endif @endif>Within 200 Miles</option>-->
		<!--		<option value="250" @if(isset($request)) @if($request->distance == 250) selected @endif @endif>Within 250 Miles</option>-->
		<!--	</select>-->
		<!--</div>-->
		<!--	<div class="col-md-2 m-mgn-btn">-->
		<!--		<select name="sort_by" id="sort-by" class="form-control">-->
		<!--			<option value="default">Sort By</option>-->
		<!--			<option value="acres_high" @if(isset($request)) @if($request->sort_by == 'acres_high') selected @endif @endif>Acres High</option>-->
		<!--			<option value="acres_low" @if(isset($request)) @if($request->sort_by == 'acres_low') selected @endif @endif>Acres Low</option>-->
		<!--			<option value="price_high" @if(isset($request)) @if($request->sort_by == 'price_high') selected @endif @endif>Price High</option>-->
		<!--			<option value="price_low" @if(isset($request)) @if($request->sort_by == 'price_low') selected @endif @endif>Price Low</option>-->
		<!--			<option value="newest" @if(isset($request)) @if($request->sort_by == 'newest') selected @endif @endif>Newest</option>-->
		<!--			<option value="oldest" @if(isset($request)) @if($request->sort_by == 'oldest') selected @endif @endif>Oldest</option>-->
		<!--		</select>-->
		<!--	</div>-->
			<div class="col-md-2 m-mgn-btn">
				<button class="btn btn-primary" type="submit">Search</button>
				<a href="/equipment-for-sale" class="btn btn-primary btn-red">Clear</a>
			</div>
			
		</div>
	</form>
</div>
