
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
    <!--Excel export buttons -->
    <div class="row no-gutters">
        <div class="col">
            <a href="Admin" class="btn btn-outline-primary btn-block ">Child Table</a>
        </div>
        <div class="col">
            <a href="Admin2" class="btn btn-outline-primary  btn-block">Parent Table</a>
        </div>
        <div class="col">
            <a href="Admin3"  class="btn btn-outline-primary  btn-block">Entries value Table</a>
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
        <a href="<?php echo e(route('export3')); ?>" class="btn btn-success">Export Child Table to Excel</a>
    </div>
    <hr>
    <h1 class="av1">Child Table</h1>
    <hr>
    <!-- Begin page content of table-->
    <main role="main" class="container">
        <form>
            <div class="text-center">
                <table class="table table-bordered"> <!--Table headings -->

                    <thead>
                    <tr>
                        <td> Child ID</td>
                        <td> Parent ID</td>
                        <td>Firstname</td>
                        <td>Lastname</td>
                        <td>Sex</td>
                        <td>Date of birth</td>
                        <td>Age</td>
                        <td>Age in months</td>
                    </tr>
                    </thead>
                    <tbody id="dst">
                    <?php $__currentLoopData = $child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>       <!--Show data from database-->
                    <tr>
                        <td><?php echo e($c->childID); ?></td>
                        <td><?php echo e($c->parentID); ?></td>
                        <td><?php echo e($c->CfName); ?></td>
                        <td><?php echo e($c->ClName); ?></td>
                        <td><?php echo e($c->sex); ?></td>
                        <td><?php echo e($c->DOB); ?></td>
                        <td><?php echo e($c->age); ?></td>
                        <td><?php echo e($c->ageinmo); ?></td>

                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </form>
    </main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>