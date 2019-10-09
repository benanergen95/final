  <?php
    use App\Results;  
    use App\Child;
  ?>
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
    <?php
    	$result = App\Results::where('childID', Auth::user()->currentChild)->first();
    	$child = App\Child::where('childID', Auth::user()->currentChild)->first();
    	$exercise = $result->RphysicalActivity;

    	if ($exercise == 1)
    	{
    		$exerciseMessage = "Great Job!";
    		$finalMessage = "Amazing Job! Your Child, ".$child->CfName." ".$child->ClName.
    		", fall in the healthy range for their physical activity level.";
    	}
    	else
    	{
    		$exerciseMessage = "Room for improvement!";
    		$finalMessage = "Your Child, ".$child->CfName." ".$child->ClName.
    		", is not getting the amount of exercise they needed.";
    	}
	?>  
						
	<div class="jumbotron bg-white rounded-bottom border border-danger mx-4">
		<h2 class="text-center text-danger">Exercise</h2>				
		<hr>
		<div class="container text-center">
			<div class="row">
				<div class="col align-self-center">
					<h3 class="featurette-heading text-danger">Result<span class="text-muted"></span></h3>
					<div class="row justify-content-center  text-white">
						<div class="col-10 lead bg-danger py-2" style="background-color:#f4bec3"><?php echo e($exerciseMessage); ?></div>
					</div>
					<p class="lead"><?php echo e($finalMessage); ?></p>
					<img id="physicalPic" class="img-fluid" 
						src="./content/Physical-Result.png" 
						alt="Generic placeholder image">	
				</div>	
			</div>
			<hr>
		</div>
    <!-- /END THE FEATURETTES -->
    <!-- /Start NAV Buttons -->
    	<div class="av1">
			<form>
				<button onclick="location.href = 'Tips'" type="button" class="btn btn-primary btn-lg ml-5">Next</button>
			</form>
		</div>	
	</div><!-- /.container -->

	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>