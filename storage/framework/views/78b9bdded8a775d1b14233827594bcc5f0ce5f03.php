<?php $__env->startSection('navigation'); ?>
    <?php echo $__env->make('layouts.navUser', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(!isset(Auth::user()->email)): ?>
        <script>window.location = "Login";</script>
    <?php endif; ?>
<?php $__env->startSection('content'); ?>
    <form method="post" action="<?php echo e(url('StoreWaist')); ?>">
        <?php echo e(csrf_field()); ?>

        <div class="jumbotron bg-white rounded-top rounded-bottom border border-secondry mx-2">
            <hr>
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
                $data=DB::table('summernotes')->where("item_id","=",6)->value('content');
            ?>
            <?php echo $data; ?>

            <input class="form-control" name="waist" type="text" placeholder="Waist circumfrence in centimetres">
            <br>
            <div class="av1">
                <button onclick="location.href = 'Weight3'" type="button" class="btn btn-outline-secondary btn-lg mr-5">
                    Back
                </button>
                <!-- Button trigger modal -->
                <input type="submit" value="Next" class="btn btn-primary btn-lg">
                <!--  <button type="button" class="btn btn-primary btn-lg mr-5" data-toggle="modal" data-target="#exampleModal">
                    Next
                  </button> -->
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Well done!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="parMainL">
                            <p class="">You have completed the test. Please prossed to the next stage by pressing the
                                "view results"</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!--
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                        -->
                        <a href="WeightBMI4" type="button" class="btn btn-primary">See BMI results</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>