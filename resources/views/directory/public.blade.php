@extends('layouts.app')

@section('content')


<style>
p {
    margin-bottom: 0px!important;
}
.paid-directory p {
    margin-bottom: 10px!important;
}
</style>

			
	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="text-themecolor">Directory</h4>
				</div>
				@if($user = Auth::user())
				@if (Auth::user()->role_id == 1)
				<div class="col-md-7 align-self-center text-right">
					<div class="d-flex justify-content-end align-items-center">
						<a href="{{ route('directory.directories.index') }}" class="btn btn-info m-l-15" title="{{ trans('directory.directories.index') }}">
							Manage Directory
						</a>
					</div>
				</div>
				@endif
				@endif
			</div>
			
			
			
			<div class="row">
				<div class="col-12">
					@include('directory/search')
				</div>
			</div>
			
			
			<div class="row">
				@if(count($directoriesObjects) == 0)
				<div class="col-md-12 text-center">	<h4>{{ trans('directories.none_available') }}</h4> </div>
				@else
					@foreach($directoriesObjects as $key => $directory)
					<div class="col-12 col-sm-12 col-md-6 col-lg-6">
    						<div class="card paid-directory">
    							<div class="row">
    								    <div class="col-12 col-sm-12 col-md-12 col-lg-4 mrg-btm-lrg">
    										<img src="{{asset('public/storage/' . $directory->company_image)}}" class="" width="100%" height="100%">
    									</div>
    									<div class="col-12 col-sm-12 col-md-12 col-lg-6">
    									    <div class="row">
    									        <div class="col-3">
    									            <img class="profile-icon" style="float:left;margin-right: 10px;" src="@isset($directory->creator->avatar){{asset($directory->creator->avatar)}}@endisset" width="50px" height="50px">
    									        </div>
    									    <div class="col-9"> 
    									        <div class="row">
    									            <div class="col-12">
    										            <a href="@isset($directory->profile->id){{ route('profiles.profile.show', $directory->profile->id) }}@endisset"><h3 class="font-normal p-0 company-name">@isset($directory->company_name){{ $directory->company_name }}@endisset</h3></a>
    									            </div>
    									            <div class="col-12">
    										            <div>{{ $directory->company_contact }}</div>
    									            </div>
    									            <div class="col-12">
    										            <div class="type">{{ $directory->account_type }}</div>
    									            </div>
    									        </div>
    										</div>
    										@php
    										    $doc = new domDocument('1.0', 'UTF-8');
                                                @$doc->loadHTML(mb_convert_encoding(str_limit($directory->company_description, 100),'HTML-ENTITIES', 'UTF-8'));
                                                 $doc->formatOutput=true;
                                                $doc->encoding='UTF-8';
    										    $short_dsec = $doc->saveHTML();
    										@endphp
    										<div class="col-12">
        									    <div id="desc-short{{$directory->id}}" style="margin: 7px 0 0;font-size: 15px;display:inline-block;width: 100%;">{!! $short_dsec !!}</div>
        									</div>
        									<div class="col-12">
        									    <div id="full-desc{{$directory->id}}" style="margin: 7px 0 0;font-size: 15px;display:none;">{!! $directory->company_description !!}</div>
        									</div>
        									@if(strlen($directory->company_description) > 100)
        									<div class="col-12">
        									    <div id="read-more{{$directory->id}}" class="read-more" data-id="{{$directory->id}}">Read More ></div>
        									</div>
        									<div class="col-12">
        									    <div id="read-less{{$directory->id}}" style="display:none;" class="read-less" data-id="{{$directory->id}}">Read Less <</div>
        									</div>
        									@endif
        									<div class="col-12">
            									<div class="search-item-trades">
            										<div style="margin: 8px 0 5px;">
            										<strong>Trades Offered</strong><br>
            											{{  str_replace(",",", ",$directory->trade)}}
            										</div>
            									</div>
        									</div>
        									<div class="col-12">
            									<div class="search-item-trades">
                									<div>
                										{{ isset($directory->company_phone) ? $directory->company_phone . '|' : '' }} {{ $directory->location }}
                									</div>
            									</div>
        									</div>
    								    </div>
    								    </div>
        								<div class="col-sm-2 col-md-12 col-lg-2 col-xl-2 directory-view">
        								<a href="@isset($directory->profile->id){{ route('profiles.profile.show', $directory->profile->id) }}@endisset" class="btn btn-primary btn-orange view-dir">View</a>
        								</div>
    								</div>
    							</div>
    						</div>
				@endforeach
				</div>
				
				
				@if(count($directoriesObjects) % 2 != 0)
				<div class="col-12 col-sm-12 col-md-6 col-lg-6"></div>
				<div class="col-12">
				    {!! $directoriesObjects->appends(['company_name' => $company_name, 'postal_code' => $postal_code, 'trade' => $trade, 'account_type' => $type, 'distance' => $miles, 'city' => $city,
									'state_id' => $state_id, 'state' => $state, 'location' => $location, 'latitude' => $latitude, 'longitude' => $longitude])->render() !!}
				</div>
				@else
				{!! $directoriesObjects->appends(['company_name' => $company_name, 'postal_code' => $postal_code, 'trade' => $trade, 'account_type' => $type, 'distance' => $miles, 'city' => $city,
									'state_id' => $state_id, 'state' => $state, 'location' => $location, 'latitude' => $latitude, 'longitude' => $longitude])->render() !!}
				@endif
				

			@endif
			<!-- Comment Row -->


			</div>

 
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Free Tier</h5>
						</div>
						@if($user = Auth::user())
						@php
						$claimed = DB::table('directory_uploads')->where('approved', 1)->where('user_id', Auth::id())->first();
						$profile = \App\Models\Crest\profile::where('user_id',Auth::user()->id)->first();
						@endphp
						@endif
						
						
						
						
						
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
								<tr>
									<th>Company</th>
									<th>Contact Name</th>
									<th>Phone Number</th>
									<th>Email</th>
									<th>Website</th>
									<th>Location</th>
									<th>Trade</th>
									@isset($claimed)
									<th>Claim</th>
									@else
									<th>Claim</th>
									@endisset
								</tr>
								</thead>
								<tbody>
								@if(count($uploaded) == 0)
									<h4>{{ trans('directories.none_available') }}</h4>
								@else
								
								
								
									@foreach($uploaded as $upload)
										<tr>
										    @php
										    
										    $dir = 0;
										    if(isset($upload->directory->approved)) {
										        $dir = $upload->directory->approved;
    
										    } else if(isset($upload->approved)){
										        $dir = $upload->approved;
										    }

										    @endphp
										    
										    
										    

										    @if(in_array($upload->id,$claimed_listing))
										    
										    <td><a  style="color:#fb9678; font-weight:bold;">{{ $upload->businessName }}</a></td>
										    @else
										    
										    
											<td>{{ $upload->businessName }}</td>
											@endif
																					    
											<td>{{ $upload->contactName }}</td>
											<td>{{ $upload->phoneNumber}}</td>
											<td>{{ $upload->email }}</td>
											<td>{{ $upload->webSite}}</td>
											@isset($upload->location)
											<td>{{ $upload->location }}</td>
											@else
											<td>{{ $upload->street }} @isset($upload->street) , @endif {{ $upload->city }} {{ $upload->state }} {{ $upload->postal }}</td>
											@endisset
											<td>{{ str_replace(",",", ", $upload->category) }}</td>
											@if($user = Auth::user())
											@if(in_array($upload->id,$pending))
											    <td><button id="{{ $upload->id }}" class="btn btn-primary btn-primary" style="background-color:#4181e2; border-color: #4181e2;">Pending Approval</button></td>
									        @elseif(in_array($upload->id,$claimed_listing))
        									    <td><button id="{{ $upload->id }}" class="btn btn-primary btn-blue claim" >Claimed</button></td>
        									@elseif(count($profile) > 0 && $profile->claim_id && $upload->approved)
        									    <td><button id="{{ $upload->id }}" disabled class="btn btn-primary btn-blue claim" style="background-color: #00c292; border-color:#00c292;">Unclaimed</button></td>
        								    @else
        								    
    											
    											<td><button id="{{ $upload->id }}" {{isset($profile->claim_id) && $profile->claim_approved == 0 ? 'disabled' : '' }}{{ isset($profile->claim_id) && $profile->claim_approved == 1 ? 'disabled' : '' }} class="btn btn-primary btn-green claim" data-toggle="modal" data-user="{{ Auth::user()->id }}" data-target="#myModalHorizontal">{{ isset($profile->claim_id) && $profile->claim_approved == 0 ? 'Unclaimed' : 'Claim This Listing' }}</button></td>
    										
    											
									        @endif
									        @endif
										</tr>
										
									@endforeach
									
									{!! $uploaded->appends(['company_name' => $company_name, 'postal_code' => $postal_code, 'trade' => $trade, 'account_type' => $type, 'distance' => $miles, 'city' => $city,
									'state_id' => $state_id, 'state' => $state, 'location' => $location, 'latitude' => $latitude, 'longitude' => $longitude])->render() !!}
								@endif
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		
		</div>
	</div>
	
