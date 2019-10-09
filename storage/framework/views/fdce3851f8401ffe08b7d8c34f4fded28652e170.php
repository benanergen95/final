<?php $__env->startSection('navigation'); ?>
    <?php echo $__env->make('layouts.navUser', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(!isset(Auth::user()->email)): ?>
        <script>window.location = "Login";</script>
    <?php endif; ?>

    
<?php $__env->startSection('content'); ?>
        <div class="jumbotron bg-white rounded-top rounded-bottom border border-secondry mx-2">
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
                $data=DB::table('summernotes')->where("item_id","=",81)->value('content');
            ?>
            <?php echo $data; ?>

          
            <div class="av1">
            <form>
                <button onclick="location.href = 'MentalHealth1'" type="button"
                        class="btn btn-outline-secondary btn-lg mr-5 ">Back
                </button>
                <a href="MentalHealth3"  class="btn btn-primary btn-lg ">Next</a>
            </form>
        </div>
        </div>

        </div>
        </div>
    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>