@extends('layouts.app')

@section('content')
	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="text-themecolor">{{ !empty($project->title) ? $project->title : 'Project' }}</h4>
				</div>
				<div class="col-md-7 align-self-center text-right">
					<div class="d-flex justify-content-end align-items-center">
						<a href="{{ route('project-room.project.index') }}" class="btn btn-info m-l-15 float-right" title="{{ trans('projects.show_all') }}">
							<i class="fa fa-plus-circle"></i>
							{{ trans('projects.show_all') }}
						</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 mx-auto">
					<div class="card">
						<div class="card-body">
							@if ($errors->any())
								<ul class="alert alert-danger">
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							@endif

							<form method="POST" autocomplete="off" action="{{ route('project-room.project.update', $project->id) }}" id="edit_project_form" name="edit_project_form" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
								{{ csrf_field() }}
								<input name="_method" type="hidden" value="PUT">
								@include ('project-room.form', [
										        'project' => $project,
										      ])

								<div class="form-group">
									<div class="col-md-offset-2 col-md-12">
										<input class="btn btn-info d-lg-block m-l-15" type="submit" style="width: 100%;margin-top: 30px;" value="{{ trans('projects.update') }}">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection


@section('js')


	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
	<script src="{{$assets_path}}assets/fileuploader/dist/jquery.fileuploader.min.js" type="text/javascript"></script>

	<script>
	          //***************************************************************************  
	          //Add to make locations work  
              var location1 = $('input[name="location"]').val();
              var location2;
              //***************************************************************************
              $(document).on('ready', function() {
                $('#trade').select2();
                $('#job-types').select2();
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
                  
                function codeLatLng(lat, lng) {
                    var latlng = new google.maps.LatLng(lat, lng);
                    geocoder.geocode({'latLng': latlng}, function(results, status) {
                    if(status == google.maps.GeocoderStatus.OK) {
                        if(results[1]) {
                            //formatted address
                            var address = results[0].address_components;
                            var coordinates = results[0].geometry.location;
                            for(var i in address) {
                                if(address[i].types[0] == 'locality') {
                                    var geo_city = address[i].short_name;
                                }
                                if(address[i].types[0] == 'administrative_area_level_1') {
                                    var geo_state_id = address[i].short_name;
                                    var geo_state = address[i].long_name;
                                }
                                if(address[i].types[0] == 'postal_code') {
                                    var geo_zipcode = address[i].short_name;
                                }
                            }
                            //---------------------------------------------------------------------------
                            //Add to store latitude and longitude
                            var geo_latitude = coordinates.lat();
                            var geo_longitude = coordinates.lng();
                            //---------------------------------------------------------------------------
                            $('input[name="postal_code"]').val(geo_zipcode);
                            $('input[name="city"]').val(geo_city);
                            $('input[name="state_id"]').val(geo_state_id);
                            $('input[name="state"]').val(geo_state);
                            //---------------------------------------------------------------------------
                            //Add to store latitude and longitude
                            $('input[name="latitude"]').val(geo_latitude);
                            $('input[name="longitude"]').val(geo_longitude);
                            //---------------------------------------------------------------------------
                        } else {
                            alert("No results found");
                        }
                    } else {
                        alert("Geocoder failed due to: " + status);
                    }
                 });
                }
                
                var geocoder = new google.maps.Geocoder();
                geocoder.geocode( { 'address': location1}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                   lat = results[0].geometry.location.lat(); //getting the lat
                   lng = results[0].geometry.location.lng(); //getting the lng
                   codeLatLng(lat, lng);
                 } else {
                        alert("Geocode was not successful for the following reason: " + status);
                        }
                });
                setTimeout(function() {
                    old_zipcode = $('input[name="postal_code"]').val();
                    old_city = $('input[name="city"]').val();
                    old_state_id = $('input[name="state_id"]').val();
                    old_state = $('input[name="state"]').val();
                },500);
                
                
                  
              $('#edit_project_form').submit(function() {
                
                var valid = true;
                
                var required = '<span id="starts_on-error" class="custom-help-block">This field is required.</span>';
                var location_required = '<span id="starts_on-error" class="custom-help-block">You must select a location from the dropdown list</span>';
                
                var location = $('input[name="location"]').val();
                var zipcode = $('input[name="postal_code"]').val();
                var city = $('input[name="city"]').val();
                var state_id = $('input[name="state_id"]').val();
                var state = $('input[name="state"]').val();
                
                $(':invalid').not('form').each(function(i) {
                    $(this).addClass('invalid');
                });
                $(':valid').each(function(i) {
                    $(this).removeClass('invalid');
                });
                
                if(!$('select[name="job_type[]"]').next().find('.select2-selection__choice').length) {
                    $('select[name="job_type[]"]').next().addClass('invalid');
                    $('select[name="job_type[]"]').parents('.form-group').find('.custom-help-block').remove();
                    $('select[name="job_type[]"]').parents('.form-group').append(required);
                  valid = false;
                } else {
                    $('select[name="job_type[]"]').next().removeClass('invalid');
                    $('select[name="job_type[]"]').parents('.form-group').find('.custom-help-block').remove();
                }
                          
                if(!$('select[name="trade[]"]').next().find('.select2-selection__choice').length) {
                    $('select[name="trade[]"]').next().addClass('invalid');
                    $('select[name="trade[]"]').parents('.form-group').find('.custom-help-block').remove();
                    $('select[name="trade[]"]').parents('.form-group').append(required);
                    valid = false;
                }
                else {
                    $('select[name="trade[]"]').next().removeClass('invalid');
                    $('select[name="trade[]"]').parents('.form-group').find('.custom-help-block').remove();
                }
                //***************************************************************************  
                //Add to make locations work
                if(location1 != location2 && !zipcode && !city && !state_id && !state) {
                    $('input[name="location"]').addClass('invalid');
                    $('input[name="location"]').parents('.form-group').find('.custom-help-block').remove();
                    $('input[name="location"]').parents('.form-group').append(location_required);
                    valid = false;
                } else if(location1 == '' && !zipcode && !city && !state_id && !state) {
                        $('input[name="location"]').addClass('invalid');
                        $('input[name="location"]').parents('.form-group').find('.custom-help-block').remove();
                        $('input[name="location"]').parents('.form-group').append(location_required);
                        valid = false;
                    } else {
                    $('input[name="location"]').removeClass('invalid');
                    $('input[name="location"]').parents('.form-group').find('.custom-help-block').remove();
                }
                //***************************************************************************
                return valid;
            });
            
                 // progress();
              });
              
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
	</script>

	<script defer
	        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC31RpW_gHuAPgLvhNnduoJxTcsZ-IhD9M&libraries=places&callback=initMap">
	</script>
	<script>


              
            //       $("#project_image").fileinput({
            //           allowedFileTypes: ["image"],
            //           browseClass: "btn btn-secondary btn-block",
            //           showCaption: false,
            //           showRemove: false,
            //           showUpload: false
            //       });
            //   });

            //   $(document).on('ready', function() {
            //       $("#project_files").fileinput({
            //           maxFileCount: 10,
            //           browseClass: "btn btn-secondary btn-block",
            //           showCaption: false,
            //           showRemove: false,
            //           showUpload: false
            //       });
             
	</script>
	<script type="text/javascript">

   // enable fileuploader plugin
   var preloaded = [];
		
		try {
			// preload the files
			preloaded = JSON.parse(result);
		} catch(e) {}
	$('#project-files').fileuploader({
		limit: 50,
        extensions: ['jpg', 'jpeg', 'png', 'gif', 'docx', 'xls', 'xlsx', 'dwf', 'pdf','zip'],
		changeInput: ' ',
		theme: 'thumbnails',
        enableApi: true,
		addMore: true,
		thumbnails: {
			box: '<div class="fileuploader-items">' +
                      '<ul class="fileuploader-items-list">' +
					      '<li class="fileuploader-thumbnails-input"><div class="fileuploader-thumbnails-input-inner"><i>+</i></div></li>' +
                      '</ul>' +
                  '</div>',
			item: '<li class="fileuploader-item file-has-popup">' +
				       '<div class="fileuploader-item-inner">' +
                           '<div class="type-holder">${extension}</div>' +
                           '<div class="actions-holder">' +
						   	   '<a class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i></i></a>' +
                           '</div>' +
                           '<div class="thumbnail-holder">' +
                               '${image}' +
                               '<span class="fileuploader-action-popup"></span>' +
                           '</div>' +
                           '<div class="content-holder" style="font-family:monospace;"><h5>${name}</h5><span>${size2}</span></div>' +
                       	   '<div class="progress-holder">${progressBar}</div>' +
                       '</div>' +
                  '</li>',
			item2: '<li class="fileuploader-item file-has-popup">' +
				       '<div class="fileuploader-item-inner">' +
                           '<div class="type-holder">${extension}</div>' +
                           '<div class="actions-holder">' +
						   	   '<a href="${file}" class="fileuploader-action fileuploader-action-download" title="${captions.download}" download><i></i></a>' +
						   	   '<a class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i></i></a>' +
                           '</div>' +
                           '<div class="thumbnail-holder">' +
                               '${image}' +
                               '<span class="fileuploader-action-popup"></span>' +
                           '</div>' +
                           '<div class="content-holder" style="font-family:monospace;"><h5>${name}</h5><span>${size2}</span></div>' +
                       	   '<div class="progress-holder">${progressBar}</div>' +
                       '</div>' +
                   '</li>',
			startImageRenderer: true,
            canvasImage: true,
			_selectors: {
				list: '.fileuploader-items-list',
				item: '.fileuploader-item',
				start: '.fileuploader-action-start',
				retry: '.fileuploader-action-retry',
				remove: '.fileuploader-action-remove'
			},
			onImageLoaded: function(item) {
                if (item.choosed && item.reader.node && item.reader.width && !item.hasPopupOpened) {
                    item.hasPopupOpened = true;
                    // item.popup.open();  
                    // item.editor.cropper();
                }
            },
			onItemShow: function(item, listEl, parentEl, newInputEl, inputEl) {
				var plusInput = listEl.find('.fileuploader-thumbnails-input'),
                    api = $.fileuploader.getInstance(inputEl.get(0));
				
                plusInput.insertAfter(item.html)[api.getOptions().limit && api.getChoosedFiles().length >= api.getOptions().limit ? 'hide' : 'show']();
				
				if(item.format == 'image') {
					item.html.find('.fileuploader-item-icon').hide();
                    
                    if (!item.html.find('.fileuploader-action-edit').length)
                        item.html.find('.fileuploader-action-remove').before('<a class="fileuploader-action fileuploader-action-popup fileuploader-action-edit" title="Edit"><i></i></a>');
				}
			},
			onItemRemove: function(html, listEl, parentEl, newInputEl, inputEl) {
				var plusInput = listEl.find('.fileuploader-thumbnails-input'),
					api = $.fileuploader.getInstance(inputEl.get(0));
				
                html.children().animate({'opacity': 0}, 200, function() {
                    setTimeout(function() {
                        html.remove();
						
						if(api.getFiles().length - 1 < api.getOptions().limit) {
							plusInput.show();
						}
                    }, 100);
                });
				
            }
		},
        dragDrop: {
			container: '.fileuploader-thumbnails-input'
		},
//         editor: {
//             cropper: {
// 				ratio: '1:1',
// 				minWidth: 128,
// 				minHeight: 128,
// 				showGrid: true
// 			}
//         },
		afterRender: function(listEl, parentEl, newInputEl, inputEl) {
			var plusInput = listEl.find('.fileuploader-thumbnails-input'),
				api = $.fileuploader.getInstance(inputEl.get(0));
		
			plusInput.on('click', function() {
				api.open();
			});
		}
    });

    $( '.delete-file' ).click(function(e) {
            
		   
		    e.preventDefault();
		    
		    var id = $(this).data( "id" );
		    $('#'+id).hide();
				$.ajax({
					type: 'post',
					url: '/project-room/remove-file',
					data: {
					    '_token': $('meta[name="csrf-token"]').attr('content'),
					    'id': $(this).data( "id" ),
					},
				   success: function(data) {
				       console.log(data);
				       
				       if(data.favorite == 'deleted'){
				           
				           $('#i'+data.id).css({"background-color": "#fff", "color": "#fb9678", "border": "1px solid #fb9678"});
				           $('#a'+data.id).data('is', 0);
				       } else {
				       
				            $('#i'+data.id).css({"background-color": "#00c292", "color": "#fff", "border": "1px solid #00c292"});
				            $('#a'+data.id).data('is', 1);
				       }
				     
					} 
				}).done(function(data) {
				    
				});
		
			
		});

    </script>
@endsection