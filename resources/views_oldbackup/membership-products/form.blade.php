
<div class="form-group {{ $errors->has('product_title') ? 'has-error' : '' }}">
    <label for="product_title" class="col-md-2 control-label">{{ trans('ybr_membership1_products.product_title') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="product_title" type="text" id="product_title" value="{{ old('product_title', optional($ybrMembership1Product)->product_title) }}" maxlength="255" placeholder="{{ trans('ybr_membership1_products.product_title__placeholder') }}">
        {!! $errors->first('product_title', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('product_description') ? 'has-error' : '' }}">
    <label for="product_description" class="col-md-2 control-label">{{ trans('ybr_membership1_products.product_description') }}</label>
    <div class="col-md-10">
        <textarea class="form-control" name="product_description" cols="50" rows="10" id="product_description" placeholder="{{ trans('ybr_membership1_products.product_description__placeholder') }}">{{ old('product_description', optional($ybrMembership1Product)->product_description) }}</textarea>
        {!! $errors->first('product_description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('product_status') ? 'has-error' : '' }}">
    <label for="product_status" class="col-md-2 control-label">{{ trans('ybr_membership1_products.product_status') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="product_status" type="text" id="product_status" value="{{ old('product_status', optional($ybrMembership1Product)->product_status) }}" maxlength="255" placeholder="{{ trans('ybr_membership1_products.product_status__placeholder') }}">
        {!! $errors->first('product_status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('product_object') ? 'has-error' : '' }}">
    <label for="product_object" class="col-md-2 control-label">{{ trans('ybr_membership1_products.product_object') }}</label>
    <div class="col-md-10">
        <textarea class="form-control" name="product_object" cols="50" rows="10" id="product_object" placeholder="{{ trans('ybr_membership1_products.product_object__placeholder') }}">{{ old('product_object', optional($ybrMembership1Product)->product_object) }}</textarea>
        {!! $errors->first('product_object', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('product_images') ? 'has-error' : '' }}">
    <label for="product_images" class="col-md-2 control-label">{{ trans('ybr_membership1_products.product_images') }}</label>
    <div class="col-md-10">
        <textarea class="form-control" name="product_images" cols="50" rows="10" id="product_images" placeholder="{{ trans('ybr_membership1_products.product_images__placeholder') }}">{{ old('product_images', optional($ybrMembership1Product)->product_images) }}</textarea>
        {!! $errors->first('product_images', '<p class="help-block">:message</p>') !!}
    </div>
</div>

