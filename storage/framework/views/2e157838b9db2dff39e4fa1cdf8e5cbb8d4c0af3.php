
  <?php $__env->startSection('navigation'); ?>
      <?php echo $__env->make('layouts.navAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('content'); ?>
    <?php if(!isset(Auth::user()->email)): ?>
        <script>window.location="Login";</script>
    <?php endif; ?>
    <?php if(Auth::user()->admin == 0): ?>
        <script>window.location="Tests";</script>
    <?php endif; ?>
    <!-- Begin page content -->
    <main role="main" class="container">
      <div class="jumbotron bg-white rounded-top rounded-bottom border border-secondry mx-2">
        <h2 class="av1">Email Invites<span class="text-muted"></span></h2>
        <hr>
         <form action="<?php echo e(url('PostAddemail')); ?>" method="post">
        <?php echo e(csrf_field()); ?>

        <div class="parMain">
          <p class="text-center">Please add the email to authenticate user to register</p>
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
          <?php if(null !== Session::get('$emailError')): ?>
            <div class="alert alert-danger">
              <ul>
                <li><?php echo e(Session::get('$emailError')); ?></li>
              </ul>
            </div>
          <?php endif; ?>
        <div class="form-group">
          <!--User email-->
          <div class="form-group">
            <label for="AdddEmail">Please enter the user email</label>
           <input type="text" name="AddEmail"class="form-control" id="FormControlInput1" placeholder="User Email">
          </div>
          <div class="av1"> 
             <input type="submit" value="Submit" class="btn btn-success">
          </div>
        <hr>
      </div>
      <div>
      </div>
      </div> 
       <h2 class="av1">Non-Registed Users<span class="text-muted"></span></h2> <!--Will show the non registed users -->
    <div class="panel-body">
      <table class="table  table-bordered">
        <thead>
          <tr>
            <th>Emails</th>
            <th>Action</th>
          </tr>
        </thead>
      <tbody>
     <?php $__currentLoopData = $nonRegistredusers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nuser => $email): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($email->email); ?></td>
        <td>
           <a href="<?php echo e(url('deletemail',array($email->email))); ?>"> Delete</a>       <!--Admin can delete non-registed users -->     
        </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
        <h2 class="av1">Registed Users<span class="text-muted"></span></h2><!--Will show the registed users -->
      <div class="panel-body">    
      <table class="table table-bordered">
        <thead>
          <tr>
          </tr>
        </thead>
        <tbody id="dst">
          
     <?php $__currentLoopData = $Registredusers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ruser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($ruser->email); ?></td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
     </div>
    </form>
  </div>
</main>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>