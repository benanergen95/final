
<?php $__env->startSection('navigation'); ?>
    <?php echo $__env->make('layouts.navNotAuth', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php
        $data=DB::table('summernotes')->where("item_id","=",1)->value('content');
        $data2=DB::table('summernotes')->where("item_id","=",77)->value('content');
    ?>
    <!-- Begin page content -->
    <div class="jumbotron bg-white rounded-top rounded-bottom border border-secondry mx-2">
    <?php echo $data; ?> <!--Retrives text form the summernote table -->
        <div class="av1">
            <hr>
            
           
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
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
                    <?php echo $data2; ?>                <!--Retrives text form the summernote table  -->
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="Registration" type="button" class="btn btn-success">Continue</a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>