@extends('layouts.app')
@section('navigation')
    @include ('layouts.navNotAuth')
@endsection

@section('script')
    <link href="{{asset('/css/sticky-footer-navbar.css')}}?{{time()}}" rel="stylesheet">
@endsection

@section('content')
    <div class="jumbotron bg-white rounded-top rounded-bottom border border-secondry mx-2">
        <h2 class="text-center">Welcome Back<span class="text-muted"></span></h2>

        <hr>
        <!--Redirect Logged in User to Tests Page-->
        @if(isset(Auth::user()->email))
            <script>window.location = "Tests";</script>
        @endif

    <!--Account Creation Success Message-->
        @if ($successMessage = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">
                </button>
                {{$successMessage}}
            </div>
        @endif

    <!--Failed Logging Message-->
        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                {{$message}}
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

        <form method="post" action="{{url('CheckLogin')}}">
            {{ csrf_field() }}
            <div class="parMain">
                <p class="text-center">To <b>log in</b> please enter your account details.</p>
                <hr>
                <div class="form-group">
                    <label for="exampleInputEmail1">Please enter your Email address you used </label>
                    <input type="email" name='email' class="form-control" id="exampleInputEmail1"
                           aria-describedby="emailHelp" placeholder="Email@example.com" value="{{ old('email') }}">

                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name='password' class="form-control" id="exampleInputPassword1"
                           placeholder="**********">

                </div>
            </div>

            <div class="av1 form-group">
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>
            <a class="text-center btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>

        </form>
        <hr>
    </div>
@endsection