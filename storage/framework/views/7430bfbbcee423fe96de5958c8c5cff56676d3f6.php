<?php $__env->startSection('content'); ?>
<div class="page-wrapper" style="min-height: 149px;">
	<div class="container-fluid">
		<div class="row page-titles">
			<div class="col-md-5 align-self-center">
				<h4 class="text-themecolor">Create Plan</h4>
			</div>
			<div class="col-md-7 align-self-center text-right">
				<div class="d-flex justify-content-end align-items-center">
				  <a href="<?php echo e(route('admin.membership.plans.ybr_membership2_plan.index')); ?>" class="btn btn-info m-l-15 float-right" title="<?php echo e(trans('ybr_membership2_plans.show_all')); ?>">
                                          <i class="fa fa-plus-circle"></i> Show All
                                 </a>
                                 	</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">

				<div class="card">
                        <div class="card-body">


			 <?php if($errors->any()): ?>
                            <ul class="alert alert-danger">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>

                        <form method="POST" action="<?php echo e(route('admin.membership.plans.ybr_membership2_plan.store')); ?>" accept-charset="UTF-8" id="create_ybr_membership2_plan_form" name="create_ybr_membership2_plan_form" class="form-horizontal">
                        <?php echo e(csrf_field()); ?>

                        <?php echo $__env->make('admin.membership.plans.form', [
                                                    'ybrMembership2Plan' => null,
                                                  ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <div class="form-group">
                                <div class="col-md-offset-2 col-md-10">
                                    <input class="btn btn-info d-none d-lg-block m-l-15" type="submit" value="<?php echo e(trans('ybr_membership2_plans.add')); ?>">
                                </div>
                            </div>

                        </form>


</div>
		</div>

			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bidhub/bidhub/resources/views/admin/membership/plans/create.blade.php ENDPATH**/ ?>