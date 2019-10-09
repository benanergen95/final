<?php $__env->startSection('navigation'); ?>
    <?php echo $__env->make('layouts.navNotAuth', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <link href="<?php echo e(asset('/css/sticky-footer-navbar.css')); ?>?<?php echo e(time()); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="jumbotron bg-white rounded-top rounded-bottom border border-secondry mx-2">
        <h2 class="text-center">Welcome Back<span class="text-muted"></span></h2>

        <hr>
        <!--Redirect Logged in User to Tests Page-->
        <?php if(isset(Auth::user()->email)): ?>
            <script>window.location = "Tests";</script>
        <?php endif; ?>

    <!--Account Creation Success Message-->
        <?php if($successMessage = Session::get('success')): ?>
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">
                </button>
                <?php echo e($successMessage); ?>

            </div>
        <?php endif; ?>

    <!--Failed Logging Message-->
        <?php if($message = Session::get('error')): ?>
            <div class="alert alert-danger alert-block">
                <?php echo e($message); ?>

            </div>
        <?php endif; ?>

    <!--Validation Error Message-->
        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="post" action="<?php echo e(url('CheckLogin')); ?>">
            <?php echo e(csrf_field()); ?>

            <div class="parMain">
                <p class="text-center">To <b>log in</b> please enter your account details.</p>
                <hr>
                <div class="form-group">
                    <label for="exampleInputEmail1">Please enter your Email address you used </label>
                    <input type="email" name='email' class="form-control" id="exampleInputEmail1"
                           aria-describedby="emailHelp" placeholder="Email@example.com" value="<?php echo e(old('email')); ?>">

                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name='password' class="form-control" id="exampleInputPassword1"
                           placeholder="**********">

                </div>
            </div>

            <div class="av1 form-group">
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>
            <a class="text-center btn btn-link" href="<?php echo e(route('password.request')); ?>">
                <?php echo e(__('Forgot Your Password?')); ?>

            </a>

        </form>
        <hr>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>