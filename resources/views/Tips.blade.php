@extends('layouts.app')
@section('navigation')
    @include ('layouts.navUser')
@endsection

@section('content')
    <div class="jumbotron">
        <h2 class="text-center">Tips to help you achieve your goals <span class="text-muted"></span></h2>
        <div class="fAlert alert-colBox2" role="alert">
            <!-- Stack the columns on mobile by making one full-width and the other half-width -->
            <div class="row">
                <div class="col-12 col-md-8">5 Ways to a Healthy Weight and Lifestyle</div>
                <div class="col-6 col-md-4">
                    <button type="button" class="btn btn-light">Find out more</button>
                </div>
            </div>
        </div><!--Green thing div-->

        <div class="fAlert alert-colBox" role="alert">
            <!-- Stack the columns on mobile by making one full-width and the other half-width -->
            <div class="row">
                <div class="col-12 col-md-8">Parent tips for a healthy family</div>
                <div class="col-6 col-md-4">
                    <button type="button" class="btn btn-light">Find out more</button>
                </div>
            </div>


        </div><!--Blue thing div-->

        <div class="fAlert alert-colBox1" role="alert">
            <!-- Stack the columns on mobile by making one full-width and the other half-width -->
            <div class="row">
                <div class="col-12 col-md-8">Want to know more about child body mass index?</div>
                <div class="col-6 col-md-4">
                    <button type="button" class="btn btn-light">Find out more</button>
                </div>
            </div>
        </div><!--red thing div-->

        <div class="text-center">
            <img src="content/active children.PNG" class="rounded" alt="Good weight">
        </div>

        <hr>
        <div class="parMainL">
            <p class="">Once you have looked over the tips please proceed to the next test</p>
            <a href="Tests" type="button" class="btn btn-primary">Next Test</a>
            <hr>
        </div>
        <br>
        <div class="av1">
        </div>
    </div>
@endsection