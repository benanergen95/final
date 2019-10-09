
<?php $__env->startSection('navigation'); ?>
    <?php echo $__env->make('layouts.navUser', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pageStyle'); ?>
    .combodate {display:block}
    .combodate .form-control {display:inline-block}
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


    <?php if(!isset(Auth::user()->email)): ?>
        <script>window.location = "Login";</script>
    <?php endif; ?>

    <!-- Begin page content -->
    <main role="main" class="container">

        <div class="jumbotron bg-white rounded-top rounded-bottom border border-secondry mx-2">
            <h2 class="av1">Healthy Start<span class="text-muted"></span></h2>
            <hr>
            <form action="<?php echo e(url('ChildRegister')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <div class="parMain">
                    <p class="text-center">We will also need to know a few things about your child. Please enter them
                        down below. </p>
                    <hr>
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

                    <div class="col form-group">
                        <!--Name-->
                        <div class="form-group">
                            <label for="firstname">Please enter your child's First Name:</label>
                            <input type="text" name="firstname" class="form-control" id="FormControlInput1"
                                   placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Please enter your child's Last Name:</label>
                            <input type="text" name="lastname" class="form-control" id="FormControlInput1"
                                   placeholder="Last Name">
                        </div>

                        <!--Date of Birth-->
                        <div class="form-group">

                            <label for="Date of Birth">Please enter your child's Date Of Birth:</label>
                            <div class="container text-center">
                                <div class="row">
                                    <input id="dob" name="dob" data-format="YYYY-MM-DD" data-template="D MMM YYYY"
                                           data-custom-class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Sex(Gender)-->
                    <!--div for the picture? -->
                    <p class="text-center">Is your child a Boy or a Girl?</p>
                    <div class="text-center">
                        <div class="row btn-group btn-group-toggle brn-group" data-toggle="buttons">
                            <ul>
                                <li class="btn btn-light active mr-5">
                                    <input type="radio" name="sex" id="option1" autocomplete="off"
                                           style="display: none;" value="Male" checked>
                                    <img src="<?php echo e(asset('content/Symbol-Male.png')); ?>?<?php echo e(time()); ?>" alt="Male"
                                         class="gender">
                                </li>
                                <li class="btn btn-light mr-5">
                                    <input type="radio" name="sex" id="option2" autocomplete="off"
                                           style="display: none; " value="Female">
                                    <img src="<?php echo e(asset('content/Symbol-Female.png')); ?>?<?php echo e(time()); ?>" alt="Female"
                                         class="gender">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--Submit-->
                    <div class="av1">
                        <input type="submit" value="Submit" class="btn btn-success">
                    </div>
                    <hr>

                </div>
            </form>
        </div>
    </main>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        var currentTime = new Date();


        $('#dob').combodate({
            minYear: currentTime.getFullYear() - 12,
            maxYear: currentTime.getFullYear() - 5,
            value: currentTime.getFullYear() - 8 + "-01-01"
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>