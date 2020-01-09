@extends('layouts.app')

@section('content')


<div class="page-wrapper" style="min-height: 149px;">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">{{ trans('chatroom_messages_files.model_plural') }}</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <a href="{{ route('chatroom-messages-files.chatroom_messages_file.create') }}" class="btn btn-info m-l-15" title="{{ trans('chatroom_messages_files.create') }}">
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
                        @if(count($chatroomMessagesFiles) == 0)
                        <div class="panel-body text-center">
                            <h4>{{ trans('chatroom_messages_files.none_available') }}</h4>
                        </div>
                        @else

                        <div class="table-responsive">

                            <table class="table table-striped ">
                                <thead>
                                <tr>
                                                                <th>{{ trans('chatroom_messages_files.file_name') }}</th>

                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($chatroomMessagesFiles as $chatroomMessagesFile)
                                <tr>
                                                                <td class="">{{ $chatroomMessagesFile->file_name }}</td>

                                    <td>

                                        <form method="POST" action="{!! route('chatroom-messages-files.chatroom_messages_file.destroy', $chatroomMessagesFile->id) !!}" accept-charset="UTF-8">
                                            <input name="_method" value="DELETE" type="hidden">
                                            {{ csrf_field() }}

                                            <div class="btn-group btn-group-xs pull-right" role="group">
                                                <a href="{{ route('chatroom-messages-files.chatroom_messages_file.show', $chatroomMessagesFile->id ) }}" class="btn btn-info" title="{{ trans('chatroom_messages_files.show') }}">
                                                    <span class="glyphicon glyphicon-open" aria-hidden="true"></span>View
                                                </a>
                                                <a href="{{ route('chatroom-messages-files.chatroom_messages_file.edit', $chatroomMessagesFile->id ) }}" class="btn btn-primary" title="{{ trans('chatroom_messages_files.edit') }}">
                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit
                                                </a>

                                                <button type="submit" class="btn btn-danger" title="{{ trans('chatroom_messages_files.delete') }}" onclick="return confirm(&quot;{{ trans('chatroom_messages_files.confirm_delete') }}&quot;)">
                                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete
                                                </button>
                                            </div>

                                        </form>

                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $chatroomMessagesFiles->render() !!}

                        </div>


                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection











