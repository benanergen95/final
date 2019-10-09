@extends('layouts.app')
@extends('layouts.appAdmin')
@section('navigation')
    @include ('layouts.navAdmin')
@endsection
@section('content2')
    <div class="jumbotron bg-white rounded-top rounded-bottom border border-secondry mx-2">
@section('content')

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
           ->join('results', 'users.currentChild', '=', 'results.resultID')
           ->orderBy('users.id', 'ASC')
           ->select('users.id','users.fname','users.lname','users.pType','users.email','users.currentChild','child.childID',
            'child.CfName AS cfname','child.ClName','child.sex','child.DOB','child.age','child.ageinmo' ,
            'entries.height','entries.weight','entries.waist','entries.WHR_v','entries.BMI_v','entries.fruits','entries.veggies','entries.exercise','entries.screenTimeSD',
            'entries.screenTimeNSD','entries.sleepSD','entries.sleepNSD' ,
            'results.Rwhr','results.RBmi','results.RfruitsIntake','results.RveggiesIntake','results.Rexercise','results.RscreentimeSD','results.RscreentimeNSD',
            'results.RStimeSD','results.RStimeNSD' )
            ->get(); //get data from database
    @endphp
    <div class="row no-gutters">
        <div class="col">
            <a href="Admin" class="btn btn-outline-primary btn-block ">Child Table</a>
        </div>
        <div class="col">
            <a href="Admin2" class="btn btn-outline-primary  btn-block">Parent Table</a>
        </div>
        <div class="col">
            <a href="Admin3" class="btn btn-outline-primary  btn-block">Entries value Table</a>
        </div>
        <div class="col">
            <a href="Admin4" class="btn btn-outline-primary  btn-block">Results Table</a>
        </div>
        <div class="col">
            <a href="{{ route('export') }}" class="btn btn-outline-dark  btn-block"><b>Export all tables
                    to Excel</b></a>
        </div>
    </div>
    <hr>
    <div align="center">
        <a href="{{ route('export4') }}" class="btn btn-primary">Export Entries Table to Excel</a>
    </div>
    <hr>
    <h1 class="av1">Entries Table</h1>
    <hr>
@endsection
@section('content2')
    <!-- Begin page content -->
    <div class="text-center container-fluid"><!--Table headings -->
        <table class="table table-bordered ">
            <thead>
            <tr>
                <td>Parent ID</td>
                <td>Child ID</td>
                <td>Email</td>
                <td>Child Firstname</td>
                <td>Child Lastname</td>

                <td>Age in months</td>
                <td>Height(cm)</td>
                <td>Weight(Kg)</td>
                <td>Waist circumference(cm)</td>

                <td>BMI value</td>
                <td>Waist/Height ratio</td>
                <td>Fruits</td>
                <td>Veggies</td>

                <td>Exercise Time</td>
                <td>Screentime School Days</td>
                <td>Screentime non-school Days</td>
                <td>Sleeptime School Days</td>

                <td>Sleeptime non-school Days</td>
            </tr>
            </thead>
            <tbody>
            @foreach($parents as $p)<!--Table data from database -->
            <tr>
                <td>{{ $p->id}}</td>
                <td>{{ $p->childID}}</td>
                <td>{{ $p->email}}</td>
                <td>{{ $p->cfname}}</td>
                <td>{{ $p->ClName}}</td>
                <td>{{ $p->ageinmo}}</td>
                <td>{{ $p->height}}</td>
                <td>{{ $p->weight}}</td>
                <td>{{ $p->waist}}</td>
                <td>{{ $p->BMI_v}}</td>
                <td>{{ $p->WHR_v}}</td>
                <td>{{ $p->fruits}}</td>
                <td>{{ $p->veggies}}</td>
                <td>{{ $p->exercise}}</td>
                <td>{{ $p->screenTimeSD}}</td>
                <td>{{ $p->screenTimeNSD}}</td>
                <td>{{ $p->sleepSD}}</td>
                <td>{{ $p->sleepNSD}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <hr>
    </div>

@endsection


