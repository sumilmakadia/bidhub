<?php $__env->startSection('content'); ?>
	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="text-themecolor">Project Room</h4>
				</div>
				<div class="col-md-7 align-self-center text-right">
					<div class="d-flex justify-content-end align-items-center">
						<a href="/projects/manage" class="btn btn-info m-l-15" title="">
							Manage Projects
						</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<?php echo $__env->make('project-room/search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				</div>
			</div>
			<div class="row el-element-overlay">

				<?php if(Session::has('success_message')): ?>
					<div class="alert alert-success">
						<span class="glyphicon glyphicon-ok"></span>
						<?php echo session('success_message'); ?>


						<button type="button" class="close" data-dismiss="alert" aria-label="close">
							<span aria-hidden="true">&times;</span>
						</button>

					</div>
				<?php endif; ?>
				<?php if(count($projects) == 0): ?>
					<div class="panel-body text-center">
						<h4></h4>
					</div>
				<?php else: ?>
					<?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="col-12 col-sm-12 col-md-6 col-lg-6">
							<div class="card project-card">
												<div class="row">
													<div class="col-12 project-header">
														<div class="project-title">
														    <div class="project-top" style="float:left;">
    														    <a href="<?php echo e(url('project-room/show/'.$project->id)); ?>">
    															<h3 class="font-normal p-0"><?php echo e($project->title); ?></h3>
    														    </a>
    														    <p><?php echo e($project->location); ?></p>
    														    <p><strong>Type: </strong><?php echo e(preg_replace('/[,]+/', ', ', trim($project->job_type))); ?></p>
														    </div>
														    <div class="project-favorite" style="float:right;">
														        <?php
														        $style='';
														        $is_favorite = 0;
														        if(count($project->favorite) >= 1) {
														            $is_favorite = 1;
														            $style = 'background-color: #00c292; color: #fff; border: 1px solid #00c292;';
														          }  
														        ?>       
														        <div class="f-star">
														            <a id="a<?php echo e($project->id); ?>" href="" class="favorite" data-is="<?php echo e($is_favorite); ?>" data-id="<?php echo e($project->id); ?>" data-type="project" onclick="event.preventDefault();">
														            <i id="i<?php echo e($project->id); ?>" class="fas fa-star" style="<?php echo e($style); ?>"></i>
														            </a>
														        <a href="<?php echo e(url('project-room/show/'.$project->id)); ?>" class="btn btn-primary" style="color:#fff;">View Job</a></div>
														    </div> 
														</div>
														   
													</div>
												</div>
												<div class="row">
													<div class="col-12 col-sm-12 col-md-12 col-lg-6 project-info">
													    <?php if(isset($project->profile)): ?>
													    <div class="row">
    													    <div class="col-5 col-sm-5 col-md-4 col-lg-4 project-image" style="float:left;">
    													       <a href="/profiles/show/<?php echo e($project->profile->id); ?>">
    													           <object data="<?php echo e($project->profile->avatar); ?>" type="image/png" style="width:100px;" class="profile-icon">
                    										            <img class="profile-icon" src="<?php echo e(asset('public/storage/users/default.png')); ?>" width="100px" height="100px"/>
                										            </object>
    													       </a> 
    													    </div>
    													    <div class="col-6 col-sm-6 col-md-6 col-lg-6 project-profile" style="float:left;">
        														<p style="font-weight:bold;"><?php echo e($project->profile->company); ?></p>
        														<p><?php echo e($project->profile->first_name); ?> <?php echo e($project->profile->last_name); ?></p>
        														<p><?php echo e($project->profile->type); ?></p>
    														</div>
														</div>
													    <?php endif; ?>
													</div>
													<div class="col-12 col-sm-12 col-md-12 col-lg-6">
														<div class="project-trades">
														<strong>Trades Required</strong><br>
																<?php echo e(preg_replace('/[ ,]+/', ', ', trim($project->trade))); ?>

														</div>
														<div class="project-bid" style="margin-top: 10px;">
															<strong>Bid Due By:</strong><br>
																<?php echo e(date("m/d/Y", strtotime($project->need_bid_by_date))); ?>

														</div>
													</div>
												</div>
											</div>
						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php echo $projects->render(); ?>

				<?php endif; ?>
			</div>
		</div>
	</div>
	
	<style>
	    @media  only screen and (max-width: 390px){
        .project-title {min-height: 136px!important;}
        }
	</style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
	<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC31RpW_gHuAPgLvhNnduoJxTcsZ-IhD9M&libraries=places&callback=initMap"></script>
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
                      });
                      
                  
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
            });
              
              $('#trade-input input').attr("placeholder", "Trades").css( "width", "100%" );
              
              $('#trade').select2();
              $('#type').select2();
        
        
        $( '.favorite' ).click(function() {
		    
				$.ajax({
					type: 'post',
					url: '/favorites/favorite',
					data: {
					    '_token': $('meta[name="csrf-token"]').attr('content'),
					    'is_favorite': $(this).data( "is" ),
						'id': $(this).data( "id" ),
						'type': $(this).data( "type" )
					},
				   success: function(data) {
				       
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bidhub/bidhub/resources/views/project-room/public.blade.php ENDPATH**/ ?>