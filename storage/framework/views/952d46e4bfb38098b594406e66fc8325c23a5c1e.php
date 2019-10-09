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
		<div class="jumbotron bg-white rounded-bottom border border-info mx-2">
 <?php
    $data=DB::table('summernotes')->where("item_id","=",13)->value('content');
    ?>
    <?php echo $data; ?>

				

        <!-- /END THE FEATURETTES -->
        <!-- Start NAV Buttons -->
        	<div class="av1">
				<form>
					<button onclick="location.href = 'ScreenTime0'" type="button" class="btn btn-outline-secondary btn-lg mr-5">Back</button>
   				 	<button class="btn btn-primary btn-lg " type="button" onclick="location.href = 'ScreenTime2'">
                  Next
              	</button>
				</form>
			</div>	
		</div><!-- /.container -->
    </main>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>