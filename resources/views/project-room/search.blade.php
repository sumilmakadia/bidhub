<div class="card search-row">
	<form method="post" id="location-search" action="{{route('projects.project.search')}}">
		{{csrf_field()}}
		<div class="row">
			
			<div class="col-md-3 m-mgn-btn">
				<input type="text" name="title" class="form-control" @if(isset($request)) value="{{$request->title}}" @endif placeholder="Company name">
			</div>
			<div class="col-md-2 m-mgn-btn" id="trade-input">
			                      @php
			                      $trade = '';
                                  if (!is_array($trade) && !empty($trade)) {
							           $request->trade = explode("|",$trade);
							      }
                                  @endphp
				<select name="trade[]" id="trade" class="form-control" onchange="progress()" multiple data-placeholder="Trades">
				    <option value="All" @if(isset($request)) @if(is_array ($request->trade)) @if(in_array('All', $request->trade)) selected @endif @endif @endif>All Trades</option>
					@php 
                        $trades = DB::table('categories_projects')->orderBy('title', 'ASC')->get(); 
                        $trades_arr = explode(',', $trades);
                        @endphp
                        @foreach($trades as $trade)
                        <option value="{{$trade->title}}" @if(isset($request)) @if(is_array ($request->trade)) @if(in_array($trade->title, $request->trade)) selected @endif @endif @endif>{{$trade->title}}</option>
                        @endforeach
				</select>
			</div>
			<div class="col-md-2 m-mgn-btn" id="type-input">
			     @php 
			        $type = '';
                    if (!is_array($type) && !empty($type)) {
						    $request->type = explode("|",$type);
						}
                 @endphp
				<select name="type[]" id="type" class="form-control" onchange="progress()" multiple data-placeholder="Job Type">
					<option value="Addition" @if(isset($request)) @if(is_array ($request->type)) @if(in_array('Addition', $request->type)) selected @endif @endif @endif>Addition</option>
					<option value="Commercial" @if(isset($request)) @if(is_array ($request->type)) @if(in_array('Commercial', $request->type)) selected @endif @endif @endif>Commercial</option>
					<option value="Multifamily" @if(isset($request)) @if(is_array ($request->type)) @if(in_array('Multifamily', $request->type)) selected @endif @endif @endif>Multifamily</option>
					<option value="Remodel/Gut" @if(isset($request)) @if(is_array ($request->type)) @if(in_array('Remodel/Gut', $request->type)) selected @endif @endif @endif>Remodel/Gut</option>
					<option value="Retrofit" @if(isset($request)) @if(is_array ($request->type)) @if(in_array('Retrofit', $request->type)) selected @endif @endif @endif>Retrofit</option>
					<option value="Single Family" @if(isset($request)) @if(is_array ($request->type)) @if(in_array('Single Family', $request->type)) selected @endif @endif @endif>Single Family</option>
					<option value="Townhouse" @if(isset($request)) @if(is_array ($request->type)) @if(in_array('Townhouse', $request->type)) selected @endif @endif @endif>Townhouse</option>
				</select>
			</div>
			<div class="col m-mgn-btn">
			    <!--<button type="button" class="current-location-search"><i class="fas fa-location-arrow"></i></button>-->
				<input id="location" name="location" type="text" @if(isset($request)) value="{{$request->location}}" @endif class="form-control" placeholder="Enter Location">
				<input type="hidden" name="postal_code" id="postal_code" value="@if(isset($request)){{$request->postal_code}}@endif">
        		<input type="hidden" name="city" id="city" value="@if(isset($request)){{$request->city}}@endif">
        		<input type="hidden" name="state_id" id="state_id" value="@if(isset($request)){{$request->state_id}}@endif">
        		<input type="hidden" name="state" id="state" value="@if(isset($request)){{$request->state}}@endif">
        		<input type="hidden" name="latitude" id="latitude" value="@if(isset($request)){{$request->latitude}}@endif">
        		<input type="hidden" name="longitude" id="longitude" value="@if(isset($request)){{$request->longitude}}@endif">
			</div>
			<div class="col-md-2">
				<select name="distance" id="distance" class="form-control">
					<option value="">Distance</option>
    				<option value="25" @if(isset($request)) @if($request->distance == 25) selected @endif @endif>Within 25 Miles</option>
    				<option value="50" @if(isset($request)) @if($request->distance == 50) selected @endif @endif>Within 50 Miles</option>
    				<option value="75" @if(isset($request)) @if($request->distance == 75) selected @endif @endif>Within 75 Miles</option>
    				<option value="100" @if(isset($request)) @if($request->distance == 100 || ($request->location && !$request->distance)) selected @endif @endif>Within 100 Miles</option>
    				<option value="150" @if(isset($request)) @if($request->distance == 150) selected @endif @endif>Within 150 Miles</option>
    				<option value="200" @if(isset($request)) @if($request->distance == 200) selected @endif @endif>Within 200 Miles</option>
    				<option value="250" @if(isset($request)) @if($request->distance == 250) selected @endif @endif>Within 250 Miles</option>
				</select>
			</div>
{{--			<div class="col">--}}
{{--				<select name="trades[]" id="trades" class="form-control">--}}
{{--					<option value="">Sort By</option>--}}
{{--				</select>--}}
{{--			</div>--}}
        </div>
        <div class="row sort-row" style="margin-top: 20px;">
            <div class="col-md-3 m-mgn-btn" style="padding: 5px 10px;">
                <select name="sort_by" id="sort_by" class="form-control">
                    <option value="">Sort By</option>
					<option value="ASC" @if(isset($request)) @if($request->sort_by == 'ASC') selected @endif @endif>Most Recent</option>
					<option value="DESC" @if(isset($request)) @if($request->sort_by == 'DESC') selected @endif @endif>Furthest Bid Due Date</option>
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
				<a href="{{route('projects.project.map')}}" style="width:100%;" class="btn btn-primary btn-green">Map View</a>
			</div>
		</div>
	</form>
</div>
