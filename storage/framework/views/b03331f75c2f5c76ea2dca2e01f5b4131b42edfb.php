<?php $__env->startSection('navigation'); ?>
    <?php echo $__env->make('layouts.navUser', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('/css/extra-sleep.css')); ?>?<?php echo e(time()); ?>" rel="stylesheet" type="text/css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Marketing messaging and featurettes
      ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="jumbotron bg-white rounded-bottom border border-secondary mx-2">

        <!-- Three columns of text below the carousel -->
        <?php
            $data=DB::table('summernotes')->where("item_id","=",17)->value('content');
        ?>
        <div class="container text-center">
            <div class="row">
                <div class="col align-self-center">
                    <?php echo $data; ?>

                </div>
            </div>

        </div>
        <!-- /END THE FEATURETTES -->
        <!-- /Start NAV Buttons -->
        <div class="av1">
            <form>
                <button onclick="location.href = 'Tests'" type="button" class="btn btn-outline-secondary btn-lg mr-5">
                    Back
                </button>
                <button class="btn btn-primary btn-lg" type="button" onclick="location.href = 'Sleep1'"> Next
                </button>
            </form>
        </div>
    </div><!-- /.container -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>