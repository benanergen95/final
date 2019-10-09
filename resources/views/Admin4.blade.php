@extends('layouts.app')
@extends('layouts.appAdmin')
@section('navigation')
    @include ('layouts.navAdmin')
@endsection
@section('content')
<div class="jumbotron bg-white rounded-top rounded-bottom border border-secondry mx-2">
@section('content')
@section('content')
<div class="jumbotron bg-white rounded-top rounded-bottom border border-secondry mx-2">
    @if(!isset(Auth::user()->email))
        <script>window.location = "Login";</script>
    @endif
    @if(Auth::user()->admin == 0)
        <script>window.location = "Tests";</script>
    @endif
    @php
        use App\Child;
        use App\Entries;
        use App\User;
        use App\Results;

        $parents = DB::table('users')->join('child', 'child.parentID', '=', 'users.id')
            ->join('entries', 'child.ChildID', '=', 'entries.childID')
            ->join('results', 'child.ChildID', '=', 'results.childID')
            ->orderBy('users.id', 'ASC')
           ->select('users.id','users.fname','users.lname','users.pType','users.email','users.currentChild','child.childID',
           'child.CfName AS cfname','child.ClName','child.sex','child.DOB','child.age','child.ageinmo' ,
           'entries.height','entries.weight','entries.waist','entries.WHR_v','entries.BMI_v','entries.fruits','entries.veggies','entries.exercise','entries.screenTimeSD',
           'entries.screenTimeNSD','entries.sleepSD','entries.sleepNSD' ,
           'results.Rwhr','results.RBmi','results.RfruitsIntake','results.RveggiesIntake','results.Rexercise','results.RscreentimeSD','results.RscreentimeNSD',
           'results.RStimeSD','results.RStimeNSD' )
           ->get(); //tablename
    @endphp
    <div class="row no-gutters">
    
        <div class="col">
            <a href="Admin"  class="btn btn-outline-primary btn-block ">Child Table</a>
        </div>
        <div class="col">
            <a href="Admin2"  class="btn btn-outline-primary  btn-block">Parent Table</a>
        </div>
        <div class="col">
            <a href="Admin3" class="btn btn-outline-primary  btn-block">Entries value Table</a>
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

        <a href="{{ route('export5') }}" class="btn btn-primary">Export Results Table to Excel</a>
    </div>


    </div>
    <hr>
    <h1 class="av1">Results Table</h1>
    <hr>
    <b>0-Normal range/ 1- Not normal range</b><br>
    <b>BMI: 0-Noramal weight/ 1- Under weight / 2-Overweight</b>
@endsection
@section('content2')
@section('content2')
<div class="jumbotron bg-white rounded-top rounded-bottom border border-secondry mx-2">
    <!-- Begin page content -->
    <div class="text-center container-fluid">
        <table class="table table-bordered ">
            <thead>
            <tr>
                <td>Parent ID</td><!--Table headings -->
                <td>Child ID</td>
                <td>Email</td>
                <td>Child Firstname</td>
                <td>Child Lastname</td>
                <td>W/H ratio</td>
                <td>BMI</td>
                <td>Fruits</td>
                <td>Veggies</td>
                <td>Exercise</td>
                <td>Screentime School Days</td>
                <td>Screentime non-school Days</td>
                <td>Sleeptime School Days</td>
                <td>Sleeptime non-school Days</td>
            </tr>
            </thead>
            <tbody>
            @foreach($parents as $p)<!--Table Data from database -->
            <tr>
                <td>{{ $p->id}}</td>
                <td>{{ $p->childID }}</td>
                <td>{{ $p->email}}</td>
                <td>{{ $p->cfname}}</td>
                <td>{{ $p->ClName}}</td>
                <td>{{ $p->Rwhr}}</td>
                <td>{{ $p->RBmi}}</td>
                <td>{{ $p->RfruitsIntake}}</td>
                <td>{{ $p->RveggiesIntake}}</td>
                <td>{{ $p->Rexercise}}</td>
                <td>{{ $p->RscreentimeSD}}</td>
                <td>{{ $p->RscreentimeNSD}}</td>
                <td>{{ $p->RStimeSD}}</td>
                <td>{{ $p->RStimeNSD}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <hr>
    </div>
@endsection


