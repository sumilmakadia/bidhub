<?php $__env->startSection('content'); ?>


	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="text-themecolor">Resumes Submitted</h4>
				</div>
				<div class="col-md-7 align-self-center text-right">
					<div class="d-flex justify-content-end align-items-center">

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
							<?php if(count($resumes) == 0): ?>
								<div class="panel-body text-center">
									<h4>You have no resumes submitted!</h4>
								</div>
							<?php else: ?>

								<div class="table-responsive">

									<table class="table table-striped ">
										<thead>
										<tr>
										    <th>Help Wanted Job</th>
											<th>Job Title</th>
											<th>Created Date</th>
											<th></th>
										</tr>
										</thead>
										<tbody>
										<?php $__currentLoopData = $resumes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $resume): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
											    <td class=""><?php echo e($resume->help->title); ?></td>
												<td class=""><?php echo e($resume->job_title); ?></td>
												<td class=""><?php echo e(date('m/d/Y H:m A',strtotime($resume->created_at))); ?></td>
												<td>

													<form method="POST" action="<?php echo route('resumes.resume.destroy', $resume->id); ?>" accept-charset="UTF-8">
														<input name="_method" value="DELETE" type="hidden">
														<?php echo e(csrf_field()); ?>


														<div class="btn-group btn-group-xs pull-right" role="group">
															<a href="<?php echo e(asset('resumes/show') . '/' . $resume->id); ?>" class="btn btn-info" title="<?php echo e(trans('resumes.show')); ?>">
																<span class="glyphicon glyphicon-open" aria-hidden="true"></span>View
															</a>
															<!--<a href="<?php echo e(route('resumes.resume.edit', $resume->id )); ?>" class="btn btn-primary" title="<?php echo e(trans('resumes.edit')); ?>">-->
															<!--	<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit-->
															<!--</a>-->

															<button type="submit" class="btn btn-danger" title="<?php echo e(trans('resumes.delete')); ?>" onclick="return confirm(&quot;<?php echo e(trans('resumes.confirm_delete')); ?>&quot;)">
																<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete
															</button>
														</div>

													</form>

												</td>
											</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</tbody>
									</table>
									<?php echo $resumes->render(); ?>


								</div>


							<?php endif; ?>


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>












<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bidhub/bidhub/resources/views/resumes/index.blade.php ENDPATH**/ ?>