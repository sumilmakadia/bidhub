
 
<?php $__env->startSection('content'); ?>
 
 
    <div class="page-wrapper" style="min-height: 149px;">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor">Manage Free Directory Postings</h4>
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
                            <form action="<?php echo e(route('directory.free-directories.admin')); ?>" method="get">
                            <?php echo e(csrf_field()); ?>

                            <div class="row"  style="margin:20px 0;">
                                <div class="col-md-2 mrg-btm">
                                        <a href="<?php echo e(route('directory.free-directories.excel')); ?>" style="color:#fff;min-height: 38px;display: inline-block;" class="btn btn-green">Upload Directories Excel</a>
                                </div>
                                <div class="col-md-2 mrg-btm">
                                        <a id="sync-trades" class="btn btn-green" href="<?php echo e(route('directory.free-directories.sync-trades')); ?>" style="color:#fff;min-height: 38px;display: inline-block;">Sync Trades</a>
                                </div>
                                <div class="col-md-6 mrg-btm">
                                    <input type="text" name="search" class="form-control" <?php if(isset($search)): ?> value="<?php echo e($search); ?>" <?php endif; ?> placeholder="Search">
                                </div>
                                <div class="col-md-1 mrg-btm">
                                    <button class="btn btn-primary" type="submit" style="min-height: 38px;">Search</button>
                                </div>
                                <div class="col-md-1 mrg-btm">
                                    <button  class="btn btn-danger" style="min-height: 38px;"><a href="<?php echo e(route('directory.free-directories.admin')); ?>" style="color:#fff;">Clear</a></button>
                                </div>
                                <!--<div class="col">-->
                                <!-- <a href="/directory/map" class="btn btn-primary" type="button">Map View</a>-->
                                <!--</div>-->
                            </div>
                            </form>
                         
                            <?php if(Session::has('success_message')): ?>
                                <div class="alert alert-success">
                                    <span class="glyphicon glyphicon-ok"></span>
                                    <?php echo session('success_message'); ?>

 
                                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
 
                                </div>
                            <?php endif; ?>
                            <?php if(count($uploaded) == 0): ?>
                                <div class="panel-body text-center">
                                    <h4>No Directories</h4>
                                </div>
                            <?php else: ?>
 
                                <div class="table-responsive">
 
                                    <table id="#directory" class="table table-striped ">
                                        <thead>
                                        <tr>
                                            <th>Company Name</th>
                                            <th>Trade</th>
                                            <th>Website</th>
                                            <th>Location</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $uploaded; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upload): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class=""><?php echo e($upload->businessName); ?></td>
                                                <td class=""><?php echo e($upload->category); ?></td>
                                                <td class=""><?php echo e($upload->webSite); ?></td>
                                                <?php if(isset($upload->location)): ?>
                                                <td class=""><?php echo e($upload->location); ?></td>
                                                <?php else: ?>
                                                <td class=""><?php echo e($upload->street); ?><?php if(isset($upload->street)): ?>,<?php endif; ?> <?php echo e($upload->city); ?><?php if(isset($upload->city)): ?>,<?php endif; ?> <?php echo e($upload->state); ?><?php if(isset($upload->state)): ?>,<?php endif; ?> <?php echo e($upload->postal); ?></td>
                                                <?php endif; ?>
                                                <td>
 
                                                    <form method="POST" action="<?php echo route('directory.free-directories.destroy', $upload->id); ?>" accept-charset="UTF-8">
                                                        <input name="_method" value="DELETE" type="hidden">
                                                        <?php echo e(csrf_field()); ?>

 
                                                        <div class="btn-group btn-group-xs pull-right" role="group">
                                                            <!--<a href="<?php echo e(route('directory.directories.edit', $upload->id )); ?>" class="btn btn-info" title="<?php echo e(trans('directories.show')); ?>">-->
                                                            <!-- <span class="glyphicon glyphicon-open" aria-hidden="true"></span>View-->
                                                            <!--</a>-->
                                                            <a href="<?php echo e(route('directory.directories.edit', $upload->id )); ?>" class="btn btn-primary" title="<?php echo e(trans('directories.edit')); ?>">
                                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit
                                                            </a>
 
                                                            <button type="submit" class="btn btn-danger" title="<?php echo e(trans('free-directories.delete')); ?>" onclick="return confirm(&quot;<?php echo e(trans('free-directories.confirm_delete')); ?>&quot;)">
                                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete
                                                            </button>
                                                        </div>
 
                                                    </form>
 
                                                </td>
                     
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                    <?php echo $uploaded->appends(['search' => $search])->render(); ?>

 
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
     
    $('#sync-trades').click(function (e) {
        e.preventDefault();
 
                $.ajax({
                    type: 'post',
                    url: '/directory/free-directories/sync-trades',
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                    },
                   success: function(data) {
                        
                     alert('Trades Synced');
                      
                    } 
                }).done(function(data) {
                     
        });
    });
 
</script> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bidhub/bidhub/resources/views/directory/free-admin.blade.php ENDPATH**/ ?>