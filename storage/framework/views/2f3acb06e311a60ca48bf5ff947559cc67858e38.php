  <?php $__env->startSection('navigation'); ?>
      <?php echo $__env->make('layouts.navUser', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('/css/extra-sleep.css')); ?>?<?php echo e(time()); ?>" rel="stylesheet" type="text/css" >
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('pageStyle'); ?>
  	.combodate {display:block}
    .combodate .form-control {display:inline-block}
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('content'); ?> 
  <?php
    $data=DB::table('summernotes')->where("item_id","=",74)->value('content');
    $data2=DB::table('summernotes')->where("item_id","=",75)->value('content');
    $data3=DB::table('summernotes')->where("item_id","=",76)->value('content');
    ?>
  		<!--Check if user is logged in-->
		<?php if(!isset(Auth::user()->email)): ?>
	        <script>window.location="Login";</script>
	    <?php endif; ?> 					
		<div class="jumbotron bg-white rounded-bottom border border-secondary mx-2">
			<form method="post" action="<?php echo e(url('StoreSleepNSD')); ?>">
			<?php echo e(csrf_field()); ?>



			<?php if(count($errors) > 0): ?>
		        <div class="alert alert-danger">
		          <ul>
		            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		              <li><?php echo e($error); ?></li>
		            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		          </ul>
		        </div>
		    <?php endif; ?>
			<div class="container text-center">
				<div class="row">
					<div class="col align-self-center">
						<?php echo $data; ?>

						<div class="form-group">
		                  <input id="timeSleep" name="SleepTime" data-format="h:mm A" data-template="hh : mm A" data-custom-class="form-control">
		              	</div>
						<?php echo $data2; ?>


						<div class="form-group">
		                  <input id="timeWake" name="AwakeTime" data-format="h:mm A" data-template="hh : mm A" data-custom-class="form-control">
		              	</div>

						<?php echo $data3; ?>

					</div>
				</div>
				<hr>
			</div>
        <!-- /END THE FEATURETTES -->
        <!-- /Start NAV Buttons -->
			<div class="av1">
				<form>
					<button onclick="location.href = 'Sleep1'" type="button" class="btn btn-outline-secondary btn-lg mr-5">Back</button>
				 	<input type="submit" value="Next" class="btn btn-primary btn-lg ">					</form>
			</div>
		</div><!-- /.container -->
	<?php $__env->stopSection(); ?>  
	<?php $__env->startSection('script'); ?>
    <script>
		$('#timeSleep').combodate({
	      	value: "9:00 PM"
	    });  

	    $('#timeWake').combodate({
	    	value: "7:00 AM"
	    });  

	</script>
  	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>