
<div class="form-group {{ $errors->has('budget_title') ? 'has-error' : '' }}">
    <label for="budget_title" class="col-md-2 control-label">{{ trans('budgets.budget_title') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="budget_title" type="text" id="budget_title" value="{{ old('budget_title', optional($budget)->budget_title) }}" maxlength="100" placeholder="{{ trans('budgets.budget_title__placeholder') }}">
        {!! $errors->first('budget_title', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('budget_amount') ? 'has-error' : '' }}">
    <label for="budget_amount" class="col-md-2 control-label">{{ trans('budgets.budget_amount') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="budget_amount" type="text" id="budget_amount" value="{{ old('budget_amount', optional($budget)->budget_amount) }}" maxlength="25" placeholder="{{ trans('budgets.budget_amount__placeholder') }}">
        {!! $errors->first('budget_amount', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('budget_status') ? 'has-error' : '' }}">
    <label for="budget_status" class="col-md-2 control-label">{{ trans('budgets.budget_status') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="budget_status" type="text" id="budget_status" value="{{ old('budget_status', optional($budget)->budget_status) }}" minlength="1" maxlength="11" required="true" placeholder="{{ trans('budgets.budget_status__placeholder') }}">
        {!! $errors->first('budget_status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('created_by') ? 'has-error' : '' }}">
    <label for="created_by" class="col-md-2 control-label">{{ trans('budgets.created_by') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="created_by" name="created_by" required="true">
        	    <option value="" style="display: none;" {{ old('created_by', optional($budget)->created_by ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('budgets.created_by__placeholder') }}</option>
        	@foreach ($creators as $key => $creator)
			    <option value="{{ $key }}" {{ old('created_by', optional($budget)->created_by) == $key ? 'selected' : '' }}>
			    	{{ $creator }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('created_by', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('project_id') ? 'has-error' : '' }}">
    <label for="project_id" class="col-md-2 control-label">{{ trans('budgets.project_id') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="project_id" type="text" id="project_id" value="{{ old('project_id', optional($budget)->project_id) }}" min="0" placeholder="{{ trans('budgets.project_id__placeholder') }}">
        {!! $errors->first('project_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

