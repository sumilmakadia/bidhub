<?php $__env->startSection('content'); ?>

	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="text-themecolor">Equipment For Sale</h4>
				
				</div>
				<?php if($user = Auth::user()): ?>
				<?php if(Auth::user()->role_id == 1 || Auth::user()->property != 0 || Auth::user()->role_id == 8): ?>
				<!--<div class="col-md-7 align-self-center text-right">
					<div class="d-flex justify-content-end align-items-center">
						<a href="<?php echo e(route('equipment-for-sale.property.index')); ?>" class="btn btn-info m-l-15" title="<?php echo e(trans('helps.index')); ?>">
							Manage Equipment
						</a>
					</div>
				</div>-->
				<?php endif; ?>
				
				<div class="col-md-7 align-self-center text-right">
					<div class="d-flex justify-content-end align-items-center">
						<a href="<?php echo e(route('equipment-for-sale.property.create')); ?>" class="btn btn-info m-l-15" title="<?php echo e(trans('helps.index')); ?>">
							Create Equipment
						</a>
					</div>
				</div>
				
				<?php if(Auth::user()->property == 0 && Auth::user()->role_id != 8 && Auth::user()->role_id != 1): ?>
				<!--<div class="col-md-7 align-self-center text-right">
					<div class="d-flex justify-content-end align-items-center">
						<a href="/pricing" class="btn btn-info m-l-15" title="<?php echo e(trans('helps.index')); ?>">
							Purchase Property for Sale Add-On To Post
						</a>
					</div>
				</div>-->
				<?php endif; ?>
					<?php endif; ?>
			</div>
		
			<div class="row">
				<div class="col-12">
					<?php echo $__env->make('equipment-for-sale/search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				</div>
			</div>
			
			<div class="row el-element-overlay">
                <?php
                setlocale(LC_MONETARY, 'en_US.UTF-8');
                ?>
				<?php if(Session::has('success_message')): ?>
					<div class="alert alert-success">
						<span class="glyphicon glyphicon-ok"></span>
						<?php echo session('success_message'); ?>


						<button type="button" class="close" data-dismiss="alert" aria-label="close">
							<span aria-hidden="true">&times;</span>
						</button>

					</div>
				<?php endif; ?>
				<?php if(count($equipments) == 0): ?>
					<div class="panel-body text-center">
						<h4><?php echo e(trans('equipments.none_available')); ?></h4>
					</div>
				<?php else: ?>
					<?php $__currentLoopData = $equipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $equipment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="col-lg-3 col-md-6">
							<div class="card">
								<div class="card-image mh-200">
									<a href="<?php echo e(route('equipment-for-sale.property.show', $equipment->id )); ?>">
										<img class="card-img-top img-responsive" src="<?php echo e(asset($equipment->equipment_image)); ?>" alt=" image cap">
									</a>
								</div>
								<div class="card-body">
									<div class="row mb-20">
										<!--<div class="col">-->
										<!--	<h3 class="m-b-0">Acres</h3>-->
										<!--	<h5 class="font-light"><?php echo e($equipment->equipment_acres); ?></h5>-->
										<!--</div>-->
										<!--<div class="col">-->
										<!--	<h3 class="m-b-0"></h3>-->
										<!--	<h5 class="font-light"></h5>-->
										<!--</div>-->
										<div class="col">
											<h3 class="m-b-0">Price</h3>
											<h5 class="font-light"><?php echo e(money_format('%.2n', $equipment->equipment_cost)); ?></h5>
										</div>
									</div>
									<h3 class="font-normal p-0">
										<a href="<?php echo e(route('equipment-for-sale.property.show', $equipment->id )); ?>">
											<?php echo e($equipment->property_title); ?>

										</a>
									</h3>
									<p><?php echo e(str_limit($equipment->equipment_description,150)); ?></p>
									<p class="m-b-0 m-t-10"><?php echo e($equipment->location); ?></p>


								</div>
							</div>
						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php echo $equipments->render(); ?>

				<?php endif; ?>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
	<script defer
	        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC31RpW_gHuAPgLvhNnduoJxTcsZ-IhD9M&libraries=places&callback=initMap">
	</script>
	<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />-->
	<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>-->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.proto.min.js"></script>
	<script>
	
	

     
    // var chosent = $('#trade').chosen().data('chosen');
    //var autoClose = false;
    //var chosen_resultSelect_fnt = chosent.result_select;
    //chosent.search_contains = true;
    //
    //chosent.result_select = function(evt) 
    //{
    //    var resultHighlight = null;
    //
    //    if(autoClose === false)
    //    {
    //        evt['metaKey'] = true;
    //        evt['ctrlKey'] = true;
    //
    //        resultHighlight = chosent.result_highlight;
    //    }
    //
    //    var stext = chosent.get_search_text();
    //
    //    var result = chosen_resultSelect_fnt.call(chosent, evt);
    //
    //    if(autoClose === false && resultHighlight !== null)
    //        resultHighlight.addClass('result-selected');
    //
    //    this.search_field.val('');               
    //    this.winnow_results();
    //    this.search_field_scale();
    //
    //    return result;
    // };
	

	           $('#trade').chosen();
	           $('.chosen-select').chosen();

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
                        document.getElementById('latitude').value = '';
                        document.getElementById('longitude').value = '';
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bidhub/bidhub/resources/views/equipment-for-sale/public.blade.php ENDPATH**/ ?>