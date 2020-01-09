@extends('layouts.app')
@section('title', 'Page Title')
@section('content')

          <div class="page-wrapper" style="min-height: 149px;">
                    <div class="container-fluid">
                              <div class="row page-titles">
                                        <div class="col-md-5 align-self-center">
                                                  <h4 class="text-themecolor">{{ isset($title) ? $title : 'Proposal' }}</h4>
                                        </div>
                                        <div class="col-md-7 align-self-center text-right">
                                                  <div class="d-flex justify-content-end align-items-center">

                                                  </div>
                                        </div>
                              </div>
                              <div class="row">
                                        <div class="col-lg-4 col-xlg-3 col-md-5">
                                            <div class="card">
                        						<div class="card-body">
                        						    <div style="display:inline-block">
                        								<div style="float:left;">
                        									<a href="/app/profiles/show/{{$proposal->profile->id}}"><img class="profile-icon" src="{{$proposal->profile->avatar}}" width="100px" height="100px"/></a>
                        								</div>
                        								<div style="float:left;padding-left: 10px;">
                            								<strong>{{$proposal->profile->company}}</strong><br>
                            								{{$proposal->profile->first_name}} {{$proposal->profile->last_name}}<br>
                            								{{$proposal->profile->type}}
                        								</div>
                        							</div>
                        					    </div>
                        					</div>
                                                  <div class="card">
                                                            <div class="card-body">
                                                                      <p>
                                                                      <h6>{{ trans('proposals.bid_title') }}</h6>
                                                                      <small class="text-muted"> {{ $proposal->bid_title }}</small>
                                                                      </p>
                                                                      <!--<p>-->
                                                                      <!--<h6>Created By</h6>-->
                                                                      <!--<small class="text-muted"> {{ $proposal->user->name }}</small>-->
                                                                      <!--</p>-->
                                                                      <!--<p>-->
                                                                      <!--<h6>{{ trans('proposals.bid_status') }}</h6>-->
                                                                      <!--<small class="text-muted"> {{ $proposal->bid_status }}</small>-->
                                                                      <!--</p>-->

                                                            </div>
                                                  </div>
                                        </div>
                                        <div class="col-lg-8 col-xlg-9 col-md-7">
                                                  <div class="card">
                                                            <div class="card-body">
                                                                      <p class="m-t-30">{{$proposal->bid_description}}</p>
                                                            </div>
                                                  </div>
                                                  <div class="card">
						<div class="card-body">
							<h4>Additional Files</h4>
							<div class="row">
							    @isset($files)
								@foreach ($files as $file)
									<div class="col-lg-2 col-md-4 col-sm-4 m-t-20">
										<div class="row">
										    @php
										    if($file->file_type == 'pdf'){
										        $src = '/app/public/storage/company/images/PDF-icon-small-231x300.png';
										    } else {
										        $src = $file->file_path;
										    }
										    @endphp
										    <div style="width:100%;padding:10px;"><img width="100%" src="{{$src}}"></div>
										    @if($file->file_type == 'pdf')
											<div style="width:100%;padding:10px;">{{$file->file_name}}</div>
											<div style="text-align: center;width: 100%;margin-top: 10px;"><a class="btn btn-primary" target="_blank" href="{{$file->file_path}}">Download</a></div>
											@else
											<!--<div style="width:100%;padding:10px;">{{$file->file_name}}</div>-->
											<div style="text-align: center;width: 100%;margin-top: 10px;"><a class="btn btn-primary" href="{{$file->file_path}}" target="_blank">View</a></div>
											@endif
										</div>
									</div>
								@endforeach
								@endisset()
							</div>
						</div>
					</div>
                                        </div>
                              </div>
                    </div>
          </div>
@endsection