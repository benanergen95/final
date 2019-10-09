<?php
    use App\Results;  
    use App\Child;
?>
<?php $__env->startSection('navigation'); ?>
    <?php echo $__env->make('layouts.navUser', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('/css/extra-sleep.css')); ?>?<?php echo e(time()); ?>" rel="stylesheet" type="text/css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!--Check if user is logged in-->
    <?php if(!isset(Auth::user()->email)): ?>
        <script>window.location = "Login";</script>
    <?php endif; ?>
    <!--Display result message for user-->
    <?php
        $data1=DB::table('summernotes')->where("item_id","=",64)->value('content'); //welldone sleep SD
      $data2=DB::table('summernotes')->where("item_id","=",65)->value('content'); //getting there sleep SD
       $data3=DB::table('summernotes')->where("item_id","=",66)->value('content'); // well done sleep NSD
       $data4=DB::table('summernotes')->where("item_id","=",67)->value('content'); //getting there sleep NSD
       $data5=DB::table('summernotes')->where("item_id","=",68)->value('content'); //image
       $data6=DB::table('summernotes')->where("item_id","=",69)->value('content'); //too much sleep SD
     $data7=DB::table('summernotes')->where("item_id","=",70)->value('content'); //too much sleep NSD
     $result = App\Results::where('childID', Auth::user()->currentChild)->first();
     $child = App\Child::where('childID', Auth::user()->currentChild)->first();
     $entries = App\Entries::where('childID', Auth::user()->currentChild)->first();
     $sleep1 = date('H:i', strtotime($entries->sleepSD));
     $sleep2 =date('H:i', strtotime($entries->sleepNSD));
     $sleepSD = $result->RStimeSD;
     $sleepNSD = $result->RStimeNSD;

     if ($sleepSD == 0)
     {
         $sleepSDMessage = $data1;//"Enough Sleep!";
     }
     elseif($sleepSD == 2)
     {
         $sleepSDMessage = $data6; //"Too much sleep!";$data6;
     }
     else
     {
         $sleepSDMessage = $data2; //"Need more sleep!";$data2;
     }

     if ( $sleepNSD == 0)
     {
         $sleepNSDMessage = $data3;//"Enough Sleep!";$data3;
     }
     elseif ($sleepNSD == 2)
     {
         $sleepNSDMessage = $data7;//"Too much sleep!";$data7;
     }
     else
     {
         $sleepNSDMessage = $data4;//"Need more sleep!";$data4;
     }

    ?>
    <div class="jumbotron bg-white rounded-bottom border border-secondary mx-2">
        <h2 class="text-center ">Sleep</h2>
        <hr>
        <div class="container text-center">
            <div class="row">
                <div class="col align-self-center">
                    <h3 class="featurette-heading ">Result<span class="text-muted"></span></h3>
                    <div class="row justify-content-center  text-white">
                        <div class="col-6 lead bg-secondary">School Days</div>
                        <div class="col-6 lead bg-secondary">Non-School Days</div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-6 text-black lead border border-secondary"
                             style="background-color:#e4e6e7"><?php echo e($sleepSDMessage); ?></div>
                        <div class="col-6 text-black lead  border border-secondary"
                             style="background-color:#e4e6e7"><?php echo e($sleepNSDMessage); ?></div>
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
                             style="background-color:#e4e6e7"><?php echo e($sleep1); ?></div>
                        <div class="col text-black lead  border border-secondary" style="background-color:#e4e6e7">
                            Between 9 & 11 hours
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col text-black lead  border border-secondary" style="background-color:#e4e6e7">Non -
                            School Days
                        </div>
                        <div class="col text-black lead  border border-secondary"
                             style="background-color:#e4e6e7"><?php echo e($sleep2); ?></div>
                        <div class="col text-black lead  border border-secondary" style="background-color:#e4e6e7">
                            Between 9 & 11 hours
                        </div>
                    </div>

                    <br>
                    <?php echo $data5; ?>

                    <hr>
                </div>
            </div>
        </div>
        <!-- /END THE FEATURETTES -->
        <!-- /Start NAV Buttons -->
        <div class="av1">
            <form>
                <button onclick="location.href = 'Tests'" type="button" class="btn btn-primary btn-lg ">Next</button>
                <button onclick="location.href = 'Sleep1'" type="button" class="btn btn-primary btn-lg ">Redo Test</button>
            </form>
        </div>

    </div><!-- /.container -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>