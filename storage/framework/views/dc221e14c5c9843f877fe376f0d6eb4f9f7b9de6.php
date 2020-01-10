<?php $__env->startSection('content'); ?>


	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="text-themecolor">Create User</h4>
				</div>
				<div class="col-md-7 align-self-center text-right">
					<div class="d-flex justify-content-end align-items-center">
						                    <a href="<?php echo e(route('profiles.profile.admin')); ?>" class="btn btn-info m-l-15" title="<?php echo e(trans('profiles.create')); ?>">
						                        <i class="fa fa-plus-circle"></i>Manage Users
						                    </a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6 mx-auto">
					<div class="card">
						<div class="card-body">
							<form method="POST" action="<?php echo e(route('profiles.profile.save_user')); ?>" autocomplete="off">
								<?php echo e(csrf_field()); ?>

								<div class="row">
									<div class="col-12">
										<div class="form-group <?php echo e($errors->has('role') ? 'has-error' : ''); ?>">
											<label for="role" class="col-12 control-label"><?php echo e(trans('profiles.role')); ?></label>
											<div class="col-12">
												<select class="form-control" name="role" id="role">
													<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													    <?php if($role->id ==2): ?>
													    <?php else: ?>
														<option value="<?php echo e($role->display_name); ?>"><?php echo e($role->display_name); ?></option>
														<?php endif; ?>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</select>
											</div>
										</div>
									</div>
									<!--<div class="col-12">-->
									<!--	<div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">-->
									<!--		<label for="name" class="col-12 control-label">User name</label>-->
									<!--		<div class="col-md-12">-->
									<!--			<input class="form-control" name="name" type="text" id="name" required="true" value="" placeholder="Username" autcomplete="false">-->
									<!--			<?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>-->
									<!--		</div>-->
									<!--	</div>-->
									<!--</div>-->
									<div class="col-12">
										<div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
											<label for="email" class="col-12 control-label">Email</label>
											<div class="col-md-12">
												<input class="form-control" name="email" type="email" id="email" maxlength="100" placeholder="Email" required>
												<?php echo $errors->first('email', '<p class="help-block">:message</p>'); ?>

											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
											<label for="password" class="col-12 control-label">Password</label>
											<div class="col-md-12">
												<input class="form-control" name="password" type="password" id="password" maxlength="100" placeholder="Password" required>
												<?php echo $errors->first('password', '<p class="help-block">:message</p>'); ?>

											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group <?php echo e($errors->has('plan') ? 'has-error' : ''); ?>">
											<label for="plan" class="col-12 control-label">Plans</label>
											<div class="col-12">
												<select class="form-control" name="plan" id="plan">
												    <?php
												    
												    ?>
													<?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($plan->id); ?>"><?php echo e($plan->plan_name); ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													
												</select>
											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group <?php echo e($errors->has('plan') ? 'has-error' : ''); ?>">
											<label for="plan" class="col-12">Add-Ons</label>
											<div class="col-12">
											    
													<?php $__currentLoopData = $addons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $on): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													    <?php if($on->id == 1): ?>
														<input type="checkbox" name="help" value="<?php echo e($on->id); ?>" style="margin-right:5px"/><?php echo e($on->title); ?></br></br>
														<?php else: ?>
														<input type="radio"name="property" value="<?php echo e($on->id); ?>" style="margin-right:5px"/><?php echo e($on->title); ?><span style="margin-right: 30px;"></span>
														<?php endif; ?>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="text-center">
									<button class="btn btn-success btn-block" type="submit">Save User</button>
								</div>
							</form>


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bidhub/bidhub/resources/views/profiles/admin.blade.php ENDPATH**/ ?>