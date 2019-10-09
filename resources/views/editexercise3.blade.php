@extends('layouts.appAdmin')
@section('navigation')
    @include ('layouts.navAdmin')
@endsection

@section('content')
    @include ('layouts.navAdminedit')

    @if(!isset(Auth::user()->email))
        <script>window.location = "Login";</script>
    @endif
    @if(Auth::user()->admin == 0)
        <script>window.location = "Tests";</script>
    @endif
    <!-- Begin page content -->
    <!-- summernote -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">



    <div class="BOXtears">
        <h2 class="text-center">Exercise Result Page<span class="text-muted"></span></h2>

        <hr>
        @php
            $data1=DB::table('summernotes')->where("item_id","=",52)->value('content'); //well done
            $data2=DB::table('summernotes')->where("item_id","=",53)->value('content'); //message for normal
            $data3=DB::table('summernotes')->where("item_id","=",54)->value('content');//getting there
            $data4=DB::table('summernotes')->where("item_id","=",55)->value('content'); //message for not normal
            $data5=DB::table('summernotes')->where("item_id","=",56)->value('content');//image
        @endphp
        <div class="container">
            <div class="panel panel-default">
                <div class="pannel-heading">
                </div>
                <div class="panel-body">
                    <form action="{{ url('editexercise3') }}" method="post">
                        <div class="text-center">
                            <p class="text-center"><b>If doing enough exercise message : </b></p>
                            <input type="text" name="e31" value="{{ $data1 }}"> John,
                            <input type="text" name="e32" value="{{ $data2 }}">
                        </div>
                        <hr>
                        <div class="text-center">
                            <p class="text-center"><b>If doing enough exercise message : </b></p>
                            <input type="text" name="e33" value="{{ $data3 }}"> John,
                            <input type="text" name="e34" value="{{ $data4 }}">
                        </div>
                        <hr>
                        <p>Child name = John (will be replaced by the child name)</p>
                        <p><b>Image</b></p>
                        <textarea id="summernote" name="e35" class="form-control">
                  {!! $data5 !!}
                </textarea>
                        <br>
                        <div class="av1">
                            <input type="submit" value="Submit" class="btn btn-primary">
                        </div>
                    {!!csrf_field()!!}
                </div>
                </form>

                <script>
                    $('#summernote').summernote({
                        tabsize: 2,
                        height: 500
                    });

                </script>
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>

@endsection