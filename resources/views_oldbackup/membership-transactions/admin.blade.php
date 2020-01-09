@extends('admin.app')

@section('content')


<div class="page-wrapper" style="min-height: 149px;">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Orders</h4>
            </div>
            
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form method="POST" action="/transactions/admin-dashboard/bulk" accept-charset="UTF-8">
                    <input class="btn btn-danger" type="submit" value="Delete Selected" style="margin-left: 20px;cursor:pointer;">
                     {{ csrf_field() }}           
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
                        @if(count($ybrMembership5Transactions) == 0)
                        <div class="panel-body text-center">
                            <h4>{{ trans('ybr_membership2_plans.none_available') }}</h4>
                        </div>
                        @else

                        <div class="table-responsive">
                            
                            <table id="orders" class="table table-striped ">
                                <thead>
                                <tr>
                                <th style="padding-left:11px;background-image:none;"><input type="checkbox" id="ckbCheckAll" value="" /></th>    
                                <th>Order Number</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Membership Start</th>
                                <th>Membership Charge Date</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($ybrMembership5Transactions as $orders)
                                <tr>
                                @if($orders->status == 'Canceled')    
                                <td><input type="checkbox" id="{{ $orders->id }}" value="{{ $orders->id }}" name="order_id[]" class="checkBoxClass"/></td>
                                @else
                                <td><input type="checkbox" id="{{ $orders->id }}" value="{{ $orders->id }}" name="order_id[]" disabled="true"/></td>
                                @endif
                                </form>
                                <td class=""><a href="https://bidhub.com/transactions/show/{{ $orders->id }}">{{ $orders->id }}</a></td>
                                <td class="">@isset($orders->profile->first_name){{ $orders->profile->first_name }}@endisset @isset($orders->profile->last_name){{ $orders->profile->last_name }}@endisset</td>
                                <td class="">@isset($orders->profile->email){{ $orders->profile->email }}@endisset</td>
                                <td class="">{{ $orders->membership_start }}</td>
                                <td class="">{{ $orders->membership_charge_date }}</td>
                                <td class="">${{ $orders->membership_charge }}</td>
                                <td class="">{{ $orders->status }}</td>

                                    <td>
                                        @if($orders->status == 'Canceled')
                                        <form method="POST" action="/transactions/admin-dashboard/destroy" accept-charset="UTF-8">
                                            
                                        @else 
                                        <form method="POST" action="/transactions/admin-dashboard/cancel" accept-charset="UTF-8">
                                        @endif
                                            <input name="id" value="{{ $orders->id }}" type="hidden">
                                            {{ csrf_field() }}
                                            <div class="btn-group btn-group-xs pull-right" role="group">
                                                @if($orders->status == 'Canceled')
                                                <button type="submit" class="btn btn-danger" style="background-color: #a20010;" title="" onclick="return confirm(&quot;{{ 'Are you sure you want to delete this order?'  }}&quot;)">
                                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete
                                                </button>
                                                @else
                                                <button type="submit" class="btn btn-danger" title="" onclick="return confirm(&quot;{{ 'Are you sure you want to cancel this order'  }}&quot;)">
                                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Cancel
                                                </button>
                                                @endif
                                            </div>

                                        </form>

                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            

                        </div>


                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script>
    
        $('#orders').DataTable( {
            columnDefs: [ { orderable: false, targets: 0 }]
        } );
        
        $("#ckbCheckAll").click(function () {
            $(".checkBoxClass").prop('checked', $(this).prop('checked'));
        });
    
</script>
@endsection