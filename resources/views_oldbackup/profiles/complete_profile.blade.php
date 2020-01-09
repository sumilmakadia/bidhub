@extends('layouts.app')

@section('content')

	<div class="container m-t-20" style="margin-bottom: 50px">
		<div class="card mx-auto col-10">
			<div class="card-body">
				<div class="progress mb-20">
					<div class="progress-bar bg-success" id="progress_bar" style="width: 0%; height:15px;" role="progressbar">0%</div>
				</div>
				<form method="POST" action="{{ route('profiles.profile.store') }}" enctype="multipart/form-data">
					{{csrf_field()}}
					@include('profiles.form')
					<div class="text-center">
						<button class="btn btn-success btn-block" type="submit">Save profile</button>
					</div>
				</form>
			</div>
		</div>
	</div>

@endsection

@section('js')
	<script defer
	        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtx0audikCJ0HFTFpkCSqLIVPQaOTihnw&libraries=places&callback=initMap">
	</script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
	<script>
              function initMap() {
                  var input = document.getElementById('location');
                  google.maps.event.addDomListener(input, 'keydown', function (event) {
                      if (event.keyCode === 13) {
                          event.preventDefault();
                      }
                      new google.maps.places.Autocomplete(input);
                  });
                  google.maps.event.addDomListener(window, 'load', initialize);
              }

	</script>
	<script>
              $(document).on('ready', function() {
                  $('#trade').select2();
                  $("#avatar").fileinput({
                      maxFileCount: 10,
                      allowedFileTypes: ["image"],
                      browseClass: "btn btn-secondary btn-block",
                      showCaption: false,
                      showRemove: false,
                      showUpload: false
                  });
                  progress();
              });
              function progress() {
                  var inputs = [];
                  inputs[0] = jQuery('#first_name').val();
                  inputs[1] = jQuery('#last_name').val();
                  inputs[2] = jQuery('#bio').val();
                  inputs[3] = jQuery('#avatar').val();
                  inputs[4] = jQuery('#location').val();
                  inputs[5] = jQuery('#age').val();
                  inputs[6] = jQuery('#role').val();
                  inputs[7] = jQuery('#company').val();
                  inputs[8] = jQuery('#license_number').val();
                  inputs[9] = jQuery('#phone').val();
                  inputs[10] = jQuery('#mobile').val();
                  inputs[11] = jQuery('#website').val();
                  inputs[12] = jQuery('#trade').val();
                  var total = 0;

                  for (var i=0; i < inputs.length; i++) {
                      if (inputs[i] != '') {
                              total ++;
                      }
                  }

                  if (total == 13) {
                    jQuery('#progress_bar').css('width', '100%');
                    jQuery('#progress_bar').html('100%');
                  } else {
                    var width = (100/13)*total;
                    width = width.toFixed(0);
                      jQuery('#progress_bar').css('width', width+'%');
                      jQuery('#progress_bar').html(width+'%');
                  }

              }
	</script>
@endsection