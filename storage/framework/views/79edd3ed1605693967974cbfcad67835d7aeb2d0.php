<?php $__env->startSection('navigation'); ?>
    <?php echo $__env->make('layouts.navUser', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('/css/extra-physical.css')); ?>?<?php echo e(time()); ?>" rel="stylesheet" type="text/css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(!isset(Auth::user()->email)): ?>
        <script>window.location = "Login";</script>
    <?php endif; ?>
    <div class="jumbotron bg-white rounded-bottom border bg-secondary mx-2">
        <div class="container text-center">
            <?php
                $data=DB::table('summernotes')->where("item_id","=",10)->value('content');
            ?>
            <?php echo $data; ?>

        </div>
        <!-- /END THE FEATURETTES -->
        <!-- /Start Nav Buttons -->
        <div class="av1">
            <form>
                <button onclick="location.href = 'Tests'" type="button" class="btn btn-outline-secondary btn-lg mr-5">
                    Back
                </button>
                <button onclick="location.href = 'Exercise1'" type="button" class="btn btn-primary btn-lg">Next</button>
            </form>
        </div>
    </div><!-- /.container -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>