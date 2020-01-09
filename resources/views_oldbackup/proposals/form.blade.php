<div class="row form-row">
    <div class="col-12 required-key">
	    <label class="required-label">* - Required</label>
	</div>
    <div class="col-12">
        <div class="form-group {{ $errors->has('bid_title') ? 'has-error' : '' }}">
        <label for="bid_title" class="required">{{ trans('proposals.bid_title') }}</label>
            <input class="form-control" name="bid_title" type="text" id="bid_title" value="{{ old('bid_title', optional($proposal)->bid_title) }}" maxlength="255" placeholder="{{ trans('proposals.bid_title__placeholder') }}" required>
            {!! $errors->first('bid_title', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    
    <div class="col-12">
        <div class="form-group {{ $errors->has('bid_decription') ? 'has-error' : '' }}">
        <label for="bid_decription" class="required">{{ trans('proposals.bid_decription') }}</label>
            <textarea class="form-control" name="bid_description" cols="50" rows="10" id="bid_decription" placeholder="bid description" required>{{ old('bid_description', optional($proposal)->bid_description) }}</textarea>
            {!! $errors->first('bid_decription', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    
    <div class="col-12">
    		<div class="form-group {{ $errors->has('files') ? 'has-error' : '' }}">
    			<label for="files" style="margin-bottom:15px;">Add Project Files:</label>
    			<input id="proposal-files" type="file" name="files[]" class="form-control" multiple>
    			{!! $errors->first('files', '<p class="help-block">:message</p>') !!}
    		</div>
    	</div>
        @if(!empty($files) && $files != '[]' && $files && isset($files))
        <div class="col-12">
            <label class="">Remove Project Files:</label>
        </div>
        @endif
     
			@foreach ($files as $file)
				<div id="{{$file->id}}" class="col-12" style="margin:20px 0 40px;float:left;padding-right:10px;">
					    @php
					    if($file->file_type == 'pdf'){
					        $src = '/app/public/storage/company/images/PDF-icon-small-231x300.png';
					    } else {
					        $src = $file->file_path;
					    }
					    @endphp
					    <div style="width:100%;padding:10px;"><img width="100%" src="{{$src}}"></div>
					    
						<div style="width:100%;padding:10px;">{{$file->file_name}}</div>
						<div style="text-align: center;width: 100%;margin-top: 10px;"><a style="color:#fff;" data-id="{{$file->id}}" class="btn btn-red delete-file" href="">Remove</a></div>
				</div>
			@endforeach
        <div class="col-md-12 form-group {{ $errors->has('trade') ? 'has-error' : '' }}">
    			<label for="trade" class="required">Trade</label>
    			<div class="">
    				<select name="trade[]" id="trade" class="form-control" multiple required>
    					@php 
                     $trades = DB::table('categories_helps')->get();
                     if($proposal != null) {
                     if(!isset($proposal->trade)){ 
                     $trades_arr = explode(',', $trades->trade);
                     } else {
                     $trades_arr = explode(',', $proposal->trade);
                     }
                     } else {
                        $trades_arr = array();
                        }
                     @endphp
    					@foreach($trades as $trade)
    					<option value="{{$trade->title}}" @if(in_array($trade->title, $trades_arr)) selected @endif>{{$trade->title}}</option>
    					@endforeach
    				</select>
        </div>
    </div>
</div>
