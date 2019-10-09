<?php $__env->startSection('navigation'); ?>
    <?php echo $__env->make('layouts.navUser', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Begin page content -->
    <div class="jumbotron bg-white rounded-top rounded-bottom border border-secondry mx-2">
        <?php
            $data=DB::table('summernotes')->where("item_id","=",2)->value('content');
        ?>
        <?php echo $data; ?>

        <hr>
        <div class="av1">
            <form>
                <button onclick="location.href = 'Tests'" type="button" class="btn btn-outline-secondary btn-lg mr-5 ">
                    Back
                </button>

                <a href="Weight1" class="btn btn-primary btn-lg">Next</a>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>