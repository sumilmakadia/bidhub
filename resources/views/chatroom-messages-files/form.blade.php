
<div class="form-group {{ $errors->has('message_id') ? 'has-error' : '' }}">
    <label for="message_id" class="col-md-2 control-label">{{ trans('chatroom_messages_files.message_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="message_id" name="message_id" required="true">
        	    <option value="" style="display: none;" {{ old('message_id', optional($chatroomMessagesFile)->message_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('chatroom_messages_files.message_id__placeholder') }}</option>
        	@foreach ($ChatroomMessages as $key => $ChatroomMessage)
			    <option value="{{ $key }}" {{ old('message_id', optional($chatroomMessagesFile)->message_id) == $key ? 'selected' : '' }}>
			    	{{ $ChatroomMessage }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('message_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('file_name') ? 'has-error' : '' }}">
    <label for="file_name" class="col-md-2 control-label">{{ trans('chatroom_messages_files.file_name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="file_name" type="text" id="file_name" value="{{ old('file_name', optional($chatroomMessagesFile)->file_name) }}" maxlength="255" placeholder="{{ trans('chatroom_messages_files.file_name__placeholder') }}">
        {!! $errors->first('file_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('file_path') ? 'has-error' : '' }}">
    <label for="file_path" class="col-md-2 control-label">{{ trans('chatroom_messages_files.file_path') }}</label>
    <div class="col-md-10">
        <textarea class="form-control" name="file_path" cols="50" rows="10" id="file_path" placeholder="{{ trans('chatroom_messages_files.file_path__placeholder') }}">{{ old('file_path', optional($chatroomMessagesFile)->file_path) }}</textarea>
        {!! $errors->first('file_path', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('file_type') ? 'has-error' : '' }}">
    <label for="file_type" class="col-md-2 control-label">{{ trans('chatroom_messages_files.file_type') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="file_type" type="text" id="file_type" value="{{ old('file_type', optional($chatroomMessagesFile)->file_type) }}" maxlength="255" placeholder="{{ trans('chatroom_messages_files.file_type__placeholder') }}">
        {!! $errors->first('file_type', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('created_by') ? 'has-error' : '' }}">
    <label for="created_by" class="col-md-2 control-label">{{ trans('chatroom_messages_files.created_by') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="created_by" name="created_by">
        	    <option value="" style="display: none;" {{ old('created_by', optional($chatroomMessagesFile)->created_by ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('chatroom_messages_files.created_by__placeholder') }}</option>
        	@foreach ($creators as $key => $creator)
			    <option value="{{ $key }}" {{ old('created_by', optional($chatroomMessagesFile)->created_by) == $key ? 'selected' : '' }}>
			    	{{ $creator }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('created_by', '<p class="help-block">:message</p>') !!}
    </div>
</div>

