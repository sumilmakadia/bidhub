
<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
    <label for="title" class="col-md-2 control-label">{{ trans('budget_items.title') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="title" type="text" id="title" value="{{ old('title', optional($budgetItem)->title) }}" maxlength="500" placeholder="{{ trans('budget_items.title__placeholder') }}">
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
    <label for="amount" class="col-md-2 control-label">{{ trans('budget_items.amount') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="amount" type="number" id="amount" value="{{ old('amount', optional($budgetItem)->amount) }}" min="-99999999" max="99999999" placeholder="{{ trans('budget_items.amount__placeholder') }}" step="any">
        {!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('budget_id') ? 'has-error' : '' }}">
    <label for="budget_id" class="col-md-2 control-label">{{ trans('budget_items.budget_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="budget_id" name="budget_id" required="true">
        	    <option value="" style="display: none;" {{ old('budget_id', optional($budgetItem)->budget_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('budget_items.budget_id__placeholder') }}</option>
        	@foreach ($Budgets as $key => $Budget)
			    <option value="{{ $key }}" {{ old('budget_id', optional($budgetItem)->budget_id) == $key ? 'selected' : '' }}>
			    	{{ $Budget }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('budget_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('created_on') ? 'has-error' : '' }}">
    <label for="created_on" class="col-md-2 control-label">{{ trans('budget_items.created_on') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="created_on" type="text" id="created_on" value="{{ old('created_on', optional($budgetItem)->created_on) }}" placeholder="{{ trans('budget_items.created_on__placeholder') }}">
        {!! $errors->first('created_on', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('updated_on') ? 'has-error' : '' }}">
    <label for="updated_on" class="col-md-2 control-label">{{ trans('budget_items.updated_on') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="updated_on" type="text" id="updated_on" value="{{ old('updated_on', optional($budgetItem)->updated_on) }}" placeholder="{{ trans('budget_items.updated_on__placeholder') }}">
        {!! $errors->first('updated_on', '<p class="help-block">:message</p>') !!}
    </div>
</div>

