<style>
.fileuploader-theme-thumbnails .fileuploader-items .fileuploader-items-list {
    margin: -30px 0 0 0px!important;
}
.fileuploader-theme-thumbnails .fileuploader-thumbnails-input, .fileuploader-theme-thumbnails .fileuploader-items-list .fileuploader-item {
    width: 250px!important;
    height: 250px!important;
    margin-left: 0!important;
        margin-right: 20px!important;
}
.fileuploader-theme-thumbnails .fileuploader-thumbnails-input-inner{
        cursor: pointer!important;
}
#portfolio-wrap {
    width:250px;
}
</style>
<div class="row form-row">
    <div class="col-12 required-key">
	    <label class="required-label">* - Required</label>
	</div>
    <div class="col-md-12">
        <div class="form-group {{ $errors->has('company_name') ? 'has-error' : '' }}">
            <label for="company_name" class="required">{{ trans('marketplaces.company_name') }}</label>
            <input class="form-control" name="company_name" type="text" id="company_name" value="{{ old('company_name', optional($marketplace)->company_name) }}" maxlength="255" placeholder="{{ trans('marketplaces.company_name__placeholder') }}" required>
            {!! $errors->first('company_name', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    
    <div class="col-md-12">
        <div class="form-group {{ $errors->has('company_description') ? 'has-error' : '' }}">
            <label for="company_description" class="required">{{ trans('marketplaces.company_description') }}</label>
            <textarea class="form-control" name="company_description" cols="50" rows="10" id="company_description" placeholder="{{ trans('marketplaces.company_description__placeholder') }}" required>{{ old('company_description', optional($marketplace)->company_description) }}</textarea>
            {!! $errors->first('company_description', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    
    <!--<div class="form-group {{ $errors->has('company_phone') ? 'has-error' : '' }}">-->
    <!--    <label for="company_phone" class="col-md-2 control-label">{{ trans('marketplaces.company_phone') }}</label>-->
    <!--    <div class="col-md-10">-->
    <!--        <input class="form-control" name="company_phone" type="text" id="company_phone" value="{{ old('company_phone', optional($marketplace)->company_phone) }}" maxlength="255" placeholder="{{ trans('marketplaces.company_phone__placeholder') }}" required>-->
    <!--        {!! $errors->first('company_phone', '<p class="help-block">:message</p>') !!}-->
    <!--    </div>-->
    <!--</div>-->
    
    <!--<div class="form-group {{ $errors->has('company_email') ? 'has-error' : '' }}">-->
    <!--    <label for="company_email" class="col-md-2 control-label">{{ trans('marketplaces.company_email') }}</label>-->
    <!--    <div class="col-md-10">-->
    <!--        <input class="form-control" name="company_email" type="text" id="company_email" value="{{ old('company_email', optional($marketplace)->company_email) }}" maxlength="255" placeholder="{{ trans('marketplaces.company_email__placeholder') }}" required>-->
    <!--        {!! $errors->first('company_email', '<p class="help-block">:message</p>') !!}-->
    <!--    </div>-->
    <!--</div>-->
    
    <div class="col-12" style="padding-left:0;">
                    <div class="form-group">
                          <label for="file" class="col-12 control-label" style="display:inline-block;">Company Image:</label>
                          <div class="col-12" >
                                @php
                                $no_image = '';
                                $has_image = 'display:none;';
                                if(!isset($marketplace->company_image)){
                                    $no_image = 'display:none;';
                                    $has_image = '';
                                }
                                @endphp
                                <div id="profile-upload" style="{{$has_image}}">    
                                    <input class="form-control" name="file" type="file" value="" required>
                                </div>
                                <div id="portfolio-wrap" style="{{$no_image}}">
                                    <a id="hide-image" class="cfileuploader-action cfileuploader-action-remove" title="Remove"><i></i></a>
                                    <img id="portfolio-image" src="@if(isset($marketplace->company_image)){{$marketplace->company_image}}@endif">
                                </div>    
                          </div>
                    </div>
                        
              </div>
    
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('company_website') ? 'has-error' : '' }}">
        <label for="company_website" class="required">Affiliate Link</label>
            <input class="form-control" name="company_website" type="text" id="company_website" value="{{ old('company_website', optional($marketplace)->company_website) }}" maxlength="255" placeholder="Affiliate Link" required>
            {!! $errors->first('company_website', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    
    
                          <div class="col-md-6" id="category-input">
                                <div class="form-group {{ $errors->has('company_category') ? 'has-error' : '' }}">
                                  <label for="company_category" class="required">Company Category</label>
                                            <select class="form-control" name="company_category" id="category" required>
                                                      <option value="">Select Company Category</option>  
                                                      @php
                                                      $categories = DB::table('categories_marketplaces')->orderBy('title', 'ASC')->get();
                                                      if(isset($marketplace->company_category)) {
                                                      $categories_arr = explode(',', $marketplace->company_category);
                                                      }
                                                      @endphp
                                                      @foreach($categories as $category)
                                                            <option value="{{$category->title}}" @isset($marketplace->company_category)@if(in_array($category->title, $categories_arr)) selected @endif @endisset>{{$category->title}}</option>
                                                      @endforeach
                                            </select>
                                  </div>
                        </div>
    
    
    <!--<div class="form-group {{ $errors->has('company_contact') ? 'has-error' : '' }}">-->
    <!--    <label for="company_contact" class="col-md-2 control-label">{{ trans('marketplaces.company_contact') }}</label>-->
    <!--    <div class="col-md-10">-->
    <!--        <input class="form-control" name="company_contact" type="text" id="company_contact" value="{{ old('company_contact', optional($marketplace)->company_contact) }}" minlength="1" maxlength="100" placeholder="{{ trans('marketplaces.company_contact__placeholder') }}" required>-->
    <!--        {!! $errors->first('company_contact', '<p class="help-block">:message</p>') !!}-->
    <!--    </div>-->
    <!--</div>-->
    
    <!--<div class="form-group {{ $errors->has('company_country') ? 'has-error' : '' }}">-->
    <!--    <label for="company_country" class="col-md-2 control-label">{{ trans('marketplaces.company_country') }}</label>-->
    <!--    <div class="col-md-10">-->
    <!--        <input class="form-control" name="company_country" type="text" id="company_country" value="{{ old('company_country', optional($marketplace)->company_country) }}" maxlength="255" placeholder="{{ trans('marketplaces.company_country__placeholder') }}" required>-->
    <!--        {!! $errors->first('company_country', '<p class="help-block">:message</p>') !!}-->
    <!--    </div>-->
    <!--</div>-->
    
    <!--<div class="form-group {{ $errors->has('company_city') ? 'has-error' : '' }}">-->
    <!--    <label for="company_city" class="col-md-2 control-label">{{ trans('marketplaces.company_city') }}</label>-->
    <!--    <div class="col-md-10">-->
    <!--        <input class="form-control" name="company_city" type="text" id="company_city" value="{{ old('company_city', optional($marketplace)->company_city) }}" maxlength="255" placeholder="{{ trans('marketplaces.company_city__placeholder') }}" required>-->
    <!--        {!! $errors->first('company_city', '<p class="help-block">:message</p>') !!}-->
    <!--    </div>-->
    <!--</div>-->
    
    <!--<div class="form-group {{ $errors->has('company_state') ? 'has-error' : '' }}">-->
    <!--    <label for="company_state" class="col-md-2 control-label">{{ trans('marketplaces.company_state') }}</label>-->
    <!--    <div class="col-md-10">-->
    <!--        <input class="form-control" name="company_state" type="text" id="company_state" value="{{ old('company_city', optional($marketplace)->company_state) }}" maxlength="255" placeholder="{{ trans('marketplaces.company_state__placeholder') }}" required>-->
    <!--        {!! $errors->first('company_state', '<p class="help-block">:message</p>') !!}-->
    <!--    </div>-->
    <!--</div>-->
    
    <!--<div class="form-group {{ $errors->has('company_zip') ? 'has-error' : '' }}">-->
    <!--    <label for="company_zip" class="col-md-2 control-label">{{ trans('marketplaces.company_zip') }}</label>-->
    <!--    <div class="col-md-10">-->
    <!--        <input class="form-control" name="company_zip" type="text" id="company_zip" value="{{ old('company_zip', optional($marketplace)->company_zip) }}" maxlength="255" placeholder="{{ trans('marketplaces.company_zip__placeholder') }}" required>-->
    <!--        {!! $errors->first('company_city', '<p class="help-block">:message</p>') !!}-->
    <!--    </div>-->
    <!--</div>-->
    
    <!--<div class="form-group {{ $errors->has('company_longitude') ? 'has-error' : '' }}">-->
    <!--    <label for="company_city" class="col-md-2 control-label">{{ trans('marketplaces.company_longitude') }}</label>-->
    <!--    <div class="col-md-10">-->
    <!--        <input class="form-control" name="company_longitude" type="text" id="company_longitude" value="{{ old('company_longitude', optional($marketplace)->company_longitude) }}" maxlength="255" placeholder="{{ trans('marketplaces.company_longitude__placeholder') }}" required>-->
    <!--        {!! $errors->first('company_city', '<p class="help-block">:message</p>') !!}-->
    <!--    </div>-->
    <!--</div>-->
    
    <!--<div class="form-group {{ $errors->has('company_latitude') ? 'has-error' : '' }}">-->
    <!--    <label for="company_latitude" class="col-md-2 control-label">{{ trans('marketplaces.company_latitude') }}</label>-->
    <!--    <div class="col-md-10">-->
    <!--        <input class="form-control" name="company_latitude" type="text" id="company_latitude" value="{{ old('company_latitude', optional($marketplace)->company_latitude) }}" maxlength="255" placeholder="{{ trans('marketplaces.company_latitude__placeholder') }}" required>-->
    <!--        {!! $errors->first('company_city', '<p class="help-block">:message</p>') !!}-->
    <!--    </div>-->
    <!--</div>-->
    
    <!--<div class="form-group {{ $errors->has('created_by') ? 'has-error' : '' }}">-->
    <!--    <label for="created_by" class="col-md-2 control-label">{{ trans('marketplaces.created_by') }}</label>-->
    <!--    <div class="col-md-10">-->
    <!--        <select class="form-control" id="created_by" name="created_by" required="true">-->
    <!--        	    <option value="" style="display: none;" {{ old('created_by', optional($marketplace)->created_by ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('marketplaces.created_by__placeholder') }}</option>-->
    <!--        	@foreach ($creators as $key => $creator)-->
    <!--			    <option value="{{ $key }}" {{ old('created_by', optional($marketplace)->created_by) == $key ? 'selected' : '' }}>-->
    <!--			    	{{ $creator }}-->
    <!--			    </option>-->
    <!--			@endforeach-->
    <!--        </select>-->
            
    <!--        {!! $errors->first('created_by', '<p class="help-block">:message</p>') !!}-->
    <!--    </div>-->
    <!--</div>-->
</div>