<!-- Modal -->
	@if($user = Auth::user())
<div class="modal" id="myModalHorizontal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header" style="background: #03a9f3">
            <button type="button" style="position: absolute;right: 14px;color: #fff!important;" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="ion-android-close">X</span></button>
            <h4 class="modal-title" id="myModalLabel" style="color: #fff;">To claim this listing please input the information below and allow 24 hours for a BidHub staff member to review your request. </h4>
        </div>            <!-- Modal Body -->
        <div class="modal-body">
            <form id="claim-listing" action="/directory/claim" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <input class="form-control" name="contact_name" placeholder="Contact Name" required>
                        <input id="dir-id" type="hidden" name="dir_id" value="">
                        <input id="user_id" type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    </div>
                    <div class="col-md-6">
                        <input class="form-control" name="company_name" placeholder="Company Name" required>
                    </div>
                </div>
                <div class="row" style="margin-top:20px">
                    <div class="col-md-6">
                        <input class="form-control" name="phone" placeholder="Phone Number" required>
                    </div>
                    <div class="col-md-6">        
                        <input class="form-control" name="email" placeholder="Email" required>
                    </div>
                </div>
                <input style="margin-top:20px;color:#fff!important;" class="form-control btn btn-primary btn-green" type="submit" value="submit">
            </form>
            </div>
        </div>
    </div>
