  <?php $__env->startSection('navigation'); ?>
      <?php echo $__env->make('layouts.navUser', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('content'); ?> 
      <div class="BOXtears">
        
    <h2 class="av1">Height  <span class="text-muted"></span></h2>
        <hr>
        <div class="text-center">
          <img src="content/child height.jpg" class="picTest" alt="childs height">
        </div>
        <br>
        <div class="parMain">
          <p class="">1. Remove your child’s shoes and heavy clothes (i.e. jacket)</p>
          <p class="">2. Have your child standing with flat feet (together) touching the wall </p>
          <p class="">3. Ask your child to look straight ahead </p>
          <p class="">4. Use something flat (i.e. ruler) to mark the wall </p>
          <p class="">5. Measure the distance from the floor to the mark on the wall. <b>Do not round up.</b></p>
          <hr>
          <div class="parMainL">
           <!-- picture here if not good up top.-->
           <p> Please enter your Child hight</p>
           <input class="form-control" type="text" placeholder="Enter Childs hight here.">
          </div>
        </div>
          <hr>
            <div class="av1">
              <form>
                <button onclick="location.href = 'Weight1'" type="button" class="btn btn-outline-secondary btn-lg mr-5">Back</button>

                <a href="Weight3" type="button" class="btn btn-primary btn-lg ml-5">Next</a>
              </form>
            </div>  
      </div>


  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>