  <?php $__env->startSection('navigation'); ?>
      <?php echo $__env->make('layouts.navUser', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('content'); ?> 
    <!-- Begin page content -->
    <main role="main" class="container">
      <div class="jumbotron bg-white rounded-bottom border border-primary mx-4">
		    <h2 class="av1">Children are healthiest if they stay within a certain weight range <span class="text-muted"></span></h2>

        <hr>
        <div class="parMain">
          <p class="">It’s not always easy to tell if children are a healthy weight for their age and height. </p>
          <p class="">The calculator in the app will help you work out whether your child is a healthy weight.</p>
        </div>
        <picture>
          <div class="text-center">
            <img src="./content/scale-403585_1920.jpg" class="picScale3" alt="Scale">
          </div>
        </picture>
          <hr>
            <div class="av1">
            <form>
              <button onclick="location.href = 'Tests'" type="button" class="btn btn-outline-secondary btn-lg mr-5">Back</button>

                <a href="WeightBMI1" type="button" class="btn btn-primary btn-lg ml-5">Next</a>
            </form>
          </div>  
      </div>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>