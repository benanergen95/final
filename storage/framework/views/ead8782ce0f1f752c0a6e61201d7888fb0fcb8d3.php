
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
						
	<div class="jumbotron bg-white rounded-bottom border border-success mx-4">
		<form action="<?php echo e(url('StoreFruits')); ?>" method="post">
		<?php echo e(csrf_field()); ?>

			
		<h2 class="text-center text-success">Fruits and Vegetables</h2>

		<hr>

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
					<h3 class="featurette-heading text-success">Fruits <span class="text-muted"></span></h3>
					<div>
						<p class="lead">How many serves of fruits does your child usually eat each day?</p>
						<p class="lead">A serve is also = 1 cup of diced pieces. Include fresh, dried, frozen and tinned fruit. </p>
		              <div>
			              <img id="serve-fruits" class="img-fluid" 
			              src="<?php echo e(asset('/content/serve-fruits.png')); ?>?<?php echo e(time()); ?>" 
			              alt="Generic placeholder image">
		              </div>
						<input id="slider" type="number" data-slider-id='sliderID' data-slider-min="0" data-slider-max="8" 
							data-slider-step="0.5" data-slider-value="3" name="fruits"/>
						<p>Serves of Fruits: <span id="fruitAmount" class="text-success"></span></p>
			             
					</div>
				</div>	
			</div>
			<hr>
		</div>
    <!-- /END THE FEATURETTES -->
    <!-- START of Nav Buttons -->
    <div class="av1">
		<button class="btn btn-outline-secondary btn-lg mr-5" type="button" onclick="location.href = 'Diet0'">
		    Back
		</button>
        <input type="submit" value="Next" class="btn btn-primary btn-lg ml-5">
	</form>
	</div>	

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
	<script>
		var slider = new Slider('#slider', {
			formatter: function(value) {
				$('#fruitAmount').html(value);
				
				if (value == 8){
					$('#fruitAmount').html("More than 7");
				}
			}
		});
		

	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>