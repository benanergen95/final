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
    <div class="jumbotron bg-white rounded-bottom border border-secondary mx-2">
        <form method="post" action="{{url('StoreSleepSD')}}">
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
            @php
                $data=DB::table('summernotes')->where("item_id","=",71)->value('content');
                $data2=DB::table('summernotes')->where("item_id","=",72)->value('content');
                $data3=DB::table('summernotes')->where("item_id","=",73)->value('content');
            @endphp
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

                        <img id="sleepPic1-1" class="img-fluid"
                             src="{{asset('/content/Sleep-Question1.jpg')}}?{{time()}}" alt="Generic placeholder image"
                             width="600">
                    </div>
                </div>
                <hr>
            </div>
            <!-- /END THE FEATURETTES -->
            <!-- /Start NAV Buttons -->
            <div class="av1">
                <button onclick="location.href = 'Sleep0'" type="button" class="btn btn-outline-secondary btn-lg mr-5">
                    Back
                </button>
                <input type="submit" value="Next" class="btn btn-primary btn-lg">
            </div>
        </form>
    </div>
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