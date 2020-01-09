@extends('layouts.app')
@section('title', 'Page Title')
@section('content')

	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="text-themecolor">{{ isset($project->title) ? $project->title : 'Project' }}</h4>
				</div>
				<div class="col-md-7 align-self-center text-right">
					<div class="d-flex justify-content-end align-items-center">
					    @if(Auth::user()->role_id == 6 || Auth::user()->role_id == 8 && Auth::user()->id != $project->created_by)
								<div class="row">
								       <a class="btn btn-primary" href="{{ asset('chat-rooms-new') . '/create-new/?project_id=' . $project->id.'&user_id='. Auth::user()->id.'&project_by='. $project->created_by}}" target="_blank" style="margin-right:10px;">Send Message</a>
								</div>
								@endif
					    @if (Auth::user()->role_id != 2 && Auth::user()->id != $project->created_by)
						<a href="/proposals/create/{{$project->id}}" class="btn btn-success m-l-15" title="">
							Create Proposal
						</a>
						@endif
					<?php $fav_project = \App\Models\Crest\favorite::where('created_by', Auth::user()->id)->where('favorite_type', 'favorite_projects')->where('favorite_id',$project->id)->first(); ?>
						@if ($fav_project)
							<button class="btn btn-warning m-l-15" title="" onclick="unfavoriteProject({{$project->id}})">
								<i class="fa fa-heart"></i>Unfavorite Project
							</button>
						@else
							<button class="btn btn-info m-l-15" title="" onclick="favoriteProject({{$project->id}})">
								<i class="fa fa-heart"></i>Favorite Project
							</button>
						@endif

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-xlg-3 col-md-5">
					<div class="card">
						<div class="card-body">
						    <div style="display:inline-block">
						        @isset($project->profile)
								<div style="float:left;">
									<a href="/profiles/show/{{$project->profile->id}}"><img class="profile-icon" src="{{$project->profile->avatar}}" width="100px" height="100px"/></a>
								</div>
								<div style="float:left;padding-left: 10px;">
    								<strong>{{$project->profile->company}}</strong><br>
    								{{$project->profile->first_name}} {{$project->profile->last_name}}<br>
    								{{$project->profile->type}}
								</div>
								@endisset
							</div>
					</div>
							</div>		
					<div class="card">
						<div class="card-body">	
						    <p>
						    <h6>Preferred Method of Contact</h6>
						    <small class="text-muted">
						        @if(unserialize($project->preferred_contact) !== null)
						        @foreach(unserialize($project->preferred_contact) as $contact)
						            {{ $contact }}<br>
						        @endforeach
						        @endif
					        </small>
						    </p>
							<p>
							<p>
						    <h6>Email</h6>
						    <small class="text-muted"> {{ $project->email }}</small>
						    </p>
							<p>
							<p>
							@if($project->phone !== null)
						    <h6>Phone Number</h6>
						    <small class="text-muted"> {{ $project->phone }}</small>
						    </p>
						    @endif
							<p>
							<h6>Project Start Date</h6>
							@php $date=date_create($project->starts_on); @endphp
							<small class="text-muted"> {{ date_format($date,"m-d-Y") }}</small>
							</p>
							<p>
							<h6>{{ trans('projects.need_bid_by_date') }}</h6>
							@php $date=date_create($project->need_bid_by_date); @endphp
							<small class="text-muted"> {{ date_format($date,"m-d-Y") }}</small>
							</p>
							<p>
							<h6>Trades</h6>
							<small class="text-muted"> {{ $project->trade }}</small>
							</p>
							<p>
							<h6>{{ trans('projects.how_many_units') }}</h6>
							<small class="text-muted"> {{ $project->how_many_units }}</small>
							</p>
							<p>
							<h6>{{ trans('projects.job_type') }}</h6>
							<small class="text-muted"> {{ $project->job_type }}</small>
							</p>
							<p>
							<h6>Location</h6>
							<small class="text-muted"> {{ $project->location }}</small>
							</p>
							<p>
						</div>
					</div>
				</div>
				<div class="col-lg-8 col-xlg-9 col-md-7">
					<div class="card">
						<div class="card-body">
							<p class="m-t-30">{{ $project->description }}</p>
						</div>
					</div>
					<div class="card">
						<div class="card-body">
							<h4>Project Files
							@if(count($files))
							<span style="float:right;"><a href="{{ asset('project-room/download-all' . '/' . $project->id) }}"><button class="btn btn-primary">Download All Files</button></a></span>
							@endif
							</h4>
							<div class="row">
								@foreach ($files as $file)
									<div class="col-lg-2 col-md-4 col-sm-4 m-t-20">
										<div class="row">
										    <div style="width:100%;padding:10px;"><img width="100%" src="{{$file->type ? $file->type->link : $file->file_path}}"></div>
										    @if($file->type)
											<div style="width:100%;padding:10px;">{{$file->file_name}}</div>
											<div style="text-align: center;width: 100%;margin-top: 10px;"><a class="btn btn-primary" href="{{$file->file_path}}">Download</a></div>
											@else
											<div style="width:100%;padding:10px;">{{$file->file_name}}</div>
											<div style="text-align: center;width: 100%;margin-top: 10px;"><a class="btn btn-primary" href="{{$file->file_path}}" target="_blank">View</a></div>
											@endif
										</div>
									</div>
								@endforeach
							</div>
								
						</div>
					</div>
						@if(isset($proposals) && $proposals->count() > 0)
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Proposals</h5>
						</div>
						<!-- ============================================================== -->
						<!-- Comment widgets -->
						<!-- ============================================================== -->
					
							@foreach ($proposals as $proposal)
										<div class="row">
										    <div class="col-lg-12 col-md-12 col-sm-12" style="padding:10px;">
										        <div class="row">
										            <div class="col-lg-4 col-md-12 col-sm-12  col-xs-12 resume-info">
										                <div class="row">
										                    <div class="col-lg-5 col-md-6 col-sm-6 col-6 resume-image">
										                        <object data="{{asset('') . $proposal->user->avatar}}" type="image/png" style="width:90px;" class="profile-icon">
                										            <img width="90" src="{{asset('') . 'storage/users/default.png'}}">
            										            </object>
										                    </div>
										                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
										                        <div class="row">
										                            <div class="col-md-12">
										                                <label style="font-weight:bold;"><a href="/profiles/show/{{Auth::user()->profile->id}}" style="color:black;"> {{$proposal->profile->company}}
											                            @if ($proposal->bid_status == 'declined')
                            											    - declined
                            											@endif
											                            </a></label>
										                            </div>
    										                        <div class="col-md-12">
    										                            <label>{{ $proposal->profile->first_name . ' ' . $proposal->profile->last_name }}</label>
    										                        </div>
    										                        <div class="col-md-12">
    										                            <label>{{ $proposal->profile->type }}</label>
    										                        </div>
										                        </div>
										                    </div>
										                </div>
										            </div>
										            <div class="col-lg-4 col-md-12 col-sm-12  col-12 resume-info resume-message" style="overflow:hidden; text-overflow:ellipsis; line-height:1.4;">
        										        <p>{{$proposal->bid_description}}</p>
										            </div>
										            <div class="col-lg-3 col-md-12 col-sm-12 resume-options">
										                <form method="POST" action="{!! route('proposals.proposal.destroy', $proposal->id) !!}" accept-charset="UTF-8">
														    <input name="_method" value="DELETE" type="hidden">
    														{{ csrf_field() }}
    										                <div class="btn-group btn-group-xs pull-right" role="group">
    										                    @isset($proposal->chatroom)
    															<a href="{{ asset('chat-rooms') . '/' . $proposal->chatroom->id }}" class="btn btn-success" title="{{ trans('proposals.show') }}">
    																<span class="glyphicon glyphicon-open" aria-hidden="true"></span>Chat
    															</a>
    															@else
    															<a href="{{ asset('chat-rooms') . '/create/' . $proposal->project_id . '/' . $proposal->id . '/' . $proposal->project_owner }}" class="btn btn-success" title="{{ trans('proposals.show') }}">
    																<span class="glyphicon glyphicon-open" aria-hidden="true"></span>Chat
    															</a>
    															@endisset
    															<a href="{{asset('proposals/show') . '/' . $proposal->id}}" class="btn btn-info" title="View Resume">
    																<span class="glyphicon glyphicon-open" aria-hidden="true"></span>View
    															</a>
    															<!--<a href="https://bidhub.com/proposals/56/edit" class="btn btn-primary" title="Edit Proposal">-->
    															<!--	<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit-->
    															<!--</a>-->
    
    															<button type="submit" class="btn btn-danger" title="Delete Proposal" onclick="return confirm(&quot;Click Ok to delete Proposal.&quot;)">
    																<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete
    															</button>
    														</div>
											        </div>
										        </div>
										    </div>
										  </div>
										  <hr style="color:#edf1f5; margin:10px 0;">
								@endforeach
						
					</div>
				</div>
				@endif
			</div>
		</div>
	</div>
	<input type="hidden" id="baseURL" value="{{asset('')}}">
