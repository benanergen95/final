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
        <h2 class="text-center">Screentime 3 Page<span class="text-muted"></span></h2>

        <hr>
        @php
            $data=DB::table('summernotes')->where("item_id","=",16)->value('content');
        @endphp
        <div class="container">
            <div class="panel panel-default">
                <div class="pannel-heading">
                </div>
                <div class="panel-body">

                    <form action="{{ url('editscreentime3') }}" method="post">
                        <div class="form-group">
                <textarea id="summernote" name="editscreentime3value" class="form-control">
                  {!! $data !!}
                </textarea>
                            <!--Submit-->
                            <br>
                            <div class="av1">
                                <input type="submit" value="Submit" class="btn btn-primary">
                            </div>
                        </div>
                        {!!csrf_field()!!}
                        {!! $data !!}
                    </form>

                    <script>
                        $('#summernote').summernote({
                            tabsize: 2,
                            height: 300
                        });
                        $('#summernote2').summernote({
                            tabsize: 2,
                            height: 300
                        });
                    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
@endsection