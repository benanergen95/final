@extends('layouts.app')
@section('navigation')
    @include ('layouts.navUser')
@endsection

@section('css')
    <link href="{{asset('/css/extra-sedentary.css')}}?{{time()}}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    @if(!isset(Auth::user()->email))
        <script>window.location = "Login";</script>
    @endif
    <div class="jumbotron bg-white rounded-bottom border border-secondary mx-2">
        <form method="post" action="{{url('StoreScreenSD')}}">
            {{csrf_field()}}
            <div>
            </div>

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
                $data=DB::table('summernotes')->where("item_id","=",14)->value('content');
                $data2=DB::table('summernotes')->where("item_id","=",15)->value('content');

            @endphp
            <div class="container text-center">
                <div class="row">
                    <div class="col align-self-center">
                        {!! $data !!}
                        <p class="text-center">
                            <a class="btn btn-primary btn-lg" data-toggle="collapse" href="#collapseExample" role="button"
                               aria-expanded="false">
                                Click Here To see Activity List
                            </a>
                        </p>
                        <div class="collapse" id="collapseExample">
                            <div class=" card-body">
                                {!! $data2 !!}
                            </div>

                        </div>

                        <!-- Slider -->
                        <div class="pt-3">
                            <input id="slider" type="number" data-slider-id='sliderID' data-slider-min="0"
                                   data-slider-max="10" data-slider-step="0.5" data-slider-value="3" name="screenSD"/>
                        </div>

                        <p>Number of hours: <span id="days" class="text-info"></span></p>

                        <img id="sedentaryPic0" class="img-fluid"
                             src="{{asset('/content/Sedentary0.png')}}?{{time()}}" alt="Generic placeholder image"
                             style="display: none; margin:0 auto;">
                        <img id="sedentaryPic1" class="img-fluid"
                             src="{{asset('/content/Sedentary1.png')}}?{{time()}}" alt="Generic placeholder image"
                             style="display: none; margin:0 auto;">
                        <img id="sedentaryPic2" class="img-fluid"
                             src="{{asset('/content/Sedentary2.png')}}?{{time()}}" alt="Generic placeholder image"
                             style="margin:0 auto;">
                        <img id="sedentaryPic3" class="img-fluid"
                             src="{{asset('/content/Sedentary3.png')}}?{{time()}}" alt="Generic placeholder image"
                             style="display: none; margin:0 auto;">
                    </div>
                </div>

                <hr>

            </div>
            <!-- /END THE FEATURETTES -->
            <!-- /Start NAV Buttons -->
            <div class="av1">
                <form>
                    <button onclick="location.href = 'ScreenTime1'" type="button"
                            class="btn btn-outline-secondary btn-lg mr-5">Back
                    </button>
                    <input type="submit" value="Next" class="btn btn-primary btn-lg ">

            </div><!-- /.container -->
        </form>
    </div>
@endsection

@section ('script')
    <script>
        var x = "";


        var slider = new Slider('#slider', {
            formatter: function (value) {
                $('#days').html(value);
                hideImage();

                if (value >= 0 && value < 2.5) {
                    document.getElementById('sedentaryPic0').style.display = "block";
                }
                else if (value >= 2.5 && value < 6) {
                    document.getElementById('sedentaryPic1').style.display = "block";
                }
                else if (value >= 6 && value < 9) {
                    document.getElementById('sedentaryPic2').style.display = "block";
                }
                else {
                    document.getElementById('sedentaryPic3').style.display = "block";
                }
            }
        });

        function hideImage() {
            for (i = 0; i < 4; i++) {
                document.getElementById('sedentaryPic' + i).style.display = 'none';
            }
        }


    </script>
@endsection