<?php $__env->startSection('content'); ?>
	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="text-themecolor">Map View</h4>
				</div>
				<div class="col-md-7 align-self-center text-right">
					<div class="d-flex justify-content-end align-items-center">
						<a href="/projects/manage" class="btn btn-info m-l-15" title="<?php echo e(trans('helps.index')); ?>">
							Manage Project
						</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="row">
						<div class="col-12">
							<?php echo $__env->make('project-room/search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
						</div>
					</div>
				</div>
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<div id="projectMap" style="width: 100%; height: 600px;"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<input id="baseURL" value="<?php echo e(url('')); ?>" type="hidden">
<?php $__env->stopSection(); ?>



<?php $__env->startSection('js'); ?>
	<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC31RpW_gHuAPgLvhNnduoJxTcsZ-IhD9M&libraries=places&callback=initMap"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
	<script>
              var baseURL = $('#baseURL').val();
              var geocoder;
              var map;
              // var address ="Las Vegas, NV, USA";
              var projects = '<?php echo e($projects); ?>';

	   var addresses = JSON.parse(projects.replace(/&quot;/g,'"'));
	   console.log(addresses);

              function initMap() {

                  geocoder = new google.maps.Geocoder();
                  var latlng = new google.maps.LatLng(38.162578, -100.1989);
                  var myOptions = {
                      zoom: 5,
                      center: latlng,
                      mapTypeId: google.maps.MapTypeId.ROADMAP
                  };
                  map = new google.maps.Map(document.getElementById("projectMap"), myOptions);
                  if (geocoder) {
                    addresses.forEach(function (address) {
                    console.log(address);
                        geocoder.geocode( { 'address': address['location']}, function(results, status) {
                            if (status == google.maps.GeocoderStatus.OK) {
                                if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
                                    // map.setCenter(results[0].geometry.location);
                                    var infowindow = new google.maps.InfoWindow(
                                        { content: '<a href="/projects/show/'+address['id']+'">'+address['title']+'</a>',
                                            size: new google.maps.Size(150,50)
                                        });

                                    var marker = new google.maps.Marker({
                                        position: results[0].geometry.location,
                                        map: map,
                                        title:address['location']
                                    });
                                    google.maps.event.addListener(marker, 'click', function() {
                                        infowindow.open(map,marker);
                                    });

                                } else {
                                   // alert("No results found");
                                   console.log("No results found");
                                }
                            } else {
                                /*alert("Geocode was not successful for the following reason: " + status);*/
                            }
                        });
                    })
                  }
              }
    $('#trade').select2();
    $('#type').select2();
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bidhub/bidhub/resources/views/project-room/map.blade.php ENDPATH**/ ?>