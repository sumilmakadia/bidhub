<div class="row form-row">
    <div class="col-12 required-key">
	    <label class="required-label">* - Required</label>
	</div>
    <input type="hidden" name="postal_code" id="postal_code" value="@if(isset($request)){{$request->postal_code}}@endif">
	<input type="hidden" name="city" id="city" value="@if(isset($request)){{$request->city}}@endif">
	<input type="hidden" name="state_id" id="state_id" value="@if(isset($request)){{$request->state_id}}@endif">
	<input type="hidden" name="state" id="state" value="@if(isset($request)){{$request->state}}@endif">
	<input type="hidden" name="latitude" id="latitude" value="@if(isset($request)){{$request->latitude}}@endif">
	<input type="hidden" name="longitude" id="longitude" value="@if(isset($request)){{$request->longitude}}@endif">
          <div class="col-md-3">
                <div class="form-group">
                    <style>
                    .fileuploader-items {
                        padding-top:10px;
                    }
                    #avatar-img-error {
                        position: absolute;
                        top: -25px;
                        left: 33px;
                    }
                    .help-block, .cl-red{
                            color: #ff0202;
                    }
                    .input-placeholder {
                      position: relative;
                    }
                    .input-placeholder input {
                      
                    }
                    .input-placeholder input:valid + .placeholder {
                      display: none;
                    }
                    
                    .placeholder {
                      position: absolute;
                      pointer-events: none;
                      top: 5px;
                      bottom: 0;
                      height: 25px;
                      font-size: .875rem;
                      left: 28px;
                      margin: auto;
                      color: #7a8288;
                    }
                    .lower-placeholder {
                        top: -15px;
                        left: 32px;
                    }
                    .placeholder span {
                      color: red;
                    }
                    #bio-placeholder {
                        top: -185px;
                        left: 25px;
                    }
                    .panel {
                        background-color: #f9f9f9!important;
                        padding: 0!important;
                    }
                    </style>
                      <label for="file" class="col-8 control-label" style="display:inline-block;text-align: center;">Profile Image</label>
                      <div class="col-12" >
                            @php
                            $no_image = '';
                            $has_image = 'display:none;';
                            if(!isset($profile->avatar)){
                                $no_image = 'display:none;';
                                $has_image = '';
                            }
                            @endphp
                            <div id="profile-upload" style="{{$has_image}}">    
                                <input id="avatar-img" class="form-control" name="file" type="file" value="">
                            </div>
                            <div id="profile-wrap" style="{{$no_image}}">
                                <a id="hide-image" class="cfileuploader-action cfileuploader-action-remove" title="Remove"><i></i></a>
                                <img class="profile-icon" id="profile-image" src="@if(isset($profile->avatar)){{$profile->avatar}}@endif">
                            </div>    
                      </div>
                </div>
                    
          </div>
          <div class="col-md-9">
                              <div class="col-12">
                    <div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
                              <label for="role" class="col-12 required">Select User Type </label>
                                        <select class="form-control input-placeholder" name="role" id="role" onchange="progress()" required>
                                                  @foreach($roles as $role)
                                                            @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 5)
                                                                @if($role->name == 'user')
                                                                    <option value="" @isset($profile->type)) @if($profile->type == $role->display_name) selected @endif @endisset>Select User Type</option>
                                                                @else
                                                                    <option value="{{$role->display_name}}" @isset($profile->type)) @if($profile->type == $role->display_name) selected @endif @endisset>{{$role->display_name}}</option>
                                                                @endif
                                                            @else
                                                            @if ($role->name != 'admin' && $role->name != 'super_admin')
                                                                    @if($role->name == 'user')
                                                                        <option value="" @isset($profile->type)) @if($profile->type == $role->display_name) selected @endif @endisset>Select User Type</option>
                                                                    @else
                                                                        <option value="{{$role->display_name}}" @isset($profile->type)) @if($profile->type == $role->display_name) selected @endif @endisset>{{$role->display_name}}</option>
                                                                    @endif  
                                                            @endif
                                                            @endif
                                                  @endforeach
                                        </select>
                              </div>
                    </div>    
                    <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                              <label for="first_name" class="col-12 required">First Name </label>
                              <div class="col-md-12 input-placeholder">
                                        <input class="form-control" name="first_name" type="text" id="first_name" onchange="progress()" value="{{ old('first_name', optional($profile)->first_name) }}" minlength="1" maxlength="100" required="true" placeholder="First Name">
                                        {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
                              </div>
                    </div>
                    <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                              <label for="last_name" class="col-12 input-placeholder required">Last Name </label>
                              <div class="col-md-12">
                                        <input class="form-control" name="last_name" type="text" id="last_name" onchange="progress()" value="{{ old('last_name', optional($profile)->last_name) }}" maxlength="100" required="true" placeholder="Last Name">
                                        {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
                              </div>
                    </div>
          </div>
         
</div>



<div class="form-group {{ $errors->has('bio') ? 'has-error' : '' }}">
          <label for="bio" class="col-12">Bio</span></label>
          <div class="col-12">
                    <textarea class="form-control" name="bio" cols="50" rows="10" id="bio" onchange="progress()" placeholder="Bio">{{ old('bio', optional($profile)->bio) }}</textarea>
                    {!! $errors->first('bio', '<p class="help-block">:message</p>') !!}
          </div>
          
</div>




<div class="row">
          <div class="col-md-6">
                    <div class="form-group">
                              <label for="location" class="col-md-12">Enter Location</label>
                              <div class="col-12">
                                        <input class="form-control" name="location" type="text" id="location" onchange="progress()" value="{{ old('location', optional($profile)->location) }}" maxlength="255" placeholder="Enter Location">
                              </div>
                    </div></div>

          <!--<div class="col-6">-->

          <!--          <div class="form-group {{ $errors->has('age') ? 'has-error' : '' }}">-->
          <!--                    <label for="age" class="col-12 control-label">{{ trans('profiles.age') }}</label>-->
          <!--                    <div class="col-12">-->
          <!--                              <input class="form-control" name="age" type="number" id="age" onchange="progress()" value="{{ old('age', optional($profile)->age) }}" min="0" max="100" placeholder="{{ trans('profiles.age__placeholder') }}" required="true">-->
          <!--                              {!! $errors->first('age', '<p class="help-block">:message</p>') !!}-->
          <!--                    </div>-->
          <!--          </div></div>-->
          
          <div class="col-6">

                    <div class="form-group">
                              <label for="company" class="col-md-12">Company</label>
                              <div class="col-12">
                                        <input class="form-control" name="company" type="text" id="company" onchange="progress()" value="{{ old('company', optional($profile)->company) }}" maxlength="255" placeholder="Company">
                              </div>
                    </div></div>
          <div class="col-md-6">

                    <div class="form-group {{ $errors->has('license_number') ? 'has-error' : '' }}">
                              <label for="license_number" class="col-12">License Number</label>
                              <div class="col-12">
                                    <textarea class="form-control" name="license_number" id="license_number" onkeyup="textAreaAdjust(this)" onchange="progress()" placeholder="License Number">{{ old('license_number', optional($profile)->license_number) }}</textarea>
                                    <!--<input class="form-control" name="license_number" type="text" id="license_number" onchange="progress()" value="{{ old('license_number', optional($profile)->license_number) }}" placeholder="License Number">-->
                                    {!! $errors->first('license_number', '<p class="help-block">:message</p>') !!}
                              </div>
                    </div></div>
          <div class="col-md-6">
                    <div class="form-group">
                              <label for="trade" class="col-12">Trades</label>
                              <div class="col-12" id="trade-input">
                                        <select class="form-control" name="trade[]" id="trade" onchange="progress()" multiple data-placeholder="Trades">
                                                  @php 
                                                  $trades = DB::table('categories_directories')->orderBy('title', 'ASC')->get(); 
                                                  $trades_arr = explode(',', $profile->trade);
                                                  @endphp
                                                  @foreach($trades as $trade)
                                                        <option value="{{$trade->title}}" {{ in_array($trade->title, $trades_arr) ? 'selected' : '' }}>{{$trade->title}}</option>
                                                  @endforeach
                                        </select>
                              </div>
                    </div>
          </div>          
          <div class="col-md-6">

                    <div class="form-group">
                              <label for="phone" class="col-md-12 required">Phone</label>
                              <div class="col-12 input-placeholder">
                                        <input class="form-control input-placeholder" name="phone" type="text" id="phone" onchange="progress()" value="{{ old('phone', optional($profile)->phone) }}" maxlength="255" required="true" placeholder="Phone">
                              </div>
                    </div></div>
          <div class="col-md-6">

                    <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                              <label for="mobile" class="col-12">Mobile</label>
                              <div class="col-12">
                                        <input class="form-control" name="mobile" type="text" id="mobile" onchange="progress()" value="{{ old('mobile', optional($profile)->mobile) }}" placeholder="Mobile" >
                                        {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
                              </div>
                    </div></div>

          <div class="col-md-6">
                    <div class="form-group {{ $errors->has('website') ? 'has-error' : '' }}">
                              <label for="website" class="col-12">Website</label>
                              <div class="col-12">
                                        <input class="form-control" name="website" type="text" id="website" onchange="progress()" value="{{ old('website', optional($profile)->website) }}" placeholder="Website" >
                                        {!! $errors->first('website', '<p class="help-block">:message</p>') !!}
                              </div>
                    </div>
          </div>

          
          <div class="col-md-6">
                <div class="col-12" style="padding: 10px;"><span style="margin-right:10px;">Do you want to be listed in our directory? </span>
                    @php
                    $checked = '';
                    $no = 'checked';
                    $dis_image = 'display:none;'; 
                    if($profile->directory_listing == 1){
                        $checked = 'checked';
                        $no = '';
                        $dis_image = '';
                    } 
                    @endphp
                    <input id="dir-yes" type="radio" name="directory_listing" value="1" {{$checked}} onchange="progress()"> <span style="margin-right:10px;">Yes</span>
                    <input id="dir-no" type="radio" name="directory_listing" value="0" {{$no}} onchange="progress()"> No
                </div>
          </div>
          <div class="col-md-6">
          </div>
          <!--@if (Auth::user()->role_id != 2)-->
          <div id="add-image" class="col-6" style="margin-bottom:30px;padding:20px;@isset($profile->directory->paid)@if($profile->directory->paid != 'one'){{$dis_image}}@endif @endisset">
                @php
                            $no_image = '';
                            $has_image = 'display:none;';
                            if(!isset($profile->directory->company_image)){
                                $no_image = 'display:none;';
                                $has_image = '';
                            }
                            @endphp
                            <label for="ad">Input Directory Ad Here:</label>
                            <div id="ad-upload" style="{{$has_image}}">    
                                <input id="ad" class="form-control" name="ad" type="file" value="" >
                            </div>
                            <div id="ad-wrap" style="{{$no_image}}">
                                <a id="hide-ad" class="cfileuploader-action cfileuploader-action-remove" title="Remove"><i></i></a>
                                <img class="profile-icon" id="ad-image" src="@isset($profile->directory->company_image){{asset('public/storage'). '/' . $profile->directory->company_image}}@else {{asset('public/storage/users/default.png')}} @endisset">
                            </div>
          </div>
          <!--@endif-->
          
          
          
</div>