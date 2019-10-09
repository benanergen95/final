<!DOCTYPE html>
<html>
<head>
    <style>
        .text-right {
            text-align: right;
        }
    </style>

    @php
        use App\Child;
        use App\Entries;
        use App\User;
        use App\Results;
        use Carbon\Carbon;

        $users = App\User::where('currentChild', Auth::user()->currentChild)->first();
        $pname = $users->fname;
        $child = App\Child::where('childID', Auth::user()->currentChild)->first();
        $cname = $child->CfName;

        $date = Carbon::now()->format('d-m-Y');

        $entries = App\Entries::where('childID', Auth::user()->currentChild)->orderBy('entryID', 'desc')->first();
        $results = App\Results::where('childID', Auth::user()->currentChild)->orderBy('resultID', 'desc')->first();
    @endphp

    @php
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
        $data7=DB::table('summernotes')->where("item_id","=",82)->value('content'); //Mental Good
    $data8=DB::table('summernotes')->where("item_id","=",85)->value('content'); //Mental Good
    $data9=DB::table('summernotes')->where("item_id","=",84)->value('content'); //Mental Bad
    @endphp
    @php
        $child = App\Child::where('childID', Auth::user()->currentChild)->first();
        $entries = App\Entries::where('childID', Auth::user()->currentChild)->orderBy('entryID', 'desc')->first();
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
    @endphp
    @php
        if ($childAge >= 5 && $childAge <= 8 )
    {
        $recommendedF="1.5 serves";
    }
    elseif($childAge > 8 && $childAge <= 12){
         $recommendedF = "2 serves";
    }
    @endphp

    @php
        $results = App\Results::where('childID', Auth::user()->currentChild)->orderBy('resultID', 'desc')->first();
        $child = App\Child::where('childID', Auth::user()->currentChild)->first();
        $fruits = $results->RfruitsIntake;
        $veggies = $results->RveggiesIntake;

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
    @endphp

    @php
        $results = App\Results::where('childID', Auth::user()->currentChild)->orderBy('resultID', 'desc')->first();
        $child = App\Child::where('childID', Auth::user()->currentChild)->first();
        $MentalScore = $results->MentalScore;
        

        if ($MentalScore == 0)
        {
          $MentalMessage = "Well Done!";
        }
        else
        {
          $MentalMessage = "Requires Attention!";
        }
    @endphp

    @if(!isset(Auth::user()->email))
        <script>window.location = "Login";</script>
    @endif

</head>
<body>
<p class="text-right">{{ $date }}</p>

<p>Dear {{ $pname }},</p>

<p>Thank you for completing {{ $cname }}’s lifestyle journey using the Healthy Start web-based app. As you know, this data is being collected to investigate whether the Healthy Start app is a good online tool for Australian families. Now our research team would also like to share the results of your child's lifestyle check based on the information you provided including your child weight, fruit and veggies intake, physical activity, screen time and sleep. The ideal parameters recommended by Australian Guidelines and your child results are described below:</p>

