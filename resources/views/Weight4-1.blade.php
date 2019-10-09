@extends('layouts.app')
@section('navigation')
    @include ('layouts.navUser')
@endsection

@section('content')
    @if(!isset(Auth::user()->email))
        <script>window.location = "Login";</script>
    @endif
@section('content')
    <form method="post" action="{{url('StoreWaist')}}">
        {{csrf_field()}}
        <div class="jumbotron bg-white rounded-top rounded-bottom border border-secondry mx-2">
            <hr>
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
                $data=DB::table('summernotes')->where("item_id","=",6)->value('content');
            @endphp
            {!! $data !!}
            <input class="form-control" name="waist" type="text" placeholder="Waist circumfrence in centimetres">
            <br>
            <div class="av1">
                <button onclick="location.href = 'Weight3'" type="button" class="btn btn-outline-secondary btn-lg mr-5">
                    Back
                </button>
                <!-- Button trigger modal -->
                <input type="submit" value="Next" class="btn btn-primary btn-lg">
                <!--  <button type="button" class="btn btn-primary btn-lg mr-5" data-toggle="modal" data-target="#exampleModal">
                    Next
                  </button> -->
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Well done!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="parMainL">
                            <p class="">You have completed the test. Please prossed to the next stage by pressing the
                                "view results"</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!--
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                        -->
                        <a href="WeightBMI4" type="button" class="btn btn-primary">See BMI results</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection