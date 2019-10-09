  <?php $__env->startSection('navigation'); ?>
      <?php echo $__env->make('layouts.navUser', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
	<link href="<?php echo e(asset('/css/extra-physical.css')); ?>?<?php echo e(time()); ?>" rel="stylesheet" type="text/css" >
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?> 
  	<?php if(!isset(Auth::user()->email)): ?>
        <script>window.location="Login";</script>
    <?php endif; ?>   					
	<div class="jumbotron bg-white rounded-bottom border border-danger mx-4">
		<h2 class="text-center text-danger">Exercise</h2>	
		<hr>
		<div class="container text-center">
			<div class="row">
				<div class="col align-self-center">
					<p class="lead">For children to grow up healthy,
						it's important they are physically active.</p>
					<p class="lead"> Is your child <i>moving</i> enough? </p>
					<img id="physicalPic" class="img-fluid " 
						src="<?php echo e(asset('/content/Exercise-Introduction.jpg')); ?>?<?php echo e(time()); ?>" 
						alt="Generic placeholder image">	
				</div>	
			</div>
			<hr>
			
		</div>
    <!-- /END THE FEATURETTES -->
    <!-- /Start Nav Buttons -->
		<div class="av1">
			<form>
				<button onclick="location.href = 'Tests'" type="button" class="btn btn-outline-secondary btn-lg mr-5">Back</button>
				<button onclick="location.href = 'Exercise1'" type="button" class="btn btn-primary btn-lg ml-5">Next</button>
			</form>
		</div>	
	</div><!-- /.container -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>