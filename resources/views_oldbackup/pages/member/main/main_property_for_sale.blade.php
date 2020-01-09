@extends('themes.elite.app_elite')

@section('title', 'Property For Sale')

@section('content')
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="row">
					
					<div class="col">
						<select name="trades[]" id="trades" class="form-control">
							<option value="">Sort By</option>
						</select>
					</div>

				</div>
			</div>
		</div>
	</div>
	<div class="row el-element-overlay">

		<?php
		for($i = 1; $i <= 8; $i++){
			?>
			<div class="col-lg-3 col-md-6">
				<div class="card">
					<img class="card-img-top img-responsive" src="{{$assets_path_public_eli}}images/big/img1.jpg" alt="Card image cap">
					<div class="card-body">
						<ul class="list-inline font-16">
							<li class="p-l-0">40 Acres</li>
							<li>$29,900</li>
						</ul>
						<h3 class="font-normal p-0">Title</h3>
						<p class="m-b-0 m-t-10">Location</p>
					</div>
				</div>
			</div>
			<?php 
		}
		?>
	</div>
@endsection

