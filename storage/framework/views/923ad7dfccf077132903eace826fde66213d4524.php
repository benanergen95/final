  <?php $__env->startSection('navigation'); ?>
      <?php echo $__env->make('layouts.navUser', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('content'); ?> 
      <div class="BOXtears">
		    <h2 class="av1">Children are healthiest if they stay within a certain weight range <span class="text-muted"></span></h2>

        <hr>
        <div class="parMain">
          <p class="">It is recommended you accurately measure your child’s <ins>height</ins> and <ins>weight</ins> every <b>3 months</b> </p>
          <p class="">The healthy weight calculator will estimate your child body mass index (BMI)</p>
        </div>
        <br>
        <div class="parMainL">
          <p class="">You need to have:</p>          
          <div class="container">
            <div class="row">
              <div class="col-sm">
                <img src="content/tape measurer.PNG" class="img-thumbnail" alt="tape measurer">
              </div>
              <div class="col-sm">
                <img src="content/Scale.png" class="img-thumbnail" alt="Scale">
              </div>
            </div>
          </div>
          
          
        </div>
        <br>
        <!--
                <div class="parMainL">
          <p class="">You need to have:</p>
            <div class="wleft">
              <p>img 1</p>
            </div>
            <div class="wRight">
              <p>img 2</p>
            </div>
        </div>



        -->
          <hr>
          <div class="av1">
            <form>
              <button onclick="location.href = 'WeightBMI0'" type="button" class="btn btn-outline-secondary btn-lg mr-5">Back</button>

              <a href="WeightBMI2" type="button" class="btn btn-primary btn-lg ml-5">Next</a>
            </form>
          </div>  
      </div>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>