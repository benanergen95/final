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

		<div class="jumbotron bg-white rounded-bottom border border-info mx-4">
			<form method="post" action="<?php echo e(url('StoreScreenNSD')); ?>">
			<?php echo e(csrf_field()); ?>


			<h2 class="text-center text-info">Screen Time</h2>	
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
						<h3 class="featurette-heading text-info"><b>Non</b>-School Days<span class="text-muted"></span></h3>
						<div>
							<p class="lead">“Overall, your child has about 16 hours of free time on a <b>non</b>-school day, some of which is spent on sedentary activities such as screen time.”
							</p>
							<p class="lead">Think about a normal <b>non-school day!</b> How long screen your
								child has each <b>non</b>-school day. 
							</p>
							<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#list">
								Click Here To Show Activity List</i></button>
						<div class="row justify-content-center">
							<div id="list" class="collapse border border-success">
								<li class="list-group-item">Watching TV</li>
								<li class="list-group-item">Watching Videos/DVDs</li>
								<li class="list-group-item">Using the Computer for fun</li>
								<li class="list-group-item">Playing on smart phone or tablet</li>
								<li class="list-group-item">Playing computer or video games</li>
								<li class="list-group-item">Using the computer for doing homework</li>
							</div>
						</div>
							
							<div class="pt-3">
							<input id="slider"  type="number" data-slider-id='sliderID' data-slider-min="0" data-slider-max="18" data-slider-step="0.5" data-slider-value="3" name="screenNSD"/></div>
								
							<p>Number of hours: <span id="days" class="text-info"></span></p>
							<img id="sedentaryPic0" class="img-fluid" 
								src="<?php echo e(asset('/content/Sedentary0.png')); ?>?<?php echo e(time()); ?>" alt="Generic placeholder image" style="display: none; margin:0 auto;">
                            <img id="sedentaryPic1" class="img-fluid" 
                            	src="<?php echo e(asset('/content/Sedentary1.png')); ?>?<?php echo e(time()); ?>" alt="Generic placeholder image"  style="display: none; margin:0 auto;">
                            <img id="sedentaryPic2" class="img-fluid" 
                            	src="<?php echo e(asset('/content/Sedentary2.png')); ?>?<?php echo e(time()); ?>" alt="Generic placeholder image" style="margin:0 auto;">
                            <img id="sedentaryPic3" class="img-fluid" 
                            	src="<?php echo e(asset('/content/Sedentary3.png')); ?>?<?php echo e(time()); ?>" alt="Generic placeholder image" style="display: none; margin:0 auto;">
						</div>
					</div>	
				</div>
				<hr>

			</div>
	        <div class="av1">				
				<button onclick="location.href = 'ScreenTime2'" type="button" class="btn btn-outline-secondary btn-lg mr-5">Back</button>
			 	<input type="submit" value="Next" class="btn btn-primary btn-lg ml-5">		
			</div>
		</form>
	</div>
	<?php $__env->stopSection(); ?>	

	<?php $__env->startSection('script'); ?>
	<script>
		var x = "";
		
			
		var slider = new Slider('#slider', {
			formatter: function(value) {
				$('#days').html(value);
				hideImage();
				
				if (value >= 0 && value < 2.5 ){
					document.getElementById('sedentaryPic0').style.display = "block";		
				}
				else if(value >= 2.5  && value < 6){
					document.getElementById('sedentaryPic1').style.display = "block";
				}
				else if(value >= 6 && value < 9){
					document.getElementById('sedentaryPic2').style.display = "block";
				}
				else {
					document.getElementById('sedentaryPic3').style.display = "block";
				}
			}
		});
		
		function hideImage(){
			for(i=0;i < 4; i++){
				document.getElementById('sedentaryPic' + i).style.display = 'none';
			}
		}
		
	
	</script>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>