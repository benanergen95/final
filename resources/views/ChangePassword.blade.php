@extends('layouts.app')
@section('navigation')
    @include ('layouts.navUser')
@endsection

@section('script')
    <link href="{{asset('/css/sticky-footer-navbar.css')}}?{{time()}}" rel="stylesheet">
@endsection

@section('content')
    <div class="jumbotron bg-white rounded-top rounded-bottom border border-secondry mx-2">
        <h2 class="text-center">Change Password<span class="text-muted"></span></h2>

        <hr>

        <!--Redirect Logged in User to Tests Page-->
        @if(!isset(Auth::user()->email))
            <script>window.location = "Login";</script>
        @endif

    <!--Password Changed Success Message-->
        @if ($successMessage = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">
                </button>
                {{$successMessage}}
            </div>
        @endif

    <!--Failed Logging Message-->
        @if ($errorMessage = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">
                </button>
                {{$errorMessage}}
            </div>
        @endif

    <!--Validation Error Message-->
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{url('UpdatePassword')}}">
            {{ csrf_field() }}
            <div class="parMain">

                <div class="form-group">
                    <label for="exampleInputPassword1">Current Password:</label>
                    <input type="password" name='password_current' class="form-control" id="exampleInputPassword1"
                           placeholder="**********">
                    <label for="exampleInputPassword2">New Password:</label>
                    <input type="password" name='password_new' class="form-control" id="exampleInputPassword2"
                           placeholder="**********">
                    <label for="exampleInputPassword3">Confirm New Password:</label>
                    <input type="password" name='password_new_confirm' class="form-control" id="exampleInputPassword3"
                           placeholder="**********">
                </div>
            </div>

            <div class="av1 form-group">
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>

        </form>
        <hr>
    </div>
@endsection