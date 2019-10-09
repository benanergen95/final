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
        <h2 class="text-center">Screentime Results page<span class="text-muted"></span></h2>

        <hr>
        <?php
    $data1=DB::table('summernotes')->where("item_id","=",64)->value('content'); //welldone sleep SD
    $data2=DB::table('summernotes')->where("item_id","=",65)->value('content'); //getting there sleep SD 
    $data3=DB::table('summernotes')->where("item_id","=",66)->value('content'); // well done sleep NSD
    $data4=DB::table('summernotes')->where("item_id","=",67)->value('content'); //getting there sleep NSD
    $data5=DB::table('summernotes')->where("item_id","=",68)->value('content'); //image
    $data6=DB::table('summernotes')->where("item_id","=",69)->value('content'); //too much sleep SD
    $data7=DB::table('summernotes')->where("item_id","=",70)->value('content'); //too much sleep NSD
   

    ?>
        <div class="container">
         <div class="panel panel-default"> 
          <div class="pannel-heading">
          </div>
          <div class="panel-body">

            <form action="<?php echo e(url('editsleep2')); ?>" method="post" >


          <div class="text-center" >
           <p class="text-center"><b>if having enough sleep in school days: </b></p> 
           <input type="text" name="eslp1" value="<?php echo e($data1); ?>">
            </div>
          


            <hr>
           <div class="text-center" >
           <p class="text-center"><b>if not having enough sleep in school days :</b></p> 
           <input type="text" name="eslp2" value="<?php echo e($data2); ?>"> 
            </div>
          


            <hr><div class="text-center" >
           <p class="text-center"><b>if having enough sleep in non school days</b></p> 
           <input type="text" name="eslp3" value="<?php echo e($data3); ?>"> 
            </div>
          
            <hr>
            <div class="text-center" >
           <p class="text-center"><b>if not having enough sleep in non school days</b></p> 
           <input type="text" name="eslp4" value="<?php echo e($data4); ?>"> 
            </div>
                        <hr><div class="text-center" >
           <p class="text-center"><b>if having too much sleep in non school days</b></p> 
           <input type="text" name="eslp6" value="<?php echo e($data6); ?>"> 
            </div>
          
            <hr>
            <div class="text-center" >
           <p class="text-center"><b>if not having too much sleep in non school days</b></p> 
           <input type="text" name="eslp7" value="<?php echo e($data7); ?>"> 
            </div>
            <hr>
              <div class="row justify-content-center  text-white">
              <div class="col-4 lead bg-secondary"></div>
              <div class="col-4 lead bg-secondary">School days </div>
              <div class="col-4 lead bg-secondary">Non school days</div>
            </div>
            <div class="row justify-content-center">
              <div class="col-4 text-black lead border border-secondary" style="background-color:#e4e6e7">text if having enough sleep</div>
              <div class="col-4 text-black lead  border border-secondary" style="background-color:#e4e6e7"><?php echo e($data1); ?></div>
              <div class="col-4 text-black lead border border-secondary" style="background-color:#e4e6e7"><?php echo e($data3); ?></div>
              <div class="col-4 text-black lead  border border-secondary" style="background-color:#e4e6e7">text if not having enough sleep</div>
              <div class="col-4 text-black lead border border-secondary" style="background-color:#e4e6e7"><?php echo e($data2); ?></div>
              <div class="col-4 text-black lead  border border-secondary" style="background-color:#e4e6e7"><?php echo e($data4); ?></div>
              <div class="col-4 text-black lead  border border-secondary" style="background-color:#e4e6e7">text if having too much sleep</div>
              <div class="col-4 text-black lead border border-secondary" style="background-color:#e4e6e7"><?php echo e($data6); ?></div>
              <div class="col-4 text-black lead  border border-secondary" style="background-color:#e4e6e7"><?php echo e($data7); ?></div>
            </div>
            <hr>
           
              <textarea id="summernote" name="eslp5" class="form-control">
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