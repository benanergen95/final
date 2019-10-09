@extends('layouts.app')
@php
    use App\Child;
    use App\Entries;
    use App\User;
    use App\Results;
    

    $child = App\Child::where('childID', Auth::user()->currentChild)->first();
    $entries = App\Entries::where('childID', Auth::user()->currentChild)->first();
    $results = App\results::where('childID', Auth::user()->currentChild)->first();
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
<head>
<meta name="viewport" content="width=device-width, initial-scale=1"> 
</head>
    <div class="jumbotron bg-white rounded-top rounded-bottom border border-secondry mx-2">
     
        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                {{$message}}
            </div>
        @endif
        <h2 class="av1"><b>Follow {{$child->CfName}} {{$child->ClName}}'s Health Journey Below</b></h2>
        <div class="av1">
            <h5 class=""><b>Please Select a Test</b></h5>
        </div>
        <hr>
        <!--<div class="container">-->
     <!--  <div class="row no-gutters">
            @if (is_null($entries->height) || is_null($entries->weight) || is_null($entries->waist))
                <div class="col-2">
                    <a href="Weight0"  class="btn btn-primary btn-lg btn-block"><i
                                class="fas fa-weight"></i></a>
                </div>
                <div class="col">
                    <a href="Weight0"  class="btn btn-primary btn-lg btn-block">Weight</a>
                </div>
            @endif
            @if (isset($entries->height) && isset($entries->weight) && isset($entries->waist))
                <div class="col-2">
                    <a href="Weight4"  class="btn btn-primary btn-lg btn-block"><i
                                class="fas fa-weight"></i></a>
                </div>
                <div class="col-7">
                    <a href="Weight4" class="btn btn-primary btn-lg btn-block">Weight</a>
                </div>
                <div class="col-3">
                    <a href="Weight5" class="btn btn-outline-primary btn-lg btn-block">Tips</a>
                </div>
            @endif
        </div>
        <br>
        <div class="row no-gutters">

            @if (is_null($entries->fruits) || is_null($entries->veggies))
                <div class="col-2">
                    <a href="Diet0"  class="btn btn-success btn-lg btn-block"><i
                                class="fas fa-apple-alt"></i></a>
                </div>
                <div class="col">
                    <a href="Diet0"  class="btn btn-success btn-lg btn-block">Fruit & Veggies</a>
                </div>
            @endif

            @if (isset($entries->fruits) && isset($entries->veggies))
                <div class="col-2">
                    <a href="Diet3" class="btn btn-success btn-lg btn-block "><i
                                class="fas fa-apple-alt"></i></a>
                </div>
                <div class="col-7">
                    <a href="Diet3"  class="btn btn-success btn-lg btn-block ">Fruit & Veggies</a>
                </div>
                <div class="col-3">
                    <a href="Diet4" class="btn btn-outline-success btn-lg btn-block">Tips</a>
                </div>
            @endif
        </div>
        <br>
        <div class="row no-gutters">

            @if (is_null($entries->exercise))
                <div class="col-2">
                    <a href="Exercise0"  class="btn btn-danger btn-lg btn-block"><i
                                class="fas fa-walking"></i></a>
                </div>
                <div class="col">
                    <a href="Exercise0" class="btn btn-danger btn-lg btn-block">Exercise</a>
                </div>
            @endif
            @if (isset($entries->exercise))
                <div class="col-2">
                    <a href="Exercise2" class="btn btn-danger btn-lg btn-block "><i
                                class="fas fa-walking"></i></a>
                </div>
                <div class="col-7">
                    <a href="Exercise2"  class="btn btn-danger btn-lg btn-block ">Exercise</a>
                </div>
                <div class="col-3">
                    <a href="Exercise3"  class="btn btn-outline-danger btn-lg btn-block">Tips</a>
                </div>
            @endif
        </div>
        <br>
        <div class="row no-gutters">

            @if (is_null($entries->screenTimeSD) || is_null($entries->screenTimeNSD))
                <div class="col-2">
                    <a href="ScreenTime0"  class="btn btn-info btn-lg btn-block"><i class="fas fa-tv"></i></a>
                </div>
                <div class="col">
                    <a href="ScreenTime0"  class="btn btn-info btn-lg btn-block">Screen time</a>
                </div>
            @endif
            @if (isset($entries->screenTimeSD) && isset($entries->screenTimeNSD))
                <div class="col-2">
                    <a href="ScreenTime4"  class="btn btn-info btn-lg btn-block "><i class="fas fa-tv"></i></a>
                </div>
                <div class="col-7">
                    <a href="ScreenTime4"  class="btn btn-info btn-lg btn-block ">Screen time</a>
                </div>
                <div class="col-3">
                    <a href="ScreenTime5"  class="btn btn-outline-info btn-lg btn-block">Tips</a>
                </div>
            @endif
        </div>
        <br>
        <div class="row no-gutters">

            @if (is_null($entries->sleepSD) || is_null($entries->sleepNSD))
                <div class="col-2">
                    <a href="Sleep0"  class="btn btn-tears btn-lg btn-block"><i class="fas fa-bed"></i></a>
                </div>
                <div class="col">
                    <a href="Sleep0"  class="btn btn-tears btn-lg btn-block">Sleep</a>
                </div>
            @endif
            @if (isset($entries->sleepSD) && isset($entries->sleepNSD))
                <div class="col-2">
                    <a href="Sleep3"  class="btn btn-tears btn-lg btn-block "><i
                                class="fas fa-bed"></i></a>
                </div>
                <div class="col-7">
                    <a href="Sleep3"  class="btn btn-tears btn-lg btn-block ">Sleep</a>
                </div>
                <div class="col-3">
                    <a href="Sleep4"  class="btn btn-outline-tears btn-lg btn-block ">Tips</a>
                </div>
            @endif

            <br>
            <div class="row no-gutters">

            @if (is_null($entries->mentalhealth))
                <div class="col-2">
                    <a href="MentalHealth0"  class="btn btn-danger btn-lg btn-block"><i
                                class="fas fa-walking"></i></a>
                </div>
                <div class="col">
                    <a href="MentalHealth0" class="btn btn-danger btn-lg btn-block">Mental Healt</a>
                </div>
            @endif
            @if (isset($entries->mentalhealth))
                <div class="col-2">
                    <a href="MentalHealth0" class="btn btn-danger btn-lg btn-block "><i
                                class="fas fa-walking"></i></a>
                </div>
                <div class="col-7">
                    <a href="MentalHeath0"  class="btn btn-danger btn-lg btn-block ">Mental Health</a>
                </div>
                <div class="col-3">
                    <a href="MentalHealth0"  class="btn btn-outline-danger btn-lg btn-block">Tips</a>
                </div>
            @endif
        </div>
