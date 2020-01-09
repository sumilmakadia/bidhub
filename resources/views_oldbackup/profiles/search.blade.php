<div class="card search-row">
	<form method="post" action="{{route('profiles.profile.search')}}">{{csrf_field()}}
		<div class="row">
			<div class="col">
				<input type="text" name="name" class="form-control" @if(isset($request)) value="{{$request->name}}" @endif placeholder="Search">
			</div>
			<div class="col">
				<select name="trades[]" id="trades" class="form-control">
					<option value="">Trade</option>
				</select>
			</div>

			<div class="col">
				<input id="location" name="location" type="text" @if(isset($request)) value="{{$request->location}}" @endif class="form-control" placeholder="Enter Location">
			</div>
			<div class="col">
				<select name="trades[]" id="trades" class="form-control">
					<option value="">Distance</option>
					<option value="25">Within 25 Miles</option>
					<option value="50">Within 50 Miles</option>
					<option value="75">Within 75 Miles</option>
					<option value="100">Within 100 Miles</option>
				</select>
			</div>
{{--			<div class="col">--}}
{{--				<select name="trades[]" id="trades" class="form-control">--}}
{{--					<option value="">Sort By</option>--}}
{{--				</select>--}}
{{--			</div>--}}
			<div class="col">
				<button class="btn btn-primary">Search</button>
			</div>
		</div>
	</form>
</div>
