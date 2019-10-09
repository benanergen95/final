<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        a {
            background-color: #008CBA;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

    </style>

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
        <script>window.location = "Login";</script>
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
</head>
<body>
<p>Hi <?php echo e($pname); ?>, these are the results of your child <?php echo e($cname); ?>.</p>
<h2>Results</h2>

<table>
    <tr>
        <th>Test</th>
        <th>Result</th>
    </tr>
    <tr>
        <td>Weight</td>
        <td><?php echo e($results->RBmi == 1 ? $data2 : ($results->RBmi == 0 ? $data1 : $data3)); ?></td>
    </tr>
    <tr>
        <td>Fruit Intake</td>
        <td><?php echo e($results->RfruitsIntake == 0 ? $data1f : $data2f); ?></td>
    </tr>
    <tr>
        <td>Veggies Intake</td>
        <td><?php echo e($results->RveggiesIntake == 0 ? $data1v :  $data2v); ?></td>

    </tr>
    <tr>
        <td>Exercise</td>
        <td><?php echo e($results->Rexercise == 0 ? $data1e : $data2e); ?></td>
    </tr>
    <tr>
        <td>Screen time School Days</td>
        <td><?php echo e($results->RscreentimeSD == 0 ? $data1st : $data2st); ?></td>
    </tr>
    <tr>
        <td>Screen time Non-School Days</td>
        <td><?php echo e($results->RscreentimeNSD == 0 ? $data3st : $data4st); ?></td>
    </tr>
    <tr>
        <td>Sleep School Days</td>
        <td><?php echo e($results->RStimeSD == 0 ? $data1slp : ($results->RStimeSD == 1 ? $data2slp : $data5slp)); ?></td>
    </tr>
    <tr>
        <td>Sleep Non-School Days</td>
        <td><?php echo e($results->RStimeNSD == 0 ? $data3slp : ($results->RStimeNSD == 1 ? $data4slp : $data6slp)); ?></td>
    </tr>
</table>
<br>
<div align="center">
    <a href="http://ec2-13-236-85-213.ap-southeast-2.compute.amazonaws.com/" class="button">Go to Healthy Start</a>

</div>
</body>
</html>

