<?php $__env->startSection('content'); ?>


<div class="page-wrapper" style="min-height: 149px;">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor"><?php echo e(trans('profiles.model_plural')); ?></h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <a href="<?php echo e(route('profiles.profile.create_user')); ?>" class="btn btn-info m-l-15" title="<?php echo e(trans('profiles.create')); ?>">
                       <i class="fa fa-plus-circle"></i>Create New
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form method="POST" action="/profiles/admin/bulk" accept-charset="UTF-8">
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
                        <?php if(count($users) == 0): ?>
                        <div class="panel-body text-center">
                            <h4><?php echo e(trans('profiles.none_available')); ?></h4>
                        </div>
                        <?php else: ?>

                        <div class="table-responsive">
                        <?php $roles = \Illuminate\Support\Facades\DB::table('roles')->get(); ?>
                            <table id="users" class="table table-striped ">
                                <thead>
                                <tr>
                                    <th style="padding-left:11px;background-image:none;"><input type="checkbox" id="ckbCheckAll" value="" /></th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Membership</th>
                                    <th>Addons</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><input type="checkbox" id="<?php echo e($user->id); ?>" value="<?php echo e($user->id); ?>" name="user_id[]" class="checkBoxClass"/></td>
                                    </form>
                                    <td class=""><?php if(isset($user->profile->first_name)): ?><?php echo e($user->profile->first_name); ?><?php endif; ?> <?php if(isset($user->profile->last_name)): ?><?php echo e($user->profile->last_name); ?><?php endif; ?></td>
                                    <td><?php echo e($user->email); ?></td>
                                    <td><?php if(isset($user->profile->phone)): ?><?php echo e($user->profile->phone); ?><?php endif; ?></td>
                                    <?php if($user->role_id == 1): ?>
                                    <td>ADMINISTRATOR</td>
                                    <?php else: ?>
                                    <td><?php if(isset($user->plan->plan_name)): ?><?php echo e($user->plan->plan_name); ?><?php endif; ?></td>
                                    <?php endif; ?>
                                    <?php if($user->help == 1): ?>
                                    <td>Help Wanted <?php if(isset($user->addon->title)): ?>, <?php echo e($user->addon->title); ?><?php endif; ?></td>
                                    <?php else: ?>
                                    <td><?php if(isset($user->addon->title)): ?><?php echo e($user->addon->title); ?><?php endif; ?></td>
                                    <?php endif; ?>
                                    <td>
                                    <?php if($user->profile): ?>
                                            <form method="POST" action="<?php echo route('profiles.profile.destroy', $user->id); ?>" accept-charset="UTF-8">
                                                <input name="_method" value="DELETE" type="hidden">
                                                <?php echo e(csrf_field()); ?>


                                                <div class="btn-group btn-group-xs pull-right" role="group">
                                                    <a href="<?php echo e(route('profiles.profile.show', $user->profile->id)); ?>" class="btn btn-info" title="<?php echo e(trans('profiles.show')); ?>">
                                                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>View
                                                    </a>
                                                    <a href="<?php echo e(route('profiles.profile.edit', $user->profile->id )); ?>" class="btn btn-primary" title="<?php echo e(trans('profiles.edit')); ?>">
                                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit
                                                    </a>

                                                    <button type="submit" class="btn btn-danger" title="<?php echo e(trans('profiles.delete')); ?>" onclick="return confirm(&quot;<?php echo e(trans('profiles.confirm_delete')); ?>&quot;)">
                                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete
                                                    </button>
                                                </div>
                                            </form>
                                    <?php else: ?>
                                            <form method="POST" action="<?php echo route('profiles.profile.destroy', $user->id); ?>" accept-charset="UTF-8">
                                                <input name="_method" value="DELETE" type="hidden">
                                                <?php echo e(csrf_field()); ?>


                                                <div class="btn-group btn-group-xs pull-right" role="group">
                                                    <button class="btn btn-info"  title="<?php echo e(trans('profiles.show')); ?>" disabled>
                                                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>View
                                                    </button>
                                                    <a href="<?php echo e(url('/profiles/create?id=').$user->id); ?>" class="btn btn-primary" title="<?php echo e(trans('profiles.edit')); ?>">
                                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit
                                                    </a>

                                                    <button type="submit" class="btn btn-danger" title="<?php echo e(trans('profiles.delete')); ?>" onclick="return confirm(&quot;<?php echo e(trans('profiles.confirm_delete')); ?>&quot;)">
                                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete
                                                    </button>
                                                </div>
                                            </form>
                                    <?php endif; ?>
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
    
        $('#users').DataTable( {
            columnDefs: [ { orderable: false, targets: 0 }]
        } );
        
        $("#ckbCheckAll").click(function () {
            $(".checkBoxClass").prop('checked', $(this).prop('checked'));
        });
    
</script>
<?php $__env->stopSection(); ?>












<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bidhub/bidhub/resources/views/profiles/index.blade.php ENDPATH**/ ?>