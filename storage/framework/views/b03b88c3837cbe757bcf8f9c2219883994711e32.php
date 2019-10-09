<?php
    use App\Child;
    use App\User;

    $child = App\Child::where('parentID', Auth::user()->id)->get();
?>
<?php $__env->startSection('navigation'); ?>
    <?php echo $__env->make('layouts.navUser', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('script'); ?>
    <link href="<?php echo e(asset('/css/sticky-footer-navbar.css')); ?>?<?php echo e(time()); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<div class="jumbotron bg-white rounded-top rounded-bottom border border-secondry mx-2">
<div class="text-center">
    <h3 class="text-center">Please Select a Child</h3>

<table class="table table-bordered">
    <tr>
       <!-- <th>ID Number</th> -->
        <th>First Name</th>
        <th>Last Name</th>
       <!-- <th>Date of Birth</th> -->
        <th></th>
    </tr> 
    <?php $__currentLoopData = $child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
    <tr>
    <!-- <td><?php echo e($c->childID); ?></td> -->
    <td><?php echo e($c->CfName); ?></td>
    <td><?php echo e($c->ClName); ?></td>
    <!-- <td><?php echo e($c->DOB); ?></td> -->
    <td><a href="<?php echo e(url('thisTest')); ?>?id=<?php echo e($c -> childID); ?>" class="btn btn-primary">Profile</a>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
</div> 
<div class="av1">
<a href="ChildRegistration" class="btn btn-primary">Start New Child</a>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>