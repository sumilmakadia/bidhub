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
<div clas="row">
<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
    <label for="title" class="col-md-2 control-label">{{ trans('portfolios.title') }}</label>
    <div class="col-md-12">
        <input class="form-control" name="title" type="text" id="title" value="{{ old('title', optional($portfolio)->title) }}" minlength="1" maxlength="500" required="true" placeholder="Title">
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">{{ trans('portfolios.description') }}</label>
    <div class="col-md-12">
        <textarea class="form-control" name="description" cols="50" rows="10" id="description" required="true" placeholder="Description">{{ old('description', optional($portfolio)->description) }}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col-12" style="padding-left:0;">
                <div class="form-group">
                      <label for="file" class="col-12 control-label" style="display:inline-block;">Featured Image:</label>
                      <div class="col-12" >
                            @php
                            $no_image = '';
                            $has_image = 'display:none;';
                            if(!isset($portfolio->image)){
                                $no_image = 'display:none;';
                                $has_image = '';
                            }
                            @endphp
                            <div id="profile-upload" style="{{$has_image}}">    
                                <input class="form-control" name="file" type="file" value="" required>
                            </div>
                            <div id="portfolio-wrap" style="{{$no_image}}">
                                <a id="hide-image" class="cfileuploader-action cfileuploader-action-remove" title="Remove"><i></i></a>
                                <img id="portfolio-image" src="@if(isset($portfolio->image)){{'/app'.$portfolio->image}}@endif">
                            </div>    
                      </div>
                </div>
                    
          </div>
          
<div class="col-12">
		<div class="form-group {{ $errors->has('files') ? 'has-error' : '' }}">
			<label for="files" style="margin-bottom:15px;">Portfolio Files:</label>
			<input id="portfolio-files" type="file" name="files[]" id="project_files" class="form-control" multiple>
			{!! $errors->first('files', '<p class="help-block">:message</p>') !!}
		</div>
	</div>
	                    @if(!empty($files) && $files != '[]' && $files && isset($files))
	                        <div class="col-12">
	                        <label class="">Remove Project Files:</label>
	                        </div>
	                     @endif
	                     <div clas="row">
								@foreach ($files as $file)
									<div id="{{$file->id}}" class="col-lg-2 col-md-4 col-sm-4 m-t-20" style="margin-top:10px;float: left;">
										<div class="row">
										    
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

</div>