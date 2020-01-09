
<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    <label for="status" class="col-md-2 control-label">{{ trans('ybr_membership3_members.status') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="status" type="text" id="status" value="{{ old('status', optional($ybrMembership3Member)->status) }}" minlength="1" maxlength="100" required="true" placeholder="{{ trans('ybr_membership3_members.status__placeholder') }}">
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('object') ? 'has-error' : '' }}">
    <label for="object" class="col-md-2 control-label">{{ trans('ybr_membership3_members.object') }}</label>
    <div class="col-md-10">
        <textarea class="form-control" name="object" cols="50" rows="10" id="object" required="true" placeholder="{{ trans('ybr_membership3_members.object__placeholder') }}">{{ old('object', optional($ybrMembership3Member)->object) }}</textarea>
        {!! $errors->first('object', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('customer_id') ? 'has-error' : '' }}">
    <label for="customer_id" class="col-md-2 control-label">{{ trans('ybr_membership3_members.customer_id') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="customer_id" type="text" id="customer_id" value="{{ old('customer_id', optional($ybrMembership3Member)->customer_id) }}" minlength="1" maxlength="100" min="0" required="true" placeholder="{{ trans('ybr_membership3_members.customer_id__placeholder') }}">
        {!! $errors->first('customer_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('product_id') ? 'has-error' : '' }}">
    <label for="product_id" class="col-md-2 control-label">{{ trans('ybr_membership3_members.product_id') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="product_id" type="text" id="product_id" value="{{ old('product_id', optional($ybrMembership3Member)->product_id) }}" minlength="1" maxlength="100" min="0" required="true" placeholder="{{ trans('ybr_membership3_members.product_id__placeholder') }}">
        {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('plan_id') ? 'has-error' : '' }}">
    <label for="plan_id" class="col-md-2 control-label">{{ trans('ybr_membership3_members.plan_id') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="plan_id" type="text" id="plan_id" value="{{ old('plan_id', optional($ybrMembership3Member)->plan_id) }}" minlength="1" maxlength="100" min="0" required="true" placeholder="{{ trans('ybr_membership3_members.plan_id__placeholder') }}">
        {!! $errors->first('plan_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('plan_amount') ? 'has-error' : '' }}">
    <label for="plan_amount" class="col-md-2 control-label">{{ trans('ybr_membership3_members.plan_amount') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="plan_amount" type="number" id="plan_amount" value="{{ old('plan_amount', optional($ybrMembership3Member)->plan_amount) }}" min="-99999999" max="99999999" required="true" placeholder="{{ trans('ybr_membership3_members.plan_amount__placeholder') }}" step="any">
        {!! $errors->first('plan_amount', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('plan_interval') ? 'has-error' : '' }}">
    <label for="plan_interval" class="col-md-2 control-label">{{ trans('ybr_membership3_members.plan_interval') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="plan_interval" type="text" id="plan_interval" value="{{ old('plan_interval', optional($ybrMembership3Member)->plan_interval) }}" minlength="1" maxlength="100" required="true" placeholder="{{ trans('ybr_membership3_members.plan_interval__placeholder') }}">
        {!! $errors->first('plan_interval', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('plan_interval_count') ? 'has-error' : '' }}">
    <label for="plan_interval_count" class="col-md-2 control-label">{{ trans('ybr_membership3_members.plan_interval_count') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="plan_interval_count" type="number" id="plan_interval_count" value="{{ old('plan_interval_count', optional($ybrMembership3Member)->plan_interval_count) }}" min="-2147483648" max="2147483647" required="true" placeholder="{{ trans('ybr_membership3_members.plan_interval_count__placeholder') }}">
        {!! $errors->first('plan_interval_count', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('trial_period_days') ? 'has-error' : '' }}">
    <label for="trial_period_days" class="col-md-2 control-label">{{ trans('ybr_membership3_members.trial_period_days') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="trial_period_days" type="number" id="trial_period_days" value="{{ old('trial_period_days', optional($ybrMembership3Member)->trial_period_days) }}" min="-2147483648" max="2147483647" required="true" placeholder="{{ trans('ybr_membership3_members.trial_period_days__placeholder') }}">
        {!! $errors->first('trial_period_days', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('created') ? 'has-error' : '' }}">
    <label for="created" class="col-md-2 control-label">{{ trans('ybr_membership3_members.created') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="created" type="text" id="created" value="{{ old('created', optional($ybrMembership3Member)->created) }}" placeholder="{{ trans('ybr_membership3_members.created__placeholder') }}">
        {!! $errors->first('created', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('canceled_at') ? 'has-error' : '' }}">
    <label for="canceled_at" class="col-md-2 control-label">{{ trans('ybr_membership3_members.canceled_at') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="canceled_at" type="text" id="canceled_at" value="{{ old('canceled_at', optional($ybrMembership3Member)->canceled_at) }}" placeholder="{{ trans('ybr_membership3_members.canceled_at__placeholder') }}">
        {!! $errors->first('canceled_at', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('current_period_start') ? 'has-error' : '' }}">
    <label for="current_period_start" class="col-md-2 control-label">{{ trans('ybr_membership3_members.current_period_start') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="current_period_start" type="text" id="current_period_start" value="{{ old('current_period_start', optional($ybrMembership3Member)->current_period_start) }}" placeholder="{{ trans('ybr_membership3_members.current_period_start__placeholder') }}">
        {!! $errors->first('current_period_start', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('current_period_end') ? 'has-error' : '' }}">
    <label for="current_period_end" class="col-md-2 control-label">{{ trans('ybr_membership3_members.current_period_end') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="current_period_end" type="text" id="current_period_end" value="{{ old('current_period_end', optional($ybrMembership3Member)->current_period_end) }}" placeholder="{{ trans('ybr_membership3_members.current_period_end__placeholder') }}">
        {!! $errors->first('current_period_end', '<p class="help-block">:message</p>') !!}
    </div>
</div>

