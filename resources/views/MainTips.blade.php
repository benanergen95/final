@extends('layouts.app')
@php
    use App\Child;
    use App\Entries;
    use App\User;
    use App\Results;
   
 
    $child = App\Child::where('childID', Auth::user()->currentChild)->first();
    $entries = App\Entries::where('childID', Auth::user()->currentChild)->first();
@endphp
 
 
 
 
 
 
@section('navigation')
    @if (Auth::user()->admin == 1)
        @include ('layouts.navAdmin')
    @else
        @include ('layouts.navUserHome')
    @endif
 
@endsection
 
 
 
@section('script')
    <link href="{{asset('/css/sticky-footer-navbar.css')}}?{{time()}}" rel="stylesheet">
   
@endsection
 
@section('content')
    <div class="jumbotron bg-white rounded-top rounded-bottom border border-secondry mx-2">
 
        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                {{$message}}
            </div>
        @endif
        <h2 class="av1"><b>Welcome to {{$child->CfName}} {{$child->ClName}}'s Health Tips</b></h2>
        <div class="av1">
            <h5 class=""><b>Please Select a Tip From The Health Segments Below</b></h5>
        </div>
        <hr>
 
@if(empty($entries->height) || empty($entries->weight) || empty($entries->waist) || is_null($entries->fruits) || is_null($entries->veggies) || empty($entries->exercise) || is_null($entries->screenTimeSD) || is_null($entries->screenTimeNSD) || empty($entries->sleepSD) || empty($entries->sleepNSD))
        <script>window.location = "ResultDenied";</script>
    @endif
 
    @section('script')
    <link href="{{asset('/css/sticky-footer-navbar.css')}}?{{time()}}" rel="stylesheet">
   
@endsection
 
<?php
// GETTING VALUE FOR MENTAL HEALTH
 
$child = App\Child::where('childID', Auth::user()->currentChild)->first();
$link = mysqli_connect("localhost", "root", "", "test");
$test = Auth::user()->currentChild;
 
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// WEIGHT
$RBmi = "SELECT RBmi FROM results WHERE childID = $test";
$resultss = mysqli_query($link,$RBmi);
$row = mysqli_fetch_array($resultss);
if ($row['RBmi'] == 2){
    $weight = 2;
} else if ($row['RBmi'] == 1){
    $weight = 2;
} else{
    $weight = 1;
}
 
// FRUIT & VEGGIES
$RfruitsIntake = "SELECT RfruitsIntake FROM results WHERE childID = $test";
$RveggiesIntake = "SELECT RveggiesIntake FROM results WHERE childID = $test";
$results2 = mysqli_query($link,$RfruitsIntake);
$results3 = mysqli_query($link,$RveggiesIntake);
$row2 = mysqli_fetch_array($results2);
$row3 = mysqli_fetch_array($results3);
 
if ($row2['RfruitsIntake'] == 0 && $row3['RveggiesIntake'] == 0){
    $food = 0;
} else{
    $food = 1;
}
 
// EXERCISE
$Rexercise = "SELECT Rexercise FROM results WHERE childID = $test";
$results4 = mysqli_query($link,$Rexercise);
$row4 = mysqli_fetch_array($results4);
 
if ($row4['Rexercise'] == 0){
    $exercise = 0;
}else if($Rexercise == 1){
    $exercie = 1;
}
 
// Screentime
$RscreentimeSD = "SELECT RscreentimeSD FROM results WHERE childID = $test";
$RscreentimeNSD = "SELECT RscreentimeNSD FROM results WHERE childID = $test";
$results5 = mysqli_query($link,$RscreentimeSD);
$row5 = mysqli_fetch_array($results5);
$results6 = mysqli_query($link,$RscreentimeNSD);
$row6 = mysqli_fetch_array($results6);
 
if ($row5['RscreentimeSD'] == 0 && $row6['RscreentimeNSD'] == 0){
    $screen = 0;
}else{
    $screen = 1;
}
 
// SLEEP
$RStimeSD = "SELECT RStimeSD FROM results WHERE childID = $test";
$RStimeNSD = "SELECT RStimeNSD FROM results WHERE childID = $test";
 
