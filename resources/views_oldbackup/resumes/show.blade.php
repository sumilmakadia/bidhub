@extends('layouts.app')
@section('title', 'Page Title')
@section('content')

          <div class="page-wrapper" style="min-height: 149px;">
                    <div class="container-fluid">
                              <div class="row page-titles">
                                        <div class="col-md-5 align-self-center">
                                                  <h4 class="text-themecolor">{{ isset($title) ? $title : 'Resume' }}</h4>
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
                        									<a href="/profiles/show/{{$resume->profile->id}}"><img class="profile-icon" src="{{$resume->profile->avatar}}" width="100px" height="100px"/></a>
                        								</div>
                        								<div style="float:left;padding-left: 10px;">
                            								<strong>{{$resume->profile->company}}</strong><br>
                            								{{$resume->profile->first_name}} {{$resume->profile->last_name}}<br>
                            								{{$resume->profile->type}}
                        								</div>
                        							</div>
                        					    </div>
                        					</div>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <p>
                                                            <h6>Job Title</h6>
                                                            <small class="text-muted"> {{ $resume->job_title }}</small>
                                                        </p>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-lg-8 col-xlg-9 col-md-7">
                                                  <div class="card">
                                                            <div class="card-body">
                                                                      <p class="m-t-30">{{$resume->message}}</p>
                                                            </div>
                                                  </div>
                                                  <div class="card">
						<div class="card-body">
							<h4>Additional Files</h4>
							<div class="row">
								@foreach ($resume->resume_files as $file)
									<div class="col-lg-2 col-md-4 col-sm-4 m-t-20">
										<div class="row">
										    @php
										    if($file->file_type == 'pdf' || $file->file_type == 'application/pdf'){
										        $src = 'public/storage/company/images/PDF-icon-small-231x300.png';
										    } else {
										        $src = $file->file_path;
										    }
										    @endphp
										    <div style="width:100%;padding:10px;"><img width="100%" src="/{{$src}}"></div>
										    @if($file->file_type == 'pdf' || $file->file_type == 'application/pdf')
											<div style="width:100%;padding:10px;">{{$file->file_name}}</div>
											<div style="text-align: center;width: 100%;margin-top: 10px;"><a class="btn btn-primary" target="_blank" href="/{{$file->file_path}}">Download</a></div>
											@else
											<!--<div style="width:100%;padding:10px;">{{$file->file_name}}</div>-->
											<div style="text-align: center;width: 100%;margin-top: 10px;"><a class="btn btn-primary" href="/{{$file->file_path}}" target="_blank">View</a></div>
											@endif
										</div>
									</div>
								@endforeach
							</div>
						</div>
					</div>
                                        </div>
                              </div>
                    </div>
          </div>
@endsection