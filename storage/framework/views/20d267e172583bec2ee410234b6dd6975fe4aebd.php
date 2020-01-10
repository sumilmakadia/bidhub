<?php $__env->startSection('title', 'Page Title'); ?>
<?php $__env->startSection('content'); ?>

	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="text-themecolor"><?php echo e(isset($project->title) ? $project->title : 'Project'); ?></h4>
				</div>
				<div class="col-md-7 align-self-center text-right">
					<div class="d-flex justify-content-end align-items-center">
					    <?php if(Auth::user()->role_id == 6 || Auth::user()->role_id == 8 && Auth::user()->id != $project->created_by): ?>
								<div class="row">
								       <a class="btn btn-primary" href="<?php echo e(asset('chat-rooms-new') . '/create-new/?project_id=' . $project->id.'&user_id='. Auth::user()->id.'&project_by='. $project->created_by); ?>" target="_blank" style="margin-right:10px;">Send Message</a>
								</div>
								<?php endif; ?>
					    <?php if(Auth::user()->role_id != 2 && Auth::user()->id != $project->created_by): ?>
						<a href="/proposals/create/<?php echo e($project->id); ?>" class="btn btn-success m-l-15" title="">
							Create Proposal
						</a>
						<?php endif; ?>
					<?php $fav_project = \App\Models\Crest\favorite::where('created_by', Auth::user()->id)->where('favorite_type', 'favorite_projects')->where('favorite_id',$project->id)->first(); ?>
						<?php if($fav_project): ?>
							<button class="btn btn-warning m-l-15" title="" onclick="unfavoriteProject(<?php echo e($project->id); ?>)">
								<i class="fa fa-heart"></i>Unfavorite Project
							</button>
						<?php else: ?>
							<button class="btn btn-info m-l-15" title="" onclick="favoriteProject(<?php echo e($project->id); ?>)">
								<i class="fa fa-heart"></i>Favorite Project
							</button>
						<?php endif; ?>

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-xlg-3 col-md-5">
					<div class="card">
						<div class="card-body">
						    <div style="display:inline-block" class="centerclass">
						        <?php if(isset($project->profile)): ?>
								<div class="mobilemanageset">
									<a href="/profiles/show/<?php echo e($project->profile->id); ?>"><img class="profile-icon" src="<?php echo e($project->profile->avatar); ?>" width="100px" height="100px"/></a>
								</div>
								<div style="float:left;padding-left: 10px;">
    								<strong><?php echo e($project->profile->company); ?></strong><br>
    								<?php echo e($project->profile->first_name); ?> <?php echo e($project->profile->last_name); ?><br>
    								<?php echo e($project->profile->type); ?>

								</div>
								<?php endif; ?>
							</div>
					</div>
							</div>		
					<div class="card">
						<div class="card-body">	
						    <p>
						    <h6>Preferred Method of Contact</h6>
						    <small class="text-muted">
						        <?php if(unserialize($project->preferred_contact) !== null): ?>
						        <?php $__currentLoopData = unserialize($project->preferred_contact); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						            <?php echo e($contact); ?><br>
						        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						        <?php endif; ?>
					        </small>
						    </p>
							<p>
							<p>
						    <h6>Email</h6>
						    <small class="text-muted"> <?php echo e($project->email); ?></small>
						    </p>
							<p>
							<p>
							<?php if($project->phone !== null): ?>
						    <h6>Phone Number</h6>
						    <small class="text-muted"> <?php echo e($project->phone); ?></small>
						    </p>
						    <?php endif; ?>
							<p>
							<h6>Project Start Date</h6>
							<?php $date=date_create($project->starts_on); ?>
							<small class="text-muted"> <?php echo e(date_format($date,"m-d-Y")); ?></small>
							</p>
							<p>
							<h6><?php echo e(trans('projects.need_bid_by_date')); ?></h6>
							<?php $date=date_create($project->need_bid_by_date); ?>
							<small class="text-muted"> <?php echo e(date_format($date,"m-d-Y")); ?></small>
							</p>
							<p>
							<h6>Trades</h6>
							<small class="text-muted"> <?php echo e($project->trade); ?></small>
							</p>
							<p>
							<h6><?php echo e(trans('projects.how_many_units')); ?></h6>
							<small class="text-muted"> <?php echo e($project->how_many_units); ?></small>
							</p>
							<p>
							<h6><?php echo e(trans('projects.job_type')); ?></h6>
							<small class="text-muted"> <?php echo e($project->job_type); ?></small>
							</p>
							<p>
							<h6>Location</h6>
							<small class="text-muted"> <?php echo e($project->location); ?></small>
							</p>
							<p>
						</div>
					</div>
				</div>
				<div class="col-lg-8 col-xlg-9 col-md-7">
					<div class="card">
						<div class="card-body">
							<p class="m-t-30"><?php echo e($project->description); ?></p>
						</div>
					</div>
					<div class="card">
						<div class="card-body">
							<h4>Project Files
							<?php if(count($files)): ?>
							<span style="float:right;"><a href="<?php echo e(asset('project-room/download-all' . '/' . $project->id)); ?>"><button class="btn btn-primary">Download All Files</button></a></span>
							<?php endif; ?>
							</h4>
							<div class="row">
								<?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="col-lg-2 col-md-4 col-sm-4 m-t-20">
										<div class="row">
										    <div style="width:100%;padding:10px;"><img width="100%" src="<?php echo e($file->type ? $file->type->link : $file->file_path); ?>"></div>
										    <?php if($file->type): ?>
											<div style="width:100%;padding:10px;"><?php echo e($file->file_name); ?></div>
											<div style="text-align: center;width: 100%;margin-top: 10px;"><a class="btn btn-primary" href="<?php echo e($file->file_path); ?>">Download</a></div>
											<?php else: ?>
											<div style="width:100%;padding:10px;"><?php echo e($file->file_name); ?></div>
											<div style="text-align: center;width: 100%;margin-top: 10px;"><a class="btn btn-primary" href="<?php echo e($file->file_path); ?>" target="_blank">View</a></div>
											<?php endif; ?>
										</div>
									</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
								
						</div>
					</div>
						<?php if(isset($proposals) && $proposals->count() > 0): ?>
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Proposals</h5>
						</div>
						<!-- ============================================================== -->
						<!-- Comment widgets -->
						<!-- ============================================================== -->
					
							<?php $__currentLoopData = $proposals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proposal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<div class="row">
										    <div class="col-lg-12 col-md-12 col-sm-12" style="padding:10px;">
										        <div class="row">
										            <div class="col-lg-4 col-md-12 col-sm-12  col-xs-12 resume-info">
										                <div class="row">
										                    <div class="col-lg-5 col-md-6 col-sm-6 col-6 resume-image">
										                        <object data="<?php echo e(asset('') . $proposal->user->avatar); ?>" type="image/png" style="width:90px;" class="profile-icon">
                										            <img width="90" src="<?php echo e(asset('') . 'storage/users/default.png'); ?>">
            										            </object>
										                    </div>
										                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
										                        <div class="row">
										                            <div class="col-md-12">
										                                <label style="font-weight:bold;"><a href="/profiles/show/<?php echo e(Auth::user()->profile->id); ?>" style="color:black;"> <?php echo e($proposal->profile->company); ?>

											                            <?php if($proposal->bid_status == 'declined'): ?>
                            											    - declined
                            											<?php endif; ?>
											                            </a></label>
										                            </div>
    										                        <div class="col-md-12">
    										                            <label><?php echo e($proposal->profile->first_name . ' ' . $proposal->profile->last_name); ?></label>
    										                        </div>
    										                        <div class="col-md-12">
    										                            <label><?php echo e($proposal->profile->type); ?></label>
    										                        </div>
										                        </div>
										                    </div>
										                </div>
										            </div>
										            <div class="col-lg-4 col-md-12 col-sm-12  col-12 resume-info resume-message" style="overflow:hidden; text-overflow:ellipsis; line-height:1.4;">
        										        <p><?php echo e($proposal->bid_description); ?></p>
										            </div>
										            <div class="col-lg-3 col-md-12 col-sm-12 resume-options">
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
    															<a href="<?php echo e(asset('proposals/show') . '/' . $proposal->id); ?>" class="btn btn-info" title="View Resume">
    																<span class="glyphicon glyphicon-open" aria-hidden="true"></span>View
    															</a>
    															<!--<a href="https://bidhub.com/proposals/56/edit" class="btn btn-primary" title="Edit Proposal">-->
    															<!--	<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit-->
    															<!--</a>-->
    
    															<button type="submit" class="btn btn-danger" title="Delete Proposal" onclick="return confirm(&quot;Click Ok to delete Proposal.&quot;)">
    																<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete
    															</button>
    														</div>
											        </div>
										        </div>
										    </div>
										  </div>
										  <hr style="color:#edf1f5; margin:10px 0;">
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<input type="hidden" id="baseURL" value="<?php echo e(asset('')); ?>">
	
	
	<style>
	    .mobilemanageset{float:left;}
	    @media  only screen and (max-width:780px){
	        .
	        .mobilemanageset{float:none; margin: 20px 0px;}
	        .card-body,.centerclass{text-align:center;}
	    }
	</style>
	
	
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
	var baseURL = $('#baseURL').val();
	function declineProposal(id) {
	    $.ajax({
	          url: baseURL+'/proposals/decline/'+id+'?type=decline',
	          method: 'get',
	          success: function (res) {
	              window.location.reload();
                    }
	    })
          }

          function restoreProposal(id) {
              $.ajax({
                  url: baseURL+'/proposals/decline/'+id+'?type=restore',
                  method: 'get',
                  success: function (res) {
                      window.location.reload();
                  }
              })
          }

          function unfavoriteProposal(id) {
              $.ajax({
                  url: baseURL+'favorites/create?id='+id+'&&type=proposal',
                  method: 'get',
                  success: function (res) {
                      window.location.reload();
                  }
              })
          }

          function favoriteProposal(id) {
              $.ajax({
                  url: baseURL+'favorites/create?id='+id+'&&type=proposal',
                  method: 'get',
                  success: function (res) {
                      window.location.reload();
                  }
              })
          }

          function favoriteProject(id) {
              $.ajax({
                  url: baseURL+'favorites/favorite?id='+id+'&&type=project',
                  method: 'get',
                  success: function (res) {
                      window.location.reload();
                  }
              })
          }

          function unfavoriteProject(id) {
              $.ajax({
                  url: baseURL+'favorites/favorite?id='+id+'&type=project&is_favorite=1',
                  method: 'get',
                  success: function (res) {
                      window.location.reload();
                  }
              })
          }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bidhub/bidhub/resources/views/project-room/show.blade.php ENDPATH**/ ?>