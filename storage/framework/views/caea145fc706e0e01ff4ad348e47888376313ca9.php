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
				<div>
				<h2 class="text-center text-info">Screen Time</h2>
				</div>					
			<hr>

			<!-- Collapsible List -->
			<div class="container text-center">
				<div class="row">
					<div class="col align-self-center">
						<h3 class="featurette-heading text-info">Activity List<span class="text-muted"></span></h3>
						<p class="lead">The follow activities involves interacting with screens: </p>
						<div class="row justify-content-center">
							
							<ul class="list-group border border-info">
							  <li class="list-group-item lead">Watching TV</li>
							  <li class="list-group-item lead">Watching Videos/DVDs</li>
							  <li class="list-group-item lead">Using the Computer for fun</li>
							  <li class="list-group-item lead">Playing on smart phone or tablet</li>
							  <li class="list-group-item lead">Playing computer or video games</li>
							  <li class="list-group-item lead"> Using the computer for doing homework</li>
							</ul>
						</div>
						

					</div>	
				</div>
				
				<hr>
				
			</div>
        <!-- /END THE FEATURETTES -->
        <!-- Start NAV Buttons -->
        	<div class="av1">
				<form>
					<button onclick="location.href = 'ScreenTime0'" type="button" class="btn btn-outline-secondary btn-lg mr-5">Back</button>
   				 	<button class="btn btn-primary btn-lg ml-5" type="button" onclick="location.href = 'ScreenTime2'">
                  Next
              	</button>
				</form>
			</div>	
		</div><!-- /.container -->
    </main>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>