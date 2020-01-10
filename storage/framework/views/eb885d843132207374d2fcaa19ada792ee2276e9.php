<?php $__env->startSection('content'); ?>


	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h3 class="mb-2 p-0">Favorites</h3>
					<h5>View Projects That You Have Favorited</h5>
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
							<?php if(count($favorites) == 0): ?>
								<div class="panel-body text-center">
									<h4><?php echo e(trans('favorites.none_available')); ?></h4>
								</div>
							<?php else: ?>

								<div class="table-responsive">

									<table class="table table-striped ">
										<thead>
										<tr>

											<th>Job Name</th>
											<th>State</th>
											<th>Due Date</th>
											<th>Start Date</th>
											<th>Status</th>
											<th></th>
										</tr>
										</thead>
										<tbody>
										<?php $__currentLoopData = $favorites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $favorite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
											    <?php if(isset($favorite->project)): ?>
												<td class=""><strong><a href="/project-room/show/<?php if(isset($favorite->project->id)): ?><?php echo e($favorite->project->id); ?><?php endif; ?>"><?php if(isset($favorite->project->title)): ?><?php echo e($favorite->project->title); ?><?php endif; ?></a></strong></td>
												<td class=" state"><?php echo e($favorite->project->location); ?></td>
												<td class=" due_date"><?php echo e($favorite->project->need_bid_by_date); ?></td>
												<td class=" start_date"><?php echo e($favorite->project->starts_on); ?></td>
												<td class=" status"><?php echo e($favorite->project->status); ?></td>
												<td>

													<form method="POST" action="<?php echo route('favorites.favorite.destroy', $favorite->id); ?>" accept-charset="UTF-8">
														<input name="_method" value="DELETE" type="hidden">
														<?php echo e(csrf_field()); ?>


														<div class="btn-group btn-group-xs pull-right" role="group">
															<button type="submit" class="btn btn-danger" title="<?php echo e(trans('favorites.delete')); ?>" onclick="return confirm(&quot;<?php echo e(trans('favorites.confirm_delete')); ?>&quot;)">
																<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete
															</button>
														</div>

													</form>

												</td>
												<?php endif; ?>
											</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</tbody>
									</table>
									<?php echo $favorites->render(); ?>


								</div>


							<?php endif; ?>


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>












<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bidhub/bidhub/resources/views/favorites/index.blade.php ENDPATH**/ ?>