@extends('layouts.app')
@extends('layouts.appAdmin')
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
    @section('content')
    <div class="jumbotron bg-white rounded-top rounded-bottom border border-secondry mx-2">
    <!--Excel export buttons -->
    <div class="row no-gutters">
        <div class="col">
            <a href="Admin" class="btn btn-outline-primary btn-block ">Child Table</a>
        </div>
        <div class="col">
            <a href="Admin2" class="btn btn-outline-primary  btn-block">Parent Table</a>
        </div>
        <div class="col">
            <a href="Admin3"  class="btn btn-outline-primary  btn-block">Entries value Table</a>
        </div>
        <div class="col">
            <a href="Admin4"  class="btn btn-outline-primary  btn-block">Results Table</a>
        </div>
        <div class="col">
            <a href="{{ route('export') }}" class="btn btn-outline-dark  btn-block"><b>Export all tables
                    to Excel</b></a>
        </div>
    </div>
    <hr>
    <div align="center">
        <a href="{{ route('export3') }}" class="btn btn-primary">Export Child Table to Excel</a>
    </div>
    <hr>
    <h1 class="av1">Child Table</h1>
    <hr>
    <!-- Begin page content of table-->
    <main role="main" class="container">
        <form>
            <div class="text-center">
                <table class="table table-bordered"> <!--Table headings -->

                    <thead>
                    <tr>
                        <td> Child ID</td>
                        <td> Parent ID</td>
                        <td>Firstname</td>
                        <td>Lastname</td>
                        <td>Sex</td>
                        <td>Date of birth</td>
                        <td>Age</td>
                        <td>Age in months</td>
                    </tr>
                    </thead>
                    <tbody id="dst">
                    @foreach($child as $c)       <!--Show data from database-->
                    <tr>
                        <td>{{ $c->childID}}</td>
                        <td>{{ $c->parentID}}</td>
                        <td>{{ $c->CfName}}</td>
                        <td>{{ $c->ClName}}</td>
                        <td>{{ $c->sex}}</td>
                        <td>{{ $c->DOB}}</td>
                        <td>{{ $c->age}}</td>
                        <td>{{ $c->ageinmo}}</td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </form>
    </main>

@endsection
