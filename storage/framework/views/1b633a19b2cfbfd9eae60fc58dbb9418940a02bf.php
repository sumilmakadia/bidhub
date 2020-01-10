<?php $__env->startSection('content'); ?>
  <div class="page-wrapper" style="min-height: 149px;">
    <div class="container-fluid">
      <div class="row page-titles">
        <div class="col-md-5 align-self-center">
          <h4 class="text-themecolor">Help Wanted</h4>
        </div>

       <?php if($user = Auth::user()): ?>
        <?php if(Auth::user()->role_id == 1 || Auth::user()->help == 1 || Auth::user()->role_id == 8): ?>
        <div class="col-md-7 align-self-center text-right">
          <div class="d-flex justify-content-end align-items-center">
            <a href="<?php echo e(route('help-wanted.help.index')); ?>" class="btn btn-info m-l-15" title="<?php echo e(trans('helps.index')); ?>">
              Manage Help Wanted
            </a>
          </div>
        </div>
        <?php endif; ?>
        <?php if(Auth::user()->role_id != 1 && Auth::user()->help != 1 && Auth::user()->role_id != 8): ?>
        <div class="col-md-7 align-self-center text-right">
          <div class="d-flex justify-content-end align-items-center">
            <a href="/pricing" class="btn btn-info m-l-15" title="<?php echo e(trans('helps.index')); ?>">
              Purchase Help Wanted Add-On To Post
            </a>
          </div>
        </div>
        <?php endif; ?>
        <?php endif; ?>

      </div>
      <div class="row">
        <div class="col-12">
          <?php echo $__env->make('help-wanted/search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="comment-widgets">
            <?php if(count($helps) == 0): ?>
              <div class="panel-body text-center">
                <h4><?php echo e(trans('helps.none_available')); ?></h4>
              </div>
            <?php else: ?>
              <div class="row">
              <?php $__currentLoopData = $helps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $help): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                      <div class="card project-card">
                    <div class="row">
                      <div class="col-12 project-header">
                        <div class="project-title" style="min-height: 60px;">
                            <div class="project-top" style="float:left;">
                              <a href="<?php echo e(route('help-wanted.help.show', $help->id )); ?>">
                            <h3 class="font-normal p-0"><?php echo e($help->title); ?></h3>
                              </a>
                              <p><?php echo e($help->location); ?></p>
                            </div>
                            <div class="project-favorite" style="float:right;">
                                <div class="f-star">
                                    <a href="<?php echo e(route('help-wanted.help.show', $help->id )); ?>" class="btn btn-primary" style="color;#fff;">View Job</a>
                                  </div>
                            </div> 
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-sm-12 col-md-12 col-lg-6 help-info">
                          <div class="row">
                              <div class="col-5 col-sm-5 col-md-4 col-lg-4 project-image" style="float:left;">
                                 <a href="/profiles/show/<?php echo e($help->profile->id); ?>">
                                     <object data="<?php echo e($help->profile->avatar); ?>" type="image/png" style="width:100px;" class="profile-icon">
                                                <img class="profile-icon" src="<?php echo e(asset('public/storage/users/default.png')); ?>" width="100px" height="100px"/>
                                            </object>
                                 </a> 
                              </div>
                              <div class="col-6 col-sm-6 col-md-6 col-lg-6 project-profile" style="float:left;">
                                <p style="font-weight:bold;"><?php echo e($help->profile->company); ?></p>
                                <p><?php echo e($help->profile->first_name); ?> <?php echo e($help->profile->last_name); ?></p>
                                <p><?php echo e($help->profile->type); ?></p>
                            </div>
                          </div>
                      </div>
                      <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                          <div class="row">
                              <div class="col-12 search-contact-method help-trades">
                                <strong>Trades Required</strong>
                                <br><?php echo e(preg_replace('/[ ,]+/', ', ', trim($help->trade))); ?>

                            </div>
                              <div class="col-12 col-sm-12 col-md-12 col-lg-6 search-contact-method help-experience">
                                  <strong>Level of Experience</strong>
                          <br><?php echo e($help->level_of_experience); ?>

                              </div>
                              <div class="col-12 col-sm-12 col-md-12 col-lg-6 search-contact-method mb-20 help-resume">
                                  
                                  <strong>Submit Resume By: </strong>
                                  <?php
                                  $date=date_create($help->date_job_start);
                                                            $date_job_start = date_format($date,"m/d/Y");
                                  ?>
                                  <br><?php echo e($date_job_start); ?>

                            
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>
                      </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            <?php echo $helps->render(); ?>

          <?php endif; ?>
           <!--Comment Row -->
          </div>


        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
  <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC31RpW_gHuAPgLvhNnduoJxTcsZ-IhD9M&libraries=places&callback=initMap"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
  <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" rel="stylesheet" />-->
  <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>-->
  <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.proto.min.js"></script>-->
  <script>
  
  

     
    //  var chosent = $('#trade').chosen().data('chosen');
    // var autoClose = false;
    // var chosen_resultSelect_fnt = chosent.result_select;
    // chosent.search_contains = true;
    
    // chosent.result_select = function(evt) 
    // {
    //     var resultHighlight = null;
    
    //     if(autoClose === false)
    //     {
    //         evt['metaKey'] = true;
    //         evt['ctrlKey'] = true;
    
    //         resultHighlight = chosent.result_highlight;
    //     }
    
    //     var stext = chosent.get_search_text();
    
    //     var result = chosen_resultSelect_fnt.call(chosent, evt);
    
    //     if(autoClose === false && resultHighlight !== null)
    //         resultHighlight.addClass('result-selected');
    
    //     this.search_field.val('');               
    //     this.winnow_results();
    //     this.search_field_scale();
    
    //     return result;
    //  };
  
            
             $('#trade').select2();
               $('.chosen-select').select2();

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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bidhub/bidhub/resources/views/help-wanted/public.blade.php ENDPATH**/ ?>