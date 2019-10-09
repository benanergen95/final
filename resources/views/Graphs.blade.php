@extends('layouts.app')
@php
    use App\Child;
    use App\Entries;
    use App\User;
    use App\Results;

    $entriesCount = App\Entries::where('childID', Auth::user()->currentChild)->count();
    $entryNumber = [];
    $Results = App\Results::where('childID', Auth::user()->currentChild)->count();
    $i = 0;
    while (count($entryNumber) <= $entriesCount || count($entryNumber) < 6)
    {
        array_push($entryNumber, $i);
        $i++;
    }

    $bmi = App\Entries::where('childID', Auth::user()->currentChild)->pluck('BMI_v')->toArray();
    array_unshift($bmi, null);
    while (count($bmi) < 6)
    {
        array_push($bmi, null);
    }
    $bmiUpperRange = [];
    while(count($bmiUpperRange) <= $entriesCount || count($bmiUpperRange) < 6)
    {
        array_push($bmiUpperRange, 0.99);
    }
    $bmiLowerRange = [];
    while(count($bmiLowerRange) <= $entriesCount || count($bmiLowerRange) < 6)
    {
        array_push($bmiLowerRange, -1.99);
    }

    $child = App\Child::where('childID', Auth::user()->currentChild)->first();
    $childAge=$child->age;
    $childGender=$child->sex;
    if ($childAge >= 5 && $childAge <= 8 )
    {
        $recommendedV = 4.5;
    }
    elseif ($childGender == "Male" && $childAge == 12)
    {
        $recommendedV = 5.5;
    }
    elseif ($childGender == "Female" && $childAge == 12)
    {
        $recommendedV = 5;
    }
    elseif($childAge > 8 && $childAge < 12)
    {
        $recommendedV = 5;
    }
    
    if ($childAge >= 5 && $childAge <= 8 )
    {
        $recommendedF = 1.5;
    }
    elseif($childAge > 8 && $childAge <= 12)
    {
        $recommendedF = 2;
    }
    $fruits = App\Entries::where('childID', Auth::user()->currentChild)->pluck('fruits')->toArray();
    array_unshift($fruits, null);
    while (count($fruits) < 6)
    {
        array_push($fruits, null);
    }
    $rFruits = [];
    while(count($rFruits) <= $entriesCount || count($rFruits) < 6)
    {
        array_push($rFruits, $recommendedF);
    }
    $veggies = App\Entries::where('childID', Auth::user()->currentChild)->pluck('veggies')->toArray();
    array_unshift($veggies, null);
    while (count($veggies) < 6)
    {
        array_push($veggies, null);
    }
    $rVeggies = [];
    while(count($rVeggies) <= $entriesCount || count($rVeggies) < 6)
    {
        array_push($rVeggies, $recommendedV);
    }

    $exercise = App\Entries::where('childID', Auth::user()->currentChild)->pluck('exercise')->toArray();
    $rExercise = [];
    while(count($rExercise) <= $entriesCount || count($rExercise) < 6)
    {
        array_push($rExercise, 60);
    }
    $duration = [];
    for ($i = 0; $i < $entriesCount; $i++)
    {
        $value = decimal($exercise[$i]);
        array_push($duration, $value*60);
    }
    array_unshift($duration, null);
    while (count($duration) < 6)
    {
        array_push($duration, null);
    }

    $screenTimeSD = App\Entries::where('childID', Auth::user()->currentChild)->pluck('screenTimeSD')->toArray();
    $screenTimeNSD = App\Entries::where('childID', Auth::user()->currentChild)->pluck('screenTimeNSD')->toArray();
    array_unshift($screenTimeSD, null);
    while (count($screenTimeSD) < 6)
    {
        array_push($screenTimeSD, null);
    }
    array_unshift($screenTimeNSD, null);
    while (count($screenTimeNSD) < 6)
    {
        array_push($screenTimeNSD, null);
    }
    $rScreenTime = [];
    while(count($rScreenTime) <= $entriesCount || count($rScreenTime) < 6)
    {
        array_push($rScreenTime, 2);
    }

    $sleepSD = App\Entries::where('childID', Auth::user()->currentChild)->pluck('sleepSD')->toArray();
    $sleepNSD = App\Entries::where('childID', Auth::user()->currentChild)->pluck('sleepNSD')->toArray();
    $durationSD = [];
    for ($i = 0; $i < $entriesCount; $i++)
    {
        $value = decimal($sleepSD[$i]);
        array_push($durationSD, $value);
    }
    $durationNSD = [];
    for ($i = 0; $i < $entriesCount; $i++)
    {
        $value = decimal($sleepNSD[$i]);
        array_push($durationNSD, $value);
    }
    array_unshift($durationSD, null);
    while (count($durationSD) < 6)
    {
        array_push($durationSD, null);
    }
    array_unshift($durationNSD, null);
    while (count($durationNSD) < 6)
    {
        array_push($durationNSD, null);
    }
    $rSleepMax = [];
    while(count($rSleepMax) <= $entriesCount || count($rSleepMax) < 6)
    {
        array_push($rSleepMax, 11);
    }
    $rSleepMin = [];
    while(count($rSleepMin) <= $entriesCount || count($rSleepMin) < 6)
    {
        array_push($rSleepMin, 9);
    }

    function decimal($time)
    {
        $hms = explode(":", $time);
        return ($hms[0] + ($hms[1] / 60));
    }

    $MentalScore = App\Results::where('childID', Auth::user()->currentChild)->pluck('MentalScore')->toArray();
    $MentalScore = [];
    while(count($MentalScore) <= $Results || count($MentalScore) < 13)
    {
        array_push($MentalScore, 13);
    }
