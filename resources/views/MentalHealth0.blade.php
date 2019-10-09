@extends('layouts.app')
@section('navigation')
    @include ('layouts.navUser')
@endsection

@section('content')

    <!-- Begin page content -->
    <div class="jumbotron bg-white rounded-top rounded-bottom border border-secondry mx-2">
        @php
            $data=DB::table('summernotes')->where("item_id","=",79)->value('content');
        @endphp
        {!! $data !!}
        <hr>
        <div class="av1">
            <form>
                <button onclick="location.href = 'Tests'" type="button" class="btn btn-outline-secondary btn-lg mr-5 ">
                    Back
                </button>

                <a href="MentalHealth1" class="btn btn-primary btn-lg">Next</a>
            </form>
        </div>
    </div>
@endsection