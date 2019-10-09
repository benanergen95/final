@extends('layouts.app')
@section('navigation')
    @include ('layouts.navUser')
@endsection

@section('css')
    <link href="{{asset('/css/extra-physical.css')}}?{{time()}}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    @if(!isset(Auth::user()->email))
        <script>window.location = "Login";</script>
    @endif
    <div class="jumbotron bg-white rounded-bottom border bg-secondary mx-2">
        <div class="container text-center">
            @php
                $data=DB::table('summernotes')->where("item_id","=",10)->value('content');
            @endphp
            {!! $data !!}
        </div>
        <!-- /END THE FEATURETTES -->
        <!-- /Start Nav Buttons -->
        <div class="av1">
            <form>
                <button onclick="location.href = 'Tests'" type="button" class="btn btn-outline-secondary btn-lg mr-5">
                    Back
                </button>
                <button onclick="location.href = 'Exercise1'" type="button" class="btn btn-primary btn-lg">Next</button>
            </form>
        </div>
    </div><!-- /.container -->
@endsection