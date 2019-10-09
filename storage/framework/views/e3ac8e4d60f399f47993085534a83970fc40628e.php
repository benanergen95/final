  <?php $__env->startSection('navigation'); ?>
      <?php echo $__env->make('layouts.navUser', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('content'); ?> 
    <!-- Begin page content -->
    <div class="jumbotron bg-white rounded-bottom border border-primary mx-4">
      <h2 class="av1">Well Done! <span class="text-muted"></span></h2>

      <hr>
      <div class="parMain">
        <div class="fAlert alert-Tears" role="alert">
          Your child BMI is ______. It falls into a healthy weight range!
        </div> 
      </div>
      <picture>
        <div class="text-center">
          <img src="./content/child good weight.png" class="picScale4" alt="Good Weight">
        </div>
      </picture>
      <hr>
      <div class="parMainL">
        <p class="">check out a few tips to keep healthy family habits and improve your child lifestyle even more</p>
        <a href="Tips" type="button" class="btn btn-primary">Tips</a>
        <hr>
        <div class="parMainL">
         <p>If you want to skip tips press go to next test.</p>
         <a href="Tests" type="button" class="btn btn-secondary">Next test</a>
        </div>
      </div>
      <br>

        
    </div>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>