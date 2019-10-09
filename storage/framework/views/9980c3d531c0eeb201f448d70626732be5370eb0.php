<?php
    use App\Results;  
    use App\Child;
?>
<?php $__env->startSection('navigation'); ?>
    <?php echo $__env->make('layouts.navUser', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('/css/extra-sedentary.css')); ?>?<?php echo e(time()); ?>" rel="stylesheet" type="text/css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!--Check if user is logged in-->
    <?php if(!isset(Auth::user()->email)): ?>
        <script>window.location = "Login";</script>
    <?php endif; ?>
    <!--Display result message for user-->
    <?php
        $data1=DB::table('summernotes')->where("item_id","=",58)->value('content'); //welldone screen time SD
        $data2=DB::table('summernotes')->where("item_id","=",59)->value('content'); //getting there screen time SD
        $data3=DB::table('summernotes')->where("item_id","=",60)->value('content'); // well done screen time NSD
        $data4=DB::table('summernotes')->where("item_id","=",61)->value('content'); //getting there screen time NSD
        $data5=DB::table('summernotes')->where("item_id","=",62)->value('content'); //image
            $result = App\Results::where('childID', Auth::user()->currentChild)->first();
            $child = App\Child::where('childID', Auth::user()->currentChild)->first();
            $entries = App\Entries::where('childID', Auth::user()->currentChild)->first();
            $screenSDv = $entries->screenTimeSD;
            $screenNSDv = $entries->screenTimeNSD;
            $screenSD = $result->RscreentimeSD;
            $screenNSD = $result->RscreentimeNSD;

            if ($screenSD == 0)
            {
                $screenSDMessage = $data1;
            }
            else
            {
                $screenSDMessage = $data2;
            }
            if ( $screenNSD == 0)
            {
                $screenNSDMessage = $data3;
            }
            else
            {
                $screenNSDMessage = $data4;
            }

    ?>

    <div class="jumbotron bg-white rounded-bottom border border-info mx-2">
        <h2 class="text-center text-info">Screen Time</h2>
        <hr>
        <div class="container text-center">
            <div class="row">
                <div class="col align-self-center">
                    <h3 class="featurette-heading text-info">Result<span class="text-muted"></span></h3>
                    <div class="row justify-content-center text-white">
                        <div class="col-6 lead bg-info">School Days</div>
                        <div class="col-6 lead bg-info">Non-School Days</div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-6 text-black lead border border-info"
                             style="background-color:#b1e0e7"><?php echo e($screenSDMessage); ?></div>
                        <div class="col-6 text-black lead  border border-info"
                             style="background-color:#b1e0e7"><?php echo e($screenNSDMessage); ?></div>
                    </div>
                    <br>
                    <div class="row justify-content-center  text-white">
                        <div class="col lead bg-secondary">Your child</div>
                        <div class="col lead bg-secondary">Recommended</div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col text-black lead  border border-secondary" style="background-color:#e4e6e7">
                            School Days
                        </div>
                        <div class="col text-black lead  border border-secondary"
                             style="background-color:#e4e6e7"><?php echo e($screenSDv); ?> hours
                        </div>
                        <div class="col text-black lead  border border-secondary" style="background-color:#e4e6e7">Less
                            than 2 hours
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col text-black lead  border border-secondary" style="background-color:#e4e6e7">Non -
                            School Days
                        </div>
                        <div class="col text-black lead  border border-secondary"
                             style="background-color:#e4e6e7"><?php echo e($screenNSDv); ?> hours
                        </div>
                        <div class="col text-black lead  border border-secondary" style="background-color:#e4e6e7">Less
                            than 2 hours
                        </div>
                    </div>
                    <br>
                    <?php echo $data5; ?>

                </div>
            </div>
            <hr>
        </div>
        <!-- /Start NAV Buttons -->
        <div class="av1">
            <form>
                <button class="btn btn-primary btn-lg" type="button" onclick="location.href = 'Tests'">
                    Next
                </button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>