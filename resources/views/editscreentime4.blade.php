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
        <h2 class="text-center">Screentime 4 Page(links)<span class="text-muted"></span></h2>
        <hr>
        @php
            $data=DB::table('summernotes')->where("item_id","=",35)->value('content');
            $data1=DB::table('summernotes')->where("item_id","=",36)->value('content');
            $data2=DB::table('summernotes')->where("item_id","=",37)->value('content');
            $data3=DB::table('summernotes')->where("item_id","=",57)->value('content');
        @endphp
        <div class="container">
            <div class="panel panel-default">
                <div class="pannel-heading">
                </div>
                <div class="panel-body">

                    <form action="{{ url('editscreentime4') }}" method="post">
                        <div class="jumbotron bg-gery rounded-top rounded-bottom border border-secondry mx-2">
                            <h2 class="av1">Tips to help you achive your goals - Screen Time <span
                                        class="text-muted"></span></h2>
                            <div class="fAlert alert-colBox2" role="alert">
                                <!-- Stack the columns on mobile by making one full-width and the other half-width -->
                                <div class="row">
                                    <div class="col-12 col-md-8">Switch off the Screen</div>
                                    <div class="col-12 col-md-4">
                                        <button type="button" class="btn btn-light"
                                                onclick=" window.open('{{ $data }}','_blank')">Find out more
                                        </button>
                                    </div>
                                </div>
                                <div class="text-center">
                                    Link:
                                    <input type="text" name="linkst1" class="form-control" value="{{ $data }}">
                                </div>

                            </div><!--Green thing div-->

                            <div class="fAlert alert-colBox" role="alert">
                                <!-- Stack the columns on mobile by making one full-width and the other half-width -->
                                <div class="row">
                                    <div class="col-12 col-md-8">Turn off the TV or Computer and Get Active</div>
                                    <div class="col-12 col-md-4">
                                        <button type="button" class="btn btn-light"
                                                onclick=" window.open('{{ $data1 }}','_blank')">Find out more
                                        </button>
                                    </div>
                                </div>
                                <div class="text-center">
                                    Link:
                                    <input type="text" name="linkst2" class="form-control" value="{{ $data1 }}">
                                </div>
                            </div><!--Blue thing div-->

                            <div class="fAlert alert-colBox1" role="alert">
                                <!-- Stack the columns on mobile by making one full-width and the other half-width -->
                                <div class="row">
                                    <div class="col-12 col-md-8">Screen time at home?</div>
                                    <div class="col-12 col-md-4">
                                        <button type="button" class="btn btn-light"
                                                onclick=" window.open('{{ $data2 }}','_blank')">Find out more
                                        </button>
                                    </div>
                                </div>
                                <div class="text-center">
                                    Link:
                                    <input type="text" class="form-control" name="linkst3" value="{{ $data2 }}">
                                </div>
                            </div>
                            <textarea id="summernote" name="st5" class="form-control">
                  {!! $data3 !!}
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