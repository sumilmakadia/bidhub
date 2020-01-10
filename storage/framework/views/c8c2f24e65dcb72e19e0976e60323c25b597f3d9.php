<?php $__env->startSection('content'); ?>


<div class="page-wrapper" style="min-height: 149px;">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor"><?php echo e(trans('equipments.model_plural')); ?></h4>
            </div>
           <?php
                $max_post = 0;
                if(Auth::user()->equipment == 2) {$max_post = 5; $max_photos = 10;}
                if(Auth::user()->equipment == 3) {$max_post = 50; $max_photos = 25;}
                if(Auth::user()->equipment == 4) {$max_post = 100; $max_photos = 50;}
            ?>
             <?php if(count($equipments) < $max_post && Auth::user()->equipment != 0 || Auth::user()->role_id == 8 || Auth::user()->role_id == 1): ?>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <a href="<?php echo e(route('equipment-for-sale.property.create')); ?>" class="btn btn-info m-l-15" title="<?php echo e(trans('equipments.create')); ?>">
                        <i class="fa fa-plus-circle"></i>Create New
                    </a></div>
            </div>
            <?php elseif(Auth::user()->equipment != 4): ?>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <a href="/pricing" class="btn btn-info m-l-15" title="<?php echo e(trans('equipments.create')); ?>">
                        <i class="fa fa-plus-circle"></i>Upgrade Your Account to List More Properties and Photos
                    </a></div>
            </div>
            <?php endif; ?>
         
         
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
                        <?php if(count($equipments) == 0): ?>
                        <div class="panel-body text-center">
                            <h4><?php echo e(trans('equipments.none_available')); ?></h4>
                        </div>
                        <?php else: ?>

                        <div class="table-responsive">

                            <table class="table table-striped ">
                                <thead>
                                <tr>
                                                                <th><?php echo e(trans('equipments.equipment_title')); ?></th>




                            <th><?php echo e(trans('equipments.equipment_cost')); ?></th>

                            <th>Location</th>
                            <th><?php echo e(trans('equipments.created_at')); ?></th>
                            <th><?php echo e(trans('equipments.updated_at')); ?></th>

                                    <th></th>
                                </tr>
                                </thead>
                             
                                <tbody>
                                <?php $__currentLoopData = $equipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $equipment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                                                <td class=""><?php echo e($equipment->equipment_title); ?></td>



 
                            <td class=""><?php echo e($equipment->equipment_cost); ?></td>

                            <td class=""><?php echo e($equipment->location); ?></td>
                            <td class=""><?php echo e($equipment->created_at); ?></td>
                            <td class=""><?php echo e($equipment->updated_at); ?></td>

                                    <td>

                                        <form method="POST" action="<?php echo route('equipment-for-sale.property.destroy', $equipment->id); ?>" accept-charset="UTF-8">
                                            <input name="_method" value="DELETE" type="hidden">
                                            <?php echo e(csrf_field()); ?>


                                            <div class="btn-group btn-group-xs pull-right" role="group">
                                                <a href="<?php echo e(route('equipment-for-sale.property.show', $equipment->id )); ?>" class="btn btn-info" title="<?php echo e(trans('equipments.show')); ?>">
                                                    <span class="glyphicon glyphicon-open" aria-hidden="true"></span>View
                                                </a>
                                                <a href="<?php echo e(route('equipment-for-sale.property.edit', $equipment->id )); ?>" class="btn btn-primary" title="<?php echo e(trans('equipments.edit')); ?>">
                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit
                                                </a>

                                                <button type="submit" class="btn btn-danger" title="<?php echo e(trans('equipment.delete')); ?>" onclick="return confirm(&quot;<?php echo e(trans('equipments.confirm_delete')); ?>&quot;)">
                                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete
                                                </button>
                                            </div>

                                        </form>

                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <?php echo $equipments->render(); ?>


                        </div>


                        <?php endif; ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bidhub/bidhub/resources/views/equipment-for-sale/index.blade.php ENDPATH**/ ?>