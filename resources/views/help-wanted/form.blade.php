<div class="row form-row">
    <div class="col-12 required-key">
	    <label class="required-label">* - Required</label>
	</div>
    <input type="hidden" name="postal_code" id="postal_code" value="@if(isset($request)){{$request->postal_code}}@endif">
	<input type="hidden" name="city" id="city" value="@if(isset($request)){{$request->city}}@endif">
	<input type="hidden" name="state_id" id="state_id" value="@if(isset($request)){{$request->state_id}}@endif">
	<input type="hidden" name="state" id="state" value="@if(isset($request)){{$request->state}}@endif">
	<input type="hidden" name="latitude" id="latitude" value="@if(isset($request)){{$request->latitude}}@endif">
	<input type="hidden" name="longitude" id="longitude" value="@if(isset($request)){{$request->longitude}}@endif">
	<div class="col-12">
		<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
			<label for="title" class="required">Help Wanted Ad Name </label>
			<div class="">
				<input class="form-control" name="title" type="text" id="title" value="{{ old('title', optional($help)->title) }}" maxlength="200" placeholder="{{ trans('helps.title__placeholder') }}" required>
				{!! $errors->first('title', '<p class="help-block">:message</p>') !!}
			</div>
		</div>
	</div>
	<div class="col-12">

		<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
			<label for="description" class="required">Help Wanted Ad Description </label>
			<div class="">
				<textarea class="form-control" name="description" cols="50" rows="10" id="description" required>{{ old('description', optional($help)->description) }}</textarea>
				{!! $errors->first('description', '<p class="help-block">:message</p>') !!}
			</div>
		</div>
	</div>
	
	<div class="col-12">
		<div class="form-group">
			<label for="preferred-contact" class="required">Preferred Method of Contact</label>
			@php
			    $preferred_contacts = unserialize(old('preferred_contact', optional($help)->preferred_contact));
			    if($preferred_contacts !== false) {
    			    $phone = in_array('Phone',$preferred_contacts);
    			    $email = in_array('Email',$preferred_contacts);
    			    $message = in_array('Message',$preferred_contacts);
			    }
			    
			@endphp
			<div class="row">
			    <div class="col-md-12">
        			<input type="checkbox" class="contact-options" name="preferred_contact[]" value="Phone" {{ isset($phone) && $phone !== false ? 'checked' : '' }} required>
			        <label for="contact-phone">Phone</label>
        		</div>
        	</div>
        	<div class="row">
			    <div class="col-md-12">
        			<input type="checkbox" class="contact-options" name="preferred_contact[]" value="Email" {{ isset($email) && $email !== false ? 'checked' : '' }} required>
        			<label for="contact-email">Email</label>
        		</div>
        	</div>
        	<div class="row">
			    <div class="col-md-12">
        			<input type="checkbox" class="contact-options" name="preferred_contact[]" value="Message" {{ isset($message) && $message !== false ? 'checked' : '' }} required>
        			<label for="contact-message">Message</label>
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
			<input class="form-control" name="phone" type="tel" value="{{ old('phone', optional($help)->phone) }}">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="phone" class="required">Email</label>
			<input required class="form-control" name="email" type="email" value="{{ old('email', optional($help)->email) }}">
		</div>
	</div>
	
	<div class="col-md-6">
		<div class="form-group">
			<label for="date_job_start" class="required">Job Start Date </label>
			<div class="">
				<input class="form-control" name="date_job_start" type="date" id="date_job_start" value="{{ old('date_job_start', optional($help)->date_job_start) }}" required>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group {{ $errors->has('date_need_resume') ? 'has-error' : '' }}">
			<label for="date_need_resume" class="mb-20 required">Need Resumes By What Date?</label>
			<div class="">
				<input class="form-control" name="date_need_resume" type="date" id="date_need_resume" value="{{ old('date_need_resume', optional($help)->date_need_resume) }}" placeholder="Need Resume By" required>
				{!! $errors->first('date_need_resume', '<p class="help-block">:message</p>') !!}
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group {{ $errors->has('level_of_experience') ? 'has-error' : '' }}">
			<label for="level_of_experience" class="mb-20 required required">What Level of Experience</label>
			<div class="">
				<select class="form-control" id="level_of_experience" name="level_of_experience" required>
					<option value="">Experience</option>
					<option {{ isset($help->level_of_experience) && $help->level_of_experience == 'Willing To Train' ? 'selected' : '' }} value="Willing To Train">Willing To Train</option>
					<option {{ isset($help->level_of_experience) && $help->level_of_experience == '1-2 years' ? 'selected' : '' }} value="1-2 years">1-2 years</option>
					<option {{ isset($help->level_of_experience) && $help->level_of_experience == '3-5 years' ? 'selected' : '' }} value="3-5 years">3-5 years</option>
					<option {{ isset($help->level_of_experience) && $help->level_of_experience == '6-10 years' ? 'selected' : '' }} value="6-10 years"> 6-10 years</option>
					<option {{ isset($help->level_of_experience) && $help->level_of_experience == '10+ years' ? 'selected' : '' }} value="10+ years"> 10+ years</option>
				</select>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group {{ $errors->has('trade') ? 'has-error' : '' }}">
			<label for="trade" class="required">Trade</label>
			<div class="">
				<select name="trade[]" id="trade" class="form-control" multiple>
					@php 
                 $trades = DB::table('categories_helps')->get();
                 if($help != null) {
                 if(!isset($help->trade)){ 
                 $trades_arr = explode(',', $trades->trade);
                 } else {
                 $trades_arr = explode(',', $help->trade);
                 }
                 } else {
                    $trades_arr = array();
                    }
                 @endphp
					@foreach($trades as $trade)
					<option value="{{$trade->title}}" @if(in_array($trade->title, $trades_arr)) selected @endif>{{$trade->title}}</option>
					@endforeach
				</select>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="location" class="required">Post in Location</label>
			<input class="form-control" name="location" type="text" id="location" value="{{ old('location', optional($help)->location) }}" maxlength="255" placeholder="Enter Location">
		</div>
	</div>
    <div class="col-12">
		<div class="form-group {{ $errors->has('files') ? 'has-error' : '' }}">
			<label for="files" style="margin-bottom:15px;">Additional Files:</label>
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
										    
										    @php
										    if($file->file_type == 'pdf'){
										        $src = '/public/storage/company/images/PDF-icon-small-231x300.png';
										    } else {
										        $src = $file->file_path;
										    }
										    @endphp
										    <div style="width:100%;padding:10px;"><img width="100%" src="{{$src}}"></div>
										    
											<div style="width:100%;padding:10px;">{{$file->file_name}}</div>
											<div style="text-align: center;width: 100%;margin-top: 10px;"><a style="color:#fff;" data-id="{{$file->id}}" class="btn btn-red delete-file" href="">Remove</a></div>
										
										</div>
									</div>
								@endforeach
</div>













