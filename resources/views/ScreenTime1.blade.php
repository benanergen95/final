@extends('layouts.app')
@section('navigation')
    @include ('layouts.navUser')
@endsection

@section('css')
    <link href="{{asset('/css/extra-sedentary.css')}}?{{time()}}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    @if(!isset(Auth::user()->email))
        <script>window.location = "Login";</script>
    @endif
    <div class="jumbotron bg-white rounded-bottom border border-secondary mx-2">
    @php
        $data=DB::table('summernotes')->where("item_id","=",13)->value('content');
    @endphp
    {!! $data !!}
    <!-- /END THE FEATURETTES -->
        <!-- Start NAV Buttons -->
        <div class="av1">
            <form>
                <button onclick="location.href = 'ScreenTime0'" type="button"
                        class="btn btn-outline-secondary btn-lg mr-5">Back
                </button>
                <button class="btn btn-primary btn-lg " type="button" onclick="location.href = 'ScreenTime2'">
                    Next
                </button>
            </form>
        </div>
    </div><!-- /.container -->
    </main>
@endsection