@extends('layouts.app')

@section('content')


	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="text-themecolor">Create User</h4>
				</div>
				<div class="col-md-7 align-self-center text-right">
					<div class="d-flex justify-content-end align-items-center">
						                    <a href="{{ route('profiles.profile.admin') }}" class="btn btn-info m-l-15" title="{{ trans('profiles.create') }}">
						                        <i class="fa fa-plus-circle"></i>Manage Users
						                    </a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6 mx-auto">
					<div class="card">
						<div class="card-body">
							<form method="POST" action="{{ route('profiles.profile.save_user') }}" autocomplete="off">
								{{csrf_field()}}
								<div class="row">
									<div class="col-12">
										<div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
											<label for="role" class="col-12 control-label">{{ trans('profiles.role') }}</label>
											<div class="col-12">
												<select class="form-control" name="role" id="role">
													@foreach($roles as $role)
													    @if($role->id ==2)
													    @else
														<option value="{{$role->display_name}}">{{$role->display_name}}</option>
														@endif
													@endforeach
												</select>
											</div>
										</div>
									</div>
									<!--<div class="col-12">-->
									<!--	<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">-->
									<!--		<label for="name" class="col-12 control-label">User name</label>-->
									<!--		<div class="col-md-12">-->
									<!--			<input class="form-control" name="name" type="text" id="name" required="true" value="" placeholder="Username" autcomplete="false">-->
									<!--			{!! $errors->first('name', '<p class="help-block">:message</p>') !!}-->
									<!--		</div>-->
									<!--	</div>-->
									<!--</div>-->
									<div class="col-12">
										<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
											<label for="email" class="col-12 control-label">Email</label>
											<div class="col-md-12">
												<input class="form-control" name="email" type="email" id="email" maxlength="100" placeholder="Email" required>
												{!! $errors->first('email', '<p class="help-block">:message</p>') !!}
											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
											<label for="password" class="col-12 control-label">Password</label>
											<div class="col-md-12">
												<input class="form-control" name="password" type="password" id="password" maxlength="100" placeholder="Password" required>
												{!! $errors->first('password', '<p class="help-block">:message</p>') !!}
											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group {{ $errors->has('plan') ? 'has-error' : '' }}">
											<label for="plan" class="col-12 control-label">Plans</label>
											<div class="col-12">
												<select class="form-control" name="plan" id="plan">
												    @php
												    
												    @endphp
													@foreach($plans as $plan)
														<option value="{{$plan->id}}">{{$plan->plan_name}}</option>
													@endforeach
													
												</select>
											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group {{ $errors->has('plan') ? 'has-error' : '' }}">
											<label for="plan" class="col-12">Add-Ons</label>
											<div class="col-12">
											    
													@foreach($addons as $on)
													    @if($on->id == 1)
														<input type="checkbox" name="help" value="{{$on->id}}" style="margin-right:5px"/>{{$on->title}}</br></br>
														@else
														<input type="radio"name="property" value="{{$on->id}}" style="margin-right:5px"/>{{$on->title}}<span style="margin-right: 30px;"></span>
														@endif
													@endforeach
												
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="text-center">
									<button class="btn btn-success btn-block" type="submit">Save User</button>
								</div>
							</form>


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection