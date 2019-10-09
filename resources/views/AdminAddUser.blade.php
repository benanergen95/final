@extends('layouts.app')

@section('navigation')
    @include ('layouts.navAdmin')
@endsection

@section('content')
    @if(!isset(Auth::user()->email))
        <script>window.location = "Login";</script>
    @endif
    @if(Auth::user()->admin == 0)
        <script>window.location = "Tests";</script>
    @endif
    <!-- Begin page content -->
    <main role="main" class="container">
        <div class="jumbotron bg-white rounded-top rounded-bottom border border-secondry mx-2">
            <h2 class="text-center">Email Invites<span class="text-muted"></span></h2>
            <hr>
            <form action="{{url('PostAddemail')}}" method="post">
                {{csrf_field()}}
                <div class="parMain">
                    <p class="text-center">Please add the email to authenticate user to register</p>
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
                    @if(null !== Session::get('$emailError'))
                        <div class="alert alert-danger">
                            <ul>
                                <li>{{Session::get('$emailError')}}</li>
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <!--User email-->
                        <div class="form-group">
                            <label for="AdddEmail">Please enter the user email</label>
                            <input type="text" name="AddEmail" class="form-control" id="FormControlInput1"
                                   placeholder="User Email">
                        </div>
                        <div class="av1">
                            <input type="submit" value="Submit" class="btn btn-primary">
                        </div>
                        <hr>
                    </div>
                    <div>
                    </div>
                </div>
                <h2 class="text-center">Non-Registered Users<span class="text-muted"></span></h2>
                <!--Will show the non registed users -->
                <div class="panel-body">
                    <table class="table  table-bordered">
                        <thead>
                        <tr>
                            <th>Emails</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($nonRegistredusers as $nuser => $email)
                            <tr>
                                <td>{{$email->email}}</td>
                                <td>
                                    <a href="{{ url('deletemail',array($email->email)) }}"> Delete</a>
                                    <!--Admin can delete non-registed users -->
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <h2 class="text-center">Registered Users<span class="text-muted"></span></h2>
                <!--Will show the registed users -->
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                        </tr>
                        </thead>
                        <tbody id="dst">

                        @foreach($Registredusers as $ruser)
                            <tr>
                                <td>{{ $ruser->email}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </main>
@endsection