
<?php
    use App\Results;  
    use App\Child;
?>
<?php $__env->startSection('navigation'); ?>
    <?php echo $__env->make('layouts.navUser', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('/css/extra-diet.css')); ?>?<?php echo e(time()); ?>" rel="stylesheet" type="text/css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php
        $child = App\Child::where('childID', Auth::user()->currentChild)->first();
        $entries = App\Entries::where('childID', Auth::user()->currentChild)->first();
        $veg = $entries->veggies;
        $fruit = $entries->fruits;
        $childAge=$child->age;
        $childGender=$child->sex;
      //check the recommended number of vegetable according to age and gender
        if ($childAge >= 5 && $childAge <= 8 )
        {
            $recommendedV="4.5";
        }

        elseif ($childGender == "Male" && $childAge == 12){

            $recommendedV = "5.5";
            }
        elseif ($childGender == "Female" && $childAge == 12){
             $recommendedV = "5";
            
        }
        elseif($childAge > 8 && $childAge < 12){
             $recommendedV = "5";
        }
    ?>
    <?php
        //check the recommended number of fruits according to age and gender
                  if ($childAge >= 5 && $childAge <= 8 )
          {
              $recommendedF="1.5";
          }
          elseif($childAge > 8 && $childAge <= 12){
               $recommendedF = "2";
          }
    ?>


    <?php if(!isset(Auth::user()->email)): ?>
        <script>window.location = "Login";</script>
    <?php endif; ?>

    <?php
        $data1=DB::table('summernotes')->where("item_id","=",44)->value('content'); //welldone f
      $data2=DB::table('summernotes')->where("item_id","=",45)->value('content'); //getting there f
      $data3=DB::table('summernotes')->where("item_id","=",46)->value('content'); // well done v
      $data4=DB::table('summernotes')->where("item_id","=",47)->value('content'); //getting there v
      $data5=DB::table('summernotes')->where("item_id","=",48)->value('content'); //image
          $result = App\Results::where('childID', Auth::user()->currentChild)->first();
          $child = App\Child::where('childID', Auth::user()->currentChild)->first();
          $fruits = $result->RfruitsIntake;
          $veggies = $result->RveggiesIntake;

          if ($fruits == 0)
          {
              $fruitMessage = $data1;
          }
          else
          {
              $fruitMessage = $data2;
          }
          if ( $veggies == 0)
          {
              $veggiesMessage = $data3;
          }
          else
          {
              $veggiesMessage = $data4;
          }

    ?>
    <div class="jumbotron bg-white rounded-bottom border border-success mx-2">
        <h2 class="text-center text-success">Fruits and Vegetables</h2>
        <hr>
        <div class="container text-center">
            <div class="row">
                <div class="col align-self-center">
                    <h3 class="featurette-heading text-success">Result<span class="text-muted"></span></h3>
                    <div class="row justify-content-center  text-white">
                        <div class="col-6 lead bg-success">Veggies</div>
                        <div class="col-6 lead bg-success">Fruits</div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-6 text-black lead border border-success"
                             style="background-color:#b3e0bd"><?php echo e($veggiesMessage); ?></div>
                        <div class="col-6 text-black lead  border border-success"
                             style="background-color:#b3e0bd"><?php echo e($fruitMessage); ?></div>
                    </div>
                    <br>
                    <div class="row justify-content-center  text-white">
                        <div class="col lead bg-secondary">Your child</div>
                        <div class="col lead bg-secondary">Recommended</div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col text-black lead  border border-secondary" style="background-color:#e4e6e7">
                            Vegetables
                        </div>
                        <div class="col text-black lead  border border-secondary"
                             style="background-color:#e4e6e7"><?php echo e($veg); ?></div>
                        <div class="col text-black lead  border border-secondary"
                             style="background-color:#e4e6e7"><?php echo e($recommendedV); ?> </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col text-black lead  border border-secondary" style="background-color:#e4e6e7">
                            Fruits
                        </div>
                        <div class="col text-black lead  border border-secondary"
                             style="background-color:#e4e6e7"><?php echo e($fruit); ?></div>
                        <div class="col text-black lead  border border-secondary"
                             style="background-color:#e4e6e7"><?php echo e($recommendedF); ?></div>
                    </div>
                    <br>
                    <?php echo $data5; ?>

                </div>
            </div>
            <hr>
        </div>
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