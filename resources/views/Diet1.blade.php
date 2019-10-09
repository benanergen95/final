@extends('layouts.app')
@section('navigation')
    @include ('layouts.navUser')
@endsection

@section('css')
    <link href="{{asset('/css/extra-diet.css')}}?{{time()}}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    @if(!isset(Auth::user()->email))
        <script>window.location = "Login";</script>
    @endif

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
        $data=DB::table('summernotes')->where("item_id","=",8)->value('content');  //diet 1 data from summernotes table
    @endphp
    <div class="jumbotron bg-white rounded-bottom border border-success mx-2">
        <form action="{{url('StoreFruits')}}" method="post">
            {{csrf_field()}}
            <div class="container text-center">
                <div class="row">
                    <div class="col align-self-center">
                        {!! $data !!}
                        <p><span id="fruitAmount" class="text-success"></span></p>
                        <input id="slider" type="number" data-slider-id='sliderID' data-slider-min="0"
                               data-slider-max="8"
                               data-slider-step="0.5" data-slider-value="3" name="fruits"/>
                    </div>
                </div>
                <hr>
            </div>
            <!-- /END THE FEATURETTES -->
            <!-- START of Nav Buttons -->
            <div class="av1">
                <button class="btn btn-outline-secondary btn-lg mr-5" type="button" onclick="location.href = 'Diet0'">
                    Back
                </button>
                <input type="submit" value="Next" class="btn btn-primary btn-lg ">
            </div>
        </form>
    </div>

@endsection
<!--Slider java script-->
@section('script')
    <script>
        var slider = new Slider('#slider', {
            formatter: function (value) {
                $('#fruitAmount').html(value);

                if (value == 8) {
                    $('#fruitAmount').html("More than 7");
                }
            }
        });
    </script>
@endsection