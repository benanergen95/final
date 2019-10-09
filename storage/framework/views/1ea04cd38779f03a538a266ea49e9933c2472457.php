<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

 </head>
<body>

  <?php
    use App\Child;
    use App\Entries;
    use App\User;
    use App\Results;

    $entries = App\Entries::where('childID', Auth::user()->currentChild)->first();
    $results = App\Results::where('childID', Auth::user()->currentChild)->first();
    $users = App\User::where('currentChild', Auth::user()->currentChild)->first();
    $pname = $users->fname;
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
            if ($childAge >= 5 && $childAge <= 8 )
      {
            $recommendedF="1.5";
        }
        elseif($childAge > 8 && $childAge <= 12){
             $recommendedF = "2";
        }
      ?>


      <?php if(!isset(Auth::user()->email)): ?>
          <script>window.location="Login";</script>
      <?php endif; ?>

     
      <?php
        $result = App\Results::where('childID', Auth::user()->currentChild)->first();
        $child = App\Child::where('childID', Auth::user()->currentChild)->first();
        $cname = $child->CfName;
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
  <?php $__env->startSection('content'); ?>
  <p>Hi <?php echo e($pname); ?>, these are the results of your child <?php echo e($cname); ?>.</p>
		    <h2 align="center">Results<span class="text-muted"></span></h2>

       <hr>
<div align="left" >

  <p >Weight Body Mass Index <b> | <?php echo e($results->RBmi == 1 ? $data2 : ($results->RBmi == 0 ? $data1 : $data3)); ?></b> </p>
  <hr>
  	<p>Fruit Intake  <b> | <?php echo e($results->RfruitsIntake == 0 ? $data1f : $data2f); ?></b></p>
     <hr>
  <p>Veggies Intake | <b><?php echo e($results->RveggiesIntake == 0 ? $data1v :  $data2v); ?></b></p>
    <hr>
  <p>Exercise | <b><?php echo e($results->Rexercise == 0 ? $data1e : $data2e); ?></b></p>
    <hr>
  <p>Screen time School Days | <b><?php echo e($results->RscreentimeSD == 0 ? $data1st : $data2st); ?></b></p>
 <hr>
  <p>Screen time Non-School Days | <b><?php echo e($results->RscreentimeNSD == 0 ? $data3st : $data4st); ?></b></p>
  <hr>
  <p>Sleep School Days | <b><?php echo e($results->RStimeSD == 0 ? $data1slp : ($results->RStimeSD == 1 ? $data2slp : $data5slp)); ?></b></p>
   <hr>
  <p>Sleep Non-School Days | <b><?php echo e($results->RStimeNSD == 0 ? $data3slp : ($results->RStimeNSD == 1 ? $data4slp : $data6slp)); ?></b></p>
  </div> 
</div>
  <hr><br>
  <div align="center">   
  <button type="button" onclick="window.location.href='http://127.0.0.1:8000'" >Go to Healthy start</button> 
  </div>    
         <br> 

      </div>   
       </div>
     </div>
  </body>
</html>