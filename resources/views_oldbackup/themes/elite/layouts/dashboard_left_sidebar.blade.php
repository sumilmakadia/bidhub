<div class="page-wrapper" style="min-height: 111px;">
	<div class="container-fluid">
		<div class="row page-titles">
			<div class="col-md-5 align-self-center">
				<h4 class="text-themecolor">@yield('title')</h4>
			</div>
			<div class="col-md-7 align-self-center text-right">
				<div class="d-flex justify-content-end align-items-center">
					<button id="modal" type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Post A New Project</button>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				@yield('content')

			</div>
		</div>
	</div>
</div>
