@extends('layouts.app')
@php
    use App\Child;
    use App\Entries;
    use App\User;
    use App\Results;
 
    $entries = App\Entries::where('childID', Auth::user()->currentChild)->orderBy('entryID', 'desc')->first();
    $results = App\Results::where('childID', Auth::user()->currentChild)->orderBy('resultID', 'desc')->first();
    $child = App\Child::where('childID', Auth::user()->currentChild)->first();
 
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
 
 
@if(!isset(Auth::user()->email))
    <script>window.location = "Login";</script>
@endif
 
 
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
@section('navigation')
    @include ('layouts.navUser')
@endsection
 
@section('script')
    <link href="{{asset('/css/sticky-footer-navbar.css')}}?{{time()}}" rel="stylesheet">
@endsection
 
@section('content')
    @if(!isset(Auth::user()->email))
        <script>window.location = "Login";</script>
    @endif
 
 
    <!--Check if all questionnaire has been answered-->
    @if(empty($entries->height) || empty($entries->weight) || empty($entries->waist) || is_null($entries->fruits) || is_null($entries->veggies) || empty($entries->exercise) || is_null($entries->screenTimeSD) || is_null($entries->screenTimeNSD) || empty($entries->sleepSD) || empty($entries->sleepNSD))
        <script>window.location = "ResultDenied";</script>
    @endif
    <!---->
 
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
 
if ($row2['RfruitsIntake'] == 0){
    $food = 0;
} else{
    $food = 1;
}
 
