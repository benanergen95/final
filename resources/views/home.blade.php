@extends('layouts.app')
@section('navigation')
    @include ('layouts.navUser')
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        Password reset success.
                        You are logged in now!<br><br>
                         <div class="av1">
                <button onclick="location.href = 'Tests'" type="button" class="btn btn-primary btn-lg ">
                    Continue
                </button>
            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
