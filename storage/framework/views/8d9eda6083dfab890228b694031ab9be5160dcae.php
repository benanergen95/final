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
    <form action="<?php echo e(url('Invite')); ?>" method="post">
      <?php echo e(csrf_field()); ?>

    <div class="container">
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Invite User</button>
      <!--Error Message-->
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
    <div class="container">
      <h2>Admin Page</h2>
      <table class="table table-bordered">
        <thead>
          <tr>
            <td> Child ID </td>
            <td> Child First Name</td>
            <td>BMI </td>
            <td> Child ID </td>
            <td> Waist/Hip ratio </td>
            <td>Fruits Intake</td>
            <td>Veggies Intake</td>
            <td> Physical activity</td>
            <td>Sleep time weekdays </td>
            <td> Sleep time weekend</td>
            <td> Screentime Weekdays </td>
            <td> Screentime weekend</td>
            <td> Created at </td>
            <td> Updated at </td>
          </tr>
        </thead>
        <tbody id="dst">
          
     <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($result->childID); ?></td>
        <td><?php echo e($result->CfName); ?></td>
        <td><?php echo e($result->BMI); ?></td>
        <td><?php echo e($result->RBmi); ?></td>
        <td><?php echo e($result->WHR); ?></td>
        <td><?php echo e($result->RfruitsIntake); ?></td>
        <td><?php echo e($result->RveggiesIntake); ?></td>
        <td><?php echo e($result->Rexercise); ?></td>
        <td><?php echo e($result->RStimeSD); ?></td>
        <td><?php echo e($result->RStimeNSD); ?></td>
        <td><?php echo e($result->RscreentimeSD); ?></td>
        <td><?php echo e($result->RscreentimeNSD); ?></td>
        <td><?php echo e($result->created_at); ?></td>
        <td><?php echo e($result->updated_at); ?></td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>

    <!--Modal to invite user -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Invite Users</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="parMainL">
                <p class="">Enter the invitee Email Address:
                <input type="email" name="email" class="form-control" id="FormControlInput4" aria-describedby="emailHelp" placeholder="Email@example.com">
                </p>
              </div>   
            </div>
           <div class="modal-footer">
            <input type="submit" value="Submit" class="btn btn-success">
           </div>
        </div>
       </div>
     </div>
   </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>