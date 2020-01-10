<?php $__env->startSection('content'); ?>


<div class="page-wrapper" style="min-height: 149px;">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Manage Directory Postings</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">

                    <a href="<?php echo e(route('directory.directories.create')); ?>" class="btn btn-info m-l-15" title="<?php echo e(trans('directories.create')); ?>">
                        <i class="fa fa-plus-circle"></i>Create
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
                        <?php if(count($directoriesObjects) == 0): ?>
                        <div class="panel-body text-center">
                            <h4><?php echo e(trans('directories.none_available')); ?></h4>
                        </div>
                        <?php else: ?>

                        <div class="table-responsive">

                            <table class="table table-striped ">
                                <thead>
                                <tr>
                                                                <th><?php echo e(trans('directories.company_name')); ?></th>
                            <th>Trade</th>
                            <th>Website</th>
                            <th>Location</th>
                            <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $directoriesObjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $directories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                                                <td class=""><?php echo e($directories->company_name); ?></td>
                            <td class=""><?php echo e($directories->trade); ?></td>
                            <td class=""><?php echo e($directories->company_website); ?></td>
                            <td class=""><?php echo e($directories->location); ?></td>

                                    <td>

                                        <form method="POST" action="<?php echo route('directory.directories.destroy', $directories->id); ?>" accept-charset="UTF-8">
                                            <input name="_method" value="DELETE" type="hidden">
                                            <?php echo e(csrf_field()); ?>


                                            <div class="btn-group btn-group-xs pull-right" role="group">
                                                <?php if(isset($directories->profile->id)): ?>
                                                <a href="<?php echo e(route('profiles.profile.edit', $directories->profile->id)); ?>" class="btn btn-info" title="<?php echo e(trans('directories.show')); ?>">
                                                    <span class="glyphicon glyphicon-open" aria-hidden="true"></span>View
                                                </a>
                                                <a href="<?php echo e(route('profiles.profile.edit', $directories->profile->id)); ?>" class="btn btn-primary" title="<?php echo e(trans('directories.edit')); ?>">
                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit
                                                </a>
                                                <?php endif; ?>
                                                <button type="submit" class="btn btn-danger" title="<?php echo e(trans('directories.delete')); ?>" onclick="return confirm(&quot;<?php echo e(trans('directories.confirm_delete')); ?>&quot;)">
                                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete
                                                </button>
                                            </div>

                                        </form>

                                    </td>
                                    <td>
										<a href="#" id="approve-<?php echo e($directories->id); ?>" data-id="<?php echo e($directories->id); ?>" data-is="<?php if($directories->approved == 0): ?> 1 <?php else: ?> 0 <?php endif; ?>" class="btn <?php if($directories->approved == 0): ?>btn-green <?php else: ?> btn-red <?php endif; ?> approve" style="color:#fff;" title="<?php echo e(trans('directories.appove')); ?>">
													<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span><?php if($directories->approved == 0): ?>Approve <?php else: ?> Remove <?php endif; ?>
										</a>
									</td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <?php echo $directoriesObjects->render(); ?>


                        </div>


                        <?php endif; ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

      
    $('.approve').click(function (e) {
        e.preventDefault();

				$.ajax({
					type: 'post',
					url: '/directory/approve',
					data: {
					    '_token': $('meta[name="csrf-token"]').attr('content'),
					    'is_approved': $(this).data( "is" ),
						'id': $(this).data( "id" )
					},
				   success: function(data) {
				       
				       console.log(data.id.id);
				       
				       if(data.id.approved == 0){
				           $('#approve-'+data.id.id).css({"background-color": "#00c292", "color": "#fff", "border-color": "#00c292"});
				           $('#approve-'+data.id.id).data('is', 1);
				           $('#approve-'+data.id.id).text('Approve');
				       } else {
				       
				            $('#approve-'+data.id.id).css({"background-color": "#e36a75", "color": "#fff", "border-color": "#e36a75"});
				            $('#approve-'+data.id.id).data('is', 0);
				            $('#approve-'+data.id.id).text('Remove');
				       }
				     
					} 
				}).done(function(data) {
				    
		});
	});

</script>
<?php $__env->stopSection(); ?>












<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bidhub/bidhub/resources/views/directory/index.blade.php ENDPATH**/ ?>