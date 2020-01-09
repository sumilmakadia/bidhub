
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">{{ trans('roles.name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($role)->name) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('roles.name__placeholder') }}">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('display_name') ? 'has-error' : '' }}">
    <label for="display_name" class="col-md-2 control-label">{{ trans('roles.display_name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="display_name" type="text" id="display_name" value="{{ old('display_name', optional($role)->display_name) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('roles.display_name__placeholder') }}">
        {!! $errors->first('display_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

