<?php $__env->startSection('navigation'); ?>
    <?php echo $__env->make('layouts.navUser', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $data=DB::table('summernotes')->where("item_id","=",38)->value('content');
        $data1=DB::table('summernotes')->where("item_id","=",39)->value('content');
        $data2=DB::table('summernotes')->where("item_id","=",40)->value('content');
        $data3=DB::table('summernotes')->where("item_id","=",63)->value('content');

    ?>
    <!--Check if user is logged in-->
    <?php if(!isset(Auth::user()->email)): ?>
        <script>window.location = "Login";</script>
    <?php endif; ?>
    <div class="jumbotron bg-gery rounded-top rounded-bottom border border-secondry mx-2">
        <h2 class="av1">Tips to help you achive your goals - Sleep <span class="text-muted"></span></h2>
        <div class="fAlert alert-colBox2" role="alert">
            <!-- Stack the columns on mobile by making one full-width and the other half-width -->
            <div class="row">
                <div class="col-12 col-md-8">Sleep well</div>
                <div class="col-12 col-md-4">
                    <button type="button" class="btn btn-light" onclick=" window.open('<?php echo e($data); ?>','_blank')">Find out
                        more
                    </button>
                </div>
            </div>
        </div><!--Green thing div-->

        <div class="fAlert alert-colBox" role="alert">
            <!-- Stack the columns on mobile by making one full-width and the other half-width -->
            <div class="row">
                <div class="col-12 col-md-8"> Healthy sleep habits at home</div>
                <div class="col-12 col-md-4">
                    <button type="button" class="btn btn-light" onclick=" window.open('<?php echo e($data1); ?>','_blank')">Find out
                        more
                    </button>
                </div>
            </div>
        </div><!--Blue thing div-->
        <div class="fAlert alert-colBox1" role="alert">
            <!-- Stack the columns on mobile by making one full-width and the other half-width -->
            <div class="row">
                <div class="col-12 col-md-8">Kids Back on a Sleep Schedule for School</div>
                <div class="col-12 col-md-4">
                    <button type="button" class="btn btn-light" onclick=" window.open('<?php echo e($data2); ?>','_blank')">Find out
                        more
                    </button>
                </div>
            </div>
        </div><!--red thing div-->
        <div class="text-center">
            <?php echo $data3; ?>

        </div>
        <hr>
        <div class="parMainL">
            <a href="Tests" class="btn btn-primary">Next Test</a>

        </div>
        <br>
        <div class="av1">
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>