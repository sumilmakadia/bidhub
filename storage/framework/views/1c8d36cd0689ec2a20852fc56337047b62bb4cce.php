<?php $__env->startSection('content'); ?>
<div class="page-wrapper" style="min-height: 149px;">
	<div class="container-fluid">
		<div class="row page-titles">
			<div class="col-md-5 align-self-center">
				<h4 class="text-themecolor"><?php echo e(!empty($title) ? $title : 'Membership Plan'); ?></h4>
			</div>
			<div class="col-md-7 align-self-center text-right">
				<div class="d-flex justify-content-end align-items-center">
 <a href="<?php echo e(route('admin.membership.plans.ybr_membership2_plan.index')); ?>" class="btn btn-info m-l-15 float-right" title="<?php echo e(trans('ybr_membership2_plans.show_all')); ?>">
                        <i class="fa fa-plus-circle"></i>
                        <?php echo e(trans('ybr_membership2_plans.show_all')); ?>

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

            <form method="POST" action="<?php echo e(route('admin.membership.plans.ybr_membership2_plan.update', $ybrMembership2Plan->id)); ?>" id="edit_ybr_membership2_plan_form" name="edit_ybr_membership2_plan_form" accept-charset="UTF-8" class="form-horizontal">
            <?php echo e(csrf_field()); ?>

            <input name="_method" type="hidden" value="PUT">
            <?php echo $__env->make('admin.membership.plans.form', [
                                        'ybrMembership2Plan' => $ybrMembership2Plan,
                                      ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-info d-none d-lg-block m-l-15" type="submit" value="<?php echo e(trans('ybr_membership2_plans.update')); ?>">
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bidhub/bidhub/resources/views/admin/membership/plans/edit.blade.php ENDPATH**/ ?>