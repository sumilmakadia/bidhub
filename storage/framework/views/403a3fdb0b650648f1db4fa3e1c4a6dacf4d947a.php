<?php $__env->startSection('content'); ?>


	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="text-themecolor">Proposals Submitted</h4>
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
							<?php if(count($proposals) == 0): ?>
								<div class="panel-body text-center">
									<h4><?php echo e(trans('proposals.none_available')); ?></h4>
								</div>
							<?php else: ?>

								<div class="table-responsive">

									<table class="table table-striped ">
										<thead>
										<tr>
											<th>Job Name</th>
											<th>Company Name</th>
											<th>Name</th>
											<th>Due Date</th>
											<th>Trades</th>
											<th></th>
										</tr>
										</thead>
										<tbody>
										<?php $__currentLoopData = $proposals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $proposal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									
											<tr>
											    <?php if(isset($proposal->project)): ?>
												<td class=""><?php if(isset($proposal->project->title)): ?><?php echo e($proposal->project->title); ?><?php endif; ?></td>
												<td class=""><?php if(isset($proposal->project->profile->company)): ?><?php echo e($proposal->project->profile->company); ?><?php endif; ?></td>
												<td class=""><?php if(isset($proposal->project->profile)): ?><?php echo e($proposal->project->profile->first_name . ' ' . $proposal->project->profile->last_name); ?><?php endif; ?></td>
												<td class=""><?php if(isset($proposal->project->need_bid_by_date)): ?><?php echo e($proposal->project->need_bid_by_date); ?><?php endif; ?></td>
												<td class=""><?php if(isset($proposal->trade)): ?><?php echo e($proposal->trade); ?><?php endif; ?></td>
												<td>

													<form method="POST" action="<?php echo route('proposals.proposal.destroy', $proposal->id); ?>" accept-charset="UTF-8">
														<input name="_method" value="DELETE" type="hidden">
														<?php echo e(csrf_field()); ?>


														<div class="btn-group btn-group-xs pull-right" role="group">
														    <?php if(isset($proposal->chatroom)): ?>
															<a href="<?php echo e(asset('chat-rooms') . '/' . $proposal->chatroom->id); ?>" class="btn btn-success" title="<?php echo e(trans('proposals.show')); ?>">
																<span class="glyphicon glyphicon-open" aria-hidden="true"></span>Chat
															</a>
															<?php else: ?>
															<a href="<?php echo e(asset('chat-rooms') . '/create/' . $proposal->project_id . '/' . $proposal->id . '/' . $proposal->project_owner); ?>" class="btn btn-success" title="<?php echo e(trans('proposals.show')); ?>">
																<span class="glyphicon glyphicon-open" aria-hidden="true"></span>Chat
															</a>
															<?php endif; ?>
															<!--<a href="<?php echo e(route('proposals.proposal.edit', $proposal->id )); ?>" class="btn btn-primary" title="<?php echo e(trans('proposals.edit')); ?>">-->
															<!--	<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit-->
															<!--</a>-->

															<button type="submit" class="btn btn-danger" title="<?php echo e(trans('proposals.delete')); ?>" onclick="return confirm(&quot;<?php echo e(trans('proposals.confirm_delete')); ?>&quot;)">
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
									<?php echo $proposals->render(); ?>


								</div>


							<?php endif; ?>


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>












<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bidhub/bidhub/resources/views/proposals/index.blade.php ENDPATH**/ ?>