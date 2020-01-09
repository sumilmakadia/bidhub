@extends('layouts.app')

@section('content')

	<div class="container m-t-20" style="margin-bottom: 50px">
		<div class="card mx-auto col-10">
			<div class="card-body">
				<div class="progress mb-20">
					<div class="progress-bar bg-success" id="progress_bar" style="width: 0%; height:15px;" role="progressbar">0%</div>
				</div>
				<form method="POST" id="create_new_profile" action="{{ route('profiles.profile.store') }}" enctype="multipart/form-data">
					{{csrf_field()}}
					@include('profiles.form')
					<input type="hidden" name="user_id" value="{{$profile->user_id}}">
					<div class="text-center">
						<button class="btn btn-success btn-block" type="submit">Save profile</button>
					</div>
				</form>
			</div>
		</div>
	</div>

@endsection

@section('js')
	<script defer
	        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-S1ObVgxzQSnQUzWPzPEd1syogzIWUV4&libraries=places&callback=initMap">
	</script>
	<!-- include summernote css/js -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
    	<script type="text/javascript">
    	
    	function textAreaAdjust(o) {
          o.style.height = "1px";
          o.style.height = (o.scrollHeight)+"px";
        }
    	
    	 var note = $("#bio").summernote({
              height: 300,                 // set editor height
              minHeight: null,             // set minimum height of editor
              maxHeight: null,             // set maximum height of editor
              focus: true,                  // set focus to editable area after initializing summernote
              callbacks: {
              // Clear all formatting of the pasted text
                  onPaste: function (e) {
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                    e.preventDefault();
                    if(/<[a-z][\s\S]*>/i.test(bufferText)) {
                        bufferText = jQuery(bufferText).text().replace(/(\r?\n|\r)+/g,'').trim();
                    }
                    setTimeout( function(){
                      document.execCommand( 'insertText', false, bufferText );
                    }, 10 );
                    console.log(bufferText);
                  }
                }
            });
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
                        
                      })
                      
                  
                  google.maps.event.addDomListener(window, 'load', initMap);
              }
              
              $(document).on('ready', function() {
                  $('#trade').select2();
                  
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
            
            $('#create_new_profile').submit(function() {
                
                var valid = true;
                
                var required = '<span id="starts_on-error" class="custom-help-block">This field is required.</span>';
                var location_required = '<span id="starts_on-error" class="custom-help-block">You must select a location from the dropdown list</span>';
                
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
                
                if($('#dir-yes').prop('checked')) {
                    if(!$('select[name="trade[]"]').next().find('.select2-selection__choice').length) {
                        $('select[name="trade[]"]').next().addClass('invalid');
                        $('select[name="trade[]"]').parents('#trade-input').find('.custom-help-block').remove();
                        $('select[name="trade[]"]').parents('#trade-input').append(required);
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
                    }
                    else if(location1 == '' && !zipcode && !city && !state_id && !state) {
                        $('input[name="location"]').addClass('invalid');
                        $('input[name="location"]').parents('.form-group').find('.custom-help-block').remove();
                        $('input[name="location"]').parents('.form-group').append(location_required);
                        valid = false;
                    }
                    else {
                        $('input[name="location"]').removeClass('invalid');
                        $('input[name="location"]').parents('.form-group').find('.custom-help-block').remove();
                    }
                    //***************************************************************************
                    return valid;
                }
                else {
                    if(location1 != location2 && !zipcode && !city && !state_id && !state && location1 != '') {
                        $('input[name="location"]').addClass('invalid');
                        $('input[name="location"]').parents('.form-group').find('.custom-help-block').remove();
                        $('input[name="location"]').parents('.form-group').append(location_required);
                        valid = false;
                    } else {
                        $('select[name="trade[]"]').next().removeClass('invalid');
                        $('select[name="trade[]"]').parents('.form-group').find('.custom-help-block').remove();
                        $('input[name="location"]').removeClass('invalid');
                        $('input[name="location"]').parents('.form-group').find('.custom-help-block').remove();
                    }
                    return valid;
                }
            });
                  
                  $("#avatar").fileinput({
                      maxFileCount: 10,
                      allowedFileTypes: ["image"],
                      browseClass: "btn btn-secondary btn-block",
                      showCaption: false,
                      showRemove: false,
                      showUpload: false
                  });
                  
                  $('#dir-yes').click(function() {
                          $('#add-image').show();
                          
                          $('label[for="role"]').addClass('required');
                          $('label[for="bio"]').addClass('required');
                          $('label[for="location"]').addClass('required');
                          $('label[for="company"]').addClass('required');
                          $('label[for="trade"]').addClass('required');
                          $('label[for="phone"]').addClass('required');
                          
                          $('#role').prop('required',true);
                          $('#bio').prop('required',true);
                          $('#company').prop('required',true);
                          //$('#phone').prop('required',true);
                          $('#dir-no').removeAttr('checked');
                          
                  });
                  
                  $('#dir-no').click(function() {
                          $('#add-image').hide();
                          
                          $('label[for="role"]').removeClass('required');
                          $('label[for="bio"]').removeClass('required');
                          $('label[for="location"]').removeClass('required');
                          $('label[for="company"]').removeClass('required');
                          $('label[for="trade"]').removeClass('required');
                          $('label[for="phone"]').removeClass('required');
                          
                          $('#role').prop('required',false);
                          $('#bio').prop('required',false);
                          $('#company').prop('required',false);
                          //$('#phone').prop('required',false);
                          $('#dir-yes').removeAttr('checked');
                        
                          $('#image-req').hide();
                  });
                  
                  progress();
                  
                  $( ".select2" ).click(function() {
                      $( "#select-placeholder" ).remove();
                    });
                    
                  $( "#hide-image" ).click(function() {
                      alert('yes');
                      $( "#profile-wrap" ).hide();
                      $( "#profile-upload" ).show();
                    });
                    
                    
                        
                    $("#add-image").on("click", "#remove-two", function(){
                      $( "#edit-window" ).hide();
                      $( "#thumb-two" ).show();
                    });
                    
                    $( "#hide-ad" ).click(function() {
                      $( "#ad-wrap" ).hide();
                      $( "#ad-upload" ).show();
                    });
                    
                   
                    
                    
                    
                  $(":submit").click(function() {
                      $( "#select-placeholder" ).remove();
                    });  
                  
              });

	</script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
		<script src="{{$assets_path}}assets/fileuploader/dist/jquery.fileuploader.min.js" type="text/javascript"></script>
    	<script type="text/javascript">

   $('input[name="file"]').fileuploader({
		limit: 1,
        extensions: ['jpg', 'jpeg', 'png', 'gif'],
		changeInput: ' ',
		theme: 'thumbnails',
        enableApi: true,
		addMore: true,
		thumbnails: {
			box: '<div class="fileuploader-items">' +
                      '<ul class="fileuploader-items-list">' +
					      '<li class="fileuploader-thumbnails-input"><div class="fileuploader-thumbnails-input-inner"><img class="profile-icon" id="ad-image" src="/public/storage/users/default.png"></div></li>' +
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
                    item.popup.open();  
                    item.editor.cropper();
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
        editor: {
            cropper: {
				showGrid: true
			},
        },
		afterRender: function(listEl, parentEl, newInputEl, inputEl) {
			var plusInput = listEl.find('.fileuploader-thumbnails-input'),
				api = $.fileuploader.getInstance(inputEl.get(0));
		
			plusInput.on('click', function() {
				api.open();
			});
		}
    });
    
    $('input[name="ad"]').fileuploader({
		limit: 1,
        extensions: ['jpg', 'jpeg', 'png', 'gif'],
		changeInput: ' ',
		theme: 'thumbnails',
        enableApi: true,
		addMore: true,
		thumbnails: {
			box: '<div class="fileuploader-items">' +
                      '<ul class="fileuploader-items-list-two">' +
					      '<li id="thumb-two" class="fileuploader-thumbnails-input"><div class="fileuploader-thumbnails-input-inner"><i>+</i></div></li>' +
                      '</ul>' +
                  '</div>',
			item: '<li id="edit-window" class="fileuploader-item file-has-popup two-size">' +
				       '<div class="fileuploader-item-inner">' +
                           '<div class="type-holder">${extension}</div>' +
                           '<div class="actions-holder">' +
						   	   '<a id="remove-two" class="fileuploader-action fileuploader-action-remove fileuploader-action-remove" title="${captions.remove}"><i></i></a>' +
                           '</div>' +
                           '<div class="thumbnail-holder">' +
                               '${image}' +
                               '<span class="fileuploader-action-popup"></span>' +
                           '</div>' +
                           '<div class="content-holder"><h5>${name}</h5><span>${size2}</span></div>' +
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
                           '<div class="content-holder"><h5>${name}</h5><span>${size2}</span></div>' +
                       	   '<div class="progress-holder">${progressBar}</div>' +
                       '</div>' +
                   '</li>',
			startImageRenderer: true,
            canvasImage: true,
			_selectors: {
				list: '.fileuploader-items-list-two',
				item: '.fileuploader-item-two',
				start: '.fileuploader-action-start-two',
				retry: '.fileuploader-action-retry-two',
				remove: '.fileuploader-action-remove'
			},
			onImageLoaded: function(item) {
                if (item.choosed && item.reader.node && item.reader.width && !item.hasPopupOpened) {
                    item.hasPopupOpened = true;
                    item.popup.open();  
                    item.editor.cropper();
                }
            },
			onItemShow: function(item, listEl, parentEl, newInputEl, inputEl) {
				var plusInput = listEl.find('.fileuploader-thumbnails-input'),
                    api = $.fileuploader.getInstance(inputEl.get(0));
				
                plusInput.insertAfter(item.html)[api.getOptions().limit && api.getChoosedFiles().length >= api.getOptions().limit ? 'hide' : 'show']();
				
				if(item.format == 'image') {
					item.html.find('.fileuploader-item-icon').hide();
                    
                    if (!item.html.find('.fileuploader-action-edit-two').length)
                        item.html.find('.fileuploader-action-remove').before('<a class="fileuploader-action fileuploader-action-popup fileuploader-action-edit" title="Edit"><i></i></a>');
				}
			},
			onItemRemove: function(html, listEl, parentEl, newInputEl, inputEl) {
				var plusInput = listEl.find('.fileuploader-thumbnails-input-two'),
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
        editor: {
            cropper: {
                ratio: '1.3:1',
				minWidth: 128,
				minHeight: 128,
				showGrid: true
			}
        },
		afterRender: function(listEl, parentEl, newInputEl, inputEl) {
			var plusInput = listEl.find('.fileuploader-thumbnails-input'),
				api = $.fileuploader.getInstance(inputEl.get(0));
		
			plusInput.on('click', function() {
				api.open();
			});
		}
    });

    </script>

	
	<script>
              function progress() {
                  var inputs = [];
                  inputs[0] = jQuery('#first_name').val();
                  inputs[1] = jQuery('#last_name').val();
                  inputs[2] = jQuery('#bio').val();
                  inputs[3] = jQuery('#avatar').val();
                  inputs[4] = jQuery('#location').val();
                  inputs[5] = jQuery('#age').val();
                  inputs[6] = jQuery('#role').val();
                  inputs[7] = jQuery('#company').val();
                  inputs[8] = jQuery('#license_number').val();
                  inputs[9] = jQuery('#phone').val();
                  inputs[10] = jQuery('#mobile').val();
                  inputs[11] = jQuery('#website').val();
                  inputs[12] = jQuery('#trade').val();
                  var total = 0;

                  for (var i=0; i < inputs.length; i++) {
                      if (inputs[i] != '') {
                          total ++;
                      }
                  }

                  if (total == 13) {
                      jQuery('#progress_bar').css('width', '100%');
                      jQuery('#progress_bar').html('100%');
                  } else {
                      var width = (100/13)*total;
                      width = width.toFixed(0);
                      jQuery('#progress_bar').css('width', width+'%');
                      jQuery('#progress_bar').html(width+'%');
                  }

              }
              
              
	</script>
@endsection