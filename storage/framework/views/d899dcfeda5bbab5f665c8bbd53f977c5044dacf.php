<?php $__env->startSection('content'); ?>


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
                     <?php echo e(csrf_field()); ?>           
                    <div class="card-body">
                        <?php if(Session::has('success_message')): ?>
                            <div class="alert alert-success">
                                <span class="glyphicon glyphicon-ok"></span>
                                <?php echo session('success_message'); ?>


                                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                            </div>
                        <?php endif; ?>
                        <?php if(count($ybrMembership5Transactions) == 0): ?>
                        <div class="panel-body text-center">
                            <h4><?php echo e(trans('ybr_membership2_plans.none_available')); ?></h4>
                        </div>
                        <?php else: ?>

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
                                <?php $__currentLoopData = $ybrMembership5Transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                <?php if($orders->status == 'Canceled'): ?>    
                                <td><input type="checkbox" id="<?php echo e($orders->id); ?>" value="<?php echo e($orders->id); ?>" name="order_id[]" class="checkBoxClass"/></td>
                                <?php else: ?>
                                <td><input type="checkbox" id="<?php echo e($orders->id); ?>" value="<?php echo e($orders->id); ?>" name="order_id[]" disabled="true"/></td>
                                <?php endif; ?>
                                </form>
                                <td class=""><a href="https://bidhub.com/transactions/show/<?php echo e($orders->id); ?>"><?php echo e($orders->id); ?></a></td>
                                <td class=""><?php if(isset($orders->profile->first_name)): ?><?php echo e($orders->profile->first_name); ?><?php endif; ?> <?php if(isset($orders->profile->last_name)): ?><?php echo e($orders->profile->last_name); ?><?php endif; ?></td>
                                <td class=""><?php if(isset($orders->profile->email)): ?><?php echo e($orders->profile->email); ?><?php endif; ?></td>
                                <td class=""><?php echo e($orders->membership_start); ?></td>
                                <td class=""><?php echo e($orders->membership_charge_date); ?></td>
                                <td class="">$<?php echo e($orders->membership_charge); ?></td>
                                <td class=""><?php echo e($orders->status); ?></td>

                                    <td>
                                        <?php if($orders->status == 'Canceled'): ?>
                                        <form method="POST" action="/transactions/admin-dashboard/destroy" accept-charset="UTF-8">
                                            
                                        <?php else: ?> 
                                        <form method="POST" action="/transactions/admin-dashboard/cancel" accept-charset="UTF-8">
                                        <?php endif; ?>
                                            <input name="id" value="<?php echo e($orders->id); ?>" type="hidden">
                                            <?php echo e(csrf_field()); ?>

                                            <div class="btn-group btn-group-xs pull-right" role="group">
                                                <?php if($orders->status == 'Canceled'): ?>
                                                <button type="submit" class="btn btn-danger" style="background-color: #a20010;" title="" onclick="return confirm(&quot;<?php echo e('Are you sure you want to delete this order?'); ?>&quot;)">
                                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete
                                                </button>
                                                <?php else: ?>
                                                <button type="submit" class="btn btn-danger" title="" onclick="return confirm(&quot;<?php echo e('Are you sure you want to cancel this order'); ?>&quot;)">
                                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Cancel
                                                </button>
                                                <?php endif; ?>
                                            </div>

                                        </form>

                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            

                        </div>


                        <?php endif; ?>


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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bidhub/bidhub/resources/views/membership-transactions/admin.blade.php ENDPATH**/ ?>