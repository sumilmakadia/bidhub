
<div class="form-group {{ $errors->has('feature_name') ? 'has-error' : '' }}">
    <label for="feature_name" class="col-md-2 control-label">{{ trans('ybr_membership7_features.feature_name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="feature_name" type="text" id="feature_name" value="{{ old('feature_name', optional($ybrMembership7Feature)->feature_name) }}" maxlength="250" placeholder="{{ trans('ybr_membership7_features.feature_name__placeholder') }}">
        {!! $errors->first('feature_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('product_id') ? 'has-error' : '' }}">
    <label for="product_id" class="col-md-2 control-label">{{ trans('ybr_membership7_features.product_id') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="product_id" type="text" id="product_id" value="{{ old('product_id', optional($ybrMembership7Feature)->product_id) }}" min="0" placeholder="{{ trans('ybr_membership7_features.product_id__placeholder') }}">
        {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('plan_id') ? 'has-error' : '' }}">
    <label for="plan_id" class="col-md-2 control-label">{{ trans('ybr_membership7_features.plan_id') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="plan_id" type="text" id="plan_id" value="{{ old('plan_id', optional($ybrMembership7Feature)->plan_id) }}" min="0" placeholder="{{ trans('ybr_membership7_features.plan_id__placeholder') }}">
        {!! $errors->first('plan_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

