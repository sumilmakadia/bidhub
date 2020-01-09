@extends('layouts.app')

@section('content')
<div class="page-wrapper" style="min-height: 149px;">
	<div class="container-fluid">
		<div class="row page-titles">
			<div class="col-md-5 align-self-center">
				<h4 class="text-themecolor">{{ trans('proposals.create') }}</h4>
			</div>
			<div class="col-md-7 align-self-center text-right">
				<div class="d-flex justify-content-end align-items-center">
				  <a href="{{ route('proposals.proposal.index') }}" class="btn btn-info m-l-15 float-right" title="{{ trans('proposals.show_all') }}">
                                          <i class="fa fa-plus-circle"></i> {{ trans('proposals.show_all') }}
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

                        <form method="POST" autocomplete="off" action="{{ route('proposals.proposal.store') }}" accept-charset="UTF-8" id="create_proposal_form" name="create_proposal_form" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @include ('proposals.form', [
                                                    'proposal' => null,
                                                  ])

			<input type="hidden" name="project_id" value="{{$id}}" />
                            <div class="form-group">
                                <div class="col-md-offset-2 col-md-10">
                                    <input class="btn btn-info d-none d-lg-block m-l-15" type="submit" value="{{ trans('proposals.add') }}">
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
    $(document).on('ready', function() {
        $('#trade').select2();
        
    });
</script>
<script type="text/javascript">

   // enable fileuploader plugin
   var preloaded = [];
		
		try {
			// preload the files
			preloaded = JSON.parse(result);
		} catch(e) {}
	$('#proposal-files').fileuploader({
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

    $( '.delete-file' ).click(function(e) {
            
		   
		    e.preventDefault();
		    
		    var id = $(this).data( "id" );
		    $('#'+id).hide();
				$.ajax({
					type: 'post',
					url: '/app/help-wanted/remove-file',
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