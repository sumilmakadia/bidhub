
<div class="form-group {{ $errors->has('custom_field') ? 'has-error' : '' }}">
    <label for="custom_field" class="col-md-2 control-label">{{ trans('custom_fields.custom_field') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="custom_field" type="text" id="custom_field" value="{{ old('custom_field', optional($customField)->custom_field) }}" minlength="1" maxlength="100" required="true" placeholder="{{ trans('custom_fields.custom_field__placeholder') }}">
        {!! $errors->first('custom_field', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('value') ? 'has-error' : '' }}">
    <label for="value" class="col-md-2 control-label">{{ trans('custom_fields.value') }}</label>
    <div class="col-md-10">
        <textarea class="form-control" name="value" cols="50" rows="10" id="value" required="true" placeholder="{{ trans('custom_fields.value__placeholder') }}">{{ old('value', optional($customField)->value) }}</textarea>
        {!! $errors->first('value', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('created_on') ? 'has-error' : '' }}">
    <label for="created_on" class="col-md-2 control-label">{{ trans('custom_fields.created_on') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="created_on" type="text" id="created_on" value="{{ old('created_on', optional($customField)->created_on) }}" required="true" placeholder="{{ trans('custom_fields.created_on__placeholder') }}">
        {!! $errors->first('created_on', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('updated_on') ? 'has-error' : '' }}">
    <label for="updated_on" class="col-md-2 control-label">{{ trans('custom_fields.updated_on') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="updated_on" type="text" id="updated_on" value="{{ old('updated_on', optional($customField)->updated_on) }}" required="true" placeholder="{{ trans('custom_fields.updated_on__placeholder') }}">
        {!! $errors->first('updated_on', '<p class="help-block">:message</p>') !!}
    </div>
</div>

