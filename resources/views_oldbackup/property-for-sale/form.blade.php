 <style>
.fileuploader-theme-thumbnails .fileuploader-items .fileuploader-items-list {
    margin: -30px 0 0 0px!important;
}
.fileuploader-theme-thumbnails .fileuploader-thumbnails-input, .fileuploader-theme-thumbnails .fileuploader-items-list .fileuploader-item {
    width: 250px!important;
    height: 250px!important;
    margin-left: 0!important;
        margin-right: 20px!important;
}
.fileuploader-theme-thumbnails .fileuploader-thumbnails-input-inner{
        cursor: pointer!important;
}
#portfolio-wrap {
    width:250px;
}
</style>

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
        <div class="form-group {{ $errors->has('property_title') ? 'has-error' : '' }}">
            <label for="property_title" class="required">Property for Sale Title</label>
            <div class="">
                <input class="form-control" name="property_title" type="text" id="property_title" value="{{ old('property_title', optional($property)->property_title) }}" maxlength="100" placeholder="{{ trans('properties.property_title__placeholder') }}" required>
                {!! $errors->first('property_title', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group {{ $errors->has('property_description') ? 'has-error' : '' }}">
            <label for="property_description" class="required">Description</label>
            <div class="">
                <textarea class="form-control" name="property_description" cols="50" rows="10" id="property_description" placeholder="Description" required>{{ old('property_description', optional($property)->property_description) }}</textarea>
                {!! $errors->first('property_description', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    
    <div class="col-12">
		<div class="form-group">
			<label for="preferred-contact" class="required">Preferred Method of Contact</label>
			@php
			    $preferred_contacts = unserialize(old('preferred_contact', optional($property)->preferred_contact));
			    if($preferred_contacts !== false) {
    			    $phone = in_array('Phone',$preferred_contacts);
    			    $email = in_array('Email',$preferred_contacts);
			    }
			    
			@endphp
			<div class="row">
			    <div class="col-md-12">
        			<input type="checkbox" class="contact-options" name="preferred_contact[]" value="Phone" {{ isset($phone) && $phone !== false ? 'checked' : '' }}>
			        <label for="contact-phone">Phone</label>
        		</div>
        	</div>
        	<div class="row">
			    <div class="col-md-12">
        			<input type="checkbox" class="contact-options" name="preferred_contact[]" value="Email" {{ isset($email) && $email !== false ? 'checked' : '' }}>
        			<label for="contact-email">Email</label>
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
			<input class="form-control" name="phone" type="tel" value="{{ old('phone', optional($property)->phone) }}">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="phone" class="required">Email</label>
			<input require class="form-control required" name="email" type="email" value="{{ old('email', optional($property)->email) }}">
		</div>
	</div>
    
</div>
<div class="row">
<div class="col-12">
    <h4>More information about your Property for Sale Ad</h4>
</div>

    <div class="col-md-6">
        <div class="form-group {{ $errors->has('property_cost') ? 'has-error' : '' }}">
            <label for="property_cost" class="required">What is your listing price? </label>
            <div class="">
                <input class="form-control" name="property_cost" type="number" min="0" step="any" id="property_cost" value="{{ old('property_cost', optional($property)->property_cost) }}" placeholder=" What is your listing price? " required>
                {!! $errors->first('property_cost', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group {{ $errors->has('property_acres') ? 'has-error' : '' }}">
            <label for="property_acres" class="required"> How many acres of Property?</label>
            <div class="">
                <input class="form-control" name="property_acres" type="number" min="0" step="any" id="property_acres" value="{{ old('property_acres', optional($property)->property_acres) }}" maxlength="100" placeholder="How Many Acres" required>
                {!! $errors->first('property_acres', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group {{ $errors->has('parcel_tax_number') ? 'has-error' : '' }}">
            <label for="parcel_tax_number" class="required"> Parcel / Tax ID </label>
            <div class="">
                <input class="form-control" name="parcel_tax_number" type="text" id="parcel_tax_number" value="{{ old('parcel_tax_number', optional($property)->parcel_tax_number) }}" placeholder="Parcel / Tax ID" required>
                {!! $errors->first('parcel_tax_number', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('property_annual_taxes') ? 'has-error' : '' }}">
            <label for="property_annual_taxes" class="required"> Annual Tax </label>
            <div class="">
                <input class="form-control" name="property_annual_taxes" type="text" id="property_annual_taxes" value="{{ old('property_annual_taxes', optional($property)->property_annual_taxes) }}" placeholder="Annual Taxes" required>
                {!! $errors->first('property_annual_taxes', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="location" class="required">Post in Location</label>
            <div class="">
                <input class="form-control" name="location" type="text" id="location" value="{{ old('location', optional($property)->location) }}" maxlength="255" placeholder="Enter Location">
            </div>
        </div>
    </div>
    
    <div class="col-12" style="padding-left:0;">
                <div class="form-group">
                      <label for="file" class="col-12 required" style="display:inline-block;" >Featured Image:</label>
                      <div class="col-12" >
                            @php
                            $no_image = '';
                            $has_image = 'display:none;';
                            if(!isset($property->property_image)){
                                $no_image = 'display:none;';
                                $has_image = '';
                            }
                            @endphp
                            <div id="profile-upload" style="{{$has_image}}">    
                                <input class="form-control" name="file" type="file" value="" accept="image/*" required>
                            </div>
                            <div id="portfolio-wrap" style="{{$no_image}}">
                                <a id="hide-image" class="cfileuploader-action cfileuploader-action-remove" title="Remove"><i></i></a>
                                <img id="portfolio-image" src="@if(isset($property->property_image)){{$property->property_image}}@endif">
                            </div>    
                      </div>
                </div>
                    
          </div>
          
                @php
                $max_photos = 0;
                if(Auth::user()->property == 2) {$max_photos = 10;}
                if(Auth::user()->property == 3) {$max_photos = 25;}
                if(Auth::user()->property == 4) {$max_photos = 50;}
                @endphp
                @if (count($galeries) < $max_photos || Auth::user()->role_id == 8 | Auth::user()->role_id == 1)
                <div class="col-12">
                		<div class="form-group {{ $errors->has('galeries') ? 'has-error' : '' }}">
                			<label for="galeries" style="margin-bottom:15px;">Gallery Images: (Max 100 uploads per form submit)</label>
                			<input id="galeries-files" type="file" name="galeries[]" id="project_files" class="form-control"  accept="image/*" multiple>
                			{!! $errors->first('galeries', '<p class="help-block">:message</p>') !!}
                		</div>
                </div>
                @else
                <div class="col-md-12" style="margin-bottom:20px;">
                    <div class="d-flex align-items-center">
                        <a href="/pricing" class="btn btn-info m-l-15" title="{{ trans('properties.create') }}" style="margin-left:0;">
                            <i class="fa fa-plus-circle"></i>Upgrade Your Account to List More Gallery Images
                        </a></div>
                </div>
                @endif
                
                
	                    @if(!empty($galeries) && $galeries != '[]' && $galeries && isset($galeries))
	                        <div class="col-12">
	                        <label class="">Remove Gallery Images:</label>
	                        </div>
	                     @endif
	                     <div clas="row">
								@foreach ($galeries as $file)
									<div id="{{$file->id}}" class="col-lg-2 col-md-4 col-sm-4 m-t-20" style="margin-top:10px;float: left;">
										<div class="row">
										    
										    @php
										    if($file->file_type == 'pdf'){
										        $src = '/public/storage/company/images/PDF-icon-small-231x300.png';
										    } else {
										        $src = $file->file_path;
										    }
										    @endphp
										    <div style="width:100%;padding:10px;"><img width="100%" src="{{$src}}"></div>
										    
											
											<div style="text-align: center;width: 100%;margin-top: 10px;"><a style="color:#fff;" data-id="{{$file->id}}" class="btn btn-red delete-galery" href="">Remove</a></div>
										
										</div>
									</div>
								@endforeach 
								</div>
    
    <div class="col-12" style="margin-top: 30px;">
		<div class="form-group {{ $errors->has('files') ? 'has-error' : '' }}">
			<label for="files" style="margin-bottom:15px;">Add Project Files (50 Per Submission):</label>
			<input id="project-files" type="file" name="files[]" id="project_files" class="form-control" accept="image/*,application/pdf" multiple>
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

