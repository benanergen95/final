  <?php
    use App\Results;  
    use App\Child;
  ?>
  <?php $__env->startSection('navigation'); ?>
      <?php echo $__env->make('layouts.navUser', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('/css/extra-sleep.css')); ?>?<?php echo e(time()); ?>" rel="stylesheet" type="text/css" >
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('content'); ?> 
  		<!--Check if user is logged in-->
		<?php if(!isset(Auth::user()->email)): ?>
	        <script>window.location="Login";</script>
	    <?php endif; ?>
	    <!--Display result message for user-->
	    <?php
	    	$result = App\Results::where('childID', Auth::user()->currentChild)->first();
	    	$child = App\Child::where('childID', Auth::user()->currentChild)->first();
	    	$sleepSD = $result->RStimeSD;
	    	$sleepNSD = $result->RStimeNSD;

	    	if ($sleepSD == 0)
	    	{
	    		$sleepSDMessage = "Enough Sleep!";
	    	}
	    	elseif($sleepSD == 2)
	    	{
	    		$sleepSDMessage = "Too much sleep!";
	    	}
	    	else
	    	{
	    		$sleepSDMessage = "Need more sleep!";
	    	}

	    	if ( $sleepNSD == 0)
	    	{
	    		$sleepNSDMessage = "Enough Sleep!";
	    	}
	    	elseif ($sleepNSD == 2)
	    	{
	    		$sleepNSDMessage = "Too much sleep!";
	    	}
	    	else
	    	{
	    		$sleepNSDMessage = "Need more sleep!";
	    	}

	    	if ($sleepSD  == 0 && $sleepNSD  == 0)
	    	{
	    		$finalMessage = "Excellent! Your Child, ".$child->CfName." ".$child->ClName.
	    		", has enough sleep during School days and NON-School days.";
	    	}
	    	elseif ($sleepSD  == 0)
	    	{
	    		$finalMessage = "Nice Job! Your Child, ".$child->CfName." ".$child->ClName.
	    		", has enough sleep during school days. However their sleep hours during NON-school days does not fall in the healthy range for sleeping.";
	    	}
	    	elseif ($sleepNSD  == 0)
	    	{
	    		$finalMessage = "Nice Job! Your Child, ".$child->CfName." ".$child->ClName.
	    		", has enough sleep during NON-school days. However their sleep hours during school days does not fall in the healthy range for sleeping.";
	    	}
	    	else
	    	{
	    		$finalMessage = "Your Child, ".$child->CfName." ".$child->ClName.
	    		", does not fall in the healthy range for sleeping.";
	    	}
		?>  							
		<div class="jumbotron bg-white rounded-bottom border border-secondary mx-4">			
			<h2 class="text-center text-secondary">Sleep</h2>		
			<hr>
			<div class="container text-center">
				<div class="row">
					<div class="col align-self-center">
						<h3 class="featurette-heading text-secondary">Result<span class="text-muted"></span></h3>
						<div class="row justify-content-center  text-white">
							<div class="col-6 lead bg-secondary">School Days</div>
							<div class="col-6 lead bg-secondary">Non-School Days</div>
						</div>
						<div class="row justify-content-center">
							<div class="col-6 text-black lead border border-secondary" style="background-color:#e4e6e7"><?php echo e($sleepSDMessage); ?></div>
							<div class="col-6 text-black lead  border border-secondary" style="background-color:#e4e6e7"><?php echo e($sleepNSDMessage); ?></div>
						</div>
						<p class="lead"><?php echo e($finalMessage); ?></p>
						<img id="sleepPic" class="img-fluid" 
							src="<?php echo e(asset('/content/Sleep-Result.jpg')); ?>?<?php echo e(time()); ?>" alt="Generic placeholder image" width="600px">	
					</div>	
				</div>
				<hr>
			</div>
        <!-- /END THE FEATURETTES -->
        <!-- /Start NAV Buttons -->
			<div class="av1">
				<form>
					<button onclick="location.href = 'Sleep4'" type="button" class="btn btn-primary btn-lg ml-5">Next</button>
				</form>
			</div>

		</div><!-- /.container -->
  
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>