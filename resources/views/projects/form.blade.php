
<div class="form-group {{ $errors->has('project_title') ? 'has-error' : '' }}">
    <label for="project_title" class="col-md-2 control-label">{{ trans('projects.project_title') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="project_title" type="text" id="project_title" value="{{ old('project_title', optional($project)->project_title) }}" maxlength="255" placeholder="{{ trans('projects.project_title__placeholder') }}">
        {!! $errors->first('project_title', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('project_description') ? 'has-error' : '' }}">
    <label for="project_description" class="col-md-2 control-label">{{ trans('projects.project_description') }}</label>
    <div class="col-md-10">
        <textarea class="form-control" name="project_description" cols="50" rows="10" id="project_description" placeholder="{{ trans('projects.project_description__placeholder') }}">{{ old('project_description', optional($project)->project_description) }}</textarea>
        {!! $errors->first('project_description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('project_status') ? 'has-error' : '' }}">
    <label for="project_status" class="col-md-2 control-label">{{ trans('projects.project_status') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="project_status" type="text" id="project_status" value="{{ old('project_status', optional($project)->project_status) }}" maxlength="255" placeholder="{{ trans('projects.project_status__placeholder') }}">
        {!! $errors->first('project_status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('project_total_units') ? 'has-error' : '' }}">
    <label for="project_total_units" class="col-md-2 control-label">{{ trans('projects.project_total_units') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="project_total_units" type="text" id="project_total_units" value="{{ old('project_total_units', optional($project)->project_total_units) }}" placeholder="{{ trans('projects.project_total_units__placeholder') }}">
        {!! $errors->first('project_total_units', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('project_starts_on') ? 'has-error' : '' }}">
    <label for="project_starts_on" class="col-md-2 control-label">{{ trans('projects.project_starts_on') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="project_starts_on" type="text" id="project_starts_on" value="{{ old('project_starts_on', optional($project)->project_starts_on) }}" placeholder="{{ trans('projects.project_starts_on__placeholder') }}">
        {!! $errors->first('project_starts_on', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('project_expires_on') ? 'has-error' : '' }}">
    <label for="project_expires_on" class="col-md-2 control-label">{{ trans('projects.project_expires_on') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="project_expires_on" type="text" id="project_expires_on" value="{{ old('project_expires_on', optional($project)->project_expires_on) }}" placeholder="{{ trans('projects.project_expires_on__placeholder') }}">
        {!! $errors->first('project_expires_on', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('project_contact_method') ? 'has-error' : '' }}">
    <label for="project_contact_method" class="col-md-2 control-label">{{ trans('projects.project_contact_method') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="project_contact_method" type="text" id="project_contact_method" value="{{ old('project_contact_method', optional($project)->project_contact_method) }}" maxlength="255" placeholder="{{ trans('projects.project_contact_method__placeholder') }}">
        {!! $errors->first('project_contact_method', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('project_files_json') ? 'has-error' : '' }}">
    <label for="project_files_json" class="col-md-2 control-label">{{ trans('projects.project_files_json') }}</label>
    <div class="col-md-10">
        <textarea class="form-control" name="project_files_json" cols="50" rows="10" id="project_files_json" placeholder="{{ trans('projects.project_files_json__placeholder') }}">{{ old('project_files_json', optional($project)->project_files_json) }}</textarea>
        {!! $errors->first('project_files_json', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('project_trade') ? 'has-error' : '' }}">
    <label for="project_trade" class="col-md-2 control-label">{{ trans('projects.project_trade') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="project_trade" type="number" id="project_trade" value="{{ old('project_trade', optional($project)->project_trade) }}" min="-2147483648" max="2147483647" placeholder="{{ trans('projects.project_trade__placeholder') }}">
        {!! $errors->first('project_trade', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('project_country') ? 'has-error' : '' }}">
    <label for="project_country" class="col-md-2 control-label">{{ trans('projects.project_country') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="project_country" type="text" id="project_country" value="{{ old('project_country', optional($project)->project_country) }}" min="0" max="255" placeholder="{{ trans('projects.project_country__placeholder') }}">
        {!! $errors->first('project_country', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('project_state') ? 'has-error' : '' }}">
    <label for="project_state" class="col-md-2 control-label">{{ trans('projects.project_state') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="project_state" type="text" id="project_state" value="{{ old('project_state', optional($project)->project_state) }}" maxlength="255" placeholder="{{ trans('projects.project_state__placeholder') }}">
        {!! $errors->first('project_state', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('project_city') ? 'has-error' : '' }}">
    <label for="project_city" class="col-md-2 control-label">{{ trans('projects.project_city') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="project_city" type="text" id="project_city" value="{{ old('project_city', optional($project)->project_city) }}" maxlength="255" placeholder="{{ trans('projects.project_city__placeholder') }}">
        {!! $errors->first('project_city', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('project_zip') ? 'has-error' : '' }}">
    <label for="project_zip" class="col-md-2 control-label">{{ trans('projects.project_zip') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="project_zip" type="text" id="project_zip" value="{{ old('project_zip', optional($project)->project_zip) }}" maxlength="255" placeholder="{{ trans('projects.project_zip__placeholder') }}">
        {!! $errors->first('project_zip', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('project_latitude') ? 'has-error' : '' }}">
    <label for="project_latitude" class="col-md-2 control-label">{{ trans('projects.project_latitude') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="project_latitude" type="text" id="project_latitude" value="{{ old('project_latitude', optional($project)->project_latitude) }}" maxlength="255" placeholder="{{ trans('projects.project_latitude__placeholder') }}">
        {!! $errors->first('project_latitude', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('project_longtitude') ? 'has-error' : '' }}">
    <label for="project_longtitude" class="col-md-2 control-label">{{ trans('projects.project_longtitude') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="project_longtitude" type="text" id="project_longtitude" value="{{ old('project_longtitude', optional($project)->project_longtitude) }}" maxlength="255" placeholder="{{ trans('projects.project_longtitude__placeholder') }}">
        {!! $errors->first('project_longtitude', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('created_by') ? 'has-error' : '' }}">
    <label for="created_by" class="col-md-2 control-label">{{ trans('projects.created_by') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="created_by" name="created_by" required="true">
        	    <option value="" style="display: none;" {{ old('created_by', optional($project)->created_by ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('projects.created_by__placeholder') }}</option>
        	@foreach ($creators as $key => $creator)
			    <option value="{{ $key }}" {{ old('created_by', optional($project)->created_by) == $key ? 'selected' : '' }}>
			    	{{ $creator }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('created_by', '<p class="help-block">:message</p>') !!}
    </div>
</div>