@endsection

@section('js')
<script>
	var baseURL = $('#baseURL').val();
	function declineProposal(id) {
	    $.ajax({
	          url: baseURL+'/proposals/decline/'+id+'?type=decline',
	          method: 'get',
	          success: function (res) {
	              window.location.reload();
                    }
	    })
          }

          function restoreProposal(id) {
              $.ajax({
                  url: baseURL+'/proposals/decline/'+id+'?type=restore',
                  method: 'get',
                  success: function (res) {
                      window.location.reload();
                  }
              })
          }

          function unfavoriteProposal(id) {
              $.ajax({
                  url: baseURL+'favorites/create?id='+id+'&&type=proposal',
                  method: 'get',
                  success: function (res) {
                      window.location.reload();
                  }
              })
          }

          function favoriteProposal(id) {
              $.ajax({
                  url: baseURL+'favorites/create?id='+id+'&&type=proposal',
                  method: 'get',
                  success: function (res) {
                      window.location.reload();
                  }
              })
          }

          function favoriteProject(id) {
              $.ajax({
                  url: baseURL+'favorites/favorite?id='+id+'&&type=project',
                  method: 'get',
                  success: function (res) {
                      window.location.reload();
                  }
              })
          }

          function unfavoriteProject(id) {
              $.ajax({
                  url: baseURL+'favorites/favorite?id='+id+'&type=project&is_favorite=1',
                  method: 'get',
                  success: function (res) {
                      window.location.reload();
                  }
              })
          }
</script>
@endsection