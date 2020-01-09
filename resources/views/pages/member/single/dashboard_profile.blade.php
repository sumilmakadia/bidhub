@extends('themes.elite.app_elite')

@section('title', 'Profile')

@section('content')
	<div class="row">
		<!-- Column -->
		<div class="col-lg-4 col-xlg-3 col-md-5">
			<div class="card">
				<div class="card-body">
					<center class="m-t-30"><img src="{{$assets_path_public_eli}}images/users/5.jpg" class="img-circle" width="150">
						<h4 class="card-title m-t-10">Full Name</h4>

					</center>
				</div>
				<div class="card-body">
					<p>
					<h6>Company</h6>
					<small class="text-muted"> Accurate Insulation LLC</small>
					</p>
					<p>
					<h6>Contact</h6>
					<small class="text-muted">Bob Burgess</small>
					</p>
					<p>
					<h6>Phone</h6>
					<small class="text-muted">301-627-6505</small>
					</p>
					<p>
					<h6>Mobile</h6>
					<small class="text-muted">301-627-6505</small>
					</p>
					<p>
					<h6>Website</h6>
					<small class="text-muted">www.google.com</small>
					</p>
					<p>
					<h6>Trades Offered</h6>
					<small class="text-muted">Garage Doors, Gutters, Insulation</small>
					</p>
					<p>
					<h6>License Number</h6>
					<small class="text-muted">Garage Doors, Gutters, Insulation</small>
					</p>
					<p>
					<h6>License Number</h6>
					<small class="text-muted">Garage Doors, Gutters, Insulation</small>
					</p>
				</div>
			</div>
		</div>
		<!-- Column -->
		<!-- Column -->
		<div class="col-lg-8 col-xlg-9 col-md-7">
			<div class="card">
				<div class="card-body">
					<p class="m-t-30">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries </p>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<h3>Portfolio</h3>
					<div class="row p-20 p20">
						<div class="col-lg-3 col-md-6 m-b-20">
							<h4>Title</h4>
							<img src="{{$assets_path_public_eli}}images/big/img1.jpg" class="img-responsive radius mb-20">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquam doloremque doloribus enim error ipsa magni nobis nulla porro provident quae quam repellat suscipit, tempore temporibus velit veniam voluptatem voluptatibus.</p>
							<button class="btn btn-primary">View</button>
						</div>
						<div class="col-lg-3 col-md-6 m-b-20">
							<h4>Title</h4>
							<img src="{{$assets_path_public_eli}}images/big/img2.jpg" class="img-responsive radius mb-20">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A alias cum dolorem laboriosam magnam numquam porro quidem rerum tempore. A corporis deleiti distinctio dolore earum facere nemo praesentium tempore totam?</p>
							<button class="btn btn-primary">View</button>
						</div>
						<div class="col-lg-3 col-md-6 m-b-20">
							<h4>Title</h4>
							<img src="{{$assets_path_public_eli}}images/big/img3.jpg" class="img-responsive radius mb-20">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias asperiores dolorum ducimus, eius enim esse id in iste magni natus odio optio perspiciatis, quae, quia recusandae sed ut voluptate voluptates.</p>
							<button class="btn btn-primary">View</button>
						</div>
						<div class="col-lg-3 col-md-6 m-b-20">
							<h4>Title</h4>
							<img src="{{$assets_path_public_eli}}images/big/img4.jpg" class="img-responsive radius mb-20">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium animi, aspernatur blanditiis dignissimos facilis laboriosam modi nobis pariatur qui rem soluta, tempora! A blanditiis dignissimos porro rerum veniam voluptas.</p>
							<button class="btn btn-primary">View</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
