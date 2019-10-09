<?php $__env->startSection('navigation'); ?>
    <?php echo $__env->make('layouts.navUser', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('/css/extra-sedentary.css')); ?>?<?php echo e(time()); ?>" rel="stylesheet" type="text/css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(!isset(Auth::user()->email)): ?>
        <script>window.location = "Login";</script>
    <?php endif; ?>
    <div class="jumbotron bg-white rounded-bottom border border-info mx-2">
        <form method="post" action="<?php echo e(url('StoreScreenSD')); ?>">
            <?php echo e(csrf_field()); ?>

            <div>
            </div>

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
                $data=DB::table('summernotes')->where("item_id","=",14)->value('content');
                $data2=DB::table('summernotes')->where("item_id","=",15)->value('content');

            ?>
            <div class="container text-center">
                <div class="row">
                    <div class="col align-self-center">
                        <?php echo $data; ?>

                        <p class="text-center">
                            <a class="btn btn-info" data-toggle="collapse" href="#collapseExample" role="button"
                               aria-expanded="false">
                                Click Here To see Activity List
                            </a>
                        </p>
                        <div class="collapse" id="collapseExample">
                            <div class=" card-body">
                                <?php echo $data2; ?>

                            </div>

                        </div>

                        <!-- Slider -->
                        <div class="pt-3">
                            <input id="slider" type="number" data-slider-id='sliderID' data-slider-min="0"
                                   data-slider-max="10" data-slider-step="0.5" data-slider-value="3" name="screenSD"/>
                        </div>

                        <p>Number of hours: <span id="days" class="text-info"></span></p>

                        <img id="sedentaryPic0" class="img-fluid"
                             src="<?php echo e(asset('/content/Sedentary0.png')); ?>?<?php echo e(time()); ?>" alt="Generic placeholder image"
                             style="display: none; margin:0 auto;">
                        <img id="sedentaryPic1" class="img-fluid"
                             src="<?php echo e(asset('/content/Sedentary1.png')); ?>?<?php echo e(time()); ?>" alt="Generic placeholder image"
                             style="display: none; margin:0 auto;">
                        <img id="sedentaryPic2" class="img-fluid"
                             src="<?php echo e(asset('/content/Sedentary2.png')); ?>?<?php echo e(time()); ?>" alt="Generic placeholder image"
                             style="margin:0 auto;">
                        <img id="sedentaryPic3" class="img-fluid"
                             src="<?php echo e(asset('/content/Sedentary3.png')); ?>?<?php echo e(time()); ?>" alt="Generic placeholder image"
                             style="display: none; margin:0 auto;">
                    </div>
                </div>

                <hr>

            </div>
            <!-- /END THE FEATURETTES -->
            <!-- /Start NAV Buttons -->
            <div class="av1">
                <form>
                    <button onclick="location.href = 'ScreenTime1'" type="button"
                            class="btn btn-outline-secondary btn-lg mr-5">Back
                    </button>
                    <input type="submit" value="Next" class="btn btn-primary btn-lg ">

            </div><!-- /.container -->
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        var x = "";


        var slider = new Slider('#slider', {
            formatter: function (value) {
                $('#days').html(value);
                hideImage();

                if (value >= 0 && value < 2.5) {
                    document.getElementById('sedentaryPic0').style.display = "block";
                }
                else if (value >= 2.5 && value < 6) {
                    document.getElementById('sedentaryPic1').style.display = "block";
                }
                else if (value >= 6 && value < 9) {
                    document.getElementById('sedentaryPic2').style.display = "block";
                }
                else {
                    document.getElementById('sedentaryPic3').style.display = "block";
                }
            }
        });

        function hideImage() {
            for (i = 0; i < 4; i++) {
                document.getElementById('sedentaryPic' + i).style.display = 'none';
            }
        }


    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>