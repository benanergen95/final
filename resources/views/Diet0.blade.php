@extends('layouts.app')
@section('navigation')
    @include ('layouts.navUser')
@endsection

@section('css')
    <link href="{{asset('/css/extra-diet.css')}}?{{time()}}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    @if(!isset(Auth::user()->email))
        <script>window.location = "Login";</script>
    @endif
    <!-- Begin page content -->
    <div class="jumbotron bg-white rounded-bottom border bg-secondary mx-2">

    @php
        $data=DB::table('summernotes')->where("item_id","=",7)->value('content'); //diet 0 data form summernotes table
    @endphp
    {!! $data !!}  <!--data retrived from database -->
        <div class="av1">
            <form>
                <button class="btn btn-outline-secondary btn-lg mr-5" type="button" onclick="location.href = 'Tests'">
                    Back
                </button>
                <button class="btn btn-primary btn-lg " type="button" onclick="location.href = 'Diet1'">
                    Next
                </button>
            </form>
        </div>
    </div>

@endsection