<?php $__env->startSection('content'); ?>
<div class="page-wrapper" style="min-height: 149px;">
	<div class="container-fluid">
		<div class="row page-titles">
			<div class="col-md-5 align-self-center">
				<h4 class="text-themecolor">Create New Free Directory</h4>
			</div>
			<div class="col-md-7 align-self-center text-right">
				<div class="d-flex justify-content-end align-items-center">
				  <a href="<?php echo e(route('directory.free-directories.admin')); ?>" class="btn btn-info m-l-15 float-right" title="<?php echo e(trans('directory.free-directories.admin')); ?>">
                                          <i class="fa fa-plus-circle"></i> Manage Free Directories
                                 </a>
                                 	</div>
			</div>
		</div>
		<div class="row">
			<div class="col-8 mx-auto">

				<div class="card">
                        <div class="card-body">


			 <?php if($errors->any()): ?>
                            <ul class="alert alert-danger">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>

                        <form method="POST" action="<?php echo e(route('directory.directories.store')); ?>" accept-charset="UTF-8" id="create_directories_form" name="create_directories_form" class="form-horizontal" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <?php echo $__env->make('directory.form', [
                                                    'directories' => null,
                                                  ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <div class="form-group">
                                <div class="col-md-offset-2 col-md-10">
                                    <input class="btn btn-info d-none d-lg-block m-l-15" type="submit" value="<?php echo e(trans('directories.add')); ?>">
                                </div>
                            </div>

                        </form>


</div>
		</div>

			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('js'); ?>
	<script defer
	        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC31RpW_gHuAPgLvhNnduoJxTcsZ-IhD9M&libraries=places&callback=initMap">
	</script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
	<script>
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
                  $('#create_directories_form').submit(function() {
                      
                
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
              $("#company_image").fileinput({
                  maxFileCount: 10,
                  allowedFileTypes: ["image"],
                  browseClass: "btn btn-secondary btn-block",
                  showCaption: false,
                  showRemove: false,
                  showUpload: false
              });
              $('#trade').select2();
              
              $('#trade-input input').attr("placeholder", "Trades").css( "width", "100%" );
              });
	</script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bidhub/bidhub/resources/views/directory/create.blade.php ENDPATH**/ ?>