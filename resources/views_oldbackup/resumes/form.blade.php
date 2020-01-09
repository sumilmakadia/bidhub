<div class="row form-row">
    <div class="col-12 required-key">
	    <label class="required-label">* - Required</label>
	</div>
    <div class="col-12">
        <div class="form-group {{ $errors->has('job_title') ? 'has-error' : '' }}">
        <label for="job_title" class="required">Job Title</label>
            <input class="form-control" name="job_title" type="text" id="job_title" value="{{ old('job_title', optional($resume)->job_title) }}" maxlength="255" placeholder="Job Title" required>
            {!! $errors->first('job_title', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    
    <div class="col-12">
        <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
        <label for="message" class="required">Message</label>
            <textarea class="form-control" name="message" cols="50" rows="10" id="message" placeholder="Message" required>{{ old('message', optional($resume)->message) }}</textarea>
            {!! $errors->first('message', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    
    <div class="col-12">
    	<div class="form-group {{ $errors->has('files') ? 'has-error' : '' }}">
    		<label for="files" style="margin-bottom:15px;">Add Resumes:</label>
    		<input id="resume-files" type="file" name="files[]" class="form-control" multiple>
    		{!! $errors->first('files', '<p class="help-block">:message</p>') !!}
    	</div>
    </div>
    @if(!empty($files) && $files != '[]' && $files && isset($files))
        <div class="col-12">
        <label class="">Remove Project Files:</label>
        </div>
     @endif
     
    		@foreach ($files as $file)
    			<div id="{{$file->id}}" class="col-lg-2 col-md-4 col-sm-4 m-t-20" style="margin:20px 0 40px;float:left;padding-right:10px;">
    				<div class="">
    				    
    				    @php
    				    if($file->file_type == 'pdf'){
    				        $src = '/app/public/storage/company/images/PDF-icon-small-231x300.png';
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