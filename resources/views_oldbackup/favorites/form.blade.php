
<div class="form-group {{ $errors->has('created_by') ? 'has-error' : '' }}">
    <label for="created_by" class="col-md-2 control-label">{{ trans('favorites.created_by') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="created_by" name="created_by" required="true">
        	    <option value="" style="display: none;" {{ old('created_by', optional($favorite)->created_by ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('favorites.created_by__placeholder') }}</option>
        	@foreach ($creators as $key => $creator)
			    <option value="{{ $key }}" {{ old('created_by', optional($favorite)->created_by) == $key ? 'selected' : '' }}>
			    	{{ $creator }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('created_by', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('proposal_id') ? 'has-error' : '' }}">
    <label for="proposal_id" class="col-md-2 control-label">{{ trans('favorites.proposal_id') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="proposal_id" type="text" id="proposal_id" value="{{ old('proposal_id', optional($favorite)->proposal_id) }}" min="0" placeholder="{{ trans('favorites.proposal_id__placeholder') }}">
        {!! $errors->first('proposal_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('project_id') ? 'has-error' : '' }}">
    <label for="project_id" class="col-md-2 control-label">{{ trans('favorites.project_id') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="project_id" type="text" id="project_id" value="{{ old('project_id', optional($favorite)->project_id) }}" min="0" placeholder="{{ trans('favorites.project_id__placeholder') }}">
        {!! $errors->first('project_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('member_id') ? 'has-error' : '' }}">
    <label for="member_id" class="col-md-2 control-label">{{ trans('favorites.member_id') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="member_id" type="text" id="member_id" value="{{ old('member_id', optional($favorite)->member_id) }}" min="0" placeholder="{{ trans('favorites.member_id__placeholder') }}">
        {!! $errors->first('member_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

