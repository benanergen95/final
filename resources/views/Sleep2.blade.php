@extends('layouts.app')
@section('navigation')
    @include ('layouts.navUser')
@endsection

@section('css')
    <link href="{{asset('/css/extra-sleep.css')}}?{{time()}}" rel="stylesheet" type="text/css">
@endsection

@section('pageStyle')
    .combodate {display:block}
    .combodate .form-control {display:inline-block}
@endsection

@section('content')
    @php
        $data=DB::table('summernotes')->where("item_id","=",74)->value('content');
        $data2=DB::table('summernotes')->where("item_id","=",75)->value('content');
        $data3=DB::table('summernotes')->where("item_id","=",76)->value('content');
    @endphp
    <!--Check if user is logged in-->
    @if(!isset(Auth::user()->email))
        <script>window.location = "Login";</script>
    @endif
    <div class="jumbotron bg-white rounded-bottom border border-secondary mx-2">
        <form method="post" action="{{url('StoreSleepNSD')}}">
            {{csrf_field()}}


            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="container text-center">
                <div class="row">
                    <div class="col align-self-center">
                        {!! $data !!}
                        <div class="form-group">
                            <input id="timeSleep" name="SleepTime" data-format="h:mm A" data-template="hh : mm A"
                                   data-custom-class="form-control">
                        </div>
                        {!! $data2 !!}

                        <div class="form-group">
                            <input id="timeWake" name="AwakeTime" data-format="h:mm A" data-template="hh : mm A"
                                   data-custom-class="form-control">
                        </div>

                        {!! $data3 !!}
                    </div>
                </div>
                <hr>
            </div>
            <!-- /END THE FEATURETTES -->
            <!-- /Start NAV Buttons -->
            <div class="av1">
                <form>
                    <button onclick="location.href = 'Sleep1'" type="button"
                            class="btn btn-outline-secondary btn-lg mr-5">Back
                    </button>
                    <input type="submit" value="Next" class="btn btn-primary btn-lg "></form>
            </div>
    </div><!-- /.container -->
@endsection
@section('script')
    <script>
        $('#timeSleep').combodate({
            value: "9:00 PM"
        });

        $('#timeWake').combodate({
            value: "7:00 AM"
        });

    </script>
@endsection