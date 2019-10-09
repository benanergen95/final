@extends('layouts.app')
@php
    use App\Results;  
    use App\Child;
@endphp
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

@section('css')
    <link href="{{asset('/css/mental.css')}}?{{time()}}" rel="stylesheet" type="text/css">
@endsection

<form action="MentalHealth15" method="get">
<div class="question text-center">Question 12 - How often does the child not listen to rules?
<br>
<div>
<img src ="/content/mentalquestion.jpg">
</div>
<label class="container text-left">Never
  <input type="radio" checked="checked" name="mental" value="0">
  <span class="checkmark"></span>
</label>
<label class="container text-left">Sometimes
  <input type="radio" name="mental" value="1">
  <span class="checkmark"></span>
</label>
<label class="container text-left">Often
  <input type="radio" name="mental" value="2">
  <span class="checkmark"></span>
</label></div>
<div class="text-center">
<input type="submit" value="submit" class="next">Next Question</a>
<a href="MentalHealth13" class="previous">Previous Question</a>
</div>
<?php
 session_start();
 if(isset($_GET['mental'])){
  $_SESSION['mentalHealthButton'] = $_SESSION['mentalHealthButton'] + $_GET['mental'];
 }
// GETTING VALUE FOR MENTAL HEALTH
if(isset($_GET['submit'])){
}
?>
</form>

@endsection