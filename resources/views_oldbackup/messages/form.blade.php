
<div class="form-group {{ $errors->has('sent_to') ? 'has-error' : '' }}">
    <label for="sent_to" class="col-md-2 control-label">{{ trans('messages.sent_to') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="sent_to" name="sent_to" required="true">
        	    <option value="" style="display: none;" {{ old('sent_to', optional($message)->sent_to ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('messages.sent_to__placeholder') }}</option>
        	@foreach ($creators as $key => $creator)
			    <option value="{{ $key }}" {{ old('sent_to', optional($message)->sent_to) == $key ? 'selected' : '' }}>
			    	{{ $creator }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('sent_to', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
    <label for="message" class="col-md-2 control-label">{{ trans('messages.message') }}</label>
    <div class="col-md-10">
        <textarea class="form-control" name="message" cols="50" rows="10" id="message" required="true" placeholder="{{ trans('messages.message__placeholder') }}">{{ old('message', optional($message)->message) }}</textarea>
        {!! $errors->first('message', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('created_by') ? 'has-error' : '' }}">
    <label for="created_by" class="col-md-2 control-label">{{ trans('messages.created_by') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="created_by" name="created_by" required="true">
        	    <option value="" style="display: none;" {{ old('created_by', optional($message)->created_by ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('messages.created_by__placeholder') }}</option>
        	@foreach ($creators as $key => $creator)
			    <option value="{{ $key }}" {{ old('created_by', optional($message)->created_by) == $key ? 'selected' : '' }}>
			    	{{ $creator }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('created_by', '<p class="help-block">:message</p>') !!}
    </div>
</div>

