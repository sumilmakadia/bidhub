<?php $__env->startSection('content'); ?>
	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="text-themecolor">Page Not Found</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
				    <div class="card project-card" style="text-align: center;padding: 50px 0;">
					<h2>The page you are looking for cannot be found.</h2>
                    <p style="font-size:18px;">Please try again or return to the <a href="/">home page.</a></p>
                    </div>
				</div>
			</div>

		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bidhub/bidhub/resources/views/errors/404.blade.php ENDPATH**/ ?>