</div>
@endif
@endsection



@section('js')
	<script defer
	        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC31RpW_gHuAPgLvhNnduoJxTcsZ-IhD9M&libraries=places&callback=initMap">
	</script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
	<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" rel="stylesheet" />-->
	<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>-->
	<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.proto.min.js"></script>-->
	<script>
	
	
// 	var chosen = $('.chosen-select').chosen().data('chosen');
//     var autoClose = false;
//     var chosen_resultSelect_fn = chosen.result_select;
//     chosen.search_contains = true;
    
//     chosen.result_select = function(evt) 
//     {
//         var resultHighlight = null;
    
//         if(autoClose === false)
//         {
//             evt['metaKey'] = true;
//             evt['ctrlKey'] = true;
    
//             resultHighlight = chosen.result_highlight;
//         }
    
//         var stext = chosen.get_search_text();
    
//         var result = chosen_resultSelect_fn.call(chosen, evt);
    
//         if(autoClose === false && resultHighlight !== null)
//             resultHighlight.addClass('result-selected');
    
//         this.search_field.val('');               
//         this.winnow_results();
//         this.search_field_scale();
    
//         return result;
//      };
     
//      var chosent = $('#trade').chosen().data('chosen');
//     var autoClose = false;
//     var chosen_resultSelect_fnt = chosent.result_select;
//     chosent.search_contains = true;
    
//     chosent.result_select = function(evt) 
//     {
//         var resultHighlight = null;
    
//         if(autoClose === false)
//         {
//             evt['metaKey'] = true;
//             evt['ctrlKey'] = true;
    
//             resultHighlight = chosent.result_highlight;
//         }
    
//         var stext = chosent.get_search_text();
    
//         var result = chosen_resultSelect_fnt.call(chosent, evt);
    
//         if(autoClose === false && resultHighlight !== null)
//             resultHighlight.addClass('result-selected');
    
//         this.search_field.val('');               
//         this.winnow_results();
//         this.search_field_scale();
    