<table>
    <tr>
        <th style="padding:10px; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd; border-top: 1px solid #ddd; background-color: #f2f2f2">Test</th>
        <th style="padding:10px; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd; border-top: 1px solid #ddd; background-color: #f2f2f2">Result</th>
        <th style="padding:10px; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd; border-top: 1px solid #ddd; background-color: #f2f2f2">Goal</th>
        <th style="padding:10px; border-bottom: 1px solid #ddd; border-top: 1px solid #ddd; background-color: #f2f2f2">Action</th>
    </tr style="background-color:#b3d7ff">
        <td style="padding:10px; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd">Weight</td>
        <td style="padding:10px; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd">{{ $entries->BMI_v }}</td>
        <td style="padding:10px; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd">{{ $results->RBmi == 1 ? $data1 : ($results->RBmi == 0 ? $data1 : $data1) }}</td>
        <td style="padding:10px; border-bottom: 1px solid #ddd">{{ $results->RBmi == 0 ? $data1 : ($results->RBmi == 1 ? $data2 : $data3) }}</td>
    <tr>
    </tr style="background-color:#c1f0cc">
        <td style="padding:10px; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd">Fruit Intake</td>
        <td style="padding:10px; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd">{{ $entries->fruits }}</td>
        <td style="padding:10px; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd">{{ $recommendedF }}</td>
        <td style="padding:10px; border-bottom: 1px solid #ddd">{{ $results->RfruitsIntake == 0 ? $data1f : $data2f }}</td>
    <tr>
    </tr style="background-color:#c1f0cc">
        <td style="padding:10px; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd">Veggies Intake</td>
        <td style="padding:10px; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd">{{ $entries->veggies }}</td>
        <td style="padding:10px; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd">{{ $recommendedV }}</td>
        <td style="padding:10px; border-bottom: 1px solid #ddd">{{ $results->RveggiesIntake == 0 ? $data1v :  $data2v }}</td>
    <tr>
    </tr style="background-color:#f4bec3">
        <td style="padding:10px; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd">Exercise</td>
        <td style="padding:10px; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd">{{ date('H:i', strtotime($entries->exercise)) }}</td>
        <td style="padding:10px; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd">More than 1 hour</td>
        <td style="padding:10px; border-bottom: 1px solid #ddd">{{ $results->Rexercise == 0 ? $data1e : $data2e }}</td>
    <tr>
    </tr style="background-color:#bbeff7">
        <td style="padding:10px; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd">Screen Time (School Days)</td>
        <td style="padding:10px; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd">{{ $entries->screenTimeSD }}</td>
        <td style="padding:10px; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd">Less than 2 hours</td>
        <td style="padding:10px; border-bottom: 1px solid #ddd">{{ $results->RscreentimeSD == 0 ? $data1st : $data2st }}</td>
    <tr>
    </tr style="background-color:#bbeff7">
        <td style="padding:10px; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd">Screen Time (Weekend)</td>
        <td style="padding:10px; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd">{{ $entries->screenTimeNSD }}</td>
        <td style="padding:10px; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd">Less than 2 hours</td>
        <td style="padding:10px; border-bottom: 1px solid #ddd">{{ $results->RscreentimeNSD == 0 ? $data3st : $data4st }}</td>
    <tr>
    </tr style="background-color:#f7bbd7">
        <td style="padding:10px; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd">Sleep (School Days)</td>
        <td style="padding:10px; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd">{{ date('H:i', strtotime($entries->sleepSD)) }}</td>
        <td style="padding:10px; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd">Between 9 & 11 hours</td>
        <td style="padding:10px; border-bottom: 1px solid #ddd">{{ $results->RStimeSD == 0 ? $data1slp : ($results->RStimeSD == 1 ? $data2slp : $data5slp) }}</td>
    <tr>
    </tr style="background-color:#f7bbd7">
        <td style="padding:10px; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd">Sleep (Weekend)</td>
        <td style="padding:10px; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd">{{ date('H:i', strtotime($entries->sleepNSD)) }}</td>
        <td style="padding:10px; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd">Between 9 & 11 hours</td>
        <td style="padding:10px; border-bottom: 1px solid #ddd">{{ $results->RStimeNSD == 0 ? $data3slp : ($results->RStimeNSD == 1 ? $data4slp : $data6slp) }}</td>
    <tr>
    </tr style="background-color:#f7bbd7">
        <td style="padding:10px; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd">Mental Health</td>
        <td style="padding:10px; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd">{{(($results->MentalScore)) }}</td>
        <td style="padding:10px; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd">Score less than 13</td>
        <td style="padding:10px; border-bottom: 1px solid #ddd">{{ $results->MentalScore <= 13 ? $data8 : ($results->MentalScore >= 14 ? $data9 : $data9) }}</td>
    <tr>

    </tr>
</table>

<p>Please note that the Healthy Start app is not intended to be a substitute for advice from a health professional. If you are concerned about your child's growth or development, please see your child’ GP or local health professional. As mentioned to you earlier, no personal information from you or your child will be identifiable when we use the data.</p>

<p>We hope you enjoy your experience using our web-based app. If you have any positive or negative feedback, please contact us (healthy.start.app@gmail.com).</p>

<p>With good wishes,</p>
<p>Dr Amabile Borges Dario (On behalf of the research team)</p>
</body>
</html>