$(document).ready(function() {
	
    // define the form and the file input
    var $form = $('#myform'),
        $fileuploaderInput = $('input[name="files"]');
    
	// enable fileuploader plugin
	$fileuploaderInput.fileuploader({
        addMore: true,
        changeInput: '<div class="fileuploader-input">' +
					      '<div class="fileuploader-input-inner">' +
							  '<div>${captions.feedback} ${captions.or} <span>${captions.button}</span></div>' +
						  '</div>' +
					  '</div>',
        theme: 'dropin',
        upload: true,
        enableApi: true,
        onSelect: function(item) {
            item.upload = null;
        },
        onRemove: function(item) {
            if (item.data.uploaded)
                $.post('./php/ajax_remove_file.php', {
                    file: item.name
                });
		},
		captions: {
            feedback: 'Drag and drop files here',
            or: 'or',
            button: 'Browse Files'
        }
	});
    
    // form submit
    $form.on('submit', function(e) {
        e.preventDefault();
        
        var formData = new FormData(),
            api = $.fileuploader.getInstance($fileuploaderInput),
            _formInputs = [];
        
        // append form's inputs to the formdata
        // using this long version because of missing method formData.delete() many browsers
        $.each($form.find("[name]:input"), function(index, input) {
            var $input = $(input),
                name = $input.attr('name'),
                type = $input.attr('type') || "",
                value = $input.val();
            
            if ($.inArray(name, _formInputs) > 0)
                return;
            _formInputs.push(name);
            
            if (typeof value == "undefined")
                return true;
            
            if (type == 'file') {
                // add fileuploader files to the formdata
                if (name == $fileuploaderInput.attr('name')) {
                    var files = api.getChoosedFiles();
                    
                    for(var i = 0; i<files.length; i++) {
                        formData.append(name, files[i].file, (files[i].name ? files[i].name : false));
                    }
                    
                    api.disable(true);
                }
            } else {
                formData.append(name, value);
            }
            
        });
        
        $.ajax({
            url: $form.attr('action') || "#",
            data: formData,
            type: $form.attr('method') || 'POST',
            enctype: $form.attr('enctype') || 'multipart/form-data',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $form.find('.form-status').html('<div class="progressbar-holder"><div class="progressbar"></div></div>');
                $form.find('input[type="submit"]').attr('disabled', 'disabled');
            },
            xhr: function() {
                var xhr = $.ajaxSettings.xhr();
                
                if (xhr.upload) {
                    xhr.upload.addEventListener("progress", this.progress, false);
                }
                
                return xhr;
            },
            success: function(result, textStatus, jqXHR) {
                // update input values
                try {
					var data = JSON.parse(result);
                    
                    for(var key in data) {
                        var field = data[key];
                        
                        // if fileuploader input
                        if (field.files) {
                            if (field.hasWarnings) {
                                for (var warning in field.warnings) {
                                    alert(field.warnings[warning]);
                                }
                                
                                return this.error ? this.error(jqXHR, textStatus, field.warnings) : null;
                            }
                            
                            if (key == $fileuploaderInput.attr('name').replace('[]', '')) {
                                // update the fileuploader's file names
                                for (var i = 0; i<field.files.length; i++) {
                                    $.each(api.getChoosedFiles(), function(index, item) {
                                        if (field.files[i].old_name == item.name) {
                                            item.name = field.files[i].name;
                                            item.html.find('.column-title > div:first-child').text(field.files[i].name).attr('title', field.files[0].name);
                                        }
                                        item.data.uploaded = true;
                                    });
                                }
                                
                                api.updateFileList();
                            }
                        } else {
                            $form.find('[name="'+ key +'"]:input').val(field);
                        }
                    }
				} catch (e) {}
                
                api.enable();
                $form.find('.form-status').html('<p class="text-success">Success!</p>');
                $form.find('input[type="submit"]').removeAttr('disabled');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                api.enable();
                $form.find('.form-status').html('<p class="text-error">Error!</p>');
                $form.find('input[type="submit"]').removeAttr('disabled');
            },
            progress: function(e) {
                if (e.lengthComputable) {
                    var t = Math.round(e.loaded * 100 / e.total).toString();
                    
                    $form.find('.form-status .progressbar').css('width', t + '%');
                }
            }
        });
    });
});