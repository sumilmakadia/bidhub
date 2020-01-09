$(document).ready(function() {
	
	// enable fileupload plugin
	$('input[name="files"]').fileuploader({
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
	
});