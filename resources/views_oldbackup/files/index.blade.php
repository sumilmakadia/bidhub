@extends('layouts.app')

@section('content')


<div class="page-wrapper" style="min-height: 149px;">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">{{ trans('files.model_plural') }}</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <a href="{{ route('files.file.create') }}" class="btn btn-info m-l-15" title="{{ trans('files.create') }}">
                        <i class="fa fa-plus-circle"></i>Create New
                    </a></div>
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
                        @if(count($files) == 0)
                        <div class="panel-body text-center">
                            <h4>{{ trans('files.none_available') }}</h4>
                        </div>
                        @else

                        <div class="table-responsive">

                            <table class="table table-striped ">
                                <thead>
                                <tr>
                                                                <th>{{ trans('files.file_name') }}</th>

                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($files as $file)
                                <tr>
                                                                <td class="">{{ $file->file_name }}</td>

                                    <td>

                                        <form method="POST" action="{!! route('files.file.destroy', $file->id) !!}" accept-charset="UTF-8">
                                            <input name="_method" value="DELETE" type="hidden">
                                            {{ csrf_field() }}

                                            <div class="btn-group btn-group-xs pull-right" role="group">
                                                <a href="{{ route('files.file.show', $file->id ) }}" class="btn btn-info" title="{{ trans('files.show') }}">
                                                    <span class="glyphicon glyphicon-open" aria-hidden="true"></span>View
                                                </a>
                                                <a href="{{ route('files.file.edit', $file->id ) }}" class="btn btn-primary" title="{{ trans('files.edit') }}">
                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit
                                                </a>

                                                <button type="submit" class="btn btn-danger" title="{{ trans('files.delete') }}" onclick="return confirm(&quot;{{ trans('files.confirm_delete') }}&quot;)">
                                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete
                                                </button>
                                            </div>

                                        </form>

                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $files->render() !!}

                        </div>


                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection











