  <?php
    use App\Results;  
    use App\Child;
  ?>
  <?php $__env->startSection('navigation'); ?>
      <?php echo $__env->make('layouts.navUser', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('/css/extra-diet.css')); ?>?<?php echo e(time()); ?>" rel="stylesheet" type="text/css" >
  <?php $__env->stopSection(); ?>
  
  <?php $__env->startSection('content'); ?> 
  		<?php if(!isset(Auth::user()->email)): ?>
	        <script>window.location="Login";</script>
	    <?php endif; ?>
	    <?php
	    	$result = App\Results::where('childID', Auth::user()->currentChild)->first();
	    	$child = App\Child::where('childID', Auth::user()->currentChild)->first();
	    	$fruits = $result->RfruitsIntake;
	    	$veggies = $result->RveggiesIntake;

	    	if ($fruits == 0)
	    	{
	    		$fruitMessage = "Well Done!";
	    	}
	    	else
	    	{
	    		$fruitMessage = "You're Getting There!";
	    	}
	    	if ( $veggies == 0)
	    	{
	    		$veggiesMessage = "Well Done!";
	    	}
	    	else
	    	{
	    		$veggiesMessage = "You're Getting There!";
	    	}

	    	if ($fruits == 0 && $veggies == 0)
	    	{
	    		$finalMessage = "Congratulation! Your Child, ".$child->CfName." ".$child->ClName.
	    		", is eating enough of both fruits and vegetables!";
	    	}
	    	elseif ($fruits == 0 && $veggies == 1)
	    	{
	    		$finalMessage = "Great Job! Your Child, ".$child->CfName." ".$child->ClName.
	    		", is eating enough fruits. However, they are NOT eating enough vegetables!";
	    	}
	    	elseif ($fruits == 1 && $veggies == 0)
	    	{
	    		$finalMessage = "Great Job! Your Child, ".$child->CfName." ".$child->ClName.
	    		", is eating enough vegetables. However, they are NOT eating enough fruits!";
	    	}
	    	else
	    	{
	    		$finalMessage = "Keep it up! Your Child, ".$child->CfName." ".$child->ClName.
	    		", is NOT eating enough of both fruits and vegetables.";
	    	}


	    ?>   							
		<div class="jumbotron bg-white rounded-bottom border border-success mx-4">
			<h2 class="text-center text-success">Fruits and Vegetables</h2>
			<hr>
			<div class="container text-center">
				<div class="row">
					<div class="col align-self-center">
						<h3 class="featurette-heading text-success">Result<span class="text-muted"></span></h3>
						<div class="row justify-content-center  text-white">
							<div class="col-6 lead bg-success">Vegetables</div>
							<div class="col-6 lead bg-success">Fruits</div>
						</div>
						<div class="row justify-content-center">
							<div class="col-6 text-black lead border border-success" style="background-color:#b3e0bd"><?php echo e($veggiesMessage); ?></div>
							<div class="col-6 text-black lead  border border-success" style="background-color:#b3e0bd"><?php echo e($fruitMessage); ?></div>
						</div>
						<p class="lead"><?php echo e($finalMessage); ?></p>
						<img id="vegePic" class="img-fluid" 
							src="<?php echo e(asset('/content/Diet-Result.jpg')); ?>?{{time()}" 
							alt="Generic placeholder image" width="500px">	
					</div>	
				</div>
				<hr>
			</div>
        <div class="av1">
			<form>
            	<button class="btn btn-primary btn-lg ml-5" type="button" onclick="location.href = 'Diet4'">
                  Next
              	</button>
			</form>
		</div>	
		</div>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>