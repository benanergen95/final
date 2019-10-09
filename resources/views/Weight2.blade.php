@extends('layouts.app')
@section('navigation')
    @include ('layouts.navUser')
@endsection
@section('content')
    @if(!isset(Auth::user()->email))
        <script>window.location = "Login";</script>
    @endif
@section('content')
    <div class="jumbotron bg-white rounded-top rounded-bottom border border-secondry mx-2">
        <form method="post" action="{{url('StoreHeight')}}">
            {{csrf_field()}}
            <div class="text-center">
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div>
            @php
                $data=DB::table('summernotes')->where("item_id","=",4)->value('content');
            @endphp
            {!! $data !!}
            <div class="">
                <!-- picture here if not good up top.-->
                <input class="form-control" name="height" type="text"
                       placeholder="Enter Child hight here in centimeters.">
            </div>
            <hr>
            <div class="av1">
                <form>
                    <button onclick="location.href = 'Weight1'" type="button"
                            class="btn btn-outline-secondary btn-lg mr-5">Back
                    </button>
                    <input type="submit" value="Next" class="btn btn-primary btn-lg ">

                </form>
            </div>
    </div>
    </form>
    </div>


@endsection