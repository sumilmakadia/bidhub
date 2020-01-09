@extends('admin.app')
 
@section('content')
 
 
    <div class="page-wrapper" style="min-height: 149px;">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor">Manage Free Directory Postings</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
 
                        <a href="{{ route('directory.directories.create') }}" class="btn btn-info m-l-15" title="{{ trans('directories.create') }}">
                            <i class="fa fa-plus-circle"></i>Create
                        </a></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('directory.free-directories.admin')}}" method="get">
                            {{csrf_field()}}
                            <div class="row"  style="margin:20px 0;">
                                <div class="col-md-2 mrg-btm">
                                        <a href="{{route('directory.free-directories.excel')}}" style="color:#fff;min-height: 38px;display: inline-block;" class="btn btn-green">Upload Directories Excel</a>
                                </div>
                                <div class="col-md-2 mrg-btm">
                                        <a id="sync-trades" class="btn btn-green" href="{{route('directory.free-directories.sync-trades')}}" style="color:#fff;min-height: 38px;display: inline-block;">Sync Trades</a>
                                </div>
                                <div class="col-md-6 mrg-btm">
                                    <input type="text" name="search" class="form-control" @if(isset($search)) value="{{$search}}" @endif placeholder="Search">
                                </div>
                                <div class="col-md-1 mrg-btm">
                                    <button class="btn btn-primary" type="submit" style="min-height: 38px;">Search</button>
                                </div>
                                <div class="col-md-1 mrg-btm">
                                    <button  class="btn btn-danger" style="min-height: 38px;"><a href="{{route('directory.free-directories.admin')}}" style="color:#fff;">Clear</a></button>
                                </div>
                                <!--<div class="col">-->
                                <!-- <a href="/directory/map" class="btn btn-primary" type="button">Map View</a>-->
                                <!--</div>-->
                            </div>
                            </form>
                         
                            @if(Session::has('success_message'))
                                <div class="alert alert-success">
                                    <span class="glyphicon glyphicon-ok"></span>
                                    {!! session('success_message') !!}
 
                                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
 
                                </div>
                            @endif
                            @if(count($uploaded) == 0)
                                <div class="panel-body text-center">
                                    <h4>No Directories</h4>
                                </div>
                            @else
 
                                <div class="table-responsive">
 
                                    <table id="#directory" class="table table-striped ">
                                        <thead>
                                        <tr>
                                            <th>Company Name</th>
                                            <th>Trade</th>
                                            <th>Website</th>
                                            <th>Location</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($uploaded as $upload)
                                            <tr>
                                                <td class="">{{ $upload->businessName }}</td>
                                                <td class="">{{ $upload->category }}</td>
                                                <td class="">{{ $upload->webSite }}</td>
                                                @isset($upload->location)
                                                <td class="">{{ $upload->location }}</td>
                                                @else
                                                <td class="">{{ $upload->street }}@isset($upload->street),@endisset {{ $upload->city }}@isset($upload->city),@endisset {{ $upload->state }}@isset($upload->state),@endisset {{ $upload->postal }}</td>
                                                @endisset
                                                <td>
 
                                                    <form method="POST" action="{!! route('directory.free-directories.destroy', $upload->id) !!}" accept-charset="UTF-8">
                                                        <input name="_method" value="DELETE" type="hidden">
                                                        {{ csrf_field() }}
 
                                                        <div class="btn-group btn-group-xs pull-right" role="group">
                                                            <!--<a href="{{ route('directory.directories.edit', $upload->id ) }}" class="btn btn-info" title="{{ trans('directories.show') }}">-->
                                                            <!-- <span class="glyphicon glyphicon-open" aria-hidden="true"></span>View-->
                                                            <!--</a>-->
                                                            <a href="{{ route('directory.directories.edit', $upload->id ) }}" class="btn btn-primary" title="{{ trans('directories.edit') }}">
                                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit
                                                            </a>
 
                                                            <button type="submit" class="btn btn-danger" title="{{ trans('free-directories.delete') }}" onclick="return confirm(&quot;{{ trans('free-directories.confirm_delete') }}&quot;)">
                                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete
                                                            </button>
                                                        </div>
 
                                                    </form>
 
                                                </td>
                     
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {!! $uploaded->appends(['search' => $search])->render() !!}
 
                                </div>
 
 
                            @endif
 
 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
 

 
       
    $('.approve').click(function (e) {
        e.preventDefault();
 
                $.ajax({
                    type: 'post',
                    url: '/directory/approve',
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                        'is_approved': $(this).data( "is" ),
                        'id': $(this).data( "id" )
                    },
                   success: function(data) {
                        
                      
                        
                       if(data.id.approved == 0){
                           $('#approve-'+data.id.id).css({"background-color": "#00c292", "color": "#fff", "border-color": "#00c292"});
                           $('#approve-'+data.id.id).data('is', 1);
                           $('#approve-'+data.id.id).text('Approve');
                       } else {
                        
                            $('#approve-'+data.id.id).css({"background-color": "#e36a75", "color": "#fff", "border-color": "#e36a75"});
                            $('#approve-'+data.id.id).data('is', 0);
                            $('#approve-'+data.id.id).text('Remove');
                       }
                      
                    } 
                }).done(function(data) {
                     
        });
    });
     
    $('#sync-trades').click(function (e) {
        e.preventDefault();
 
                $.ajax({
                    type: 'post',
                    url: '/directory/free-directories/sync-trades',
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                    },
                   success: function(data) {
                        
                     alert('Trades Synced');
                      
                    } 
                }).done(function(data) {
                     
        });
    });
 
</script> 
@endsection