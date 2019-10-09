@extends('layouts.app')
@section('navigation')
    @include ('layouts.navUser')
@endsection

@section('content')
    @if(!isset(Auth::user()->email))
        <script>window.location = "Login";</script>
    @endif

    
@section('content')
        <div class="jumbotron bg-white rounded-top rounded-bottom border border-secondry mx-2">
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif 
           
            @php
                $data=DB::table('summernotes')->where("item_id","=",81)->value('content');
            @endphp
            {!! $data !!}
          
            <div class="av1">
            <form>
                <button onclick="location.href = 'MentalHealth1'" type="button"
                        class="btn btn-outline-secondary btn-lg mr-5 ">Back
                </button>
                <a href="MentalHealth3"  class="btn btn-primary btn-lg ">Next</a>
            </form>
        </div>
        </div>

        </div>
        </div>
    </form>

@endsection