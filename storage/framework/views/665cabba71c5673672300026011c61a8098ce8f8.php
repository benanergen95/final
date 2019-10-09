  <?php $__env->startSection('navigation'); ?>
      <?php echo $__env->make('layouts.navUser', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('content'); ?> 
    <!-- Begin page content -->
    <?php
    $data=DB::table('summernotes')->where("item_id","=",19)->value('content'); //main line
    $data1=DB::table('summernotes')->where("item_id","=",20)->value('content'); //well done
    $data2=DB::table('summernotes')->where("item_id","=",21)->value('content'); //normal
    $data3=DB::table('summernotes')->where("item_id","=",22)->value('content');//getting there
    $data4=DB::table('summernotes')->where("item_id","=",23)->value('content'); //underweight
    $data5=DB::table('summernotes')->where("item_id","=",24)->value('content');//getting there
    $data6=DB::table('summernotes')->where("item_id","=",25)->value('content'); //overweight
    $data7=DB::table('summernotes')->where("item_id","=",42)->value('content'); //good image 
    $data8=DB::table('summernotes')->where("item_id","=",43)->value('content'); //ng image


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


        if($Bmirr ==1)
        {
            $BMIr=$data4;
            $BMIc=$data3;
        }
          elseif($Bmirr ==0)
        {
            $BMIr=$data2;
            $BMIc=$data1;
        }
         elseif($Bmirr ==2)
        {
            $BMIr=$data6;
            $BMIc=$data5;
        }


?>
<div class="jumbotron bg-white rounded-bottom border border-secondary mx-2">    
      <h2 class="text-center text-info"><b>Weight</b></h2>          
      <hr>
      <div class="container text-center">
        <div class="row">
          <div class="col align-self-center">
            <h3 class="featurette-heading text-info">Result<span class="text-muted"></span></h3>
            <div class="row justify-content-center  text-white">
            <div class="col-10 lead bg-info py-2" style="background-color:#f4bec3"> <?php echo e($BMIc); ?></div>
          </div>
            <p class="lead">
           <?php echo e($fname); ?>,  <?php echo e($data); ?> <?php echo e($BMIr); ?> with Bmi z-score value of <?php echo e($zBMI); ?>.

            </p>

             <div class="row justify-content-center  text-white">
               <div class="col-5 lead bg-secondary">Your child</div>
               <div class="col-5 lead bg-secondary">Recommended</div>
            </div>

            <div class="row justify-content-center">
              <div class="col-5 text-black lead  border border-secondary" style="background-color:#e4e6e7"><?php echo e($zBMI); ?></div>
               <div class="col-5 text-black lead  border border-secondary" style="background-color:#e4e6e7">z-score between -1.99 & 0.99 (included)</div>       
              
            </div>
            <br>
          <?php if($Bmirr== '0'): ?>
             <?php echo $data7; ?>

          <?php endif; ?>
          <?php if($Bmirr =='1' || $Bmirr =='2'): ?>
           <?php echo $data8; ?>

          <?php endif; ?>
           </div>
        </div>
        <hr>
      </div>
  <div class="av1">
        <form>
          <button onclick="location.href = 'Tests'" type="button" class="btn btn-primary btn-lg ">Next</button>
        </form>
      </div>
</div>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>