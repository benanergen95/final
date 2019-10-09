  <?php $__env->startSection('navigation'); ?>
      <?php echo $__env->make('layouts.navNotAuth', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('content'); ?> 
    <!-- Begin page content -->
      <div class="BOXtears">
		    <h2 class="av1">Why to use this app?<span class="text-muted"></span></h2>

        <hr>
        <div class="parMain">
          <p class="">The Healthy Start app is designed by researchers from The University of Sydney to help you understand important aspects of your child’s health that can affect growth and development. </p>
          <p class="">The app can help you to develop confidence and skills to better monitor your child’s weight, sleep and physical activity for example.  </p>
          <p class=""> The app will link you to evidence-based information available services to optimise your child’s health.
          </p>
        </div>
          <div class="av1"> 
            <hr>
            <div class="embed-responsive embed-responsive-16by9">
              <video controls>
              <source src="content/516403332-640_adpp_is.mp4" type="video/mp4">
              </video>
            </div>
            <hr>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
              Ready to start?
            </button>
          </div>
          <hr>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Help your child to be a healthy kid</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="parMainL">
                <p class="">The Healthy Start app provides you an opportunity to access reliable information on healthy lifestyle behavior in children. 

                However, it is not intended to be a substitute for advice from a health professional.

                If you are concerned about your child's growth or development, please see your GP or local health professional.
                </p>
              </div>   
            </div>
           <div class="modal-footer">
            <a href="Registration" type="button" class="btn btn-success">Select Tests</a>
           </div>
        </div>
       </div>
     </div>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>