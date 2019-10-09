@extends('layouts.app')
@section('navigation')
    @include ('layouts.navNotAuth')
@endsection
@section('content')
    @php
        $data=DB::table('summernotes')->where("item_id","=",1)->value('content');
        $data2=DB::table('summernotes')->where("item_id","=",77)->value('content');
    @endphp
    <!-- Begin page content -->
    <div class="jumbotron bg-white rounded-top rounded-bottom border border-secondry mx-2">
    {!! $data !!} <!--Retrives text form the summernote table -->
        <div class="text-center">
            <hr>
            
           
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Ready to start?
            </button>
        </div>
        
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Help your child to be a healthy kid</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="parMainL">
                    {!! $data2 !!}                <!--Retrives text form the summernote table  -->
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="Registration" class="btn btn-primary">Continue</a>
                </div>
            </div>
        </div>
    </div>
@endsection