<div class="card search-row">
	<form id="location-search" action="{{route('help-wanted.help.search')}}" method="post">
		{{csrf_field()}}
	<div class="row">
		<div class="col-md-3 m-mgn-btn">
			<input type="text" name="title" class="form-control" @if(isset($request)) value="{{$request->title}}" @endif placeholder="Search">
		</div>
		<div class="col-md-3 m-mgn-btn" id="trade-input">
                                  @php
                                  $trade ='';
                                  if (!is_array($trade) && !empty($trade)) {
							           $request->trade = explode("|",$trade);
							      }
                                  @endphp
                                        <select class="form-control" name="trade[]" id="trade" multiple data-placeholder="Trade">
                                                  @php 
                                                  $trades = DB::table('categories_helps')->orderBy('title', 'ASC')->get(); 
                                                  @endphp
                                                  @foreach($trades as $trade)
                                                        <option value="{{$trade->title}}" @if(isset($request)) @if(is_array ($request->trade)) @if(in_array($trade->title, $request->trade)) selected @endif @endif @endif>{{$trade->title}}</option>
                                                  @endforeach
                                        </select>
                              </div>
		<div class="col-md-2 m-mgn-btn">
			<input id="location" name="location" type="text" @if(isset($request)) value="{{$request->location}}" @endif class="form-control" placeholder="Location">
		</div>
		<input type="hidden" name="postal_code" id="postal_code" value="@if(isset($request)){{$request->postal_code}}@endif">
		<input type="hidden" name="city" id="city" value="@if(isset($request)){{$request->city}}@endif">
		<input type="hidden" name="state_id" id="state_id" value="@if(isset($request)){{$request->state_id}}@endif">
		<input type="hidden" name="state" id="state" value="@if(isset($request)){{$request->state}}@endif">
		<input type="hidden" name="latitude" id="latitude" value="@if(isset($request)){{$request->latitude}}@endif">
		<input type="hidden" name="longitude" id="longitude" value="@if(isset($request)){{$request->longitude}}@endif">
		<div class="col-md-2 m-mgn-btn">
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
{{--		<div class="col-md-2 m-mgn-btn">--}}
{{--			<select name="trades[]" id="trades" class="form-control">--}}
{{--				<option value="">Sort By</option>--}}
{{--			</select>--}}
{{--		</div>--}}
		<div class="col-md-2">
			<button class="btn btn-primary">Search</button>
			<a href="/help-wanted" class="btn btn-primary btn-red">Clear</a>
		</div>
	</div>
	</form>
</div>