-->      



      <!-- new div class menu --->


<link rel="stylesheet" type="text/css" href="public/css/style.css">
    <menu>
        <ul>
        @if (is_null($entries->height) || is_null($entries->weight) || is_null($entries->waist))
          
      <td>  
      <li><a href="Weight0"><span class ="fas fa-weight" style="color:#9BC4E2"  data-toggle="tooltip" rel="tooltip" data-placement="top" title="Weight" ></span></a></li>      
 </td> 
            @endif
            @if (isset($entries->height) && isset($entries->weight) && isset($entries->waist)) 
         <td>  
          <li><a class="Weight" href="Weight4"><span class ="fas fa-weight" style="color:lime" data-toggle="tooltip" rel="tooltip" data-placement="top" title="Weight"></span></a></li>   
         
     
        </td>

            @endif
    
            @if (is_null($entries->fruits) || is_null($entries->veggies))
          
           <td> 
            <li><a class="Fruits" href="Diet0"><span class ="fas fa-apple-alt" style="color:#9BC4E2" data-toggle="tooltip" rel="tooltip" data-placement="top" title="Diet"></span></a></li>
           </td> 
            @endif
            @if (isset($entries->fruits) && isset($entries->veggies))
            <td>
            <li><a class="Fruits" href="Diet3"><span class ="fas fa-apple-alt" style="color:lime" data-toggle="tooltip" rel="tooltip" data-placement="top" title="Diet"></span></a></li>
            </td>
            
            @endif
    
            @if (is_null($entries->sleepSD) || is_null($entries->sleepNSD))
            <td>
            <li><a class="Sleep" href="Sleep0"><span class ="fas fa-bed" style="color:#9BC4E2" data-toggle="tooltip" rel="tooltip" data-placement="top" title="Sleep"></span></a></li>
            </td>
            @endif
            @if (isset($entries->sleepSD) && isset($entries->sleepNSD))
            <td>
            <li><a class="Sleep" href="Sleep3"><span class ="fas fa-bed" style="color:lime" data-toggle="tooltip" rel="tooltip" data-placement="top" title="Sleep"></span></a></li>
            </td>
            @endif
    
            @if (is_null($entries->screenTimeSD) || is_null($entries->screenTimeNSD))
            <td>
            <li><a class="Screentime" href="ScreenTime0"><span class ="fas fa-tv" style="color:#9BC4E2" data-toggle="tooltip" rel="tooltip" data-placement="top" title="Screen Time"></span></a></li>
            </td>
            @endif
            @if (isset($entries->screenTimeSD) && isset($entries->screenTimeNSD))
            <td>
            <li><a class="Screentime" href="ScreenTime4"><span class ="fas fa-tv" style="color:lime" data-toggle="tooltip" rel="tooltip" data-placement="top" title="Screen Time"></span></a></li>
            </td>
            @endif
    
            @if (is_null($results->MentalScore))
            <td>
            <li><a class="Mental" href="MentalHealth0"><span class ="fas fa-brain" style="color:#9BC4E2" data-toggle="tooltip" rel="tooltip" data-placement="top" title="Mental Health"></span></a></li>
            </td>
            @endif
            @if (isset($results->MentalScore))
           <td>
            <li><a class="Mental" href="MentalHealth20"><span class ="fas fa-brain" style="color:lime" data-toggle="tooltip" rel="tooltip" data-placement="top" title="Mental Health"></span></a></li>
            </td>
            @endif
    
            @if (is_null($entries->exercise))
           <td>
            <li><a class="Exercise" href="Exercise0"><span class ="fas fa-walking"  style="color:#9BC4E2"data-toggle="tooltip" rel="tooltip" data-placement="top" title="Exercise"></span></a></li>
            </td>
            @endif
            @if (isset($entries->exercise))
            <td>
            <li><a class="Exercise" href="Exercise2"><span class ="fas fa-walking" style="color:lime" data-toggle="tooltip" rel="tooltip" data-placement="top" title="Exercise"></span></a></li>
            </td>
            @endif
    <td>
            <li><a class="Tests" href="Tests"><span class ="fas fa-home" style="color:white" data-toggle="tooltip" rel="tooltip" data-placement="top" title="Home Menu"></span></a></li>
     </td>
        </ul>