if ($row3['RveggiesIntake'] == 0){
    $veggie = 0;
} else{
    $veggie = 1;
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
 
if ($row5['RscreentimeSD'] == 0){
    $screen = 0;
}else{
    $screen = 1;
}
 
if ($row6['RscreentimeNSD'] == 0){
    $screen2 = 0;
}else{
    $screen2 = 1;
}
 
// SLEEP
$RStimeSD = "SELECT RStimeSD FROM results WHERE childID = $test";
$RStimeNSD = "SELECT RStimeNSD FROM results WHERE childID = $test";
 
$results7 = mysqli_query($link,$RStimeSD);
$row7 = mysqli_fetch_array($results7);
$results8 = mysqli_query($link,$RStimeNSD);
$row8 = mysqli_fetch_array($results8);
 
if ($row7['RStimeSD'] == 0){
    $time = 0;
}else{
    $time = 1;
}
 
if ($row8['RStimeNSD'] == 0){
    $time2 = 0;
}else{
    $time2 = 1;
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
 
    <div class="jumbotron bg-white rounded-top rounded-bottom border border-secondry mx-2">
        @if ($successMessage = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">
                </button>
                {{$successMessage}}
            </div>
        @endif
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">
                </button>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h2 class="text-center">Results<span class="text-muted"></span></h2>
 
        <hr>
        <h3 class="text-center">{{$child->CfName}}'s results</h3>
        <div class="parMain">
            <div class="row text-white">
                <div class="col-3 lead bg-secondary text-center">Test</div>
                <div class="col-3 lead bg-secondary text-center">Result</div>
                <div class="col-3 lead bg-secondary text-center">Goal</div>
                <div class="col-3 lead bg-secondary text-center">Action</div>
            </div>
           
            <div class="row justify-content-center">
                <!-- Weight result-->
                <div class="col-3 text-black lead border border-secondary" style="background-color:#C0C0C0; font-size:1rem" ><img class="fas fa-weight"> Weight</div>                
               <div class="col-3 text-black lead  border border-secondary" style="background-color:#C0C0C0; font-size:1rem">{{  $entries->BMI_v}}</div>
               <div class="col-3 text-black lead  border border-secondary" style="background-color:#C0C0C0; font-size:1rem">between -1.99 & 0.99</div>
               @if ($weight==2)
               <div class="col-3 text-black lead  border border-secondary" style="background-color:orange; font-size:1rem">{{  $results->RBmi == 1 ? $data2 : ($results->RBmi == 0 ? $data1 : $data3) }}</div>
               @endif
 
               @if ($weight==1)
               <div class="col-3 text-black lead  border border-secondary" style="background-color:lime; font-size:1rem">{{  $results->RBmi == 1 ? $data2 : ($results->RBmi == 0 ? $data1 : $data3) }}</div>
               @endif
            </div>
 
                <!--Fruit & Veggies result -->
         
            <div class="row justify-content-center">
                <div class="col-3 text-black lead border border-secondary" style="background-color:#DCDCDC; font-size:1rem"><img class="fas fa-apple-alt"> Fruits</div>
                <div class="col-3 text-black lead  border border-secondary" style="background-color:#DCDCDC; font-size:1rem">{{  $entries->fruits}}</div>
                <div class="col-3 text-black lead  border border-secondary" style="background-color:#DCDCDC; font-size:1rem">{{ $recommendedF }}</div>    
                @if ($food==0)
                <div class="col-3 text-black lead  border border-secondary" style="background-color:lime; font-size:1rem">{{  $results->RfruitsIntake == 0 ? $data1f : $data2f }}</div>
                @endif
                @if ($food==1)
                <div class="col-3 text-black lead  border border-secondary" style="background-color:orange; font-size:1rem">{{  $results->RfruitsIntake == 0 ? $data1f : $data2f }}</div>
                @endif            
            </div>
 
            <div class="row justify-content-center">
                <div class="col-3 text-black lead border border-secondary" style="background-color:#DCDCDC; font-size:1rem"><img class="fas fa-apple-alt"> Veggies</div>
                <div class="col-3 text-black lead  border border-secondary" style="background-color:#DCDCDC; font-size:1rem">{{  $entries->veggies}}</div>
                <div class="col-3 text-black lead  border border-secondary" style="background-color:#DCDCDC; font-size:1rem">{{ $recommendedV }}</div>
                @if ($veggie==0)
                <div class="col-3 text-black lead  border border-secondary" style="background-color:lime; font-size:1rem">{{  $results->RveggiesIntake == 0 ? $data1v :  $data2v }}</div>
                @endif
                @if ($veggie==1)
                <div class="col-3 text-black lead  border border-secondary" style="background-color:orange; font-size:1rem">{{  $results->RveggiesIntake == 0 ? $data1v :  $data2v }}</div>
                @endif
            </div>
       
        <!-- Exercise result-->
            <div class="row justify-content-center">
                <div class="col-3 text-black lead border border-secondary" style="background-color:#C0C0C0; font-size:1rem"><img class="fas fa-walking"> Exercise</div>
                <div class="col-3 text-black lead  border border-secondary" style="background-color:#C0C0C0; font-size:1rem">{{date('H:i', strtotime($entries->exercise))}}</div>
                <div class="col-3 text-black lead  border border-secondary" style="background-color:#C0C0C0; font-size:1rem">More than 1 hour</div>      
                @if ($exercise==0)
                <div class="col-3 text-black lead  border border-secondary" style="background-color:lime; font-size:1rem">{{  $results->Rexercise == 0 ? $data1e : $data2e }}</div>
                @endif
                @if ($exercise==1)
                <div class="col-3 text-black lead  border border-secondary" style="background-color:orange; font-size:1rem">{{  $results->Rexercise == 0 ? $data1e : $data2e }}</div>
                @endif
            </div>
 
        <!-- Screen time result-->
            <div class="row justify-content-center">
                <div class="col-3 text-black lead border border-secondary" style="background-color:#DCDCDC; font-size:1rem"><img class="fas fa-tv"> School Days</div>
                <div class="col-3 text-black lead  border border-secondary" style="background-color:#DCDCDC; font-size:1rem">{{  $entries->screenTimeSD}}</div>
                <div class="col-3 text-black lead  border border-secondary" style="background-color:#DCDCDC; font-size:1rem"> Less than 2 hours</div>    
                @if ($screen==0)
                <div class="col-3 text-black lead  border border-secondary" style="background-color:lime; font-size:1rem">{{  $results->RscreentimeSD == 0 ? $data1st : $data2st }}</div>
                @endif
                @if ($screen==1)
                <div class="col-3 text-black lead  border border-secondary" style="background-color:orange; font-size:1rem">{{  $results->RscreentimeSD == 0 ? $data1st : $data2st }}</div>
                @endif
            </div>
            <div class="row justify-content-center">
                <div class="col-3 text-black lead border border-secondary" style="background-color:#DCDCDC; font-size:1rem"><img class="fas fa-tv"> Weekends</div>
                <div class="col-3 text-black lead  border border-secondary" style="background-color:#DCDCDC; font-size:1rem">{{  $entries->screenTimeNSD}}</div>
                <div class="col-3 text-black lead  border border-secondary" style="background-color:#DCDCDC; font-size:1rem"> Less than 2 hours</div>
                @if ($screen2==0)
                <div class="col-3 text-black lead  border border-secondary" style="background-color:lime; font-size:1rem">{{  $results->RscreentimeNSD == 0 ? $data3st : $data4st }}</div>
                @endif    
                @if ($screen2==1)
                <div class="col-3 text-black lead  border border-secondary" style="background-color:orange; font-size:1rem">{{  $results->RscreentimeNSD == 0 ? $data3st : $data4st }}</div>
                @endif  
            </div>
            <!-- Sleep result-->
            <div class="row justify-content-center">
                <div class="col-3 text-black lead border border-secondary" style="background-color:#C0C0C0; font-size:1rem"><img class="fas fa-bed"> School Days</div>
                <div class="col-3 text-black lead  border border-secondary" style="background-color:#C0C0C0; font-size:1rem">{{ date('H:i', strtotime($entries->sleepSD))}}</div>
                <div class="col-3 text-black lead  border border-secondary" style="background-color:#C0C0C0; font-size:1rem">Between 9 & 11 hours</div>
                @if ($time==0)
                <div class="col-3 text-black lead  border border-secondary" style="background-color:lime; font-size:1rem">{{  $results->RStimeSD == 0 ? $data1slp : ($results->RStimeSD == 1 ? $data2slp : $data5slp) }}</div>
                @endif
                @if ($time==1)
                <div class="col-3 text-black lead  border border-secondary" style="background-color:orange; font-size:1rem">{{  $results->RStimeSD == 0 ? $data1slp : ($results->RStimeSD == 1 ? $data2slp : $data5slp) }}</div>
                @endif
            </div>
            <div class="row justify-content-center">
                <div class="col-3 text-black lead border border-secondary" style="background-color:#C0C0C0; font-size:1rem"><img class="fas fa-bed"> Weekends</div>
                <div class="col-3 text-black lead  border border-secondary" style="background-color:#C0C0C0; font-size:1rem">{{ date('H:i', strtotime($entries->sleepNSD))}}</div>
                <div class="col-3 text-black lead  border border-secondary" style="background-color:#C0C0C0; font-size:1rem">Between 9 & 11 hours</div>
                @if ($time2==0)
                <div class="col-3 text-black lead  border border-secondary" style="background-color:lime; font-size:1rem">{{  $results->RStimeNSD == 0 ? $data3slp : ($results->RStimeNSD == 1 ? $data4slp : $data6slp) }}</div>    
                @endif
                @if ($time2==1)
                <div class="col-3 text-black lead  border border-secondary" style="background-color:orange; font-size:1rem">{{  $results->RStimeNSD == 0 ? $data3slp : ($results->RStimeNSD == 1 ? $data4slp : $data6slp) }}</div>    
                @endif
            </div>
    </div>
        <br>
 
        <hr>
        <div class="av1">
            <!-- Button trigger modal -->
            <button style="margin-top: 10px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Email Results
            </button>
            <a style="margin-top: 10px;" href="Graphs" class="btn btn-primary">Graphs</a>
            <a style="margin-top: 10px;" href="ChildRegistration" class="btn btn-primary">Start New Child</a>
            <a style="margin-top: 10px;" href="toTests" class="btn btn-primary">New Tests</a>
            <hr>
            <a style="margin-top: 10px;" href="Tests" class="btn btn-primary">Home</a>
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
 
                    <form action="{{url('send')}}">
                        <div class="row justify-content-center">
                            <button value="submit" type="submit" class="btn btn-primary btn-sm">Use my account Email
                            </button>
                        </div>
                    </form>
 
 
                    <form action="{{url('csend')}}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Or alternatively enter the email address you would like to
                                send the results to.</label>
                            <input type="email" class="form-control" id="email" name="email"
                                   aria-describedby="emailHelp" placeholder="Email@domain.com">
                        </div>
 
 
                </div>
                <div class="modal-footer">
                    <button value="submit" type="submit" class="btn btn-primary">Send Results</button>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection