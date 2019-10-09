
<?php $__env->startSection('navigation'); ?>
    <?php echo $__env->make('layouts.navAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

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
           ->join('results', 'users.currentChild', '=', 'results.resultID')
           ->orderBy('users.id', 'ASC')
           ->select('users.id','users.fname','users.lname','users.pType','users.email','users.currentChild','child.childID',
            'child.CfName AS cfname','child.ClName','child.sex','child.DOB','child.age','child.ageinmo' ,
            'entries.height','entries.weight','entries.waist','entries.WHR_v','entries.BMI_v','entries.fruits','entries.veggies','entries.exercise','entries.screenTimeSD',
            'entries.screenTimeNSD','entries.sleepSD','entries.sleepNSD' ,
            'results.Rwhr','results.RBmi','results.RfruitsIntake','results.RveggiesIntake','results.Rexercise','results.RscreentimeSD','results.RscreentimeNSD',
            'results.RStimeSD','results.RStimeNSD' )
            ->get(); //get data from database
    ?>
    <div class="row no-gutters">
        <div class="col">
            <a href="Admin" class="btn btn-outline-primary btn-block ">Child Table</a>
        </div>
        <div class="col">
            <a href="Admin2" class="btn btn-outline-primary  btn-block">Parent Table</a>
        </div>
        <div class="col">
            <a href="Admin3" class="btn btn-outline-primary  btn-block">Entries value Table</a>
        </div>
        <div class="col">
            <a href="Admin4" class="btn btn-outline-primary  btn-block">Results Table</a>
        </div>
        <div class="col">
            <a href="<?php echo e(route('export')); ?>" class="btn btn-outline-dark  btn-block"><b>Export all tables
                    to Excel</b></a>
        </div>
    </div>
    <hr>
    <div align="center">
        <a href="<?php echo e(route('export4')); ?>" class="btn btn-success">Export Entries Table to Excel</a>
    </div>
    <hr>
    <h1 class="av1">Entries Table</h1>
    <hr>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content2'); ?>
    <!-- Begin page content -->
    <div class="text-center container-fluid"><!--Table headings -->
        <table class="table table-bordered ">
            <thead>
            <tr>
                <td>Parent ID</td>
                <td>Child ID</td>
                <td>Email</td>
                <td>Child Firstname</td>
                <td>Child Lastname</td>

                <td>Age in months</td>
                <td>Height(cm)</td>
                <td>Weight(Kg)</td>
                <td>Waist circumference(cm)</td>

                <td>BMI value</td>
                <td>Waist/Height ratio</td>
                <td>Fruits</td>
                <td>Veggies</td>

                <td>Exercise Time</td>
                <td>Screentime School Days</td>
                <td>Screentime non-school Days</td>
                <td>Sleeptime School Days</td>

                <td>Sleeptime non-school Days</td>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><!--Table data from database -->
            <tr>
                <td><?php echo e($p->id); ?></td>
                <td><?php echo e($p->childID); ?></td>
                <td><?php echo e($p->email); ?></td>
                <td><?php echo e($p->cfname); ?></td>
                <td><?php echo e($p->ClName); ?></td>
                <td><?php echo e($p->ageinmo); ?></td>
                <td><?php echo e($p->height); ?></td>
                <td><?php echo e($p->weight); ?></td>
                <td><?php echo e($p->waist); ?></td>
                <td><?php echo e($p->BMI_v); ?></td>
                <td><?php echo e($p->WHR_v); ?></td>
                <td><?php echo e($p->fruits); ?></td>
                <td><?php echo e($p->veggies); ?></td>
                <td><?php echo e($p->exercise); ?></td>
                <td><?php echo e($p->screenTimeSD); ?></td>
                <td><?php echo e($p->screenTimeNSD); ?></td>
                <td><?php echo e($p->sleepSD); ?></td>
                <td><?php echo e($p->sleepNSD); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <hr>
    </div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.appAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>