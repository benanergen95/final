  <?php $__env->startSection('navigation'); ?>
      <?php echo $__env->make('layouts.navUser', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php $__env->stopSection(); ?>
  <?php $__env->startSection('content'); ?>
    <?php if(!isset(Auth::user()->email)): ?>
        <script>window.location="Login";</script>
    <?php endif; ?>        
  <?php $__env->startSection('content'); ?> 
      <div class="BOXtears">
      <form method="post" action="<?php echo e(url('StoreHeight')); ?>">
      <?php echo e(csrf_field()); ?>


    <h2 class="av1">Height  <span class="text-muted"></span></h2>
        <hr>
        <div class="text-center">
      <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger">
          <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        </div>
      <?php endif; ?>

          <img  src="<?php echo e(asset('/content/child height.jpg')); ?>?<?php echo e(time()); ?>" class="picTest" alt="childs height">
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
           <p> Please enter your Child hight (in centimetres)</p>
           <input class="form-control" name="height" type="text" placeholder="Enter Childs hight here in centimetres.">
          </div>
        </div>
          <hr>
            <div class="av1">
              <form>
                <button onclick="location.href = 'Weight1'" type="button" class="btn btn-outline-secondary btn-lg mr-5">Back</button>
               <input type="submit" value="Next" class="btn btn-primary btn-lg ml-5">

              </form>
            </div>  
      </div>
</form>

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>