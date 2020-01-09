@extends('layouts.app')

@section('content')


<div class="page-wrapper" style="min-height: 149px;">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">{{ trans('equipments.model_plural') }}</h4>
            </div>
           @php
                $max_post = 0;
                if(Auth::user()->equipment == 2) {$max_post = 5; $max_photos = 10;}
                if(Auth::user()->equipment == 3) {$max_post = 50; $max_photos = 25;}
                if(Auth::user()->equipment == 4) {$max_post = 100; $max_photos = 50;}
            @endphp
             @if (count($equipments) < $max_post && Auth::user()->equipment != 0 || Auth::user()->role_id == 8 || Auth::user()->role_id == 1)
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <a href="{{ route('equipment-for-sale.property.create') }}" class="btn btn-info m-l-15" title="{{ trans('equipments.create') }}">
                        <i class="fa fa-plus-circle"></i>Create New
                    </a></div>
            </div>
            @elseif(Auth::user()->equipment != 4)
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <a href="/pricing" class="btn btn-info m-l-15" title="{{ trans('equipments.create') }}">
                        <i class="fa fa-plus-circle"></i>Upgrade Your Account to List More Properties and Photos
                    </a></div>
            </div>
            @endif
         
         
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
                        @if(count($equipments) == 0)
                        <div class="panel-body text-center">
                            <h4>{{ trans('equipments.none_available') }}</h4>
                        </div>
                        @else

                        <div class="table-responsive">

                            <table class="table table-striped ">
                                <thead>
                                <tr>
                                                                <th>{{ trans('equipments.equipment_title') }}</th>
{{--                            <th>{{ trans('equipments.equipment_contact') }}</th>--}}
{{--                            <th>{{ trans('equipments.equipment_email') }}</th>--}}
{{--                            <th>{{ trans('equipments.equipment_phone') }}</th>--}}
{{--                            <th>{{ trans('equipments.equipment_acres') }}</th>--}}
                            <th>{{ trans('equipments.equipment_cost') }}</th>
{{--                           <th>{{ trans('equipments.parcel_tax_number') }}</th>--}}
                            <th>Location</th>
                            <th>{{ trans('equipments.created_at') }}</th>
                            <th>{{ trans('equipments.updated_at') }}</th>

                                    <th></th>
                                </tr>
                                </thead>
                             
                                <tbody>
                                @foreach($equipments as $equipment)
                                <tr>
                                                                <td class="">{{ $equipment->equipment_title }}</td>
{{--                            <td class="">{{ $equipment->equipment_contact }}</td>--}}
{{--                            <td class="">{{ $equipment->equipment_email }}</td>--}}
{{--                            <td class="">{{ $equipment->equipment_phone }}</td>--}}
 {{--                           <td class="">{{ $equipment->equipment_acres }}</td>--}}
                            <td class="">{{ $equipment->equipment_cost }}</td>
{{--                            <td class="">{{ $equipment->parcel_tax_number }}</td>--}}
                            <td class="">{{ $equipment->location }}</td>
                            <td class="">{{ $equipment->created_at }}</td>
                            <td class="">{{ $equipment->updated_at }}</td>

                                    <td>

                                        <form method="POST" action="{!! route('equipment-for-sale.property.destroy', $equipment->id) !!}" accept-charset="UTF-8">
                                            <input name="_method" value="DELETE" type="hidden">
                                            {{ csrf_field() }}

                                            <div class="btn-group btn-group-xs pull-right" role="group">
                                                <a href="{{ route('equipment-for-sale.property.show', $equipment->id ) }}" class="btn btn-info" title="{{ trans('equipments.show') }}">
                                                    <span class="glyphicon glyphicon-open" aria-hidden="true"></span>View
                                                </a>
                                                <a href="{{ route('equipment-for-sale.property.edit', $equipment->id ) }}" class="btn btn-primary" title="{{ trans('equipments.edit') }}">
                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit
                                                </a>

                                                <button type="submit" class="btn btn-danger" title="{{ trans('equipment.delete') }}" onclick="return confirm(&quot;{{ trans('equipments.confirm_delete') }}&quot;)">
                                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete
                                                </button>
                                            </div>

                                        </form>

                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $equipments->render() !!}

                        </div>


                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection