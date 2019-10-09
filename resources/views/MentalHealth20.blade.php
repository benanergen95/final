@extends('layouts.app')

@php
    use App\Results;  
    use App\Child;
@endphp
@section('navigation')
    @include ('layouts.navUser')
@endsection

@section('content')
    @if(!isset(Auth::user()->email))
        <script>window.location = "Login";</script>
    @endif

    @php
        
         $data1=DB::table('summernotes')->where("item_id","=",82)->value('content'); //message for normal
         $data2=DB::table('summernotes')->where("item_id","=",83)->value('content'); //message for not normal
         

             $results = App\Results::where('childID', Auth::user()->currentChild)->first();
             $child = App\Child::where('childID', Auth::user()->currentChild)->first();
             $MentalScore = $results->MentalScore;
           $MentalScore = (($results->MentalScore));

             if ($MentalScore <= 13)
             {
                 $MentalMessage = $data1;
                 $finalMessage = $child->CfName.",".$data1 ;
             }
             else
             {
                 $MentalMessage = $data2;
                 $finalMessage = $child->CfName.",".$data2;
             }
    @endphp
    
    <div class="jumbotron bg-white rounded-bottom border border-secondary mx-2">
        <h2 class="text-center">Mental Health</h2>
        <hr>
        <div class="container text-center">
            <div class="row">
                <div class="col align-self-center">
                    <h3 class="featurette-heading">Result<span class="text-muted"></span></h3>
                    <div class="row justify-content-center  text-white">
                        <div class="col-10 lead bg-secondary py-2"
                             style="background-color:#f4bec3">{{$MentalMessage}}</div>
                    </div>
                    <p class="lead">{{$finalMessage}}</p>

                    <div class="row justify-content-center  text-white">
                        <div class="col lead bg-secondary">Your child</div>
                        <div class="col lead bg-secondary">Recommended</div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col text-black lead  border border-secondary"
                             style="background-color:#e4e6e7">{{ $MentalScore}}
                        </div>
                        <div class="col text-black lead  border border-secondary" style="background-color:#e4e6e7">
                            Mental Health Score Less Than 13
                        </div>
                    </div>
                    <br>
                 
                </div>

            </div>
            <img src="/content/mentalhealth1.jpg">
            <hr>
        </div>
        <!-- /END THE FEATURETTES -->
        <!-- /Start NAV Buttons -->
        <div class="av1">
            <form>
                <button onclick="location.href = 'Tests'" type="button" class="btn btn-primary btn-lg ">Next</button>
                <button onclick="location.href = 'MentalHealth3'" type="button" class="btn btn-primary btn-lg ">Redo Test</button>
            </form>
        </div>
    </div><!-- /.container -->
    @endsection 