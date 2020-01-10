<?php $__env->startSection('title', 'Page Title'); ?>
<?php $__env->startSection('content'); ?>

          <div class="page-wrapper" style="min-height: 149px;">
                    <div class="container-fluid">
                              <div class="row page-titles">
                                        <div class="col-md-5 align-self-center">
                                                  <h4 class="text-themecolor"><?php echo e(isset($title) ? $title : 'Proposal'); ?></h4>
                                        </div>
                                        <div class="col-md-7 align-self-center text-right">
                                                  <div class="d-flex justify-content-end align-items-center">

                                                  </div>
                                        </div>
                              </div>
                              <div class="row">
                                        <div class="col-lg-4 col-xlg-3 col-md-5">
                                            <div class="card">
                        						<div class="card-body">
                        						    <div style="display:inline-block">
                        								<div style="float:left;">
                        									<a href="/app/profiles/show/<?php echo e($proposal->profile->id); ?>"><img class="profile-icon" src="<?php echo e($proposal->profile->avatar); ?>" width="100px" height="100px"/></a>
                        								</div>
                        								<div style="float:left;padding-left: 10px;">
                            								<strong><?php echo e($proposal->profile->company); ?></strong><br>
                            								<?php echo e($proposal->profile->first_name); ?> <?php echo e($proposal->profile->last_name); ?><br>
                            								<?php echo e($proposal->profile->type); ?>

                        								</div>
                        							</div>
                        					    </div>
                        					</div>
                                                  <div class="card">
                                                            <div class="card-body">
                                                                      <p>
                                                                      <h6><?php echo e(trans('proposals.bid_title')); ?></h6>
                                                                      <small class="text-muted"> <?php echo e($proposal->bid_title); ?></small>
                                                                      </p>
                                                                      <!--<p>-->
                                                                      <!--<h6>Created By</h6>-->
                                                                      <!--<small class="text-muted"> <?php echo e($proposal->user->name); ?></small>-->
                                                                      <!--</p>-->
                                                                      <!--<p>-->
                                                                      <!--<h6><?php echo e(trans('proposals.bid_status')); ?></h6>-->
                                                                      <!--<small class="text-muted"> <?php echo e($proposal->bid_status); ?></small>-->
                                                                      <!--</p>-->

                                                            </div>
                                                  </div>
                                        </div>
                                        <div class="col-lg-8 col-xlg-9 col-md-7">
                                                  <div class="card">
                                                            <div class="card-body">
                                                                      <p class="m-t-30"><?php echo e($proposal->bid_description); ?></p>
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
										        $src = '/app/public/storage/company/images/PDF-icon-small-231x300.png';
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
                                        </div>
                              </div>
                    </div>
          </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bidhub/bidhub/resources/views/proposals/show.blade.php ENDPATH**/ ?>