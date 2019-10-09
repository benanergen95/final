@extends('layouts.appAdmin')
@section('navigation')
    @include ('layouts.navAdmin')
@endsection

@section('content')
    @include ('layouts.navAdminedit')
    <!-- summernote -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <!-- Begin page content -->
    <div class="BOXtears">
        <h2 class="text-center">Edit Why Use Page<span class="text-muted"></span></h2>
        <hr>
        @php
            $data=DB::table('summernotes')->where("item_id","=",1)->value('content');
            $data2=DB::table('summernotes')->where("item_id","=",77)->value('content');
        @endphp
        <div class="container">
            <div class="panel panel-default">
                <div class="pannel-heading">
                </div>
                <div class="panel-body">

                    <form action="{{ url('editwhyuse') }}" method="post">
                        <div class="form-group">
                <textarea id="summernote" name="editwhyusevalue" class="form-control">
                  {!! $data !!}
                  </textarea>
                            <h2 class="text-center"><b>Message</b></h2>
                            <textarea id="summernote2" name="editwhyusemsgvalue" class="form-control">
                  {!! $data2 !!}
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
                    <h2 class="text-center"><b>Message</b></h2>
                    {!! $data2 !!}


                    <script>

                        $('#summernote').summernote({
                            tabsize: 2,
                            height: 300
                        });
                    </script>
                    <script>
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