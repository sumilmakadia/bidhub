@extends('layouts.app')
@section('content')
<div class="page-wrapper" style="min-height: 149px;">
	<div class="container-fluid">
		<div class="row page-titles">
			<div class="col-md-5 align-self-center">
				<h4 class="text-themecolor">{{ isset($title) ? $title : 'Project' }}</h4>
			</div>
			<div class="col-md-7 align-self-center text-right">
				<div class="d-flex justify-content-end align-items-center">
 <a href="{{ route('projects.project.create') }}" class="btn btn-info m-l-15" title="{{ trans('projects.create') }}">
                            <i class="fa fa-plus-circle"></i>Create New
                         </a>						</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">




			<div class="card">
            <div class="card-body">
            
                        <dt>{{ trans('projects.project_title') }}</dt>
            <dd>{{ $project->project_title }}</dd>
            <dt>{{ trans('projects.project_description') }}</dt>
            <dd>{{ $project->project_description }}</dd>
            <dt>{{ trans('projects.project_status') }}</dt>
            <dd>{{ $project->project_status }}</dd>
            <dt>{{ trans('projects.project_total_units') }}</dt>
            <dd>{{ $project->project_total_units }}</dd>
            <dt>{{ trans('projects.project_starts_on') }}</dt>
            <dd>{{ $project->project_starts_on }}</dd>
            <dt>{{ trans('projects.project_expires_on') }}</dt>
            <dd>{{ $project->project_expires_on }}</dd>
            <dt>{{ trans('projects.project_contact_method') }}</dt>
            <dd>{{ $project->project_contact_method }}</dd>
            <dt>{{ trans('projects.project_files_json') }}</dt>
            <dd>{{ $project->project_files_json }}</dd>
            <dt>{{ trans('projects.project_trade') }}</dt>
            <dd>{{ $project->project_trade }}</dd>
            <dt>{{ trans('projects.project_country') }}</dt>
            <dd>{{ $project->project_country }}</dd>
            <dt>{{ trans('projects.project_state') }}</dt>
            <dd>{{ $project->project_state }}</dd>
            <dt>{{ trans('projects.project_city') }}</dt>
            <dd>{{ $project->project_city }}</dd>
            <dt>{{ trans('projects.project_zip') }}</dt>
            <dd>{{ $project->project_zip }}</dd>
            <dt>{{ trans('projects.project_latitude') }}</dt>
            <dd>{{ $project->project_latitude }}</dd>
            <dt>{{ trans('projects.project_longtitude') }}</dt>
            <dd>{{ $project->project_longtitude }}</dd>
            <dt>{{ trans('projects.created_by') }}</dt>
            <dd>{{ optional($project->creator)->name }}</dd>
            <dt>{{ trans('projects.created_at') }}</dt>
            <dd>{{ $project->created_at }}</dd>
            <dt>{{ trans('projects.updated_at') }}</dt>
            <dd>{{ $project->updated_at }}</dd>

            </div>
            	</div>

		</div>
	</div>
</div>
@endsection