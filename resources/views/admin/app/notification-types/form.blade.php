
<div class="form-group {{ $errors->has('notification') ? 'has-error' : '' }}">
    <label for="notification" class="col-md-2 control-label">{{ trans('ybr_notification_types.notification') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="notification" type="text" id="notification" value="{{ old('notification', optional($ybrNotificationType)->notification) }}" maxlength="100" placeholder="{{ trans('ybr_notification_types.notification__placeholder') }}">
        {!! $errors->first('notification', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('created_on') ? 'has-error' : '' }}">
    <label for="created_on" class="col-md-2 control-label">{{ trans('ybr_notification_types.created_on') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="created_on" type="number" id="created_on" value="{{ old('created_on', optional($ybrNotificationType)->created_on) }}" min="-2147483648" max="2147483647" required="true" placeholder="{{ trans('ybr_notification_types.created_on__placeholder') }}">
        {!! $errors->first('created_on', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('updated_on') ? 'has-error' : '' }}">
    <label for="updated_on" class="col-md-2 control-label">{{ trans('ybr_notification_types.updated_on') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="updated_on" type="number" id="updated_on" value="{{ old('updated_on', optional($ybrNotificationType)->updated_on) }}" min="-2147483648" max="2147483647" required="true" placeholder="{{ trans('ybr_notification_types.updated_on__placeholder') }}">
        {!! $errors->first('updated_on', '<p class="help-block">:message</p>') !!}
    </div>
</div>

