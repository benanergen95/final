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
        //get data from tables
            use App\Child;
            use App\Entries;
            use App\User;
            use App\Results;
            $parents = DB::table('users')->join('child', 'child.parentID', '=', 'users.id')
             ->orderBy('users.id', 'ASC')
             ->select('users.id','users.email','users.fname','users.lname','users.pType','child.childID','child.CfName AS cfname','child.ClName')
              ->get();
    ?>
    <div class="row no-gutters">
        <div class="col">
            <a href="Admin"  class="btn btn-outline-primary btn-block ">Child Table</a>
        </div>
        <div class="col">
            <a href="Admin2"  class="btn btn-outline-primary  btn-block">Parent Table</a>
        </div>
        <div class="col">
            <a href="Admin3"  class="btn btn-outline-primary  btn-block">Entries value Table</a>
        </div>
        <div class="col">
            <a href="Admin4"  class="btn btn-outline-primary  btn-block">Results Table</a>
        </div>
        <div class="col">
            <a href="<?php echo e(route('export')); ?>"  class="btn btn-outline-dark  btn-block"><b>Export all tables
                    to Excel</b></a>
        </div>
    </div>
    <hr>
    <div align="center">
        <a href="<?php echo e(route('export2')); ?>" class="btn btn-success">Export Parents Table to Excel</a>
    </div>
    <hr>
    <h1 class="av1">Parent Table</h1>
    <hr>
    <!-- Begin page content -->
    <main role="main" class="container">
        <form>
            <div class="text-center">
                <table class="table table-bordered"><!--Table headings -->
                    <thead>
                    <tr>
                        <td> Parent ID</td>
                        <td>Email</td>
                        <td>Firstname</td>
                        <td>Lastname</td>
                        <td>Parent Type</td>
                        <td>Child ID</td>
                        <td>Child Firstname</td>
                        <td>Child Lastname</td>

                    </tr>
                    </thead>
                    <tbody id="dst">
                    <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><!--Get data from database and display -->
                    <tr>
                        <td><?php echo e($p->id); ?></td>
                        <td><?php echo e($p->email); ?></td>
                        <td><?php echo e($p->fname); ?></td>
                        <td><?php echo e($p->lname); ?></td>
                        <td><?php echo e($p->pType); ?></td>
                        <td><?php echo e($p->childID); ?></td>
                        <td><?php echo e($p->cfname); ?></td>
                        <td><?php echo e($p->ClName); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <hr>
            </div>
        </form>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>