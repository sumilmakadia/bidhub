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
		<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
			<label for="title" class="required">Project Name</label>
			<input class="form-control" name="title" type="text" id="title" value="{{ old('title', optional($project)->title) }}" maxlength="255" placeholder="Project Name " required>
			{!! $errors->first('title', '<p class="help-block">:message</p>') !!}
		</div>
	</div>
	<div class="col-12">
		<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
			<label for="description" class="required">Description</label>
			<textarea class="form-control" name="description" cols="50" rows="10" id="description" required>{{ old('description', optional($project)->description) }}</textarea>
			{!! $errors->first('description', '<p class="help-block">:message</p>') !!}
		</div>
	</div>
	<div class="col-12">
		<div class="form-group">
			<label for="preferred-contact" class="required">Preferred Method of Contact</label>
			@php
			    $preferred_contacts = unserialize(old('preferred_contact', optional($project)->preferred_contact));
			    if($preferred_contacts !== false && $preferred_contacts !== null) {
    			    $phone = in_array('Phone',$preferred_contacts);
    			    $email = in_array('Email',$preferred_contacts);
    			    $message = in_array('Message',$preferred_contacts);
			    }
			    
			@endphp
			<div class="row">
			    <div class="col-md-12">
			        <label for="contact-phone">Phone</label>
        			<input type="checkbox" class="contact-options" name="preferred_contact[]" value="Phone" {{ isset($phone) && $phone !== false ? 'checked' : '' }}>
        		</div>
        	</div>
        	<div class="row">
			    <div class="col-md-12">
        			<label for="contact-email" class="">Email</label>
        			<input type="checkbox" class="contact-options" name="preferred_contact[]" value="Email" {{ isset($email) && $email !== false ? 'checked' : '' }}>
        		</div>
        	</div>
        	<div class="row">
			    <div class="col-md-12">
        			<label for="contact-message">Message</label>
        			<input type="checkbox" class="contact-options" name="preferred_contact[]" value="Message" {{ isset($message) && $message !== false ? 'checked' : '' }}>
        		</div>
        	</div>
        	<div class="row">
			    <div class="col-md-12">
        			<span class="alert" style="display:none; float:left; color:red; padding-left:0!important; padding-bottom:0!important; margin-bottom:0!important;">You must select at least one preference.</span>
        		</div>
        	</div>
		</div>
	</div>
    <div class="col-md-6">
		<div class="form-group">
			<label for="phone" class="">Phone Number</label>
			<input class="form-control" name="phone" type="tel" value="{{ old('phone', optional($project)->phone) }}">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
			<label for="phone" class="required">Email</label>
			<input required class="form-control" name="email" type="email" value="{{ old('email', optional($project)->email) }}">
			{!! $errors->first('email', '<p class="help-block">:message</p>') !!}
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group {{ $errors->has('starts_on') ? 'has-error' : '' }}">
			<label for="starts_on" class="required">Project Start Date</label>
			<input class="form-control" name="starts_on" type="date" value="{{ old('starts_on', optional($project)->starts_on) }}" required>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group {{ $errors->has('need_bid_by_date') ? 'has-error' : '' }}">
			<label for="need_bid_by_date" class="required">Need Bid By Date</label>
			<input class="form-control" name="need_bid_by_date" type="date" value="{{ old('need_bid_by_date', optional($project)->need_bid_by_date) }}" id="need_bid_by_date" required>
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<label for="job_type" class="required">Job Type</label>
			@php 
			    if($project != null) {
			     if(!isset($project->job_type)){   
    			     $projects = DB::table('projects')->get();
                     $job_type_arr = explode(',', $projects->job_type);
                  } else {
                  $job_type_arr = explode(',', $project->job_type);
                  }
                
                 } else {
                 $job_type_arr = array();
                 }
            @endphp
			<select name="job_type[]" class="form-control" id="job-types"  multiple data-placeholder="Job Type">
				<option value="Addition" @if(in_array('Addition', $job_type_arr)) selected @endif>Addition</option>
				<option value="Multifamily" @if(in_array('Multifamily', $job_type_arr)) selected @endif>Multifamily</option>
				<option value="Remodel/Gut" @if(in_array('Remodel/Gut', $job_type_arr)) selected @endif>Remodel/Gut</option>
				<option value="Retrofit" @if(in_array('Retrofit', $job_type_arr)) selected @endif>Retrofit</option>
				<option value="Single Family" @if(in_array('Addition', $job_type_arr)) selected @endif>Single Family</option>
				<option value="Townhouse" @if(in_array('Townhouse', $job_type_arr)) selected @endif>Townhouse</option>
				<option value="Commercial" @if(in_array('Commercial', $job_type_arr)) selected @endif>Commercial</option>
			</select>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group {{ $errors->has('how_many_units') ? 'has-error' : '' }}">
			<label for="how_many_units" class="">{{ trans('projects.how_many_units') }}</label>
			<input class="form-control" name="how_many_units" type="number" id="how_many_units" value="{{ old('how_many_units', optional($project)->how_many_units) }}" placeholder="{{ trans('projects.how_many_units__placeholder') }}">
			{!! $errors->first('how_many_units', '<p class="help-block">:message</p>') !!}
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group {{ $errors->has('trades') ? 'has-error' : '' }}">
			<label for="trades" class="required">Trades</label>
			<select class="form-control" name="trade[]" id="trade" multiple data-placeholder="Trades">
			    
                 @php 
                 $trades = DB::table('categories_projects')->orderBy('title', 'ASC')->get();
                 if($project != null) {
                 if(!isset($project->job_type)){ 
                 $trades_arr = explode(',', $trades->trade);
                 } else {
                 $trades_arr = explode(',', $project->trade);
                 }
                 } else {
                    $trades_arr = array();
                    }
                 @endphp
                 <option value="All" @if(in_array('All', $trades_arr)) selected @endif>All Trades</option>
                 @foreach($trades as $trade)
                    <option value="{{$trade->title}}" @if(in_array($trade->title, $trades_arr)) selected @endif>{{$trade->title}}</option>
                 @endforeach
            </select>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="location" class="col-md-12 required">Location</label>
			<input class="form-control" name="location" type="text" id="location" value="{{ old('location', optional($project)->location) }}" maxlength="255" placeholder="Enter Location">
		</div>
	</div>
	
	<div class="col-12">
		<div class="form-group {{ $errors->has('files') ? 'has-error' : '' }}">
			<label for="files" style="margin-bottom:15px;">Add Project Files:</label><br>
			<label style="color:red;">If your plans are organized by folders or larger than 25 MB, please attach as a .zip file.</label>
			<input id="project-files" type="file" name="files[]" id="project_files" class="form-control" multiple>
			{!! $errors->first('files', '<p class="help-block">:message</p>') !!}
		</div>
	</div>
	                    @if(!empty($files) && $files != '[]' && $files && isset($files))
	                        <div class="col-12">
	                        <label class="">Remove Project Files:</label>
	                        </div>
	                     @endif
	                     
								@foreach ($files as $file)
									<div id="{{$file->id}}" class="col-lg-2 col-md-4 col-sm-4 m-t-20" style="margin-top:10px;">
										<div class="row">
										    <div style="width:100%;padding:10px;"><img width="100%" src="{{$file->type ? $file->type->link : $file->file_path}}"></div>
										    
											<div style="width:100%;padding:10px;">{{$file->file_name}}</div>
											<div style="text-align: center;width: 100%;margin-top: 10px;"><a style="color:#fff;" data-id="{{$file->id}}" class="btn btn-red delete-file" href="">Remove</a></div>
										
										</div>
									</div>
								@endforeach
</div>