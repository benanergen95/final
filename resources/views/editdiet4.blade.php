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
        <h2 class="text-center">Diet Results Page<span class="text-muted"></span></h2>

        <hr>
        @php
            $data1=DB::table('summernotes')->where("item_id","=",44)->value('content'); //welldone fruits
            $data2=DB::table('summernotes')->where("item_id","=",45)->value('content'); //getting there fruits
            $data3=DB::table('summernotes')->where("item_id","=",46)->value('content'); // well done veggies
            $data4=DB::table('summernotes')->where("item_id","=",47)->value('content'); //getting there veggies
            $data5=DB::table('summernotes')->where("item_id","=",48)->value('content'); //image


        @endphp
        <div class="container">
            <div class="panel panel-default">
                <div class="pannel-heading">
                </div>
                <div class="panel-body">
                    <form action="{{ url('editdiet4') }}" method="post">
                        <div class="text-center">
                            <p class="text-center"><b>If eating enough veggies message : </b></p>
                            <input type="text" name="d1" value="{{ $data1 }}">
                        </div>
                        <hr>
                        <div class="text-center">
                            <p class="text-center"><b>If eating enough veggies message :</b></p>
                            <input type="text" name="d2" value="{{ $data2 }}">
                        </div>
                        <hr>
                        <div class="text-center">
                            <p class="text-center"><b>If eating enough fruits message :</b></p>
                            <input type="text" name="d3" value="{{ $data3 }}">
                        </div>
                        <hr>
                        <div class="text-center">
                            <p class="text-center"><b>If eating not enough fruits message :</b></p>
                            <input type="text" name="d4" value="{{ $data4 }}">
                        </div>
                        <hr>
                        <div class="row justify-content-center  text-white">
                            <div class="col-4 lead bg-success"></div>
                            <div class="col-4 lead bg-success">Vegetables</div>
                            <div class="col-4 lead bg-success">Fruits</div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-4 text-black lead border border-success" style="background-color:#b3e0bd">
                                text if eating enough
                            </div>
                            <div class="col-4 text-black lead  border border-success"
                                 style="background-color:#b3e0bd">{{ $data1 }}</div>
                            <div class="col-4 text-black lead border border-success"
                                 style="background-color:#b3e0bd">{{ $data3 }}</div>
                            <div class="col-4 text-black lead  border border-success" style="background-color:#b3e0bd">
                                text if not eating enough
                            </div>
                            <div class="col-4 text-black lead border border-success"
                                 style="background-color:#b3e0bd">{{ $data2 }}</div>
                            <div class="col-4 text-black lead  border border-success"
                                 style="background-color:#b3e0bd">{{ $data4 }}</div>
                        </div>
                        <hr>
                        <textarea id="summernote" name="d5" class="form-control">
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