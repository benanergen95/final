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
        <h2 class="text-center">Screentime 2 Page<span class="text-muted"></span></h2>
        <hr>
        @php
            $data=DB::table('summernotes')->where("item_id","=",14)->value('content');
            $data2=DB::table('summernotes')->where("item_id","=",15)->value('content');

        @endphp
        <div class="container">
            <div class="panel panel-default">
                <div class="pannel-heading">
                </div>
                <div class="panel-body">

                    <form action="{{ url('editscreentime2') }}" method="post">
                        <div class="form-group">
                <textarea id="summernote" name="editscreentime2value" class="form-control">
                  {!! $data !!}
                </textarea>
                            <!--Submit-->
                            <br>
                            <div class="av1">
                                <input type="submit" value="Submit" class="btn btn-primary">
                            </div>
                        </div>
                        {!!csrf_field()!!}
                    </form>
                    <div class="text-center">
                        <p><b>Edit activity list</b></p>
                    </div>
                    <form action="{{ url('editscreentime21') }}" method="post">
                        <div class="form-group">
                <textarea id="summernote2" name="editscreentime21value" class="form-control">
                  {!! $data2 !!}
                </textarea>
                        </div>
                        <div class="form-group">
                            <!--Submit-->
                            <div class="av1">
                                <input type="submit" value="Submit" class="btn btn-success">
                            </div>
                            {!!csrf_field()!!}
                        </div>
                    </form>
                    {!! $data !!}
                    <p class="text-center">
                        <a class="btn btn-info" data-toggle="collapse" href="#collapseExample" role="button"
                           aria-expanded="false">
                            Click Here To see Activity List
                        </a>
                    </p>
                    <div class="collapse" id="collapseExample">
                        <div class=" card-body">
                            {!! $data2 !!}
                        </div>
                    </div>
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