@extends('layouts.app')

@section('content')
	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="text-themecolor">Map View</h4>
				</div>
				<div class="col-md-7 align-self-center text-right">
					<div class="d-flex justify-content-end align-items-center">
						<a href="{{ route('directory.directories.index') }}" class="btn btn-info m-l-15" title="{{ trans('helps.index') }}">
							Manage Directory
						</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="row">
						<div class="col-12">
							@include('directory/search');
						</div>
					</div>
				</div>
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<div id="directoryMap" style="width: 100%; height: 600px;"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<input id="baseURL" value="{{url('')}}" type="hidden">
@endsection



@section('js')
	<script defer
	        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-S1ObVgxzQSnQUzWPzPEd1syogzIWUV4&libraries=places&callback=initMap">
	</script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
	<script>
              var baseURL = $('#baseURL').val();
              var geocoder;
              var map;
              // var address ="Las Vegas, NV, USA";
              var directoris = '{{($directories)}}';

	   var addresses = JSON.parse(directoris.replace(/&quot;/g,'"'));
	   
              function initMap() {
                  geocoder = new google.maps.Geocoder();
                  var latlng = new google.maps.LatLng(36.162578, -119.1989);
                  var myOptions = {
                      zoom: 5,
                      center: latlng,
                      mapTypeId: google.maps.MapTypeId.ROADMAP
                  };
                  map = new google.maps.Map(document.getElementById("directoryMap"), myOptions);
                  if (geocoder) {
                    addresses.forEach(function (address) {
                        geocoder.geocode( { 'address': address['location']}, function(results, status) {
                            if (status == google.maps.GeocoderStatus.OK) {
                                if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
                                    // map.setCenter(results[0].geometry.location);
                                    var infowindow = new google.maps.InfoWindow(
                                        { content: '<a href="/directory/show/'+address['id']+'">'+address['company_name']+'</a>',
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
                                    alert("No results found");
                                }
                            } else {
                                alert("Geocode was not successful for the following reason: " + status);
                            }
                        });
                    })
                  }
              }

                $('#trade').select2();
              $('#type').select2();
	</script>
@endsection