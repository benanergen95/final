<?php $__env->startSection('navigation'); ?>
    <?php echo $__env->make('layouts.navAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="jumbotron bg-gery rounded-top rounded-bottom border border-secondry mx-2">
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('content'); ?>
<div class="jumbotron bg-gery rounded-top rounded-bottom border border-secondry mx-2">
    <?php if(!isset(Auth::user()->email)): ?>
        <script>window.location = "Login";</script>
    <?php endif; ?>
    <?php if(Auth::user()->admin == 0): ?>
        <script>window.location = "Tests";</script>
    <?php endif; ?>
    <?php
        use App\Child;
        use App\Entries;
        use App\User;
        use App\Results;

        $parents = DB::table('users')->join('child', 'child.parentID', '=', 'users.id')
            ->join('entries', 'child.ChildID', '=', 'entries.childID')
            ->join('results', 'child.ChildID', '=', 'results.childID')
            ->orderBy('users.id', 'ASC')
           ->select('users.id','users.fname','users.lname','users.pType','users.email','users.currentChild','child.childID',
           'child.CfName AS cfname','child.ClName','child.sex','child.DOB','child.age','child.ageinmo' ,
           'entries.height','entries.weight','entries.waist','entries.WHR_v','entries.BMI_v','entries.fruits','entries.veggies','entries.exercise','entries.screenTimeSD',
           'entries.screenTimeNSD','entries.sleepSD','entries.sleepNSD' ,
           'results.Rwhr','results.RBmi','results.RfruitsIntake','results.RveggiesIntake','results.Rexercise','results.RscreentimeSD','results.RscreentimeNSD',
           'results.RStimeSD','results.RStimeNSD' )
           ->get(); //tablename
    ?>
    <div class="row no-gutters">
    
        <div class="col">
            <a href="Admin"  class="btn btn-outline-primary btn-block ">Child Table</a>
        </div>
        <div class="col">
            <a href="Admin2"  class="btn btn-outline-primary  btn-block">Parent Table</a>
        </div>
        <div class="col">
            <a href="Admin3" class="btn btn-outline-primary  btn-block">Entries value Table</a>
        </div>
        <div class="col">
            <a href="Admin4"  class="btn btn-outline-primary  btn-block">Results Table</a>
        </div>
        <div class="col">
            <a href="<?php echo e(route('export')); ?>" class="btn btn-outline-dark  btn-block"><b>Export all tables
                    to Excel</b></a>
        </div>
    </div>
    <hr>
    <div align="center">

        <a href="<?php echo e(route('export5')); ?>" class="btn btn-success">Export Results Table to Excel</a>
    </div>


    </div>
    <hr>
    <h1 class="av1">Results Table</h1>
    <hr>
    <b>0-Normal range/ 1- Not normal range</b><br>
    <b>BMI: 0-Noramal weight/ 1- Under weight / 2-Overweight</b>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content2'); ?>
<?php $__env->startSection('content2'); ?>
<div class="jumbotron bg-gery rounded-top rounded-bottom border border-secondry mx-2">
    <!-- Begin page content -->
    <div class="text-center container-fluid">
        <table class="table table-bordered ">
            <thead>
            <tr>
                <td>Parent ID</td><!--Table headings -->
                <td>Child ID</td>
                <td>Email</td>
                <td>Child Firstname</td>
                <td>Child Lastname</td>
                <td>W/H ratio</td>
                <td>BMI</td>
                <td>Fruits</td>
                <td>Veggies</td>
                <td>Exercise</td>
                <td>Screentime School Days</td>
                <td>Screentime non-school Days</td>
                <td>Sleeptime School Days</td>
                <td>Sleeptime non-school Days</td>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><!--Table Data from database -->
            <tr>
                <td><?php echo e($p->id); ?></td>
                <td><?php echo e($p->childID); ?></td>
                <td><?php echo e($p->email); ?></td>
                <td><?php echo e($p->cfname); ?></td>
                <td><?php echo e($p->ClName); ?></td>
                <td><?php echo e($p->Rwhr); ?></td>
                <td><?php echo e($p->RBmi); ?></td>
                <td><?php echo e($p->RfruitsIntake); ?></td>
                <td><?php echo e($p->RveggiesIntake); ?></td>
                <td><?php echo e($p->Rexercise); ?></td>
                <td><?php echo e($p->RscreentimeSD); ?></td>
                <td><?php echo e($p->RscreentimeNSD); ?></td>
                <td><?php echo e($p->RStimeSD); ?></td>
                <td><?php echo e($p->RStimeNSD); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <hr>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.appAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>