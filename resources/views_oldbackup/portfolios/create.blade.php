@extends('layouts.app')

@section('content')
<div class="page-wrapper" style="min-height: 149px;">
	<div class="container-fluid">
		<div class="row page-titles">
			<div class="col-md-5 align-self-center">
				<h4 class="text-themecolor">{{ trans('portfolios.create') }}</h4>
			</div>
			<div class="col-md-7 align-self-center text-right">
				<div class="d-flex justify-content-end align-items-center">
				  <a href="{{ route('portfolios.portfolio.index') }}" class="btn btn-info m-l-15 float-right" title="{{ trans('portfolios.show_all') }}">
                                          <i class="fa fa-plus-circle"></i> {{ trans('portfolios.show_all') }}
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

                        <form method="POST" action="{{ route('portfolios.portfolio.store') }}" accept-charset="UTF-8" id="create_portfolio_form" name="create_portfolio_form" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @include ('portfolios.form', [
                                                    'portfolio' => null,
                                                  ])

                            <div class="form-group">
                                <div class="col-md-12">
                                    <input class="btn btn-info d-none d-lg-block m-l-15" style="width:100%;margin-top:20px;" type="submit" value="{{ trans('portfolios.add') }}">
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
				ratio: '1:1',
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
    
    // enable fileuploader plugin
   var preloaded = [];
		
		try {
			// preload the files
			preloaded = JSON.parse(result);
		} catch(e) {}
	$('#portfolio-files').fileuploader({
		limit: 10,
        extensions: ['jpg', 'jpeg', 'png', 'gif', 'pdf'],
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
//        editor: {
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

    </script>

	
	<script>
              $(document).on('ready', function() {
                  $('#trade').select2();
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
                  });
                  
                  $('#dir-no').click(function() {
                          $('#add-image').hide();
                  });
                  
                  progress();
                  
                  $( ".select2" ).click(function() {
                      $( "#select-placeholder" ).remove();
                    });
                    
                  $( "#hide-image" ).click(function() {
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
                    
                    $('#trade-input input').attr("placeholder", "Trades").css( "width", "100%" );
                    
                    
                    
                  $(":submit").click(function() {
                      $( "#select-placeholder" ).remove();
                    });  
                  
              });
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


