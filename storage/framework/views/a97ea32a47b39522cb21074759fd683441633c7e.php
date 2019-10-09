  <?php $__env->startSection('navigation'); ?>
      <?php echo $__env->make('layouts.navNotAuth', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php $__env->stopSection(); ?>


  <?php $__env->startSection('content'); ?>  
    <?php if(isset(Auth::user()->email)): ?>
        <script>window.location="Tests";</script>
    <?php endif; ?>
    <div class="BOXtears">
	    <h2 class="av1">Healthy Start<span class="text-muted"></span></h2>

      <hr>

      <form action="<?php echo e(url('Register')); ?>" method="post">
        <?php echo e(csrf_field()); ?>

        <div class="parMain">
        	<p class="text-center">To begin your journey firstly we will need a few things from you. Please answer the questions and fill out the fields. </p>
        	<hr>
          <!--Error Message-->
          <?php if(count($errors) > 0): ?>
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
            </button>
            <ul>
              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </div>
          <?php endif; ?>
          <?php if(null !== $message = Session::get('error')): ?>
            <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert">
              </button>
              <ul>
                <li><?php echo e($message); ?></li>
              </ul>
            </div>
          <?php endif; ?>
            
       		 <div class="form-group">

            <!-- First Name INPUT-->
   				  <label for="exampleFormControlInput1">Please enter your First Name</label>
     				<input name="firstname" type="text" class="form-control" id="FormControlInput1" placeholder="First Name">

            <!-- Last Name INPUT-->
            <label for="exampleFormControlInput1">Please enter your Last Name</label>
            <input name="lastname" type="text" class="form-control" id="FormControlInput2" placeholder="Last Name">

     			 </div>
 			 

				
        <div class="form-group">
          <!-- User Type Input -->
          <p class="">Are you a?</p>
          <div class="btn-group btn-group-toggle" data-toggle="buttons">
          <label class="btn btn-danger">
            <input type="radio" name="type" id="option1" autocomplete="off" value="Mum"> Mum
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="type" id="option2" autocomplete="off" value="Dad"> Dad
          </label>
          <label class="btn btn-warning">
            <input type="radio" name="type" id="option3" autocomplete="off" value="Other"> Other
          </label>
          </div>

          <!-- Other User Type Input-->
          <div>
	   				<label for="exampleFormControlInput1">Please specify</label>
	 				  <input type="text" name='other-type' class="form-control" id="FormControlInput3" placeholder="If we require a text field for this it will only come up when the parent selected other.">
          </div>
 				</div>
 				<div class="form-group">
          <!-- Email Input-->
				    <label for="exampleInputEmail1">Email Address:</label>
				    <input type="email" name="email" class="form-control" id="FormControlInput4" aria-describedby="emailHelp" placeholder="Email@example.com">
				  </div>
				<div class="form-group">
          <!-- Password Input-->
				    <label >Password:</label>
				    <input type="password" name="password" class="form-control" id="FormControlInput5" placeholder="Password">
        </div>
        <div class="form-group">
            <label >Password Confirmation:</label>
            <input type="password" name="password_confirmation" class="form-control" id="FormControlInput5" placeholder="Confirm Password">
				</div>	
          
        </div>
          <div class="av1"> 
            <input type="submit" value="Submit" class="btn btn-success">
            <!--<a href="WhyUse" type="button" class="btn btn-success">Proceed</a>-->
          </div>
          <hr>
        </form>
    </div> 
  <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>