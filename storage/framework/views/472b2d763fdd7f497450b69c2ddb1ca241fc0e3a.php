  <?php
    use App\Results;  
    use App\Child;
  ?>
  <?php $__env->startSection('navigation'); ?>
      <?php echo $__env->make('layouts.navUser', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('/css/extra-sedentary.css')); ?>?<?php echo e(time()); ?>" rel="stylesheet" type="text/css" >
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('content'); ?>
  	<?php if(!isset(Auth::user()->email)): ?>
        <script>window.location="Login";</script>
    <?php endif; ?>  
    <?php
    	$result = App\Results::where('childID', Auth::user()->currentChild)->first();
    	$child = App\Child::where('childID', Auth::user()->currentChild)->first();
    	$screenSD = $result->RscreentimeWkd;
    	$screenNSD = $result->RscreentimeWed;

    	if ($screenSD == 0)
    	{
    		$screenSDMessage = "Nice Job!";
    	}
    	else
    	{
    		$screenSDMessage = "Just a little bit more!";
    	}
    	if ( $screenNSD == 0)
    	{
    		$screenNSDMessage = "Nice Job!";
    	}
    	else
    	{
    		$screenNSDMessage = "Just a little bit more!";
    	}

    	if ($screenSD  == 0 && $screenNSD  == 0)
    	{
    		$finalMessage = "Congratulation! Your Child, ".$child->CfName." ".$child->ClName.
    		"'s screen time is well balanced!";
    	}
    	elseif ($screenSD  == 0 && $screenNSD  == 1)
    	{
    		$finalMessage = "Great Job! Your Child, ".$child->CfName." ".$child->ClName.
    		", has balanced screen time during the school days. However, they are spending too much time on the screen during the NON-school days!";
    	}
    	elseif ($screenSD  == 1 && $screenNSD  == 0)
    	{
    		$finalMessage = "Great Job! Your Child, ".$child->CfName." ".$child->ClName.
    		", has balanced screen time during the NON-school days. However, they are spending too much time on the screen during the school days!";
    	}
    	else
    	{
    		$finalMessage = "Keep it up! Your Child, ".$child->CfName." ".$child->ClName.
    		", is spending too much time in front of the screen.";
    	}
	?> 
						
		<div class="jumbotron bg-white rounded-bottom border border-info mx-4">			
			<h2 class="text-center text-info">Screen Time</h2>					
			<hr>
			<div class="container text-center">
				<div class="row">
					<div class="col align-self-center">
						<h3 class="featurette-heading text-info">Result<span class="text-muted"></span></h3>
						<div class="row justify-content-center text-white">
							<div class="col-6 lead bg-info">School Days</div>
							<div class="col-6 lead bg-info">Non-School Days</div>
						</div>
						<div class="row justify-content-center">
							<div class="col-6 text-black lead border border-info" style="background-color:#b1e0e7"><?php echo e($screenSDMessage); ?></div>
							<div class="col-6 text-black lead  border border-info" style="background-color:#b1e0e7"><?php echo e($screenNSDMessage); ?></div>
						</div>
						<p class="lead"><?php echo e($finalMessage); ?></p>
						<img id="sedentaryPic" class="img-fluid" 
							src="./content/Sedentary-Result.png" 
							alt="Generic placeholder image">	
					</div>	
				</div>
				<hr>
			</div>
        <!-- /Start NAV Buttons -->
    	<div class="av1">
			<form>
			 	<button class="btn btn-primary btn-lg ml-5" type="button" onclick="location.href = 'Tips'">
                  Next
              	</button>
			</form>
		</div>	
		</div>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>