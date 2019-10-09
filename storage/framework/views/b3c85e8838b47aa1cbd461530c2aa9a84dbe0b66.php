
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
    <form >
       <form action="<?php echo e(url('download')); ?>">
                      <button  value="submit" type="submit" class="btn btn-primary btn-sm">Download</button>
</form>
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
      <td>
         <td><?php echo e($result->childID); ?></td>
        <td><?php echo e($result->CfName); ?></td>
        <td><?php echo e($result->RBmi); ?></td>
        <td><?php echo e($result->RfruitsIntake); ?></td>
        <td><?php echo e($result->RveggiesIntake); ?></td>
       
        <td><?php echo e($result->created_at); ?></td>
        <td><?php echo e($result->updated_at); ?></td>
      </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>

   </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>