  <?php $__env->startSection('navigation'); ?>
      <?php echo $__env->make('layouts.navUser', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php $__env->stopSection(); ?>
  <?php $__env->startSection('content'); ?>
    <?php if(!isset(Auth::user()->email)): ?>
        <script>window.location="Login";</script>
    <?php endif; ?>        
  <?php $__env->startSection('content'); ?> 
      <div class="jumbotron bg-white rounded-top rounded-bottom border border-secondry mx-2">
      <form method="post" action="<?php echo e(url('StoreHeight')); ?>">
      <?php echo e(csrf_field()); ?>

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

        </div>
        <?php
    $data=DB::table('summernotes')->where("item_id","=",4)->value('content');
    ?>
       <?php echo $data; ?>

          <div class="">
           <!-- picture here if not good up top.-->
          
           <input class="form-control" name="height" type="text" placeholder="Enter Childs hight here in centimetres.">
          </div>
          <hr>
            <div class="av1">
              <form>
                <button onclick="location.href = 'Weight1'" type="button" class="btn btn-outline-secondary btn-lg mr-5">Back</button>
               <input type="submit" value="Next" class="btn btn-primary btn-lg ">

              </form>
            </div>  
      </div>
</form>
</div>


  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>