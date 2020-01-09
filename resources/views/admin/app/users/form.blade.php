
<div class="form-group {{ $errors->has('role_id') ? 'has-error' : '' }}">
    <label for="role_id" class="col-md-2 control-label">{{ trans('users.role_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="role_id" name="role_id">
        	    <option value="" style="display: none;" {{ old('role_id', optional($user)->role_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('users.role_id__placeholder') }}</option>
        	@foreach ($Roles as $key => $Role)
			    <option value="{{ $key }}" {{ old('role_id', optional($user)->role_id) == $key ? 'selected' : '' }}>
			    	{{ $Role }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('role_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">{{ trans('users.name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($user)->name) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('users.name__placeholder') }}">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-2 control-label">{{ trans('users.email') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="email" type="text" id="email" value="{{ old('email', optional($user)->email) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('users.email__placeholder') }}">
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
    <label for="avatar" class="col-md-2 control-label">{{ trans('users.avatar') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="avatar" type="text" id="avatar" value="{{ old('avatar', optional($user)->avatar) }}" maxlength="255">
        {!! $errors->first('avatar', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email_verified_at') ? 'has-error' : '' }}">
    <label for="email_verified_at" class="col-md-2 control-label">{{ trans('users.email_verified_at') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="email_verified_at" type="text" id="email_verified_at" value="{{ old('email_verified_at', optional($user)->email_verified_at) }}" placeholder="{{ trans('users.email_verified_at__placeholder') }}">
        {!! $errors->first('email_verified_at', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
    <label for="password" class="col-md-2 control-label">{{ trans('users.password') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="password" type="text" id="password" value="{{ old('password', optional($user)->password) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('users.password__placeholder') }}">
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('remember_token') ? 'has-error' : '' }}">
    <label for="remember_token" class="col-md-2 control-label">{{ trans('users.remember_token') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="remember_token" type="text" id="remember_token" value="{{ old('remember_token', optional($user)->remember_token) }}" maxlength="100" placeholder="{{ trans('users.remember_token__placeholder') }}">
        {!! $errors->first('remember_token', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('settings') ? 'has-error' : '' }}">
    <label for="settings" class="col-md-2 control-label">{{ trans('users.settings') }}</label>
    <div class="col-md-10">
        <textarea class="form-control" name="settings" cols="50" rows="10" id="settings" placeholder="{{ trans('users.settings__placeholder') }}">{{ old('settings', optional($user)->settings) }}</textarea>
        {!! $errors->first('settings', '<p class="help-block">:message</p>') !!}
    </div>
</div>

