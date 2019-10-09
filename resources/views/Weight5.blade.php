@extends('layouts.app')
@section('navigation')
    @include ('layouts.navUser')
@endsection

@section('content')
    @php
        $data=DB::table('summernotes')->where("item_id","=",26)->value('content');
        $data1=DB::table('summernotes')->where("item_id","=",27)->value('content');
        $data2=DB::table('summernotes')->where("item_id","=",28)->value('content');
        $data3=DB::table('summernotes')->where("item_id","=",41)->value('content');
    @endphp
    <div class="jumbotron bg-white rounded-top rounded-bottom border border-secondry mx-2">
        <h2 class="text-center">Tips to help you achive your goals - Weight <span class="text-muted"></span></h2>
        <div class="fAlert alert-colBox2" role="alert">
            <!-- Stack the columns on mobile by making one full-width and the other half-width -->
            <div class="row">
                <div class="col-12 col-md-8">5 Ways to a Healthy Weight and Lifestyle</div>
                <div class="col-12 col-md-4">
                    <button type="button" class="btn btn-light" onclick=" window.open('{{ $data }}','_blank')">Find out
                        more
                    </button>
                </div>
            </div>

        </div><!--Green thing div-->

        <div class="fAlert alert-colBox" role="alert">
            <!-- Stack the columns on mobile by making one full-width and the other half-width -->
            <div class="row">
                <div class="col-12 col-md-8">Parent tips for a healthy family</div>
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
                <div class="col-12 col-md-8">Want to know more about child body mass index?</div>
                <div class="col-12 col-md-4">
                    <button type="button" class="btn btn-light" onclick=" window.open('{{ $data2 }}','_blank')">Find out
                        more
                    </button>
                </div>
            </div>
        </div>
        {!! $data3 !!}

        <div class="parMainL">
            <a href="Tests"  class="btn btn-primary">Next Test</a>
            <hr>
        </div>
        <br>
        <div class="av1">
        </div>
    </div>
    </div>

@endsection