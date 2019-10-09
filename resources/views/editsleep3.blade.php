@extends('layouts.appAdmin')
@section('navigation')
    @include ('layouts.navAdmin')
@endsection

@section('content')
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
        <h2 class="text-center">Sleep 1 Page<span class="text-muted"></span></h2>

        <hr>
        @php
            $data=DB::table('summernotes')->where("item_id","=",71)->value('content');
            $data2=DB::table('summernotes')->where("item_id","=",72)->value('content');
            $data3=DB::table('summernotes')->where("item_id","=",73)->value('content');
        @endphp
        <div class="container">
            <div class="panel panel-default">
                <div class="pannel-heading">
                </div>
                <div class="panel-body">

                    <form action="{{ url('editsleep3') }}" method="post">
                        {!!csrf_field()!!}
                        <div class="form-group">
                <textarea id="summernote" name="eslp31" class="form-control">
                  {!! $data !!}
                </textarea>
                            <div class="text-center"><p><b>Input</b></p></div>

                            <textarea id="summernote2" name="eslp32" class="form-control">
                  {!! $data2 !!}
                </textarea>
                            <div class="text-center"><p><b>Input</b></p></div>
                            <textarea id="summernote3" name="eslp33" class="form-control">
                  {!! $data3 !!}
                </textarea>

                        </div>
                        <div class="form-group">
                            <!--Submit-->
                            <div class="av1">
                                <input type="submit" value="Submit" class="btn btn-primary">
                            </div>
                            {!!csrf_field()!!}
                        </div>
                    </form>

                    {!! $data !!}
                    <div class="text-center"><p><b>Input</b></p></div>
                    {!! $data2 !!}
                    <div class="text-center"><p><b>Input</b></p></div>
                    {!! $data3 !!}
                    <script>
                        $('#summernote').summernote({
                            tabsize: 2,
                            height: 200
                        });
                        $('#summernote2').summernote({
                            tabsize: 2,
                            height: 50
                        });
                        $('#summernote3').summernote({
                            tabsize: 2,
                            height: 200
                        });
                    </script>
                    <script>
                        $('#timeSleep').combodate({
                            value: "9:00 PM"
                        });

                        $('#timeWake').combodate({
                            value: "7:00 AM"
                        });

                    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
@endsection