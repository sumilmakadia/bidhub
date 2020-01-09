<div class="card search-row">
	<form id="location-search" action="{{route('directory.directories.search')}}" method="post">
	{{csrf_field()}}
	<div class="row">
		<div class="col-md-2 pad-5 m-mgn-btn">
			<input type="text" name="company_name" class="form-control" @if(isset($request)) value="{{$request->company_name}}" @endif placeholder="Search">
		</div>
		<div class="col-md-3 pad-5 mrg-btm-7">
                    
                              <label for="trade" class="col-12 control-label">{{ trans('profiles.trade') }}</label>
                              <div class="" id="trade-input">
                                  @php 
                                  if (!is_array($trade) && !empty($trade)) {
							           $request->trade = explode("|",$trade);
							      }
                                  @endphp
                                        <select class="form-control" name="trade[]" id="trade" multiple data-placeholder="Trade">
                                                  @php 
                                                  $trades = DB::table('categories_directories')->orderBy('title', 'ASC')->get(); 
                                                  @endphp
                                                  @foreach($trades as $trade)
                                                        <option value="{{$trade->title}}" @if(isset($request)) @if(is_array ($request->trade)) @if(in_array($trade->title, $request->trade)) selected @endif @endif @endif>{{$trade->title}}</option>
                                                  @endforeach
                                        </select>
                              </div>
                    
          </div>
        <div id="account-input" class="col-md-2 pad-5 m-mgn-btn">
                                  @php 
                                  if (!is_array($type) && !empty($type)) {
							           $request->account_type = explode("|",$type);
							      }
                                  @endphp
			<select name="account_type[]" id="type" data-placeholder="Account Type" multiple class="chosen-select">
				<option value="Subcontractor" @if(isset($request)) @if(is_array ($request->account_type)) @if(in_array('Subcontractor', $request->account_type)) selected @endif @endif @endif>Subcontractor</option>
				<option value="General Contractor" @if(isset($request)) @if(is_array ($request->account_type)) @if(in_array('General Contractor', $request->account_type)) selected @endif @endif @endif>General Contractor</option>
				<option value="Homeowner" @if(isset($request)) @if(is_array ($request->account_type)) @if(in_array('Homeowner', $request->account_type)) selected @endif @endif @endif>Homeowner</option>
				<option value="Advertiser" @if(isset($request)) @if(is_array ($request->account_type)) @if(in_array('Advertiser', $request->account_type)) selected @endif @endif @endif>Advertiser</option>
			</select>
		</div>  
		<div class="col-md-2 pad-5 m-mgn-btn">
			<input id="location" name="location" type="text" @if(isset($request)) value="{{$request->location}}" @endif class="form-control" placeholder="Enter Location">
		</div>
		<input type="hidden" name="postal_code" id="postal_code" value="@if(isset($request)){{$request->postal_code}}@endif">
		<input type="hidden" name="city" id="city" value="@if(isset($request)){{$request->city}}@endif">
		<input type="hidden" name="state_id" id="state_id" value="@if(isset($request)){{$request->state_id}}@endif">
		<input type="hidden" name="state" id="state" value="@if(isset($request)){{$request->state}}@endif">
		<input type="hidden" name="latitude" id="latitude" value="@if(isset($request)){{$request->latitude}}@endif">
		<input type="hidden" name="longitude" id="longitude" value="@if(isset($request)){{$request->longitude}}@endif">
		<div class="col pad-5">
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
{{--		<div class="col">--}}
{{--			<select name="sort_by" id="trades" class="form-control">--}}
{{--				<option value="">Sort By</option>--}}
{{--			</select>--}}
{{--		</div>--}}

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
