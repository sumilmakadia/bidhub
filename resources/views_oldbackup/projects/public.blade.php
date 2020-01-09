@extends('layouts.app')

@section('content')
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

				@if(Session::has('success_message'))
					<div class="alert alert-success">
						<span class="glyphicon glyphicon-ok"></span>
						{!! session('success_message') !!}

						<button type="button" class="close" data-dismiss="alert" aria-label="close">
							<span aria-hidden="true">&times;</span>
						</button>

					</div>
				@endif
				@if(count($projects) == 0)
					<div class="panel-body text-center">
						<h4></h4>
					</div>
				@else
					@foreach($projects as $project)
						<div class="col-lg-3 col-md-6">
							<div class="card">
								<a href="{{ route('projects.project.show', $project->id ) }}"><img class="card-img-top img-responsive" src="{{$assets_path_public_eli}}images/big/img1.jpg" alt="Card image cap"></a>


								<div class="card-body">
									<ul class="list-inline font-16">
										<li class="p-l-0"><a href="{{ route('projects.project.show', $project->id ) }}">{{ $project->property_title }}</a></li>
										<li>{{ $project->property_description}}</li>
									</ul>
									<h3 class="font-normal p-0">Status: {{ $project->project_status }}</h3>
									<p class="m-b-0 m-t-10">Expires On: {{ $project->project_expires_on }}</p>
								</div>
							</div>
						</div>
					@endforeach
					{!! $projects->render() !!}
				@endif
			</div>
		</div>
	</div>
@endsection