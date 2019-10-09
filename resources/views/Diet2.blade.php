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
    <div class="jumbotron bg-white rounded-bottom border bg-secondary mx-2">
        <form action="{{url('StoreVeggies')}}" method="post">
        {{csrf_field()}}
        <!-- Three columns of text below the carousel -->
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
                        @php
                            $data=DB::table('summernotes')->where("item_id","=",9)->value('content'); //diet 2 page data stored in html retrives from summernote table
                        @endphp
                        {!! $data !!}
                        <br>
                        <p>Serves of Vegetables: <span id="veggieAmount" class="text-success"></span></p>
                        <input id="slider" type="number" data-slider-id='sliderID' data-slider-min="0"
                               data-slider-max="8"
                               data-slider-step="0.5" data-slider-value="3" name="veggies"/>
                    </div>
                </div>
                <hr>
            </div>
            <!-- /END THE FEATURETTES -->
            <!--/Start NAV Buttons -->
            <div class="av1">
                <button class="btn btn-outline-secondary btn-lg mr-5 " type="button" onclick="location.href = 'Diet1'">
                    Back
                </button>
                <input type="submit" value="Next" class="btn btn-primary btn-lg ">
            </div>
        </form>
    </div>
    </div>
@endsection
@section('script')
    <!--Slider java script-->
    <script>
        var slider = new Slider('#slider', {
            formatter: function (value) {
                $('#veggieAmount').html(value);

                if (value == 8) {
                    $('#veggieAmount').html("More than 7");
                }
            }
        });

    </script>
@endsection