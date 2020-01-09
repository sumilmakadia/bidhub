$(document).ready(function() {
	
	// enable fileuploader plugin
	$('input[name="files"]').fileuploader({
		addMore: true,
        thumbnails: {
            onItemShow: function(item) {
                // add sorter button to the item html
                item.html.find('.fileuploader-action-remove').before('<a class="fileuploader-action fileuploader-action-sort" title="Sort"><i></i></a>');
            }
        },
		sorter: {
			selectorExclude: null,
			placeholder: null,
			scrollContainer: window,
			onSort: function(list, listEl, parentEl, newInputEl, inputEl) {
                // onSort callback
			}
		}
	});
	
});