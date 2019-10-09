@extends('layouts.app')
@section('navigation')
    @include ('layouts.navUser')
@endsection

@section('css')
    <link href="{{asset('/css/extra-physical.css')}}?{{time()}}" rel="stylesheet" type="text/css">
@endsection

@section('pageStyle')
    .combodate {display:block}
    .combodate .form-control {display:inline-block}
@endsection


@section('content')
    @if(!isset(Auth::user()->email))
        <script>window.location = "Login";</script>
    @endif
    <div class="jumbotron bg-white rounded-bottom border bg-secondary mx-2">
        <form method="post" action="{{url('StoreExercise')}}">
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
                        @php
                            $data=DB::table('summernotes')->where("item_id","=",11)->value('content');
                            $data2=DB::table('summernotes')->where("item_id","=",18)->value('content');
                        @endphp
                        {!! $data !!}

                        <input type="text" id="time" name="time" data-format="HH:mm" data-template="HH : mm"
                               name="datetime" data-custom-class="form-control">
                        <br>
                        {!! $data2 !!}
                        <hr>
                    </div>
                </div>

            </div>
            <!-- /END THE FEATURETTES -->
            <div class="av1">
                <button onclick="location.href = 'Exercise0'" type="button"
                        class="btn btn-outline-secondary btn-lg mr-5">Back
                </button>
                <input type="submit" value="Next" class="btn btn-primary btn-lg ">

            </div>
        </form>
    </div><!-- /.container -->
@endsection
@section('script')
    <script>
        $(function () {
            $('#time').combodate({
                firstItem: 'name', //show 'hour' and 'minute' string at first item of dropdown
                minuteStep: 1
            });
        });
    </script>
@endsection