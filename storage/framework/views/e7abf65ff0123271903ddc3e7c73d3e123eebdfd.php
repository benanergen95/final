  <?php $__env->startSection('navigation'); ?>
      <?php echo $__env->make('layouts.navAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('content'); ?> 
    <?php $__env->startSection('content'); ?>
   <?php echo $__env->make('layouts.navAdminedit', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php if(!isset(Auth::user()->email)): ?>
        <script>window.location="Login";</script>
    <?php endif; ?>
    <?php if(Auth::user()->admin == 0): ?>
        <script>window.location="Tests";</script>
    <?php endif; ?>
    <!-- Begin page content -->
         <!-- summernote -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
      <div class="BOXtears">
        <h2 class="text-center">Screentime 2 page<span class="text-muted"></span></h2>
        <hr>
        <?php
    $data=DB::table('summernotes')->where("item_id","=",14)->value('content');
    $data2=DB::table('summernotes')->where("item_id","=",15)->value('content');

    ?>
        <div class="container">
         <div class="panel panel-default"> 
          <div class="pannel-heading">
          </div>
          <div class="panel-body">

            <form action="<?php echo e(url('editscreentime2')); ?>" method="post" >
              <div class="form-group">
                <textarea id="summernote" name="editscreentime2value" class="form-control">
                  <?php echo $data; ?>

                </textarea>
                       <!--Submit-->
                       <br>
          <div class="av1"> 
             <input type="submit" value="Submit" class="btn btn-success">
          </div>
                      </div>
                       <?php echo csrf_field(); ?>

                    </form>
                      <div class="text-center">
                      <p><b>Edit activity list</b></p>
                      </div>
            <form action="<?php echo e(url('editscreentime21')); ?>" method="post" >
              <div class="form-group">
                <textarea id="summernote2" name="editscreentime21value" class="form-control">
                  <?php echo $data2; ?>

                </textarea>
                      </div>
              <div class="form-group">
                       <!--Submit-->
          <div class="av1"> 
             <input type="submit" value="Submit" class="btn btn-success">
          </div>
                <?php echo csrf_field(); ?>

              </div>
            </form>
                    <?php echo $data; ?>

            <p class="text-center">
              <a class="btn btn-info"  data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false">
                   Click Here To see Activity List
             </a>
            </p>
          <div class="collapse" id="collapseExample">
            <div class=" card-body">
             <?php echo $data2; ?>

          </div>
          </div>
     <script>
      $('#summernote').summernote({
        tabsize: 2,
        height: 300
      });
       $('#summernote2').summernote({
        tabsize: 2,
        height: 300
      });
    </script>
            
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>