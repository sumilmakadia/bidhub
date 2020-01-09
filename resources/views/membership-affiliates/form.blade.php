
<div class="form-group {{ $errors->has('created_by') ? 'has-error' : '' }}">
    <label for="created_by" class="col-md-2 control-label">{{ trans('ybr_membership4_affiliates.created_by') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="created_by" name="created_by">
        	    <option value="" style="display: none;" {{ old('created_by', optional($ybrMembership4Affiliate)->created_by ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('ybr_membership4_affiliates.created_by__placeholder') }}</option>
        	@foreach ($creators as $key => $creator)
			    <option value="{{ $key }}" {{ old('created_by', optional($ybrMembership4Affiliate)->created_by) == $key ? 'selected' : '' }}>
			    	{{ $creator }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('created_by', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('affiliate_total_referrals') ? 'has-error' : '' }}">
    <label for="affiliate_total_referrals" class="col-md-2 control-label">{{ trans('ybr_membership4_affiliates.affiliate_total_referrals') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="affiliate_total_referrals" type="text" id="affiliate_total_referrals" value="{{ old('affiliate_total_referrals', optional($ybrMembership4Affiliate)->affiliate_total_referrals) }}" placeholder="{{ trans('ybr_membership4_affiliates.affiliate_total_referrals__placeholder') }}">
        {!! $errors->first('affiliate_total_referrals', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('affiliate_url') ? 'has-error' : '' }}">
    <label for="affiliate_url" class="col-md-2 control-label">{{ trans('ybr_membership4_affiliates.affiliate_url') }}</label>
    <div class="col-md-10">
        <textarea class="form-control" name="affiliate_url" cols="50" rows="10" id="affiliate_url" placeholder="{{ trans('ybr_membership4_affiliates.affiliate_url__placeholder') }}">{{ old('affiliate_url', optional($ybrMembership4Affiliate)->affiliate_url) }}</textarea>
        {!! $errors->first('affiliate_url', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('affiliate_status') ? 'has-error' : '' }}">
    <label for="affiliate_status" class="col-md-2 control-label">{{ trans('ybr_membership4_affiliates.affiliate_status') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="affiliate_status" type="text" id="affiliate_status" value="{{ old('affiliate_status', optional($ybrMembership4Affiliate)->affiliate_status) }}" minlength="1" maxlength="100" required="true" placeholder="{{ trans('ybr_membership4_affiliates.affiliate_status__placeholder') }}">
        {!! $errors->first('affiliate_status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('affiliate_email') ? 'has-error' : '' }}">
    <label for="affiliate_email" class="col-md-2 control-label">{{ trans('ybr_membership4_affiliates.affiliate_email') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="affiliate_email" type="text" id="affiliate_email" value="{{ old('affiliate_email', optional($ybrMembership4Affiliate)->affiliate_email) }}" minlength="1" maxlength="100" required="true" placeholder="{{ trans('ybr_membership4_affiliates.affiliate_email__placeholder') }}">
        {!! $errors->first('affiliate_email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('affiliate_phone') ? 'has-error' : '' }}">
    <label for="affiliate_phone" class="col-md-2 control-label">{{ trans('ybr_membership4_affiliates.affiliate_phone') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="affiliate_phone" type="text" id="affiliate_phone" value="{{ old('affiliate_phone', optional($ybrMembership4Affiliate)->affiliate_phone) }}" minlength="1" maxlength="100" required="true" placeholder="{{ trans('ybr_membership4_affiliates.affiliate_phone__placeholder') }}">
        {!! $errors->first('affiliate_phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('affiliate_country') ? 'has-error' : '' }}">
    <label for="affiliate_country" class="col-md-2 control-label">{{ trans('ybr_membership4_affiliates.affiliate_country') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="affiliate_country" type="number" id="affiliate_country" value="{{ old('affiliate_country', optional($ybrMembership4Affiliate)->affiliate_country) }}" min="-2147483648" max="2147483647" required="true" placeholder="{{ trans('ybr_membership4_affiliates.affiliate_country__placeholder') }}">
        {!! $errors->first('affiliate_country', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('affiliate_state') ? 'has-error' : '' }}">
    <label for="affiliate_state" class="col-md-2 control-label">{{ trans('ybr_membership4_affiliates.affiliate_state') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="affiliate_state" type="number" id="affiliate_state" value="{{ old('affiliate_state', optional($ybrMembership4Affiliate)->affiliate_state) }}" min="-2147483648" max="2147483647" required="true" placeholder="{{ trans('ybr_membership4_affiliates.affiliate_state__placeholder') }}">
        {!! $errors->first('affiliate_state', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('affiliate_city') ? 'has-error' : '' }}">
    <label for="affiliate_city" class="col-md-2 control-label">{{ trans('ybr_membership4_affiliates.affiliate_city') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="affiliate_city" type="number" id="affiliate_city" value="{{ old('affiliate_city', optional($ybrMembership4Affiliate)->affiliate_city) }}" min="-2147483648" max="2147483647" required="true" placeholder="{{ trans('ybr_membership4_affiliates.affiliate_city__placeholder') }}">
        {!! $errors->first('affiliate_city', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('affiliate_address') ? 'has-error' : '' }}">
    <label for="affiliate_address" class="col-md-2 control-label">{{ trans('ybr_membership4_affiliates.affiliate_address') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="affiliate_address" type="number" id="affiliate_address" value="{{ old('affiliate_address', optional($ybrMembership4Affiliate)->affiliate_address) }}" min="-2147483648" max="2147483647" required="true" placeholder="{{ trans('ybr_membership4_affiliates.affiliate_address__placeholder') }}">
        {!! $errors->first('affiliate_address', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('affiliate_address2') ? 'has-error' : '' }}">
    <label for="affiliate_address2" class="col-md-2 control-label">{{ trans('ybr_membership4_affiliates.affiliate_address2') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="affiliate_address2" type="number" id="affiliate_address2" value="{{ old('affiliate_address2', optional($ybrMembership4Affiliate)->affiliate_address2) }}" min="-2147483648" max="2147483647" required="true" placeholder="{{ trans('ybr_membership4_affiliates.affiliate_address2__placeholder') }}">
        {!! $errors->first('affiliate_address2', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('affiliate_zip') ? 'has-error' : '' }}">
    <label for="affiliate_zip" class="col-md-2 control-label">{{ trans('ybr_membership4_affiliates.affiliate_zip') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="affiliate_zip" type="number" id="affiliate_zip" value="{{ old('affiliate_zip', optional($ybrMembership4Affiliate)->affiliate_zip) }}" min="-2147483648" max="2147483647" required="true" placeholder="{{ trans('ybr_membership4_affiliates.affiliate_zip__placeholder') }}">
        {!! $errors->first('affiliate_zip', '<p class="help-block">:message</p>') !!}
    </div>
</div>

