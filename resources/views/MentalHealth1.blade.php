@extends('layouts.app')
@section('navigation')
    @include ('layouts.navUser')
@endsection

@section('content')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
    <div class="jumbotron bg-white rounded-top rounded-bottom border border-secondry mx-2">
        @php
            $data=DB::table('summernotes')->where("item_id","=",80)->value('content');
        @endphp
        {!! $data !!}
        <br>
        <hr>
        <div class="av1">
            <form>
                <button onclick="location.href = 'MentalHealth0'" type="button"
                        class="btn btn-outline-secondary btn-lg mr-5 ">Back
                </button>
                <a href="MentalHealth2"  class="btn btn-primary btn-lg ">Next</a>
            </form>
        </div>
    </div>
@endsection
    