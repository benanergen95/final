<?php $__env->startSection('navigation'); ?>
    <?php echo $__env->make('layouts.navUser', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('/css/extra-physical.css')); ?>?<?php echo e(time()); ?>" rel="stylesheet" type="text/css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageStyle'); ?>
    .combodate {display:block}
    .combodate .form-control {display:inline-block}
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <?php if(!isset(Auth::user()->email)): ?>
        <script>window.location = "Login";</script>
    <?php endif; ?>
    <div class="jumbotron bg-white rounded-bottom border border-danger mx-2">
        <form method="post" action="<?php echo e(url('StoreExercise')); ?>">
            <?php echo e(csrf_field()); ?>

            <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <div class="container text-center">
                <div class="row">
                    <div class="col align-self-center">
                        <?php
                            $data=DB::table('summernotes')->where("item_id","=",11)->value('content');
                            $data2=DB::table('summernotes')->where("item_id","=",18)->value('content');
                        ?>
                        <?php echo $data; ?>


                        <input type="text" id="time" name="time" data-format="HH:mm" data-template="HH : mm"
                               name="datetime" data-custom-class="form-control">
                        <br>
                        <?php echo $data2; ?>

                        <hr>
                    </div>
                </div>

            </div>
            <!-- /END THE FEATURETTES -->
            <div class="av1">
                <button onclick="location.href = 'Exercise0'" type="button"
                        class="btn btn-outline-secondary btn-lg mr-5">Back
                </button>
                <input type="submit" value="Next" class="btn btn-primary btn-lg ">

            </div>
        </form>
    </div><!-- /.container -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(function () {
            $('#time').combodate({
                firstItem: 'name', //show 'hour' and 'minute' string at first item of dropdown
                minuteStep: 1
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>