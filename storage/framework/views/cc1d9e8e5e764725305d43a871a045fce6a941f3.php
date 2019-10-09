
<?php
    use App\Child;
    use App\Entries;
    use App\User;
    use App\Results;

    $entries = App\Entries::where('childID', Auth::user()->currentChild)->first();
    $results = App\Results::where('childID', Auth::user()->currentChild)->first();

?>

<?php
    $data1=DB::table('summernotes')->where("item_id","=",21)->value('content'); //normal weight
    $data2=DB::table('summernotes')->where("item_id","=",23)->value('content'); //underweight
    $data3=DB::table('summernotes')->where("item_id","=",25)->value('content'); //overweight
    $data1f=DB::table('summernotes')->where("item_id","=",44)->value('content'); //welldone f
    $data2f=DB::table('summernotes')->where("item_id","=",45)->value('content'); //getting there f
    $data1v=DB::table('summernotes')->where("item_id","=",46)->value('content'); // well done v 
    $data2v=DB::table('summernotes')->where("item_id","=",47)->value('content'); //getting there v
    $data1e=DB::table('summernotes')->where("item_id","=",52)->value('content'); //well done
    $data2e=DB::table('summernotes')->where("item_id","=",54)->value('content');//getting there
    $data1st=DB::table('summernotes')->where("item_id","=",58)->value('content'); //welldone screen time SD
    $data2st=DB::table('summernotes')->where("item_id","=",59)->value('content'); //getting there screen time SD 
    $data3st=DB::table('summernotes')->where("item_id","=",60)->value('content'); // well done screen time NSD
    $data4st=DB::table('summernotes')->where("item_id","=",61)->value('content'); //getting there screen time NSD
    $data1slp=DB::table('summernotes')->where("item_id","=",64)->value('content'); //welldone sleep SD
    $data2slp=DB::table('summernotes')->where("item_id","=",65)->value('content'); //getting there sleep SD 
    $data5slp=DB::table('summernotes')->where("item_id","=",69)->value('content'); //too much sleep SD
    $data3slp=DB::table('summernotes')->where("item_id","=",66)->value('content'); // well done sleep NSD
    $data4slp=DB::table('summernotes')->where("item_id","=",67)->value('content'); //getting there sleep NSD
    $data6slp=DB::table('summernotes')->where("item_id","=",70)->value('content'); //too much sleep NSD
?>
<?php
    $child = App\Child::where('childID', Auth::user()->currentChild)->first();
    $entries = App\Entries::where('childID', Auth::user()->currentChild)->first();
    $veg = $entries->veggies;
    $fruit = $entries->fruits;
    $childAge=$child->age;
    $childGender=$child->sex;
    if ($childAge >= 5 && $childAge <= 8 )
    {
          $recommendedV="4.5 serves";
      }

      elseif ($childGender == "Male" && $childAge == 12){

          $recommendedV = "5.5 serves";
          }
      elseif ($childGender == "Female" && $childAge == 12){
         $recommendedV = "5 serves";

      }
      elseif($childAge > 8 && $childAge < 12){
           $recommendedV = "5 serves";
      }
?>
<?php
    if ($childAge >= 5 && $childAge <= 8 )
{
    $recommendedF="1.5 serves";
}
elseif($childAge > 8 && $childAge <= 12){
     $recommendedF = "2 serves";
}
?>


<?php if(!isset(Auth::user()->email)): ?>
    <script>window.location = "Login";</script>
<?php endif; ?>


<?php
    $result = App\Results::where('childID', Auth::user()->currentChild)->first();
    $child = App\Child::where('childID', Auth::user()->currentChild)->first();
    $fruits = $result->RfruitsIntake;
    $veggies = $result->RveggiesIntake;

    if ($fruits == 0)
    {
      $fruitMessage = "Well Done!";
    }
    else
    {
      $fruitMessage = "You're Getting There!";
    }
    if ( $veggies == 0)
    {
      $veggiesMessage = "Well Done!";
    }
    else
    {
      $veggiesMessage = "You're Getting There!";
    }

