  <?php $__env->startSection('navigation'); ?>
      <?php echo $__env->make('layouts.navUser', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('content'); ?> 
    <!-- Begin page content -->
    <?php
        $fname = DB::table('child')
          ->where('childID',\Auth::user()->currentChild)
         ->value('CfName');
        $lname = DB::table('child')
          ->where('childID',\Auth::user()->currentChild)
         ->value('ClName');


         $Bmirr = DB::table('results')
          ->where('childID',\Auth::user()->currentChild)
         ->value('RBmi');

         $zBMI = DB::table('entries')
          ->where('childID',\Auth::user()->currentChild)
         ->value('BMI_V');


        if($Bmirr ==0)
        {
            $BMIr="underweight";
            $BMIc="Getting there!";
        }
          elseif($Bmirr ==1)
        {
            $BMIr="normal weight";
            $BMIc="Well Done";
        }
         elseif($Bmirr ==2)
        {
            $BMIr="overweight";
            $BMIc="Getting there!";
        }


?>

<div class="jumbotron bg-white rounded-bottom border border-info mx-4">     
      <h2 class="text-center text-info">Weight</h2>          
      <hr>
      <div class="container text-center">
        <div class="row">
          <div class="col align-self-center">
            <h3 class="featurette-heading text-info">Result<span class="text-muted"></span></h3>
            <p class="lead">
           
              <?php echo e($BMIc); ?>, <?php echo e($fname); ?>  falls under the the caterogery of <?php echo e($BMIr); ?> with Bmi z-score value of <?php echo e($zBMI); ?>.


            </p>
             <img src="<?php echo e(asset('/content/child good weight.png')); ?>?<?php echo e(time()); ?>" class="img-fluid" alt="Generic placeholder image" >

           
          </div>  
        </div>
        <hr>
      </div>
<div class="av1">
      <form>
        <button class="btn btn-primary btn-lg ml-5" type="button" onclick="location.href = 'Weight5'">
                  Next
                </button>
      </form>
    </div>  

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>