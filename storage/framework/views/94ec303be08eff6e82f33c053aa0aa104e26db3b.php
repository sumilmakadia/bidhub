<?php $__env->startSection('title', 'Page Title'); ?>
<?php $__env->startSection('content'); ?>
	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="text-themecolor"><?php echo e($profile->first_name); ?> <?php echo e($profile->last_name); ?></h4>
				</div>
				
				<div class="col-md-7 align-self-center text-right">
					<div class="d-flex justify-content-end align-items-center">
						<?php if($user = Auth::user()): ?>
					    <?php if(Auth::id() == $profile->user->id): ?>
						<a href="/portfolios" class="btn btn-warning m-l-15" title="">
							<i class="fa fa-heart"></i>Manage Porfolio
						</a>
						<?php endif; ?>
						<?php endif; ?>


					



					</div>
				</div>
			</div>
			<div class="row">

				<div class="col-lg-4 col-xlg-3 col-md-5">
					<div class="card">
						<div class="card-body">
							<center class="m-t-30">
								<img class="profile-icon" src="<?php echo e($profile->avatar); ?>" alt="" style="max-width: 250px; max-height: 200px;">
							</center>

						</div>
					</div>
					<div class="card">
						<div class="card-body">
							<p>
							<h6>Company</h6>
							<small class="text-muted"><?php echo e($profile->company); ?></small>
							</p>
							<p>
							<h6>License Number</h6>
							<small class="text-muted">
						    <?php $__currentLoopData = explode("\r\n",$profile->license_number); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $number): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							    <?php echo e($number); ?><br>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						    </small>
							</p>
							<p>
							<h6>Location</h6>
							<small class="text-muted"> <?php echo e($profile->location); ?></small>
							</p>
							<p>
							<h6>Phone</h6>
							<small class="text-muted"><?php echo e($profile->phone); ?></small>
							</p>
							<p>
							<h6>Mobile</h6>
							<small class="text-muted"><?php echo e($profile->mobile); ?></small>
							</p>

							<p>
							<h6>Website</h6>
							<small class="text-muted"><?php echo e($profile->website); ?></small>
							</p>
							<p>
							<h6>Email</h6>
							<small class="text-muted"><?php echo e($profile->user->email); ?></small>
							</p>
							<h6>Trade</h6>
							<small class="text-muted"><?php echo e(str_replace(",",", ", $profile->trade)); ?></small>
							</p>

						</div>
					</div>
				</div>
				<div class="col-lg-8 col-xlg-9 col-md-7">
					<div class="card">
						<div class="card-body">
							<p class="m-t-30"><?php echo $profile->bio; ?></p>
						</div>
					</div>
					<div class="card">
						<div class="card-body">
						    
						    <?php $portfolios = DB::table('userprofile_images')->where('created_by', $profile->user_id)->get(); ?>
							<h3>Photos</h3>
							
							<div class="row p-20 p20">
							<?php $__currentLoopData = $portfolios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $portfolio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							
							
								<div class="col-lg-4 col-md-6 m-b-20">
								
									<img src="<?php echo e($portfolio->file_path); ?>" class="img-responsive radius mb-20" alt="">
									
								</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
							
						<?php /* $portfolios = DB::table('portfolios')->where('created_by', $profile->user_id)->get(); ?>
							<h3>Portfolio</h3>
							<div class="row p-20 p20">
							@foreach($portfolios as $portfolio)
								<div class="col-lg-4 col-md-6 m-b-20">
									<h4>{{$portfolio->title}}</h4>
									<img src="{{$portfolio->image}}" class="img-responsive radius mb-20" alt="">
									<p>{{str_limit($portfolio->description, 200, '...')}}</p>
									<a href="/portfolios/show/{{$portfolio->id}}" class="btn btn-primary">View</a>
								</div>
							@endforeach
							</div> <?php */ ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<input type="hidden" id="baseURL" value="<?php echo e(asset('')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
	<script>
              var baseURL = $('#baseURL').val();

              function favoriteUser(id) {
                  $.ajax({
                      url: baseURL+'favorites/create?id='+id+'&&type=user',
                      method: 'get',
                      success: function (res) {
                          window.location.reload();
                      }
                  })
              }

              function unfavoriteUser(id) {
                  $.ajax({
                      url: baseURL+'favorites/create?id='+id+'&&type=user',
                      method: 'get',
                      success: function (res) {
                          window.location.reload();
                      }
                  })
              }
	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bidhub/bidhub/resources/views/profiles/show.blade.php ENDPATH**/ ?>