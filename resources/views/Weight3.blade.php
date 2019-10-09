@extends('layouts.app')
@section('navigation')
    @include ('layouts.navUser')
@endsection

@section('content')
    @if(!isset(Auth::user()->email))
        <script>window.location = "Login";</script>
    @endif
@section('content')
    <form method="post" action="{{url('StoreWeight')}}">
        {{csrf_field()}}
        <div class="jumbotron bg-white rounded-top rounded-bottom border border-secondry mx-2">
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
                $data=DB::table('summernotes')->where("item_id","=",5)->value('content');
            @endphp
            {!! $data !!}
            <input class="form-control" name="weight" type="text" placeholder="Enter Childs Weight here in Kilograms.">
            <br>
            <div class="av1">
                <button onclick="location.href = 'Weight2'" type="button" class="btn btn-outline-secondary btn-lg mr-5">
                    Back
                </button>
                <!-- Button trigger modal -->
                <input type="submit" value="Next" class="btn btn-primary btn-lg">

                <!--  <button type="button" class="btn btn-primary btn-lg mr-5" data-toggle="modal" data-target="#exampleModal">
                    Next
                  </button> -->

            </div>
        </div>

        </div>
        </div>
    </form>

@endsection