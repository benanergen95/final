  <?php $__env->startSection('navigation'); ?>
      <?php echo $__env->make('layouts.navUser', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('script'); ?>
    <link href="<?php echo e(asset('/css/sticky-footer-navbar.css')); ?>?<?php echo e(time()); ?>" rel="stylesheet">
  <?php $__env->stopSection(); ?>
  
  <?php $__env->startSection('content'); ?> 
      <div class="BOXtears">
		    <h2 class="av1">Change Password<span class="text-muted"></span></h2>

        <hr>

        <!--Redirect Logged in User to Tests Page-->
        <?php if(!isset(Auth::user()->email)): ?>
          <script>window.location="Login";</script>
        <?php endif; ?>  

        <!--Password Changed Success Message-->
        <?php if($successMessage = Session::get('success')): ?>
          <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">
            </button>
            <?php echo e($successMessage); ?>

          </div>
        <?php endif; ?>

        <!--Failed Logging Message-->
        <?php if($errorMessage = Session::get('error')): ?>
          <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">
            </button>
            <?php echo e($errorMessage); ?>

          </div>
        <?php endif; ?>

        <!--Validation Error Message-->
        <?php if(count($errors) > 0): ?>
          <div class="alert alert-danger">
            <ul>
              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </div>
        <?php endif; ?>

        <form method="post" action="<?php echo e(url('UpdatePassword')); ?>">
          <?php echo e(csrf_field()); ?>

          <div class="parMain">

    				<div class="form-group">
    				    <label for="exampleInputPassword1">Current Password:</label>
    				    <input type="password" name='password_current' class="form-control" id="exampleInputPassword1" placeholder="**********">
                <label for="exampleInputPassword2">New Password:</label>
                <input type="password" name='password_new' class="form-control" id="exampleInputPassword2" placeholder="**********">
                <label for="exampleInputPassword3">Confirm New Password:</label>
                <input type="password" name='password_new_confirm' class="form-control" id="exampleInputPassword3" placeholder="**********">
    				</div>	
          </div>

          <div class="av1 form-group"> 
            <input type="submit" value="Submit" class="btn btn-success">
          </div>
          
        </form>
          <hr>
      </div>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>