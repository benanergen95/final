  <?php $__env->startSection('navigation'); ?>
      <?php echo $__env->make('layouts.navUser', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('content'); ?>
    <?php if(!isset(Auth::user()->email)): ?>
        <script>window.location="Login";</script>
    <?php endif; ?>        
  <?php $__env->startSection('content'); ?> 
   <form method="post" action="<?php echo e(url('StoreWeight')); ?>">
      <?php echo e(csrf_field()); ?>

      <div class="BOXtears">
        <h2 class="av1">Weight<span class="text-muted"></span></h2>
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
        <div class="text-center">
          <img id="scale-1"src="<?php echo e(asset('/content/scale.png')); ?>?<?php echo e(time()); ?>" class="picScale2" alt="Scale">
        </div>
        <br>
        <div class="parMain">
          <p class="">1. Remove your child’s shoes and heavy clothes (i.e. jacket)</p>
          <p class="">2. Have your child standing with both feet in the center of the digital scale</p>
          <p class="">3. Record the weight on the scale</p>
          <div class="parMainL">
           <!-- picture here if not good up top.-->
           <p> Please enter your Childs <b>weight</b> in Kilograms</p>
           <input class="form-control" name ="weight" type="text" placeholder="Enter Childs Weight here in Kilograms.">
          </div>
        </div>
        <br>
          <div class="av1"> 
            <button  onclick="location.href = 'Weight2'" type="button" class="btn btn-outline-secondary btn-lg mr-5">Back</button>
            <!-- Button trigger modal -->
                           <input type="submit" value="Next" class="btn btn-primary btn-lg ml-5">

          <!--  <button type="button" class="btn btn-primary btn-lg mr-5" data-toggle="modal" data-target="#exampleModal">
              Next
            </button> -->


          </div>
          <hr>
      </div>





      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Well done!</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="parMainL">
                <p class="">You have completed the test. Please prossed to the next stage by pressing the "view results"</p>
              </div>   
            </div>
            <div class="modal-footer">
              <!--
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
              -->              
              <a href="WeightBMI4" type="button" class="btn btn-primary">See BMI results</a>
            </div>
          </div>
        </div>
      </div>
    </form>

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>