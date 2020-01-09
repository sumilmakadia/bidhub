
<div class="form-group {{ $errors->has('author_id') ? 'has-error' : '' }}">
    <label for="author_id" class="col-md-2 control-label">{{ trans('pages.author_id') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="author_id" type="number" id="author_id" value="{{ old('author_id', optional($page)->author_id) }}" min="0" max="4294967295" required="true" placeholder="{{ trans('pages.author_id__placeholder') }}">
        {!! $errors->first('author_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
    <label for="title" class="col-md-2 control-label">{{ trans('pages.title') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="title" type="text" id="title" value="{{ old('title', optional($page)->title) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('pages.title__placeholder') }}">
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('excerpt') ? 'has-error' : '' }}">
    <label for="excerpt" class="col-md-2 control-label">{{ trans('pages.excerpt') }}</label>
    <div class="col-md-10">
        <textarea class="form-control" name="excerpt" cols="50" rows="10" id="excerpt" placeholder="{{ trans('pages.excerpt__placeholder') }}">{{ old('excerpt', optional($page)->excerpt) }}</textarea>
        {!! $errors->first('excerpt', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
    <label for="body" class="col-md-2 control-label">{{ trans('pages.body') }}</label>
    <div class="col-md-10">
        <textarea class="form-control" name="body" cols="50" rows="10" id="body" placeholder="{{ trans('pages.body__placeholder') }}">{{ old('body', optional($page)->body) }}</textarea>
        {!! $errors->first('body', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
    <label for="image" class="col-md-2 control-label">{{ trans('pages.image') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="image" type="text" id="image" value="{{ old('image', optional($page)->image) }}" min="0" max="255" placeholder="{{ trans('pages.image__placeholder') }}">
        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
    <label for="slug" class="col-md-2 control-label">{{ trans('pages.slug') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="slug" type="text" id="slug" value="{{ old('slug', optional($page)->slug) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('pages.slug__placeholder') }}">
        {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('meta_description') ? 'has-error' : '' }}">
    <label for="meta_description" class="col-md-2 control-label">{{ trans('pages.meta_description') }}</label>
    <div class="col-md-10">
        <textarea class="form-control" name="meta_description" cols="50" rows="10" id="meta_description" placeholder="{{ trans('pages.meta_description__placeholder') }}">{{ old('meta_description', optional($page)->meta_description) }}</textarea>
        {!! $errors->first('meta_description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('meta_keywords') ? 'has-error' : '' }}">
    <label for="meta_keywords" class="col-md-2 control-label">{{ trans('pages.meta_keywords') }}</label>
    <div class="col-md-10">
        <textarea class="form-control" name="meta_keywords" cols="50" rows="10" id="meta_keywords" placeholder="{{ trans('pages.meta_keywords__placeholder') }}">{{ old('meta_keywords', optional($page)->meta_keywords) }}</textarea>
        {!! $errors->first('meta_keywords', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    <label for="status" class="col-md-2 control-label">{{ trans('pages.status') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="status" name="status" required="true">
        	    <option value="" style="display: none;" {{ old('status', optional($page)->status ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('pages.status__placeholder') }}</option>
        	@foreach (['ACTIVE' => trans('pages.status_active'),
'INACTIVE' => trans('pages.status_inactive')] as $key => $text)
			    <option value="{{ $key }}" {{ old('status', optional($page)->status) == $key ? 'selected' : '' }}>
			    	{{ $text }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

