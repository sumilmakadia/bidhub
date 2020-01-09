
<div class="form-group {{ $errors->has('portfolio_id') ? 'has-error' : '' }}">
    <label for="portfolio_id" class="col-md-2 control-label">{{ trans('portfolios_photos.portfolio_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="portfolio_id" name="portfolio_id" required="true">
        	    <option value="" style="display: none;" {{ old('portfolio_id', optional($portfoliosPhoto)->portfolio_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('portfolios_photos.portfolio_id__placeholder') }}</option>
        	@foreach ($Portfolios as $key => $Portfolio)
			    <option value="{{ $key }}" {{ old('portfolio_id', optional($portfoliosPhoto)->portfolio_id) == $key ? 'selected' : '' }}>
			    	{{ $Portfolio }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('portfolio_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('file_name') ? 'has-error' : '' }}">
    <label for="file_name" class="col-md-2 control-label">{{ trans('portfolios_photos.file_name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="file_name" type="text" id="file_name" value="{{ old('file_name', optional($portfoliosPhoto)->file_name) }}" maxlength="255" placeholder="{{ trans('portfolios_photos.file_name__placeholder') }}">
        {!! $errors->first('file_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('file_path') ? 'has-error' : '' }}">
    <label for="file_path" class="col-md-2 control-label">{{ trans('portfolios_photos.file_path') }}</label>
    <div class="col-md-10">
        <textarea class="form-control" name="file_path" cols="50" rows="10" id="file_path" placeholder="{{ trans('portfolios_photos.file_path__placeholder') }}">{{ old('file_path', optional($portfoliosPhoto)->file_path) }}</textarea>
        {!! $errors->first('file_path', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('file_type') ? 'has-error' : '' }}">
    <label for="file_type" class="col-md-2 control-label">{{ trans('portfolios_photos.file_type') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="file_type" type="text" id="file_type" value="{{ old('file_type', optional($portfoliosPhoto)->file_type) }}" maxlength="255" placeholder="{{ trans('portfolios_photos.file_type__placeholder') }}">
        {!! $errors->first('file_type', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('created_by') ? 'has-error' : '' }}">
    <label for="created_by" class="col-md-2 control-label">{{ trans('portfolios_photos.created_by') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="created_by" name="created_by">
        	    <option value="" style="display: none;" {{ old('created_by', optional($portfoliosPhoto)->created_by ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('portfolios_photos.created_by__placeholder') }}</option>
        	@foreach ($creators as $key => $creator)
			    <option value="{{ $key }}" {{ old('created_by', optional($portfoliosPhoto)->created_by) == $key ? 'selected' : '' }}>
			    	{{ $creator }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('created_by', '<p class="help-block">:message</p>') !!}
    </div>
</div>

