<?php $__env->startSection('navigation'); ?>
    <?php echo $__env->make('layouts.navUser', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!--Check if user is logged in-->
    <?php if(!isset(Auth::user()->email)): ?>
        <script>window.location = "Login";</script>
    <?php endif; ?>
    <?php
        $data=DB::table('summernotes')->where("item_id","=",29)->value('content'); //link 1 for diet
        $data1=DB::table('summernotes')->where("item_id","=",30)->value('content'); //link 2 for diet
        $data2=DB::table('summernotes')->where("item_id","=",31)->value('content'); //link 3 for diet
        $data3=DB::table('summernotes')->where("item_id","=",50)->value('content'); //image and bottom text for diet

    ?>
    <div class="jumbotron bg-gery rounded-top rounded-bottom border border-secondry mx-2">
        <h2 class="av1">Tips to help you achive your goals - Fruits & Veggies <span class="text-muted"></span></h2>

        <div class="fAlert alert-colBox2" role="alert">
            <!-- Stack the columns on mobile by making one full-width and the other half-width -->
            <div class="row">
                <div class="col-12 col-md-8">Eat More Fruit and Veggies</div>
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
                <div class="col-12 col-md-8">Eat Fewer Snacks and Select Healthier Alternatives</div>
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
                <div class="col-12 col-md-8">Less juice, more water</div>
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
        <div class="parMainL">
            <a href="Tests" class="btn btn-primary">Next Test</a>
            <hr>
        </div>
        <br>
        <div class="av1">
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>