@endphp



@if(!isset(Auth::user()->email))
    <script>window.location = "Login";</script>
@endif

@section('navigation')
    @include ('layouts.navUser')
@endsection

@section('script')
    <link href="{{asset('/css/sticky-footer-navbar.css')}}?{{time()}}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script>
        var entryNumber = {!! json_encode($entryNumber) !!};
        var bmi = {!! json_encode($bmi) !!};
        var bmiUpper = {!! json_encode($bmiUpperRange) !!};
        var bmiLower = {!! json_encode($bmiLowerRange) !!};
        var fruits = {!! json_encode($fruits) !!};
        var rFruits = {!! json_encode($rFruits) !!};
        var veggies = {!! json_encode($veggies) !!};
        var rVeggies = {!! json_encode($rVeggies) !!};
        var duration = {!! json_encode($duration) !!};
        var rExercise = {!! json_encode($rExercise) !!};
        var screenTimeSD = {!! json_encode($screenTimeSD) !!};
        var screenTimeNSD = {!! json_encode($screenTimeNSD) !!};
        var rScreenTime = {!! json_encode($rScreenTime) !!};
        var durationSD = {!! json_encode($durationSD) !!};
        var durationNSD = {!! json_encode($durationNSD) !!};
        var rSleepMax = {!! json_encode($rSleepMax) !!};
        var rSleepMin = {!! json_encode($rSleepMin) !!};
        var MentalScore = {!! json_encode($MentalScore) !!};
    </script>
    <script src="{{asset('/js/graphs.js')}}" type="text/javascript"></script> 
@endsection


@section('pageStyle')
    .graphs {
        height: 50vh; 
    }
    .goal {
        color: red;
        font-size: 14px;
    }
@endsection

@section('content')
    @if(!isset(Auth::user()->email))
        <script>window.location = "Login";</script>
    @endif


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
        <h2 class="text-center">Graphs<span class="text-muted"></span></h2>
        <hr>
        <div>
        <h3 class="text-left">Body Mass Index</h3>
        <p class="goal">GOAL: To stay <b>WITHIN</b> the green lines.</p>
        <div class="graphs">
                <canvas id="chart1"></canvas>
        </div>
            <br>
            <hr>
        <h3 class="text-left">Fruit</h3>
        <p class="goal">GOAL: To stay <b>ABOVE</b> the red line.</p>
        <div class="graphs">    
                <canvas id="chart2"></canvas>
        </div>
            <br>
            <hr>
        <h3 class="text-left">Vegetables</h3>
        <p class="goal">GOAL: To stay <b>ABOVE</b> the red line.</p>
        <div class="graphs">    
                <canvas id="chart3"></canvas>
        </div>
            <br>
            <hr>
        <h3 class="text-left">Exercise</h3>
        <p class="goal">GOAL: To stay <b>ABOVE</b> the red line.</p>
        <div class="graphs">    
                <canvas id="chart4"></canvas>
        </div>
            <br>
            <hr>
        <h3 class="text-left">Screen Time</h3>
        <p class="goal">GOAL: To stay <b>BELOW</b> the red line.</p>
        <div class="graphs">
                <canvas id="chart5"></canvas>
        </div>
            <br>
            <hr>
        <h3 class="text-left">Sleep</h3>
        <p class="goal">GOAL: To stay <b>WITHIN</b> the green lines.</p>
        <div class="graphs">
                <canvas id="chart6"></canvas>
            </div>
        </div>

        <h3 class="text-left">Mental Health</h3>
        <p class="goal">GOAL: To stay <b>WITHIN</b> the green lines.</p>
        <div class="graphs">
                <canvas id="chart7"></canvas>
            </div>
        </div>
   
        <br>

        <hr>
        <div class="av1">
            <!-- Button trigger modal -->
            <a href="OverallResults" class="btn btn-primary">Back</a>
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
                    <button value="submit" type="submit" class="btn btn-success">Send Results</button>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection