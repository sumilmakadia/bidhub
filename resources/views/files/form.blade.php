
<div class="form-group {{ $errors->has('file_name') ? 'has-error' : '' }}">
    <label for="file_name" class="col-md-2 control-label">{{ trans('files.file_name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="file_name" type="text" id="file_name" value="{{ old('file_name', optional($file)->file_name) }}" maxlength="255" placeholder="{{ trans('files.file_name__placeholder') }}">
        {!! $errors->first('file_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('file_path') ? 'has-error' : '' }}">
    <label for="file_path" class="col-md-2 control-label">{{ trans('files.file_path') }}</label>
    <div class="col-md-10">
        <textarea class="form-control" name="file_path" cols="50" rows="10" id="file_path" placeholder="{{ trans('files.file_path__placeholder') }}">{{ old('file_path', optional($file)->file_path) }}</textarea>
        {!! $errors->first('file_path', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('file_type') ? 'has-error' : '' }}">
    <label for="file_type" class="col-md-2 control-label">{{ trans('files.file_type') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="file_type" type="text" id="file_type" value="{{ old('file_type', optional($file)->file_type) }}" maxlength="255" placeholder="{{ trans('files.file_type__placeholder') }}">
        {!! $errors->first('file_type', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('project_id') ? 'has-error' : '' }}">
    <label for="project_id" class="col-md-2 control-label">{{ trans('files.project_id') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="project_id" type="text" id="project_id" value="{{ old('project_id', optional($file)->project_id) }}" min="0" placeholder="{{ trans('files.project_id__placeholder') }}">
        {!! $errors->first('project_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('created_by') ? 'has-error' : '' }}">
    <label for="created_by" class="col-md-2 control-label">{{ trans('files.created_by') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="created_by" name="created_by">
        	    <option value="" style="display: none;" {{ old('created_by', optional($file)->created_by ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('files.created_by__placeholder') }}</option>
        	@foreach ($creators as $key => $creator)
			    <option value="{{ $key }}" {{ old('created_by', optional($file)->created_by) == $key ? 'selected' : '' }}>
			    	{{ $creator }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('created_by', '<p class="help-block">:message</p>') !!}
    </div>
</div>

