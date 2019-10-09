  <?php $__env->startSection('navigation'); ?>
      <?php echo $__env->make('layouts.navAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('content'); ?> 
<?php echo $__env->make('layouts.navAdminedit', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php if(!isset(Auth::user()->email)): ?>
        <script>window.location="Login";</script>
    <?php endif; ?>
    <?php if(Auth::user()->admin == 0): ?>
        <script>window.location="Tests";</script>
    <?php endif; ?>
    <!-- Begin page content -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>


      <div class="BOXtears">
        <h2 class="text-center">Exercise result page<span class="text-muted"></span></h2>

        <hr>
        <?php
    $data1=DB::table('summernotes')->where("item_id","=",52)->value('content'); //well done
    $data2=DB::table('summernotes')->where("item_id","=",53)->value('content'); //message for normal
    $data3=DB::table('summernotes')->where("item_id","=",54)->value('content');//getting there
    $data4=DB::table('summernotes')->where("item_id","=",55)->value('content'); //message for not normal
    $data5=DB::table('summernotes')->where("item_id","=",56)->value('content');//image
  

    ?>
        <div class="container">
         <div class="panel panel-default"> 
          <div class="pannel-heading">
          </div>
          <div class="panel-body">

            <form action="<?php echo e(url('editexercise3')); ?>" method="post" >

             

          <div class="text-center" >
           <p class="text-center"><b>If doing enough exercise message : </b></p> 
           <input type="text" name="e31" value="<?php echo e($data1); ?>"> John,
           <input type="text" name="e32" value="<?php echo e($data2); ?>">
            </div>
          


            <hr>
           <div class="text-center" >
           <p class="text-center"><b>If doing enough exercise message : </b></p> 
           <input type="text" name="e33" value="<?php echo e($data3); ?>"> John, 
           <input type="text" name="e34" value="<?php echo e($data4); ?>">
            </div>
          
         

          
            <hr>
               <p>Child name = John (will be replaced by the child name)</p>
            <p>Image</p> 
             <textarea id="summernote" name="e35" class="form-control">
                  <?php echo $data5; ?>

                </textarea>
          <br>
          <div class="av1"> 
             <input type="submit" value="Submit" class="btn btn-success">
          </div>


                <?php echo csrf_field(); ?>

              </div>
            </form>
                   
            <script>
      $('#summernote').summernote({
        tabsize: 2,
        height: 500
      });
     
    </script>
            
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>