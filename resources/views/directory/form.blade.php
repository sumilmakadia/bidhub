<div class="row form-row">
    <input type="hidden" name="postal_code" id="postal_code" value="@if(isset($request)){{$request->postal_code}}@endif">
	<input type="hidden" name="city" id="city" value="@if(isset($request)){{$request->city}}@endif">
	<input type="hidden" name="state_id" id="state_id" value="@if(isset($request)){{$request->state_id}}@endif">
	<input type="hidden" name="state" id="state" value="@if(isset($request)){{$request->state}}@endif">
	<input type="hidden" name="latitude" id="latitude" value="@if(isset($request)){{$request->latitude}}@endif">
	<input type="hidden" name="longitude" id="longitude" value="@if(isset($request)){{$request->longitude}}@endif">
    <div class="col-12 required-key">
	    <label class="required-label">* - Required</label>
	</div>
	<div class="col-12">
		<div class="form-group {{ $errors->has('company_name') ? 'has-error' : '' }}">
		    <label for="company_name" class="required" aria-required="true">Company Name</label>
			<input required class="form-control no_label" name="company_name" type="text" id="company_name" value="{{ old('company_name', optional($directories)->businessName) }}" maxlength="255" placeholder="Company Name">
			{!! $errors->first('company_name', '<p class="help-block">:message</p>') !!}
		</div>
	</div>

	<!--<div class="col-12">-->
	<!--	<div class="form-group {{ $errors->has('company_description') ? 'has-error' : '' }}">-->
	<!--		<label for="company_description" class="control-label">Description</label>-->
	<!--		<div class="">-->
	<!--			<textarea class="form-control no_label" name="company_description" cols="50" rows="10" id="company_description" placeholder="Description">{{ old('company_description', optional($directories)->company_description) }}</textarea>-->
	<!--			{!! $errors->first('company_description', '<p class="help-block">:message</p>') !!}-->
	<!--		</div>-->
	<!--	</div>-->
	<!--</div>-->
	<div class="col-6">
		<div class="form-group {{ $errors->has('company_contact') ? 'has-error' : '' }}">
			<label for="contact_name" class="required" aria-required="true">Contact Name</label>
			<input required class="form-control no_label" name="company_contact" type="text" id="company_contact" value="{{ old('company_contact', optional($directories)->contactName) }}" maxlength="255" placeholder="Contact Name">
			{!! $errors->first('company_contact', '<p class="help-block">:message</p>') !!}
		</div>
	</div>

	<div class="col-6">
		<div class="form-group {{ $errors->has('company_phone') ? 'has-error' : '' }}">
			<label for="company_phone" class="" aria-required="true">Contact Phone</label>
			<input class="form-control no_label" name="company_phone" type="text" id="company_phone" value="{{ old('company_phone', optional($directories)->phoneNumber) }}" maxlength="255" placeholder="Contact Number">
			{!! $errors->first('company_phone', '<p class="help-block">:message</p>') !!}
		</div>
	</div>




	<div class="col-6">
		<div class="form-group {{ $errors->has('company_email') ? 'has-error' : '' }}">
			<label for="company_email" class="required" aria-required="true">Contact Email</label>
			<input required class="form-control" name="company_email" type="text" id="company_email" value="{{ old('company_email', optional($directories)->email) }}" maxlength="255" placeholder="Email Address">
			{!! $errors->first('company_email', '<p class="help-block">:message</p>') !!}
		</div>
	</div>
	<div class="col-6">
		<div class="form-group {{ $errors->has('company_website') ? 'has-error' : '' }}">
				<label for="company_website" class="" aria-required="true">Website</label>
			<input class="form-control" name="company_website" type="text" id="company_website" value="{{ old('company_website', optional($directories)->webSite) }}" maxlength="255" placeholder="Website">
			{!! $errors->first('company_website', '<p class="help-block">:message</p>') !!}
		</div>
	</div>
	<!--<div class="col-12">-->
	<!--	<div class="form-group {{ $errors->has('company_image') ? 'has-error' : '' }}">-->
	<!--		<label for="company_image" class="control-label">{{ trans('directories.company_image') }}</label>-->
	<!--		<div class="file-upload">-->
	<!--			Company Image <input type="file" name="company_image" id="company_image" class="hidden no_label">-->
	<!--		</div>-->
	<!--	</div>-->
	<!--</div>-->
	<div class="col-6">
	                <label for="trade" class="required" aria-required="true">Trades</label>
                    <div class="form-group {{ $errors->has('trade') ? 'has-error' : '' }}">
                              <label for="trade" class="col-12 control-label">{{ trans('$directories.trade') }}</label>
                              <div id="trade-input">
                                        <select class="form-control" name="trade[]" id="trade" multiple>
                                                  @php
                                                  if(isset($directories->category)) {
                                                  if(!is_array($directories->category) && isset($directories->category)) {
                                                  @endphp
                                                        <!--<option value="{{$directories->category}}" selected>{{$directories->category}}</option>-->
                                                  @php      
                                                    }
                                                    $trades_arr = explode(',', $directories->category);
                                                    } else {
                                                         $trades_arr = array();
                                                    }
                                                  
                                                  $trades = DB::table('categories_directories')->orderBy('title', 'ASC')->get(); 
                                                  
                                                  @endphp
                                                  @foreach($trades as $trade)
                                                        <option value="{{$trade->title}}" @if(in_array($trade->title, $trades_arr)) selected @endif>{{$trade->title}}</option>
                                                  @endforeach
                                           
                                        </select>
                              </div>
                    </div>
          </div>

	<div class="col-6">
		<div class="form-group">
			<label for="location" class="required" aria-required="true">Location</label>
		    @isset($upload->location)
			<input class="form-control" name="location" type="text" id="location" value="{{ old('location', optional($directories)->location) }}" maxlength="255" placeholder="Enter Location">
			@else
			<input class="form-control" name="location" type="text" id="location" value="@if(isset($directories)){{ $directories->street }}@isset($directories->street),@endisset {{ $directories->city }}@isset($directories->city),@endisset {{ $directories->state }}@isset($directories->state),@endisset {{ $directories->postal }}@endif" maxlength="255" placeholder="Enter Location">
            @endisset
		</div>
	</div>
</div>




