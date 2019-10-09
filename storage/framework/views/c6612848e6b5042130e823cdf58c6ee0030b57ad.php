
<?php $__env->startSection('navigation'); ?>
    <?php echo $__env->make('layouts.navUser', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('/css/extra-diet.css')); ?>?<?php echo e(time()); ?>" rel="stylesheet" type="text/css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(!isset(Auth::user()->email)): ?>
        <script>window.location = "Login";</script>
    <?php endif; ?>
    <!-- Begin page content -->
    <div class="jumbotron bg-white rounded-bottom border border-success mx-2">

    <?php
        $data=DB::table('summernotes')->where("item_id","=",7)->value('content'); //diet 0 data form summernotes table
    ?>
    <?php echo $data; ?>  <!--data retrived from database -->
        <div class="av1">
            <form>
                <button class="btn btn-outline-secondary btn-lg mr-5" type="button" onclick="location.href = 'Tests'">
                    Back
                </button>
                <button class="btn btn-primary btn-lg " type="button" onclick="location.href = 'Diet1'">
                    Next
                </button>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>