?>
<?php $__env->startSection('navigation'); ?>
    <?php echo $__env->make('layouts.navUser', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <link href="<?php echo e(asset('/css/sticky-footer-navbar.css')); ?>?<?php echo e(time()); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(!isset(Auth::user()->email)): ?>
        <script>window.location = "Login";</script>
    <?php endif; ?>


    <!--Check if all questionnaire has been answered-->
    <?php if(empty($entries->height) || empty($entries->weight) || empty($entries->waist) || is_null($entries->fruits) || is_null($entries->veggies) || empty($entries->exercise) || is_null($entries->screenTimeSD) || is_null($entries->screenTimeNSD) || empty($entries->sleepSD) || empty($entries->sleepNSD)): ?>
        <script>window.location = "ResultDenied";</script>
    <?php endif; ?>
    <!---->

    <div class="jumbotron bg-white rounded-top rounded-bottom border border-secondry mx-2">
        <?php if($successMessage = Session::get('success')): ?>
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">
                </button>
                <?php echo e($successMessage); ?>

            </div>
        <?php endif; ?>
        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">
                </button>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <h2 class="av1">Results<span class="text-muted"></span></h2>

        <hr>
        <h3 class="text-left text-success">Your Childs results</h3>
        <div class="parMain">
            <div class="row justify-content-center  text-white">
                <div class="col lead bg-secondary">Test</div>
                <div class="col lead bg-secondary">Result</div>
                <!--   <div class="col lead bg-secondary">Values</div> -->
                <div class="col lead bg-secondary">Recommended</div>
            </div>
            <div class="row justify-content-center">
                <!-- Weight result-->
                <div class="col text-black lead border border-secondary" style="background-color:#e4e6e7">Weight</div>
                <div class="col text-black lead  border border-secondary"
                     style="background-color:#e4e6e7"><?php echo e($results->RBmi == 1 ? $data2 : ($results->RBmi == 0 ? $data1 : $data3)); ?></div>
            <!--   <div class="col text-black lead  border border-secondary" style="background-color:#e4e6e7"><?php echo e($entries->BMI_v); ?></div> -->
                <div class="col text-black lead  border border-secondary" style="background-color:#e4e6e7">z-score
                    between -1.99 & 0.99
                </div>
                <!--Fruit & Veggies result -->
            </div>
            <div class="row justify-content-center">
                <div class="col text-black lead border border-secondary" style="background-color:#e4e6e7">Fruit Intake
                </div>
                <div class="col text-black lead  border border-secondary"
                     style="background-color:#e4e6e7"><?php echo e($results->RfruitsIntake == 0 ? $data1f : $data2f); ?></div>
            <!--     <div class="col-2 text-black lead  border border-secondary" style="background-color:#e4e6e7"><?php echo e($entries->fruits); ?></div> -->
                <div class="col text-black lead  border border-secondary"
                     style="background-color:#e4e6e7"><?php echo e($recommendedF); ?></div>
            </div>
            <div class="row justify-content-center">
                <div class="col text-black lead border border-secondary" style="background-color:#e4e6e7">Veggies
                    Intake
                </div>
                <div class="col text-black lead  border border-secondary"
                     style="background-color:#e4e6e7"><?php echo e($results->RveggiesIntake == 0 ? $data1v :  $data2v); ?></div>
            <!--   <div class="col-2 text-black lead  border border-secondary" style="background-color:#e4e6e7"><?php echo e($entries->veggies); ?></div> -->
                <div class="col text-black lead  border border-secondary"
                     style="background-color:#e4e6e7"><?php echo e($recommendedV); ?></div>
            </div>
        </div>
        <!-- Exercise result-->
        <div class="row justify-content-center">
            <div class="col text-black lead border border-secondary" style="background-color:#e4e6e7">Exercise</div>
            <div class="col text-black lead  border border-secondary"
                 style="background-color:#e4e6e7"><?php echo e($results->Rexercise == 0 ? $data1e : $data2e); ?></div>

        <!--     <div class="col-2 text-black lead  border border-secondary" style="background-color:#e4e6e7"><?php echo e(date('H:i', strtotime($entries->exercise))); ?></div> -->
            <div class="col text-black lead  border border-secondary" style="background-color:#e4e6e7">More than 1
                hour
            </div>
        </div>
        <!-- Screen time result-->
        <div class="row justify-content-center">
            <div class="col text-black lead border border-secondary" style="background-color:#e4e6e7">Screen time School
                Days
            </div>
            <div class="col text-black lead  border border-secondary"
                 style="background-color:#e4e6e7"><?php echo e($results->RscreentimeSD == 0 ? $data1st : $data2st); ?></div>
        <!--    <div class="col-2 text-black lead  border border-secondary" style="background-color:#e4e6e7"><?php echo e($entries->screenTimeSD); ?></div> -->
            <div class="col text-black lead  border border-secondary" style="background-color:#e4e6e7"> Less than 2
                hours
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col text-black lead border border-secondary" style="background-color:#e4e6e7">Screen time
                Non-School Days
            </div>
            <div class="col text-black lead  border border-secondary"
                 style="background-color:#e4e6e7"><?php echo e($results->RscreentimeNSD == 0 ? $data3st : $data4st); ?></div>
        <!--    <div class="col-2 text-black lead  border border-secondary" style="background-color:#e4e6e7"><?php echo e($entries->screenTimeNSD); ?></div> -->
            <div class="col text-black lead  border border-secondary" style="background-color:#e4e6e7"> Less than 2
                hours
            </div>
            <!-- Sleep result-->
        </div>
        <div class="row justify-content-center">
            <div class="col text-black lead border border-secondary" style="background-color:#e4e6e7">Sleep School
                Days
            </div>
            <div class="col text-black lead  border border-secondary"
                 style="background-color:#e4e6e7"><?php echo e($results->RStimeSD == 0 ? $data1slp : ($results->RStimeSD == 1 ? $data2slp : $data5slp)); ?></div>
        <!--     <div class="col-2 text-black lead  border border-secondary" style="background-color:#e4e6e7"><?php echo e(date('H:i', strtotime($entries->sleepSD))); ?></div> -->
            <div class="col text-black lead  border border-secondary" style="background-color:#e4e6e7">Between 9 & 11
                hours
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col text-black lead border border-secondary" style="background-color:#e4e6e7">Sleep Non-School
                Days
            </div>
            <div class="col text-black lead  border border-secondary"
                 style="background-color:#e4e6e7"><?php echo e($results->RStimeNSD == 0 ? $data3slp : ($results->RStimeNSD == 1 ? $data4slp : $data6slp)); ?></div>
        <!--     <div class="col-2 text-black lead  border border-secondary" style="background-color:#e4e6e7"><?php echo e(date('H:i', strtotime($entries->sleepNSD))); ?></div> -->
            <div class="col text-black lead  border border-secondary" style="background-color:#e4e6e7">Between 9 & 11
                hours
            </div>
        </div>

        <br>

        <hr>
        <div class="av1">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                Email Results
            </button>
            <a href="ChildRegistration" class="btn btn-primary">Start New</a>
            <hr>
            <a href="Tests" class="btn btn-primary">Home</a>
        </div>
        <hr>

    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Email The Results/Resourcess</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <p class="">Please select which email account you would like to send the email to.</p>

                    <form action="<?php echo e(url('send')); ?>">
                        <div class="row justify-content-center">
                            <button value="submit" type="submit" class="btn btn-primary btn-sm">Use my account Email
                            </button>
                        </div>
                    </form>


                    <form action="<?php echo e(url('csend')); ?>">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Or alternatively enter the email address you would like to
                                send the results to.</label>
                            <input type="email" class="form-control" id="email" name="email"
                                   aria-describedby="emailHelp" placeholder="Email@domain.com">
                        </div>


                </div>
                <div class="modal-footer">
                    <button value="submit" type="submit" class="btn btn-success">Send Results</button>
                </div>
            </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>