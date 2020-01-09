@extends('layouts.app')

@section('content')



<div class="page-wrapper" style="min-height: 149px;">
	<div class="container-fluid">
		<div class="row page-titles">
			<div class="col-md-5 align-self-center">
				<h4 class="text-themecolor">{{ trans('ybr_membership3_members.model_plural') }}</h4>
			</div>
			<div class="col-md-7 align-self-center text-right">
				<div class="d-flex justify-content-end align-items-center">
 <a href="{{ route('membership-members.ybr_membership3_member.create') }}" class="btn btn-info m-l-15" title="{{ trans('ybr_membership3_members.create') }}">
                            <i class="fa fa-plus-circle"></i>Create New
                         </a>				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
                        <div class="card-body">
			  @if(Session::has('success_message'))
                    <div class="alert alert-success">
                        <span class="glyphicon glyphicon-ok"></span>
                        {!! session('success_message') !!}

                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>
                @endif
				 @if(count($ybrMembership3Members) == 0)
                            <div class="panel-body text-center">
                                <h4>{{ trans('ybr_membership3_members.none_available') }}</h4>
                            </div>
                        @else

                              <div class="table-responsive">

                                        <table class="table table-striped ">
                                            <thead>
                                                <tr>
                                                    <th>{{ trans('ybr_membership3_members.status') }}</th>

                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($ybrMembership3Members as $ybrMembership3Member)
                                                <tr>
                                                    <td>{{ $ybrMembership3Member->status }}</td>

                                                    <td>

                                                        <form method="POST" action="{!! route('membership-members.ybr_membership3_member.destroy', $ybrMembership3Member->id) !!}" accept-charset="UTF-8">
                                                        <input name="_method" value="DELETE" type="hidden">
                                                        {{ csrf_field() }}

                                                            <div class="btn-group btn-group-xs pull-right" role="group">
                                                                <a href="{{ route('membership-members.ybr_membership3_member.show', $ybrMembership3Member->id ) }}" class="btn btn-info" title="{{ trans('ybr_membership3_members.show') }}">
                                                                    <span class="glyphicon glyphicon-open" aria-hidden="true"></span>View
                                                                </a>
                                                                <a href="{{ route('membership-members.ybr_membership3_member.edit', $ybrMembership3Member->id ) }}" class="btn btn-primary" title="{{ trans('ybr_membership3_members.edit') }}">
                                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit
                                                                </a>

                                                                <button type="submit" class="btn btn-danger" title="{{ trans('ybr_membership3_members.delete') }}" onclick="return confirm(&quot;{{ trans('ybr_membership3_members.confirm_delete') }}&quot;)">
                                                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete
                                                                </button>
                                                            </div>

                                                        </form>

                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                            {!! $ybrMembership3Members->render() !!}

                                    </div>


                         @endif


</div>
		</div>
			</div>
		</div>
	</div>
</div>
@endsection