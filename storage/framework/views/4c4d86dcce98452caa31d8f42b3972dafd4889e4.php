<?php $__env->startSection('content'); ?>


	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="text-themecolor"><?php echo e(trans('projects.model_plural')); ?></h4>
				</div>
				<div class="col-md-7 align-self-center text-right">
					<div class="d-flex justify-content-end align-items-center">
						<a href="<?php echo e(route('project-room.project.create')); ?>" class="btn btn-info m-l-15" title="<?php echo e(trans('projects.create')); ?>">
							<i class="fa fa-plus-circle"></i>Create New
						</a></div>
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
							<?php if(count($projects) == 0): ?>
								<div class="panel-body text-center">
									<h4><?php echo e(trans('projects.none_available')); ?></h4>
								</div>
							<?php else: ?>

								<div class="table-responsive">

									<table class="table table-striped ">
										<thead>
										<tr>
											<th>Title</th>
											<th>Location</th>
											<th style="width:150px;">Trade</th>
											<th>Project Start Date</th>
											<th>Need Bid By Date</th>
											<th>Proposals</th>
											<th></th>
										</tr>
										</thead>
										<tbody>
										<?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
												<td class=""><?php echo e($project->title); ?></td>
												<td class=""><?php echo e($project->location); ?></td>
												<td class=""><?php echo e($project->trade); ?></td>
												<td class=""><?php echo e($project->starts_on); ?></td>
												<td class=""><?php echo e($project->need_bid_by_date); ?></td>
												<td class=""><a href="<?php echo e(route('project-room.project.show', $project->id )); ?>" style="font-weight:bold; padding:5px 10px; border:1px solid lightgray; background-color:#fb9678; color:white;"><?php echo e($project->proposals->count()); ?></a></td>
												<td>

													<form method="POST" action="<?php echo route('project-room.project.destroy', $project->id); ?>" accept-charset="UTF-8">
														<input name="_method" value="DELETE" type="hidden">
														<?php echo e(csrf_field()); ?>


														<div class="btn-group btn-group-xs pull-right" role="group">
															<a href="<?php echo e(route('project-room.project.show', $project->id )); ?>" class="btn btn-info" title="<?php echo e(trans('projects.show')); ?>">
																<span class="glyphicon glyphicon-open" aria-hidden="true"></span>View
															</a>
															<a href="<?php echo e(route('project-room.project.edit', $project->id )); ?>" class="btn btn-primary" title="<?php echo e(trans('projects.edit')); ?>">
																<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit
															</a>

															<button type="submit" class="btn btn-danger" title="<?php echo e(trans('projects.delete')); ?>" onclick="return confirm(&quot;<?php echo e(trans('projects.confirm_delete')); ?>&quot;)">
																<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete
															</button>
														</div>

													</form>

												</td>
											</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</tbody>
									</table>
									<?php echo $projects->render(); ?>


								</div>


							<?php endif; ?>


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>












<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bidhub/bidhub/resources/views/project-room/index.blade.php ENDPATH**/ ?>