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
        <h2 class="text-center">Weight 5 page<span class="text-muted"></span></h2>

        <hr>
        <?php
    $data=DB::table('summernotes')->where("item_id","=",19)->value('content'); //main line
    $data1=DB::table('summernotes')->where("item_id","=",20)->value('content'); //well done
    $data2=DB::table('summernotes')->where("item_id","=",21)->value('content'); //normal
    $data3=DB::table('summernotes')->where("item_id","=",22)->value('content');//getting there
    $data4=DB::table('summernotes')->where("item_id","=",23)->value('content'); //underweight
    $data5=DB::table('summernotes')->where("item_id","=",24)->value('content');//getting there
    $data6=DB::table('summernotes')->where("item_id","=",25)->value('content'); //overweight
    $data7=DB::table('summernotes')->where("item_id","=",42)->value('content'); //good image 
    $data8=DB::table('summernotes')->where("item_id","=",43)->value('content'); //ng image

    ?>
        <div class="container">
         <div class="panel panel-default"> 
          <div class="pannel-heading">
          </div>
          <div class="panel-body">

            <form action="<?php echo e(url('editweight5')); ?>" method="post" >

              <div class="text-center" >
           <p class="text-center"><b>Main message : </b></p> Well done! John 
            <input type="text" name="main" value="<?php echo e($data); ?>"> normal weight.
            </div>

            <hr>

          <div class="text-center" >
           <p class="text-center"><b>If normal message : </b></p> 
           <input type="text" name="ifnorf" value="<?php echo e($data1); ?>"> John <?php echo e($data); ?>

           <input type="text" name="ifnotl" value="<?php echo e($data2); ?>">
            </div>
          


            <hr>
           <div class="text-center" >
           <p class="text-center"><b>If under weight message : </b></p> 
           <input type="text" name="ifwnf" value="<?php echo e($data3); ?>"> John <?php echo e($data); ?>

           <input type="text" name="ifwnl" value="<?php echo e($data4); ?>">
            </div>
          


            <hr><div class="text-center" >
           <p class="text-center"><b>If over weight message : </b></p> 
           <input type="text" name="ifovf" value="<?php echo e($data5); ?>"> John <?php echo e($data); ?>

           <input type="text" name="ifovl" value="<?php echo e($data6); ?>">
            </div>
          
            <hr>
            <p>Child name = John (will be replaced by the child name)</p>
            Image if BMI is classified as normal
             <textarea id="summernote" name="imggood" class="form-control">
                  <?php echo $data7; ?>

                </textarea>
            Image if BMI is calssified as not normal
              <textarea id="summernote1" name="imgngood" class="form-control">
                  <?php echo $data8; ?>

            </textarea>
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
      $('#summernote1').summernote({
        tabsize: 2,
        height: 500
      });
    </script>
            
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>