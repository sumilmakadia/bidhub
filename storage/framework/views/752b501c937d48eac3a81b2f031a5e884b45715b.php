<?php $__env->startSection('title', 'Page Title'); ?>
<?php $__env->startSection('content'); ?>

	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="text-themecolor"><?php echo e(isset($help->title) ? $help->title : 'Help'); ?></h4>
				</div>
					<?php if($user = Auth::user()): ?>
				<div class="col-md-7 align-self-center text-right">
					<div class="d-flex justify-content-end align-items-center">
					    <?php if(Auth::user()->id != $help->created_by): ?>
						<a href="<?php echo e(route('resumes.resume.create',$help->id)); ?>"><button class="btn" <?php if(!$resume): ?> style="background-color:#fb9678; color:white;" <?php else: ?> disabled style="background-color:lightgray;" <?php endif; ?>><i class="fa fa-plus-circle"></i>Submit Resume</button></a>
				        <?php endif; ?>
				    <?php if(Auth::user()->role_id != 2 && Auth::user()->role_id != 3 && Auth::user()->role_id != 4 && Auth::user()->role_id != 5): ?>
						<a href="<?php echo e(route('help-wanted.help.create')); ?>" class="btn btn-info m-l-15" title="<?php echo e(trans('helps.create')); ?>">
							<i class="fa fa-plus-circle"></i>Create New
						</a>

					<?php endif; ?>
					</div>
				</div>
				<?php endif; ?>
			</div>
			<div class="row">
				<div class="col-lg-4 col-xlg-3 col-md-5">
					<div class="card">
						<div class="card-body">
						    <div style="display:inline-block">
								<div style="float:left;">
									<a href="/profiles/show/<?php echo e($help->profile->id); ?>"><img class="profile-icon" src="<?php echo e($help->profile->avatar); ?>" width="100px" height="100px"/></a>
								</div>
								<div style="float:left;padding-left: 10px;">
    								<strong><?php echo e($help->profile->company); ?></strong><br>
    								<?php echo e($help->profile->first_name); ?> <?php echo e($help->profile->last_name); ?><br>
    								<?php echo e($help->profile->type); ?>

								</div>
							</div>
						</div>
							</div>
						<div class="card">
						<div class="card-body">
						    <p>
						    <h6>Preferred Method of Contact</h6>
						    <small class="text-muted">
						        <?php if(unserialize($help->preferred_contact) !== NULL && isset($help->preferred_contact)): ?>
						        <?php $__currentLoopData = unserialize($help->preferred_contact); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						            <?php echo e($contact); ?><br>
						        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						        <?php endif; ?>
					        </small>
						    </p>
							<p>
						    <h6>Email</h6>
						    <small class="text-muted"> <?php echo e($help->email); ?></small>
						    </p>
							<p>
							<?php if($help->phone !== null): ?>
						    <h6>Phone Number</h6>
						    <small class="text-muted"> <?php echo e($help->phone); ?></small>
						    </p>
						    <?php endif; ?>
							<p>	
							<p>
							<h6>Trades</h6>
							<small class="text-muted"> <?php echo e($help->trade); ?></small>
							</p>
							<p>
							<h6>Location</h6>
							<small class="text-muted"> <?php echo e($help->location); ?></small>
							</p>
							<p>
							<h6> Level Of Experience Required</h6>
							<small class="text-muted"> <?php echo e($help->level_of_experience); ?></small>
							</p>
							<p>
							<h6>Need Resumes By What Date? </h6>
							<small class="text-muted"> <?php echo e(date("m-d-Y", strtotime($help->date_need_resume))); ?></small>
							</p>
							<p>
							<h6>Job Start Date </h6>
							<small class="text-muted"> <?php echo e(date("m-d-Y", strtotime($help->date_job_start))); ?></small>
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-8 col-xlg-9 col-md-7">
					<div class="card">
						<div class="card-body">
							<p class="m-t-30"><?php echo e($help->description); ?></p>
						</div>
					</div>
					<div class="card">
						<div class="card-body">
							<h4>Additional Files</h4>
							<div class="row">
							    <?php if(isset($files)): ?>
								<?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="col-lg-2 col-md-4 col-sm-4 m-t-20">
										<div class="row">
										    <?php
										    if($file->file_type == 'pdf'){
										        $src = '/public/storage/company/images/PDF-icon-small-231x300.png';
										    } else {
										        $src = $file->file_path;
										    }
										    ?>
										    <div style="width:100%;padding:10px;"><img width="100%" src="<?php echo e($src); ?>"></div>
										    <?php if($file->file_type == 'pdf'): ?>
											<div style="width:100%;padding:10px;"><?php echo e($file->file_name); ?></div>
											<div style="text-align: center;width: 100%;margin-top: 10px;"><a class="btn btn-primary" target="_blank" href="<?php echo e($file->file_path); ?>">Download</a></div>
											<?php else: ?>
											<!--<div style="width:100%;padding:10px;"><?php echo e($file->file_name); ?></div>-->
											<div style="text-align: center;width: 100%;margin-top: 10px;"><a class="btn btn-primary" href="<?php echo e($file->file_path); ?>" target="_blank">View</a></div>
											<?php endif; ?>
										</div>
									</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
							<?php if($owner): ?>
					<div class="card">
						<div class="card-body">
							<h4>Resumes</h4>
							<div class="row">
							    <?php if($help->resumes !== null): ?>
									<div class="col-lg-12 col-md-12 col-sm-4 m-t-20">
								<?php $__currentLoopData = $help->resumes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resume): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<div class="row">
										    <div class="col-lg-12 col-md-12 col-sm-12" style="padding:10px;">
										        <div class="row">
										            <div class="col-lg-4 col-md-12 col-sm-12  col-xs-12 resume-info">
										                <div class="row">
										                    <div class="col-lg-4 col-md-6 col-sm-6 col-6 resume-image">
										                        <object data="<?php echo e(asset('') . $resume->user->avatar); ?>" type="image/png" style="width:90px;" class="profile-icon">
                										            <img width="90" src="<?php echo e(asset('') . 'storage/users/default.png'); ?>">
            										            </object>
										                    </div>
										                    <div class="col-6 col-sm-6 col-md-6 col-lg-5">
										                        <div class="row">
										                            <div class="col-md-12">
										                                <label style="font-weight:bold;"><?php echo e($resume->profile->company); ?></label>
										                            </div>
    										                        <div class="col-md-12">    
    										                            <label><?php echo e($resume->profile->first_name . ' ' . $resume->profile->last_name); ?></label>
    										                        </div>
    										                        <div class="col-md-12">
    										                            <label><?php echo e($resume->profile->type); ?></label>
    										                        </div>
										                        </div>
										                    </div>
										                </div>
										            </div>
										            <div class="col-lg-4 col-md-12 col-sm-12  col-12 resume-info resume-message" style="overflow:hidden; text-overflow:ellipsis; line-height:1.4;">
        										        <p><?php echo e($resume->message); ?></p>
										            </div>
										            <div class="col-lg-3 col-md-12 col-sm-12 resume-options">
										                <form method="POST" action="<?php echo route('resumes.resume.destroy', $resume->id); ?>" accept-charset="UTF-8">
														    <input name="_method" value="DELETE" type="hidden">
    														<?php echo e(csrf_field()); ?>

    										                <div class="btn-group btn-group-xs pull-right" role="group">
    															<?php if(isset($resume->chatroom)): ?>
    															<a href="<?php echo e(asset('chat-rooms') . '/' . $resume->chatroom->id); ?>" class="btn btn-success" title="<?php echo e(trans('proposals.show')); ?>">
    																<span class="glyphicon glyphicon-open" aria-hidden="true"></span>Chat
    															</a>
    															<?php else: ?>
    															<a href="<?php echo e(asset('chat-rooms') . '/create/null/null/' . $resume->created_by); ?>" class="btn btn-success" title="<?php echo e(trans('proposals.show')); ?>">
    																<span class="glyphicon glyphicon-open" aria-hidden="true"></span>Chat
    															</a>
    															<?php endif; ?>
    															<a href="<?php echo e(asset('resumes') . '/show/' . $resume->id); ?>" class="btn btn-info" title="View Proposal">
    																<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>View
    															</a>
    
    															<button type="submit" class="btn btn-danger" title="Delete Resume" onclick="return confirm(&quot;Click Ok to delete Resume.&quot;)">
    																<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete
    															</button>
    															<?php
														        $style='';
														        $favorite = 1;
														        if(isset($resume->is_favorite)) {
														        if($resume->is_favorite == 1) {
														            $style = 'background-color: #00c292; color: #fff; border: 1px solid #00c292;';
														            $favorite = 0;
														          }  
														       }    
														        ?>
    															<a id="a<?php echo e($resume->id); ?>" href="" style="margin-left: 10px;" class="favorite" data-is="<?php echo e($favorite); ?>" data-id="<?php echo e($resume->id); ?>" data-type="project" onclick="event.preventDefault();">
                    								            <i id="i<?php echo e($resume->id); ?>" class="fas fa-star" style="<?php echo e($style); ?>"></i>
                    								            </a>
    														</div>
											        </div>
										        </div>
										    </div>
										  </div>
										  <hr style="color:#edf1f5; margin:10px 0;">
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</div>
								<?php endif; ?>
							</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
	$( '.favorite' ).click(function() {
		    
				$.ajax({
					type: 'post',
					url: '/resumes/favorite',
					data: {
					    '_token': $('meta[name="csrf-token"]').attr('content'),
					    'is_favorite': $(this).data( "is" ),
						'id': $(this).data( "id" ),
						'type': $(this).data( "type" )
					},
				   success: function(data) {
				       console.log(data);
				       if(data.favorite == 1){
				           $('#i'+data.id).css({"background-color": "#fff", "color": "#fb9678", "border": "1px solid #fb9678"});
				           $('#a'+data.id).data('is', 1);
				       } else {
				       
				            $('#i'+data.id).css({"background-color": "#00c292", "color": "#fff", "border": "1px solid #00c292"});
				            $('#a'+data.id).data('is', 0);
				       }
				     
					} 
				}).done(function(data) {
				    
				});
		
			
		});     
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bidhub/bidhub/resources/views/help-wanted/show.blade.php ENDPATH**/ ?>