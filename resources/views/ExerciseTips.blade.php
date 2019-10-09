@extends('layouts.app')
@section('navigation')
    @include ('layouts.navUser')
@endsection

@section('content')
    @php
        $data=DB::table('summernotes')->where("item_id","=",32)->value('content');
        $data1=DB::table('summernotes')->where("item_id","=",33)->value('content');
        $data2=DB::table('summernotes')->where("item_id","=",34)->value('content');
        $data3=DB::table('summernotes')->where("item_id","=",51)->value('content');
    @endphp
    <!--Check if user is logged in-->
    @if(!isset(Auth::user()->email))
        <script>window.location = "Login";</script>
    @endif
    <div class="jumbotron bg-white rounded-top rounded-bottom border border-secondry mx-2">
        <h2 class="text-center">Tips to help you achive your goals - Exercise <span class="text-muted"></span></h2>
        <div class="fAlert alert-colBox2" role="alert">
            <!-- Stack the columns on mobile by making one full-width and the other half-width -->
            <div class="row">
                <div class="col-12 col-md-8">Get Active Each Day</div>
                <div class="col-12 col-md-4">
                    <button type="button" class="btn btn-light" onclick=" window.open('{{ $data }}','_blank')"
                    >Find out more
                    </button>
                </div>
            </div>
        </div><!--Green thing div-->
        <div class="fAlert alert-colBox" role="alert">
            <!-- Stack the columns on mobile by making one full-width and the other half-width -->
            <div class="row">
                <div class="col-12 col-md-8">Being Active</div>
                <div class="col-12 col-md-4">
                    <button type="button" class="btn btn-light" onclick=" window.open('{{ $data1 }}','_blank')">Find out
                        more
                    </button>
                </div>
            </div>
        </div><!--Blue thing div-->

        <div class="fAlert alert-colBox1" role="alert">
            <!-- Stack the columns on mobile by making one full-width and the other half-width -->
            <div class="row">
                <div class="col-12 col-md-8">Want to know more about physical activity for your child?</div>
                <div class="col-12 col-md-4">
                    <button type="button" class="btn btn-light" onclick=" window.open('{{$data2}}','_blank')">Find out
                        more
                    </button>
                </div>
            </div>
        </div><!--red thing div-->

        <div class="text-center">
            {!! $data3 !!}
        </div>


        <div class="parMainL">
            <a href="MainTips" class="btn btn-primary">Back To Tips</a>
            <hr>
        </div>
        <br>
        <div class="av1">
        </div>
    </div>
@endsection