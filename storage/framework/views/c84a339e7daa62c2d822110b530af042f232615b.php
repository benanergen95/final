  <?php $__env->startSection('navigation'); ?>
      <?php echo $__env->make('layouts.navUser', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('content'); ?> 
      <div class="jumbotron">
		    <h2 class="av1">Tips to help you achive your goals - Screen Time  <span class="text-muted"></span></h2>
        <div class="fAlert alert-colBox2" role="alert">
          <!-- Stack the columns on mobile by making one full-width and the other half-width -->
          <div class="row">
            <div class="col-12 col-md-8">Switch off the Screen</div>
            <div class="col-6 col-md-4"><button type="button" class="btn btn-light" onclick="location.href ='https://www.healthykids.nsw.gov.au/kids-teens/switch-off-the-screen.aspx'">Find out more</button></div>
          </div>
        </div><!--Green thing div-->

        <div class="fAlert alert-colBox" role="alert">
          <!-- Stack the columns on mobile by making one full-width and the other half-width -->
            <div class="row">
              <div class="col-12 col-md-8">Turn off the TV or Computer and Get Active</div>
              <div class="col-6 col-md-4"><button type="button" class="btn btn-light" onclick="location.href ='https://www.healthykids.nsw.gov.au/kids-teens/turn-off-the-tv-or-computer-and-get-active.aspx'">Find out more</button></div>
            </div>
        </div><!--Blue thing div-->

        <div class="fAlert alert-colBox1" role="alert">
          <!-- Stack the columns on mobile by making one full-width and the other half-width -->
            <div class="row">
              <div class="col-12 col-md-8">Screen time at home</div>
              <div class="col-6 col-md-4"><button type="button" class="btn btn-light" onclick="location.href ='https://www.caringforkids.cps.ca/handouts/screen-time-at-home-healthy-habits'">Find out more</button></div>
            </div>
         </div><!--red thing div-->

        <div class="text-center">
        <img src="<?php echo e(asset('/content/Screen-Tips.jpg')); ?>?<?php echo e(time()); ?>" 
              width="600px" class="rounded" alt="Good weight">
        </div>

        <hr>
        <div class="parMainL">
          <p class="">Once you have looked over the tips please proceed to the next test</p>
          <a href="Tests" type="button" class="btn btn-primary">Next Test</a>
          <hr>
        </div>
        <br>
          <div class="av1"> 
          </div>
      </div>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>