@extends('layouts.app')

@section('content')
<div class="page-wrapper" style="min-height: 149px;">
	<div class="container-fluid">
		<div class="row page-titles">
			<div class="col-md-5 align-self-center">
				<h4 class="text-themecolor">{{ trans('ybr_membership4_affiliates.create') }}</h4>
			</div>
			<div class="col-md-7 align-self-center text-right">
				<div class="d-flex justify-content-end align-items-center">
				  <a href="{{ route('membership-affiliates.ybr_membership4_affiliate.index') }}" class="btn btn-info m-l-15 float-right" title="{{ trans('ybr_membership4_affiliates.show_all') }}">
                                          <i class="fa fa-plus-circle"></i> {{ trans('ybr_membership4_affiliates.show_all') }}
                                 </a>
                                 	</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">

				<div class="card">
                        <div class="card-body">


			 @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ route('membership-affiliates.ybr_membership4_affiliate.store') }}" accept-charset="UTF-8" id="create_ybr_membership4_affiliate_form" name="create_ybr_membership4_affiliate_form" class="form-horizontal">
                        {{ csrf_field() }}
                        @include ('membership-affiliates.form', [
                                                    'ybrMembership4Affiliate' => null,
                                                  ])

                            <div class="form-group">
                                <div class="col-md-offset-2 col-md-10">
                                    <input class="btn btn-info d-none d-lg-block m-l-15" type="submit" value="{{ trans('ybr_membership4_affiliates.add') }}">
                                </div>
                            </div>

                        </form>


</div>
		</div>

			</div>
		</div>
	</div>
</div>

@endsection


