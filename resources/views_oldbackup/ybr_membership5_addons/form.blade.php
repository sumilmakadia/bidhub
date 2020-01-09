
<div class="form-group {{ $errors->has('addon_name') ? 'has-error' : '' }}">
    <label for="addon_name" class="col-md-2 control-label">{{ trans('ybr_membership5_addons.addon_name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="addon_name" type="text" id="addon_name" value="{{ old('addon_name', optional($ybrMembership5Addon)->addon_name) }}" maxlength="200" placeholder="{{ trans('ybr_membership5_addons.addon_name__placeholder') }}">
        {!! $errors->first('addon_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('addon_description') ? 'has-error' : '' }}">
    <label for="addon_description" class="col-md-2 control-label">{{ trans('ybr_membership5_addons.addon_description') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="addon_description" type="text" id="addon_description" value="{{ old('addon_description', optional($ybrMembership5Addon)->addon_description) }}" maxlength="500" placeholder="{{ trans('ybr_membership5_addons.addon_description__placeholder') }}">
        {!! $errors->first('addon_description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('addon_price') ? 'has-error' : '' }}">
    <label for="addon_price" class="col-md-2 control-label">{{ trans('ybr_membership5_addons.addon_price') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="addon_price" type="number" id="addon_price" value="{{ old('addon_price', optional($ybrMembership5Addon)->addon_price) }}" min="-99999999" max="99999999" placeholder="{{ trans('ybr_membership5_addons.addon_price__placeholder') }}" step="any">
        {!! $errors->first('addon_price', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('product_id') ? 'has-error' : '' }}">
    <label for="product_id" class="col-md-2 control-label">{{ trans('ybr_membership5_addons.product_id') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="product_id" type="text" id="product_id" value="{{ old('product_id', optional($ybrMembership5Addon)->product_id) }}" min="0" placeholder="{{ trans('ybr_membership5_addons.product_id__placeholder') }}">
        {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('plan_id') ? 'has-error' : '' }}">
    <label for="plan_id" class="col-md-2 control-label">{{ trans('ybr_membership5_addons.plan_id') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="plan_id" type="text" id="plan_id" value="{{ old('plan_id', optional($ybrMembership5Addon)->plan_id) }}" min="0" placeholder="{{ trans('ybr_membership5_addons.plan_id__placeholder') }}">
        {!! $errors->first('plan_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