</menu>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js">
    </script> 
    <div style="av1">   
<p class ="av1"><b>Once completing all tests, please view the "Tips" page above.</b></p>
<img src="/content/testlegend.jpg" width="250" height="175">
</div>


      <!-- progression bar -->
      
        <div class="">
            <p class="av1"><b>Your Progress </b></p>
            <div class="progress bg-white border border-dark">
                    <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" style="width: 16.66%"
                         aria-valuenow="16.66" aria-valuemin="0" aria-valuemax="100">1
                    </div>
                @if (isset($entries->fruits) && isset($entries->veggies))
                    <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" style="width: 16.66%"
                         aria-valuenow="16.66" aria-valuemin="0" aria-valuemax="100">2
                    </div>
                @endif
                @if (isset($entries->exercise))
                    <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" style="width: 16.66%"
                         aria-valuenow="16.66" aria-valuemin="0" aria-valuemax="100">3
                    </div>
                @endif
                @if (isset($entries->screenTimeSD) && isset($entries->screenTimeNSD))
                    <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" style="width: 16.66%"
                         aria-valuenow="16.66" aria-valuemin="0" aria-valuemax="100">4
                    </div>
                @endif
                @if (isset($entries->sleepSD) && isset($entries->sleepNSD))
                    <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" style="width: 16.66%"
                         aria-valuenow="16.66" aria-valuemin="0" aria-valuemax="100">5
                    </div>
                @endif
                @if (isset($results->MentalScore) && isset($results->MentalScore))
                    <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" style="width: 16.66%"
                         aria-valuenow="16.66" aria-valuemin="0" aria-valuemax="100">6
                    </div>
                @endif
            </div>


        </div>
    </div>
    </div>
@endsection