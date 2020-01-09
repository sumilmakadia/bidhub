
<div class="form-group {{ $errors->has('created_by') ? 'has-error' : '' }}">
    <label for="created_by" class="col-md-2 control-label">{{ trans('ybr_notifications.created_by') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="created_by" name="created_by" required="true">
        	    <option value="" style="display: none;" {{ old('created_by', optional($ybrNotification)->created_by ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('ybr_notifications.created_by__placeholder') }}</option>
        	@foreach ($creators as $key => $creator)
			    <option value="{{ $key }}" {{ old('created_by', optional($ybrNotification)->created_by) == $key ? 'selected' : '' }}>
			    	{{ $creator }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('created_by', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('notification') ? 'has-error' : '' }}">
    <label for="notification" class="col-md-2 control-label">{{ trans('ybr_notifications.notification') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="notification" type="text" id="notification" value="{{ old('notification', optional($ybrNotification)->notification) }}" maxlength="100" placeholder="{{ trans('ybr_notifications.notification__placeholder') }}">
        {!! $errors->first('notification', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('created_on') ? 'has-error' : '' }}">
    <label for="created_on" class="col-md-2 control-label">{{ trans('ybr_notifications.created_on') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="created_on" type="number" id="created_on" value="{{ old('created_on', optional($ybrNotification)->created_on) }}" min="-2147483648" max="2147483647" required="true" placeholder="{{ trans('ybr_notifications.created_on__placeholder') }}">
        {!! $errors->first('created_on', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('updated_on') ? 'has-error' : '' }}">
    <label for="updated_on" class="col-md-2 control-label">{{ trans('ybr_notifications.updated_on') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="updated_on" type="number" id="updated_on" value="{{ old('updated_on', optional($ybrNotification)->updated_on) }}" min="-2147483648" max="2147483647" required="true" placeholder="{{ trans('ybr_notifications.updated_on__placeholder') }}">
        {!! $errors->first('updated_on', '<p class="help-block">:message</p>') !!}
    </div>
</div>

