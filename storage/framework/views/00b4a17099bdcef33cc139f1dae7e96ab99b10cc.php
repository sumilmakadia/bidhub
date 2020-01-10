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
				    <form method="POST" action="/projects/admin/bulk" accept-charset="UTF-8">
				        <?php echo e(csrf_field()); ?>

                    <input class="btn btn-danger" type="submit" value="Delete Selected" style="margin-left: 20px;cursor:pointer;">
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
										    <th style="padding-left:11px;background-image:none;"><input type="checkbox" id="ckbCheckAll" value="" /></th>
											<th>Title</th>
											<th>Total Units</th>
											<th>Starts On</th>
											<th>Expires On</th>
											<th>Trade</th>
											<th>Location</th>
											<th></th>
										</tr>
										</thead>
										<tbody>
										<?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
                                                <td><input type="checkbox" id="<?php echo e($project->id); ?>" value="<?php echo e($project->id); ?>" name="project_id[]" class="checkBoxClass"/></td>
                                                </form>
												<td class=""><?php echo e($project->title); ?></td>
												<td class=""><?php echo e($project->how_many_units); ?></td>
												<td class=""><?php echo e($project->starts_on); ?></td>
												<td class=""><?php echo e($project->need_bid_by_date); ?></td>
												<td class=""><?php echo e($project->trade); ?></td>
												<td class=""><?php echo e($project->location); ?></td>
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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script>
    
        $('.table').DataTable( {
            columnDefs: [ { orderable: false, targets: 0 }]
        } );
        
        $("#ckbCheckAll").click(function () {
            $(".checkBoxClass").prop('checked', $(this).prop('checked'));
        });
    
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bidhub/bidhub/resources/views/project-room/admin.blade.php ENDPATH**/ ?>