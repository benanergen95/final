
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

    <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    <?php
        $data=DB::table('summernotes')->where("item_id","=",8)->value('content');  //diet 1 data from summernotes table
    ?>
    <div class="jumbotron bg-white rounded-bottom border border-success mx-2">
        <form action="<?php echo e(url('StoreFruits')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <div class="container text-center">
                <div class="row">
                    <div class="col align-self-center">
                        <?php echo $data; ?>

                        <p><span id="fruitAmount" class="text-success"></span></p>
                        <input id="slider" type="number" data-slider-id='sliderID' data-slider-min="0"
                               data-slider-max="8"
                               data-slider-step="0.5" data-slider-value="3" name="fruits"/>
                    </div>
                </div>
                <hr>
            </div>
            <!-- /END THE FEATURETTES -->
            <!-- START of Nav Buttons -->
            <div class="av1">
                <button class="btn btn-outline-secondary btn-lg mr-5" type="button" onclick="location.href = 'Diet0'">
                    Back
                </button>
                <input type="submit" value="Next" class="btn btn-primary btn-lg ">
            </div>
        </form>
    </div>

<?php $__env->stopSection(); ?>
<!--Slider java script-->
<?php $__env->startSection('script'); ?>
    <script>
        var slider = new Slider('#slider', {
            formatter: function (value) {
                $('#fruitAmount').html(value);

                if (value == 8) {
                    $('#fruitAmount').html("More than 7");
                }
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>