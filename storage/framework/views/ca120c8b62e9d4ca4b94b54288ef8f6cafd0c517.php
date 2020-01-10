<?php $__env->startSection('content'); ?>


<div class="page-wrapper" style="min-height: 149px;">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Membership Plans</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <a href="<?php echo e(route('admin.membership.plans.ybr_membership2_plan.create')); ?>" class="btn btn-info m-l-15" title="<?php echo e(trans('ybr_membership2_plans.create')); ?>">
                        <i class="fa fa-plus-circle"></i>Create New
                    </a>
                    </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
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
                        <?php if(count($ybrMembership2Plans) == 0): ?>
                        <div class="panel-body text-center">
                            <h4><?php echo e(trans('ybr_membership2_plans.none_available')); ?></h4>
                        </div>
                        <?php else: ?>

                        <div class="table-responsive">

                            <table class="table table-striped ">
                                <thead>
                                <tr>
                                                                
                            <th><?php echo e(trans('ybr_membership2_plans.plan_name')); ?></th>
                            <th><?php echo e(trans('ybr_membership2_plans.plan_amount')); ?></th>
                            <th><?php echo e(trans('ybr_membership2_plans.plan_interval')); ?></th>

                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $ybrMembership2Plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ybrMembership2Plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <?php $planarray = array('13','14','15'); ?>
                                <?php if(!in_array($ybrMembership2Plan->id,$planarray)): ?>
                                <tr>
                                
                                <td class=""><?php echo e($ybrMembership2Plan->plan_name); ?></td>
                                <td class="">$<?php echo e($ybrMembership2Plan->plan_amount); ?></td>
                                <td class=""><?php echo e($ybrMembership2Plan->plan_interval); ?></td>

                                    <td>

                                        <form method="POST" action="<?php echo route('admin.membership.plans.ybr_membership2_plan.destroy', $ybrMembership2Plan->id); ?>" accept-charset="UTF-8">
                                            <input name="_method" value="DELETE" type="hidden">
                                            <?php echo e(csrf_field()); ?>


                                            <div class="btn-group btn-group-xs pull-right" role="group">
                                                <a href="<?php echo e(route('admin.membership.plans.ybr_membership2_plan.show', $ybrMembership2Plan->id )); ?>" class="btn btn-info" title="<?php echo e(trans('ybr_membership2_plans.show')); ?>">
                                                    <span class="glyphicon glyphicon-open" aria-hidden="true"></span>View
                                                </a>
                                                <a href="<?php echo e(route('admin.membership.plans.ybr_membership2_plan.edit', $ybrMembership2Plan->id )); ?>" class="btn btn-primary" title="<?php echo e(trans('ybr_membership2_plans.edit')); ?>">
                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit
                                                </a>
                                                
                                                
                                                <?php if(!in_array($ybrMembership2Plan->id,$planarray)): ?>
                                                <button type="submit" class="btn btn-danger" title="<?php echo e(trans('ybr_membership2_plans.delete')); ?>" onclick="return confirm(&quot;<?php echo e(trans('ybr_membership2_plans.confirm_delete')); ?>&quot;)">
                                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete
                                                </button>
                                                <?php endif; ?>
                                            </div>

                                        </form>

                                    </td>
                                </tr>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <?php echo $ybrMembership2Plans->render(); ?>


                        </div>


                        <?php endif; ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>












<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bidhub/bidhub/resources/views/admin/membership/plans/index.blade.php ENDPATH**/ ?>