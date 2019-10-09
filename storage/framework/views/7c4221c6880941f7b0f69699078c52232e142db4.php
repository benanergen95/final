
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
    <!-- Begin page content -->
      <div class="jumbotron bg-white rounded-bottom border border-success mx-4">
        
		    <h2 class="text-center text-success">Fruits and Vegetables</h2>
        <hr>


        <div class="container text-center">
          <div class="lead">
          <p class="">Is your child eating enough Fruits
              & Veggies? </p>
          <p class="">Lets find out!.</p>
          </div>
        </div>
        <picture>
          <div class="text-center">
              <img id="vegePic" class="img-fluid" 
              src="<?php echo e(asset('/content/Dietary-Introduction.jpg')); ?>?<?php echo e(time()); ?>"
              alt="Generic placeholder image">
          </div>
        </picture>
          <hr>
            <div class="av1">
            <form>
              <button class="btn btn-outline-secondary btn-lg mr-5" type="button" onclick="location.href = 'Tests'">
                  Back
              </button>
              <button class="btn btn-primary btn-lg ml-5" type="button" onclick="location.href = 'Diet1'">
                  Next
              </button>
            </form>
          </div>  
      </div>

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>