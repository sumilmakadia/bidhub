
<div class="form-group {{ $errors->has('plan_id') ? 'has-error' : '' }}">
    <label for="plan_id" class="col-md-2 control-label">{{ trans('ybr_membership5_transactions.plan_id') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="plan_id" type="text" id="plan_id" value="{{ old('plan_id', optional($ybrMembership5Transaction)->plan_id) }}" minlength="1" min="0" required="true" placeholder="{{ trans('ybr_membership5_transactions.plan_id__placeholder') }}">
        {!! $errors->first('plan_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('membership_start') ? 'has-error' : '' }}">
    <label for="membership_start" class="col-md-2 control-label">{{ trans('ybr_membership5_transactions.membership_start') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="membership_start" type="text" id="membership_start" value="{{ old('membership_start', optional($ybrMembership5Transaction)->membership_start) }}" placeholder="{{ trans('ybr_membership5_transactions.membership_start__placeholder') }}">
        {!! $errors->first('membership_start', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('membership_end') ? 'has-error' : '' }}">
    <label for="membership_end" class="col-md-2 control-label">{{ trans('ybr_membership5_transactions.membership_end') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="membership_end" type="text" id="membership_end" value="{{ old('membership_end', optional($ybrMembership5Transaction)->membership_end) }}" placeholder="{{ trans('ybr_membership5_transactions.membership_end__placeholder') }}">
        {!! $errors->first('membership_end', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('membership_charge_date') ? 'has-error' : '' }}">
    <label for="membership_charge_date" class="col-md-2 control-label">{{ trans('ybr_membership5_transactions.membership_charge_date') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="membership_charge_date" type="text" id="membership_charge_date" value="{{ old('membership_charge_date', optional($ybrMembership5Transaction)->membership_charge_date) }}" placeholder="{{ trans('ybr_membership5_transactions.membership_charge_date__placeholder') }}">
        {!! $errors->first('membership_charge_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('membership_charge') ? 'has-error' : '' }}">
    <label for="membership_charge" class="col-md-2 control-label">{{ trans('ybr_membership5_transactions.membership_charge') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="membership_charge" type="number" id="membership_charge" value="{{ old('membership_charge', optional($ybrMembership5Transaction)->membership_charge) }}" min="-99999999" max="99999999" placeholder="{{ trans('ybr_membership5_transactions.membership_charge__placeholder') }}" step="any">
        {!! $errors->first('membership_charge', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('created_by') ? 'has-error' : '' }}">
    <label for="created_by" class="col-md-2 control-label">{{ trans('ybr_membership5_transactions.created_by') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="created_by" name="created_by">
        	    <option value="" style="display: none;" {{ old('created_by', optional($ybrMembership5Transaction)->created_by ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('ybr_membership5_transactions.created_by__placeholder') }}</option>
        	@foreach ($creators as $key => $creator)
			    <option value="{{ $key }}" {{ old('created_by', optional($ybrMembership5Transaction)->created_by) == $key ? 'selected' : '' }}>
			    	{{ $creator }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('created_by', '<p class="help-block">:message</p>') !!}
    </div>
</div>