$results7 = mysqli_query($link,$RStimeSD);
$row7 = mysqli_fetch_array($results7);
$results8 = mysqli_query($link,$RStimeNSD);
$row8 = mysqli_fetch_array($results8);
 
if ($row7['RStimeSD'] == 0 && $row8['RStimeNSD'] == 0){
    $time = 0;
}else{
    $time = 1;
}
 
// MENTAL
$MentalScore = "SELECT MentalScore FROM results WHERE childID = $test";
$results9 = mysqli_query($link,$MentalScore);
$row9 = mysqli_fetch_array($results9);
if ($row9['MentalScore'] > 13){
    $mental = 1;
}else{
    $mental = 0;
}
 
 
// Close connection
mysqli_close($link);
?>
        <link rel="stylesheet" type="text/css" href="public/css/tipstyle.css">
        <head>
<meta name="viewport" content="width=device-width, initial-scale=1"> 
</head>
<menu>
    <ul>
       
        @if ($weight==2)
         
        <li><a href="WeightTips"><span class ="fas fa-weight" style="color:orange" data-toggle="tooltip" rel="tooltip" data-placement="top" title="Weight"></span></a></li>
       
        @endif
 
        @if ($weight==1)
         
        <li><a href="WeightTips"><span class ="fas fa-weight" style="color:lime" data-toggle="tooltip" rel="tooltip" data-placement="top" title="Weight"></span></a></li>
       
        @endif
 
        @if ($food==0)
       
        <li><a href="DietTips"><span class ="fas fa-apple-alt"  style="color:lime" data-toggle="tooltip" rel="tooltip" data-placement="top" title="Diet"></span></a></li>
       
        @endif
 
        @if ($food==1)
       
        <li><a href="DietTips"><span class ="fas fa-apple-alt" style="color:orange" data-toggle="tooltip" rel="tooltip" data-placement="top" title="Diet"></span></a></li>
       
        @endif
 
        @if ($time==0)
       
        <li><a href="SleepTips"><span class ="fas fa-bed" data-toggle="tooltip" style="color:lime" rel="tooltip" data-placement="top" title="Sleep"></span></a></li>
       
        @endif
 
        @if ($time==1)
       
        <li><a href="SleepTips"><span class ="fas fa-bed" style="color:orange" data-toggle="tooltip" rel="tooltip" data-placement="top" title="Sleep"></span></a></li>
       
        @endif
 
        @if ($screen==0)
       
        <li><a href="ScreenTimeTips"><span class ="fas fa-tv" data-toggle="tooltip" style="color:lime" rel="tooltip" data-placement="top" title="Screen Time"></span></a></li>
       
        @endif
 
        @if ($screen==1)
       
        <li><a href="ScreenTimeTips"><span class ="fas fa-tv" style="color:orange" data-toggle="tooltip" rel="tooltip" data-placement="top" title="Screen Time"></span></a></li>
       
        @endif
 
        @if ($mental==0)
       
       <li><a href="MentalHealth2"><span class ="fas fa-brain" data-toggle="tooltip" style="color:lime" rel="tooltip" data-placement="top" title="Mental Health"></span></a></li>
       
       @endif
 
        @if ($mental==1)
       
        <li><a href="MentalHealth2"><span class ="fas fa-brain" style="color:orange" data-toggle="tooltip" rel="tooltip" data-placement="top" title="Mental Health"></span></a></li>
       
        @endif
 
        @if ($exercise==0)
       
        <li><a href="ExerciseTips"><span class ="fas fa-walking" data-toggle="tooltip" style="color:lime"  rel="tooltip" data-placement="top" title="Exercise"></span></a></li>
       
        @endif
 
        @if ($exercise==1)
       
        <li><a href="ExerciseTips"><span class ="fas fa-walking" style="color:orange" data-toggle="tooltip" rel="tooltip" data-placement="top" title="Exercise"></span></a></li>
       
        @endif
       
        <li><a href="Tests"><span class ="fas fa-home" data-toggle="tooltip" rel="tooltip" data-placement="top" title="Home Menu"></span></a></li>
       
    </ul>
</menu>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js">
</script>    
<img src="/content/tipslegend.jpg" width="250" height="175">
@endsection