//         return result;
//      };
	
	
	$('#trade').select2();
    $('.chosen-select').select2();

	           //$('#trade').chosen();
	           //$('.chosen-select').chosen();

	          //***************************************************************************
              //Add to make locations work
              var location1 = $('input[name="location"]').val();
              var location2;
              //***************************************************************************
              function initMap() {
                  var input = document.getElementById('location');
                 
                      google.maps.event.addDomListener(input, 'keydown', function(event) { 
                        if (event.keyCode === 13) { 
                            event.preventDefault(); 
                        }
                      });
                      var options = {
                          componentRestrictions: {country: "us"}
                      };

                      var autocomplete = new google.maps.places.Autocomplete(input, options);
                      google.maps.event.addListener(autocomplete, 'place_changed', function() {
                        var place = autocomplete.getPlace();
                        
                        //***************************************************************************
                        //Add to make locations work
                        location2 = location1;
                        location1 = $('input[name="location"]').val();
                        //***************************************************************************
                        
                        document.getElementById('postal_code').value = '';
                        document.getElementById('city').value = '';
                        document.getElementById('state_id').value = '';
                        document.getElementById('state').value = '';
                        //---------------------------------------------------------------------------
                        //Add to store latitude and longitude
                        document.getElementById('latitude').value = '';
                        document.getElementById('longitude').value = '';
                        //---------------------------------------------------------------------------
                        
                        for (var i = 0; i < place.address_components.length; i++) {
                          for (var j = 0; j < place.address_components[i].types.length; j++) {
                              
                            if (place.address_components[i].types[j] == "postal_code") {
                              document.getElementById('postal_code').value = place.address_components[i].long_name;
                            }
                            if (place.address_components[i].types[j] == "locality") {
                              document.getElementById('city').value = place.address_components[i].long_name;
                            }  
                            if (place.address_components[i].types[j] == "administrative_area_level_1") {  
                              document.getElementById('state_id').value = place.address_components[i].short_name;
                              document.getElementById('state').value = place.address_components[i].long_name;
                            }  
                    
                            }
                          }
                        //---------------------------------------------------------------------------  
                        //Add to store latitude and longitude  
                        document.getElementById('latitude').value = place.geometry.location.lat();
                        document.getElementById('longitude').value = place.geometry.location.lng();
                        //---------------------------------------------------------------------------
                      });
                      
                  
                  google.maps.event.addDomListener(window, 'load', initMap);
              }
              $( document ).ready(function() {
                  
                  //***************************************************************************
            //Add to make locations work
                $('input[name="location"]').blur(function() {
                      location2 = location1;
                      location1 = $('input[name="location"]').val();
                      if(location1 != location2) {
                          $('input[name="postal_code"]').val('');
                          $('input[name="city"]').val('');
                          $('input[name="state_id"]').val('');
                          $('input[name="state"]').val('');
                          //---------------------------------------------------------------------------
                          //Add to store latitude and longitude
                          $('input[name="latitude"]').val('');
                          $('input[name="longitude"]').val('');
                          //---------------------------------------------------------------------------
                      }
                });
                //***************************************************************************
                
                $('#location-search').submit(function() {
                    
                    var valid = true;
                    
                    var zipcode = $('input[name="postal_code"]').val();
                    var city = $('input[name="city"]').val();
                    var state_id = $('input[name="state_id"]').val();
                    var state = $('input[name="state"]').val();
                    //---------------------------------------------------------------------------
                    //Add to store latitude and longitude
                    var latitude = $('input[name="latitude"]').val();
                    var longitude = $('input[name="longitude"]').val();
                    //---------------------------------------------------------------------------
                    
                    $(':invalid').not('form').each(function(i) {
                        $(this).addClass('invalid');
                    });
                    $(':valid').each(function(i) {
                        $(this).removeClass('invalid');
                    });
                          
                    //***************************************************************************
                    //Add to make locations work
                    if(!location1) {
                        $('input[name="location"]').removeClass('invalid');
                        $('input[name="location"]').attr('placeholder','Enter Location');
                    } else if(!zipcode && !city && !state_id && !state) {
                        $('input[name="location"]').addClass('invalid');
                        $('input[name="location"]').val('');
                        $('input[name="location"]').attr('placeholder','You must select a location from the dropdown list');
                        valid = false;
                    } else {
                        $('input[name="location"]').removeClass('invalid');
                        $('input[name="location"]').parents('.form-group').find('.custom-help-block').remove();
                    }
                    //***************************************************************************
                    return valid;
                });
                  
                  $( ".claim" ).click(function() {
                    var id = $(this).attr('id');
                    var user = $(this).attr('user');
                    $('#dir-id').val(id);
                  });
                  $( ".read-more" ).click(function() {
                    var id = $(this).data( "id" );
                    $('#full-desc'+id).show();
                    $('#desc-short'+id).hide();
                    $('#read-less'+id).show();
                    $('#read-more'+id).hide();
                  });
                  $( ".read-less" ).click(function() {
                    var id = $(this).data( "id" );
                    $('#full-desc'+id).hide();
                    $('#desc-short'+id).show();
                    $('#read-less'+id).hide();
                    $('#read-more'+id).show();
                  });
              });
	</script>
@endsection