@extends('layouts.app')

@section('content')
<style>
.ui-widget-header {
    border: 1px solid #ddd;
    background: #e46a76!important;
    color: #fff!important;
    font-weight: bold;
}
.ui-dialog .ui-dialog-titlebar-close {
    position: absolute;
    right: .3em;
    top: 50%;
    width: 20px;
    margin: -9px 0 0 0;
    padding: 0px 0 1px;
    height: 23px;
}
</style>

<div class="page-wrapper" style="min-height: 149px;">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Transaction History</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                   <a href="/pricing" style="background-color:#e36a75;border-color: #e36a75;" class="btn btn-info m-l-15" title="{{ trans('ybr_membership5_transactions.create') }}">
                     <i class="fa fa-minus-circle"></i>Cancel Subscription or Add-On
                  </a>
                  
                    </div>
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
                        @if(count($ybrMembership5Transactions) == 0)
                        <div class="panel-body text-center">
                            <h4>No Transactions Found</h4>
                        </div>
                        @else

                        <div class="table-responsive">

                            <table class="table table-striped ">
                                <thead>
                                <tr>
                            <th>Item</th>
                            <th>{{ trans('ybr_membership5_transactions.membership_start') }}</th>
                            <th>{{ trans('ybr_membership5_transactions.membership_end') }}</th>
                            <th>{{ trans('ybr_membership5_transactions.membership_charge_date') }}</th>
                            <th>{{ trans('ybr_membership5_transactions.membership_charge') }}</th>
                            @if(Auth::user()->role_id == 1)
                            <th>User</th>
                            @endif
                            <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                            @foreach($ybrMembership5Transactions as $ybrMembership5Transaction)
                                <tr>
                            @if($ybrMembership5Transaction->plan_id == 7)
                            <td class="">Additional Help Post</td>
                            @elseif($ybrMembership5Transaction->plan_id == 1)
                            <td class="">Help Wanted</td>
                            @elseif($ybrMembership5Transaction->plan_id == 2)
                            <td class="">Property for Sale (Standard)</td>
                            @elseif($ybrMembership5Transaction->plan_id == 3)
                            <td class="">Property for Sale (Premium)</td>
                            @elseif($ybrMembership5Transaction->plan_id == 4)
                            <td class="">Property for Sale (Pro)</td>
                            @elseif($ybrMembership5Transaction->plan_id == 6)
                            <td class="">Essentials</td>
                            @elseif($ybrMembership5Transaction->plan_id == 8)
                            <td class="">Premium</td>
                            @endif
                            <td class="">{{ $ybrMembership5Transaction->membership_start }}</td>
                            <td class="">{{ $ybrMembership5Transaction->membership_end }}</td>
                            <td class="" style="color:red; font-weight:bold;">{{ $ybrMembership5Transaction->membership_charge_date }}</td>
                            <td class="">{{ $ybrMembership5Transaction->membership_charge }}</td>
                            @if(Auth::user()->role_id == 1)
                            <td class="">{{ optional($ybrMembership5Transaction->creator)->name }}</td>
                            @endif
                            <td class="">{{ $ybrMembership5Transaction->status }}</td>

                                    <!--<td>-->

                                    <!--    <form method="POST" action="{!! route('admin.membership.transactions.destroy', $ybrMembership5Transaction->id) !!}" accept-charset="UTF-8">-->
                                    <!--        <input name="_method" value="DELETE" type="hidden">-->
                                    <!--        {{ csrf_field() }}-->

                                    <!--        <div class="btn-group btn-group-xs pull-right" role="group">-->
                                                <!--<a href="{{ route('admin.membership.transactions.show', $ybrMembership5Transaction->id ) }}" class="btn btn-info" title="{{ trans('ybr_membership5_transactions.show') }}">-->
                                                <!--    <span class="glyphicon glyphicon-open" aria-hidden="true"></span>View-->
                                                <!--</a>-->
                                                <!--<a href="{{ route('admin.membership.transactions.edit', $ybrMembership5Transaction->id ) }}" class="btn btn-primary" title="{{ trans('ybr_membership5_transactions.edit') }}">-->
                                                <!--    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit-->
                                                <!--</a>-->

                                    <!--            <button type="submit" class="btn btn-danger" title="{{ trans('ybr_membership5_transactions.delete') }}" onclick="return confirm(&quot;{{ trans('ybr_membership5_transactions.confirm_delete') }}&quot;)">-->
                                    <!--                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete-->
                                    <!--            </button>-->
                                    <!--        </div>-->

                                    <!--    </form>-->

                                    <!--</td>-->
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $ybrMembership5Transactions->render() !!}

                        </div>


                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

function ConfirmDialog(message) {
   
    $('<div></div>').appendTo('body')
    .html('<div><h6>'+message+'</h6></div>')
    .dialog({
        modal: true, title: 'Confirm Subscription Cancelation', zIndex: 10000, autoOpen: true,
        width: 'auto', resizable: false,
        buttons: {
            Yes: function () {
                // $(obj).removeAttr('onclick');                                
                // $(obj).parents('.Parent').remove();

                $('body').append('<h1>Confirm Dialog Result: <i>Yes</i></h1>');

                $(this).dialog("close");
                
                ConfirmCancel();
                
            },
            No: function () {                                                                 
                $('body').append('<h1>Confirm Dialog Result: <i>No</i></h1>');

                $(this).dialog("close");
            }
        },
        close: function (event, ui) {
            $(this).remove();
        }
    });
     $('.ui-dialog-titlebar-close').text('X');
};

$( '#cancel-sub' ).click(function(event) {
		    event.preventDefault();
}); 		    

function ConfirmCancel() {

				$.ajax({
					type: 'post',
					url: '/app/subscription/cancel',
					data: {
					    '_token': $('meta[name="csrf-token"]').attr('content'),
					},
				   success: function(data) {
				       
				      //alert('Your subscription has been canceled.');
				      location.reload();
				     
					} 
				}).done(function(data) {
				    
				});
		
			
		 
}		
	</script>
@endsection











