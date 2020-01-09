
<div class="form-group {{ $errors->has('chatroom_id') ? 'has-error' : '' }}">
    <label for="chatroom_id" class="col-md-2 control-label">{{ trans('chatroom_messages.chatroom_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="chatroom_id" name="chatroom_id" required="true">
        	    <option value="" style="display: none;" {{ old('chatroom_id', optional($chatroomMessage)->chatroom_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('chatroom_messages.chatroom_id__placeholder') }}</option>
        	@foreach ($Chatrooms as $key => $Chatroom)
			    <option value="{{ $key }}" {{ old('chatroom_id', optional($chatroomMessage)->chatroom_id) == $key ? 'selected' : '' }}>
			    	{{ $Chatroom }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('chatroom_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('created_by') ? 'has-error' : '' }}">
    <label for="created_by" class="col-md-2 control-label">{{ trans('chatroom_messages.created_by') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="created_by" name="created_by" required="true">
        	    <option value="" style="display: none;" {{ old('created_by', optional($chatroomMessage)->created_by ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('chatroom_messages.created_by__placeholder') }}</option>
        	@foreach ($creators as $key => $creator)
			    <option value="{{ $key }}" {{ old('created_by', optional($chatroomMessage)->created_by) == $key ? 'selected' : '' }}>
			    	{{ $creator }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('created_by', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('sent_to') ? 'has-error' : '' }}">
    <label for="sent_to" class="col-md-2 control-label">{{ trans('chatroom_messages.sent_to') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="sent_to" type="text" id="sent_to" value="{{ old('sent_to', optional($chatroomMessage)->sent_to) }}" minlength="1" required="true" placeholder="{{ trans('chatroom_messages.sent_to__placeholder') }}">
        {!! $errors->first('sent_to', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
    <label for="message" class="col-md-2 control-label">{{ trans('chatroom_messages.message') }}</label>
    <div class="col-md-10">
        <textarea class="form-control" name="message" cols="50" rows="10" id="message" required="true" placeholder="{{ trans('chatroom_messages.message__placeholder') }}">{{ old('message', optional($chatroomMessage)->message) }}</textarea>
        {!! $errors->first('message', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('updated_date') ? 'has-error' : '' }}">
    <label for="updated_date" class="col-md-2 control-label">{{ trans('chatroom_messages.updated_date') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="updated_date" type="text" id="updated_date" value="{{ old('updated_date', optional($chatroomMessage)->updated_date) }}" placeholder="{{ trans('chatroom_messages.updated_date__placeholder') }}">
        {!! $errors->first('updated_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

