
<div class="form-group {{ $errors->has('route') ? 'has-error' : '' }}">
    <label for="route" class="col-md-2 control-label">{{ trans('ybr_membership6_permissions.route') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="route" type="text" id="route" value="{{ old('route', optional($ybrMembership6Permission)->route) }}" maxlength="100" placeholder="{{ trans('ybr_membership6_permissions.route__placeholder') }}">
        {!! $errors->first('route', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('product_id') ? 'has-error' : '' }}">
    <label for="product_id" class="col-md-2 control-label">{{ trans('ybr_membership6_permissions.product_id') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="product_id" type="text" id="product_id" value="{{ old('product_id', optional($ybrMembership6Permission)->product_id) }}" min="0" placeholder="{{ trans('ybr_membership6_permissions.product_id__placeholder') }}">
        {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('plan_id') ? 'has-error' : '' }}">
    <label for="plan_id" class="col-md-2 control-label">{{ trans('ybr_membership6_permissions.plan_id') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="plan_id" type="text" id="plan_id" value="{{ old('plan_id', optional($ybrMembership6Permission)->plan_id) }}" min="0" placeholder="{{ trans('ybr_membership6_permissions.plan_id__placeholder') }}">
        {!! $errors->first('plan_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

