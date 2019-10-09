@extends('layouts.app')
@php
    use App\Child;
    use App\User;

    $child = App\Child::where('parentID', Auth::user()->id)->get();
@endphp
@section('navigation')
    @include ('layouts.navUser')
@endsection
@section('content')
@section('script')
    <link href="{{asset('/css/sticky-footer-navbar.css')}}?{{time()}}" rel="stylesheet">
@endsection
<div class="jumbotron bg-white rounded-top rounded-bottom border border-secondry mx-2">
<div class="text-center">
    <h3 class="text-center">Please Select a Child</h3>

<table class="table table-bordered">
    <tr>
       <!-- <th>ID Number</th> -->
        <th>First Name</th>
        <th>Last Name</th>
       <!-- <th>Date of Birth</th> -->
        <th></th>
    </tr> 
    @foreach($child as $c) 
    <tr>
    <!-- <td>{{$c->childID}}</td> -->
    <td>{{$c->CfName}}</td>
    <td>{{$c->ClName}}</td>
    <!-- <td>{{$c->DOB}}</td> -->
    <td><a href="{{url('thisTest')}}?id={{$c -> childID}}" class="btn btn-primary">Profile</a>
    </tr>
    @endforeach
</table>
</div> 
<div class="av1">
<a href="ChildRegistration" class="btn btn-primary">Start New Child</a>
</div>
@endsection