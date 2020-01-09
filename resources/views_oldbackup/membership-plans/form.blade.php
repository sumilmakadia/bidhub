
<div class="form-group {{ $errors->has('product_id') ? 'has-error' : '' }}">
    <label for="product_id" class="col-md-2 control-label">{{ trans('ybr_membership2_plans.product_id') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="product_id" type="text" id="product_id" value="{{ old('product_id', optional($ybrMembership2Plan)->product_id) }}" maxlength="100" min="0" placeholder="{{ trans('ybr_membership2_plans.product_id__placeholder') }}">
        {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('plan_name') ? 'has-error' : '' }}">
    <label for="plan_name" class="col-md-2 control-label">{{ trans('ybr_membership2_plans.plan_name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="plan_name" type="text" id="plan_name" value="{{ old('plan_name', optional($ybrMembership2Plan)->plan_name) }}" maxlength="255" placeholder="{{ trans('ybr_membership2_plans.plan_name__placeholder') }}">
        {!! $errors->first('plan_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('plan_description') ? 'has-error' : '' }}">
    <label for="plan_description" class="col-md-2 control-label">{{ trans('ybr_membership2_plans.plan_description') }}</label>
    <div class="col-md-10">
        <textarea class="form-control" name="plan_description" cols="50" rows="10" id="plan_description" placeholder="{{ trans('ybr_membership2_plans.plan_description__placeholder') }}">{{ old('plan_description', optional($ybrMembership2Plan)->plan_description) }}</textarea>
        {!! $errors->first('plan_description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('plan_amount') ? 'has-error' : '' }}">
    <label for="plan_amount" class="col-md-2 control-label">{{ trans('ybr_membership2_plans.plan_amount') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="plan_amount" type="number" id="plan_amount" value="{{ old('plan_amount', optional($ybrMembership2Plan)->plan_amount) }}" min="-99999999" max="99999999" placeholder="{{ trans('ybr_membership2_plans.plan_amount__placeholder') }}" step="any">
        {!! $errors->first('plan_amount', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('plan_object') ? 'has-error' : '' }}">
    <label for="plan_object" class="col-md-2 control-label">{{ trans('ybr_membership2_plans.plan_object') }}</label>
    <div class="col-md-10">
        <textarea class="form-control" name="plan_object" cols="50" rows="10" id="plan_object" placeholder="{{ trans('ybr_membership2_plans.plan_object__placeholder') }}">{{ old('plan_object', optional($ybrMembership2Plan)->plan_object) }}</textarea>
        {!! $errors->first('plan_object', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('plan_billing_scheme') ? 'has-error' : '' }}">
    <label for="plan_billing_scheme" class="col-md-2 control-label">{{ trans('ybr_membership2_plans.plan_billing_scheme') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="plan_billing_scheme" type="text" id="plan_billing_scheme" value="{{ old('plan_billing_scheme', optional($ybrMembership2Plan)->plan_billing_scheme) }}" maxlength="100" placeholder="{{ trans('ybr_membership2_plans.plan_billing_scheme__placeholder') }}">
        {!! $errors->first('plan_billing_scheme', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('plan_currency') ? 'has-error' : '' }}">
    <label for="plan_currency" class="col-md-2 control-label">{{ trans('ybr_membership2_plans.plan_currency') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="plan_currency" type="text" id="plan_currency" value="{{ old('plan_currency', optional($ybrMembership2Plan)->plan_currency) }}" maxlength="100" placeholder="{{ trans('ybr_membership2_plans.plan_currency__placeholder') }}">
        {!! $errors->first('plan_currency', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('plan_interval') ? 'has-error' : '' }}">
    <label for="plan_interval" class="col-md-2 control-label">{{ trans('ybr_membership2_plans.plan_interval') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="plan_interval" type="text" id="plan_interval" value="{{ old('plan_interval', optional($ybrMembership2Plan)->plan_interval) }}" maxlength="100" placeholder="{{ trans('ybr_membership2_plans.plan_interval__placeholder') }}">
        {!! $errors->first('plan_interval', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('plan_interval_count') ? 'has-error' : '' }}">
    <label for="plan_interval_count" class="col-md-2 control-label">{{ trans('ybr_membership2_plans.plan_interval_count') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="plan_interval_count" type="text" id="plan_interval_count" value="{{ old('plan_interval_count', optional($ybrMembership2Plan)->plan_interval_count) }}" min="0" max="100" placeholder="{{ trans('ybr_membership2_plans.plan_interval_count__placeholder') }}">
        {!! $errors->first('plan_interval_count', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('plan_livemode') ? 'has-error' : '' }}">
    <label for="plan_livemode" class="col-md-2 control-label">{{ trans('ybr_membership2_plans.plan_livemode') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="plan_livemode" type="text" id="plan_livemode" value="{{ old('plan_livemode', optional($ybrMembership2Plan)->plan_livemode) }}" maxlength="100" placeholder="{{ trans('ybr_membership2_plans.plan_livemode__placeholder') }}">
        {!! $errors->first('plan_livemode', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('trial_period_days') ? 'has-error' : '' }}">
    <label for="trial_period_days" class="col-md-2 control-label">{{ trans('ybr_membership2_plans.trial_period_days') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="trial_period_days" type="number" id="trial_period_days" value="{{ old('trial_period_days', optional($ybrMembership2Plan)->trial_period_days) }}" min="-2147483648" max="2147483647" placeholder="{{ trans('ybr_membership2_plans.trial_period_days__placeholder') }}">
        {!! $errors->first('trial_period_days', '<p class="help-block">:message</p>') !!}
    </div>
</div>

